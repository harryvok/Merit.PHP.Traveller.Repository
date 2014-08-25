<?php
session_start();
include("../../framework/controller.php");
$controller = new Controller();
$controller->Invoke("PartialSuburbs");
?>