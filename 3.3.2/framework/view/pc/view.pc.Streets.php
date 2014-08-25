<?php
if(isset($GLOBALS['result']->street_details)){
	foreach($GLOBALS['result']->street_details as $result_streets){
		if(strlen($input) >0){
			if(stristr(strtolower($result_streets->street_name), strtolower($input))){
				echo $result_streets->street_name."\n";	
			}
		}
		else{
			echo $result_streets->street_name."\n";	
		}
	}
}
?>