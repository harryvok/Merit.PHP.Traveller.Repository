


<?php
if(isset($_GET['id'])){ $GLOBALS['request_id'] = strip_tags($_GET['id']); }
$GLOBALS['id'] = strip_tags($_GET['id']);
if(isset($_GET['ex'])){ $ex = strip_tags($_GET['ex']); }
if(isset($_GET['filter'])){ $filter = strip_tags($_GET['filter']); }
$_SESSION['req_back_filter'] = $filter;
?>

<div data-role="page" id="view-request">
  <div data-role="header" data-position="fixed">
  	<?php if(!isset($_GET['d'])){ ?><a href="<?php echo $_SESSION['backLink']; ?>" data-role="button" data-icon="arrow-l" data-theme="a" data-transition="fade" data-iconpos="notext">Back</a>
     <?php } else { ?><a href="index.php?page=view-request&id=<?php echo $request_id; ?>" data-role="button" data-icon="arrow-l" data-theme="a" data-transition="fade" data-iconpos="notext">Back</a><?php } ?>
     <h1>View Request</h1>
       <a href="#actionPanel" data-role="button" data-icon="bars" data-iconpos="notext" class="iphone">Menu</a>
  </div>
  <div data-role="content">
  	<div data-role="popup" id="popup" class="ui-corner-all" data-overlay-theme="a" data-theme="c"  data-tolerance="15,15" data-rel="back">
    	  <a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
          <div data-role="content" class="ui-corner-bottom ui-content">
          <div id="popupContent">
          
          </div>
          </div>
     </div>
     
    <div class="content-primary">
  	<script type="text/javascript">
	function change(id){
		window.location = "index.php?page=view-action&id="+id;
	}
	function change_add(id){
		window.location = "index.php?page=view-address&id="+id;
	}
	</script>
      <?php
	  include("mobile/page.output.php");
	  
	  $controller->Display("Request", "RequestHeader");
		if(isset($_GET['d']) && $_GET['d'] == "summary" ||  !isset($_GET['d'])){
			$controller->Display("Request", "Request");	
		}
		if(isset($_GET['d']) && $_GET['d'] == "udfs"){
			$controller->Display("RequestUDFs","RequestUDFs", $_GET['id']);
		}
		if(isset($_GET['d']) && $_GET['d'] == "modify-udfs"){
			$controller->Display("RequestUDFs", "ModifyUDFs", $_GET['id']);
		}
		if(isset($_GET['d']) && $_GET['d'] == "add-action"){
			$controller->Display("RequestActions", "AddAction");
		}
		if(isset($_GET['d']) && $_GET['d'] == "actions"){
			$controller->Display("RequestActions", "RequestActions");
		}
		if(isset($_GET['d']) && $_GET['d'] == "ca"){
			$controller->Display("Comments", "RequestComments");
			$controller->Display("Attachments", "RequestAttachments");
		}
	  ?>
  </div>
  <div class="content-secondary">
          <?php $controller->Sidebar("viewrequest", "ipad"); ?>   
    </div>
  <div class="iphone" data-role="panel" id="actionPanel" data-position="right" data-display="overlay" data-dismissible="true" data-theme="c">
			
        <h3>Menu</h3>
        <p>
         <?php $controller->Sidebar("viewrequest"); ?>
        </p>
    </div>
    </div>

