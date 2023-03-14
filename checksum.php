<?php
Class Checksum {
    public static function calculateChecksum($data, $secret_key) {
		$checksum = md5($data.$secret_key);
		return $checksum;
	}

    public static function encrypt($data, $salt) {
        // Build a 256-bit $key which is a SHA256 hash of $salt and $password.
        $key = hash('SHA256', $salt.'@'.$data);
        return $key;
    }	
	

	public static function encryptSha256($data) {   
		$key = hash('SHA256', $data);
		return $key;
	}    
	public static function calculateChecksumSha256($data, $salt) { 
		// print($data);
		// exit;
		$checksum = hash('SHA256', $salt.'@'.$data);
		return $checksum;
	}

	
    public static function outputForm($checksum) {
		//ksort($_POST);
		foreach($_POST as $key => $value) {
				echo '<input type="hidden" name="'.$key.'" value="'.$value.'" />'."\n";
		}
		echo '<input type="hidden" name="checksum" value="'.$checksum.'" />'."\n";
	}

    public static function verifyChecksum($checksum, $all, $secret) {
		$cal_checksum = Checksum::calculateChecksum($secret, $all);
		$bool = 0;
		if($checksum == $cal_checksum)	{
			$bool = 1;
		}

		return $bool;
	}

/*	
    public static function sanitizedParam($param) {
	        $pattern[0] = "%\{%";
	        $pattern[1] = "%\}%";
	        $pattern[2] = "%<%";
	        $pattern[3] = "%>%";
	        $pattern[4] = "%`%";
	        $pattern[5] = "%!%";		
	        $pattern[6] = "%\[%";
	        $pattern[7] = "%\]%";
	        $pattern[8] = "%\*%";
	        $pattern[9] = "%&%";
	        $pattern[10] = "%\\$%";
	        $pattern[11] = "%\%%";
	        $pattern[12] = "%\^%";
	        $pattern[13] = "%=%";
	        $pattern[14] = "%\+%";
	        $pattern[15] = "%\|%";
	        $pattern[16] = "%\\\%";
	        $pattern[17] = "%:%";
	        $pattern[18] = "%'%";
	        $pattern[19] = "%\"%";
	        $pattern[21] = "%~%";
        	$sanitizedParam = preg_replace($pattern, "", $param);
		return $sanitizedParam;
	}

    public static function sanitizedURL($param) {
		$pattern[0] = "%,%";
	        $pattern[1] = "%\(%";
       		$pattern[2] = "%\)%";
	        $pattern[3] = "%\{%";
	        $pattern[4] = "%\}%";
	        $pattern[5] = "%<%";
	        $pattern[6] = "%>%";
	        $pattern[7] = "%`%";
	        $pattern[8] = "%!%";
	        $pattern[9] = "%\\$%";
	        $pattern[10] = "%\%%";
	        $pattern[11] = "%\^%";
	        $pattern[12] = "%\+%";
	        $pattern[13] = "%\|%";
	        $pattern[14] = "%\\\%";
	        $pattern[15] = "%'%";
	        $pattern[16] = "%\"%";
	        $pattern[17] = "%;%";
	        $pattern[18] = "%~%";
	        $pattern[19] = "%\[%";
	        $pattern[20] = "%\]%";
	        $pattern[21] = "%\*%";
        	$sanitizedParam = preg_replace($pattern, "", $param);
		return $sanitizedParam;
	}
*/	
}
