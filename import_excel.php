<?php
session_start();
require 'vendor/autoload.php';
require 'conn.php'; 

use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST['excel_data_save'])) {
    $fileName = $_FILES['excel_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);
// hum es main esi file ko allwoed karauy guy kay  like below extention file are allowed for websie import excel file
    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if (in_array($file_ext, $allowed_ext)) {
        $inputFileNamePath = $_FILES['excel_file']['tmp_name'];
        $spreadsheet = IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

 

        foreach ($data as $index => $row) {
            if ($index === 0) continue; 
            $fullname = $conn->real_escape_string($row[0]);
            $email    = $conn->real_escape_string($row[1]);
            $phone    = $conn->real_escape_string($row[2]);
            $course   = $conn->real_escape_string($row[3]);

            $conn->query("INSERT INTO students (fullname, email, phone, course) VALUES ('$fullname', '$email', '$phone', '$course')");
        }

        $_SESSION['message'] = "Data imported successfully!";
    } else {
        $_SESSION['message'] = "Invalid file type!";
    }

    header("Location: dashboard.php");
    exit();
}
