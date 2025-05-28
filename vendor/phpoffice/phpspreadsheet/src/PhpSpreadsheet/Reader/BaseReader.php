<?php

namespace PhpOffice\PhpSpreadsheet\Reader;

<<<<<<< HEAD
use PhpOffice\PhpSpreadsheet\Cell\IValueBinder;
=======
>>>>>>> 50f5a6f (Initial commit from local project)
use PhpOffice\PhpSpreadsheet\Exception as PhpSpreadsheetException;
use PhpOffice\PhpSpreadsheet\Reader\Exception as ReaderException;
use PhpOffice\PhpSpreadsheet\Reader\Security\XmlScanner;
use PhpOffice\PhpSpreadsheet\Shared\File;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

abstract class BaseReader implements IReader
{
    /**
     * Read data only?
     * Identifies whether the Reader should only read data values for cells, and ignore any formatting information;
     *        or whether it should read both data and formatting.
<<<<<<< HEAD
     */
    protected bool $readDataOnly = false;

    /**
     * Read empty cells?
     * Identifies whether the Reader should read data values for all cells, or should ignore cells containing
     *         null value or empty string.
     */
    protected bool $readEmptyCells = true;
=======
     *
     * @var bool
     */
    protected $readDataOnly = false;

    /**
     * Read empty cells?
     * Identifies whether the Reader should read data values for cells all cells, or should ignore cells containing
     *         null value or empty string.
     *
     * @var bool
     */
    protected $readEmptyCells = true;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Read charts that are defined in the workbook?
     * Identifies whether the Reader should read the definitions for any charts that exist in the workbook;.
<<<<<<< HEAD
     */
    protected bool $includeCharts = false;
=======
     *
     * @var bool
     */
    protected $includeCharts = false;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Restrict which sheets should be loaded?
     * This property holds an array of worksheet names to be loaded. If null, then all worksheets will be loaded.
<<<<<<< HEAD
     * This property is ignored for Csv, Html, and Slk.
     *
     * @var null|string[]
     */
    protected ?array $loadSheetsOnly = null;

    /**
     * Ignore rows with no cells?
     * Identifies whether the Reader should ignore rows with no cells.
     *        Currently implemented only for Xlsx.
     */
    protected bool $ignoreRowsWithNoCells = false;

    /**
     * IReadFilter instance.
     */
    protected IReadFilter $readFilter;
=======
     *
     * @var null|string[]
     */
    protected $loadSheetsOnly;

    /**
     * IReadFilter instance.
     *
     * @var IReadFilter
     */
    protected $readFilter;
>>>>>>> 50f5a6f (Initial commit from local project)

    /** @var resource */
    protected $fileHandle;

<<<<<<< HEAD
    protected ?XmlScanner $securityScanner = null;

    protected ?IValueBinder $valueBinder = null;
=======
    /**
     * @var ?XmlScanner
     */
    protected $securityScanner;
>>>>>>> 50f5a6f (Initial commit from local project)

    public function __construct()
    {
        $this->readFilter = new DefaultReadFilter();
    }

<<<<<<< HEAD
    public function getReadDataOnly(): bool
=======
    public function getReadDataOnly()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->readDataOnly;
    }

<<<<<<< HEAD
    public function setReadDataOnly(bool $readCellValuesOnly): self
    {
        $this->readDataOnly = $readCellValuesOnly;
=======
    public function setReadDataOnly($readCellValuesOnly)
    {
        $this->readDataOnly = (bool) $readCellValuesOnly;
>>>>>>> 50f5a6f (Initial commit from local project)

        return $this;
    }

<<<<<<< HEAD
    public function getReadEmptyCells(): bool
=======
    public function getReadEmptyCells()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->readEmptyCells;
    }

<<<<<<< HEAD
    public function setReadEmptyCells(bool $readEmptyCells): self
    {
        $this->readEmptyCells = $readEmptyCells;
=======
    public function setReadEmptyCells($readEmptyCells)
    {
        $this->readEmptyCells = (bool) $readEmptyCells;
>>>>>>> 50f5a6f (Initial commit from local project)

        return $this;
    }

<<<<<<< HEAD
    public function getIgnoreRowsWithNoCells(): bool
    {
        return $this->ignoreRowsWithNoCells;
    }

    public function setIgnoreRowsWithNoCells(bool $ignoreRowsWithNoCells): self
    {
        $this->ignoreRowsWithNoCells = $ignoreRowsWithNoCells;

        return $this;
    }

    public function getIncludeCharts(): bool
=======
    public function getIncludeCharts()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->includeCharts;
    }

<<<<<<< HEAD
    public function setIncludeCharts(bool $includeCharts): self
    {
        $this->includeCharts = $includeCharts;
=======
    public function setIncludeCharts($includeCharts)
    {
        $this->includeCharts = (bool) $includeCharts;
>>>>>>> 50f5a6f (Initial commit from local project)

        return $this;
    }

<<<<<<< HEAD
    public function getLoadSheetsOnly(): ?array
=======
    public function getLoadSheetsOnly()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->loadSheetsOnly;
    }

<<<<<<< HEAD
    public function setLoadSheetsOnly(string|array|null $sheetList): self
=======
    public function setLoadSheetsOnly($sheetList)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($sheetList === null) {
            return $this->setLoadAllSheets();
        }

        $this->loadSheetsOnly = is_array($sheetList) ? $sheetList : [$sheetList];

        return $this;
    }

<<<<<<< HEAD
    public function setLoadAllSheets(): self
=======
    public function setLoadAllSheets()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->loadSheetsOnly = null;

        return $this;
    }

<<<<<<< HEAD
    public function getReadFilter(): IReadFilter
=======
    public function getReadFilter()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->readFilter;
    }

<<<<<<< HEAD
    public function setReadFilter(IReadFilter $readFilter): self
=======
    public function setReadFilter(IReadFilter $readFilter)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->readFilter = $readFilter;

        return $this;
    }

    public function getSecurityScanner(): ?XmlScanner
    {
        return $this->securityScanner;
    }

    public function getSecurityScannerOrThrow(): XmlScanner
    {
        if ($this->securityScanner === null) {
            throw new ReaderException('Security scanner is unexpectedly null');
        }

        return $this->securityScanner;
    }

    protected function processFlags(int $flags): void
    {
        if (((bool) ($flags & self::LOAD_WITH_CHARTS)) === true) {
            $this->setIncludeCharts(true);
        }
        if (((bool) ($flags & self::READ_DATA_ONLY)) === true) {
            $this->setReadDataOnly(true);
        }
<<<<<<< HEAD
        if (((bool) ($flags & self::IGNORE_EMPTY_CELLS)) === true) {
            $this->setReadEmptyCells(false);
        }
        if (((bool) ($flags & self::IGNORE_ROWS_WITH_NO_CELLS)) === true) {
            $this->setIgnoreRowsWithNoCells(true);
        }
=======
        if (((bool) ($flags & self::SKIP_EMPTY_CELLS) || (bool) ($flags & self::IGNORE_EMPTY_CELLS)) === true) {
            $this->setReadEmptyCells(false);
        }
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    protected function loadSpreadsheetFromFile(string $filename): Spreadsheet
    {
        throw new PhpSpreadsheetException('Reader classes must implement their own loadSpreadsheetFromFile() method');
    }

    /**
     * Loads Spreadsheet from file.
     *
     * @param int $flags the optional second parameter flags may be used to identify specific elements
     *                       that should be loaded, but which won't be loaded by default, using these values:
     *                            IReader::LOAD_WITH_CHARTS - Include any charts that are defined in the loaded file
     */
    public function load(string $filename, int $flags = 0): Spreadsheet
    {
        $this->processFlags($flags);

        try {
            return $this->loadSpreadsheetFromFile($filename);
        } catch (ReaderException $e) {
            throw $e;
        }
    }

    /**
     * Open file for reading.
     */
    protected function openFile(string $filename): void
    {
        $fileHandle = false;
        if ($filename) {
            File::assertFile($filename);

            // Open file
            $fileHandle = fopen($filename, 'rb');
        }
        if ($fileHandle === false) {
            throw new ReaderException('Could not open file ' . $filename . ' for reading.');
        }

        $this->fileHandle = $fileHandle;
    }
<<<<<<< HEAD

    /**
     * Return worksheet info (Name, Last Column Letter, Last Column Index, Total Rows, Total Columns).
     */
    public function listWorksheetInfo(string $filename): array
    {
        throw new PhpSpreadsheetException('Reader classes must implement their own listWorksheetInfo() method');
    }

    /**
     * Returns names of the worksheets from a file,
     * possibly without parsing the whole file to a Spreadsheet object.
     * Readers will often have a more efficient method with which
     * they can override this method.
     */
    public function listWorksheetNames(string $filename): array
    {
        $returnArray = [];
        $info = $this->listWorksheetInfo($filename);
        foreach ($info as $infoArray) {
            if (isset($infoArray['worksheetName'])) {
                $returnArray[] = $infoArray['worksheetName'];
            }
        }

        return $returnArray;
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

    protected function newSpreadsheet(): Spreadsheet
    {
        return new Spreadsheet();
    }
=======
>>>>>>> 50f5a6f (Initial commit from local project)
}
