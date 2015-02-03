<?php
include("../../framework/controller.php");
$controller = new Controller();
$result = $controller->Get("NextActions");
echo json_encode($result);
?>