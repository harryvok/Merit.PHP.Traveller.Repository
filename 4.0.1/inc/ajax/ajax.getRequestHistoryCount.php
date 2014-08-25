<?php
include("../../framework/controller.php");
$controller = new Controller();
echo  json_encode($controller->Get("RequestHistoryCount"));
?>