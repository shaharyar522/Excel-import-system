<?php

namespace PhpOffice\PhpSpreadsheet\Reader\Xlsx;

use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use SimpleXMLElement;

class Hyperlinks
{
<<<<<<< HEAD
    private Worksheet $worksheet;

    private array $hyperlinks = [];
=======
    /** @var Worksheet */
    private $worksheet;

    /** @var array */
    private $hyperlinks = [];
>>>>>>> 50f5a6f (Initial commit from local project)

    public function __construct(Worksheet $workSheet)
    {
        $this->worksheet = $workSheet;
    }

    public function readHyperlinks(SimpleXMLElement $relsWorksheet): void
    {
        foreach ($relsWorksheet->children(Namespaces::RELATIONSHIPS)->Relationship as $elementx) {
            $element = Xlsx::getAttributes($elementx);
            if ($element->Type == Namespaces::HYPERLINK) {
                $this->hyperlinks[(string) $element->Id] = (string) $element->Target;
            }
        }
    }

    public function setHyperlinks(SimpleXMLElement $worksheetXml): void
    {
        foreach ($worksheetXml->children(Namespaces::MAIN)->hyperlink as $hyperlink) {
<<<<<<< HEAD
            $this->setHyperlink($hyperlink, $this->worksheet);
=======
            if ($hyperlink !== null) {
                $this->setHyperlink($hyperlink, $this->worksheet);
            }
>>>>>>> 50f5a6f (Initial commit from local project)
        }
    }

    private function setHyperlink(SimpleXMLElement $hyperlink, Worksheet $worksheet): void
    {
        // Link url
        $linkRel = Xlsx::getAttributes($hyperlink, Namespaces::SCHEMA_OFFICE_DOCUMENT);

        $attributes = Xlsx::getAttributes($hyperlink);
        foreach (Coordinate::extractAllCellReferencesInRange($attributes->ref) as $cellReference) {
            $cell = $worksheet->getCell($cellReference);
            if (isset($linkRel['id'])) {
                $hyperlinkUrl = $this->hyperlinks[(string) $linkRel['id']] ?? null;
                if (isset($attributes['location'])) {
                    $hyperlinkUrl .= '#' . (string) $attributes['location'];
                }
                $cell->getHyperlink()->setUrl($hyperlinkUrl);
            } elseif (isset($attributes['location'])) {
                $cell->getHyperlink()->setUrl('sheet://' . (string) $attributes['location']);
            }

            // Tooltip
            if (isset($attributes['tooltip'])) {
                $cell->getHyperlink()->setTooltip((string) $attributes['tooltip']);
            }
        }
    }
}
