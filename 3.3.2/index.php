<?php

session_start();

if(!file_exists("framework/settings.php")){
    
    $string = '<?php
        // settings.php
        // The settings file that controls most of the website

        define("SETUP", 0);
        ?>';
	
    $fp = fopen("framework/settings.php", "w");
    fwrite($fp, $string);
    fclose($fp);
    
}
    
    
include('framework/controller.php');

// Initialise the framework
$controller = new Controller();
$version = "3.3.2";

/* NAVSTATE */

// If it's the homepage reset the navstate
if(!isset($_GET['page'])) unset($_SESSION['navState']);

// If there isn't a navstate, create one
if(!isset($_SESSION['navState'])){ $_SESSION['navState']  = array(); }

else{
	// If a link has requested to go back delete the navstate object
	if(isset($_GET['back']) == 1){
		end($_SESSION['navState']);
		$key = key($_SESSION['navState']);
		unset($_SESSION['navState'][$key]);
	}
	else{
		// if there are any navstate indicators add it to the array
		if(isset($_GET['ref_page']) || isset($_GET['ref']) || isset($_GET['filter'])){
			if(isset($_GET['ref_page'])) $ref_page = $_GET['ref_page']; else $ref_page = "";
			if(isset($_GET['ref'])) $ref = $_GET['ref']; else $ref = "";
			if(isset($_GET['filter'])) $filter = $_GET['filter']; else $filter = "";
			$navStateArr = array("ref_page" => $ref_page, 	"ref" => $ref, 	"filter" => $filter);
			if(count($_SESSION['navState']) > 0){
				end($_SESSION['navState']);
				$key = key($_SESSION['navState']);
				if($navStateArr != $_SESSION['navState'][$key]){
					array_push($_SESSION['navState'], $navStateArr);
				}
			}
			else{
				array_push($_SESSION['navState'], $navStateArr);
			}
		}
	}
	
	// If there are more than one navState objects generate a back link for the page button
	if(count($_SESSION['navState']) > 0){
		
		end($_SESSION['navState']);
		$key = key($_SESSION['navState']);
		$navStateArr = $_SESSION['navState'][$key];
		$ref_page = $navStateArr['ref_page'];
		$ref = $navStateArr['ref'];
		$filter = $navStateArr['filter'];
		
		$_SESSION['backLink'] = "index.php?page=".$ref_page."&id=".$ref."&filter=".$filter."&back=1";
	}
}

/* --- */

if(defined("SETUP") && SETUP == 0){
	header("Location: page.setup.php");	
}

if(isset($_COOKIE['user_id'])){
	$user = $_COOKIE['user_id'];	
}

if(empty($_GET['page'])){
	if( isset($_COOKIE['user_id'])){
		if($_SESSION['roleSecurity']->allow_action == "Y") $page = "actions";
		elseif($_SESSION['roleSecurity']->allow_request == "Y") $page = "requests";
		elseif($_SESSION['roleSecurity']->maint_new_request == "Y") $page = "new-request";
		elseif($_SESSION['roleSecurity']->allow_search == "Y") $page = "search";
		else $page = "error";
	}
}else{
    $page =  strip_tags(addslashes($_GET['page']));
}
		

// get page URL
$pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";

if (!isset($_SERVER['REQUEST_URI']))
{
    $_SERVER['REQUEST_URI'] = substr($_SERVER['PHP_SELF'],1 );
}

if (isset($_SERVER['QUERY_STRING']) && $_SERVER['REQUEST_URI']) { 
    if(strpos($_SERVER['REQUEST_URI'], $_SERVER['QUERY_STRING']) !== false){ 
        
    }
    else{
        $_SERVER['REQUEST_URI'].='?'.$_SERVER['QUERY_STRING'];   
    }
}

if ($_SERVER["SERVER_PORT"] != "80")
{
    $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
} 
else 
{
    $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
}




include("framework/output.php");



// index.php
// The central part of the website.
// Other pages embed themselves in this page when a user requests it.

// Scripted by Jonathan Cleary.

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="en-au" />
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" /> 
   <script type="text/javascript" src="inc/js/libraries/jquery-1.9.1.js"></script>
     <script type="text/javascript" src="inc/js/libraries/modernizr.js"></script>
     <script type="text/javascript" src="inc/js/libraries/jquery-ui-1.10.3.custom.js"></script>
    <script type="text/javascript" src="inc/js/ajax.js"></script>
    <script type="text/javascript" src="inc/js/global.js"></script>
    <script type="text/javascript" src="inc/js/libraries/jquery.validate.min.js"></script>
     <script type="text/javascript" src="inc/js/libraries/jquery.dataTables.js"></script>
     <link rel="stylesheet" href="css/jquery-ui.css" type="text/css" media="screen" />
    <?php
	if($mobile_browser > 0){
		?>
        <script type="text/javascript" src="inc/js/libraries/picup.js"></script>
        <script type="text/javascript" src="inc/js/libraries/datepicker.js"></script>
        <script type="text/javascript" src="inc/js/libraries/fastclick.js"></script>
        <meta name="HandheldFriendly" content="true" />
        <link rel="stylesheet" href="css/add2home.css">
        <meta content="yes" name="apple-mobile-web-app-capable" />
        <script type="text/javascript">
		var addToHomeConfig = {
			expire: 10,
			returningVisitor: true,
			message:'You can add Traveller to the home screen on your %device. Click `%icon` below.'
		};
		</script>
		<script type="application/javascript" src="inc/js/libraries/add2home.js"></script>
        <script type="application/javascript" src="inc/js/libraries/slideinmenu.js"></script>
        <script type="application/javascript" src="inc/js/libraries/iscroll.js"></script>
        <link rel="stylesheet"  href="css/handheld.css" />
        <meta name="format-detection" content="telephone=no">
        <?php
	}
    if($mobile_browser == 2) {
    	?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <script type="text/javascript" src="inc/js/handheld.js"></script>
        
    	<?php
    }
	
	if($mobile_browser == 1){
		?>
        
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0" />
        <link href="images/startup.png" rel="apple-touch-startup-image" />
        <script type="text/javascript" src="inc/js/handheld.js"></script>
        <?php
	}
	
    if($mobile_browser == 0) {
		?>
		<link rel="stylesheet" href="css/base.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="css/jquery-ui.css" type="text/css" media="screen" />

		<script type="text/javascript" src="inc/js/base.js"></script>
		<script type="text/javascript" src="inc/js/libraries/sorttable2.js"></script>
		<script type="text/javascript" src="inc/js/libraries/datepicker.js"></script>
		<?php
    }    
    ?>
   
    <script type="text/javascript">window.name = "traveller";</script>
    <title><?php echo SITE_TITLE; ?> <?php if(isset($page) && $page != '') echo " - ".mb_ucfirst(str_ireplace("-"," ", $page)); ?></title>
</head>
<body  onload="initFastButtons();">
	
	<div id="popup"></div>
	<?php
    if ($mobile_browser > 0) {
        ?>
        <span id="fastclick">
        <div id="loadingbar"></div>
        
        <?php
		if(isset($user)){
			?>
            <div id="slidedownmenu">
                 <ul class="pageitem">
                    <?php if($_SESSION['roleSecurity']->allow_action == "Y") { ?><li class="menu small-menu"><a href="index.php?page=actions">
                    <img alt="Actions" src="images/tb_reqintray.gif" /><span class="name">Actions</span><span class="arrow"></span></a></li><?php } ?>
                    <?php if($_SESSION['roleSecurity']->allow_request == "Y") { ?><li class="menu small-menu"><a href="index.php?page=requests">
                    <img alt="Requests" src="images/favicon.png" width='16' height='16' /><span class="name">Requests</span><span class="arrow"></span></a></li><?php } ?>
                    <?php if($_SESSION['roleSecurity']->maint_new_request == "Y") { ?><li class="menu small-menu"><a href="index.php?page=new-request">
                    <img alt="New Request" src="images/tb_new.gif" /><span class="name">New Request</span><span class="arrow"></span></a></li><?php } ?>
                    <?php if($_SESSION['roleSecurity']->allow_search == "Y") { ?><li class="menu small-menu"><a href="index.php?page=search&clear=1">
                     <img alt="Search" src="images/search.png" width='16' height='16' /><span class="name">Search</span><span class="arrow"></span></a></li><?php } ?>
                     <?php if(defined('CHANGE_PASSWORD') && CHANGE_PASSWORD == 1 && $_SESSION['roleSecurity']->allow_cpwd == "Y"){ ?><li class="menu small-menu"><a href="index.php?page=change-password">
                     <img alt="Search" src="images/lock-icon.png" width='16' height='22' /><span class="name">Change Password</span><span class="arrow"></span></a></li><?php } ?>
                    <li class="menu small-menu"><a href="process.logout.php">
                    <img alt="Logout" src="images/exit.png" width='16' height='16' /><span class="name">Logout</span><span class="arrow"></span></a></li>
                </ul>
            <div class="handle">
            	Menu
            </div>
            <script type="text/javascript">
				menu = new slideInMenu('slidedownmenu', false);
			</script>
            </div>
            <div id="mobile-wrapper">
            
            <?php
			if(!isset($_GET['page'])){
				?>
            
            
                         <div id="topbar">
                            <div id="title">
                                <img alt="list" src="images/favicon.png" width="16" height="16" /> Merit Traveller</div>
                        </div>
                       <div id="wrapper">
                            <div id="scroller">
                                <div id="content">
                                    <?php include("mobile/page.output.php"); ?>
                                    <h3 class="graytitle" style="text-align:center; font-size:20px; padding: 0 10px;"><?php echo COUNCIL_NAME; ?></h3>
                                    <span class="graytitle">Menu</span>
                                    <ul class="pageitem">
                                        <li class="textbox"><span class="header">Welcome</span><p>
                                        You are logged in as <b><?php echo $user; ?></b>. Choose an option below to get started!</p>
                                        </li>
                                        <?php if($_SESSION['roleSecurity']->allow_action == "Y") { ?><li class="menu"><a href="index.php?page=actions">
                                        <img alt="Actions" src="images/tb_reqintray.gif" /><span class="name">Actions</span><span class="arrow"></span></a></li><?php } ?>
                                        <?php if($_SESSION['roleSecurity']->allow_request == "Y") { ?><li class="menu"><a href="index.php?page=requests">
                                        <img alt="Requests" src="images/favicon.png" width='16' height='16' /><span class="name">Requests</span><span class="arrow"></span></a></li><?php } ?>
                                        <?php if($_SESSION['roleSecurity']->maint_new_request == "Y") { ?><li class="menu"><a href="index.php?page=new-request">
                                        <img alt="New Request" src="images/tb_new.gif" /><span class="name">New Request</span><span class="arrow"></span></a></li><?php } ?>
                                        <?php if($_SESSION['roleSecurity']->allow_search == "Y") { ?><li class="menu"><a href="index.php?page=search&clear=1">
                                         <img alt="Search" src="images/search.png" width='16' height='16' /><span class="name">Search</span><span class="arrow"></span></a></li><?php } ?>
                                         <?php if(defined('CHANGE_PASSWORD') && CHANGE_PASSWORD == 1 && $_SESSION['roleSecurity']->allow_cpwd == "Y"){ ?><li class="menu"><a href="index.php?page=change-password">
                                         <img alt="Search" src="images/lock-icon.png" width='16' height='22' /><span class="name">Change Password</span><span class="arrow"></span></a></li><?php } ?>
                                        <li class="menu"><a href="process.logout.php">
                                        <img alt="Logout" src="images/exit.png" width='16' height='16' /><span class="name">Logout</span><span class="arrow"></span></a></li>
                                    </ul>
                               </div>
                            </div>
                        </div>
                        <?php
                    }
                    else{
                        if(file_exists("mobile/page.".$page.".php")){
							
                            include("mobile/page.".$page.".php");
							
                        }
                        else{
                            header("Location: index.php?page=error");
                        }
                    }
                }
                else{
                    ?>
                    <div id="topbar">
                            <div id="title"><img alt="list" src="images/favicon.png" width="16" height="16" style="padding-top: 5px;" /> Merit Traveller</div>
                        </div>
                        <div id="content">
                        <?php
                        
                            
                            if ($controller->supportedOS == true){
                                ?>
                                <form class="normal" action="process.login.php" id="login" method="post">
                                <ul class="pageitem">
                                    <li class="textbox">
                                        <center>Please login to access this page.</center>
                                    </li>
                                </ul>
                                <?php
                                include("page.output.php");
                                ?>
                                <ul class="pageitem">
                                    <li class="smallfield"><span class="name">User ID</span><input class="login required" type="text" id="user_id" name="user_id" maxlength='100' />
                                    </li>
                                    <li class="smallfield"><span class="name">Password</span><input class="login required" type="password" id="password" name="password" maxlength='50' />
                                    </li>
                                </ul>
                                <ul class="pageitem">
                                    <li class="button">
                                        <input type="hidden" name="action" value="Login" />
                                        <input type="hidden" value="login" name="account" />
                                        <input type="hidden" value="<?php echo $pageURL; ?>" name="url" />
                                        <input name="Submit input" type="submit"  value="Login" />
                                    </li>
                                </ul>
                            </form>
                         <script type="text/javascript">
									$("#login").validate();
									</script>
                                    <?php
                            }
                            else{
                                ?>
                                <span class="graytitle">Unsupported OS</span>
                                <ul class="pageitem">
                                    <li class="textbox">
                                        Sorry, we do not support iOS 4 or under.<br>
                                        Please upgrade your device.<br>
                                        <br>
                                        To upgrade, find your "Settings" app, choose "General", and then click on "Software Update".<br>
                                        Apple will then provide you with the new version.
                                    </li>
                                </ul>
                                <?php
                            }

                            ?> 
                            
                        </div>
                    <?php
                }
                ?>
                
                <div id="footer-container">
                    <div id="footer">
                        <div id="pad-fix"></div>
                        Version <?php if(isset($version)){ echo $version; } ?><br>
                        Copyright &copy; Merit Technology Pty Ltd. All Rights Reserved.
                    </div>
                </div>
            </div>
            </span>
		<?php
		
    }
    else {
        ?>
        <div id="loadingbar"><img src="images/ajax-loader.gif" /></div>
        <div id="fixed-position" align="center">
            <div id="header-container" align="center">
                <div id="header" align="center">
                    <a href="index.php?" class="logo" title="" rel="shadowbox"></a>
                   <span class="council-name"><?php  echo COUNCIL_NAME;  ?></span>
                </div>
            </div>
            <?php
			if(isset($user)){ 
			?>
			   <div id="content-sidebar">
               	   <h3>Welcome, <b><?php if(isset($_COOKIE['given_name'])) echo $_COOKIE['given_name']; ?></b></h3>
                   <?php if(defined('CHANGE_PASSWORD') && CHANGE_PASSWORD == 1 && $_SESSION['roleSecurity']->allow_cpwd == "Y"){ ?><h3 style="margin-top:0;padding-top:0;"><a href="index.php?page=change-password">Change Password</a></h3><?php } ?>
                   <hr>
                   
				   <?php if($_SESSION['roleSecurity']->allow_action == "Y") { ?><div class="button-sidebar" onclick="<?php if(defined("NEW_WINDOW") && NEW_WINDOW == 1 || !defined("NEW_WINDOW")){ ?>window.open('index.php?page=actions')<?php }else{ ?>self.location.href='index.php?page=actions'<?php }?>"><img src='images/new/button-actions.png' onmouseover="this.src='images/new/button-actions-hover.png'" onmouseout="this.src='images/new/button-actions.png'" width="241" height="25" alt="Actions" /></div><?php } ?>
                   <?php if($_SESSION['roleSecurity']->allow_request == "Y") { ?><div class="button-sidebar" onclick="<?php if(defined("NEW_WINDOW") && NEW_WINDOW == 1 || !defined("NEW_WINDOW")){ ?>window.open('index.php?page=requests')<?php }else{ ?>self.location.href='index.php?page=requests'<?php }?>"><img src='images/new/button-requests.png' onmouseover="this.src='images/new/button-requests-hover.png'" onmouseout="this.src='images/new/button-requests.png'" width="241" height="25" alt="Requests" /></div><?php } ?>
                   <?php if($_SESSION['roleSecurity']->maint_new_request == "Y") { ?><div class="button-sidebar" onclick="<?php if(defined("NEW_WINDOW") && NEW_WINDOW == 1 || !defined("NEW_WINDOW")){ ?>window.open('index.php?page=new-request')<?php }else{ ?>self.location.href='index.php?page=new-request'<?php }?>"><img src='images/new/button-new-request.png' onmouseover="this.src='images/new/button-new-request-hover.png'" onmouseout="this.src='images/new/button-new-request.png'" width="241" height="25" alt="New Request" /></div><?php } ?>
                   <?php if($_SESSION['roleSecurity']->allow_search == "Y") { ?><div class="button-sidebar" onclick="<?php if(defined("NEW_WINDOW") && NEW_WINDOW == 1 || !defined("NEW_WINDOW")){ ?>window.open('index.php?page=search&clear=1')<?php }else{ ?>self.location.href='index.php?page=search&clear=1'<?php }?>"><img src='images/new/button-search.png' onmouseover="this.src='images/new/button-search-hover.png'" onmouseout="this.src='images/new/button-search.png'" width="241" height="25" alt="Search" /></div><?php } ?>
                   <div class="button-sidebar" onclick="self.location.href='process.logout.php'"><img src='images/new/button-logout.png' onmouseover="this.src='images/new/button-logout-hover.png'" onmouseout="this.src='images/new/button-logout.png'" width="241" height="25" alt="Logout" /></div>
                   
                   <?php
				   if(isset($page)){
				   		$controller->Sidebar($page);
				   }
				   ?>
			   </div>
               
               <div id="content-right">
                    <div id="content">
                        <div class="pad-fix">
                         <a href="index.php?"><strong>Home</strong></a> 
						 <?php 
						 
						if(isset($_GET['d']) && $_GET['d'] != "" && $_GET['d'] != "summary"){ 
							if($page == "view-action"){
								echo " > <a href='index.php?page=actions'>Actions</a>";	
							}
							if($page == "view-request"){
								echo " > <a href='index.php?page=requests'>Requests</a>";	
							}
							echo " > <a href='index.php?page=".$page."&id=".$_GET['id']."'>".mb_ucfirst(str_ireplace("-"," ", $page))."</a>"; 
						} 
						else{ 
							if($page == "view-action"){
								echo " > <a href='index.php?page=actions'>Actions</a>";	
							}
							if($page == "view-request"){
								echo " > <a href='index.php?page=requests'>Requests</a>";	
							}
							echo " > ".mb_ucfirst(str_ireplace("-"," ", $page));
						} 
						
						if(isset($_GET['d']) && $_GET['d'] != "" && $_GET['d'] != "summary"){ 
							echo " > ".mb_ucfirst($realNameArray[$_GET['d']]); 
						} 
						
						?>
						<h1><?php echo mb_ucfirst(str_ireplace("-"," ", $page)); ?></h1>
						<?php include("page.output.php"); ?>
						<div class="float-left">
							<?php
							include("page.".$page.".php");
							?>
						</div>
                          
                           <div id="push"></div>
                            <div id="footer-container">
                                <div id="footer">
                                    <div id="pad-fix"></div>
                                    Version <?php if(isset($version)){ echo $version; } ?> | <a href="index.php?page=modify-settings">Modify Settings</a><br />
                                    Copyright &copy; Merit Technology Pty Ltd. All Rights Reserved.
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
			<?php
			}
			else{
				?>
                 <div id="content-container-login">
                    <div id="content">
                        <div class="pad-fix">
                            <div id="login-container">
                            <?php
							if(!preg_match('/(?i)msie [1-7].[0-9]/',$_SERVER['HTTP_USER_AGENT'])) { // if IE<=8 
							?>
                                <h1>Login</h1>
                                <?php include("page.output.php"); ?>
                                <div id="login-box">
    
                                        <form class="normal" action="process.login.php" id="login" method="post">
                                            <label class="titleLogin" for="user_id">User ID</label>
                                            
                                            <input class="login required" type="text" id="user_id" name="user_id" maxlength='100' />
                                            <label class="titleLogin" for="password">Password</label>
                                            <input class="login required" type="password" id="password"name="password" maxlength='50' />
                                            <p>&nbsp;</p>
                                            <input id="login"  type="submit"  value="Login" />
                                            <input type="hidden" value="<?php echo $pageURL; ?>" name="url" />
                                            <input type="hidden" name="action" value="Login" />
                                            <input type="hidden" value="login" name="account" />
                                        </form>
                                         <script type="text/javascript">
									$("#login").validate();
									</script>
                                </div>
                                
                                <div id="login-info">
                                    <img width="430" height="216" src="images/new/login-greeting.png" alt="Optimised for Smartphones, Tablets and PCs. Convenient, accessible and efficient." />
                                </div>
                            
                            <?php
							}
							else{
								?>
								<div style="width:800px;margin:auto;">
                                <center>Sorry, either you are running your browser in <strong>compatibility mode</strong> or you are running Internet Explorer 7. <br>Please upgrade to a modern browser below or turn off compatibility mode.<br><br>
                                <a href="http://www.mozilla.org/en-US/firefox/all/"><img src="images/browsers/firefox-icon.png"> Firefox</a><br>
                                 <a href="http://www.google.com/chrome/"><img src="images/browsers/chrome-icon.png"> Chrome</a><br>
                                  <a href="http://windows.microsoft.com/en-US/internet-explorer/download-ie/"><img src="images/browsers/ie-icon.png"> Internet Explorer</a><br>
                                   <a href="http://support.apple.com/kb/DL1531"><img src="images/browsers/safari-icon.png"> Safari</a><br><br></center>
                                   <h2 style="width:100%;">How to turn off Compatibility Mode if you are running a new Internet Explorer version</h2>
                                   <strong>Note:</strong> A system administrator can do this procedure organisation-wide.<br><br>
                                   <ol>
                                   <li>1. Click Alt on your keyboard.</li>
                                   <li>2. Select the "Tools" menu, and then choose "Compatibility View Settings" from the menu that appears.</li>
                                   <li>3. Uncheck the setting "Display intranet sites in compatibility mode" and close.</li>
                                   <li>4. Ensure that Traveller's URL or part of it's URL is not in the list of compatibility view websites.</li>
                                   </ol>
                                   </div>
                                <?php
							}
							?>
                        </div>
                        
                        

                        </div>
                    </div>
                </div>
                 <div id="push"></div>
                <div id="footer-container">
                    <div id="footer">
                        <div id="pad-fix"></div>
                        Version <?php if(isset($version)){ echo $version; } ?> | <a href="index.php?page=modify-settings">Modify Settings</a><br />
                        Copyright &copy; Merit Technology Pty Ltd. All Rights Reserved.
                    </div>
                </div>
            <?php
			
			}
			?>
           
           
        </div>
    </div>
    <?php
    }  
	
    ?>
</body>
</html>

