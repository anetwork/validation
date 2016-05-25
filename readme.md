# Laravel Persian Validation

Laravel Persian Validation provides validation for persian alphabet, number and ....

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

and the following Facade to the aliases part
``` php
'PersianValidation' => Anetwork\Validation\Facades\PersianValidation::class
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

## License

The MIT License (MIT).
