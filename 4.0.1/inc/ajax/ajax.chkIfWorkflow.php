<?php
include("../../framework/controller.php");
$controller = new Controller();
echo json_encode(array("workflow_ind" =>$controller->Get("IfWorkflow")->workflow_ind));
?>