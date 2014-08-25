<?php
// A list of functions for use in the WebzElite website.

	function generatePassword ($length = 8){
		
		// start with a blank password
		$password = "";
			
		// define possible characters - any character in this string can be
		// picked for use in the password, so if you want to put vowels back in
		// or add special characters such as exclamation marks, this is where
		// you should do it
		$possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
			
		// we refer to the length of $possible a few times, so let's grab it now
		$maxlength = strlen($possible);
			  
		// check for length overflow and truncate if necessary
		if ($length > $maxlength) {
		  $length = $maxlength;
		}
				
		// set up a counter for how many characters are in the password so far
		$i = 0; 
				
		// add random characters to $password until $length is reached
		while ($i < $length) { 
			
			// pick a random character from the possible ones
			$char = substr($possible, mt_rand(0, $maxlength-1), 1);
					
			// have we already used this character in $password?
			if (!stristr($password, $char)) { 
				// no, so it's OK to add it onto the end of whatever we've already got...
				$password .= $char;
				// ... and increase the counter by one
				$i++;
			 }
			
		}
			
		// done!
		return $password;
		
	}
	function mb_ucfirst ($string){
	   $string = explode ('.', $string);
	   $count = count ($string);
	   for ($i = 0; $i < $count; $i++){
		   $string[$i]  = ucfirst (trim ($string[$i]));
		   if ($i > 0){
			   if ((ord($string[$i]{0})<48) || (ord($string[$i]{0})>57)) {
				  $string[$i] = ' ' . $string[$i];
			   }  
		   }
	   }
	   $string = implode ('.', $string);
	   return $string;
	}

	function check_email_address($email) {
	  // First, we check that there's one @ symbol, 
	  // and that the lengths are right.
	  $emailok = 1;
	  if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
		// Email invalid because wrong number of characters 
		// in one section or wrong number of @ symbols.
		$emailok = 0;
	  }
	  // Split it into sections to make life easier
	  $email_array = explode("@", $email);
	  $local_array = explode(".", $email_array[0]);
	  for ($i = 0; $i < sizeof($local_array); $i++) {
		if
	(!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&
	↪'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$",
	$local_array[$i])) {
		  $emailok = 0;
		}
	  }
	  // Check if domain is IP. If not, 
	  // it should be valid domain name
	  if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
		$domain_array = explode(".", $email_array[1]);
		if (sizeof($domain_array) < 2) {
			$emailok = 0; // Not enough parts to domain
		}
		for ($i = 0; $i < sizeof($domain_array); $i++) {
		  if
	(!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|
	↪([A-Za-z0-9]+))$",
	$domain_array[$i])) {
			$emailok = 0;
		  }
		}
	  }
	  return $emailok;
	}
	
	function CheckPhone($phone){
		$phoneok = 0;
		if(preg_match("/^[0-9]*\.?[0-9]+$/", $phone) ) {
	    	$phoneok = 1;
		}
		return $phoneok;
	}

	
	function ViewRecord($return, $table, $where, $where_equals){
		$sql = "SELECT * FROM ".$table." WHERE ".$where." = '".$where_equals."'";
		$dbQuery = odbc_exec($GLOBALS['con'],$sql);
		return odbc_result($dbQuery, $return);	
	}
	
	function curPageURL() {
		 $pageURL = 'http';
		 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		 $pageURL .= "://";
		 if ($_SERVER["SERVER_PORT"] != "80") {
		  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		 } else {
		  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		 }
		 return $pageURL;
	}
	function createURL($strInput){
	$pattern = '#(^|[^\"=]{1})(http://|ftp://)([^\s<>]+)([\s\n<>]|$)#sm'; 
    return preg_replace($pattern,"\\1<a href=\"\\2\\3\"><u>\\2\\3</u></a>\\4",$strInput);
	}
	
	function array_to_objecttree($array) {
	  if (is_numeric(key($array))) { // Because Filters->Filter should be an array
		foreach ($array as $key => $value) {
		  $array[$key] = array_to_objecttree($value);
		}
		return $array;
	  }
	  $Object = new stdClass;
	  foreach ($array as $key => $value) {
		if (is_array($value)) {
		  $Object->$key = array_to_objecttree($value);
		}  else {
		  $Object->$key = $value;
		}
	  }
	  return $Object;
	}
	
	function DetectMobile()
	{
		$ua = isset($_SERVER['HTTP_USER_AGENT'])?strtolower($_SERVER['HTTP_USER_AGENT']):'';
		if (
		 stristr($ua, "iphone") or
		 stristr($ua, "ipod") or
		 stristr($ua, "windows ce") or
		 stristr($ua, "windows phone os 7") or
		 stristr($ua, "avantgo") or
		 stristr($ua,"mazingo") or
		 stristr($ua, "mobile") or
		 stristr($ua, "t68") or
		 stristr($ua,"syncalot") or
		 stristr($ua, "blazer") ) {
		 $DEVICE_TYPE="MOBILE";
		 }
		 if(stristr($ua, "iphone") or stristr($ua, "ipod")){
			$_SESSION['ios'] = 1; 
		 }
		 else{
			$_SESSION['ios'] = 0; 
		 }
		 if (isset($DEVICE_TYPE) and $DEVICE_TYPE=="MOBILE") {
			$mobile_browser=1;
		 }
		 else{
			$mobile_browser=0; 
		 }	
		 return $mobile_browser;
	}
 

?>