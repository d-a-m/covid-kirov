<?php

namespace App\Helpers;

class StringHelper {
    /**
     * Функция возвращает окончание для множественного числа слова на основании числа и массива окончаний
     * param  $number Integer Число на основе которого нужно сформировать окончание
     * param  $endingsArray  Array Массив слов или окончаний для чисел (1, 4, 5),
     *         например array('яблоко', 'яблока', 'яблок')
     * return String
     */
    public static function getNumEnding($number, $endingArray)
    {
        $number = $number % 100;
        if ($number>=11 && $number<=19) {
            $ending=$endingArray[2];
        }
        else {
            $i = $number % 10;
            switch ($i)
            {
                case (1): $ending = $endingArray[0]; break;
                case (2):
                case (3):
                case (4): $ending = $endingArray[1]; break;
                default: $ending=$endingArray[2];
            }
        }
        return $ending;
    }

    /**
     * Делает первый символ в строке заглавный для кириллицы
     *
     * @param $string
     * @param string $e
     * @return false|string
     */
    public static function mb_ucfirst($string,  $e = 'utf-8')
    {
        $str = mb_ereg_replace('^[\ ]+', '', $string);
        $str = mb_strtoupper(mb_substr($str, 0, 1, $e), $e).
            mb_substr($str, 1, mb_strlen($str), $e);
        return $str;
    }

}
