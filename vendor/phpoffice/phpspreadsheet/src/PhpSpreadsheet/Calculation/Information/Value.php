<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\Information;

use PhpOffice\PhpSpreadsheet\Calculation\ArrayEnabled;
use PhpOffice\PhpSpreadsheet\Calculation\Calculation;
use PhpOffice\PhpSpreadsheet\Calculation\Functions;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\NamedRange;
<<<<<<< HEAD
use PhpOffice\PhpSpreadsheet\Shared\StringHelper;
=======
>>>>>>> 50f5a6f (Initial commit from local project)
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class Value
{
    use ArrayEnabled;

    /**
     * IS_BLANK.
     *
     * @param mixed $value Value to check
     *                      Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|bool If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function isBlank(mixed $value = null): array|bool
=======
     * @return array|bool
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function isBlank($value = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($value)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $value);
        }

        return $value === null;
    }

    /**
     * IS_REF.
     *
     * @param mixed $value Value to check
<<<<<<< HEAD
     */
    public static function isRef(mixed $value, ?Cell $cell = null): bool
    {
        if ($cell === null) {
            return false;
        }

        $value = StringHelper::convertToString($value);
        $cellValue = Functions::trimTrailingRange($value);
        if (preg_match('/^' . Calculation::CALCULATION_REGEXP_CELLREF . '$/ui', $cellValue) === 1) {
            [$worksheet, $cellValue] = Worksheet::extractSheetTitle($cellValue, true, true);
            if (!empty($worksheet) && $cell->getWorksheet()->getParentOrThrow()->getSheetByName($worksheet) === null) {
                return false;
            }
            [$column, $row] = Coordinate::indexesFromString($cellValue ?? '');
=======
     *
     * @return bool
     */
    public static function isRef($value, ?Cell $cell = null)
    {
        if ($cell === null || $value === $cell->getCoordinate()) {
            return false;
        }

        $cellValue = Functions::trimTrailingRange($value);
        if (preg_match('/^' . Calculation::CALCULATION_REGEXP_CELLREF . '$/ui', $cellValue) === 1) {
            [$worksheet, $cellValue] = Worksheet::extractSheetTitle($cellValue, true);
            if (!empty($worksheet) && $cell->getWorksheet()->getParentOrThrow()->getSheetByName($worksheet) === null) {
                return false;
            }
            [$column, $row] = Coordinate::indexesFromString($cellValue);
>>>>>>> 50f5a6f (Initial commit from local project)
            if ($column > 16384 || $row > 1048576) {
                return false;
            }

            return true;
        }

        $namedRange = $cell->getWorksheet()->getParentOrThrow()->getNamedRange($value);

        return $namedRange instanceof NamedRange;
    }

    /**
     * IS_EVEN.
     *
     * @param mixed $value Value to check
     *                      Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|bool|string If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function isEven(mixed $value = null): array|string|bool
=======
     * @return array|bool|string
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function isEven($value = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($value)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $value);
        }

        if ($value === null) {
            return ExcelError::NAME();
<<<<<<< HEAD
        }
        if (!is_numeric($value)) {
            return ExcelError::VALUE();
        }

        return ((int) fmod($value + 0, 2)) === 0;
=======
        } elseif ((is_bool($value)) || ((is_string($value)) && (!is_numeric($value)))) {
            return ExcelError::VALUE();
        }

        return ((int) fmod($value, 2)) === 0;
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * IS_ODD.
     *
     * @param mixed $value Value to check
     *                      Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|bool|string If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function isOdd(mixed $value = null): array|string|bool
=======
     * @return array|bool|string
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function isOdd($value = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($value)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $value);
        }

        if ($value === null) {
            return ExcelError::NAME();
<<<<<<< HEAD
        }
        if (!is_numeric($value)) {
            return ExcelError::VALUE();
        }

        return ((int) fmod($value + 0, 2)) !== 0;
=======
        } elseif ((is_bool($value)) || ((is_string($value)) && (!is_numeric($value)))) {
            return ExcelError::VALUE();
        }

        return ((int) fmod($value, 2)) !== 0;
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * IS_NUMBER.
     *
     * @param mixed $value Value to check
     *                      Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|bool If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function isNumber(mixed $value = null): array|bool
=======
     * @return array|bool
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function isNumber($value = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($value)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $value);
        }

        if (is_string($value)) {
            return false;
        }

        return is_numeric($value);
    }

    /**
     * IS_LOGICAL.
     *
     * @param mixed $value Value to check
     *                      Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|bool If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function isLogical(mixed $value = null): array|bool
=======
     * @return array|bool
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function isLogical($value = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($value)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $value);
        }

        return is_bool($value);
    }

    /**
     * IS_TEXT.
     *
     * @param mixed $value Value to check
     *                      Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|bool If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function isText(mixed $value = null): array|bool
=======
     * @return array|bool
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function isText($value = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($value)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $value);
        }

        return is_string($value) && !ErrorValue::isError($value);
    }

    /**
     * IS_NONTEXT.
     *
     * @param mixed $value Value to check
     *                      Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|bool If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function isNonText(mixed $value = null): array|bool
=======
     * @return array|bool
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function isNonText($value = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($value)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $value);
        }

        return !self::isText($value);
    }

    /**
     * ISFORMULA.
     *
     * @param mixed $cellReference The cell to check
     * @param ?Cell $cell The current cell (containing this formula)
<<<<<<< HEAD
     */
    public static function isFormula(mixed $cellReference = '', ?Cell $cell = null): array|bool|string
=======
     *
     * @return array|bool|string
     */
    public static function isFormula($cellReference = '', ?Cell $cell = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($cell === null) {
            return ExcelError::REF();
        }
<<<<<<< HEAD
        $cellReference = StringHelper::convertToString($cellReference);

        $fullCellReference = Functions::expandDefinedName($cellReference, $cell);

        if (str_contains($cellReference, '!')) {
=======

        $fullCellReference = Functions::expandDefinedName((string) $cellReference, $cell);

        if (strpos($cellReference, '!') !== false) {
>>>>>>> 50f5a6f (Initial commit from local project)
            $cellReference = Functions::trimSheetFromCellReference($cellReference);
            $cellReferences = Coordinate::extractAllCellReferencesInRange($cellReference);
            if (count($cellReferences) > 1) {
                return self::evaluateArrayArgumentsSubset([self::class, __FUNCTION__], 1, $cellReferences, $cell);
            }
        }

        $fullCellReference = Functions::trimTrailingRange($fullCellReference);

<<<<<<< HEAD
        $worksheetName = '';
        if (1 == preg_match('/^' . Calculation::CALCULATION_REGEXP_CELLREF . '$/i', $fullCellReference, $matches)) {
            $fullCellReference = $matches[6] . $matches[7];
            $worksheetName = str_replace("''", "'", trim($matches[2], "'"));
        }
=======
        preg_match('/^' . Calculation::CALCULATION_REGEXP_CELLREF . '$/i', $fullCellReference, $matches);

        $fullCellReference = $matches[6] . $matches[7];
        $worksheetName = str_replace("''", "'", trim($matches[2], "'"));
>>>>>>> 50f5a6f (Initial commit from local project)

        $worksheet = (!empty($worksheetName))
            ? $cell->getWorksheet()->getParentOrThrow()->getSheetByName($worksheetName)
            : $cell->getWorksheet();

        return ($worksheet !== null) ? $worksheet->getCell($fullCellReference)->isFormula() : ExcelError::REF();
    }

    /**
     * N.
     *
     * Returns a value converted to a number
     *
     * @param null|mixed $value The value you want converted
     *
     * @return number|string N converts values listed in the following table
     *        If value is or refers to N returns
     *        A number            That number value
     *        A date              The Excel serialized number of that date
     *        TRUE                1
     *        FALSE               0
     *        An error value      The error value
     *        Anything else       0
     */
    public static function asNumber($value = null)
    {
        while (is_array($value)) {
            $value = array_shift($value);
        }
<<<<<<< HEAD
        if (is_float($value) || is_int($value)) {
            return $value;
        }
        if (is_bool($value)) {
            return (int) $value;
        }
        if (is_string($value) && substr($value, 0, 1) === '#') {
            return $value;
=======

        switch (gettype($value)) {
            case 'double':
            case 'float':
            case 'integer':
                return $value;
            case 'boolean':
                return (int) $value;
            case 'string':
                //    Errors
                if ((strlen($value) > 0) && ($value[0] == '#')) {
                    return $value;
                }

                break;
>>>>>>> 50f5a6f (Initial commit from local project)
        }

        return 0;
    }

    /**
     * TYPE.
     *
     * Returns a number that identifies the type of a value
     *
     * @param null|mixed $value The value you want tested
     *
<<<<<<< HEAD
     * @return int N converts values listed in the following table
=======
     * @return number N converts values listed in the following table
>>>>>>> 50f5a6f (Initial commit from local project)
     *        If value is or refers to N returns
     *        A number            1
     *        Text                2
     *        Logical Value       4
     *        An error value      16
     *        Array or Matrix     64
     */
<<<<<<< HEAD
    public static function type($value = null): int
    {
        $value = Functions::flattenArrayIndexed($value);
        if (count($value) > 1) {
=======
    public static function type($value = null)
    {
        $value = Functions::flattenArrayIndexed($value);
        if (is_array($value) && (count($value) > 1)) {
>>>>>>> 50f5a6f (Initial commit from local project)
            end($value);
            $a = key($value);
            //    Range of cells is an error
            if (Functions::isCellValue($a)) {
                return 16;
            //    Test for Matrix
            } elseif (Functions::isMatrixValue($a)) {
                return 64;
            }
        } elseif (empty($value)) {
            //    Empty Cell
            return 1;
        }

        $value = Functions::flattenSingleValue($value);
        if (($value === null) || (is_float($value)) || (is_int($value))) {
            return 1;
        } elseif (is_bool($value)) {
            return 4;
        } elseif (is_array($value)) {
            return 64;
        } elseif (is_string($value)) {
            //    Errors
<<<<<<< HEAD
            if (($value !== '') && ($value[0] == '#')) {
=======
            if ((strlen($value) > 0) && ($value[0] == '#')) {
>>>>>>> 50f5a6f (Initial commit from local project)
                return 16;
            }

            return 2;
        }

        return 0;
    }
}
