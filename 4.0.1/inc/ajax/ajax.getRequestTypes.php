<?php
include("../../framework/controller.php");
$controller = new Controller();
$controller->Get("RequestTypes");

$input = $_GET['term'];
$array = array();

if(isset($GLOBALS['result']->request_types_details) && count($GLOBALS['result']->request_types_details) > 0){
	$i = 0;
	if(isset($GLOBALS['result']->request_types_details) && count($GLOBALS['result']->request_types_details) > 1){
		foreach($GLOBALS['result']->request_types_details as $result){
            if($result->service_code == $_GET['service_code'] && $result->active_ind == "Y" && ($_SESSION['roleSecurity']->maint_exclude == "Y" && $result->count_only == "N" || $result->count_only == "" || $result->count_only == "S") || $result->service_code == $_GET['service_code'] && $result->active_ind == "Y" && $_SESSION['roleSecurity']->maint_exclude == "N"){
                $array[$i] = array("code" => $result->request_code, "label" => $result->request_name, "need_function" => $result->need_function, "priority" => $result->priority, "count_only" => $result->count_only, "request_note" =>$result->request_note, "request_auto_help_notes" => $result->request_auto_help_notes, "request_name_type" => $result->name_type, "booking_required" => $result->count_ind, "request_allowance" => $result->allowance_no, "edms_autosave_attach"=> $result->edms_autosave_attach);
                $i = $i + 1;
            }
		}
	}
	if(isset($GLOBALS['result']->request_types_details) && count($GLOBALS['result']->request_types_details) == 1){
		$result = $GLOBALS['result']->request_types_details;
		if($result->service_code == $_GET['service_code'] && $result->active_ind == "Y" && ($_SESSION['roleSecurity']->maint_exclude == "Y" && $result->count_only == "N" || $result->count_only == "" || $result->count_only == "S") || $result->service_code == $_GET['service_code'] && $result->active_ind == "Y" && $_SESSION['roleSecurity']->maint_exclude == "N"){
            $array[$i] = array("code" => $result->request_code, "label" => $result->request_name, "need_function" => $result->need_function, "priority" => $result->priority, "count_only" => $result->count_only,"request_note" =>$result->request_note, "request_auto_help_notes" => $result->request_auto_help_notes, "request_name_type" => $result->name_type, "booking_required" => $result->count_ind, "request_allowance" => $result->allowance_no, "edms_autosave_attach"=> $result->edms_autosave_attach);
            $i = $i + 1;
		}
	}
}

echo json_encode($array);
?>