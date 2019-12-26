<?php

namespace CookiesRevenge\NovoForm;

class Comparator
{

    public static function Compare($value, $against, $type)
    {
        $method = self::methods_[$type];
        if (!$method) {
            throw new \Exception("Comparison Method invalid in " . __CLASS__ . "::" . __FUNCTION__);
        }

        return self::$method($value, $against);
    }

    protected static function compareEqual($value, $against)
    {
        return $value == $against;
    }

    protected static function compareStrictEqual($value, $against)
    {
        return $value === $against;
    }

    protected static function compareLessThan($value, $against)
    {
        return $value < $against;
    }

    protected static function compareLessThanEqual($value, $against)
    {
        return $value <= $against;
    }

    protected static function compareHigherThan($value, $against)
    {
        return $value > $against;
    }

    protected static function compareHigherThanEqual($value, $against)
    {
        return $value >= $against;
    }

    private $methods_ = [
        \CookiesRevenge\NovoForm\Constants::COMPARE_EQUAL => "compareEqual",
        \CookiesRevenge\NovoForm\Constants::COMPARE_STRICT_EQUAL => "compareStrictEqual",
        \CookiesRevenge\NovoForm\Constants::COMPARE_LESS_THAN => "compareLessThan",
        \CookiesRevenge\NovoForm\Constants::COMPARE_LESS_THAN_EQUAL => "compareLessThanEqual",
        \CookiesRevenge\NovoForm\Constants::COMPARE_HIGHER_THAN => "compareHigherThan",
        \CookiesRevenge\NovoForm\Constants::COMPARE_HIGHER_THAN_EQUAL => "compareHigherThanEqual",
    ];
}
