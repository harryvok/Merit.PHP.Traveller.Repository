<?php
$input = $_GET['term'];
$array = array();

if(isset($GLOBALS['result']->request_types_details) && count($GLOBALS['result']->request_types_details) > 0){
	$i = 0;
	if(count($GLOBALS['result']->request_types_details) > 1){
		foreach($GLOBALS['result']->request_types_details as $result){
            if($result->service_code == $_GET['service_code'] && $result->active_ind == "Y"){
                if(strlen($input) >0){
                    if(stristr(strtolower($result->request_name), strtolower($input))){
                        $array[$i] = array("code" => $result->request_code, "label" => $result->request_name, "need_function" => $result->need_function, "priority" => $result->priority);	
                        $i = $i + 1;
                    }
                }
                else{
                    $array[$i] = array("code" => $result->request_code, "label" => $result->request_name, "need_function" => $result->need_function, "priority" => $result->priority);
                    $i = $i + 1;
                }
            }
			
		}
	}
	else{
		$result = $GLOBALS['result']->request_types_details;
		if($result->service_code == $_GET['service_code'] && $result->active_ind == "Y"){
			if(strlen($input) >0){
				if(stristr(strtolower($result->request_name), strtolower($input))){
					$array[$i] = array("code" => $result->request_code, "label" => $result->request_name, "need_function" => $result->need_function, "priority" => $result->priority);	
					$i = $i + 1;
				}
			}
			else{
				$array[$i] = array("code" => $result->request_code, "label" => $result->request_name, "need_function" => $result->need_function, "priority" => $result->priority);
				$i = $i + 1;
			}
		}
	}
}

echo json_encode($array);
?>