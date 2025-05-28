<?php
<<<<<<< HEAD

=======
>>>>>>> 50f5a6f (Initial commit from local project)
declare(strict_types=1);

namespace ZipStream\Exception;

use ZipStream\Exception;

/**
<<<<<<< HEAD
 * This Exception gets invoked if a stream can't be read.
=======
 * This Exception gets invoked if `fread` fails on a stream.
>>>>>>> 50f5a6f (Initial commit from local project)
 */
class StreamNotReadableException extends Exception
{
    /**
<<<<<<< HEAD
     * @internal
     */
    public function __construct()
    {
        parent::__construct('The stream could not be read.');
=======
     * Constructor of the Exception
     *
     * @param string $fileName - The name of the file which the stream belongs to.
     */
    public function __construct(string $fileName)
    {
        parent::__construct("The stream for $fileName could not be read.");
>>>>>>> 50f5a6f (Initial commit from local project)
    }
}
