<?php

namespace PhpOffice\PhpSpreadsheet\Worksheet;

use DateTime;
use DateTimeZone;
use PhpOffice\PhpSpreadsheet\Calculation\Calculation;
use PhpOffice\PhpSpreadsheet\Calculation\Functions;
use PhpOffice\PhpSpreadsheet\Calculation\Internal\WildcardMatch;
use PhpOffice\PhpSpreadsheet\Cell\AddressRange;
<<<<<<< HEAD
use PhpOffice\PhpSpreadsheet\Cell\CellAddress;
use PhpOffice\PhpSpreadsheet\Cell\CellRange;
=======
>>>>>>> 50f5a6f (Initial commit from local project)
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Worksheet\AutoFilter\Column\Rule;
<<<<<<< HEAD
use Stringable;

class AutoFilter implements Stringable
{
    /**
     * Autofilter Worksheet.
     */
    private ?Worksheet $workSheet;

    /**
     * Autofilter Range.
     */
    private string $range;
=======

class AutoFilter
{
    /**
     * Autofilter Worksheet.
     *
     * @var null|Worksheet
     */
    private $workSheet;

    /**
     * Autofilter Range.
     *
     * @var string
     */
    private $range = '';
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Autofilter Column Ruleset.
     *
     * @var AutoFilter\Column[]
     */
<<<<<<< HEAD
    private array $columns = [];

    private bool $evaluated = false;
=======
    private $columns = [];

    /** @var bool */
    private $evaluated = false;
>>>>>>> 50f5a6f (Initial commit from local project)

    public function getEvaluated(): bool
    {
        return $this->evaluated;
    }

    public function setEvaluated(bool $value): void
    {
        $this->evaluated = $value;
    }

    /**
     * Create a new AutoFilter.
     *
<<<<<<< HEAD
     * @param AddressRange<CellAddress>|AddressRange<int>|AddressRange<string>|array{0: int, 1: int, 2: int, 3: int}|array{0: int, 1: int}|string $range
=======
     * @param AddressRange|array<int>|string $range
>>>>>>> 50f5a6f (Initial commit from local project)
     *            A simple string containing a Cell range like 'A1:E10' is permitted
     *              or passing in an array of [$fromColumnIndex, $fromRow, $toColumnIndex, $toRow] (e.g. [3, 5, 6, 8]),
     *              or an AddressRange object.
     */
<<<<<<< HEAD
    public function __construct(AddressRange|string|array $range = '', ?Worksheet $worksheet = null)
=======
    public function __construct($range = '', ?Worksheet $worksheet = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($range !== '') {
            [, $range] = Worksheet::extractSheetTitle(Validations::validateCellRange($range), true);
        }

<<<<<<< HEAD
        $this->range = $range ?? '';
        $this->workSheet = $worksheet;
    }

    public function __destruct()
    {
        $this->workSheet = null;
    }

    /**
     * Get AutoFilter Parent Worksheet.
     */
    public function getParent(): null|Worksheet
=======
        $this->range = $range;
        $this->workSheet = $worksheet;
    }

    /**
     * Get AutoFilter Parent Worksheet.
     *
     * @return null|Worksheet
     */
    public function getParent()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->workSheet;
    }

    /**
     * Set AutoFilter Parent Worksheet.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setParent(?Worksheet $worksheet = null): static
=======
    public function setParent(?Worksheet $worksheet = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->evaluated = false;
        $this->workSheet = $worksheet;

        return $this;
    }

    /**
     * Get AutoFilter Range.
<<<<<<< HEAD
     */
    public function getRange(): string
=======
     *
     * @return string
     */
    public function getRange()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->range;
    }

    /**
     * Set AutoFilter Cell Range.
     *
<<<<<<< HEAD
     * @param AddressRange<CellRange>|array{0: int, 1: int, 2: int, 3: int}|array{0: int, 1: int}|string $range
=======
     * @param AddressRange|array<int>|string $range
>>>>>>> 50f5a6f (Initial commit from local project)
     *            A simple string containing a Cell range like 'A1:E10' or a Cell address like 'A1' is permitted
     *              or passing in an array of [$fromColumnIndex, $fromRow, $toColumnIndex, $toRow] (e.g. [3, 5, 6, 8]),
     *              or an AddressRange object.
     */
<<<<<<< HEAD
    public function setRange(AddressRange|string|array $range = ''): self
=======
    public function setRange($range = ''): self
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->evaluated = false;
        // extract coordinate
        if ($range !== '') {
            [, $range] = Worksheet::extractSheetTitle(Validations::validateCellRange($range), true);
        }

        if (empty($range)) {
            //    Discard all column rules
            $this->columns = [];
            $this->range = '';

            return $this;
        }

        if (ctype_digit($range) || ctype_alpha($range)) {
            throw new Exception("{$range} is an invalid range for AutoFilter");
        }

        $this->range = $range;
        //    Discard any column rules that are no longer valid within this range
        [$rangeStart, $rangeEnd] = Coordinate::rangeBoundaries($this->range);
        foreach ($this->columns as $key => $value) {
            $colIndex = Coordinate::columnIndexFromString($key);
            if (($rangeStart[0] > $colIndex) || ($rangeEnd[0] < $colIndex)) {
                unset($this->columns[$key]);
            }
        }

        return $this;
    }

    public function setRangeToMaxRow(): self
    {
        $this->evaluated = false;
        if ($this->workSheet !== null) {
            $thisrange = $this->range;
<<<<<<< HEAD
            $range = (string) preg_replace('/\d+$/', (string) $this->workSheet->getHighestRow(), $thisrange);
=======
            $range = (string) preg_replace('/\\d+$/', (string) $this->workSheet->getHighestRow(), $thisrange);
>>>>>>> 50f5a6f (Initial commit from local project)
            if ($range !== $thisrange) {
                $this->setRange($range);
            }
        }

        return $this;
    }

    /**
     * Get all AutoFilter Columns.
     *
     * @return AutoFilter\Column[]
     */
<<<<<<< HEAD
    public function getColumns(): array
=======
    public function getColumns()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->columns;
    }

    /**
     * Validate that the specified column is in the AutoFilter range.
     *
     * @param string $column Column name (e.g. A)
     *
     * @return int The column offset within the autofilter range
     */
<<<<<<< HEAD
    public function testColumnInRange(string $column): int
=======
    public function testColumnInRange($column)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (empty($this->range)) {
            throw new Exception('No autofilter range is defined.');
        }

        $columnIndex = Coordinate::columnIndexFromString($column);
        [$rangeStart, $rangeEnd] = Coordinate::rangeBoundaries($this->range);
        if (($rangeStart[0] > $columnIndex) || ($rangeEnd[0] < $columnIndex)) {
            throw new Exception('Column is outside of current autofilter range.');
        }

        return $columnIndex - $rangeStart[0];
    }

    /**
     * Get a specified AutoFilter Column Offset within the defined AutoFilter range.
     *
     * @param string $column Column name (e.g. A)
     *
     * @return int The offset of the specified column within the autofilter range
     */
<<<<<<< HEAD
    public function getColumnOffset(string $column): int
=======
    public function getColumnOffset($column)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->testColumnInRange($column);
    }

    /**
     * Get a specified AutoFilter Column.
     *
     * @param string $column Column name (e.g. A)
<<<<<<< HEAD
     */
    public function getColumn(string $column): AutoFilter\Column
=======
     *
     * @return AutoFilter\Column
     */
    public function getColumn($column)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->testColumnInRange($column);

        if (!isset($this->columns[$column])) {
            $this->columns[$column] = new AutoFilter\Column($column, $this);
        }

        return $this->columns[$column];
    }

    /**
     * Get a specified AutoFilter Column by it's offset.
     *
     * @param int $columnOffset Column offset within range (starting from 0)
<<<<<<< HEAD
     */
    public function getColumnByOffset(int $columnOffset): AutoFilter\Column
=======
     *
     * @return AutoFilter\Column
     */
    public function getColumnByOffset($columnOffset)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        [$rangeStart, $rangeEnd] = Coordinate::rangeBoundaries($this->range);
        $pColumn = Coordinate::stringFromColumnIndex($rangeStart[0] + $columnOffset);

        return $this->getColumn($pColumn);
    }

    /**
     * Set AutoFilter.
     *
     * @param AutoFilter\Column|string $columnObjectOrString
     *            A simple string containing a Column ID like 'A' is permitted
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setColumn(AutoFilter\Column|string $columnObjectOrString): static
=======
    public function setColumn($columnObjectOrString)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->evaluated = false;
        if ((is_string($columnObjectOrString)) && (!empty($columnObjectOrString))) {
            $column = $columnObjectOrString;
<<<<<<< HEAD
        } elseif ($columnObjectOrString instanceof AutoFilter\Column) {
=======
        } elseif (is_object($columnObjectOrString) && ($columnObjectOrString instanceof AutoFilter\Column)) {
>>>>>>> 50f5a6f (Initial commit from local project)
            $column = $columnObjectOrString->getColumnIndex();
        } else {
            throw new Exception('Column is not within the autofilter range.');
        }
        $this->testColumnInRange($column);

        if (is_string($columnObjectOrString)) {
            $this->columns[$columnObjectOrString] = new AutoFilter\Column($columnObjectOrString, $this);
        } else {
            $columnObjectOrString->setParent($this);
            $this->columns[$column] = $columnObjectOrString;
        }
        ksort($this->columns);

        return $this;
    }

    /**
     * Clear a specified AutoFilter Column.
     *
     * @param string $column Column name (e.g. A)
     *
     * @return $this
     */
<<<<<<< HEAD
    public function clearColumn(string $column): static
=======
    public function clearColumn($column)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->evaluated = false;
        $this->testColumnInRange($column);

        if (isset($this->columns[$column])) {
            unset($this->columns[$column]);
        }

        return $this;
    }

    /**
     * Shift an AutoFilter Column Rule to a different column.
     *
     * Note: This method bypasses validation of the destination column to ensure it is within this AutoFilter range.
     *        Nor does it verify whether any column rule already exists at $toColumn, but will simply override any existing value.
     *        Use with caution.
     *
     * @param string $fromColumn Column name (e.g. A)
     * @param string $toColumn Column name (e.g. B)
     *
     * @return $this
     */
<<<<<<< HEAD
    public function shiftColumn(string $fromColumn, string $toColumn): static
=======
    public function shiftColumn($fromColumn, $toColumn)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->evaluated = false;
        $fromColumn = strtoupper($fromColumn);
        $toColumn = strtoupper($toColumn);

<<<<<<< HEAD
        if (isset($this->columns[$fromColumn])) {
=======
        if (($fromColumn !== null) && (isset($this->columns[$fromColumn])) && ($toColumn !== null)) {
>>>>>>> 50f5a6f (Initial commit from local project)
            $this->columns[$fromColumn]->setParent();
            $this->columns[$fromColumn]->setColumnIndex($toColumn);
            $this->columns[$toColumn] = $this->columns[$fromColumn];
            $this->columns[$toColumn]->setParent($this);
            unset($this->columns[$fromColumn]);

            ksort($this->columns);
        }

        return $this;
    }

    /**
     * Test if cell value is in the defined set of values.
     *
<<<<<<< HEAD
     * @param array{blanks: bool, filterValues: array<string,array<string,string>>} $dataSet
     */
    protected static function filterTestInSimpleDataSet(mixed $cellValue, array $dataSet): bool
    {
        $dataSetValues = $dataSet['filterValues'];
        $blanks = $dataSet['blanks'];
        if (($cellValue === '') || ($cellValue === null)) {
=======
     * @param mixed $cellValue
     * @param mixed[] $dataSet
     *
     * @return bool
     */
    protected static function filterTestInSimpleDataSet($cellValue, $dataSet)
    {
        $dataSetValues = $dataSet['filterValues'];
        $blanks = $dataSet['blanks'];
        if (($cellValue == '') || ($cellValue === null)) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return $blanks;
        }

        return in_array($cellValue, $dataSetValues);
    }

    /**
     * Test if cell value is in the defined set of Excel date values.
     *
<<<<<<< HEAD
     * @param array{blanks: bool, filterValues: array<string,array<string,string>>} $dataSet
     */
    protected static function filterTestInDateGroupSet(mixed $cellValue, array $dataSet): bool
    {
        $dateSet = $dataSet['filterValues'];
        $blanks = $dataSet['blanks'];
        if (($cellValue === '') || ($cellValue === null)) {
=======
     * @param mixed $cellValue
     * @param mixed[] $dataSet
     *
     * @return bool
     */
    protected static function filterTestInDateGroupSet($cellValue, $dataSet)
    {
        $dateSet = $dataSet['filterValues'];
        $blanks = $dataSet['blanks'];
        if (($cellValue == '') || ($cellValue === null)) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return $blanks;
        }
        $timeZone = new DateTimeZone('UTC');

        if (is_numeric($cellValue)) {
            $dateTime = Date::excelToDateTimeObject((float) $cellValue, $timeZone);
            $cellValue = (float) $cellValue;
            if ($cellValue < 1) {
                //    Just the time part
                $dtVal = $dateTime->format('His');
                $dateSet = $dateSet['time'];
            } elseif ($cellValue == floor($cellValue)) {
                //    Just the date part
                $dtVal = $dateTime->format('Ymd');
                $dateSet = $dateSet['date'];
            } else {
                //    date and time parts
                $dtVal = $dateTime->format('YmdHis');
                $dateSet = $dateSet['dateTime'];
            }
            foreach ($dateSet as $dateValue) {
                //    Use of substr to extract value at the appropriate group level
<<<<<<< HEAD
                if (str_starts_with($dtVal, $dateValue)) {
=======
                if (substr($dtVal, 0, strlen($dateValue)) == $dateValue) {
>>>>>>> 50f5a6f (Initial commit from local project)
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Test if cell value is within a set of values defined by a ruleset.
     *
<<<<<<< HEAD
     * @param mixed[] $ruleSet
     */
    protected static function filterTestInCustomDataSet(mixed $cellValue, array $ruleSet): bool
    {
        /** @var array[] $dataSet */
=======
     * @param mixed $cellValue
     * @param mixed[] $ruleSet
     *
     * @return bool
     */
    protected static function filterTestInCustomDataSet($cellValue, $ruleSet)
    {
        /** @var array[] */
>>>>>>> 50f5a6f (Initial commit from local project)
        $dataSet = $ruleSet['filterRules'];
        $join = $ruleSet['join'];
        $customRuleForBlanks = $ruleSet['customRuleForBlanks'] ?? false;

        if (!$customRuleForBlanks) {
            //    Blank cells are always ignored, so return a FALSE
<<<<<<< HEAD
            if (($cellValue === '') || ($cellValue === null)) {
=======
            if (($cellValue == '') || ($cellValue === null)) {
>>>>>>> 50f5a6f (Initial commit from local project)
                return false;
            }
        }
        $returnVal = ($join == AutoFilter\Column::AUTOFILTER_COLUMN_JOIN_AND);
        foreach ($dataSet as $rule) {
<<<<<<< HEAD
            /** @var string $ruleValue */
            $ruleValue = $rule['value'];
            /** @var string $ruleOperator */
            $ruleOperator = $rule['operator'];
            /** @var string $cellValueString */
=======
            /** @var string */
            $ruleValue = $rule['value'];
            /** @var string */
            $ruleOperator = $rule['operator'];
            /** @var string */
>>>>>>> 50f5a6f (Initial commit from local project)
            $cellValueString = $cellValue ?? '';
            $retVal = false;

            if (is_numeric($ruleValue)) {
                //    Numeric values are tested using the appropriate operator
                $numericTest = is_numeric($cellValue);
                switch ($ruleOperator) {
                    case Rule::AUTOFILTER_COLUMN_RULE_EQUAL:
                        $retVal = $numericTest && ($cellValue == $ruleValue);

                        break;
                    case Rule::AUTOFILTER_COLUMN_RULE_NOTEQUAL:
                        $retVal = !$numericTest || ($cellValue != $ruleValue);

                        break;
                    case Rule::AUTOFILTER_COLUMN_RULE_GREATERTHAN:
                        $retVal = $numericTest && ($cellValue > $ruleValue);

                        break;
                    case Rule::AUTOFILTER_COLUMN_RULE_GREATERTHANOREQUAL:
                        $retVal = $numericTest && ($cellValue >= $ruleValue);

                        break;
                    case Rule::AUTOFILTER_COLUMN_RULE_LESSTHAN:
                        $retVal = $numericTest && ($cellValue < $ruleValue);

                        break;
                    case Rule::AUTOFILTER_COLUMN_RULE_LESSTHANOREQUAL:
                        $retVal = $numericTest && ($cellValue <= $ruleValue);

                        break;
                }
            } elseif ($ruleValue == '') {
<<<<<<< HEAD
                $retVal = match ($ruleOperator) {
                    Rule::AUTOFILTER_COLUMN_RULE_EQUAL => ($cellValue === '') || ($cellValue === null),
                    Rule::AUTOFILTER_COLUMN_RULE_NOTEQUAL => ($cellValue != ''),
                    default => true,
                };
=======
                switch ($ruleOperator) {
                    case Rule::AUTOFILTER_COLUMN_RULE_EQUAL:
                        $retVal = (($cellValue == '') || ($cellValue === null));

                        break;
                    case Rule::AUTOFILTER_COLUMN_RULE_NOTEQUAL:
                        $retVal = (($cellValue != '') && ($cellValue !== null));

                        break;
                    default:
                        $retVal = true;

                        break;
                }
>>>>>>> 50f5a6f (Initial commit from local project)
            } else {
                //    String values are always tested for equality, factoring in for wildcards (hence a regexp test)
                switch ($ruleOperator) {
                    case Rule::AUTOFILTER_COLUMN_RULE_EQUAL:
                        $retVal = (bool) preg_match('/^' . $ruleValue . '$/i', $cellValueString);

                        break;
                    case Rule::AUTOFILTER_COLUMN_RULE_NOTEQUAL:
                        $retVal = !((bool) preg_match('/^' . $ruleValue . '$/i', $cellValueString));

                        break;
                    case Rule::AUTOFILTER_COLUMN_RULE_GREATERTHAN:
                        $retVal = strcasecmp($cellValueString, $ruleValue) > 0;

                        break;
                    case Rule::AUTOFILTER_COLUMN_RULE_GREATERTHANOREQUAL:
                        $retVal = strcasecmp($cellValueString, $ruleValue) >= 0;

                        break;
                    case Rule::AUTOFILTER_COLUMN_RULE_LESSTHAN:
                        $retVal = strcasecmp($cellValueString, $ruleValue) < 0;

                        break;
                    case Rule::AUTOFILTER_COLUMN_RULE_LESSTHANOREQUAL:
                        $retVal = strcasecmp($cellValueString, $ruleValue) <= 0;

                        break;
                }
            }
            //    If there are multiple conditions, then we need to test both using the appropriate join operator
            switch ($join) {
                case AutoFilter\Column::AUTOFILTER_COLUMN_JOIN_OR:
                    $returnVal = $returnVal || $retVal;
                    //    Break as soon as we have a TRUE match for OR joins,
                    //        to avoid unnecessary additional code execution
                    if ($returnVal) {
                        return $returnVal;
                    }

                    break;
                case AutoFilter\Column::AUTOFILTER_COLUMN_JOIN_AND:
                    $returnVal = $returnVal && $retVal;

                    break;
            }
        }

        return $returnVal;
    }

    /**
     * Test if cell date value is matches a set of values defined by a set of months.
     *
<<<<<<< HEAD
     * @param mixed[] $monthSet
     */
    protected static function filterTestInPeriodDateSet(mixed $cellValue, array $monthSet): bool
    {
        //    Blank cells are always ignored, so return a FALSE
        if (($cellValue === '') || ($cellValue === null)) {
=======
     * @param mixed $cellValue
     * @param mixed[] $monthSet
     *
     * @return bool
     */
    protected static function filterTestInPeriodDateSet($cellValue, $monthSet)
    {
        //    Blank cells are always ignored, so return a FALSE
        if (($cellValue == '') || ($cellValue === null)) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return false;
        }

        if (is_numeric($cellValue)) {
            $dateObject = Date::excelToDateTimeObject((float) $cellValue, new DateTimeZone('UTC'));
            $dateValue = (int) $dateObject->format('m');
            if (in_array($dateValue, $monthSet)) {
                return true;
            }
        }

        return false;
    }

    private static function makeDateObject(int $year, int $month, int $day, int $hour = 0, int $minute = 0, int $second = 0): DateTime
    {
        $baseDate = new DateTime();
        $baseDate->setDate($year, $month, $day);
        $baseDate->setTime($hour, $minute, $second);

        return $baseDate;
    }

    private const DATE_FUNCTIONS = [
        Rule::AUTOFILTER_RULETYPE_DYNAMIC_LASTMONTH => 'dynamicLastMonth',
        Rule::AUTOFILTER_RULETYPE_DYNAMIC_LASTQUARTER => 'dynamicLastQuarter',
        Rule::AUTOFILTER_RULETYPE_DYNAMIC_LASTWEEK => 'dynamicLastWeek',
        Rule::AUTOFILTER_RULETYPE_DYNAMIC_LASTYEAR => 'dynamicLastYear',
        Rule::AUTOFILTER_RULETYPE_DYNAMIC_NEXTMONTH => 'dynamicNextMonth',
        Rule::AUTOFILTER_RULETYPE_DYNAMIC_NEXTQUARTER => 'dynamicNextQuarter',
        Rule::AUTOFILTER_RULETYPE_DYNAMIC_NEXTWEEK => 'dynamicNextWeek',
        Rule::AUTOFILTER_RULETYPE_DYNAMIC_NEXTYEAR => 'dynamicNextYear',
        Rule::AUTOFILTER_RULETYPE_DYNAMIC_THISMONTH => 'dynamicThisMonth',
        Rule::AUTOFILTER_RULETYPE_DYNAMIC_THISQUARTER => 'dynamicThisQuarter',
        Rule::AUTOFILTER_RULETYPE_DYNAMIC_THISWEEK => 'dynamicThisWeek',
        Rule::AUTOFILTER_RULETYPE_DYNAMIC_THISYEAR => 'dynamicThisYear',
        Rule::AUTOFILTER_RULETYPE_DYNAMIC_TODAY => 'dynamicToday',
        Rule::AUTOFILTER_RULETYPE_DYNAMIC_TOMORROW => 'dynamicTomorrow',
        Rule::AUTOFILTER_RULETYPE_DYNAMIC_YEARTODATE => 'dynamicYearToDate',
        Rule::AUTOFILTER_RULETYPE_DYNAMIC_YESTERDAY => 'dynamicYesterday',
    ];

    private static function dynamicLastMonth(): array
    {
        $maxval = new DateTime();
        $year = (int) $maxval->format('Y');
        $month = (int) $maxval->format('m');
        $maxval->setDate($year, $month, 1);
        $maxval->setTime(0, 0, 0);
        $val = clone $maxval;
        $val->modify('-1 month');

        return [$val, $maxval];
    }

    private static function firstDayOfQuarter(): DateTime
    {
        $val = new DateTime();
        $year = (int) $val->format('Y');
        $month = (int) $val->format('m');
        $month = 3 * intdiv($month - 1, 3) + 1;
        $val->setDate($year, $month, 1);
        $val->setTime(0, 0, 0);

        return $val;
    }

    private static function dynamicLastQuarter(): array
    {
        $maxval = self::firstDayOfQuarter();
        $val = clone $maxval;
        $val->modify('-3 months');

        return [$val, $maxval];
    }

    private static function dynamicLastWeek(): array
    {
        $val = new DateTime();
        $val->setTime(0, 0, 0);
        $dayOfWeek = (int) $val->format('w'); // Sunday is 0
        $subtract = $dayOfWeek + 7; // revert to prior Sunday
        $val->modify("-$subtract days");
        $maxval = clone $val;
        $maxval->modify('+7 days');

        return [$val, $maxval];
    }

    private static function dynamicLastYear(): array
    {
        $val = new DateTime();
        $year = (int) $val->format('Y');
        $val = self::makeDateObject($year - 1, 1, 1);
        $maxval = self::makeDateObject($year, 1, 1);

        return [$val, $maxval];
    }

    private static function dynamicNextMonth(): array
    {
        $val = new DateTime();
        $year = (int) $val->format('Y');
        $month = (int) $val->format('m');
        $val->setDate($year, $month, 1);
        $val->setTime(0, 0, 0);
        $val->modify('+1 month');
        $maxval = clone $val;
        $maxval->modify('+1 month');

        return [$val, $maxval];
    }

    private static function dynamicNextQuarter(): array
    {
        $val = self::firstDayOfQuarter();
        $val->modify('+3 months');
        $maxval = clone $val;
        $maxval->modify('+3 months');

        return [$val, $maxval];
    }

    private static function dynamicNextWeek(): array
    {
        $val = new DateTime();
        $val->setTime(0, 0, 0);
        $dayOfWeek = (int) $val->format('w'); // Sunday is 0
        $add = 7 - $dayOfWeek; // move to next Sunday
        $val->modify("+$add days");
        $maxval = clone $val;
        $maxval->modify('+7 days');

        return [$val, $maxval];
    }

    private static function dynamicNextYear(): array
    {
        $val = new DateTime();
        $year = (int) $val->format('Y');
        $val = self::makeDateObject($year + 1, 1, 1);
        $maxval = self::makeDateObject($year + 2, 1, 1);

        return [$val, $maxval];
    }

    private static function dynamicThisMonth(): array
    {
        $baseDate = new DateTime();
        $baseDate->setTime(0, 0, 0);
        $year = (int) $baseDate->format('Y');
        $month = (int) $baseDate->format('m');
        $val = self::makeDateObject($year, $month, 1);
        $maxval = clone $val;
        $maxval->modify('+1 month');

        return [$val, $maxval];
    }

    private static function dynamicThisQuarter(): array
    {
        $val = self::firstDayOfQuarter();
        $maxval = clone $val;
        $maxval->modify('+3 months');

        return [$val, $maxval];
    }

    private static function dynamicThisWeek(): array
    {
        $val = new DateTime();
        $val->setTime(0, 0, 0);
        $dayOfWeek = (int) $val->format('w'); // Sunday is 0
        $subtract = $dayOfWeek; // revert to Sunday
        $val->modify("-$subtract days");
        $maxval = clone $val;
        $maxval->modify('+7 days');

        return [$val, $maxval];
    }

    private static function dynamicThisYear(): array
    {
        $val = new DateTime();
        $year = (int) $val->format('Y');
        $val = self::makeDateObject($year, 1, 1);
        $maxval = self::makeDateObject($year + 1, 1, 1);

        return [$val, $maxval];
    }

    private static function dynamicToday(): array
    {
        $val = new DateTime();
        $val->setTime(0, 0, 0);
        $maxval = clone $val;
        $maxval->modify('+1 day');

        return [$val, $maxval];
    }

    private static function dynamicTomorrow(): array
    {
        $val = new DateTime();
        $val->setTime(0, 0, 0);
        $val->modify('+1 day');
        $maxval = clone $val;
        $maxval->modify('+1 day');

        return [$val, $maxval];
    }

    private static function dynamicYearToDate(): array
    {
        $maxval = new DateTime();
        $maxval->setTime(0, 0, 0);
        $val = self::makeDateObject((int) $maxval->format('Y'), 1, 1);
        $maxval->modify('+1 day');

        return [$val, $maxval];
    }

    private static function dynamicYesterday(): array
    {
        $maxval = new DateTime();
        $maxval->setTime(0, 0, 0);
        $val = clone $maxval;
        $val->modify('-1 day');

        return [$val, $maxval];
    }

    /**
     * Convert a dynamic rule daterange to a custom filter range expression for ease of calculation.
     *
<<<<<<< HEAD
     * @return mixed[]
     */
    private function dynamicFilterDateRange(string $dynamicRuleType, AutoFilter\Column &$filterColumn): array
=======
     * @param string $dynamicRuleType
     *
     * @return mixed[]
     */
    private function dynamicFilterDateRange($dynamicRuleType, AutoFilter\Column &$filterColumn)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $ruleValues = [];
        $callBack = [__CLASS__, self::DATE_FUNCTIONS[$dynamicRuleType]]; // What if not found?
        //    Calculate start/end dates for the required date range based on current date
        //    Val is lowest permitted value.
        //    Maxval is greater than highest permitted value
        $val = $maxval = 0;
<<<<<<< HEAD
        if (is_callable($callBack)) { //* @phpstan-ignore-line
=======
        if (is_callable($callBack)) {
>>>>>>> 50f5a6f (Initial commit from local project)
            [$val, $maxval] = $callBack();
        }
        $val = Date::dateTimeToExcel($val);
        $maxval = Date::dateTimeToExcel($maxval);

        //    Set the filter column rule attributes ready for writing
        $filterColumn->setAttributes(['val' => $val, 'maxVal' => $maxval]);

        //    Set the rules for identifying rows for hide/show
        $ruleValues[] = ['operator' => Rule::AUTOFILTER_COLUMN_RULE_GREATERTHANOREQUAL, 'value' => $val];
        $ruleValues[] = ['operator' => Rule::AUTOFILTER_COLUMN_RULE_LESSTHAN, 'value' => $maxval];

        return ['method' => 'filterTestInCustomDataSet', 'arguments' => ['filterRules' => $ruleValues, 'join' => AutoFilter\Column::AUTOFILTER_COLUMN_JOIN_AND]];
    }

    /**
     * Apply the AutoFilter rules to the AutoFilter Range.
<<<<<<< HEAD
     */
    private function calculateTopTenValue(string $columnID, int $startRow, int $endRow, ?string $ruleType, mixed $ruleValue): mixed
=======
     *
     * @param string $columnID
     * @param int $startRow
     * @param int $endRow
     * @param ?string $ruleType
     * @param mixed $ruleValue
     *
     * @return mixed
     */
    private function calculateTopTenValue($columnID, $startRow, $endRow, $ruleType, $ruleValue)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $range = $columnID . $startRow . ':' . $columnID . $endRow;
        $retVal = null;
        if ($this->workSheet !== null) {
            $dataValues = Functions::flattenArray($this->workSheet->rangeToArray($range, null, true, false));
            $dataValues = array_filter($dataValues);

            if ($ruleType == Rule::AUTOFILTER_COLUMN_RULE_TOPTEN_TOP) {
                rsort($dataValues);
            } else {
                sort($dataValues);
            }

<<<<<<< HEAD
            if (is_numeric($ruleValue)) {
                $ruleValue = (int) $ruleValue;
            }
            if ($ruleValue === null || is_int($ruleValue)) {
                $slice = array_slice($dataValues, 0, $ruleValue);
                $retVal = array_pop($slice);
            }
=======
            $slice = array_slice($dataValues, 0, $ruleValue);

            $retVal = array_pop($slice);
>>>>>>> 50f5a6f (Initial commit from local project)
        }

        return $retVal;
    }

    /**
     * Apply the AutoFilter rules to the AutoFilter Range.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function showHideRows(): static
=======
    public function showHideRows()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($this->workSheet === null) {
            return $this;
        }
        [$rangeStart, $rangeEnd] = Coordinate::rangeBoundaries($this->range);

        //    The heading row should always be visible
        $this->workSheet->getRowDimension($rangeStart[1])->setVisible(true);

        $columnFilterTests = [];
        foreach ($this->columns as $columnID => $filterColumn) {
            $rules = $filterColumn->getRules();
            switch ($filterColumn->getFilterType()) {
                case AutoFilter\Column::AUTOFILTER_FILTERTYPE_FILTER:
                    $ruleType = null;
                    $ruleValues = [];
                    //    Build a list of the filter value selections
                    foreach ($rules as $rule) {
                        $ruleType = $rule->getRuleType();
                        $ruleValues[] = $rule->getValue();
                    }
                    //    Test if we want to include blanks in our filter criteria
                    $blanks = false;
                    $ruleDataSet = array_filter($ruleValues);
                    if (count($ruleValues) != count($ruleDataSet)) {
                        $blanks = true;
                    }
                    if ($ruleType == Rule::AUTOFILTER_RULETYPE_FILTER) {
                        //    Filter on absolute values
                        $columnFilterTests[$columnID] = [
                            'method' => 'filterTestInSimpleDataSet',
                            'arguments' => ['filterValues' => $ruleDataSet, 'blanks' => $blanks],
                        ];
<<<<<<< HEAD
                    } elseif ($ruleType !== null) {
=======
                    } else {
>>>>>>> 50f5a6f (Initial commit from local project)
                        //    Filter on date group values
                        $arguments = [
                            'date' => [],
                            'time' => [],
                            'dateTime' => [],
                        ];
                        foreach ($ruleDataSet as $ruleValue) {
                            if (!is_array($ruleValue)) {
                                continue;
                            }
                            $date = $time = '';
                            if (
<<<<<<< HEAD
                                (isset($ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_YEAR]))
                                && ($ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_YEAR] !== '')
=======
                                (isset($ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_YEAR])) &&
                                ($ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_YEAR] !== '')
>>>>>>> 50f5a6f (Initial commit from local project)
                            ) {
                                $date .= sprintf('%04d', $ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_YEAR]);
                            }
                            if (
<<<<<<< HEAD
                                (isset($ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_MONTH]))
                                && ($ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_MONTH] != '')
=======
                                (isset($ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_MONTH])) &&
                                ($ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_MONTH] != '')
>>>>>>> 50f5a6f (Initial commit from local project)
                            ) {
                                $date .= sprintf('%02d', $ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_MONTH]);
                            }
                            if (
<<<<<<< HEAD
                                (isset($ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_DAY]))
                                && ($ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_DAY] !== '')
=======
                                (isset($ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_DAY])) &&
                                ($ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_DAY] !== '')
>>>>>>> 50f5a6f (Initial commit from local project)
                            ) {
                                $date .= sprintf('%02d', $ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_DAY]);
                            }
                            if (
<<<<<<< HEAD
                                (isset($ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_HOUR]))
                                && ($ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_HOUR] !== '')
=======
                                (isset($ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_HOUR])) &&
                                ($ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_HOUR] !== '')
>>>>>>> 50f5a6f (Initial commit from local project)
                            ) {
                                $time .= sprintf('%02d', $ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_HOUR]);
                            }
                            if (
<<<<<<< HEAD
                                (isset($ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_MINUTE]))
                                && ($ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_MINUTE] !== '')
=======
                                (isset($ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_MINUTE])) &&
                                ($ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_MINUTE] !== '')
>>>>>>> 50f5a6f (Initial commit from local project)
                            ) {
                                $time .= sprintf('%02d', $ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_MINUTE]);
                            }
                            if (
<<<<<<< HEAD
                                (isset($ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_SECOND]))
                                && ($ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_SECOND] !== '')
=======
                                (isset($ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_SECOND])) &&
                                ($ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_SECOND] !== '')
>>>>>>> 50f5a6f (Initial commit from local project)
                            ) {
                                $time .= sprintf('%02d', $ruleValue[Rule::AUTOFILTER_RULETYPE_DATEGROUP_SECOND]);
                            }
                            $dateTime = $date . $time;
                            $arguments['date'][] = $date;
                            $arguments['time'][] = $time;
                            $arguments['dateTime'][] = $dateTime;
                        }
                        //    Remove empty elements
                        $arguments['date'] = array_filter($arguments['date']);
                        $arguments['time'] = array_filter($arguments['time']);
                        $arguments['dateTime'] = array_filter($arguments['dateTime']);
                        $columnFilterTests[$columnID] = [
                            'method' => 'filterTestInDateGroupSet',
                            'arguments' => ['filterValues' => $arguments, 'blanks' => $blanks],
                        ];
                    }

                    break;
                case AutoFilter\Column::AUTOFILTER_FILTERTYPE_CUSTOMFILTER:
                    $customRuleForBlanks = true;
                    $ruleValues = [];
                    //    Build a list of the filter value selections
                    foreach ($rules as $rule) {
                        $ruleValue = $rule->getValue();
                        if (!is_array($ruleValue) && !is_numeric($ruleValue)) {
                            //    Convert to a regexp allowing for regexp reserved characters, wildcards and escaped wildcards
                            $ruleValue = WildcardMatch::wildcard($ruleValue);
                            if (trim($ruleValue) == '') {
                                $customRuleForBlanks = true;
                                $ruleValue = trim($ruleValue);
                            }
                        }
                        $ruleValues[] = ['operator' => $rule->getOperator(), 'value' => $ruleValue];
                    }
                    $join = $filterColumn->getJoin();
                    $columnFilterTests[$columnID] = [
                        'method' => 'filterTestInCustomDataSet',
                        'arguments' => ['filterRules' => $ruleValues, 'join' => $join, 'customRuleForBlanks' => $customRuleForBlanks],
                    ];

                    break;
                case AutoFilter\Column::AUTOFILTER_FILTERTYPE_DYNAMICFILTER:
                    $ruleValues = [];
                    foreach ($rules as $rule) {
                        //    We should only ever have one Dynamic Filter Rule anyway
                        $dynamicRuleType = $rule->getGrouping();
                        if (
<<<<<<< HEAD
                            ($dynamicRuleType == Rule::AUTOFILTER_RULETYPE_DYNAMIC_ABOVEAVERAGE)
                            || ($dynamicRuleType == Rule::AUTOFILTER_RULETYPE_DYNAMIC_BELOWAVERAGE)
=======
                            ($dynamicRuleType == Rule::AUTOFILTER_RULETYPE_DYNAMIC_ABOVEAVERAGE) ||
                            ($dynamicRuleType == Rule::AUTOFILTER_RULETYPE_DYNAMIC_BELOWAVERAGE)
>>>>>>> 50f5a6f (Initial commit from local project)
                        ) {
                            //    Number (Average) based
                            //    Calculate the average
                            $averageFormula = '=AVERAGE(' . $columnID . ($rangeStart[1] + 1) . ':' . $columnID . $rangeEnd[1] . ')';
<<<<<<< HEAD
                            $average = Calculation::getInstance($this->workSheet->getParent())->calculateFormula($averageFormula, null, $this->workSheet->getCell('A1'));
=======
                            $spreadsheet = ($this->workSheet === null) ? null : $this->workSheet->getParent();
                            $average = Calculation::getInstance($spreadsheet)->calculateFormula($averageFormula, null, $this->workSheet->getCell('A1'));
>>>>>>> 50f5a6f (Initial commit from local project)
                            while (is_array($average)) {
                                $average = array_pop($average);
                            }
                            //    Set above/below rule based on greaterThan or LessTan
                            $operator = ($dynamicRuleType === Rule::AUTOFILTER_RULETYPE_DYNAMIC_ABOVEAVERAGE)
                                ? Rule::AUTOFILTER_COLUMN_RULE_GREATERTHAN
                                : Rule::AUTOFILTER_COLUMN_RULE_LESSTHAN;
                            $ruleValues[] = [
                                'operator' => $operator,
                                'value' => $average,
                            ];
                            $columnFilterTests[$columnID] = [
                                'method' => 'filterTestInCustomDataSet',
                                'arguments' => ['filterRules' => $ruleValues, 'join' => AutoFilter\Column::AUTOFILTER_COLUMN_JOIN_OR],
                            ];
                        } else {
                            //    Date based
                            if ($dynamicRuleType[0] == 'M' || $dynamicRuleType[0] == 'Q') {
                                $periodType = '';
                                $period = 0;
                                //    Month or Quarter
                                sscanf($dynamicRuleType, '%[A-Z]%d', $periodType, $period);
                                if ($periodType == 'M') {
                                    $ruleValues = [$period];
                                } else {
                                    --$period;
                                    $periodEnd = (1 + $period) * 3;
                                    $periodStart = 1 + $period * 3;
                                    $ruleValues = range($periodStart, $periodEnd);
                                }
                                $columnFilterTests[$columnID] = [
                                    'method' => 'filterTestInPeriodDateSet',
                                    'arguments' => $ruleValues,
                                ];
                                $filterColumn->setAttributes([]);
                            } else {
                                //    Date Range
                                $columnFilterTests[$columnID] = $this->dynamicFilterDateRange($dynamicRuleType, $filterColumn);

                                break;
                            }
                        }
                    }

                    break;
                case AutoFilter\Column::AUTOFILTER_FILTERTYPE_TOPTENFILTER:
                    $ruleValues = [];
                    $dataRowCount = $rangeEnd[1] - $rangeStart[1];
                    $toptenRuleType = null;
                    $ruleValue = 0;
                    $ruleOperator = null;
                    foreach ($rules as $rule) {
                        //    We should only ever have one Dynamic Filter Rule anyway
                        $toptenRuleType = $rule->getGrouping();
                        $ruleValue = $rule->getValue();
                        $ruleOperator = $rule->getOperator();
                    }
                    if (is_numeric($ruleValue) && $ruleOperator === Rule::AUTOFILTER_COLUMN_RULE_TOPTEN_PERCENT) {
<<<<<<< HEAD
                        $ruleValue = (int) floor((float) $ruleValue * ($dataRowCount / 100));
=======
                        $ruleValue = floor((float) $ruleValue * ($dataRowCount / 100));
>>>>>>> 50f5a6f (Initial commit from local project)
                    }
                    if (!is_array($ruleValue) && $ruleValue < 1) {
                        $ruleValue = 1;
                    }
                    if (!is_array($ruleValue) && $ruleValue > 500) {
                        $ruleValue = 500;
                    }

<<<<<<< HEAD
                    /** @var float|int|string */
=======
>>>>>>> 50f5a6f (Initial commit from local project)
                    $maxVal = $this->calculateTopTenValue($columnID, $rangeStart[1] + 1, (int) $rangeEnd[1], $toptenRuleType, $ruleValue);

                    $operator = ($toptenRuleType == Rule::AUTOFILTER_COLUMN_RULE_TOPTEN_TOP)
                        ? Rule::AUTOFILTER_COLUMN_RULE_GREATERTHANOREQUAL
                        : Rule::AUTOFILTER_COLUMN_RULE_LESSTHANOREQUAL;
                    $ruleValues[] = ['operator' => $operator, 'value' => $maxVal];
                    $columnFilterTests[$columnID] = [
                        'method' => 'filterTestInCustomDataSet',
                        'arguments' => ['filterRules' => $ruleValues, 'join' => AutoFilter\Column::AUTOFILTER_COLUMN_JOIN_OR],
                    ];
                    $filterColumn->setAttributes(['maxVal' => $maxVal]);

                    break;
            }
        }

        $rangeEnd[1] = $this->autoExtendRange($rangeStart[1], $rangeEnd[1]);

        //    Execute the column tests for each row in the autoFilter range to determine show/hide,
        for ($row = $rangeStart[1] + 1; $row <= $rangeEnd[1]; ++$row) {
            $result = true;
            foreach ($columnFilterTests as $columnID => $columnFilterTest) {
                $cellValue = $this->workSheet->getCell($columnID . $row)->getCalculatedValue();
                //    Execute the filter test
<<<<<<< HEAD
                /** @var callable */
                $temp = [self::class, $columnFilterTest['method']];
                /** @var bool */
                $result // $result && // phpstan says $result is always true here
                    = call_user_func_array($temp, [$cellValue, $columnFilterTest['arguments']]);
=======
                $result = // $result && // phpstan says $result is always true here
                    // @phpstan-ignore-next-line
                    call_user_func_array([self::class, $columnFilterTest['method']], [$cellValue, $columnFilterTest['arguments']]);
>>>>>>> 50f5a6f (Initial commit from local project)
                //    If filter test has resulted in FALSE, exit the loop straightaway rather than running any more tests
                if (!$result) {
                    break;
                }
            }
            //    Set show/hide for the row based on the result of the autoFilter result
<<<<<<< HEAD
            //    If the RowDimension object has not been allocated yet and the row should be visible,
            //    then we can avoid any operation since the rows are visible by default (saves a lot of memory)
            if ($result === false || $this->workSheet->rowDimensionExists((int) $row)) {
                $this->workSheet->getRowDimension((int) $row)->setVisible($result);
            }
=======
            $this->workSheet->getRowDimension((int) $row)->setVisible($result);
>>>>>>> 50f5a6f (Initial commit from local project)
        }
        $this->evaluated = true;

        return $this;
    }

    /**
     * Magic Range Auto-sizing.
     * For a single row rangeSet, we follow MS Excel rules, and search for the first empty row to determine our range.
     */
    public function autoExtendRange(int $startRow, int $endRow): int
    {
        if ($startRow === $endRow && $this->workSheet !== null) {
            try {
                $rowIterator = $this->workSheet->getRowIterator($startRow + 1);
<<<<<<< HEAD
            } catch (Exception) {
=======
            } catch (Exception $e) {
>>>>>>> 50f5a6f (Initial commit from local project)
                // If there are no rows below $startRow
                return $startRow;
            }
            foreach ($rowIterator as $row) {
                if ($row->isEmpty(CellIterator::TREAT_NULL_VALUE_AS_EMPTY_CELL | CellIterator::TREAT_EMPTY_STRING_AS_EMPTY_CELL) === true) {
                    return $row->getRowIndex() - 1;
                }
            }
        }

        return $endRow;
    }

    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
        $vars = get_object_vars($this);
        foreach ($vars as $key => $value) {
            if (is_object($value)) {
                if ($key === 'workSheet') {
                    //    Detach from worksheet
                    $this->{$key} = null;
                } else {
                    $this->{$key} = clone $value;
                }
            } elseif ((is_array($value)) && ($key == 'columns')) {
                //    The columns array of \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet\AutoFilter objects
                $this->{$key} = [];
                foreach ($value as $k => $v) {
<<<<<<< HEAD
                    $this->{$key}[$k] = clone $v; //* @phpstan-ignore-line
=======
                    $this->{$key}[$k] = clone $v;
>>>>>>> 50f5a6f (Initial commit from local project)
                    // attach the new cloned Column to this new cloned Autofilter object
                    $this->{$key}[$k]->setParent($this);
                }
            } else {
                $this->{$key} = $value;
            }
        }
    }

    /**
     * toString method replicates previous behavior by returning the range if object is
     * referenced as a property of its parent.
     */
<<<<<<< HEAD
    public function __toString(): string
=======
    public function __toString()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return (string) $this->range;
    }
}
