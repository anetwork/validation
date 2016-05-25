<?php

namespace Anetwork\Validation;

use Illuminate\Support\ServiceProvider;

/**
 * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
 * @since May 21, 2016
 */
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
