<?php

namespace App\Repositories;

use App\Helpers\ChartHelper;
use App\Repositories\Contract\Repository;

class RegionCommonDataRepository extends Repository
{
    /**
     * @return array
     */
    public function getIndexData(): array
    {
        $regionCommonData = $this->getAll()->latest()->first();
        $regionCommonDataChart = $this->getAll();

        return [
            'infectedChart' => ChartHelper::getInfectedChartData($regionCommonDataChart, 'multi'),
            'infected' => $regionCommonData->infected,
            'recovered' => $regionCommonData->recovered,
            'dead' => $regionCommonData->dead,
            'tested' => $regionCommonData->tested,
            'isolated' => $regionCommonData->isolated,
            'updated_at' => $regionCommonData->updated_at
        ];
    }
}