<?php

namespace PhpOffice\PhpSpreadsheet;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

abstract class DefinedName
{
    protected const REGEXP_IDENTIFY_FORMULA = '[^_\p{N}\p{L}:, \$\'!]';

    /**
     * Name.
<<<<<<< HEAD
     */
    protected string $name;

    /**
     * Worksheet on which the defined name can be resolved.
     */
    protected ?Worksheet $worksheet;

    /**
     * Value of the named object.
     */
    protected string $value;

    /**
     * Is the defined named local? (i.e. can only be used on $this->worksheet).
     */
    protected bool $localOnly;

    /**
     * Scope.
     */
    protected ?Worksheet $scope;

    /**
     * Whether this is a named range or a named formula.
     */
    protected bool $isFormula;
=======
     *
     * @var string
     */
    protected $name;

    /**
     * Worksheet on which the defined name can be resolved.
     *
     * @var ?Worksheet
     */
    protected $worksheet;

    /**
     * Value of the named object.
     *
     * @var string
     */
    protected $value;

    /**
     * Is the defined named local? (i.e. can only be used on $this->worksheet).
     *
     * @var bool
     */
    protected $localOnly;

    /**
     * Scope.
     *
     * @var ?Worksheet
     */
    protected $scope;

    /**
     * Whether this is a named range or a named formula.
     *
     * @var bool
     */
    protected $isFormula;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Create a new Defined Name.
     */
    public function __construct(
        string $name,
        ?Worksheet $worksheet = null,
        ?string $value = null,
        bool $localOnly = false,
        ?Worksheet $scope = null
    ) {
        if ($worksheet === null) {
            $worksheet = $scope;
        }

        // Set local members
        $this->name = $name;
        $this->worksheet = $worksheet;
        $this->value = (string) $value;
        $this->localOnly = $localOnly;
        // If local only, then the scope will be set to worksheet unless a scope is explicitly set
        $this->scope = ($localOnly === true) ? (($scope === null) ? $worksheet : $scope) : null;
        // If the range string contains characters that aren't associated with the range definition (A-Z,1-9
        //      for cell references, and $, or the range operators (colon comma or space), quotes and ! for
        //      worksheet names
        //  then this is treated as a named formula, and not a named range
        $this->isFormula = self::testIfFormula($this->value);
    }

<<<<<<< HEAD
    public function __destruct()
    {
        $this->worksheet = null;
        $this->scope = null;
    }

=======
>>>>>>> 50f5a6f (Initial commit from local project)
    /**
     * Create a new defined name, either a range or a formula.
     */
    public static function createInstance(
        string $name,
        ?Worksheet $worksheet = null,
        ?string $value = null,
        bool $localOnly = false,
        ?Worksheet $scope = null
    ): self {
        $value = (string) $value;
        $isFormula = self::testIfFormula($value);
        if ($isFormula) {
            return new NamedFormula($name, $worksheet, $value, $localOnly, $scope);
        }

        return new NamedRange($name, $worksheet, $value, $localOnly, $scope);
    }

    public static function testIfFormula(string $value): bool
    {
<<<<<<< HEAD
        if (str_starts_with($value, '=')) {
=======
        if (substr($value, 0, 1) === '=') {
>>>>>>> 50f5a6f (Initial commit from local project)
            $value = substr($value, 1);
        }

        if (is_numeric($value)) {
            return true;
        }

        $segMatcher = false;
        foreach (explode("'", $value) as $subVal) {
            //    Only test in alternate array entries (the non-quoted blocks)
            $segMatcher = $segMatcher === false;
            if (
<<<<<<< HEAD
                $segMatcher
                && (preg_match('/' . self::REGEXP_IDENTIFY_FORMULA . '/miu', $subVal))
=======
                $segMatcher &&
                (preg_match('/' . self::REGEXP_IDENTIFY_FORMULA . '/miu', $subVal))
>>>>>>> 50f5a6f (Initial commit from local project)
            ) {
                return true;
            }
        }

        return false;
    }

    /**
     * Get name.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set name.
     */
    public function setName(string $name): self
    {
        if (!empty($name)) {
            // Old title
            $oldTitle = $this->name;

            // Re-attach
            if ($this->worksheet !== null) {
                $this->worksheet->getParentOrThrow()->removeNamedRange($this->name, $this->worksheet);
            }
            $this->name = $name;

            if ($this->worksheet !== null) {
                $this->worksheet->getParentOrThrow()->addDefinedName($this);
            }

            if ($this->worksheet !== null) {
                // New title
                $newTitle = $this->name;
                ReferenceHelper::getInstance()->updateNamedFormulae($this->worksheet->getParentOrThrow(), $oldTitle, $newTitle);
            }
        }

        return $this;
    }

    /**
     * Get worksheet.
     */
    public function getWorksheet(): ?Worksheet
    {
        return $this->worksheet;
    }

    /**
     * Set worksheet.
     */
    public function setWorksheet(?Worksheet $worksheet): self
    {
        $this->worksheet = $worksheet;

        return $this;
    }

    /**
     * Get range or formula value.
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Set range or formula  value.
     */
    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get localOnly.
     */
    public function getLocalOnly(): bool
    {
        return $this->localOnly;
    }

    /**
     * Set localOnly.
     */
    public function setLocalOnly(bool $localScope): self
    {
        $this->localOnly = $localScope;
        $this->scope = $localScope ? $this->worksheet : null;

        return $this;
    }

    /**
     * Get scope.
     */
    public function getScope(): ?Worksheet
    {
        return $this->scope;
    }

    /**
     * Set scope.
     */
    public function setScope(?Worksheet $worksheet): self
    {
        $this->scope = $worksheet;
        $this->localOnly = $worksheet !== null;

        return $this;
    }

    /**
     * Identify whether this is a named range or a named formula.
     */
    public function isFormula(): bool
    {
        return $this->isFormula;
    }

    /**
     * Resolve a named range to a regular cell range or formula.
     */
    public static function resolveName(string $definedName, Worksheet $worksheet, string $sheetName = ''): ?self
    {
        if ($sheetName === '') {
            $worksheet2 = $worksheet;
        } else {
            $worksheet2 = $worksheet->getParentOrThrow()->getSheetByName($sheetName);
            if ($worksheet2 === null) {
                return null;
            }
        }

        return $worksheet->getParentOrThrow()->getDefinedName($definedName, $worksheet2);
    }

    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
        $vars = get_object_vars($this);
        foreach ($vars as $key => $value) {
            if (is_object($value)) {
                $this->$key = clone $value;
            } else {
                $this->$key = $value;
            }
        }
    }
}
