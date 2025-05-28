<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\Financial;

use PhpOffice\PhpSpreadsheet\Calculation\Exception;
use PhpOffice\PhpSpreadsheet\Calculation\Functions;
use PhpOffice\PhpSpreadsheet\Calculation\Information\ExcelError;

class InterestRate
{
    /**
     * EFFECT.
     *
     * Returns the effective interest rate given the nominal rate and the number of
     *        compounding payments per year.
     *
     * Excel Function:
     *        EFFECT(nominal_rate,npery)
     *
     * @param mixed $nominalRate Nominal interest rate as a float
     * @param mixed $periodsPerYear Integer number of compounding payments per year
<<<<<<< HEAD
     */
    public static function effective(mixed $nominalRate = 0, mixed $periodsPerYear = 0): string|float
=======
     *
     * @return float|string
     */
    public static function effective($nominalRate = 0, $periodsPerYear = 0)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $nominalRate = Functions::flattenSingleValue($nominalRate);
        $periodsPerYear = Functions::flattenSingleValue($periodsPerYear);

        try {
            $nominalRate = FinancialValidations::validateFloat($nominalRate);
            $periodsPerYear = FinancialValidations::validateInt($periodsPerYear);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        if ($nominalRate <= 0 || $periodsPerYear < 1) {
            return ExcelError::NAN();
        }

        return ((1 + $nominalRate / $periodsPerYear) ** $periodsPerYear) - 1;
    }

    /**
     * NOMINAL.
     *
     * Returns the nominal interest rate given the effective rate and the number of compounding payments per year.
     *
     * @param mixed $effectiveRate Effective interest rate as a float
     * @param mixed $periodsPerYear Integer number of compounding payments per year
     *
     * @return float|string Result, or a string containing an error
     */
<<<<<<< HEAD
    public static function nominal(mixed $effectiveRate = 0, mixed $periodsPerYear = 0): string|float
=======
    public static function nominal($effectiveRate = 0, $periodsPerYear = 0)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $effectiveRate = Functions::flattenSingleValue($effectiveRate);
        $periodsPerYear = Functions::flattenSingleValue($periodsPerYear);

        try {
            $effectiveRate = FinancialValidations::validateFloat($effectiveRate);
            $periodsPerYear = FinancialValidations::validateInt($periodsPerYear);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        if ($effectiveRate <= 0 || $periodsPerYear < 1) {
            return ExcelError::NAN();
        }

        // Calculate
        return $periodsPerYear * (($effectiveRate + 1) ** (1 / $periodsPerYear) - 1);
    }
}
