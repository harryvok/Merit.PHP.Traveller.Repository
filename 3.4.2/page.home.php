<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="user-scalable=yes;width=device-width;initial-scale=0.31; maximum-scale=1.0; minimum-scale=0.25"/>
	<meta http-equiv="X-UA-Compatible" content="IE=EDGE" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="en-au" />
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" /> 
     <script type="text/javascript" src="inc/js/libraries/jquery-1.9.1.js"></script>
     <script type="text/javascript" src="inc/js/libraries/jquery.validate.min.js"></script>
    <?php
    if(isset($user)){
        ?>
        <script type="text/javascript" src="inc/js/libraries/jquery-ui-1.10.3.custom.js"></script>
        <script type="text/javascript" src="inc/js/libraries/jquery.dataTables.js"></script>
        <script type="text/javascript" src="inc/js/libraries/sorttable.js"></script>
        <script type="text/javascript" src="inc/js/ajax.js"></script>
        <script type="text/javascript" src="inc/js/global.js"></script>
        <script type="text/javascript" src="inc/js/pc.js"></script>
        <script type="text/javascript"
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpbUvAzj57UcnLYCrbqOYR63P-smXorhU&sensor=true">
        </script>
        <?php
    }
    ?>
    <link rel="stylesheet" href="css/pc/pc.Base.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/pc/pc.Layout.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/pc/pc.Module.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/pc/pc.State.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/libraries/jquery-ui.css" type="text/css" media="screen" />
    <title><?php echo SITE_TITLE; ?> - <?php echo $realNameArray[$page]; ?></title>
</head>
<body>
    <a name="topAnc" title="topAnc"></a>
	<div id="loadingbar"><img src="images/ajax-loader.gif" /></div>
    <div id="popup"></div>
    <?php if(!isset($user)){ ?>    
        <div id="header-container" align="center">
            <div id="header" align="center">
                <a href="index.php?" class="logo" title="" rel="shadowbox"></a>
                <span class="council-name"><?php  echo COUNCIL_NAME;  ?></span>
            </div>
        </div>
    <?php }
     else{
     ?>
        <div id="header-container-li">
             <div id="header-logged-in">
                        <!--[if IE 8]>
                        <a href="index.php" class="header-nav logo"><img src="images/pc/logo.png" height="30"></a>
                        <![endif]-->
                        <!--[if gt IE 8]>
                        <a href="index.php" class="header-nav"><img src="images/pc/logo.png"></a>
                        <![endif]-->
                        <!--[if !IE]><!-->
                        <a href="index.php" class="header-nav"><img src="images/pc/logo.png"></a>
                        <!--<![endif]-->
                        <?php if(defined('NEW_WINDOW') && NEW_WINDOW == '1'){?>
                             <?php if($_SESSION['roleSecurity']->allow_action == "Y") { ?><a class="header-nav" href="index.php?page=actions" target="_blank">ACTIONS</a><?php } ?>
                             <?php if($_SESSION['roleSecurity']->allow_request == "Y") { ?><a class="header-nav" href="index.php?page=requests" target="_blank">REQUESTS</a><?php } ?>
                             <?php if($_SESSION['roleSecurity']->maint_new_request == "Y") { ?> <a class="header-nav" href="index.php?page=newRequest" target="_blank">NEW REQUEST</a><?php } ?>
                             <?php if($_SESSION['roleSecurity']->allow_search == "Y") { ?><a class="header-nav" href="index.php?page=search" target="_blank">SEARCH</a><?php } ?>
                        <?php }else{ ?>
                             <?php if($_SESSION['roleSecurity']->allow_action == "Y") { ?><a class="header-nav" href="index.php?page=actions">ACTIONS</a><?php } ?>
                             <?php if($_SESSION['roleSecurity']->allow_request == "Y") { ?><a class="header-nav" href="index.php?page=requests">REQUESTS</a><?php } ?>
                             <?php if($_SESSION['roleSecurity']->maint_new_request == "Y") { ?> <a class="header-nav" href="index.php?page=newRequest">NEW REQUEST</a><?php } ?>
                             <?php if($_SESSION['roleSecurity']->allow_search == "Y") { ?><a class="header-nav" href="index.php?page=search">SEARCH</a><?php } ?>
                        <?php } ?>
                         <a class="header-nav" href="process.php?action=logout">LOGOUT</a>
                         <span class="council-name cname-logged-in"><?php  echo COUNCIL_NAME;  ?></span>
                  </div>
                  </div>
                  <div id="pageContainer"><h1 class="page"><?php echo $realNameArray[$page]; ?></h1>
    <?php if($d != null){ ?><h2 class="subPage"><?php echo $realNameArray[$d]; ?></h2><?php } ?></div>
                  <?php
              }?>
        
        <?php
        if(isset($user)){ 
        ?>
         <div id="bottomBar">

         <input type="hidden" id="inactivitytime" value="<?php echo INACTIVITY ?>"/>
    <script type="text/javascript">  
		$(document).ready(function(){
		  $('#searchInput').keydown(function(event){
			  if(event.which == 13){
				  window.location="index.php?page=search&search="+$("#searchInput").val();
				  $("#searchInput").attr("disabled", true);
			  }
			  
		  });

		  var inactivitytime = $("#inactivitytime").val() * 60000;
		    if (inactivitytime > 0) {
		      setInterval(function () { window.location.href = "process.php?action=logout" }, inactivitytime);
		  }
		});
		</script>
        

    	<div style=" width: 50% !important;  min-width: 400px;" class="column r50"><div class="profImage"><img src="images/pc/prof.gif" width="20" height="20"></div><div class="welcome"><h3><b><?php if(isset($_SESSION['given_name'])) echo $_SESSION['given_name']; ?></b></h3></div><div class="bottomButtons"><?php if(defined('CHANGE_PASSWORD') && CHANGE_PASSWORD == 1 && $_SESSION['roleSecurity']->allow_cpwd == "Y"){ ?><a href="index.php?page=changePassword">CHANGE PASSWORD</a><?php } ?><?php if($_SESSION['roleSecurity']->allow_settings == "Y") { ?><a href="index.php?page=modifySettings">MODIFY SETTINGS</a><?php } ?></div></div>
        <div style=" width: 50% !important;  min-width: 400px;" class="column r50"><div class="version"><h3>v<?php if(isset($version)){ echo $version; } ?> &copy; Merit 2013</h3></div><div class="searchBar" style="width:290px"><b style="color:white">
        <?php if($_SESSION['roleSecurity']->allow_search == "Y") { ?>
            Search: </b> <input type="text" placeholder="Search..." id="searchInput" style="width:200px">
        <?php }else{ ?>
            Search: </b> <input type="text" disabled="disabled" placeholder="(Search disabled in role sec.)" id="searchInput" style="width:200px">
        <?php } ?>
        </div>
        </div>
    </div>
    
           <!--[if IE 8]>
                        <div id="content-right" class="ie8">
                        <![endif]-->
                        <!--[if gt IE 8]>
                        <div id="content-right">
                        <![endif]-->
                        <!--[if !IE]><!-->
                        <div id="content-right">
                        <!--<![endif]-->
                <div id="content">
                    <div class="pad-fix">
                    <?php include("page.output.php"); ?>
                    
                    <br/><br/><br/>
                    <div class="float-left">
                        <?php
                        include("page.".$page.".php");
                        ?>
                        
                    </div>
                    <div class="sideNav">
                        <?php
                        if(isset($_GET['page'])){
                            $controller->Sidebar(str_replace("-", "", $page));
                        }
                           ?>
                      </div>
                     </div>
                </div>
            </div>
        <?php
        }
        else{
            ?>
             <div id="content-container-login">
                    
                        <?php
                       if(!preg_match('/(?i)msie [1-7].[0-9]/',$_SERVER['HTTP_USER_AGENT'])) { // if IE<=8 
                        ?>
                            
                            
                            <div id="login-box">
                                <?php include("page.output.php"); ?>
                                    Please login to access this page.
                                    <form class="normal" action="process.php" id="login" method="post">
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
                        
                        <?php
                        }
                        else{
                            ?>
                           <div id="compatibility-box">
                                <center>Sorry, either you are running your browser in <strong>compatibility mode</strong> or you are running Internet Explorer 7. <br>Please upgrade to a modern browser below or turn off compatibility mode.<br><br><br/>
                                <a href="http://www.mozilla.org/en-US/firefox/all/"><img src="images/browsers/firefox-icon.png"> Firefox</a><br>
                                 <a href="http://www.google.com/chrome/"><img src="images/browsers/chrome-icon.png"> Chrome</a><br>
                                  <a href="http://windows.microsoft.com/en-US/internet-explorer/download-ie/"><img src="images/browsers/ie-icon.png"> Internet Explorer</a><br>
                                   <a href="http://support.apple.com/kb/DL1531"><img src="images/browsers/safari-icon.png"> Safari</a><br><br></center>
                                   <h2 style="width:100%; color:white; text-align:center;">How to turn off Compatibility Mode if you are running a new Internet Explorer version</h2>
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
                  <div id="footer">
                  &copy; Merit Technology 2013.
                  </div>
            
        <?php
        
        }
        ?>
       
       
        </div>
    </div>
   <a name="bottomAnc" title="bottomAnc"></a>
</body>
</html>



