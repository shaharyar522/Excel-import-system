<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\LookupRef;

use PhpOffice\PhpSpreadsheet\Calculation\ArrayEnabled;
use PhpOffice\PhpSpreadsheet\Calculation\Information\ExcelError;
<<<<<<< HEAD
=======
use PhpOffice\PhpSpreadsheet\Calculation\LookupRef;
>>>>>>> 50f5a6f (Initial commit from local project)

class Lookup
{
    use ArrayEnabled;

    /**
     * LOOKUP
     * The LOOKUP function searches for value either from a one-row or one-column range or from an array.
     *
     * @param mixed $lookupValue The value that you want to match in lookup_array
     * @param mixed $lookupVector The range of cells being searched
     * @param null|mixed $resultVector The column from which the matching value must be returned
     *
     * @return mixed The value of the found cell
     */
<<<<<<< HEAD
    public static function lookup(mixed $lookupValue, mixed $lookupVector, $resultVector = null): mixed
=======
    public static function lookup($lookupValue, $lookupVector, $resultVector = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($lookupValue)) {
            return self::evaluateArrayArgumentsSubset([self::class, __FUNCTION__], 1, $lookupValue, $lookupVector, $resultVector);
        }

        if (!is_array($lookupVector)) {
            return ExcelError::NA();
        }
        $hasResultVector = isset($resultVector);
        $lookupRows = self::rowCount($lookupVector);
        $lookupColumns = self::columnCount($lookupVector);
        // we correctly orient our results
        if (($lookupRows === 1 && $lookupColumns > 1) || (!$hasResultVector && $lookupRows === 2 && $lookupColumns !== 2)) {
<<<<<<< HEAD
            $lookupVector = Matrix::transpose($lookupVector);
=======
            $lookupVector = LookupRef\Matrix::transpose($lookupVector);
>>>>>>> 50f5a6f (Initial commit from local project)
            $lookupRows = self::rowCount($lookupVector);
            $lookupColumns = self::columnCount($lookupVector);
        }

<<<<<<< HEAD
        $resultVector = self::verifyResultVector($resultVector ?? $lookupVector); //* @phpstan-ignore-line
=======
        $resultVector = self::verifyResultVector($resultVector ?? $lookupVector);
>>>>>>> 50f5a6f (Initial commit from local project)

        if ($lookupRows === 2 && !$hasResultVector) {
            $resultVector = array_pop($lookupVector);
            $lookupVector = array_shift($lookupVector);
        }

<<<<<<< HEAD
        /** @var array $lookupVector */
        /** @var array $resultVector */
=======
>>>>>>> 50f5a6f (Initial commit from local project)
        if ($lookupColumns !== 2) {
            $lookupVector = self::verifyLookupValues($lookupVector, $resultVector);
        }

        return VLookup::lookup($lookupValue, $lookupVector, 2);
    }

    private static function verifyLookupValues(array $lookupVector, array $resultVector): array
    {
        foreach ($lookupVector as &$value) {
            if (is_array($value)) {
                $k = array_keys($value);
                $key1 = $key2 = array_shift($k);
                ++$key2;
                $dataValue1 = $value[$key1];
            } else {
                $key1 = 0;
                $key2 = 1;
                $dataValue1 = $value;
            }

            $dataValue2 = array_shift($resultVector);
            if (is_array($dataValue2)) {
                $dataValue2 = array_shift($dataValue2);
            }
            $value = [$key1 => $dataValue1, $key2 => $dataValue2];
        }
        unset($value);

        return $lookupVector;
    }

    private static function verifyResultVector(array $resultVector): array
    {
        $resultRows = self::rowCount($resultVector);
        $resultColumns = self::columnCount($resultVector);

        // we correctly orient our results
        if ($resultRows === 1 && $resultColumns > 1) {
<<<<<<< HEAD
            $resultVector = Matrix::transpose($resultVector);
=======
            $resultVector = LookupRef\Matrix::transpose($resultVector);
>>>>>>> 50f5a6f (Initial commit from local project)
        }

        return $resultVector;
    }

    private static function rowCount(array $dataArray): int
    {
        return count($dataArray);
    }

    private static function columnCount(array $dataArray): int
    {
        $rowKeys = array_keys($dataArray);
        $row = array_shift($rowKeys);

        return count($dataArray[$row]);
    }
}
