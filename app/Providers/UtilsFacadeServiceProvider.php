<?php

namespace App\Providers;

use App\Services\ImageService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class UtilsFacadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        App::bind('utils',function() {
            return new \App\Services\Utils(new ImageService());
        });
    }
}
