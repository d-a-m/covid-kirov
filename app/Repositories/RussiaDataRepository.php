<?php

namespace App\Repositories;

use App\Helpers\ChartHelper;
use App\Repositories\Contract\Repository;

class RussiaDataRepository extends Repository
{
    /**
     * @return array
     */
    public function getIndexData(): array
    {
        $russianData = $this->getAll()->latest()->first();

        return [
            'infectedChart' => ChartHelper::getInfectedChartData($russianData, 'single'),
            'infected' => $russianData->infected,
            'recovered' => $russianData->recovered,
            'dead' => $russianData->dead,
            'updated_at' => $russianData->updated_at
        ];
    }

}