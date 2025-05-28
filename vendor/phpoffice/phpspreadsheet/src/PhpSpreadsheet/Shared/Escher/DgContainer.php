<?php

namespace PhpOffice\PhpSpreadsheet\Shared\Escher;

use PhpOffice\PhpSpreadsheet\Exception as SpreadsheetException;
<<<<<<< HEAD
use PhpOffice\PhpSpreadsheet\Shared\Escher\DgContainer\SpgrContainer;
=======
>>>>>>> 50f5a6f (Initial commit from local project)

class DgContainer
{
    /**
     * Drawing index, 1-based.
<<<<<<< HEAD
     */
    private ?int $dgId = null;

    /**
     * Last shape index in this drawing.
     */
    private ?int $lastSpId = null;

    private ?SpgrContainer $spgrContainer = null;
=======
     *
     * @var ?int
     */
    private $dgId;

    /**
     * Last shape index in this drawing.
     *
     * @var ?int
     */
    private $lastSpId;

    /** @var ?DgContainer\SpgrContainer */
    private $spgrContainer;
>>>>>>> 50f5a6f (Initial commit from local project)

    public function getDgId(): ?int
    {
        return $this->dgId;
    }

    public function setDgId(int $value): void
    {
        $this->dgId = $value;
    }

    public function getLastSpId(): ?int
    {
        return $this->lastSpId;
    }

    public function setLastSpId(int $value): void
    {
        $this->lastSpId = $value;
    }

<<<<<<< HEAD
    public function getSpgrContainer(): ?SpgrContainer
=======
    public function getSpgrContainer(): ?DgContainer\SpgrContainer
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->spgrContainer;
    }

<<<<<<< HEAD
    public function getSpgrContainerOrThrow(): SpgrContainer
=======
    public function getSpgrContainerOrThrow(): DgContainer\SpgrContainer
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($this->spgrContainer !== null) {
            return $this->spgrContainer;
        }

        throw new SpreadsheetException('spgrContainer is unexpectedly null');
    }

<<<<<<< HEAD
    public function setSpgrContainer(SpgrContainer $spgrContainer): SpgrContainer
=======
    /** @param DgContainer\SpgrContainer $spgrContainer */
    public function setSpgrContainer($spgrContainer): DgContainer\SpgrContainer
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->spgrContainer = $spgrContainer;
    }
}
