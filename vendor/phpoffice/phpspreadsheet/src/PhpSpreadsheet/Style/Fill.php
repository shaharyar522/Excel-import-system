<?php

namespace PhpOffice\PhpSpreadsheet\Style;

class Fill extends Supervisor
{
    // Fill types
    const FILL_NONE = 'none';
    const FILL_SOLID = 'solid';
    const FILL_GRADIENT_LINEAR = 'linear';
    const FILL_GRADIENT_PATH = 'path';
    const FILL_PATTERN_DARKDOWN = 'darkDown';
    const FILL_PATTERN_DARKGRAY = 'darkGray';
    const FILL_PATTERN_DARKGRID = 'darkGrid';
    const FILL_PATTERN_DARKHORIZONTAL = 'darkHorizontal';
    const FILL_PATTERN_DARKTRELLIS = 'darkTrellis';
    const FILL_PATTERN_DARKUP = 'darkUp';
    const FILL_PATTERN_DARKVERTICAL = 'darkVertical';
    const FILL_PATTERN_GRAY0625 = 'gray0625';
    const FILL_PATTERN_GRAY125 = 'gray125';
    const FILL_PATTERN_LIGHTDOWN = 'lightDown';
    const FILL_PATTERN_LIGHTGRAY = 'lightGray';
    const FILL_PATTERN_LIGHTGRID = 'lightGrid';
    const FILL_PATTERN_LIGHTHORIZONTAL = 'lightHorizontal';
    const FILL_PATTERN_LIGHTTRELLIS = 'lightTrellis';
    const FILL_PATTERN_LIGHTUP = 'lightUp';
    const FILL_PATTERN_LIGHTVERTICAL = 'lightVertical';
    const FILL_PATTERN_MEDIUMGRAY = 'mediumGray';

<<<<<<< HEAD
    public ?int $startcolorIndex = null;

    public ?int $endcolorIndex = null;

    /**
     * Fill type.
     */
    protected ?string $fillType = self::FILL_NONE;

    /**
     * Rotation.
     */
    protected float $rotation = 0.0;

    /**
     * Start color.
     */
    protected Color $startColor;

    /**
     * End color.
     */
    protected Color $endColor;

    private bool $colorChanged = false;
=======
    /**
     * @var null|int
     */
    public $startcolorIndex;

    /**
     * @var null|int
     */
    public $endcolorIndex;

    /**
     * Fill type.
     *
     * @var null|string
     */
    protected $fillType = self::FILL_NONE;

    /**
     * Rotation.
     *
     * @var float
     */
    protected $rotation = 0.0;

    /**
     * Start color.
     *
     * @var Color
     */
    protected $startColor;

    /**
     * End color.
     *
     * @var Color
     */
    protected $endColor;

    /** @var bool */
    private $colorChanged = false;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Create a new Fill.
     *
     * @param bool $isSupervisor Flag indicating if this is a supervisor or not
     *                                    Leave this value at default unless you understand exactly what
     *                                        its ramifications are
     * @param bool $isConditional Flag indicating if this is a conditional style or not
     *                                    Leave this value at default unless you understand exactly what
     *                                        its ramifications are
     */
<<<<<<< HEAD
    public function __construct(bool $isSupervisor = false, bool $isConditional = false)
=======
    public function __construct($isSupervisor = false, $isConditional = false)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // Supervisor?
        parent::__construct($isSupervisor);

        // Initialise values
        if ($isConditional) {
            $this->fillType = null;
        }
        $this->startColor = new Color(Color::COLOR_WHITE, $isSupervisor, $isConditional);
        $this->endColor = new Color(Color::COLOR_BLACK, $isSupervisor, $isConditional);

        // bind parent if we are a supervisor
        if ($isSupervisor) {
            $this->startColor->bindParent($this, 'startColor');
            $this->endColor->bindParent($this, 'endColor');
        }
    }

    /**
     * Get the shared style component for the currently active cell in currently active sheet.
     * Only used for style supervisor.
<<<<<<< HEAD
     */
    public function getSharedComponent(): self
    {
        /** @var Style $parent */
=======
     *
     * @return Fill
     */
    public function getSharedComponent()
    {
        /** @var Style */
>>>>>>> 50f5a6f (Initial commit from local project)
        $parent = $this->parent;

        return $parent->getSharedComponent()->getFill();
    }

    /**
     * Build style array from subcomponents.
<<<<<<< HEAD
     */
    public function getStyleArray(array $array): array
=======
     *
     * @param array $array
     *
     * @return array
     */
    public function getStyleArray($array)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return ['fill' => $array];
    }

    /**
     * Apply styles from array.
     *
     * <code>
     * $spreadsheet->getActiveSheet()->getStyle('B2')->getFill()->applyFromArray(
     *     [
     *         'fillType' => Fill::FILL_GRADIENT_LINEAR,
     *         'rotation' => 0.0,
     *         'startColor' => [
     *             'rgb' => '000000'
     *         ],
     *         'endColor' => [
     *             'argb' => 'FFFFFFFF'
     *         ]
     *     ]
     * );
     * </code>
     *
     * @param array $styleArray Array containing style information
     *
     * @return $this
     */
<<<<<<< HEAD
    public function applyFromArray(array $styleArray): static
=======
    public function applyFromArray(array $styleArray)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($this->isSupervisor) {
            $this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($this->getStyleArray($styleArray));
        } else {
            if (isset($styleArray['fillType'])) {
                $this->setFillType($styleArray['fillType']);
            }
            if (isset($styleArray['rotation'])) {
                $this->setRotation($styleArray['rotation']);
            }
            if (isset($styleArray['startColor'])) {
                $this->getStartColor()->applyFromArray($styleArray['startColor']);
            }
            if (isset($styleArray['endColor'])) {
                $this->getEndColor()->applyFromArray($styleArray['endColor']);
            }
            if (isset($styleArray['color'])) {
                $this->getStartColor()->applyFromArray($styleArray['color']);
                $this->getEndColor()->applyFromArray($styleArray['color']);
            }
        }

        return $this;
    }

    /**
     * Get Fill Type.
<<<<<<< HEAD
     */
    public function getFillType(): ?string
=======
     *
     * @return null|string
     */
    public function getFillType()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($this->isSupervisor) {
            return $this->getSharedComponent()->getFillType();
        }

        return $this->fillType;
    }

    /**
     * Set Fill Type.
     *
     * @param string $fillType Fill type, see self::FILL_*
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setFillType(string $fillType): static
=======
    public function setFillType($fillType)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($this->isSupervisor) {
            $styleArray = $this->getStyleArray(['fillType' => $fillType]);
            $this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($styleArray);
        } else {
            $this->fillType = $fillType;
        }

        return $this;
    }

    /**
     * Get Rotation.
<<<<<<< HEAD
     */
    public function getRotation(): float
=======
     *
     * @return float
     */
    public function getRotation()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($this->isSupervisor) {
            return $this->getSharedComponent()->getRotation();
        }

        return $this->rotation;
    }

    /**
     * Set Rotation.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setRotation(float $angleInDegrees): static
=======
     * @param float $angleInDegrees
     *
     * @return $this
     */
    public function setRotation($angleInDegrees)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($this->isSupervisor) {
            $styleArray = $this->getStyleArray(['rotation' => $angleInDegrees]);
            $this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($styleArray);
        } else {
            $this->rotation = $angleInDegrees;
        }

        return $this;
    }

    /**
     * Get Start Color.
<<<<<<< HEAD
     */
    public function getStartColor(): Color
=======
     *
     * @return Color
     */
    public function getStartColor()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->startColor;
    }

    /**
     * Set Start Color.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setStartColor(Color $color): static
=======
    public function setStartColor(Color $color)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->colorChanged = true;
        // make sure parameter is a real color and not a supervisor
        $color = $color->getIsSupervisor() ? $color->getSharedComponent() : $color;

        if ($this->isSupervisor) {
            $styleArray = $this->getStartColor()->getStyleArray(['argb' => $color->getARGB()]);
            $this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($styleArray);
        } else {
            $this->startColor = $color;
        }

        return $this;
    }

    /**
     * Get End Color.
<<<<<<< HEAD
     */
    public function getEndColor(): Color
=======
     *
     * @return Color
     */
    public function getEndColor()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->endColor;
    }

    /**
     * Set End Color.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setEndColor(Color $color): static
=======
    public function setEndColor(Color $color)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->colorChanged = true;
        // make sure parameter is a real color and not a supervisor
        $color = $color->getIsSupervisor() ? $color->getSharedComponent() : $color;

        if ($this->isSupervisor) {
            $styleArray = $this->getEndColor()->getStyleArray(['argb' => $color->getARGB()]);
            $this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($styleArray);
        } else {
            $this->endColor = $color;
        }

        return $this;
    }

    public function getColorsChanged(): bool
    {
        if ($this->isSupervisor) {
            $changed = $this->getSharedComponent()->colorChanged;
        } else {
            $changed = $this->colorChanged;
        }

        return $changed || $this->startColor->getHasChanged() || $this->endColor->getHasChanged();
    }

    /**
     * Get hash code.
     *
     * @return string Hash code
     */
<<<<<<< HEAD
    public function getHashCode(): string
=======
    public function getHashCode()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($this->isSupervisor) {
            return $this->getSharedComponent()->getHashCode();
        }
<<<<<<< HEAD

        // Note that we don't care about colours for fill type NONE, but could have duplicate NONEs with
        //  different hashes if we don't explicitly prevent this
        return md5(
            $this->getFillType()
            . $this->getRotation()
            . ($this->getFillType() !== self::FILL_NONE ? $this->getStartColor()->getHashCode() : '')
            . ($this->getFillType() !== self::FILL_NONE ? $this->getEndColor()->getHashCode() : '')
            . ((string) $this->getColorsChanged())
            . __CLASS__
=======
        // Note that we don't care about colours for fill type NONE, but could have duplicate NONEs with
        //  different hashes if we don't explicitly prevent this
        return md5(
            $this->getFillType() .
            $this->getRotation() .
            ($this->getFillType() !== self::FILL_NONE ? $this->getStartColor()->getHashCode() : '') .
            ($this->getFillType() !== self::FILL_NONE ? $this->getEndColor()->getHashCode() : '') .
            ((string) $this->getColorsChanged()) .
            __CLASS__
>>>>>>> 50f5a6f (Initial commit from local project)
        );
    }

    protected function exportArray1(): array
    {
        $exportedArray = [];
        $this->exportArray2($exportedArray, 'fillType', $this->getFillType());
        $this->exportArray2($exportedArray, 'rotation', $this->getRotation());
        if ($this->getColorsChanged()) {
            $this->exportArray2($exportedArray, 'endColor', $this->getEndColor());
            $this->exportArray2($exportedArray, 'startColor', $this->getStartColor());
        }

        return $exportedArray;
    }
}
