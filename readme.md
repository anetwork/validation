[![Build Status](https://travis-ci.org/anetwork/validation.svg?branch=master)](https://travis-ci.org/anetwork/validation)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/anetwork/validation/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/anetwork/validation/?branch=master)

# Laravel Persian Validation

Laravel Persian Validation provides validation for Persian alphabet, number and etc.

## Requirement

* Laravel 5.*
* PHP 5.5 >=

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
```

## Usage

You can use it as Validator rules

| Rules | Descriptions |
| --- | --- |
| persian_alpha | Persian alphabet |
| persian_num | Persian numbers |
| persian_alpha_num | Persian alphabet and numbers |
| iran_mobile | Iran mobile number |
| sheba_number | Iran Sheba number |
| melli_code | Iran Melli code |


``` php
Validator::make( $request->all(), [

  'name' => 'persian_alpha|unique|max:25',    // Validate Persian name, unique and max to 25 characters

  'age' => 'persian_num|required',   // Validate Persian numbers and check it's required

  'address' => 'persian_alpha_num|min:10',   // Validate persian alphabet & numbers at least 10 digit accepted

  'mobile' => 'iran_mobile',   // Validate mobile number

  'sheba_number' => 'sheba',    // Validate sheba number of bank account

  'melli_code' => 'melli_code',    // Validate melli code number

]);
```
