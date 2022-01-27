<?php

namespace Stephendevs\Pagman\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use  Stephendevs\Pagman\Console\Commands\PostSeederCommand;
use  Stephendevs\Pagman\Console\Commands\PagmanSeederCommand;
use  Stephendevs\Pagman\Console\Commands\PagmanTheme;


class PagmanServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
        $helpers = glob( __DIR__.'/..'.'/Helpers'.'/*.php');

        foreach($helpers as $key => $helper){
            require_once($helper);
        }

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
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'pagman');
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

        if ($this->app->runningInConsole()) {

            $this->commands([
               PostSeederCommand::class, PagmanSeederCommand::class, PagmanTheme::class,
            ]);

            //config file
            $this->publishes([
                __DIR__.'/../../config/pagman.php' => config_path('pagman.php')
            ], 'pagman-config');

             //config file
             $this->publishes([
                __DIR__.'/../../config/theme.php' => config_path('theme.php')
            ], 'pagman-theme-config');

              //config file
              $this->publishes([
                __DIR__.'/../../config/lad.php' => config_path('lad.php')
            ], 'pagman-lad-config');

            //Publish Customizable Views
            $this->publishes([
                __DIR__.'/../../resources/views' => resource_path('views/stephendevs/pagman')
            ], 'pagman-views');

            // Publish assets
            $this->publishes([
              __DIR__.'/../../resources/assets' => public_path('stephendevs/pagman'),
            ], 'pagman-assets');


            // DB Migrations
            $this->publishes([
                __DIR__.'/../../database' => database_path(),
              ], 'pagman-database');

        }

        View::composer(
            'pagman::web.menu.bootstrapmenuitems', 'Stephendevs\Pagman\Http\Composers\MenuItemsComposer'
        );

        
        
    }

  
}
