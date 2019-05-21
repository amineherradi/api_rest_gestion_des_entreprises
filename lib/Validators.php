<?php

namespace Lib;

trait Validators
{
    protected function isValidAddress($value)
    {
        $is_valid = true;
        if (!is_string($value) || $value == '') {
            return false;
        }
        return $is_valid;
    }
    protected function isValidSiret($value)
    {
        $is_valid = true;
        if (!is_string($value) || $value == '') {
            return false;
        }
        return $is_valid;
    }
    protected function isValidDenomination($value)
    {
        $is_valid = true;
        if (!is_string($value) || $value == '') {
            return false;
        }
        return $is_valid;
    }
    protected static function isValidChiffreAffaire($value)
    {
        $is_valid = true;
        if (!is_float($value) || $value == '') {
            return false;
        }

        return $is_valid;
    }
    protected static function isValidId($value)
    {
        $is_valid = true;
        if (!is_integer($value) || $value == '') {
            return false;
        }
        return $is_valid;
    }
}