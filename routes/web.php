<?php

Route::get('/', 'HomeController@index')->name('home');

Route::middleware(['admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', 'Admin\IndexController@index')->name('index');
    });
});


Auth::routes();
