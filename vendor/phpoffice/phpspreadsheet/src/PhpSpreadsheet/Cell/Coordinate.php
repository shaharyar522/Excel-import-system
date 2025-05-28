<?php

namespace PhpOffice\PhpSpreadsheet\Cell;

<<<<<<< HEAD
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Worksheet\Validations;
=======
use PhpOffice\PhpSpreadsheet\Calculation\Functions;
use PhpOffice\PhpSpreadsheet\Exception;
>>>>>>> 50f5a6f (Initial commit from local project)
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

/**
 * Helper class to manipulate cell coordinates.
 *
 * Columns indexes and rows are always based on 1, **not** on 0. This match the behavior
 * that Excel users are used to, and also match the Excel functions `COLUMN()` and `ROW()`.
 */
abstract class Coordinate
{
    public const A1_COORDINATE_REGEX = '/^(?<col>\$?[A-Z]{1,3})(?<row>\$?\d{1,7})$/i';
<<<<<<< HEAD
    public const FULL_REFERENCE_REGEX = '/^(?:(?<worksheet>[^!]*)!)?(?<localReference>(?<firstCoordinate>[$]?[A-Z]{1,3}[$]?\d{1,7})(?:\:(?<secondCoordinate>[$]?[A-Z]{1,3}[$]?\d{1,7}))?)$/i';
=======
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Default range variable constant.
     *
     * @var string
     */
    const DEFAULT_RANGE = 'A1:A1';

    /**
     * Convert string coordinate to [0 => int column index, 1 => int row index].
     *
     * @param string $cellAddress eg: 'A1'
     *
     * @return array{0: string, 1: string} Array containing column and row (indexes 0 and 1)
     */
<<<<<<< HEAD
    public static function coordinateFromString(string $cellAddress): array
=======
    public static function coordinateFromString($cellAddress): array
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (preg_match(self::A1_COORDINATE_REGEX, $cellAddress, $matches)) {
            return [$matches['col'], $matches['row']];
        } elseif (self::coordinateIsRange($cellAddress)) {
            throw new Exception('Cell coordinate string can not be a range of cells');
        } elseif ($cellAddress == '') {
            throw new Exception('Cell coordinate can not be zero-length string');
        }

        throw new Exception('Invalid cell coordinate ' . $cellAddress);
    }

    /**
     * Convert string coordinate to [0 => int column index, 1 => int row index, 2 => string column string].
     *
     * @param string $coordinates eg: 'A1', '$B$12'
     *
     * @return array{0: int, 1: int, 2: string} Array containing column and row index, and column string
     */
    public static function indexesFromString(string $coordinates): array
    {
        [$column, $row] = self::coordinateFromString($coordinates);
        $column = ltrim($column, '$');

        return [
            self::columnIndexFromString($column),
            (int) ltrim($row, '$'),
            $column,
        ];
    }

    /**
     * Checks if a Cell Address represents a range of cells.
     *
     * @param string $cellAddress eg: 'A1' or 'A1:A2' or 'A1:A2,C1:C2'
     *
     * @return bool Whether the coordinate represents a range of cells
     */
<<<<<<< HEAD
    public static function coordinateIsRange(string $cellAddress): bool
    {
        return str_contains($cellAddress, ':') || str_contains($cellAddress, ',');
=======
    public static function coordinateIsRange($cellAddress)
    {
        return (strpos($cellAddress, ':') !== false) || (strpos($cellAddress, ',') !== false);
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * Make string row, column or cell coordinate absolute.
     *
<<<<<<< HEAD
     * @param int|string $cellAddress e.g. 'A' or '1' or 'A1'
=======
     * @param string $cellAddress e.g. 'A' or '1' or 'A1'
>>>>>>> 50f5a6f (Initial commit from local project)
     *                    Note that this value can be a row or column reference as well as a cell reference
     *
     * @return string Absolute coordinate        e.g. '$A' or '$1' or '$A$1'
     */
<<<<<<< HEAD
    public static function absoluteReference(int|string $cellAddress): string
    {
        $cellAddress = (string) $cellAddress;
=======
    public static function absoluteReference($cellAddress)
    {
>>>>>>> 50f5a6f (Initial commit from local project)
        if (self::coordinateIsRange($cellAddress)) {
            throw new Exception('Cell coordinate string can not be a range of cells');
        }

        // Split out any worksheet name from the reference
        [$worksheet, $cellAddress] = Worksheet::extractSheetTitle($cellAddress, true);
        if ($worksheet > '') {
            $worksheet .= '!';
        }

        // Create absolute coordinate
        $cellAddress = "$cellAddress";
        if (ctype_digit($cellAddress)) {
            return $worksheet . '$' . $cellAddress;
        } elseif (ctype_alpha($cellAddress)) {
            return $worksheet . '$' . strtoupper($cellAddress);
        }

        return $worksheet . self::absoluteCoordinate($cellAddress);
    }

    /**
     * Make string coordinate absolute.
     *
     * @param string $cellAddress e.g. 'A1'
     *
     * @return string Absolute coordinate        e.g. '$A$1'
     */
<<<<<<< HEAD
    public static function absoluteCoordinate(string $cellAddress): string
=======
    public static function absoluteCoordinate($cellAddress)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (self::coordinateIsRange($cellAddress)) {
            throw new Exception('Cell coordinate string can not be a range of cells');
        }

        // Split out any worksheet name from the coordinate
        [$worksheet, $cellAddress] = Worksheet::extractSheetTitle($cellAddress, true);
        if ($worksheet > '') {
            $worksheet .= '!';
        }

        // Create absolute coordinate
<<<<<<< HEAD
        [$column, $row] = self::coordinateFromString($cellAddress ?? 'A1');
=======
        [$column, $row] = self::coordinateFromString($cellAddress);
>>>>>>> 50f5a6f (Initial commit from local project)
        $column = ltrim($column, '$');
        $row = ltrim($row, '$');

        return $worksheet . '$' . $column . '$' . $row;
    }

    /**
     * Split range into coordinate strings.
     *
     * @param string $range e.g. 'B4:D9' or 'B4:D9,H2:O11' or 'B4'
     *
     * @return array Array containing one or more arrays containing one or two coordinate strings
     *                                e.g. ['B4','D9'] or [['B4','D9'], ['H2','O11']]
     *                                        or ['B4']
     */
<<<<<<< HEAD
    public static function splitRange(string $range): array
=======
    public static function splitRange($range)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // Ensure $pRange is a valid range
        if (empty($range)) {
            $range = self::DEFAULT_RANGE;
        }

        $exploded = explode(',', $range);
<<<<<<< HEAD
        $outArray = [];
        foreach ($exploded as $value) {
            $outArray[] = explode(':', $value);
        }

        return $outArray;
=======
        $counter = count($exploded);
        for ($i = 0; $i < $counter; ++$i) {
            // @phpstan-ignore-next-line
            $exploded[$i] = explode(':', $exploded[$i]);
        }

        return $exploded;
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * Build range from coordinate strings.
     *
     * @param array $range Array containing one or more arrays containing one or two coordinate strings
     *
     * @return string String representation of $pRange
     */
<<<<<<< HEAD
    public static function buildRange(array $range): string
=======
    public static function buildRange(array $range)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // Verify range
        if (empty($range) || !is_array($range[0])) {
            throw new Exception('Range does not contain any information');
        }

        // Build range
        $counter = count($range);
        for ($i = 0; $i < $counter; ++$i) {
            $range[$i] = implode(':', $range[$i]);
        }

        return implode(',', $range);
    }

    /**
     * Calculate range boundaries.
     *
     * @param string $range Cell range, Single Cell, Row/Column Range (e.g. A1:A1, B2, B:C, 2:3)
     *
     * @return array Range coordinates [Start Cell, End Cell]
     *                    where Start Cell and End Cell are arrays (Column Number, Row Number)
     */
    public static function rangeBoundaries(string $range): array
    {
        // Ensure $pRange is a valid range
        if (empty($range)) {
            $range = self::DEFAULT_RANGE;
        }

        // Uppercase coordinate
        $range = strtoupper($range);

        // Extract range
<<<<<<< HEAD
        if (!str_contains($range, ':')) {
=======
        if (strpos($range, ':') === false) {
>>>>>>> 50f5a6f (Initial commit from local project)
            $rangeA = $rangeB = $range;
        } else {
            [$rangeA, $rangeB] = explode(':', $range);
        }

        if (is_numeric($rangeA) && is_numeric($rangeB)) {
            $rangeA = 'A' . $rangeA;
            $rangeB = AddressRange::MAX_COLUMN . $rangeB;
        }

        if (ctype_alpha($rangeA) && ctype_alpha($rangeB)) {
            $rangeA = $rangeA . '1';
            $rangeB = $rangeB . AddressRange::MAX_ROW;
        }

        // Calculate range outer borders
        $rangeStart = self::coordinateFromString($rangeA);
        $rangeEnd = self::coordinateFromString($rangeB);

        // Translate column into index
        $rangeStart[0] = self::columnIndexFromString($rangeStart[0]);
        $rangeEnd[0] = self::columnIndexFromString($rangeEnd[0]);

        return [$rangeStart, $rangeEnd];
    }

    /**
     * Calculate range dimension.
     *
     * @param string $range Cell range, Single Cell, Row/Column Range (e.g. A1:A1, B2, B:C, 2:3)
     *
     * @return array Range dimension (width, height)
     */
<<<<<<< HEAD
    public static function rangeDimension(string $range): array
=======
    public static function rangeDimension($range)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // Calculate range outer borders
        [$rangeStart, $rangeEnd] = self::rangeBoundaries($range);

        return [($rangeEnd[0] - $rangeStart[0] + 1), ($rangeEnd[1] - $rangeStart[1] + 1)];
    }

    /**
     * Calculate range boundaries.
     *
     * @param string $range Cell range, Single Cell, Row/Column Range (e.g. A1:A1, B2, B:C, 2:3)
     *
     * @return array Range coordinates [Start Cell, End Cell]
     *                    where Start Cell and End Cell are arrays [Column ID, Row Number]
     */
<<<<<<< HEAD
    public static function getRangeBoundaries(string $range): array
=======
    public static function getRangeBoundaries($range)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        [$rangeA, $rangeB] = self::rangeBoundaries($range);

        return [
            [self::stringFromColumnIndex($rangeA[0]), $rangeA[1]],
            [self::stringFromColumnIndex($rangeB[0]), $rangeB[1]],
        ];
    }

    /**
<<<<<<< HEAD
     * Check if cell or range reference is valid and return an array with type of reference (cell or range), worksheet (if it was given)
     * and the coordinate or the first coordinate and second coordinate if it is a range.
     *
     * @param string $reference Coordinate or Range (e.g. A1:A1, B2, B:C, 2:3)
     *
     * @return array reference data
     */
    private static function validateReferenceAndGetData($reference): array
    {
        $data = [];
        if (1 !== preg_match(self::FULL_REFERENCE_REGEX, $reference, $matches)) {
            return ['type' => 'invalid'];
        }

        if (isset($matches['secondCoordinate'])) {
            $data['type'] = 'range';
            $data['firstCoordinate'] = str_replace('$', '', $matches['firstCoordinate']);
            $data['secondCoordinate'] = str_replace('$', '', $matches['secondCoordinate']);
        } else {
            $data['type'] = 'coordinate';
            $data['coordinate'] = str_replace('$', '', $matches['firstCoordinate']);
        }

        $worksheet = $matches['worksheet'];
        if ($worksheet !== '') {
            if (substr($worksheet, 0, 1) === "'" && substr($worksheet, -1, 1) === "'") {
                $worksheet = substr($worksheet, 1, -1);
            }
            $data['worksheet'] = strtolower($worksheet);
        }
        $data['localReference'] = str_replace('$', '', $matches['localReference']);

        return $data;
    }

    /**
     * Check if coordinate is inside a range.
     *
     * @param string $range Cell range, Single Cell, Row/Column Range (e.g. A1:A1, B2, B:C, 2:3)
     * @param string $coordinate Cell coordinate (e.g. A1)
     *
     * @return bool true if coordinate is inside range
     */
    public static function coordinateIsInsideRange(string $range, string $coordinate): bool
    {
        $range = Validations::convertWholeRowColumn($range);
        $rangeData = self::validateReferenceAndGetData($range);
        if ($rangeData['type'] === 'invalid') {
            throw new Exception('First argument needs to be a range');
        }

        $coordinateData = self::validateReferenceAndGetData($coordinate);
        if ($coordinateData['type'] === 'invalid') {
            throw new Exception('Second argument needs to be a single coordinate');
        }

        if (isset($coordinateData['worksheet']) && !isset($rangeData['worksheet'])) {
            return false;
        }
        if (!isset($coordinateData['worksheet']) && isset($rangeData['worksheet'])) {
            return false;
        }

        if (isset($coordinateData['worksheet'], $rangeData['worksheet'])) {
            if ($coordinateData['worksheet'] !== $rangeData['worksheet']) {
                return false;
            }
        }

        $boundaries = self::rangeBoundaries($rangeData['localReference']);
        $coordinates = self::indexesFromString($coordinateData['localReference']);

        $columnIsInside = $boundaries[0][0] <= $coordinates[0] && $coordinates[0] <= $boundaries[1][0];
        if (!$columnIsInside) {
            return false;
        }
        $rowIsInside = $boundaries[0][1] <= $coordinates[1] && $coordinates[1] <= $boundaries[1][1];
        if (!$rowIsInside) {
            return false;
        }

        return true;
    }

    /**
=======
>>>>>>> 50f5a6f (Initial commit from local project)
     * Column index from string.
     *
     * @param ?string $columnAddress eg 'A'
     *
     * @return int Column index (A = 1)
     */
<<<<<<< HEAD
    public static function columnIndexFromString(?string $columnAddress): int
=======
    public static function columnIndexFromString($columnAddress)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        //    Using a lookup cache adds a slight memory overhead, but boosts speed
        //    caching using a static within the method is faster than a class static,
        //        though it's additional memory overhead
        static $indexCache = [];
        $columnAddress = $columnAddress ?? '';

        if (isset($indexCache[$columnAddress])) {
            return $indexCache[$columnAddress];
        }
        //    It's surprising how costly the strtoupper() and ord() calls actually are, so we use a lookup array
        //        rather than use ord() and make it case insensitive to get rid of the strtoupper() as well.
        //        Because it's a static, there's no significant memory overhead either.
        static $columnLookup = [
            'A' => 1, 'B' => 2, 'C' => 3, 'D' => 4, 'E' => 5, 'F' => 6, 'G' => 7, 'H' => 8, 'I' => 9, 'J' => 10,
            'K' => 11, 'L' => 12, 'M' => 13, 'N' => 14, 'O' => 15, 'P' => 16, 'Q' => 17, 'R' => 18, 'S' => 19,
            'T' => 20, 'U' => 21, 'V' => 22, 'W' => 23, 'X' => 24, 'Y' => 25, 'Z' => 26,
            'a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5, 'f' => 6, 'g' => 7, 'h' => 8, 'i' => 9, 'j' => 10,
            'k' => 11, 'l' => 12, 'm' => 13, 'n' => 14, 'o' => 15, 'p' => 16, 'q' => 17, 'r' => 18, 's' => 19,
            't' => 20, 'u' => 21, 'v' => 22, 'w' => 23, 'x' => 24, 'y' => 25, 'z' => 26,
        ];

        //    We also use the language construct isset() rather than the more costly strlen() function to match the
        //       length of $columnAddress for improved performance
        if (isset($columnAddress[0])) {
            if (!isset($columnAddress[1])) {
                $indexCache[$columnAddress] = $columnLookup[$columnAddress];

                return $indexCache[$columnAddress];
            } elseif (!isset($columnAddress[2])) {
                $indexCache[$columnAddress] = $columnLookup[$columnAddress[0]] * 26
                    + $columnLookup[$columnAddress[1]];

                return $indexCache[$columnAddress];
            } elseif (!isset($columnAddress[3])) {
                $indexCache[$columnAddress] = $columnLookup[$columnAddress[0]] * 676
                    + $columnLookup[$columnAddress[1]] * 26
                    + $columnLookup[$columnAddress[2]];

                return $indexCache[$columnAddress];
            }
        }

        throw new Exception(
            'Column string index can not be ' . ((isset($columnAddress[0])) ? 'longer than 3 characters' : 'empty')
        );
    }

    /**
     * String from column index.
     *
<<<<<<< HEAD
     * @param int|numeric-string $columnIndex Column index (A = 1)
     */
    public static function stringFromColumnIndex(int|string $columnIndex): string
=======
     * @param int $columnIndex Column index (A = 1)
     *
     * @return string
     */
    public static function stringFromColumnIndex($columnIndex)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        static $indexCache = [];
        static $lookupCache = ' ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        if (!isset($indexCache[$columnIndex])) {
            $indexValue = $columnIndex;
            $base26 = '';
            do {
                $characterValue = ($indexValue % 26) ?: 26;
                $indexValue = ($indexValue - $characterValue) / 26;
                $base26 = $lookupCache[$characterValue] . $base26;
            } while ($indexValue > 0);
            $indexCache[$columnIndex] = $base26;
        }

        return $indexCache[$columnIndex];
    }

    /**
     * Extract all cell references in range, which may be comprised of multiple cell ranges.
     *
     * @param string $cellRange Range: e.g. 'A1' or 'A1:C10' or 'A1:E10,A20:E25' or 'A1:E5 C3:G7' or 'A1:C1,A3:C3 B1:C3'
     *
     * @return array Array containing single cell references
     */
<<<<<<< HEAD
    public static function extractAllCellReferencesInRange(string $cellRange): array
=======
    public static function extractAllCellReferencesInRange($cellRange): array
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (substr_count($cellRange, '!') > 1) {
            throw new Exception('3-D Range References are not supported');
        }

        [$worksheet, $cellRange] = Worksheet::extractSheetTitle($cellRange, true);
        $quoted = '';
<<<<<<< HEAD
        if ($worksheet) {
            $quoted = Worksheet::nameRequiresQuotes($worksheet) ? "'" : '';
            if (str_starts_with($worksheet, "'") && str_ends_with($worksheet, "'")) {
=======
        if ($worksheet > '') {
            $quoted = Worksheet::nameRequiresQuotes($worksheet) ? "'" : '';
            if (substr($worksheet, 0, 1) === "'" && substr($worksheet, -1, 1) === "'") {
>>>>>>> 50f5a6f (Initial commit from local project)
                $worksheet = substr($worksheet, 1, -1);
            }
            $worksheet = str_replace("'", "''", $worksheet);
        }
<<<<<<< HEAD
        [$ranges, $operators] = self::getCellBlocksFromRangeString($cellRange ?? 'A1');
=======
        [$ranges, $operators] = self::getCellBlocksFromRangeString($cellRange);
>>>>>>> 50f5a6f (Initial commit from local project)

        $cells = [];
        foreach ($ranges as $range) {
            $cells[] = self::getReferencesForCellBlock($range);
        }

        $cells = self::processRangeSetOperators($operators, $cells);

        if (empty($cells)) {
            return [];
        }

        $cellList = array_merge(...$cells);

        return array_map(
<<<<<<< HEAD
            fn ($cellAddress) => ($worksheet !== '') ? "{$quoted}{$worksheet}{$quoted}!{$cellAddress}" : $cellAddress,
=======
            function ($cellAddress) use ($worksheet, $quoted) {
                return ($worksheet !== '') ? "{$quoted}{$worksheet}{$quoted}!{$cellAddress}" : $cellAddress;
            },
>>>>>>> 50f5a6f (Initial commit from local project)
            self::sortCellReferenceArray($cellList)
        );
    }

    private static function processRangeSetOperators(array $operators, array $cells): array
    {
        $operatorCount = count($operators);
        for ($offset = 0; $offset < $operatorCount; ++$offset) {
            $operator = $operators[$offset];
            if ($operator !== ' ') {
                continue;
            }

            $cells[$offset] = array_intersect($cells[$offset], $cells[$offset + 1]);
            unset($operators[$offset], $cells[$offset + 1]);
            $operators = array_values($operators);
            $cells = array_values($cells);
            --$offset;
            --$operatorCount;
        }

        return $cells;
    }

    private static function sortCellReferenceArray(array $cellList): array
    {
        //    Sort the result by column and row
        $sortKeys = [];
        foreach ($cellList as $coordinate) {
            $column = '';
            $row = 0;
            sscanf($coordinate, '%[A-Z]%d', $column, $row);
            $key = (--$row * 16384) + self::columnIndexFromString((string) $column);
            $sortKeys[$key] = $coordinate;
        }
        ksort($sortKeys);

        return array_values($sortKeys);
    }

    /**
<<<<<<< HEAD
     * Get all cell references applying union and intersection.
     *
     * @param string $cellBlock A cell range e.g. A1:B5,D1:E5 B2:C4
     *
     * @return string A string without intersection operator.
     *   If there was no intersection to begin with, return original argument.
     *   Otherwise, return cells and/or cell ranges in that range separated by comma.
     */
    public static function resolveUnionAndIntersection(string $cellBlock, string $implodeCharacter = ','): string
    {
        $cellBlock = preg_replace('/  +/', ' ', trim($cellBlock)) ?? $cellBlock;
        $cellBlock = preg_replace('/ ,/', ',', $cellBlock) ?? $cellBlock;
        $cellBlock = preg_replace('/, /', ',', $cellBlock) ?? $cellBlock;
        $array1 = [];
        $blocks = explode(',', $cellBlock);
        foreach ($blocks as $block) {
            $block0 = explode(' ', $block);
            if (count($block0) === 1) {
                $array1 = array_merge($array1, $block0);
            } else {
                $blockIdx = -1;
                $array2 = [];
                foreach ($block0 as $block00) {
                    ++$blockIdx;
                    if ($blockIdx === 0) {
                        $array2 = self::getReferencesForCellBlock($block00);
                    } else {
                        $array2 = array_intersect($array2, self::getReferencesForCellBlock($block00));
                    }
                }
                $array1 = array_merge($array1, $array2);
            }
        }

        return implode($implodeCharacter, $array1);
    }

    /**
=======
>>>>>>> 50f5a6f (Initial commit from local project)
     * Get all cell references for an individual cell block.
     *
     * @param string $cellBlock A cell range e.g. A4:B5
     *
     * @return array All individual cells in that range
     */
<<<<<<< HEAD
    private static function getReferencesForCellBlock(string $cellBlock): array
=======
    private static function getReferencesForCellBlock($cellBlock)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $returnValue = [];

        // Single cell?
        if (!self::coordinateIsRange($cellBlock)) {
            return (array) $cellBlock;
        }

        // Range...
        $ranges = self::splitRange($cellBlock);
        foreach ($ranges as $range) {
            // Single cell?
            if (!isset($range[1])) {
                $returnValue[] = $range[0];

                continue;
            }

            // Range...
            [$rangeStart, $rangeEnd] = $range;
            [$startColumn, $startRow] = self::coordinateFromString($rangeStart);
            [$endColumn, $endRow] = self::coordinateFromString($rangeEnd);
            $startColumnIndex = self::columnIndexFromString($startColumn);
            $endColumnIndex = self::columnIndexFromString($endColumn);
            ++$endColumnIndex;

            // Current data
            $currentColumnIndex = $startColumnIndex;
            $currentRow = $startRow;

            self::validateRange($cellBlock, $startColumnIndex, $endColumnIndex, (int) $currentRow, (int) $endRow);

            // Loop cells
            while ($currentColumnIndex < $endColumnIndex) {
                while ($currentRow <= $endRow) {
                    $returnValue[] = self::stringFromColumnIndex($currentColumnIndex) . $currentRow;
                    ++$currentRow;
                }
                ++$currentColumnIndex;
                $currentRow = $startRow;
            }
        }

        return $returnValue;
    }

    /**
     * Convert an associative array of single cell coordinates to values to an associative array
     * of cell ranges to values.  Only adjacent cell coordinates with the same
     * value will be merged.  If the value is an object, it must implement the method getHashCode().
     *
     * For example, this function converts:
     *
     *    [ 'A1' => 'x', 'A2' => 'x', 'A3' => 'x', 'A4' => 'y' ]
     *
     * to:
     *
     *    [ 'A1:A3' => 'x', 'A4' => 'y' ]
     *
     * @param array $coordinateCollection associative array mapping coordinates to values
     *
     * @return array associative array mapping coordinate ranges to valuea
     */
<<<<<<< HEAD
    public static function mergeRangesInCollection(array $coordinateCollection): array
=======
    public static function mergeRangesInCollection(array $coordinateCollection)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $hashedValues = [];
        $mergedCoordCollection = [];

        foreach ($coordinateCollection as $coord => $value) {
            if (self::coordinateIsRange($coord)) {
                $mergedCoordCollection[$coord] = $value;

                continue;
            }

            [$column, $row] = self::coordinateFromString($coord);
            $row = (int) (ltrim($row, '$'));
            $hashCode = $column . '-' . ((is_object($value) && method_exists($value, 'getHashCode')) ? $value->getHashCode() : $value);

            if (!isset($hashedValues[$hashCode])) {
                $hashedValues[$hashCode] = (object) [
                    'value' => $value,
                    'col' => $column,
                    'rows' => [$row],
                ];
            } else {
                $hashedValues[$hashCode]->rows[] = $row;
            }
        }

        ksort($hashedValues);

        foreach ($hashedValues as $hashedValue) {
            sort($hashedValue->rows);
            $rowStart = null;
            $rowEnd = null;
            $ranges = [];

            foreach ($hashedValue->rows as $row) {
                if ($rowStart === null) {
                    $rowStart = $row;
                    $rowEnd = $row;
                } elseif ($rowEnd === $row - 1) {
                    $rowEnd = $row;
                } else {
                    if ($rowStart == $rowEnd) {
                        $ranges[] = $hashedValue->col . $rowStart;
                    } else {
                        $ranges[] = $hashedValue->col . $rowStart . ':' . $hashedValue->col . $rowEnd;
                    }

                    $rowStart = $row;
                    $rowEnd = $row;
                }
            }

<<<<<<< HEAD
            if ($rowStart !== null) { // @phpstan-ignore-line
=======
            if ($rowStart !== null) {
>>>>>>> 50f5a6f (Initial commit from local project)
                if ($rowStart == $rowEnd) {
                    $ranges[] = $hashedValue->col . $rowStart;
                } else {
                    $ranges[] = $hashedValue->col . $rowStart . ':' . $hashedValue->col . $rowEnd;
                }
            }

            foreach ($ranges as $range) {
                $mergedCoordCollection[$range] = $hashedValue->value;
            }
        }

        return $mergedCoordCollection;
    }

    /**
     * Get the individual cell blocks from a range string, removing any $ characters.
     *      then splitting by operators and returning an array with ranges and operators.
     *
<<<<<<< HEAD
     * @return array[]
     */
    private static function getCellBlocksFromRangeString(string $rangeString): array
=======
     * @param string $rangeString
     *
     * @return array[]
     */
    private static function getCellBlocksFromRangeString($rangeString)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $rangeString = str_replace('$', '', strtoupper($rangeString));

        // split range sets on intersection (space) or union (,) operators
<<<<<<< HEAD
        $tokens = preg_split('/([ ,])/', $rangeString, -1, PREG_SPLIT_DELIM_CAPTURE) ?: [];
=======
        $tokens = preg_split('/([ ,])/', $rangeString, -1, PREG_SPLIT_DELIM_CAPTURE);
        /** @phpstan-ignore-next-line */
>>>>>>> 50f5a6f (Initial commit from local project)
        $split = array_chunk($tokens, 2);
        $ranges = array_column($split, 0);
        $operators = array_column($split, 1);

        return [$ranges, $operators];
    }

    /**
     * Check that the given range is valid, i.e. that the start column and row are not greater than the end column and
     * row.
     *
     * @param string $cellBlock The original range, for displaying a meaningful error message
<<<<<<< HEAD
     */
    private static function validateRange(string $cellBlock, int $startColumnIndex, int $endColumnIndex, int $currentRow, int $endRow): void
=======
     * @param int $startColumnIndex
     * @param int $endColumnIndex
     * @param int $currentRow
     * @param int $endRow
     */
    private static function validateRange($cellBlock, $startColumnIndex, $endColumnIndex, $currentRow, $endRow): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($startColumnIndex >= $endColumnIndex || $currentRow > $endRow) {
            throw new Exception('Invalid range: "' . $cellBlock . '"');
        }
    }
}
