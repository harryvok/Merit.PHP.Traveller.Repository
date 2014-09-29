<?php
include("../../framework/controller.php");
$controller = new Controller();
$controller->Get("SRFRedText");
echo json_encode(array("note" => $result));   
?>