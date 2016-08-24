<?php
namespace Anetwork\Validation;

/**
 * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
 * @since May 21, 2016
 */
class PersianValidation
{
    //variable of class
    protected $status;

    /**
     * validate persian alphabet and space
     * @param $attribute $value
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 21, 2016
     * @return boolean
     */
    public function Alpha($attribute, $value)
    {

        $this->status = preg_match("/^[\x{600}-\x{6FF}\s]+$/u", $value);

        return ( $this->status ? true : false );

    }

    /**
     * validate persian number
     * @param $attribute $value
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 21, 2016
     * @return boolean
     */
    public function Num($attribute, $value)
    {

        $this->status = preg_match('/^[\x{6F0}-\x{6F9}]+$/u', $value);

        return ( $this->status ? true : false );

    }

    /**
     * validate persian alphabet, number and space
     * @param $attribute $value
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 21, 2016
     * @return boolean
     */
    public function AlphaNum($attribute, $value)
    {

        $this->status = preg_match('/^[\x{600}-\x{6FF}\s]+$/u', $value);

        return ( $this->status ? true : false );

    }

    /**
     * validate mobile number
     * @param $attribute $value
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 21, 2016
     * @return boolean
     */
    public function IranMobile($attribute, $value)
    {

        $this->status = preg_match('/^(((98)|(\+98)|(0098)|0)(90|91|92|93){1}[0-9]{8})+$/', $value);

        return ( $this->status ? true : false );

    }

    /**
     * validate sheba number
     * @param $attribute $value
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 21, 2016
     * @return boolean
     */
    public function Sheba($attribute, $value)
    {

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
    * @param $attribute $value
    * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
    * @since May 21, 2016
    * @return boolean
    */
    public function MelliCode($attribute, $value)
    {

        $sub = 0;

        if (!preg_match('/^\d{8,10}$/', $value)) {
            return false;
        }


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
     * @param $attribute $value
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since June 13, 2016
     * @return boolean
     */
     public function IsNotPersian($attribute, $value)
     {

       if (is_string($value)) {

         $this->status = preg_match("/[\x{600}-\x{6FF}]/u", $value);

         return ( $this->status ? false : true );

     }

     return false;

   }

   /**
    * validate array with custom count of array
    * @param $attribute $value
    * @param array $parameters
    * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
    * @since June 13, 2016
    * @return boolean
    */
    public function LimitedArray($attribute, $value, $parameters)
    {

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
   * @param $attribute $value
   * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
   * @since July 22, 2016
   * @return boolean
   */
   public function UnSignedNum($attribute, $value) {

     $this->status = preg_match('/^\d+$/', $value);

     return ( $this->status ? true : false );

    }

    /**
     * validate alphabet and spaces
     * @param $attribute $value
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since Agu 3, 2016
     * @return boolean
     */
    public function AlphaSpace($attribute, $value)
    {

        $this->status = preg_match("/^[\pL\s\-]+$/u", $value);

        return ( $this->status ? true : false );

    }

    /**
     * validate Url
     * @param $attribute $value
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since Agu 17, 2016
     * @return boolean
     */
    public function Url($attribute, $value)
    {

        $this->status = preg_match("/^HTTP|http(s)?:\/\/(www\.)?[A-Za-z0-9]+([\-\.]{1,2}[A-Za-z0-9]+)*\.[A-Za-z]{2,40}(:[0-9]{1,40})?(\/.*)?+$/", $value);

        return ( $this->status ? true : false );

    }

    /**
     * validate Domain
     * @param $attribute $value
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since Agu 17, 2016
     * @return boolean
     */
    public function Domain($attribute, $value)
    {

        $this->status = preg_match("/((www\.)?[A-Za-z0-9]+([\-\.]{1,2}[A-Za-z0-9]+)*\.[A-Za-z]{2,40}(:[0-9]{1,40})?(\/.*)?)/", $value);

        return ( $this->status ? true : false );

    }

    /**
     * value must be more than parameters
     * @param $attribute $value $parameters
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since Agu 24, 2016
     * @return boolean
     */
    public function More($attribute, $value, $parameters)
    {

        if ( isset( $parameters[0] ) ) {

          return ( $value > $parameters[0] ? true : false );

        }

        return false;

    }

    /**
     * value must be less than parameters
     * @param $attribute $value $parameters
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since Agu 24, 2016
     * @return boolean
     */
    public function Less($attribute, $value, $parameters)
    {

        if ( isset( $parameters[0] ) ) {

          return ( $value < $parameters[0] ? true : false );

        }

        return false;

    }

}
