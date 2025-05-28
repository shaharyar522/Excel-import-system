<?php

namespace PhpOffice\PhpSpreadsheet\Reader\Xlsx;

use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Reader\DefaultReadFilter;
use PhpOffice\PhpSpreadsheet\Reader\IReadFilter;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use SimpleXMLElement;

class ColumnAndRowAttributes extends BaseParserClass
{
<<<<<<< HEAD
    private Worksheet $worksheet;

    private ?SimpleXMLElement $worksheetXml;
=======
    /** @var Worksheet */
    private $worksheet;

    /** @var ?SimpleXMLElement */
    private $worksheetXml;
>>>>>>> 50f5a6f (Initial commit from local project)

    public function __construct(Worksheet $workSheet, ?SimpleXMLElement $worksheetXml = null)
    {
        $this->worksheet = $workSheet;
        $this->worksheetXml = $worksheetXml;
    }

    /**
     * Set Worksheet column attributes by attributes array passed.
     *
     * @param string $columnAddress A, B, ... DX, ...
     * @param array $columnAttributes array of attributes (indexes are attribute name, values are value)
     *                               'xfIndex', 'visible', 'collapsed', 'outlineLevel', 'width', ... ?
     */
<<<<<<< HEAD
    private function setColumnAttributes(string $columnAddress, array $columnAttributes): void
=======
    private function setColumnAttributes($columnAddress, array $columnAttributes): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (isset($columnAttributes['xfIndex'])) {
            $this->worksheet->getColumnDimension($columnAddress)->setXfIndex($columnAttributes['xfIndex']);
        }
        if (isset($columnAttributes['visible'])) {
            $this->worksheet->getColumnDimension($columnAddress)->setVisible($columnAttributes['visible']);
        }
        if (isset($columnAttributes['collapsed'])) {
            $this->worksheet->getColumnDimension($columnAddress)->setCollapsed($columnAttributes['collapsed']);
        }
        if (isset($columnAttributes['outlineLevel'])) {
            $this->worksheet->getColumnDimension($columnAddress)->setOutlineLevel($columnAttributes['outlineLevel']);
        }
        if (isset($columnAttributes['width'])) {
            $this->worksheet->getColumnDimension($columnAddress)->setWidth($columnAttributes['width']);
        }
    }

    /**
     * Set Worksheet row attributes by attributes array passed.
     *
     * @param int $rowNumber 1, 2, 3, ... 99, ...
     * @param array $rowAttributes array of attributes (indexes are attribute name, values are value)
     *                               'xfIndex', 'visible', 'collapsed', 'outlineLevel', 'rowHeight', ... ?
     */
<<<<<<< HEAD
    private function setRowAttributes(int $rowNumber, array $rowAttributes): void
=======
    private function setRowAttributes($rowNumber, array $rowAttributes): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (isset($rowAttributes['xfIndex'])) {
            $this->worksheet->getRowDimension($rowNumber)->setXfIndex($rowAttributes['xfIndex']);
        }
        if (isset($rowAttributes['visible'])) {
            $this->worksheet->getRowDimension($rowNumber)->setVisible($rowAttributes['visible']);
        }
        if (isset($rowAttributes['collapsed'])) {
            $this->worksheet->getRowDimension($rowNumber)->setCollapsed($rowAttributes['collapsed']);
        }
        if (isset($rowAttributes['outlineLevel'])) {
            $this->worksheet->getRowDimension($rowNumber)->setOutlineLevel($rowAttributes['outlineLevel']);
        }
        if (isset($rowAttributes['rowHeight'])) {
            $this->worksheet->getRowDimension($rowNumber)->setRowHeight($rowAttributes['rowHeight']);
        }
    }

<<<<<<< HEAD
    public function load(?IReadFilter $readFilter = null, bool $readDataOnly = false, bool $ignoreRowsWithNoCells = false): void
=======
    public function load(?IReadFilter $readFilter = null, bool $readDataOnly = false): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($this->worksheetXml === null) {
            return;
        }
<<<<<<< HEAD
        if ($readFilter !== null && $readFilter::class === DefaultReadFilter::class) {
            $readFilter = null;
        }
=======
>>>>>>> 50f5a6f (Initial commit from local project)

        $columnsAttributes = [];
        $rowsAttributes = [];
        if (isset($this->worksheetXml->cols)) {
            $columnsAttributes = $this->readColumnAttributes($this->worksheetXml->cols, $readDataOnly);
        }

        if ($this->worksheetXml->sheetData && $this->worksheetXml->sheetData->row) {
<<<<<<< HEAD
            $rowsAttributes = $this->readRowAttributes($this->worksheetXml->sheetData->row, $readDataOnly, $ignoreRowsWithNoCells, $readFilter !== null);
=======
            $rowsAttributes = $this->readRowAttributes($this->worksheetXml->sheetData->row, $readDataOnly);
        }

        if ($readFilter !== null && get_class($readFilter) === DefaultReadFilter::class) {
            $readFilter = null;
>>>>>>> 50f5a6f (Initial commit from local project)
        }

        // set columns/rows attributes
        $columnsAttributesAreSet = [];
        foreach ($columnsAttributes as $columnCoordinate => $columnAttributes) {
            if (
<<<<<<< HEAD
                $readFilter === null
                || !$this->isFilteredColumn($readFilter, $columnCoordinate, $rowsAttributes)
=======
                $readFilter === null ||
                !$this->isFilteredColumn($readFilter, $columnCoordinate, $rowsAttributes)
>>>>>>> 50f5a6f (Initial commit from local project)
            ) {
                if (!isset($columnsAttributesAreSet[$columnCoordinate])) {
                    $this->setColumnAttributes($columnCoordinate, $columnAttributes);
                    $columnsAttributesAreSet[$columnCoordinate] = true;
                }
            }
        }

        $rowsAttributesAreSet = [];
        foreach ($rowsAttributes as $rowCoordinate => $rowAttributes) {
            if (
<<<<<<< HEAD
                $readFilter === null
                || !$this->isFilteredRow($readFilter, $rowCoordinate, $columnsAttributes)
=======
                $readFilter === null ||
                !$this->isFilteredRow($readFilter, $rowCoordinate, $columnsAttributes)
>>>>>>> 50f5a6f (Initial commit from local project)
            ) {
                if (!isset($rowsAttributesAreSet[$rowCoordinate])) {
                    $this->setRowAttributes($rowCoordinate, $rowAttributes);
                    $rowsAttributesAreSet[$rowCoordinate] = true;
                }
            }
        }
    }

    private function isFilteredColumn(IReadFilter $readFilter, string $columnCoordinate, array $rowsAttributes): bool
    {
        foreach ($rowsAttributes as $rowCoordinate => $rowAttributes) {
<<<<<<< HEAD
            if ($readFilter->readCell($columnCoordinate, $rowCoordinate, $this->worksheet->getTitle())) {
                return false;
            }
        }

        return true;
=======
            if (!$readFilter->readCell($columnCoordinate, $rowCoordinate, $this->worksheet->getTitle())) {
                return true;
            }
        }

        return false;
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    private function readColumnAttributes(SimpleXMLElement $worksheetCols, bool $readDataOnly): array
    {
        $columnAttributes = [];

        foreach ($worksheetCols->col as $columnx) {
<<<<<<< HEAD
=======
            /** @scrutinizer ignore-call */
>>>>>>> 50f5a6f (Initial commit from local project)
            $column = $columnx->attributes();
            if ($column !== null) {
                $startColumn = Coordinate::stringFromColumnIndex((int) $column['min']);
                $endColumn = Coordinate::stringFromColumnIndex((int) $column['max']);
                ++$endColumn;
                for ($columnAddress = $startColumn; $columnAddress !== $endColumn; ++$columnAddress) {
                    $columnAttributes[$columnAddress] = $this->readColumnRangeAttributes($column, $readDataOnly);

                    if ((int) ($column['max']) == 16384) {
                        break;
                    }
                }
            }
        }

        return $columnAttributes;
    }

    private function readColumnRangeAttributes(?SimpleXMLElement $column, bool $readDataOnly): array
    {
        $columnAttributes = [];
        if ($column !== null) {
            if (isset($column['style']) && !$readDataOnly) {
                $columnAttributes['xfIndex'] = (int) $column['style'];
            }
            if (isset($column['hidden']) && self::boolean($column['hidden'])) {
                $columnAttributes['visible'] = false;
            }
            if (isset($column['collapsed']) && self::boolean($column['collapsed'])) {
                $columnAttributes['collapsed'] = true;
            }
            if (isset($column['outlineLevel']) && ((int) $column['outlineLevel']) > 0) {
                $columnAttributes['outlineLevel'] = (int) $column['outlineLevel'];
            }
            if (isset($column['width'])) {
                $columnAttributes['width'] = (float) $column['width'];
            }
        }

        return $columnAttributes;
    }

    private function isFilteredRow(IReadFilter $readFilter, int $rowCoordinate, array $columnsAttributes): bool
    {
        foreach ($columnsAttributes as $columnCoordinate => $columnAttributes) {
            if (!$readFilter->readCell($columnCoordinate, $rowCoordinate, $this->worksheet->getTitle())) {
                return true;
            }
        }

        return false;
    }

<<<<<<< HEAD
    private function readRowAttributes(SimpleXMLElement $worksheetRow, bool $readDataOnly, bool $ignoreRowsWithNoCells, bool $readFilterIsNotNull): array
=======
    private function readRowAttributes(SimpleXMLElement $worksheetRow, bool $readDataOnly): array
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $rowAttributes = [];

        foreach ($worksheetRow as $rowx) {
<<<<<<< HEAD
            $row = $rowx->attributes();
            if ($row !== null && (!$ignoreRowsWithNoCells || isset($rowx->c))) {
                $rowIndex = (int) $row['r'];
                if (isset($row['ht']) && !$readDataOnly) {
                    $rowAttributes[$rowIndex]['rowHeight'] = (float) $row['ht'];
                }
                if (isset($row['hidden']) && self::boolean($row['hidden'])) {
                    $rowAttributes[$rowIndex]['visible'] = false;
                }
                if (isset($row['collapsed']) && self::boolean($row['collapsed'])) {
                    $rowAttributes[$rowIndex]['collapsed'] = true;
                }
                if (isset($row['outlineLevel']) && (int) $row['outlineLevel'] > 0) {
                    $rowAttributes[$rowIndex]['outlineLevel'] = (int) $row['outlineLevel'];
                }
                if (isset($row['s']) && !$readDataOnly) {
                    $rowAttributes[$rowIndex]['xfIndex'] = (int) $row['s'];
                }
                if ($readFilterIsNotNull && empty($rowAttributes[$rowIndex])) {
                    $rowAttributes[$rowIndex]['exists'] = true;
=======
            /** @scrutinizer ignore-call */
            $row = $rowx->attributes();
            if ($row !== null) {
                if (isset($row['ht']) && !$readDataOnly) {
                    $rowAttributes[(int) $row['r']]['rowHeight'] = (float) $row['ht'];
                }
                if (isset($row['hidden']) && self::boolean($row['hidden'])) {
                    $rowAttributes[(int) $row['r']]['visible'] = false;
                }
                if (isset($row['collapsed']) && self::boolean($row['collapsed'])) {
                    $rowAttributes[(int) $row['r']]['collapsed'] = true;
                }
                if (isset($row['outlineLevel']) && (int) $row['outlineLevel'] > 0) {
                    $rowAttributes[(int) $row['r']]['outlineLevel'] = (int) $row['outlineLevel'];
                }
                if (isset($row['s']) && !$readDataOnly) {
                    $rowAttributes[(int) $row['r']]['xfIndex'] = (int) $row['s'];
>>>>>>> 50f5a6f (Initial commit from local project)
                }
            }
        }

        return $rowAttributes;
    }
}
