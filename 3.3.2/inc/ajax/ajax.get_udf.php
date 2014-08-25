
<?php
session_start();
include("../../framework/controller.php");
$controller = new Controller();

$controller->Invoke("UDFs");

foreach($_SESSION as $var => $data){
	if(stristr($var,"rem_udf")){
		unset($_SESSION[$var]);	
	}
}
?>