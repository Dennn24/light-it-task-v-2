<?php

namespace application\validation;

class Validator
{
    const ROMA_NUMBERS_REGEXP = '/^M{0,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/i';

    const ARABIC_NUMBERS_REGEXP = '/^\d+$/';

    const INVALID_INPUT = 'Invalid input';

    public static function isValid($number)
    {
        return self::isArabic($number) || self::isRoma($number);
    }

    private static function isArabic($number)
    {
        return preg_match(self::ARABIC_NUMBERS_REGEXP, $number) == 1;
    }

    private static function isRoma($number)
    {
        return preg_match(self::ROMA_NUMBERS_REGEXP, $number) == 1;
    }
}