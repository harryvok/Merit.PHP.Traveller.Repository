<?php
session_start();
include('framework/controller.php');
if(file_exists("framework/settings.php") && defined("SETUP") && SETUP == 1){
	header("Location: index.php");	
}

if(isset($_SESSION['user_id'])){
	$user = $_SESSION['user_id'];	
}
if(empty($_GET['page'])){ $page = "actions"; } else{ $page = $_GET['page']; }

// Initialise the framework
$controller = new Controller();

// Arrays of Output
if(isset($_SESSION['error_action_submit_message'])){ $act_msg =  $_SESSION['error_action_submit_message']; } else{ $act_msg = ''; }
if(isset($_SESSION['request-id'])){ $suc_id =  $_SESSION['request-id']; } else{ $suc_id = ''; }
$error_array = array(
	'error_reset_auth' => 'The user ID or password you entered was invalid.',
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
	'error_council_name' => 'You did not enter a council name'
);

$success_array = array(
	'success_action_submit' => 'The action with the request ID of #<a href="index.php?page=view-request&id='.$suc_id.'">'.$suc_id.'</a> has been processed.',
	'success_comment' => 'Comment added.',
	'success_attach' => 'Attachment uploaded.',
	'success_reassigned' => 'Action reassigned.',
	'success_action' => 'Action created',
	'success_setup' => 'Congratulations! You have successfully set up Merit Traveller. The application is now ready for use.'
);
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="en-au" />
   <link rel="stylesheet" href="css/pc/pc.Base.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/pc/pc.Layout.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/pc/pc.Module.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/pc/pc.State.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/libraries/jquery-ui.css" type="text/css" media="screen" />
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" /> 
    <script type="text/javascript" src="inc/js/libraries/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="inc/js/libraries/jquery.validate.min.js"></script>
    <script type="text/javascript">window.name = "traveller";
    
    $(document).ready(function(){
			// validate signup form on keyup and submit
			$("#setup").validate();
		});
		</script>
    <title>Merit Traveller - Setup</title>
</head>
<body>
<div id="fixed-position" align="center">
            <div id="header-container" align="center">
                <div id="header" align="center">
                    <a href="index.php?" class="logo" title="" rel="shadowbox"></a>
                </div>
            </div>

        <div class="setupContainer">
          <h1 class="setupTitle">Setup</h1>
          Welcome to Merit Traveller! This is your first time running this application so we must first define some settings for Traveller to use.<br />
          Fill in all the fields. If you do not understand certain settings please contact Merit, or read the descriptions below each box.<p>&nbsp;</p>
          
          Please note that some fields will already be filled in for you. It is optional to change these.<p>&nbsp;</p>
          
          <p>
            
            <?php
            if(!extension_loaded("zip") || !extension_loaded("xml") || !extension_loaded("gd")){
                ?>
                <span class="red">
                <strong>WARNING:</strong> Some extensions have not loaded. Please ensure the following is added at the bottom of your php.ini file:<br><br>
                <?php
                if(!extension_loaded("zip")) echo "extension=php_zip.dll<br>";
                if(!extension_loaded("xml")) echo "extension=php_xml.dll<br>";
                if(!extension_loaded("gd")) echo "extension=php_gd2.dll<br>";
                ?>
                </span>
                <?php
            }
            ?>
          </p>
          
          <?php include("page.output.php"); ?>
          
          <form method="post" id="setup" action="process.setup.php">
              <h2>Authentication</h2>
              <label  for="user_id">User ID<span style="color:red;">*</span></label> 
              <input class="text required" name='user_id'  value='<?php if(isset($_SESSION['rem_user_id'])){ echo $_SESSION['rem_user_id']; } ?>'><br />
              <span class="small">(The user ID that will be used at a later stage to reset the settings)</span><br>
              <label  for="password">Password<span style="color:red;">*</span></label> 
              <input class="text required" name='password' type="password" value='<?php if(isset($_SESSION['rem_password'])){ echo $_SESSION['rem_password']; } ?>'><br />
              <span class="small">(The password that will be used at a later stage to reset the settings)</span><p>&nbsp;</p><p>&nbsp;</p>
              
              <label  for="password">Minutes of Inactivity</label> 
              <input class="text" name='inactivity' value=''><br />
              <span class="small">(The time in minutes of inactivity before a user is logged out automatically with the browser still open. Optional.)</span><p>&nbsp;</p><p>&nbsp;</p>
              
              
              
              <h2>Website</h2>
              <label  for="site_title">Site Title<span style="color:red;">*</span></label> 
              <input class="text required" name='site_title' maxlength='50' value='<?php if(isset($_SESSION['rem_site_title'])){ echo $_SESSION['rem_site_title']; } else { echo "Merit Traveller"; } ?>'><br />
              <span class="small">(Will appear as the name of the site in your browser)</span><br>
              <label  for="site_link">Site Link<span style="color:red;">*</span></label> 
              <input class="text required" name='site_link' value='<?php if(isset($_SESSION['rem_site_link'])){ echo $_SESSION['rem_site_link']; } else { echo "http://"; } ?>'><br />
              <span class="small">(The full link to your application, eg http://www.mysite.com.au/traveller/. Remember the slash on the end.)</span><br>
              <label  for="local_path">Local Path<span style="color:red;">*</span></label>
              <input class="text required" name='local_path' value='<?php if(isset($_SESSION['rem_local_path'])){ echo $_SESSION['rem_local_path']; } else { echo "C:/"; }?>'><br />
              <span class="small">(The local path on your server which hosts this application, eg C:/inetpub/wwwroot/) <strong>This path must have forward slashes</strong>.</span><br>
              <label  for="web_services_path">Web Services Path<span style="color:red;">*</span></label> 
              <input class="text required" name='web_services_path' value='<?php if(isset($_SESSION['rem_web_services_path'])){ echo $_SESSION['rem_web_services_path']; } else { echo "http://"; } ?>'><br />
              <span class="small">(The full link to your application's web services, eg http://www.mysite.com.au/traveller/merit_traveller/. Remember the slash on the end.)</span><br>
              <label  for="attachment_folder">Attachment Folder<span style="color:red;">*</span></label>
              <input class="text required" name='attachment_folder' value='<?php if(isset($_SESSION['rem_attachment_folder'])){ echo $_SESSION['rem_attachment_folder']; } ?>' placeholder="//myserver/attachments/"><br />
              <span class="small">(The folder where attachments are stored for your Merit client. Can be a network drive. Please set to a folder that is shared on the network and is accessible by anyone who uses the client as well.<br>
              eg: //SERVER-NAME/folder/ WITH the slash on the end. <strong>This path must have forward slashes</strong>.<br /> <strong>This folder MUST be a separate location to the attachments folder inside Traveller</strong>.<br>
         
              In order for Traveller to upload to network drives:
              <ol>
              	<li>Open Internet Information Services on the server that hosts this application.</li>
                <li>Click on the Traveller application/Website.</li>
                <li>Click on "Authentication".</li>
                <li>Edit the Anonymous Authentication setting.</li>
                <li>Click Set next to Specific user</li>
                <li>Type in credentials that will have access to the network drive.</li>
              </ol><br>
              You may not have to do this if network drives are shared openly.<br>
              Please contact Merit if this continues to fail.)</span><br>
              <label  for="council_name">Council Name<span style="color:red;">*</span></label>
              <input class="text required" name='council_name' value='<?php if(isset($_SESSION['rem_council_name'])){ echo $_SESSION['rem_council_name']; } else { echo ""; } ?>'><br />
              <span class="small">(The name of your Council. This will be displayed in the top right corner of the website.)</span><br>
              
              
              <label  for="council_name">Allow Change Password?<span style="color:red;">*</span></label>
              Yes <input type="radio" class="radio required" name="changePassword" value="1" <?php if(isset($_SESSION['rem_changePassword']) && $_SESSION['rem_changePassword'] == '1') echo 'checked="checked"';  ?>> 
              No <input type="radio" class="radio required" name="changePassword" value="0" <?php if(isset($_SESSION['rem_changePassword']) && $_SESSION['rem_changePassword'] == '0') echo 'checked="checked"';  ?>> <br />
              <span class="small">(Whether or not users can change their password.)</span><br>
               <label  for="council_name">Links In New Window?<span style="color:red;">*</span></label>
              Yes <input type="radio" class="radio required" name="newWindow" value="1" <?php if(isset($_SESSION['rem_newWindow']) && $_SESSION['rem_newWindow'] == '1') echo 'checked="checked"';  ?>> 
              No <input type="radio" class="radio required" name="newWindow" value="0" <?php if(isset($_SESSION['rem_newWindow']) && $_SESSION['rem_newWindow'] == '0') echo 'checked="checked"';  ?>> <br />
              <span class="small">(Whether or not top menu tabs open in a new windows.)</span><p>&nbsp;</p>
              
              <h2>Merit Database Connection</h2>
              <label  for="merit_server">Server<span style="color:red;">*</span></label> 
              <input class="text required" name='merit_server' value='<?php if(isset($_SESSION['rem_merit_server'])){ echo $_SESSION['rem_merit_server']; } ?>'><br />
              <span class="small">(The name of the server that holds your database.)</span><br>
              <label  for="merit_database">Database<span style="color:red;">*</span></label> 
              <input class="text required" name='merit_database' value='<?php if(isset($_SESSION['rem_merit_database'])){ echo $_SESSION['rem_merit_database']; } ?>'><br />
              <span class="small">(The name of your database.)</span><br>
              <label  for="merit_user">Username<span style="color:red;">*</span></label> 
              <input class="text required" name='merit_user'  value='<?php if(isset($_SESSION['rem_merit_user'])){ echo $_SESSION['rem_merit_user']; } ?>'><br />
              <span class="small">(The database username)</span><br>
              <label  for="merit_password">Password<span style="color:red;">*</span></label> 
              <input class="text required" name='merit_password' type="password" value='<?php if(isset($_SESSION['rem_merit_password'])){ echo $_SESSION['rem_merit_password']; } ?>'><br />
              <span class="small">(The database password)</span><p>&nbsp;</p><p>&nbsp;</p>
              
              <h2>Property Database Connection</h2>
              <label  for="property_server">Server<span style="color:red;">*</span></label> 
              <input class="text required" name='property_server' value='<?php if(isset($_SESSION['rem_property_server'])){ echo $_SESSION['rem_property_server']; } ?>'><br />
              <span class="small">(The name of the server that holds your database.)</span><br>
              <label  for="property_database">Database<span style="color:red;">*</span></label> 
              <input class="text required" name='property_database' value='<?php if(isset($_SESSION['rem_property_database'])){ echo $_SESSION['rem_property_database']; } ?>'><br />
              <span class="small">(The name of your database.)</span><br>
              <label  for="property_user">Username<span style="color:red;">*</span></label> 
              <input class="text required" name='property_user'  value='<?php if(isset($_SESSION['rem_property_user'])){ echo $_SESSION['rem_property_user']; } ?>'><br />
              <span class="small">(The database username)</span><br>
              <label  for="property_password">Password<span style="color:red;">*</span></label> 
              <input class="text required" name='property_password' type="password" value='<?php if(isset($_SESSION['rem_property_password'])){ echo $_SESSION['rem_property_password']; } ?>'><br />
              <span class="small">(The database password)</span><p>&nbsp;</p><p>&nbsp;</p>
             
              <h2>External Services</h2>
              <label  for="default_address">Default Address<span style="color:red;">*</span></label>
              <input class="text required" name='default_address' value='<?php if(isset($_SESSION['rem_default_address'])){ echo $_SESSION['rem_default_address']; } else { echo ""; } ?>'><br />
              <span class="small">(The default address for Google Maps.)</span><br>
              <label  for="property_password">Intramaps Embed URL</label> 
              <input class="text" name='external_intramaps' type="text" value='<?php if(isset($_SESSION['rem_external_intramaps'])){ echo $_SESSION['rem_external_intramaps']; } ?>'><br />
              <span class="small">(If you wish to embed Intramaps into Traveller please state it's URL without the Lot and Property Number on the end of the URL.)</span><p>&nbsp;</p>
              <label  for="property_password">Intramaps Mobile Embed URL</label> 
              <input class="text" name='external_intramaps_mobile' type="text" value='<?php if(isset($_SESSION['rem_external_intramaps_mobile'])){ echo $_SESSION['rem_external_intramaps_mobile']; } ?>'><br />
              <span class="small">(If you wish to embed mobile Intramaps into Traveller please state it's URL without the Lot and Property Number on the end of the URL. Keep mapkey=.)</span><p>&nbsp;</p><p>&nbsp;</p>

              <h2>Email</h2>
              <label  for="email_address">Support Email Address<span style="color:red;">*</span></label>
              <input class="text email" name='email_address' value='<?php if(isset($_SESSION['rem_email_address'])){ echo $_SESSION['rem_email_address']; } else { echo "support@yourcompany.com.au"; } ?>'><br />
              <span class="small">(The email address that emails will be sent to after certain events occur such as the completion of actions, eg support@merit.com.au)</span><br>
              <label  for="email_address_name">Support Email Name<span style="color:red;">*</span></label>
              <input class="text" name='email_address_name' value='<?php if(isset($_SESSION['rem_email_address_name'])){ echo $_SESSION['rem_email_address_name']; } else { echo "Merit Technology"; } ?>'><br />
              <span class="small">(The sender name of the email address, eg Merit Technology, or your company's name)</span><br>
              <label  for="smtp_host">SMTP Server</label>
              <input class="text" name='smtp_host' value='<?php if(isset($_SESSION['rem_smtp_host'])){ echo $_SESSION['rem_smtp_host']; } ?>'><br />
              <span class="small">(The SMTP server address or name. Leave empty if none.)</span><br>
              <label  for="smtp_user">SMTP Username</label>
              <input class="text" name='smtp_user' value='<?php if(isset($_SESSION['rem_smtp_user'])){ echo $_SESSION['rem_smtp_user']; } ?>'><br />
              <span class="small">(The SMTP server username. Leave empty if none.)</span><br>
              <label  for="smtp_pass">SMTP Password</label>
              <input class="text" name='smtp_pass' type="password" value='<?php if(isset($_SESSION['rem_smtp_pass'])){ echo $_SESSION['rem_smtp_pass']; } ?>'><br />
              <span class="small">(The SMTP server password. Leave empty if none.)</span><p>&nbsp;</p><p>&nbsp;</p>
          
              That's it! Click submit and start using Merit Traveller!<p>&nbsp;</p>
              
              <input type="hidden" name="purpose" value="setup">
              <input id="submit" class="button left" type='submit' value='Submit' />
          </form>
          </div>
