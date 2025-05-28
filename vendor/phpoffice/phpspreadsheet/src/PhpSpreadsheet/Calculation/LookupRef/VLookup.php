<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\LookupRef;

use PhpOffice\PhpSpreadsheet\Calculation\ArrayEnabled;
use PhpOffice\PhpSpreadsheet\Calculation\Exception;
use PhpOffice\PhpSpreadsheet\Calculation\Information\ExcelError;
use PhpOffice\PhpSpreadsheet\Shared\StringHelper;

class VLookup extends LookupBase
{
    use ArrayEnabled;

    /**
     * VLOOKUP
     * The VLOOKUP function searches for value in the left-most column of lookup_array and returns the value
     *     in the same row based on the index_number.
     *
     * @param mixed $lookupValue The value that you want to match in lookup_array
<<<<<<< HEAD
     * @param array $lookupArray The range of cells being searched
     * @param array|float|int|string $indexNumber The column number in table_array from which the matching value must be returned.
=======
     * @param mixed $lookupArray The range of cells being searched
     * @param mixed $indexNumber The column number in table_array from which the matching value must be returned.
>>>>>>> 50f5a6f (Initial commit from local project)
     *                                The first column is 1.
     * @param mixed $notExactMatch determines if you are looking for an exact match based on lookup_value
     *
     * @return mixed The value of the found cell
     */
<<<<<<< HEAD
    public static function lookup(mixed $lookupValue, $lookupArray, mixed $indexNumber, mixed $notExactMatch = true): mixed
=======
    public static function lookup($lookupValue, $lookupArray, $indexNumber, $notExactMatch = true)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($lookupValue) || is_array($indexNumber)) {
            return self::evaluateArrayArgumentsIgnore([self::class, __FUNCTION__], 1, $lookupValue, $lookupArray, $indexNumber, $notExactMatch);
        }

        $notExactMatch = (bool) ($notExactMatch ?? true);

        try {
            self::validateLookupArray($lookupArray);
            $indexNumber = self::validateIndexLookup($lookupArray, $indexNumber);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        $f = array_keys($lookupArray);
        $firstRow = array_pop($f);
        if ((!is_array($lookupArray[$firstRow])) || ($indexNumber > count($lookupArray[$firstRow]))) {
            return ExcelError::REF();
        }
        $columnKeys = array_keys($lookupArray[$firstRow]);
        $returnColumn = $columnKeys[--$indexNumber];
        $firstColumn = array_shift($columnKeys) ?? 1;

        if (!$notExactMatch) {
<<<<<<< HEAD
            /** @var callable $callable */
=======
            /** @var callable */
>>>>>>> 50f5a6f (Initial commit from local project)
            $callable = [self::class, 'vlookupSort'];
            uasort($lookupArray, $callable);
        }

        $rowNumber = self::vLookupSearch($lookupValue, $lookupArray, $firstColumn, $notExactMatch);

        if ($rowNumber !== null) {
            // return the appropriate value
            return $lookupArray[$rowNumber][$returnColumn];
        }

        return ExcelError::NA();
    }

    private static function vlookupSort(array $a, array $b): int
    {
        reset($a);
        $firstColumn = key($a);
        $aLower = StringHelper::strToLower((string) $a[$firstColumn]);
        $bLower = StringHelper::strToLower((string) $b[$firstColumn]);

        if ($aLower == $bLower) {
            return 0;
        }

        return ($aLower < $bLower) ? -1 : 1;
    }

    /**
     * @param mixed $lookupValue The value that you want to match in lookup_array
     * @param  int|string $column
     */
<<<<<<< HEAD
    private static function vLookupSearch(mixed $lookupValue, array $lookupArray, $column, bool $notExactMatch): ?int
    {
        $lookupLower = StringHelper::strToLower(StringHelper::convertToString($lookupValue));

        $rowNumber = null;
        foreach ($lookupArray as $rowKey => $rowData) {
            $bothNumeric = self::numeric($lookupValue) && self::numeric($rowData[$column]);
            $bothNotNumeric = !self::numeric($lookupValue) && !self::numeric($rowData[$column]);
=======
    private static function vLookupSearch($lookupValue, array $lookupArray, $column, bool $notExactMatch): ?int
    {
        $lookupLower = StringHelper::strToLower((string) $lookupValue);

        $rowNumber = null;
        foreach ($lookupArray as $rowKey => $rowData) {
            $bothNumeric = is_numeric($lookupValue) && is_numeric($rowData[$column]);
            $bothNotNumeric = !is_numeric($lookupValue) && !is_numeric($rowData[$column]);
>>>>>>> 50f5a6f (Initial commit from local project)
            $cellDataLower = StringHelper::strToLower((string) $rowData[$column]);

            // break if we have passed possible keys
            if (
<<<<<<< HEAD
                $notExactMatch
                && (($bothNumeric && ($rowData[$column] > $lookupValue))
                || ($bothNotNumeric && ($cellDataLower > $lookupLower)))
=======
                $notExactMatch &&
                (($bothNumeric && ($rowData[$column] > $lookupValue)) ||
                ($bothNotNumeric && ($cellDataLower > $lookupLower)))
>>>>>>> 50f5a6f (Initial commit from local project)
            ) {
                break;
            }

            $rowNumber = self::checkMatch(
                $bothNumeric,
                $bothNotNumeric,
                $notExactMatch,
                $rowKey,
                $cellDataLower,
                $lookupLower,
                $rowNumber
            );
        }

        return $rowNumber;
    }
<<<<<<< HEAD

    private static function numeric(mixed $value): bool
    {
        return is_int($value) || is_float($value);
    }
=======
>>>>>>> 50f5a6f (Initial commit from local project)
}
