<?php
/*include("../../framework/controller.php");
$controller = new Controller();
$controller->Display("ServiceTypes", "ServiceTypes");*/
?>


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
                $array[$i] = array("code" => $result->service_code, "label" => $result->service_name);
                $i = $i + 1;
            }
		}
	}
	else{
		$result = $GLOBALS['result']->service_types_details;
        if($result->active_ind == "Y"){
            $array[$i] = array("code" => $result->service_code, "label" => $result->service_name);
        }
	}
}

echo json_encode($array);
?>