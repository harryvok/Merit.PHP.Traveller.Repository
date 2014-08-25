
<?php
$name_id = strip_tags($_GET['id']);
if(isset($_GET['ex'])){ $ex = strip_tags($_GET['ex']); }
?>
<div data-role="page" id="view-request">
  <div data-role="header" data-position="fixed">
  	<?php if(!isset($_GET['d'])){ ?><a href="<?php echo $_SESSION['backLink']; ?>" data-role="button" data-icon="arrow-l" data-theme="a" data-transition="fade" data-iconpos="notext">Back</a>
     <?php } else { ?><a href="index.php?page=view-officer&id=<?php echo $name_id; ?>" data-role="button" data-icon="arrow-l" data-theme="a" data-transition="fade" data-iconpos="notext">Back</a><?php } ?>
     <h1>View Officer</h1>
       <a href="#actionPanel" data-role="button" data-icon="bars" data-iconpos="notext" class="iphone">Menu</a>
  </div>
  <div data-role="content">
    
    <div class="content-primary">
  	     <script type="text/javascript">
	        function change(id){
		        window.location = "index.php?page=view-action&id="+id;
	        }
	        function change_req(id){
		        window.location = "index.php?page=view-request&id="+id;
	        }
        </script>
          <?php
          $controller->Display("Officer", "OfficerHeader");
          if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){
              $controller->Display("Officer", "Officer");
          }
          if(isset($_GET['d']) && $_GET['d'] == "act"){
              $controller->Display("OfficerActions", "OfficerActions");
          }
          if(isset($_GET['d']) && $_GET['d'] == "req"){
              $controller->Display("OfficerRequests", "OfficerRequests");
          }
        ?>           
    </div>
          <div class="content-secondary">
          <?php $controller->Sidebar("viewofficer", "ipad"); ?> 
          </div>
          <div class="iphone" data-role="panel" id="actionPanel" data-position="right" data-display="overlay" data-dismissible="true" data-theme="b">
  
          <h3>Menu</h3>
          <p>
          <?php $controller->Sidebar("viewofficer"); ?>

          </div>
        </div>
    
  
