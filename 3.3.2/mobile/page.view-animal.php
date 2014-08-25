
<?php
$name_id = strip_tags($_GET['id']);
if(isset($_GET['ex'])){ $ex = strip_tags($_GET['ex']); }
?>
<div id="topbar">
	<div id="title" style="padding-left: 50px;">
	View Animal</div>
	<div id="leftnav">
	<a href="index.php?" href="#"><img alt="home" src="images/home.png" /></a><a href="<?php echo $_SESSION['backLink']; ?>">Back</a></div>
</div>
<div id="wrapper">
	<div id="scroller">
		<div id="content">
			 <?php
			 $controller->Invoke("Animal");
			 ?>
		</div>
	</div>
</div>