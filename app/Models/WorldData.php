<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorldData extends Model
{
    /**
     * @var string
     */
    protected $table = 'world';

    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
