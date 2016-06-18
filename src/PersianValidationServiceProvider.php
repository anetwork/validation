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
        Validator::replacer('persian_alpha', function ($message, $attribute, $rule, $parameters) {

            $this->new_message = "persian alphabet is not valid";

            return str_replace($message, $this->new_message, $message);

        });

        // create custom rule for persian number
        Validator::extend('persian_num', 'PersianValidation@Num');

        // create custom message for persian number
        Validator::replacer('persian_num', function ($message, $attribute, $rule, $parameters) {

            $this->new_message = "persian number is not valid";

            return str_replace($message, $this->new_message, $message);

        });

        // create custom rule for persian alphabet and number
            Validator::extend('persian_alpha_num', 'PersianValidation@AlphaNum');

          // create custom message for persian alphabet and number
            Validator::replacer('persian_alpha_num', function ($message, $attribute, $rule, $parameters) {

                $this->new_message = "persian alpahbet & number is not valid";

                return str_replace($message, $this->new_message, $message);

            });

        // create custom rule for mobile
            Validator::extend('iran_mobile', 'PersianValidation@IranMobile');

          // create custom message for mobile
            Validator::replacer('iran_mobile', function ($message, $attribute, $rule, $parameters) {

                $this->new_message = "iran mobile number is not valid";

                return str_replace($message, $this->new_message, $message);

            });

        // create custom rule for sheba number
            Validator::extend('sheba', 'PersianValidation@Sheba');

          // create custom message for sheba number
            Validator::replacer('sheba', function ($message, $attribute, $rule, $parameters) {

                $this->new_message = "sheba number is not valid";

                return str_replace($message, $this->new_message, $message);

            });

        // create custom rule for melliCode
            Validator::extend('melli_code', 'PersianValidation@MelliCode');

          // create custom message for melliCode
            Validator::replacer('melli_code', function ($message, $attribute, $rule, $parameters) {

                $this->new_message = "melli code number is not valid";

                return str_replace($message, $this->new_message, $message);

            });

         // create custom rule for NotPersian
           Validator::extend('is_not_persian', 'PersianValidation@IsNotPersian');

         // create custom message for NotPersian
           Validator::replacer('is_not_persian', function ($message, $attribute, $rule, $parameters) {

               $this->new_message = "value is not string or is contain persian alphabet or number";

               return str_replace($message, $this->new_message, $message);

           });

        // create custom rule for NotPersian
          Validator::extend('is_array', 'PersianValidation@IsArray');

        // create custom message for NotPersian
          Validator::replacer('is_array', function ($message, $attribute, $rule, $parameters) {

              $this->new_message = "value is not array or array count is greater than value you define";

              return str_replace($message, $this->new_message, $message);

           });

         // create custom rule for Greater
          Validator::extend('greater_than', 'PersianValidation@Greater');

         // create custom message for Greater
          Validator::replacer('greater_than', function ($message, $attribute, $rule, $parameters) {

              $this->new_message = "value is not greater than value you define";

              return str_replace($message, $this->new_message, $message);

            });

         // create custom rule for Lesser
          Validator::extend('lesser_than', 'PersianValidation@Lesser');

        // create custom message for Lesser
          Validator::replacer('lesser_than', function ($message, $attribute, $rule, $parameters) {

              $this->new_message = "value is not lesser than value you define";

              return str_replace($message, $this->new_message, $message);

           });

          // create custom rule for category range
            Validator::extend('category_range', 'PersianValidation@CategoryRange');

          // create custom message for category_range
            Validator::replacer('category_range', function ($message, $attribute, $rule, $parameters) {

                $this->new_message = "category is out of range min 1 and max 2";

                return str_replace($message, $this->new_message, $message);

            });

         // create custom rule for geo range
            Validator::extend('geo_range', 'PersianValidation@GeoRange');

          // create custom message for geo_range
            Validator::replacer('geo_range', function ($message, $attribute, $rule, $parameters) {

                $this->new_message = "geo is out of range min 1 and max 5";

                return str_replace($message, $this->new_message, $message);

            });

          // create custom rule for os range
            Validator::extend('os_range', 'PersianValidation@OsRange');

          // create custom message for os_range
            Validator::replacer('os_range', function ($message, $attribute, $rule, $parameters) {

                $this->new_message = "os is out of range min 1 and max 6";

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
