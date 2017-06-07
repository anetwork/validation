<?php
namespace Anetwork\Validation;

use App;

/**
 * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
 * @since Sep 11, 2016
 */
class ValidationMessages
{
	 /**
	  * @var string
	  */
	  protected $lang;

	  /**
	   * @var array
	   */
	   protected $config;

  	  /**
	   * @var array
	   */
	   protected static $messages;

	  /**
	   * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	   * @since Sep 21, 2016
	   */
	 public function __construct() 
	 {
		 $this->lang = App::getLocale();

		if(! file_exists(resource_path('lang/validation/' . $this->lang . '.php'))){
            $this->config = include __DIR__ . '/../lang/' . $this->lang . '.php';
        } else {
            $this->config = include resource_path('lang/validation/' . $this->lang . '.php');
        }
	 }

	 /**
	  * set user custom messeages
	  * @param $validator
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Jun 6, 2017
	  */
	 public static function setCustomMessages( $validator )
	 {	
	 	if ( $validator ) {
	 		self::$messages = $validator->getCustomMessages();
	 	}
	 }

	 /**
	  * validation message for AlphaSpace
	  * @param $message
	  * @param $attribute
	  * @param $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function AlphaMsg($message, $attribute, $rule)
	 {
		if ( isset( self::$messages[$rule] ) ) {
	 		return str_replace($message, self::$messages[$rule], $message);
	 	}

		return str_replace($message, $this->config[ $rule ], $message);
	 }

	 /**
	  * validation message for AlphaSpace
	  * @param $message
	  * @param $attribute
	  * @param $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function NumMsg($message, $attribute, $rule)
	 {
		if ( isset( self::$messages[$rule] ) ) {
	 		return str_replace($message, self::$messages[$rule], $message);
	 	}

		return str_replace($message, $this->config[ $rule ], $message);
	 }

	 /**
	  * validation message for AlphaSpace
	  * @param $message
	  * @param $attribute
	  * @param $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function AlphaNumMsg($message, $attribute, $rule)
	 {
		if ( isset( self::$messages[$rule] ) ) {
	 		return str_replace($message, self::$messages[$rule], $message);
	 	}

		return str_replace($message, $this->config[ $rule ], $message);
	 }

	 /**
	  * validation message for AlphaSpace
	  * @param $message
	  * @param $attribute
	  * @param $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function IranMobileMsg($message, $attribute, $rule)
	 {
		if ( isset( self::$messages[$rule] ) ) {
	 		return str_replace($message, self::$messages[$rule], $message);
	 	}

		return str_replace($message, $this->config[ $rule ], $message);
	 }

	 /**
	  * validation message for AlphaSpace
	  * @param $message
	  * @param $attribute
	  * @param $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function ShebaMsg($message, $attribute, $rule)
	 {
		if ( isset( self::$messages[$rule] ) ) {
	 		return str_replace($message, self::$messages[$rule], $message);
	 	}

		return str_replace($message, $this->config[ $rule ], $message);
	 }

	 /**
	  * validation message for AlphaSpace
	  * @param $message
	  * @param $attribute
	  * @param $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function MelliCodeMsg($message, $attribute,	$rule)
	 {

		if ( isset( self::$messages[$rule] ) ) {
	 		return str_replace($message, self::$messages[$rule], $message);
	 	}

		return str_replace($message, $this->config[ $rule ], $message);

	 }

	 /**
	  * validation message for AlphaSpace
	  * @param $message
	  * @param $attribute
	  * @param $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function IsNotPersianMsg($message, $attribute, $rule)
	 {

		if ( isset( self::$messages[$rule] ) ) {
	 		return str_replace($message, self::$messages[$rule], $message);
	 	}

		return str_replace($message, $this->config[ $rule ], $message);

	 }

	 /**
	  * validation message for AlphaSpace
	  * @param $message
	  * @param $attribute
	  * @param $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function LimitedArrayMsg($message, $attribute, $rule)
	 {
		if ( isset( self::$messages[$rule] ) ) {
	 		return str_replace($message, self::$messages[$rule], $message);
	 	}

		return str_replace($message, $this->config[ $rule ], $message);
	 }

	 /**
	  * validation message for AlphaSpace
	  * @param $message
	  * @param $attribute
	  * @param $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function UnSignedNumMsg($message, $attribute, $rule)
	 {
	 	if ( isset( self::$messages[$rule] ) ) {
	 		return str_replace($message, self::$messages[$rule], $message);
	 	}

		return str_replace($message, $this->config[ $rule ], $message);
	 }

	 /**
	  * validation message for AlphaSpace
	  * @param $message
	  * @param $attribute
	  * @param $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function AlphaSpaceMsg($message, $attribute, $rule)
	 {
	 	if ( isset( self::$messages[$rule] ) ) {
	 		return str_replace($message, self::$messages[$rule], $message);
	 	}

		return str_replace($message, $this->config[ $rule ], $message);
	 }

	 /**
	  * validation message for Url
	  * @param $message
	  * @param $attribute
	  * @param $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function UrlMsg($message, $attribute, $rule)
	 {
	 	if ( isset( self::$messages[$rule] ) ) {
	 		return str_replace($message, self::$messages[$rule], $message);
	 	}

		return str_replace($message, $this->config[ $rule ], $message);
	 }

	 /**
	  * validation message for Domain
	  * @param $message
	  * @param $attribute
	  * @param $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function DomainMsg($message, $attribute, $rule)
	 {
		if ( isset( self::$messages[$rule] ) ) {
	 		return str_replace($message, self::$messages[$rule], $message);
	 	}

		return str_replace($message, $this->config[ $rule ], $message);
	 }

	 /**
	  * validation message for More
	  * @param $message
	  * @param $attribute
	  * @param $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function MoreMsg($message, $attribute, $rule)
	 {
		if ( isset( self::$messages[$rule] ) ) {
	 		return str_replace($message, self::$messages[$rule], $message);
	 	}

		return str_replace($message, $this->config[ $rule ], $message);
	 }

	 /**
	  * validation message for Less
	  * @param $message
 	  * @param $attribute
 	  * @param $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function LessMsg($message, $attribute, $rule)
	 {
		if ( isset( self::$messages[$rule] ) ) {
	 		return str_replace($message, self::$messages[$rule], $message);
	 	}

		return str_replace($message, $this->config[ $rule ], $message);
	 }

	 /**
	  * validation message for IranPhone
	  * @param $message
 	  * @param $attribute
 	  * @param $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function IranPhoneMsg($message, $attribute, $rule)
	 {
		if ( isset( self::$messages[$rule] ) ) {
	 		return str_replace($message, self::$messages[$rule], $message);
	 	}

		return str_replace($message, $this->config[ $rule ], $message);
	 }

	/**
	 * validation message for CardNumber
	 *
	 * @param $message
	 * @param $attribute
	 * @param $rule
	 * @author Mojtaba Anisi <geevepahlavan@yahoo.com>
	 * @since Oct 1, 2016
	 * @return string
	 */
	public function CardNumberMsg($message, $attribute, $rule)
	{
		if ( isset( self::$messages[$rule] ) ) {
	 		return str_replace($message, self::$messages[$rule], $message);
	 	}

		return str_replace($message, $this->config[ $rule ], $message);
	}

	/**
	 * validation message for Address
	 * @param $message
	 * @param $attribute
	 * @param $rule
	 * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	 * @since Oct 7, 2016
	 * @return string
	 */
	public function AddressMsg($message, $attribute, $rule)
	{
		if ( isset( self::$messages[$rule] ) ) {
	 		return str_replace($message, self::$messages[$rule], $message);
	 	}

		return str_replace($message, $this->config[ $rule ], $message);
	}

	/**
	 * validation message for IranPostalCode
	 * @param $message
	 * @param $attribute
	 * @param $rule
	 * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	 * @since Apr 5, 2017
	 * @return string
	 */
	public function IranPostalCodeMsg($message, $attribute, $rule)
	{
		if ( isset( self::$messages[$rule] ) ) {
	 		return str_replace($message, self::$messages[$rule], $message);
	 	}

		return str_replace($message, $this->config[ $rule ], $message);
	}

	/**
     * validation message for PackageName
     * @param $message 
     * @param $attribute      
     * @param $rule
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>        
     * @since May 31, 2017
     * @return string
     */
    public function PackageNameMsg($message, $attribute, $rule)
    {
		if ( isset( self::$messages[$rule] ) ) {
	 		return str_replace($message, self::$messages[$rule], $message);
	 	}

        return str_replace($message, $this->config[ $rule ], $message);
    }

}
