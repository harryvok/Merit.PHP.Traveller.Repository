<?php
$array = array();
if(isset($GLOBALS['result']->locality_details)){
	
	$i=0;
	if(count($GLOBALS['result']->locality_details) >1){
		foreach($GLOBALS['result']->locality_details as $result_streets){
			$array[$i] = $result_streets->locality_name;	
			$i++;	
		}
	}
	else{
		$result_streets = $GLOBALS['result']->locality_details;
		$array[$i] = $result_streets->locality_name;
	}
	
}
echo json_encode($array);
?>