

<?php
$name_id = strip_tags($_GET['id']);
$address = array();
if(isset($_GET['ex'])){ $ex = strip_tags($_GET['ex']); } else { $ex = ""; }
?>
<div data-role="page" id="view-name">
  <div data-role="header" data-position="fixed">
  	<?php if(!isset($_GET['d'])){ ?><a href="<?php echo $_SESSION['backLink']; ?>" data-role="button" data-icon="arrow-l" data-theme="a" data-transition="fade" data-iconpos="notext">Back</a>
     <?php } else { ?><a href="index.php?page=view-name&id=<?php echo $name_id; ?>" data-role="button" data-icon="arrow-l" data-theme="a" data-transition="fade" data-iconpos="notext">Back</a><?php } ?>
     <h1>View Name</h1>
      <a href="#actionPanel" data-role="button" data-icon="bars" data-iconpos="notext" class="iphone">Menu</a>
  </div>
  <div data-role="content">
  
  <div class="content-primary">
  	<script type="text/javascript">
	function change(id){
		window.location = "index.php?page=view-request&id="+id;
	}
	function change_add(id){
		window.location = "index.php?page=view-address&id="+id;
	}
	</script>
			<?php
			$controller->Display("Name", "NameHeader");
			if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){
				$controller->Display("Name", "Name");
			}
			if(isset($_GET['d']) && $_GET['d'] == "requests"){
				$controller->Display("Name", "NameRequests");
			}
			if(isset($_GET['d']) && $_GET['d'] == "addresses"){
				$controller->Display("Name", "NameAddresses");
			}
			?>
	</div>
    <div class="content-secondary">
    <?php $controller->Sidebar("viewname", "ipad"); ?>
  </div>
    <div class="iphone" data-role="panel" id="actionPanel" data-position="right" data-display="overlay" data-dismissible="true" data-theme="b">
			
        <h3>Menu</h3>
        <p>
        <?php $controller->Sidebar("viewname"); ?>
        

    </div>
    </div>

