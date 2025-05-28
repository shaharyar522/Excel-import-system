<?php

namespace PhpOffice\PhpSpreadsheet\RichText;

<<<<<<< HEAD
use PhpOffice\PhpSpreadsheet\Style\Font;

=======
>>>>>>> 50f5a6f (Initial commit from local project)
interface ITextElement
{
    /**
     * Get text.
<<<<<<< HEAD
     */
    public function getText(): string;
=======
     *
     * @return string Text
     */
    public function getText();
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Set text.
     *
     * @param string $text Text
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setText(string $text): self;

    /**
     * Get font.
     */
    public function getFont(): ?Font;
=======
     * @return ITextElement
     */
    public function setText($text);

    /**
     * Get font.
     *
     * @return null|\PhpOffice\PhpSpreadsheet\Style\Font
     */
    public function getFont();
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Get hash code.
     *
     * @return string Hash code
     */
<<<<<<< HEAD
    public function getHashCode(): string;
=======
    public function getHashCode();
>>>>>>> 50f5a6f (Initial commit from local project)
}
