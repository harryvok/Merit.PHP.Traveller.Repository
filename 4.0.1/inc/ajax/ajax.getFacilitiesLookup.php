<?php
include("../../framework/controller.php");
$controller = new Controller();
$controller->Get("Facilities");

$input = $_GET['term'];
$array = array();

if(isset($GLOBALS['result']->facility_list_det)){
	$i = 0;
    if(count($GLOBALS['result']->facility_list_det) > 1){
        foreach($GLOBALS['result']->facility_list_det as $result){
            $array[$i] = array("label" => $result->facility_name, "index" => $result->facility_id, "address" => $result->address_id, "facility_description" => $result->facility_description, "officer_name"=> $result->officer_name);	
            $i=$i+1;
        }
    }
    elseif(count($GLOBALS['result']->facility_list_det) == 1){
        $result = $GLOBALS['result']->facility_list_det;
        $array[$i] = array("label" => $result->facility_name, "index" => $result->facility_id, "address" => $result->address_id, "facility_description" => $result->facility_description, "officer_name"=> $result->officer_name);	
    }
}

echo json_encode($array);
?>