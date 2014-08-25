
<?php
session_start();

include("framework/controller.php");
	if(isset($_GET['req_id'])) $req_id = $_GET['req_id'];
	if(isset($_GET['act_id'])) $act_id = $_GET['act_id'];
	$rand = rand(0, 1000);
	?>
	<?php
	if(isset($_GET['act_id']) && strlen($act_id) > 1){
		$link = "index.php?page=view-action&c=".$rand."&id=".$act_id;
	}
	elseif(isset($_GET['req_id']) && strlen($req_id) > 1){
		$link = "index.php?page=view-request&c=".$rand."&id=".$req_id;
	}
	?>
	
	<html>
	<head>
	
		<link href="css/handheld.css" rel="stylesheet" media="screen" type="text/css" />
		<meta content="yes" name="apple-mobile-web-app-capable" />
		<link rel="apple-touch-icon" href="apple-touch-icon.png" />
		<meta name="HandheldFriendly" content="true" />
		<meta content="minimum-scale=1.0, width=device-width, user-scalable=yes" name="viewport" />
		<link href="images/startup.png" rel="apple-touch-startup-image" />
		<link href="css/jquery.mobile-1.0b2.min.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="inc/js/handheld.js"></script>
		 <script type="text/javascript" src="inc/js/jquery.mobile-1.0b2.min.js"></script>
		<title>Merit Traveller - View Attachment</title>
	</head>
	<body>
		<div id="topbar" style="position:fixed;">
			<div id="title">
			View Attachment</div>
			<div id="leftnav">
			<a href="<?php echo $_SESSION['backLink']; ?>">Back</a></div>
			
		</div>
		<div class="attachment">
				<iframe width="100%" height="100%" src="attachments/<?php echo $_GET['name']; ?>"></iframe>
			</div>
	</body>
	</html>
