
<?php

	$req_id = $_GET['req_id'];
	if(isset($_GET['act_id'])) $act_id = $_GET['act_id'];
	?>
	<?php
	if(strlen($req_id) > 1){
		?>
		<script type="text/javascript">
		function back(){
			top.location = "../index.php?page=view-request&id=<?php echo $req_id; ?>";
		}
		</script>
		<?php
	}
	elseif(strlen($act_id) > 1){
		?>
		<script type="text/javascript">
		function back(){
			top.location = "../index.php?page=view-action&id=<?php echo $act_id; ?>";
		}
		</script>
		<?php
	}
	?>
	
	<html>
	<head>
	
		<link href="../css/handheld.css" rel="stylesheet" media="screen" type="text/css" />
		<meta content="yes" name="apple-mobile-web-app-capable" />
		<link rel="apple-touch-icon" href="../apple-touch-icon.png" />
		<meta name="HandheldFriendly" content="true" />
		<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
		<link href="../images/startup.png" rel="apple-touch-startup-image" />
		<link href="../css/jquery.mobile-1.0b2.min.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="../inc/js/handheld.js"></script>
		 <script type="text/javascript" src="../inc/js/jquery.mobile-1.0b2.min.js"></script>
		<title>Merit Traveller - Attachment Error</title>
	</head>
	<body>
		<div id="topbar">
        <div id="title">
        Attachment Error</div>
        <div id="leftnav">
		<a href="javascript:back();">Back</a></div>
        </div>
    </div>
    <div id="wrapper">
        <div id="scroller">
            <div id="content">
            	<ul class="pageitem">
                	<li class="textbox">
                    	There was an error loading your attachment.
                    </li>
                </ul>
            </div>
        </div>
    </div>
	</body>
	</html>
