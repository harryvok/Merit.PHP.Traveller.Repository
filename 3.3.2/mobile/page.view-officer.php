<script type="text/javascript">
	function change(id){
		window.location = "index.php?page=view-action&id="+id;
	}
	function change_re(id){
		window.location = "index.php?page=view-request&id="+id;
	}
</script>
<?php
$name_id = strip_tags($_GET['id']);
if(isset($_GET['ex'])){ $ex = strip_tags($_GET['ex']); }
?>
<div id="topbar">
	<div id="title" style="padding-left: 50px;">
	View Officer</div>
	<div id="leftnav">
	<a href="index.php?" href="#"><img alt="home" src="images/home.png" /></a><a href="<?php echo $_SESSION['backLink']; ?>">Back</a></div>
</div>
<div id="wrapper">
	<div id="scroller">
		<div id="content">
				<?php
				$controller->Invoke("OfficerSummary");
				$controller->Invoke("OfficerActions");
				$controller->Invoke("OfficerRequests");
				?>           
		  </div>
	</div>
</div>