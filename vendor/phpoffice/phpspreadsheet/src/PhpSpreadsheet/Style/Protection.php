<?php

namespace PhpOffice\PhpSpreadsheet\Style;

class Protection extends Supervisor
{
    /** Protection styles */
    const PROTECTION_INHERIT = 'inherit';
    const PROTECTION_PROTECTED = 'protected';
    const PROTECTION_UNPROTECTED = 'unprotected';

    /**
     * Locked.
<<<<<<< HEAD
     */
    protected ?string $locked = null;

    /**
     * Hidden.
     */
    protected ?string $hidden = null;
=======
     *
     * @var string
     */
    protected $locked;

    /**
     * Hidden.
     *
     * @var string
     */
    protected $hidden;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Create a new Protection.
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
        if (!$isConditional) {
            $this->locked = self::PROTECTION_INHERIT;
            $this->hidden = self::PROTECTION_INHERIT;
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
     * @return Protection
     */
    public function getSharedComponent()
    {
        /** @var Style */
>>>>>>> 50f5a6f (Initial commit from local project)
        $parent = $this->parent;

        return $parent->getSharedComponent()->getProtection();
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
        return ['protection' => $array];
    }

    /**
     * Apply styles from array.
     *
     * <code>
     * $spreadsheet->getActiveSheet()->getStyle('B2')->getLocked()->applyFromArray(
     *     [
     *         'locked' => TRUE,
     *         'hidden' => FALSE
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
            if (isset($styleArray['locked'])) {
                $this->setLocked($styleArray['locked']);
            }
            if (isset($styleArray['hidden'])) {
                $this->setHidden($styleArray['hidden']);
            }
        }

        return $this;
    }

    /**
     * Get locked.
<<<<<<< HEAD
     */
    public function getLocked(): ?string
=======
     *
     * @return string
     */
    public function getLocked()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($this->isSupervisor) {
            return $this->getSharedComponent()->getLocked();
        }

        return $this->locked;
    }

    /**
     * Set locked.
     *
     * @param string $lockType see self::PROTECTION_*
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setLocked(string $lockType): static
=======
    public function setLocked($lockType)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($this->isSupervisor) {
            $styleArray = $this->getStyleArray(['locked' => $lockType]);
            $this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($styleArray);
        } else {
            $this->locked = $lockType;
        }

        return $this;
    }

    /**
     * Get hidden.
<<<<<<< HEAD
     */
    public function getHidden(): ?string
=======
     *
     * @return string
     */
    public function getHidden()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($this->isSupervisor) {
            return $this->getSharedComponent()->getHidden();
        }

        return $this->hidden;
    }

    /**
     * Set hidden.
     *
     * @param string $hiddenType see self::PROTECTION_*
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setHidden(string $hiddenType): static
=======
    public function setHidden($hiddenType)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($this->isSupervisor) {
            $styleArray = $this->getStyleArray(['hidden' => $hiddenType]);
            $this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($styleArray);
        } else {
            $this->hidden = $hiddenType;
        }

        return $this;
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

        return md5(
<<<<<<< HEAD
            $this->locked
            . $this->hidden
            . __CLASS__
=======
            $this->locked .
            $this->hidden .
            __CLASS__
>>>>>>> 50f5a6f (Initial commit from local project)
        );
    }

    protected function exportArray1(): array
    {
        $exportedArray = [];
        $this->exportArray2($exportedArray, 'locked', $this->getLocked());
        $this->exportArray2($exportedArray, 'hidden', $this->getHidden());

        return $exportedArray;
    }
}
