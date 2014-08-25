
<?php
include("../../framework/controller.php");
$controller = new Controller();

$controller->Process("AddComment");
$controller->Invoke("ActionComments");
?>