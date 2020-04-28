<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegionsAreaData extends Model
{
    /**
     * @var string
     */
    protected $table = 'regions_area_data';

    /**
     * Массив с дежурными сообщениями о результате выполненной операции
     * @var array
     */
    public static $alerts = [
        'success_create' => 'Данные успешно добавлены!',
        'error_create' => 'Данные не была добавлены!',
        'success_update' => 'Данные успешно отредактированы!',
        'error_update' => 'Данные не была отредактированы!',
        'success_destroy' => 'Данные успешно удалёны!',
        'error_destroy' => 'Данные не была удалёны!',
    ];

    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
