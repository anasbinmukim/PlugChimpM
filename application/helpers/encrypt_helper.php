<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

if (!function_exists('decrypt')){  
  function decrypt($string, $encryption_key = 'abcdefghijklmnopqrstuvwxyz\0\0\0') {
        $initialization_vector = get_initialization_vector();

        // Convert hexadecimal data into binary representation
        $string = hex2bin($string);

        // See: http://php.net/manual/en/mcrypt.ciphers.php
        return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $encryption_key, $string, MCRYPT_MODE_ECB, $initialization_vector));
   }
}
if (!function_exists('encrypt')){  
    function encrypt($string, $encryption_key = 'abcdefghijklmnopqrstuvwxyz\0\0\0') {
        $initialization_vector = get_initialization_vector();


        // See: http://php.net/manual/en/mcrypt.ciphers.php
        $string = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $encryption_key, $string, MCRYPT_MODE_ECB, $initialization_vector);

        // Convert binary data into hexadecimal representation
       $string = bin2hex($string);

        return $string;
    }
}
if (!function_exists('get_initialization_vector')){  
	function get_initialization_vector() {
        // See: http://php.net/manual/en/mcrypt.ciphers.php
        // MCRYPT_BLOWFISH selected as it appears to be one of the "universally"
        // supported ciphers supported by the mcrypt extension
        $initialization_vector_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);

        // See: http://php.net/manual/en/function.mcrypt-create-iv.php
        // The source can be MCRYPT_RAND (system random number generator), MCRYPT_DEV_RANDOM
        // (read data from /dev/random) and MCRYPT_DEV_URANDOM (read data from /dev/urandom).
        // Prior to 5.3.0, MCRYPT_RAND was the only one supported on Windows.
        $initialization_vector = mcrypt_create_iv($initialization_vector_size, MCRYPT_RAND);

        return $initialization_vector;
    }
}
if (!function_exists('hex2bin')){
	
	function hex2bin($hexstr)	{
		
		$n = strlen($hexstr);
		$sbin="";  
		$i=0;
		while( $i<$n ) {      
			$a =substr($hexstr,$i,2);          
			$c = pack("H*",$a);
			if ($i==0){$sbin=$c;}
			else {$sbin.=$c;}
			$i+=2;
		}
		return $sbin;
	} 
}

