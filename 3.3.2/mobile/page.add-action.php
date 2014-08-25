
<?php
session_start();
include("../framework/controller.php");
$controller = new Controller();

$version = "3.0";

if(SETUP == 0){
	header("Location: page.setup.php");	
}

if(isset($_COOKIE['user_id'])){
	$user = $_COOKIE['user_id'];	
}
if(empty($_GET['page'])){ $page = "actions"; } else{ $page = $_GET['page']; }

if(isset($_GET['req_id'])){
  $_SESSION['req_id'] = $_GET['req_id']; 
  $req_id = $_GET['req_id']; 
}
else{
  $req_id = $_SESSION['req_id']; 
}
$GLOBALS['request_id'] = $_GET['req_id'];
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="en-au" />
    <script type="text/javascript" src="../inc/js/libraries/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="../inc/js/ajax.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.png" /> 
    <script type="text/javascript" src="../inc/js/libraries/jquery.validate.min.js"></script>
    <script type="text/javascript">window.name = "traveller";</script>
    <?php
    if($mobile_browser == 2) {
    ?>
       <link href="../css/droid.css" rel="stylesheet" media="screen" type="text/css" />
       <meta name="HandheldFriendly" content="true" />
       <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
       <script type="text/javascript" src="../inc/js/handheld.js"></script>
       <script type="text/javascript" src="../inc/js/libraries/picup.js"></script>
       <script type="text/javascript" src="../inc/js/libraries/datepicker.js"></script>
       
        
    <?php
    }
	elseif($mobile_browser == 1){
		?>
        <link href="../css/handheld.css" rel="stylesheet" media="screen" type="text/css" />
       <meta content="yes" name="apple-mobile-web-app-capable" />
       <link rel="apple-touch-icon" href="../apple-touch-icon.png" />
       <meta name="HandheldFriendly" content="true" />
       <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; minimum-scale=1.0; user-scalable=0;" />
       <link href="../images/startup.png" rel="apple-touch-startup-image" />
       <script type="text/javascript" src="../inc/js/handheld.js"></script>
       <script type="text/javascript" src="../inc/js/libraries/picup.js"></script>
       <script type="text/javascript" src="../inc/js/libraries/datepicker.js"></script>
        <?php
	}
	?>
    <script type="text/javascript">
			  	$(document).ready(function(){
					// validate signup form on keyup and submit
					$("#addaction").validate();
				});
			  </script>
    <title><?php echo SITE_TITLE; ?> - <?php echo mb_ucfirst(str_ireplace("-"," ", $page)); ?></title>
</head>
<body>
    <div id="topbar">
        <div id="title">
        Add Action</div>
        <div id="leftnav">
		<a href="../index.php?page=view-request&id=<?php echo $req_id; ?>">Back</a></div>
        </div>
    </div>
    <div id="wrapper">
        <div id="scroller">
            <div id="content">
            	<?php
				$controller->Invoke("AddAction");
				?>
            	
            </div>
        </div>
    </div>
</body>
</html>