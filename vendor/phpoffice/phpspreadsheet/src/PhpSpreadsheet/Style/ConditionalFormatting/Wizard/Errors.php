<?php

namespace PhpOffice\PhpSpreadsheet\Style\ConditionalFormatting\Wizard;

use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Style\Conditional;
use PhpOffice\PhpSpreadsheet\Style\ConditionalFormatting\Wizard;

/**
 * @method Errors notError()
 * @method Errors isError()
 */
class Errors extends WizardAbstract implements WizardInterface
{
    protected const OPERATORS = [
        'notError' => false,
        'isError' => true,
    ];

    protected const EXPRESSIONS = [
        Wizard::NOT_ERRORS => 'NOT(ISERROR(%s))',
        Wizard::ERRORS => 'ISERROR(%s)',
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

    protected function getExpression(): void
    {
        $this->expression = sprintf(
            self::EXPRESSIONS[$this->inverse ? Wizard::ERRORS : Wizard::NOT_ERRORS],
            $this->referenceCell
        );
    }

    public function getConditional(): Conditional
    {
        $this->getExpression();

        $conditional = new Conditional();
        $conditional->setConditionType(
            $this->inverse ? Conditional::CONDITION_CONTAINSERRORS : Conditional::CONDITION_NOTCONTAINSERRORS
        );
        $conditional->setConditions([$this->expression]);
        $conditional->setStyle($this->getStyle());
        $conditional->setStopIfTrue($this->getStopIfTrue());

        return $conditional;
    }

    public static function fromConditional(Conditional $conditional, string $cellRange = 'A1'): WizardInterface
    {
        if (
<<<<<<< HEAD
            $conditional->getConditionType() !== Conditional::CONDITION_CONTAINSERRORS
            && $conditional->getConditionType() !== Conditional::CONDITION_NOTCONTAINSERRORS
=======
            $conditional->getConditionType() !== Conditional::CONDITION_CONTAINSERRORS &&
            $conditional->getConditionType() !== Conditional::CONDITION_NOTCONTAINSERRORS
>>>>>>> 50f5a6f (Initial commit from local project)
        ) {
            throw new Exception('Conditional is not an Errors CF Rule conditional');
        }

        $wizard = new self($cellRange);
        $wizard->style = $conditional->getStyle();
        $wizard->stopIfTrue = $conditional->getStopIfTrue();
        $wizard->inverse = $conditional->getConditionType() === Conditional::CONDITION_CONTAINSERRORS;

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
