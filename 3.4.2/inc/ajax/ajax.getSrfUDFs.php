
<?php
session_start();
include("../../framework/controller.php");
$controller = new Controller();

$controller->Display("srfUDFs", "srfUDFs", array("service_code" => $_POST['service_code'], "request_code" => $_POST['request_code'], "function_code" => $_POST['function_code']));

foreach($_SESSION as $var => $data){
	if(stristr($var,"rem_udf")){
		unset($_SESSION[$var]);	
	}
}
?>