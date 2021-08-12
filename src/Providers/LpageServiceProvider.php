<?php

namespace Stephendevs\Lpage\Providers;

use Illuminate\Support\ServiceProvider;

class LpageServiceProvider extends ServiceProvider
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
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'lpage');

        if ($this->app->runningInConsole()) {

            //config file
            $this->publishes([
                __DIR__.'/../../config/lpage.php' => config_path('lpage.php')
            ], 'lpage-config');

            //Publish Customizable Views
            $this->publishes([
                __DIR__.'/../../resources/views' => resource_path('views/stephendevs/lpage')
            ], 'lpage-views');

            // Publish assets
            $this->publishes([
              __DIR__.'/../../resources/assets' => public_path('lpage'),
            ], 'lpage-assets');

          

            // DB Migrations
            $this->publishes([
                __DIR__.'/../../database' => database_path(),
              ], 'lpage-database');

            // Media Assets
            $this->publishes([
                __DIR__.'/../../resources/media' => storage_path('app/public/lpage'),
              ], 'lpage-media');
  
        }

        
        
    }
}
