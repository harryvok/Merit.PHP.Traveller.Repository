<?php
include("../../framework/controller.php");
$controller = new Controller();
$GLOBALS['addressId'] = $_POST['addressId'];
$result = $controller->Get("SpecificAddress");
echo json_encode($result);
?>