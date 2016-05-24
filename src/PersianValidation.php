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
     * @param string $input
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 21, 2016
     * @return object
     */
    public function alpha( $input ) {

        $this->status = preg_match( '/^[^\x{600}-\x{6FF}]+$/u', $input );

        if ( $this->status )
          return response()->json( [ 'status' => 'fail', 'messages' => 'Persion alphabet is not valid' ], 420 );

        return true;

    }

    /**
     * validate persian number
     * @param string $input
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 21, 2016
     * @return object
     */
    public function num( $input ) {

      $this->status = preg_match( '/^[^\x{6F0}-\x{6F9}]+$/u', $input );

      if ( $this->status )
        return response()->json( [ 'status' => 'fail', 'messages' => 'Persion number is not valid' ], 420 );

      return true;

      }

    /**
     * validate persian alphabet and number
     * @param string $input
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 21, 2016
     * @return object
     */
    public function alpha_num( $input ) {

      $this->status = preg_match( '/^[^\x{600}-\x{6FF}]+$/u', $input );

      if ( $this->status )
        return response()->json( [ 'status' => 'fail', 'messages' => 'Persion alpha-number is not valid' ], 420 );

      return true;

      }

    /**
     * validate mobile number
     * @param string $input
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 21, 2016
     * @return object
     */
    public function mobile( $input ) {

      $this->status = preg_match( '/^(((98)|(\+98)|(0098)|0)(90|91|92|93){1}[0-9]{8})+$/', $input );

      if ( $this->status )
        return response()->json( [ 'status' => 'fail', 'messages' => 'Persion mobile is not valid' ], 420 );

      return true;

      }

    /**
     * validate sheba number
     * @param string $input
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 21, 2016
     * @return object
     */
    public function sheba( $input ) {

      if ( !empty( $input ) ) {

				$input = preg_replace ( '/[\W_]+/', '', strtoupper( $input ) );

				if ( ( 4 > strlen( $input ) ||  strlen ( $input ) > 34 ) || ( is_numeric ( $input [ 0 ] )  || is_numeric ( $input [ 1 ] ) ) || ( ! is_numeric ( $input [ 2 ] ) || ! is_numeric ( $input [ 3 ] ) ) )
					return response()->json( [ 'status' => 'fail', 'messages' => 'Sheba number is not valid' ], 420 );

			$ibanReplaceChars = range('A','Z');

			foreach ( range( 10,35 ) as $tempvalue )
				$ibanReplaceValues[] = strval ( $tempvalue );


			$tmpIBAN = substr( $input, 4 ) . substr( $input, 0, 4 );

			$tmpIBAN = str_replace( $ibanReplaceChars, $ibanReplaceValues, $tmpIBAN );

			$tmpValue = intval ( substr( $tmpIBAN, 0, 1 ) );

			for ( $i = 1; $i < strlen( $tmpIBAN ); $i++ ) {

				$tmpValue *= 10;

				$tmpValue += intval ( substr( $tmpIBAN, $i, 1 ) );

				$tmpValue %= 97;

			}

		 if ( $tmpValue != 1 )
       return response()->json( [ 'status' => 'fail', 'messages' => 'Sheba number is not valid' ], 420 );

			return true;

		}

    return response()->json( [ 'status' => 'fail', 'messages' => 'Sheba number is not valid' ], 420 );

  }

   /**
    * validate meliCode number
    * @param string $input
    * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
    * @since May 21, 2016
    * @return object
    */
    public function melliCode( $input ) {

      $control = 0;
		  $sub = 0;

		  if ( !preg_match( '/^\d{8,10}$/', $input ) )
			  return response()->json( [ 'status' => 'fail', 'messages' => 'MeliCode is not valid' ], 420 );


		  if ( strlen( $input ) == 8 )
			  $input = '00' . $input;
		  elseif ( strlen( $input ) == 9 )
			  $input = '0' . $input;

		  for( $i = 0; $i <= 8; $i++ )
			  $sub = $sub + ( $input[$i] * ( 10 - $i ) );

		  if ( ( $sub % 11 ) <= 2 )
			  $control = ( $sub % 11 );
		  else
		  	$control = 11 - ( $sub % 11 );

		  if ( $input[9] == $control )
			  return true;
		  else
		  	return response()->json( [ 'status' => 'fail', 'messages' => 'MeliCode is not valid' ], 420 );

   }

}
