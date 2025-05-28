<?php

namespace PhpOffice\PhpSpreadsheet\Style\ConditionalFormatting;

use PhpOffice\PhpSpreadsheet\Style\Conditional;
use SimpleXMLElement;

class ConditionalFormattingRuleExtension
{
    const CONDITION_EXTENSION_DATABAR = 'dataBar';

<<<<<<< HEAD
    private string $id;

    /** @var string Conditional Formatting Rule */
    private string $cfRule;

    private ConditionalDataBarExtension $dataBar;

    /** @var string Sequence of References */
    private string $sqref = '';
=======
    /** <conditionalFormatting> attributes */

    /** @var string */
    private $id;

    /** @var string Conditional Formatting Rule */
    private $cfRule;

    /** <conditionalFormatting> children */

    /** @var ConditionalDataBarExtension */
    private $dataBar;

    /** @var string Sequence of References */
    private $sqref;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * ConditionalFormattingRuleExtension constructor.
     */
    public function __construct(?string $id = null, string $cfRule = self::CONDITION_EXTENSION_DATABAR)
    {
        if (null === $id) {
            $this->id = '{' . $this->generateUuid() . '}';
        } else {
            $this->id = $id;
        }
        $this->cfRule = $cfRule;
    }

    private function generateUuid(): string
    {
<<<<<<< HEAD
        $chars = mb_str_split('xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx', 1, 'UTF-8');
=======
        $chars = str_split('xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx');
>>>>>>> 50f5a6f (Initial commit from local project)

        foreach ($chars as $i => $char) {
            if ($char === 'x') {
                $chars[$i] = dechex(random_int(0, 15));
            } elseif ($char === 'y') {
                $chars[$i] = dechex(random_int(8, 11));
            }
        }

<<<<<<< HEAD
        return implode('', $chars);
=======
        return implode('', /** @scrutinizer ignore-type */ $chars);
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    public static function parseExtLstXml(?SimpleXMLElement $extLstXml): array
    {
        $conditionalFormattingRuleExtensions = [];
        $conditionalFormattingRuleExtensionXml = null;
        if ($extLstXml instanceof SimpleXMLElement) {
            foreach ((count($extLstXml) > 0 ? $extLstXml : [$extLstXml]) as $extLst) {
                //this uri is conditionalFormattings
                //https://docs.microsoft.com/en-us/openspecs/office_standards/ms-xlsx/07d607af-5618-4ca2-b683-6a78dc0d9627
                if (isset($extLst->ext['uri']) && (string) $extLst->ext['uri'] === '{78C0D931-6437-407d-A8EE-F0AAD7539E65}') {
                    $conditionalFormattingRuleExtensionXml = $extLst->ext;
                }
            }

            if ($conditionalFormattingRuleExtensionXml) {
                $ns = $conditionalFormattingRuleExtensionXml->getNamespaces(true);
                $extFormattingsXml = $conditionalFormattingRuleExtensionXml->children($ns['x14']);

                foreach ($extFormattingsXml->children($ns['x14']) as $extFormattingXml) {
                    $extCfRuleXml = $extFormattingXml->cfRule;
                    $attributes = $extCfRuleXml->attributes();
                    if (!$attributes || ((string) $attributes->type) !== Conditional::CONDITION_DATABAR) {
                        continue;
                    }

                    $extFormattingRuleObj = new self((string) $attributes->id);
                    $extFormattingRuleObj->setSqref((string) $extFormattingXml->children($ns['xm'])->sqref);
                    $conditionalFormattingRuleExtensions[$extFormattingRuleObj->getId()] = $extFormattingRuleObj;

                    $extDataBarObj = new ConditionalDataBarExtension();
                    $extFormattingRuleObj->setDataBarExt($extDataBarObj);
                    $dataBarXml = $extCfRuleXml->dataBar;
                    self::parseExtDataBarAttributesFromXml($extDataBarObj, $dataBarXml);
                    self::parseExtDataBarElementChildrenFromXml($extDataBarObj, $dataBarXml, $ns);
                }
            }
        }

        return $conditionalFormattingRuleExtensions;
    }

    private static function parseExtDataBarAttributesFromXml(
        ConditionalDataBarExtension $extDataBarObj,
        SimpleXMLElement $dataBarXml
    ): void {
        $dataBarAttribute = $dataBarXml->attributes();
        if ($dataBarAttribute === null) {
            return;
        }
        if ($dataBarAttribute->minLength) {
            $extDataBarObj->setMinLength((int) $dataBarAttribute->minLength);
        }
        if ($dataBarAttribute->maxLength) {
            $extDataBarObj->setMaxLength((int) $dataBarAttribute->maxLength);
        }
        if ($dataBarAttribute->border) {
            $extDataBarObj->setBorder((bool) (string) $dataBarAttribute->border);
        }
        if ($dataBarAttribute->gradient) {
            $extDataBarObj->setGradient((bool) (string) $dataBarAttribute->gradient);
        }
        if ($dataBarAttribute->direction) {
            $extDataBarObj->setDirection((string) $dataBarAttribute->direction);
        }
        if ($dataBarAttribute->negativeBarBorderColorSameAsPositive) {
            $extDataBarObj->setNegativeBarBorderColorSameAsPositive((bool) (string) $dataBarAttribute->negativeBarBorderColorSameAsPositive);
        }
        if ($dataBarAttribute->axisPosition) {
            $extDataBarObj->setAxisPosition((string) $dataBarAttribute->axisPosition);
        }
    }

<<<<<<< HEAD
    private static function parseExtDataBarElementChildrenFromXml(ConditionalDataBarExtension $extDataBarObj, SimpleXMLElement $dataBarXml, array $ns): void
=======
    /** @param array|SimpleXMLElement $ns */
    private static function parseExtDataBarElementChildrenFromXml(ConditionalDataBarExtension $extDataBarObj, SimpleXMLElement $dataBarXml, $ns): void
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($dataBarXml->borderColor) {
            $attributes = $dataBarXml->borderColor->attributes();
            if ($attributes !== null) {
                $extDataBarObj->setBorderColor((string) $attributes['rgb']);
            }
        }
        if ($dataBarXml->negativeFillColor) {
            $attributes = $dataBarXml->negativeFillColor->attributes();
            if ($attributes !== null) {
                $extDataBarObj->setNegativeFillColor((string) $attributes['rgb']);
            }
        }
        if ($dataBarXml->negativeBorderColor) {
            $attributes = $dataBarXml->negativeBorderColor->attributes();
            if ($attributes !== null) {
                $extDataBarObj->setNegativeBorderColor((string) $attributes['rgb']);
            }
        }
        if ($dataBarXml->axisColor) {
            $axisColorAttr = $dataBarXml->axisColor->attributes();
            if ($axisColorAttr !== null) {
                $extDataBarObj->setAxisColor((string) $axisColorAttr['rgb'], (string) $axisColorAttr['theme'], (string) $axisColorAttr['tint']);
            }
        }
        $cfvoIndex = 0;
        foreach ($dataBarXml->cfvo as $cfvo) {
<<<<<<< HEAD
            $f = (string) $cfvo->children($ns['xm'])->f;
=======
            $f = (string) $cfvo->/** @scrutinizer ignore-call */ children($ns['xm'])->f;
            /** @scrutinizer ignore-call */
>>>>>>> 50f5a6f (Initial commit from local project)
            $attributes = $cfvo->attributes();
            if (!($attributes)) {
                continue;
            }

            if ($cfvoIndex === 0) {
                $extDataBarObj->setMinimumConditionalFormatValueObject(new ConditionalFormatValueObject((string) $attributes['type'], null, (empty($f) ? null : $f)));
            }
            if ($cfvoIndex === 1) {
                $extDataBarObj->setMaximumConditionalFormatValueObject(new ConditionalFormatValueObject((string) $attributes['type'], null, (empty($f) ? null : $f)));
            }
            ++$cfvoIndex;
        }
    }

<<<<<<< HEAD
    public function getId(): string
=======
    /**
     * @return mixed
     */
    public function getId()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->id;
    }

<<<<<<< HEAD
    public function setId(string $id): self
=======
    /**
     * @param mixed $id
     */
    public function setId($id): self
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->id = $id;

        return $this;
    }

    public function getCfRule(): string
    {
        return $this->cfRule;
    }

    public function setCfRule(string $cfRule): self
    {
        $this->cfRule = $cfRule;

        return $this;
    }

    public function getDataBarExt(): ConditionalDataBarExtension
    {
        return $this->dataBar;
    }

    public function setDataBarExt(ConditionalDataBarExtension $dataBar): self
    {
        $this->dataBar = $dataBar;

        return $this;
    }

    public function getSqref(): string
    {
        return $this->sqref;
    }

    public function setSqref(string $sqref): self
    {
        $this->sqref = $sqref;

        return $this;
    }
}
