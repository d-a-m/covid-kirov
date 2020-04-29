<?php


namespace App\Helpers;


use Carbon\Carbon;

class DateHelper
{
    /**
     * @var array
     */
    private static $months = [
        '1' => [
            'nom' => 'январь',
            'gen' => 'января',
            'acc' => 'январь',
            'dat' => 'январю',
            'ins' => 'январём',
            'pre' => 'январе',
        ],
        '2' => [
            'nom' => 'февраль',
            'gen' => 'февраля',
            'acc' => 'февраль',
            'dat' => 'февралю',
            'ins' => 'февралём',
            'pre' => 'феврале',
        ],
        '3' => [
            'nom' => 'март',
            'gen' => 'марта',
            'acc' => 'март',
            'dat' => 'марту',
            'ins' => 'мартом',
            'pre' => 'марте',
        ],
        '4' => [
            'nom' => 'апрель',
            'gen' => 'апреля',
            'acc' => 'апрель',
            'dat' => 'апрелю',
            'ins' => 'апрелем',
            'pre' => 'апреле',
        ],
        '5' => [
            'nom' => 'май',
            'gen' => 'мая',
            'acc' => 'май',
            'dat' => 'маю',
            'ins' => 'маем',
            'pre' => 'мае',
        ],
        '6' => [
            'nom' => 'июнь',
            'gen' => 'июня',
            'acc' => 'июнь',
            'dat' => 'июне',
            'ins' => 'июнем',
            'pre' => 'июне',
        ],
        '7' => [
            'nom' => 'июль',
            'gen' => 'июля',
            'acc' => 'июль',
            'dat' => 'июлю',
            'ins' => 'июлем',
            'pre' => 'июле',
        ],
        '8' => [
            'nom' => 'август',
            'gen' => 'августа',
            'acc' => 'август',
            'dat' => 'августу',
            'ins' => 'августом',
            'pre' => 'августе',
        ],
        '9' => [
            'nom' => 'сентябрь',
            'gen' => 'сентября',
            'acc' => 'сентябрь',
            'dat' => 'сентябрю',
            'ins' => 'сентябрём',
            'pre' => 'сентябре',
        ],
        '10' => [
            'nom' => 'октябрь',
            'gen' => 'октября',
            'acc' => 'октябрь',
            'dat' => 'октябрю',
            'ins' => 'октябрём',
            'pre' => 'октябре',
        ],
        '11' => [
            'nom' => 'ноябрь',
            'gen' => 'ноября',
            'acc' => 'ноябрь',
            'dat' => 'ноябрю',
            'ins' => 'ноябрём',
            'pre' => 'ноябре',
        ],
        '12' => [
            'nom' => 'декабрь',
            'gen' => 'декабря',
            'acc' => 'декабрь',
            'dat' => 'декабрю',
            'ins' => 'декабрём',
            'pre' => 'декабре',
        ],
    ];

    /**
     * Возвращает дату в формате "день месяц в час:минуты"
     * @param  string  $date
     * @return string
     */
    static public function getRussianDate(string $date): string
    {
        $date = Carbon::parse($date);
        return $date->day . ' ' . self::$months[$date->month]['gen'] . ' в ' . $date->format('H:i');
    }

    /**
     * @return string
     */
    static public function getRussianToday():string
    {
        $today = Carbon::now();
        return $today->day . ' ' . self::$months[$today->month]['gen'];
    }

}