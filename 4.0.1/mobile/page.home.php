<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-Language" content="en-au" />
        <meta name="format-detection" content="telephone=no">
        <meta name="HandheldFriendly" content="true" />
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
        <link rel="apple-touch-icon" href="images/mobile/apple-touch-icon.png" />
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, target-densityDpi=device-dpi" />
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpbUvAzj57UcnLYCrbqOYR63P-smXorhU&sensor=true"></script>
        <?php
        if(defined("DEV") && DEV == 1){ ?>
            <link rel="stylesheet" href="css/libraries/jquery-ui.css" />
            <link rel="stylesheet" href="css/libraries/jquery-mobile-min.css" />
            <link rel="stylesheet" href="css/mobile/mobile.Base.css" />
            <link rel="stylesheet" href="css/mobile/mobile.Layout.css" />
            <link rel="stylesheet" href="css/mobile/mobile.Module.css" />
            <link rel="stylesheet" href="css/mobile/mobile.State.css" />
            <link rel="stylesheet" href="css/libraries/jquery-mobile.css" />
            <?php
            if(isset($user)){ ?>
                <script src="inc\js\libraries\jquery-1.9.1.js"></script>
                <script src="inc\js\libraries\jquery-mobile.js"></script>
                <script src="inc\js\libraries\jquery-ui-1.10.3.custom.js"></script>    
                <script src="inc\js\libraries\jquery.validate.min.js "></script>
                <script src="inc\js\libraries\jquery.ui.map.min.js "></script>
                <script src="inc\js\libraries\fastclick.js"></script>
                <script src="inc\js\ajax.js"></script>
                <script src="inc\js\global.js"></script>
                <script src="inc\js\mobile.js"></script>
                <script type="text/javascript">
                    $(function () {
                        $('a').click(function () {
                            if (typeof $(this).attr('href') != 'undefined' && $(this).attr('href').charAt(0) != "#") {
                                // Load();
                                document.location = $(this).attr('href');
                                return false;
                            }
                        });

                        //logout code for inactive session
                        var refreshIntervalId;
                        var inactivitytime = $("#inactivitytime").val() * 60000;
                        if (inactivitytime > 0) {
                            refreshIntervalId = setInterval(function () { window.location.href = "process.php?action=logout&timeout=y" }, inactivitytime);

                            $(document).bind("tap", function () {
                                clearInterval(refreshIntervalId);
                                refreshIntervalId = setInterval(function () { window.location.href = "process.php?action=logout&timeout=y" }, inactivitytime);
                            });
                        }
                    });
                </script><?php
            }
            else{ ?>
                <script src="inc\js\libraries\jquery-1.9.1.js"></script>
                <script src="inc\js\libraries\jquery-mobile.js"></script>
                <script src="inc\js\libraries\jquery-ui-1.10.3.custom.js"></script> <?php
            }
        }
        else{  ?>
            <link rel="stylesheet" href="css/mobile/mobileCompiled.css" />
            <script src="inc\js\mobileCompiled.js"></script>        
            <script type="text/javascript">
                $(function () {
                    $('a').click(function () {
                        if (typeof $(this).attr('href') != 'undefined' && $(this).attr('href').charAt(0) != "#") {
                            Load();
                            document.location = $(this).attr('href');
                            return false;
                        }
                    });

                });
            </script><?php
        } ?>    
        <title><?php echo SITE_TITLE; ?> <?php if(isset($page) && $page != '') echo " - ".mb_ucfirst(str_ireplace("-"," ", $page)); ?></title>
    </head>
    <body onload="initFastButtons();">    
        <span id="fastclick">
            <input type="hidden" id="inactivitytime" value="<?php echo INACTIVITY ?>"/>
            <a name="topAnc" title="topAnc"></a>
            <div id="contentBox" > <?php
                if(isset($user)){     
                    if(!isset($_GET['page'])){ ?>
                        <div data-role="page" data-dom-cache="true">
                            <div data-role="header" data-tap-toggle="false" data-position="fixed">
                                <h1><img alt="list" src="images/favicon.png" width="16" height="16" />Merit Traveller</h1>
                            </div>
                            <div data-role="content" id="contentBox">
                                <div class="content-secondary">
                                    <ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="f">
                                        <li data-role="list-divider">Menu</li> <?php 
                                        if($_SESSION['roleSecurity']->allow_action == "Y") { ?>
                                            <li><a href="index.php?page=actions">Actions</a></li><?php 
                                        } 
                                        if($_SESSION['roleSecurity']->allow_request == "Y") { ?>
                                            <li><a href="index.php?page=requests">Requests</a></li><?php 
                                        } 
                                        if($_SESSION['roleSecurity']->maint_new_request == "Y") { ?>
                                            <li><a href="index.php?page=newRequest&c=<?php echo $rand; ?>">New Request</a></li><?php 
                                        } 
                                        if($_SESSION['roleSecurity']->allow_search == "Y") { ?>
                                            <li><a href="index.php?page=search">Search</a></li><?php 
                                        } 
                                        if(defined('CHANGE_PASSWORD') && CHANGE_PASSWORD == 1 && $_SESSION['roleSecurity']->allow_cpwd == "Y"){ ?>
                                            <li><a href="index.php?page=changePassword">Change Password</a></li><?php 
                                        } ?>
                                        <li><a href="process.php?action=logout">Logout</a></li>
                                    </ul>
                                </div>
                                <div class="content-primary">                       
                                    <div style="float: left"><?php include("mobile/page.output.php") ?></div>
                                    <h3 style=""><?php echo COUNCIL_NAME; ?></h3>
                                    <span style="text-align: center;">Welcome to Merit Traveller. You are logged in as <strong><?php echo $user; ?></strong>. Please choose an option.</span>
                                    <div class="iphone">
                                        <div data-role="controlgroup"> <?php 
                                            if($_SESSION['roleSecurity']->allow_action == "Y") { ?>
                                                <a href="index.php?page=actions" data-role="button" data-transition="slide" data-icon="bars" data-iconpos="left">Actions</a><?php 
                                            } 
                                            if($_SESSION['roleSecurity']->allow_request == "Y") { ?>
                                                <a href="index.php?page=requests" data-role="button" data-transition="slide" data-icon="bars" data-iconpos="left">Requests</a><?php 
                                            } 
                                            if($_SESSION['roleSecurity']->maint_new_request == "Y") { ?>
                                                <a href="index.php?page=newRequest&c=<?php echo $rand; ?>" data-role="button" data-transition="slide" data-icon="edit"  data-iconpos="left">New Request</a><?php 
                                            } 
                                            if($_SESSION['roleSecurity']->allow_search == "Y") { ?>
                                                <a href="index.php?page=search" data-role="button" data-transition="slide" data-icon="search" data-iconpos="left">Search</a><?php 
                                            } 
                                            if(defined('CHANGE_PASSWORD') && CHANGE_PASSWORD == 1 && $_SESSION['roleSecurity']->allow_cpwd == "Y"){ ?>
                                                <li><a data-role="button" data-iconpos="left" data-icon="modify" href="index.php?page=changePassword" data-transition="slide">Change Password</a><?php 
                                            } ?>
                                            <a href="process.php?action=logout" data-role="button" data-transition="slide" data-iconpos="left" data-icon="delete">Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-role="footer"></div>
                            <div data-role="popup" id="popup" class="ui-corner-all" data-rel="back"></div>
                            <input type="hidden" id="edms_login" name="edms_login" value="<?php echo $_SESSION["edms_login"]; ?>" />          
                            <script>
                                if ($("#edms_login").val() == -1) {
                                    $.ajax({
                                        url: 'inc/ajax/ajax.inforExpertLoginUpdate.php',
                                        type: 'POST',
                                        success: function (data) {
                                            Unload();
                                            //$("#popup").popup("open");
                                            //$("#default").page('destroy').page();
                                            $("#popup").popup();
                                            $('#popup').html(data);
                                            $("#popup").popup("open");
                                            $("#default").page('destroy');
                                            $("#default").page();
                                        },
                                    });
                                }
                            </script>
                            <style>
                                #popup-popup {
                                    max-width: 442px;
                                    top: 115.5px !important;
                                    /* left: 15px; */
                                    width: 85% !important;
                                    margin: 7.5% !important;
                                    left:0 !important;
                                }
                            </style>
                        </div> <?php
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
                else{ ?>
                    <div data-role="page" data-dom-cache="true">
                        <div data-role="header" data-tap-toggle="false">
                            <h1><img alt="list" src="images/favicon.png" width="16" height="16" />Merit Traveller</h1>
                        </div>
                        <div data-role="content" class="content-container-login">
                            <div id="login-box"> <?php
                                if ($controller->supportedOS == true){ ?>
                                    <p><center>Please login to access this page.</center></p> <?php
                                    if(isset($_GET["timeout"]) && $_GET["timeout"]== "y"){
                                        $_SESSION['done'] = 1;
                                        $_SESSION['error'] = 1;
                                        $_SESSION['error_logged_out'] = 1;
                                    }
                                    include("page.output.php"); ?>

                                    <form class="normal" action="process.php" method="post" data-ajax="false">
                                        <label for="user_id">User ID</label><input class="login" autocapitalize="none" type="text" id="user_id" name="user_id" maxlength='100' />
                                        <label for="password">Password</label><input class="login" autocapitalize="none" type="password" id="password" name="password" maxlength='50' />
                                        <input type="hidden" name="action" value="Login" />
                                        <input type="hidden" value="login" name="account" />
                                        <input type="hidden" value="<?php echo $pageURL; ?>" name="url" />
                                        <input name="Submit input" type="submit" value="Login" />
                                    </form> <?php
                                }
                                else{ ?>
                                    <h4>Unsupported OS</h4>
                                    <p>
                                        Sorry, we do not support iOS 4 or under.<br>
                                        Please upgrade your device.<br>
                                        <br>
                                        To upgrade, find your "Settings" app, choose "General", and then click on "Software Update".<br>
                                        Apple will then provide you with the new version.
                                    </p> <?php
                                } ?>
                            </div>
                        </div>
                        <div data-role="footer" id="footer"> &copy Merit Technology.</div>
                    </div> <?php
                } ?>
            </div>
        </div>
    <a name="bottomAnc" title="bottomAnc"></a>
    </body>
</html>

