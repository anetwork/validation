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
	 protected $msg;

	 /**
	  * validation message for Alpha
	  * @param $message, $attribute
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function AlphaMsg($message, $attribute)
	 {

		 $this->msg = "The $attribute must be a persian alphabet.";

		 return str_replace($message, $this->msg, $message);

	 }

	 /**
	  * validation message for Num
	  * @param $message, $attribute
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function NumMsg($message, $attribute)
	 {

		 $this->msg = "The $attribute must be a persian number.";

		 return str_replace($message, $this->msg, $message);

	 }

	 /**
	  * validation message for AlphaNum
	  * @param $message, $attribute
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function AlphaNumMsg($message, $attribute)
	 {

		 $this->msg = "The $attribute must be a persian alpahbet or number.";

		 return str_replace($message, $this->msg, $message);

	 }

	 /**
	  * validation message for IranMobile
	  * @param $message, $attribute
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function IranMobileMsg($message, $attribute)
	 {

		 $this->msg = "The $attribute must be a iran mobile number.";

		 return str_replace($message, $this->msg, $message);

	 }

	 /**
	  * validation message for Sheba
	  * @param $message, $attribute
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function ShebaMsg($message, $attribute)
	 {

		 $this->msg = "The $attribute must be a sheba number.";

		 return str_replace($message, $this->msg, $message);

	 }

	 /**
	  * validation message for MelliCode
	  * @param $message, $attribute
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function MelliCodeMsg($message, $attribute)
	 {

		 $this->msg = "The $attribute must be a iran melli code.";

		 return str_replace($message, $this->msg, $message);

	 }

	 /**
	  * validation message for IsNotPersian
	  * @param $message, $attribute
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function IsNotPersianMsg($message, $attribute)
	 {

		 $this->msg = "The $attribute could not be contain persian alpahbet or number.";

		 return str_replace($message, $this->msg, $message);

	 }

	 /**
	  * validation message for LimitedArray
	  * @param $message, $attribute
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function LimitedArrayMsg($message, $attribute)
	 {

		 $this->msg = "The $attribute must ba a array and contain values you define not more.";

		 return str_replace($message, $this->msg, $message);

	 }

	 /**
	  * validation message for UnSignedNum
	  * @param $message, $attribute
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function UnSignedNumMsg($message, $attribute)
	 {

		 $this->msg = "The $attribute must be an integer and unsigned.";

		 return str_replace($message, $this->msg, $message);

	 }

	 /**
	  * validation message for AlphaSpace
	  * @param $message, $attribute
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function AlphaSpaceMsg($message, $attribute)
	 {

		 $this->msg = "The $attribute must be alphabet.";

		 return str_replace($message, $this->msg, $message);

	 }

	 /**
	  * validation message for Url
	  * @param $message, $attribute
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function UrlMsg($message, $attribute)
	 {

		 $this->msg = "The $attribute is not correct url.";

		 return str_replace($message, $this->msg, $message);

	 }

	 /**
	  * validation message for Domain
	  * @param $message, $attribute
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function DomainMsg($message, $attribute)
	 {

		 $this->msg = "The $attribute is not correct domain.";

		 return str_replace($message, $this->msg, $message);

	 }

	 /**
	  * validation message for More
	  * @param $message, $attribute
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function MoreMsg($message, $attribute)
	 {

		 $this->msg = "The $attribute must be more than parameter.";

		 return str_replace($message, $this->msg, $message);

	 }

	 /**
	  * validation message for Less
	  * @param $message, $attribute
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function LessMsg($message, $attribute)
	 {

		 $this->msg = "The $attribute must be less than parameter.";

		 return str_replace($message, $this->msg, $message);

	 }

	 /**
	  * validation message for IranPhone
	  * @param $message, $attribute
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Sep 11, 2016
	  * @return string
	  */
	 public function IranPhoneMsg($message, $attribute)
	 {

		 $this->msg = "The $attribute must be a iran phone number.";

		 return str_replace($message, $this->msg, $message);

	 }



}
