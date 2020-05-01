<?php

namespace App\Repositories;

use App\Repositories\Contract\Repository;

class RussiaRegionsDataRepository extends Repository
{
    /**
     * @return array
     */
    public function getIndexData(): array
    {
        return [
            'infectedMap' => $this->getAll()->get()
        ];
    }
}