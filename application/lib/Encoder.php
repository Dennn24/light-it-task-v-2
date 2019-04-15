<?php

namespace application\lib;

class Encoder
{

    const ARABIAN_NUMBERS = [1, 4, 5, 9, 10, 40, 50, 90, 100, 400, 500, 900, 1000];
    const ROMAN_NUMBERS = ["I", "IV", "V", "IX", "X", "XL", "L", "XC", "C", "CD", "D", "CM", "M"];

    public static function encode($input_value)
    {
        //проверка арабские или римские
        if (is_numeric($input_value)) {//если арабские
            return self::toRomain($input_value);
        } else {//если римские
            return self::toArabian($input_value);
        }

    }

    //перевод числа в римскую систему
    public static function toRomain($input_value)
    {
        $result = '';
        $index = count(self::ARABIAN_NUMBERS) - 1;
        while ($input_value > 0) {
            if ($input_value >= self::ARABIAN_NUMBERS[$index]) {
                $result = $result . self::ROMAN_NUMBERS[$index];
                $input_value -= self::ARABIAN_NUMBERS[$index];
            } else {
                $index--;
            }
        }
        return $result;
    }

    //перевод числа в арабскую систему
    public static function toArabian($input_value)
    {
        $result = 0;
        $input_value = strtoupper($input_value);
        $index = count(self::ARABIAN_NUMBERS) - 1;
        $position = 0;

        while ($index >= 0 && $position < strlen($input_value)) {
            if (substr($input_value, $position, strlen(self::ROMAN_NUMBERS[$index])) == self::ROMAN_NUMBERS[$index]) {
                $result += self::ARABIAN_NUMBERS[$index];
                $position += strlen(self::ROMAN_NUMBERS[$index]);
            } else {
                $index--;
            }
        }
        return $result;
    }

}