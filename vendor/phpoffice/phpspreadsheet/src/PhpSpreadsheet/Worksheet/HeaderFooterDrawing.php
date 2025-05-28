<?php

namespace PhpOffice\PhpSpreadsheet\Worksheet;

class HeaderFooterDrawing extends Drawing
{
    /**
     * Get hash code.
     *
     * @return string Hash code
     */
<<<<<<< HEAD
    public function getHashCode(): string
    {
        return md5(
            $this->getPath()
            . $this->name
            . $this->offsetX
            . $this->offsetY
            . $this->width
            . $this->height
            . __CLASS__
=======
    public function getHashCode()
    {
        return md5(
            $this->getPath() .
            $this->name .
            $this->offsetX .
            $this->offsetY .
            $this->width .
            $this->height .
            __CLASS__
>>>>>>> 50f5a6f (Initial commit from local project)
        );
    }
}
