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

You can use these methods in deffernt ways:

There are hot ones for quick usage, besides some provided to manage outputs on your own way

Some are shown below

``` php
PersianValidation::alpha( $input );
```

``` php
PersianValidation::num( $input );
```

``` php
PersianValidation::alpha_num( $input );
```

``` php
PersianValidation::mobile( $input );
```

## License

The MIT License (MIT).
