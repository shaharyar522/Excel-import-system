<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\Engine;

use PhpOffice\PhpSpreadsheet\Calculation\Exception;

class BranchPruner
{
<<<<<<< HEAD
    protected bool $branchPruningEnabled;

    /**
     * Used to generate unique store keys.
     */
    private int $branchStoreKeyCounter = 0;

    /**
     * currently pending storeKey (last item of the storeKeysStack.
     */
    protected ?string $pendingStoreKey = null;
=======
    /**
     * @var bool
     */
    protected $branchPruningEnabled = true;

    /**
     * Used to generate unique store keys.
     *
     * @var int
     */
    private $branchStoreKeyCounter = 0;

    /**
     * currently pending storeKey (last item of the storeKeysStack.
     *
     * @var ?string
     */
    protected $pendingStoreKey;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * @var string[]
     */
<<<<<<< HEAD
    protected array $storeKeysStack = [];
=======
    protected $storeKeysStack = [];
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * @var bool[]
     */
<<<<<<< HEAD
    protected array $conditionMap = [];
=======
    protected $conditionMap = [];
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * @var bool[]
     */
<<<<<<< HEAD
    protected array $thenMap = [];
=======
    protected $thenMap = [];
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * @var bool[]
     */
<<<<<<< HEAD
    protected array $elseMap = [];
=======
    protected $elseMap = [];
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * @var int[]
     */
<<<<<<< HEAD
    protected array $braceDepthMap = [];

    protected ?string $currentCondition = null;

    protected ?string $currentOnlyIf = null;

    protected ?string $currentOnlyIfNot = null;

    protected ?string $previousStoreKey = null;
=======
    protected $braceDepthMap = [];

    /**
     * @var null|string
     */
    protected $currentCondition;

    /**
     * @var null|string
     */
    protected $currentOnlyIf;

    /**
     * @var null|string
     */
    protected $currentOnlyIfNot;

    /**
     * @var null|string
     */
    protected $previousStoreKey;
>>>>>>> 50f5a6f (Initial commit from local project)

    public function __construct(bool $branchPruningEnabled)
    {
        $this->branchPruningEnabled = $branchPruningEnabled;
    }

    public function clearBranchStore(): void
    {
        $this->branchStoreKeyCounter = 0;
    }

    public function initialiseForLoop(): void
    {
        $this->currentCondition = null;
        $this->currentOnlyIf = null;
        $this->currentOnlyIfNot = null;
        $this->previousStoreKey = null;
        $this->pendingStoreKey = empty($this->storeKeysStack) ? null : end($this->storeKeysStack);

        if ($this->branchPruningEnabled) {
            $this->initialiseCondition();
            $this->initialiseThen();
            $this->initialiseElse();
        }
    }

    private function initialiseCondition(): void
    {
        if (isset($this->conditionMap[$this->pendingStoreKey]) && $this->conditionMap[$this->pendingStoreKey]) {
            $this->currentCondition = $this->pendingStoreKey;
            $stackDepth = count($this->storeKeysStack);
            if ($stackDepth > 1) {
                // nested if
                $this->previousStoreKey = $this->storeKeysStack[$stackDepth - 2];
            }
        }
    }

    private function initialiseThen(): void
    {
        if (isset($this->thenMap[$this->pendingStoreKey]) && $this->thenMap[$this->pendingStoreKey]) {
            $this->currentOnlyIf = $this->pendingStoreKey;
        } elseif (
            isset($this->previousStoreKey, $this->thenMap[$this->previousStoreKey])
            && $this->thenMap[$this->previousStoreKey]
        ) {
            $this->currentOnlyIf = $this->previousStoreKey;
        }
    }

    private function initialiseElse(): void
    {
        if (isset($this->elseMap[$this->pendingStoreKey]) && $this->elseMap[$this->pendingStoreKey]) {
            $this->currentOnlyIfNot = $this->pendingStoreKey;
        } elseif (
            isset($this->previousStoreKey, $this->elseMap[$this->previousStoreKey])
            && $this->elseMap[$this->previousStoreKey]
        ) {
            $this->currentOnlyIfNot = $this->previousStoreKey;
        }
    }

    public function decrementDepth(): void
    {
        if (!empty($this->pendingStoreKey)) {
            --$this->braceDepthMap[$this->pendingStoreKey];
        }
    }

    public function incrementDepth(): void
    {
        if (!empty($this->pendingStoreKey)) {
            ++$this->braceDepthMap[$this->pendingStoreKey];
        }
    }

    public function functionCall(string $functionName): void
    {
        if ($this->branchPruningEnabled && ($functionName === 'IF(')) {
            // we handle a new if
            $this->pendingStoreKey = $this->getUnusedBranchStoreKey();
            $this->storeKeysStack[] = $this->pendingStoreKey;
            $this->conditionMap[$this->pendingStoreKey] = true;
            $this->braceDepthMap[$this->pendingStoreKey] = 0;
        } elseif (!empty($this->pendingStoreKey) && array_key_exists($this->pendingStoreKey, $this->braceDepthMap)) {
            // this is not an if but we go deeper
            ++$this->braceDepthMap[$this->pendingStoreKey];
        }
    }

    public function argumentSeparator(): void
    {
        if (!empty($this->pendingStoreKey) && $this->braceDepthMap[$this->pendingStoreKey] === 0) {
            // We must go to the IF next argument
            if ($this->conditionMap[$this->pendingStoreKey]) {
                $this->conditionMap[$this->pendingStoreKey] = false;
                $this->thenMap[$this->pendingStoreKey] = true;
            } elseif ($this->thenMap[$this->pendingStoreKey]) {
                $this->thenMap[$this->pendingStoreKey] = false;
                $this->elseMap[$this->pendingStoreKey] = true;
            } elseif ($this->elseMap[$this->pendingStoreKey]) {
                throw new Exception('Reaching fourth argument of an IF');
            }
        }
    }

<<<<<<< HEAD
    public function closingBrace(mixed $value): void
=======
    /**
     * @param mixed $value
     */
    public function closingBrace($value): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (!empty($this->pendingStoreKey) && $this->braceDepthMap[$this->pendingStoreKey] === -1) {
            // we are closing an IF(
            if ($value !== 'IF(') {
                throw new Exception('Parser bug we should be in an "IF("');
            }

            if ($this->conditionMap[$this->pendingStoreKey]) {
                throw new Exception('We should not be expecting a condition');
            }

            $this->thenMap[$this->pendingStoreKey] = false;
            $this->elseMap[$this->pendingStoreKey] = false;
            --$this->braceDepthMap[$this->pendingStoreKey];
            array_pop($this->storeKeysStack);
            $this->pendingStoreKey = null;
        }
    }

    public function currentCondition(): ?string
    {
        return $this->currentCondition;
    }

    public function currentOnlyIf(): ?string
    {
        return $this->currentOnlyIf;
    }

    public function currentOnlyIfNot(): ?string
    {
        return $this->currentOnlyIfNot;
    }

    private function getUnusedBranchStoreKey(): string
    {
        $storeKeyValue = 'storeKey-' . $this->branchStoreKeyCounter;
        ++$this->branchStoreKeyCounter;

        return $storeKeyValue;
    }
}
