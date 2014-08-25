<?php
include("../../framework/controller.php");
$controller = new Controller();
$controller->Get("PartialStreets");

$array = array();
if(isset($GLOBALS['result']->street_details)){
	
	$i=0;
	if(count($GLOBALS['result']->street_details) >1){
		foreach($GLOBALS['result']->street_details as $result_streets){
			$array[$i] = array("label" => $result_streets->street_name);	
			$i++;	
		}
	}
	else{
		$result_streets = $GLOBALS['result']->street_details;
		$array[$i] = array("label" => $result_streets->street_name);
	}
	
}
echo json_encode($array);
?>