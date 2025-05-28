<?php

namespace PhpOffice\PhpSpreadsheet\Shared\Escher\DggContainer;

class BstoreContainer
{
    /**
     * BLIP Store Entries. Each of them holds one BLIP (Big Large Image or Picture).
     *
     * @var BstoreContainer\BSE[]
     */
<<<<<<< HEAD
    private array $BSECollection = [];
=======
    private $BSECollection = [];
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Add a BLIP Store Entry.
     */
    public function addBSE(BstoreContainer\BSE $BSE): void
    {
        $this->BSECollection[] = $BSE;
        $BSE->setParent($this);
    }

    /**
     * Get the collection of BLIP Store Entries.
     *
     * @return BstoreContainer\BSE[]
     */
<<<<<<< HEAD
    public function getBSECollection(): array
=======
    public function getBSECollection()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->BSECollection;
    }
}
