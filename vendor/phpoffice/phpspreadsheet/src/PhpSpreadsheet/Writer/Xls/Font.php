<?php

namespace PhpOffice\PhpSpreadsheet\Writer\Xls;

use PhpOffice\PhpSpreadsheet\Shared\StringHelper;

class Font
{
    /**
     * Color index.
<<<<<<< HEAD
     */
    private int $colorIndex;

    /**
     * Font.
     */
    private \PhpOffice\PhpSpreadsheet\Style\Font $font;
=======
     *
     * @var int
     */
    private $colorIndex;

    /**
     * Font.
     *
     * @var \PhpOffice\PhpSpreadsheet\Style\Font
     */
    private $font;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Constructor.
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Style\Font $font)
    {
        $this->colorIndex = 0x7FFF;
        $this->font = $font;
    }

    /**
     * Set the color index.
<<<<<<< HEAD
     */
    public function setColorIndex(int $colorIndex): void
=======
     *
     * @param int $colorIndex
     */
    public function setColorIndex($colorIndex): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->colorIndex = $colorIndex;
    }

<<<<<<< HEAD
    private static int $notImplemented = 0;

    /**
     * Get font record data.
     */
    public function writeFont(): string
=======
    /** @var int */
    private static $notImplemented = 0;

    /**
     * Get font record data.
     *
     * @return string
     */
    public function writeFont()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $font_outline = self::$notImplemented;
        $font_shadow = self::$notImplemented;

        $icv = $this->colorIndex; // Index to color palette
        if ($this->font->getSuperscript()) {
            $sss = 1;
        } elseif ($this->font->getSubscript()) {
            $sss = 2;
        } else {
            $sss = 0;
        }
        $bFamily = 0; // Font family
        $bCharSet = \PhpOffice\PhpSpreadsheet\Shared\Font::getCharsetFromFontName((string) $this->font->getName()); // Character set

        $record = 0x31; // Record identifier
        $reserved = 0x00; // Reserved
        $grbit = 0x00; // Font attributes
        if ($this->font->getItalic()) {
            $grbit |= 0x02;
        }
        if ($this->font->getStrikethrough()) {
            $grbit |= 0x08;
        }
        if ($font_outline) {
            $grbit |= 0x10;
        }
        if ($font_shadow) {
            $grbit |= 0x20;
        }

        $data = pack(
            'vvvvvCCCC',
            // Fontsize (in twips)
            $this->font->getSize() * 20,
            $grbit,
            // Colour
            $icv,
            // Font weight
            self::mapBold($this->font->getBold()),
            // Superscript/Subscript
            $sss,
            self::mapUnderline((string) $this->font->getUnderline()),
            $bFamily,
            $bCharSet,
            $reserved
        );
        $data .= StringHelper::UTF8toBIFF8UnicodeShort((string) $this->font->getName());

        $length = strlen($data);
        $header = pack('vv', $record, $length);

        return $header . $data;
    }

    /**
     * Map to BIFF5-BIFF8 codes for bold.
     */
    private static function mapBold(?bool $bold): int
    {
        if ($bold === true) {
            return 0x2BC; //  700 = Bold font weight
        }

        return 0x190; //  400 = Normal font weight
    }

    /**
     * Map of BIFF2-BIFF8 codes for underline styles.
     *
     * @var int[]
     */
<<<<<<< HEAD
    private static array $mapUnderline = [
=======
    private static $mapUnderline = [
>>>>>>> 50f5a6f (Initial commit from local project)
        \PhpOffice\PhpSpreadsheet\Style\Font::UNDERLINE_NONE => 0x00,
        \PhpOffice\PhpSpreadsheet\Style\Font::UNDERLINE_SINGLE => 0x01,
        \PhpOffice\PhpSpreadsheet\Style\Font::UNDERLINE_DOUBLE => 0x02,
        \PhpOffice\PhpSpreadsheet\Style\Font::UNDERLINE_SINGLEACCOUNTING => 0x21,
        \PhpOffice\PhpSpreadsheet\Style\Font::UNDERLINE_DOUBLEACCOUNTING => 0x22,
    ];

    /**
     * Map underline.
<<<<<<< HEAD
     */
    private static function mapUnderline(string $underline): int
=======
     *
     * @param string $underline
     *
     * @return int
     */
    private static function mapUnderline($underline)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (isset(self::$mapUnderline[$underline])) {
            return self::$mapUnderline[$underline];
        }

        return 0x00;
    }
}
