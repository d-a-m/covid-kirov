<?php


namespace App\Helpers;

use Carbon\Carbon;

class ChartHelper
{
    /**
     * @param  $model
     * @param  string  $type
     * @return array
     */
    static function getInfectedChartData($model, string $type)
    {
        $data = array_slice(
            array_reverse(
                explode(';', $model->$type)
            ), 0, 30
        );

        $result = [];
        $i = 0;

        foreach ($data as $item) {
            $date = Carbon::parse($model->created_at)->subDays($i)->toDateString();
            $result[] =[
                'date' => $date,
                'infected' => $item,
            ];
            $i++;
        }

        $result = array_reverse($result);

        return $result;
    }
}