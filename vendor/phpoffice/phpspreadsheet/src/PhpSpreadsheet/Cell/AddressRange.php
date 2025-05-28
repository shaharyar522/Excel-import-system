<?php

namespace PhpOffice\PhpSpreadsheet\Cell;

<<<<<<< HEAD
/**
 * @template T
 */
=======
>>>>>>> 50f5a6f (Initial commit from local project)
interface AddressRange
{
    public const MAX_ROW = 1048576;

    public const MAX_COLUMN = 'XFD';

    public const MAX_COLUMN_INT = 16384;

    /**
<<<<<<< HEAD
     * @return T
     */
    public function from(): mixed;

    /**
     * @return T
     */
    public function to(): mixed;
=======
     * @return mixed
     */
    public function from();

    /**
     * @return mixed
     */
    public function to();
>>>>>>> 50f5a6f (Initial commit from local project)

    public function __toString(): string;
}
