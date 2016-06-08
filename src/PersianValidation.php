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
     * @param string $attribute, $value
     * @param array $parameters
     * @param object $validator -> instance of validator
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 21, 2016
     * @return boolean
     */
    public function alpha( $attribute, $value, $parameters, $validator ) {

        $this->status = preg_match( "/^[\x{600}-\x{6FF}]+$/u", $value);

        return ( $this->status ? true : false );

    }

    /**
     * validate persian number
     * @param string $attribute, $value
     * @param array $parameters
     * @param object $validator -> instance of validator
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 21, 2016
     * @return boolean
     */
    public function num( $attribute, $value, $parameters, $validator ) {

      $this->status = preg_match( '/^[\x{6F0}-\x{6F9}]+$/u', $value );

      return ( $this->status ? true : false );

    }

    /**
     * validate persian alphabet and number
     * @param string $attribute, $value
     * @param array $parameters
     * @param object $validator -> instance of validator
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 21, 2016
     * @return boolean
     */
    public function alpha_num( $attribute, $value, $parameters, $validator ) {

      $this->status = preg_match( '/^[\x{600}-\x{6FF}]+$/u', $value );

      return ( $this->status ? true : false );

    }

    /**
     * validate mobile number
     * @param string $attribute, $value
     * @param array $parameters
     * @param object $validator -> instance of validator
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 21, 2016
     * @return boolean
     */
    public function mobile( $attribute, $value, $parameters, $validator ) {

      $this->status = preg_match( '/^(((98)|(\+98)|(0098)|0)(90|91|92|93){1}[0-9]{8})+$/', $value );

      return ( $this->status ? true : false );

    }

    /**
     * validate sheba number
     * @param string $attribute, $value
     * @param array $parameters
     * @param object $validator -> instance of validator
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 21, 2016
     * @return boolean
     */
    public function sheba( $attribute, $value, $parameters, $validator ) {

      if ( !empty( $value ) ) {

				$value = preg_replace ( '/[\W_]+/', '', strtoupper( $value ) );

				if ( ( 4 > strlen( $value ) ||  strlen ( $value ) > 34 ) || ( is_numeric ( $value [ 0 ] )  || is_numeric ( $value [ 1 ] ) ) || ( ! is_numeric ( $value [ 2 ] ) || ! is_numeric ( $value [ 3 ] ) ) )
					return false;

			$ibanReplaceChars = range('A','Z');

			foreach ( range( 10,35 ) as $tempvalue )
				$ibanReplaceValues[] = strval ( $tempvalue );


			$tmpIBAN = substr( $value, 4 ) . substr( $value, 0, 4 );

			$tmpIBAN = str_replace( $ibanReplaceChars, $ibanReplaceValues, $tmpIBAN );

			$tmpValue = intval ( substr( $tmpIBAN, 0, 1 ) );

			for ( $i = 1; $i < strlen( $tmpIBAN ); $i++ ) {

				$tmpValue *= 10;

				$tmpValue += intval ( substr( $tmpIBAN, $i, 1 ) );

				$tmpValue %= 97;

			}

		 if ( $tmpValue != 1 )
       return false;

			return true;

		}

    return false;

  }

   /**
    * validate meliCode number
    * @param string $attribute, $value
    * @param array $parameters
    * @param object $validator -> instance of validator
    * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
    * @since May 21, 2016
    * @return boolean
    */
    public function melliCode( $attribute, $value, $parameters, $validator  ) {

      $control = 0;
		  $sub = 0;

		  if ( !preg_match( '/^\d{8,10}$/', $value ) )
			  return false;


		  if ( strlen( $value ) == 8 )
			  $value = '00' . $value;
		  elseif ( strlen( $value ) == 9 )
			  $value = '0' . $value;

		  for( $i = 0; $i <= 8; $i++ )
			  $sub = $sub + ( $value[$i] * ( 10 - $i ) );

		  if ( ( $sub % 11 ) <= 2 )
			  $control = ( $sub % 11 );
		  else
		  	$control = 11 - ( $sub % 11 );

		  if ( $value[9] == $control )
			  return true;
		  else
		  	return false;

   }


   public function category( $attribute, $value, $parameters, $validator ) {

    if ( is_array( $value ) && count( $value ) < 3 && count( $value ) > 0 )
        return true;

    return false;


   }

}
