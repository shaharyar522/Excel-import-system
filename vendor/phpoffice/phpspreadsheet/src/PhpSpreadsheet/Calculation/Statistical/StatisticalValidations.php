<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\Statistical;

use PhpOffice\PhpSpreadsheet\Calculation\Exception;
use PhpOffice\PhpSpreadsheet\Calculation\Information\ExcelError;

class StatisticalValidations
{
<<<<<<< HEAD
    public static function validateFloat(mixed $value): float
=======
    /**
     * @param mixed $value
     */
    public static function validateFloat($value): float
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (!is_numeric($value)) {
            throw new Exception(ExcelError::VALUE());
        }

        return (float) $value;
    }

<<<<<<< HEAD
    public static function validateInt(mixed $value): int
=======
    /**
     * @param mixed $value
     */
    public static function validateInt($value): int
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (!is_numeric($value)) {
            throw new Exception(ExcelError::VALUE());
        }

        return (int) floor((float) $value);
    }

<<<<<<< HEAD
    public static function validateBool(mixed $value): bool
=======
    /**
     * @param mixed $value
     */
    public static function validateBool($value): bool
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (!is_bool($value) && !is_numeric($value)) {
            throw new Exception(ExcelError::VALUE());
        }

        return (bool) $value;
    }
}
