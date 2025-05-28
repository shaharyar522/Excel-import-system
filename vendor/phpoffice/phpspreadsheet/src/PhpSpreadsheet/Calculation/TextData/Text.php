<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\TextData;

<<<<<<< HEAD
use Composer\Pcre\Preg;
use PhpOffice\PhpSpreadsheet\Calculation\ArrayEnabled;
use PhpOffice\PhpSpreadsheet\Calculation\Calculation;
use PhpOffice\PhpSpreadsheet\Calculation\Exception as CalcExp;
use PhpOffice\PhpSpreadsheet\Calculation\Functions;
use PhpOffice\PhpSpreadsheet\Calculation\Information\ErrorValue;
use PhpOffice\PhpSpreadsheet\Shared\StringHelper;
=======
use PhpOffice\PhpSpreadsheet\Calculation\ArrayEnabled;
use PhpOffice\PhpSpreadsheet\Calculation\Calculation;
use PhpOffice\PhpSpreadsheet\Calculation\Functions;
use PhpOffice\PhpSpreadsheet\Calculation\Information\ErrorValue;
>>>>>>> 50f5a6f (Initial commit from local project)

class Text
{
    use ArrayEnabled;

    /**
     * LEN.
     *
     * @param mixed $value String Value
     *                         Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|int|string If an array of values is passed for the argument, then the returned result
     *            will also be an array with matching dimensions
     */
    public static function length(mixed $value = ''): array|int|string
=======
     * @return array|int
     *         If an array of values is passed for the argument, then the returned result
     *            will also be an array with matching dimensions
     */
    public static function length($value = '')
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($value)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $value);
        }

<<<<<<< HEAD
        try {
            $value = Helpers::extractString($value, true);
        } catch (CalcExp $e) {
            return $e->getMessage();
        }
=======
        $value = Helpers::extractString($value);
>>>>>>> 50f5a6f (Initial commit from local project)

        return mb_strlen($value, 'UTF-8');
    }

    /**
     * Compares two text strings and returns TRUE if they are exactly the same, FALSE otherwise.
     * EXACT is case-sensitive but ignores formatting differences.
     * Use EXACT to test text being entered into a document.
     *
     * @param mixed $value1 String Value
     *                         Or can be an array of values
     * @param mixed $value2 String Value
     *                         Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|bool|string If an array of values is passed for either of the arguments, then the returned result
     *            will also be an array with matching dimensions
     */
    public static function exact(mixed $value1, mixed $value2): array|bool|string
=======
     * @return array|bool
     *         If an array of values is passed for either of the arguments, then the returned result
     *            will also be an array with matching dimensions
     */
    public static function exact($value1, $value2)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($value1) || is_array($value2)) {
            return self::evaluateArrayArguments([self::class, __FUNCTION__], $value1, $value2);
        }

<<<<<<< HEAD
        try {
            $value1 = Helpers::extractString($value1, true);
            $value2 = Helpers::extractString($value2, true);
        } catch (CalcExp $e) {
            return $e->getMessage();
        }
=======
        $value1 = Helpers::extractString($value1);
        $value2 = Helpers::extractString($value2);
>>>>>>> 50f5a6f (Initial commit from local project)

        return $value2 === $value1;
    }

    /**
     * T.
     *
     * @param mixed $testValue Value to check
     *                         Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|string If an array of values is passed for the argument, then the returned result
     *            will also be an array with matching dimensions
     */
    public static function test(mixed $testValue = ''): array|string
=======
     * @return array|string
     *         If an array of values is passed for the argument, then the returned result
     *            will also be an array with matching dimensions
     */
    public static function test($testValue = '')
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($testValue)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $testValue);
        }

        if (is_string($testValue)) {
            return $testValue;
        }

        return '';
    }

    /**
     * TEXTSPLIT.
     *
     * @param mixed $text the text that you're searching
     * @param null|array|string $columnDelimiter The text that marks the point where to spill the text across columns.
     *                          Multiple delimiters can be passed as an array of string values
     * @param null|array|string $rowDelimiter The text that marks the point where to spill the text down rows.
     *                          Multiple delimiters can be passed as an array of string values
     * @param bool $ignoreEmpty Specify FALSE to create an empty cell when two delimiters are consecutive.
     *                              true = create empty cells
     *                              false = skip empty cells
     *                              Defaults to TRUE, which creates an empty cell
     * @param bool $matchMode Determines whether the match is case-sensitive or not.
     *                              true = case-sensitive
     *                              false = case-insensitive
     *                         By default, a case-sensitive match is done.
     * @param mixed $padding The value with which to pad the result.
     *                              The default is #N/A.
     *
<<<<<<< HEAD
     * @return array|string the array built from the text, split by the row and column delimiters, or an error string
     */
    public static function split(mixed $text, $columnDelimiter = null, $rowDelimiter = null, bool $ignoreEmpty = false, bool $matchMode = true, mixed $padding = '#N/A'): array|string
    {
        $text = Functions::flattenSingleValue($text);
        if (ErrorValue::isError($text, true)) {
            return StringHelper::convertToString($text);
        }
=======
     * @return array the array built from the text, split by the row and column delimiters
     */
    public static function split($text, $columnDelimiter = null, $rowDelimiter = null, bool $ignoreEmpty = false, bool $matchMode = true, $padding = '#N/A')
    {
        $text = Functions::flattenSingleValue($text);
>>>>>>> 50f5a6f (Initial commit from local project)

        $flags = self::matchFlags($matchMode);

        if ($rowDelimiter !== null) {
            $delimiter = self::buildDelimiter($rowDelimiter);
            $rows = ($delimiter === '()')
                ? [$text]
<<<<<<< HEAD
                : Preg::split("/{$delimiter}/{$flags}", StringHelper::convertToString($text));
=======
                : preg_split("/{$delimiter}/{$flags}", $text);
>>>>>>> 50f5a6f (Initial commit from local project)
        } else {
            $rows = [$text];
        }

<<<<<<< HEAD
        if ($ignoreEmpty === true) {
            $rows = array_values(array_filter(
                $rows,
                fn ($row): bool => $row !== ''
=======
        /** @var array $rows */
        if ($ignoreEmpty === true) {
            $rows = array_values(array_filter(
                $rows,
                function ($row) {
                    return $row !== '';
                }
>>>>>>> 50f5a6f (Initial commit from local project)
            ));
        }

        if ($columnDelimiter !== null) {
            $delimiter = self::buildDelimiter($columnDelimiter);
            array_walk(
                $rows,
                function (&$row) use ($delimiter, $flags, $ignoreEmpty): void {
                    $row = ($delimiter === '()')
                        ? [$row]
<<<<<<< HEAD
                        : Preg::split("/{$delimiter}/{$flags}", StringHelper::convertToString($row));
                    if ($ignoreEmpty === true) {
                        $row = array_values(array_filter(
                            $row,
                            fn ($value): bool => $value !== ''
=======
                        : preg_split("/{$delimiter}/{$flags}", $row);
                    /** @var array $row */
                    if ($ignoreEmpty === true) {
                        $row = array_values(array_filter(
                            $row,
                            function ($value) {
                                return $value !== '';
                            }
>>>>>>> 50f5a6f (Initial commit from local project)
                        ));
                    }
                }
            );
            if ($ignoreEmpty === true) {
                $rows = array_values(array_filter(
                    $rows,
<<<<<<< HEAD
                    fn ($row): bool => $row !== [] && $row !== ['']
=======
                    function ($row) {
                        return $row !== [] && $row !== [''];
                    }
>>>>>>> 50f5a6f (Initial commit from local project)
                ));
            }
        }

        return self::applyPadding($rows, $padding);
    }

<<<<<<< HEAD
    private static function applyPadding(array $rows, mixed $padding): array
    {
        $columnCount = array_reduce(
            $rows,
            fn (int $counter, array $row): int => max($counter, count($row)),
=======
    /**
     * @param mixed $padding
     */
    private static function applyPadding(array $rows, $padding): array
    {
        $columnCount = array_reduce(
            $rows,
            function (int $counter, array $row): int {
                return max($counter, count($row));
            },
>>>>>>> 50f5a6f (Initial commit from local project)
            0
        );

        return array_map(
<<<<<<< HEAD
            fn (array $row): array => (count($row) < $columnCount)
                    ? array_merge($row, array_fill(0, $columnCount - count($row), $padding))
                    : $row,
=======
            function (array $row) use ($columnCount, $padding): array {
                return (count($row) < $columnCount)
                    ? array_merge($row, array_fill(0, $columnCount - count($row), $padding))
                    : $row;
            },
>>>>>>> 50f5a6f (Initial commit from local project)
            $rows
        );
    }

    /**
     * @param null|array|string $delimiter the text that marks the point before which you want to split
     *                                 Multiple delimiters can be passed as an array of string values
     */
    private static function buildDelimiter($delimiter): string
    {
        $valueSet = Functions::flattenArray($delimiter);

        if (is_array($delimiter) && count($valueSet) > 1) {
            $quotedDelimiters = array_map(
<<<<<<< HEAD
                fn ($delimiter): string => preg_quote($delimiter ?? '', '/'),
=======
                function ($delimiter) {
                    return preg_quote($delimiter ?? '', '/');
                },
>>>>>>> 50f5a6f (Initial commit from local project)
                $valueSet
            );
            $delimiters = implode('|', $quotedDelimiters);

            return '(' . $delimiters . ')';
        }

<<<<<<< HEAD
        return '(' . preg_quote(StringHelper::convertToString(Functions::flattenSingleValue($delimiter)), '/') . ')';
=======
        return '(' . preg_quote(/** @scrutinizer ignore-type */ Functions::flattenSingleValue($delimiter), '/') . ')';
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    private static function matchFlags(bool $matchMode): string
    {
        return ($matchMode === true) ? 'miu' : 'mu';
    }

    public static function fromArray(array $array, int $format = 0): string
    {
        $result = [];
        foreach ($array as $row) {
            $cells = [];
            foreach ($row as $cellValue) {
                $value = ($format === 1) ? self::formatValueMode1($cellValue) : self::formatValueMode0($cellValue);
                $cells[] = $value;
            }
            $result[] = implode(($format === 1) ? ',' : ', ', $cells);
        }

        $result = implode(($format === 1) ? ';' : ', ', $result);

        return ($format === 1) ? '{' . $result . '}' : $result;
    }

<<<<<<< HEAD
    private static function formatValueMode0(mixed $cellValue): string
=======
    /**
     * @param mixed $cellValue
     */
    private static function formatValueMode0($cellValue): string
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_bool($cellValue)) {
            return Calculation::getLocaleBoolean($cellValue ? 'TRUE' : 'FALSE');
        }

<<<<<<< HEAD
        return StringHelper::convertToString($cellValue);
    }

    private static function formatValueMode1(mixed $cellValue): string
=======
        return (string) $cellValue;
    }

    /**
     * @param mixed $cellValue
     */
    private static function formatValueMode1($cellValue): string
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_string($cellValue) && ErrorValue::isError($cellValue) === false) {
            return Calculation::FORMULA_STRING_QUOTE . $cellValue . Calculation::FORMULA_STRING_QUOTE;
        } elseif (is_bool($cellValue)) {
            return Calculation::getLocaleBoolean($cellValue ? 'TRUE' : 'FALSE');
        }

<<<<<<< HEAD
        return StringHelper::convertToString($cellValue);
=======
        return (string) $cellValue;
>>>>>>> 50f5a6f (Initial commit from local project)
    }
}
