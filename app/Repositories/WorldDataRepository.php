<?php

namespace App\Repositories;

use App\Helpers\ChartHelper;
use App\Repositories\Contract\Repository;

class WorldDataRepository extends Repository
{
    /**
     * @return array
     */
    public function getIndexData(): array
    {
        $worldData = $this->getAll()->latest()->first();

        return [
            'infectedChart' => ChartHelper::getInfectedChartData($worldData, 'single'),
            'infected' => $worldData->infected,
            'recovered' => $worldData->recovered,
            'dead' => $worldData->dead,
            'updated_at' => $worldData->updated_at
        ];
    }

}