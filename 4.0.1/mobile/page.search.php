<?php
if(isset($_SESSION['user_id'])){
	if(isset($_GET['clear']) && $_GET['clear'] == 1){
		unset($_SESSION['search']);	
	}
	if(isset($_GET['search'])){
		$_SESSION['search'] = $_GET['search'];
	}
	?>
	<div data-role="page" id="default" data-dom-cache="true">
      <div data-role="header" data-tap-toggle="false" data-position="fixed">
      	 <h1>Search</h1>
      </div>
      <div data-role="content">
      <?php include("mobile/page.navSidebar.php"); ?>
        <div class="content-primary">
        <form action='index.php' method='get'>
				<h2>Search For</h2>
				<input type="hidden" name="page" value="search" />
				<input type="search" name="search" id="search" value="<?php if(isset($_SESSION['search'])){ echo $_SESSION['search']; } ?>" />
				<input type="submit"  value="Search" />
			</form>
			<?php
			if(isset($_SESSION['search'])){
				$search = $_SESSION['search'];

				if(strlen($search) == 0){
					echo "Please enter a search query.";
				}
				else{
					$controller->Display("Search", "Search");
				}
			}
			?>
            </div>
      </div>
	<?php
	
}
else{
	$_SESSION['error_not_logged_in'] = 1;
	header("Location: index.php");	
}
?>