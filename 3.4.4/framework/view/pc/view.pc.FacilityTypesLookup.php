<?php
$input = isset($_GET['term']) ? $_GET['term'] : "";
$array = array();

if(isset($GLOBALS['result']->facility_type_details)){
	$i = 0;
    if(count($GLOBALS['result']->facility_type_details) > 0){
        foreach($GLOBALS['result']->facility_type_details as $result){

            if(stristr(strtolower($result->facility_type_name), strtolower($input)) || strlen($input) == 0){
                $array[$i] = array("label" => $result->facility_type_name, "index" => $result->facility_type_code);
                $i=$i+1;
            }
            
        }
    }
    elseif(count($GLOBALS['result']->facility_type_details) == 1){
        $result = $GLOBALS['result']->facility_type_details;
        
        if(stristr(strtolower($result->facility_type_name), strtolower($input)) || strlen($input) == 0){
            $array[0] = array("label" => $result->facility_type_name, "index" => $result->facility_type_code);  
        }
        
    }
}

echo json_encode($array);
?>