<?php
$input = $_GET['term'];
$array = array();

if(isset($GLOBALS['result']->facility_list_det)){
	$i = 0;
    if(count($GLOBALS['result']->facility_list_det) > 1){
        foreach($GLOBALS['result']->facility_list_det as $result){
            $array[$i] = array("label" => $result->facility_type." - ".$result->facility_name, "index" => $result->facility_id, "address" => $result->address_id);	
            $i=$i+1;
        }
    }
    elseif(count($GLOBALS['result']->facility_list_det) == 1){
        $result = $GLOBALS['result']->facility_list_det;
        $array[$i] = array("label" => $result->facility_type." - ".$result->facility_name, "index" => $result->facility_id, "address" => $result->address_id);	
    }
}

echo json_encode($array);
?>