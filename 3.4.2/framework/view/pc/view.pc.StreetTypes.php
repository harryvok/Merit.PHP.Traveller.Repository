<?php
foreach($GLOBALS['result']['streets']->street_details as $result_streets){
	if($result_streets->street_name == $_GET['st']){
		$street_code = $result_streets->street_code;
		break;	
	}
}

if(isset($GLOBALS['result']['segments']->street_segment_details)){
	foreach($GLOBALS['result']['segments']->street_segment_details as $result_segments){
		if($result_segments->street_code == $street_code){
			foreach($GLOBALS['result']['street_types']->street_types_details as $result_sttypes){
				if($result_sttypes->street_type_code == $result_segments->type_code){
					if(strlen($input) > 0){
						if(stristr(strtolower($result_sttypes->street_type_name), strtolower($input))){
							echo $result_sttypes->street_type_name."\n";	
						}
					}
					else{
						echo $result_sttypes->street_type_name."\n";	
					}
				}
			} 
		}
	}
}
?>