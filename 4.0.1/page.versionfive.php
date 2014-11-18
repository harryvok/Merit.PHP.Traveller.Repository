<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="user-scalable=no;width=device-width;initial-scale=0.31; maximum-scale=1.0; minimum-scale=0.25"/>
	<meta http-equiv="X-UA-Compatible" content="IE=EDGE" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="en-au" />
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" /> 
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpbUvAzj57UcnLYCrbqOYR63P-smXorhU&sensor=true"></script>
    <?php
    if(defined("DEV") && DEV == 1){
        ?>
        <link rel="stylesheet" href="css/pc/pc.VersionFive.css" />
        <?php
        if(isset($user)){
            ?>
            <script src="inc\js\libraries\jquery-1.9.1.js"></script>
            <script src="inc\js\pages\js.storyBoard.js"></script>
            <script src="inc\js\libraries\jquery.stickem.js "></script>
            <script src="inc\js\libraries\jquery.validate.min.js "></script>
            <script src="inc\js\libraries\sorttable.js "></script>
            <script src="inc\js\libraries\jquery-ui-1.10.3.custom.js"></script>
            <script src="inc\js\libraries\jquery.dataTables.js"></script>
            <script src="inc\js\libraries\modernizr.js"></script>
            <script src="inc\js\ajax.js"></script>
            <script src="inc\js\global.js"></script>
            <script src="inc\js\pc.js"></script>
            <?php 
        }
    }
    ?>
    
    <?php
    /*if the URL parameter "page" is not set, it means that a user
     * has either just logged in, or been redirected. We need to determine
     * what filter to be displayed.*/
    $defaultpage=$realNameArray[$page];
        if(!isset($_GET['page'])){
            
            //if role security disabled for both actions and requests, display new request
            if($_SESSION['roleSecurity']->allow_action != "Y" && $_SESSION['roleSecurity']->allow_request != "Y"){
                $_GET['page'] ="newRequest";
            }            
            if($defaultpage == "Requests"){
                if($_SESSION['roleSecurity']->allow_request == "Y"){
                    $defaultpage = "requests";
                }else if($_SESSION['roleSecurity']->allow_action == "Y"){
                    $defaultpage = "actions";
                }
            }else if($defaultpage == "Actions"){
                if($_SESSION['roleSecurity']->allow_action == "Y") {
                    $defaultpage = "actions";
                }else if($_SESSION['roleSecurity']->allow_request == "Y"){
                    $defaultpage = "requests";
                }
            }else if($defaultpage =="New Request"){
                $_GET['page'] ="newRequest";
            }
        }
         ?>
    <title><?php echo SITE_TITLE; ?> - Request: <?php echo $GLOBALS['_REQUEST']['id'] ?> Storyboard</title>    
</head>
<body>                    
    <?php
    if(!isset($_GET['page'])){
        include("page.".$defaultpage.".php");
    }else{
        include("page.".$page.".php");
    }
    ?>                    
</body>
</html>



