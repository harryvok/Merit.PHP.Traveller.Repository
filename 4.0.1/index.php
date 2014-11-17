<?php
set_time_limit(60*60);
// index.php
// The central part of the website.
// Other pages embed themselves in this page when a user requests it.
//

// Scripted by Jonathan Cleary.

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

$version = "4.1 Beta";

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

if(isset($_SESSION['user_id'])){
    
    if(defined("INACTIVITY") && strlen(INACTIVITY) > 0 && INACTIVITY != "0"){
        
        if (isset($_SESSION['created']) && time() - $_SESSION['created'] > INACTIVITY * 60) {
            // session started more than 30 minutes ago
            $_SESSION['created'] = time();  // update creation time
        }
        
        if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > INACTIVITY * 60)) {
            // last request was more than 30 minutes ago
            session_unset();     // unset $_SESSION variable for the run-time 
            session_destroy();   // destroy session data in storage
            
            $_SESSION['done'] = 1;
            $_SESSION['error'] = 1;
            $_SESSION['error_logged_out'] = 1;
        }
        
        else{
            $_SESSION['last_activity'] = time(); // update last activity time stamp
            $user = $_SESSION['user_id'];	
        }
        
    }
    
    else{
        $user = $_SESSION['user_id'];	
    }
    
}

$page = "";
if(empty($_GET['page'])){
	if( isset($_SESSION['user_id'])){
        if(isset($_SESSION['initial_screen'])){
            if($_SESSION['initial_screen'] == "Action Intray") $page = "actions";
            elseif($_SESSION['initial_screen'] == "Request Intray") $page = "requests";
            elseif($_SESSION['initial_screen'] == "New Request") $page = "newRequest";
        }
        else{
            if($_SESSION['roleSecurity']->allow_action == "Y") $page = "actions";
            elseif($_SESSION['roleSecurity']->allow_request == "Y") $page = "requests";
            elseif($_SESSION['roleSecurity']->maint_new_request == "Y") $page = "newRequest";
            elseif($_SESSION['roleSecurity']->allow_search == "Y") $page = "search";
            else $page = "error";
        }
	}
    else{
        $page = "login";   
    }
}else{
	$page =  strip_tags(addslashes($_GET['page']));
}

if(isset($_GET['d']) && !empty($_GET['d'])){
    $d = $_GET['d'];
}
else{
    if($page == "view-action" || $page == "view-request" || $page == "view-address" || $page == "view-animal" || $page == "view-officer" || $page == "view-name"){
        $d = "summary";
    }
    else{
        $d = null;   
    }
}

// get page URL
$pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";

if (!isset($_SERVER['REQUEST_URI']))
{
    $_SERVER['REQUEST_URI'] = substr($_SERVER['PHP_SELF'],1 );
}

if (isset($_SERVER['QUERY_STRING']) && $_SERVER['REQUEST_URI']) { 
    if(!empty($_SERVER['QUERY_STRING'])){
        if(strpos($_SERVER['REQUEST_URI'], $_SERVER['QUERY_STRING']) !== false){ 
            
        }
        else{
            $_SERVER['REQUEST_URI'].='?'.$_SERVER['QUERY_STRING'];   
        }
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

$rand = rand(0,100000);



include("framework/output.php");

if($mobile_browser > 0){
	include("mobile/page.home.php");
}
else{
    if($page == "view-StoryBoard"){
        include("page.versionfive.php");
    } 
    else if($page == "view-Calender") {
        include("page.versionfive.php");
    } else {
	    include("page.home.php");
    }
}
?>