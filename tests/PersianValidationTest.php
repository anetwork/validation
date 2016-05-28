<?php

use Anetwork\Validation\PersianValidation as PersianValidation;

/**
 * unit test class
 * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
 * @since May 28, 2016
 */
class ConvertTest extends PHPUnit_Framework_TestCase
{
    //variables of class
    protected $attribute;
    protected $value;
    protected $parameters;
    protected $validator;
    protected $PersianValidation;

    public function __construct() {

      $this->PersianValidation = new PersianValidation();
    }

    /**
     * unit test of persian alphabet
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 28, 2016
     * @return void
     */
    public function testAlpha() {

      $this->value = "Shahrokh";

      $this->assertEquals( false,  $this->PersianValidation->alpha( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = "شاهرخ";

      $this->assertEquals( true,  $this->PersianValidation->alpha( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value =  "1111شاهرخ";

      $this->assertEquals( false,  $this->PersianValidation->alpha( $this->attribute, $this->value, $this->parameters, $this->validator ) );


    }

    /**
     * unit test of persian number
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 28, 2016
     * @return void
     */
    public function testNum() {

      $this->value = "1234";

      $this->assertEquals( false,  $this->PersianValidation->num( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = "۱۲۳۴";

      $this->assertEquals( true,  $this->PersianValidation->num( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value =  "۱۲۳123";

      $this->assertEquals( false,  $this->PersianValidation->num( $this->attribute, $this->value, $this->parameters, $this->validator ) );

    }

    /**
     * unit test of persian alphabet and number
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 28, 2016
     * @return void
     */
    public function testAlpha_Num() {

      $this->value = "Shahrokh1234";

      $this->assertEquals( false,  $this->PersianValidation->alpha_num( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = "1111شاهرخ";

      $this->assertEquals( false,  $this->PersianValidation->alpha_num( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value =  "1111شاهرخ۱۲۳۴";

      $this->assertEquals( false,  $this->PersianValidation->alpha_num( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value =  "شاهرخ";

      $this->assertEquals( true,  $this->PersianValidation->alpha_num( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value =  "۱۲۳۴";

      $this->assertEquals( true,  $this->PersianValidation->alpha_num( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value =  "Shahrokh۱۲۳۴شاهرخ";

      $this->assertEquals( false,  $this->PersianValidation->alpha_num( $this->attribute, $this->value, $this->parameters, $this->validator ) );

    }

    /**
     * unit test of mobile number
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 28, 2016
     * @return void
     */
    public function testMobile() {

      $this->value = "+989380105725";

      $this->assertEquals( true,  $this->PersianValidation->mobile( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = "09380105725";

      $this->assertEquals( true,  $this->PersianValidation->mobile( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = "989123583439";

      $this->assertEquals( true,  $this->PersianValidation->mobile( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = "9380105725";

      $this->assertEquals( false,  $this->PersianValidation->mobile( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = "09023583439";

      $this->assertEquals( true,  $this->PersianValidation->mobile( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = "09313583439";

      $this->assertEquals( true,  $this->PersianValidation->mobile( $this->attribute, $this->value, $this->parameters, $this->validator ) );

    }

    /**
     * unit test of sheba number
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 28, 2016
     * @return void
     */
    public function testSheba() {

      $this->value = "IR062960000000100324200001";

      $this->assertEquals( true,  $this->PersianValidation->sheba( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = "IR06296000000010032420000";

      $this->assertEquals( false,  $this->PersianValidation->sheba( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = "00062960000000100324200001";

      $this->assertEquals( false,  $this->PersianValidation->sheba( $this->attribute, $this->value, $this->parameters, $this->validator ) );

    }

    /**
     * unit test of melliCode number
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 28, 2016
     * @return void
     */
    public function testMelliCode() {

      $this->value = "3240175800";

      $this->assertEquals( true,  $this->PersianValidation->melliCode( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = "324011122";

      $this->assertEquals( false,  $this->PersianValidation->melliCode( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = "3213213";

      $this->assertEquals( false,  $this->PersianValidation->melliCode( $this->attribute, $this->value, $this->parameters, $this->validator ) );

    }

}
