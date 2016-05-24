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
```

and the following Facade to the aliases part
``` php
'PersianValidation' => Anetwork\Validation\PersianValidation::class
```

## Usage

You can use it as below

``` php
PersianValidation::alpha( $input ); // validate pesrain alphabet
```

``` php
PersianValidation::num( $input ); // validate persian number
```

``` php
PersianValidation::alpha_num( $input ); // validate persian alphabet and number
```

``` php
PersianValidation::mobile( $input ); // validate mobile number
```

``` php
PersianValidation::sheba( $input ); // validate sheba number
```

``` php
PersianValidation::meliCode( $input ); // validate meliCode number
```
## License

The MIT License (MIT).
