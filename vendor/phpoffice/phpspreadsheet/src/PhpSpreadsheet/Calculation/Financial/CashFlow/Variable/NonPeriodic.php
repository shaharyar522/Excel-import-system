<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\Financial\CashFlow\Variable;

use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel;
use PhpOffice\PhpSpreadsheet\Calculation\Exception;
use PhpOffice\PhpSpreadsheet\Calculation\Functions;
use PhpOffice\PhpSpreadsheet\Calculation\Information\ExcelError;
<<<<<<< HEAD
use PhpOffice\PhpSpreadsheet\Shared\StringHelper;
=======
>>>>>>> 50f5a6f (Initial commit from local project)

class NonPeriodic
{
    const FINANCIAL_MAX_ITERATIONS = 128;

    const FINANCIAL_PRECISION = 1.0e-08;

    const DEFAULT_GUESS = 0.1;

    /**
     * XIRR.
     *
     * Returns the internal rate of return for a schedule of cash flows that is not necessarily periodic.
     *
     * Excel Function:
     *        =XIRR(values,dates,guess)
     *
<<<<<<< HEAD
     * @param array<int, float|int|numeric-string> $values     A series of cash flow payments, expecting float[]
=======
     * @param float[] $values     A series of cash flow payments
>>>>>>> 50f5a6f (Initial commit from local project)
     *                                The series of values must contain at least one positive value & one negative value
     * @param mixed[] $dates      A series of payment dates
     *                                The first payment date indicates the beginning of the schedule of payments
     *                                All other dates must be later than this date, but they may occur in any order
     * @param mixed $guess        An optional guess at the expected answer
<<<<<<< HEAD
     */
    public static function rate(mixed $values, $dates, mixed $guess = self::DEFAULT_GUESS): float|string
    {
        $rslt = self::xirrPart1($values, $dates);
        /** @var array $dates */
=======
     *
     * @return float|string
     */
    public static function rate($values, $dates, $guess = self::DEFAULT_GUESS)
    {
        $rslt = self::xirrPart1($values, $dates);
>>>>>>> 50f5a6f (Initial commit from local project)
        if ($rslt !== '') {
            return $rslt;
        }

        // create an initial range, with a root somewhere between 0 and guess
        $guess = Functions::flattenSingleValue($guess) ?? self::DEFAULT_GUESS;
        if (!is_numeric($guess)) {
            return ExcelError::VALUE();
        }
        $guess = ($guess + 0.0) ?: self::DEFAULT_GUESS;
        $x1 = 0.0;
        $x2 = $guess + 0.0;
        $f1 = self::xnpvOrdered($x1, $values, $dates, false);
        $f2 = self::xnpvOrdered($x2, $values, $dates, false);
        $found = false;
        for ($i = 0; $i < self::FINANCIAL_MAX_ITERATIONS; ++$i) {
            if (!is_numeric($f1)) {
                return $f1;
            }
            if (!is_numeric($f2)) {
                return $f2;
            }
            $f1 = (float) $f1;
            $f2 = (float) $f2;
            if (($f1 * $f2) < 0.0) {
                $found = true;

                break;
            } elseif (abs($f1) < abs($f2)) {
                $x1 += 1.6 * ($x1 - $x2);
                $f1 = self::xnpvOrdered($x1, $values, $dates, false);
            } else {
                $x2 += 1.6 * ($x2 - $x1);
                $f2 = self::xnpvOrdered($x2, $values, $dates, false);
            }
        }
        if ($found) {
            return self::xirrPart3($values, $dates, $x1, $x2);
        }

        // Newton-Raphson didn't work - try bisection
        $x1 = $guess - 0.5;
        $x2 = $guess + 0.5;
        for ($i = 0; $i < self::FINANCIAL_MAX_ITERATIONS; ++$i) {
            $f1 = self::xnpvOrdered($x1, $values, $dates, false, true);
            $f2 = self::xnpvOrdered($x2, $values, $dates, false, true);
            if (!is_numeric($f1) || !is_numeric($f2)) {
                break;
            }
            if ($f1 * $f2 <= 0) {
                $found = true;

                break;
            }
            $x1 -= 0.5;
            $x2 += 0.5;
        }
        if ($found) {
            return self::xirrBisection($values, $dates, $x1, $x2);
        }

        return ExcelError::NAN();
    }

    /**
     * XNPV.
     *
     * Returns the net present value for a schedule of cash flows that is not necessarily periodic.
     * To calculate the net present value for a series of cash flows that is periodic, use the NPV function.
     *
     * Excel Function:
     *        =XNPV(rate,values,dates)
     *
<<<<<<< HEAD
     * @param mixed $rate the discount rate to apply to the cash flows, expect array|float
     * @param array<int,float|int|numeric-string> $values A series of cash flows that corresponds to a schedule of payments in dates, expecting float[].
=======
     * @param float $rate the discount rate to apply to the cash flows
     * @param float[] $values A series of cash flows that corresponds to a schedule of payments in dates.
>>>>>>> 50f5a6f (Initial commit from local project)
     *                          The first payment is optional and corresponds to a cost or payment that occurs
     *                              at the beginning of the investment.
     *                          If the first value is a cost or payment, it must be a negative value.
     *                             All succeeding payments are discounted based on a 365-day year.
     *                          The series of values must contain at least one positive value and one negative value.
<<<<<<< HEAD
     * @param mixed $dates A schedule of payment dates that corresponds to the cash flow payments, expecting mixed[].
     *                         The first payment date indicates the beginning of the schedule of payments.
     *                         All other dates must be later than this date, but they may occur in any order.
     */
    public static function presentValue(mixed $rate, mixed $values, mixed $dates): float|string
=======
     * @param mixed[] $dates A schedule of payment dates that corresponds to the cash flow payments.
     *                         The first payment date indicates the beginning of the schedule of payments.
     *                         All other dates must be later than this date, but they may occur in any order.
     *
     * @return float|string
     */
    public static function presentValue($rate, $values, $dates)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return self::xnpvOrdered($rate, $values, $dates, true);
    }

    private static function bothNegAndPos(bool $neg, bool $pos): bool
    {
        return $neg && $pos;
    }

<<<<<<< HEAD
    /** @param array<int, float|int|numeric-string> $values */
    private static function xirrPart1(mixed &$values, mixed &$dates): string
    {
        $values = Functions::flattenArray($values); //* @phpstan-ignore-line
=======
    /**
     * @param mixed $values
     * @param mixed $dates
     */
    private static function xirrPart1(&$values, &$dates): string
    {
        $values = Functions::flattenArray($values);
>>>>>>> 50f5a6f (Initial commit from local project)
        $dates = Functions::flattenArray($dates);
        $valuesIsArray = count($values) > 1;
        $datesIsArray = count($dates) > 1;
        if (!$valuesIsArray && !$datesIsArray) {
            return ExcelError::NA();
        }
        if (count($values) != count($dates)) {
            return ExcelError::NAN();
        }

        $datesCount = count($dates);
        for ($i = 0; $i < $datesCount; ++$i) {
            try {
                $dates[$i] = DateTimeExcel\Helpers::getDateValue($dates[$i]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        return self::xirrPart2($values);
    }

<<<<<<< HEAD
    /** @param array<int, float|int|numeric-string> $values */
=======
>>>>>>> 50f5a6f (Initial commit from local project)
    private static function xirrPart2(array &$values): string
    {
        $valCount = count($values);
        $foundpos = false;
        $foundneg = false;
        for ($i = 0; $i < $valCount; ++$i) {
            $fld = $values[$i];
<<<<<<< HEAD
            if (!is_numeric($fld)) { //* @phpstan-ignore-line
=======
            if (!is_numeric($fld)) {
>>>>>>> 50f5a6f (Initial commit from local project)
                return ExcelError::VALUE();
            } elseif ($fld > 0) {
                $foundpos = true;
            } elseif ($fld < 0) {
                $foundneg = true;
            }
        }
        if (!self::bothNegAndPos($foundneg, $foundpos)) {
            return ExcelError::NAN();
        }

        return '';
    }

<<<<<<< HEAD
    private static function xirrPart3(array $values, array $dates, float $x1, float $x2): float|string
=======
    /**
     * @return float|string
     */
    private static function xirrPart3(array $values, array $dates, float $x1, float $x2)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $f = self::xnpvOrdered($x1, $values, $dates, false);
        if ($f < 0.0) {
            $rtb = $x1;
            $dx = $x2 - $x1;
        } else {
            $rtb = $x2;
            $dx = $x1 - $x2;
        }

        $rslt = ExcelError::VALUE();
        for ($i = 0; $i < self::FINANCIAL_MAX_ITERATIONS; ++$i) {
            $dx *= 0.5;
            $x_mid = $rtb + $dx;
            $f_mid = (float) self::xnpvOrdered($x_mid, $values, $dates, false);
            if ($f_mid <= 0.0) {
                $rtb = $x_mid;
            }
            if ((abs($f_mid) < self::FINANCIAL_PRECISION) || (abs($dx) < self::FINANCIAL_PRECISION)) {
                $rslt = $x_mid;

                break;
            }
        }

        return $rslt;
    }

<<<<<<< HEAD
    private static function xirrBisection(array $values, array $dates, float $x1, float $x2): string|float
=======
    /**
     * @return float|string
     */
    private static function xirrBisection(array $values, array $dates, float $x1, float $x2)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $rslt = ExcelError::NAN();
        for ($i = 0; $i < self::FINANCIAL_MAX_ITERATIONS; ++$i) {
            $rslt = ExcelError::NAN();
            $f1 = self::xnpvOrdered($x1, $values, $dates, false, true);
            $f2 = self::xnpvOrdered($x2, $values, $dates, false, true);
            if (!is_numeric($f1) || !is_numeric($f2)) {
                break;
            }
            $f1 = (float) $f1;
            $f2 = (float) $f2;
            if (abs($f1) < self::FINANCIAL_PRECISION && abs($f2) < self::FINANCIAL_PRECISION) {
                break;
            }
            if ($f1 * $f2 > 0) {
                break;
            }
            $rslt = ($x1 + $x2) / 2;
            $f3 = self::xnpvOrdered($rslt, $values, $dates, false, true);
            if (!is_float($f3)) {
                break;
            }
            if ($f3 * $f1 < 0) {
                $x2 = $rslt;
            } else {
                $x1 = $rslt;
            }
            if (abs($f3) < self::FINANCIAL_PRECISION) {
                break;
            }
        }

        return $rslt;
    }

<<<<<<< HEAD
    /** @param array<int,float|int|numeric-string> $values> */
    private static function xnpvOrdered(mixed $rate, mixed $values, mixed $dates, bool $ordered = true, bool $capAtNegative1 = false): float|string
    {
        $rate = Functions::flattenSingleValue($rate);
        if (!is_numeric($rate)) {
            return ExcelError::VALUE();
        }
=======
    /**
     * @param mixed $rate
     * @param mixed $values
     * @param mixed $dates
     *
     * @return float|string
     */
    private static function xnpvOrdered($rate, $values, $dates, bool $ordered = true, bool $capAtNegative1 = false)
    {
        $rate = Functions::flattenSingleValue($rate);
>>>>>>> 50f5a6f (Initial commit from local project)
        $values = Functions::flattenArray($values);
        $dates = Functions::flattenArray($dates);
        $valCount = count($values);

        try {
            self::validateXnpv($rate, $values, $dates);
            if ($capAtNegative1 && $rate <= -1) {
                $rate = -1.0 + 1.0E-10;
            }
            $date0 = DateTimeExcel\Helpers::getDateValue($dates[0]);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        $xnpv = 0.0;
        for ($i = 0; $i < $valCount; ++$i) {
            if (!is_numeric($values[$i])) {
                return ExcelError::VALUE();
            }

            try {
                $datei = DateTimeExcel\Helpers::getDateValue($dates[$i]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
            if ($date0 > $datei) {
                $dif = $ordered ? ExcelError::NAN() : -((int) DateTimeExcel\Difference::interval($datei, $date0, 'd'));
            } else {
                $dif = Functions::scalar(DateTimeExcel\Difference::interval($date0, $datei, 'd'));
            }
            if (!is_numeric($dif)) {
<<<<<<< HEAD
                return StringHelper::convertToString($dif);
            }
            if ($rate <= -1.0) {
                $xnpv += -abs($values[$i] + 0) / (-1 - $rate) ** ($dif / 365);
=======
                return $dif;
            }
            if ($rate <= -1.0) {
                $xnpv += -abs($values[$i]) / (-1 - $rate) ** ($dif / 365);
>>>>>>> 50f5a6f (Initial commit from local project)
            } else {
                $xnpv += $values[$i] / (1 + $rate) ** ($dif / 365);
            }
        }

        return is_finite($xnpv) ? $xnpv : ExcelError::VALUE();
    }

<<<<<<< HEAD
    private static function validateXnpv(mixed $rate, array $values, array $dates): void
=======
    /**
     * @param mixed $rate
     */
    private static function validateXnpv($rate, array $values, array $dates): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (!is_numeric($rate)) {
            throw new Exception(ExcelError::VALUE());
        }
        $valCount = count($values);
        if ($valCount != count($dates)) {
            throw new Exception(ExcelError::NAN());
        }
<<<<<<< HEAD
        if (count($values) > 1 && ((min($values) > 0) || (max($values) < 0))) {
=======
        if ($valCount > 1 && ((min($values) > 0) || (max($values) < 0))) {
>>>>>>> 50f5a6f (Initial commit from local project)
            throw new Exception(ExcelError::NAN());
        }
    }
}
