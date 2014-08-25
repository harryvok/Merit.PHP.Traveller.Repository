<?php
if(isset($_GET['clear']) && $_GET['clear'] == 1){
	unset($_SESSION['search']);	
}
if(isset($_GET['search'])){
	$_SESSION['search'] = $_GET['search'];
}
?>
<div id="topbar">
	<div id="title">Search</div>
	<div id="leftnav"><a href="index.php?" href="#"><img alt="home" src="images/home.png" /></a></div>
</div>
<div id="wrapper">
	<div id="scroller">
		<div id="content">
			<form action='index.php' method='get'>
				<span class="graytitle">Search For</span>
				<ul class="pageitem">
					<li class="bigfield">
					<input type="hidden" name="page" value="search" />
						<input class="text" name="search" id="search" value="<?php if(isset($_SESSION['search'])){ echo $_SESSION['search']; } ?>" />
					</li>
					<li class="button">
						
						<input type="submit"  value="Search" />
					</li>
				</ul>
			</form>
			<?php
			if(isset($_SESSION['search'])){
				$search = $_SESSION['search'];

				if(strlen($search) == 0){
					echo "Please enter a search query.";
				}
				else{
					$controller->Invoke("Search");
				}
			}
			?>
		</div>
	</div>
</div>