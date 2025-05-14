<?php
session_start();
require 'vendor/autoload.php';
require 'conn.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if(isset($_POST['excel_data_save'])){
    $fileName = $_FILES['excel_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if (in_array($file_ext, $allowed_ext)) {
        $inputFileNamePath = $_FILES['excel_file']['tmp_name'];
        $spreadsheet = IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        // Extract date range from Excel (row 3, column A)
        $dateRange = isset($data[3][0]) ? $conn->real_escape_string($data[3][0]) : 'Unknown Date Range';
        
        // Create a weekly record entry
        $conn->query("INSERT INTO weekly_record (title, created_at) VALUES ('$dateRange', NOW())");
        $weeklyRecordId = $conn->insert_id;

        foreach ($data as $index => $row) {
            // Skip headers (first 4 rows) and empty rows
            if ($index < 4 || empty($row[1]) || $row[1] === 'Club Name' || $row[1] === 'Total') continue;

            // Prepare data
            $clubData = [
                'weekly_record_id' => $weeklyRecordId,
                'Club_Name' => $conn->real_escape_string($row[1] ?? ''),
                'Club_ID' => $conn->real_escape_string($row[2] ?? ''),
                'Hands_Missions' => $conn->real_escape_string($row[3] ?? 0),
                'Player_Overall' => $conn->real_escape_string($row[4] ?? 0),
                'Ring_Game' => $conn->real_escape_string($row[5] ?? 0),
                'MTT_SNG' => $conn->real_escape_string($row[6] ?? 0),
                'SPINUP' => $conn->real_escape_string($row[7] ?? 0),
                'COLOR_GAME' => $conn->real_escape_string($row[8] ?? 0),
                'LUCKY_DRAW' => $conn->real_escape_string($row[9] ?? 0),
                'Jackpot' => $conn->real_escape_string($row[10] ?? 0),
                'Player_EV_Chop' => $conn->real_escape_string($row[11] ?? 0),
                'Ticket_Value_Won' => $conn->real_escape_string($row[12] ?? 0),
                'Player_Ticket_Buy_in' => $conn->real_escape_string($row[13] ?? 0),
                'Customized_Prize_Value' => $conn->real_escape_string($row[14] ?? 0),
                'Club_earning_Overall' => $conn->real_escape_string($row[15] ?? 0),
                'Fee' => $conn->real_escape_string($row[16] ?? 0),
                'Fee_PPST_Games' => $conn->real_escape_string($row[17] ?? 0),
                'Fee_Non_PPST_Games' => $conn->real_escape_string($row[18] ?? 0),
                'Fee_PPSR_Games' => $conn->real_escape_string($row[19] ?? 0),
                'Fee_Non_PPSR_Games' => $conn->real_escape_string($row[20] ?? 0),
                'SPINUP_Buy_in' => $conn->real_escape_string($row[21] ?? 0),
                'SPINUP_Prize' => $conn->real_escape_string($row[22] ?? 0),
                'COLOR_GAME_Bets' => $conn->real_escape_string($row[23] ?? 0),
                'COLOR_GAME_Payouts' => $conn->real_escape_string($row[24] ?? 0),
                'LUCKY_DRAW_Bets' => $conn->real_escape_string($row[25] ?? 0),
                'LUCKY_DRAW_Payouts' => $conn->real_escape_string($row[26] ?? 0),
                'JackpotFee' => $conn->real_escape_string($row[27] ?? 0),
                'Jackpot_Prize' => $conn->real_escape_string($row[28] ?? 0),
                'Club_EV_Chop' => $conn->real_escape_string($row[29] ?? 0),
                'Ticket_Value_Given_Out' => $conn->real_escape_string($row[30] ?? 0),
                'Club_Ticket_Buy_in' => $conn->real_escape_string($row[31] ?? 0),
                'Gtd_Gap' => $conn->real_escape_string($row[32] ?? 0)
            ];

            // Convert empty strings to 0 for numeric values
            foreach ($clubData as $key => $value) {
                if (is_numeric($value)) {
                    $clubData[$key] = $value === '' ? 0 : $value;
                }
            }

            // Insert into database
            $columns = implode(", ", array_keys($clubData));
            $values = "'" . implode("', '", array_values($clubData)) . "'";
            $sql = "INSERT INTO union_overall ($columns) VALUES ($values)";

            if (!$conn->query($sql)) {
                $_SESSION['message'] = "Error importing data: " . $conn->error;
                header("Location: dashboard.php");
                exit();
            }
        }

        $_SESSION['message'] = "Data imported successfully for $dateRange!";
    } else {
        $_SESSION['message'] = "Invalid file type! Only .xls, .csv, or .xlsx files are allowed.";
    }

    header("Location: dashboard.php");
    exit();
}
