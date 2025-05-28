<?php
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

function fillMissingColumns($row) {
    $filled = [];
    $prevVal = null;
    $prevColIndex = Coordinate::columnIndexFromString('B'); // Start from B

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

?>