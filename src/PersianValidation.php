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
     * validate persian alphabet
     * @param string $attribute $value
     * @param array $parameters
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 21, 2016
     * @return boolean
     */
    public function Alpha($attribute, $value)
    {

        $this->status = preg_match("/^[\x{600}-\x{6FF}]+$/u", $value);

        return ( $this->status ? true : false );

    }

    /**
     * validate persian number
     * @param string $attribute $value
     * @param array $parameters
     * @param object $validator -> instance of validator
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
     * validate persian alphabet and number
     * @param string $attribute $value
     * @param array $parameters
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 21, 2016
     * @return boolean
     */
    public function AlphaNum($attribute, $value)
    {

        $this->status = preg_match('/^[\x{600}-\x{6FF}]+$/u', $value);

        return ( $this->status ? true : false );

    }

    /**
     * validate mobile number
     * @param string $attribute $value
     * @param array $parameters
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
     * @param string $attribute $value
     * @param array $parameters
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 21, 2016
     * @return boolean
     */
    public function Sheba($attribute, $value)
    {

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
    * @param string $attribute $value
    * @param array $parameters
    * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
    * @since May 21, 2016
    * @return boolean
    */
    public function MelliCode($attribute, $value)
    {

        $control = 0;
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

        if (( $sub % 11 ) <= 2) {
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
    * validate category
    * @param string $attribute $value
    * @param array $parameters
    * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
    * @since June 11, 2016
    * @return boolean
    */
    public function Category($attribute, $value)
    {

        foreach ($value as $key => $val) {
            if (intval($val) != 1 && intval($val) != 2 && intval($val) != 5 && intval($val) != 16 && intval($val) != 17 && intval($val) != 18 && intval($val) != 19 && intval($val) != 21 && intval($val) != 23 && intval($val) != 25 && intval($val) != 26) {
                $this->status = false;

                break;
            } else {
                $this->status = true;
            }
        }

        return $this->status;

    }

   /**
    * validate geo
    * @param string $attribute $value
    * @param array $parameters
    * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
    * @since June 11, 2016
    * @return boolean
    */
    public function Geo($attribute, $value)
    {

        foreach ($value as $key => $val) {
            if (( intval($val) < 1352 ) || ( intval($val) > 1382 )) {
                $this->status = false;

                break;
            } else {
                 $this->status = true;
            }
        }

        return $this->status;

    }

   /**
    * validate os
    * @param string $attribute $value
    * @param array $parameters
    * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
    * @since June 11, 2016
    * @return boolean
    */
    public function Os($attribute, $value)
    {

        foreach ($value as $key => $val) {
            if (intval($val) != 11 && intval($val) != 12 && intval($val) != 13 && intval($val) != 21 && intval($val) != 22 && intval($val) != 23 && intval($val) != 24 && intval($val) != 25 && intval($val) != 26 && intval($val) != 27 && intval($val) != 28 && intval($val) != 29) {
                $this->status = false;

                 break;
            } else {
                $this->status = true;
            }
        }

        return $this->status;

    }

   /**
    * validate category range
    * @param string $attribute $value
    * @param array $parameters
    * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
    * @since June 8, 2016
    * @return boolean
    */
    public function CategoryRange($attribute, $value)
    {

        if (is_array($value) && count($value) < 3 && !empty($value)) {
            return true;
        }

        return false;

    }

   /**
    * validate geo range
    * @param string $attribute $value
    * @param array $parameters
    * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
    * @since June 8, 2016
    * @return boolean
    */
    public function GeoRange($attribute, $value)
    {

        if (is_array($value) && count($value) < 6 && !empty($value)) {
            return true;
        }

        return false;

    }

   /**
    * validate os range
    * @param string $attribute $value
    * @param array $parameters
    * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
    * @since June 8, 2016
    * @return boolean
    */
    public function OsRange($attribute, $value)
    {

        if (is_array($value) && count($value) < 7 && !empty($value)) {
            return true;
        }

        return false;

    }

    /**
     * validate string that is not contain persian alphabet and number
     * @param string $attriute $value
     * @param array $parameters
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
    * @param string $attriute $value
    * @param array $parameters
    * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
    * @since June 13, 2016
    * @return boolean
    */
    public function IsArray($attribute, $value, $parameters)
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
    * validate integer is greater than custom parameter
    * @param string $attriute $value
    * @param array $parameters
    * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
    * @since June 13, 2016
    * @return boolean
    */
    public function Greater($attribute, $value, $parameters)
    {

       if (isset($parameters[0])) {

           return ( (intval($value) > $parameters[0]) ? true : false );

        }

        return false;

  }

   /**
    * validate integer is lesser than custom parameter
    * @param string $attriute $value
    * @param array $parameters
    * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
    * @since June 14, 2016
    * @return boolean
    */
    public function Lesser($attribute, $value, $parameters)
    {

        if (isset($parameters[0])) {

           return ( (intval($value) < $parameters[0]) ? true : false );

        }

        return false;

  }



}
