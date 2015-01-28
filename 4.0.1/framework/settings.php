<?php
// settings.php
// The settings file that controls most of the website

define("SETUP", 1);
define("DEV", 1);

//SETTINGS
define("SITE_TITLE","Merit Traveller");
define("COUNCIL_NAME", "Merit Technology"); // Your council name
define("INACTIVITY", ""); // The time in minutes of inactivity before a user is logged out automatically with the browser still open. Optional.
define("REFRESHTABLE", ""); // The time Before a table refresh occurs
define("EMAIL_SUBJECT_PREFIX", "Merit Technology Pty Ltd -"); // The Email Subject Prefix - eg. "Merit Technology Pty Ltd:" Request XXXXX - Updated Settings

//WEB SERVICES AND LINKS
define("SITE_LINK", "http://traveller.merit.com.au/4.0.1/");
define("WEBSITE", "http://traveller.merit.com.au/4.0.1/"); // Traveller website address, with a slash on the end.
define("LOCAL_LINK", "C:/projects/Merit2013/Merit.PHP.Traveller/4.0/"); // Traveller website address, with a slash on the end.
define("WEB_SERVICES_PATH", "http://192.168.0.87:8086/merit_traveller/"); // Path to the webservices. With a slash on the end!
define("MERIT_ACTION_FILE", "ws_merit_action.asmx");
define("MERIT_REQUEST_FILE", "ws_merit_request.asmx");
define("MERIT_ADMIN_FILE", "ws_merit_admin.asmx");
define("MERIT_TRAVELLER_FILE", "ws_traveller.asmx");
define("ATTACHMENT_FOLDER", "//MERIT-DOMAINSVR/Pbase/temp/Attachments/"); // Folder where attachments will be uploaded, with a slash. MUST HAVE FORWARD SLASHES.
// MUST be a separate location to the attachments folder inside Traveller.
define("CHANGE_PASSWORD", 1); // whether or not users can change their password
define("NEW_WINDOW", 0); // whether or not sidebar buttons open in a new windows

//MERIT DATABASE CONNECTION
define("DB_SERVER", "merit-dbserver"); // database server
define("DB_DATABASE", "MeritCRM_Rachael"); //database
define("DB_USER", "merit"); // database username
define("DB_PASS", "merit"); // database password

//PROPERTY DATABASE CONNECTION
define("PROP_SERVER", "merit-exchsvr"); // database server
define("PROP_DATABASE", "Proclaim"); //database
define("PROP_USER", "proclaim"); // database username
define("PROP_PASS", "proclaim"); // database password

//EXTERNAL SERVICES
define("DEFAULT_ADDRESS", "");
define("INTRAMAPS", "");
define("INTRAMAPS_MOBILE", "");

define("AU1", "administrator");
define("AU2", "merit608");


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
?>