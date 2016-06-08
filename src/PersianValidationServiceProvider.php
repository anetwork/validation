<?php

namespace Anetwork\Validation;

use Illuminate\Support\ServiceProvider;
use Validator;

/**
 * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
 * @since May 25, 2016
 */
class PersianValidationServiceProvider extends ServiceProvider
{

      //variable of class
      protected $new_message;

    
    /**
      * create custom validation rules and messages
      * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
      * @since May 25, 2016
      * @return void
      */
      public function boot()
      {

        // create custom rule for persian alphabet
        Validator::extend( 'persian_alpha', 'PersianValidation@alpha' );

          // create custom message for persian alphabet
          Validator::replacer( 'persian_alpha', function( $message, $attribute, $rule, $parameters ) {

            $this->new_message = "persian alphabet is not valid";

            return str_replace( $message, $this->new_message, $message );

          });

        // create custom rule for persian number
        Validator::extend( 'persian_num', 'PersianValidation@num' );

          // create custom message for persian number
          Validator::replacer( 'persian_num', function( $message, $attribute, $rule, $parameters ) {

            $this->new_message = "persian number is not valid";

            return str_replace( $message, $this->new_message, $message );

          });

        // create custom rule for persian alphabet and number
        Validator::extend( 'persian_alpha_num', 'PersianValidation@num' );

          // create custom message for persian alphabet and number
          Validator::replacer( 'persian_alpha_num', function( $message, $attribute, $rule, $parameters ) {

            $this->new_message = "persian alpahbet & number is not valid";

            return str_replace( $message, $this->new_message, $message );

          });

        // create custom rule for mobile
        Validator::extend( 'mobile', 'PersianValidation@mobile' );

          // create custom message for mobile
          Validator::replacer( 'mobile', function( $message, $attribute, $rule, $parameters ) {

            $this->new_message = "mobile number is not valid";

            return str_replace( $message, $this->new_message, $message );

          });

        // create custom rule for sheba number
        Validator::extend( 'sheba', 'PersianValidation@sheba' );

          // create custom message for sheba number
          Validator::replacer( 'sheba', function( $message, $attribute, $rule, $parameters ) {

            $this->new_message = "sheba number is not valid";

            return str_replace( $message, $this->new_message, $message );

          });

        // create custom rule for melliCode
        Validator::extend( 'melliCode', 'PersianValidation@melliCode' );

          // create custom message for melliCode
          Validator::replacer( 'melliCode', function( $message, $attribute, $rule, $parameters ) {

            $this->new_message = "melliCode number is not valid";

            return str_replace( $message, $this->new_message, $message );

          });

          // create custom rule for category
        Validator::extend( 'category', 'PersianValidation@category' );

          // create custom message for category
          Validator::replacer( 'category', function( $message, $attribute, $rule, $parameters ) {

            $this->new_message = "category is out of range min 1 and max 2";

            return str_replace( $message, $this->new_message, $message );

          });

      }


    /**
      * register PersianValidation service
      * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
      * @since May 31, 2016
      * @return void
      */
    public function register()
    {

       $this->app->bind( 'PersianValidation', 'Anetwork\Validation\PersianValidation' );
    
    }

}
