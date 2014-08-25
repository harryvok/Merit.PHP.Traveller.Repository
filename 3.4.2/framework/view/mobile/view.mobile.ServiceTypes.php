<?php
$input = $_GET['term'];
$array = array();

if(isset($GLOBALS['result']->service_types_details) && count($GLOBALS['result']->service_types_details) > 0){
	$i = 0;
	if(count($GLOBALS['result']->service_types_details) > 1){
		foreach($GLOBALS['result']->service_types_details as $result){
            if($result->active_ind == "Y"){
				if(strlen($input) >0){
					if(stristr(strtolower($result->service_name), strtolower($input))){
						$array[$i] = array("code" => $result->service_code, "label" => $result->service_name);	
						$i = $i + 1;
					}
				}
				else{
					$array[$i] = array("code" => $result->service_code, "label" => $result->service_name);
					$i = $i + 1;
				}
            }
		}
	}
	else{
		$result = $GLOBALS['result']->service_types_details;
        if($result->active_ind == "Y"){
            if(strlen($input) >0){
                if(stristr(strtolower($result->service_name), strtolower($input))){
                    $array[$i] = array("code" => $result->service_code, "label" => $result->service_name);	
                }
            }
            else{
                $array[$i] = array("code" => $result->service_code, "label" => $result->service_name);
            }
        }
	}
}

echo json_encode($array);
?>