<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Progress;
use App\Models\Word;
use App\Observers\CategoryObserver;
use App\Observers\ProgressObserver;
use App\Observers\WordObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

    }
}
