
<?php
if(isset($_SESSION['user_id'])){
	?>
    <script type="text/javascript">
$(document).on('pageinit', function(){
	getIntray("request", "<?php if(isset($_GET['filter'])) echo $_GET['filter']; elseif(isset($_SESSION['req_back_filter'])) echo $_SESSION['req_back_filter']; ?>");
});
</script>
	
	<div data-role="page" id="default">
      <div data-role="header" data-tap-toggle="false" data-position="fixed">
      	<h1>Requests</h1>
      </div>
      <div data-role="content">
      <?php include("mobile/page.navSidebar.php"); ?>
        <div class="content-primary">
          <?php
		  include("mobile/page.output.php");
		  ?>
		 
		  <form name="jump">
				<?php
		$controller->Dropdown("Filters", "Filters", array("filter" => "C", "filter_type" => "complaint"));
		?>
                
		  </form>
		  
		  
		  <div id="requestIntray">
          
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
