<?php
<<<<<<< HEAD

=======
>>>>>>> 50f5a6f (Initial commit from local project)
declare(strict_types=1);

namespace ZipStream\Exception;

use ZipStream\Exception;

/**
 * This Exception gets invoked if a counter value exceeds storage size
 */
class OverflowException extends Exception
{
<<<<<<< HEAD
    /**
     * @internal
     */
=======
>>>>>>> 50f5a6f (Initial commit from local project)
    public function __construct()
    {
        parent::__construct('File size exceeds limit of 32 bit integer. Please enable "zip64" option.');
    }
}
