<?php

namespace Anetwork\Validation;

use Illuminate\Support\ServiceProvider;
use Validator;

class ValidatorServiceProvider extends ServiceProvider
{

    protected $new_message;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

      Validator :: extend( 'persian_alpha', 'PersianValidation@alpha' );

      Validator :: replacer( 'persian_alpha', function( $message, $attribute, $rule, $parameters ) {

        $this->new_message = "persian alphabet is not valid";

        return str_replace( $message, $this->new_message, $message );

      });

      Validator :: extend( 'persian_num', 'PersianValidation@num' );

      Validator :: replacer( 'persian_num', function( $message, $attribute, $rule, $parameters ) {

        $this->new_message = "persian number is not valid";

        return str_replace( $message, $this->new_message, $message );

      });

      Validator :: extend( 'persian_alpha_num', 'PersianValidation@num' );

      Validator :: replacer( 'persian_alpha_num', function( $message, $attribute, $rule, $parameters ) {

        $this->new_message = "persian alpahbet & number is not valid";

        return str_replace( $message, $this->new_message, $message );

      });

      Validator :: extend( 'mobile', 'PersianValidation@mobile' );

      Validator :: replacer( 'mobile', function( $message, $attribute, $rule, $parameters ) {

        $this->new_message = "mobile number is not valid";

        return str_replace( $message, $this->new_message, $message );

      });

      Validator :: extend( 'sheba', 'PersianValidation@sheba' );

      Validator :: replacer( 'sheba', function( $message, $attribute, $rule, $parameters ) {

        $this->new_message = "sheba number is not valid";

        return str_replace( $message, $this->new_message, $message );

      });

      Validator :: extend( 'melliCode', 'PersianValidation@melliCode' );

      Validator :: replacer( 'melliCode', function( $message, $attribute, $rule, $parameters ) {

        $this->new_message = "melliCode number is not valid";

        return str_replace( $message, $this->new_message, $message );

      });


    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      //
    }

}
