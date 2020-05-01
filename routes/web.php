<?php

Route::get('/', 'HomeController@index')->name('home');

Route::middleware(['admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', 'Admin\IndexController@index')->name('index');

        Route::resource('regions-area-data', 'Admin\RegionsAreaDataController');
        Route::resource('region-common-data', 'Admin\RegionCommonDataController');
    });
});


Auth::routes();
