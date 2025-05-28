<?php

namespace PhpOffice\PhpSpreadsheet\Style\ConditionalFormatting\Wizard;

use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Style\Conditional;

/**
 * @method Errors duplicates()
 * @method Errors unique()
 */
class Duplicates extends WizardAbstract implements WizardInterface
{
    protected const OPERATORS = [
        'duplicates' => false,
        'unique' => true,
    ];

<<<<<<< HEAD
    protected bool $inverse;
=======
    /**
     * @var bool
     */
    protected $inverse;
>>>>>>> 50f5a6f (Initial commit from local project)

    public function __construct(string $cellRange, bool $inverse = false)
    {
        parent::__construct($cellRange);
        $this->inverse = $inverse;
    }

    protected function inverse(bool $inverse): void
    {
        $this->inverse = $inverse;
    }

    public function getConditional(): Conditional
    {
        $conditional = new Conditional();
        $conditional->setConditionType(
            $this->inverse ? Conditional::CONDITION_UNIQUE : Conditional::CONDITION_DUPLICATES
        );
        $conditional->setStyle($this->getStyle());
        $conditional->setStopIfTrue($this->getStopIfTrue());

        return $conditional;
    }

    public static function fromConditional(Conditional $conditional, string $cellRange = 'A1'): WizardInterface
    {
        if (
<<<<<<< HEAD
            $conditional->getConditionType() !== Conditional::CONDITION_DUPLICATES
            && $conditional->getConditionType() !== Conditional::CONDITION_UNIQUE
=======
            $conditional->getConditionType() !== Conditional::CONDITION_DUPLICATES &&
            $conditional->getConditionType() !== Conditional::CONDITION_UNIQUE
>>>>>>> 50f5a6f (Initial commit from local project)
        ) {
            throw new Exception('Conditional is not a Duplicates CF Rule conditional');
        }

        $wizard = new self($cellRange);
        $wizard->style = $conditional->getStyle();
        $wizard->stopIfTrue = $conditional->getStopIfTrue();
        $wizard->inverse = $conditional->getConditionType() === Conditional::CONDITION_UNIQUE;

        return $wizard;
    }

    /**
<<<<<<< HEAD
     * @param mixed[] $arguments
     */
    public function __call(string $methodName, array $arguments): self
=======
     * @param string $methodName
     * @param mixed[] $arguments
     */
    public function __call($methodName, $arguments): self
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (!array_key_exists($methodName, self::OPERATORS)) {
            throw new Exception('Invalid Operation for Errors CF Rule Wizard');
        }

        $this->inverse(self::OPERATORS[$methodName]);

        return $this;
    }
}
