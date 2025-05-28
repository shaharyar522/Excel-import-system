<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\Financial\CashFlow\Constant\Periodic;

use PhpOffice\PhpSpreadsheet\Calculation\Exception;
use PhpOffice\PhpSpreadsheet\Calculation\Financial\CashFlow\CashFlowValidations;
use PhpOffice\PhpSpreadsheet\Calculation\Financial\Constants as FinancialConstants;
use PhpOffice\PhpSpreadsheet\Calculation\Functions;
use PhpOffice\PhpSpreadsheet\Calculation\Information\ExcelError;

class Payments
{
    /**
     * PMT.
     *
     * Returns the constant payment (annuity) for a cash flow with a constant interest rate.
     *
     * @param mixed $interestRate Interest rate per period
     * @param mixed $numberOfPeriods Number of periods
     * @param mixed $presentValue Present Value
     * @param mixed $futureValue Future Value
     * @param mixed $type Payment type: 0 = at the end of each period, 1 = at the beginning of each period
     *
     * @return float|string Result, or a string containing an error
     */
    public static function annuity(
<<<<<<< HEAD
        mixed $interestRate,
        mixed $numberOfPeriods,
        mixed $presentValue,
        mixed $futureValue = 0,
        mixed $type = FinancialConstants::PAYMENT_END_OF_PERIOD
    ): string|float {
=======
        $interestRate,
        $numberOfPeriods,
        $presentValue,
        $futureValue = 0,
        $type = FinancialConstants::PAYMENT_END_OF_PERIOD
    ) {
>>>>>>> 50f5a6f (Initial commit from local project)
        $interestRate = Functions::flattenSingleValue($interestRate);
        $numberOfPeriods = Functions::flattenSingleValue($numberOfPeriods);
        $presentValue = Functions::flattenSingleValue($presentValue);
        $futureValue = ($futureValue === null) ? 0.0 : Functions::flattenSingleValue($futureValue);
        $type = ($type === null) ? FinancialConstants::PAYMENT_END_OF_PERIOD : Functions::flattenSingleValue($type);

        try {
            $interestRate = CashFlowValidations::validateRate($interestRate);
            $numberOfPeriods = CashFlowValidations::validateInt($numberOfPeriods);
            $presentValue = CashFlowValidations::validatePresentValue($presentValue);
            $futureValue = CashFlowValidations::validateFutureValue($futureValue);
            $type = CashFlowValidations::validatePeriodType($type);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        // Calculate
        if ($interestRate != 0.0) {
<<<<<<< HEAD
            return (-$futureValue - $presentValue * (1 + $interestRate) ** $numberOfPeriods)
                / (1 + $interestRate * $type) / (((1 + $interestRate) ** $numberOfPeriods - 1) / $interestRate);
=======
            return (-$futureValue - $presentValue * (1 + $interestRate) ** $numberOfPeriods) /
                (1 + $interestRate * $type) / (((1 + $interestRate) ** $numberOfPeriods - 1) / $interestRate);
>>>>>>> 50f5a6f (Initial commit from local project)
        }

        return (-$presentValue - $futureValue) / $numberOfPeriods;
    }

    /**
     * PPMT.
     *
     * Returns the interest payment for a given period for an investment based on periodic, constant payments
     *         and a constant interest rate.
     *
     * @param mixed $interestRate Interest rate per period
     * @param mixed $period Period for which we want to find the interest
     * @param mixed $numberOfPeriods Number of periods
     * @param mixed $presentValue Present Value
     * @param mixed $futureValue Future Value
     * @param mixed $type Payment type: 0 = at the end of each period, 1 = at the beginning of each period
     *
     * @return float|string Result, or a string containing an error
     */
    public static function interestPayment(
<<<<<<< HEAD
        mixed $interestRate,
        mixed $period,
        mixed $numberOfPeriods,
        mixed $presentValue,
        mixed $futureValue = 0,
        mixed $type = FinancialConstants::PAYMENT_END_OF_PERIOD
    ): string|float {
=======
        $interestRate,
        $period,
        $numberOfPeriods,
        $presentValue,
        $futureValue = 0,
        $type = FinancialConstants::PAYMENT_END_OF_PERIOD
    ) {
>>>>>>> 50f5a6f (Initial commit from local project)
        $interestRate = Functions::flattenSingleValue($interestRate);
        $period = Functions::flattenSingleValue($period);
        $numberOfPeriods = Functions::flattenSingleValue($numberOfPeriods);
        $presentValue = Functions::flattenSingleValue($presentValue);
        $futureValue = ($futureValue === null) ? 0.0 : Functions::flattenSingleValue($futureValue);
        $type = ($type === null) ? FinancialConstants::PAYMENT_END_OF_PERIOD : Functions::flattenSingleValue($type);

        try {
            $interestRate = CashFlowValidations::validateRate($interestRate);
            $period = CashFlowValidations::validateInt($period);
            $numberOfPeriods = CashFlowValidations::validateInt($numberOfPeriods);
            $presentValue = CashFlowValidations::validatePresentValue($presentValue);
            $futureValue = CashFlowValidations::validateFutureValue($futureValue);
            $type = CashFlowValidations::validatePeriodType($type);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        // Validate parameters
        if ($period <= 0 || $period > $numberOfPeriods) {
            return ExcelError::NAN();
        }

        // Calculate
        $interestAndPrincipal = new InterestAndPrincipal(
            $interestRate,
            $period,
            $numberOfPeriods,
            $presentValue,
            $futureValue,
            $type
        );

        return $interestAndPrincipal->principal();
    }
}
