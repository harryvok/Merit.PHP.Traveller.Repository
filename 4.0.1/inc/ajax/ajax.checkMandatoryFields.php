<?php
include("../../framework/controller.php");
$controller = new Controller();
$result = $controller->Get("CheckMandatoryFields");
echo json_encode($result);
?>