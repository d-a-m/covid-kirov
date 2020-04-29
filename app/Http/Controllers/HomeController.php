<?php

namespace App\Http\Controllers;

use App\Helpers\ChartHelper;
use App\Models\RegionCommonData;
use App\Models\RussiaData;
use App\Models\RussiaRegionsData;
use App\Models\WorldData;
use App\Repositories\RegionCommonDataRepository;
use App\Repositories\RussiaDataRepository;
use App\Repositories\RussiaRegionsDataRepository;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $regionCommonDataRepository = (new RegionCommonDataRepository(RegionCommonData::class));
        $russiaRegionsRepository = (new RussiaRegionsDataRepository(RussiaRegionsData::class));
        $russiaRepository = (new RussiaDataRepository(RussiaData::class));
        $worldRepository = (new RussiaDataRepository(WorldData::class));

        $regionCommonData = $regionCommonDataRepository->getAll()->latest()->first();
        $regionCommonDataChart = $regionCommonDataRepository->getAll()->latest();
        $regionCommonDataInfectedChart = $regionCommonDataChart->take(30)->get();

        $russianData = $russiaRepository->getAll()->latest()->first();

        $worldData = $worldRepository->getAll()->latest()->first();

        $params['regionCommonData'] = $regionCommonData;
        $params['regionCommonDataInfectedChart'] = $regionCommonDataInfectedChart;

        $params['kirov'] = [
            'infectedChart' => $regionCommonDataInfectedChart,
            'infected' => $regionCommonData->infected,
            'recovered' => $regionCommonData->recovered,
            'dead' => $regionCommonData->dead,
        ];

        $params['russia'] = [
            'infectedChart' => ChartHelper::getInfectedChartData($russianData, 'chart_total'),
            'infected' => $russianData->infected,
            'recovered' => $russianData->recovered,
            'dead' => $russianData->dead,
        ];

        $params['world'] = [
            'infectedChart' => ChartHelper::getInfectedChartData($worldData, 'chart_total'),
            'infected' => $worldData->infected,
            'recovered' => $worldData->recovered,
            'dead' => $worldData->dead,
        ];

        $params['regions']= [
            'infectedMap' => $russiaRegionsRepository->getAll()->get()
        ];

        return view('index.home', $params);
    }
}
