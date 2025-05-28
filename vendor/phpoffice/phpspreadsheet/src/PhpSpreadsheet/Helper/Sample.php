<?php

namespace PhpOffice\PhpSpreadsheet\Helper;

use PhpOffice\PhpSpreadsheet\Chart\Chart;
<<<<<<< HEAD
use PhpOffice\PhpSpreadsheet\Chart\Renderer\MtJpGraphRenderer;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Settings;
use PhpOffice\PhpSpreadsheet\Shared\StringHelper;
=======
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Settings;
>>>>>>> 50f5a6f (Initial commit from local project)
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\IWriter;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RecursiveRegexIterator;
use ReflectionClass;
use RegexIterator;
use RuntimeException;
use Throwable;

/**
 * Helper class to be used in sample code.
 */
class Sample
{
    /**
     * Returns whether we run on CLI or browser.
<<<<<<< HEAD
     */
    public function isCli(): bool
=======
     *
     * @return bool
     */
    public function isCli()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return PHP_SAPI === 'cli';
    }

    /**
     * Return the filename currently being executed.
<<<<<<< HEAD
     */
    public function getScriptFilename(): string
    {
        return basename(StringHelper::convertToString($_SERVER['SCRIPT_FILENAME']), '.php');
=======
     *
     * @return string
     */
    public function getScriptFilename()
    {
        return basename($_SERVER['SCRIPT_FILENAME'], '.php');
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * Whether we are executing the index page.
<<<<<<< HEAD
     */
    public function isIndex(): bool
=======
     *
     * @return bool
     */
    public function isIndex()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->getScriptFilename() === 'index';
    }

    /**
     * Return the page title.
<<<<<<< HEAD
     */
    public function getPageTitle(): string
=======
     *
     * @return string
     */
    public function getPageTitle()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->isIndex() ? 'PHPSpreadsheet' : $this->getScriptFilename();
    }

    /**
     * Return the page heading.
<<<<<<< HEAD
     */
    public function getPageHeading(): string
=======
     *
     * @return string
     */
    public function getPageHeading()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->isIndex() ? '' : '<h1>' . str_replace('_', ' ', $this->getScriptFilename()) . '</h1>';
    }

    /**
     * Returns an array of all known samples.
     *
     * @return string[][] [$name => $path]
     */
<<<<<<< HEAD
    public function getSamples(): array
=======
    public function getSamples()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // Populate samples
        $baseDir = realpath(__DIR__ . '/../../../samples');
        if ($baseDir === false) {
            // @codeCoverageIgnoreStart
            throw new RuntimeException('realpath returned false');
            // @codeCoverageIgnoreEnd
        }
        $directory = new RecursiveDirectoryIterator($baseDir);
        $iterator = new RecursiveIteratorIterator($directory);
        $regex = new RegexIterator($iterator, '/^.+\.php$/', RecursiveRegexIterator::GET_MATCH);

        $files = [];
<<<<<<< HEAD
        /** @var string[] $file */
        foreach ($regex as $file) {
            $file = str_replace(str_replace('\\', '/', $baseDir) . '/', '', str_replace('\\', '/', $file[0]));
            $info = pathinfo($file);
            $category = str_replace('_', ' ', $info['dirname'] ?? '');
            $name = str_replace('_', ' ', (string) preg_replace('/(|\.php)/', '', $info['filename']));
            if (!in_array($category, ['.', 'bootstrap', 'templates']) && $name !== 'Header') {
=======
        foreach ($regex as $file) {
            $file = str_replace(str_replace('\\', '/', $baseDir) . '/', '', str_replace('\\', '/', $file[0]));
            if (is_array($file)) {
                // @codeCoverageIgnoreStart
                throw new RuntimeException('str_replace returned array');
                // @codeCoverageIgnoreEnd
            }
            $info = pathinfo($file);
            $category = str_replace('_', ' ', $info['dirname'] ?? '');
            $name = str_replace('_', ' ', (string) preg_replace('/(|\.php)/', '', $info['filename']));
            if (!in_array($category, ['.', 'boostrap', 'templates'])) {
>>>>>>> 50f5a6f (Initial commit from local project)
                if (!isset($files[$category])) {
                    $files[$category] = [];
                }
                $files[$category][$name] = $file;
            }
        }

        // Sort everything
        ksort($files);
        foreach ($files as &$f) {
            asort($f);
        }

        return $files;
    }

    /**
     * Write documents.
     *
<<<<<<< HEAD
     * @param string[] $writers
     */
    public function write(Spreadsheet $spreadsheet, string $filename, array $writers = ['Xlsx', 'Xls'], bool $withCharts = false, ?callable $writerCallback = null, bool $resetActiveSheet = true): void
    {
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        if ($resetActiveSheet) {
            $spreadsheet->setActiveSheetIndex(0);
        }
=======
     * @param string $filename
     * @param string[] $writers
     */
    public function write(Spreadsheet $spreadsheet, $filename, array $writers = ['Xlsx', 'Xls'], bool $withCharts = false, ?callable $writerCallback = null): void
    {
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);
>>>>>>> 50f5a6f (Initial commit from local project)

        // Write documents
        foreach ($writers as $writerType) {
            $path = $this->getFilename($filename, mb_strtolower($writerType));
<<<<<<< HEAD
            if (preg_match('/(mpdf|tcpdf)$/', $path)) {
                $path .= '.pdf';
            }
=======
>>>>>>> 50f5a6f (Initial commit from local project)
            $writer = IOFactory::createWriter($spreadsheet, $writerType);
            $writer->setIncludeCharts($withCharts);
            if ($writerCallback !== null) {
                $writerCallback($writer);
            }
            $callStartTime = microtime(true);
            $writer->save($path);
<<<<<<< HEAD
            $this->logWrite($writer, $path, $callStartTime);
            if ($this->isCli() === false) {
                // @codeCoverageIgnoreStart
                echo '<a href="/download.php?type=' . pathinfo($path, PATHINFO_EXTENSION) . '&name=' . basename($path) . '">Download ' . basename($path) . '</a><br />';
                // @codeCoverageIgnoreEnd
=======
            $this->logWrite($writer, $path, /** @scrutinizer ignore-type */ $callStartTime);
            if ($this->isCli() === false) {
                echo '<a href="/download.php?type=' . pathinfo($path, PATHINFO_EXTENSION) . '&name=' . basename($path) . '">Download ' . basename($path) . '</a><br />';
>>>>>>> 50f5a6f (Initial commit from local project)
            }
        }

        $this->logEndingNotes();
    }

    protected function isDirOrMkdir(string $folder): bool
    {
        return \is_dir($folder) || \mkdir($folder);
    }

    /**
     * Returns the temporary directory and make sure it exists.
<<<<<<< HEAD
     */
    public function getTemporaryFolder(): string
=======
     *
     * @return string
     */
    public function getTemporaryFolder()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $tempFolder = sys_get_temp_dir() . '/phpspreadsheet';
        if (!$this->isDirOrMkdir($tempFolder)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $tempFolder));
        }

        return $tempFolder;
    }

    /**
     * Returns the filename that should be used for sample output.
<<<<<<< HEAD
     */
    public function getFilename(string $filename, string $extension = 'xlsx'): string
    {
        $originalExtension = pathinfo($filename, PATHINFO_EXTENSION);

        return $this->getTemporaryFolder() . '/' . str_replace('.' . $originalExtension, '.' . $extension, basename($filename));
=======
     *
     * @param string $filename
     * @param string $extension
     */
    public function getFilename($filename, $extension = 'xlsx'): string
    {
        $originalExtension = pathinfo($filename, PATHINFO_EXTENSION);

        return $this->getTemporaryFolder() . '/' . str_replace('.' . /** @scrutinizer ignore-type */ $originalExtension, '.' . $extension, basename($filename));
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * Return a random temporary file name.
<<<<<<< HEAD
     */
    public function getTemporaryFilename(string $extension = 'xlsx'): string
=======
     *
     * @param string $extension
     *
     * @return string
     */
    public function getTemporaryFilename($extension = 'xlsx')
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $temporaryFilename = tempnam($this->getTemporaryFolder(), 'phpspreadsheet-');
        if ($temporaryFilename === false) {
            // @codeCoverageIgnoreStart
            throw new RuntimeException('tempnam returned false');
            // @codeCoverageIgnoreEnd
        }
        unlink($temporaryFilename);

        return $temporaryFilename . '.' . $extension;
    }

<<<<<<< HEAD
    public function log(mixed $message): void
    {
        $eol = $this->isCli() ? PHP_EOL : '<br />';
        echo ($this->isCli() ? date('H:i:s ') : '') . StringHelper::convertToString($message) . $eol;
    }

    /**
     * Render chart as part of running chart samples in browser.
     * Charts are not rendered in unit tests, which are command line.
     *
     * @codeCoverageIgnore
     */
    public function renderChart(Chart $chart, string $fileName, ?Spreadsheet $spreadsheet = null): void
=======
    public function log(string $message): void
    {
        $eol = $this->isCli() ? PHP_EOL : '<br />';
        echo($this->isCli() ? date('H:i:s ') : '') . $message . $eol;
    }

    public function renderChart(Chart $chart, string $fileName): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($this->isCli() === true) {
            return;
        }
<<<<<<< HEAD
        Settings::setChartRenderer(MtJpGraphRenderer::class);

        $fileName = $this->getFilename($fileName, 'png');
        $title = $chart->getTitle();
        $caption = null;
        if ($title !== null) {
            $calculatedTitle = $title->getCalculatedTitle($spreadsheet);
            if ($calculatedTitle !== null) {
                $caption = $title->getCaption();
                $title->setCaption($calculatedTitle);
            }
        }
=======

        Settings::setChartRenderer(\PhpOffice\PhpSpreadsheet\Chart\Renderer\MtJpGraphRenderer::class);

        $fileName = $this->getFilename($fileName, 'png');
>>>>>>> 50f5a6f (Initial commit from local project)

        try {
            $chart->render($fileName);
            $this->log('Rendered image: ' . $fileName);
<<<<<<< HEAD
            $imageData = @file_get_contents($fileName);
            if ($imageData !== false) {
                echo '<div><img src="data:image/gif;base64,' . base64_encode($imageData) . '" /></div>';
            } else {
                $this->log('Unable to open chart' . PHP_EOL);
=======
            $imageData = file_get_contents($fileName);
            if ($imageData !== false) {
                echo '<div><img src="data:image/gif;base64,' . base64_encode($imageData) . '" /></div>';
>>>>>>> 50f5a6f (Initial commit from local project)
            }
        } catch (Throwable $e) {
            $this->log('Error rendering chart: ' . $e->getMessage() . PHP_EOL);
        }
<<<<<<< HEAD
        if (isset($title, $caption)) {
            $title->setCaption($caption);
        }
        Settings::unsetChartRenderer();
=======
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    public function titles(string $category, string $functionName, ?string $description = null): void
    {
        $this->log(sprintf('%s Functions:', $category));
        $description === null
            ? $this->log(sprintf('Function: %s()', rtrim($functionName, '()')))
            : $this->log(sprintf('Function: %s() - %s.', rtrim($functionName, '()'), rtrim($description, '.')));
    }

    public function displayGrid(array $matrix): void
    {
        $renderer = new TextGrid($matrix, $this->isCli());
        echo $renderer->render();
    }

    public function logCalculationResult(
        Worksheet $worksheet,
        string $functionName,
        string $formulaCell,
        ?string $descriptionCell = null
    ): void {
        if ($descriptionCell !== null) {
<<<<<<< HEAD
            $this->log($worksheet->getCell($descriptionCell)->getValueString());
        }
        $this->log($worksheet->getCell($formulaCell)->getValueString());
        $this->log(sprintf('%s() Result is ', $functionName) . $worksheet->getCell($formulaCell)->getCalculatedValueString());
=======
            $this->log($worksheet->getCell($descriptionCell)->getValue());
        }
        $this->log($worksheet->getCell($formulaCell)->getValue());
        $this->log(sprintf('%s() Result is ', $functionName) . $worksheet->getCell($formulaCell)->getCalculatedValue());
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * Log ending notes.
     */
    public function logEndingNotes(): void
    {
        // Do not show execution time for index
        $this->log('Peak memory usage: ' . (memory_get_peak_usage(true) / 1024 / 1024) . 'MB');
    }

    /**
     * Log a line about the write operation.
<<<<<<< HEAD
     */
    public function logWrite(IWriter $writer, string $path, float $callStartTime): void
=======
     *
     * @param string $path
     * @param float $callStartTime
     */
    public function logWrite(IWriter $writer, $path, $callStartTime): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $callEndTime = microtime(true);
        $callTime = $callEndTime - $callStartTime;
        $reflection = new ReflectionClass($writer);
        $format = $reflection->getShortName();

<<<<<<< HEAD
        $codePath = $this->isCli() ? $path : "<code>$path</code>";
        $message = "Write {$format} format to {$codePath}  in " . sprintf('%.4f', $callTime) . ' seconds';
=======
        $message = ($this->isCli() === true)
            ? "Write {$format} format to {$path}  in " . sprintf('%.4f', $callTime) . ' seconds'
            : "Write {$format} format to <code>{$path}</code>  in " . sprintf('%.4f', $callTime) . ' seconds';
>>>>>>> 50f5a6f (Initial commit from local project)

        $this->log($message);
    }

    /**
     * Log a line about the read operation.
<<<<<<< HEAD
     */
    public function logRead(string $format, string $path, float $callStartTime): void
=======
     *
     * @param string $format
     * @param string $path
     * @param float $callStartTime
     */
    public function logRead($format, $path, $callStartTime): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $callEndTime = microtime(true);
        $callTime = $callEndTime - $callStartTime;
        $message = "Read {$format} format from <code>{$path}</code>  in " . sprintf('%.4f', $callTime) . ' seconds';

        $this->log($message);
    }
}
