<?php

namespace PhpOffice\PhpSpreadsheet\Shared;

class Escher
{
    /**
     * Drawing Group Container.
<<<<<<< HEAD
     */
    private ?Escher\DggContainer $dggContainer = null;

    /**
     * Drawing Container.
     */
    private ?Escher\DgContainer $dgContainer = null;

    /**
     * Get Drawing Group Container.
     */
    public function getDggContainer(): ?Escher\DggContainer
=======
     *
     * @var ?Escher\DggContainer
     */
    private $dggContainer;

    /**
     * Drawing Container.
     *
     * @var ?Escher\DgContainer
     */
    private $dgContainer;

    /**
     * Get Drawing Group Container.
     *
     * @return ?Escher\DggContainer
     */
    public function getDggContainer()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->dggContainer;
    }

    /**
     * Set Drawing Group Container.
<<<<<<< HEAD
     */
    public function setDggContainer(Escher\DggContainer $dggContainer): Escher\DggContainer
=======
     *
     * @param Escher\DggContainer $dggContainer
     *
     * @return Escher\DggContainer
     */
    public function setDggContainer($dggContainer)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->dggContainer = $dggContainer;
    }

    /**
     * Get Drawing Container.
<<<<<<< HEAD
     */
    public function getDgContainer(): ?Escher\DgContainer
=======
     *
     * @return ?Escher\DgContainer
     */
    public function getDgContainer()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->dgContainer;
    }

    /**
     * Set Drawing Container.
<<<<<<< HEAD
     */
    public function setDgContainer(Escher\DgContainer $dgContainer): Escher\DgContainer
=======
     *
     * @param Escher\DgContainer $dgContainer
     *
     * @return Escher\DgContainer
     */
    public function setDgContainer($dgContainer)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->dgContainer = $dgContainer;
    }
}
