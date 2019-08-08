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
	   * @var array
	   */
	   protected static $app;

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
	 	self::$app = include __DIR__ . '/Config.php';

	 	if ( $validator ) {
	 		if ( round(App::version(), 1) > self::$app['version'] ) {
	 			self::$messages = $validator->customMessages;
	 		} else {
	 			self::$messages = $validator->getCustomMessages();
	 		}
	 	}
	 }

	 /**
	  * get validations message
	  * @param $message
	  * @param $attribute
	  * @param $rule
	  * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
	  * @since Jun 10, 2017
	  * @return string
	  */
	 public function Msg($message, $attribute, $rule)
	 {
		if ( isset( self::$messages[$rule] ) ) {
	 		return str_replace($message, self::$messages[$rule], $message);
	 	}

		return str_replace($message, $this->config[ $rule ], $message);
	 }

}
