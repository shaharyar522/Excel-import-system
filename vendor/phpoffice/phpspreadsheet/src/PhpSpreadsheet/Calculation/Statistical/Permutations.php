<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\Statistical;

use PhpOffice\PhpSpreadsheet\Calculation\ArrayEnabled;
use PhpOffice\PhpSpreadsheet\Calculation\Exception;
use PhpOffice\PhpSpreadsheet\Calculation\Information\ExcelError;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig;
use PhpOffice\PhpSpreadsheet\Shared\IntOrFloat;

class Permutations
{
    use ArrayEnabled;

    /**
     * PERMUT.
     *
     * Returns the number of permutations for a given number of objects that can be
     *        selected from number objects. A permutation is any set or subset of objects or
     *        events where internal order is significant. Permutations are different from
     *        combinations, for which the internal order is not significant. Use this function
     *        for lottery-style probability calculations.
     *
     * @param mixed $numObjs Integer number of different objects
     *                      Or can be an array of values
     * @param mixed $numInSet Integer number of objects in each permutation
     *                      Or can be an array of values
     *
     * @return array|float|int|string Number of permutations, or a string containing an error
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
<<<<<<< HEAD
    public static function PERMUT(mixed $numObjs, mixed $numInSet)
=======
    public static function PERMUT($numObjs, $numInSet)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($numObjs) || is_array($numInSet)) {
            return self::evaluateArrayArguments([self::class, __FUNCTION__], $numObjs, $numInSet);
        }

        try {
            $numObjs = StatisticalValidations::validateInt($numObjs);
            $numInSet = StatisticalValidations::validateInt($numInSet);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        if ($numObjs < $numInSet) {
            return ExcelError::NAN();
        }
<<<<<<< HEAD
        /** @var float|int|string */
=======
>>>>>>> 50f5a6f (Initial commit from local project)
        $result1 = MathTrig\Factorial::fact($numObjs);
        if (is_string($result1)) {
            return $result1;
        }
<<<<<<< HEAD
        /** @var float|int|string */
=======
>>>>>>> 50f5a6f (Initial commit from local project)
        $result2 = MathTrig\Factorial::fact($numObjs - $numInSet);
        if (is_string($result2)) {
            return $result2;
        }
<<<<<<< HEAD
        $result = round($result1 / $result2);
=======
        // phpstan thinks result1 and result2 can be arrays; they can't.
        $result = round($result1 / $result2); // @phpstan-ignore-line
>>>>>>> 50f5a6f (Initial commit from local project)

        return IntOrFloat::evaluate($result);
    }

    /**
     * PERMUTATIONA.
     *
     * Returns the number of permutations for a given number of objects (with repetitions)
     *     that can be selected from the total objects.
     *
     * @param mixed $numObjs Integer number of different objects
     *                      Or can be an array of values
     * @param mixed $numInSet Integer number of objects in each permutation
     *                      Or can be an array of values
     *
     * @return array|float|int|string Number of permutations, or a string containing an error
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
<<<<<<< HEAD
    public static function PERMUTATIONA(mixed $numObjs, mixed $numInSet)
=======
    public static function PERMUTATIONA($numObjs, $numInSet)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($numObjs) || is_array($numInSet)) {
            return self::evaluateArrayArguments([self::class, __FUNCTION__], $numObjs, $numInSet);
        }

        try {
            $numObjs = StatisticalValidations::validateInt($numObjs);
            $numInSet = StatisticalValidations::validateInt($numInSet);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        if ($numObjs < 0 || $numInSet < 0) {
            return ExcelError::NAN();
        }

        $result = $numObjs ** $numInSet;

        return IntOrFloat::evaluate($result);
    }
}
