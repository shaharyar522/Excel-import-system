<?php

namespace PhpOffice\PhpSpreadsheet\Worksheet;

use PhpOffice\PhpSpreadsheet\Helper\Dimension as CssDimension;

class RowDimension extends Dimension
{
    /**
     * Row index.
<<<<<<< HEAD
     */
    private ?int $rowIndex;
=======
     *
     * @var ?int
     */
    private $rowIndex;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Row height (in pt).
     *
     * When this is set to a negative value, the row height should be ignored by IWriter
<<<<<<< HEAD
     */
    private float $height = -1;

    /**
     * ZeroHeight for Row?
     */
    private bool $zeroHeight = false;
=======
     *
     * @var float
     */
    private $height = -1;

    /**
     * ZeroHeight for Row?
     *
     * @var bool
     */
    private $zeroHeight = false;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Create a new RowDimension.
     *
     * @param ?int $index Numeric row index
     */
<<<<<<< HEAD
    public function __construct(?int $index = 0)
=======
    public function __construct($index = 0)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // Initialise values
        $this->rowIndex = $index;

        // set dimension as unformatted by default
        parent::__construct(null);
    }

    /**
     * Get Row Index.
     */
    public function getRowIndex(): ?int
    {
        return $this->rowIndex;
    }

    /**
     * Set Row Index.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setRowIndex(int $index): static
=======
    public function setRowIndex(int $index)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->rowIndex = $index;

        return $this;
    }

    /**
     * Get Row Height.
     * By default, this will be in points; but this method also accepts an optional unit of measure
     *    argument, and will convert the value from points to the specified UoM.
     *    A value of -1 tells Excel to display this column in its default height.
<<<<<<< HEAD
     */
    public function getRowHeight(?string $unitOfMeasure = null): float
=======
     *
     * @return float
     */
    public function getRowHeight(?string $unitOfMeasure = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return ($unitOfMeasure === null || $this->height < 0)
            ? $this->height
            : (new CssDimension($this->height . CssDimension::UOM_POINTS))->toUnit($unitOfMeasure);
    }

    /**
     * Set Row Height.
     *
     * @param float $height in points. A value of -1 tells Excel to display this column in its default height.
     * By default, this will be the passed argument value; but this method also accepts an optional unit of measure
     *    argument, and will convert the passed argument value to points from the specified UoM
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setRowHeight(float $height, ?string $unitOfMeasure = null): static
=======
    public function setRowHeight($height, ?string $unitOfMeasure = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->height = ($unitOfMeasure === null || $height < 0)
            ? $height
            : (new CssDimension("{$height}{$unitOfMeasure}"))->height();

        return $this;
    }

    /**
     * Get ZeroHeight.
     */
    public function getZeroHeight(): bool
    {
        return $this->zeroHeight;
    }

    /**
     * Set ZeroHeight.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setZeroHeight(bool $zeroHeight): static
=======
    public function setZeroHeight(bool $zeroHeight)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->zeroHeight = $zeroHeight;

        return $this;
    }
}
