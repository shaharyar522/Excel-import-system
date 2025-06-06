<?php

namespace PhpOffice\PhpSpreadsheet\Reader\Xlsx;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use SimpleXMLElement;

class WorkbookView
{
<<<<<<< HEAD
    private Spreadsheet $spreadsheet;
=======
    /**
     * @var Spreadsheet
     */
    private $spreadsheet;
>>>>>>> 50f5a6f (Initial commit from local project)

    public function __construct(Spreadsheet $spreadsheet)
    {
        $this->spreadsheet = $spreadsheet;
    }

<<<<<<< HEAD
    public function viewSettings(SimpleXMLElement $xmlWorkbook, string $mainNS, array $mapSheetId, bool $readDataOnly): void
    {
=======
    /**
     * @param mixed $mainNS
     */
    public function viewSettings(SimpleXMLElement $xmlWorkbook, $mainNS, array $mapSheetId, bool $readDataOnly): void
    {
        if ($this->spreadsheet->getSheetCount() == 0) {
            $this->spreadsheet->createSheet();
        }
>>>>>>> 50f5a6f (Initial commit from local project)
        // Default active sheet index to the first loaded worksheet from the file
        $this->spreadsheet->setActiveSheetIndex(0);

        $workbookView = $xmlWorkbook->children($mainNS)->bookViews->workbookView;
        if ($readDataOnly !== true && !empty($workbookView)) {
            $workbookViewAttributes = self::testSimpleXml(self::getAttributes($workbookView));
            // active sheet index
            $activeTab = (int) $workbookViewAttributes->activeTab; // refers to old sheet index
            // keep active sheet index if sheet is still loaded, else first sheet is set as the active worksheet
<<<<<<< HEAD
            if (isset($mapSheetId[$activeTab])) {
=======
            if (isset($mapSheetId[$activeTab]) && $mapSheetId[$activeTab] !== null) {
>>>>>>> 50f5a6f (Initial commit from local project)
                $this->spreadsheet->setActiveSheetIndex($mapSheetId[$activeTab]);
            }

            $this->horizontalScroll($workbookViewAttributes);
            $this->verticalScroll($workbookViewAttributes);
            $this->sheetTabs($workbookViewAttributes);
            $this->minimized($workbookViewAttributes);
            $this->autoFilterDateGrouping($workbookViewAttributes);
            $this->firstSheet($workbookViewAttributes);
            $this->visibility($workbookViewAttributes);
            $this->tabRatio($workbookViewAttributes);
        }
    }

<<<<<<< HEAD
    public static function testSimpleXml(mixed $value): SimpleXMLElement
=======
    /**
     * @param mixed $value
     */
    public static function testSimpleXml($value): SimpleXMLElement
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return ($value instanceof SimpleXMLElement)
            ? $value
            : new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><root></root>');
    }

    public static function getAttributes(?SimpleXMLElement $value, string $ns = ''): SimpleXMLElement
    {
        return self::testSimpleXml($value === null ? $value : $value->attributes($ns));
    }

    /**
     * Convert an 'xsd:boolean' XML value to a PHP boolean value.
     * A valid 'xsd:boolean' XML value can be one of the following
     * four values: 'true', 'false', '1', '0'.  It is case sensitive.
     *
     * Note that just doing '(bool) $xsdBoolean' is not safe,
     * since '(bool) "false"' returns true.
     *
     * @see https://www.w3.org/TR/xmlschema11-2/#boolean
     *
     * @param string $xsdBoolean An XML string value of type 'xsd:boolean'
     *
     * @return bool  Boolean value
     */
    private function castXsdBooleanToBool(string $xsdBoolean): bool
    {
        if ($xsdBoolean === 'false') {
            return false;
        }

        return (bool) $xsdBoolean;
    }

    private function horizontalScroll(SimpleXMLElement $workbookViewAttributes): void
    {
        if (isset($workbookViewAttributes->showHorizontalScroll)) {
            $showHorizontalScroll = (string) $workbookViewAttributes->showHorizontalScroll;
            $this->spreadsheet->setShowHorizontalScroll($this->castXsdBooleanToBool($showHorizontalScroll));
        }
    }

    private function verticalScroll(SimpleXMLElement $workbookViewAttributes): void
    {
        if (isset($workbookViewAttributes->showVerticalScroll)) {
            $showVerticalScroll = (string) $workbookViewAttributes->showVerticalScroll;
            $this->spreadsheet->setShowVerticalScroll($this->castXsdBooleanToBool($showVerticalScroll));
        }
    }

    private function sheetTabs(SimpleXMLElement $workbookViewAttributes): void
    {
        if (isset($workbookViewAttributes->showSheetTabs)) {
            $showSheetTabs = (string) $workbookViewAttributes->showSheetTabs;
            $this->spreadsheet->setShowSheetTabs($this->castXsdBooleanToBool($showSheetTabs));
        }
    }

    private function minimized(SimpleXMLElement $workbookViewAttributes): void
    {
        if (isset($workbookViewAttributes->minimized)) {
            $minimized = (string) $workbookViewAttributes->minimized;
            $this->spreadsheet->setMinimized($this->castXsdBooleanToBool($minimized));
        }
    }

    private function autoFilterDateGrouping(SimpleXMLElement $workbookViewAttributes): void
    {
        if (isset($workbookViewAttributes->autoFilterDateGrouping)) {
            $autoFilterDateGrouping = (string) $workbookViewAttributes->autoFilterDateGrouping;
            $this->spreadsheet->setAutoFilterDateGrouping($this->castXsdBooleanToBool($autoFilterDateGrouping));
        }
    }

    private function firstSheet(SimpleXMLElement $workbookViewAttributes): void
    {
        if (isset($workbookViewAttributes->firstSheet)) {
            $firstSheet = (string) $workbookViewAttributes->firstSheet;
            $this->spreadsheet->setFirstSheetIndex((int) $firstSheet);
        }
    }

    private function visibility(SimpleXMLElement $workbookViewAttributes): void
    {
        if (isset($workbookViewAttributes->visibility)) {
            $visibility = (string) $workbookViewAttributes->visibility;
            $this->spreadsheet->setVisibility($visibility);
        }
    }

    private function tabRatio(SimpleXMLElement $workbookViewAttributes): void
    {
        if (isset($workbookViewAttributes->tabRatio)) {
            $tabRatio = (string) $workbookViewAttributes->tabRatio;
            $this->spreadsheet->setTabRatio((int) $tabRatio);
        }
    }
}
