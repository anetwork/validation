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
| is_not_persian | Doesn't accept persain alphabet and number |
| is_array | Checked variable is array and array must be lesser and equal than parameter |
| unsigned_num | Checked variable is integer and unsigned | 


``` php
Validator::make( $request->all(), [

  'name' => 'persian_alpha|unique|max:25',    // Validate Persian name, unique and max to 25 characters

  'age' => 'persian_num|required',   // Validate Persian numbers and check it's required

  'address' => 'persian_alpha_num|min:10',   // Validate persian alphabet & numbers at least 10 digit accepted

  'mobile' => 'iran_mobile',   // Validate mobile number

  'sheba_number' => 'sheba',    // Validate sheba number of bank account

  'melli_code' => 'melli_code',    // Validate melli code number
  
  'latin_name' => 'is_not_persian' // Validate latin name doesn't contain persian alphabet or number
  
  'your_array' => 'is_array:2' // Validate your array variable and must be contian 2 member or lesser

]);
```
