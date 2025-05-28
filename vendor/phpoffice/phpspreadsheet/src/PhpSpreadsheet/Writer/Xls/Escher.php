<?php

namespace PhpOffice\PhpSpreadsheet\Writer\Xls;

use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Shared\Escher as SharedEscher;
use PhpOffice\PhpSpreadsheet\Shared\Escher\DgContainer;
use PhpOffice\PhpSpreadsheet\Shared\Escher\DgContainer\SpgrContainer;
use PhpOffice\PhpSpreadsheet\Shared\Escher\DgContainer\SpgrContainer\SpContainer;
use PhpOffice\PhpSpreadsheet\Shared\Escher\DggContainer;
use PhpOffice\PhpSpreadsheet\Shared\Escher\DggContainer\BstoreContainer;
use PhpOffice\PhpSpreadsheet\Shared\Escher\DggContainer\BstoreContainer\BSE;
use PhpOffice\PhpSpreadsheet\Shared\Escher\DggContainer\BstoreContainer\BSE\Blip;

class Escher
{
    /**
     * The object we are writing.
<<<<<<< HEAD
     */
    private Blip|BSE|BstoreContainer|DgContainer|DggContainer|Escher|SpContainer|SpgrContainer|SharedEscher $object;

    /**
     * The written binary data.
     */
    private string $data;

    /**
     * Shape offsets. Positions in binary stream where a new shape record begins.
     */
    private array $spOffsets;

    /**
     * Shape types.
     */
    private array $spTypes;

    /**
     * Constructor.
     */
    public function __construct(Blip|BSE|BstoreContainer|DgContainer|DggContainer|self|SpContainer|SpgrContainer|SharedEscher $object)
=======
     *
     * @var Blip|BSE|BstoreContainer|DgContainer|DggContainer|Escher|SpContainer|SpgrContainer
     */
    private $object;

    /**
     * The written binary data.
     *
     * @var string
     */
    private $data;

    /**
     * Shape offsets. Positions in binary stream where a new shape record begins.
     *
     * @var array
     */
    private $spOffsets;

    /**
     * Shape types.
     *
     * @var array
     */
    private $spTypes;

    /**
     * Constructor.
     *
     * @param mixed $object
     */
    public function __construct($object)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->object = $object;
    }

    /**
     * Process the object to be written.
<<<<<<< HEAD
     */
    public function close(): string
=======
     *
     * @return string
     */
    public function close()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // initialize
        $this->data = '';

<<<<<<< HEAD
        switch ($this->object::class) {
            case SharedEscher::class:
                if ($dggContainer = $this->object->getDggContainer()) {
                    $writer = new self($dggContainer);
                    $this->data = $writer->close();
                } elseif ($dgContainer = $this->object->getDgContainer()) {
=======
        switch (get_class($this->object)) {
            case SharedEscher::class:
                if ($dggContainer = $this->object->/** @scrutinizer ignore-call */ getDggContainer()) {
                    $writer = new self($dggContainer);
                    $this->data = $writer->close();
                } elseif ($dgContainer = $this->object->/** @scrutinizer ignore-call */ getDgContainer()) {
>>>>>>> 50f5a6f (Initial commit from local project)
                    $writer = new self($dgContainer);
                    $this->data = $writer->close();
                    $this->spOffsets = $writer->getSpOffsets();
                    $this->spTypes = $writer->getSpTypes();
                }

                break;
            case DggContainer::class:
                // this is a container record

                // initialize
                $innerData = '';

                // write the dgg
                $recVer = 0x0;
                $recInstance = 0x0000;
                $recType = 0xF006;

                $recVerInstance = $recVer;
                $recVerInstance |= $recInstance << 4;

                // dgg data
<<<<<<< HEAD
                $dggData
                    = pack(
                        'VVVV',
                        $this->object->getSpIdMax(), // maximum shape identifier increased by one
                        $this->object->getCDgSaved() + 1, // number of file identifier clusters increased by one
                        $this->object->getCSpSaved(),
                        $this->object->getCDgSaved() // count total number of drawings saved
                    );

                // add file identifier clusters (one per drawing)
=======
                $dggData =
                    pack(
                        'VVVV',
                        $this->object->/** @scrutinizer ignore-call */ getSpIdMax(), // maximum shape identifier increased by one
                        $this->object->/** @scrutinizer ignore-call */ getCDgSaved() + 1, // number of file identifier clusters increased by one
                        $this->object->/** @scrutinizer ignore-call */ getCSpSaved(),
                        $this->object->/** @scrutinizer ignore-call */ getCDgSaved() // count total number of drawings saved
                    );

                // add file identifier clusters (one per drawing)
                /** @scrutinizer ignore-call */
>>>>>>> 50f5a6f (Initial commit from local project)
                $IDCLs = $this->object->getIDCLs();

                foreach ($IDCLs as $dgId => $maxReducedSpId) {
                    $dggData .= pack('VV', $dgId, $maxReducedSpId + 1);
                }

                $header = pack('vvV', $recVerInstance, $recType, strlen($dggData));
                $innerData .= $header . $dggData;

                // write the bstoreContainer
<<<<<<< HEAD
                if ($bstoreContainer = $this->object->getBstoreContainer()) {
=======
                if ($bstoreContainer = $this->object->/** @scrutinizer ignore-call */ getBstoreContainer()) {
>>>>>>> 50f5a6f (Initial commit from local project)
                    $writer = new self($bstoreContainer);
                    $innerData .= $writer->close();
                }

                // write the record
                $recVer = 0xF;
                $recInstance = 0x0000;
                $recType = 0xF000;
                $length = strlen($innerData);

                $recVerInstance = $recVer;
                $recVerInstance |= $recInstance << 4;

                $header = pack('vvV', $recVerInstance, $recType, $length);

                $this->data = $header . $innerData;

                break;
            case BstoreContainer::class:
                // this is a container record

                // initialize
                $innerData = '';

                // treat the inner data
<<<<<<< HEAD
                if ($BSECollection = $this->object->getBSECollection()) {
=======
                if ($BSECollection = $this->object->/** @scrutinizer ignore-call */ getBSECollection()) {
>>>>>>> 50f5a6f (Initial commit from local project)
                    foreach ($BSECollection as $BSE) {
                        $writer = new self($BSE);
                        $innerData .= $writer->close();
                    }
                }

                // write the record
                $recVer = 0xF;
<<<<<<< HEAD
                $recInstance = count($this->object->getBSECollection());
=======
                $recInstance = count($this->object->/** @scrutinizer ignore-call */ getBSECollection());
>>>>>>> 50f5a6f (Initial commit from local project)
                $recType = 0xF001;
                $length = strlen($innerData);

                $recVerInstance = $recVer;
                $recVerInstance |= $recInstance << 4;

                $header = pack('vvV', $recVerInstance, $recType, $length);

                $this->data = $header . $innerData;

                break;
            case BSE::class:
                // this is a semi-container record

                // initialize
                $innerData = '';

                // here we treat the inner data
<<<<<<< HEAD
                if ($blip = $this->object->getBlip()) {
=======
                if ($blip = $this->object->/** @scrutinizer ignore-call */ getBlip()) {
>>>>>>> 50f5a6f (Initial commit from local project)
                    $writer = new self($blip);
                    $innerData .= $writer->close();
                }

                // initialize
                $data = '';

<<<<<<< HEAD
                $btWin32 = $this->object->getBlipType();
=======
                /** @scrutinizer ignore-call */
                $btWin32 = $this->object->getBlipType();
                /** @scrutinizer ignore-call */
>>>>>>> 50f5a6f (Initial commit from local project)
                $btMacOS = $this->object->getBlipType();
                $data .= pack('CC', $btWin32, $btMacOS);

                $rgbUid = pack('VVVV', 0, 0, 0, 0); // todo
                $data .= $rgbUid;

                $tag = 0;
                $size = strlen($innerData);
                $cRef = 1;
                $foDelay = 0; //todo
                $unused1 = 0x0;
                $cbName = 0x0;
                $unused2 = 0x0;
                $unused3 = 0x0;
                $data .= pack('vVVVCCCC', $tag, $size, $cRef, $foDelay, $unused1, $cbName, $unused2, $unused3);

                $data .= $innerData;

                // write the record
                $recVer = 0x2;
<<<<<<< HEAD
=======
                /** @scrutinizer ignore-call */
>>>>>>> 50f5a6f (Initial commit from local project)
                $recInstance = $this->object->getBlipType();
                $recType = 0xF007;
                $length = strlen($data);

                $recVerInstance = $recVer;
                $recVerInstance |= $recInstance << 4;

                $header = pack('vvV', $recVerInstance, $recType, $length);

                $this->data = $header;

                $this->data .= $data;

                break;
            case Blip::class:
                // this is an atom record

                // write the record
<<<<<<< HEAD
                switch ($this->object->getParent()->getBlipType()) {
=======
                switch ($this->object->/** @scrutinizer ignore-call */ getParent()->/** @scrutinizer ignore-call */ getBlipType()) {
>>>>>>> 50f5a6f (Initial commit from local project)
                    case BSE::BLIPTYPE_JPEG:
                        // initialize
                        $innerData = '';

                        $rgbUid1 = pack('VVVV', 0, 0, 0, 0); // todo
                        $innerData .= $rgbUid1;

                        $tag = 0xFF; // todo
                        $innerData .= pack('C', $tag);

<<<<<<< HEAD
                        $innerData .= $this->object->getData();
=======
                        $innerData .= $this->object->/** @scrutinizer ignore-call */ getData();
>>>>>>> 50f5a6f (Initial commit from local project)

                        $recVer = 0x0;
                        $recInstance = 0x46A;
                        $recType = 0xF01D;
                        $length = strlen($innerData);

                        $recVerInstance = $recVer;
                        $recVerInstance |= $recInstance << 4;

                        $header = pack('vvV', $recVerInstance, $recType, $length);

                        $this->data = $header;

                        $this->data .= $innerData;

                        break;
                    case BSE::BLIPTYPE_PNG:
                        // initialize
                        $innerData = '';

                        $rgbUid1 = pack('VVVV', 0, 0, 0, 0); // todo
                        $innerData .= $rgbUid1;

                        $tag = 0xFF; // todo
                        $innerData .= pack('C', $tag);

<<<<<<< HEAD
                        $innerData .= $this->object->getData();
=======
                        $innerData .= $this->object->/** @scrutinizer ignore-call */ getData();
>>>>>>> 50f5a6f (Initial commit from local project)

                        $recVer = 0x0;
                        $recInstance = 0x6E0;
                        $recType = 0xF01E;
                        $length = strlen($innerData);

                        $recVerInstance = $recVer;
                        $recVerInstance |= $recInstance << 4;

                        $header = pack('vvV', $recVerInstance, $recType, $length);

                        $this->data = $header;

                        $this->data .= $innerData;

                        break;
                }

                break;
            case DgContainer::class:
                // this is a container record

                // initialize
                $innerData = '';

                // write the dg
                $recVer = 0x0;
<<<<<<< HEAD
=======
                /** @scrutinizer ignore-call */
>>>>>>> 50f5a6f (Initial commit from local project)
                $recInstance = $this->object->getDgId();
                $recType = 0xF008;
                $length = 8;

                $recVerInstance = $recVer;
                $recVerInstance |= $recInstance << 4;

                $header = pack('vvV', $recVerInstance, $recType, $length);

                // number of shapes in this drawing (including group shape)
<<<<<<< HEAD
                $countShapes = count($this->object->getSpgrContainerOrThrow()->getChildren());
                $innerData .= $header . pack('VV', $countShapes, $this->object->getLastSpId());

                // write the spgrContainer
                if ($spgrContainer = $this->object->getSpgrContainer()) {
=======
                $countShapes = count($this->object->/** @scrutinizer ignore-call */ getSpgrContainerOrThrow()->getChildren());
                $innerData .= $header . pack('VV', $countShapes, $this->object->/** @scrutinizer ignore-call */ getLastSpId());

                // write the spgrContainer
                if ($spgrContainer = $this->object->/** @scrutinizer ignore-call */ getSpgrContainer()) {
>>>>>>> 50f5a6f (Initial commit from local project)
                    $writer = new self($spgrContainer);
                    $innerData .= $writer->close();

                    // get the shape offsets relative to the spgrContainer record
                    $spOffsets = $writer->getSpOffsets();
                    $spTypes = $writer->getSpTypes();

                    // save the shape offsets relative to dgContainer
                    foreach ($spOffsets as &$spOffset) {
                        $spOffset += 24; // add length of dgContainer header data (8 bytes) plus dg data (16 bytes)
                    }

                    $this->spOffsets = $spOffsets;
                    $this->spTypes = $spTypes;
                }

                // write the record
                $recVer = 0xF;
                $recInstance = 0x0000;
                $recType = 0xF002;
                $length = strlen($innerData);

                $recVerInstance = $recVer;
                $recVerInstance |= $recInstance << 4;

                $header = pack('vvV', $recVerInstance, $recType, $length);

                $this->data = $header . $innerData;

                break;
            case SpgrContainer::class:
                // this is a container record

                // initialize
                $innerData = '';

                // initialize spape offsets
                $totalSize = 8;
                $spOffsets = [];
                $spTypes = [];

                // treat the inner data
<<<<<<< HEAD
                foreach ($this->object->getChildren() as $spContainer) {
=======
                foreach ($this->object->/** @scrutinizer ignore-call */ getChildren() as $spContainer) {
>>>>>>> 50f5a6f (Initial commit from local project)
                    $writer = new self($spContainer);
                    $spData = $writer->close();
                    $innerData .= $spData;

                    // save the shape offsets (where new shape records begin)
                    $totalSize += strlen($spData);
                    $spOffsets[] = $totalSize;

                    $spTypes = array_merge($spTypes, $writer->getSpTypes());
                }

                // write the record
                $recVer = 0xF;
                $recInstance = 0x0000;
                $recType = 0xF003;
                $length = strlen($innerData);

                $recVerInstance = $recVer;
                $recVerInstance |= $recInstance << 4;

                $header = pack('vvV', $recVerInstance, $recType, $length);

                $this->data = $header . $innerData;
                $this->spOffsets = $spOffsets;
                $this->spTypes = $spTypes;

                break;
            case SpContainer::class:
                // initialize
                $data = '';

                // build the data

                // write group shape record, if necessary?
<<<<<<< HEAD
                if ($this->object->getSpgr()) {
=======
                if ($this->object->/** @scrutinizer ignore-call */ getSpgr()) {
>>>>>>> 50f5a6f (Initial commit from local project)
                    $recVer = 0x1;
                    $recInstance = 0x0000;
                    $recType = 0xF009;
                    $length = 0x00000010;

                    $recVerInstance = $recVer;
                    $recVerInstance |= $recInstance << 4;

                    $header = pack('vvV', $recVerInstance, $recType, $length);

                    $data .= $header . pack('VVVV', 0, 0, 0, 0);
                }
<<<<<<< HEAD
=======
                /** @scrutinizer ignore-call */
>>>>>>> 50f5a6f (Initial commit from local project)
                $this->spTypes[] = ($this->object->getSpType());

                // write the shape record
                $recVer = 0x2;
<<<<<<< HEAD
=======
                /** @scrutinizer ignore-call */
>>>>>>> 50f5a6f (Initial commit from local project)
                $recInstance = $this->object->getSpType(); // shape type
                $recType = 0xF00A;
                $length = 0x00000008;

                $recVerInstance = $recVer;
                $recVerInstance |= $recInstance << 4;

                $header = pack('vvV', $recVerInstance, $recType, $length);

<<<<<<< HEAD
                $data .= $header . pack('VV', $this->object->getSpId(), $this->object->getSpgr() ? 0x0005 : 0x0A00);

                // the options
                if ($this->object->getOPTCollection()) {
                    $optData = '';

                    $recVer = 0x3;
                    $recInstance = count($this->object->getOPTCollection());
                    $recType = 0xF00B;
                    foreach ($this->object->getOPTCollection() as $property => $value) {
=======
                $data .= $header . pack('VV', $this->object->/** @scrutinizer ignore-call */ getSpId(), $this->object->/** @scrutinizer ignore-call */ getSpgr() ? 0x0005 : 0x0A00);

                // the options
                if ($this->object->/** @scrutinizer ignore-call */ getOPTCollection()) {
                    $optData = '';

                    $recVer = 0x3;
                    $recInstance = count($this->object->/** @scrutinizer ignore-call */ getOPTCollection());
                    $recType = 0xF00B;
                    foreach ($this->object->/** @scrutinizer ignore-call */ getOPTCollection() as $property => $value) {
>>>>>>> 50f5a6f (Initial commit from local project)
                        $optData .= pack('vV', $property, $value);
                    }
                    $length = strlen($optData);

                    $recVerInstance = $recVer;
                    $recVerInstance |= $recInstance << 4;

                    $header = pack('vvV', $recVerInstance, $recType, $length);
                    $data .= $header . $optData;
                }

                // the client anchor
<<<<<<< HEAD
                if ($this->object->getStartCoordinates()) {
=======
                if ($this->object->/** @scrutinizer ignore-call */ getStartCoordinates()) {
>>>>>>> 50f5a6f (Initial commit from local project)
                    $recVer = 0x0;
                    $recInstance = 0x0;
                    $recType = 0xF010;

                    // start coordinates
<<<<<<< HEAD
                    [$column, $row] = Coordinate::indexesFromString($this->object->getStartCoordinates());
=======
                    [$column, $row] = Coordinate::indexesFromString($this->object->/** @scrutinizer ignore-call */ getStartCoordinates());
>>>>>>> 50f5a6f (Initial commit from local project)
                    $c1 = $column - 1;
                    $r1 = $row - 1;

                    // start offsetX
<<<<<<< HEAD
                    $startOffsetX = $this->object->getStartOffsetX();

                    // start offsetY
                    $startOffsetY = $this->object->getStartOffsetY();

                    // end coordinates
                    [$column, $row] = Coordinate::indexesFromString($this->object->getEndCoordinates());
=======
                    /** @scrutinizer ignore-call */
                    $startOffsetX = $this->object->getStartOffsetX();

                    // start offsetY
                    /** @scrutinizer ignore-call */
                    $startOffsetY = $this->object->getStartOffsetY();

                    // end coordinates
                    [$column, $row] = Coordinate::indexesFromString($this->object->/** @scrutinizer ignore-call */ getEndCoordinates());
>>>>>>> 50f5a6f (Initial commit from local project)
                    $c2 = $column - 1;
                    $r2 = $row - 1;

                    // end offsetX
<<<<<<< HEAD
                    $endOffsetX = $this->object->getEndOffsetX();

                    // end offsetY
                    $endOffsetY = $this->object->getEndOffsetY();

                    $clientAnchorData = pack('vvvvvvvvv', $this->object->getSpFlag(), $c1, $startOffsetX, $r1, $startOffsetY, $c2, $endOffsetX, $r2, $endOffsetY);
=======
                    /** @scrutinizer ignore-call */
                    $endOffsetX = $this->object->getEndOffsetX();

                    // end offsetY
                    /** @scrutinizer ignore-call */
                    $endOffsetY = $this->object->getEndOffsetY();

                    $clientAnchorData = pack('vvvvvvvvv', $this->object->/** @scrutinizer ignore-call */ getSpFlag(), $c1, $startOffsetX, $r1, $startOffsetY, $c2, $endOffsetX, $r2, $endOffsetY);
>>>>>>> 50f5a6f (Initial commit from local project)

                    $length = strlen($clientAnchorData);

                    $recVerInstance = $recVer;
                    $recVerInstance |= $recInstance << 4;

                    $header = pack('vvV', $recVerInstance, $recType, $length);
                    $data .= $header . $clientAnchorData;
                }

                // the client data, just empty for now
<<<<<<< HEAD
                if (!$this->object->getSpgr()) {
=======
                if (!$this->object->/** @scrutinizer ignore-call */ getSpgr()) {
>>>>>>> 50f5a6f (Initial commit from local project)
                    $clientDataData = '';

                    $recVer = 0x0;
                    $recInstance = 0x0;
                    $recType = 0xF011;

                    $length = strlen($clientDataData);

                    $recVerInstance = $recVer;
                    $recVerInstance |= $recInstance << 4;

                    $header = pack('vvV', $recVerInstance, $recType, $length);
                    $data .= $header . $clientDataData;
                }

                // write the record
                $recVer = 0xF;
                $recInstance = 0x0000;
                $recType = 0xF004;
                $length = strlen($data);

                $recVerInstance = $recVer;
                $recVerInstance |= $recInstance << 4;

                $header = pack('vvV', $recVerInstance, $recType, $length);

                $this->data = $header . $data;

                break;
        }

        return $this->data;
    }

    /**
     * Gets the shape offsets.
<<<<<<< HEAD
     */
    public function getSpOffsets(): array
=======
     *
     * @return array
     */
    public function getSpOffsets()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->spOffsets;
    }

    /**
     * Gets the shape types.
<<<<<<< HEAD
     */
    public function getSpTypes(): array
=======
     *
     * @return array
     */
    public function getSpTypes()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->spTypes;
    }
}
