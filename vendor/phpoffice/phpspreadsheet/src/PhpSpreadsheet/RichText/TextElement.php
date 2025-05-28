<?php

namespace PhpOffice\PhpSpreadsheet\RichText;

<<<<<<< HEAD
use PhpOffice\PhpSpreadsheet\Style\Font;

=======
>>>>>>> 50f5a6f (Initial commit from local project)
class TextElement implements ITextElement
{
    /**
     * Text.
<<<<<<< HEAD
     */
    private string $text;
=======
     *
     * @var string
     */
    private $text;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Create a new TextElement instance.
     *
     * @param string $text Text
     */
<<<<<<< HEAD
    public function __construct(string $text = '')
=======
    public function __construct($text = '')
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // Initialise variables
        $this->text = $text;
    }

    /**
     * Get text.
     *
     * @return string Text
     */
<<<<<<< HEAD
    public function getText(): string
=======
    public function getText()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->text;
    }

    /**
     * Set text.
     *
     * @param string $text Text
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setText(string $text): self
=======
    public function setText($text)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get font. For this class, the return value is always null.
<<<<<<< HEAD
     */
    public function getFont(): ?Font
=======
     *
     * @return null|\PhpOffice\PhpSpreadsheet\Style\Font
     */
    public function getFont()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return null;
    }

    /**
     * Get hash code.
     *
     * @return string Hash code
     */
<<<<<<< HEAD
    public function getHashCode(): string
    {
        return md5(
            $this->text
            . __CLASS__
=======
    public function getHashCode()
    {
        return md5(
            $this->text .
            __CLASS__
>>>>>>> 50f5a6f (Initial commit from local project)
        );
    }
}
