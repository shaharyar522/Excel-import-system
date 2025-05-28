<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\Token;

use PhpOffice\PhpSpreadsheet\Calculation\Calculation;
use PhpOffice\PhpSpreadsheet\Calculation\Engine\BranchPruner;
<<<<<<< HEAD
use PhpOffice\PhpSpreadsheet\Shared\StringHelper;

class Stack
{
    private BranchPruner $branchPruner;
=======

class Stack
{
    /**
     * @var BranchPruner
     */
    private $branchPruner;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * The parser stack for formulae.
     *
<<<<<<< HEAD
     * @var array<int, array>
     */
    private array $stack = [];

    /**
     * Count of entries in the parser stack.
     */
    private int $count = 0;
=======
     * @var mixed[]
     */
    private $stack = [];

    /**
     * Count of entries in the parser stack.
     *
     * @var int
     */
    private $count = 0;
>>>>>>> 50f5a6f (Initial commit from local project)

    public function __construct(BranchPruner $branchPruner)
    {
        $this->branchPruner = $branchPruner;
    }

    /**
     * Return the number of entries on the stack.
     */
    public function count(): int
    {
        return $this->count;
    }

    /**
     * Push a new entry onto the stack.
<<<<<<< HEAD
     */
    public function push(string $type, mixed $value, ?string $reference = null): void
=======
     *
     * @param mixed $value
     */
    public function push(string $type, $value, ?string $reference = null): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $stackItem = $this->getStackItem($type, $value, $reference);
        $this->stack[$this->count++] = $stackItem;

        if ($type === 'Function') {
<<<<<<< HEAD
            $localeFunction = Calculation::localeFunc(StringHelper::convertToString($value));
=======
            $localeFunction = Calculation::localeFunc($value);
>>>>>>> 50f5a6f (Initial commit from local project)
            if ($localeFunction != $value) {
                $this->stack[($this->count - 1)]['localeValue'] = $localeFunction;
            }
        }
    }

    public function pushStackItem(array $stackItem): void
    {
        $this->stack[$this->count++] = $stackItem;
    }

<<<<<<< HEAD
    public function getStackItem(string $type, mixed $value, ?string $reference = null): array
=======
    /**
     * @param mixed $value
     */
    public function getStackItem(string $type, $value, ?string $reference = null): array
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $stackItem = [
            'type' => $type,
            'value' => $value,
            'reference' => $reference,
        ];

        // will store the result under this alias
        $storeKey = $this->branchPruner->currentCondition();
        if (isset($storeKey) || $reference === 'NULL') {
            $stackItem['storeKey'] = $storeKey;
        }

        // will only run computation if the matching store key is true
        $onlyIf = $this->branchPruner->currentOnlyIf();
        if (isset($onlyIf) || $reference === 'NULL') {
            $stackItem['onlyIf'] = $onlyIf;
        }

        // will only run computation if the matching store key is false
        $onlyIfNot = $this->branchPruner->currentOnlyIfNot();
        if (isset($onlyIfNot) || $reference === 'NULL') {
            $stackItem['onlyIfNot'] = $onlyIfNot;
        }

        return $stackItem;
    }

    /**
     * Pop the last entry from the stack.
     */
    public function pop(): ?array
    {
        if ($this->count > 0) {
            return $this->stack[--$this->count];
        }

        return null;
    }

    /**
     * Return an entry from the stack without removing it.
     */
    public function last(int $n = 1): ?array
    {
        if ($this->count - $n < 0) {
            return null;
        }

        return $this->stack[$this->count - $n];
    }

    /**
     * Clear the stack.
     */
    public function clear(): void
    {
        $this->stack = [];
        $this->count = 0;
    }
}
