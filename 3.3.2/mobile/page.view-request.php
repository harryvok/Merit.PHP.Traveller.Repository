
<script type="text/javascript">
	function change(id){
		window.location = "index.php?page=view-action&id="+id;
	}
	function change_add(id){
		window.location = "index.php?page=view-address&id="+id;
	}
	</script>

<?php
if(isset($_GET['id'])){ $GLOBALS['request_id'] = strip_tags($_GET['id']); }
?>
<div id="topbar">
	<div id="title" style="padding-left: 50px;">
	View Request</div>
	<div id="leftnav">
	<a href="index.php?" href="#"><img alt="home" src="images/home.png" /></a><a href="<?php echo $_SESSION['backLink']; ?>">Back</a></div>
	<?php if($_SESSION['roleSecurity']->maint_new_request == "Y") { ?><div id="rightbutton">
	<a style="font-size:30px;padding-left: 2px;padding-right:2px;padding-bottom: 5px;" href="index.php?page=new-request">+</a></div><?php } ?>
</div>
<div id="wrapper">
	<div id="scroller">
		<div id="content">
			<?php
			include("mobile/page.output.php");
			$controller->Invoke("RequestHeader");
			$controller->Invoke("Request");	
			$controller->Invoke("RequestUDFs");
			$controller->Invoke("RequestActions");
			$controller->Invoke("RequestComments");
			$controller->Invoke("RequestAttachments");
			?>
		</div>
	</div>
</div>
