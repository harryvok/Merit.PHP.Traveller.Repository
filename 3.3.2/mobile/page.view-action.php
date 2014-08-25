<?php
 // If a request ID has been selected,select it from the sr_web_input table
$action_id = strip_tags($_GET['id']);
?>
<div id="topbar">
	<div id="title">View Action</div>
	<div id="leftnav"><a href="index.php?" href="#"><img alt="home" src="images/home.png" /></a><a href="<?php echo $_SESSION['backLink']; ?>">Back</a></div>
</div>
<div id="wrapper">
	<div id="scroller">
		<div id="content">
			<?php
			include("mobile/page.output.php");
				$controller->Invoke("ActionHeader");
				$controller->Invoke("Action");

				$controller->Invoke("ActionUDFs");		

				$controller->Invoke("ActionComments");
				$controller->Invoke("ActionAttachments");

				$controller->Invoke("ActionReassign");

				$controller->Invoke("ActionComplete");
			
			?>
			
		</div>
	</div>
</div>
