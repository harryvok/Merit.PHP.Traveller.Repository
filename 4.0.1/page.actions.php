
<?php
if(isset($_SESSION['user_id'])){
            $timeset = REFRESHTABLE;
            $timeset = $timeset * 60000;            
            if ($timeset < 1)
                $timeset = 999999999;
            echo '<script type="text/javascript"> var settime = '.json_encode($timeset).'; </script>';
	?>

	<script type="text/javascript">
	$(document).ready(function(){
		getIntray("action", "<?php if(isset($_GET['filter'])) echo $_GET['filter']; elseif(isset($_SESSION['act_back_filter'])) echo $_SESSION['act_back_filter']; ?>");
	});

	        setInterval(function () {
	            getIntray("action", "<?php if(isset($_GET['filter'])) echo $_GET['filter']; elseif(isset($_SESSION['act_back_filter'])) echo $_SESSION['act_back_filter']; ?>");
	        }, $timeset);
	</script>

    



	
	<div style="float:left">
		 <img width="10" height="9" src="images/dotGreen.png" /> <span class="small"><b>Open Action</b></span> <img width="10" height="9" src="images/dotRed.png" /> <span class="small"><b>Finalised Action</b></span> <img width="10" height="9" src="images/dotYellow.png" /> <span class="small"><b>Suspended Action</b></span><br />
		 <b>
		 </b>
         
 
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
