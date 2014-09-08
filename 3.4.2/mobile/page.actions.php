<?php 

$timeset = REFRESHTABLE;
$timeset = $timeset * 60000;            
if ($timeset < 1)
    $timeset = 999999999;
echo '<script type="text/javascript"> var settime = '.json_encode($timeset).'; </script>';
?>
<?php
if(isset($_SESSION['user_id'])){
	?>
    <script type="text/javascript">
	$(document).on('pageinit', function(){
	    getIntray("action", "<?php if(isset($_GET['filter'])) echo $_GET['filter']; elseif(isset($_SESSION['act_back_filter'])) echo $_SESSION['act_back_filter']; ?>");

	    setInterval(function () {
	        var filtercode = $("#filter").val();
	        getIntray("action", filtercode);
	    }, settime);
	});
	
	</script>
	
	<div data-role="page" id="default">
      <div data-role="header" data-position="fixed">
          <h1>Actions</h1>
      </div>
      <div data-role="content">
        <?php include("mobile/page.navSidebar.php"); ?>
        <div class="content-primary">
          <div style="float:left; width:100%; display:block;"><?php
		  include("mobile/page.output.php");
          ?>
		  </div>
		  
		  <form name="jump" style="float:left; width:100%; display:block;">
				<?php
		$controller->Dropdown("Filters", "Filters", array("filter" => "A", "filter_type" => "action"));
		?>  
                                              
		  </form>
		  
		  
		  <div id="actionIntray">
          
          </div>
		 </div>
      </div>
	
	<?php
	
}
else{
	$_SESSION['error_not_logged_in'] = 1;
	header("Location: index.php");	
}
?>
