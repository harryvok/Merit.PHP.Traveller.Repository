<?php
include("../../framework/controller.php");
$controller = new Controller();
$controller->Get("FunctionTypes");

$input = $_GET['term'];
$array = array();

if(isset($GLOBALS['result']->function_types_details) && count($GLOBALS['result']->function_types_details) >0){
	$i = 0;
	if(count($GLOBALS['result']->function_types_details) >1){
		foreach($GLOBALS['result']->function_types_details as $result){
            if($result->service_code == $_GET['service_code'] && $result->request_code == $_GET['request_code'] && $result->function_code != '' && $result->active_ind == "Y" && ($_SESSION['roleSecurity']->maint_exclude == "Y" && $result->count_only == "" || $result->count_only == "N" || $result->count_only == "S") || $result->service_code == $_GET['service_code'] && $result->request_code == $_GET['request_code'] && $result->function_code != '' && $result->active_ind == "Y" && $_SESSION['roleSecurity']->maint_exclude == "N"){
                $array[$i] = array("code" => $result->function_code, "label" => $result->function_name, "priority" => $result->priority, "count_only" => $result->count_only,"function_note" =>$result->function_note, "function_auto_help_notes" => $result->function_auto_help_notes);
                $i = $i + 1;
            }
		}
	}
	else{
		$result = $GLOBALS['result']->function_types_details;
		if($result->service_code == $_GET['service_code'] && $result->request_code == $_GET['request_code'] && $result->function_code != '' && $result->active_ind == "Y" && ($_SESSION['roleSecurity']->maint_exclude == "Y" && $result->count_only == "" || $result->count_only == "N" || $result->count_only == "S") || $result->service_code == $_GET['service_code'] && $result->request_code == $_GET['request_code'] && $result->function_code != '' && $result->active_ind == "Y" && $_SESSION['roleSecurity']->maint_exclude == "N"){
            $array[$i] = array("code" => $result->function_code, "label" => $result->function_name, "priority" => $result->priority, "count_only" => $result->count_only,"function_note" =>$result->function_note, "function_auto_help_notes" => $result->function_auto_help_notes);
            $i = $i + 1;
		}
	}
}

echo json_encode($array);
?>