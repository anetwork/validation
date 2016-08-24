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

    // variable of class
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
        Validator::extend('persian_alpha', 'PersianValidation@Alpha');

        // create custom message for persian alphabet
        Validator::replacer('persian_alpha', function ($message, $attribute) {

            $this->new_message = "The $attribute must be a persian alphabet.";

            return str_replace($message, $this->new_message, $message);

        });

        // create custom rule for persian number
        Validator::extend('persian_num', 'PersianValidation@Num');

        // create custom message for persian number
        Validator::replacer('persian_num', function ($message, $attribute) {

            $this->new_message = "The $attribute must be a persian number.";

            return str_replace($message, $this->new_message, $message);

        });

        // create custom rule for persian alphabet and number
            Validator::extend('persian_alpha_num', 'PersianValidation@AlphaNum');

          // create custom message for persian alphabet and number
            Validator::replacer('persian_alpha_num', function ($message, $attribute) {

                $this->new_message = "The $attribute must be a persian alpahbet or number.";

                return str_replace($message, $this->new_message, $message);

            });

        // create custom rule for mobile
            Validator::extend('iran_mobile', 'PersianValidation@IranMobile');

          // create custom message for mobile
            Validator::replacer('iran_mobile', function ($message, $attribute) {

                $this->new_message = "The $attribute must be a iran mobile number.";

                return str_replace($message, $this->new_message, $message);

            });

        // create custom rule for sheba number
            Validator::extend('sheba', 'PersianValidation@Sheba');

          // create custom message for sheba number
            Validator::replacer('sheba', function ($message, $attribute) {

                $this->new_message = "The $attribute must be a sheba number.";

                return str_replace($message, $this->new_message, $message);

            });

        // create custom rule for melliCode
            Validator::extend('melli_code', 'PersianValidation@MelliCode');

          // create custom message for melliCode
            Validator::replacer('melli_code', function ($message, $attribute) {

                $this->new_message = "The $attribute must be a iran melli code.";

                return str_replace($message, $this->new_message, $message);

            });

         // create custom rule for NotPersian
           Validator::extend('is_not_persian', 'PersianValidation@IsNotPersian');

         // create custom message for NotPersian
           Validator::replacer('is_not_persian', function ($message, $attribute) {

               $this->new_message = "The $attribute could not be contain persian alpahbet or number.";

               return str_replace($message, $this->new_message, $message);

           });

        // create custom rule for LimitArray
          Validator::extend('limited_array', 'PersianValidation@LimitedArray');

        // create custom message for LimitArray
          Validator::replacer('limited_array', function ($message, $attribute) {

              $this->new_message = "The $attribute must ba a array and contain values you define not more.";

              return str_replace($message, $this->new_message, $message);

           });

         // create custom rule for unsigned_num
           Validator::extend('unsigned_num', 'PersianValidation@UnSignedNum');

         // create custom message for unsigned_num
           Validator::replacer('unsigned_num', function ($message, $attribute) {

              $this->new_message = "The $attribute must be an integer and unsigned.";

              return str_replace($message, $this->new_message, $message);

          });

         // create custom rule for unsigned_num
          Validator::extend('alpha_space', 'PersianValidation@AlphaSpace');

         // create custom message for unsigned_num
          Validator::replacer('alpha_space', function ($message, $attribute) {

              $this->new_message = "The $attribute must be alphabet.";

              return str_replace($message, $this->new_message, $message);

          });

        // create custom rule for url
        Validator::extend('a_url', 'PersianValidation@Url');

        // create custom message for unsigned_num
        Validator::replacer('a_url', function ($message, $attribute) {

            $this->new_message = "The $attribute is not correct url.";

            return str_replace($message, $this->new_message, $message);

        });

        // create custom rule for domain
        Validator::extend('a_domain', 'PersianValidation@Domain');

        // create custom message for unsigned_num
        Validator::replacer('a_domain', function ($message, $attribute) {

            $this->new_message = "The $attribute is not correct domain.";

            return str_replace($message, $this->new_message, $message);

        });

        // create custom rule for domain
        Validator::extend('more', 'PersianValidation@More');

        // create custom message for unsigned_num
        Validator::replacer('more', function ($message, $attribute) {

            $this->new_message = "The $attribute must be more than parameter.";

            return str_replace($message, $this->new_message, $message);

        });

        // create custom rule for domain
        Validator::extend('less', 'PersianValidation@Less');

        // create custom message for unsigned_num
        Validator::replacer('less', function ($message, $attribute) {

          $this->new_message = "The $attribute must be less than parameter.";

            return str_replace($message, $this->new_message, $message);

        });

        // create custom rule for domain
        Validator::extend('iran_phone', 'PersianValidation@IranPhone');

        // create custom message for unsigned_num
        Validator::replacer('iran_phone', function ($message, $attribute) {

          $this->new_message = "The $attribute must be a iran phone number.";

            return str_replace($message, $this->new_message, $message);

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

        $this->app->bind('PersianValidation', 'Anetwork\Validation\PersianValidation');

    }
}
