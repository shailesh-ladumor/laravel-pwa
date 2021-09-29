<?php

namespace Ladumor\LaravelPwa;

use Illuminate\Support\ServiceProvider;
use Ladumor\LaravelPwa\commands\PublishPWA;

class PWAServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->singleton('laravel-pwa:publish', function ($app) {
        return new PublishPWA();
       });

      $this->commands([
          'laravel-pwa:publish',
      ]);
    }
}
