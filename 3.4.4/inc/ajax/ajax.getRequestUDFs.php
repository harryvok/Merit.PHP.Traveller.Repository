<?php
include("../../framework/controller.php");
$controller = new Controller();

$controller->Display("RequestUDFs", $_POST['view'], $_POST['id']);
?>