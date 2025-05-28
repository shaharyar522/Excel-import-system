<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\MathTrig;

use PhpOffice\PhpSpreadsheet\Calculation\ArrayEnabled;
use PhpOffice\PhpSpreadsheet\Calculation\Exception;

class IntClass
{
    use ArrayEnabled;

    /**
     * INT.
     *
     * Casts a floating point value to an integer
     *
     * Excel Function:
     *        INT(number)
     *
     * @param array|float $number Number to cast to an integer, or can be an array of numbers
     *
     * @return array|int|string Integer value, or a string containing an error
     *         If an array of numbers is passed as the argument, then the returned result will also be an array
     *            with the same dimensions
     */
<<<<<<< HEAD
    public static function evaluate($number): array|string|int
=======
    public static function evaluate($number)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($number)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $number);
        }

        try {
            $number = Helpers::validateNumericNullBool($number);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return (int) floor($number);
    }
}
