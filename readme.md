# Laravel Persian Validation

Laravel Persian Validation provides validation for Persian alphabet, number and etc, that related to Persian.

## License

Laravel Persian Validation is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

## Install

Via Composer

``` bash
$ composer require Anetwork/Validation
```

##Config

Add the following provider to providers part of config/app.php
``` php
Anetwork\Validation\PersianValidationServiceProvider::class
Anetwork\Validation\ValidatorServiceProvider::class,

```

## Usage

You can use it as Validator rules

``` php
Validator::make( $request->all(), [
  'name' => 'persian_alpha',
  'age' => 'persian_num',
  'address' => 'persian_alpha_num',
  'mobile' => 'mobile',
  'sheba_number' => 'sheba',
  'melli_code' => 'melliCode',
]);
```
