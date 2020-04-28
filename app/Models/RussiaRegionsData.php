<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RussiaRegionsData extends Model
{
    /**
     * @var string
     */
    protected $table = 'russia_regions';

    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
