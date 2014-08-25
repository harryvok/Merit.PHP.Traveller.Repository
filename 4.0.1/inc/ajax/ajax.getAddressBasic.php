<?php
include("../../framework/controller.php");
$controller = new Controller();
$result = $controller->Get("AddressBasic");
echo json_encode($result);
?>