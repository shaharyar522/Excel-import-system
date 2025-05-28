<?php
ini_set('memory_limit', '1024M');
require 'connection.php';

// Check for connection error
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

require 'vendor/autoload.php';
require 'functions.php';

use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if (isset($_POST['save_excel_data']) && $_POST['save_excel_data'] == 'yes'):
    if ($_FILES['file_input']['error'] === UPLOAD_ERR_OK) {
        $tmpFilePath = $_FILES['file_input']['tmp_name'];
    } else {
        die("File upload error.");
    }

    $inputFileName = $tmpFilePath;

    $reader = new Xlsx();
    $reader->setReadDataOnly(true);
    $sheetNames = $reader->listWorksheetNames($inputFileName);
    $firstSheetName = $sheetNames[0];
    $reader->setLoadSheetsOnly([$firstSheetName]);
    $spreadsheet = $reader->load($inputFileName);
    $worksheet = $spreadsheet->getActiveSheet();
    $highestRow = $worksheet->getHighestRow();
    $highestColumn = $worksheet->getHighestColumn();
    $highestColumnIndex = Coordinate::columnIndexFromString($highestColumn);

    $skip_row = 0;
    for ($row = 1; $row <= $highestRow; $row++) {
        for ($col = 1; $col <= $highestColumnIndex; $col++) {
            $value = $worksheet->getCellByColumnAndRow($col, $row)->getCalculatedValue();
            if ($value !== null && strtolower(trim(str_replace(" ", "", $value))) == 'clubname') {
                $skip_row = $row;
                break;
            }
        }
        if ($skip_row != 0) break;
    }

    $skiprow = $skip_row;
    $skiprowplus = $skip_row + 1;

    $data = [];
    $week_title = "";
    $head = array();

    for ($row = 1; $row <= $highestRow; $row++) {
        for ($col = 1; $col <= $highestColumnIndex; $col++) {
            $columnLetter = Coordinate::stringFromColumnIndex($col);
            $cell = $worksheet->getCellByColumnAndRow($col, $row);
            $value = $cell->getCalculatedValue();

            if ($row < $skiprow) continue;

            if ($value != "") {
                if ($row == $skiprow || $row == $skiprowplus) {
                    if ($columnLetter == 'A') {
                        $week_title = $value;
                        continue;
                    }
                    $head[$row][$columnLetter] = $value;
                } else {
                    $data[$row][$columnLetter] = $value;
                }
            }
        }
    }

    $date_from = isset($_POST['date_from']) ? $mysqli->real_escape_string($_POST['date_from']) : null;
    $date_to = isset($_POST['date_to']) ? $mysqli->real_escape_string($_POST['date_to']) : null;

    if ($week_title && $date_from && $date_to) {
        $checkStmt = $mysqli->prepare("
            SELECT COUNT(*) FROM weekly_record
            WHERE date_from <= ? AND date_to >= ?
        ");
        $checkStmt->bind_param("ss", $date_to, $date_from);
        $checkStmt->execute();
        $checkStmt->bind_result($count);
        $checkStmt->fetch();
        $checkStmt->close();

        if ($count > 0) {
            echo json_encode([
                'success' => false,
                'message' => 'A record with overlapping Date From or Date To already exists.',
            ]);
            $mysqli->close();
            exit;
        }
    }

    $head[$skiprow] = fillMissingColumns($head[$skiprow]);
    $head[$skiprowplus] = fillMissingColumns($head[$skiprowplus]);

    $allKeys = (count($head[$skiprow]) > count($head[$skiprowplus])) ? array_keys($head[$skiprow]) : array_keys($head[$skiprowplus]);

    $db_cols = [];
    foreach ($allKeys as $x) {
        $dbcol = (isset($head[$skiprow][$x]) ? $head[$skiprow][$x] : '') . (isset($head[$skiprowplus][$x]) ? $head[$skiprowplus][$x] : '');
        $dbcol = preg_replace('/[^\w\s]/', '', $dbcol);
        $dbcol = str_replace(' ', '_', $dbcol);
        $db_cols[$x] = $dbcol;
    }

    // Prepare fields_list string (to be saved in weekly_record only)
    $fields_list_str = implode(',', array_values($db_cols));

    // Insert into weekly_record table (with union_overall_fields_list)
    $weekly_record_id = null;
    if ($week_title && $date_from && $date_to) {
        $created_at = date('Y-m-d H:i:s');
        $stmt = $mysqli->prepare("INSERT INTO weekly_record (title, create_at, date_from, date_to, union_overall_fields_list) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $week_title, $created_at, $date_from, $date_to, $fields_list_str);
        $stmt->execute();
        $weekly_record_id = $stmt->insert_id;
        $stmt->close();
    }

    // Add weekly_record_id and date_to at the beginning
    $db_cols = array_merge(['weekly_record_id', 'date_to'], array_values($db_cols));

    // Get current columns in 'union_overall'
    $result = $mysqli->query("SHOW COLUMNS FROM union_overall");
    $existingColumns = [];
    while ($row = $result->fetch_assoc()) {
        $existingColumns[] = $row['Field'];
    }

    // Normalize existing columns for case-insensitive comparison
    $normalizedExistingColumns = array_map('strtolower', array_map('trim', $existingColumns));

    foreach ($db_cols as $column) {
        $normalizedColumn = strtolower(trim($column));

        // Skip if column already exists
        if (in_array($normalizedColumn, $normalizedExistingColumns)) {
            continue;
        }

        // Define column type
        $type = ($column == 'weekly_record_id') ? "INT(11) DEFAULT NULL" : "VARCHAR(200) DEFAULT NULL";
        if ($column == 'date_to') $type = "DATE DEFAULT NULL";

        // Alter table to add new column
        $query = "ALTER TABLE union_overall ADD COLUMN `$column` $type";
        $mysqli->query($query);

        // Add to existing columns list to prevent duplicate addition in the same run
        $normalizedExistingColumns[] = $normalizedColumn;
    }



    // Insert data into union_overall
    $insertValues = [];
    $s = 0;
    $countdata = count($data);
    foreach ($data as $r) {
        $s++;
        if ($s == $countdata) continue;

        $rowValues = [];
        $rowValues[] = (int)$weekly_record_id;
        $rowValues[] = "'" . $mysqli->real_escape_string($date_to) . "'";

        foreach ($allKeys as $x) {
            $value = isset($r[$x]) ? $r[$x] : 0;
            $rowValues[] = "'" . $mysqli->real_escape_string($value) . "'";
        }

        $insertValues[] = '(' . implode(',', $rowValues) . ')';
    }

    if (count($insertValues) > 0) {
        $query = "INSERT INTO union_overall (" . implode(',', $db_cols) . ") VALUES " . implode(',', $insertValues);
        $mysqli->query($query);
    }
    // Count related union_overall rows for this weekly_record_id
    $unionCount = 0;
    if ($weekly_record_id) {
        $countQuery = $mysqli->prepare("SELECT COUNT(*) FROM union_overall WHERE weekly_record_id = ?");
        $countQuery->bind_param("i", $weekly_record_id);
        $countQuery->execute();
        $countQuery->bind_result($unionCount);
        $countQuery->fetch();
        $countQuery->close();
    }


    $mysqli->close();

    echo json_encode([
        'success' => true,
        'message' => 'File imported successfully!',
        'weekly_record_id' => $weekly_record_id,
        'title' => $week_title,
        'date_from' => $date_from,
        'date_to' => $date_to,
        'union_count' => $unionCount,
    ]);

endif;
