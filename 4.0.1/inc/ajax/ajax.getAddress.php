<?php
include("../../framework/controller.php");
$controller = new Controller();
$GLOBALS['addressId'] = $_POST['addressId'];
$result = $controller->Get("Address", $_POST['addressId']);
echo json_encode($result);
?>