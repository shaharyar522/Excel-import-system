<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\Statistical;

abstract class MaxMinBase
{
<<<<<<< HEAD
    protected static function datatypeAdjustmentAllowStrings(int|float|string|bool $value): int|float
=======
    /**
     * @param mixed $value
     *
     * @return mixed
     */
    protected static function datatypeAdjustmentAllowStrings($value)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_bool($value)) {
            return (int) $value;
        } elseif (is_string($value)) {
            return 0;
        }

        return $value;
    }
}
