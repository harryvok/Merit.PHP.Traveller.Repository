<?php
session_start();

// Backend of site. Deals with queries, inserts, updates and deletes.

// Database connection
include("/framework/controller.php");

// Establish controller
$controller = new Controller();

// Handle process
$action = isset($_POST['action']) ? $_POST['action'] : $_GET['action'];
$controller->Process($action);

?>
