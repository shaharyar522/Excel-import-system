<?php

namespace PhpOffice\PhpSpreadsheet\Reader\Xlsx;

use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
<<<<<<< HEAD
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
=======
>>>>>>> 50f5a6f (Initial commit from local project)
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use SimpleXMLElement;

class DataValidations
{
<<<<<<< HEAD
    private Worksheet $worksheet;

    private SimpleXMLElement $worksheetXml;
=======
    /** @var Worksheet */
    private $worksheet;

    /** @var SimpleXMLElement */
    private $worksheetXml;
>>>>>>> 50f5a6f (Initial commit from local project)

    public function __construct(Worksheet $workSheet, SimpleXMLElement $worksheetXml)
    {
        $this->worksheet = $workSheet;
        $this->worksheetXml = $worksheetXml;
    }

    public function load(): void
    {
        foreach ($this->worksheetXml->dataValidations->dataValidation as $dataValidation) {
            // Uppercase coordinate
            $range = strtoupper((string) $dataValidation['sqref']);
            $rangeSet = explode(' ', $range);
            foreach ($rangeSet as $range) {
<<<<<<< HEAD
                if (preg_match('/^[A-Z]{1,3}\d{1,7}/', $range, $matches) === 1) {
=======
                if (preg_match('/^[A-Z]{1,3}\\d{1,7}/', $range, $matches) === 1) {
>>>>>>> 50f5a6f (Initial commit from local project)
                    // Ensure left/top row of range exists, thereby
                    // adjusting high row/column.
                    $this->worksheet->getCell($matches[0]);
                }
            }
        }
        foreach ($this->worksheetXml->dataValidations->dataValidation as $dataValidation) {
            // Uppercase coordinate
            $range = strtoupper((string) $dataValidation['sqref']);
<<<<<<< HEAD
            $docValidation = new DataValidation();
            $docValidation->setType((string) $dataValidation['type']);
            $docValidation->setErrorStyle((string) $dataValidation['errorStyle']);
            $docValidation->setOperator((string) $dataValidation['operator']);
            $docValidation->setAllowBlank(filter_var($dataValidation['allowBlank'], FILTER_VALIDATE_BOOLEAN));
            // showDropDown is inverted (works as hideDropDown if true)
            $docValidation->setShowDropDown(!filter_var($dataValidation['showDropDown'], FILTER_VALIDATE_BOOLEAN));
            $docValidation->setShowInputMessage(filter_var($dataValidation['showInputMessage'], FILTER_VALIDATE_BOOLEAN));
            $docValidation->setShowErrorMessage(filter_var($dataValidation['showErrorMessage'], FILTER_VALIDATE_BOOLEAN));
            $docValidation->setErrorTitle((string) $dataValidation['errorTitle']);
            $docValidation->setError((string) $dataValidation['error']);
            $docValidation->setPromptTitle((string) $dataValidation['promptTitle']);
            $docValidation->setPrompt((string) $dataValidation['prompt']);
            $docValidation->setFormula1(Xlsx::replacePrefixes((string) $dataValidation->formula1));
            $docValidation->setFormula2(Xlsx::replacePrefixes((string) $dataValidation->formula2));
            $this->worksheet->setDataValidation($range, $docValidation);
=======
            $rangeSet = explode(' ', $range);
            foreach ($rangeSet as $range) {
                $stRange = $this->worksheet->shrinkRangeToFit($range);

                // Extract all cell references in $range
                foreach (Coordinate::extractAllCellReferencesInRange($stRange) as $reference) {
                    // Create validation
                    $docValidation = $this->worksheet->getCell($reference)->getDataValidation();
                    $docValidation->setType((string) $dataValidation['type']);
                    $docValidation->setErrorStyle((string) $dataValidation['errorStyle']);
                    $docValidation->setOperator((string) $dataValidation['operator']);
                    $docValidation->setAllowBlank(filter_var($dataValidation['allowBlank'], FILTER_VALIDATE_BOOLEAN));
                    // showDropDown is inverted (works as hideDropDown if true)
                    $docValidation->setShowDropDown(!filter_var($dataValidation['showDropDown'], FILTER_VALIDATE_BOOLEAN));
                    $docValidation->setShowInputMessage(filter_var($dataValidation['showInputMessage'], FILTER_VALIDATE_BOOLEAN));
                    $docValidation->setShowErrorMessage(filter_var($dataValidation['showErrorMessage'], FILTER_VALIDATE_BOOLEAN));
                    $docValidation->setErrorTitle((string) $dataValidation['errorTitle']);
                    $docValidation->setError((string) $dataValidation['error']);
                    $docValidation->setPromptTitle((string) $dataValidation['promptTitle']);
                    $docValidation->setPrompt((string) $dataValidation['prompt']);
                    $docValidation->setFormula1((string) $dataValidation->formula1);
                    $docValidation->setFormula2((string) $dataValidation->formula2);
                    $docValidation->setSqref($range);
                }
            }
>>>>>>> 50f5a6f (Initial commit from local project)
        }
    }
}
