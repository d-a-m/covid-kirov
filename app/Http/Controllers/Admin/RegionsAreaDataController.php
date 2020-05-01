<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RegionsAreaDataRequest;
use App\Models\RegionsAreaData;
use App\Repositories\RegionsAreaDataRepository;

class RegionsAreaDataController extends BaseController
{
    public function __construct()
    {
        parent::__construct(RegionsAreaData::class, [
            'index' => 'Все данные',
            'create' => 'Добавить данные',
            'edit' => 'Отредактировать данные',
        ], 'regions-area-data');
    }

    /**
     * @param array $additionalParams
     * @return \Illuminate\View\View
     */
    public function create(array $additionalParams = [])
    {
        $additionalParams['regionsArea'] = $this->repository->getAreas();
        return parent::create($additionalParams);
    }

    /**
     * @param int $id
     * @param array|null $additionalParams
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id, ?array $additionalParams = [])
    {
        $additionalParams['regionsArea'] = new RegionsAreaDataRepository();

        return parent::edit($id, $additionalParams);
    }

    /**
     * @param RegionsAreaDataRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(RegionsAreaDataRequest $request)
    {
        return parent::_store($request);
    }

    /**
     * @param RegionsAreaDataRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(RegionsAreaDataRequest $request, int $id)
    {
        return parent::_update($request, $id);
    }
}
