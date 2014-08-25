<?php
$input = $_GET['term'];
$array = array();

if(isset($GLOBALS['result']->function_types_details) && count($GLOBALS['result']->function_types_details) >0){
	$i = 0;
	if(count($GLOBALS['result']->function_types_details) >1){
		foreach($GLOBALS['result']->function_types_details as $result){
            if($result->service_code == $_GET['service_code'] && $result->request_code == $_GET['request_code'] && $result->function_code != '' && $result->active_ind == "Y"){
                if(strlen($input) >0){
                    if(stristr(strtolower($result->function_name), strtolower($input))){
                        $array[$i] = array("code" => $result->function_code, "label" => $result->function_name, "priority" => $result->priority);	
                        $i = $i + 1;
                    }
                }
                else{
                    $array[$i] = array("code" => $result->function_code, "label" => $result->function_name, "priority" => $result->priority);
                    $i = $i + 1;
                }
            }
			
		}
	}
	else{
		$result = $GLOBALS['result']->function_types_details;
		if($result->service_code == $_GET['service_code'] && $result->request_code == $_GET['request_code'] && $result->function_code != '' && $result->active_ind == "Y"){
			if(strlen($input) >0){
				if(stristr(strtolower($result->function_name), strtolower($input))){
					$array[$i] = array("code" => $result->function_code, "label" => $result->function_name, "priority" => $result->priority);	
					$i = $i + 1;
				}
			}
			else{
				$array[$i] = array("code" => $result->function_code, "label" => $result->function_nam, "priority" => $result->prioritye);
				$i = $i + 1;
			}
		}
	}
}

echo json_encode($array);
?>