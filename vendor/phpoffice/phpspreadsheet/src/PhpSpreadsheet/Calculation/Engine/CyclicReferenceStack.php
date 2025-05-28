<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\Engine;

class CyclicReferenceStack
{
    /**
     * The call stack for calculated cells.
     *
     * @var mixed[]
     */
<<<<<<< HEAD
    private array $stack = [];

    /**
     * Return the number of entries on the stack.
     */
    public function count(): int
=======
    private $stack = [];

    /**
     * Return the number of entries on the stack.
     *
     * @return int
     */
    public function count()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return count($this->stack);
    }

    /**
     * Push a new entry onto the stack.
<<<<<<< HEAD
     */
    public function push(mixed $value): void
=======
     *
     * @param mixed $value
     */
    public function push($value): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->stack[$value] = $value;
    }

    /**
     * Pop the last entry from the stack.
<<<<<<< HEAD
     */
    public function pop(): mixed
=======
     *
     * @return mixed
     */
    public function pop()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return array_pop($this->stack);
    }

    /**
     * Test to see if a specified entry exists on the stack.
     *
     * @param mixed $value The value to test
<<<<<<< HEAD
     */
    public function onStack(mixed $value): bool
=======
     *
     * @return bool
     */
    public function onStack($value)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return isset($this->stack[$value]);
    }

    /**
     * Clear the stack.
     */
    public function clear(): void
    {
        $this->stack = [];
    }

    /**
     * Return an array of all entries on the stack.
     *
     * @return mixed[]
     */
<<<<<<< HEAD
    public function showStack(): array
=======
    public function showStack()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->stack;
    }
}
