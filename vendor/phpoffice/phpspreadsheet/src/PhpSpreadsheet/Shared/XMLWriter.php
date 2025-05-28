<?php

namespace PhpOffice\PhpSpreadsheet\Shared;

use PhpOffice\PhpSpreadsheet\Exception as SpreadsheetException;

class XMLWriter extends \XMLWriter
{
<<<<<<< HEAD
    public static bool $debugEnabled = false;
=======
    /** @var bool */
    public static $debugEnabled = false;
>>>>>>> 50f5a6f (Initial commit from local project)

    /** Temporary storage method */
    const STORAGE_MEMORY = 1;
    const STORAGE_DISK = 2;

    /**
     * Temporary filename.
<<<<<<< HEAD
     */
    private string $tempFileName = '';
=======
     *
     * @var string
     */
    private $tempFileName = '';
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Create a new XMLWriter instance.
     *
     * @param int $temporaryStorage Temporary storage location
<<<<<<< HEAD
     * @param ?string $temporaryStorageFolder Temporary storage folder
     */
    public function __construct(int $temporaryStorage = self::STORAGE_MEMORY, ?string $temporaryStorageFolder = null)
=======
     * @param string $temporaryStorageFolder Temporary storage folder
     */
    public function __construct($temporaryStorage = self::STORAGE_MEMORY, $temporaryStorageFolder = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // Open temporary storage
        if ($temporaryStorage == self::STORAGE_MEMORY) {
            $this->openMemory();
        } else {
            // Create temporary filename
            if ($temporaryStorageFolder === null) {
                $temporaryStorageFolder = File::sysGetTempDir();
            }
            $this->tempFileName = (string) @tempnam($temporaryStorageFolder, 'xml');

            // Open storage
            if (empty($this->tempFileName) || $this->openUri($this->tempFileName) === false) {
                // Fallback to memory...
                $this->openMemory();
            }
        }

        // Set default values
        if (self::$debugEnabled) {
            $this->setIndent(true);
        }
    }

    /**
     * Destructor.
     */
    public function __destruct()
    {
        // Unlink temporary files
        // There is nothing reasonable to do if unlink fails.
        if ($this->tempFileName != '') {
<<<<<<< HEAD
=======
            /** @scrutinizer ignore-unhandled */
>>>>>>> 50f5a6f (Initial commit from local project)
            @unlink($this->tempFileName);
        }
    }

    public function __wakeup(): void
    {
        $this->tempFileName = '';

        throw new SpreadsheetException('Unserialize not permitted');
    }

    /**
     * Get written data.
<<<<<<< HEAD
     */
    public function getData(): string
=======
     *
     * @return string
     */
    public function getData()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($this->tempFileName == '') {
            return $this->outputMemory(true);
        }
        $this->flush();

        return file_get_contents($this->tempFileName) ?: '';
    }

    /**
     * Wrapper method for writeRaw.
     *
     * @param null|string|string[] $rawTextData
<<<<<<< HEAD
     */
    public function writeRawData($rawTextData): bool
=======
     *
     * @return bool
     */
    public function writeRawData($rawTextData)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($rawTextData)) {
            $rawTextData = implode("\n", $rawTextData);
        }

        return $this->writeRaw(htmlspecialchars($rawTextData ?? ''));
    }
}
