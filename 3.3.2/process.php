<?php
session_start();
if(isset($_COOKIE['user_id'])){
	// Backend of site. Deals with queries, inserts, updates and deletes.
	
	// Database connection
	include("/framework/controller.php");
	
	// Establish controller
	$controller = new Controller();
	
	// Handle process
	$action = $_POST['action'];
	$controller->Process($action);
}
else{
	$_SESSION['error_not_logged_in'] = 1;
	header("Location: index.php");	
}
?>
