<?php
namespace Anetwork\Validation;

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
	   * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	   * @since Sep 21, 2016
	   */
	 public function __construct() {

		 $this->lang = \App::getLocale();

		 $this->config = include_once __DIR__ . '/../lang/' . $this->lang . '.php';

	 }

	 /**
	  * validation message for Alpha
	  * @param $message, $attribute and $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function AlphaMsg($message, $attribute, $rule)
	 {

		 return str_replace($message, $this->config[ $rule ], $message);

	 }

	 /**
	  * validation message for Num
	  * @param $message, $attribute and $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function NumMsg($message, $attribute, $rule)
	 {

		 return str_replace($message, $this->config[ $rule ], $message);

	 }

	 /**
	  * validation message for AlphaNum
	  * @param $message, $attribute and $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function AlphaNumMsg($message, $attribute, $rule)
	 {

		 return str_replace($message, $this->config[ $rule ], $message);

	 }

	 /**
	  * validation message for IranMobile
	  * @param $message, $attribute and $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function IranMobileMsg($message, $attribute, $rule)
	 {

		 return str_replace($message, $this->config[ $rule ], $message);

	 }

	 /**
	  * validation message for Sheba
	  * @param $message, $attribute and $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function ShebaMsg($message, $attribute, $rule)
	 {

		 return str_replace($message, $this->config[ $rule ], $message);

	 }

	 /**
	  * validation message for MelliCode
	  * @param $message, $attribute and $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function MelliCodeMsg($message, $attribute,	$rule)
	 {

		 return str_replace($message, $this->config[ $rule ], $message);

	 }

	 /**
	  * validation message for IsNotPersian
	  * @param $message, $attribute and $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function IsNotPersianMsg($message, $attribute, $rule)
	 {

		 return str_replace($message, $this->config[ $rule ], $message);

	 }

	 /**
	  * validation message for LimitedArray
	  * @param $message, $attribute and $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function LimitedArrayMsg($message, $attribute, $rule)
	 {

		 return str_replace($message, $this->config[ $rule ], $message);

	 }

	 /**
	  * validation message for UnSignedNum
	  * @param $message, $attribute and $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function UnSignedNumMsg($message, $attribute, $rule)
	 {

		 return str_replace($message, $this->config[ $rule ], $message);

	 }

	 /**
	  * validation message for AlphaSpace
	  * @param $message, $attribute and $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function AlphaSpaceMsg($message, $attribute, $rule)
	 {

		 return str_replace($message, $this->config[ $rule ], $message);

	 }

	 /**
	  * validation message for Url
	  * @param $message, $attribute and $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function UrlMsg($message, $attribute, $rule)
	 {

		 return str_replace($message, $this->config[ $rule ], $message);

	 }

	 /**
	  * validation message for Domain
	  * @param $message, $attribute and $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function DomainMsg($message, $attribute, $rule)
	 {

		 return str_replace($message, $this->config[ $rule ], $message);

	 }

	 /**
	  * validation message for More
	  * @param $message, $attribute and $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function MoreMsg($message, $attribute, $rule)
	 {

		 return str_replace($message, $this->config[ $rule ], $message);

	 }

	 /**
	  * validation message for Less
	  * @param $message, $attribute and $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function LessMsg($message, $attribute, $rule)
	 {

		 return str_replace($message, $this->config[ $rule ], $message);

	 }

	 /**
	  * validation message for IranPhone
	  * @param $message, $attribute and $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function IranPhoneMsg($message, $attribute, $rule)
	 {

		 return str_replace($message, $this->config[ $rule ], $message);

	 }



}
