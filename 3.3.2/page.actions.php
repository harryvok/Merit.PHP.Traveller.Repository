<?php
if(isset($_COOKIE['user_id'])){
	?>
	<script type="text/javascript">
	function change(id){
		window.location = "index.php?page=view-action&id="+id;
	}
	</script>
	
	<div style="float:left">
		 <img width="10" height="9" src="images/green-dot.png" /> <span class="small"><b>Open Action</b></span> <img width="10" height="9" src="images/red-dot.png" /> <span class="small"><b>Finalised Action</b></span> <img width="10" height="9" src="images/yellow-dot.png" /> <span class="small"><b>Suspended Action</b></span><br />
		 <div class="float-left">
			<a href="#bottom">Bottom</a>
			<a name="top" title="top"></a>
		</div>
		<br />
		<b>Filter:</b> <?php
		$controller->Dropdown("ActionFilters");
		?>
	</div>
	<?php
	$controller->Invoke("ActionIntray");
	?>
	 <div class="float-left">
	<a href="#top">Top</a>
	<a name="bottom" title="bottom"></a>
	</div>
	<?php
}
else{
	$_SESSION['error_not_logged_in'] = 1;
	header("Location: index.php");	
}
?>
