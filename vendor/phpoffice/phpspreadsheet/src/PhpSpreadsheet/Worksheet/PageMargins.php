<?php

namespace PhpOffice\PhpSpreadsheet\Worksheet;

class PageMargins
{
    /**
     * Left.
<<<<<<< HEAD
     */
    private float $left = 0.7;

    /**
     * Right.
     */
    private float $right = 0.7;

    /**
     * Top.
     */
    private float $top = 0.75;

    /**
     * Bottom.
     */
    private float $bottom = 0.75;

    /**
     * Header.
     */
    private float $header = 0.3;

    /**
     * Footer.
     */
    private float $footer = 0.3;
=======
     *
     * @var float
     */
    private $left = 0.7;

    /**
     * Right.
     *
     * @var float
     */
    private $right = 0.7;

    /**
     * Top.
     *
     * @var float
     */
    private $top = 0.75;

    /**
     * Bottom.
     *
     * @var float
     */
    private $bottom = 0.75;

    /**
     * Header.
     *
     * @var float
     */
    private $header = 0.3;

    /**
     * Footer.
     *
     * @var float
     */
    private $footer = 0.3;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Create a new PageMargins.
     */
    public function __construct()
    {
    }

    /**
     * Get Left.
<<<<<<< HEAD
     */
    public function getLeft(): float
=======
     *
     * @return float
     */
    public function getLeft()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->left;
    }

    /**
     * Set Left.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setLeft(float $left): static
=======
     * @param float $left
     *
     * @return $this
     */
    public function setLeft($left)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->left = $left;

        return $this;
    }

    /**
     * Get Right.
<<<<<<< HEAD
     */
    public function getRight(): float
=======
     *
     * @return float
     */
    public function getRight()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->right;
    }

    /**
     * Set Right.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setRight(float $right): static
=======
     * @param float $right
     *
     * @return $this
     */
    public function setRight($right)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->right = $right;

        return $this;
    }

    /**
     * Get Top.
<<<<<<< HEAD
     */
    public function getTop(): float
=======
     *
     * @return float
     */
    public function getTop()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->top;
    }

    /**
     * Set Top.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setTop(float $top): static
=======
     * @param float $top
     *
     * @return $this
     */
    public function setTop($top)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->top = $top;

        return $this;
    }

    /**
     * Get Bottom.
<<<<<<< HEAD
     */
    public function getBottom(): float
=======
     *
     * @return float
     */
    public function getBottom()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->bottom;
    }

    /**
     * Set Bottom.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setBottom(float $bottom): static
=======
     * @param float $bottom
     *
     * @return $this
     */
    public function setBottom($bottom)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->bottom = $bottom;

        return $this;
    }

    /**
     * Get Header.
<<<<<<< HEAD
     */
    public function getHeader(): float
=======
     *
     * @return float
     */
    public function getHeader()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->header;
    }

    /**
     * Set Header.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setHeader(float $header): static
=======
     * @param float $header
     *
     * @return $this
     */
    public function setHeader($header)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->header = $header;

        return $this;
    }

    /**
     * Get Footer.
<<<<<<< HEAD
     */
    public function getFooter(): float
=======
     *
     * @return float
     */
    public function getFooter()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->footer;
    }

    /**
     * Set Footer.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setFooter(float $footer): static
=======
     * @param float $footer
     *
     * @return $this
     */
    public function setFooter($footer)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->footer = $footer;

        return $this;
    }

    public static function fromCentimeters(float $value): float
    {
        return $value / 2.54;
    }

    public static function toCentimeters(float $value): float
    {
        return $value * 2.54;
    }

    public static function fromMillimeters(float $value): float
    {
        return $value / 25.4;
    }

    public static function toMillimeters(float $value): float
    {
        return $value * 25.4;
    }

    public static function fromPoints(float $value): float
    {
        return $value / 72;
    }

    public static function toPoints(float $value): float
    {
        return $value * 72;
    }
}
