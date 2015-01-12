<?php
include("../../framework/controller.php");
$controller = new Controller();
if($result = $controller->Process("CreateRequest", false)){
    if($result == true){
        echo "Request created with ID of ".$_SESSION['request_id_fin'].".";
    }
    else{
        echo "Request failed to create.";
    }
}
else{
    echo "Request failed to create.";
}
?>