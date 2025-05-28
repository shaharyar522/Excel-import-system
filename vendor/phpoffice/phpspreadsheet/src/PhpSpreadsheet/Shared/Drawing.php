<?php

namespace PhpOffice\PhpSpreadsheet\Shared;

<<<<<<< HEAD
=======
use GdImage;
use PhpOffice\PhpSpreadsheet\Reader\Exception as ReaderException;
>>>>>>> 50f5a6f (Initial commit from local project)
use SimpleXMLElement;

class Drawing
{
    /**
     * Convert pixels to EMU.
     *
     * @param int $pixelValue Value in pixels
     *
<<<<<<< HEAD
     * @return float|int Value in EMU
     */
    public static function pixelsToEMU(int $pixelValue): int|float
=======
     * @return int Value in EMU
     */
    public static function pixelsToEMU($pixelValue)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $pixelValue * 9525;
    }

    /**
     * Convert EMU to pixels.
     *
     * @param int|SimpleXMLElement $emuValue Value in EMU
     *
     * @return int Value in pixels
     */
<<<<<<< HEAD
    public static function EMUToPixels($emuValue): int
=======
    public static function EMUToPixels($emuValue)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $emuValue = (int) $emuValue;
        if ($emuValue != 0) {
            return (int) round($emuValue / 9525);
        }

        return 0;
    }

    /**
     * Convert pixels to column width. Exact algorithm not known.
     * By inspection of a real Excel file using Calibri 11, one finds 1000px ~ 142.85546875
     * This gives a conversion factor of 7. Also, we assume that pixels and font size are proportional.
     *
     * @param int $pixelValue Value in pixels
     *
     * @return float|int Value in cell dimension
     */
<<<<<<< HEAD
    public static function pixelsToCellDimension(int $pixelValue, \PhpOffice\PhpSpreadsheet\Style\Font $defaultFont): int|float
=======
    public static function pixelsToCellDimension($pixelValue, \PhpOffice\PhpSpreadsheet\Style\Font $defaultFont)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // Font name and size
        $name = $defaultFont->getName();
        $size = $defaultFont->getSize();

<<<<<<< HEAD
        if (isset(Font::DEFAULT_COLUMN_WIDTHS[$name][$size])) {
            // Exact width can be determined
            return $pixelValue * Font::DEFAULT_COLUMN_WIDTHS[$name][$size]['width']
                / Font::DEFAULT_COLUMN_WIDTHS[$name][$size]['px'];
=======
        if (isset(Font::$defaultColumnWidths[$name][$size])) {
            // Exact width can be determined
            return $pixelValue * Font::$defaultColumnWidths[$name][$size]['width']
                / Font::$defaultColumnWidths[$name][$size]['px'];
>>>>>>> 50f5a6f (Initial commit from local project)
        }

        // We don't have data for this particular font and size, use approximation by
        // extrapolating from Calibri 11
<<<<<<< HEAD
        return $pixelValue * 11 * Font::DEFAULT_COLUMN_WIDTHS['Calibri'][11]['width']
            / Font::DEFAULT_COLUMN_WIDTHS['Calibri'][11]['px'] / $size;
=======
        return $pixelValue * 11 * Font::$defaultColumnWidths['Calibri'][11]['width']
            / Font::$defaultColumnWidths['Calibri'][11]['px'] / $size;
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    /**
     * Convert column width from (intrinsic) Excel units to pixels.
     *
     * @param float $cellWidth Value in cell dimension
     * @param \PhpOffice\PhpSpreadsheet\Style\Font $defaultFont Default font of the workbook
     *
     * @return int Value in pixels
     */
<<<<<<< HEAD
    public static function cellDimensionToPixels(float $cellWidth, \PhpOffice\PhpSpreadsheet\Style\Font $defaultFont): int
=======
    public static function cellDimensionToPixels($cellWidth, \PhpOffice\PhpSpreadsheet\Style\Font $defaultFont)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // Font name and size
        $name = $defaultFont->getName();
        $size = $defaultFont->getSize();

<<<<<<< HEAD
        if (isset(Font::DEFAULT_COLUMN_WIDTHS[$name][$size])) {
            // Exact width can be determined
            $colWidth = $cellWidth * Font::DEFAULT_COLUMN_WIDTHS[$name][$size]['px']
                / Font::DEFAULT_COLUMN_WIDTHS[$name][$size]['width'];
        } else {
            // We don't have data for this particular font and size, use approximation by
            // extrapolating from Calibri 11
            $colWidth = $cellWidth * $size * Font::DEFAULT_COLUMN_WIDTHS['Calibri'][11]['px']
                / Font::DEFAULT_COLUMN_WIDTHS['Calibri'][11]['width'] / 11;
=======
        if (isset(Font::$defaultColumnWidths[$name][$size])) {
            // Exact width can be determined
            $colWidth = $cellWidth * Font::$defaultColumnWidths[$name][$size]['px']
                / Font::$defaultColumnWidths[$name][$size]['width'];
        } else {
            // We don't have data for this particular font and size, use approximation by
            // extrapolating from Calibri 11
            $colWidth = $cellWidth * $size * Font::$defaultColumnWidths['Calibri'][11]['px']
                / Font::$defaultColumnWidths['Calibri'][11]['width'] / 11;
>>>>>>> 50f5a6f (Initial commit from local project)
        }

        // Round pixels to closest integer
        $colWidth = (int) round($colWidth);

        return $colWidth;
    }

    /**
     * Convert pixels to points.
     *
     * @param int $pixelValue Value in pixels
     *
     * @return float Value in points
     */
<<<<<<< HEAD
    public static function pixelsToPoints(int $pixelValue): float
=======
    public static function pixelsToPoints($pixelValue)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $pixelValue * 0.75;
    }

    /**
     * Convert points to pixels.
     *
<<<<<<< HEAD
     * @param float|int $pointValue Value in points
     *
     * @return int Value in pixels
     */
    public static function pointsToPixels($pointValue): int
=======
     * @param int $pointValue Value in points
     *
     * @return int Value in pixels
     */
    public static function pointsToPixels($pointValue)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($pointValue != 0) {
            return (int) ceil($pointValue / 0.75);
        }

        return 0;
    }

    /**
     * Convert degrees to angle.
     *
     * @param int $degrees Degrees
     *
     * @return int Angle
     */
<<<<<<< HEAD
    public static function degreesToAngle(int $degrees): int
=======
    public static function degreesToAngle($degrees)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return (int) round($degrees * 60000);
    }

    /**
     * Convert angle to degrees.
     *
     * @param int|SimpleXMLElement $angle Angle
     *
     * @return int Degrees
     */
<<<<<<< HEAD
    public static function angleToDegrees($angle): int
=======
    public static function angleToDegrees($angle)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $angle = (int) $angle;
        if ($angle != 0) {
            return (int) round($angle / 60000);
        }

        return 0;
    }
<<<<<<< HEAD
=======

    /**
     * Create a new image from file. By alexander at alexauto dot nl.
     *
     * @see http://www.php.net/manual/en/function.imagecreatefromwbmp.php#86214
     *
     * @param string $bmpFilename Path to Windows DIB (BMP) image
     *
     * @return GdImage|resource
     *
     * @deprecated 1.26 use Php function imagecreatefrombmp instead
     *
     * @codeCoverageIgnore
     */
    public static function imagecreatefrombmp($bmpFilename)
    {
        $retVal = @imagecreatefrombmp($bmpFilename);
        if ($retVal === false) {
            throw new ReaderException("Unable to create image from $bmpFilename");
        }

        return $retVal;
    }
>>>>>>> 50f5a6f (Initial commit from local project)
}
