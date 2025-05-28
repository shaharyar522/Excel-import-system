<?php

namespace PhpOffice\PhpSpreadsheet\Shared\Escher;

class DggContainer
{
    /**
     * Maximum shape index of all shapes in all drawings increased by one.
<<<<<<< HEAD
     */
    private int $spIdMax;

    /**
     * Total number of drawings saved.
     */
    private int $cDgSaved;

    /**
     * Total number of shapes saved (including group shapes).
     */
    private int $cSpSaved;

    /**
     * BLIP Store Container.
     */
    private ?DggContainer\BstoreContainer $bstoreContainer = null;

    /**
     * Array of options for the drawing group.
     */
    private array $OPT = [];

    /**
     * Array of identifier clusters containg information about the maximum shape identifiers.
     */
    private array $IDCLs = [];

    /**
     * Get maximum shape index of all shapes in all drawings (plus one).
     */
    public function getSpIdMax(): int
=======
     *
     * @var int
     */
    private $spIdMax;

    /**
     * Total number of drawings saved.
     *
     * @var int
     */
    private $cDgSaved;

    /**
     * Total number of shapes saved (including group shapes).
     *
     * @var int
     */
    private $cSpSaved;

    /**
     * BLIP Store Container.
     *
     * @var ?DggContainer\BstoreContainer
     */
    private $bstoreContainer;

    /**
     * Array of options for the drawing group.
     *
     * @var array
     */
    private $OPT = [];

    /**
     * Array of identifier clusters containg information about the maximum shape identifiers.
     *
     * @var array
     */
    private $IDCLs = [];

    /**
     * Get maximum shape index of all shapes in all drawings (plus one).
     *
     * @return int
     */
    public function getSpIdMax()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->spIdMax;
    }

    /**
     * Set maximum shape index of all shapes in all drawings (plus one).
<<<<<<< HEAD
     */
    public function setSpIdMax(int $value): void
=======
     *
     * @param int $value
     */
    public function setSpIdMax($value): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->spIdMax = $value;
    }

    /**
     * Get total number of drawings saved.
<<<<<<< HEAD
     */
    public function getCDgSaved(): int
=======
     *
     * @return int
     */
    public function getCDgSaved()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->cDgSaved;
    }

    /**
     * Set total number of drawings saved.
<<<<<<< HEAD
     */
    public function setCDgSaved(int $value): void
=======
     *
     * @param int $value
     */
    public function setCDgSaved($value): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->cDgSaved = $value;
    }

    /**
     * Get total number of shapes saved (including group shapes).
<<<<<<< HEAD
     */
    public function getCSpSaved(): int
=======
     *
     * @return int
     */
    public function getCSpSaved()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->cSpSaved;
    }

    /**
     * Set total number of shapes saved (including group shapes).
<<<<<<< HEAD
     */
    public function setCSpSaved(int $value): void
=======
     *
     * @param int $value
     */
    public function setCSpSaved($value): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->cSpSaved = $value;
    }

    /**
     * Get BLIP Store Container.
<<<<<<< HEAD
     */
    public function getBstoreContainer(): ?DggContainer\BstoreContainer
=======
     *
     * @return ?DggContainer\BstoreContainer
     */
    public function getBstoreContainer()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->bstoreContainer;
    }

    /**
     * Set BLIP Store Container.
<<<<<<< HEAD
     */
    public function setBstoreContainer(DggContainer\BstoreContainer $bstoreContainer): void
=======
     *
     * @param DggContainer\BstoreContainer $bstoreContainer
     */
    public function setBstoreContainer($bstoreContainer): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->bstoreContainer = $bstoreContainer;
    }

    /**
     * Set an option for the drawing group.
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
     * Get an option for the drawing group.
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
     * Get identifier clusters.
<<<<<<< HEAD
     */
    public function getIDCLs(): array
=======
     *
     * @return array
     */
    public function getIDCLs()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->IDCLs;
    }

    /**
     * Set identifier clusters. [<drawingId> => <max shape id>, ...].
<<<<<<< HEAD
     */
    public function setIDCLs(array $IDCLs): void
=======
     *
     * @param array $IDCLs
     */
    public function setIDCLs($IDCLs): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->IDCLs = $IDCLs;
    }
}
