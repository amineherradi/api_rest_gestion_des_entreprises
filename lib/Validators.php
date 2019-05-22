<?php

namespace Lib;

trait Validators
{
    /**
     * @param String $value
     * @return bool
     */
    protected function isValidAddress(String $value): bool
    {
        $is_valid = true;
        if (!is_string($value) || $value == '') {
            return false;
        }
        return $is_valid;
    }

    /**
     * @param String $value
     * @return bool
     */
    protected function isValidSiret(String $value): bool
    {
        $is_valid = true;
        if (!is_string($value) || $value == '') {
            return false;
        }
        return $is_valid;
    }

    /**
     * @param String $value
     * @return bool
     */
    protected function isValidDenomination(String $value): bool
    {
        $is_valid = true;
        if (!is_string($value) || $value == '') {
            return false;
        }
        return $is_valid;
    }

    /**
     * @param float $value
     * @return bool
     */
    protected static function isValidChiffreAffaire(float $value): bool
    {
        $is_valid = true;
        if (!is_float($value) || $value == '') {
            return false;
        }

        return $is_valid;
    }

    /**
     * @param int $value
     * @return bool
     */
    protected static function isValidId(int $value): bool
    {
        $is_valid = true;
        if (!is_integer($value) || $value == '') {
            return false;
        }
        return $is_valid;
    }
}
