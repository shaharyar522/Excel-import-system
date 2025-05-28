<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel;

<<<<<<< HEAD
use DateTime;
=======
>>>>>>> 50f5a6f (Initial commit from local project)
use DateTimeImmutable;
use PhpOffice\PhpSpreadsheet\Calculation\Information\ExcelError;

class Current
{
    /**
     * DATENOW.
     *
     * Returns the current date.
     * The NOW function is useful when you need to display the current date and time on a worksheet or
     * calculate a value based on the current date and time, and have that value updated each time you
     * open the worksheet.
     *
     * NOTE: When used in a Cell Formula, MS Excel changes the cell format so that it matches the date
     * and time format of your regional settings. PhpSpreadsheet does not change cell formatting in this way.
     *
     * Excel Function:
     *        TODAY()
     *
<<<<<<< HEAD
     * @return DateTime|float|int|string Excel date/time serial value, PHP date/time serial value or PHP date/time object,
     *                        depending on the value of the ReturnDateType flag
     */
    public static function today(): DateTime|float|int|string
=======
     * @return mixed Excel date/time serial value, PHP date/time serial value or PHP date/time object,
     *                        depending on the value of the ReturnDateType flag
     */
    public static function today()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $dti = new DateTimeImmutable();
        $dateArray = Helpers::dateParse($dti->format('c'));

        return Helpers::dateParseSucceeded($dateArray) ? Helpers::returnIn3FormatsArray($dateArray, true) : ExcelError::VALUE();
    }

    /**
     * DATETIMENOW.
     *
     * Returns the current date and time.
     * The NOW function is useful when you need to display the current date and time on a worksheet or
     * calculate a value based on the current date and time, and have that value updated each time you
     * open the worksheet.
     *
     * NOTE: When used in a Cell Formula, MS Excel changes the cell format so that it matches the date
     * and time format of your regional settings. PhpSpreadsheet does not change cell formatting in this way.
     *
     * Excel Function:
     *        NOW()
     *
<<<<<<< HEAD
     * @return DateTime|float|int|string Excel date/time serial value, PHP date/time serial value or PHP date/time object,
     *                        depending on the value of the ReturnDateType flag
     */
    public static function now(): DateTime|float|int|string
=======
     * @return mixed Excel date/time serial value, PHP date/time serial value or PHP date/time object,
     *                        depending on the value of the ReturnDateType flag
     */
    public static function now()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $dti = new DateTimeImmutable();
        $dateArray = Helpers::dateParse($dti->format('c'));

        return Helpers::dateParseSucceeded($dateArray) ? Helpers::returnIn3FormatsArray($dateArray) : ExcelError::VALUE();
    }
}
