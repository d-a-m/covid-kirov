<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RegionCommonDataRequest;
use App\Models\RegionCommonData;

class RegionCommonDataController extends BaseController
{
    public function __construct()
    {
        parent::__construct(RegionCommonData::class, [
            'index' => 'Все данные',
            'create' => 'Добавить данные',
            'edit' => 'Отредактировать данные',
        ], 'region-common-data');
    }

    /**
     * @param array $additionalParams
     * @return \Illuminate\View\View
     */
    public function create(array $additionalParams = [])
    {
        return parent::create($additionalParams);
    }

    /**
     * @param int $id
     * @param array|null $additionalParams
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id, ?array $additionalParams = [])
    {
        return parent::edit($id, $additionalParams);
    }

    /**
     * @param RegionCommonDataRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(RegionCommonDataRequest $request)
    {
        return parent::_store($request);
    }

    /**
     * @param RegionCommonDataRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(RegionCommonDataRequest $request, int $id)
    {
        return parent::_update($request, $id);
    }
}
