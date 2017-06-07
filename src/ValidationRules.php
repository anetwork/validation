<?php
namespace Anetwork\Validation;

use Anetwork\Validation\ValidationMessages;

/**
 * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
 * @since May 21, 2016
 */
class ValidationRules
{
    /**
     * @var boolean
     */
    protected $status;

    /**
     * validate persian alphabet and space
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 21, 2016
     * @return boolean
     */
    public function Alpha($attribute, $value, $parameters, $validator)
    {
        ValidationMessages::setCustomMessages( $validator );

        $this->status = (bool) preg_match("/^[\x{600}-\x{6FF}\x{200c}\x{064b}\x{064d}\x{064c}\x{064e}\x{064f}\x{0650}\x{0651}\s]+$/u", $value);

        return $this->status ;

    }

    /**
     * validate persian number
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 21, 2016
     * @return boolean
     */
    public function Num($attribute, $value, $parameters, $validator)
    {
        ValidationMessages::setCustomMessages( $validator );

        $this->status = (bool) preg_match('/^[\x{6F0}-\x{6F9}]+$/u', $value);

        return $this->status ;
    }

    /**
     * validate persian alphabet, number and space
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 21, 2016
     * @return boolean
     */
    public function AlphaNum($attribute, $value, $parameters, $validator)
    {
        ValidationMessages::setCustomMessages( $validator );

        $this->status = (bool) preg_match('/^[\x{600}-\x{6FF}\x{200c}\x{064b}\x{064d}\x{064c}\x{064e}\x{064f}\x{0650}\x{0651}\s]+$/u', $value);

        return $this->status;
    }

    /**
     * validate mobile number
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 21, 2016
     * @return boolean
     */
    public function IranMobile($attribute, $value, $parameters, $validator)
    {
        ValidationMessages::setCustomMessages( $validator );

        if ((bool) preg_match('/^(((98)|(\+98)|(0098)|0)(9){1}[0-9]{9})+$/', $value) || (bool) preg_match('/^(9){1}[0-9]{9}+$/', $value))
            return true;

        return false;
    }

    /**
     * validate sheba number
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 21, 2016
     * @return boolean
     */
    public function Sheba($attribute, $value, $parameters, $validator)
    {
        ValidationMessages::setCustomMessages( $validator );

        $ibanReplaceValues = array();

        if (!empty($value)) {
                $value = preg_replace('/[\W_]+/', '', strtoupper($value));

            if (( 4 > strlen($value) ||  strlen($value) > 34 ) || ( is_numeric($value [ 0 ])  || is_numeric($value [ 1 ]) ) || ( ! is_numeric($value [ 2 ]) || ! is_numeric($value [ 3 ]) )) {
                return false;
            }

            $ibanReplaceChars = range('A', 'Z');

            foreach (range(10, 35) as $tempvalue) {
                $ibanReplaceValues[] = strval($tempvalue);
            }


            $tmpIBAN = substr($value, 4) . substr($value, 0, 4);

            $tmpIBAN = str_replace($ibanReplaceChars, $ibanReplaceValues, $tmpIBAN);

            $tmpValue = intval(substr($tmpIBAN, 0, 1));

            for ($i = 1; $i < strlen($tmpIBAN); $i++) {
                $tmpValue *= 10;

                $tmpValue += intval(substr($tmpIBAN, $i, 1));

                $tmpValue %= 97;
            }

            if ($tmpValue != 1) {
                return false;
            }

            return true;
        }

        return false;
    }

   /**
    * validate meliCode number
    * @param $attribute
    * @param $value
    * @param $parameters
    * @param $validator
    * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
    * @since May 21, 2016
    * @return boolean
    */
    public function MelliCode($attribute, $value, $parameters, $validator)
    {
        ValidationMessages::setCustomMessages( $validator );

        if (!preg_match('/^\d{8,10}$/', $value) || preg_match('/^[0]{10}|[1]{10}|[2]{10}|[3]{10}|[4]{10}|[5]{10}|[6]{10}|[7]{10}|[8]{10}|[9]{10}$/', $value)) {
            return false;
        }

        $sub = 0;

        if (strlen($value) == 8) {
            $value = '00' . $value;
        } elseif (strlen($value) == 9) {
            $value = '0' . $value;
        }

        for ($i = 0; $i <= 8; $i++) {
            $sub = $sub + ( $value[$i] * ( 10 - $i ) );
        }

        if (( $sub % 11 ) < 2) {
            $control = ( $sub % 11 );
        } else {
            $control = 11 - ( $sub % 11 );
        }

        if ($value[9] == $control) {
            return true;
        } else {
            return false;
        }

    }

    /**
     * validate string that is not contain persian alphabet and number
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since June 13, 2016
     * @return boolean
     */
     public function IsNotPersian($attribute, $value, $parameters, $validator)
     {
        ValidationMessages::setCustomMessages( $validator );

        if (is_string($value)) {

            $this->status = (bool) preg_match("/[\x{600}-\x{6FF}]/u", $value);

            return !$this->status;

        }

        return false;
    }

   /**
    * validate array with custom count of array
    * @param $attribute
    * @param $value
    * @param $parameters
    * @param $validator
    * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
    * @since June 13, 2016
    * @return boolean
    */
    public function LimitedArray($attribute, $value, $parameters, $validator)
    {
        ValidationMessages::setCustomMessages( $validator );

        if (is_array($value)) {

            if (isset($parameters[0])) {

               return ( (count($value) <= $parameters[0]) ? true : false );

            } else {

                return true;

            }

        }

        return false;
    }

  /**
   * validate number to be unsigned
   * @param $attribute
   * @param $value
   * @param $parameters
   * @param $validator
   * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
   * @since July 22, 2016
   * @return boolean
   */
   public function UnSignedNum($attribute, $value, $parameters, $validator) 
   {
        ValidationMessages::setCustomMessages( $validator );

        $this->status = (bool) preg_match('/^\d+$/', $value);

        return $this->status;
    }

    /**
     * validate alphabet and spaces
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since Agu 3, 2016
     * @return boolean
     */
    public function AlphaSpace($attribute, $value, $parameters, $validator)
    {
        ValidationMessages::setCustomMessages( $validator );

        $this->status = (bool) preg_match("/^[\pL\s\x{200c}\x{064b}\x{064d}\x{064c}\x{064e}\x{064f}\x{0650}\x{0651}]+$/u", $value);

        return $this->status;
    }

    /**
     * validate Url
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since Agu 17, 2016
     * @return boolean
     */
    public function Url($attribute, $value, $parameters, $validator)
    {
        ValidationMessages::setCustomMessages( $validator );

        $this->status = (bool) preg_match("/^(HTTP|http(s)?:\/\/(www\.)?[A-Za-z0-9]+([\-\.]{1,2}[A-Za-z0-9]+)*\.[A-Za-z]{2,40}(:[0-9]{1,40})?(\/.*)?)$/", $value);

        return $this->status;
    }

    /**
     * validate Domain
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since Agu 17, 2016
     * @return boolean
     */
    public function Domain($attribute, $value, $parameters, $validator)
    {
        ValidationMessages::setCustomMessages( $validator );

        $this->status = (bool) preg_match("/^((www\.)?(\*\.)?[A-Za-z0-9]+([\-\.]{1,2}[A-Za-z0-9]+)*\.[A-Za-z]{2,40}(:[0-9]{1,40})?(\/.*)?)$/", $value);

        return $this->status;
    }

    /**
     * value must be more than parameters
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since Agu 24, 2016
     * @return boolean
     */
    public function More($attribute, $value, $parameters, $validator)
    {
        ValidationMessages::setCustomMessages( $validator );

        if ( isset( $parameters[0] ) ) {

          return ( $value > $parameters[0] ? true : false );

        }

        return false;
    }

    /**
     * value must be less than parameters
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since Agu 24, 2016
     * @return boolean
     */
    public function Less($attribute, $value, $parameters, $validator)
    {
        ValidationMessages::setCustomMessages( $validator );

        if ( isset( $parameters[0] ) ) {

          return ( $value < $parameters[0] ? true : false );

        }

        return false;
    }

    /**
     * iran phone number
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since Agu 24, 2016
     * @return boolean
     */
    public function IranPhone($attribute, $value, $parameters, $validator)
    {
        ValidationMessages::setCustomMessages( $validator );

        $this->status = (bool) preg_match('/^[2-9][0-9]{7}+$/', $value) ;

        return $this->status;
    }

    /**
     * payment card number validation
     * depending on 'http://www.aliarash.com/article/creditcart/credit-debit-cart.htm' article
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     * @author Mojtaba Anisi <geevepahlavan@yahoo.com>
     * @since Oct 1, 2016
     * @return boolean
     */
    function CardNumber($attribute, $value, $parameters, $validator)
    {
        ValidationMessages::setCustomMessages( $validator );

        if (!preg_match('/^\d{16}$/', $value)) {
            return false;
        }

        $sum = 0;

        for ($position = 1; $position <= 16; $position++){
            $temp = $value[$position - 1];
            $temp = $position % 2 === 0 ? $temp : $temp * 2;
            $temp = $temp > 9 ? $temp - 9 : $temp;

            $sum += $temp;
        }

        return (bool)($sum % 10 === 0);
    }

    /**
     * validate alphabet, number and some special characters
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since Oct 7, 2016
     * @return boolean
     */
    public function Address($attribute, $value, $parameters, $validator)
    {
        ValidationMessages::setCustomMessages( $validator );

        $this->status = (bool) preg_match("/^[\pL\s\d\-\/\,\،\.\\\\\x{200c}\x{064b}\x{064d}\x{064c}\x{064e}\x{064f}\x{0650}\x{0651}\x{6F0}-\x{6F9}]+$/u", $value);

        return $this->status;
    }

    /**
     * validate Iran postal code format
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since Apr 5, 2017
     * @return boolean
     */
    public function IranPostalCode($attribute, $value, $parameters, $validator)
    {
        ValidationMessages::setCustomMessages( $validator );

        $this->status = (bool) preg_match("/^(\d{5}-?\d{5})$/", $value);

        return $this->status;
    }

    /**
     * validate package name of apk
     * @param $attribute
     * @param $value
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 31, 2017
     * @return boolean
     */
    public function PackageName($attribute, $value, $parameters, $validator)
    {
        ValidationMessages::setCustomMessages( $validator );

        $this->status = (bool) preg_match("/^([a-zA-Z]{1}[a-zA-Z\d_]*\.)+[a-zA-Z][a-zA-Z\d_]*$/", $value);
        
        return $this->status;
     }

}
