<?php

namespace BehinNgvWorkshopControl;

use Illuminate\Support\ServiceProvider;

class BehinNgvWorkshopControlServiceProvider extends ServiceProvider
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
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
        // $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');
        $this->loadViewsFrom(__DIR__. '/Views', 'BehinNgvWorkshopControlViews');
        $this->loadJsonTranslationsFrom(__DIR__. '/Lang');
    }
}
