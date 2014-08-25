<?php
session_start();
// SETTINGS
include("framework/controller.php");

// process.setup.php
// Backend of the website which involves the defining of settings

// Scripted by Jon Cleary
$controller = new Controller();

foreach($_POST as $var => $data){
	$$var = $data;	
}


//By default the database is ready to be set
$ok = 1;

if($ok == 1){
	$parameters = new stdClass();
	$parameters->user_id = $user_id;
	$parameters->password = $password;
	$parameters->server = $merit_server;		
	$parameters->database = $merit_database;
	$parameters->db_user = $merit_user;
	$parameters->db_pwd = $merit_password;
	$wsdl = $web_services_path."ws_traveller.asmx"."?wsdl";
	$client = new SoapClient ($wsdl);
	$result = $client->ws_set_traveller_db_connection($parameters)->ws_set_traveller_db_connectionResult;
	
	$parameters_pr = new stdClass();
	$parameters_pr->user_id = $user_id;
	$parameters_pr->password = $password;
	$parameters_pr->server = $property_server;		
	$parameters_pr->database = $property_database;
	$parameters_pr->db_user = $property_user;
	$parameters_pr->db_pwd = $property_password;
	$wsdl_pr = $web_services_path."ws_traveller.asmx"."?wsdl";
	$client_pr = new SoapClient ($wsdl_pr);
	$result_pr = $client_pr->ws_set_traveller_propsys_db_connection($parameters_pr)->ws_set_traveller_propsys_db_connectionResult;
	
	if($result->ws_status == 0){
		if($result_pr->ws_status == 0){
			$string = '<?php
// settings.php
// The settings file that controls most of the website

define("SETUP", 1);

//SETTINGS
define("SITE_TITLE","'.$site_title.'");
define("COUNCIL_NAME", "'.$council_name.'"); // Your council name

//WEB SERVICES AND LINKS
define("SITE_LINK", "'.$site_link.'");
define("WEBSITE", "'.$site_link.'"); // Traveller website address, with a slash on the end.
define("LOCAL_LINK", "'.$local_path.'"); // Traveller website address, with a slash on the end.
define("WEB_SERVICES_PATH", "'.$web_services_path.'"); // Path to the webservices. With a slash on the end!
define("MERIT_ACTION_FILE", "ws_merit_action.asmx");
define("MERIT_REQUEST_FILE", "ws_merit_request.asmx");
define("MERIT_ADMIN_FILE", "ws_merit_admin.asmx");
define("MERIT_TRAVELLER_FILE", "ws_traveller.asmx");
define("ATTACHMENT_FOLDER", "'.str_ireplace("\\", "/",$attachment_folder).'"); // Folder where attachments will be uploaded, with a slash. MUST HAVE FORWARD SLASHES.
// MUST be a separate location to the attachments folder inside Traveller.
define("LOOKUP_ENABLED", '.$lookup.'); // whether or not name and address lookup is enabled
define("CHANGE_PASSWORD", '.$changePassword.'); // whether or not users can change their password
define("NEW_WINDOW", '.$newWindow.'); // whether or not sidebar buttons open in a new windows

//MERIT DATABASE CONNECTION
define("DB_SERVER", "'.$merit_server.'"); // database server
define("DB_DATABASE", "'.$merit_database.'"); //database
define("DB_USER", "'.$merit_user.'"); // database username
define("DB_PASS", "'.$merit_password.'"); // database password

//PROPERTY DATABASE CONNECTION
define("PROP_SERVER", "'.$property_server.'"); // database server
define("PROP_DATABASE", "'.$property_database.'"); //database
define("PROP_USER", "'.$property_user.'"); // database username
define("PROP_PASS", "'.$property_password.'"); // database password

//EXTERNAL SERVICES
define("INTRAMAPS", "'.$external_intramaps.'");
define("INTRAMAPS_MOBILE", "'.$external_intramaps_mobile.'");

define("AU1", "'.$user_id.'");
define("AU2", "'.$password.'");

// EMAILING
define("YOUR_EMAIL", "'.$email_address.'"); // your support email
define("EMAIL_FROM", "'.$email_address_name.'"); // name of person/company emails will be from (merit support)
define("SMTP_HOST", "'.$smtp_host.'");
define("SMTP_USER", "'.$smtp_user.'");
define("SMTP_PASS", "'.$smtp_pass.'");

// OTHER
define("COMPULSORY", "The fields with an asterisk are mandatory!"); // main message at top of form
define("THANKYOU", "Thankyou for your request. Your request number is #"); // message sent after submit, the request ID is added automatically.

define("MAX_FILE_SIZE_V", "10000000");
$validMimes = array( // Allowed file types for uploads (note these a mimes, google your filetypes mime!)
	  "image/png",
	  "image/x-png",
	  "image/gif",
	  "image/jpeg",
	  "image/jpg",
	  "image/pjpeg",
	  "application/msword",
	  "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
	  "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
	  "application/vnd.openxmlformats-officedocument.presentationml.presentation",
	  "application/vnd.ms-excel",
	  "text/plain",
	  "application/xml",
	  "application/vnd.ms-powerpoint",
	  "application/pdf"
);
?>';
	
			$fp = fopen("framework/settings.php", "w");
			fwrite($fp, $string);
			fclose($fp);
			$_SESSION['done'] = 1;
			$_SESSION['success'] = 1;
			
			if($_POST['purpose'] == "setup"){
				$_SESSION['success_setup'] = 1;
			}
			elseif($_POST['purpose'] == "modify"){
				unset($_SESSION['modify_auth']);
				$_SESSION['success_modify_settings'] = 1;
			}
			
			setcookie("user_id", "", -3600);
			header("Location: index.php");
		}
		else{
			$_SESSION['done'] = 1;
			$_SESSION['error'] = 1;
			$_SESSION['error_property'] = 1;
			
			foreach($_SESSION as $name => $data){
				if(stristr($name, "rem")){
					unset($_SESSION[$name]);
				}
			}
			
			if($_POST['purpose'] == "setup"){
				header("Location: page.setup.php");
			}
			elseif($_POST['purpose'] == "modify"){
				header("Location: index.php?page=modify-settings");	
			}
		}
	}
	else{
		$_SESSION['done'] = 1;
		$_SESSION['error'] = 1;
		$_SESSION['error_merit'] = 1;
		
		foreach($_POST as $name => $data){
				$_SESSION["rem_".$name] = $data;	
			}

		if($_POST['purpose'] == "setup"){
				header("Location: page.setup.php");
			}
			elseif($_POST['purpose'] == "modify"){
				header("Location: index.php?page=modify-settings");	
			}
	}	
}
else{
	$_SESSION['done'] = 1;
	$_SESSION['error'] = 1;
	
	foreach($_POST as $name => $data){
		$_SESSION["rem_".$name] = $data;	
	}
	
	if($_POST['purpose'] == "setup"){
				header("Location: page.setup.php");
			}
			elseif($_POST['purpose'] == "modify"){
				header("Location: index.php?page=modify-settings");	
			}
}
