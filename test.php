<?php
ini_set('memory_limit', '1024M');
$mysqli = new mysqli('localhost', 'root', '', 'testing2');

if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

function fillMissingColumns($row)
{
    $filled = [];
    $prevVal = null;
    $prevColIndex = Coordinate::columnIndexFromString('B');

    if (!is_array($row)) return $filled;

    foreach ($row as $col => $value) {
        $colIndex = Coordinate::columnIndexFromString($col);

        for ($i = $prevColIndex; $i < $colIndex; $i++) {
            $fillCol = Coordinate::stringFromColumnIndex($i);
            $filled[$fillCol] = $prevVal;
        }

        $filled[$col] = $value;
        $prevVal = $value;
        $prevColIndex = $colIndex + 1;
    }

    return $filled;
}

if (isset($_POST['fileupload']) && $_POST['fileupload'] == 'yes'):

    if ($_FILES['excel_file']['error'] === UPLOAD_ERR_OK) {
        $tmpFilePath = $_FILES['excel_file']['tmp_name'];
    } else {
        die("File upload error.");
    }

    $reader = new Xlsx();
    $reader->setReadDataOnly(true);
    $spreadsheet = $reader->load($tmpFilePath);
    $worksheet = $spreadsheet->getActiveSheet();
    $highestRow = $worksheet->getHighestRow();
    $highestColumn = $worksheet->getHighestColumn();
    $highestColumnIndex = Coordinate::columnIndexFromString($highestColumn);

    $head = [];
    $data = [];
    $week_title = "";
    $headerRow1 = $headerRow2 = 0;
    $clubNameColumnFound = false;

    // Step 1: Find the header row
    for ($row = 1; $row <= $highestRow; $row++) {
        $rowData = [];
        for ($col = 1; $col <= $highestColumnIndex; $col++) {
            $columnLetter = Coordinate::stringFromColumnIndex($col);
            $value = $worksheet->getCellByColumnAndRow($col, $row)->getCalculatedValue();
            $rowData[$columnLetter] = $value;
        }

        foreach ($rowData as $val) {
            if (strtolower(trim($val ?? '')) == 'club name') {
                $clubNameColumnFound = true;
                $headerRow1 = $row;
                $headerRow2 = $row + 1;
                break 2;
            }
        }
    }

    if (!$clubNameColumnFound) {
        die("Header containing 'Club Name' not found.");
    }

    // Step 2: Extract headers and data
    for ($row = 1; $row <= $highestRow; $row++) {
        for ($col = 1; $col <= $highestColumnIndex; $col++) {
            $columnLetter = Coordinate::stringFromColumnIndex($col);
            $value = $worksheet->getCellByColumnAndRow($col, $row)->getCalculatedValue();

            if ($row < $headerRow1) continue;

            if ($value != "") {
                if ($row == $headerRow1 || $row == $headerRow2) {
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

    // Step 3: Fill merged headers
    $head[$headerRow1] = isset($head[$headerRow1]) ? fillMissingColumns($head[$headerRow1]) : [];
    $head[$headerRow2] = isset($head[$headerRow2]) ? fillMissingColumns($head[$headerRow2]) : [];

    if (empty($head[$headerRow1]) && empty($head[$headerRow2])) {
        die("Error: Header rows are empty.");
    }

    // Step 4: Combine headers
    $allKeys = count($head[$headerRow1]) > count($head[$headerRow2])
        ? array_keys($head[$headerRow1])
        : array_keys($head[$headerRow2]);

    $db_cols = [];
    foreach ($allKeys as $x) {
        $dbcol = ($head[$headerRow1][$x] ?? '') . ($head[$headerRow2][$x] ?? '');
        $dbcol = preg_replace('/[^\w\s]/', '', $dbcol);
        $dbcol = str_replace(' ', '_', $dbcol);
        $db_cols[$x] = $dbcol;
    }

    // Step 5: Prepare insert values
    $insertValues = [];
    $s = 0;
    $countdata = count($data);
    foreach ($data as $r) {
        $s++;
        if ($s == $countdata) continue;

        $rowValues = [];
        foreach ($allKeys as $x) {
            $value = $r[$x] ?? 0;
            $rowValues[] = "'" . $mysqli->real_escape_string($value) . "'";
        }
        $insertValues[] = '(' . implode(',', $rowValues) . ')';
    }

    // Step 6: Alter table
    $result = $mysqli->query("SHOW COLUMNS FROM union_overall");
    $existingColumns = [];
    while ($row = $result->fetch_assoc()) {
        $existingColumns[] = $row['Field'];
    }

    foreach ($db_cols as $column) {
        if (!in_array($column, $existingColumns)) {
            $query = "ALTER TABLE union_overall ADD COLUMN `$column` VARCHAR(200) DEFAULT NULL";
            $mysqli->query($query); // silent fail
        }
    }

    // Step 7: Insert
    if (count($insertValues) > 0) {
        $query = "INSERT INTO union_overall (" . implode(',', $db_cols) . ") VALUES " . implode(',', $insertValues);
        $mysqli->query($query); // silent fail
    }

    $mysqli->close();

    echo "<pre>";
    echo "Header Row 1:\n";
    print_r($head[$headerRow1]);
    echo "Header Row 2:\n";
    print_r($head[$headerRow2]);
    echo "Parsed Data:\n";
    print_r($data);
    echo "</pre>";
    exit('Done');
endif;
?>

<!-- HTML Form -->
<form action="" method="post" enctype="multipart/form-data">
    <label>Select Excel File:</label>
    <input type="file" name="excel_file" accept=".xlsx" required>
    <input type="submit" value="Upload and Process">
    <input type="hidden" name="fileupload" value="yes">
</form>
