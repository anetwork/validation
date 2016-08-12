<?php

use Anetwork\Validation\PersianValidation as PersianValidation;

/**
 * unit test class
 * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
 * @since May 28, 2016
 */
class PersianValidationTest extends PHPUnit_Framework_TestCase
{
    //variables of class that define as methods parameters
    protected $attribute;
    protected $value;
    protected $parameters;

    //instance of PersianValidation class
    protected $PersianValidation;

    public function __construct()
    {

        $this->PersianValidation = new PersianValidation();
    }

    /**
     * unit test of persian alphabet
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 28, 2016
     * @return void
     */
    public function testAlpha()
    {

        $this->value = "Shahrokh";

        $this->assertEquals(false, $this->PersianValidation->Alpha($this->attribute, $this->value));

        $this->value = "شاهرخ";

        $this->assertEquals(true, $this->PersianValidation->Alpha($this->attribute, $this->value));

        $this->value =  "1111 شاهرخ";

        $this->assertEquals(false, $this->PersianValidation->Alpha($this->attribute, $this->value));

        $this->value = "شاهرخ نیاکان";

        $this->assertEquals(true, $this->PersianValidation->Alpha($this->attribute, $this->value));

    }

    /**
     * unit test of persian number
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 28, 2016
     * @return void
     */
    public function testNum()
    {

        $this->value = "1234";

        $this->assertEquals(false, $this->PersianValidation->Num($this->attribute, $this->value));

        $this->value = "۱۲۳۴";

        $this->assertEquals(true, $this->PersianValidation->Num($this->attribute, $this->value));

        $this->value =  "۱۲۳123";

        $this->assertEquals(false, $this->PersianValidation->Num($this->attribute, $this->value));

    }

    /**
     * unit test of persian alphabet and number
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 28, 2016
     * @return void
     */
    public function testAlpha_Num()
    {

        $this->value = "Shahrokh1234";

        $this->assertEquals(false, $this->PersianValidation->AlphaNum($this->attribute, $this->value));

        $this->value = "1111شاهرخ";

        $this->assertEquals(false, $this->PersianValidation->AlphaNum($this->attribute, $this->value));

        $this->value =  "1111شاهرخ۱۲۳۴";

        $this->assertEquals(false, $this->PersianValidation->AlphaNum($this->attribute, $this->value));

        $this->value =  "شاهرخ";

        $this->assertEquals(true, $this->PersianValidation->AlphaNum($this->attribute, $this->value));

        $this->value =  "۱۲۳۴";

        $this->assertEquals(true, $this->PersianValidation->AlphaNum($this->attribute, $this->value));

        $this->value =  "Shahrokh۱۲۳۴شاهرخ";

        $this->assertEquals(false, $this->PersianValidation->AlphaNum($this->attribute, $this->value));

        $this->value =  "۱۲۳۴ شاهرخ";

        $this->assertEquals(true, $this->PersianValidation->AlphaNum($this->attribute, $this->value));


    }

    /**
     * unit test of iran mobile number
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 28, 2016
     * @return void
     */
    public function testIranMobile()
    {

        $this->value = "+989380105725";

        $this->assertEquals(true, $this->PersianValidation->IranMobile($this->attribute, $this->value));

        $this->value = "09380105725";

        $this->assertEquals(true, $this->PersianValidation->IranMobile($this->attribute, $this->value));

        $this->value = "989123583439";

        $this->assertEquals(true, $this->PersianValidation->IranMobile($this->attribute, $this->value));

        $this->value = "9380105725";

        $this->assertEquals(false, $this->PersianValidation->IranMobile($this->attribute, $this->value));

        $this->value = "09023583439";

        $this->assertEquals(true, $this->PersianValidation->IranMobile($this->attribute, $this->value));

        $this->value = "09313583439";

        $this->assertEquals(true, $this->PersianValidation->IranMobile($this->attribute, $this->value));

    }

    /**
     * unit test of sheba number
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 28, 2016
     * @return void
     */
    public function testSheba()
    {

        $this->value = "IR062960000000100324200001";

        $this->assertEquals(true, $this->PersianValidation->Sheba($this->attribute, $this->value));

        $this->value = "IR06296000000010032420000";

        $this->assertEquals(false, $this->PersianValidation->Sheba($this->attribute, $this->value));

        $this->value = "00062960000000100324200001";

        $this->assertEquals(false, $this->PersianValidation->Sheba($this->attribute, $this->value));

    }

    /**
     * unit test of melli code number
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 28, 2016
     * @return void
     */
    public function testMelliCode()
    {
        $this->value = "0013542419";

        $this->assertEquals(true, $this->PersianValidation->MelliCode($this->attribute, $this->value));

        $this->value = "3240175800";

        $this->assertEquals(true, $this->PersianValidation->MelliCode($this->attribute, $this->value));

        $this->value = "3240164175";

        $this->assertEquals(true, $this->PersianValidation->MelliCode($this->attribute, $this->value));

        $this->value = "3370075024";

        $this->assertEquals(true, $this->PersianValidation->MelliCode($this->attribute, $this->value));

        $this->value = "0010532129";

        $this->assertEquals(true, $this->PersianValidation->MelliCode($this->attribute, $this->value));

        $this->value = "0860170470";

        $this->assertEquals(true, $this->PersianValidation->MelliCode($this->attribute, $this->value));

        $this->value = "324011122";

        $this->assertEquals(false, $this->PersianValidation->MelliCode($this->attribute, $this->value));

        $this->value = "3213213";

        $this->assertEquals(false, $this->PersianValidation->MelliCode($this->attribute, $this->value));

    }

    /**
     * unit test of not persian alphabet and number
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since June 13, 2016
     * @return void
     */
    public function testIsNotPersian()
    {

      $this->value = "شاهرخ۱۲۳۴";

      $this->assertEquals(false, $this->PersianValidation->IsNotPersian($this->attribute, $this->value));

      $this->value = "shahrokh";

      $this->assertEquals(true, $this->PersianValidation->IsNotPersian($this->attribute, $this->value));

      $this->value = "Shahrokhشاهرخ۱۲۳۴";

      $this->assertEquals(false, $this->PersianValidation->IsNotPersian($this->attribute, $this->value));

      $this->value = "shahrokhw3289834(!!!%$$(@_)_)_";

      $this->assertEquals(true, $this->PersianValidation->IsNotPersian($this->attribute, $this->value));

      $this->value = 1213131313131;

      $this->assertEquals(false, $this->PersianValidation->IsNotPersian($this->attribute, $this->value));

      $this->value = ["Shahrokh"];

      $this->assertEquals(false, $this->PersianValidation->IsNotPersian($this->attribute, $this->value));

    }

    /**
     * unit test of check array with custom array count
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since June 13, 2016
     * @return void
     */
    public function testIsArray()
    {
        $this->value = [];

        $this->assertEquals(true, $this->PersianValidation->LimitedArray($this->attribute, $this->value, $this->parameters));

        $this->value = [];
        $this->parameters[0] = 1;

        $this->assertEquals(true, $this->PersianValidation->LimitedArray($this->attribute, $this->value, $this->parameters));

        $this->value = ["a"];
        $this->parameters[0] = 2;

        $this->assertEquals(true, $this->PersianValidation->LimitedArray($this->attribute, $this->value, $this->parameters));

        $this->value = ["a", "b"];
        $this->parameters[0] = 2;

        $this->assertEquals(true, $this->PersianValidation->LimitedArray($this->attribute, $this->value, $this->parameters));

        $this->value = ["a", "b", "c"];
        $this->parameters[0] = 2;

        $this->assertEquals(false, $this->PersianValidation->LimitedArray($this->attribute, $this->value, $this->parameters));

    }

    /**
     * unit test of unsigned number
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since July 22, 2016
     * @return void
     */
    public function testUnSignedNum()
    {

        $this->value = 11;

        $this->assertEquals(true, $this->PersianValidation->UnSignedNum($this->attribute, $this->value));

        $this->value = -11;

        $this->assertEquals(false, $this->PersianValidation->UnSignedNum($this->attribute, $this->value));

        $this->value = 11.22;

        $this->assertEquals(false, $this->PersianValidation->UnSignedNum($this->attribute, $this->value));

    }

    /**
     * unit test of alpha space
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since Agu 3, 2016
     * @return void
     */
    public function testAlphaSpace()
    {

        $this->value = "shahrokh niakan";

        $this->assertEquals(true, $this->PersianValidation->AlphaSpace($this->attribute, $this->value));

        $this->value = "shahrokh 121";

        $this->assertEquals(false, $this->PersianValidation->AlphaSpace($this->attribute, $this->value));

    }
}
