<?php

namespace PhpOffice\PhpSpreadsheet\Shared\Escher\DgContainer;

class SpgrContainer
{
    /**
     * Parent Shape Group Container.
<<<<<<< HEAD
     */
    private ?self $parent = null;

    /**
     * Shape Container collection.
     */
    private array $children = [];
=======
     *
     * @var null|SpgrContainer
     */
    private $parent;

    /**
     * Shape Container collection.
     *
     * @var array
     */
    private $children = [];
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Set parent Shape Group Container.
     */
    public function setParent(?self $parent): void
    {
        $this->parent = $parent;
    }

    /**
     * Get the parent Shape Group Container if any.
     */
    public function getParent(): ?self
    {
        return $this->parent;
    }

    /**
     * Add a child. This will be either spgrContainer or spContainer.
     *
<<<<<<< HEAD
     * @param SpgrContainer|SpgrContainer\SpContainer $child child to be added
     */
    public function addChild(mixed $child): void
=======
     * @param mixed $child
     */
    public function addChild($child): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->children[] = $child;
        $child->setParent($this);
    }

    /**
     * Get collection of Shape Containers.
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     * Recursively get all spContainers within this spgrContainer.
     *
     * @return SpgrContainer\SpContainer[]
     */
<<<<<<< HEAD
    public function getAllSpContainers(): array
=======
    public function getAllSpContainers()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $allSpContainers = [];

        foreach ($this->children as $child) {
            if ($child instanceof self) {
                $allSpContainers = array_merge($allSpContainers, $child->getAllSpContainers());
            } else {
                $allSpContainers[] = $child;
            }
        }

        return $allSpContainers;
    }
}
