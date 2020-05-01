<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class RussiaData extends Model
{
    /**
     * @var string
     */
    protected $table = 'russia';

    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

}
