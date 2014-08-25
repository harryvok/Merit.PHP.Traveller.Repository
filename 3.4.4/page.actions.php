
<?php
if(isset($_SESSION['user_id'])){
	?>
	<script type="text/javascript">
	$(document).ready(function(){
		getIntray("action", "<?php if(isset($_GET['filter'])) echo $_GET['filter']; elseif(isset($_SESSION['act_back_filter'])) echo $_SESSION['act_back_filter']; ?>");
	});
	
	</script>
	
	<div style="float:left">
		 <img width="10" height="9" src="images/dotGreen.png" /> <span class="small"><b>Open Action</b></span> <img width="10" height="9" src="images/dotRed.png" /> <span class="small"><b>Finalised Action</b></span> <img width="10" height="9" src="images/dotYellow.png" /> <span class="small"><b>Suspended Action</b></span><br />
		 
		<br />
		<b>Filter:</b> <?php
		$controller->Dropdown("Filters", "Filters", array("filter" => "A", "filter_type" => "action"));
		?>
	</div>
	<div id="actionIntray">
    
    </div>
	 
	<?php
}
else{
	$_SESSION['error_not_logged_in'] = 1;
	header("Location: index.php");	
}
?>
