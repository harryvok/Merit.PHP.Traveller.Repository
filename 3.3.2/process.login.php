<?php
session_start();
// Backend of site. Deals with queries, inserts, updates and deletes.

// Database connection
include("/framework/controller.php");

// Establish controller
$controller = new Controller();

$parameters = new stdClass();
$parameters->user_id = AU1;
$parameters->password = AU2;
$parameters->server = DB_SERVER;		
$parameters->database = DB_DATABASE;
$parameters->db_user = DB_USER;
$parameters->db_pwd = DB_PASS;
$result = $controller->WebService(MERIT_TRAVELLER_FILE, "ws_set_traveller_db_connection", $parameters);

$parameters_pr = new stdClass();
$parameters_pr->user_id = AU1;
$parameters_pr->password = AU2;
$parameters_pr->server = PROP_SERVER;		
$parameters_pr->database = PROP_DATABASE;
$parameters_pr->db_user = PROP_USER;
$parameters_pr->db_pwd = PROP_PASS;
$result_pr = $controller->WebService(MERIT_TRAVELLER_FILE, "ws_set_traveller_propsys_db_connection", $parameters_pr);

$controller->Login();


?>
