<?php

namespace PhpOffice\PhpSpreadsheet\Worksheet;

/**
 * <code>
 * Header/Footer Formatting Syntax taken from Office Open XML Part 4 - Markup Language Reference, page 1970:.
 *
 * There are a number of formatting codes that can be written inline with the actual header / footer text, which
 * affect the formatting in the header or footer.
 *
 * Example: This example shows the text "Center Bold Header" on the first line (center section), and the date on
 * the second line (center section).
 *         &CCenter &"-,Bold"Bold&"-,Regular"Header_x000A_&D
 *
 * General Rules:
 * There is no required order in which these codes must appear.
 *
 * The first occurrence of the following codes turns the formatting ON, the second occurrence turns it OFF again:
 * - strikethrough
 * - superscript
 * - subscript
 * Superscript and subscript cannot both be ON at same time. Whichever comes first wins and the other is ignored,
 * while the first is ON.
 * &L - code for "left section" (there are three header / footer locations, "left", "center", and "right"). When
 * two or more occurrences of this section marker exist, the contents from all markers are concatenated, in the
 * order of appearance, and placed into the left section.
 * &P - code for "current page #"
 * &N - code for "total pages"
 * &font size - code for "text font size", where font size is a font size in points.
 * &K - code for "text font color"
 * RGB Color is specified as RRGGBB
 * Theme Color is specifed as TTSNN where TT is the theme color Id, S is either "+" or "-" of the tint/shade
 * value, NN is the tint/shade value.
 * &S - code for "text strikethrough" on / off
 * &X - code for "text super script" on / off
 * &Y - code for "text subscript" on / off
 * &C - code for "center section". When two or more occurrences of this section marker exist, the contents
 * from all markers are concatenated, in the order of appearance, and placed into the center section.
 *
 * &D - code for "date"
 * &T - code for "time"
 * &G - code for "picture as background"
 * &U - code for "text single underline"
 * &E - code for "double underline"
 * &R - code for "right section". When two or more occurrences of this section marker exist, the contents
 * from all markers are concatenated, in the order of appearance, and placed into the right section.
 * &Z - code for "this workbook's file path"
 * &F - code for "this workbook's file name"
 * &A - code for "sheet tab name"
 * &+ - code for add to page #.
 * &- - code for subtract from page #.
 * &"font name,font type" - code for "text font name" and "text font type", where font name and font type
 * are strings specifying the name and type of the font, separated by a comma. When a hyphen appears in font
 * name, it means "none specified". Both of font name and font type can be localized values.
 * &"-,Bold" - code for "bold font style"
 * &B - also means "bold font style".
 * &"-,Regular" - code for "regular font style"
 * &"-,Italic" - code for "italic font style"
 * &I - also means "italic font style"
 * &"-,Bold Italic" code for "bold italic font style"
 * &O - code for "outline style"
 * &H - code for "shadow style"
 * </code>
 */
class HeaderFooter
{
    // Header/footer image location
    const IMAGE_HEADER_LEFT = 'LH';
    const IMAGE_HEADER_CENTER = 'CH';
    const IMAGE_HEADER_RIGHT = 'RH';
    const IMAGE_FOOTER_LEFT = 'LF';
    const IMAGE_FOOTER_CENTER = 'CF';
    const IMAGE_FOOTER_RIGHT = 'RF';

    /**
     * OddHeader.
<<<<<<< HEAD
     */
    private string $oddHeader = '';

    /**
     * OddFooter.
     */
    private string $oddFooter = '';

    /**
     * EvenHeader.
     */
    private string $evenHeader = '';

    /**
     * EvenFooter.
     */
    private string $evenFooter = '';

    /**
     * FirstHeader.
     */
    private string $firstHeader = '';

    /**
     * FirstFooter.
     */
    private string $firstFooter = '';

    /**
     * Different header for Odd/Even, defaults to false.
     */
    private bool $differentOddEven = false;

    /**
     * Different header for first page, defaults to false.
     */
    private bool $differentFirst = false;

    /**
     * Scale with document, defaults to true.
     */
    private bool $scaleWithDocument = true;

    /**
     * Align with margins, defaults to true.
     */
    private bool $alignWithMargins = true;
=======
     *
     * @var string
     */
    private $oddHeader = '';

    /**
     * OddFooter.
     *
     * @var string
     */
    private $oddFooter = '';

    /**
     * EvenHeader.
     *
     * @var string
     */
    private $evenHeader = '';

    /**
     * EvenFooter.
     *
     * @var string
     */
    private $evenFooter = '';

    /**
     * FirstHeader.
     *
     * @var string
     */
    private $firstHeader = '';

    /**
     * FirstFooter.
     *
     * @var string
     */
    private $firstFooter = '';

    /**
     * Different header for Odd/Even, defaults to false.
     *
     * @var bool
     */
    private $differentOddEven = false;

    /**
     * Different header for first page, defaults to false.
     *
     * @var bool
     */
    private $differentFirst = false;

    /**
     * Scale with document, defaults to true.
     *
     * @var bool
     */
    private $scaleWithDocument = true;

    /**
     * Align with margins, defaults to true.
     *
     * @var bool
     */
    private $alignWithMargins = true;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Header/footer images.
     *
     * @var HeaderFooterDrawing[]
     */
<<<<<<< HEAD
    private array $headerFooterImages = [];
=======
    private $headerFooterImages = [];
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Create a new HeaderFooter.
     */
    public function __construct()
    {
    }

    /**
     * Get OddHeader.
<<<<<<< HEAD
     */
    public function getOddHeader(): string
=======
     *
     * @return string
     */
    public function getOddHeader()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->oddHeader;
    }

    /**
     * Set OddHeader.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setOddHeader(string $oddHeader): static
=======
     * @param string $oddHeader
     *
     * @return $this
     */
    public function setOddHeader($oddHeader)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->oddHeader = $oddHeader;

        return $this;
    }

    /**
     * Get OddFooter.
<<<<<<< HEAD
     */
    public function getOddFooter(): string
=======
     *
     * @return string
     */
    public function getOddFooter()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->oddFooter;
    }

    /**
     * Set OddFooter.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setOddFooter(string $oddFooter): static
=======
     * @param string $oddFooter
     *
     * @return $this
     */
    public function setOddFooter($oddFooter)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->oddFooter = $oddFooter;

        return $this;
    }

    /**
     * Get EvenHeader.
<<<<<<< HEAD
     */
    public function getEvenHeader(): string
=======
     *
     * @return string
     */
    public function getEvenHeader()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->evenHeader;
    }

    /**
     * Set EvenHeader.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setEvenHeader(string $eventHeader): static
=======
     * @param string $eventHeader
     *
     * @return $this
     */
    public function setEvenHeader($eventHeader)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->evenHeader = $eventHeader;

        return $this;
    }

    /**
     * Get EvenFooter.
<<<<<<< HEAD
     */
    public function getEvenFooter(): string
=======
     *
     * @return string
     */
    public function getEvenFooter()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->evenFooter;
    }

    /**
     * Set EvenFooter.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setEvenFooter(string $evenFooter): static
=======
     * @param string $evenFooter
     *
     * @return $this
     */
    public function setEvenFooter($evenFooter)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->evenFooter = $evenFooter;

        return $this;
    }

    /**
     * Get FirstHeader.
<<<<<<< HEAD
     */
    public function getFirstHeader(): string
=======
     *
     * @return string
     */
    public function getFirstHeader()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->firstHeader;
    }

    /**
     * Set FirstHeader.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setFirstHeader(string $firstHeader): static
=======
     * @param string $firstHeader
     *
     * @return $this
     */
    public function setFirstHeader($firstHeader)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->firstHeader = $firstHeader;

        return $this;
    }

    /**
     * Get FirstFooter.
<<<<<<< HEAD
     */
    public function getFirstFooter(): string
=======
     *
     * @return string
     */
    public function getFirstFooter()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->firstFooter;
    }

    /**
     * Set FirstFooter.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setFirstFooter(string $firstFooter): static
=======
     * @param string $firstFooter
     *
     * @return $this
     */
    public function setFirstFooter($firstFooter)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->firstFooter = $firstFooter;

        return $this;
    }

    /**
     * Get DifferentOddEven.
<<<<<<< HEAD
     */
    public function getDifferentOddEven(): bool
=======
     *
     * @return bool
     */
    public function getDifferentOddEven()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->differentOddEven;
    }

    /**
     * Set DifferentOddEven.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setDifferentOddEven(bool $differentOddEvent): static
=======
     * @param bool $differentOddEvent
     *
     * @return $this
     */
    public function setDifferentOddEven($differentOddEvent)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->differentOddEven = $differentOddEvent;

        return $this;
    }

    /**
     * Get DifferentFirst.
<<<<<<< HEAD
     */
    public function getDifferentFirst(): bool
=======
     *
     * @return bool
     */
    public function getDifferentFirst()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->differentFirst;
    }

    /**
     * Set DifferentFirst.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setDifferentFirst(bool $differentFirst): static
=======
     * @param bool $differentFirst
     *
     * @return $this
     */
    public function setDifferentFirst($differentFirst)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->differentFirst = $differentFirst;

        return $this;
    }

    /**
     * Get ScaleWithDocument.
<<<<<<< HEAD
     */
    public function getScaleWithDocument(): bool
=======
     *
     * @return bool
     */
    public function getScaleWithDocument()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->scaleWithDocument;
    }

    /**
     * Set ScaleWithDocument.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setScaleWithDocument(bool $scaleWithDocument): static
=======
     * @param bool $scaleWithDocument
     *
     * @return $this
     */
    public function setScaleWithDocument($scaleWithDocument)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->scaleWithDocument = $scaleWithDocument;

        return $this;
    }

    /**
     * Get AlignWithMargins.
<<<<<<< HEAD
     */
    public function getAlignWithMargins(): bool
=======
     *
     * @return bool
     */
    public function getAlignWithMargins()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->alignWithMargins;
    }

    /**
     * Set AlignWithMargins.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setAlignWithMargins(bool $alignWithMargins): static
=======
     * @param bool $alignWithMargins
     *
     * @return $this
     */
    public function setAlignWithMargins($alignWithMargins)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->alignWithMargins = $alignWithMargins;

        return $this;
    }

    /**
     * Add header/footer image.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function addImage(HeaderFooterDrawing $image, string $location = self::IMAGE_HEADER_LEFT): static
=======
     * @param string $location
     *
     * @return $this
     */
    public function addImage(HeaderFooterDrawing $image, $location = self::IMAGE_HEADER_LEFT)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->headerFooterImages[$location] = $image;

        return $this;
    }

    /**
     * Remove header/footer image.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function removeImage(string $location = self::IMAGE_HEADER_LEFT): static
=======
     * @param string $location
     *
     * @return $this
     */
    public function removeImage($location = self::IMAGE_HEADER_LEFT)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (isset($this->headerFooterImages[$location])) {
            unset($this->headerFooterImages[$location]);
        }

        return $this;
    }

    /**
     * Set header/footer images.
     *
     * @param HeaderFooterDrawing[] $images
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setImages(array $images): static
=======
    public function setImages(array $images)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->headerFooterImages = $images;

        return $this;
    }

    /**
     * Get header/footer images.
     *
     * @return HeaderFooterDrawing[]
     */
<<<<<<< HEAD
    public function getImages(): array
=======
    public function getImages()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // Sort array
        $images = [];
        if (isset($this->headerFooterImages[self::IMAGE_HEADER_LEFT])) {
            $images[self::IMAGE_HEADER_LEFT] = $this->headerFooterImages[self::IMAGE_HEADER_LEFT];
        }
        if (isset($this->headerFooterImages[self::IMAGE_HEADER_CENTER])) {
            $images[self::IMAGE_HEADER_CENTER] = $this->headerFooterImages[self::IMAGE_HEADER_CENTER];
        }
        if (isset($this->headerFooterImages[self::IMAGE_HEADER_RIGHT])) {
            $images[self::IMAGE_HEADER_RIGHT] = $this->headerFooterImages[self::IMAGE_HEADER_RIGHT];
        }
        if (isset($this->headerFooterImages[self::IMAGE_FOOTER_LEFT])) {
            $images[self::IMAGE_FOOTER_LEFT] = $this->headerFooterImages[self::IMAGE_FOOTER_LEFT];
        }
        if (isset($this->headerFooterImages[self::IMAGE_FOOTER_CENTER])) {
            $images[self::IMAGE_FOOTER_CENTER] = $this->headerFooterImages[self::IMAGE_FOOTER_CENTER];
        }
        if (isset($this->headerFooterImages[self::IMAGE_FOOTER_RIGHT])) {
            $images[self::IMAGE_FOOTER_RIGHT] = $this->headerFooterImages[self::IMAGE_FOOTER_RIGHT];
        }
        $this->headerFooterImages = $images;

        return $this->headerFooterImages;
    }

    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
        $vars = get_object_vars($this);
        foreach ($vars as $key => $value) {
            if (is_object($value)) {
                $this->$key = clone $value;
            } else {
                $this->$key = $value;
            }
        }
    }
}
