<?php

namespace PhpOffice\PhpSpreadsheet;

use JsonSerializable;
use PhpOffice\PhpSpreadsheet\Calculation\Calculation;
<<<<<<< HEAD
use PhpOffice\PhpSpreadsheet\Cell\IValueBinder;
use PhpOffice\PhpSpreadsheet\Document\Properties;
use PhpOffice\PhpSpreadsheet\Document\Security;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Shared\StringHelper;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Worksheet\Iterator;
use PhpOffice\PhpSpreadsheet\Worksheet\Table;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
=======
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;
use PhpOffice\PhpSpreadsheet\Shared\File;
use PhpOffice\PhpSpreadsheet\Shared\StringHelper;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Worksheet\Iterator;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;
>>>>>>> 50f5a6f (Initial commit from local project)

class Spreadsheet implements JsonSerializable
{
    // Allowable values for workbook window visilbity
    const VISIBILITY_VISIBLE = 'visible';
    const VISIBILITY_HIDDEN = 'hidden';
    const VISIBILITY_VERY_HIDDEN = 'veryHidden';

    private const DEFINED_NAME_IS_RANGE = false;
    private const DEFINED_NAME_IS_FORMULA = true;

    private const WORKBOOK_VIEW_VISIBILITY_VALUES = [
        self::VISIBILITY_VISIBLE,
        self::VISIBILITY_HIDDEN,
        self::VISIBILITY_VERY_HIDDEN,
    ];

<<<<<<< HEAD
    protected int $excelCalendar = Date::CALENDAR_WINDOWS_1900;

    /**
     * Unique ID.
     */
    private string $uniqueID;

    /**
     * Document properties.
     */
    private Properties $properties;

    /**
     * Document security.
     */
    private Security $security;
=======
    /**
     * Unique ID.
     *
     * @var string
     */
    private $uniqueID;

    /**
     * Document properties.
     *
     * @var Document\Properties
     */
    private $properties;

    /**
     * Document security.
     *
     * @var Document\Security
     */
    private $security;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Collection of Worksheet objects.
     *
     * @var Worksheet[]
     */
<<<<<<< HEAD
    private array $workSheetCollection;

    /**
     * Calculation Engine.
     */
    private ?Calculation $calculationEngine;

    /**
     * Active sheet index.
     */
    private int $activeSheetIndex;
=======
    private $workSheetCollection = [];

    /**
     * Calculation Engine.
     *
     * @var null|Calculation
     */
    private $calculationEngine;

    /**
     * Active sheet index.
     *
     * @var int
     */
    private $activeSheetIndex = 0;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Named ranges.
     *
     * @var DefinedName[]
     */
<<<<<<< HEAD
    private array $definedNames;

    /**
     * CellXf supervisor.
     */
    private Style $cellXfSupervisor;
=======
    private $definedNames = [];

    /**
     * CellXf supervisor.
     *
     * @var Style
     */
    private $cellXfSupervisor;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * CellXf collection.
     *
     * @var Style[]
     */
<<<<<<< HEAD
    private array $cellXfCollection = [];
=======
    private $cellXfCollection = [];
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * CellStyleXf collection.
     *
     * @var Style[]
     */
<<<<<<< HEAD
    private array $cellStyleXfCollection = [];

    /**
     * hasMacros : this workbook have macros ?
     */
    private bool $hasMacros = false;

    /**
     * macrosCode : all macros code as binary data (the vbaProject.bin file, this include form, code,  etc.), null if no macro.
     */
    private ?string $macrosCode = null;

    /**
     * macrosCertificate : if macros are signed, contains binary data vbaProjectSignature.bin file, null if not signed.
     */
    private ?string $macrosCertificate = null;
=======
    private $cellStyleXfCollection = [];

    /**
     * hasMacros : this workbook have macros ?
     *
     * @var bool
     */
    private $hasMacros = false;

    /**
     * macrosCode : all macros code as binary data (the vbaProject.bin file, this include form, code,  etc.), null if no macro.
     *
     * @var null|string
     */
    private $macrosCode;

    /**
     * macrosCertificate : if macros are signed, contains binary data vbaProjectSignature.bin file, null if not signed.
     *
     * @var null|string
     */
    private $macrosCertificate;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * ribbonXMLData : null if workbook is'nt Excel 2007 or not contain a customized UI.
     *
     * @var null|array{target: string, data: string}
     */
<<<<<<< HEAD
    private ?array $ribbonXMLData = null;
=======
    private $ribbonXMLData;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * ribbonBinObjects : null if workbook is'nt Excel 2007 or not contain embedded objects (picture(s)) for Ribbon Elements
     * ignored if $ribbonXMLData is null.
<<<<<<< HEAD
     */
    private ?array $ribbonBinObjects = null;
=======
     *
     * @var null|array
     */
    private $ribbonBinObjects;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * List of unparsed loaded data for export to same format with better compatibility.
     * It has to be minimized when the library start to support currently unparsed data.
<<<<<<< HEAD
     */
    private array $unparsedLoadedData = [];

    /**
     * Controls visibility of the horizonal scroll bar in the application.
     */
    private bool $showHorizontalScroll = true;

    /**
     * Controls visibility of the horizonal scroll bar in the application.
     */
    private bool $showVerticalScroll = true;

    /**
     * Controls visibility of the sheet tabs in the application.
     */
    private bool $showSheetTabs = true;
=======
     *
     * @var array
     */
    private $unparsedLoadedData = [];

    /**
     * Controls visibility of the horizonal scroll bar in the application.
     *
     * @var bool
     */
    private $showHorizontalScroll = true;

    /**
     * Controls visibility of the horizonal scroll bar in the application.
     *
     * @var bool
     */
    private $showVerticalScroll = true;

    /**
     * Controls visibility of the sheet tabs in the application.
     *
     * @var bool
     */
    private $showSheetTabs = true;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Specifies a boolean value that indicates whether the workbook window
     * is minimized.
<<<<<<< HEAD
     */
    private bool $minimized = false;
=======
     *
     * @var bool
     */
    private $minimized = false;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Specifies a boolean value that indicates whether to group dates
     * when presenting the user with filtering optiomd in the user
     * interface.
<<<<<<< HEAD
     */
    private bool $autoFilterDateGrouping = true;

    /**
     * Specifies the index to the first sheet in the book view.
     */
    private int $firstSheetIndex = 0;

    /**
     * Specifies the visible status of the workbook.
     */
    private string $visibility = self::VISIBILITY_VISIBLE;
=======
     *
     * @var bool
     */
    private $autoFilterDateGrouping = true;

    /**
     * Specifies the index to the first sheet in the book view.
     *
     * @var int
     */
    private $firstSheetIndex = 0;

    /**
     * Specifies the visible status of the workbook.
     *
     * @var string
     */
    private $visibility = self::VISIBILITY_VISIBLE;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Specifies the ratio between the workbook tabs bar and the horizontal
     * scroll bar.  TabRatio is assumed to be out of 1000 of the horizontal
     * window width.
<<<<<<< HEAD
     */
    private int $tabRatio = 600;

    private Theme $theme;

    private ?IValueBinder $valueBinder = null;
=======
     *
     * @var int
     */
    private $tabRatio = 600;

    /** @var Theme */
    private $theme;
>>>>>>> 50f5a6f (Initial commit from local project)

    public function getTheme(): Theme
    {
        return $this->theme;
    }

    /**
     * The workbook has macros ?
<<<<<<< HEAD
     */
    public function hasMacros(): bool
=======
     *
     * @return bool
     */
    public function hasMacros()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->hasMacros;
    }

    /**
     * Define if a workbook has macros.
     *
     * @param bool $hasMacros true|false
     */
<<<<<<< HEAD
    public function setHasMacros(bool $hasMacros): void
=======
    public function setHasMacros($hasMacros): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->hasMacros = (bool) $hasMacros;
    }

    /**
     * Set the macros code.
<<<<<<< HEAD
     */
    public function setMacrosCode(?string $macroCode): void
=======
     *
     * @param string $macroCode string|null
     */
    public function setMacrosCode($macroCode): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->macrosCode = $macroCode;
        $this->setHasMacros($macroCode !== null);
    }

    /**
     * Return the macros code.
<<<<<<< HEAD
     */
    public function getMacrosCode(): ?string
=======
     *
     * @return null|string
     */
    public function getMacrosCode()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->macrosCode;
    }

    /**
     * Set the macros certificate.
<<<<<<< HEAD
     */
    public function setMacrosCertificate(?string $certificate): void
=======
     *
     * @param null|string $certificate
     */
    public function setMacrosCertificate($certificate): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->macrosCertificate = $certificate;
    }

    /**
     * Is the project signed ?
     *
     * @return bool true|false
     */
<<<<<<< HEAD
    public function hasMacrosCertificate(): bool
=======
    public function hasMacrosCertificate()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->macrosCertificate !== null;
    }

    /**
     * Return the macros certificate.
<<<<<<< HEAD
     */
    public function getMacrosCertificate(): ?string
=======
     *
     * @return null|string
     */
    public function getMacrosCertificate()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->macrosCertificate;
    }

    /**
     * Remove all macros, certificate from spreadsheet.
     */
    public function discardMacros(): void
    {
        $this->hasMacros = false;
        $this->macrosCode = null;
        $this->macrosCertificate = null;
    }

    /**
     * set ribbon XML data.
<<<<<<< HEAD
     */
    public function setRibbonXMLData(mixed $target, mixed $xmlData): void
    {
        if (is_string($target) && is_string($xmlData)) {
=======
     *
     * @param null|mixed $target
     * @param null|mixed $xmlData
     */
    public function setRibbonXMLData($target, $xmlData): void
    {
        if ($target !== null && $xmlData !== null) {
>>>>>>> 50f5a6f (Initial commit from local project)
            $this->ribbonXMLData = ['target' => $target, 'data' => $xmlData];
        } else {
            $this->ribbonXMLData = null;
        }
    }

    /**
     * retrieve ribbon XML Data.
<<<<<<< HEAD
     */
    public function getRibbonXMLData(string $what = 'all'): null|array|string //we need some constants here...
=======
     *
     * @param string $what
     *
     * @return null|array|string
     */
    public function getRibbonXMLData($what = 'all') //we need some constants here...
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $returnData = null;
        $what = strtolower($what);
        switch ($what) {
            case 'all':
                $returnData = $this->ribbonXMLData;

                break;
            case 'target':
            case 'data':
                if (is_array($this->ribbonXMLData)) {
                    $returnData = $this->ribbonXMLData[$what];
                }

                break;
        }

        return $returnData;
    }

    /**
     * store binaries ribbon objects (pictures).
<<<<<<< HEAD
     */
    public function setRibbonBinObjects(mixed $binObjectsNames, mixed $binObjectsData): void
    {
        if ($binObjectsNames !== null && $binObjectsData !== null) {
            $this->ribbonBinObjects = ['names' => $binObjectsNames, 'data' => $binObjectsData];
=======
     *
     * @param null|mixed $BinObjectsNames
     * @param null|mixed $BinObjectsData
     */
    public function setRibbonBinObjects($BinObjectsNames, $BinObjectsData): void
    {
        if ($BinObjectsNames !== null && $BinObjectsData !== null) {
            $this->ribbonBinObjects = ['names' => $BinObjectsNames, 'data' => $BinObjectsData];
>>>>>>> 50f5a6f (Initial commit from local project)
        } else {
            $this->ribbonBinObjects = null;
        }
    }

    /**
     * List of unparsed loaded data for export to same format with better compatibility.
     * It has to be minimized when the library start to support currently unparsed data.
     *
     * @internal
<<<<<<< HEAD
     */
    public function getUnparsedLoadedData(): array
=======
     *
     * @return array
     */
    public function getUnparsedLoadedData()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->unparsedLoadedData;
    }

    /**
     * List of unparsed loaded data for export to same format with better compatibility.
     * It has to be minimized when the library start to support currently unparsed data.
     *
     * @internal
     */
    public function setUnparsedLoadedData(array $unparsedLoadedData): void
    {
        $this->unparsedLoadedData = $unparsedLoadedData;
    }

    /**
<<<<<<< HEAD
     * retrieve Binaries Ribbon Objects.
     */
    public function getRibbonBinObjects(string $what = 'all'): ?array
=======
     * return the extension of a filename. Internal use for a array_map callback (php<5.3 don't like lambda function).
     *
     * @param mixed $path
     *
     * @return string
     */
    private function getExtensionOnly($path)
    {
        $extension = pathinfo($path, PATHINFO_EXTENSION);

        return substr(/** @scrutinizer ignore-type */$extension, 0);
    }

    /**
     * retrieve Binaries Ribbon Objects.
     *
     * @param string $what
     *
     * @return null|array
     */
    public function getRibbonBinObjects($what = 'all')
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $ReturnData = null;
        $what = strtolower($what);
        switch ($what) {
            case 'all':
                return $this->ribbonBinObjects;
            case 'names':
            case 'data':
<<<<<<< HEAD
                if (is_array($this->ribbonBinObjects) && is_array($this->ribbonBinObjects[$what] ?? null)) {
=======
                if (is_array($this->ribbonBinObjects) && isset($this->ribbonBinObjects[$what])) {
>>>>>>> 50f5a6f (Initial commit from local project)
                    $ReturnData = $this->ribbonBinObjects[$what];
                }

                break;
            case 'types':
                if (
<<<<<<< HEAD
                    is_array($this->ribbonBinObjects)
                    && isset($this->ribbonBinObjects['data']) && is_array($this->ribbonBinObjects['data'])
                ) {
                    $tmpTypes = array_keys($this->ribbonBinObjects['data']);
                    $ReturnData = array_unique(array_map(fn (string $path): string => pathinfo($path, PATHINFO_EXTENSION), $tmpTypes));
=======
                    is_array($this->ribbonBinObjects) &&
                    isset($this->ribbonBinObjects['data']) && is_array($this->ribbonBinObjects['data'])
                ) {
                    $tmpTypes = array_keys($this->ribbonBinObjects['data']);
                    $ReturnData = array_unique(array_map([$this, 'getExtensionOnly'], $tmpTypes));
>>>>>>> 50f5a6f (Initial commit from local project)
                } else {
                    $ReturnData = []; // the caller want an array... not null if empty
                }

                break;
        }

        return $ReturnData;
    }

    /**
     * This workbook have a custom UI ?
<<<<<<< HEAD
     */
    public function hasRibbon(): bool
=======
     *
     * @return bool
     */
    public function hasRibbon()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->ribbonXMLData !== null;
    }

    /**
     * This workbook have additionnal object for the ribbon ?
<<<<<<< HEAD
     */
    public function hasRibbonBinObjects(): bool
=======
     *
     * @return bool
     */
    public function hasRibbonBinObjects()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->ribbonBinObjects !== null;
    }

    /**
     * Check if a sheet with a specified code name already exists.
     *
     * @param string $codeName Name of the worksheet to check
<<<<<<< HEAD
     */
    public function sheetCodeNameExists(string $codeName): bool
=======
     *
     * @return bool
     */
    public function sheetCodeNameExists($codeName)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->getSheetByCodeName($codeName) !== null;
    }

    /**
     * Get sheet by code name. Warning : sheet don't have always a code name !
     *
     * @param string $codeName Sheet name
<<<<<<< HEAD
     */
    public function getSheetByCodeName(string $codeName): ?Worksheet
=======
     *
     * @return null|Worksheet
     */
    public function getSheetByCodeName($codeName)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $worksheetCount = count($this->workSheetCollection);
        for ($i = 0; $i < $worksheetCount; ++$i) {
            if ($this->workSheetCollection[$i]->getCodeName() == $codeName) {
                return $this->workSheetCollection[$i];
            }
        }

        return null;
    }

    /**
     * Create a new PhpSpreadsheet with one Worksheet.
     */
    public function __construct()
    {
        $this->uniqueID = uniqid('', true);
        $this->calculationEngine = new Calculation($this);
        $this->theme = new Theme();

        // Initialise worksheet collection and add one worksheet
        $this->workSheetCollection = [];
        $this->workSheetCollection[] = new Worksheet($this);
        $this->activeSheetIndex = 0;

        // Create document properties
<<<<<<< HEAD
        $this->properties = new Properties();

        // Create document security
        $this->security = new Security();
=======
        $this->properties = new Document\Properties();

        // Create document security
        $this->security = new Document\Security();
>>>>>>> 50f5a6f (Initial commit from local project)

        // Set defined names
        $this->definedNames = [];

        // Create the cellXf supervisor
        $this->cellXfSupervisor = new Style(true);
        $this->cellXfSupervisor->bindParent($this);

        // Create the default style
        $this->addCellXf(new Style());
        $this->addCellStyleXf(new Style());
    }

    /**
     * Code to execute when this worksheet is unset().
     */
    public function __destruct()
    {
        $this->disconnectWorksheets();
        $this->calculationEngine = null;
        $this->cellXfCollection = [];
        $this->cellStyleXfCollection = [];
<<<<<<< HEAD
        $this->definedNames = [];
=======
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * Disconnect all worksheets from this PhpSpreadsheet workbook object,
     * typically so that the PhpSpreadsheet object can be unset.
     */
    public function disconnectWorksheets(): void
    {
        foreach ($this->workSheetCollection as $worksheet) {
            $worksheet->disconnectCells();
            unset($worksheet);
        }
        $this->workSheetCollection = [];
    }

    /**
     * Return the calculation engine for this worksheet.
<<<<<<< HEAD
     */
    public function getCalculationEngine(): ?Calculation
=======
     *
     * @return null|Calculation
     */
    public function getCalculationEngine()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->calculationEngine;
    }

    /**
     * Get properties.
<<<<<<< HEAD
     */
    public function getProperties(): Properties
=======
     *
     * @return Document\Properties
     */
    public function getProperties()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->properties;
    }

    /**
     * Set properties.
     */
<<<<<<< HEAD
    public function setProperties(Properties $documentProperties): void
=======
    public function setProperties(Document\Properties $documentProperties): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->properties = $documentProperties;
    }

    /**
     * Get security.
<<<<<<< HEAD
     */
    public function getSecurity(): Security
=======
     *
     * @return Document\Security
     */
    public function getSecurity()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->security;
    }

    /**
     * Set security.
     */
<<<<<<< HEAD
    public function setSecurity(Security $documentSecurity): void
=======
    public function setSecurity(Document\Security $documentSecurity): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->security = $documentSecurity;
    }

    /**
     * Get active sheet.
<<<<<<< HEAD
     */
    public function getActiveSheet(): Worksheet
=======
     *
     * @return Worksheet
     */
    public function getActiveSheet()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->getSheet($this->activeSheetIndex);
    }

    /**
     * Create sheet and add it to this workbook.
     *
     * @param null|int $sheetIndex Index where sheet should go (0,1,..., or null for last)
<<<<<<< HEAD
     */
    public function createSheet(?int $sheetIndex = null): Worksheet
=======
     *
     * @return Worksheet
     */
    public function createSheet($sheetIndex = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $newSheet = new Worksheet($this);
        $this->addSheet($newSheet, $sheetIndex, true);

        return $newSheet;
    }

    /**
     * Check if a sheet with a specified name already exists.
     *
     * @param string $worksheetName Name of the worksheet to check
<<<<<<< HEAD
     */
    public function sheetNameExists(string $worksheetName): bool
=======
     *
     * @return bool
     */
    public function sheetNameExists($worksheetName)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->getSheetByName($worksheetName) !== null;
    }

<<<<<<< HEAD
    public function duplicateWorksheetByTitle(string $title): Worksheet
    {
        $original = $this->getSheetByNameOrThrow($title);
        $index = $this->getIndex($original) + 1;
        $clone = clone $original;

        return $this->addSheet($clone, $index, true);
    }

=======
>>>>>>> 50f5a6f (Initial commit from local project)
    /**
     * Add sheet.
     *
     * @param Worksheet $worksheet The worksheet to add
     * @param null|int $sheetIndex Index where sheet should go (0,1,..., or null for last)
<<<<<<< HEAD
     */
    public function addSheet(Worksheet $worksheet, ?int $sheetIndex = null, bool $retitleIfNeeded = false): Worksheet
=======
     * @param bool $retitleIfNeeded add suffix if title exists in spreadsheet
     *
     * @return Worksheet
     */
    public function addSheet(Worksheet $worksheet, $sheetIndex = null, $retitleIfNeeded = false)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($retitleIfNeeded) {
            $title = $worksheet->getTitle();
            if ($this->sheetNameExists($title)) {
                $i = 1;
                $newTitle = "$title $i";
                while ($this->sheetNameExists($newTitle)) {
                    ++$i;
                    $newTitle = "$title $i";
                }
                $worksheet->setTitle($newTitle);
            }
        }
        if ($this->sheetNameExists($worksheet->getTitle())) {
            throw new Exception(
                "Workbook already contains a worksheet named '{$worksheet->getTitle()}'. Rename this worksheet first."
            );
        }

        if ($sheetIndex === null) {
            if ($this->activeSheetIndex < 0) {
                $this->activeSheetIndex = 0;
            }
            $this->workSheetCollection[] = $worksheet;
        } else {
            // Insert the sheet at the requested index
            array_splice(
                $this->workSheetCollection,
                $sheetIndex,
                0,
                [$worksheet]
            );

            // Adjust active sheet index if necessary
            if ($this->activeSheetIndex >= $sheetIndex) {
                ++$this->activeSheetIndex;
            }
<<<<<<< HEAD
            if ($this->activeSheetIndex < 0) {
                $this->activeSheetIndex = 0;
            }
=======
>>>>>>> 50f5a6f (Initial commit from local project)
        }

        if ($worksheet->getParent() === null) {
            $worksheet->rebindParent($this);
        }

        return $worksheet;
    }

    /**
     * Remove sheet by index.
     *
     * @param int $sheetIndex Index position of the worksheet to remove
     */
<<<<<<< HEAD
    public function removeSheetByIndex(int $sheetIndex): void
=======
    public function removeSheetByIndex($sheetIndex): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $numSheets = count($this->workSheetCollection);
        if ($sheetIndex > $numSheets - 1) {
            throw new Exception(
                "You tried to remove a sheet by the out of bounds index: {$sheetIndex}. The actual number of sheets is {$numSheets}."
            );
        }
        array_splice($this->workSheetCollection, $sheetIndex, 1);

        // Adjust active sheet index if necessary
        if (
<<<<<<< HEAD
            ($this->activeSheetIndex >= $sheetIndex)
            && ($this->activeSheetIndex > 0 || $numSheets <= 1)
=======
            ($this->activeSheetIndex >= $sheetIndex) &&
            ($this->activeSheetIndex > 0 || $numSheets <= 1)
>>>>>>> 50f5a6f (Initial commit from local project)
        ) {
            --$this->activeSheetIndex;
        }
    }

    /**
     * Get sheet by index.
     *
     * @param int $sheetIndex Sheet index
<<<<<<< HEAD
     */
    public function getSheet(int $sheetIndex): Worksheet
=======
     *
     * @return Worksheet
     */
    public function getSheet($sheetIndex)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (!isset($this->workSheetCollection[$sheetIndex])) {
            $numSheets = $this->getSheetCount();

            throw new Exception(
                "Your requested sheet index: {$sheetIndex} is out of bounds. The actual number of sheets is {$numSheets}."
            );
        }

        return $this->workSheetCollection[$sheetIndex];
    }

    /**
     * Get all sheets.
     *
     * @return Worksheet[]
     */
<<<<<<< HEAD
    public function getAllSheets(): array
=======
    public function getAllSheets()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->workSheetCollection;
    }

    /**
     * Get sheet by name.
     *
     * @param string $worksheetName Sheet name
<<<<<<< HEAD
     */
    public function getSheetByName(string $worksheetName): ?Worksheet
    {
        $worksheetCount = count($this->workSheetCollection);
        for ($i = 0; $i < $worksheetCount; ++$i) {
            if (strcasecmp($this->workSheetCollection[$i]->getTitle(), trim($worksheetName, "'")) === 0) {
=======
     *
     * @return null|Worksheet
     */
    public function getSheetByName($worksheetName)
    {
        $worksheetCount = count($this->workSheetCollection);
        for ($i = 0; $i < $worksheetCount; ++$i) {
            if ($this->workSheetCollection[$i]->getTitle() === trim($worksheetName, "'")) {
>>>>>>> 50f5a6f (Initial commit from local project)
                return $this->workSheetCollection[$i];
            }
        }

        return null;
    }

    /**
     * Get sheet by name, throwing exception if not found.
     */
    public function getSheetByNameOrThrow(string $worksheetName): Worksheet
    {
        $worksheet = $this->getSheetByName($worksheetName);
        if ($worksheet === null) {
            throw new Exception("Sheet $worksheetName does not exist.");
        }

        return $worksheet;
    }

    /**
     * Get index for sheet.
     *
     * @return int index
     */
<<<<<<< HEAD
    public function getIndex(Worksheet $worksheet, bool $noThrow = false): int
=======
    public function getIndex(Worksheet $worksheet, bool $noThrow = false)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $wsHash = $worksheet->getHashInt();
        foreach ($this->workSheetCollection as $key => $value) {
            if ($value->getHashInt() === $wsHash) {
                return $key;
            }
        }
        if ($noThrow) {
            return -1;
        }

        throw new Exception('Sheet does not exist.');
    }

    /**
     * Set index for sheet by sheet name.
     *
     * @param string $worksheetName Sheet name to modify index for
     * @param int $newIndexPosition New index for the sheet
     *
     * @return int New sheet index
     */
<<<<<<< HEAD
    public function setIndexByName(string $worksheetName, int $newIndexPosition): int
=======
    public function setIndexByName($worksheetName, $newIndexPosition)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $oldIndex = $this->getIndex($this->getSheetByNameOrThrow($worksheetName));
        $worksheet = array_splice(
            $this->workSheetCollection,
            $oldIndex,
            1
        );
        array_splice(
            $this->workSheetCollection,
            $newIndexPosition,
            0,
            $worksheet
        );

        return $newIndexPosition;
    }

    /**
     * Get sheet count.
<<<<<<< HEAD
     */
    public function getSheetCount(): int
=======
     *
     * @return int
     */
    public function getSheetCount()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return count($this->workSheetCollection);
    }

    /**
     * Get active sheet index.
     *
     * @return int Active sheet index
     */
<<<<<<< HEAD
    public function getActiveSheetIndex(): int
=======
    public function getActiveSheetIndex()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->activeSheetIndex;
    }

    /**
     * Set active sheet index.
     *
     * @param int $worksheetIndex Active sheet index
<<<<<<< HEAD
     */
    public function setActiveSheetIndex(int $worksheetIndex): Worksheet
=======
     *
     * @return Worksheet
     */
    public function setActiveSheetIndex($worksheetIndex)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $numSheets = count($this->workSheetCollection);

        if ($worksheetIndex > $numSheets - 1) {
            throw new Exception(
                "You tried to set a sheet active by the out of bounds index: {$worksheetIndex}. The actual number of sheets is {$numSheets}."
            );
        }
        $this->activeSheetIndex = $worksheetIndex;

        return $this->getActiveSheet();
    }

    /**
     * Set active sheet index by name.
     *
     * @param string $worksheetName Sheet title
<<<<<<< HEAD
     */
    public function setActiveSheetIndexByName(string $worksheetName): Worksheet
=======
     *
     * @return Worksheet
     */
    public function setActiveSheetIndexByName($worksheetName)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (($worksheet = $this->getSheetByName($worksheetName)) instanceof Worksheet) {
            $this->setActiveSheetIndex($this->getIndex($worksheet));

            return $worksheet;
        }

        throw new Exception('Workbook does not contain sheet:' . $worksheetName);
    }

    /**
     * Get sheet names.
     *
     * @return string[]
     */
<<<<<<< HEAD
    public function getSheetNames(): array
=======
    public function getSheetNames()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $returnValue = [];
        $worksheetCount = $this->getSheetCount();
        for ($i = 0; $i < $worksheetCount; ++$i) {
            $returnValue[] = $this->getSheet($i)->getTitle();
        }

        return $returnValue;
    }

    /**
     * Add external sheet.
     *
     * @param Worksheet $worksheet External sheet to add
     * @param null|int $sheetIndex Index where sheet should go (0,1,..., or null for last)
<<<<<<< HEAD
     */
    public function addExternalSheet(Worksheet $worksheet, ?int $sheetIndex = null): Worksheet
=======
     *
     * @return Worksheet
     */
    public function addExternalSheet(Worksheet $worksheet, $sheetIndex = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($this->sheetNameExists($worksheet->getTitle())) {
            throw new Exception("Workbook already contains a worksheet named '{$worksheet->getTitle()}'. Rename the external sheet first.");
        }

        // count how many cellXfs there are in this workbook currently, we will need this below
        $countCellXfs = count($this->cellXfCollection);

        // copy all the shared cellXfs from the external workbook and append them to the current
        foreach ($worksheet->getParentOrThrow()->getCellXfCollection() as $cellXf) {
            $this->addCellXf(clone $cellXf);
        }

        // move sheet to this workbook
        $worksheet->rebindParent($this);

        // update the cellXfs
        foreach ($worksheet->getCoordinates(false) as $coordinate) {
            $cell = $worksheet->getCell($coordinate);
            $cell->setXfIndex($cell->getXfIndex() + $countCellXfs);
        }

        // update the column dimensions Xfs
        foreach ($worksheet->getColumnDimensions() as $columnDimension) {
            $columnDimension->setXfIndex($columnDimension->getXfIndex() + $countCellXfs);
        }

        // update the row dimensions Xfs
        foreach ($worksheet->getRowDimensions() as $rowDimension) {
            $xfIndex = $rowDimension->getXfIndex();
            if ($xfIndex !== null) {
                $rowDimension->setXfIndex($xfIndex + $countCellXfs);
            }
        }

        return $this->addSheet($worksheet, $sheetIndex);
    }

    /**
     * Get an array of all Named Ranges.
     *
     * @return DefinedName[]
     */
    public function getNamedRanges(): array
    {
        return array_filter(
            $this->definedNames,
<<<<<<< HEAD
            fn (DefinedName $definedName): bool => $definedName->isFormula() === self::DEFINED_NAME_IS_RANGE
=======
            function (DefinedName $definedName) {
                return $definedName->isFormula() === self::DEFINED_NAME_IS_RANGE;
            }
>>>>>>> 50f5a6f (Initial commit from local project)
        );
    }

    /**
     * Get an array of all Named Formulae.
     *
     * @return DefinedName[]
     */
    public function getNamedFormulae(): array
    {
        return array_filter(
            $this->definedNames,
<<<<<<< HEAD
            fn (DefinedName $definedName): bool => $definedName->isFormula() === self::DEFINED_NAME_IS_FORMULA
=======
            function (DefinedName $definedName) {
                return $definedName->isFormula() === self::DEFINED_NAME_IS_FORMULA;
            }
>>>>>>> 50f5a6f (Initial commit from local project)
        );
    }

    /**
     * Get an array of all Defined Names (both named ranges and named formulae).
     *
     * @return DefinedName[]
     */
    public function getDefinedNames(): array
    {
        return $this->definedNames;
    }

    /**
     * Add a named range.
     * If a named range with this name already exists, then this will replace the existing value.
     */
    public function addNamedRange(NamedRange $namedRange): void
    {
        $this->addDefinedName($namedRange);
    }

    /**
     * Add a named formula.
     * If a named formula with this name already exists, then this will replace the existing value.
     */
    public function addNamedFormula(NamedFormula $namedFormula): void
    {
        $this->addDefinedName($namedFormula);
    }

    /**
     * Add a defined name (either a named range or a named formula).
     * If a defined named with this name already exists, then this will replace the existing value.
     */
    public function addDefinedName(DefinedName $definedName): void
    {
        $upperCaseName = StringHelper::strToUpper($definedName->getName());
        if ($definedName->getScope() == null) {
            // global scope
            $this->definedNames[$upperCaseName] = $definedName;
        } else {
            // local scope
            $this->definedNames[$definedName->getScope()->getTitle() . '!' . $upperCaseName] = $definedName;
        }
    }

    /**
     * Get named range.
     *
     * @param null|Worksheet $worksheet Scope. Use null for global scope
     */
    public function getNamedRange(string $namedRange, ?Worksheet $worksheet = null): ?NamedRange
    {
        $returnValue = null;

        if ($namedRange !== '') {
            $namedRange = StringHelper::strToUpper($namedRange);
            // first look for global named range
            $returnValue = $this->getGlobalDefinedNameByType($namedRange, self::DEFINED_NAME_IS_RANGE);
            // then look for local named range (has priority over global named range if both names exist)
            $returnValue = $this->getLocalDefinedNameByType($namedRange, self::DEFINED_NAME_IS_RANGE, $worksheet) ?: $returnValue;
        }

        return $returnValue instanceof NamedRange ? $returnValue : null;
    }

    /**
     * Get named formula.
     *
     * @param null|Worksheet $worksheet Scope. Use null for global scope
     */
    public function getNamedFormula(string $namedFormula, ?Worksheet $worksheet = null): ?NamedFormula
    {
        $returnValue = null;

        if ($namedFormula !== '') {
            $namedFormula = StringHelper::strToUpper($namedFormula);
            // first look for global named formula
            $returnValue = $this->getGlobalDefinedNameByType($namedFormula, self::DEFINED_NAME_IS_FORMULA);
            // then look for local named formula (has priority over global named formula if both names exist)
            $returnValue = $this->getLocalDefinedNameByType($namedFormula, self::DEFINED_NAME_IS_FORMULA, $worksheet) ?: $returnValue;
        }

        return $returnValue instanceof NamedFormula ? $returnValue : null;
    }

    private function getGlobalDefinedNameByType(string $name, bool $type): ?DefinedName
    {
        if (isset($this->definedNames[$name]) && $this->definedNames[$name]->isFormula() === $type) {
            return $this->definedNames[$name];
        }

        return null;
    }

    private function getLocalDefinedNameByType(string $name, bool $type, ?Worksheet $worksheet = null): ?DefinedName
    {
        if (
            ($worksheet !== null) && isset($this->definedNames[$worksheet->getTitle() . '!' . $name])
            && $this->definedNames[$worksheet->getTitle() . '!' . $name]->isFormula() === $type
        ) {
            return $this->definedNames[$worksheet->getTitle() . '!' . $name];
        }

        return null;
    }

    /**
     * Get named range.
     *
     * @param null|Worksheet $worksheet Scope. Use null for global scope
     */
    public function getDefinedName(string $definedName, ?Worksheet $worksheet = null): ?DefinedName
    {
        $returnValue = null;

        if ($definedName !== '') {
            $definedName = StringHelper::strToUpper($definedName);
            // first look for global defined name
            if (isset($this->definedNames[$definedName])) {
                $returnValue = $this->definedNames[$definedName];
            }

            // then look for local defined name (has priority over global defined name if both names exist)
            if (($worksheet !== null) && isset($this->definedNames[$worksheet->getTitle() . '!' . $definedName])) {
                $returnValue = $this->definedNames[$worksheet->getTitle() . '!' . $definedName];
            }
        }

        return $returnValue;
    }

    /**
     * Remove named range.
     *
     * @param null|Worksheet $worksheet scope: use null for global scope
     *
     * @return $this
     */
    public function removeNamedRange(string $namedRange, ?Worksheet $worksheet = null): self
    {
        if ($this->getNamedRange($namedRange, $worksheet) === null) {
            return $this;
        }

        return $this->removeDefinedName($namedRange, $worksheet);
    }

    /**
     * Remove named formula.
     *
     * @param null|Worksheet $worksheet scope: use null for global scope
     *
     * @return $this
     */
    public function removeNamedFormula(string $namedFormula, ?Worksheet $worksheet = null): self
    {
        if ($this->getNamedFormula($namedFormula, $worksheet) === null) {
            return $this;
        }

        return $this->removeDefinedName($namedFormula, $worksheet);
    }

    /**
     * Remove defined name.
     *
     * @param null|Worksheet $worksheet scope: use null for global scope
     *
     * @return $this
     */
    public function removeDefinedName(string $definedName, ?Worksheet $worksheet = null): self
    {
        $definedName = StringHelper::strToUpper($definedName);

        if ($worksheet === null) {
            if (isset($this->definedNames[$definedName])) {
                unset($this->definedNames[$definedName]);
            }
        } else {
            if (isset($this->definedNames[$worksheet->getTitle() . '!' . $definedName])) {
                unset($this->definedNames[$worksheet->getTitle() . '!' . $definedName]);
            } elseif (isset($this->definedNames[$definedName])) {
                unset($this->definedNames[$definedName]);
            }
        }

        return $this;
    }

    /**
     * Get worksheet iterator.
<<<<<<< HEAD
     */
    public function getWorksheetIterator(): Iterator
=======
     *
     * @return Iterator
     */
    public function getWorksheetIterator()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return new Iterator($this);
    }

    /**
     * Copy workbook (!= clone!).
<<<<<<< HEAD
     */
    public function copy(): self
    {
        return unserialize(serialize($this)); //* @phpstan-ignore-line
    }

    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
        $this->uniqueID = uniqid('', true);

        $usedKeys = [];
        // I don't now why new Style rather than clone.
        $this->cellXfSupervisor = new Style(true);
        //$this->cellXfSupervisor = clone $this->cellXfSupervisor;
        $this->cellXfSupervisor->bindParent($this);
        $usedKeys['cellXfSupervisor'] = true;

        $oldCalc = $this->calculationEngine;
        $this->calculationEngine = new Calculation($this);
        if ($oldCalc !== null) {
            $this->calculationEngine
                ->setSuppressFormulaErrors(
                    $oldCalc->getSuppressFormulaErrors()
                )
                ->setCalculationCacheEnabled(
                    $oldCalc->getCalculationCacheEnabled()
                )
                ->setBranchPruningEnabled(
                    $oldCalc->getBranchPruningEnabled()
                )
                ->setInstanceArrayReturnType(
                    $oldCalc->getInstanceArrayReturnType()
                );
        }
        $usedKeys['calculationEngine'] = true;

        $currentCollection = $this->cellStyleXfCollection;
        $this->cellStyleXfCollection = [];
        foreach ($currentCollection as $item) {
            $clone = $item->exportArray();
            $style = (new Style())->applyFromArray($clone);
            $this->addCellStyleXf($style);
        }
        $usedKeys['cellStyleXfCollection'] = true;

        $currentCollection = $this->cellXfCollection;
        $this->cellXfCollection = [];
        foreach ($currentCollection as $item) {
            $clone = $item->exportArray();
            $style = (new Style())->applyFromArray($clone);
            $this->addCellXf($style);
        }
        $usedKeys['cellXfCollection'] = true;

        $currentCollection = $this->workSheetCollection;
        $this->workSheetCollection = [];
        foreach ($currentCollection as $item) {
            $clone = clone $item;
            $clone->setParent($this);
            $this->workSheetCollection[] = $clone;
        }
        $usedKeys['workSheetCollection'] = true;

        foreach (get_object_vars($this) as $key => $val) {
            if (isset($usedKeys[$key])) {
                continue;
            }
            switch ($key) {
                // arrays of objects not covered above
                case 'definedNames':
                    /** @var DefinedName[] */
                    $currentCollection = $val;
                    $this->$key = [];
                    foreach ($currentCollection as $item) {
                        $clone = clone $item;
                        $this->{$key}[] = $clone;
                    }

                    break;
                default:
                    if (is_object($val)) {
                        $this->$key = clone $val;
                    }
            }
        }
=======
     *
     * @return Spreadsheet
     */
    public function copy()
    {
        $filename = File::temporaryFilename();
        $writer = new XlsxWriter($this);
        $writer->setIncludeCharts(true);
        $writer->save($filename);

        $reader = new XlsxReader();
        $reader->setIncludeCharts(true);
        $reloadedSpreadsheet = $reader->load($filename);
        unlink($filename);

        return $reloadedSpreadsheet;
    }

    public function __clone()
    {
        throw new Exception(
            'Do not use clone on spreadsheet. Use spreadsheet->copy() instead.'
        );
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * Get the workbook collection of cellXfs.
     *
     * @return Style[]
     */
<<<<<<< HEAD
    public function getCellXfCollection(): array
=======
    public function getCellXfCollection()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->cellXfCollection;
    }

    /**
     * Get cellXf by index.
<<<<<<< HEAD
     */
    public function getCellXfByIndex(int $cellStyleIndex): Style
=======
     *
     * @param int $cellStyleIndex
     *
     * @return Style
     */
    public function getCellXfByIndex($cellStyleIndex)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->cellXfCollection[$cellStyleIndex];
    }

<<<<<<< HEAD
    public function getCellXfByIndexOrNull(?int $cellStyleIndex): ?Style
    {
        return ($cellStyleIndex === null) ? null : ($this->cellXfCollection[$cellStyleIndex] ?? null);
    }

    /**
     * Get cellXf by hash code.
     *
     * @return false|Style
     */
    public function getCellXfByHashCode(string $hashcode): bool|Style
=======
    /**
     * Get cellXf by hash code.
     *
     * @param string $hashcode
     *
     * @return false|Style
     */
    public function getCellXfByHashCode($hashcode)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        foreach ($this->cellXfCollection as $cellXf) {
            if ($cellXf->getHashCode() === $hashcode) {
                return $cellXf;
            }
        }

        return false;
    }

    /**
     * Check if style exists in style collection.
<<<<<<< HEAD
     */
    public function cellXfExists(Style $cellStyleIndex): bool
=======
     *
     * @return bool
     */
    public function cellXfExists(Style $cellStyleIndex)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return in_array($cellStyleIndex, $this->cellXfCollection, true);
    }

    /**
     * Get default style.
<<<<<<< HEAD
     */
    public function getDefaultStyle(): Style
=======
     *
     * @return Style
     */
    public function getDefaultStyle()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (isset($this->cellXfCollection[0])) {
            return $this->cellXfCollection[0];
        }

        throw new Exception('No default style found for this workbook');
    }

    /**
     * Add a cellXf to the workbook.
     */
    public function addCellXf(Style $style): void
    {
        $this->cellXfCollection[] = $style;
        $style->setIndex(count($this->cellXfCollection) - 1);
    }

    /**
     * Remove cellXf by index. It is ensured that all cells get their xf index updated.
     *
     * @param int $cellStyleIndex Index to cellXf
     */
<<<<<<< HEAD
    public function removeCellXfByIndex(int $cellStyleIndex): void
=======
    public function removeCellXfByIndex($cellStyleIndex): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($cellStyleIndex > count($this->cellXfCollection) - 1) {
            throw new Exception('CellXf index is out of bounds.');
        }

        // first remove the cellXf
        array_splice($this->cellXfCollection, $cellStyleIndex, 1);

        // then update cellXf indexes for cells
        foreach ($this->workSheetCollection as $worksheet) {
            foreach ($worksheet->getCoordinates(false) as $coordinate) {
                $cell = $worksheet->getCell($coordinate);
                $xfIndex = $cell->getXfIndex();
                if ($xfIndex > $cellStyleIndex) {
                    // decrease xf index by 1
                    $cell->setXfIndex($xfIndex - 1);
                } elseif ($xfIndex == $cellStyleIndex) {
                    // set to default xf index 0
                    $cell->setXfIndex(0);
                }
            }
        }
    }

    /**
     * Get the cellXf supervisor.
<<<<<<< HEAD
     */
    public function getCellXfSupervisor(): Style
=======
     *
     * @return Style
     */
    public function getCellXfSupervisor()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->cellXfSupervisor;
    }

    /**
     * Get the workbook collection of cellStyleXfs.
     *
     * @return Style[]
     */
<<<<<<< HEAD
    public function getCellStyleXfCollection(): array
=======
    public function getCellStyleXfCollection()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->cellStyleXfCollection;
    }

    /**
     * Get cellStyleXf by index.
     *
     * @param int $cellStyleIndex Index to cellXf
<<<<<<< HEAD
     */
    public function getCellStyleXfByIndex(int $cellStyleIndex): Style
=======
     *
     * @return Style
     */
    public function getCellStyleXfByIndex($cellStyleIndex)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->cellStyleXfCollection[$cellStyleIndex];
    }

    /**
     * Get cellStyleXf by hash code.
     *
<<<<<<< HEAD
     * @return false|Style
     */
    public function getCellStyleXfByHashCode(string $hashcode): bool|Style
=======
     * @param string $hashcode
     *
     * @return false|Style
     */
    public function getCellStyleXfByHashCode($hashcode)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        foreach ($this->cellStyleXfCollection as $cellStyleXf) {
            if ($cellStyleXf->getHashCode() === $hashcode) {
                return $cellStyleXf;
            }
        }

        return false;
    }

    /**
     * Add a cellStyleXf to the workbook.
     */
    public function addCellStyleXf(Style $style): void
    {
        $this->cellStyleXfCollection[] = $style;
        $style->setIndex(count($this->cellStyleXfCollection) - 1);
    }

    /**
     * Remove cellStyleXf by index.
     *
     * @param int $cellStyleIndex Index to cellXf
     */
<<<<<<< HEAD
    public function removeCellStyleXfByIndex(int $cellStyleIndex): void
=======
    public function removeCellStyleXfByIndex($cellStyleIndex): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($cellStyleIndex > count($this->cellStyleXfCollection) - 1) {
            throw new Exception('CellStyleXf index is out of bounds.');
        }
        array_splice($this->cellStyleXfCollection, $cellStyleIndex, 1);
    }

    /**
     * Eliminate all unneeded cellXf and afterwards update the xfIndex for all cells
     * and columns in the workbook.
     */
    public function garbageCollect(): void
    {
        // how many references are there to each cellXf ?
        $countReferencesCellXf = [];
        foreach ($this->cellXfCollection as $index => $cellXf) {
            $countReferencesCellXf[$index] = 0;
        }

        foreach ($this->getWorksheetIterator() as $sheet) {
            // from cells
            foreach ($sheet->getCoordinates(false) as $coordinate) {
                $cell = $sheet->getCell($coordinate);
                ++$countReferencesCellXf[$cell->getXfIndex()];
            }

            // from row dimensions
            foreach ($sheet->getRowDimensions() as $rowDimension) {
                if ($rowDimension->getXfIndex() !== null) {
                    ++$countReferencesCellXf[$rowDimension->getXfIndex()];
                }
            }

            // from column dimensions
            foreach ($sheet->getColumnDimensions() as $columnDimension) {
                ++$countReferencesCellXf[$columnDimension->getXfIndex()];
            }
        }

        // remove cellXfs without references and create mapping so we can update xfIndex
        // for all cells and columns
        $countNeededCellXfs = 0;
        $map = [];
        foreach ($this->cellXfCollection as $index => $cellXf) {
            if ($countReferencesCellXf[$index] > 0 || $index == 0) { // we must never remove the first cellXf
                ++$countNeededCellXfs;
            } else {
                unset($this->cellXfCollection[$index]);
            }
            $map[$index] = $countNeededCellXfs - 1;
        }
        $this->cellXfCollection = array_values($this->cellXfCollection);

        // update the index for all cellXfs
        foreach ($this->cellXfCollection as $i => $cellXf) {
            $cellXf->setIndex($i);
        }

        // make sure there is always at least one cellXf (there should be)
        if (empty($this->cellXfCollection)) {
            $this->cellXfCollection[] = new Style();
        }

        // update the xfIndex for all cells, row dimensions, column dimensions
        foreach ($this->getWorksheetIterator() as $sheet) {
            // for all cells
            foreach ($sheet->getCoordinates(false) as $coordinate) {
                $cell = $sheet->getCell($coordinate);
                $cell->setXfIndex($map[$cell->getXfIndex()]);
            }

            // for all row dimensions
            foreach ($sheet->getRowDimensions() as $rowDimension) {
                if ($rowDimension->getXfIndex() !== null) {
                    $rowDimension->setXfIndex($map[$rowDimension->getXfIndex()]);
                }
            }

            // for all column dimensions
            foreach ($sheet->getColumnDimensions() as $columnDimension) {
                $columnDimension->setXfIndex($map[$columnDimension->getXfIndex()]);
            }

            // also do garbage collection for all the sheets
            $sheet->garbageCollect();
        }
    }

    /**
     * Return the unique ID value assigned to this spreadsheet workbook.
<<<<<<< HEAD
     */
    public function getID(): string
=======
     *
     * @return string
     */
    public function getID()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->uniqueID;
    }

    /**
     * Get the visibility of the horizonal scroll bar in the application.
     *
     * @return bool True if horizonal scroll bar is visible
     */
<<<<<<< HEAD
    public function getShowHorizontalScroll(): bool
=======
    public function getShowHorizontalScroll()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->showHorizontalScroll;
    }

    /**
     * Set the visibility of the horizonal scroll bar in the application.
     *
     * @param bool $showHorizontalScroll True if horizonal scroll bar is visible
     */
<<<<<<< HEAD
    public function setShowHorizontalScroll(bool $showHorizontalScroll): void
=======
    public function setShowHorizontalScroll($showHorizontalScroll): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->showHorizontalScroll = (bool) $showHorizontalScroll;
    }

    /**
     * Get the visibility of the vertical scroll bar in the application.
     *
     * @return bool True if vertical scroll bar is visible
     */
<<<<<<< HEAD
    public function getShowVerticalScroll(): bool
=======
    public function getShowVerticalScroll()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->showVerticalScroll;
    }

    /**
     * Set the visibility of the vertical scroll bar in the application.
     *
     * @param bool $showVerticalScroll True if vertical scroll bar is visible
     */
<<<<<<< HEAD
    public function setShowVerticalScroll(bool $showVerticalScroll): void
=======
    public function setShowVerticalScroll($showVerticalScroll): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->showVerticalScroll = (bool) $showVerticalScroll;
    }

    /**
     * Get the visibility of the sheet tabs in the application.
     *
     * @return bool True if the sheet tabs are visible
     */
<<<<<<< HEAD
    public function getShowSheetTabs(): bool
=======
    public function getShowSheetTabs()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->showSheetTabs;
    }

    /**
     * Set the visibility of the sheet tabs  in the application.
     *
     * @param bool $showSheetTabs True if sheet tabs are visible
     */
<<<<<<< HEAD
    public function setShowSheetTabs(bool $showSheetTabs): void
=======
    public function setShowSheetTabs($showSheetTabs): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->showSheetTabs = (bool) $showSheetTabs;
    }

    /**
     * Return whether the workbook window is minimized.
     *
     * @return bool true if workbook window is minimized
     */
<<<<<<< HEAD
    public function getMinimized(): bool
=======
    public function getMinimized()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->minimized;
    }

    /**
     * Set whether the workbook window is minimized.
     *
     * @param bool $minimized true if workbook window is minimized
     */
<<<<<<< HEAD
    public function setMinimized(bool $minimized): void
=======
    public function setMinimized($minimized): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->minimized = (bool) $minimized;
    }

    /**
     * Return whether to group dates when presenting the user with
     * filtering optiomd in the user interface.
     *
     * @return bool true if workbook window is minimized
     */
<<<<<<< HEAD
    public function getAutoFilterDateGrouping(): bool
=======
    public function getAutoFilterDateGrouping()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->autoFilterDateGrouping;
    }

    /**
     * Set whether to group dates when presenting the user with
     * filtering optiomd in the user interface.
     *
     * @param bool $autoFilterDateGrouping true if workbook window is minimized
     */
<<<<<<< HEAD
    public function setAutoFilterDateGrouping(bool $autoFilterDateGrouping): void
=======
    public function setAutoFilterDateGrouping($autoFilterDateGrouping): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->autoFilterDateGrouping = (bool) $autoFilterDateGrouping;
    }

    /**
     * Return the first sheet in the book view.
     *
     * @return int First sheet in book view
     */
<<<<<<< HEAD
    public function getFirstSheetIndex(): int
=======
    public function getFirstSheetIndex()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->firstSheetIndex;
    }

    /**
     * Set the first sheet in the book view.
     *
     * @param int $firstSheetIndex First sheet in book view
     */
<<<<<<< HEAD
    public function setFirstSheetIndex(int $firstSheetIndex): void
=======
    public function setFirstSheetIndex($firstSheetIndex): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($firstSheetIndex >= 0) {
            $this->firstSheetIndex = (int) $firstSheetIndex;
        } else {
            throw new Exception('First sheet index must be a positive integer.');
        }
    }

    /**
     * Return the visibility status of the workbook.
     *
     * This may be one of the following three values:
     * - visibile
     *
     * @return string Visible status
     */
<<<<<<< HEAD
    public function getVisibility(): string
=======
    public function getVisibility()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->visibility;
    }

    /**
     * Set the visibility status of the workbook.
     *
     * Valid values are:
     *  - 'visible' (self::VISIBILITY_VISIBLE):
     *       Workbook window is visible
     *  - 'hidden' (self::VISIBILITY_HIDDEN):
     *       Workbook window is hidden, but can be shown by the user
     *       via the user interface
     *  - 'veryHidden' (self::VISIBILITY_VERY_HIDDEN):
     *       Workbook window is hidden and cannot be shown in the
     *       user interface.
     *
     * @param null|string $visibility visibility status of the workbook
     */
<<<<<<< HEAD
    public function setVisibility(?string $visibility): void
=======
    public function setVisibility($visibility): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($visibility === null) {
            $visibility = self::VISIBILITY_VISIBLE;
        }

        if (in_array($visibility, self::WORKBOOK_VIEW_VISIBILITY_VALUES)) {
            $this->visibility = $visibility;
        } else {
            throw new Exception('Invalid visibility value.');
        }
    }

    /**
     * Get the ratio between the workbook tabs bar and the horizontal scroll bar.
     * TabRatio is assumed to be out of 1000 of the horizontal window width.
     *
     * @return int Ratio between the workbook tabs bar and the horizontal scroll bar
     */
<<<<<<< HEAD
    public function getTabRatio(): int
=======
    public function getTabRatio()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->tabRatio;
    }

    /**
     * Set the ratio between the workbook tabs bar and the horizontal scroll bar
     * TabRatio is assumed to be out of 1000 of the horizontal window width.
     *
     * @param int $tabRatio Ratio between the tabs bar and the horizontal scroll bar
     */
<<<<<<< HEAD
    public function setTabRatio(int $tabRatio): void
=======
    public function setTabRatio($tabRatio): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($tabRatio >= 0 && $tabRatio <= 1000) {
            $this->tabRatio = (int) $tabRatio;
        } else {
            throw new Exception('Tab ratio must be between 0 and 1000.');
        }
    }

    public function reevaluateAutoFilters(bool $resetToMax): void
    {
        foreach ($this->workSheetCollection as $sheet) {
            $filter = $sheet->getAutoFilter();
            if (!empty($filter->getRange())) {
                if ($resetToMax) {
                    $filter->setRangeToMaxRow();
                }
                $filter->showHideRows();
            }
        }
    }

    /**
<<<<<<< HEAD
=======
     * Silliness to mollify Scrutinizer.
     *
     * @codeCoverageIgnore
     */
    public function getSharedComponent(): Style
    {
        return new Style();
    }

    /**
     * @throws Exception
     *
     * @return mixed
     */
    public function __serialize()
    {
        throw new Exception('Spreadsheet objects cannot be serialized');
    }

    /**
>>>>>>> 50f5a6f (Initial commit from local project)
     * @throws Exception
     */
    public function jsonSerialize(): mixed
    {
        throw new Exception('Spreadsheet objects cannot be json encoded');
    }

    public function resetThemeFonts(): void
    {
        $majorFontLatin = $this->theme->getMajorFontLatin();
        $minorFontLatin = $this->theme->getMinorFontLatin();
        foreach ($this->cellXfCollection as $cellStyleXf) {
            $scheme = $cellStyleXf->getFont()->getScheme();
            if ($scheme === 'major') {
                $cellStyleXf->getFont()->setName($majorFontLatin)->setScheme($scheme);
            } elseif ($scheme === 'minor') {
                $cellStyleXf->getFont()->setName($minorFontLatin)->setScheme($scheme);
            }
        }
        foreach ($this->cellStyleXfCollection as $cellStyleXf) {
            $scheme = $cellStyleXf->getFont()->getScheme();
            if ($scheme === 'major') {
                $cellStyleXf->getFont()->setName($majorFontLatin)->setScheme($scheme);
            } elseif ($scheme === 'minor') {
                $cellStyleXf->getFont()->setName($minorFontLatin)->setScheme($scheme);
            }
        }
    }
<<<<<<< HEAD

    public function getTableByName(string $tableName): ?Table
    {
        $table = null;
        foreach ($this->workSheetCollection as $sheet) {
            $table = $sheet->getTableByName($tableName);
            if ($table !== null) {
                break;
            }
        }

        return $table;
    }

    /**
     * @return bool Success or failure
     */
    public function setExcelCalendar(int $baseYear): bool
    {
        if (($baseYear === Date::CALENDAR_WINDOWS_1900) || ($baseYear === Date::CALENDAR_MAC_1904)) {
            $this->excelCalendar = $baseYear;

            return true;
        }

        return false;
    }

    /**
     * @return int Excel base date (1900 or 1904)
     */
    public function getExcelCalendar(): int
    {
        return $this->excelCalendar;
    }

    public function deleteLegacyDrawing(Worksheet $worksheet): void
    {
        unset($this->unparsedLoadedData['sheets'][$worksheet->getCodeName()]['legacyDrawing']);
    }

    public function getLegacyDrawing(Worksheet $worksheet): ?string
    {
        return $this->unparsedLoadedData['sheets'][$worksheet->getCodeName()]['legacyDrawing'] ?? null;
    }

    public function getValueBinder(): ?IValueBinder
    {
        return $this->valueBinder;
    }

    public function setValueBinder(?IValueBinder $valueBinder): self
    {
        $this->valueBinder = $valueBinder;

        return $this;
    }

    /**
     * All the PDF writers treat charts as if they occupy a single cell.
     * This will be better most of the time.
     * It is not needed for any other output type.
     * It changes the contents of the spreadsheet, so you might
     * be better off cloning the spreadsheet and then using
     * this method on, and then writing, the clone.
     */
    public function mergeChartCellsForPdf(): void
    {
        foreach ($this->workSheetCollection as $worksheet) {
            foreach ($worksheet->getChartCollection() as $chart) {
                $br = $chart->getBottomRightCell();
                $tl = $chart->getTopLeftCell();
                if ($br !== '' && $br !== $tl) {
                    if (!$worksheet->cellExists($br)) {
                        $worksheet->getCell($br)->setValue(' ');
                    }
                    $worksheet->mergeCells("$tl:$br");
                }
            }
        }
    }

    /**
     * All the PDF writers do better with drawings than charts.
     * This will be better some of the time.
     * It is not needed for any other output type.
     * It changes the contents of the spreadsheet, so you might
     * be better off cloning the spreadsheet and then using
     * this method on, and then writing, the clone.
     */
    public function mergeDrawingCellsForPdf(): void
    {
        foreach ($this->workSheetCollection as $worksheet) {
            foreach ($worksheet->getDrawingCollection() as $drawing) {
                $br = $drawing->getCoordinates2();
                $tl = $drawing->getCoordinates();
                if ($br !== '' && $br !== $tl) {
                    if (!$worksheet->cellExists($br)) {
                        $worksheet->getCell($br)->setValue(' ');
                    }
                    $worksheet->mergeCells("$tl:$br");
                }
            }
        }
    }
=======
>>>>>>> 50f5a6f (Initial commit from local project)
}
