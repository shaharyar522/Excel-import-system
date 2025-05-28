<?php

namespace PhpOffice\PhpSpreadsheet\Style\ConditionalFormatting;

class ConditionalFormatValueObject
{
<<<<<<< HEAD
    private string $type;

    private null|float|int|string $value;

    private ?string $cellFormula;

    public function __construct(string $type, null|float|int|string $value = null, ?string $cellFormula = null)
=======
    /** @var mixed */
    private $type;

    /** @var mixed */
    private $value;

    /** @var mixed */
    private $cellFormula;

    /**
     * ConditionalFormatValueObject constructor.
     *
     * @param mixed $type
     * @param mixed $value
     * @param null|mixed $cellFormula
     */
    public function __construct($type, $value = null, $cellFormula = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->type = $type;
        $this->value = $value;
        $this->cellFormula = $cellFormula;
    }

<<<<<<< HEAD
    public function getType(): string
=======
    /**
     * @return mixed
     */
    public function getType()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->type;
    }

<<<<<<< HEAD
    public function setType(string $type): self
=======
    /**
     * @param mixed $type
     */
    public function setType($type): self
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->type = $type;

        return $this;
    }

<<<<<<< HEAD
    public function getValue(): null|float|int|string
=======
    /**
     * @return mixed
     */
    public function getValue()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->value;
    }

<<<<<<< HEAD
    public function setValue(null|float|int|string $value): self
=======
    /**
     * @param mixed $value
     */
    public function setValue($value): self
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->value = $value;

        return $this;
    }

<<<<<<< HEAD
    public function getCellFormula(): ?string
=======
    /**
     * @return mixed
     */
    public function getCellFormula()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->cellFormula;
    }

<<<<<<< HEAD
    public function setCellFormula(?string $cellFormula): self
=======
    /**
     * @param mixed $cellFormula
     */
    public function setCellFormula($cellFormula): self
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->cellFormula = $cellFormula;

        return $this;
    }
}
