<?php

namespace PhpOffice\PhpSpreadsheet\Worksheet;

use ArrayObject;
<<<<<<< HEAD
use Generator;
=======
>>>>>>> 50f5a6f (Initial commit from local project)
use PhpOffice\PhpSpreadsheet\Calculation\Calculation;
use PhpOffice\PhpSpreadsheet\Calculation\Functions;
use PhpOffice\PhpSpreadsheet\Cell\AddressRange;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\CellAddress;
<<<<<<< HEAD
=======
use PhpOffice\PhpSpreadsheet\Cell\CellRange;
>>>>>>> 50f5a6f (Initial commit from local project)
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use PhpOffice\PhpSpreadsheet\Cell\Hyperlink;
use PhpOffice\PhpSpreadsheet\Cell\IValueBinder;
use PhpOffice\PhpSpreadsheet\Chart\Chart;
use PhpOffice\PhpSpreadsheet\Collection\Cells;
use PhpOffice\PhpSpreadsheet\Collection\CellsFactory;
use PhpOffice\PhpSpreadsheet\Comment;
use PhpOffice\PhpSpreadsheet\DefinedName;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\ReferenceHelper;
use PhpOffice\PhpSpreadsheet\RichText\RichText;
use PhpOffice\PhpSpreadsheet\Shared;
<<<<<<< HEAD
use PhpOffice\PhpSpreadsheet\Shared\StringHelper;
=======
>>>>>>> 50f5a6f (Initial commit from local project)
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Conditional;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
<<<<<<< HEAD
use PhpOffice\PhpSpreadsheet\Style\Protection as StyleProtection;
=======
>>>>>>> 50f5a6f (Initial commit from local project)
use PhpOffice\PhpSpreadsheet\Style\Style;

class Worksheet
{
    // Break types
    public const BREAK_NONE = 0;
    public const BREAK_ROW = 1;
    public const BREAK_COLUMN = 2;
    // Maximum column for row break
    public const BREAK_ROW_MAX_COLUMN = 16383;

    // Sheet state
    public const SHEETSTATE_VISIBLE = 'visible';
    public const SHEETSTATE_HIDDEN = 'hidden';
    public const SHEETSTATE_VERYHIDDEN = 'veryHidden';

    public const MERGE_CELL_CONTENT_EMPTY = 'empty';
    public const MERGE_CELL_CONTENT_HIDE = 'hide';
    public const MERGE_CELL_CONTENT_MERGE = 'merge';

<<<<<<< HEAD
    public const FUNCTION_LIKE_GROUPBY = '/\b(groupby|_xleta)\b/i'; // weird new syntax

=======
>>>>>>> 50f5a6f (Initial commit from local project)
    protected const SHEET_NAME_REQUIRES_NO_QUOTES = '/^[_\p{L}][_\p{L}\p{N}]*$/mui';

    /**
     * Maximum 31 characters allowed for sheet title.
     *
     * @var int
     */
    const SHEET_TITLE_MAXIMUM_LENGTH = 31;

    /**
     * Invalid characters in sheet title.
<<<<<<< HEAD
     */
    private const INVALID_CHARACTERS = ['*', ':', '/', '\\', '?', '[', ']'];

    /**
     * Parent spreadsheet.
     */
    private ?Spreadsheet $parent = null;

    /**
     * Collection of cells.
     */
    private Cells $cellCollection;
=======
     *
     * @var array
     */
    private static $invalidCharacters = ['*', ':', '/', '\\', '?', '[', ']'];

    /**
     * Parent spreadsheet.
     *
     * @var ?Spreadsheet
     */
    private $parent;

    /**
     * Collection of cells.
     *
     * @var Cells
     */
    private $cellCollection;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Collection of row dimensions.
     *
     * @var RowDimension[]
     */
<<<<<<< HEAD
    private array $rowDimensions = [];

    /**
     * Default row dimension.
     */
    private RowDimension $defaultRowDimension;
=======
    private $rowDimensions = [];

    /**
     * Default row dimension.
     *
     * @var RowDimension
     */
    private $defaultRowDimension;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Collection of column dimensions.
     *
     * @var ColumnDimension[]
     */
<<<<<<< HEAD
    private array $columnDimensions = [];

    /**
     * Default column dimension.
     */
    private ColumnDimension $defaultColumnDimension;
=======
    private $columnDimensions = [];

    /**
     * Default column dimension.
     *
     * @var ColumnDimension
     */
    private $defaultColumnDimension;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Collection of drawings.
     *
     * @var ArrayObject<int, BaseDrawing>
     */
<<<<<<< HEAD
    private ArrayObject $drawingCollection;
=======
    private $drawingCollection;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Collection of Chart objects.
     *
     * @var ArrayObject<int, Chart>
     */
<<<<<<< HEAD
    private ArrayObject $chartCollection;
=======
    private $chartCollection;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Collection of Table objects.
     *
     * @var ArrayObject<int, Table>
     */
<<<<<<< HEAD
    private ArrayObject $tableCollection;

    /**
     * Worksheet title.
     */
    private string $title = '';

    /**
     * Sheet state.
     */
    private string $sheetState;

    /**
     * Page setup.
     */
    private PageSetup $pageSetup;

    /**
     * Page margins.
     */
    private PageMargins $pageMargins;

    /**
     * Page header/footer.
     */
    private HeaderFooter $headerFooter;

    /**
     * Sheet view.
     */
    private SheetView $sheetView;

    /**
     * Protection.
     */
    private Protection $protection;

    /**
     * Conditional styles. Indexed by cell coordinate, e.g. 'A1'.
     */
    private array $conditionalStylesCollection = [];
=======
    private $tableCollection;

    /**
     * Worksheet title.
     *
     * @var string
     */
    private $title;

    /**
     * Sheet state.
     *
     * @var string
     */
    private $sheetState;

    /**
     * Page setup.
     *
     * @var PageSetup
     */
    private $pageSetup;

    /**
     * Page margins.
     *
     * @var PageMargins
     */
    private $pageMargins;

    /**
     * Page header/footer.
     *
     * @var HeaderFooter
     */
    private $headerFooter;

    /**
     * Sheet view.
     *
     * @var SheetView
     */
    private $sheetView;

    /**
     * Protection.
     *
     * @var Protection
     */
    private $protection;

    /**
     * Collection of styles.
     *
     * @var Style[]
     */
    private $styles = [];

    /**
     * Conditional styles. Indexed by cell coordinate, e.g. 'A1'.
     *
     * @var array
     */
    private $conditionalStylesCollection = [];
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Collection of row breaks.
     *
     * @var PageBreak[]
     */
<<<<<<< HEAD
    private array $rowBreaks = [];
=======
    private $rowBreaks = [];
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Collection of column breaks.
     *
     * @var PageBreak[]
     */
<<<<<<< HEAD
    private array $columnBreaks = [];
=======
    private $columnBreaks = [];
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Collection of merged cell ranges.
     *
     * @var string[]
     */
<<<<<<< HEAD
    private array $mergeCells = [];
=======
    private $mergeCells = [];
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Collection of protected cell ranges.
     *
<<<<<<< HEAD
     * @var ProtectedRange[]
     */
    private array $protectedCells = [];

    /**
     * Autofilter Range and selection.
     */
    private AutoFilter $autoFilter;

    /**
     * Freeze pane.
     */
    private ?string $freezePane = null;

    /**
     * Default position of the right bottom pane.
     */
    private ?string $topLeftCell = null;

    private string $paneTopLeftCell = '';

    private string $activePane = '';

    private int $xSplit = 0;

    private int $ySplit = 0;

    private string $paneState = '';

    /**
     * Properties of the 4 panes.
     *
     * @var (null|Pane)[]
     */
    private array $panes = [
        'bottomRight' => null,
        'bottomLeft' => null,
        'topRight' => null,
        'topLeft' => null,
    ];

    /**
     * Show gridlines?
     */
    private bool $showGridlines = true;

    /**
     * Print gridlines?
     */
    private bool $printGridlines = false;

    /**
     * Show row and column headers?
     */
    private bool $showRowColHeaders = true;

    /**
     * Show summary below? (Row/Column outline).
     */
    private bool $showSummaryBelow = true;

    /**
     * Show summary right? (Row/Column outline).
     */
    private bool $showSummaryRight = true;
=======
     * @var string[]
     */
    private $protectedCells = [];

    /**
     * Autofilter Range and selection.
     *
     * @var AutoFilter
     */
    private $autoFilter;

    /**
     * Freeze pane.
     *
     * @var null|string
     */
    private $freezePane;

    /**
     * Default position of the right bottom pane.
     *
     * @var null|string
     */
    private $topLeftCell;

    /**
     * Show gridlines?
     *
     * @var bool
     */
    private $showGridlines = true;

    /**
     * Print gridlines?
     *
     * @var bool
     */
    private $printGridlines = false;

    /**
     * Show row and column headers?
     *
     * @var bool
     */
    private $showRowColHeaders = true;

    /**
     * Show summary below? (Row/Column outline).
     *
     * @var bool
     */
    private $showSummaryBelow = true;

    /**
     * Show summary right? (Row/Column outline).
     *
     * @var bool
     */
    private $showSummaryRight = true;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Collection of comments.
     *
     * @var Comment[]
     */
<<<<<<< HEAD
    private array $comments = [];

    /**
     * Active cell. (Only one!).
     */
    private string $activeCell = 'A1';

    /**
     * Selected cells.
     */
    private string $selectedCells = 'A1';

    /**
     * Cached highest column.
     */
    private int $cachedHighestColumn = 1;

    /**
     * Cached highest row.
     */
    private int $cachedHighestRow = 1;

    /**
     * Right-to-left?
     */
    private bool $rightToLeft = false;

    /**
     * Hyperlinks. Indexed by cell coordinate, e.g. 'A1'.
     */
    private array $hyperlinkCollection = [];

    /**
     * Data validation objects. Indexed by cell coordinate, e.g. 'A1'.
     * Index can include ranges, and multiple cells/ranges.
     */
    private array $dataValidationCollection = [];

    /**
     * Tab color.
     */
    private ?Color $tabColor = null;

    /**
     * Hash.
     */
    private int $hash;

    /**
     * CodeName.
     */
    private ?string $codeName = null;

    /**
     * Create a new worksheet.
     */
    public function __construct(?Spreadsheet $parent = null, string $title = 'Worksheet')
=======
    private $comments = [];

    /**
     * Active cell. (Only one!).
     *
     * @var string
     */
    private $activeCell = 'A1';

    /**
     * Selected cells.
     *
     * @var string
     */
    private $selectedCells = 'A1';

    /**
     * Cached highest column.
     *
     * @var int
     */
    private $cachedHighestColumn = 1;

    /**
     * Cached highest row.
     *
     * @var int
     */
    private $cachedHighestRow = 1;

    /**
     * Right-to-left?
     *
     * @var bool
     */
    private $rightToLeft = false;

    /**
     * Hyperlinks. Indexed by cell coordinate, e.g. 'A1'.
     *
     * @var array
     */
    private $hyperlinkCollection = [];

    /**
     * Data validation objects. Indexed by cell coordinate, e.g. 'A1'.
     *
     * @var array
     */
    private $dataValidationCollection = [];

    /**
     * Tab color.
     *
     * @var null|Color
     */
    private $tabColor;

    /**
     * Hash.
     *
     * @var int
     */
    private $hash;

    /**
     * CodeName.
     *
     * @var string
     */
    private $codeName;

    /**
     * Create a new worksheet.
     *
     * @param string $title
     */
    public function __construct(?Spreadsheet $parent = null, $title = 'Worksheet')
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // Set parent and title
        $this->parent = $parent;
        $this->hash = spl_object_id($this);
        $this->setTitle($title, false);
        // setTitle can change $pTitle
        $this->setCodeName($this->getTitle());
        $this->setSheetState(self::SHEETSTATE_VISIBLE);

        $this->cellCollection = CellsFactory::getInstance($this);
        // Set page setup
        $this->pageSetup = new PageSetup();
        // Set page margins
        $this->pageMargins = new PageMargins();
        // Set page header/footer
        $this->headerFooter = new HeaderFooter();
        // Set sheet view
        $this->sheetView = new SheetView();
        // Drawing collection
        $this->drawingCollection = new ArrayObject();
        // Chart collection
        $this->chartCollection = new ArrayObject();
        // Protection
        $this->protection = new Protection();
        // Default row dimension
        $this->defaultRowDimension = new RowDimension(null);
        // Default column dimension
        $this->defaultColumnDimension = new ColumnDimension(null);
        // AutoFilter
        $this->autoFilter = new AutoFilter('', $this);
        // Table collection
        $this->tableCollection = new ArrayObject();
    }

    /**
     * Disconnect all cells from this Worksheet object,
     * typically so that the worksheet object can be unset.
     */
    public function disconnectCells(): void
    {
<<<<<<< HEAD
        if (isset($this->cellCollection)) {
            $this->cellCollection->unsetWorksheetCells();
            unset($this->cellCollection);
=======
        if ($this->cellCollection !== null) {
            $this->cellCollection->unsetWorksheetCells();
            // @phpstan-ignore-next-line
            $this->cellCollection = null;
>>>>>>> 50f5a6f (Initial commit from local project)
        }
        //    detach ourself from the workbook, so that it can then delete this worksheet successfully
        $this->parent = null;
    }

    /**
     * Code to execute when this worksheet is unset().
     */
    public function __destruct()
    {
        Calculation::getInstance($this->parent)->clearCalculationCacheForWorksheet($this->title);

        $this->disconnectCells();
<<<<<<< HEAD
        unset($this->rowDimensions, $this->columnDimensions, $this->tableCollection, $this->drawingCollection, $this->chartCollection, $this->autoFilter);
=======
        $this->rowDimensions = [];
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    public function __wakeup(): void
    {
        $this->hash = spl_object_id($this);
<<<<<<< HEAD
=======
        $this->parent = null;
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * Return the cell collection.
<<<<<<< HEAD
     */
    public function getCellCollection(): Cells
=======
     *
     * @return Cells
     */
    public function getCellCollection()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->cellCollection;
    }

    /**
     * Get array of invalid characters for sheet title.
<<<<<<< HEAD
     */
    public static function getInvalidCharacters(): array
    {
        return self::INVALID_CHARACTERS;
=======
     *
     * @return array
     */
    public static function getInvalidCharacters()
    {
        return self::$invalidCharacters;
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * Check sheet code name for valid Excel syntax.
     *
     * @param string $sheetCodeName The string to check
     *
     * @return string The valid string
     */
<<<<<<< HEAD
    private static function checkSheetCodeName(string $sheetCodeName): string
    {
        $charCount = StringHelper::countCharacters($sheetCodeName);
=======
    private static function checkSheetCodeName($sheetCodeName)
    {
        $charCount = Shared\StringHelper::countCharacters($sheetCodeName);
>>>>>>> 50f5a6f (Initial commit from local project)
        if ($charCount == 0) {
            throw new Exception('Sheet code name cannot be empty.');
        }
        // Some of the printable ASCII characters are invalid:  * : / \ ? [ ] and  first and last characters cannot be a "'"
        if (
<<<<<<< HEAD
            (str_replace(self::INVALID_CHARACTERS, '', $sheetCodeName) !== $sheetCodeName)
            || (StringHelper::substring($sheetCodeName, -1, 1) == '\'')
            || (StringHelper::substring($sheetCodeName, 0, 1) == '\'')
=======
            (str_replace(self::$invalidCharacters, '', $sheetCodeName) !== $sheetCodeName) ||
            (Shared\StringHelper::substring($sheetCodeName, -1, 1) == '\'') ||
            (Shared\StringHelper::substring($sheetCodeName, 0, 1) == '\'')
>>>>>>> 50f5a6f (Initial commit from local project)
        ) {
            throw new Exception('Invalid character found in sheet code name');
        }

        // Enforce maximum characters allowed for sheet title
        if ($charCount > self::SHEET_TITLE_MAXIMUM_LENGTH) {
            throw new Exception('Maximum ' . self::SHEET_TITLE_MAXIMUM_LENGTH . ' characters allowed in sheet code name.');
        }

        return $sheetCodeName;
    }

    /**
     * Check sheet title for valid Excel syntax.
     *
     * @param string $sheetTitle The string to check
     *
     * @return string The valid string
     */
<<<<<<< HEAD
    private static function checkSheetTitle(string $sheetTitle): string
    {
        // Some of the printable ASCII characters are invalid:  * : / \ ? [ ]
        if (str_replace(self::INVALID_CHARACTERS, '', $sheetTitle) !== $sheetTitle) {
=======
    private static function checkSheetTitle($sheetTitle)
    {
        // Some of the printable ASCII characters are invalid:  * : / \ ? [ ]
        if (str_replace(self::$invalidCharacters, '', $sheetTitle) !== $sheetTitle) {
>>>>>>> 50f5a6f (Initial commit from local project)
            throw new Exception('Invalid character found in sheet title');
        }

        // Enforce maximum characters allowed for sheet title
<<<<<<< HEAD
        if (StringHelper::countCharacters($sheetTitle) > self::SHEET_TITLE_MAXIMUM_LENGTH) {
=======
        if (Shared\StringHelper::countCharacters($sheetTitle) > self::SHEET_TITLE_MAXIMUM_LENGTH) {
>>>>>>> 50f5a6f (Initial commit from local project)
            throw new Exception('Maximum ' . self::SHEET_TITLE_MAXIMUM_LENGTH . ' characters allowed in sheet title.');
        }

        return $sheetTitle;
    }

    /**
     * Get a sorted list of all cell coordinates currently held in the collection by row and column.
     *
     * @param bool $sorted Also sort the cell collection?
     *
     * @return string[]
     */
<<<<<<< HEAD
    public function getCoordinates(bool $sorted = true): array
    {
        if (!isset($this->cellCollection)) {
=======
    public function getCoordinates($sorted = true)
    {
        if ($this->cellCollection == null) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return [];
        }

        if ($sorted) {
            return $this->cellCollection->getSortedCoordinates();
        }

        return $this->cellCollection->getCoordinates();
    }

    /**
     * Get collection of row dimensions.
     *
     * @return RowDimension[]
     */
<<<<<<< HEAD
    public function getRowDimensions(): array
=======
    public function getRowDimensions()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->rowDimensions;
    }

    /**
     * Get default row dimension.
<<<<<<< HEAD
     */
    public function getDefaultRowDimension(): RowDimension
=======
     *
     * @return RowDimension
     */
    public function getDefaultRowDimension()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->defaultRowDimension;
    }

    /**
     * Get collection of column dimensions.
     *
     * @return ColumnDimension[]
     */
<<<<<<< HEAD
    public function getColumnDimensions(): array
    {
        /** @var callable $callable */
=======
    public function getColumnDimensions()
    {
        /** @var callable */
>>>>>>> 50f5a6f (Initial commit from local project)
        $callable = [self::class, 'columnDimensionCompare'];
        uasort($this->columnDimensions, $callable);

        return $this->columnDimensions;
    }

    private static function columnDimensionCompare(ColumnDimension $a, ColumnDimension $b): int
    {
        return $a->getColumnNumeric() - $b->getColumnNumeric();
    }

    /**
     * Get default column dimension.
<<<<<<< HEAD
     */
    public function getDefaultColumnDimension(): ColumnDimension
=======
     *
     * @return ColumnDimension
     */
    public function getDefaultColumnDimension()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->defaultColumnDimension;
    }

    /**
     * Get collection of drawings.
     *
     * @return ArrayObject<int, BaseDrawing>
     */
<<<<<<< HEAD
    public function getDrawingCollection(): ArrayObject
=======
    public function getDrawingCollection()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->drawingCollection;
    }

    /**
     * Get collection of charts.
     *
     * @return ArrayObject<int, Chart>
     */
<<<<<<< HEAD
    public function getChartCollection(): ArrayObject
=======
    public function getChartCollection()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->chartCollection;
    }

<<<<<<< HEAD
    public function addChart(Chart $chart): Chart
    {
        $chart->setWorksheet($this);
        $this->chartCollection[] = $chart;
=======
    /**
     * Add chart.
     *
     * @param null|int $chartIndex Index where chart should go (0,1,..., or null for last)
     *
     * @return Chart
     */
    public function addChart(Chart $chart, $chartIndex = null)
    {
        $chart->setWorksheet($this);
        if ($chartIndex === null) {
            $this->chartCollection[] = $chart;
        } else {
            // Insert the chart at the requested index
            // @phpstan-ignore-next-line
            array_splice(/** @scrutinizer ignore-type */ $this->chartCollection, $chartIndex, 0, [$chart]);
        }
>>>>>>> 50f5a6f (Initial commit from local project)

        return $chart;
    }

    /**
     * Return the count of charts on this worksheet.
     *
     * @return int The number of charts
     */
<<<<<<< HEAD
    public function getChartCount(): int
=======
    public function getChartCount()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return count($this->chartCollection);
    }

    /**
     * Get a chart by its index position.
     *
     * @param ?string $index Chart index position
     *
     * @return Chart|false
     */
<<<<<<< HEAD
    public function getChartByIndex(?string $index)
=======
    public function getChartByIndex($index)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $chartCount = count($this->chartCollection);
        if ($chartCount == 0) {
            return false;
        }
        if ($index === null) {
            $index = --$chartCount;
        }
        if (!isset($this->chartCollection[$index])) {
            return false;
        }

        return $this->chartCollection[$index];
    }

    /**
     * Return an array of the names of charts on this worksheet.
     *
     * @return string[] The names of charts
     */
<<<<<<< HEAD
    public function getChartNames(): array
=======
    public function getChartNames()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $chartNames = [];
        foreach ($this->chartCollection as $chart) {
            $chartNames[] = $chart->getName();
        }

        return $chartNames;
    }

    /**
     * Get a chart by name.
     *
     * @param string $chartName Chart name
     *
     * @return Chart|false
     */
<<<<<<< HEAD
    public function getChartByName(string $chartName)
=======
    public function getChartByName($chartName)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        foreach ($this->chartCollection as $index => $chart) {
            if ($chart->getName() == $chartName) {
                return $chart;
            }
        }

        return false;
    }

<<<<<<< HEAD
    public function getChartByNameOrThrow(string $chartName): Chart
    {
        $chart = $this->getChartByName($chartName);
        if ($chart !== false) {
            return $chart;
        }

        throw new Exception("Sheet does not have a chart named $chartName.");
    }

=======
>>>>>>> 50f5a6f (Initial commit from local project)
    /**
     * Refresh column dimensions.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function refreshColumnDimensions(): static
=======
    public function refreshColumnDimensions()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $newColumnDimensions = [];
        foreach ($this->getColumnDimensions() as $objColumnDimension) {
            $newColumnDimensions[$objColumnDimension->getColumnIndex()] = $objColumnDimension;
        }

        $this->columnDimensions = $newColumnDimensions;

        return $this;
    }

    /**
     * Refresh row dimensions.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function refreshRowDimensions(): static
=======
    public function refreshRowDimensions()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $newRowDimensions = [];
        foreach ($this->getRowDimensions() as $objRowDimension) {
            $newRowDimensions[$objRowDimension->getRowIndex()] = $objRowDimension;
        }

        $this->rowDimensions = $newRowDimensions;

        return $this;
    }

    /**
     * Calculate worksheet dimension.
     *
     * @return string String containing the dimension of this worksheet
     */
<<<<<<< HEAD
    public function calculateWorksheetDimension(): string
=======
    public function calculateWorksheetDimension()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // Return
        return 'A1:' . $this->getHighestColumn() . $this->getHighestRow();
    }

    /**
     * Calculate worksheet data dimension.
     *
     * @return string String containing the dimension of this worksheet that actually contain data
     */
<<<<<<< HEAD
    public function calculateWorksheetDataDimension(): string
=======
    public function calculateWorksheetDataDimension()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // Return
        return 'A1:' . $this->getHighestDataColumn() . $this->getHighestDataRow();
    }

    /**
     * Calculate widths for auto-size columns.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function calculateColumnWidths(): static
    {
        $activeSheet = $this->getParent()?->getActiveSheetIndex();
        $selectedCells = $this->selectedCells;
=======
    public function calculateColumnWidths()
    {
>>>>>>> 50f5a6f (Initial commit from local project)
        // initialize $autoSizes array
        $autoSizes = [];
        foreach ($this->getColumnDimensions() as $colDimension) {
            if ($colDimension->getAutoSize()) {
                $autoSizes[$colDimension->getColumnIndex()] = -1;
            }
        }

        // There is only something to do if there are some auto-size columns
        if (!empty($autoSizes)) {
<<<<<<< HEAD
            $holdActivePane = $this->activePane;
=======
>>>>>>> 50f5a6f (Initial commit from local project)
            // build list of cells references that participate in a merge
            $isMergeCell = [];
            foreach ($this->getMergeCells() as $cells) {
                foreach (Coordinate::extractAllCellReferencesInRange($cells) as $cellReference) {
                    $isMergeCell[$cellReference] = true;
                }
            }

            $autoFilterIndentRanges = (new AutoFit($this))->getAutoFilterIndentRanges();

            // loop through all cells in the worksheet
            foreach ($this->getCoordinates(false) as $coordinate) {
                $cell = $this->getCellOrNull($coordinate);

                if ($cell !== null && isset($autoSizes[$this->cellCollection->getCurrentColumn()])) {
                    //Determine if cell is in merge range
                    $isMerged = isset($isMergeCell[$this->cellCollection->getCurrentCoordinate()]);

                    //By default merged cells should be ignored
                    $isMergedButProceed = false;

                    //The only exception is if it's a merge range value cell of a 'vertical' range (1 column wide)
                    if ($isMerged && $cell->isMergeRangeValueCell()) {
                        $range = (string) $cell->getMergeRange();
                        $rangeBoundaries = Coordinate::rangeDimension($range);
                        if ($rangeBoundaries[0] === 1) {
                            $isMergedButProceed = true;
                        }
                    }

                    // Determine width if cell is not part of a merge or does and is a value cell of 1-column wide range
                    if (!$isMerged || $isMergedButProceed) {
                        // Determine if we need to make an adjustment for the first row in an AutoFilter range that
                        //    has a column filter dropdown
                        $filterAdjustment = false;
                        if (!empty($autoFilterIndentRanges)) {
                            foreach ($autoFilterIndentRanges as $autoFilterFirstRowRange) {
                                if ($cell->isInRange($autoFilterFirstRowRange)) {
                                    $filterAdjustment = true;

                                    break;
                                }
                            }
                        }

                        $indentAdjustment = $cell->getStyle()->getAlignment()->getIndent();
                        $indentAdjustment += (int) ($cell->getStyle()->getAlignment()->getHorizontal() === Alignment::HORIZONTAL_CENTER);

                        // Calculated value
                        // To formatted string
                        $cellValue = NumberFormat::toFormattedString(
<<<<<<< HEAD
                            $cell->getCalculatedValueString(),
                            (string) $this->getParentOrThrow()->getCellXfByIndex($cell->getXfIndex())
                                ->getNumberFormat()->getFormatCode(true)
                        );

                        if ($cellValue !== '') {
=======
                            $cell->getCalculatedValue(),
                            (string) $this->getParentOrThrow()->getCellXfByIndex($cell->getXfIndex())
                                ->getNumberFormat()->getFormatCode()
                        );

                        if ($cellValue !== null && $cellValue !== '') {
>>>>>>> 50f5a6f (Initial commit from local project)
                            $autoSizes[$this->cellCollection->getCurrentColumn()] = max(
                                $autoSizes[$this->cellCollection->getCurrentColumn()],
                                round(
                                    Shared\Font::calculateColumnWidth(
                                        $this->getParentOrThrow()->getCellXfByIndex($cell->getXfIndex())->getFont(),
                                        $cellValue,
                                        (int) $this->getParentOrThrow()->getCellXfByIndex($cell->getXfIndex())
                                            ->getAlignment()->getTextRotation(),
                                        $this->getParentOrThrow()->getDefaultStyle()->getFont(),
                                        $filterAdjustment,
                                        $indentAdjustment
                                    ),
                                    3
                                )
                            );
                        }
                    }
                }
            }

            // adjust column widths
            foreach ($autoSizes as $columnIndex => $width) {
                if ($width == -1) {
                    $width = $this->getDefaultColumnDimension()->getWidth();
                }
                $this->getColumnDimension($columnIndex)->setWidth($width);
            }
<<<<<<< HEAD
            $this->activePane = $holdActivePane;
        }
        if ($activeSheet !== null && $activeSheet >= 0) {
            $this->getParent()?->setActiveSheetIndex($activeSheet);
        }
        $this->setSelectedCells($selectedCells);
=======
        }
>>>>>>> 50f5a6f (Initial commit from local project)

        return $this;
    }

    /**
     * Get parent or null.
     */
    public function getParent(): ?Spreadsheet
    {
        return $this->parent;
    }

    /**
     * Get parent, throw exception if null.
     */
    public function getParentOrThrow(): Spreadsheet
    {
        if ($this->parent !== null) {
            return $this->parent;
        }

        throw new Exception('Sheet does not have a parent.');
    }

    /**
     * Re-bind parent.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function rebindParent(Spreadsheet $parent): static
=======
    public function rebindParent(Spreadsheet $parent)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($this->parent !== null) {
            $definedNames = $this->parent->getDefinedNames();
            foreach ($definedNames as $definedName) {
                $parent->addDefinedName($definedName);
            }

            $this->parent->removeSheetByIndex(
                $this->parent->getIndex($this)
            );
        }
        $this->parent = $parent;

        return $this;
    }

<<<<<<< HEAD
    public function setParent(Spreadsheet $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get title.
     */
    public function getTitle(): string
=======
    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->title;
    }

    /**
     * Set title.
     *
     * @param string $title String containing the dimension of this worksheet
     * @param bool $updateFormulaCellReferences Flag indicating whether cell references in formulae should
     *            be updated to reflect the new sheet name.
     *          This should be left as the default true, unless you are
     *          certain that no formula cells on any worksheet contain
     *          references to this worksheet
     * @param bool $validate False to skip validation of new title. WARNING: This should only be set
     *                       at parse time (by Readers), where titles can be assumed to be valid.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setTitle(string $title, bool $updateFormulaCellReferences = true, bool $validate = true): static
=======
    public function setTitle($title, $updateFormulaCellReferences = true, $validate = true)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // Is this a 'rename' or not?
        if ($this->getTitle() == $title) {
            return $this;
        }

        // Old title
        $oldTitle = $this->getTitle();

        if ($validate) {
            // Syntax check
            self::checkSheetTitle($title);

            if ($this->parent && $this->parent->getIndex($this, true) >= 0) {
                // Is there already such sheet name?
                if ($this->parent->sheetNameExists($title)) {
                    // Use name, but append with lowest possible integer

<<<<<<< HEAD
                    if (StringHelper::countCharacters($title) > 29) {
                        $title = StringHelper::substring($title, 0, 29);
=======
                    if (Shared\StringHelper::countCharacters($title) > 29) {
                        $title = Shared\StringHelper::substring($title, 0, 29);
>>>>>>> 50f5a6f (Initial commit from local project)
                    }
                    $i = 1;
                    while ($this->parent->sheetNameExists($title . ' ' . $i)) {
                        ++$i;
                        if ($i == 10) {
<<<<<<< HEAD
                            if (StringHelper::countCharacters($title) > 28) {
                                $title = StringHelper::substring($title, 0, 28);
                            }
                        } elseif ($i == 100) {
                            if (StringHelper::countCharacters($title) > 27) {
                                $title = StringHelper::substring($title, 0, 27);
=======
                            if (Shared\StringHelper::countCharacters($title) > 28) {
                                $title = Shared\StringHelper::substring($title, 0, 28);
                            }
                        } elseif ($i == 100) {
                            if (Shared\StringHelper::countCharacters($title) > 27) {
                                $title = Shared\StringHelper::substring($title, 0, 27);
>>>>>>> 50f5a6f (Initial commit from local project)
                            }
                        }
                    }

                    $title .= " $i";
                }
            }
        }

        // Set title
        $this->title = $title;

        if ($this->parent && $this->parent->getIndex($this, true) >= 0 && $this->parent->getCalculationEngine()) {
            // New title
            $newTitle = $this->getTitle();
            $this->parent->getCalculationEngine()
                ->renameCalculationCacheForWorksheet($oldTitle, $newTitle);
            if ($updateFormulaCellReferences) {
                ReferenceHelper::getInstance()->updateNamedFormulae($this->parent, $oldTitle, $newTitle);
            }
        }

        return $this;
    }

    /**
     * Get sheet state.
     *
     * @return string Sheet state (visible, hidden, veryHidden)
     */
<<<<<<< HEAD
    public function getSheetState(): string
=======
    public function getSheetState()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->sheetState;
    }

    /**
     * Set sheet state.
     *
     * @param string $value Sheet state (visible, hidden, veryHidden)
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setSheetState(string $value): static
=======
    public function setSheetState($value)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->sheetState = $value;

        return $this;
    }

    /**
     * Get page setup.
<<<<<<< HEAD
     */
    public function getPageSetup(): PageSetup
=======
     *
     * @return PageSetup
     */
    public function getPageSetup()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->pageSetup;
    }

    /**
     * Set page setup.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setPageSetup(PageSetup $pageSetup): static
=======
    public function setPageSetup(PageSetup $pageSetup)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->pageSetup = $pageSetup;

        return $this;
    }

    /**
     * Get page margins.
<<<<<<< HEAD
     */
    public function getPageMargins(): PageMargins
=======
     *
     * @return PageMargins
     */
    public function getPageMargins()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->pageMargins;
    }

    /**
     * Set page margins.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setPageMargins(PageMargins $pageMargins): static
=======
    public function setPageMargins(PageMargins $pageMargins)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->pageMargins = $pageMargins;

        return $this;
    }

    /**
     * Get page header/footer.
<<<<<<< HEAD
     */
    public function getHeaderFooter(): HeaderFooter
=======
     *
     * @return HeaderFooter
     */
    public function getHeaderFooter()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->headerFooter;
    }

    /**
     * Set page header/footer.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setHeaderFooter(HeaderFooter $headerFooter): static
=======
    public function setHeaderFooter(HeaderFooter $headerFooter)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->headerFooter = $headerFooter;

        return $this;
    }

    /**
     * Get sheet view.
<<<<<<< HEAD
     */
    public function getSheetView(): SheetView
=======
     *
     * @return SheetView
     */
    public function getSheetView()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->sheetView;
    }

    /**
     * Set sheet view.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setSheetView(SheetView $sheetView): static
=======
    public function setSheetView(SheetView $sheetView)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->sheetView = $sheetView;

        return $this;
    }

    /**
     * Get Protection.
<<<<<<< HEAD
     */
    public function getProtection(): Protection
=======
     *
     * @return Protection
     */
    public function getProtection()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->protection;
    }

    /**
     * Set Protection.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setProtection(Protection $protection): static
=======
    public function setProtection(Protection $protection)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->protection = $protection;

        return $this;
    }

    /**
     * Get highest worksheet column.
     *
     * @param null|int|string $row Return the data highest column for the specified row,
     *                                     or the highest column of any row if no row number is passed
     *
     * @return string Highest column name
     */
<<<<<<< HEAD
    public function getHighestColumn($row = null): string
=======
    public function getHighestColumn($row = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($row === null) {
            return Coordinate::stringFromColumnIndex($this->cachedHighestColumn);
        }

        return $this->getHighestDataColumn($row);
    }

    /**
     * Get highest worksheet column that contains data.
     *
     * @param null|int|string $row Return the highest data column for the specified row,
     *                                     or the highest data column of any row if no row number is passed
     *
     * @return string Highest column name that contains data
     */
<<<<<<< HEAD
    public function getHighestDataColumn($row = null): string
=======
    public function getHighestDataColumn($row = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->cellCollection->getHighestColumn($row);
    }

    /**
     * Get highest worksheet row.
     *
     * @param null|string $column Return the highest data row for the specified column,
     *                                     or the highest row of any column if no column letter is passed
     *
     * @return int Highest row number
     */
<<<<<<< HEAD
    public function getHighestRow(?string $column = null): int
=======
    public function getHighestRow($column = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($column === null) {
            return $this->cachedHighestRow;
        }

        return $this->getHighestDataRow($column);
    }

    /**
     * Get highest worksheet row that contains data.
     *
     * @param null|string $column Return the highest data row for the specified column,
     *                                     or the highest data row of any column if no column letter is passed
     *
     * @return int Highest row number that contains data
     */
<<<<<<< HEAD
    public function getHighestDataRow(?string $column = null): int
=======
    public function getHighestDataRow($column = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->cellCollection->getHighestRow($column);
    }

    /**
     * Get highest worksheet column and highest row that have cell records.
     *
     * @return array Highest column name and highest row number
     */
<<<<<<< HEAD
    public function getHighestRowAndColumn(): array
=======
    public function getHighestRowAndColumn()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->cellCollection->getHighestRowAndColumn();
    }

    /**
     * Set a cell value.
     *
<<<<<<< HEAD
     * @param array{0: int, 1: int}|CellAddress|string $coordinate Coordinate of the cell as a string, eg: 'C5';
=======
     * @param array<int>|CellAddress|string $coordinate Coordinate of the cell as a string, eg: 'C5';
>>>>>>> 50f5a6f (Initial commit from local project)
     *               or as an array of [$columnIndex, $row] (e.g. [3, 5]), or a CellAddress object.
     * @param mixed $value Value for the cell
     * @param null|IValueBinder $binder Value Binder to override the currently set Value Binder
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setCellValue(CellAddress|string|array $coordinate, mixed $value, ?IValueBinder $binder = null): static
=======
    public function setCellValue($coordinate, $value, ?IValueBinder $binder = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $cellAddress = Functions::trimSheetFromCellReference(Validations::validateCellAddress($coordinate));
        $this->getCell($cellAddress)->setValue($value, $binder);

        return $this;
    }

    /**
<<<<<<< HEAD
     * Set a cell value.
     *
     * @param array{0: int, 1: int}|CellAddress|string $coordinate Coordinate of the cell as a string, eg: 'C5';
=======
     * Set a cell value by using numeric cell coordinates.
     *
     * @deprecated 1.23.0
     *      Use the setCellValue() method with a cell address such as 'C5' instead;,
     *          or passing in an array of [$columnIndex, $row] (e.g. [3, 5]), or a CellAddress object.
     * @see Worksheet::setCellValue()
     *
     * @param int $columnIndex Numeric column coordinate of the cell
     * @param int $row Numeric row coordinate of the cell
     * @param mixed $value Value of the cell
     * @param null|IValueBinder $binder Value Binder to override the currently set Value Binder
     *
     * @return $this
     */
    public function setCellValueByColumnAndRow($columnIndex, $row, $value, ?IValueBinder $binder = null)
    {
        $this->getCell(Coordinate::stringFromColumnIndex($columnIndex) . $row)->setValue($value, $binder);

        return $this;
    }

    /**
     * Set a cell value.
     *
     * @param array<int>|CellAddress|string $coordinate Coordinate of the cell as a string, eg: 'C5';
>>>>>>> 50f5a6f (Initial commit from local project)
     *               or as an array of [$columnIndex, $row] (e.g. [3, 5]), or a CellAddress object.
     * @param mixed $value Value of the cell
     * @param string $dataType Explicit data type, see DataType::TYPE_*
     *        Note that PhpSpreadsheet does not validate that the value and datatype are consistent, in using this
     *             method, then it is your responsibility as an end-user developer to validate that the value and
     *             the datatype match.
     *       If you do mismatch value and datatpe, then the value you enter may be changed to match the datatype
     *          that you specify.
     *
     * @see DataType
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setCellValueExplicit(CellAddress|string|array $coordinate, mixed $value, string $dataType): static
=======
    public function setCellValueExplicit($coordinate, $value, $dataType)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $cellAddress = Functions::trimSheetFromCellReference(Validations::validateCellAddress($coordinate));
        $this->getCell($cellAddress)->setValueExplicit($value, $dataType);

        return $this;
    }

    /**
<<<<<<< HEAD
     * Get cell at a specific coordinate.
     *
     * @param array{0: int, 1: int}|CellAddress|string $coordinate Coordinate of the cell as a string, eg: 'C5';
=======
     * Set a cell value by using numeric cell coordinates.
     *
     * @deprecated 1.23.0
     *      Use the setCellValueExplicit() method with a cell address such as 'C5' instead;,
     *          or passing in an array of [$columnIndex, $row] (e.g. [3, 5]), or a CellAddress object.
     * @see Worksheet::setCellValueExplicit()
     *
     * @param int $columnIndex Numeric column coordinate of the cell
     * @param int $row Numeric row coordinate of the cell
     * @param mixed $value Value of the cell
     * @param string $dataType Explicit data type, see DataType::TYPE_*
     *        Note that PhpSpreadsheet does not validate that the value and datatype are consistent, in using this
     *             method, then it is your responsibility as an end-user developer to validate that the value and
     *             the datatype match.
     *       If you do mismatch value and datatpe, then the value you enter may be changed to match the datatype
     *          that you specify.
     *
     * @see DataType
     *
     * @return $this
     */
    public function setCellValueExplicitByColumnAndRow($columnIndex, $row, $value, $dataType)
    {
        $this->getCell(Coordinate::stringFromColumnIndex($columnIndex) . $row)->setValueExplicit($value, $dataType);

        return $this;
    }

    /**
     * Get cell at a specific coordinate.
     *
     * @param array<int>|CellAddress|string $coordinate Coordinate of the cell as a string, eg: 'C5';
>>>>>>> 50f5a6f (Initial commit from local project)
     *               or as an array of [$columnIndex, $row] (e.g. [3, 5]), or a CellAddress object.
     *
     * @return Cell Cell that was found or created
     *              WARNING: Because the cell collection can be cached to reduce memory, it only allows one
     *              "active" cell at a time in memory. If you assign that cell to a variable, then select
     *              another cell using getCell() or any of its variants, the newly selected cell becomes
     *              the "active" cell, and any previous assignment becomes a disconnected reference because
     *              the active cell has changed.
     */
<<<<<<< HEAD
    public function getCell(CellAddress|string|array $coordinate): Cell
=======
    public function getCell($coordinate): Cell
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $cellAddress = Functions::trimSheetFromCellReference(Validations::validateCellAddress($coordinate));

        // Shortcut for increased performance for the vast majority of simple cases
        if ($this->cellCollection->has($cellAddress)) {
            /** @var Cell $cell */
            $cell = $this->cellCollection->get($cellAddress);

            return $cell;
        }

        /** @var Worksheet $sheet */
        [$sheet, $finalCoordinate] = $this->getWorksheetAndCoordinate($cellAddress);
<<<<<<< HEAD
        $cell = $sheet->getCellCollection()->get($finalCoordinate);
=======
        $cell = $sheet->cellCollection->get($finalCoordinate);
>>>>>>> 50f5a6f (Initial commit from local project)

        return $cell ?? $sheet->createNewCell($finalCoordinate);
    }

    /**
     * Get the correct Worksheet and coordinate from a coordinate that may
     * contains reference to another sheet or a named range.
     *
     * @return array{0: Worksheet, 1: string}
     */
    private function getWorksheetAndCoordinate(string $coordinate): array
    {
        $sheet = null;
        $finalCoordinate = null;

        // Worksheet reference?
<<<<<<< HEAD
        if (str_contains($coordinate, '!')) {
            $worksheetReference = self::extractSheetTitle($coordinate, true, true);
=======
        if (strpos($coordinate, '!') !== false) {
            $worksheetReference = self::extractSheetTitle($coordinate, true);
>>>>>>> 50f5a6f (Initial commit from local project)

            $sheet = $this->getParentOrThrow()->getSheetByName($worksheetReference[0]);
            $finalCoordinate = strtoupper($worksheetReference[1]);

            if ($sheet === null) {
                throw new Exception('Sheet not found for name: ' . $worksheetReference[0]);
            }
        } elseif (
<<<<<<< HEAD
            !preg_match('/^' . Calculation::CALCULATION_REGEXP_CELLREF . '$/i', $coordinate)
            && preg_match('/^' . Calculation::CALCULATION_REGEXP_DEFINEDNAME . '$/iu', $coordinate)
=======
            !preg_match('/^' . Calculation::CALCULATION_REGEXP_CELLREF . '$/i', $coordinate) &&
            preg_match('/^' . Calculation::CALCULATION_REGEXP_DEFINEDNAME . '$/iu', $coordinate)
>>>>>>> 50f5a6f (Initial commit from local project)
        ) {
            // Named range?
            $namedRange = $this->validateNamedRange($coordinate, true);
            if ($namedRange !== null) {
                $sheet = $namedRange->getWorksheet();
                if ($sheet === null) {
                    throw new Exception('Sheet not found for named range: ' . $namedRange->getName());
                }

                /** @phpstan-ignore-next-line */
                $cellCoordinate = ltrim(substr($namedRange->getValue(), strrpos($namedRange->getValue(), '!')), '!');
                $finalCoordinate = str_replace('$', '', $cellCoordinate);
            }
        }

        if ($sheet === null || $finalCoordinate === null) {
            $sheet = $this;
            $finalCoordinate = strtoupper($coordinate);
        }

        if (Coordinate::coordinateIsRange($finalCoordinate)) {
            throw new Exception('Cell coordinate string can not be a range of cells.');
<<<<<<< HEAD
        }
        $finalCoordinate = str_replace('$', '', $finalCoordinate);
=======
        } elseif (strpos($finalCoordinate, '$') !== false) {
            throw new Exception('Cell coordinate must not be absolute.');
        }
>>>>>>> 50f5a6f (Initial commit from local project)

        return [$sheet, $finalCoordinate];
    }

    /**
     * Get an existing cell at a specific coordinate, or null.
     *
     * @param string $coordinate Coordinate of the cell, eg: 'A1'
     *
     * @return null|Cell Cell that was found or null
     */
<<<<<<< HEAD
    private function getCellOrNull(string $coordinate): ?Cell
=======
    private function getCellOrNull($coordinate): ?Cell
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // Check cell collection
        if ($this->cellCollection->has($coordinate)) {
            return $this->cellCollection->get($coordinate);
        }

        return null;
    }

    /**
<<<<<<< HEAD
=======
     * Get cell at a specific coordinate by using numeric cell coordinates.
     *
     * @deprecated 1.23.0
     *      Use the getCell() method with a cell address such as 'C5' instead;,
     *          or passing in an array of [$columnIndex, $row] (e.g. [3, 5]), or a CellAddress object.
     * @see Worksheet::getCell()
     *
     * @param int $columnIndex Numeric column coordinate of the cell
     * @param int $row Numeric row coordinate of the cell
     *
     * @return Cell Cell that was found/created or null
     *              WARNING: Because the cell collection can be cached to reduce memory, it only allows one
     *              "active" cell at a time in memory. If you assign that cell to a variable, then select
     *              another cell using getCell() or any of its variants, the newly selected cell becomes
     *              the "active" cell, and any previous assignment becomes a disconnected reference because
     *              the active cell has changed.
     */
    public function getCellByColumnAndRow($columnIndex, $row): Cell
    {
        return $this->getCell(Coordinate::stringFromColumnIndex($columnIndex) . $row);
    }

    /**
>>>>>>> 50f5a6f (Initial commit from local project)
     * Create a new cell at the specified coordinate.
     *
     * @param string $coordinate Coordinate of the cell
     *
     * @return Cell Cell that was created
     *              WARNING: Because the cell collection can be cached to reduce memory, it only allows one
     *              "active" cell at a time in memory. If you assign that cell to a variable, then select
     *              another cell using getCell() or any of its variants, the newly selected cell becomes
     *              the "active" cell, and any previous assignment becomes a disconnected reference because
     *              the active cell has changed.
     */
<<<<<<< HEAD
    public function createNewCell(string $coordinate): Cell
=======
    public function createNewCell($coordinate): Cell
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        [$column, $row, $columnString] = Coordinate::indexesFromString($coordinate);
        $cell = new Cell(null, DataType::TYPE_NULL, $this);
        $this->cellCollection->add($coordinate, $cell);

        // Coordinates
        if ($column > $this->cachedHighestColumn) {
            $this->cachedHighestColumn = $column;
        }
        if ($row > $this->cachedHighestRow) {
            $this->cachedHighestRow = $row;
        }

        // Cell needs appropriate xfIndex from dimensions records
        //    but don't create dimension records if they don't already exist
        $rowDimension = $this->rowDimensions[$row] ?? null;
        $columnDimension = $this->columnDimensions[$columnString] ?? null;

<<<<<<< HEAD
        $xfSet = false;
=======
>>>>>>> 50f5a6f (Initial commit from local project)
        if ($rowDimension !== null) {
            $rowXf = (int) $rowDimension->getXfIndex();
            if ($rowXf > 0) {
                // then there is a row dimension with explicit style, assign it to the cell
                $cell->setXfIndex($rowXf);
<<<<<<< HEAD
                $xfSet = true;
            }
        }
        if (!$xfSet && $columnDimension !== null) {
=======
            }
        } elseif ($columnDimension !== null) {
>>>>>>> 50f5a6f (Initial commit from local project)
            $colXf = (int) $columnDimension->getXfIndex();
            if ($colXf > 0) {
                // then there is a column dimension, assign it to the cell
                $cell->setXfIndex($colXf);
            }
        }

        return $cell;
    }

    /**
     * Does the cell at a specific coordinate exist?
     *
<<<<<<< HEAD
     * @param array{0: int, 1: int}|CellAddress|string $coordinate Coordinate of the cell as a string, eg: 'C5';
     *               or as an array of [$columnIndex, $row] (e.g. [3, 5]), or a CellAddress object.
     */
    public function cellExists(CellAddress|string|array $coordinate): bool
    {
        $cellAddress = Validations::validateCellAddress($coordinate);
        [$sheet, $finalCoordinate] = $this->getWorksheetAndCoordinate($cellAddress);

        return $sheet->getCellCollection()->has($finalCoordinate);
=======
     * @param array<int>|CellAddress|string $coordinate Coordinate of the cell as a string, eg: 'C5';
     *               or as an array of [$columnIndex, $row] (e.g. [3, 5]), or a CellAddress object.
     */
    public function cellExists($coordinate): bool
    {
        $cellAddress = Validations::validateCellAddress($coordinate);
        /** @var Worksheet $sheet */
        [$sheet, $finalCoordinate] = $this->getWorksheetAndCoordinate($cellAddress);

        return $sheet->cellCollection->has($finalCoordinate);
    }

    /**
     * Cell at a specific coordinate by using numeric cell coordinates exists?
     *
     * @deprecated 1.23.0
     *      Use the cellExists() method with a cell address such as 'C5' instead;,
     *          or passing in an array of [$columnIndex, $row] (e.g. [3, 5]), or a CellAddress object.
     * @see Worksheet::cellExists()
     *
     * @param int $columnIndex Numeric column coordinate of the cell
     * @param int $row Numeric row coordinate of the cell
     */
    public function cellExistsByColumnAndRow($columnIndex, $row): bool
    {
        return $this->cellExists(Coordinate::stringFromColumnIndex($columnIndex) . $row);
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * Get row dimension at a specific row.
     *
     * @param int $row Numeric index of the row
     */
    public function getRowDimension(int $row): RowDimension
    {
        // Get row dimension
        if (!isset($this->rowDimensions[$row])) {
            $this->rowDimensions[$row] = new RowDimension($row);

            $this->cachedHighestRow = max($this->cachedHighestRow, $row);
        }

        return $this->rowDimensions[$row];
    }

<<<<<<< HEAD
    public function getRowStyle(int $row): ?Style
    {
        return $this->parent?->getCellXfByIndexOrNull(
            ($this->rowDimensions[$row] ?? null)?->getXfIndex()
        );
    }

=======
>>>>>>> 50f5a6f (Initial commit from local project)
    public function rowDimensionExists(int $row): bool
    {
        return isset($this->rowDimensions[$row]);
    }

<<<<<<< HEAD
    public function columnDimensionExists(string $column): bool
    {
        return isset($this->columnDimensions[$column]);
    }

=======
>>>>>>> 50f5a6f (Initial commit from local project)
    /**
     * Get column dimension at a specific column.
     *
     * @param string $column String index of the column eg: 'A'
     */
    public function getColumnDimension(string $column): ColumnDimension
    {
        // Uppercase coordinate
        $column = strtoupper($column);

        // Fetch dimensions
        if (!isset($this->columnDimensions[$column])) {
            $this->columnDimensions[$column] = new ColumnDimension($column);

            $columnIndex = Coordinate::columnIndexFromString($column);
            if ($this->cachedHighestColumn < $columnIndex) {
                $this->cachedHighestColumn = $columnIndex;
            }
        }

        return $this->columnDimensions[$column];
    }

    /**
     * Get column dimension at a specific column by using numeric cell coordinates.
     *
     * @param int $columnIndex Numeric column coordinate of the cell
     */
    public function getColumnDimensionByColumn(int $columnIndex): ColumnDimension
    {
        return $this->getColumnDimension(Coordinate::stringFromColumnIndex($columnIndex));
    }

<<<<<<< HEAD
    public function getColumnStyle(string $column): ?Style
    {
        return $this->parent?->getCellXfByIndexOrNull(
            ($this->columnDimensions[$column] ?? null)?->getXfIndex()
        );
=======
    /**
     * Get styles.
     *
     * @return Style[]
     */
    public function getStyles()
    {
        return $this->styles;
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * Get style for cell.
     *
<<<<<<< HEAD
     * @param AddressRange<CellAddress>|AddressRange<int>|AddressRange<string>|array{0: int, 1: int, 2: int, 3: int}|array{0: int, 1: int}|CellAddress|int|string $cellCoordinate
=======
     * @param AddressRange|array<int>|CellAddress|int|string $cellCoordinate
>>>>>>> 50f5a6f (Initial commit from local project)
     *              A simple string containing a cell address like 'A1' or a cell range like 'A1:E10'
     *              or passing in an array of [$fromColumnIndex, $fromRow, $toColumnIndex, $toRow] (e.g. [3, 5, 6, 8]),
     *              or a CellAddress or AddressRange object.
     */
<<<<<<< HEAD
    public function getStyle(AddressRange|CellAddress|int|string|array $cellCoordinate): Style
    {
        if (is_string($cellCoordinate)) {
            $cellCoordinate = Validations::definedNameToCoordinate($cellCoordinate, $this);
        }
        $cellCoordinate = Validations::validateCellOrCellRange($cellCoordinate);
        $cellCoordinate = str_replace('$', '', $cellCoordinate);
=======
    public function getStyle($cellCoordinate): Style
    {
        $cellCoordinate = Validations::validateCellOrCellRange($cellCoordinate);
>>>>>>> 50f5a6f (Initial commit from local project)

        // set this sheet as active
        $this->getParentOrThrow()->setActiveSheetIndex($this->getParentOrThrow()->getIndex($this));

        // set cell coordinate as active
        $this->setSelectedCells($cellCoordinate);

        return $this->getParentOrThrow()->getCellXfSupervisor();
    }

    /**
<<<<<<< HEAD
     * Get table styles set for the for given cell.
     *
     * @param Cell $cell
     *              The Cell for which the tables are retrieved
     */
    public function getTablesWithStylesForCell(Cell $cell): array
    {
        $retVal = [];

        foreach ($this->tableCollection as $table) {
            /** @var Table $table */
            $dxfsTableStyle = $table->getStyle()->getTableDxfsStyle();
            if ($dxfsTableStyle !== null) {
                if ($dxfsTableStyle->getHeaderRowStyle() !== null || $dxfsTableStyle->getFirstRowStripeStyle() !== null || $dxfsTableStyle->getSecondRowStripeStyle() !== null) {
                    $range = $table->getRange();
                    if ($cell->isInRange($range)) {
                        $retVal[] = $table;
                    }
                }
            }
        }

        return $retVal;
=======
     * Get style for cell by using numeric cell coordinates.
     *
     * @deprecated 1.23.0
     *      Use the getStyle() method with a cell address range such as 'C5:F8' instead;,
     *          or passing in an array of [$fromColumnIndex, $fromRow, $toColumnIndex, $toRow] (e.g. [3, 5, 6, 8]),
     *          or an AddressRange object.
     * @see Worksheet::getStyle()
     *
     * @param int $columnIndex1 Numeric column coordinate of the cell
     * @param int $row1 Numeric row coordinate of the cell
     * @param null|int $columnIndex2 Numeric column coordinate of the range cell
     * @param null|int $row2 Numeric row coordinate of the range cell
     *
     * @return Style
     */
    public function getStyleByColumnAndRow($columnIndex1, $row1, $columnIndex2 = null, $row2 = null)
    {
        if ($columnIndex2 !== null && $row2 !== null) {
            $cellRange = new CellRange(
                CellAddress::fromColumnAndRow($columnIndex1, $row1),
                CellAddress::fromColumnAndRow($columnIndex2, $row2)
            );

            return $this->getStyle($cellRange);
        }

        return $this->getStyle(CellAddress::fromColumnAndRow($columnIndex1, $row1));
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * Get conditional styles for a cell.
     *
     * @param string $coordinate eg: 'A1' or 'A1:A3'.
     *          If a single cell is referenced, then the array of conditional styles will be returned if the cell is
     *               included in a conditional style range.
     *          If a range of cells is specified, then the styles will only be returned if the range matches the entire
     *               range of the conditional.
<<<<<<< HEAD
     * @param bool $firstOnly default true, return all matching
     *          conditionals ordered by priority if false, first only if true
     *
     * @return Conditional[]
     */
    public function getConditionalStyles(string $coordinate, bool $firstOnly = true): array
    {
        $coordinate = strtoupper($coordinate);
        if (preg_match('/[: ,]/', $coordinate) === 1) {
            return $this->conditionalStylesCollection[$coordinate] ?? [];
        }

        $conditionalStyles = [];
        foreach ($this->conditionalStylesCollection as $keyStylesOrig => $conditionalRange) {
            $keyStyles = Coordinate::resolveUnionAndIntersection($keyStylesOrig);
            $keyParts = explode(',', $keyStyles);
            foreach ($keyParts as $keyPart) {
                if ($keyPart === $coordinate) {
                    if ($firstOnly) {
                        return $conditionalRange;
                    }
                    $conditionalStyles[$keyStylesOrig] = $conditionalRange;

                    break;
                } elseif (str_contains($keyPart, ':')) {
                    if (Coordinate::coordinateIsInsideRange($keyPart, $coordinate)) {
                        if ($firstOnly) {
                            return $conditionalRange;
                        }
                        $conditionalStyles[$keyStylesOrig] = $conditionalRange;

                        break;
                    }
                }
            }
        }
        $outArray = [];
        foreach ($conditionalStyles as $conditionalArray) {
            foreach ($conditionalArray as $conditional) {
                $outArray[] = $conditional;
            }
        }
        usort($outArray, [self::class, 'comparePriority']);

        return $outArray;
    }

    private static function comparePriority(Conditional $condA, Conditional $condB): int
    {
        $a = $condA->getPriority();
        $b = $condB->getPriority();
        if ($a === $b) {
            return 0;
        }
        if ($a === 0) {
            return 1;
        }
        if ($b === 0) {
            return -1;
        }

        return ($a < $b) ? -1 : 1;
=======
     *
     * @return Conditional[]
     */
    public function getConditionalStyles(string $coordinate): array
    {
        $coordinate = strtoupper($coordinate);
        if (strpos($coordinate, ':') !== false) {
            return $this->conditionalStylesCollection[$coordinate] ?? [];
        }

        $cell = $this->getCell($coordinate);
        foreach (array_keys($this->conditionalStylesCollection) as $conditionalRange) {
            if ($cell->isInRange($conditionalRange)) {
                return $this->conditionalStylesCollection[$conditionalRange];
            }
        }

        return [];
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    public function getConditionalRange(string $coordinate): ?string
    {
        $coordinate = strtoupper($coordinate);
        $cell = $this->getCell($coordinate);
        foreach (array_keys($this->conditionalStylesCollection) as $conditionalRange) {
<<<<<<< HEAD
            $cellBlocks = explode(',', Coordinate::resolveUnionAndIntersection($conditionalRange));
            foreach ($cellBlocks as $cellBlock) {
                if ($cell->isInRange($cellBlock)) {
                    return $conditionalRange;
                }
=======
            if ($cell->isInRange($conditionalRange)) {
                return $conditionalRange;
>>>>>>> 50f5a6f (Initial commit from local project)
            }
        }

        return null;
    }

    /**
     * Do conditional styles exist for this cell?
     *
     * @param string $coordinate eg: 'A1' or 'A1:A3'.
     *          If a single cell is specified, then this method will return true if that cell is included in a
     *               conditional style range.
     *          If a range of cells is specified, then true will only be returned if the range matches the entire
     *               range of the conditional.
     */
<<<<<<< HEAD
    public function conditionalStylesExists(string $coordinate): bool
    {
        return !empty($this->getConditionalStyles($coordinate));
=======
    public function conditionalStylesExists($coordinate): bool
    {
        $coordinate = strtoupper($coordinate);
        if (strpos($coordinate, ':') !== false) {
            return isset($this->conditionalStylesCollection[$coordinate]);
        }

        $cell = $this->getCell($coordinate);
        foreach (array_keys($this->conditionalStylesCollection) as $conditionalRange) {
            if ($cell->isInRange($conditionalRange)) {
                return true;
            }
        }

        return false;
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * Removes conditional styles for a cell.
     *
     * @param string $coordinate eg: 'A1'
     *
     * @return $this
     */
<<<<<<< HEAD
    public function removeConditionalStyles(string $coordinate): static
=======
    public function removeConditionalStyles($coordinate)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        unset($this->conditionalStylesCollection[strtoupper($coordinate)]);

        return $this;
    }

    /**
     * Get collection of conditional styles.
<<<<<<< HEAD
     */
    public function getConditionalStylesCollection(): array
=======
     *
     * @return array
     */
    public function getConditionalStylesCollection()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->conditionalStylesCollection;
    }

    /**
     * Set conditional styles.
     *
     * @param string $coordinate eg: 'A1'
     * @param Conditional[] $styles
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setConditionalStyles(string $coordinate, array $styles): static
=======
    public function setConditionalStyles($coordinate, $styles)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->conditionalStylesCollection[strtoupper($coordinate)] = $styles;

        return $this;
    }

    /**
     * Duplicate cell style to a range of cells.
     *
     * Please note that this will overwrite existing cell styles for cells in range!
     *
     * @param Style $style Cell style to duplicate
     * @param string $range Range of cells (i.e. "A1:B10"), or just one cell (i.e. "A1")
     *
     * @return $this
     */
<<<<<<< HEAD
    public function duplicateStyle(Style $style, string $range): static
=======
    public function duplicateStyle(Style $style, $range)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // Add the style to the workbook if necessary
        $workbook = $this->getParentOrThrow();
        if ($existingStyle = $workbook->getCellXfByHashCode($style->getHashCode())) {
            // there is already such cell Xf in our collection
            $xfIndex = $existingStyle->getIndex();
        } else {
            // we don't have such a cell Xf, need to add
            $workbook->addCellXf($style);
            $xfIndex = $style->getIndex();
        }

        // Calculate range outer borders
        [$rangeStart, $rangeEnd] = Coordinate::rangeBoundaries($range . ':' . $range);

        // Make sure we can loop upwards on rows and columns
        if ($rangeStart[0] > $rangeEnd[0] && $rangeStart[1] > $rangeEnd[1]) {
            $tmp = $rangeStart;
            $rangeStart = $rangeEnd;
            $rangeEnd = $tmp;
        }

        // Loop through cells and apply styles
        for ($col = $rangeStart[0]; $col <= $rangeEnd[0]; ++$col) {
            for ($row = $rangeStart[1]; $row <= $rangeEnd[1]; ++$row) {
                $this->getCell(Coordinate::stringFromColumnIndex($col) . $row)->setXfIndex($xfIndex);
            }
        }

        return $this;
    }

    /**
     * Duplicate conditional style to a range of cells.
     *
     * Please note that this will overwrite existing cell styles for cells in range!
     *
     * @param Conditional[] $styles Cell style to duplicate
     * @param string $range Range of cells (i.e. "A1:B10"), or just one cell (i.e. "A1")
     *
     * @return $this
     */
<<<<<<< HEAD
    public function duplicateConditionalStyle(array $styles, string $range = ''): static
    {
        foreach ($styles as $cellStyle) {
            if (!($cellStyle instanceof Conditional)) { // @phpstan-ignore-line
=======
    public function duplicateConditionalStyle(array $styles, $range = '')
    {
        foreach ($styles as $cellStyle) {
            if (!($cellStyle instanceof Conditional)) {
>>>>>>> 50f5a6f (Initial commit from local project)
                throw new Exception('Style is not a conditional style');
            }
        }

        // Calculate range outer borders
        [$rangeStart, $rangeEnd] = Coordinate::rangeBoundaries($range . ':' . $range);

        // Make sure we can loop upwards on rows and columns
        if ($rangeStart[0] > $rangeEnd[0] && $rangeStart[1] > $rangeEnd[1]) {
            $tmp = $rangeStart;
            $rangeStart = $rangeEnd;
            $rangeEnd = $tmp;
        }

        // Loop through cells and apply styles
        for ($col = $rangeStart[0]; $col <= $rangeEnd[0]; ++$col) {
            for ($row = $rangeStart[1]; $row <= $rangeEnd[1]; ++$row) {
                $this->setConditionalStyles(Coordinate::stringFromColumnIndex($col) . $row, $styles);
            }
        }

        return $this;
    }

    /**
     * Set break on a cell.
     *
<<<<<<< HEAD
     * @param array{0: int, 1: int}|CellAddress|string $coordinate Coordinate of the cell as a string, eg: 'C5';
=======
     * @param array<int>|CellAddress|string $coordinate Coordinate of the cell as a string, eg: 'C5';
>>>>>>> 50f5a6f (Initial commit from local project)
     *               or as an array of [$columnIndex, $row] (e.g. [3, 5]), or a CellAddress object.
     * @param int $break Break type (type of Worksheet::BREAK_*)
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setBreak(CellAddress|string|array $coordinate, int $break, int $max = -1): static
=======
    public function setBreak($coordinate, $break, int $max = -1)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $cellAddress = Functions::trimSheetFromCellReference(Validations::validateCellAddress($coordinate));

        if ($break === self::BREAK_NONE) {
            unset($this->rowBreaks[$cellAddress], $this->columnBreaks[$cellAddress]);
        } elseif ($break === self::BREAK_ROW) {
            $this->rowBreaks[$cellAddress] = new PageBreak($break, $cellAddress, $max);
        } elseif ($break === self::BREAK_COLUMN) {
            $this->columnBreaks[$cellAddress] = new PageBreak($break, $cellAddress, $max);
        }

        return $this;
    }

    /**
<<<<<<< HEAD
=======
     * Set break on a cell by using numeric cell coordinates.
     *
     * @deprecated 1.23.0
     *      Use the setBreak() method with a cell address such as 'C5' instead;,
     *          or passing in an array of [$columnIndex, $row] (e.g. [3, 5]), or a CellAddress object.
     * @see Worksheet::setBreak()
     *
     * @param int $columnIndex Numeric column coordinate of the cell
     * @param int $row Numeric row coordinate of the cell
     * @param int $break Break type (type of Worksheet::BREAK_*)
     *
     * @return $this
     */
    public function setBreakByColumnAndRow($columnIndex, $row, $break)
    {
        return $this->setBreak(Coordinate::stringFromColumnIndex($columnIndex) . $row, $break);
    }

    /**
>>>>>>> 50f5a6f (Initial commit from local project)
     * Get breaks.
     *
     * @return int[]
     */
<<<<<<< HEAD
    public function getBreaks(): array
    {
        $breaks = [];
        /** @var callable $compareFunction */
=======
    public function getBreaks()
    {
        $breaks = [];
        /** @var callable */
>>>>>>> 50f5a6f (Initial commit from local project)
        $compareFunction = [self::class, 'compareRowBreaks'];
        uksort($this->rowBreaks, $compareFunction);
        foreach ($this->rowBreaks as $break) {
            $breaks[$break->getCoordinate()] = self::BREAK_ROW;
        }
<<<<<<< HEAD
        /** @var callable $compareFunction */
=======
        /** @var callable */
>>>>>>> 50f5a6f (Initial commit from local project)
        $compareFunction = [self::class, 'compareColumnBreaks'];
        uksort($this->columnBreaks, $compareFunction);
        foreach ($this->columnBreaks as $break) {
            $breaks[$break->getCoordinate()] = self::BREAK_COLUMN;
        }

        return $breaks;
    }

    /**
     * Get row breaks.
     *
     * @return PageBreak[]
     */
<<<<<<< HEAD
    public function getRowBreaks(): array
    {
        /** @var callable $compareFunction */
=======
    public function getRowBreaks()
    {
        /** @var callable */
>>>>>>> 50f5a6f (Initial commit from local project)
        $compareFunction = [self::class, 'compareRowBreaks'];
        uksort($this->rowBreaks, $compareFunction);

        return $this->rowBreaks;
    }

    protected static function compareRowBreaks(string $coordinate1, string $coordinate2): int
    {
        $row1 = Coordinate::indexesFromString($coordinate1)[1];
        $row2 = Coordinate::indexesFromString($coordinate2)[1];

        return $row1 - $row2;
    }

    protected static function compareColumnBreaks(string $coordinate1, string $coordinate2): int
    {
        $column1 = Coordinate::indexesFromString($coordinate1)[0];
        $column2 = Coordinate::indexesFromString($coordinate2)[0];

        return $column1 - $column2;
    }

    /**
     * Get column breaks.
     *
     * @return PageBreak[]
     */
<<<<<<< HEAD
    public function getColumnBreaks(): array
    {
        /** @var callable $compareFunction */
=======
    public function getColumnBreaks()
    {
        /** @var callable */
>>>>>>> 50f5a6f (Initial commit from local project)
        $compareFunction = [self::class, 'compareColumnBreaks'];
        uksort($this->columnBreaks, $compareFunction);

        return $this->columnBreaks;
    }

    /**
     * Set merge on a cell range.
     *
<<<<<<< HEAD
     * @param AddressRange<CellAddress>|AddressRange<int>|AddressRange<string>|array{0: int, 1: int, 2: int, 3: int}|array{0: int, 1: int}|string $range A simple string containing a Cell range like 'A1:E10'
=======
     * @param AddressRange|array<int>|string $range A simple string containing a Cell range like 'A1:E10'
>>>>>>> 50f5a6f (Initial commit from local project)
     *              or passing in an array of [$fromColumnIndex, $fromRow, $toColumnIndex, $toRow] (e.g. [3, 5, 6, 8]),
     *              or an AddressRange.
     * @param string $behaviour How the merged cells should behave.
     *               Possible values are:
     *                   MERGE_CELL_CONTENT_EMPTY - Empty the content of the hidden cells
     *                   MERGE_CELL_CONTENT_HIDE - Keep the content of the hidden cells
     *                   MERGE_CELL_CONTENT_MERGE - Move the content of the hidden cells into the first cell
     *
     * @return $this
     */
<<<<<<< HEAD
    public function mergeCells(AddressRange|string|array $range, string $behaviour = self::MERGE_CELL_CONTENT_EMPTY): static
    {
        $range = Functions::trimSheetFromCellReference(Validations::validateCellRange($range));

        if (!str_contains($range, ':')) {
            $range .= ":{$range}";
        }

        if (preg_match('/^([A-Z]+)(\d+):([A-Z]+)(\d+)$/', $range, $matches) !== 1) {
=======
    public function mergeCells($range, $behaviour = self::MERGE_CELL_CONTENT_EMPTY)
    {
        $range = Functions::trimSheetFromCellReference(Validations::validateCellRange($range));

        if (strpos($range, ':') === false) {
            $range .= ":{$range}";
        }

        if (preg_match('/^([A-Z]+)(\\d+):([A-Z]+)(\\d+)$/', $range, $matches) !== 1) {
>>>>>>> 50f5a6f (Initial commit from local project)
            throw new Exception('Merge must be on a valid range of cells.');
        }

        $this->mergeCells[$range] = $range;
        $firstRow = (int) $matches[2];
        $lastRow = (int) $matches[4];
        $firstColumn = $matches[1];
        $lastColumn = $matches[3];
        $firstColumnIndex = Coordinate::columnIndexFromString($firstColumn);
        $lastColumnIndex = Coordinate::columnIndexFromString($lastColumn);
        $numberRows = $lastRow - $firstRow;
        $numberColumns = $lastColumnIndex - $firstColumnIndex;

        if ($numberRows === 1 && $numberColumns === 1) {
            return $this;
        }

        // create upper left cell if it does not already exist
        $upperLeft = "{$firstColumn}{$firstRow}";
        if (!$this->cellExists($upperLeft)) {
            $this->getCell($upperLeft)->setValueExplicit(null, DataType::TYPE_NULL);
        }

        if ($behaviour !== self::MERGE_CELL_CONTENT_HIDE) {
            // Blank out the rest of the cells in the range (if they exist)
            if ($numberRows > $numberColumns) {
                $this->clearMergeCellsByColumn($firstColumn, $lastColumn, $firstRow, $lastRow, $upperLeft, $behaviour);
            } else {
                $this->clearMergeCellsByRow($firstColumn, $lastColumnIndex, $firstRow, $lastRow, $upperLeft, $behaviour);
            }
        }

        return $this;
    }

    private function clearMergeCellsByColumn(string $firstColumn, string $lastColumn, int $firstRow, int $lastRow, string $upperLeft, string $behaviour): void
    {
        $leftCellValue = ($behaviour === self::MERGE_CELL_CONTENT_MERGE)
            ? [$this->getCell($upperLeft)->getFormattedValue()]
            : [];

        foreach ($this->getColumnIterator($firstColumn, $lastColumn) as $column) {
            $iterator = $column->getCellIterator($firstRow);
            $iterator->setIterateOnlyExistingCells(true);
            foreach ($iterator as $cell) {
<<<<<<< HEAD
                $row = $cell->getRow();
                if ($row > $lastRow) {
                    break;
                }
                $leftCellValue = $this->mergeCellBehaviour($cell, $upperLeft, $behaviour, $leftCellValue);
=======
                if ($cell !== null) {
                    $row = $cell->getRow();
                    if ($row > $lastRow) {
                        break;
                    }
                    $leftCellValue = $this->mergeCellBehaviour($cell, $upperLeft, $behaviour, $leftCellValue);
                }
>>>>>>> 50f5a6f (Initial commit from local project)
            }
        }

        if ($behaviour === self::MERGE_CELL_CONTENT_MERGE) {
            $this->getCell($upperLeft)->setValueExplicit(implode(' ', $leftCellValue), DataType::TYPE_STRING);
        }
    }

    private function clearMergeCellsByRow(string $firstColumn, int $lastColumnIndex, int $firstRow, int $lastRow, string $upperLeft, string $behaviour): void
    {
        $leftCellValue = ($behaviour === self::MERGE_CELL_CONTENT_MERGE)
            ? [$this->getCell($upperLeft)->getFormattedValue()]
            : [];

        foreach ($this->getRowIterator($firstRow, $lastRow) as $row) {
            $iterator = $row->getCellIterator($firstColumn);
            $iterator->setIterateOnlyExistingCells(true);
            foreach ($iterator as $cell) {
<<<<<<< HEAD
                $column = $cell->getColumn();
                $columnIndex = Coordinate::columnIndexFromString($column);
                if ($columnIndex > $lastColumnIndex) {
                    break;
                }
                $leftCellValue = $this->mergeCellBehaviour($cell, $upperLeft, $behaviour, $leftCellValue);
=======
                if ($cell !== null) {
                    $column = $cell->getColumn();
                    $columnIndex = Coordinate::columnIndexFromString($column);
                    if ($columnIndex > $lastColumnIndex) {
                        break;
                    }
                    $leftCellValue = $this->mergeCellBehaviour($cell, $upperLeft, $behaviour, $leftCellValue);
                }
>>>>>>> 50f5a6f (Initial commit from local project)
            }
        }

        if ($behaviour === self::MERGE_CELL_CONTENT_MERGE) {
            $this->getCell($upperLeft)->setValueExplicit(implode(' ', $leftCellValue), DataType::TYPE_STRING);
        }
    }

    public function mergeCellBehaviour(Cell $cell, string $upperLeft, string $behaviour, array $leftCellValue): array
    {
        if ($cell->getCoordinate() !== $upperLeft) {
            Calculation::getInstance($cell->getWorksheet()->getParentOrThrow())->flushInstance();
            if ($behaviour === self::MERGE_CELL_CONTENT_MERGE) {
                $cellValue = $cell->getFormattedValue();
                if ($cellValue !== '') {
                    $leftCellValue[] = $cellValue;
                }
            }
            $cell->setValueExplicit(null, DataType::TYPE_NULL);
        }

        return $leftCellValue;
    }

    /**
<<<<<<< HEAD
     * Remove merge on a cell range.
     *
     * @param AddressRange<CellAddress>|AddressRange<int>|AddressRange<string>|array{0: int, 1: int, 2: int, 3: int}|array{0: int, 1: int}|string $range A simple string containing a Cell range like 'A1:E10'
=======
     * Set merge on a cell range by using numeric cell coordinates.
     *
     * @deprecated 1.23.0
     *      Use the mergeCells() method with a cell address range such as 'C5:F8' instead;,
     *          or passing in an array of [$fromColumnIndex, $fromRow, $toColumnIndex, $toRow] (e.g. [3, 5, 6, 8]),
     *          or an AddressRange object.
     * @see Worksheet::mergeCells()
     *
     * @param int $columnIndex1 Numeric column coordinate of the first cell
     * @param int $row1 Numeric row coordinate of the first cell
     * @param int $columnIndex2 Numeric column coordinate of the last cell
     * @param int $row2 Numeric row coordinate of the last cell
     * @param string $behaviour How the merged cells should behave.
     *               Possible values are:
     *                   MERGE_CELL_CONTENT_EMPTY - Empty the content of the hidden cells
     *                   MERGE_CELL_CONTENT_HIDE - Keep the content of the hidden cells
     *                   MERGE_CELL_CONTENT_MERGE - Move the content of the hidden cells into the first cell
     *
     * @return $this
     */
    public function mergeCellsByColumnAndRow($columnIndex1, $row1, $columnIndex2, $row2, $behaviour = self::MERGE_CELL_CONTENT_EMPTY)
    {
        $cellRange = new CellRange(
            CellAddress::fromColumnAndRow($columnIndex1, $row1),
            CellAddress::fromColumnAndRow($columnIndex2, $row2)
        );

        return $this->mergeCells($cellRange, $behaviour);
    }

    /**
     * Remove merge on a cell range.
     *
     * @param AddressRange|array<int>|string $range A simple string containing a Cell range like 'A1:E10'
>>>>>>> 50f5a6f (Initial commit from local project)
     *              or passing in an array of [$fromColumnIndex, $fromRow, $toColumnIndex, $toRow] (e.g. [3, 5, 6, 8]),
     *              or an AddressRange.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function unmergeCells(AddressRange|string|array $range): static
    {
        $range = Functions::trimSheetFromCellReference(Validations::validateCellRange($range));

        if (str_contains($range, ':')) {
=======
    public function unmergeCells($range)
    {
        $range = Functions::trimSheetFromCellReference(Validations::validateCellRange($range));

        if (strpos($range, ':') !== false) {
>>>>>>> 50f5a6f (Initial commit from local project)
            if (isset($this->mergeCells[$range])) {
                unset($this->mergeCells[$range]);
            } else {
                throw new Exception('Cell range ' . $range . ' not known as merged.');
            }
        } else {
            throw new Exception('Merge can only be removed from a range of cells.');
        }

        return $this;
    }

    /**
<<<<<<< HEAD
=======
     * Remove merge on a cell range by using numeric cell coordinates.
     *
     * @deprecated 1.23.0
     *      Use the unmergeCells() method with a cell address range such as 'C5:F8' instead;,
     *          or passing in an array of [$fromColumnIndex, $fromRow, $toColumnIndex, $toRow] (e.g. [3, 5, 6, 8]),
     *          or an AddressRange object.
     * @see Worksheet::unmergeCells()
     *
     * @param int $columnIndex1 Numeric column coordinate of the first cell
     * @param int $row1 Numeric row coordinate of the first cell
     * @param int $columnIndex2 Numeric column coordinate of the last cell
     * @param int $row2 Numeric row coordinate of the last cell
     *
     * @return $this
     */
    public function unmergeCellsByColumnAndRow($columnIndex1, $row1, $columnIndex2, $row2)
    {
        $cellRange = new CellRange(
            CellAddress::fromColumnAndRow($columnIndex1, $row1),
            CellAddress::fromColumnAndRow($columnIndex2, $row2)
        );

        return $this->unmergeCells($cellRange);
    }

    /**
>>>>>>> 50f5a6f (Initial commit from local project)
     * Get merge cells array.
     *
     * @return string[]
     */
<<<<<<< HEAD
    public function getMergeCells(): array
=======
    public function getMergeCells()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->mergeCells;
    }

    /**
     * Set merge cells array for the entire sheet. Use instead mergeCells() to merge
     * a single cell range.
     *
     * @param string[] $mergeCells
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setMergeCells(array $mergeCells): static
=======
    public function setMergeCells(array $mergeCells)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->mergeCells = $mergeCells;

        return $this;
    }

    /**
     * Set protection on a cell or cell range.
     *
<<<<<<< HEAD
     * @param AddressRange<CellAddress>|AddressRange<int>|AddressRange<string>|array{0: int, 1: int, 2: int, 3: int}|array{0: int, 1: int}|CellAddress|int|string $range A simple string containing a Cell range like 'A1:E10'
=======
     * @param AddressRange|array<int>|CellAddress|int|string $range A simple string containing a Cell range like 'A1:E10'
>>>>>>> 50f5a6f (Initial commit from local project)
     *              or passing in an array of [$fromColumnIndex, $fromRow, $toColumnIndex, $toRow] (e.g. [3, 5, 6, 8]),
     *              or a CellAddress or AddressRange object.
     * @param string $password Password to unlock the protection
     * @param bool $alreadyHashed If the password has already been hashed, set this to true
     *
     * @return $this
     */
<<<<<<< HEAD
    public function protectCells(AddressRange|CellAddress|int|string|array $range, string $password = '', bool $alreadyHashed = false, string $name = '', string $securityDescriptor = ''): static
    {
        $range = Functions::trimSheetFromCellReference(Validations::validateCellOrCellRange($range));

        if (!$alreadyHashed && $password !== '') {
            $password = Shared\PasswordHasher::hashPassword($password);
        }
        $this->protectedCells[$range] = new ProtectedRange($range, $password, $name, $securityDescriptor);
=======
    public function protectCells($range, $password, $alreadyHashed = false)
    {
        $range = Functions::trimSheetFromCellReference(Validations::validateCellOrCellRange($range));

        if (!$alreadyHashed) {
            $password = Shared\PasswordHasher::hashPassword($password);
        }
        $this->protectedCells[$range] = $password;
>>>>>>> 50f5a6f (Initial commit from local project)

        return $this;
    }

    /**
<<<<<<< HEAD
     * Remove protection on a cell or cell range.
     *
     * @param AddressRange<CellAddress>|AddressRange<int>|AddressRange<string>|array{0: int, 1: int, 2: int, 3: int}|array{0: int, 1: int}|CellAddress|int|string $range A simple string containing a Cell range like 'A1:E10'
=======
     * Set protection on a cell range by using numeric cell coordinates.
     *
     * @deprecated 1.23.0
     *      Use the protectCells() method with a cell address range such as 'C5:F8' instead;,
     *          or passing in an array of [$fromColumnIndex, $fromRow, $toColumnIndex, $toRow] (e.g. [3, 5, 6, 8]),
     *          or an AddressRange object.
     * @see Worksheet::protectCells()
     *
     * @param int $columnIndex1 Numeric column coordinate of the first cell
     * @param int $row1 Numeric row coordinate of the first cell
     * @param int $columnIndex2 Numeric column coordinate of the last cell
     * @param int $row2 Numeric row coordinate of the last cell
     * @param string $password Password to unlock the protection
     * @param bool $alreadyHashed If the password has already been hashed, set this to true
     *
     * @return $this
     */
    public function protectCellsByColumnAndRow($columnIndex1, $row1, $columnIndex2, $row2, $password, $alreadyHashed = false)
    {
        $cellRange = new CellRange(
            CellAddress::fromColumnAndRow($columnIndex1, $row1),
            CellAddress::fromColumnAndRow($columnIndex2, $row2)
        );

        return $this->protectCells($cellRange, $password, $alreadyHashed);
    }

    /**
     * Remove protection on a cell or cell range.
     *
     * @param AddressRange|array<int>|CellAddress|int|string $range A simple string containing a Cell range like 'A1:E10'
>>>>>>> 50f5a6f (Initial commit from local project)
     *              or passing in an array of [$fromColumnIndex, $fromRow, $toColumnIndex, $toRow] (e.g. [3, 5, 6, 8]),
     *              or a CellAddress or AddressRange object.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function unprotectCells(AddressRange|CellAddress|int|string|array $range): static
=======
    public function unprotectCells($range)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $range = Functions::trimSheetFromCellReference(Validations::validateCellOrCellRange($range));

        if (isset($this->protectedCells[$range])) {
            unset($this->protectedCells[$range]);
        } else {
            throw new Exception('Cell range ' . $range . ' not known as protected.');
        }

        return $this;
    }

    /**
<<<<<<< HEAD
     * Get protected cells.
     *
     * @return ProtectedRange[]
     */
    public function getProtectedCellRanges(): array
=======
     * Remove protection on a cell range by using numeric cell coordinates.
     *
     * @deprecated 1.23.0
     *      Use the unprotectCells() method with a cell address range such as 'C5:F8' instead;,
     *          or passing in an array of [$fromColumnIndex, $fromRow, $toColumnIndex, $toRow] (e.g. [3, 5, 6, 8]),
     *          or an AddressRange object.
     * @see Worksheet::unprotectCells()
     *
     * @param int $columnIndex1 Numeric column coordinate of the first cell
     * @param int $row1 Numeric row coordinate of the first cell
     * @param int $columnIndex2 Numeric column coordinate of the last cell
     * @param int $row2 Numeric row coordinate of the last cell
     *
     * @return $this
     */
    public function unprotectCellsByColumnAndRow($columnIndex1, $row1, $columnIndex2, $row2)
    {
        $cellRange = new CellRange(
            CellAddress::fromColumnAndRow($columnIndex1, $row1),
            CellAddress::fromColumnAndRow($columnIndex2, $row2)
        );

        return $this->unprotectCells($cellRange);
    }

    /**
     * Get protected cells.
     *
     * @return string[]
     */
    public function getProtectedCells()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->protectedCells;
    }

    /**
     * Get Autofilter.
<<<<<<< HEAD
     */
    public function getAutoFilter(): AutoFilter
=======
     *
     * @return AutoFilter
     */
    public function getAutoFilter()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->autoFilter;
    }

    /**
     * Set AutoFilter.
     *
<<<<<<< HEAD
     * @param AddressRange<CellAddress>|AddressRange<int>|AddressRange<string>|array{0: int, 1: int, 2: int, 3: int}|array{0: int, 1: int}|AutoFilter|string $autoFilterOrRange
=======
     * @param AddressRange|array<int>|AutoFilter|string $autoFilterOrRange
>>>>>>> 50f5a6f (Initial commit from local project)
     *            A simple string containing a Cell range like 'A1:E10' is permitted for backward compatibility
     *              or passing in an array of [$fromColumnIndex, $fromRow, $toColumnIndex, $toRow] (e.g. [3, 5, 6, 8]),
     *              or an AddressRange.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setAutoFilter(AddressRange|string|array|AutoFilter $autoFilterOrRange): static
=======
    public function setAutoFilter($autoFilterOrRange)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_object($autoFilterOrRange) && ($autoFilterOrRange instanceof AutoFilter)) {
            $this->autoFilter = $autoFilterOrRange;
        } else {
            $cellRange = Functions::trimSheetFromCellReference(Validations::validateCellRange($autoFilterOrRange));

            $this->autoFilter->setRange($cellRange);
        }

        return $this;
    }

    /**
<<<<<<< HEAD
=======
     * Set Autofilter Range by using numeric cell coordinates.
     *
     * @deprecated 1.23.0
     *      Use the setAutoFilter() method with a cell address range such as 'C5:F8' instead;,
     *          or passing in an array of [$fromColumnIndex, $fromRow, $toColumnIndex, $toRow] (e.g. [3, 5, 6, 8]),
     *          or an AddressRange object or AutoFilter object.
     * @see Worksheet::setAutoFilter()
     *
     * @param int $columnIndex1 Numeric column coordinate of the first cell
     * @param int $row1 Numeric row coordinate of the first cell
     * @param int $columnIndex2 Numeric column coordinate of the second cell
     * @param int $row2 Numeric row coordinate of the second cell
     *
     * @return $this
     */
    public function setAutoFilterByColumnAndRow($columnIndex1, $row1, $columnIndex2, $row2)
    {
        $cellRange = new CellRange(
            CellAddress::fromColumnAndRow($columnIndex1, $row1),
            CellAddress::fromColumnAndRow($columnIndex2, $row2)
        );

        return $this->setAutoFilter($cellRange);
    }

    /**
>>>>>>> 50f5a6f (Initial commit from local project)
     * Remove autofilter.
     */
    public function removeAutoFilter(): self
    {
        $this->autoFilter->setRange('');

        return $this;
    }

    /**
     * Get collection of Tables.
     *
     * @return ArrayObject<int, Table>
     */
<<<<<<< HEAD
    public function getTableCollection(): ArrayObject
=======
    public function getTableCollection()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->tableCollection;
    }

    /**
     * Add Table.
     *
     * @return $this
     */
    public function addTable(Table $table): self
    {
        $table->setWorksheet($this);
        $this->tableCollection[] = $table;

        return $this;
    }

    /**
     * @return string[] array of Table names
     */
    public function getTableNames(): array
    {
        $tableNames = [];

        foreach ($this->tableCollection as $table) {
            /** @var Table $table */
            $tableNames[] = $table->getName();
        }

        return $tableNames;
    }

<<<<<<< HEAD
=======
    /** @var null|Table */
    private static $scrutinizerNullTable;

    /** @var null|int */
    private static $scrutinizerNullInt;

>>>>>>> 50f5a6f (Initial commit from local project)
    /**
     * @param string $name the table name to search
     *
     * @return null|Table The table from the tables collection, or null if not found
     */
    public function getTableByName(string $name): ?Table
    {
        $tableIndex = $this->getTableIndexByName($name);

<<<<<<< HEAD
        return ($tableIndex === null) ? null : $this->tableCollection[$tableIndex];
=======
        return ($tableIndex === null) ? self::$scrutinizerNullTable : $this->tableCollection[$tableIndex];
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * @param string $name the table name to search
     *
     * @return null|int The index of the located table in the tables collection, or null if not found
     */
    protected function getTableIndexByName(string $name): ?int
    {
<<<<<<< HEAD
        $name = StringHelper::strToUpper($name);
        foreach ($this->tableCollection as $index => $table) {
            /** @var Table $table */
            if (StringHelper::strToUpper($table->getName()) === $name) {
=======
        $name = Shared\StringHelper::strToUpper($name);
        foreach ($this->tableCollection as $index => $table) {
            /** @var Table $table */
            if (Shared\StringHelper::strToUpper($table->getName()) === $name) {
>>>>>>> 50f5a6f (Initial commit from local project)
                return $index;
            }
        }

<<<<<<< HEAD
        return null;
=======
        return self::$scrutinizerNullInt;
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * Remove Table by name.
     *
     * @param string $name Table name
     *
     * @return $this
     */
    public function removeTableByName(string $name): self
    {
        $tableIndex = $this->getTableIndexByName($name);

        if ($tableIndex !== null) {
            unset($this->tableCollection[$tableIndex]);
        }

        return $this;
    }

    /**
     * Remove collection of Tables.
     */
    public function removeTableCollection(): self
    {
        $this->tableCollection = new ArrayObject();

        return $this;
    }

    /**
     * Get Freeze Pane.
<<<<<<< HEAD
     */
    public function getFreezePane(): ?string
=======
     *
     * @return null|string
     */
    public function getFreezePane()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->freezePane;
    }

    /**
     * Freeze Pane.
     *
     * Examples:
     *
     *     - A2 will freeze the rows above cell A2 (i.e row 1)
     *     - B1 will freeze the columns to the left of cell B1 (i.e column A)
     *     - B2 will freeze the rows above and to the left of cell B2 (i.e row 1 and column A)
     *
<<<<<<< HEAD
     * @param null|array{0: int, 1: int}|CellAddress|string $coordinate Coordinate of the cell as a string, eg: 'C5';
     *            or as an array of [$columnIndex, $row] (e.g. [3, 5]), or a CellAddress object.
     *        Passing a null value for this argument will clear any existing freeze pane for this worksheet.
     * @param null|array{0: int, 1: int}|CellAddress|string $topLeftCell default position of the right bottom pane
=======
     * @param null|array<int>|CellAddress|string $coordinate Coordinate of the cell as a string, eg: 'C5';
     *            or as an array of [$columnIndex, $row] (e.g. [3, 5]), or a CellAddress object.
     *        Passing a null value for this argument will clear any existing freeze pane for this worksheet.
     * @param null|array<int>|CellAddress|string $topLeftCell default position of the right bottom pane
>>>>>>> 50f5a6f (Initial commit from local project)
     *            Coordinate of the cell as a string, eg: 'C5'; or as an array of [$columnIndex, $row] (e.g. [3, 5]),
     *            or a CellAddress object.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function freezePane(null|CellAddress|string|array $coordinate, null|CellAddress|string|array $topLeftCell = null, bool $frozenSplit = false): static
    {
        $this->panes = [
            'bottomRight' => null,
            'bottomLeft' => null,
            'topRight' => null,
            'topLeft' => null,
        ];
=======
    public function freezePane($coordinate, $topLeftCell = null)
    {
>>>>>>> 50f5a6f (Initial commit from local project)
        $cellAddress = ($coordinate !== null)
            ? Functions::trimSheetFromCellReference(Validations::validateCellAddress($coordinate))
            : null;
        if ($cellAddress !== null && Coordinate::coordinateIsRange($cellAddress)) {
            throw new Exception('Freeze pane can not be set on a range of cells.');
        }
        $topLeftCell = ($topLeftCell !== null)
            ? Functions::trimSheetFromCellReference(Validations::validateCellAddress($topLeftCell))
            : null;

        if ($cellAddress !== null && $topLeftCell === null) {
            $coordinate = Coordinate::coordinateFromString($cellAddress);
            $topLeftCell = $coordinate[0] . $coordinate[1];
        }

<<<<<<< HEAD
        $topLeftCell = "$topLeftCell";
        $this->paneTopLeftCell = $topLeftCell;

        $this->freezePane = $cellAddress;
        $this->topLeftCell = $topLeftCell;
        if ($cellAddress === null) {
            $this->paneState = '';
            $this->xSplit = $this->ySplit = 0;
            $this->activePane = '';
        } else {
            $coordinates = Coordinate::indexesFromString($cellAddress);
            $this->xSplit = $coordinates[0] - 1;
            $this->ySplit = $coordinates[1] - 1;
            if ($this->xSplit > 0 || $this->ySplit > 0) {
                $this->paneState = $frozenSplit ? self::PANE_FROZENSPLIT : self::PANE_FROZEN;
                $this->setSelectedCellsActivePane();
            } else {
                $this->paneState = '';
                $this->freezePane = null;
                $this->activePane = '';
            }
        }
=======
        $this->freezePane = $cellAddress;
        $this->topLeftCell = $topLeftCell;
>>>>>>> 50f5a6f (Initial commit from local project)

        return $this;
    }

    public function setTopLeftCell(string $topLeftCell): self
    {
        $this->topLeftCell = $topLeftCell;

        return $this;
    }

    /**
<<<<<<< HEAD
=======
     * Freeze Pane by using numeric cell coordinates.
     *
     * @deprecated 1.23.0
     *      Use the freezePane() method with a cell address such as 'C5' instead;,
     *          or passing in an array of [$columnIndex, $row] (e.g. [3, 5]), or a CellAddress object.
     * @see Worksheet::freezePane()
     *
     * @param int $columnIndex Numeric column coordinate of the cell
     * @param int $row Numeric row coordinate of the cell
     *
     * @return $this
     */
    public function freezePaneByColumnAndRow($columnIndex, $row)
    {
        return $this->freezePane(Coordinate::stringFromColumnIndex($columnIndex) . $row);
    }

    /**
>>>>>>> 50f5a6f (Initial commit from local project)
     * Unfreeze Pane.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function unfreezePane(): static
=======
    public function unfreezePane()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->freezePane(null);
    }

    /**
     * Get the default position of the right bottom pane.
<<<<<<< HEAD
     */
    public function getTopLeftCell(): ?string
=======
     *
     * @return null|string
     */
    public function getTopLeftCell()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->topLeftCell;
    }

<<<<<<< HEAD
    public function getPaneTopLeftCell(): string
    {
        return $this->paneTopLeftCell;
    }

    public function setPaneTopLeftCell(string $paneTopLeftCell): self
    {
        $this->paneTopLeftCell = $paneTopLeftCell;

        return $this;
    }

    public function usesPanes(): bool
    {
        return $this->xSplit > 0 || $this->ySplit > 0;
    }

    public function getPane(string $position): ?Pane
    {
        return $this->panes[$position] ?? null;
    }

    public function setPane(string $position, ?Pane $pane): self
    {
        if (array_key_exists($position, $this->panes)) {
            $this->panes[$position] = $pane;
        }

        return $this;
    }

    /** @return (null|Pane)[] */
    public function getPanes(): array
    {
        return $this->panes;
    }

    public function getActivePane(): string
    {
        return $this->activePane;
    }

    public function setActivePane(string $activePane): self
    {
        $this->activePane = array_key_exists($activePane, $this->panes) ? $activePane : '';

        return $this;
    }

    public function getXSplit(): int
    {
        return $this->xSplit;
    }

    public function setXSplit(int $xSplit): self
    {
        $this->xSplit = $xSplit;
        if (in_array($this->paneState, self::VALIDFROZENSTATE, true)) {
            $this->freezePane([$this->xSplit + 1, $this->ySplit + 1], $this->topLeftCell, $this->paneState === self::PANE_FROZENSPLIT);
        }

        return $this;
    }

    public function getYSplit(): int
    {
        return $this->ySplit;
    }

    public function setYSplit(int $ySplit): self
    {
        $this->ySplit = $ySplit;
        if (in_array($this->paneState, self::VALIDFROZENSTATE, true)) {
            $this->freezePane([$this->xSplit + 1, $this->ySplit + 1], $this->topLeftCell, $this->paneState === self::PANE_FROZENSPLIT);
        }

        return $this;
    }

    public function getPaneState(): string
    {
        return $this->paneState;
    }

    public const PANE_FROZEN = 'frozen';
    public const PANE_FROZENSPLIT = 'frozenSplit';
    public const PANE_SPLIT = 'split';
    private const VALIDPANESTATE = [self::PANE_FROZEN, self::PANE_SPLIT, self::PANE_FROZENSPLIT];
    private const VALIDFROZENSTATE = [self::PANE_FROZEN, self::PANE_FROZENSPLIT];

    public function setPaneState(string $paneState): self
    {
        $this->paneState = in_array($paneState, self::VALIDPANESTATE, true) ? $paneState : '';
        if (in_array($this->paneState, self::VALIDFROZENSTATE, true)) {
            $this->freezePane([$this->xSplit + 1, $this->ySplit + 1], $this->topLeftCell, $this->paneState === self::PANE_FROZENSPLIT);
        } else {
            $this->freezePane = null;
        }

        return $this;
    }

=======
>>>>>>> 50f5a6f (Initial commit from local project)
    /**
     * Insert a new row, updating all possible related data.
     *
     * @param int $before Insert before this row number
     * @param int $numberOfRows Number of new rows to insert
     *
     * @return $this
     */
<<<<<<< HEAD
    public function insertNewRowBefore(int $before, int $numberOfRows = 1): static
=======
    public function insertNewRowBefore(int $before, int $numberOfRows = 1)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($before >= 1) {
            $objReferenceHelper = ReferenceHelper::getInstance();
            $objReferenceHelper->insertNewBefore('A' . $before, 0, $numberOfRows, $this);
        } else {
            throw new Exception('Rows can only be inserted before at least row 1.');
        }

        return $this;
    }

    /**
     * Insert a new column, updating all possible related data.
     *
     * @param string $before Insert before this column Name, eg: 'A'
     * @param int $numberOfColumns Number of new columns to insert
     *
     * @return $this
     */
<<<<<<< HEAD
    public function insertNewColumnBefore(string $before, int $numberOfColumns = 1): static
=======
    public function insertNewColumnBefore(string $before, int $numberOfColumns = 1)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (!is_numeric($before)) {
            $objReferenceHelper = ReferenceHelper::getInstance();
            $objReferenceHelper->insertNewBefore($before . '1', $numberOfColumns, 0, $this);
        } else {
            throw new Exception('Column references should not be numeric.');
        }

        return $this;
    }

    /**
     * Insert a new column, updating all possible related data.
     *
     * @param int $beforeColumnIndex Insert before this column ID (numeric column coordinate of the cell)
     * @param int $numberOfColumns Number of new columns to insert
     *
     * @return $this
     */
<<<<<<< HEAD
    public function insertNewColumnBeforeByIndex(int $beforeColumnIndex, int $numberOfColumns = 1): static
=======
    public function insertNewColumnBeforeByIndex(int $beforeColumnIndex, int $numberOfColumns = 1)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($beforeColumnIndex >= 1) {
            return $this->insertNewColumnBefore(Coordinate::stringFromColumnIndex($beforeColumnIndex), $numberOfColumns);
        }

        throw new Exception('Columns can only be inserted before at least column A (1).');
    }

    /**
     * Delete a row, updating all possible related data.
     *
     * @param int $row Remove rows, starting with this row number
     * @param int $numberOfRows Number of rows to remove
     *
     * @return $this
     */
<<<<<<< HEAD
    public function removeRow(int $row, int $numberOfRows = 1): static
=======
    public function removeRow(int $row, int $numberOfRows = 1)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($row < 1) {
            throw new Exception('Rows to be deleted should at least start from row 1.');
        }

        $holdRowDimensions = $this->removeRowDimensions($row, $numberOfRows);
        $highestRow = $this->getHighestDataRow();
        $removedRowsCounter = 0;

        for ($r = 0; $r < $numberOfRows; ++$r) {
            if ($row + $r <= $highestRow) {
<<<<<<< HEAD
                $this->cellCollection->removeRow($row + $r);
=======
                $this->getCellCollection()->removeRow($row + $r);
>>>>>>> 50f5a6f (Initial commit from local project)
                ++$removedRowsCounter;
            }
        }

        $objReferenceHelper = ReferenceHelper::getInstance();
        $objReferenceHelper->insertNewBefore('A' . ($row + $numberOfRows), 0, -$numberOfRows, $this);
        for ($r = 0; $r < $removedRowsCounter; ++$r) {
<<<<<<< HEAD
            $this->cellCollection->removeRow($highestRow);
=======
            $this->getCellCollection()->removeRow($highestRow);
>>>>>>> 50f5a6f (Initial commit from local project)
            --$highestRow;
        }

        $this->rowDimensions = $holdRowDimensions;

        return $this;
    }

    private function removeRowDimensions(int $row, int $numberOfRows): array
    {
        $highRow = $row + $numberOfRows - 1;
        $holdRowDimensions = [];
        foreach ($this->rowDimensions as $rowDimension) {
            $num = $rowDimension->getRowIndex();
            if ($num < $row) {
                $holdRowDimensions[$num] = $rowDimension;
            } elseif ($num > $highRow) {
                $num -= $numberOfRows;
                $cloneDimension = clone $rowDimension;
<<<<<<< HEAD
                $cloneDimension->setRowIndex($num);
=======
                $cloneDimension->setRowIndex(/** @scrutinizer ignore-type */ $num);
>>>>>>> 50f5a6f (Initial commit from local project)
                $holdRowDimensions[$num] = $cloneDimension;
            }
        }

        return $holdRowDimensions;
    }

    /**
     * Remove a column, updating all possible related data.
     *
     * @param string $column Remove columns starting with this column name, eg: 'A'
     * @param int $numberOfColumns Number of columns to remove
     *
     * @return $this
     */
<<<<<<< HEAD
    public function removeColumn(string $column, int $numberOfColumns = 1): static
=======
    public function removeColumn(string $column, int $numberOfColumns = 1)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_numeric($column)) {
            throw new Exception('Column references should not be numeric.');
        }

        $highestColumn = $this->getHighestDataColumn();
        $highestColumnIndex = Coordinate::columnIndexFromString($highestColumn);
        $pColumnIndex = Coordinate::columnIndexFromString($column);

        $holdColumnDimensions = $this->removeColumnDimensions($pColumnIndex, $numberOfColumns);

        $column = Coordinate::stringFromColumnIndex($pColumnIndex + $numberOfColumns);
        $objReferenceHelper = ReferenceHelper::getInstance();
        $objReferenceHelper->insertNewBefore($column . '1', -$numberOfColumns, 0, $this);

        $this->columnDimensions = $holdColumnDimensions;

        if ($pColumnIndex > $highestColumnIndex) {
            return $this;
        }

        $maxPossibleColumnsToBeRemoved = $highestColumnIndex - $pColumnIndex + 1;

        for ($c = 0, $n = min($maxPossibleColumnsToBeRemoved, $numberOfColumns); $c < $n; ++$c) {
<<<<<<< HEAD
            $this->cellCollection->removeColumn($highestColumn);
=======
            $this->getCellCollection()->removeColumn($highestColumn);
>>>>>>> 50f5a6f (Initial commit from local project)
            $highestColumn = Coordinate::stringFromColumnIndex(Coordinate::columnIndexFromString($highestColumn) - 1);
        }

        $this->garbageCollect();

        return $this;
    }

    private function removeColumnDimensions(int $pColumnIndex, int $numberOfColumns): array
    {
        $highCol = $pColumnIndex + $numberOfColumns - 1;
        $holdColumnDimensions = [];
        foreach ($this->columnDimensions as $columnDimension) {
            $num = $columnDimension->getColumnNumeric();
            if ($num < $pColumnIndex) {
                $str = $columnDimension->getColumnIndex();
                $holdColumnDimensions[$str] = $columnDimension;
            } elseif ($num > $highCol) {
                $cloneDimension = clone $columnDimension;
                $cloneDimension->setColumnNumeric($num - $numberOfColumns);
                $str = $cloneDimension->getColumnIndex();
                $holdColumnDimensions[$str] = $cloneDimension;
            }
        }

        return $holdColumnDimensions;
    }

    /**
     * Remove a column, updating all possible related data.
     *
     * @param int $columnIndex Remove starting with this column Index (numeric column coordinate)
     * @param int $numColumns Number of columns to remove
     *
     * @return $this
     */
<<<<<<< HEAD
    public function removeColumnByIndex(int $columnIndex, int $numColumns = 1): static
=======
    public function removeColumnByIndex(int $columnIndex, int $numColumns = 1)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($columnIndex >= 1) {
            return $this->removeColumn(Coordinate::stringFromColumnIndex($columnIndex), $numColumns);
        }

        throw new Exception('Columns to be deleted should at least start from column A (1)');
    }

    /**
     * Show gridlines?
     */
    public function getShowGridlines(): bool
    {
        return $this->showGridlines;
    }

    /**
     * Set show gridlines.
     *
     * @param bool $showGridLines Show gridlines (true/false)
     *
     * @return $this
     */
    public function setShowGridlines(bool $showGridLines): self
    {
        $this->showGridlines = $showGridLines;

        return $this;
    }

    /**
     * Print gridlines?
     */
    public function getPrintGridlines(): bool
    {
        return $this->printGridlines;
    }

    /**
     * Set print gridlines.
     *
     * @param bool $printGridLines Print gridlines (true/false)
     *
     * @return $this
     */
    public function setPrintGridlines(bool $printGridLines): self
    {
        $this->printGridlines = $printGridLines;

        return $this;
    }

    /**
     * Show row and column headers?
     */
    public function getShowRowColHeaders(): bool
    {
        return $this->showRowColHeaders;
    }

    /**
     * Set show row and column headers.
     *
     * @param bool $showRowColHeaders Show row and column headers (true/false)
     *
     * @return $this
     */
    public function setShowRowColHeaders(bool $showRowColHeaders): self
    {
        $this->showRowColHeaders = $showRowColHeaders;

        return $this;
    }

    /**
     * Show summary below? (Row/Column outlining).
     */
    public function getShowSummaryBelow(): bool
    {
        return $this->showSummaryBelow;
    }

    /**
     * Set show summary below.
     *
     * @param bool $showSummaryBelow Show summary below (true/false)
     *
     * @return $this
     */
    public function setShowSummaryBelow(bool $showSummaryBelow): self
    {
        $this->showSummaryBelow = $showSummaryBelow;

        return $this;
    }

    /**
     * Show summary right? (Row/Column outlining).
     */
    public function getShowSummaryRight(): bool
    {
        return $this->showSummaryRight;
    }

    /**
     * Set show summary right.
     *
     * @param bool $showSummaryRight Show summary right (true/false)
     *
     * @return $this
     */
    public function setShowSummaryRight(bool $showSummaryRight): self
    {
        $this->showSummaryRight = $showSummaryRight;

        return $this;
    }

    /**
     * Get comments.
     *
     * @return Comment[]
     */
<<<<<<< HEAD
    public function getComments(): array
=======
    public function getComments()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->comments;
    }

    /**
     * Set comments array for the entire sheet.
     *
     * @param Comment[] $comments
     *
     * @return $this
     */
    public function setComments(array $comments): self
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Remove comment from cell.
     *
<<<<<<< HEAD
     * @param array{0: int, 1: int}|CellAddress|string $cellCoordinate Coordinate of the cell as a string, eg: 'C5';
=======
     * @param array<int>|CellAddress|string $cellCoordinate Coordinate of the cell as a string, eg: 'C5';
>>>>>>> 50f5a6f (Initial commit from local project)
     *               or as an array of [$columnIndex, $row] (e.g. [3, 5]), or a CellAddress object.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function removeComment(CellAddress|string|array $cellCoordinate): self
=======
    public function removeComment($cellCoordinate): self
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $cellAddress = Functions::trimSheetFromCellReference(Validations::validateCellAddress($cellCoordinate));

        if (Coordinate::coordinateIsRange($cellAddress)) {
            throw new Exception('Cell coordinate string can not be a range of cells.');
<<<<<<< HEAD
        } elseif (str_contains($cellAddress, '$')) {
=======
        } elseif (strpos($cellAddress, '$') !== false) {
>>>>>>> 50f5a6f (Initial commit from local project)
            throw new Exception('Cell coordinate string must not be absolute.');
        } elseif ($cellAddress == '') {
            throw new Exception('Cell coordinate can not be zero-length string.');
        }
        // Check if we have a comment for this cell and delete it
        if (isset($this->comments[$cellAddress])) {
            unset($this->comments[$cellAddress]);
        }

        return $this;
    }

    /**
     * Get comment for cell.
     *
<<<<<<< HEAD
     * @param array{0: int, 1: int}|CellAddress|string $cellCoordinate Coordinate of the cell as a string, eg: 'C5';
     *               or as an array of [$columnIndex, $row] (e.g. [3, 5]), or a CellAddress object.
     */
    public function getComment(CellAddress|string|array $cellCoordinate, bool $attachNew = true): Comment
=======
     * @param array<int>|CellAddress|string $cellCoordinate Coordinate of the cell as a string, eg: 'C5';
     *               or as an array of [$columnIndex, $row] (e.g. [3, 5]), or a CellAddress object.
     */
    public function getComment($cellCoordinate): Comment
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $cellAddress = Functions::trimSheetFromCellReference(Validations::validateCellAddress($cellCoordinate));

        if (Coordinate::coordinateIsRange($cellAddress)) {
            throw new Exception('Cell coordinate string can not be a range of cells.');
<<<<<<< HEAD
        } elseif (str_contains($cellAddress, '$')) {
=======
        } elseif (strpos($cellAddress, '$') !== false) {
>>>>>>> 50f5a6f (Initial commit from local project)
            throw new Exception('Cell coordinate string must not be absolute.');
        } elseif ($cellAddress == '') {
            throw new Exception('Cell coordinate can not be zero-length string.');
        }

        // Check if we already have a comment for this cell.
        if (isset($this->comments[$cellAddress])) {
            return $this->comments[$cellAddress];
        }

        // If not, create a new comment.
        $newComment = new Comment();
<<<<<<< HEAD
        if ($attachNew) {
            $this->comments[$cellAddress] = $newComment;
        }
=======
        $this->comments[$cellAddress] = $newComment;
>>>>>>> 50f5a6f (Initial commit from local project)

        return $newComment;
    }

    /**
<<<<<<< HEAD
=======
     * Get comment for cell by using numeric cell coordinates.
     *
     * @deprecated 1.23.0
     *      Use the getComment() method with a cell address such as 'C5' instead;,
     *          or passing in an array of [$columnIndex, $row] (e.g. [3, 5]), or a CellAddress object.
     * @see Worksheet::getComment()
     *
     * @param int $columnIndex Numeric column coordinate of the cell
     * @param int $row Numeric row coordinate of the cell
     */
    public function getCommentByColumnAndRow($columnIndex, $row): Comment
    {
        return $this->getComment(Coordinate::stringFromColumnIndex($columnIndex) . $row);
    }

    /**
>>>>>>> 50f5a6f (Initial commit from local project)
     * Get active cell.
     *
     * @return string Example: 'A1'
     */
<<<<<<< HEAD
    public function getActiveCell(): string
=======
    public function getActiveCell()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->activeCell;
    }

    /**
     * Get selected cells.
<<<<<<< HEAD
     */
    public function getSelectedCells(): string
=======
     *
     * @return string
     */
    public function getSelectedCells()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->selectedCells;
    }

    /**
     * Selected cell.
     *
     * @param string $coordinate Cell (i.e. A1)
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setSelectedCell(string $coordinate): static
=======
    public function setSelectedCell($coordinate)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->setSelectedCells($coordinate);
    }

    /**
     * Select a range of cells.
     *
<<<<<<< HEAD
     * @param AddressRange<CellAddress>|AddressRange<int>|AddressRange<string>|array{0: int, 1: int, 2: int, 3: int}|array{0: int, 1: int}|CellAddress|int|string $coordinate A simple string containing a Cell range like 'A1:E10'
=======
     * @param AddressRange|array<int>|CellAddress|int|string $coordinate A simple string containing a Cell range like 'A1:E10'
>>>>>>> 50f5a6f (Initial commit from local project)
     *              or passing in an array of [$fromColumnIndex, $fromRow, $toColumnIndex, $toRow] (e.g. [3, 5, 6, 8]),
     *              or a CellAddress or AddressRange object.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setSelectedCells(AddressRange|CellAddress|int|string|array $coordinate): static
=======
    public function setSelectedCells($coordinate)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_string($coordinate)) {
            $coordinate = Validations::definedNameToCoordinate($coordinate, $this);
        }
        $coordinate = Validations::validateCellOrCellRange($coordinate);

        if (Coordinate::coordinateIsRange($coordinate)) {
            [$first] = Coordinate::splitRange($coordinate);
            $this->activeCell = $first[0];
        } else {
            $this->activeCell = $coordinate;
        }
        $this->selectedCells = $coordinate;
<<<<<<< HEAD
        $this->setSelectedCellsActivePane();
=======
>>>>>>> 50f5a6f (Initial commit from local project)

        return $this;
    }

<<<<<<< HEAD
    private function setSelectedCellsActivePane(): void
    {
        if (!empty($this->freezePane)) {
            $coordinateC = Coordinate::indexesFromString($this->freezePane);
            $coordinateT = Coordinate::indexesFromString($this->activeCell);
            if ($coordinateC[0] === 1) {
                $activePane = ($coordinateT[1] <= $coordinateC[1]) ? 'topLeft' : 'bottomLeft';
            } elseif ($coordinateC[1] === 1) {
                $activePane = ($coordinateT[0] <= $coordinateC[0]) ? 'topLeft' : 'topRight';
            } elseif ($coordinateT[1] <= $coordinateC[1]) {
                $activePane = ($coordinateT[0] <= $coordinateC[0]) ? 'topLeft' : 'topRight';
            } else {
                $activePane = ($coordinateT[0] <= $coordinateC[0]) ? 'bottomLeft' : 'bottomRight';
            }
            $this->setActivePane($activePane);
            $this->panes[$activePane] = new Pane($activePane, $this->selectedCells, $this->activeCell);
        }
=======
    /**
     * Selected cell by using numeric cell coordinates.
     *
     * @deprecated 1.23.0
     *      Use the setSelectedCells() method with a cell address such as 'C5' instead;,
     *          or passing in an array of [$columnIndex, $row] (e.g. [3, 5]), or a CellAddress object.
     * @see Worksheet::setSelectedCells()
     *
     * @param int $columnIndex Numeric column coordinate of the cell
     * @param int $row Numeric row coordinate of the cell
     *
     * @return $this
     */
    public function setSelectedCellByColumnAndRow($columnIndex, $row)
    {
        return $this->setSelectedCells(Coordinate::stringFromColumnIndex($columnIndex) . $row);
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * Get right-to-left.
<<<<<<< HEAD
     */
    public function getRightToLeft(): bool
=======
     *
     * @return bool
     */
    public function getRightToLeft()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->rightToLeft;
    }

    /**
     * Set right-to-left.
     *
     * @param bool $value Right-to-left true/false
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setRightToLeft(bool $value): static
=======
    public function setRightToLeft($value)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->rightToLeft = $value;

        return $this;
    }

    /**
     * Fill worksheet from values in array.
     *
     * @param array $source Source array
     * @param mixed $nullValue Value in source array that stands for blank cell
     * @param string $startCell Insert array starting from this cell address as the top left coordinate
     * @param bool $strictNullComparison Apply strict comparison when testing for null values in the array
     *
     * @return $this
     */
<<<<<<< HEAD
    public function fromArray(array $source, mixed $nullValue = null, string $startCell = 'A1', bool $strictNullComparison = false): static
=======
    public function fromArray(array $source, $nullValue = null, $startCell = 'A1', $strictNullComparison = false)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        //    Convert a 1-D array to 2-D (for ease of looping)
        if (!is_array(end($source))) {
            $source = [$source];
        }

        // start coordinate
        [$startColumn, $startRow] = Coordinate::coordinateFromString($startCell);

        // Loop through $source
<<<<<<< HEAD
        if ($strictNullComparison) {
            foreach ($source as $rowData) {
                $currentColumn = $startColumn;
                foreach ($rowData as $cellValue) {
=======
        foreach ($source as $rowData) {
            $currentColumn = $startColumn;
            foreach ($rowData as $cellValue) {
                if ($strictNullComparison) {
>>>>>>> 50f5a6f (Initial commit from local project)
                    if ($cellValue !== $nullValue) {
                        // Set cell value
                        $this->getCell($currentColumn . $startRow)->setValue($cellValue);
                    }
<<<<<<< HEAD
                    ++$currentColumn;
                }
                ++$startRow;
            }
        } else {
            foreach ($source as $rowData) {
                $currentColumn = $startColumn;
                foreach ($rowData as $cellValue) {
=======
                } else {
>>>>>>> 50f5a6f (Initial commit from local project)
                    if ($cellValue != $nullValue) {
                        // Set cell value
                        $this->getCell($currentColumn . $startRow)->setValue($cellValue);
                    }
<<<<<<< HEAD
                    ++$currentColumn;
                }
                ++$startRow;
            }
=======
                }
                ++$currentColumn;
            }
            ++$startRow;
>>>>>>> 50f5a6f (Initial commit from local project)
        }

        return $this;
    }

    /**
<<<<<<< HEAD
     * @param null|bool|float|int|RichText|string $nullValue value to use when null
     *
     * @throws Exception
     * @throws \PhpOffice\PhpSpreadsheet\Calculation\Exception
     */
    protected function cellToArray(Cell $cell, bool $calculateFormulas, bool $formatData, mixed $nullValue): mixed
=======
     * @param mixed $nullValue
     *
     * @throws Exception
     * @throws \PhpOffice\PhpSpreadsheet\Calculation\Exception
     *
     * @return mixed
     */
    protected function cellToArray(Cell $cell, bool $calculateFormulas, bool $formatData, $nullValue)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $returnValue = $nullValue;

        if ($cell->getValue() !== null) {
            if ($cell->getValue() instanceof RichText) {
                $returnValue = $cell->getValue()->getPlainText();
            } else {
                $returnValue = ($calculateFormulas) ? $cell->getCalculatedValue() : $cell->getValue();
            }

            if ($formatData) {
                $style = $this->getParentOrThrow()->getCellXfByIndex($cell->getXfIndex());
<<<<<<< HEAD
                /** @var null|bool|float|int|RichText|string */
                $returnValuex = $returnValue;
                $returnValue = NumberFormat::toFormattedString(
                    $returnValuex,
=======
                $returnValue = NumberFormat::toFormattedString(
                    $returnValue,
>>>>>>> 50f5a6f (Initial commit from local project)
                    $style->getNumberFormat()->getFormatCode() ?? NumberFormat::FORMAT_GENERAL
                );
            }
        }

        return $returnValue;
    }

    /**
     * Create array from a range of cells.
     *
<<<<<<< HEAD
     * @param null|bool|float|int|RichText|string $nullValue Value returned in the array entry if a cell doesn't exist
=======
     * @param mixed $nullValue Value returned in the array entry if a cell doesn't exist
>>>>>>> 50f5a6f (Initial commit from local project)
     * @param bool $calculateFormulas Should formulas be calculated?
     * @param bool $formatData Should formatting be applied to cell values?
     * @param bool $returnCellRef False - Return a simple array of rows and columns indexed by number counting from zero
     *                             True - Return rows and columns indexed by their actual row and column IDs
     * @param bool $ignoreHidden False - Return values for rows/columns even if they are defined as hidden.
     *                            True - Don't return values for rows/columns that are defined as hidden.
     */
    public function rangeToArray(
        string $range,
<<<<<<< HEAD
        mixed $nullValue = null,
        bool $calculateFormulas = true,
        bool $formatData = true,
        bool $returnCellRef = false,
        bool $ignoreHidden = false,
        bool $reduceArrays = false
    ): array {
        $returnValue = [];

        // Loop through rows
        foreach ($this->rangeToArrayYieldRows($range, $nullValue, $calculateFormulas, $formatData, $returnCellRef, $ignoreHidden, $reduceArrays) as $rowRef => $rowArray) {
            $returnValue[$rowRef] = $rowArray;
        }

        // Return
        return $returnValue;
    }

    /**
     * Create array from a multiple ranges of cells. (such as A1:A3,A15,B17:C17).
     *
     * @param null|bool|float|int|RichText|string $nullValue Value returned in the array entry if a cell doesn't exist
     * @param bool $calculateFormulas Should formulas be calculated?
     * @param bool $formatData Should formatting be applied to cell values?
     * @param bool $returnCellRef False - Return a simple array of rows and columns indexed by number counting from zero
     *                             True - Return rows and columns indexed by their actual row and column IDs
     * @param bool $ignoreHidden False - Return values for rows/columns even if they are defined as hidden.
     *                            True - Don't return values for rows/columns that are defined as hidden.
     */
    public function rangesToArray(
        string $ranges,
        mixed $nullValue = null,
        bool $calculateFormulas = true,
        bool $formatData = true,
        bool $returnCellRef = false,
        bool $ignoreHidden = false,
        bool $reduceArrays = false
    ): array {
        $returnValue = [];

        $parts = explode(',', $ranges);
        foreach ($parts as $part) {
            // Loop through rows
            foreach ($this->rangeToArrayYieldRows($part, $nullValue, $calculateFormulas, $formatData, $returnCellRef, $ignoreHidden, $reduceArrays) as $rowRef => $rowArray) {
                $returnValue[$rowRef] = $rowArray;
            }
        }

        // Return
        return $returnValue;
    }

    /**
     * Create array from a range of cells, yielding each row in turn.
     *
     * @param null|bool|float|int|RichText|string $nullValue Value returned in the array entry if a cell doesn't exist
     * @param bool $calculateFormulas Should formulas be calculated?
     * @param bool $formatData Should formatting be applied to cell values?
     * @param bool $returnCellRef False - Return a simple array of rows and columns indexed by number counting from zero
     *                             True - Return rows and columns indexed by their actual row and column IDs
     * @param bool $ignoreHidden False - Return values for rows/columns even if they are defined as hidden.
     *                            True - Don't return values for rows/columns that are defined as hidden.
     *
     * @return Generator<array>
     */
    public function rangeToArrayYieldRows(
        string $range,
        mixed $nullValue = null,
        bool $calculateFormulas = true,
        bool $formatData = true,
        bool $returnCellRef = false,
        bool $ignoreHidden = false,
        bool $reduceArrays = false
    ) {
        $range = Validations::validateCellOrCellRange($range);

=======
        $nullValue = null,
        bool $calculateFormulas = true,
        bool $formatData = true,
        bool $returnCellRef = false,
        bool $ignoreHidden = false
    ): array {
        $range = Validations::validateCellOrCellRange($range);

        $returnValue = [];
>>>>>>> 50f5a6f (Initial commit from local project)
        //    Identify the range that we need to extract from the worksheet
        [$rangeStart, $rangeEnd] = Coordinate::rangeBoundaries($range);
        $minCol = Coordinate::stringFromColumnIndex($rangeStart[0]);
        $minRow = $rangeStart[1];
        $maxCol = Coordinate::stringFromColumnIndex($rangeEnd[0]);
        $maxRow = $rangeEnd[1];
<<<<<<< HEAD
        $minColInt = $rangeStart[0];
        $maxColInt = $rangeEnd[0];

        ++$maxCol;
        /** @var array<string, bool> */
        $hiddenColumns = [];
        $nullRow = $this->buildNullRow($nullValue, $minCol, $maxCol, $returnCellRef, $ignoreHidden, $hiddenColumns);
        $hideColumns = !empty($hiddenColumns);

        $keys = $this->cellCollection->getSortedCoordinatesInt();
        $keyIndex = 0;
        $keysCount = count($keys);
        // Loop through rows
        for ($row = $minRow; $row <= $maxRow; ++$row) {
            if (($ignoreHidden === true) && ($this->isRowVisible($row) === false)) {
                continue;
            }
            $rowRef = $returnCellRef ? $row : ($row - $minRow);
            $returnValue = $nullRow;

            $index = ($row - 1) * AddressRange::MAX_COLUMN_INT + 1;
            $indexPlus = $index + AddressRange::MAX_COLUMN_INT - 1;
            while ($keyIndex < $keysCount && $keys[$keyIndex] < $index) {
                ++$keyIndex;
            }
            while ($keyIndex < $keysCount && $keys[$keyIndex] <= $indexPlus) {
                $key = $keys[$keyIndex];
                $thisRow = intdiv($key - 1, AddressRange::MAX_COLUMN_INT) + 1;
                $thisCol = ($key % AddressRange::MAX_COLUMN_INT) ?: AddressRange::MAX_COLUMN_INT;
                if ($thisCol >= $minColInt && $thisCol <= $maxColInt) {
                    $col = Coordinate::stringFromColumnIndex($thisCol);
                    if ($hideColumns === false || !isset($hiddenColumns[$col])) {
                        $columnRef = $returnCellRef ? $col : ($thisCol - $minColInt);
                        $cell = $this->cellCollection->get("{$col}{$thisRow}");
                        if ($cell !== null) {
                            $value = $this->cellToArray($cell, $calculateFormulas, $formatData, $nullValue);
                            if ($reduceArrays) {
                                while (is_array($value)) {
                                    $value = array_shift($value);
                                }
                            }
                            if ($value !== $nullValue) {
                                $returnValue[$columnRef] = $value;
                            }
                        }
                    }
                }
                ++$keyIndex;
            }

            yield $rowRef => $returnValue;
        }
    }

    /**
     * Prepare a row data filled with null values to deduplicate the memory areas for empty rows.
     *
     * @param mixed $nullValue Value returned in the array entry if a cell doesn't exist
     * @param string $minCol Start column of the range
     * @param string $maxCol End column of the range
     * @param bool $returnCellRef False - Return a simple array of rows and columns indexed by number counting from zero
     *                              True - Return rows and columns indexed by their actual row and column IDs
     * @param bool $ignoreHidden False - Return values for rows/columns even if they are defined as hidden.
     *                             True - Don't return values for rows/columns that are defined as hidden.
     * @param array<string, bool> $hiddenColumns
     */
    private function buildNullRow(
        mixed $nullValue,
        string $minCol,
        string $maxCol,
        bool $returnCellRef,
        bool $ignoreHidden,
        array &$hiddenColumns
    ): array {
        $nullRow = [];
        $c = -1;
        for ($col = $minCol; $col !== $maxCol; ++$col) {
            if ($ignoreHidden === true && $this->columnDimensionExists($col) && $this->getColumnDimension($col)->getVisible() === false) {
                $hiddenColumns[$col] = true; // @phpstan-ignore-line
            } else {
                $columnRef = $returnCellRef ? $col : ++$c;
                $nullRow[$columnRef] = $nullValue;
            }
        }

        return $nullRow;
=======

        ++$maxCol;
        // Loop through rows
        $r = -1;
        for ($row = $minRow; $row <= $maxRow; ++$row) {
            if (($ignoreHidden === true) && ($this->getRowDimension($row)->getVisible() === false)) {
                continue;
            }
            $rowRef = $returnCellRef ? $row : ++$r;
            $c = -1;
            // Loop through columns in the current row
            for ($col = $minCol; $col !== $maxCol; ++$col) {
                if (($ignoreHidden === true) && ($this->getColumnDimension($col)->getVisible() === false)) {
                    continue;
                }
                $columnRef = $returnCellRef ? $col : ++$c;
                //    Using getCell() will create a new cell if it doesn't already exist. We don't want that to happen
                //        so we test and retrieve directly against cellCollection
                $cell = $this->cellCollection->get("{$col}{$row}");
                $returnValue[$rowRef][$columnRef] = $nullValue;
                if ($cell !== null) {
                    $returnValue[$rowRef][$columnRef] = $this->cellToArray($cell, $calculateFormulas, $formatData, $nullValue);
                }
            }
        }

        // Return
        return $returnValue;
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    private function validateNamedRange(string $definedName, bool $returnNullIfInvalid = false): ?DefinedName
    {
        $namedRange = DefinedName::resolveName($definedName, $this);
        if ($namedRange === null) {
            if ($returnNullIfInvalid) {
                return null;
            }

            throw new Exception('Named Range ' . $definedName . ' does not exist.');
        }

        if ($namedRange->isFormula()) {
            if ($returnNullIfInvalid) {
                return null;
            }

            throw new Exception('Defined Named ' . $definedName . ' is a formula, not a range or cell.');
        }

        if ($namedRange->getLocalOnly()) {
            $worksheet = $namedRange->getWorksheet();
<<<<<<< HEAD
            if ($worksheet === null || $this->hash !== $worksheet->getHashInt()) {
=======
            if ($worksheet === null || $this->getHashInt() !== $worksheet->getHashInt()) {
>>>>>>> 50f5a6f (Initial commit from local project)
                if ($returnNullIfInvalid) {
                    return null;
                }

                throw new Exception(
                    'Named range ' . $definedName . ' is not accessible from within sheet ' . $this->getTitle()
                );
            }
        }

        return $namedRange;
    }

    /**
     * Create array from a range of cells.
     *
     * @param string $definedName The Named Range that should be returned
<<<<<<< HEAD
     * @param null|bool|float|int|RichText|string $nullValue Value returned in the array entry if a cell doesn't exist
=======
     * @param mixed $nullValue Value returned in the array entry if a cell doesn't exist
>>>>>>> 50f5a6f (Initial commit from local project)
     * @param bool $calculateFormulas Should formulas be calculated?
     * @param bool $formatData Should formatting be applied to cell values?
     * @param bool $returnCellRef False - Return a simple array of rows and columns indexed by number counting from zero
     *                             True - Return rows and columns indexed by their actual row and column IDs
     * @param bool $ignoreHidden False - Return values for rows/columns even if they are defined as hidden.
     *                            True - Don't return values for rows/columns that are defined as hidden.
     */
    public function namedRangeToArray(
        string $definedName,
<<<<<<< HEAD
        mixed $nullValue = null,
        bool $calculateFormulas = true,
        bool $formatData = true,
        bool $returnCellRef = false,
        bool $ignoreHidden = false,
        bool $reduceArrays = false
=======
        $nullValue = null,
        bool $calculateFormulas = true,
        bool $formatData = true,
        bool $returnCellRef = false,
        bool $ignoreHidden = false
>>>>>>> 50f5a6f (Initial commit from local project)
    ): array {
        $retVal = [];
        $namedRange = $this->validateNamedRange($definedName);
        if ($namedRange !== null) {
            $cellRange = ltrim(substr($namedRange->getValue(), (int) strrpos($namedRange->getValue(), '!')), '!');
            $cellRange = str_replace('$', '', $cellRange);
            $workSheet = $namedRange->getWorksheet();
            if ($workSheet !== null) {
<<<<<<< HEAD
                $retVal = $workSheet->rangeToArray($cellRange, $nullValue, $calculateFormulas, $formatData, $returnCellRef, $ignoreHidden, $reduceArrays);
=======
                $retVal = $workSheet->rangeToArray($cellRange, $nullValue, $calculateFormulas, $formatData, $returnCellRef, $ignoreHidden);
>>>>>>> 50f5a6f (Initial commit from local project)
            }
        }

        return $retVal;
    }

    /**
     * Create array from worksheet.
     *
<<<<<<< HEAD
     * @param null|bool|float|int|RichText|string $nullValue Value returned in the array entry if a cell doesn't exist
=======
     * @param mixed $nullValue Value returned in the array entry if a cell doesn't exist
>>>>>>> 50f5a6f (Initial commit from local project)
     * @param bool $calculateFormulas Should formulas be calculated?
     * @param bool $formatData Should formatting be applied to cell values?
     * @param bool $returnCellRef False - Return a simple array of rows and columns indexed by number counting from zero
     *                             True - Return rows and columns indexed by their actual row and column IDs
     * @param bool $ignoreHidden False - Return values for rows/columns even if they are defined as hidden.
     *                            True - Don't return values for rows/columns that are defined as hidden.
     */
    public function toArray(
<<<<<<< HEAD
        mixed $nullValue = null,
        bool $calculateFormulas = true,
        bool $formatData = true,
        bool $returnCellRef = false,
        bool $ignoreHidden = false,
        bool $reduceArrays = false
    ): array {
        // Garbage collect...
        $this->garbageCollect();
        $this->calculateArrays($calculateFormulas);
=======
        $nullValue = null,
        bool $calculateFormulas = true,
        bool $formatData = true,
        bool $returnCellRef = false,
        bool $ignoreHidden = false
    ): array {
        // Garbage collect...
        $this->garbageCollect();
>>>>>>> 50f5a6f (Initial commit from local project)

        //    Identify the range that we need to extract from the worksheet
        $maxCol = $this->getHighestColumn();
        $maxRow = $this->getHighestRow();

        // Return
<<<<<<< HEAD
        return $this->rangeToArray("A1:{$maxCol}{$maxRow}", $nullValue, $calculateFormulas, $formatData, $returnCellRef, $ignoreHidden, $reduceArrays);
=======
        return $this->rangeToArray("A1:{$maxCol}{$maxRow}", $nullValue, $calculateFormulas, $formatData, $returnCellRef, $ignoreHidden);
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * Get row iterator.
     *
     * @param int $startRow The row number at which to start iterating
<<<<<<< HEAD
     * @param ?int $endRow The row number at which to stop iterating
     */
    public function getRowIterator(int $startRow = 1, ?int $endRow = null): RowIterator
=======
     * @param int $endRow The row number at which to stop iterating
     *
     * @return RowIterator
     */
    public function getRowIterator($startRow = 1, $endRow = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return new RowIterator($this, $startRow, $endRow);
    }

    /**
     * Get column iterator.
     *
     * @param string $startColumn The column address at which to start iterating
<<<<<<< HEAD
     * @param ?string $endColumn The column address at which to stop iterating
     */
    public function getColumnIterator(string $startColumn = 'A', ?string $endColumn = null): ColumnIterator
=======
     * @param string $endColumn The column address at which to stop iterating
     *
     * @return ColumnIterator
     */
    public function getColumnIterator($startColumn = 'A', $endColumn = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return new ColumnIterator($this, $startColumn, $endColumn);
    }

    /**
     * Run PhpSpreadsheet garbage collector.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function garbageCollect(): static
=======
    public function garbageCollect()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // Flush cache
        $this->cellCollection->get('A1');

        // Lookup highest column and highest row if cells are cleaned
        $colRow = $this->cellCollection->getHighestRowAndColumn();
        $highestRow = $colRow['row'];
        $highestColumn = Coordinate::columnIndexFromString($colRow['column']);

        // Loop through column dimensions
        foreach ($this->columnDimensions as $dimension) {
            $highestColumn = max($highestColumn, Coordinate::columnIndexFromString($dimension->getColumnIndex()));
        }

        // Loop through row dimensions
        foreach ($this->rowDimensions as $dimension) {
            $highestRow = max($highestRow, $dimension->getRowIndex());
        }

        // Cache values
        if ($highestColumn < 1) {
            $this->cachedHighestColumn = 1;
        } else {
            $this->cachedHighestColumn = $highestColumn;
        }
        $this->cachedHighestRow = $highestRow;

        // Return
        return $this;
    }

<<<<<<< HEAD
    public function getHashInt(): int
=======
    /**
     * @deprecated 3.5.0 use getHashInt instead.
     *
     * @return string Hash code
     */
    public function getHashCode()
    {
        return (string) $this->hash;
    }

    /**
     * @return int Hash code
     */
    public function getHashInt()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->hash;
    }

    /**
     * Extract worksheet title from range.
     *
     * Example: extractSheetTitle("testSheet!A1") ==> 'A1'
     * Example: extractSheetTitle("testSheet!A1:C3") ==> 'A1:C3'
     * Example: extractSheetTitle("'testSheet 1'!A1", true) ==> ['testSheet 1', 'A1'];
     * Example: extractSheetTitle("'testSheet 1'!A1:C3", true) ==> ['testSheet 1', 'A1:C3'];
     * Example: extractSheetTitle("A1", true) ==> ['', 'A1'];
     * Example: extractSheetTitle("A1:C3", true) ==> ['', 'A1:C3']
     *
<<<<<<< HEAD
     * @param ?string $range Range to extract title from
     * @param bool $returnRange Return range? (see example)
     *
     * @return ($range is non-empty-string ? ($returnRange is true ? array{0: string, 1: string} : string) : ($returnRange is true ? array{0: null, 1: null} : null))
     */
    public static function extractSheetTitle(?string $range, bool $returnRange = false, bool $unapostrophize = false): array|null|string
=======
     * @param string $range Range to extract title from
     * @param bool $returnRange Return range? (see example)
     *
     * @return mixed
     */
    public static function extractSheetTitle($range, $returnRange = false)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (empty($range)) {
            return $returnRange ? [null, null] : null;
        }

        // Sheet title included?
        if (($sep = strrpos($range, '!')) === false) {
            return $returnRange ? ['', $range] : '';
        }

        if ($returnRange) {
<<<<<<< HEAD
            $title = substr($range, 0, $sep);
            if ($unapostrophize) {
                $title = self::unApostrophizeTitle($title);
            }

            return [$title, substr($range, $sep + 1)];
=======
            return [substr($range, 0, $sep), substr($range, $sep + 1)];
>>>>>>> 50f5a6f (Initial commit from local project)
        }

        return substr($range, $sep + 1);
    }

<<<<<<< HEAD
    public static function unApostrophizeTitle(?string $title): string
    {
        $title ??= '';
        if ($title[0] === "'" && substr($title, -1) === "'") {
            $title = str_replace("''", "'", substr($title, 1, -1));
        }

        return $title;
    }

=======
>>>>>>> 50f5a6f (Initial commit from local project)
    /**
     * Get hyperlink.
     *
     * @param string $cellCoordinate Cell coordinate to get hyperlink for, eg: 'A1'
<<<<<<< HEAD
     */
    public function getHyperlink(string $cellCoordinate): Hyperlink
=======
     *
     * @return Hyperlink
     */
    public function getHyperlink($cellCoordinate)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // return hyperlink if we already have one
        if (isset($this->hyperlinkCollection[$cellCoordinate])) {
            return $this->hyperlinkCollection[$cellCoordinate];
        }

        // else create hyperlink
        $this->hyperlinkCollection[$cellCoordinate] = new Hyperlink();

        return $this->hyperlinkCollection[$cellCoordinate];
    }

    /**
     * Set hyperlink.
     *
     * @param string $cellCoordinate Cell coordinate to insert hyperlink, eg: 'A1'
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setHyperlink(string $cellCoordinate, ?Hyperlink $hyperlink = null): static
=======
    public function setHyperlink($cellCoordinate, ?Hyperlink $hyperlink = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($hyperlink === null) {
            unset($this->hyperlinkCollection[$cellCoordinate]);
        } else {
            $this->hyperlinkCollection[$cellCoordinate] = $hyperlink;
        }

        return $this;
    }

    /**
     * Hyperlink at a specific coordinate exists?
     *
     * @param string $coordinate eg: 'A1'
<<<<<<< HEAD
     */
    public function hyperlinkExists(string $coordinate): bool
=======
     *
     * @return bool
     */
    public function hyperlinkExists($coordinate)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return isset($this->hyperlinkCollection[$coordinate]);
    }

    /**
     * Get collection of hyperlinks.
     *
     * @return Hyperlink[]
     */
<<<<<<< HEAD
    public function getHyperlinkCollection(): array
=======
    public function getHyperlinkCollection()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->hyperlinkCollection;
    }

    /**
     * Get data validation.
     *
     * @param string $cellCoordinate Cell coordinate to get data validation for, eg: 'A1'
<<<<<<< HEAD
     */
    public function getDataValidation(string $cellCoordinate): DataValidation
=======
     *
     * @return DataValidation
     */
    public function getDataValidation($cellCoordinate)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // return data validation if we already have one
        if (isset($this->dataValidationCollection[$cellCoordinate])) {
            return $this->dataValidationCollection[$cellCoordinate];
        }

<<<<<<< HEAD
        // or if cell is part of a data validation range
        foreach ($this->dataValidationCollection as $key => $dataValidation) {
            $keyParts = explode(' ', $key);
            foreach ($keyParts as $keyPart) {
                if ($keyPart === $cellCoordinate) {
                    return $dataValidation;
                }
                if (str_contains($keyPart, ':')) {
                    if (Coordinate::coordinateIsInsideRange($keyPart, $cellCoordinate)) {
                        return $dataValidation;
                    }
                }
            }
        }

        // else create data validation
        $dataValidation = new DataValidation();
        $dataValidation->setSqref($cellCoordinate);
        $this->dataValidationCollection[$cellCoordinate] = $dataValidation;

        return $dataValidation;
=======
        // else create data validation
        $this->dataValidationCollection[$cellCoordinate] = new DataValidation();

        return $this->dataValidationCollection[$cellCoordinate];
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * Set data validation.
     *
     * @param string $cellCoordinate Cell coordinate to insert data validation, eg: 'A1'
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setDataValidation(string $cellCoordinate, ?DataValidation $dataValidation = null): static
=======
    public function setDataValidation($cellCoordinate, ?DataValidation $dataValidation = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($dataValidation === null) {
            unset($this->dataValidationCollection[$cellCoordinate]);
        } else {
<<<<<<< HEAD
            $dataValidation->setSqref($cellCoordinate);
=======
>>>>>>> 50f5a6f (Initial commit from local project)
            $this->dataValidationCollection[$cellCoordinate] = $dataValidation;
        }

        return $this;
    }

    /**
     * Data validation at a specific coordinate exists?
     *
     * @param string $coordinate eg: 'A1'
<<<<<<< HEAD
     */
    public function dataValidationExists(string $coordinate): bool
    {
        if (isset($this->dataValidationCollection[$coordinate])) {
            return true;
        }
        foreach ($this->dataValidationCollection as $key => $dataValidation) {
            $keyParts = explode(' ', $key);
            foreach ($keyParts as $keyPart) {
                if ($keyPart === $coordinate) {
                    return true;
                }
                if (str_contains($keyPart, ':')) {
                    if (Coordinate::coordinateIsInsideRange($keyPart, $coordinate)) {
                        return true;
                    }
                }
            }
        }

        return false;
=======
     *
     * @return bool
     */
    public function dataValidationExists($coordinate)
    {
        return isset($this->dataValidationCollection[$coordinate]);
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * Get collection of data validations.
     *
     * @return DataValidation[]
     */
<<<<<<< HEAD
    public function getDataValidationCollection(): array
    {
        $collectionCells = [];
        $collectionRanges = [];
        foreach ($this->dataValidationCollection as $key => $dataValidation) {
            if (preg_match('/[: ]/', $key) === 1) {
                $collectionRanges[$key] = $dataValidation;
            } else {
                $collectionCells[$key] = $dataValidation;
            }
        }

        return array_merge($collectionCells, $collectionRanges);
=======
    public function getDataValidationCollection()
    {
        return $this->dataValidationCollection;
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * Accepts a range, returning it as a range that falls within the current highest row and column of the worksheet.
     *
<<<<<<< HEAD
     * @return string Adjusted range value
     */
    public function shrinkRangeToFit(string $range): string
=======
     * @param string $range
     *
     * @return string Adjusted range value
     */
    public function shrinkRangeToFit($range)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $maxCol = $this->getHighestColumn();
        $maxRow = $this->getHighestRow();
        $maxCol = Coordinate::columnIndexFromString($maxCol);

        $rangeBlocks = explode(' ', $range);
        foreach ($rangeBlocks as &$rangeSet) {
            $rangeBoundaries = Coordinate::getRangeBoundaries($rangeSet);

            if (Coordinate::columnIndexFromString($rangeBoundaries[0][0]) > $maxCol) {
                $rangeBoundaries[0][0] = Coordinate::stringFromColumnIndex($maxCol);
            }
            if ($rangeBoundaries[0][1] > $maxRow) {
                $rangeBoundaries[0][1] = $maxRow;
            }
            if (Coordinate::columnIndexFromString($rangeBoundaries[1][0]) > $maxCol) {
                $rangeBoundaries[1][0] = Coordinate::stringFromColumnIndex($maxCol);
            }
            if ($rangeBoundaries[1][1] > $maxRow) {
                $rangeBoundaries[1][1] = $maxRow;
            }
            $rangeSet = $rangeBoundaries[0][0] . $rangeBoundaries[0][1] . ':' . $rangeBoundaries[1][0] . $rangeBoundaries[1][1];
        }
        unset($rangeSet);

        return implode(' ', $rangeBlocks);
    }

    /**
     * Get tab color.
<<<<<<< HEAD
     */
    public function getTabColor(): Color
=======
     *
     * @return Color
     */
    public function getTabColor()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($this->tabColor === null) {
            $this->tabColor = new Color();
        }

        return $this->tabColor;
    }

    /**
     * Reset tab color.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function resetTabColor(): static
=======
    public function resetTabColor()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->tabColor = null;

        return $this;
    }

    /**
     * Tab color set?
<<<<<<< HEAD
     */
    public function isTabColorSet(): bool
=======
     *
     * @return bool
     */
    public function isTabColorSet()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->tabColor !== null;
    }

    /**
     * Copy worksheet (!= clone!).
<<<<<<< HEAD
     */
    public function copy(): static
=======
     *
     * @return static
     */
    public function copy()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return clone $this;
    }

    /**
     * Returns a boolean true if the specified row contains no cells. By default, this means that no cell records
     *          exist in the collection for this row. false will be returned otherwise.
     *     This rule can be modified by passing a $definitionOfEmptyFlags value:
     *          1 - CellIterator::TREAT_NULL_VALUE_AS_EMPTY_CELL If the only cells in the collection are null value
     *                  cells, then the row will be considered empty.
     *          2 - CellIterator::TREAT_EMPTY_STRING_AS_EMPTY_CELL If the only cells in the collection are empty
     *                  string value cells, then the row will be considered empty.
     *          3 - CellIterator::TREAT_NULL_VALUE_AS_EMPTY_CELL | CellIterator::TREAT_EMPTY_STRING_AS_EMPTY_CELL
     *                  If the only cells in the collection are null value or empty string value cells, then the row
     *                  will be considered empty.
     *
     * @param int $definitionOfEmptyFlags
     *              Possible Flag Values are:
     *                  CellIterator::TREAT_NULL_VALUE_AS_EMPTY_CELL
     *                  CellIterator::TREAT_EMPTY_STRING_AS_EMPTY_CELL
     */
    public function isEmptyRow(int $rowId, int $definitionOfEmptyFlags = 0): bool
    {
        try {
            $iterator = new RowIterator($this, $rowId, $rowId);
            $iterator->seek($rowId);
            $row = $iterator->current();
<<<<<<< HEAD
        } catch (Exception) {
=======
        } catch (Exception $e) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return true;
        }

        return $row->isEmpty($definitionOfEmptyFlags);
    }

    /**
     * Returns a boolean true if the specified column contains no cells. By default, this means that no cell records
     *          exist in the collection for this column. false will be returned otherwise.
     *     This rule can be modified by passing a $definitionOfEmptyFlags value:
     *          1 - CellIterator::TREAT_NULL_VALUE_AS_EMPTY_CELL If the only cells in the collection are null value
     *                  cells, then the column will be considered empty.
     *          2 - CellIterator::TREAT_EMPTY_STRING_AS_EMPTY_CELL If the only cells in the collection are empty
     *                  string value cells, then the column will be considered empty.
     *          3 - CellIterator::TREAT_NULL_VALUE_AS_EMPTY_CELL | CellIterator::TREAT_EMPTY_STRING_AS_EMPTY_CELL
     *                  If the only cells in the collection are null value or empty string value cells, then the column
     *                  will be considered empty.
     *
     * @param int $definitionOfEmptyFlags
     *              Possible Flag Values are:
     *                  CellIterator::TREAT_NULL_VALUE_AS_EMPTY_CELL
     *                  CellIterator::TREAT_EMPTY_STRING_AS_EMPTY_CELL
     */
    public function isEmptyColumn(string $columnId, int $definitionOfEmptyFlags = 0): bool
    {
        try {
            $iterator = new ColumnIterator($this, $columnId, $columnId);
            $iterator->seek($columnId);
            $column = $iterator->current();
<<<<<<< HEAD
        } catch (Exception) {
=======
        } catch (Exception $e) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return true;
        }

        return $column->isEmpty($definitionOfEmptyFlags);
    }

    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
<<<<<<< HEAD
        foreach (get_object_vars($this) as $key => $val) {
=======
        // @phpstan-ignore-next-line
        foreach ($this as $key => $val) {
>>>>>>> 50f5a6f (Initial commit from local project)
            if ($key == 'parent') {
                continue;
            }

            if (is_object($val) || (is_array($val))) {
<<<<<<< HEAD
                if ($key === 'cellCollection') {
                    $newCollection = $this->cellCollection->cloneCellCollection($this);
                    $this->cellCollection = $newCollection;
                } elseif ($key === 'drawingCollection') {
                    $currentCollection = $this->drawingCollection;
                    $this->drawingCollection = new ArrayObject();
                    foreach ($currentCollection as $item) {
                        $newDrawing = clone $item;
                        $newDrawing->setWorksheet($this);
                    }
                } elseif ($key === 'tableCollection') {
                    $currentCollection = $this->tableCollection;
                    $this->tableCollection = new ArrayObject();
                    foreach ($currentCollection as $item) {
                        $newTable = clone $item;
                        $newTable->setName($item->getName() . 'clone');
                        $this->addTable($newTable);
                    }
                } elseif ($key === 'chartCollection') {
                    $currentCollection = $this->chartCollection;
                    $this->chartCollection = new ArrayObject();
                    foreach ($currentCollection as $item) {
                        $newChart = clone $item;
                        $this->addChart($newChart);
                    }
                } elseif ($key === 'autoFilter') {
=======
                if ($key == 'cellCollection') {
                    $newCollection = $this->cellCollection->cloneCellCollection($this);
                    $this->cellCollection = $newCollection;
                } elseif ($key == 'drawingCollection') {
                    $currentCollection = $this->drawingCollection;
                    $this->drawingCollection = new ArrayObject();
                    foreach ($currentCollection as $item) {
                        if (is_object($item)) {
                            $newDrawing = clone $item;
                            $newDrawing->setWorksheet($this);
                        }
                    }
                } elseif (($key == 'autoFilter') && ($this->autoFilter instanceof AutoFilter)) {
>>>>>>> 50f5a6f (Initial commit from local project)
                    $newAutoFilter = clone $this->autoFilter;
                    $this->autoFilter = $newAutoFilter;
                    $this->autoFilter->setParent($this);
                } else {
                    $this->{$key} = unserialize(serialize($val));
                }
            }
        }
        $this->hash = spl_object_id($this);
    }

    /**
     * Define the code name of the sheet.
     *
     * @param string $codeName Same rule as Title minus space not allowed (but, like Excel, change
     *                       silently space to underscore)
     * @param bool $validate False to skip validation of new title. WARNING: This should only be set
     *                       at parse time (by Readers), where titles can be assumed to be valid.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setCodeName(string $codeName, bool $validate = true): static
=======
    public function setCodeName($codeName, $validate = true)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // Is this a 'rename' or not?
        if ($this->getCodeName() == $codeName) {
            return $this;
        }

        if ($validate) {
            $codeName = str_replace(' ', '_', $codeName); //Excel does this automatically without flinching, we are doing the same

            // Syntax check
            // throw an exception if not valid
            self::checkSheetCodeName($codeName);

            // We use the same code that setTitle to find a valid codeName else not using a space (Excel don't like) but a '_'

            if ($this->parent !== null) {
                // Is there already such sheet name?
                if ($this->parent->sheetCodeNameExists($codeName)) {
                    // Use name, but append with lowest possible integer

<<<<<<< HEAD
                    if (StringHelper::countCharacters($codeName) > 29) {
                        $codeName = StringHelper::substring($codeName, 0, 29);
=======
                    if (Shared\StringHelper::countCharacters($codeName) > 29) {
                        $codeName = Shared\StringHelper::substring($codeName, 0, 29);
>>>>>>> 50f5a6f (Initial commit from local project)
                    }
                    $i = 1;
                    while ($this->getParentOrThrow()->sheetCodeNameExists($codeName . '_' . $i)) {
                        ++$i;
                        if ($i == 10) {
<<<<<<< HEAD
                            if (StringHelper::countCharacters($codeName) > 28) {
                                $codeName = StringHelper::substring($codeName, 0, 28);
                            }
                        } elseif ($i == 100) {
                            if (StringHelper::countCharacters($codeName) > 27) {
                                $codeName = StringHelper::substring($codeName, 0, 27);
=======
                            if (Shared\StringHelper::countCharacters($codeName) > 28) {
                                $codeName = Shared\StringHelper::substring($codeName, 0, 28);
                            }
                        } elseif ($i == 100) {
                            if (Shared\StringHelper::countCharacters($codeName) > 27) {
                                $codeName = Shared\StringHelper::substring($codeName, 0, 27);
>>>>>>> 50f5a6f (Initial commit from local project)
                            }
                        }
                    }

                    $codeName .= '_' . $i; // ok, we have a valid name
                }
            }
        }

        $this->codeName = $codeName;

        return $this;
    }

    /**
     * Return the code name of the sheet.
<<<<<<< HEAD
     */
    public function getCodeName(): ?string
=======
     *
     * @return null|string
     */
    public function getCodeName()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->codeName;
    }

    /**
     * Sheet has a code name ?
<<<<<<< HEAD
     */
    public function hasCodeName(): bool
=======
     *
     * @return bool
     */
    public function hasCodeName()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->codeName !== null;
    }

    public static function nameRequiresQuotes(string $sheetName): bool
    {
        return preg_match(self::SHEET_NAME_REQUIRES_NO_QUOTES, $sheetName) !== 1;
    }
<<<<<<< HEAD

    public function isRowVisible(int $row): bool
    {
        return !$this->rowDimensionExists($row) || $this->getRowDimension($row)->getVisible();
    }

    /**
     * Same as Cell->isLocked, but without creating cell if it doesn't exist.
     */
    public function isCellLocked(string $coordinate): bool
    {
        if ($this->getProtection()->getsheet() !== true) {
            return false;
        }
        if ($this->cellExists($coordinate)) {
            return $this->getCell($coordinate)->isLocked();
        }
        $spreadsheet = $this->parent;
        $xfIndex = $this->getXfIndex($coordinate);
        if ($spreadsheet === null || $xfIndex === null) {
            return true;
        }

        return $spreadsheet->getCellXfByIndex($xfIndex)->getProtection()->getLocked() !== StyleProtection::PROTECTION_UNPROTECTED;
    }

    /**
     * Same as Cell->isHiddenOnFormulaBar, but without creating cell if it doesn't exist.
     */
    public function isCellHiddenOnFormulaBar(string $coordinate): bool
    {
        if ($this->cellExists($coordinate)) {
            return $this->getCell($coordinate)->isHiddenOnFormulaBar();
        }

        // cell doesn't exist, therefore isn't a formula,
        // therefore isn't hidden on formula bar.
        return false;
    }

    private function getXfIndex(string $coordinate): ?int
    {
        [$column, $row] = Coordinate::coordinateFromString($coordinate);
        $row = (int) $row;
        $xfIndex = null;
        if ($this->rowDimensionExists($row)) {
            $xfIndex = $this->getRowDimension($row)->getXfIndex();
        }
        if ($xfIndex === null && $this->ColumnDimensionExists($column)) {
            $xfIndex = $this->getColumnDimension($column)->getXfIndex();
        }

        return $xfIndex;
    }

    private string $backgroundImage = '';

    private string $backgroundMime = '';

    private string $backgroundExtension = '';

    public function getBackgroundImage(): string
    {
        return $this->backgroundImage;
    }

    public function getBackgroundMime(): string
    {
        return $this->backgroundMime;
    }

    public function getBackgroundExtension(): string
    {
        return $this->backgroundExtension;
    }

    /**
     * Set background image.
     * Used on read/write for Xlsx.
     * Used on write for Html.
     *
     * @param string $backgroundImage Image represented as a string, e.g. results of file_get_contents
     */
    public function setBackgroundImage(string $backgroundImage): self
    {
        $imageArray = getimagesizefromstring($backgroundImage) ?: ['mime' => ''];
        $mime = $imageArray['mime'];
        if ($mime !== '') {
            $extension = explode('/', $mime);
            $extension = $extension[1];
            $this->backgroundImage = $backgroundImage;
            $this->backgroundMime = $mime;
            $this->backgroundExtension = $extension;
        }

        return $this;
    }

    /**
     * Copy cells, adjusting relative cell references in formulas.
     * Acts similarly to Excel "fill handle" feature.
     *
     * @param string $fromCell Single source cell, e.g. C3
     * @param string $toCells Single cell or cell range, e.g. C4 or C4:C10
     * @param bool $copyStyle Copy styles as well as values, defaults to true
     */
    public function copyCells(string $fromCell, string $toCells, bool $copyStyle = true): void
    {
        $toArray = Coordinate::extractAllCellReferencesInRange($toCells);
        $valueString = $this->getCell($fromCell)->getValueString();
        $style = $this->getStyle($fromCell)->exportArray();
        $fromIndexes = Coordinate::indexesFromString($fromCell);
        $referenceHelper = ReferenceHelper::getInstance();
        foreach ($toArray as $destination) {
            if ($destination !== $fromCell) {
                $toIndexes = Coordinate::indexesFromString($destination);
                $this->getCell($destination)->setValue($referenceHelper->updateFormulaReferences($valueString, 'A1', $toIndexes[0] - $fromIndexes[0], $toIndexes[1] - $fromIndexes[1]));
                if ($copyStyle) {
                    $this->getCell($destination)->getStyle()->applyFromArray($style);
                }
            }
        }
    }

    public function calculateArrays(bool $preCalculateFormulas = true): void
    {
        if ($preCalculateFormulas && Calculation::getInstance($this->parent)->getInstanceArrayReturnType() === Calculation::RETURN_ARRAY_AS_ARRAY) {
            $keys = $this->cellCollection->getCoordinates();
            foreach ($keys as $key) {
                if ($this->getCell($key)->getDataType() === DataType::TYPE_FORMULA) {
                    if (preg_match(self::FUNCTION_LIKE_GROUPBY, $this->getCell($key)->getValueString()) !== 1) {
                        $this->getCell($key)->getCalculatedValue();
                    }
                }
            }
        }
    }

    public function isCellInSpillRange(string $coordinate): bool
    {
        if (Calculation::getInstance($this->parent)->getInstanceArrayReturnType() !== Calculation::RETURN_ARRAY_AS_ARRAY) {
            return false;
        }
        $this->calculateArrays();
        $keys = $this->cellCollection->getCoordinates();
        foreach ($keys as $key) {
            $attributes = $this->getCell($key)->getFormulaAttributes();
            if (isset($attributes['ref'])) {
                if (Coordinate::coordinateIsInsideRange($attributes['ref'], $coordinate)) {
                    // false for first cell in range, true otherwise
                    return $coordinate !== $key;
                }
            }
        }

        return false;
    }

    public function applyStylesFromArray(string $coordinate, array $styleArray): bool
    {
        $spreadsheet = $this->parent;
        if ($spreadsheet === null) {
            return false;
        }
        $activeSheetIndex = $spreadsheet->getActiveSheetIndex();
        $originalSelected = $this->selectedCells;
        $this->getStyle($coordinate)->applyFromArray($styleArray);
        $this->setSelectedCells($originalSelected);
        if ($activeSheetIndex >= 0) {
            $spreadsheet->setActiveSheetIndex($activeSheetIndex);
        }

        return true;
    }
=======
>>>>>>> 50f5a6f (Initial commit from local project)
}
