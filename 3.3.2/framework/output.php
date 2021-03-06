<?php
// Arrays of Output
if(isset($_SESSION['error_action_submit_message'])){ $act_msg =  $_SESSION['error_action_submit_message']; } else{ $act_msg = ''; }
if(isset($_SESSION['request-id'])){ $suc_id =  $_SESSION['request-id']; } else{ $suc_id = ''; }
if(isset($_SESSION['custom_error'])){ $custom_error =  $_SESSION['custom_error']; } else{ $custom_error = 'None'; }
if(isset($_SESSION['request_id_fin'])){ $request_id_fin =  $_SESSION['request_id_fin']; } else{ $request_id_fin = ''; }
$error_array = array(
	'error_login' => 'Incorrect username or password.',
    'error_database' => 'Error connecting to the database.',
	'error_action_submit_message' => $act_msg,
	'error_action' => 'There was an error creating the aciton.',
	'error_loc_address_required' => 'You need to have at least one address (either Customer or Location, or both!). The address must have a number, street name, type and suburb.',
	'error_request' => 'There was an error with the web service creating the request. Please try again or contact Merit.',
	'error_service' => 'You did not select a service',
	'error_filesize' => 'The file size of one of the attachments was too large.',
	'error_attachment' => 'The file could not be uploaded. The file type may not be supported.',
	'error_attach' => 'There was an error uploading the attachment.',
	'error_client' => 'You have to choose a client.',
	'error_comment' => 'Comment could not be added.',
	'error_priority' => 'You did not select a priority',
	'error_issue' => 'You did not fill in an issue',
	'error_phone' => 'Phone number invalid',
	'error_email' => 'Email address invalid',
	'error_name' => 'You forgot to fill out your name',
	'error_not_logged_in' => 'You are not logged in.',
	'error_no_input' => 'You must fill in both fields.',
	'error_modify_auth' => 'The user ID or password you entered was invalid.',
	'error_site_title' => 'You did not enter a site title.',
	'error_site_link ' => 'You did not enter a site link.',
	'error_local_path ' => 'You did not enter a local path.',
	'error_web_services_path ' => 'You did not enter web services path.',
	'error_user_id' => 'You did not enter a user ID.',
	'error_password' => 'You did not enter a password.',
	'error_merit_server' => 'You did not enter a Merit Database server.',
	'error_merit_database' => 'You did not enter a Merit database.',
	'error_merit_user' => 'You did not enter a Merit database username.',
	'error_merit_password' => 'You did not enter a Merit database password.',
	'error_merit' => 'The Merit database connection details you entered were incorrect.',
	'error_property_server' => 'You did not enter a property Database server.',
	'error_property_database' => 'You did not enter a property database.',
	'error_property_user' => 'You did not enter a property database username.',
	'error_property_password' => 'You did not enter a property database password.',
	'error_property' => 'The property database connection details you entered were incorrect.',
	'error_email_address' => 'You did not enter an email address.',
	'error_email_address_name' => 'You did not enter an email address name.',
	'error_attachment_folder' => 'You did not enter an attachment folder.',
	'error_reassigned' => 'Error reassigning action.',
	'error_udfs' => 'Error modifying User Defined Fields.',
	'error_change_password' => 'There was a problem with the web service. Please contact Merit.',
	'error_current' => 'Your current password was incorrect.',
	'error_repeat' => 'You didn\'t repeat your password correctly. Please try again.',
	'error_web_service' => 'There was an error with the web service: '.$custom_error.'. Please contact Merit.',
	"error_role_security" => 'You are not authorised to perform that action.',
    "error_custom" => $custom_error
);

$success_array = array(
	'success_action_submit' => 'The action with the request ID of #<a href="index.php?page=view-request&id='.$suc_id.'">'.$suc_id.'</a> has been processed.',
	'success_comment' => 'Comment added.',
	'success_attach' => 'Attachment uploaded.',
	'success_reassigned' => 'Action reassigned.',
	'success_action' => 'Action created',
	'success_setup' => 'Congratulations! You have successfully set up Merit Traveller. The application is now ready for use.',
	'success_modify_settings' => 'The application\'s settings have been successfully modified.',
	'success_request' => 'Request created: '.$request_id_fin,
	'success_udfs' => 'Successfully modified User Defined Fields.',
	'success_change_password' => 'Successfully changed password.',
	'success_email' => isset($_SESSION['email_msg']) ? strlen($_SESSION['email_msg']) > 0 ? $_SESSION['email_msg'] : 'Email notification has been sent to the customer.' : '',
	'success_sms' => isset($_SESSION['sms_msg']) ? strlen($_SESSION['sms_msg']) > 0 ? $_SESSION['sms_msg'] : 'SMS notification has been sent to the customer.' : ''
);

$realNameArray = array(
	 "udfs" => "User Defined Fields", 
	 "ca" => "Comments and Attachments",
	 "reassign" => "Reassign Action", 
	 "complete" => "Complete Action", 
	 "names" => "Names",  
	 "actions" => "Actions", 
	 "act" => "Actions", 
	 "req" => "Requests", 
	 "requests" => "Requests", 
	 "attrib" => "Attributes", 
	 "aliases" => "Aliases", 
	 "assoc" => "Associations",
	 "hist" => "History of Actual Changes", 
	 "addresses" => "Addresses", 
	 "setup" => "Setup"
);
?>