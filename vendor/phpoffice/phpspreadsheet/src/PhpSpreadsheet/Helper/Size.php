<?php

namespace PhpOffice\PhpSpreadsheet\Helper;

<<<<<<< HEAD
use Stringable;

class Size implements Stringable
{
    const REGEXP_SIZE_VALIDATION = '/^(?P<size>\d*\.?\d+)(?P<unit>pt|px|em)?$/i';

    protected bool $valid = false;

    protected string $size = '';

    protected string $unit = '';

    public function __construct(string $size)
    {
        if (1 === preg_match(self::REGEXP_SIZE_VALIDATION, $size, $matches)) {
            $this->valid = true;
=======
class Size
{
    const REGEXP_SIZE_VALIDATION = '/^(?P<size>\d*\.?\d+)(?P<unit>pt|px|em)?$/i';

    /**
     * @var bool
     */
    protected $valid;

    /**
     * @var string
     */
    protected $size = '';

    /**
     * @var string
     */
    protected $unit = '';

    public function __construct(string $size)
    {
        $this->valid = (bool) preg_match(self::REGEXP_SIZE_VALIDATION, $size, $matches);
        if ($this->valid) {
>>>>>>> 50f5a6f (Initial commit from local project)
            $this->size = $matches['size'];
            $this->unit = $matches['unit'] ?? 'pt';
        }
    }

    public function valid(): bool
    {
        return $this->valid;
    }

    public function size(): string
    {
        return $this->size;
    }

    public function unit(): string
    {
        return $this->unit;
    }

<<<<<<< HEAD
    public function __toString(): string
=======
    public function __toString()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->size . $this->unit;
    }
}
