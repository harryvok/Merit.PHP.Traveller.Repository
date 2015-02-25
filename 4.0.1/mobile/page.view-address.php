

<?php
$address_id = strip_tags($_GET['id']);
if(isset($_GET['ex'])){ $ex = strip_tags($_GET['ex']); } else { $ex = ""; }
if(isset($_GET["ref_page"])){  
    if($_GET["ref_page"] == "Search" || $_GET["ref_page"] == "RequestSearch"){
        $_SESSION["backLink"] = "index.php?page=search&back_act=".$_GET["ref_page"];
    }
}
?>

<div data-role="page" id="view-address">
  <div data-role="header" data-tap-toggle="false" data-position="fixed">
  	<?php if(!isset($_GET['d'])){ ?><a href="<?php echo $_SESSION['backLink']; ?>" data-role="button" data-icon="arrow-l" data-theme="a" data-transition="fade" data-iconpos="notext">Back</a>
     <?php } else { ?><a href="index.php?page=view-address&id=<?php echo $address_id; ?>" data-role="button" data-icon="arrow-l" data-theme="a" data-transition="fade" data-iconpos="notext">Back</a><?php } ?>
     <h1>View Address</h1>
      <a href="#actionPanel" data-role="button" data-icon="bars" data-iconpos="notext" class="iphone">Menu</a>
  </div>
  <div data-role="content">
    
    <div class="content-primary">
    <div data-role="popup" id="popup" class="ui-corner-all" data-tolerance="15,15" data-rel="back">
    		<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
          <div id="popupContent">
          
          </div>
     </div>
  	<script type="text/javascript">
	function change(id){
		window.location = "index.php?page=view-request&id="+id;
	}
	function change_name(id){
		window.location = "index.php?page=view-name&id="+id;
	} 
	</script>
			<?php
			$controller->Display("Address", "AddressHeader", $_GET['id']);
			 if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){
				 $controller->Display("Address", "Address", $_GET['id']);
			 }
			 if(isset($_GET['d']) && $_GET['d'] == "requests"){
				 $controller->Display("Address", "AddressRequests", $_GET['id']);
			 }
             if(isset($_GET['d']) && $_GET['d'] == "allowance"){     
                 $controller->Display("AddressAllowanceAvail", "AddressAllowanceAvail", $address_id);
                 $controller->Display("AddressAllowance", "AddressAllowance", $address_id);
             }
			 if(isset($_GET['d']) && $_GET['d'] == "names"){
				 $controller->Display("Address", "AddressNames", $_GET['id']);
			 }
			 if(isset($_GET['d']) && $_GET['d'] == "aliases"){
				 $controller->Display("AddressAliases", "AddressAliases", $_GET['id']);
			 }
			 if(isset($_GET['d']) && $_GET['d'] == "assoc"){
				 $controller->Display("AddressAssociations", "AddressAssociations", $_GET['id']);
			 }
			 if(isset($_GET['d']) && $_GET['d'] == "attrib"){
				 $controller->Display("AddressAttributes", "AddressAttributes", $_GET['id']);
			 }
			?>
		</div>
        <div class="content-secondary">
    <?php $controller->Sidebar("viewAddress", "ipad"); ?>      
    </div>
     <div class="iphone" data-role="panel" id="actionPanel" data-position="right" data-display="overlay" data-dismissible="true" data-theme="b">
			
        <h3>Menu</h3>
        <p>
       <?php $controller->Sidebar("viewAddress"); ?>

    </div>
</div>
