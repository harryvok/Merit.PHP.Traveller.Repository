<?php
session_start();
if(isset($_COOKIE['user_id'])){
	// SETTINGS
	include("framework/controller.php");
	
	// process.reset.php
	// Backend of the website which involves the reset of settings
	
	// Scripted by Jon Cleary
	$user_id = strip_tags(addslashes($_POST['user_id']));
	$password = strip_tags(addslashes($_POST['password']));
	
	if($user_id == AU1 && $password == AU2){
		$_SESSION['modify_auth'] = 1;
		$_SESSION['modify_user_id'] = $user_id;
		$_SESSION['modify_password'] = $password;
	}
	else{
		$_SESSION['done'] = 1;
		$_SESSION['error'] = 1;
		$_SESSION['error_modify_auth'] = 1;
	}
	
	header("Location: index.php?page=modify-settings");	
}
else{
	$_SESSION['done'] = 1;
	$_SESSION['error'] = 1;
	$_SESSION['error_not_logged_in'] = 1;
	header("Location: index.php");	
}