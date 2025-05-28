<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel;

use PhpOffice\PhpSpreadsheet\Calculation\ArrayEnabled;
use PhpOffice\PhpSpreadsheet\Calculation\Exception;
use PhpOffice\PhpSpreadsheet\Calculation\Functions;
use PhpOffice\PhpSpreadsheet\Shared\Date as SharedDateHelper;

class DateParts
{
    use ArrayEnabled;

    /**
     * DAYOFMONTH.
     *
     * Returns the day of the month, for a specified date. The day is given as an integer
     * ranging from 1 to 31.
     *
     * Excel Function:
     *        DAY(dateValue)
     *
     * @param mixed $dateValue Excel date serial value (float), PHP date timestamp (integer),
     *                                    PHP DateTime object, or a standard date string
     *                         Or can be an array of date values
     *
     * @return array|int|string Day of the month
     *         If an array of numbers is passed as the argument, then the returned result will also be an array
     *            with the same dimensions
     */
<<<<<<< HEAD
    public static function day(mixed $dateValue): array|int|string
=======
    public static function day($dateValue)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($dateValue)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $dateValue);
        }

        $weirdResult = self::weirdCondition($dateValue);
        if ($weirdResult >= 0) {
            return $weirdResult;
        }

        try {
            $dateValue = Helpers::getDateValue($dateValue);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        // Execute function
        $PHPDateObject = SharedDateHelper::excelToDateTimeObject($dateValue);
<<<<<<< HEAD
        SharedDateHelper::roundMicroseconds($PHPDateObject);
=======
>>>>>>> 50f5a6f (Initial commit from local project)

        return (int) $PHPDateObject->format('j');
    }

    /**
     * MONTHOFYEAR.
     *
     * Returns the month of a date represented by a serial number.
     * The month is given as an integer, ranging from 1 (January) to 12 (December).
     *
     * Excel Function:
     *        MONTH(dateValue)
     *
     * @param mixed $dateValue Excel date serial value (float), PHP date timestamp (integer),
     *                                    PHP DateTime object, or a standard date string
     *                         Or can be an array of date values
     *
     * @return array|int|string Month of the year
     *         If an array of numbers is passed as the argument, then the returned result will also be an array
     *            with the same dimensions
     */
<<<<<<< HEAD
    public static function month(mixed $dateValue): array|string|int
=======
    public static function month($dateValue)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($dateValue)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $dateValue);
        }

        try {
            $dateValue = Helpers::getDateValue($dateValue);
        } catch (Exception $e) {
            return $e->getMessage();
        }
        if ($dateValue < 1 && SharedDateHelper::getExcelCalendar() === SharedDateHelper::CALENDAR_WINDOWS_1900) {
            return 1;
        }

        // Execute function
        $PHPDateObject = SharedDateHelper::excelToDateTimeObject($dateValue);
<<<<<<< HEAD
        SharedDateHelper::roundMicroseconds($PHPDateObject);
=======
>>>>>>> 50f5a6f (Initial commit from local project)

        return (int) $PHPDateObject->format('n');
    }

    /**
     * YEAR.
     *
     * Returns the year corresponding to a date.
     * The year is returned as an integer in the range 1900-9999.
     *
     * Excel Function:
     *        YEAR(dateValue)
     *
     * @param mixed $dateValue Excel date serial value (float), PHP date timestamp (integer),
     *                                    PHP DateTime object, or a standard date string
     *                         Or can be an array of date values
     *
     * @return array|int|string Year
     *         If an array of numbers is passed as the argument, then the returned result will also be an array
     *            with the same dimensions
     */
<<<<<<< HEAD
    public static function year(mixed $dateValue): array|string|int
=======
    public static function year($dateValue)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($dateValue)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $dateValue);
        }

        try {
            $dateValue = Helpers::getDateValue($dateValue);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        if ($dateValue < 1 && SharedDateHelper::getExcelCalendar() === SharedDateHelper::CALENDAR_WINDOWS_1900) {
            return 1900;
        }
        // Execute function
        $PHPDateObject = SharedDateHelper::excelToDateTimeObject($dateValue);
<<<<<<< HEAD
        SharedDateHelper::roundMicroseconds($PHPDateObject);
=======
>>>>>>> 50f5a6f (Initial commit from local project)

        return (int) $PHPDateObject->format('Y');
    }

    /**
     * @param mixed $dateValue Excel date serial value (float), PHP date timestamp (integer),
     *                                    PHP DateTime object, or a standard date string
     */
<<<<<<< HEAD
    private static function weirdCondition(mixed $dateValue): int
=======
    private static function weirdCondition($dateValue): int
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // Excel does not treat 0 consistently for DAY vs. (MONTH or YEAR)
        if (SharedDateHelper::getExcelCalendar() === SharedDateHelper::CALENDAR_WINDOWS_1900 && Functions::getCompatibilityMode() == Functions::COMPATIBILITY_EXCEL) {
            if (is_bool($dateValue)) {
                return (int) $dateValue;
            }
            if ($dateValue === null) {
                return 0;
            }
            if (is_numeric($dateValue) && $dateValue < 1 && $dateValue >= 0) {
                return 0;
            }
        }

        return -1;
    }
}
