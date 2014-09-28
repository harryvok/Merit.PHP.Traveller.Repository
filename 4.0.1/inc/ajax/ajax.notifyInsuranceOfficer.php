<?php
include("../../framework/controller.php");
$controller = new Controller();
if($controller->Process("NotifyInsuranceOfficer", false)->ws_message == "Notification sent to Insurance Officer"){
    echo json_encode(array("status" => true));   
}
else{
    echo json_encode(array("status" => false));   
}
?>