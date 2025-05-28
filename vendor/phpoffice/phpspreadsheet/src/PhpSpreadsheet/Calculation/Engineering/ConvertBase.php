<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\Engineering;

use PhpOffice\PhpSpreadsheet\Calculation\ArrayEnabled;
use PhpOffice\PhpSpreadsheet\Calculation\Exception;
use PhpOffice\PhpSpreadsheet\Calculation\Functions;
use PhpOffice\PhpSpreadsheet\Calculation\Information\ExcelError;
<<<<<<< HEAD
use PhpOffice\PhpSpreadsheet\Shared\StringHelper;
=======
>>>>>>> 50f5a6f (Initial commit from local project)

abstract class ConvertBase
{
    use ArrayEnabled;

<<<<<<< HEAD
    protected static function validateValue(mixed $value): string
=======
    /** @param mixed $value */
    protected static function validateValue($value): string
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_bool($value)) {
            if (Functions::getCompatibilityMode() !== Functions::COMPATIBILITY_OPENOFFICE) {
                throw new Exception(ExcelError::VALUE());
            }
            $value = (int) $value;
        }

        if (is_numeric($value)) {
            if (Functions::getCompatibilityMode() == Functions::COMPATIBILITY_GNUMERIC) {
                $value = floor((float) $value);
            }
        }

<<<<<<< HEAD
        return strtoupper(StringHelper::convertToString($value));
    }

    protected static function validatePlaces(mixed $places = null): ?int
=======
        return strtoupper((string) $value);
    }

    /** @param mixed $places */
    protected static function validatePlaces($places = null): ?int
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($places === null) {
            return $places;
        }

        if (is_numeric($places)) {
            if ($places < 0 || $places > 10) {
                throw new Exception(ExcelError::NAN());
            }

            return (int) $places;
        }

        throw new Exception(ExcelError::VALUE());
    }

    /**
     * Formats a number base string value with leading zeroes.
     *
     * @param string $value The "number" to pad
     * @param ?int $places The length that we want to pad this value
     *
     * @return string The padded "number"
     */
    protected static function nbrConversionFormat(string $value, ?int $places): string
    {
        if ($places !== null) {
            if (strlen($value) <= $places) {
                return substr(str_pad($value, $places, '0', STR_PAD_LEFT), -10);
            }

            return ExcelError::NAN();
        }

        return substr($value, -10);
    }
}
