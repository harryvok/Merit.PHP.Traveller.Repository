<?php
include("../../framework/controller.php");
$controller = new Controller();
$controller->Get("ServiceTypes");

$array = array();

if(isset($GLOBALS['result']->service_types_details) && count($GLOBALS['result']->service_types_details) > 0){
	$i = 0;
	if(count($GLOBALS['result']->service_types_details) > 1){
		foreach($GLOBALS['result']->service_types_details as $result){
            if($result->active_ind == "Y"){
                $array[$i] = array("code" => $result->service_code, "label" => $result->service_name,"service_code" =>$result->service_note, "service_auto_help_notes" => $result->service_auto_help_notes);
                $i = $i + 1;
            }
		}
	}
	else{
		$result = $GLOBALS['result']->service_types_details;
        if($result->active_ind == "Y"){
            $array[$i] = array("code" => $result->service_code, "label" => $result->service_name,"service_code" =>$result->service_note, "service_auto_help_notes" => $result->service_auto_help_notes);
        }
	}
}

echo json_encode($array);
?>