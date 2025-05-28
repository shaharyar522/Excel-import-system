<?php

namespace PhpOffice\PhpSpreadsheet\Writer;

<<<<<<< HEAD
use PhpOffice\PhpSpreadsheet\Exception as PhpSpreadsheetException;

=======
>>>>>>> 50f5a6f (Initial commit from local project)
abstract class BaseWriter implements IWriter
{
    /**
     * Write charts that are defined in the workbook?
     * Identifies whether the Writer should write definitions for any charts that exist in the PhpSpreadsheet object.
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
     * Pre-calculate formulas
     * Forces PhpSpreadsheet to recalculate all formulae in a workbook when saving, so that the pre-calculated values are
     * immediately available to MS Excel or other office spreadsheet viewer when opening the file.
<<<<<<< HEAD
     */
    protected bool $preCalculateFormulas = true;

    /**
     * Table formats
     * Enables table formats in writer, disabled here, must be enabled in writer via a setter.
     */
    protected bool $tableFormats = false;

    /**
     * Conditional Formatting
     * Enables conditional formatting in writer, disabled here, must be enabled in writer via a setter.
     */
    protected bool $conditionalFormatting = false;

    /**
     * Use disk caching where possible?
     */
    private bool $useDiskCaching = false;

    /**
     * Disk caching directory.
     */
    private string $diskCachingDirectory = './';
=======
     *
     * @var bool
     */
    protected $preCalculateFormulas = true;

    /**
     * Use disk caching where possible?
     *
     * @var bool
     */
    private $useDiskCaching = false;

    /**
     * Disk caching directory.
     *
     * @var string
     */
    private $diskCachingDirectory = './';
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * @var resource
     */
    protected $fileHandle;

<<<<<<< HEAD
    private bool $shouldCloseFile;

    public function getIncludeCharts(): bool
=======
    /**
     * @var bool
     */
    private $shouldCloseFile;

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
    public function getPreCalculateFormulas(): bool
=======
    public function getPreCalculateFormulas()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->preCalculateFormulas;
    }

<<<<<<< HEAD
    public function setPreCalculateFormulas(bool $precalculateFormulas): self
    {
        $this->preCalculateFormulas = $precalculateFormulas;
=======
    public function setPreCalculateFormulas($precalculateFormulas)
    {
        $this->preCalculateFormulas = (bool) $precalculateFormulas;
>>>>>>> 50f5a6f (Initial commit from local project)

        return $this;
    }

<<<<<<< HEAD
    public function getTableFormats(): bool
    {
        return $this->tableFormats;
    }

    public function setTableFormats(bool $tableFormats): self
    {
        if ($tableFormats) {
            throw new PhpSpreadsheetException('Table formatting not implemented for this writer');
        }

        return $this;
    }

    public function getConditionalFormatting(): bool
    {
        return $this->conditionalFormatting;
    }

    public function setConditionalFormatting(bool $conditionalFormatting): self
    {
        if ($conditionalFormatting) {
            throw new PhpSpreadsheetException('Conditional Formatting not implemented for this writer');
        }

        return $this;
    }

    public function getUseDiskCaching(): bool
=======
    public function getUseDiskCaching()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->useDiskCaching;
    }

<<<<<<< HEAD
    public function setUseDiskCaching(bool $useDiskCache, ?string $cacheDirectory = null): self
=======
    public function setUseDiskCaching($useDiskCache, $cacheDirectory = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->useDiskCaching = $useDiskCache;

        if ($cacheDirectory !== null) {
            if (is_dir($cacheDirectory)) {
                $this->diskCachingDirectory = $cacheDirectory;
            } else {
                throw new Exception("Directory does not exist: $cacheDirectory");
            }
        }

        return $this;
    }

<<<<<<< HEAD
    public function getDiskCachingDirectory(): string
=======
    public function getDiskCachingDirectory()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->diskCachingDirectory;
    }

    protected function processFlags(int $flags): void
    {
        if (((bool) ($flags & self::SAVE_WITH_CHARTS)) === true) {
            $this->setIncludeCharts(true);
        }
        if (((bool) ($flags & self::DISABLE_PRECALCULATE_FORMULAE)) === true) {
            $this->setPreCalculateFormulas(false);
        }
    }

    /**
     * Open file handle.
     *
     * @param resource|string $filename
     */
    public function openFileHandle($filename): void
    {
<<<<<<< HEAD
        if (!is_string($filename)) {
=======
        if (is_resource($filename)) {
>>>>>>> 50f5a6f (Initial commit from local project)
            $this->fileHandle = $filename;
            $this->shouldCloseFile = false;

            return;
        }

        $mode = 'wb';
        $scheme = parse_url($filename, PHP_URL_SCHEME);
        if ($scheme === 's3') {
            // @codeCoverageIgnoreStart
            $mode = 'w';
            // @codeCoverageIgnoreEnd
        }
        $fileHandle = $filename ? fopen($filename, $mode) : false;
        if ($fileHandle === false) {
            throw new Exception('Could not open file "' . $filename . '" for writing.');
        }

        $this->fileHandle = $fileHandle;
        $this->shouldCloseFile = true;
    }

    /**
     * Close file handle only if we opened it ourselves.
     */
    protected function maybeCloseFileHandle(): void
    {
        if ($this->shouldCloseFile) {
            if (!fclose($this->fileHandle)) {
                throw new Exception('Could not close file after writing.');
            }
        }
    }
}
