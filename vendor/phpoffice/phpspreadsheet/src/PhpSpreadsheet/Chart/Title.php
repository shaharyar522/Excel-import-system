<?php

namespace PhpOffice\PhpSpreadsheet\Chart;

use PhpOffice\PhpSpreadsheet\RichText\RichText;
<<<<<<< HEAD
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Font;

class Title
{
    public const TITLE_CELL_REFERENCE
        = '/^(.*)!' // beginning of string, everything up to ! is match[1]
        . '[$]([A-Z]{1,3})' // absolute column string match[2]
        . '[$](\d{1,7})$/i'; // absolute row string match[3]

    /**
     * Title Caption.
     *
     * @var array<RichText|string>|RichText|string
     */
    private array|RichText|string $caption;

    /**
     * Allow overlay of other elements?
     */
    private bool $overlay = true;

    /**
     * Title Layout.
     */
    private ?Layout $layout;

    private string $cellReference = '';

    private ?Font $font = null;

    /**
     * Create a new Title.
     */
    public function __construct(array|RichText|string $caption = '', ?Layout $layout = null, bool $overlay = false)
=======

class Title
{
    /**
     * Title Caption.
     *
     * @var array|RichText|string
     */
    private $caption = '';

    /**
     * Allow overlay of other elements?
     *
     * @var bool
     */
    private $overlay = true;

    /**
     * Title Layout.
     *
     * @var ?Layout
     */
    private $layout;

    /**
     * Create a new Title.
     *
     * @param array|RichText|string $caption
     * @param ?Layout $layout
     * @param bool $overlay
     */
    public function __construct($caption = '', ?Layout $layout = null, $overlay = false)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->caption = $caption;
        $this->layout = $layout;
        $this->setOverlay($overlay);
    }

    /**
     * Get caption.
<<<<<<< HEAD
     */
    public function getCaption(): array|RichText|string
=======
     *
     * @return array|RichText|string
     */
    public function getCaption()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->caption;
    }

<<<<<<< HEAD
    public function getCaptionText(?Spreadsheet $spreadsheet = null): string
    {
        if ($spreadsheet !== null) {
            $caption = $this->getCalculatedTitle($spreadsheet);
            if ($caption !== null) {
                return $caption;
            }
        }
=======
    public function getCaptionText(): string
    {
>>>>>>> 50f5a6f (Initial commit from local project)
        $caption = $this->caption;
        if (is_string($caption)) {
            return $caption;
        }
        if ($caption instanceof RichText) {
            return $caption->getPlainText();
        }
        $retVal = '';
        foreach ($caption as $textx) {
<<<<<<< HEAD
            /** @var RichText|string $text */
=======
            /** @var RichText|string */
>>>>>>> 50f5a6f (Initial commit from local project)
            $text = $textx;
            if ($text instanceof RichText) {
                $retVal .= $text->getPlainText();
            } else {
                $retVal .= $text;
            }
        }

        return $retVal;
    }

    /**
     * Set caption.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setCaption(array|RichText|string $caption): static
=======
     * @param array|RichText|string $caption
     *
     * @return $this
     */
    public function setCaption($caption)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * Get allow overlay of other elements?
<<<<<<< HEAD
     */
    public function getOverlay(): bool
=======
     *
     * @return bool
     */
    public function getOverlay()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->overlay;
    }

    /**
     * Set allow overlay of other elements?
<<<<<<< HEAD
     */
    public function setOverlay(bool $overlay): self
    {
        $this->overlay = $overlay;

        return $this;
=======
     *
     * @param bool $overlay
     */
    public function setOverlay($overlay): void
    {
        $this->overlay = $overlay;
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    public function getLayout(): ?Layout
    {
        return $this->layout;
    }
<<<<<<< HEAD

    public function setCellReference(string $cellReference): self
    {
        $this->cellReference = $cellReference;

        return $this;
    }

    public function getCellReference(): string
    {
        return $this->cellReference;
    }

    public function getCalculatedTitle(?Spreadsheet $spreadsheet): ?string
    {
        preg_match(self::TITLE_CELL_REFERENCE, $this->cellReference, $matches);
        if (count($matches) === 0 || $spreadsheet === null) {
            return null;
        }
        $sheetName = preg_replace("/^'(.*)'$/", '$1', $matches[1]) ?? '';

        return $spreadsheet->getSheetByName($sheetName)?->getCell($matches[2] . $matches[3])?->getFormattedValue();
    }

    public function getFont(): ?Font
    {
        return $this->font;
    }

    public function setFont(?Font $font): self
    {
        $this->font = $font;

        return $this;
    }

    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
        $this->layout = ($this->layout === null) ? null : clone $this->layout;
        $this->font = ($this->font === null) ? null : clone $this->font;
        if (is_array($this->caption)) {
            $captions = $this->caption;
            $this->caption = [];
            foreach ($captions as $caption) {
                $this->caption[] = is_object($caption) ? (clone $caption) : $caption;
            }
        } else {
            $this->caption = is_object($this->caption) ? (clone $this->caption) : $this->caption;
        }
    }
=======
>>>>>>> 50f5a6f (Initial commit from local project)
}
