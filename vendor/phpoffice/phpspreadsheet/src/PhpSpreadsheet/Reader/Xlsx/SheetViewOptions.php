<?php

namespace PhpOffice\PhpSpreadsheet\Reader\Xlsx;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use SimpleXMLElement;

class SheetViewOptions extends BaseParserClass
{
<<<<<<< HEAD
    private Worksheet $worksheet;

    private ?SimpleXMLElement $worksheetXml;
=======
    /** @var Worksheet */
    private $worksheet;

    /** @var ?SimpleXMLElement */
    private $worksheetXml;
>>>>>>> 50f5a6f (Initial commit from local project)

    public function __construct(Worksheet $workSheet, ?SimpleXMLElement $worksheetXml = null)
    {
        $this->worksheet = $workSheet;
        $this->worksheetXml = $worksheetXml;
    }

    public function load(bool $readDataOnly, Styles $styleReader): void
    {
        if ($this->worksheetXml === null) {
            return;
        }

        if (isset($this->worksheetXml->sheetPr)) {
            $sheetPr = $this->worksheetXml->sheetPr;
            $this->tabColor($sheetPr, $styleReader);
            $this->codeName($sheetPr);
            $this->outlines($sheetPr);
            $this->pageSetup($sheetPr);
        }

        if (isset($this->worksheetXml->sheetFormatPr)) {
            $this->sheetFormat($this->worksheetXml->sheetFormatPr);
        }

        if (!$readDataOnly && isset($this->worksheetXml->printOptions)) {
            $this->printOptions($this->worksheetXml->printOptions);
        }
    }

    private function tabColor(SimpleXMLElement $sheetPr, Styles $styleReader): void
    {
        if (isset($sheetPr->tabColor)) {
            $this->worksheet->getTabColor()->setARGB($styleReader->readColor($sheetPr->tabColor));
        }
    }

    private function codeName(SimpleXMLElement $sheetPrx): void
    {
        $sheetPr = $sheetPrx->attributes() ?? [];
        if (isset($sheetPr['codeName'])) {
            $this->worksheet->setCodeName((string) $sheetPr['codeName'], false);
        }
    }

    private function outlines(SimpleXMLElement $sheetPr): void
    {
        if (isset($sheetPr->outlinePr)) {
            $attr = $sheetPr->outlinePr->attributes() ?? [];
            if (
<<<<<<< HEAD
                isset($attr['summaryRight'])
                && !self::boolean((string) $attr['summaryRight'])
=======
                isset($attr['summaryRight']) &&
                !self::boolean((string) $attr['summaryRight'])
>>>>>>> 50f5a6f (Initial commit from local project)
            ) {
                $this->worksheet->setShowSummaryRight(false);
            } else {
                $this->worksheet->setShowSummaryRight(true);
            }

            if (
<<<<<<< HEAD
                isset($attr['summaryBelow'])
                && !self::boolean((string) $attr['summaryBelow'])
=======
                isset($attr['summaryBelow']) &&
                !self::boolean((string) $attr['summaryBelow'])
>>>>>>> 50f5a6f (Initial commit from local project)
            ) {
                $this->worksheet->setShowSummaryBelow(false);
            } else {
                $this->worksheet->setShowSummaryBelow(true);
            }
        }
    }

    private function pageSetup(SimpleXMLElement $sheetPr): void
    {
        if (isset($sheetPr->pageSetUpPr)) {
            $attr = $sheetPr->pageSetUpPr->attributes() ?? [];
            if (
<<<<<<< HEAD
                isset($attr['fitToPage'])
                && !self::boolean((string) $attr['fitToPage'])
=======
                isset($attr['fitToPage']) &&
                !self::boolean((string) $attr['fitToPage'])
>>>>>>> 50f5a6f (Initial commit from local project)
            ) {
                $this->worksheet->getPageSetup()->setFitToPage(false);
            } else {
                $this->worksheet->getPageSetup()->setFitToPage(true);
            }
        }
    }

    private function sheetFormat(SimpleXMLElement $sheetFormatPrx): void
    {
        $sheetFormatPr = $sheetFormatPrx->attributes() ?? [];
        if (
<<<<<<< HEAD
            isset($sheetFormatPr['customHeight'])
            && self::boolean((string) $sheetFormatPr['customHeight'])
            && isset($sheetFormatPr['defaultRowHeight'])
=======
            isset($sheetFormatPr['customHeight']) &&
            self::boolean((string) $sheetFormatPr['customHeight']) &&
            isset($sheetFormatPr['defaultRowHeight'])
>>>>>>> 50f5a6f (Initial commit from local project)
        ) {
            $this->worksheet->getDefaultRowDimension()
                ->setRowHeight((float) $sheetFormatPr['defaultRowHeight']);
        }

        if (isset($sheetFormatPr['defaultColWidth'])) {
            $this->worksheet->getDefaultColumnDimension()
                ->setWidth((float) $sheetFormatPr['defaultColWidth']);
        }

        if (
<<<<<<< HEAD
            isset($sheetFormatPr['zeroHeight'])
            && ((string) $sheetFormatPr['zeroHeight'] === '1')
=======
            isset($sheetFormatPr['zeroHeight']) &&
            ((string) $sheetFormatPr['zeroHeight'] === '1')
>>>>>>> 50f5a6f (Initial commit from local project)
        ) {
            $this->worksheet->getDefaultRowDimension()->setZeroHeight(true);
        }
    }

    private function printOptions(SimpleXMLElement $printOptionsx): void
    {
        $printOptions = $printOptionsx->attributes() ?? [];
<<<<<<< HEAD
        // Spec is weird. gridLines (default false)
        // and gridLinesSet (default true) must both be true.
        if (isset($printOptions['gridLines']) && self::boolean((string) $printOptions['gridLines'])) {
            if (!isset($printOptions['gridLinesSet']) || self::boolean((string) $printOptions['gridLinesSet'])) {
                $this->worksheet->setPrintGridlines(true);
            }
=======
        if (isset($printOptions['gridLinesSet']) && self::boolean((string) $printOptions['gridLinesSet'])) {
            $this->worksheet->setShowGridlines(true);
        }
        if (isset($printOptions['gridLines']) && self::boolean((string) $printOptions['gridLines'])) {
            $this->worksheet->setPrintGridlines(true);
>>>>>>> 50f5a6f (Initial commit from local project)
        }
        if (isset($printOptions['horizontalCentered']) && self::boolean((string) $printOptions['horizontalCentered'])) {
            $this->worksheet->getPageSetup()->setHorizontalCentered(true);
        }
        if (isset($printOptions['verticalCentered']) && self::boolean((string) $printOptions['verticalCentered'])) {
            $this->worksheet->getPageSetup()->setVerticalCentered(true);
        }
    }
}
