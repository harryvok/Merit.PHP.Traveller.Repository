<?php
include("../../framework/controller.php");
$controller = new Controller();
$controller->Get("PartialSuburbs");

$array = array();
if(isset($GLOBALS['result']->locality_details)){
	
	$i=0;
	if(count($GLOBALS['result']->locality_details) >1){
		foreach($GLOBALS['result']->locality_details as $result_streets){
			$array[$i] = array("label" => $result_streets->locality_name, "postcode"=> $result_streets->postcode);	
			$i++;	
		}
	}
	else{
		$result_streets = $GLOBALS['result']->locality_details;
		$array[$i] = array("label" => $result_streets->locality_name,"postcode"=> $result_streets->postcode);
	}
	
}
echo json_encode($array);
?>