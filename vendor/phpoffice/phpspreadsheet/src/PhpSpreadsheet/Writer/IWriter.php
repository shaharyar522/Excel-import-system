<?php

namespace PhpOffice\PhpSpreadsheet\Writer;

use PhpOffice\PhpSpreadsheet\Spreadsheet;

interface IWriter
{
    public const SAVE_WITH_CHARTS = 1;

    public const DISABLE_PRECALCULATE_FORMULAE = 2;

    /**
     * IWriter constructor.
     *
     * @param Spreadsheet $spreadsheet The spreadsheet that we want to save using this Writer
     */
    public function __construct(Spreadsheet $spreadsheet);

    /**
     * Write charts in workbook?
     *        If this is true, then the Writer will write definitions for any charts that exist in the PhpSpreadsheet object.
     *        If false (the default) it will ignore any charts defined in the PhpSpreadsheet object.
<<<<<<< HEAD
     */
    public function getIncludeCharts(): bool;
=======
     *
     * @return bool
     */
    public function getIncludeCharts();
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Set write charts in workbook
     *        Set to true, to advise the Writer to include any charts that exist in the PhpSpreadsheet object.
     *        Set to false (the default) to ignore charts.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setIncludeCharts(bool $includeCharts): self;
=======
     * @param bool $includeCharts
     *
     * @return IWriter
     */
    public function setIncludeCharts($includeCharts);
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Get Pre-Calculate Formulas flag
     *     If this is true (the default), then the writer will recalculate all formulae in a workbook when saving,
     *        so that the pre-calculated values are immediately available to MS Excel or other office spreadsheet
     *        viewer when opening the file
     *     If false, then formulae are not calculated on save. This is faster for saving in PhpSpreadsheet, but slower
     *        when opening the resulting file in MS Excel, because Excel has to recalculate the formulae itself.
<<<<<<< HEAD
     */
    public function getPreCalculateFormulas(): bool;
=======
     *
     * @return bool
     */
    public function getPreCalculateFormulas();
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Set Pre-Calculate Formulas
     *        Set to true (the default) to advise the Writer to calculate all formulae on save
     *        Set to false to prevent precalculation of formulae on save.
     *
     * @param bool $precalculateFormulas Pre-Calculate Formulas?
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setPreCalculateFormulas(bool $precalculateFormulas): self;
=======
     * @return IWriter
     */
    public function setPreCalculateFormulas($precalculateFormulas);
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Save PhpSpreadsheet to file.
     *
     * @param resource|string $filename Name of the file to save
     * @param int $flags Flags that can change the behaviour of the Writer:
     *            self::SAVE_WITH_CHARTS                Save any charts that are defined (if the Writer supports Charts)
     *            self::DISABLE_PRECALCULATE_FORMULAE   Don't Precalculate formulae before saving the file
     *
     * @throws Exception
     */
    public function save($filename, int $flags = 0): void;

    /**
     * Get use disk caching where possible?
<<<<<<< HEAD
     */
    public function getUseDiskCaching(): bool;
=======
     *
     * @return bool
     */
    public function getUseDiskCaching();
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Set use disk caching where possible?
     *
<<<<<<< HEAD
     * @param ?string $cacheDirectory Disk caching directory
     *
     * @return $this
     */
    public function setUseDiskCaching(bool $useDiskCache, ?string $cacheDirectory = null): self;

    /**
     * Get disk caching directory.
     */
    public function getDiskCachingDirectory(): string;
=======
     * @param bool $useDiskCache
     * @param string $cacheDirectory Disk caching directory
     *
     * @return IWriter
     */
    public function setUseDiskCaching($useDiskCache, $cacheDirectory = null);

    /**
     * Get disk caching directory.
     *
     * @return string
     */
    public function getDiskCachingDirectory();
>>>>>>> 50f5a6f (Initial commit from local project)
}
