<?php

namespace PhpOffice\PhpSpreadsheet\Style;

use PhpOffice\PhpSpreadsheet\IComparable;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

abstract class Supervisor implements IComparable
{
    /**
     * Supervisor?
<<<<<<< HEAD
     */
    protected bool $isSupervisor;
=======
     *
     * @var bool
     */
    protected $isSupervisor;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Parent. Only used for supervisor.
     *
     * @var Spreadsheet|Supervisor
     */
    protected $parent;

    /**
     * Parent property name.
<<<<<<< HEAD
     */
    protected ?string $parentPropertyName = null;
=======
     *
     * @var null|string
     */
    protected $parentPropertyName;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Create a new Supervisor.
     *
     * @param bool $isSupervisor Flag indicating if this is a supervisor or not
     *                                    Leave this value at default unless you understand exactly what
     *                                        its ramifications are
     */
<<<<<<< HEAD
    public function __construct(bool $isSupervisor = false)
=======
    public function __construct($isSupervisor = false)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        // Supervisor?
        $this->isSupervisor = $isSupervisor;
    }

    /**
     * Bind parent. Only used for supervisor.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function bindParent(Spreadsheet|self $parent, ?string $parentPropertyName = null)
=======
     * @param Spreadsheet|Supervisor $parent
     * @param null|string $parentPropertyName
     *
     * @return $this
     */
    public function bindParent($parent, $parentPropertyName = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->parent = $parent;
        $this->parentPropertyName = $parentPropertyName;

        return $this;
    }

    /**
     * Is this a supervisor or a cell style component?
<<<<<<< HEAD
     */
    public function getIsSupervisor(): bool
=======
     *
     * @return bool
     */
    public function getIsSupervisor()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->isSupervisor;
    }

    /**
     * Get the currently active sheet. Only used for supervisor.
<<<<<<< HEAD
     */
    public function getActiveSheet(): Worksheet
=======
     *
     * @return Worksheet
     */
    public function getActiveSheet()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->parent->getActiveSheet();
    }

    /**
     * Get the currently active cell coordinate in currently active sheet.
     * Only used for supervisor.
     *
     * @return string E.g. 'A1'
     */
<<<<<<< HEAD
    public function getSelectedCells(): string
=======
    public function getSelectedCells()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->getActiveSheet()->getSelectedCells();
    }

    /**
     * Get the currently active cell coordinate in currently active sheet.
     * Only used for supervisor.
     *
     * @return string E.g. 'A1'
     */
<<<<<<< HEAD
    public function getActiveCell(): string
=======
    public function getActiveCell()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->getActiveSheet()->getActiveCell();
    }

    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
        $vars = get_object_vars($this);
        foreach ($vars as $key => $value) {
            if ((is_object($value)) && ($key != 'parent')) {
                $this->$key = clone $value;
            } else {
                $this->$key = $value;
            }
        }
    }

    /**
     * Export style as array.
     *
     * Available to anything which extends this class:
     * Alignment, Border, Borders, Color, Fill, Font,
     * NumberFormat, Protection, and Style.
     */
    final public function exportArray(): array
    {
        return $this->exportArray1();
    }

    /**
     * Abstract method to be implemented in anything which
     * extends this class.
     *
     * This method invokes exportArray2 with the names and values
     * of all properties to be included in output array,
     * returning that array to exportArray, then to caller.
     */
    abstract protected function exportArray1(): array;

    /**
     * Populate array from exportArray1.
     * This method is available to anything which extends this class.
     * The parameter index is the key to be added to the array.
     * The parameter objOrValue is either a primitive type,
     * which is the value added to the array,
     * or a Style object to be recursively added via exportArray.
<<<<<<< HEAD
     */
    final protected function exportArray2(array &$exportedArray, string $index, mixed $objOrValue): void
=======
     *
     * @param mixed $objOrValue
     */
    final protected function exportArray2(array &$exportedArray, string $index, $objOrValue): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($objOrValue instanceof self) {
            $exportedArray[$index] = $objOrValue->exportArray();
        } else {
            $exportedArray[$index] = $objOrValue;
        }
    }

    /**
     * Get the shared style component for the currently active cell in currently active sheet.
     * Only used for style supervisor.
<<<<<<< HEAD
     */
    abstract public function getSharedComponent(): mixed;

    /**
     * Build style array from subcomponents.
     */
    abstract public function getStyleArray(array $array): array;
=======
     *
     * @return mixed
     */
    abstract public function getSharedComponent();

    /**
     * Build style array from subcomponents.
     *
     * @param array $array
     *
     * @return array
     */
    abstract public function getStyleArray($array);
>>>>>>> 50f5a6f (Initial commit from local project)
}
