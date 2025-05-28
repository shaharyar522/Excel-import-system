<?php

namespace PhpOffice\PhpSpreadsheet\Shared;

use DateTime;
use DateTimeInterface;
use DateTimeZone;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel;
use PhpOffice\PhpSpreadsheet\Calculation\Functions;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Exception as PhpSpreadsheetException;
<<<<<<< HEAD
=======
use PhpOffice\PhpSpreadsheet\Shared\Date as SharedDate;
>>>>>>> 50f5a6f (Initial commit from local project)
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class Date
{
    /** constants */
    const CALENDAR_WINDOWS_1900 = 1900; //    Base date of 1st Jan 1900 = 1.0
    const CALENDAR_MAC_1904 = 1904; //    Base date of 2nd Jan 1904 = 1.0

    /**
     * Names of the months of the year, indexed by shortname
     * Planned usage for locale settings.
     *
     * @var string[]
     */
<<<<<<< HEAD
    public static array $monthNames = [
=======
    public static $monthNames = [
>>>>>>> 50f5a6f (Initial commit from local project)
        'Jan' => 'January',
        'Feb' => 'February',
        'Mar' => 'March',
        'Apr' => 'April',
        'May' => 'May',
        'Jun' => 'June',
        'Jul' => 'July',
        'Aug' => 'August',
        'Sep' => 'September',
        'Oct' => 'October',
        'Nov' => 'November',
        'Dec' => 'December',
    ];

    /**
     * @var string[]
     */
<<<<<<< HEAD
    public static array $numberSuffixes = [
=======
    public static $numberSuffixes = [
>>>>>>> 50f5a6f (Initial commit from local project)
        'st',
        'nd',
        'rd',
        'th',
    ];

    /**
     * Base calendar year to use for calculations
     * Value is either CALENDAR_WINDOWS_1900 (1900) or CALENDAR_MAC_1904 (1904).
<<<<<<< HEAD
     */
    protected static int $excelCalendar = self::CALENDAR_WINDOWS_1900;

    /**
     * Default timezone to use for DateTime objects.
     */
    protected static ?DateTimeZone $defaultTimeZone = null;
=======
     *
     * @var int
     */
    protected static $excelCalendar = self::CALENDAR_WINDOWS_1900;

    /**
     * Default timezone to use for DateTime objects.
     *
     * @var null|DateTimeZone
     */
    protected static $defaultTimeZone;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Set the Excel calendar (Windows 1900 or Mac 1904).
     *
<<<<<<< HEAD
     * @param ?int $baseYear Excel base date (1900 or 1904)
     *
     * @return bool Success or failure
     */
    public static function setExcelCalendar(?int $baseYear): bool
    {
        if (
            ($baseYear === self::CALENDAR_WINDOWS_1900)
            || ($baseYear === self::CALENDAR_MAC_1904)
=======
     * @param int $baseYear Excel base date (1900 or 1904)
     *
     * @return bool Success or failure
     */
    public static function setExcelCalendar($baseYear)
    {
        if (
            ($baseYear == self::CALENDAR_WINDOWS_1900) ||
            ($baseYear == self::CALENDAR_MAC_1904)
>>>>>>> 50f5a6f (Initial commit from local project)
        ) {
            self::$excelCalendar = $baseYear;

            return true;
        }

        return false;
    }

    /**
     * Return the Excel calendar (Windows 1900 or Mac 1904).
     *
     * @return int Excel base date (1900 or 1904)
     */
<<<<<<< HEAD
    public static function getExcelCalendar(): int
=======
    public static function getExcelCalendar()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return self::$excelCalendar;
    }

    /**
     * Set the Default timezone to use for dates.
     *
     * @param null|DateTimeZone|string $timeZone The timezone to set for all Excel datetimestamp to PHP DateTime Object conversions
     *
     * @return bool Success or failure
     */
<<<<<<< HEAD
    public static function setDefaultTimezone($timeZone): bool
=======
    public static function setDefaultTimezone($timeZone)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        try {
            $timeZone = self::validateTimeZone($timeZone);
            self::$defaultTimeZone = $timeZone;
            $retval = true;
<<<<<<< HEAD
        } catch (PhpSpreadsheetException) {
=======
        } catch (PhpSpreadsheetException $e) {
>>>>>>> 50f5a6f (Initial commit from local project)
            $retval = false;
        }

        return $retval;
    }

    /**
     * Return the Default timezone, or UTC if default not set.
     */
    public static function getDefaultTimezone(): DateTimeZone
    {
        return self::$defaultTimeZone ?? new DateTimeZone('UTC');
    }

    /**
     * Return the Default timezone, or local timezone if default is not set.
     */
    public static function getDefaultOrLocalTimezone(): DateTimeZone
    {
        return self::$defaultTimeZone ?? new DateTimeZone(date_default_timezone_get());
    }

    /**
     * Return the Default timezone even if null.
     */
    public static function getDefaultTimezoneOrNull(): ?DateTimeZone
    {
        return self::$defaultTimeZone;
    }

    /**
     * Validate a timezone.
     *
     * @param null|DateTimeZone|string $timeZone The timezone to validate, either as a timezone string or object
     *
     * @return ?DateTimeZone The timezone as a timezone object
     */
<<<<<<< HEAD
    private static function validateTimeZone($timeZone): ?DateTimeZone
=======
    private static function validateTimeZone($timeZone)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($timeZone instanceof DateTimeZone || $timeZone === null) {
            return $timeZone;
        }
        if (in_array($timeZone, DateTimeZone::listIdentifiers(DateTimeZone::ALL_WITH_BC))) {
            return new DateTimeZone($timeZone);
        }

        throw new PhpSpreadsheetException('Invalid timezone');
    }

    /**
     * @param mixed $value Converts a date/time in ISO-8601 standard format date string to an Excel
     *                         serialized timestamp.
     *                     See https://en.wikipedia.org/wiki/ISO_8601 for details of the ISO-8601 standard format.
<<<<<<< HEAD
     */
    public static function convertIsoDate(mixed $value): float|int
=======
     *
     * @return float|int
     */
    public static function convertIsoDate($value)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (!is_string($value)) {
            throw new Exception('Non-string value supplied for Iso Date conversion');
        }

        $date = new DateTime($value);
        $dateErrors = DateTime::getLastErrors();

        if (is_array($dateErrors) && ($dateErrors['warning_count'] > 0 || $dateErrors['error_count'] > 0)) {
            throw new Exception("Invalid string $value supplied for datatype Date");
        }

<<<<<<< HEAD
        $newValue = self::PHPToExcel($date);
=======
        $newValue = SharedDate::PHPToExcel($date);
>>>>>>> 50f5a6f (Initial commit from local project)
        if ($newValue === false) {
            throw new Exception("Invalid string $value supplied for datatype Date");
        }

<<<<<<< HEAD
        if (preg_match('/^\s*\d?\d:\d\d(:\d\d([.]\d+)?)?\s*(am|pm)?\s*$/i', $value) == 1) {
=======
        if (preg_match('/^\\s*\\d?\\d:\\d\\d(:\\d\\d([.]\\d+)?)?\\s*(am|pm)?\\s*$/i', $value) == 1) {
>>>>>>> 50f5a6f (Initial commit from local project)
            $newValue = fmod($newValue, 1.0);
        }

        return $newValue;
    }

    /**
     * Convert a MS serialized datetime value from Excel to a PHP Date/Time object.
     *
     * @param float|int $excelTimestamp MS Excel serialized date/time value
     * @param null|DateTimeZone|string $timeZone The timezone to assume for the Excel timestamp,
     *                                           if you don't want to treat it as a UTC value
     *                                           Use the default (UTC) unless you absolutely need a conversion
     *
     * @return DateTime PHP date/time object
     */
<<<<<<< HEAD
    public static function excelToDateTimeObject(float|int $excelTimestamp, null|DateTimeZone|string $timeZone = null): DateTime
=======
    public static function excelToDateTimeObject($excelTimestamp, $timeZone = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $timeZone = ($timeZone === null) ? self::getDefaultTimezone() : self::validateTimeZone($timeZone);
        if (Functions::getCompatibilityMode() == Functions::COMPATIBILITY_EXCEL) {
            if ($excelTimestamp < 1 && self::$excelCalendar === self::CALENDAR_WINDOWS_1900) {
                // Unix timestamp base date
                $baseDate = new DateTime('1970-01-01', $timeZone);
            } else {
                // MS Excel calendar base dates
                if (self::$excelCalendar == self::CALENDAR_WINDOWS_1900) {
                    // Allow adjustment for 1900 Leap Year in MS Excel
                    $baseDate = ($excelTimestamp < 60) ? new DateTime('1899-12-31', $timeZone) : new DateTime('1899-12-30', $timeZone);
                } else {
                    $baseDate = new DateTime('1904-01-01', $timeZone);
                }
            }
        } else {
            $baseDate = new DateTime('1899-12-30', $timeZone);
        }

        $days = floor($excelTimestamp);
        $partDay = $excelTimestamp - $days;
<<<<<<< HEAD
        $hms = 86400 * $partDay;
        $microseconds = (int) round(fmod($hms, 1) * 1000000);
        $hms = (int) floor($hms);
        $hours = intdiv($hms, 3600);
        $hms -= $hours * 3600;
        $minutes = intdiv($hms, 60);
        $seconds = $hms % 60;
=======
        $hours = floor($partDay * 24);
        $partDay = $partDay * 24 - $hours;
        $minutes = floor($partDay * 60);
        $partDay = $partDay * 60 - $minutes;
        $seconds = round($partDay * 60);
>>>>>>> 50f5a6f (Initial commit from local project)

        if ($days >= 0) {
            $days = '+' . $days;
        }
        $interval = $days . ' days';

        return $baseDate->modify($interval)
<<<<<<< HEAD
            ->setTime($hours, $minutes, $seconds, $microseconds);
=======
            ->setTime((int) $hours, (int) $minutes, (int) $seconds);
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * Convert a MS serialized datetime value from Excel to a unix timestamp.
     * The use of Unix timestamps, and therefore this function, is discouraged.
     * They are not Y2038-safe on a 32-bit system, and have no timezone info.
     *
     * @param float|int $excelTimestamp MS Excel serialized date/time value
     * @param null|DateTimeZone|string $timeZone The timezone to assume for the Excel timestamp,
     *                                               if you don't want to treat it as a UTC value
     *                                               Use the default (UTC) unless you absolutely need a conversion
     *
     * @return int Unix timetamp for this date/time
     */
<<<<<<< HEAD
    public static function excelToTimestamp($excelTimestamp, $timeZone = null): int
    {
        $dto = self::excelToDateTimeObject($excelTimestamp, $timeZone);
        self::roundMicroseconds($dto);

        return (int) $dto->format('U');
=======
    public static function excelToTimestamp($excelTimestamp, $timeZone = null)
    {
        return (int) self::excelToDateTimeObject($excelTimestamp, $timeZone)
            ->format('U');
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * Convert a date from PHP to an MS Excel serialized date/time value.
     *
     * @param mixed $dateValue PHP DateTime object or a string - Unix timestamp is also permitted, but discouraged;
     *    not Y2038-safe on a 32-bit system, and no timezone info
     *
     * @return false|float Excel date/time value
     *                                  or boolean FALSE on failure
     */
<<<<<<< HEAD
    public static function PHPToExcel(mixed $dateValue)
=======
    public static function PHPToExcel($dateValue)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ((is_object($dateValue)) && ($dateValue instanceof DateTimeInterface)) {
            return self::dateTimeToExcel($dateValue);
        } elseif (is_numeric($dateValue)) {
            return self::timestampToExcel($dateValue);
        } elseif (is_string($dateValue)) {
            return self::stringToExcel($dateValue);
        }

        return false;
    }

    /**
     * Convert a PHP DateTime object to an MS Excel serialized date/time value.
     *
     * @param DateTimeInterface $dateValue PHP DateTime object
     *
     * @return float MS Excel serialized date/time value
     */
<<<<<<< HEAD
    public static function dateTimeToExcel(DateTimeInterface $dateValue): float
    {
        $seconds = (float) sprintf('%d.%06d', $dateValue->format('s'), $dateValue->format('u'));

=======
    public static function dateTimeToExcel(DateTimeInterface $dateValue)
    {
>>>>>>> 50f5a6f (Initial commit from local project)
        return self::formattedPHPToExcel(
            (int) $dateValue->format('Y'),
            (int) $dateValue->format('m'),
            (int) $dateValue->format('d'),
            (int) $dateValue->format('H'),
            (int) $dateValue->format('i'),
<<<<<<< HEAD
            $seconds
=======
            (int) $dateValue->format('s')
>>>>>>> 50f5a6f (Initial commit from local project)
        );
    }

    /**
     * Convert a Unix timestamp to an MS Excel serialized date/time value.
     * The use of Unix timestamps, and therefore this function, is discouraged.
     * They are not Y2038-safe on a 32-bit system, and have no timezone info.
     *
     * @param float|int|string $unixTimestamp Unix Timestamp
     *
     * @return false|float MS Excel serialized date/time value
     */
<<<<<<< HEAD
    public static function timestampToExcel($unixTimestamp): bool|float
=======
    public static function timestampToExcel($unixTimestamp)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (!is_numeric($unixTimestamp)) {
            return false;
        }

        return self::dateTimeToExcel(new DateTime('@' . $unixTimestamp));
    }

    /**
     * formattedPHPToExcel.
     *
<<<<<<< HEAD
     * @return float Excel date/time value
     */
    public static function formattedPHPToExcel(int $year, int $month, int $day, int $hours = 0, int $minutes = 0, float|int $seconds = 0): float
=======
     * @param int $year
     * @param int $month
     * @param int $day
     * @param int $hours
     * @param int $minutes
     * @param int $seconds
     *
     * @return float Excel date/time value
     */
    public static function formattedPHPToExcel($year, $month, $day, $hours = 0, $minutes = 0, $seconds = 0)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (self::$excelCalendar == self::CALENDAR_WINDOWS_1900) {
            //
            //    Fudge factor for the erroneous fact that the year 1900 is treated as a Leap Year in MS Excel
            //    This affects every date following 28th February 1900
            //
            $excel1900isLeapYear = true;
            if (($year == 1900) && ($month <= 2)) {
                $excel1900isLeapYear = false;
            }
            $myexcelBaseDate = 2415020;
        } else {
            $myexcelBaseDate = 2416481;
            $excel1900isLeapYear = false;
        }

        //    Julian base date Adjustment
        if ($month > 2) {
            $month -= 3;
        } else {
            $month += 9;
            --$year;
        }

        //    Calculate the Julian Date, then subtract the Excel base date (JD 2415020 = 31-Dec-1899 Giving Excel Date of 0)
        $century = (int) substr((string) $year, 0, 2);
        $decade = (int) substr((string) $year, 2, 2);
        $excelDate = floor((146097 * $century) / 4) + floor((1461 * $decade) / 4) + floor((153 * $month + 2) / 5) + $day + 1721119 - $myexcelBaseDate + $excel1900isLeapYear;

        $excelTime = (($hours * 3600) + ($minutes * 60) + $seconds) / 86400;

        return (float) $excelDate + $excelTime;
    }

    /**
     * Is a given cell a date/time?
<<<<<<< HEAD
     */
    public static function isDateTime(Cell $cell, mixed $value = null, bool $dateWithoutTimeOkay = true): bool
=======
     *
     * @param mixed $value
     *
     * @return bool
     */
    public static function isDateTime(Cell $cell, $value = null, bool $dateWithoutTimeOkay = true)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $result = false;
        $worksheet = $cell->getWorksheetOrNull();
        $spreadsheet = ($worksheet === null) ? null : $worksheet->getParent();
        if ($worksheet !== null && $spreadsheet !== null) {
            $index = $spreadsheet->getActiveSheetIndex();
            $selected = $worksheet->getSelectedCells();

            try {
<<<<<<< HEAD
                $result = is_numeric($value ?? $cell->getCalculatedValue())
                    && self::isDateTimeFormat(
=======
                $result = is_numeric($value ?? $cell->getCalculatedValue()) &&
                    self::isDateTimeFormat(
>>>>>>> 50f5a6f (Initial commit from local project)
                        $worksheet->getStyle(
                            $cell->getCoordinate()
                        )->getNumberFormat(),
                        $dateWithoutTimeOkay
                    );
<<<<<<< HEAD
            } catch (Exception) {
=======
            } catch (Exception $e) {
>>>>>>> 50f5a6f (Initial commit from local project)
                // Result is already false, so no need to actually do anything here
            }
            $worksheet->setSelectedCells($selected);
            $spreadsheet->setActiveSheetIndex($index);
        }

        return $result;
    }

    /**
     * Is a given NumberFormat code a date/time format code?
<<<<<<< HEAD
     */
    public static function isDateTimeFormat(NumberFormat $excelFormatCode, bool $dateWithoutTimeOkay = true): bool
=======
     *
     * @return bool
     */
    public static function isDateTimeFormat(NumberFormat $excelFormatCode, bool $dateWithoutTimeOkay = true)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return self::isDateTimeFormatCode((string) $excelFormatCode->getFormatCode(), $dateWithoutTimeOkay);
    }

    private const POSSIBLE_DATETIME_FORMAT_CHARACTERS = 'eymdHs';
    private const POSSIBLE_TIME_FORMAT_CHARACTERS = 'Hs'; // note - no 'm' due to ambiguity

    /**
     * Is a given number format code a date/time?
<<<<<<< HEAD
     */
    public static function isDateTimeFormatCode(string $excelFormatCode, bool $dateWithoutTimeOkay = true): bool
=======
     *
     * @param string $excelFormatCode
     *
     * @return bool
     */
    public static function isDateTimeFormatCode($excelFormatCode, bool $dateWithoutTimeOkay = true)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (strtolower($excelFormatCode) === strtolower(NumberFormat::FORMAT_GENERAL)) {
            //    "General" contains an epoch letter 'e', so we trap for it explicitly here (case-insensitive check)
            return false;
        }
        if (preg_match('/[0#]E[+-]0/i', $excelFormatCode)) {
            //    Scientific format
            return false;
        }

        // Switch on formatcode
<<<<<<< HEAD
        $excelFormatCode = (string) NumberFormat::convertSystemFormats($excelFormatCode);
=======
>>>>>>> 50f5a6f (Initial commit from local project)
        if (in_array($excelFormatCode, NumberFormat::DATE_TIME_OR_DATETIME_ARRAY, true)) {
            return $dateWithoutTimeOkay || in_array($excelFormatCode, NumberFormat::TIME_OR_DATETIME_ARRAY);
        }

        //    Typically number, currency or accounting (or occasionally fraction) formats
<<<<<<< HEAD
        if ((str_starts_with($excelFormatCode, '_')) || (str_starts_with($excelFormatCode, '0 '))) {
=======
        if ((substr($excelFormatCode, 0, 1) == '_') || (substr($excelFormatCode, 0, 2) == '0 ')) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return false;
        }
        // Some "special formats" provided in German Excel versions were detected as date time value,
        // so filter them out here - "\C\H\-00000" (Switzerland) and "\D-00000" (Germany).
<<<<<<< HEAD
        if (str_contains($excelFormatCode, '-00000')) {
=======
        if (\strpos($excelFormatCode, '-00000') !== false) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return false;
        }
        $possibleFormatCharacters = $dateWithoutTimeOkay ? self::POSSIBLE_DATETIME_FORMAT_CHARACTERS : self::POSSIBLE_TIME_FORMAT_CHARACTERS;
        // Try checking for any of the date formatting characters that don't appear within square braces
        if (preg_match('/(^|\])[^\[]*[' . $possibleFormatCharacters . ']/i', $excelFormatCode)) {
            //    We might also have a format mask containing quoted strings...
            //        we don't want to test for any of our characters within the quoted blocks
<<<<<<< HEAD
            if (str_contains($excelFormatCode, '"')) {
=======
            if (strpos($excelFormatCode, '"') !== false) {
>>>>>>> 50f5a6f (Initial commit from local project)
                $segMatcher = false;
                foreach (explode('"', $excelFormatCode) as $subVal) {
                    //    Only test in alternate array entries (the non-quoted blocks)
                    $segMatcher = $segMatcher === false;
                    if (
<<<<<<< HEAD
                        $segMatcher
                        && (preg_match('/(^|\])[^\[]*[' . $possibleFormatCharacters . ']/i', $subVal))
=======
                        $segMatcher &&
                        (preg_match('/(^|\])[^\[]*[' . $possibleFormatCharacters . ']/i', $subVal))
>>>>>>> 50f5a6f (Initial commit from local project)
                    ) {
                        return true;
                    }
                }

                return false;
            }

            return true;
        }

        // No date...
        return false;
    }

    /**
     * Convert a date/time string to Excel time.
     *
     * @param string $dateValue Examples: '2009-12-31', '2009-12-31 15:59', '2009-12-31 15:59:10'
     *
     * @return false|float Excel date/time serial value
     */
<<<<<<< HEAD
    public static function stringToExcel(string $dateValue): bool|float
=======
    public static function stringToExcel($dateValue)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (strlen($dateValue) < 2) {
            return false;
        }
        if (!preg_match('/^(\d{1,4}[ \.\/\-][A-Z]{3,9}([ \.\/\-]\d{1,4})?|[A-Z]{3,9}[ \.\/\-]\d{1,4}([ \.\/\-]\d{1,4})?|\d{1,4}[ \.\/\-]\d{1,4}([ \.\/\-]\d{1,4})?)( \d{1,2}:\d{1,2}(:\d{1,2})?)?$/iu', $dateValue)) {
            return false;
        }

        $dateValueNew = DateTimeExcel\DateValue::fromString($dateValue);

        if (!is_float($dateValueNew)) {
            return false;
        }

<<<<<<< HEAD
        if (str_contains($dateValue, ':')) {
=======
        if (strpos($dateValue, ':') !== false) {
>>>>>>> 50f5a6f (Initial commit from local project)
            $timeValue = DateTimeExcel\TimeValue::fromString($dateValue);
            if (!is_float($timeValue)) {
                return false;
            }
            $dateValueNew += $timeValue;
        }

        return $dateValueNew;
    }

    /**
     * Converts a month name (either a long or a short name) to a month number.
     *
     * @param string $monthName Month name or abbreviation
     *
     * @return int|string Month number (1 - 12), or the original string argument if it isn't a valid month name
     */
<<<<<<< HEAD
    public static function monthStringToNumber(string $monthName)
=======
    public static function monthStringToNumber($monthName)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $monthIndex = 1;
        foreach (self::$monthNames as $shortMonthName => $longMonthName) {
            if (($monthName === $longMonthName) || ($monthName === $shortMonthName)) {
                return $monthIndex;
            }
            ++$monthIndex;
        }

        return $monthName;
    }

    /**
     * Strips an ordinal from a numeric value.
     *
     * @param string $day Day number with an ordinal
     *
     * @return int|string The integer value with any ordinal stripped, or the original string argument if it isn't a valid numeric
     */
<<<<<<< HEAD
    public static function dayStringToNumber(string $day)
=======
    public static function dayStringToNumber($day)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $strippedDayValue = (str_replace(self::$numberSuffixes, '', $day));
        if (is_numeric($strippedDayValue)) {
            return (int) $strippedDayValue;
        }

        return $day;
    }

    public static function dateTimeFromTimestamp(string $date, ?DateTimeZone $timeZone = null): DateTime
    {
        $dtobj = DateTime::createFromFormat('U', $date) ?: new DateTime();
        $dtobj->setTimeZone($timeZone ?? self::getDefaultOrLocalTimezone());

        return $dtobj;
    }

    public static function formattedDateTimeFromTimestamp(string $date, string $format, ?DateTimeZone $timeZone = null): string
    {
        $dtobj = self::dateTimeFromTimestamp($date, $timeZone);

        return $dtobj->format($format);
    }
<<<<<<< HEAD

    /**
     * Round the given DateTime object to seconds.
     */
    public static function roundMicroseconds(DateTime $dti): void
    {
        $microseconds = (int) $dti->format('u');
        $rounded = (int) round($microseconds, -6);
        $modify = $rounded - $microseconds;
        if ($modify !== 0) {
            $dti->modify(($modify > 0 ? '+' : '') . $modify . ' microseconds');
        }
    }
=======
>>>>>>> 50f5a6f (Initial commit from local project)
}
