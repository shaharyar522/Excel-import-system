<?php

namespace PhpOffice\PhpSpreadsheet\Cell;

class Hyperlink
{
    /**
     * URL to link the cell to.
<<<<<<< HEAD
     */
    private string $url;

    /**
     * Tooltip to display on the hyperlink.
     */
    private string $tooltip;
=======
     *
     * @var string
     */
    private $url;

    /**
     * Tooltip to display on the hyperlink.
     *
     * @var string
     */
    private $tooltip;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Create a new Hyperlink.
     *
     * @param string $url Url to link the cell to
     * @param string $tooltip Tooltip to display on the hyperlink
     */
<<<<<<< HEAD
    public function __construct(string $url = '', string $tooltip = '')
=======
    public function __construct($url = '', $tooltip = '')
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // Initialise member variables
        $this->url = $url;
        $this->tooltip = $tooltip;
    }

    /**
     * Get URL.
<<<<<<< HEAD
     */
    public function getUrl(): string
=======
     *
     * @return string
     */
    public function getUrl()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->url;
    }

    /**
     * Set URL.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setUrl(string $url): static
=======
     * @param string $url
     *
     * @return $this
     */
    public function setUrl($url)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get tooltip.
<<<<<<< HEAD
     */
    public function getTooltip(): string
=======
     *
     * @return string
     */
    public function getTooltip()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->tooltip;
    }

    /**
     * Set tooltip.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setTooltip(string $tooltip): static
=======
     * @param string $tooltip
     *
     * @return $this
     */
    public function setTooltip($tooltip)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->tooltip = $tooltip;

        return $this;
    }

    /**
     * Is this hyperlink internal? (to another worksheet).
<<<<<<< HEAD
     */
    public function isInternal(): bool
    {
        return str_contains($this->url, 'sheet://');
    }

    public function getTypeHyperlink(): string
=======
     *
     * @return bool
     */
    public function isInternal()
    {
        return strpos($this->url, 'sheet://') !== false;
    }

    /**
     * @return string
     */
    public function getTypeHyperlink()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->isInternal() ? '' : 'External';
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
            $this->url
            . $this->tooltip
            . __CLASS__
=======
    public function getHashCode()
    {
        return md5(
            $this->url .
            $this->tooltip .
            __CLASS__
>>>>>>> 50f5a6f (Initial commit from local project)
        );
    }
}
