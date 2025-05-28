<?php

namespace PhpOffice\PhpSpreadsheet\Collection;

<<<<<<< HEAD
=======
use Generator;
>>>>>>> 50f5a6f (Initial commit from local project)
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Exception as PhpSpreadsheetException;
use PhpOffice\PhpSpreadsheet\Settings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Psr\SimpleCache\CacheInterface;

class Cells
{
    protected const MAX_COLUMN_ID = 16384;

<<<<<<< HEAD
    private CacheInterface $cache;

    /**
     * Parent worksheet.
     */
    private ?Worksheet $parent;

    /**
     * The currently active Cell.
     */
    private ?Cell $currentCell = null;

    /**
     * Coordinate of the currently active Cell.
     */
    private ?string $currentCoordinate = null;

    /**
     * Flag indicating whether the currently active Cell requires saving.
     */
    private bool $currentCellIsDirty = false;
=======
    /**
     * @var CacheInterface
     */
    private $cache;

    /**
     * Parent worksheet.
     *
     * @var null|Worksheet
     */
    private $parent;

    /**
     * The currently active Cell.
     *
     * @var null|Cell
     */
    private $currentCell;

    /**
     * Coordinate of the currently active Cell.
     *
     * @var null|string
     */
    private $currentCoordinate;

    /**
     * Flag indicating whether the currently active Cell requires saving.
     *
     * @var bool
     */
    private $currentCellIsDirty = false;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * An index of existing cells. int pointer to the coordinate (0-base-indexed row * 16,384 + 1-base indexed column)
     *    indexed by their coordinate.
     *
     * @var int[]
     */
<<<<<<< HEAD
    private array $index = [];

    /**
     * Prefix used to uniquely identify cache data for this worksheet.
     */
    private string $cachePrefix;
=======
    private $index = [];

    /**
     * Prefix used to uniquely identify cache data for this worksheet.
     *
     * @var string
     */
    private $cachePrefix;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Initialise this new cell collection.
     *
     * @param Worksheet $parent The worksheet for this cell collection
     */
    public function __construct(Worksheet $parent, CacheInterface $cache)
    {
        // Set our parent worksheet.
        // This is maintained here to facilitate re-attaching it to Cell objects when
        // they are woken from a serialized state
        $this->parent = $parent;
        $this->cache = $cache;
        $this->cachePrefix = $this->getUniqueID();
    }

    /**
     * Return the parent worksheet for this cell collection.
<<<<<<< HEAD
     */
    public function getParent(): ?Worksheet
=======
     *
     * @return null|Worksheet
     */
    public function getParent()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->parent;
    }

    /**
     * Whether the collection holds a cell for the given coordinate.
     *
     * @param string $cellCoordinate Coordinate of the cell to check
     */
<<<<<<< HEAD
    public function has(string $cellCoordinate): bool
=======
    public function has($cellCoordinate): bool
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return ($cellCoordinate === $this->currentCoordinate) || isset($this->index[$cellCoordinate]);
    }

<<<<<<< HEAD
    public function has2(string $cellCoordinate): bool
    {
        return isset($this->index[$cellCoordinate]);
    }

=======
>>>>>>> 50f5a6f (Initial commit from local project)
    /**
     * Add or update a cell in the collection.
     *
     * @param Cell $cell Cell to update
     */
    public function update(Cell $cell): Cell
    {
        return $this->add($cell->getCoordinate(), $cell);
    }

    /**
     * Delete a cell in cache identified by coordinate.
     *
     * @param string $cellCoordinate Coordinate of the cell to delete
     */
<<<<<<< HEAD
    public function delete(string $cellCoordinate): void
=======
    public function delete($cellCoordinate): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($cellCoordinate === $this->currentCoordinate && $this->currentCell !== null) {
            $this->currentCell->detach();
            $this->currentCoordinate = null;
            $this->currentCell = null;
            $this->currentCellIsDirty = false;
        }

        unset($this->index[$cellCoordinate]);

        // Delete the entry from cache
        $this->cache->delete($this->cachePrefix . $cellCoordinate);
    }

    /**
     * Get a list of all cell coordinates currently held in the collection.
     *
     * @return string[]
     */
<<<<<<< HEAD
    public function getCoordinates(): array
=======
    public function getCoordinates()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return array_keys($this->index);
    }

    /**
     * Get a sorted list of all cell coordinates currently held in the collection by row and column.
     *
     * @return string[]
     */
<<<<<<< HEAD
    public function getSortedCoordinates(): array
=======
    public function getSortedCoordinates()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        asort($this->index);

        return array_keys($this->index);
    }

    /**
<<<<<<< HEAD
     * Get a sorted list of all cell coordinates currently held in the collection by index (16384*row+column).
     *
     * @return int[]
     */
    public function getSortedCoordinatesInt(): array
    {
        asort($this->index);

        return array_values($this->index);
    }

    /**
     * Return the cell coordinate of the currently active cell object.
     */
    public function getCurrentCoordinate(): ?string
=======
     * Return the cell coordinate of the currently active cell object.
     *
     * @return null|string
     */
    public function getCurrentCoordinate()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->currentCoordinate;
    }

    /**
     * Return the column coordinate of the currently active cell object.
     */
    public function getCurrentColumn(): string
    {
        $column = 0;
        $row = '';
        sscanf($this->currentCoordinate ?? '', '%[A-Z]%d', $column, $row);

        return (string) $column;
    }

    /**
     * Return the row coordinate of the currently active cell object.
     */
    public function getCurrentRow(): int
    {
        $column = 0;
        $row = '';
        sscanf($this->currentCoordinate ?? '', '%[A-Z]%d', $column, $row);

        return (int) $row;
    }

    /**
     * Get highest worksheet column and highest row that have cell records.
     *
     * @return array Highest column name and highest row number
     */
<<<<<<< HEAD
    public function getHighestRowAndColumn(): array
=======
    public function getHighestRowAndColumn()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // Lookup highest column and highest row
        $maxRow = $maxColumn = 1;
        foreach ($this->index as $coordinate) {
<<<<<<< HEAD
            $row = (int) floor(($coordinate - 1) / self::MAX_COLUMN_ID) + 1;
            $maxRow = ($maxRow > $row) ? $maxRow : $row;
            $column = ($coordinate % self::MAX_COLUMN_ID) ?: self::MAX_COLUMN_ID;
=======
            $row = (int) floor($coordinate / self::MAX_COLUMN_ID) + 1;
            $maxRow = ($maxRow > $row) ? $maxRow : $row;
            $column = $coordinate % self::MAX_COLUMN_ID;
>>>>>>> 50f5a6f (Initial commit from local project)
            $maxColumn = ($maxColumn > $column) ? $maxColumn : $column;
        }

        return [
            'row' => $maxRow,
            'column' => Coordinate::stringFromColumnIndex($maxColumn),
        ];
    }

    /**
     * Get highest worksheet column.
     *
     * @param null|int|string $row Return the highest column for the specified row,
     *                    or the highest column of any row if no row number is passed
     *
     * @return string Highest column name
     */
<<<<<<< HEAD
    public function getHighestColumn($row = null): string
=======
    public function getHighestColumn($row = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($row === null) {
            return $this->getHighestRowAndColumn()['column'];
        }

        $row = (int) $row;
        if ($row <= 0) {
            throw new PhpSpreadsheetException('Row number must be a positive integer');
        }

        $maxColumn = 1;
        $toRow = $row * self::MAX_COLUMN_ID;
        $fromRow = --$row * self::MAX_COLUMN_ID;
        foreach ($this->index as $coordinate) {
            if ($coordinate < $fromRow || $coordinate >= $toRow) {
                continue;
            }
<<<<<<< HEAD
            $column = ($coordinate % self::MAX_COLUMN_ID) ?: self::MAX_COLUMN_ID;
=======
            $column = $coordinate % self::MAX_COLUMN_ID;
>>>>>>> 50f5a6f (Initial commit from local project)
            $maxColumn = $maxColumn > $column ? $maxColumn : $column;
        }

        return Coordinate::stringFromColumnIndex($maxColumn);
    }

    /**
     * Get highest worksheet row.
     *
     * @param null|string $column Return the highest row for the specified column,
     *                       or the highest row of any column if no column letter is passed
     *
     * @return int Highest row number
     */
<<<<<<< HEAD
    public function getHighestRow(?string $column = null): int
=======
    public function getHighestRow($column = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($column === null) {
            return $this->getHighestRowAndColumn()['row'];
        }

        $maxRow = 1;
        $columnIndex = Coordinate::columnIndexFromString($column);
        foreach ($this->index as $coordinate) {
            if ($coordinate % self::MAX_COLUMN_ID !== $columnIndex) {
                continue;
            }
            $row = (int) floor($coordinate / self::MAX_COLUMN_ID) + 1;
            $maxRow = ($maxRow > $row) ? $maxRow : $row;
        }

        return $maxRow;
    }

    /**
     * Generate a unique ID for cache referencing.
     *
     * @return string Unique Reference
     */
<<<<<<< HEAD
    private function getUniqueID(): string
=======
    private function getUniqueID()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $cacheType = Settings::getCache();

        return ($cacheType instanceof Memory\SimpleCache1 || $cacheType instanceof Memory\SimpleCache3)
            ? random_bytes(7) . ':'
            : uniqid('phpspreadsheet.', true) . '.';
    }

    /**
     * Clone the cell collection.
<<<<<<< HEAD
     */
    public function cloneCellCollection(Worksheet $worksheet): static
=======
     *
     * @return self
     */
    public function cloneCellCollection(Worksheet $worksheet)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->storeCurrentCell();
        $newCollection = clone $this;

        $newCollection->parent = $worksheet;
        $newCollection->cachePrefix = $newCollection->getUniqueID();

        foreach ($this->index as $key => $value) {
            $newCollection->index[$key] = $value;
            $stored = $newCollection->cache->set(
                $newCollection->cachePrefix . $key,
<<<<<<< HEAD
                clone $this->getCache($key)
=======
                clone $this->cache->get($this->cachePrefix . $key)
>>>>>>> 50f5a6f (Initial commit from local project)
            );
            if ($stored === false) {
                $this->destructIfNeeded($newCollection, 'Failed to copy cells in cache');
            }
        }

        return $newCollection;
    }

    /**
     * Remove a row, deleting all cells in that row.
     *
     * @param int|string $row Row number to remove
     */
    public function removeRow($row): void
    {
        $this->storeCurrentCell();
        $row = (int) $row;
        if ($row <= 0) {
            throw new PhpSpreadsheetException('Row number must be a positive integer');
        }

        $toRow = $row * self::MAX_COLUMN_ID;
        $fromRow = --$row * self::MAX_COLUMN_ID;
        foreach ($this->index as $coordinate) {
            if ($coordinate >= $fromRow && $coordinate < $toRow) {
                $row = (int) floor($coordinate / self::MAX_COLUMN_ID) + 1;
                $column = Coordinate::stringFromColumnIndex($coordinate % self::MAX_COLUMN_ID);
                $this->delete("{$column}{$row}");
            }
        }
    }

    /**
     * Remove a column, deleting all cells in that column.
     *
     * @param string $column Column ID to remove
     */
<<<<<<< HEAD
    public function removeColumn(string $column): void
=======
    public function removeColumn($column): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->storeCurrentCell();

        $columnIndex = Coordinate::columnIndexFromString($column);
        foreach ($this->index as $coordinate) {
            if ($coordinate % self::MAX_COLUMN_ID === $columnIndex) {
                $row = (int) floor($coordinate / self::MAX_COLUMN_ID) + 1;
                $column = Coordinate::stringFromColumnIndex($coordinate % self::MAX_COLUMN_ID);
                $this->delete("{$column}{$row}");
            }
        }
    }

    /**
     * Store cell data in cache for the current cell object if it's "dirty",
     * and the 'nullify' the current cell object.
     */
    private function storeCurrentCell(): void
    {
        if ($this->currentCellIsDirty && isset($this->currentCoordinate, $this->currentCell)) {
<<<<<<< HEAD
            $this->currentCell->detach();
=======
            $this->currentCell->/** @scrutinizer ignore-call */ detach();
>>>>>>> 50f5a6f (Initial commit from local project)

            $stored = $this->cache->set($this->cachePrefix . $this->currentCoordinate, $this->currentCell);
            if ($stored === false) {
                $this->destructIfNeeded($this, "Failed to store cell {$this->currentCoordinate} in cache");
            }
            $this->currentCellIsDirty = false;
        }

        $this->currentCoordinate = null;
        $this->currentCell = null;
    }

    private function destructIfNeeded(self $cells, string $message): void
    {
        $cells->__destruct();

        throw new PhpSpreadsheetException($message);
    }

    /**
     * Add or update a cell identified by its coordinate into the collection.
     *
     * @param string $cellCoordinate Coordinate of the cell to update
     * @param Cell $cell Cell to update
<<<<<<< HEAD
     */
    public function add(string $cellCoordinate, Cell $cell): Cell
=======
     *
     * @return Cell
     */
    public function add($cellCoordinate, Cell $cell)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($cellCoordinate !== $this->currentCoordinate) {
            $this->storeCurrentCell();
        }
        $column = 0;
        $row = '';
        sscanf($cellCoordinate, '%[A-Z]%d', $column, $row);
        $this->index[$cellCoordinate] = (--$row * self::MAX_COLUMN_ID) + Coordinate::columnIndexFromString((string) $column);

        $this->currentCoordinate = $cellCoordinate;
        $this->currentCell = $cell;
        $this->currentCellIsDirty = true;

        return $cell;
    }

    /**
     * Get cell at a specific coordinate.
     *
     * @param string $cellCoordinate Coordinate of the cell
     *
     * @return null|Cell Cell that was found, or null if not found
     */
<<<<<<< HEAD
    public function get(string $cellCoordinate): ?Cell
=======
    public function get($cellCoordinate)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($cellCoordinate === $this->currentCoordinate) {
            return $this->currentCell;
        }
        $this->storeCurrentCell();

        // Return null if requested entry doesn't exist in collection
        if ($this->has($cellCoordinate) === false) {
            return null;
        }

<<<<<<< HEAD
        $cell = $this->getcache($cellCoordinate);
=======
        // Check if the entry that has been requested actually exists in the cache
        $cell = $this->cache->get($this->cachePrefix . $cellCoordinate);
        if ($cell === null) {
            throw new PhpSpreadsheetException("Cell entry {$cellCoordinate} no longer exists in cache. This probably means that the cache was cleared by someone else.");
        }
>>>>>>> 50f5a6f (Initial commit from local project)

        // Set current entry to the requested entry
        $this->currentCoordinate = $cellCoordinate;
        $this->currentCell = $cell;
        // Re-attach this as the cell's parent
        $this->currentCell->attach($this);

        // Return requested entry
        return $this->currentCell;
    }

    /**
     * Clear the cell collection and disconnect from our parent.
     */
    public function unsetWorksheetCells(): void
    {
        if ($this->currentCell !== null) {
            $this->currentCell->detach();
            $this->currentCell = null;
            $this->currentCoordinate = null;
        }

        // Flush the cache
        $this->__destruct();

        $this->index = [];

        // detach ourself from the worksheet, so that it can then delete this object successfully
        $this->parent = null;
    }

    /**
     * Destroy this cell collection.
     */
    public function __destruct()
    {
        $this->cache->deleteMultiple($this->getAllCacheKeys());
<<<<<<< HEAD
        $this->parent = null;
=======
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * Returns all known cache keys.
     *
<<<<<<< HEAD
     * @return iterable<string>
     */
    private function getAllCacheKeys(): iterable
=======
     * @return Generator|string[]
     */
    private function getAllCacheKeys()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        foreach ($this->index as $coordinate => $value) {
            yield $this->cachePrefix . $coordinate;
        }
    }
<<<<<<< HEAD

    private function getCache(string $cellCoordinate): Cell
    {
        $cell = $this->cache->get($this->cachePrefix . $cellCoordinate);
        if (!($cell instanceof Cell)) {
            throw new PhpSpreadsheetException("Cell entry {$cellCoordinate} no longer exists in cache. This probably means that the cache was cleared by someone else.");
        }

        return $cell;
    }
=======
>>>>>>> 50f5a6f (Initial commit from local project)
}
