<?php

namespace PhpOffice\PhpSpreadsheet\Worksheet;

use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Exception as PhpSpreadsheetException;

/**
 * @extends CellIterator<int>
 */
class ColumnCellIterator extends CellIterator
{
    /**
     * Current iterator position.
<<<<<<< HEAD
     */
    private int $currentRow;

    /**
     * Column index.
     */
    private int $columnIndex;

    /**
     * Start position.
     */
    private int $startRow = 1;

    /**
     * End position.
     */
    private int $endRow = 1;
=======
     *
     * @var int
     */
    private $currentRow;

    /**
     * Column index.
     *
     * @var int
     */
    private $columnIndex;

    /**
     * Start position.
     *
     * @var int
     */
    private $startRow = 1;

    /**
     * End position.
     *
     * @var int
     */
    private $endRow = 1;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Create a new row iterator.
     *
     * @param Worksheet $worksheet The worksheet to iterate over
     * @param string $columnIndex The column that we want to iterate
     * @param int $startRow The row number at which to start iterating
<<<<<<< HEAD
     * @param ?int $endRow Optionally, the row number at which to stop iterating
     */
    public function __construct(Worksheet $worksheet, string $columnIndex = 'A', int $startRow = 1, ?int $endRow = null, bool $iterateOnlyExistingCells = false)
=======
     * @param int $endRow Optionally, the row number at which to stop iterating
     */
    public function __construct(Worksheet $worksheet, $columnIndex = 'A', $startRow = 1, $endRow = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // Set subject
        $this->worksheet = $worksheet;
        $this->cellCollection = $worksheet->getCellCollection();
        $this->columnIndex = Coordinate::columnIndexFromString($columnIndex);
        $this->resetEnd($endRow);
        $this->resetStart($startRow);
<<<<<<< HEAD
        $this->setIterateOnlyExistingCells($iterateOnlyExistingCells);
=======
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * (Re)Set the start row and the current row pointer.
     *
     * @param int $startRow The row number at which to start iterating
     *
     * @return $this
     */
<<<<<<< HEAD
    public function resetStart(int $startRow = 1): static
=======
    public function resetStart(int $startRow = 1)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->startRow = $startRow;
        $this->adjustForExistingOnlyRange();
        $this->seek($startRow);

        return $this;
    }

    /**
     * (Re)Set the end row.
     *
<<<<<<< HEAD
     * @param ?int $endRow The row number at which to stop iterating
     *
     * @return $this
     */
    public function resetEnd(?int $endRow = null): static
=======
     * @param int $endRow The row number at which to stop iterating
     *
     * @return $this
     */
    public function resetEnd($endRow = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->endRow = $endRow ?: $this->worksheet->getHighestRow();
        $this->adjustForExistingOnlyRange();

        return $this;
    }

    /**
     * Set the row pointer to the selected row.
     *
     * @param int $row The row number to set the current pointer at
     *
     * @return $this
     */
<<<<<<< HEAD
    public function seek(int $row = 1): static
    {
        if (
            $this->onlyExistingCells
            && (!$this->cellCollection->has(Coordinate::stringFromColumnIndex($this->columnIndex) . $row))
=======
    public function seek(int $row = 1)
    {
        if (
            $this->onlyExistingCells &&
            (!$this->cellCollection->has(Coordinate::stringFromColumnIndex($this->columnIndex) . $row))
>>>>>>> 50f5a6f (Initial commit from local project)
        ) {
            throw new PhpSpreadsheetException('In "IterateOnlyExistingCells" mode and Cell does not exist');
        }
        if (($row < $this->startRow) || ($row > $this->endRow)) {
            throw new PhpSpreadsheetException("Row $row is out of range ({$this->startRow} - {$this->endRow})");
        }
        $this->currentRow = $row;

        return $this;
    }

    /**
     * Rewind the iterator to the starting row.
     */
    public function rewind(): void
    {
        $this->currentRow = $this->startRow;
    }

    /**
     * Return the current cell in this worksheet column.
     */
    public function current(): ?Cell
    {
        $cellAddress = Coordinate::stringFromColumnIndex($this->columnIndex) . $this->currentRow;

        return $this->cellCollection->has($cellAddress)
            ? $this->cellCollection->get($cellAddress)
            : (
                $this->ifNotExists === self::IF_NOT_EXISTS_CREATE_NEW
                ? $this->worksheet->createNewCell($cellAddress)
                : null
            );
    }

    /**
     * Return the current iterator key.
     */
    public function key(): int
    {
        return $this->currentRow;
    }

    /**
     * Set the iterator to its next value.
     */
    public function next(): void
    {
        $columnAddress = Coordinate::stringFromColumnIndex($this->columnIndex);
        do {
            ++$this->currentRow;
        } while (
<<<<<<< HEAD
            ($this->onlyExistingCells)
            && ($this->currentRow <= $this->endRow)
            && (!$this->cellCollection->has($columnAddress . $this->currentRow))
=======
            ($this->onlyExistingCells) &&
            ($this->currentRow <= $this->endRow) &&
            (!$this->cellCollection->has($columnAddress . $this->currentRow))
>>>>>>> 50f5a6f (Initial commit from local project)
        );
    }

    /**
     * Set the iterator to its previous value.
     */
    public function prev(): void
    {
        $columnAddress = Coordinate::stringFromColumnIndex($this->columnIndex);
        do {
            --$this->currentRow;
        } while (
<<<<<<< HEAD
            ($this->onlyExistingCells)
            && ($this->currentRow >= $this->startRow)
            && (!$this->cellCollection->has($columnAddress . $this->currentRow))
=======
            ($this->onlyExistingCells) &&
            ($this->currentRow >= $this->startRow) &&
            (!$this->cellCollection->has($columnAddress . $this->currentRow))
>>>>>>> 50f5a6f (Initial commit from local project)
        );
    }

    /**
     * Indicate if more rows exist in the worksheet range of rows that we're iterating.
     */
    public function valid(): bool
    {
        return $this->currentRow <= $this->endRow && $this->currentRow >= $this->startRow;
    }

    /**
     * Validate start/end values for "IterateOnlyExistingCells" mode, and adjust if necessary.
     */
    protected function adjustForExistingOnlyRange(): void
    {
        if ($this->onlyExistingCells) {
            $columnAddress = Coordinate::stringFromColumnIndex($this->columnIndex);
            while (
<<<<<<< HEAD
                (!$this->cellCollection->has($columnAddress . $this->startRow))
                && ($this->startRow <= $this->endRow)
=======
                (!$this->cellCollection->has($columnAddress . $this->startRow)) &&
                ($this->startRow <= $this->endRow)
>>>>>>> 50f5a6f (Initial commit from local project)
            ) {
                ++$this->startRow;
            }
            while (
<<<<<<< HEAD
                (!$this->cellCollection->has($columnAddress . $this->endRow))
                && ($this->endRow >= $this->startRow)
=======
                (!$this->cellCollection->has($columnAddress . $this->endRow)) &&
                ($this->endRow >= $this->startRow)
>>>>>>> 50f5a6f (Initial commit from local project)
            ) {
                --$this->endRow;
            }
        }
    }
}
