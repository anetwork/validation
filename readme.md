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

You can access to validation rules by passing the rules key according blew following table:

| Rules | Descriptions |
| --- | --- |
| persian_alpha | Persian alphabet |
| persian_num | Persian numbers |
| persian_alpha_num | Persian alphabet and numbers |
| iran_mobile | Iran mobile number |
| sheba | Iran Sheba number |
| melli_code | Iran Melli code |
| is_not_persian | Doesn't accept persain alphabet and number |
| limited_array | Checked variable is array and array must be lesser and equal than parameter |
| unsigned_num | Checked variable is integer and unsigned |
| alpha_space | Accept alphabet and space |
| a_url | Checked correct url |
| a_domain | Checked correct domain |
| more | Checked value be max and not equal too|
| less | Checked value be min and not equal too |
| iran_phone | Iran phone number |





### Persian Alpha
Accept Persian language alphabet according to standard Persian, this is the way you can use this validation rule:

```
$input = [ 'فارسی' ];

$rules = [ 'persian_alpha' ];

Validator::make( $input, $rules );
```

### Persian numbers
Validate Persian standard numbers (۰۱۲۳۴۵۶۷۸۹):

```
$input = [ '۰۱۲۳۴۵۶۷۸۹' ];

$rules = [ 'persian_num' ];

Validator::make( $input, $rules );
```

### Persian Alpha Num
Validate Persian alpha num:

```
$input = [ 'فارسی۱۲۳۴۵۶۷۸۹' ];

$rules = [ 'persian_alpha_num' ];

Validator::make( $input, $rules );
```

### Iran mobile phone
Validate Iran mobile phones (irancel, rightel, hamrah-e-aval, ...):

```
$input = [ '09381234567' ];

$rules = [ 'iran_mobile' ];

Validator::make( $input, $rules );
```

### Sheba number
Validate iranian bank sheba number:

```
$input = [ 'IR062960000000100324200001' ];

$rules = [ 'sheba' ];

Validator::make( $input, $rules );
```

### Iran national code
Validate iran's national code (melli-code):

```
$input = [ '3240175800' ];

$rules = [ 'melli_code' ];

Validator::make( $input, $rules );
```

## More
Here is full list of Anetwork validation rules usage:

``` php
Validator::make( $request->all(), [

  'name'         => 'persian_alpha|unique|max:25',    // Validate Persian alphabet, unique and max to 25 characters

  'age'          => 'persian_num|required',   // Validate Persian numbers and check it's required

  'address'      => 'persian_alpha_num|min:10',   // Validate persian alphabet & numbers at least 10 digit accepted

  'mobile'       => 'iran_mobile',   // Validate mobile number

  'sheba_number' => 'sheba',    // Validate sheba number of bank account

  'melli_code'   => 'melli_code',    // Validate melli code number

  'latin_name'   => 'is_not_persian' // Validate latin name doesn't contain persian alphabet or number

  'your_array'   => 'limited_array:2' // Validate your array variable and must be contian 2 member or lesser

  'url'          => 'a_url' // Validate url

  'domain'       => 'a_domain' // Validate domain

  'more'         => 'more:10' // Validate value be more than parameter

  'less'         => 'less:10' // Validate value be less than parameter

  'phone'        => 'iran_phone' // Validate phone number

]);
```
