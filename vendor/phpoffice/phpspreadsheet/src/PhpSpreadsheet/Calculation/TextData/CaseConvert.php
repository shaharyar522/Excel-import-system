<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\TextData;

use PhpOffice\PhpSpreadsheet\Calculation\ArrayEnabled;
<<<<<<< HEAD
use PhpOffice\PhpSpreadsheet\Calculation\Exception as CalcExp;
=======
>>>>>>> 50f5a6f (Initial commit from local project)
use PhpOffice\PhpSpreadsheet\Shared\StringHelper;

class CaseConvert
{
    use ArrayEnabled;

    /**
     * LOWERCASE.
     *
     * Converts a string value to upper case.
     *
     * @param mixed $mixedCaseValue The string value to convert to lower case
     *                              Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|string If an array of values is passed as the argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function lower(mixed $mixedCaseValue): array|string
=======
     * @return array|string
     *         If an array of values is passed as the argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function lower($mixedCaseValue)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($mixedCaseValue)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $mixedCaseValue);
        }

<<<<<<< HEAD
        try {
            $mixedCaseValue = Helpers::extractString($mixedCaseValue, true);
        } catch (CalcExp $e) {
            return $e->getMessage();
        }
=======
        $mixedCaseValue = Helpers::extractString($mixedCaseValue);
>>>>>>> 50f5a6f (Initial commit from local project)

        return StringHelper::strToLower($mixedCaseValue);
    }

    /**
     * UPPERCASE.
     *
     * Converts a string value to upper case.
     *
     * @param mixed $mixedCaseValue The string value to convert to upper case
     *                              Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|string If an array of values is passed as the argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function upper(mixed $mixedCaseValue): array|string
=======
     * @return array|string
     *         If an array of values is passed as the argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function upper($mixedCaseValue)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($mixedCaseValue)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $mixedCaseValue);
        }

<<<<<<< HEAD
        try {
            $mixedCaseValue = Helpers::extractString($mixedCaseValue, true);
        } catch (CalcExp $e) {
            return $e->getMessage();
        }
=======
        $mixedCaseValue = Helpers::extractString($mixedCaseValue);
>>>>>>> 50f5a6f (Initial commit from local project)

        return StringHelper::strToUpper($mixedCaseValue);
    }

    /**
     * PROPERCASE.
     *
     * Converts a string value to proper or title case.
     *
     * @param mixed $mixedCaseValue The string value to convert to title case
     *                              Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|string If an array of values is passed as the argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function proper(mixed $mixedCaseValue): array|string
=======
     * @return array|string
     *         If an array of values is passed as the argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function proper($mixedCaseValue)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($mixedCaseValue)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $mixedCaseValue);
        }

<<<<<<< HEAD
        try {
            $mixedCaseValue = Helpers::extractString($mixedCaseValue, true);
        } catch (CalcExp $e) {
            return $e->getMessage();
        }
=======
        $mixedCaseValue = Helpers::extractString($mixedCaseValue);
>>>>>>> 50f5a6f (Initial commit from local project)

        return StringHelper::strToTitle($mixedCaseValue);
    }
}
