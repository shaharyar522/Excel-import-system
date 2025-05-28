<?php

namespace PhpOffice\PhpSpreadsheet\Shared\Escher\DgContainer\SpgrContainer;

use PhpOffice\PhpSpreadsheet\Shared\Escher\DgContainer\SpgrContainer;

class SpContainer
{
    /**
     * Parent Shape Group Container.
<<<<<<< HEAD
     */
    private SpgrContainer $parent;

    /**
     * Is this a group shape?
     */
    private bool $spgr = false;

    /**
     * Shape type.
     */
    private int $spType;

    /**
     * Shape flag.
     */
    private int $spFlag;

    /**
     * Shape index (usually group shape has index 0, and the rest: 1,2,3...).
     */
    private int $spId;

    /**
     * Array of options.
     */
    private array $OPT = [];

    /**
     * Cell coordinates of upper-left corner of shape, e.g. 'A1'.
     */
    private string $startCoordinates = '';

    /**
     * Horizontal offset of upper-left corner of shape measured in 1/1024 of column width.
     */
    private int|float $startOffsetX;

    /**
     * Vertical offset of upper-left corner of shape measured in 1/256 of row height.
     */
    private int|float $startOffsetY;

    /**
     * Cell coordinates of bottom-right corner of shape, e.g. 'B2'.
     */
    private string $endCoordinates;

    /**
     * Horizontal offset of bottom-right corner of shape measured in 1/1024 of column width.
     */
    private int|float $endOffsetX;

    /**
     * Vertical offset of bottom-right corner of shape measured in 1/256 of row height.
     */
    private int|float $endOffsetY;

    /**
     * Set parent Shape Group Container.
     */
    public function setParent(SpgrContainer $parent): void
=======
     *
     * @var SpgrContainer
     */
    private $parent;

    /**
     * Is this a group shape?
     *
     * @var bool
     */
    private $spgr = false;

    /**
     * Shape type.
     *
     * @var int
     */
    private $spType;

    /**
     * Shape flag.
     *
     * @var int
     */
    private $spFlag;

    /**
     * Shape index (usually group shape has index 0, and the rest: 1,2,3...).
     *
     * @var int
     */
    private $spId;

    /**
     * Array of options.
     *
     * @var array
     */
    private $OPT;

    /**
     * Cell coordinates of upper-left corner of shape, e.g. 'A1'.
     *
     * @var string
     */
    private $startCoordinates;

    /**
     * Horizontal offset of upper-left corner of shape measured in 1/1024 of column width.
     *
     * @var int
     */
    private $startOffsetX;

    /**
     * Vertical offset of upper-left corner of shape measured in 1/256 of row height.
     *
     * @var int
     */
    private $startOffsetY;

    /**
     * Cell coordinates of bottom-right corner of shape, e.g. 'B2'.
     *
     * @var string
     */
    private $endCoordinates;

    /**
     * Horizontal offset of bottom-right corner of shape measured in 1/1024 of column width.
     *
     * @var int
     */
    private $endOffsetX;

    /**
     * Vertical offset of bottom-right corner of shape measured in 1/256 of row height.
     *
     * @var int
     */
    private $endOffsetY;

    /**
     * Set parent Shape Group Container.
     *
     * @param SpgrContainer $parent
     */
    public function setParent($parent): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->parent = $parent;
    }

    /**
     * Get the parent Shape Group Container.
<<<<<<< HEAD
     */
    public function getParent(): SpgrContainer
=======
     *
     * @return SpgrContainer
     */
    public function getParent()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->parent;
    }

    /**
     * Set whether this is a group shape.
<<<<<<< HEAD
     */
    public function setSpgr(bool $value): void
=======
     *
     * @param bool $value
     */
    public function setSpgr($value): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->spgr = $value;
    }

    /**
     * Get whether this is a group shape.
<<<<<<< HEAD
     */
    public function getSpgr(): bool
=======
     *
     * @return bool
     */
    public function getSpgr()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->spgr;
    }

    /**
     * Set the shape type.
<<<<<<< HEAD
     */
    public function setSpType(int $value): void
=======
     *
     * @param int $value
     */
    public function setSpType($value): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->spType = $value;
    }

    /**
     * Get the shape type.
<<<<<<< HEAD
     */
    public function getSpType(): int
=======
     *
     * @return int
     */
    public function getSpType()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->spType;
    }

    /**
     * Set the shape flag.
<<<<<<< HEAD
     */
    public function setSpFlag(int $value): void
=======
     *
     * @param int $value
     */
    public function setSpFlag($value): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->spFlag = $value;
    }

    /**
     * Get the shape flag.
<<<<<<< HEAD
     */
    public function getSpFlag(): int
=======
     *
     * @return int
     */
    public function getSpFlag()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->spFlag;
    }

    /**
     * Set the shape index.
<<<<<<< HEAD
     */
    public function setSpId(int $value): void
=======
     *
     * @param int $value
     */
    public function setSpId($value): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->spId = $value;
    }

    /**
     * Get the shape index.
<<<<<<< HEAD
     */
    public function getSpId(): int
=======
     *
     * @return int
     */
    public function getSpId()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->spId;
    }

    /**
     * Set an option for the Shape Group Container.
     *
     * @param int $property The number specifies the option
<<<<<<< HEAD
     */
    public function setOPT(int $property, mixed $value): void
=======
     * @param mixed $value
     */
    public function setOPT($property, $value): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->OPT[$property] = $value;
    }

    /**
     * Get an option for the Shape Group Container.
     *
     * @param int $property The number specifies the option
<<<<<<< HEAD
     */
    public function getOPT(int $property): mixed
=======
     *
     * @return mixed
     */
    public function getOPT($property)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (isset($this->OPT[$property])) {
            return $this->OPT[$property];
        }

        return null;
    }

    /**
     * Get the collection of options.
<<<<<<< HEAD
     */
    public function getOPTCollection(): array
=======
     *
     * @return array
     */
    public function getOPTCollection()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->OPT;
    }

    /**
     * Set cell coordinates of upper-left corner of shape.
     *
     * @param string $value eg: 'A1'
     */
<<<<<<< HEAD
    public function setStartCoordinates(string $value): void
=======
    public function setStartCoordinates($value): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->startCoordinates = $value;
    }

    /**
     * Get cell coordinates of upper-left corner of shape.
<<<<<<< HEAD
     */
    public function getStartCoordinates(): string
=======
     *
     * @return string
     */
    public function getStartCoordinates()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->startCoordinates;
    }

    /**
     * Set offset in x-direction of upper-left corner of shape measured in 1/1024 of column width.
<<<<<<< HEAD
     */
    public function setStartOffsetX(int|float $startOffsetX): void
=======
     *
     * @param int $startOffsetX
     */
    public function setStartOffsetX($startOffsetX): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->startOffsetX = $startOffsetX;
    }

    /**
     * Get offset in x-direction of upper-left corner of shape measured in 1/1024 of column width.
<<<<<<< HEAD
     */
    public function getStartOffsetX(): int|float
=======
     *
     * @return int
     */
    public function getStartOffsetX()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->startOffsetX;
    }

    /**
     * Set offset in y-direction of upper-left corner of shape measured in 1/256 of row height.
<<<<<<< HEAD
     */
    public function setStartOffsetY(int|float $startOffsetY): void
=======
     *
     * @param int $startOffsetY
     */
    public function setStartOffsetY($startOffsetY): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->startOffsetY = $startOffsetY;
    }

    /**
     * Get offset in y-direction of upper-left corner of shape measured in 1/256 of row height.
<<<<<<< HEAD
     */
    public function getStartOffsetY(): int|float
=======
     *
     * @return int
     */
    public function getStartOffsetY()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->startOffsetY;
    }

    /**
     * Set cell coordinates of bottom-right corner of shape.
     *
     * @param string $value eg: 'A1'
     */
<<<<<<< HEAD
    public function setEndCoordinates(string $value): void
=======
    public function setEndCoordinates($value): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->endCoordinates = $value;
    }

    /**
     * Get cell coordinates of bottom-right corner of shape.
<<<<<<< HEAD
     */
    public function getEndCoordinates(): string
=======
     *
     * @return string
     */
    public function getEndCoordinates()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->endCoordinates;
    }

    /**
     * Set offset in x-direction of bottom-right corner of shape measured in 1/1024 of column width.
<<<<<<< HEAD
     */
    public function setEndOffsetX(int|float $endOffsetX): void
=======
     *
     * @param int $endOffsetX
     */
    public function setEndOffsetX($endOffsetX): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->endOffsetX = $endOffsetX;
    }

    /**
     * Get offset in x-direction of bottom-right corner of shape measured in 1/1024 of column width.
<<<<<<< HEAD
     */
    public function getEndOffsetX(): int|float
=======
     *
     * @return int
     */
    public function getEndOffsetX()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->endOffsetX;
    }

    /**
     * Set offset in y-direction of bottom-right corner of shape measured in 1/256 of row height.
<<<<<<< HEAD
     */
    public function setEndOffsetY(int|float $endOffsetY): void
=======
     *
     * @param int $endOffsetY
     */
    public function setEndOffsetY($endOffsetY): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->endOffsetY = $endOffsetY;
    }

    /**
     * Get offset in y-direction of bottom-right corner of shape measured in 1/256 of row height.
<<<<<<< HEAD
     */
    public function getEndOffsetY(): int|float
=======
     *
     * @return int
     */
    public function getEndOffsetY()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->endOffsetY;
    }

    /**
     * Get the nesting level of this spContainer. This is the number of spgrContainers between this spContainer and
     * the dgContainer. A value of 1 = immediately within first spgrContainer
     * Higher nesting level occurs if and only if spContainer is part of a shape group.
     *
     * @return int Nesting level
     */
<<<<<<< HEAD
    public function getNestingLevel(): int
=======
    public function getNestingLevel()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $nestingLevel = 0;

        $parent = $this->getParent();
        while ($parent instanceof SpgrContainer) {
            ++$nestingLevel;
            $parent = $parent->getParent();
        }

        return $nestingLevel;
    }
}
