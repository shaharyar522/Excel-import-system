<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\MathTrig;

use PhpOffice\PhpSpreadsheet\Calculation\ArrayEnabled;
use PhpOffice\PhpSpreadsheet\Calculation\Exception;

class Sign
{
    use ArrayEnabled;

    /**
     * SIGN.
     *
     * Determines the sign of a number. Returns 1 if the number is positive, zero (0)
     *        if the number is 0, and -1 if the number is negative.
     *
     * @param array|float $number Number to round, or can be an array of numbers
     *
     * @return array|int|string sign value, or a string containing an error
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

        return Helpers::returnSign($number);
    }
}
