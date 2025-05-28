<?php

namespace PhpOffice\PhpSpreadsheet\Style\ConditionalFormatting;

class ConditionalDataBarExtension
{
    /** <dataBar> attributes */
<<<<<<< HEAD
    private int $minLength;

    private int $maxLength;

    private ?bool $border = null;

    private ?bool $gradient = null;

    private ?string $direction = null;

    private ?bool $negativeBarBorderColorSameAsPositive = null;

    private ?string $axisPosition = null;

    // <dataBar> children

    private ConditionalFormatValueObject $maximumConditionalFormatValueObject;

    private ConditionalFormatValueObject $minimumConditionalFormatValueObject;

    private ?string $borderColor = null;

    private ?string $negativeFillColor = null;

    private ?string $negativeBorderColor = null;

    private array $axisColor = [
=======

    /** @var int */
    private $minLength;

    /** @var int */
    private $maxLength;

    /** @var null|bool */
    private $border;

    /** @var null|bool */
    private $gradient;

    /** @var string */
    private $direction;

    /** @var null|bool */
    private $negativeBarBorderColorSameAsPositive;

    /** @var string */
    private $axisPosition;

    // <dataBar> children

    /** @var ConditionalFormatValueObject */
    private $maximumConditionalFormatValueObject;

    /** @var ConditionalFormatValueObject */
    private $minimumConditionalFormatValueObject;

    /** @var string */
    private $borderColor;

    /** @var string */
    private $negativeFillColor;

    /** @var string */
    private $negativeBorderColor;

    /** @var array */
    private $axisColor = [
>>>>>>> 50f5a6f (Initial commit from local project)
        'rgb' => null,
        'theme' => null,
        'tint' => null,
    ];

    public function getXmlAttributes(): array
    {
        $ret = [];
        foreach (['minLength', 'maxLength', 'direction', 'axisPosition'] as $attrKey) {
            if (null !== $this->{$attrKey}) {
                $ret[$attrKey] = $this->{$attrKey};
            }
        }
        foreach (['border', 'gradient', 'negativeBarBorderColorSameAsPositive'] as $attrKey) {
            if (null !== $this->{$attrKey}) {
                $ret[$attrKey] = $this->{$attrKey} ? '1' : '0';
            }
        }

        return $ret;
    }

    public function getXmlElements(): array
    {
        $ret = [];
        $elms = ['borderColor', 'negativeFillColor', 'negativeBorderColor'];
        foreach ($elms as $elmKey) {
            if (null !== $this->{$elmKey}) {
                $ret[$elmKey] = ['rgb' => $this->{$elmKey}];
            }
        }
        foreach (array_filter($this->axisColor) as $attrKey => $axisColorAttr) {
            if (!isset($ret['axisColor'])) {
                $ret['axisColor'] = [];
            }
            $ret['axisColor'][$attrKey] = $axisColorAttr;
        }

        return $ret;
    }

<<<<<<< HEAD
    public function getMinLength(): int
=======
    /**
     * @return int
     */
    public function getMinLength()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->minLength;
    }

    public function setMinLength(int $minLength): self
    {
        $this->minLength = $minLength;

        return $this;
    }

<<<<<<< HEAD
    public function getMaxLength(): int
=======
    /**
     * @return int
     */
    public function getMaxLength()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->maxLength;
    }

    public function setMaxLength(int $maxLength): self
    {
        $this->maxLength = $maxLength;

        return $this;
    }

<<<<<<< HEAD
    public function getBorder(): ?bool
=======
    /**
     * @return null|bool
     */
    public function getBorder()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->border;
    }

    public function setBorder(bool $border): self
    {
        $this->border = $border;

        return $this;
    }

<<<<<<< HEAD
    public function getGradient(): ?bool
=======
    /**
     * @return null|bool
     */
    public function getGradient()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->gradient;
    }

    public function setGradient(bool $gradient): self
    {
        $this->gradient = $gradient;

        return $this;
    }

<<<<<<< HEAD
    public function getDirection(): ?string
=======
    /**
     * @return string
     */
    public function getDirection()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->direction;
    }

    public function setDirection(string $direction): self
    {
        $this->direction = $direction;

        return $this;
    }

<<<<<<< HEAD
    public function getNegativeBarBorderColorSameAsPositive(): ?bool
=======
    /**
     * @return null|bool
     */
    public function getNegativeBarBorderColorSameAsPositive()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->negativeBarBorderColorSameAsPositive;
    }

    public function setNegativeBarBorderColorSameAsPositive(bool $negativeBarBorderColorSameAsPositive): self
    {
        $this->negativeBarBorderColorSameAsPositive = $negativeBarBorderColorSameAsPositive;

        return $this;
    }

<<<<<<< HEAD
    public function getAxisPosition(): ?string
=======
    /**
     * @return string
     */
    public function getAxisPosition()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->axisPosition;
    }

    public function setAxisPosition(string $axisPosition): self
    {
        $this->axisPosition = $axisPosition;

        return $this;
    }

<<<<<<< HEAD
    public function getMaximumConditionalFormatValueObject(): ConditionalFormatValueObject
=======
    /**
     * @return ConditionalFormatValueObject
     */
    public function getMaximumConditionalFormatValueObject()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->maximumConditionalFormatValueObject;
    }

    public function setMaximumConditionalFormatValueObject(ConditionalFormatValueObject $maximumConditionalFormatValueObject): self
    {
        $this->maximumConditionalFormatValueObject = $maximumConditionalFormatValueObject;

        return $this;
    }

<<<<<<< HEAD
    public function getMinimumConditionalFormatValueObject(): ConditionalFormatValueObject
=======
    /**
     * @return ConditionalFormatValueObject
     */
    public function getMinimumConditionalFormatValueObject()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->minimumConditionalFormatValueObject;
    }

    public function setMinimumConditionalFormatValueObject(ConditionalFormatValueObject $minimumConditionalFormatValueObject): self
    {
        $this->minimumConditionalFormatValueObject = $minimumConditionalFormatValueObject;

        return $this;
    }

<<<<<<< HEAD
    public function getBorderColor(): ?string
=======
    /**
     * @return string
     */
    public function getBorderColor()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->borderColor;
    }

    public function setBorderColor(string $borderColor): self
    {
        $this->borderColor = $borderColor;

        return $this;
    }

<<<<<<< HEAD
    public function getNegativeFillColor(): ?string
=======
    /**
     * @return string
     */
    public function getNegativeFillColor()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->negativeFillColor;
    }

    public function setNegativeFillColor(string $negativeFillColor): self
    {
        $this->negativeFillColor = $negativeFillColor;

        return $this;
    }

<<<<<<< HEAD
    public function getNegativeBorderColor(): ?string
=======
    /**
     * @return string
     */
    public function getNegativeBorderColor()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->negativeBorderColor;
    }

    public function setNegativeBorderColor(string $negativeBorderColor): self
    {
        $this->negativeBorderColor = $negativeBorderColor;

        return $this;
    }

    public function getAxisColor(): array
    {
        return $this->axisColor;
    }

<<<<<<< HEAD
    public function setAxisColor(mixed $rgb, mixed $theme = null, mixed $tint = null): self
=======
    /**
     * @param mixed $rgb
     * @param null|mixed $theme
     * @param null|mixed $tint
     */
    public function setAxisColor($rgb, $theme = null, $tint = null): self
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->axisColor = [
            'rgb' => $rgb,
            'theme' => $theme,
            'tint' => $tint,
        ];

        return $this;
    }
}
