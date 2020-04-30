<?php

namespace App\Http\Controllers;

use App\Helpers\ChartHelper;
use App\Models\RegionCommonData;
use App\Models\RussiaData;
use App\Models\RussiaRegionsData;
use App\Models\WorldData;
use App\Repositories\Factory\RepositoryFactory;
use App\Repositories\RegionCommonDataRepository;
use App\Repositories\RussiaDataRepository;
use App\Repositories\RussiaRegionsDataRepository;
use App\Repositories\WorldDataRepository;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * @var WorldDataRepository
     */
    private $worldRepo;

    /**
     * @var RussiaDataRepository
     */
    private $russiaRepo;

    /**
     * @var RussiaRegionsDataRepository
     */
    private $russiaRegionRepo;

    /**
     * @var RegionCommonDataRepository
     */
    private $kirovRepo;

    public function __construct()
    {
        $this->worldRepo = RepositoryFactory::make(WorldData::class);
        $this->kirovRepo = RepositoryFactory::make(RegionCommonData::class);
        $this->russiaRepo = RepositoryFactory::make(RussiaData::class);
        $this->russiaRegionRepo = RepositoryFactory::make(RussiaRegionsData::class);
    }

    /**
     * @return View
     */
    public function index()
    {
        $params['kirov'] = $this->kirovRepo->getIndexData();
        $params['russia'] = $this->russiaRepo->getIndexData();
        $params['world'] = $this->worldRepo->getIndexData();
        $params['regions'] = $this->russiaRegionRepo->getIndexData();

        return view('index.home', $params);
    }
}
