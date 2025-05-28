<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel;

use DateTime;
use PhpOffice\PhpSpreadsheet\Calculation\Exception;
use PhpOffice\PhpSpreadsheet\Calculation\Functions;
use PhpOffice\PhpSpreadsheet\Calculation\Information\ExcelError;
use PhpOffice\PhpSpreadsheet\Shared\Date as SharedDateHelper;

class Helpers
{
    /**
     * Identify if a year is a leap year or not.
     *
     * @param int|string $year The year to test
     *
     * @return bool TRUE if the year is a leap year, otherwise FALSE
     */
<<<<<<< HEAD
    public static function isLeapYear(int|string $year): bool
    {
        $year = (int) $year;

=======
    public static function isLeapYear($year): bool
    {
>>>>>>> 50f5a6f (Initial commit from local project)
        return (($year % 4) === 0) && (($year % 100) !== 0) || (($year % 400) === 0);
    }

    /**
     * getDateValue.
     *
<<<<<<< HEAD
     * @return float Excel date/time serial value
     */
    public static function getDateValue(mixed $dateValue, bool $allowBool = true): float
=======
     * @param mixed $dateValue
     *
     * @return float Excel date/time serial value
     */
    public static function getDateValue($dateValue, bool $allowBool = true): float
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_object($dateValue)) {
            $retval = SharedDateHelper::PHPToExcel($dateValue);
            if (is_bool($retval)) {
                throw new Exception(ExcelError::VALUE());
            }

            return $retval;
        }

        self::nullFalseTrueToNumber($dateValue, $allowBool);
        if (!is_numeric($dateValue)) {
            $saveReturnDateType = Functions::getReturnDateType();
            Functions::setReturnDateType(Functions::RETURNDATE_EXCEL);
<<<<<<< HEAD
            if (is_string($dateValue)) {
                $dateValue = DateValue::fromString($dateValue);
            }
=======
            $dateValue = DateValue::fromString($dateValue);
>>>>>>> 50f5a6f (Initial commit from local project)
            Functions::setReturnDateType($saveReturnDateType);
            if (!is_numeric($dateValue)) {
                throw new Exception(ExcelError::VALUE());
            }
        }
        if ($dateValue < 0 && Functions::getCompatibilityMode() !== Functions::COMPATIBILITY_OPENOFFICE) {
            throw new Exception(ExcelError::NAN());
        }

        return (float) $dateValue;
    }

    /**
     * getTimeValue.
     *
<<<<<<< HEAD
     * @return float|string Excel date/time serial value, or string if error
     */
    public static function getTimeValue(string $timeValue): string|float
    {
        $saveReturnDateType = Functions::getReturnDateType();
        Functions::setReturnDateType(Functions::RETURNDATE_EXCEL);
        /** @var float|string $timeValue */
=======
     * @param string $timeValue
     *
     * @return mixed Excel date/time serial value, or string if error
     */
    public static function getTimeValue($timeValue)
    {
        $saveReturnDateType = Functions::getReturnDateType();
        Functions::setReturnDateType(Functions::RETURNDATE_EXCEL);
>>>>>>> 50f5a6f (Initial commit from local project)
        $timeValue = TimeValue::fromString($timeValue);
        Functions::setReturnDateType($saveReturnDateType);

        return $timeValue;
    }

    /**
     * Adjust date by given months.
     *
<<<<<<< HEAD
     * @param float|int $dateValue date to be adjusted
=======
     * @param mixed $dateValue
>>>>>>> 50f5a6f (Initial commit from local project)
     */
    public static function adjustDateByMonths($dateValue = 0, float $adjustmentMonths = 0): DateTime
    {
        // Execute function
        $PHPDateObject = SharedDateHelper::excelToDateTimeObject($dateValue);
        $oMonth = (int) $PHPDateObject->format('m');
        $oYear = (int) $PHPDateObject->format('Y');

        $adjustmentMonthsString = (string) $adjustmentMonths;
        if ($adjustmentMonths > 0) {
            $adjustmentMonthsString = '+' . $adjustmentMonths;
        }
        if ($adjustmentMonths != 0) {
            $PHPDateObject->modify($adjustmentMonthsString . ' months');
        }
        $nMonth = (int) $PHPDateObject->format('m');
        $nYear = (int) $PHPDateObject->format('Y');

        $monthDiff = ($nMonth - $oMonth) + (($nYear - $oYear) * 12);
        if ($monthDiff != $adjustmentMonths) {
            $adjustDays = (int) $PHPDateObject->format('d');
            $adjustDaysString = '-' . $adjustDays . ' days';
            $PHPDateObject->modify($adjustDaysString);
        }

        return $PHPDateObject;
    }

    /**
     * Help reduce perceived complexity of some tests.
<<<<<<< HEAD
     */
    public static function replaceIfEmpty(mixed &$value, mixed $altValue): void
=======
     *
     * @param mixed $value
     * @param mixed $altValue
     */
    public static function replaceIfEmpty(&$value, $altValue): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $value = $value ?: $altValue;
    }

    /**
     * Adjust year in ambiguous situations.
     */
    public static function adjustYear(string $testVal1, string $testVal2, string &$testVal3): void
    {
        if (!is_numeric($testVal1) || $testVal1 < 31) {
            if (!is_numeric($testVal2) || $testVal2 < 12) {
                if (is_numeric($testVal3) && $testVal3 < 12) {
<<<<<<< HEAD
                    $testVal3 = (string) ($testVal3 + 2000);
=======
                    $testVal3 += 2000;
>>>>>>> 50f5a6f (Initial commit from local project)
                }
            }
        }
    }

    /**
     * Return result in one of three formats.
<<<<<<< HEAD
     */
    public static function returnIn3FormatsArray(array $dateArray, bool $noFrac = false): DateTime|float|int
=======
     *
     * @return mixed
     */
    public static function returnIn3FormatsArray(array $dateArray, bool $noFrac = false)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $retType = Functions::getReturnDateType();
        if ($retType === Functions::RETURNDATE_PHP_DATETIME_OBJECT) {
            return new DateTime(
                $dateArray['year']
                . '-' . $dateArray['month']
                . '-' . $dateArray['day']
                . ' ' . $dateArray['hour']
                . ':' . $dateArray['minute']
                . ':' . $dateArray['second']
            );
        }
<<<<<<< HEAD
        $excelDateValue
            = SharedDateHelper::formattedPHPToExcel(
=======
        $excelDateValue =
            SharedDateHelper::formattedPHPToExcel(
>>>>>>> 50f5a6f (Initial commit from local project)
                $dateArray['year'],
                $dateArray['month'],
                $dateArray['day'],
                $dateArray['hour'],
                $dateArray['minute'],
                $dateArray['second']
            );
        if ($retType === Functions::RETURNDATE_EXCEL) {
<<<<<<< HEAD
            return $noFrac ? floor($excelDateValue) : $excelDateValue;
        }
        // RETURNDATE_UNIX_TIMESTAMP)

        return SharedDateHelper::excelToTimestamp($excelDateValue);
=======
            return $noFrac ? floor($excelDateValue) : (float) $excelDateValue;
        }
        // RETURNDATE_UNIX_TIMESTAMP)

        return (int) SharedDateHelper::excelToTimestamp($excelDateValue);
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * Return result in one of three formats.
<<<<<<< HEAD
     */
    public static function returnIn3FormatsFloat(float $excelDateValue): float|int|DateTime
=======
     *
     * @return mixed
     */
    public static function returnIn3FormatsFloat(float $excelDateValue)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $retType = Functions::getReturnDateType();
        if ($retType === Functions::RETURNDATE_EXCEL) {
            return $excelDateValue;
        }
        if ($retType === Functions::RETURNDATE_UNIX_TIMESTAMP) {
<<<<<<< HEAD
            return SharedDateHelper::excelToTimestamp($excelDateValue);
=======
            return (int) SharedDateHelper::excelToTimestamp($excelDateValue);
>>>>>>> 50f5a6f (Initial commit from local project)
        }
        // RETURNDATE_PHP_DATETIME_OBJECT

        return SharedDateHelper::excelToDateTimeObject($excelDateValue);
    }

    /**
     * Return result in one of three formats.
<<<<<<< HEAD
     */
    public static function returnIn3FormatsObject(DateTime $PHPDateObject): DateTime|float|int
=======
     *
     * @return mixed
     */
    public static function returnIn3FormatsObject(DateTime $PHPDateObject)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $retType = Functions::getReturnDateType();
        if ($retType === Functions::RETURNDATE_PHP_DATETIME_OBJECT) {
            return $PHPDateObject;
        }
        if ($retType === Functions::RETURNDATE_EXCEL) {
            return (float) SharedDateHelper::PHPToExcel($PHPDateObject);
        }
        // RETURNDATE_UNIX_TIMESTAMP
        $stamp = SharedDateHelper::PHPToExcel($PHPDateObject);
        $stamp = is_bool($stamp) ? ((int) $stamp) : $stamp;

<<<<<<< HEAD
        return SharedDateHelper::excelToTimestamp($stamp);
=======
        return (int) SharedDateHelper::excelToTimestamp($stamp);
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    private static function baseDate(): int
    {
        if (Functions::getCompatibilityMode() === Functions::COMPATIBILITY_OPENOFFICE) {
            return 0;
        }
        if (SharedDateHelper::getExcelCalendar() === SharedDateHelper::CALENDAR_MAC_1904) {
            return 0;
        }

        return 1;
    }

    /**
     * Many functions accept null/false/true argument treated as 0/0/1.
<<<<<<< HEAD
     */
    public static function nullFalseTrueToNumber(mixed &$number, bool $allowBool = true): void
=======
     *
     * @param mixed $number
     */
    public static function nullFalseTrueToNumber(&$number, bool $allowBool = true): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $number = Functions::flattenSingleValue($number);
        $nullVal = self::baseDate();
        if ($number === null) {
            $number = $nullVal;
        } elseif ($allowBool && is_bool($number)) {
            $number = $nullVal + (int) $number;
        }
    }

    /**
     * Many functions accept null argument treated as 0.
<<<<<<< HEAD
     */
    public static function validateNumericNull(mixed $number): int|float
=======
     *
     * @param mixed $number
     *
     * @return float|int
     */
    public static function validateNumericNull($number)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $number = Functions::flattenSingleValue($number);
        if ($number === null) {
            return 0;
        }
        if (is_int($number)) {
            return $number;
        }
        if (is_numeric($number)) {
            return (float) $number;
        }

        throw new Exception(ExcelError::VALUE());
    }

    /**
     * Many functions accept null/false/true argument treated as 0/0/1.
     *
<<<<<<< HEAD
     * @phpstan-assert float $number
     */
    public static function validateNotNegative(mixed $number): float
=======
     * @param mixed $number
     *
     * @return float
     */
    public static function validateNotNegative($number)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (!is_numeric($number)) {
            throw new Exception(ExcelError::VALUE());
        }
        if ($number >= 0) {
            return (float) $number;
        }

        throw new Exception(ExcelError::NAN());
    }

    public static function silly1900(DateTime $PHPDateObject, string $mod = '-1 day'): void
    {
        $isoDate = $PHPDateObject->format('c');
        if ($isoDate < '1900-03-01') {
            $PHPDateObject->modify($mod);
        }
    }

    public static function dateParse(string $string): array
    {
        return self::forceArray(date_parse($string));
    }

    public static function dateParseSucceeded(array $dateArray): bool
    {
        return $dateArray['error_count'] === 0;
    }

    /**
     * Despite documentation, date_parse probably never returns false.
     * Just in case, this routine helps guarantee it.
     *
     * @param array|false $dateArray
     */
<<<<<<< HEAD
    private static function forceArray(array|bool $dateArray): array
    {
        return is_array($dateArray) ? $dateArray : ['error_count' => 1];
    }

    public static function floatOrInt(mixed $value): float|int
    {
        $result = Functions::scalar($value);

        return is_numeric($result) ? ($result + 0) : 0;
    }
=======
    private static function forceArray($dateArray): array
    {
        return is_array($dateArray) ? $dateArray : ['error_count' => 1];
    }
>>>>>>> 50f5a6f (Initial commit from local project)
}
