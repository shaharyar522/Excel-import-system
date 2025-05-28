<?php

namespace PhpOffice\PhpSpreadsheet\Writer;

<<<<<<< HEAD
=======
use ZipStream\Option\Archive;
>>>>>>> 50f5a6f (Initial commit from local project)
use ZipStream\ZipStream;

class ZipStream3
{
    /**
     * @param resource $fileHandle
     */
    public static function newZipStream($fileHandle): ZipStream
    {
        return new ZipStream(
            enableZip64: false,
            outputStream: $fileHandle,
            sendHttpHeaders: false,
            defaultEnableZeroHeader: false,
        );
    }
}
