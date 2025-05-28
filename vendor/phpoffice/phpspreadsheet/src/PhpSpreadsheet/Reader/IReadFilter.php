<?php

namespace PhpOffice\PhpSpreadsheet\Reader;

interface IReadFilter
{
    /**
     * Should this cell be read?
     *
     * @param string $columnAddress Column address (as a string value like "A", or "IV")
     * @param int $row Row number
     * @param string $worksheetName Optional worksheet name
<<<<<<< HEAD
     */
    public function readCell(string $columnAddress, int $row, string $worksheetName = ''): bool;
=======
     *
     * @return bool
     */
    public function readCell($columnAddress, $row, $worksheetName = '');
>>>>>>> 50f5a6f (Initial commit from local project)
}
