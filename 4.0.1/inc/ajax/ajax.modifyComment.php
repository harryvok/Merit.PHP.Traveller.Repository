<?php
include("../../framework/controller.php");
$controller = new Controller();
if($controller->Process("ModifyComment", false) == true){
    echo json_encode(array("status" => true));   
}
else{
    echo json_encode(array("status" => false));   
}
?>