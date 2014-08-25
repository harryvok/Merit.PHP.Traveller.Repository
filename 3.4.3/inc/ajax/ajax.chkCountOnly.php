<?php
include("../../framework/controller.php");
$controller = new Controller();
echo json_encode(array("countOnly" =>$controller->Get("CountOnly")->count_only));
?>