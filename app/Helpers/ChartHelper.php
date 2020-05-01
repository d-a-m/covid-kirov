<?php

namespace App\Helpers;

use Carbon\Carbon;

class ChartHelper
{
    /**
     * @param $data
     * @param  string  $type
     * @return array
     */
    static function getInfectedChartData($data, string $type)
    {
        switch ($type) {
            case 'single':
                $result = self::getInfectedChartDataSingle($data);
                break;
            case 'multi':
                $result = self::getInfectedChartDataMulti($data);
                break;
            default:
                $result = [];
        }

        return $result;
    }

    /**
     * @param $model
     * @return array
     */
    static private function getInfectedChartDataSingle($model): array
    {
        $data = array_slice(
            array_reverse(
                explode(';', $model->chart_total)
            ), 0, 30
        );

        if (count($data) === 0) {
            return [];
        }

        $result = [];
        $i = 0;

        foreach ($data as $item) {
            $date = Carbon::parse($model->created_at)->subDays($i)->toDateString();
            $result[] = [
                'date' => $date,
                'infected' => $item,
            ];
            $i++;
        }

        $result = array_reverse($result);

        return $result;
    }

    /**
     * @param $builder
     * @return array
     */
    static private function getInfectedChartDataMulti($builder): array
    {
        $data = $builder->get();
        $result = [];

        if ($data->count() === 0) {
            return [];
        }

        foreach ($data as $item) {
            $result[] = [
                'date' => Carbon::parse($item->date)->toDateString(),
                'infected' => $item['infected'],
            ];
        }

        $result = array_reverse($result);

        return $result;
    }
}