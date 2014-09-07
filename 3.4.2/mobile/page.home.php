
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="en-au" />
    <meta name="format-detection" content="telephone=no">
    <meta name="HandheldFriendly" content="true" />
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" /> 
    <link rel="apple-touch-icon" href="images/mobile/apple-touch-icon.png" />
    <meta name="viewport" content="user-scalable=yes, width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0, user-scalable=0" />
    <link rel="stylesheet" href="css/libraries/jquery-ui.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/libraries/jquery-mobile-min.css" type="text/css" />
    <link rel="stylesheet" href="css/mobile/mobile.Base.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/mobile/mobile.Layout.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/mobile/mobile.Module.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/mobile/mobile.State.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/libraries/jquery-mobile.css" type="text/css" media="screen" />
    <script type="text/javascript" src="inc/js/libraries/jquery-1.9.1.js"></script>
     <script type="text/javascript" src="inc/js/libraries/jquery-ui-1.10.3.custom.js"></script>
     <script type="text/javascript">
	$(document).bind("mobileinit", function () {

	    $.mobile.ajaxEnabled = false;
	});

	
	  </script>
    <script type="text/javascript" src="inc/js/libraries/jquery-mobile.js"></script>
    
	
    <?php
    if(isset($user)){
        ?>
        <script type="text/javascript" src="inc/js/libraries/jquery.validate.min.js"></script>
        <script type="text/javascript" src="inc/js/libraries/jquery.ui.map.min.js"></script>
        <script type="text/javascript" src="inc/js/libraries/fastclick.js"></script>
        <script type="text/javascript" src="inc/js/ajax.js"></script>
        <script type="text/javascript" src="inc/js/global.js"></script>
         <script type="text/javascript" src="inc/js/mobile.js"></script>
       <script type="text/javascript"
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpbUvAzj57UcnLYCrbqOYR63P-smXorhU&sensor=true">
        </script>
        <script type="text/javascript">
            $(function() {
            $('a').click(function() {
                if($(this).attr('href').charAt(0) != "#"){
                    Load();
                    document.location = $(this).attr('href');
                    return false;
                }
              });
          
            //logout code for inactive session
            var refreshIntervalId;
            var inactivitytime = $("#inactivitytime").val() * 60000;
            if (inactivitytime > 0) {
                refreshIntervalId = setInterval(function () { window.location.href = "process.php?action=logout" }, inactivitytime);

                $(document).bind("tap", function () {
                    clearInterval(refreshIntervalId);
                    refreshIntervalId = setInterval(function () { window.location.href = "process.php?action=logout" }, inactivitytime);
                });
            }
            });
        </script>
    <?php
    }
     ?>
    <title><?php echo SITE_TITLE; ?> <?php if(isset($page) && $page != '') echo " - ".mb_ucfirst(str_ireplace("-"," ", $page)); ?></title>
</head>
<body onload="initFastButtons();">
<span id="fastclick">

<a name="topAnc" title="topAnc"></a>
<div id="contentBox">
	<?php
	if(isset($user)){
		if(!isset($_GET['page'])){
			?>
            <div data-role="page"  data-dom-cache="true">
                <div data-role="header" data-position="fixed">
                    <input type="hidden" id="inactivitytime" value="<?php echo INACTIVITY ?>"/>
                	<h1><img alt="list" src="images/favicon.png" width="16" height="16" /> Merit Traveller</h1>
                </div>
                <div data-role="content" id="contentBox">
                	<div class="content-secondary">
                        <ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="f">
				            <li data-role="list-divider">Menu</li> 

                                 <?php if($_SESSION['roleSecurity']->allow_action == "Y") { ?><li><a href="index.php?page=actions">Actions</a></li><?php } ?>
				                 <?php if($_SESSION['roleSecurity']->allow_request == "Y") { ?><li><a href="index.php?page=requests">Requests</a></li><?php } ?>
				                 <?php if($_SESSION['roleSecurity']->maint_new_request == "Y") { ?> <li><a href="index.php?page=newRequest&c=<?php echo $rand; ?>">New Request</a></li><?php } ?>
				                 <?php if($_SESSION['roleSecurity']->allow_search == "Y") { ?><li><a href="index.php?page=search">Search</a></li><?php } ?>
                                 <?php if(defined('CHANGE_PASSWORD') && CHANGE_PASSWORD == 1 && $_SESSION['roleSecurity']->allow_cpwd == "Y"){ ?><li><a href="index.php?page=changePassword">Change Password</a></li><?php } ?>
                             
                 
                             <li><a href="process.php?action=logout">Logout</a></li>
			            </ul>
                        
                    </div>
                    <div class="content-primary">
                        <div style="float:left"><?php include("mobile/page.output.php") ?></div>
                        <h3 style=""><?php echo COUNCIL_NAME; ?></h3>
                        <span style="text-align:center;">Welcome to Merit Traveller. You are logged in as <strong><?php echo $user; ?></strong>. Please choose an option.</span>
                        <div class="iphone">
                	        <div data-role="controlgroup">
                   	 	        <?php if($_SESSION['roleSecurity']->allow_action == "Y") { ?><a href="index.php?page=actions" data-role="button" data-transition="slide" data-icon="bars" data-iconpos="left">Actions</a><?php } ?>
                                <?php if($_SESSION['roleSecurity']->allow_request == "Y") { ?><a href="index.php?page=requests" data-role="button" data-transition="slide" data-icon="bars"  data-iconpos="left">Requests</a><?php } ?>
                                <?php if($_SESSION['roleSecurity']->maint_new_request == "Y") { ?><a   href="index.php?page=newRequest&c=<?php echo $rand; ?>" data-role="button" data-transition="slide" data-icon="edit"  data-iconpos="left">New Request</a><?php } ?>
                                <?php if($_SESSION['roleSecurity']->allow_search == "Y") { ?><a  href="index.php?page=search" data-role="button" data-transition="slide" data-icon="search"  data-iconpos="left">Search</a><?php } ?>
                                 <?php if(defined('CHANGE_PASSWORD') && CHANGE_PASSWORD == 1 && $_SESSION['roleSecurity']->allow_cpwd == "Y"){ ?><li><a  data-role="button" data-iconpos="left" data-icon="gear" href="index.php?page=changePassword" data-transition="slide">Change Password</a><?php }?>
                                <a href="process.php?action=logout" data-role="button"  data-transition="slide"  data-iconpos="left" data-icon="delete">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-role="footer">
                	
                </div>
            </div>
			  <?php
        }
        else{
            if(file_exists("mobile/page.".$page.".php")){
                include("mobile/page.".$page.".php");
                include("mobile/page.navFooter.php");
            }
            else{
                header("Location: index.php?page=error");
            }
        }
    }
    else{
        
		  ?>
          <div data-role="page" data-dom-cache="true">
                <div data-role="header">
                	<h1><img alt="list" src="images/favicon.png" width="16" height="16" /> Merit Traveller</h1>
                </div>
                <div data-role="content" class="content-container-login">
                <div id="login-box">
                <?php
       
        if ($controller->supportedOS == true){
                                ?>
                 <p><center>Please login to access this page.</center></p>
					  <?php
            include("page.output.php");
					  ?>
                      
                	<form class="normal" action="process.php" method="post">
					  <label for="user_id">User ID</label><input class="login" autocapitalize="none" type="text" id="user_id" name="user_id" maxlength='100' />
					  <label for="password">Password</label><input class="login" autocapitalize="none" type="password" id="password" name="password" maxlength='50' />
                      <input type="hidden" name="action" value="Login" />
                      <input type="hidden" value="login" name="account" />
                      <input type="hidden" value="<?php echo $pageURL; ?>" name="url" />
                      <input name="Submit input" type="submit"  value="Login" />
				  </form>
                  <?php
        }
        else{
                                ?>
                                <h4>Unsupported OS</h4>
                                <p>
                                       Sorry, we do not support iOS 4 or under.<br>
                                        Please upgrade your device.<br>
                                        <br>
                                        To upgrade, find your "Settings" app, choose "General", and then click on "Software Update".<br>
                                        Apple will then provide you with the new version.
                                  </p>
                                <?php
        }

                            ?>
                </div>
                </div>
                <div data-role="footer" id="footer">
                    &copy Merit Technology 2013.
                </div>
            </div>
		  <?php
    }
	  ?>
  </div>
  </div>
  <a name="bottomAnc" title="bottomAnc"></a>
    
</body>
</html>

