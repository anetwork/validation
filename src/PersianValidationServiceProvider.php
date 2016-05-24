<?php

namespace Anetwork\Validation;

use Illuminate\Support\ServiceProvider;

class PersianValidationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

      $this->app->bind( 'PersianValidation', 'Anetwork\Validation\PersianValidation' );

    }
}
