<?php

namespace PhpOffice\PhpSpreadsheet\Cell;

use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
<<<<<<< HEAD
use Stringable;

class CellAddress implements Stringable
{
    protected ?Worksheet $worksheet;

    protected string $cellAddress;

    protected string $columnName = '';

    protected int $columnId;

    protected int $rowId;
=======

class CellAddress
{
    /**
     * @var ?Worksheet
     */
    protected $worksheet;

    /**
     * @var string
     */
    protected $cellAddress;

    /**
     * @var string
     */
    protected $columnName;

    /**
     * @var int
     */
    protected $columnId;

    /**
     * @var int
     */
    protected $rowId;
>>>>>>> 50f5a6f (Initial commit from local project)

    public function __construct(string $cellAddress, ?Worksheet $worksheet = null)
    {
        $this->cellAddress = str_replace('$', '', $cellAddress);
        [$this->columnId, $this->rowId, $this->columnName] = Coordinate::indexesFromString($this->cellAddress);
        $this->worksheet = $worksheet;
    }

<<<<<<< HEAD
    public function __destruct()
    {
        unset($this->worksheet);
    }

    /**
     * @phpstan-assert int|numeric-string $columnId
     * @phpstan-assert int|numeric-string $rowId
     */
    private static function validateColumnAndRow(int|string $columnId, int|string $rowId): void
=======
    /**
     * @param mixed $columnId
     * @param mixed $rowId
     */
    private static function validateColumnAndRow($columnId, $rowId): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (!is_numeric($columnId) || $columnId <= 0 || !is_numeric($rowId) || $rowId <= 0) {
            throw new Exception('Row and Column Ids must be positive integer values');
        }
    }

<<<<<<< HEAD
    public static function fromColumnAndRow(int|string $columnId, int|string $rowId, ?Worksheet $worksheet = null): self
    {
        self::validateColumnAndRow($columnId, $rowId);

        return new self(Coordinate::stringFromColumnIndex($columnId) . $rowId, $worksheet);
=======
    /**
     * @param mixed $columnId
     * @param mixed $rowId
     */
    public static function fromColumnAndRow($columnId, $rowId, ?Worksheet $worksheet = null): self
    {
        self::validateColumnAndRow($columnId, $rowId);

        /** @phpstan-ignore-next-line */
        return new static(Coordinate::stringFromColumnIndex($columnId) . ((string) $rowId), $worksheet);
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    public static function fromColumnRowArray(array $array, ?Worksheet $worksheet = null): self
    {
        [$columnId, $rowId] = $array;

<<<<<<< HEAD
        return self::fromColumnAndRow($columnId, $rowId, $worksheet);
    }

    public static function fromCellAddress(string $cellAddress, ?Worksheet $worksheet = null): self
    {
        return new self($cellAddress, $worksheet);
=======
        return static::fromColumnAndRow($columnId, $rowId, $worksheet);
    }

    /**
     * @param mixed $cellAddress
     */
    public static function fromCellAddress($cellAddress, ?Worksheet $worksheet = null): self
    {
        /** @phpstan-ignore-next-line */
        return new static($cellAddress, $worksheet);
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * The returned address string will contain the worksheet name as well, if available,
     *     (ie. if a Worksheet was provided to the constructor).
     *     e.g. "'Mark''s Worksheet'!C5".
     */
    public function fullCellAddress(): string
    {
        if ($this->worksheet !== null) {
            $title = str_replace("'", "''", $this->worksheet->getTitle());

            return "'{$title}'!{$this->cellAddress}";
        }

        return $this->cellAddress;
    }

    public function worksheet(): ?Worksheet
    {
        return $this->worksheet;
    }

    /**
     * The returned address string will contain just the column/row address,
     *     (even if a Worksheet was provided to the constructor).
     *     e.g. "C5".
     */
    public function cellAddress(): string
    {
        return $this->cellAddress;
    }

    public function rowId(): int
    {
        return $this->rowId;
    }

    public function columnId(): int
    {
        return $this->columnId;
    }

    public function columnName(): string
    {
        return $this->columnName;
    }

    public function nextRow(int $offset = 1): self
    {
        $newRowId = $this->rowId + $offset;
        if ($newRowId < 1) {
            $newRowId = 1;
        }

<<<<<<< HEAD
        return self::fromColumnAndRow($this->columnId, $newRowId);
=======
        return static::fromColumnAndRow($this->columnId, $newRowId);
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    public function previousRow(int $offset = 1): self
    {
        return $this->nextRow(0 - $offset);
    }

    public function nextColumn(int $offset = 1): self
    {
        $newColumnId = $this->columnId + $offset;
        if ($newColumnId < 1) {
            $newColumnId = 1;
        }

<<<<<<< HEAD
        return self::fromColumnAndRow($newColumnId, $this->rowId);
=======
        return static::fromColumnAndRow($newColumnId, $this->rowId);
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    public function previousColumn(int $offset = 1): self
    {
        return $this->nextColumn(0 - $offset);
    }

    /**
     * The returned address string will contain the worksheet name as well, if available,
     *     (ie. if a Worksheet was provided to the constructor).
     *     e.g. "'Mark''s Worksheet'!C5".
     */
<<<<<<< HEAD
    public function __toString(): string
=======
    public function __toString()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->fullCellAddress();
    }
}
