<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\MathTrig;

use PhpOffice\PhpSpreadsheet\Calculation\ArrayEnabled;

class Trunc
{
    use ArrayEnabled;

    /**
     * TRUNC.
     *
     * Truncates value to the number of fractional digits by number_digits.
     * This will probably not be the precise result in the unlikely
     * event that the number of digits to the left of the decimal
     * plus the number of digits to the right exceeds PHP_FLOAT_DIG
     * (or possibly that value minus 1).
     * Excel is unlikely to do any better.
     *
     * @param null|array|float|string $value Or can be an array of values
     * @param array|float|int|string $digits Or can be an array of values
     *
     * @return array|float|string Truncated value, or a string containing an error
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
<<<<<<< HEAD
    public static function evaluate(array|float|string|null $value = 0, array|float|int|string $digits = 0): array|float|string
=======
    public static function evaluate($value = 0, $digits = 0)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($value) || is_array($digits)) {
            return self::evaluateArrayArguments([self::class, __FUNCTION__], $value, $digits);
        }

        return Round::down($value, $digits);
    }
}
