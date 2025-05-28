<?php

namespace PhpOffice\PhpSpreadsheet\RichText;

use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\IComparable;
<<<<<<< HEAD
use Stringable;

class RichText implements IComparable, Stringable
=======

class RichText implements IComparable
>>>>>>> 50f5a6f (Initial commit from local project)
{
    /**
     * Rich text elements.
     *
     * @var ITextElement[]
     */
<<<<<<< HEAD
    private array $richTextElements;
=======
    private $richTextElements;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Create a new RichText instance.
     */
    public function __construct(?Cell $cell = null)
    {
        // Initialise variables
        $this->richTextElements = [];

        // Rich-Text string attached to cell?
        if ($cell !== null) {
            // Add cell text and style
<<<<<<< HEAD
            if ($cell->getValueString() !== '') {
                $objRun = new Run($cell->getValueString());
=======
            if ($cell->getValue() != '') {
                $objRun = new Run($cell->getValue());
>>>>>>> 50f5a6f (Initial commit from local project)
                $objRun->setFont(clone $cell->getWorksheet()->getStyle($cell->getCoordinate())->getFont());
                $this->addText($objRun);
            }

            // Set parent value
            $cell->setValueExplicit($this, DataType::TYPE_STRING);
        }
    }

    /**
     * Add text.
     *
     * @param ITextElement $text Rich text element
     *
     * @return $this
     */
<<<<<<< HEAD
    public function addText(ITextElement $text): static
=======
    public function addText(ITextElement $text)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->richTextElements[] = $text;

        return $this;
    }

    /**
     * Create text.
     *
     * @param string $text Text
<<<<<<< HEAD
     */
    public function createText(string $text): TextElement
=======
     *
     * @return TextElement
     */
    public function createText($text)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $objText = new TextElement($text);
        $this->addText($objText);

        return $objText;
    }

    /**
     * Create text run.
     *
     * @param string $text Text
<<<<<<< HEAD
     */
    public function createTextRun(string $text): Run
=======
     *
     * @return Run
     */
    public function createTextRun($text)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $objText = new Run($text);
        $this->addText($objText);

        return $objText;
    }

    /**
     * Get plain text.
<<<<<<< HEAD
     */
    public function getPlainText(): string
=======
     *
     * @return string
     */
    public function getPlainText()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // Return value
        $returnValue = '';

        // Loop through all ITextElements
        foreach ($this->richTextElements as $text) {
            $returnValue .= $text->getText();
        }

        return $returnValue;
    }

    /**
     * Convert to string.
<<<<<<< HEAD
     */
    public function __toString(): string
=======
     *
     * @return string
     */
    public function __toString()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->getPlainText();
    }

    /**
     * Get Rich Text elements.
     *
     * @return ITextElement[]
     */
<<<<<<< HEAD
    public function getRichTextElements(): array
=======
    public function getRichTextElements()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->richTextElements;
    }

    /**
     * Set Rich Text elements.
     *
     * @param ITextElement[] $textElements Array of elements
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setRichTextElements(array $textElements): static
=======
    public function setRichTextElements(array $textElements)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->richTextElements = $textElements;

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
        $hashElements = '';
        foreach ($this->richTextElements as $element) {
            $hashElements .= $element->getHashCode();
        }

        return md5(
<<<<<<< HEAD
            $hashElements
            . __CLASS__
=======
            $hashElements .
            __CLASS__
>>>>>>> 50f5a6f (Initial commit from local project)
        );
    }

    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
        $vars = get_object_vars($this);
        foreach ($vars as $key => $value) {
            $newValue = is_object($value) ? (clone $value) : $value;
            if (is_array($value)) {
                $newValue = [];
                foreach ($value as $key2 => $value2) {
                    $newValue[$key2] = is_object($value2) ? (clone $value2) : $value2;
                }
            }
            $this->$key = $newValue;
        }
    }
}
