<?php
include("../../framework/controller.php");
$controller = new Controller();
$result = $controller->Get("SpecificOfficer");
$GLOBALS['officer_id'] = $_SESSION['responsible_code'];
$array = array(
				"responsible_code" => $result->responsible_code, 
				"surname" => $result->surname, 
				"given_names" => $result->given_names, 
				"mail_id" => $result->mail_id, 
				"telephone" => $result->telephone, 
				"mobile_no" => $result->mobile_no
			);
echo json_encode($array);
?>