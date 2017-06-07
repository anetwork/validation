<?php

use Anetwork\Validation\ValidationRules as ValidationRules;

/**
 * unit test class
 * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
 * @since May 28, 2016
 */
class PersianValidationTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var null
	 */
    protected $attribute;

	/**
	 * @var string
	 */
    protected $value;

	/**
	 * @var array
	 */
    protected $parameters;

    /**
     * @var null
     */
    protected $validator;

	/**
     * @var object
	 */
	protected $PersianValidation;

	/**
	 * create instance of ValidationRules class
	 * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	 * @since May 28, 2016
	 * @return void
	 */
    public function __construct() 
    {
        $this->PersianValidation = new ValidationRules();
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

        $this->assertEquals(false, $this->PersianValidation->Alpha($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "شاهرخ";

        $this->assertEquals(true, $this->PersianValidation->Alpha($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value =  "1111 شاهرخ";

        $this->assertEquals(false, $this->PersianValidation->Alpha($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "شاهرخ نیاکان";

        $this->assertEquals(true, $this->PersianValidation->Alpha($this->attribute, $this->value, $this->parameters, $this->validator));
	    
	    $this->value = "وَحِیُدّ‌الٍمٌاًسی";

        $this->assertEquals(true, $this->PersianValidation->Alpha($this->attribute, $this->value, $this->parameters, $this->validator));

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

        $this->assertEquals(false, $this->PersianValidation->Num($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "۱۲۳۴";

        $this->assertEquals(true, $this->PersianValidation->Num($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value =  "۱۲۳123";

        $this->assertEquals(false, $this->PersianValidation->Num($this->attribute, $this->value, $this->parameters, $this->validator));

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

        $this->assertEquals(false, $this->PersianValidation->AlphaNum($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "1111شاهرخ";

        $this->assertEquals(false, $this->PersianValidation->AlphaNum($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value =  "1111شاهرخ۱۲۳۴";

        $this->assertEquals(false, $this->PersianValidation->AlphaNum($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value =  "شاهرخ";

        $this->assertEquals(true, $this->PersianValidation->AlphaNum($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value =  "۱۲۳۴";

        $this->assertEquals(true, $this->PersianValidation->AlphaNum($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value =  "Shahrokh۱۲۳۴شاهرخ";

        $this->assertEquals(false, $this->PersianValidation->AlphaNum($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value =  "۱۲۳۴ شاهرخ";

        $this->assertEquals(true, $this->PersianValidation->AlphaNum($this->attribute, $this->value, $this->parameters, $this->validator));
	
	    $this->value = "وَحِیُدّ‌الٍمٌاًسی";
	    
	    $this->assertEquals(true, $this->PersianValidation->AlphaNum($this->attribute, $this->value, $this->parameters, $this->validator));

    }

    /**
     * unit test of iran mobile number
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 28, 2016
     * @return void
     */
    public function testIranMobile()
    {

        $this->value = "+989355214655";

        $this->assertEquals(true, $this->PersianValidation->IranMobile($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "989355214655";

        $this->assertEquals(true, $this->PersianValidation->IranMobile($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "00989355214655";

        $this->assertEquals(true, $this->PersianValidation->IranMobile($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "09355214655";

        $this->assertEquals(true, $this->PersianValidation->IranMobile($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "09901464762";

        $this->assertEquals(true, $this->PersianValidation->IranMobile($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "9901464762";

        $this->assertEquals(true, $this->PersianValidation->IranMobile($this->attribute, $this->value, $this->parameters, $this->validator));

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

        $this->assertEquals(true, $this->PersianValidation->Sheba($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "IR06296000000010032420000";

        $this->assertEquals(false, $this->PersianValidation->Sheba($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "00062960000000100324200001";

        $this->assertEquals(false, $this->PersianValidation->Sheba($this->attribute, $this->value, $this->parameters, $this->validator));

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

        $this->assertEquals(true, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "3240175800";

        $this->assertEquals(true, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "3240164175";

        $this->assertEquals(true, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "3370075024";

        $this->assertEquals(true, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "0010532129";

        $this->assertEquals(true, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "0860170470";

        $this->assertEquals(true, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "324011122";

        $this->assertEquals(false, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "3213213";

        $this->assertEquals(false, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "0000000000";

        $this->assertEquals(false, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "1111111111";

        $this->assertEquals(false, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "2222222222";

        $this->assertEquals(false, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "3333333333";

        $this->assertEquals(false, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "4444444444";

        $this->assertEquals(false, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "5555555555";

        $this->assertEquals(false, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "6666666666";

        $this->assertEquals(false, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "7777777777";

        $this->assertEquals(false, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "8888888888";

        $this->assertEquals(false, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "9999999999";

        $this->assertEquals(false, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

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

      $this->assertEquals(false, $this->PersianValidation->IsNotPersian($this->attribute, $this->value, $this->parameters, $this->validator));

      $this->value = "shahrokh";

      $this->assertEquals(true, $this->PersianValidation->IsNotPersian($this->attribute, $this->value, $this->parameters, $this->validator));

      $this->value = "Shahrokhشاهرخ۱۲۳۴";

      $this->assertEquals(false, $this->PersianValidation->IsNotPersian($this->attribute, $this->value, $this->parameters, $this->validator));

      $this->value = "shahrokhw3289834(!!!%$$(@_)_)_";

      $this->assertEquals(true, $this->PersianValidation->IsNotPersian($this->attribute, $this->value, $this->parameters, $this->validator));

      $this->value = 1213131313131;

      $this->assertEquals(false, $this->PersianValidation->IsNotPersian($this->attribute, $this->value, $this->parameters, $this->validator));

      $this->value = ["Shahrokh"];

      $this->assertEquals(false, $this->PersianValidation->IsNotPersian($this->attribute, $this->value, $this->parameters, $this->validator));

    }

    /**
     * unit test of check array with custom array count
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since June 13, 2016
     * @return void
     */
    public function testLimitedArray()
    {
        $this->value = [];

        $this->assertEquals(true, $this->PersianValidation->LimitedArray($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = [];
        $this->parameters[0] = 1;

        $this->assertEquals(true, $this->PersianValidation->LimitedArray($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = ["a"];
        $this->parameters[0] = 2;

        $this->assertEquals(true, $this->PersianValidation->LimitedArray($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = ["a", "b"];
        $this->parameters[0] = 2;

        $this->assertEquals(true, $this->PersianValidation->LimitedArray($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = ["a", "b", "c"];
        $this->parameters[0] = 2;

        $this->assertEquals(false, $this->PersianValidation->LimitedArray($this->attribute, $this->value, $this->parameters, $this->validator));

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

        $this->assertEquals(true, $this->PersianValidation->UnSignedNum($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = -11;

        $this->assertEquals(false, $this->PersianValidation->UnSignedNum($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = 11.22;

        $this->assertEquals(false, $this->PersianValidation->UnSignedNum($this->attribute, $this->value, $this->parameters, $this->validator));

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

        $this->assertEquals(true, $this->PersianValidation->AlphaSpace($this->attribute, $this->value, $this->parameters, $this->validator, $this->parameters, $this->validator));

        $this->value = "shahrokh 121";

        $this->assertEquals(false, $this->PersianValidation->AlphaSpace($this->attribute, $this->value, $this->parameters, $this->validator, $this->parameters, $this->validator));
	    
	    $this->value = "وَحِیُدّ‌الٍمٌاًسی";
	    
	    $this->assertEquals(true, $this->PersianValidation->AlphaSpace($this->attribute, $this->value, $this->parameters, $this->validator, $this->parameters, $this->validator));

    }

    /**
     * unit test of url
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since Agu 17, 2016
     * @return void
     */
    public function testUrl()
    {

        $this->value = "http://hello.com";

        $this->assertEquals(true, $this->PersianValidation->Url($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "http/df;fdl";

        $this->assertEquals(false, $this->PersianValidation->Url($this->attribute, $this->value, $this->parameters, $this->validator));

    }

    /**
     * unit test of domain
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since Agu 17, 2016
     * @return void
     */
    public function testDomain()
    {

        $this->value = "www.adele.com";

        $this->assertEquals(true, $this->PersianValidation->Domain($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "xn--pgba0a.com";

        $this->assertEquals(true, $this->PersianValidation->Domain($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "iran-go.ir";

        $this->assertEquals(true, $this->PersianValidation->Domain($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "dshgf---df.w";

        $this->assertEquals(false, $this->PersianValidation->Domain($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "www.ad#le.com";

        $this->assertEquals(false, $this->PersianValidation->Domain($this->attribute, $this->value, $this->parameters, $this->validator));
        
        $this->value = "www.adele.co,m";

        $this->assertEquals(false, $this->PersianValidation->Domain($this->attribute, $this->value, $this->parameters, $this->validator));

    }

    /**
     * unit test of more
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since Agu 24, 2016
     * @return void
     */
    public function testMore()
    {

        $this->value = 10;

        $this->parameters[0] = 9;

        $this->assertEquals(true, $this->PersianValidation->More($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->parameters[0] = 11;

        $this->assertEquals(false, $this->PersianValidation->More($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->parameters[0] = 10;

        $this->assertEquals(false, $this->PersianValidation->More($this->attribute, $this->value, $this->parameters, $this->validator));

    }

    /**
     * unit test of less
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since Agu 24, 2016
     * @return void
     */
    public function testLess()
    {

        $this->value = 10;

        $this->parameters[0] = 11;

        $this->assertEquals(true, $this->PersianValidation->Less($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->parameters[0] = 9;

        $this->assertEquals(false, $this->PersianValidation->Less($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->parameters[0] = 10;

        $this->assertEquals(false, $this->PersianValidation->Less($this->attribute, $this->value, $this->parameters, $this->validator));

    }

    /**
     * unit test of iran phone number
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since Agu 24, 2016
     * @return void
     */
    public function testIranPhone()
    {

        $this->value = '07236445';

        $this->assertEquals(false, $this->PersianValidation->IranPhone($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = '7236445';

        $this->assertEquals(false, $this->PersianValidation->IranPhone($this->attribute, $this->value, $this->parameters, $this->validator));

		$this->value = '17236445';

		$this->assertEquals(false, $this->PersianValidation->IranPhone($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = '37236445';

        $this->assertEquals(true, $this->PersianValidation->IranPhone($this->attribute, $this->value, $this->parameters, $this->validator));

    }

    /**
     * unit test of payment card number
     * @author Mojtaba Anisi <geevepahlavan@yahoo.com>
     * @since Oct 2, 2016
     * @return void
     */
    public function testCardNumber()
    {
        $this->value = '6274-1290-0547-3742';

        $this->assertEquals(false, $this->PersianValidation->CardNumber($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = '6274129107473842';

        $this->assertEquals(false, $this->PersianValidation->CardNumber($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = '6274 1290 0547 3742';

        $this->assertEquals(false, $this->PersianValidation->CardNumber($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = '627412900742';

        $this->assertEquals(false, $this->PersianValidation->CardNumber($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = '62741290054737423252';

        $this->assertEquals(false, $this->PersianValidation->CardNumber($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = '6274129005473742';

        $this->assertEquals(true, $this->PersianValidation->CardNumber($this->attribute, $this->value, $this->parameters, $this->validator));
    }

	/**
	 * unit test of alpha and special characters
	 * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	 * @since Oct 7, 2016
	 * @return void
	 */
	public function testAdress()
	{

		$this->value = "Iran, Tehran - pardis";

		$this->assertEquals(true, $this->PersianValidation->Address($this->attribute, $this->value, $this->parameters, $this->validator));

		$this->value = "ایران، تهران - پردیس";

		$this->assertEquals(true, $this->PersianValidation->Address($this->attribute, $this->value, $this->parameters, $this->validator));

		$this->value = "Iran / Tehran / pardis / 16";

		$this->assertEquals(true, $this->PersianValidation->Address($this->attribute, $this->value, $this->parameters, $this->validator));

		$this->value = "ایران \ تهران \ پردیس \ ۱۶";

		$this->assertEquals(true, $this->PersianValidation->Address($this->attribute, $this->value, $this->parameters, $this->validator));

		$this->value = "Iran, Tehran & pardis";

		$this->assertEquals(false, $this->PersianValidation->Address($this->attribute, $this->value, $this->parameters, $this->validator));

	}

    /**
     * unit test of iran postal code
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since Apr 5, 2017
     * @return void
     */
    public function testIranPostalCode()
    {

        $this->value = "1619735744";

        $this->assertEquals(true, $this->PersianValidation->IranPostalCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "16197-35744";

        $this->assertEquals(true, $this->PersianValidation->IranPostalCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "116197-35744";

        $this->assertEquals(false, $this->PersianValidation->IranPostalCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "11619735744";

        $this->assertEquals(false, $this->PersianValidation->IranPostalCode($this->attribute, $this->value, $this->parameters, $this->validator));

    }


    /**
     * unit test of apk packge name
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 31, 2017
     * @return void
     */
    public function testPackageName()
    {

        $this->value = "com.adele";

        $this->assertEquals(true, $this->PersianValidation->PackageName($this->attribute, $this->value, $this->parameters, $this->validator));

         $this->value = "com.adele.adele";

        $this->assertEquals(true, $this->PersianValidation->PackageName($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "com.";

        $this->assertEquals(false, $this->PersianValidation->PackageName($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "com.adele.";

        $this->assertEquals(false, $this->PersianValidation->PackageName($this->attribute, $this->value, $this->parameters, $this->validator));

    }

}
