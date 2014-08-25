<?php
session_start();
include("../../framework/controller.php");
$controller = new Controller();
$controller->Display($_GET['intray']."Intray", $_GET['intray']."Intray");
?>