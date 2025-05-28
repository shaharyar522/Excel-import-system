<?php

namespace PhpOffice\PhpSpreadsheet\Writer\Xls;

use PhpOffice\PhpSpreadsheet\Cell\DataValidation;

class CellDataValidation
{
    /**
     * @var array<string, int>
     */
<<<<<<< HEAD
    protected static array $validationTypeMap = [
=======
    protected static $validationTypeMap = [
>>>>>>> 50f5a6f (Initial commit from local project)
        DataValidation::TYPE_NONE => 0x00,
        DataValidation::TYPE_WHOLE => 0x01,
        DataValidation::TYPE_DECIMAL => 0x02,
        DataValidation::TYPE_LIST => 0x03,
        DataValidation::TYPE_DATE => 0x04,
        DataValidation::TYPE_TIME => 0x05,
        DataValidation::TYPE_TEXTLENGTH => 0x06,
        DataValidation::TYPE_CUSTOM => 0x07,
    ];

    /**
     * @var array<string, int>
     */
<<<<<<< HEAD
    protected static array $errorStyleMap = [
=======
    protected static $errorStyleMap = [
>>>>>>> 50f5a6f (Initial commit from local project)
        DataValidation::STYLE_STOP => 0x00,
        DataValidation::STYLE_WARNING => 0x01,
        DataValidation::STYLE_INFORMATION => 0x02,
    ];

    /**
     * @var array<string, int>
     */
<<<<<<< HEAD
    protected static array $operatorMap = [
=======
    protected static $operatorMap = [
>>>>>>> 50f5a6f (Initial commit from local project)
        DataValidation::OPERATOR_BETWEEN => 0x00,
        DataValidation::OPERATOR_NOTBETWEEN => 0x01,
        DataValidation::OPERATOR_EQUAL => 0x02,
        DataValidation::OPERATOR_NOTEQUAL => 0x03,
        DataValidation::OPERATOR_GREATERTHAN => 0x04,
        DataValidation::OPERATOR_LESSTHAN => 0x05,
        DataValidation::OPERATOR_GREATERTHANOREQUAL => 0x06,
        DataValidation::OPERATOR_LESSTHANOREQUAL => 0x07,
    ];

    public static function type(DataValidation $dataValidation): int
    {
        $validationType = $dataValidation->getType();

<<<<<<< HEAD
        if (array_key_exists($validationType, self::$validationTypeMap)) {
=======
        if (is_string($validationType) && array_key_exists($validationType, self::$validationTypeMap)) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return self::$validationTypeMap[$validationType];
        }

        return self::$validationTypeMap[DataValidation::TYPE_NONE];
    }

    public static function errorStyle(DataValidation $dataValidation): int
    {
        $errorStyle = $dataValidation->getErrorStyle();

<<<<<<< HEAD
        if (array_key_exists($errorStyle, self::$errorStyleMap)) {
=======
        if (is_string($errorStyle) && array_key_exists($errorStyle, self::$errorStyleMap)) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return self::$errorStyleMap[$errorStyle];
        }

        return self::$errorStyleMap[DataValidation::STYLE_STOP];
    }

    public static function operator(DataValidation $dataValidation): int
    {
        $operator = $dataValidation->getOperator();

<<<<<<< HEAD
        if (array_key_exists($operator, self::$operatorMap)) {
=======
        if (is_string($operator) && array_key_exists($operator, self::$operatorMap)) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return self::$operatorMap[$operator];
        }

        return self::$operatorMap[DataValidation::OPERATOR_BETWEEN];
    }
}
