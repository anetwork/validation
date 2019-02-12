<?php

namespace Anetwork\Validation;

use Illuminate\Support\ServiceProvider;
use Validator;
use App;

/**
 * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
 * @since May 25, 2016
 */
class PersianValidationServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    private $validationRules = [
        'persian_alpha'                 => 'Alpha',
        'persian_num'                   => 'Num',
        'persian_alpha_num'             => 'AlphaNum',
        'iran_mobile'                   => 'IranMobile',
        'sheba'                         => 'Sheba',
        'melli_code'                    => 'MelliCode',
        'is_not_persian'                => 'IsNotPersian',
        'limited_array'                 => 'LimitedArray',
        'unsigned_num'                  => 'UnSignedNum',
        'alpha_space'                   => 'AlphaSpace',
        'a_url'                         => 'Url',
        'a_domain'                      => 'Domain',
        'more'                          => 'More',
        'less'                          => 'Less',
        'iran_phone'                    => 'IranPhone',
        'iran_phone_with_area_code'     => 'IranPhoneWithAreaCode',
        'card_number'                   => 'CardNumber',
        'address'                       => 'Address',
        'iran_postal_code'              => 'IranPostalCode',
        'package_name'                  => 'PackageName',
    ];

    /**
     * create custom validation rules and messages
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 25, 2016
     * @return void
     */
    public function boot()
    {
        // publish lang file to resources/lang/validation
        $this->publishes([
            __DIR__ . '/../lang/' . App::getLocale() . '.php' => resource_path('lang/validation/' . App::getLocale() . '.php'),
        ]);

        foreach($this->validationRules as $name => $method)
        {
            Validator::extend($name, 'ValidationRules@'.$method);

            Validator::replacer($name, 'ValidationMessages@Msg');
        }

    }

    /**
     * register PersianValidation service
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 31, 2016
     * @return void
     */
    public function register()
    {
        $this->app->bind('ValidationRules', 'Anetwork\Validation\ValidationRules');

        $this->app->bind('ValidationMessages', 'Anetwork\Validation\ValidationMessages');

    }
}
