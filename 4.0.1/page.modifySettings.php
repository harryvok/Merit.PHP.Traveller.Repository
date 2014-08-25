<?php
if($mobile_browser >0){
	?>
	<div id="topbar">
    	<div id="title">
			Modify Settings</div>
        <div id="leftnav">
			<a href="index.php?"><img alt="home" src="images/home.png" /></a></div>
    </div>
    <div id="wrapper">
        <div id="scroller">
            <div id="content">
            	<ul class="pageitem">
                	<li class="textbox">Please run this page on a computer to modify the site's settings.</li>
                </ul>
            </div>
        </div>
    </div>
    <?php
}
else{
	if(isset($_SESSION['modify_auth']) && $_SESSION['modify_auth'] == 1){
		?>
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
        <form method="post" id="setup" action="process.setup.php">
                <h2>Authentication</h2>  
              <label  for="password">Minutes of Inactivity</label> 
              <input class="text" name='inactivity' value='<?php echo defined("INACTIVITY") ? INACTIVITY : ""; ?>'><br />
              <span class="small">(The time in minutes of inactivity before a user is logged out automatically with the browser still open. Optional.)</span><p>&nbsp;</p><p>&nbsp;</p>
        
              <label  for="password">Page refresh time</label> 
              <input class="text" name='refreshtable' value='<?php echo defined("REFRESHTABLE") ? REFRESHTABLE : ""; ?>'><br />
              <span class="small">(The time in minutes between refresh of Action and Request Intrays. Optional.)</span><p>&nbsp;</p><p>&nbsp;</p>

            
              <h2>Website</h2>
              <label  for="site_title">Site Title<span style="color:red;">*</span></label> 
              <input class="text required" name='site_title' maxlength='50' value='<?php echo SITE_TITLE; ?>'><br />
              <span class="small">(Will appear as the name of the site in your browser)</span><br/>
              <label  for="site_link">Site Link<span style="color:red;">*</span></label> 
              <input class="text required" name='site_link' value='<?php echo SITE_LINK; ?>'><br />
              <span class="small">(The full link to your application, eg http://www.mysite.com.au/traveller/. Remember the slash on the end.)</span><br/>
              <label  for="local_path">Local Path<span style="color:red;">*</span></label>
              <input class="text required" name='local_path' value='<?php echo LOCAL_LINK; ?>'><br />
              <span class="small">(The local path on your server which hosts this application, eg C:/inetpub/wwwroot/) <strong>This path must have forward slashes</strong>.</span><br/>
              <label  for="web_services_path">Web Services Path<span style="color:red;">*</span></label> 
              <input class="text required" name='web_services_path' value='<?php echo WEB_SERVICES_PATH; ?>'><br />
              <span class="small">(The full link to your application's web services, eg http://www.mysite.com.au/traveller/merit_traveller/. Remember the slash on the end.)</span><br/>
              <label  for="attachment_folder">Attachment Folder<span style="color:red;">*</span></label>
              <input class="text required" name='attachment_folder' value='<?php echo ATTACHMENT_FOLDER; ?>' ><br />
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
              Please contact Merit if this continues to fail.)</span><br/>
              <label  for="council_name">Council Name<span style="color:red;">*</span></label>
              <input class="text required" name='council_name' value='<?php echo COUNCIL_NAME; ?>'><br />
              <span class="small">(The name of your Council. This will be displayed in the top right corner of the website.)</span><br/>
              <label  for="council_name">Allow Change Password?<span style="color:red;">*</span></label>
              Yes <input type="radio" class="radio required" name="changePassword" value="1"  <?php if(defined('CHANGE_PASSWORD') && CHANGE_PASSWORD == '1') echo 'checked="checked"'; ?>> 
              No <input type="radio" class="radio required" name="changePassword" value="0" <?php if(defined('CHANGE_PASSWORD') && CHANGE_PASSWORD == '0' || !defined('CHANGE_PASSWORD') ) echo 'checked="checked"';  ?>> <br />
              <span class="small">(Whether or not users can change their password.)</span><br/>
              <label  for="council_name">Links In New Window?<span style="color:red;">*</span></label>
              Yes <input type="radio" class="radio required" name="newWindow" value="1"  <?php if(defined('NEW_WINDOW') && NEW_WINDOW == '1' || !defined('NEW_WINDOW')) echo 'checked="checked"'; ?>> 
              No <input type="radio" class="radio required" name="newWindow" value="0" <?php if(defined('NEW_WINDOW') && NEW_WINDOW == '0' ) echo 'checked="checked"';  ?>> <br />
              <span class="small">(Whether or not sidebar buttons open in a new windows.)</span><p>&nbsp;</p>
              
              <h2>Merit Database Connection</h2>
              <label  for="merit_server">Server<span style="color:red;">*</span></label> 
              <input class="text required" name='merit_server' value='<?php echo DB_SERVER; ?>'><br />
              <span class="small">(The name of the server that holds your database.)</span><br/>
              <label  for="merit_database">Database<span style="color:red;">*</span></label> 
              <input class="text required" name='merit_database' value='<?php echo DB_DATABASE; ?>'><br />
              <span class="small">(The name of your database.)</span><br/>
              <label  for="merit_user">Username<span style="color:red;">*</span></label> 
              <input class="text required" name='merit_user'  value='<?php echo DB_USER; ?>'><br />
              <span class="small">(The database username)</span><br/>
              <label  for="merit_password">Password<span style="color:red;">*</span></label> 
              <input class="text required" name='merit_password' type="password" value='<?php echo DB_PASS; ?>'><br />
              <span class="small">(The database password)</span><p>&nbsp;</p><p>&nbsp;</p>
              
              <h2>External Services</h2>
              <label  for="default_address">Default Address<span style="color:red;">*</span></label>
              <input class="text required" name='default_address' value='<?php if(defined('DEFAULT_ADDRESS')) echo DEFAULT_ADDRESS; ?>'><br />
              <span class="small">(The default address for Google Maps.)</span><br>
              <label  for="property_password">Intramaps Embed URL</label> 
              <input class="text" name='external_intramaps' type="text" value='<?php echo INTRAMAPS; ?>'><br />
              <span class="small">(If you wish to embed Intramaps into Traveller please state it's URL without the Lot and Property Number on the end of the URL.)</span><p>&nbsp;</p>
<label  for="property_password">Intramaps Mobile Embed URL</label> 
              <input class="text" name='external_intramaps_mobile' type="text" value='<?php echo INTRAMAPS_MOBILE; ?>'><br />
              <span class="small">(If you wish to embed mobile Intramaps into Traveller please state it's URL without the Lot and Property Number on the end of the URL. Keep mapkey=.)</span><p>&nbsp;</p><p>&nbsp;</p>

              <h2>Property Database Connection</h2>
              <label  for="property_server">Server<span style="color:red;">*</span></label> 
              <input class="text required" name='property_server' value='<?php echo PROP_SERVER; ?>'><br />
              <span class="small">(The name of the server that holds your database.)</span><br/>
              <label  for="property_database">Database<span style="color:red;">*</span></label> 
              <input class="text required" name='property_database' value='<?php echo PROP_DATABASE; ?>'><br />
              <span class="small">(The name of your database.)</span><br/>
              <label  for="property_user">Username<span style="color:red;">*</span></label> 
              <input class="text required" name='property_user'  value='<?php echo PROP_USER; ?>'><br />
              <span class="small">(The database username)</span><br/>
              <label  for="property_password">Password<span style="color:red;">*</span></label> 
              <input class="text required" name='property_password' type="password" value='<?php echo PROP_PASS; ?>'><br />
              <span class="small">(The database password)</span><p>&nbsp;</p><p>&nbsp;</p>
              <h2>Email</h2>
              <label  for="email_address">Support Email Address<span style="color:red;">*</span></label>
              <input class="text email" name='email_address' value='<?php echo YOUR_EMAIL; ?>'><br />
              <span class="small">(The email address that emails will be sent to after certain events occur such as the completion of actions, eg support@merit.com.au)</span><br/>
              <label  for="email_address_name">Support Email Name<span style="color:red;">*</span></label>
              <input class="text" name='email_address_name' value='<?php echo EMAIL_FROM; ?>'><br />
              <span class="small">(The sender name of the email address, eg Merit Technology, or your company's name)</span><br/>
              <label  for="smtp_host">SMTP Server</label>
              <input class="text" name='smtp_host' value='<?php echo SMTP_HOST; ?>'><br />
              <span class="small">(The SMTP server address or name. Leave empty if none.)</span><br/>
              <label  for="smtp_user">SMTP Username</label>
              <input class="text" name='smtp_user' value='<?php echo SMTP_USER; ?>'><br />
              <span class="small">(The SMTP server username. Leave empty if none.)</span><br/>
              <label  for="smtp_pass">SMTP Password</label>
              <input class="text" name='smtp_pass' type="password" value='<?php echo SMTP_PASS; ?>'><br />
              <span class="small">(The SMTP server password. Leave empty if none.)</span><p>&nbsp;</p><p>&nbsp;</p>
            <input type="hidden" name="purpose" id="purpose" value="modify"/>
            <input  type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['modify_user_id']; ?>" />
            <input  type="hidden" name="password" id="password" value="<?php echo $_SESSION['modify_password']; ?>" />
            
              <input id="submit" class="button left" type='submit' value='Submit' />
              <input id="cancel" class="button left" type="button" value="Cancel" />
          </form>
		
		<?php
	}
	else{
		?>
        
		You can modify the site's vital settings and variables through this page. Fill in the form below with your Authentication details.<br>
		<br />
		Only modify settings in the case where:<br>
		- You've changed database details<br>
		- Wish to change site details<br>
		- Wish to change other important variables related to Traveller.<br><br>
		
		<form method="post" action="process.php">
			<h2>Authentication</h2>
			<label  for="user_id_auth">User ID<span style="color:red;">*</span></label> 
			<input class="text" name='user_id_auth'  value=''><br />
			<span class="small">(The user ID you used when you first set up the application)</span><br/>
			<label  for="password_auth">Password<span style="color:red;">*</span></label> 
			<input class="text" name='password_auth' type="password" value=''><br />
			<span class="small">(The password you provided when you first set up the application)</span><p>&nbsp;</p>
            
            <input type="hidden" name="action" value="AuthenticateModify" />
			<input id="submit" class="button left" type='submit' value='Submit' />
            <input id="cancel" class="button left" type="button" value="Cancel" />
		</form>
		
       <?php
	}
    
    ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#cancel").click(function(){
                window.location = "index.php";
            });
        });
    </script>
    <?php
}
?>
