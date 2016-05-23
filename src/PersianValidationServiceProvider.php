<?php

namespace Persian\Validation;

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

      $this->app->bind( 'PersianValidation', 'Persian\Validation\PersianValidation' );

    }
}
