<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\Engineering;

use PhpOffice\PhpSpreadsheet\Calculation\Exception;
use PhpOffice\PhpSpreadsheet\Calculation\Information\ExcelError;

class ConvertBinary extends ConvertBase
{
    /**
     * toDecimal.
     *
     * Return a binary value as decimal.
     *
     * Excel Function:
     *        BIN2DEC(x)
     *
<<<<<<< HEAD
     * @param array|bool|float|int|string $value The binary number (as a string) that you want to convert. The number
=======
     * @param array|string $value The binary number (as a string) that you want to convert. The number
>>>>>>> 50f5a6f (Initial commit from local project)
     *                                cannot contain more than 10 characters (10 bits). The most significant
     *                                bit of number is the sign bit. The remaining 9 bits are magnitude bits.
     *                                Negative numbers are represented using two's-complement notation.
     *                                If number is not a valid binary number, or if number contains more than
     *                                10 characters (10 bits), BIN2DEC returns the #NUM! error value.
     *                      Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|float|int|string Result, or an error
=======
     * @return array|string Result, or an error
>>>>>>> 50f5a6f (Initial commit from local project)
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function toDecimal($value)
    {
        if (is_array($value)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $value);
        }

        try {
            $value = self::validateValue($value);
            $value = self::validateBinary($value);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        if (strlen($value) == 10 && $value[0] === '1') {
            //    Two's Complement
            $value = substr($value, -9);

<<<<<<< HEAD
            return -(512 - bindec($value));
        }

        return bindec($value);
=======
            return '-' . (512 - bindec($value));
        }

        return (string) bindec($value);
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * toHex.
     *
     * Return a binary value as hex.
     *
     * Excel Function:
     *        BIN2HEX(x[,places])
     *
<<<<<<< HEAD
     * @param array|bool|float|int|string $value The binary number (as a string) that you want to convert. The number
=======
     * @param array|string $value The binary number (as a string) that you want to convert. The number
>>>>>>> 50f5a6f (Initial commit from local project)
     *                                cannot contain more than 10 characters (10 bits). The most significant
     *                                bit of number is the sign bit. The remaining 9 bits are magnitude bits.
     *                                Negative numbers are represented using two's-complement notation.
     *                                If number is not a valid binary number, or if number contains more than
     *                                10 characters (10 bits), BIN2HEX returns the #NUM! error value.
     *                      Or can be an array of values
<<<<<<< HEAD
     * @param null|array|float|int|string $places The number of characters to use. If places is omitted, BIN2HEX uses the
=======
     * @param array|int $places The number of characters to use. If places is omitted, BIN2HEX uses the
>>>>>>> 50f5a6f (Initial commit from local project)
     *                                minimum number of characters necessary. Places is useful for padding the
     *                                return value with leading 0s (zeros).
     *                                If places is not an integer, it is truncated.
     *                                If places is nonnumeric, BIN2HEX returns the #VALUE! error value.
     *                                If places is negative, BIN2HEX returns the #NUM! error value.
     *                      Or can be an array of values
     *
     * @return array|string Result, or an error
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
<<<<<<< HEAD
    public static function toHex($value, $places = null): array|string
=======
    public static function toHex($value, $places = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($value) || is_array($places)) {
            return self::evaluateArrayArguments([self::class, __FUNCTION__], $value, $places);
        }

        try {
            $value = self::validateValue($value);
            $value = self::validateBinary($value);
            $places = self::validatePlaces($places);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        if (strlen($value) == 10 && $value[0] === '1') {
            $high2 = substr($value, 0, 2);
            $low8 = substr($value, 2);
            $xarr = ['00' => '00000000', '01' => '00000001', '10' => 'FFFFFFFE', '11' => 'FFFFFFFF'];

            return $xarr[$high2] . strtoupper(substr('0' . dechex((int) bindec($low8)), -2));
        }
        $hexVal = (string) strtoupper(dechex((int) bindec($value)));

        return self::nbrConversionFormat($hexVal, $places);
    }

    /**
     * toOctal.
     *
     * Return a binary value as octal.
     *
     * Excel Function:
     *        BIN2OCT(x[,places])
     *
<<<<<<< HEAD
     * @param array|bool|float|int|string $value The binary number (as a string) that you want to convert. The number
=======
     * @param array|string $value The binary number (as a string) that you want to convert. The number
>>>>>>> 50f5a6f (Initial commit from local project)
     *                                cannot contain more than 10 characters (10 bits). The most significant
     *                                bit of number is the sign bit. The remaining 9 bits are magnitude bits.
     *                                Negative numbers are represented using two's-complement notation.
     *                                If number is not a valid binary number, or if number contains more than
     *                                10 characters (10 bits), BIN2OCT returns the #NUM! error value.
     *                      Or can be an array of values
<<<<<<< HEAD
     * @param null|array|float|int|string $places The number of characters to use. If places is omitted, BIN2OCT uses the
=======
     * @param array|int $places The number of characters to use. If places is omitted, BIN2OCT uses the
>>>>>>> 50f5a6f (Initial commit from local project)
     *                                minimum number of characters necessary. Places is useful for padding the
     *                                return value with leading 0s (zeros).
     *                                If places is not an integer, it is truncated.
     *                                If places is nonnumeric, BIN2OCT returns the #VALUE! error value.
     *                                If places is negative, BIN2OCT returns the #NUM! error value.
     *                      Or can be an array of values
     *
     * @return array|string Result, or an error
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
<<<<<<< HEAD
    public static function toOctal($value, $places = null): array|string
=======
    public static function toOctal($value, $places = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($value) || is_array($places)) {
            return self::evaluateArrayArguments([self::class, __FUNCTION__], $value, $places);
        }

        try {
            $value = self::validateValue($value);
            $value = self::validateBinary($value);
            $places = self::validatePlaces($places);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        if (strlen($value) == 10 && $value[0] === '1') { //    Two's Complement
            return str_repeat('7', 6) . strtoupper(decoct((int) bindec("11$value")));
        }
        $octVal = (string) decoct((int) bindec($value));

        return self::nbrConversionFormat($octVal, $places);
    }

    protected static function validateBinary(string $value): string
    {
        if ((strlen($value) > preg_match_all('/[01]/', $value)) || (strlen($value) > 10)) {
            throw new Exception(ExcelError::NAN());
        }

        return $value;
    }
}
