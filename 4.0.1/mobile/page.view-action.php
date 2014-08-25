<?php
// If a request ID has been selected,select it from the sr_web_input table
$action_id = strip_tags($_GET['id']);
$GLOBALS['id'] = strip_tags($_GET['id']);
if(isset($_GET['ex'])){ $ex = strip_tags($_GET['ex']); }
if(isset($_GET['filter'])){ $filter = strip_tags($_GET['filter']); }
$_SESSION['act_back_filter'] = $filter;
?>

<div data-role="page" id="view-action">
  <div data-role="header" data-tap-toggle="false" data-position="fixed">
  	<?php if(!isset($_GET['d'])){ ?><a href="<?php echo $_SESSION['backLink']; ?>" data-role="button" data-icon="arrow-l" data-theme="a" data-transition="fade" data-iconpos="notext">Back</a>
     <?php } else { ?><a href="index.php?page=view-action&id=<?php echo $action_id; ?>" data-role="button" data-icon="arrow-l" data-theme="a" data-transition="fade" data-iconpos="notext">Back</a><?php } ?>
      <h1>View Action</h1>
      <a href="#actionPanel" class="iphone" data-role="button" data-icon="bars" data-iconpos="notext">Menu</a>
  </div>
  <div data-role="content">
    
    <div class="content-primary">
  	<div data-role="popup" id="popup" class="ui-corner-all photopopup" data-overlay-theme="a" data-theme="c"  data-tolerance="15,15" data-rel="back">
    		<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
            <div data-role="content" class="ui-corner-bottom ui-content">
          <div id="popupContent">
          
          </div>
          </div>
     </div>
		<?php
        include("mobile/page.output.php");
		$controller->Display("Action", "ActionHeader");
		if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){
			$controller->Display("Action", "Action");
		}
		if(isset($_GET['d']) && $_GET['d'] == "udfs"){
			$controller->Display("RequestUDFs", "ActionUDFs", $GLOBALS['request_id']);		
		}
		if(isset($_GET['d']) && $_GET['d'] == "modify-udfs"){
			$controller->Display("RequestUDFs", "ModifyUDFs", $GLOBALS['request_id']);		
		}
		if(isset($_GET['d']) && $_GET['d'] == "modify-act-udfs"){
			$controller->Display("RequestUDFs", "ModifyActionUDFs", $GLOBALS['request_id']);		
		}
		if(isset($_GET['d']) && $_GET['d'] == "ca"){
			$controller->Display("Comments", "ActionComments");
			$controller->Display("Attachments", "ActionAttachments");
		}
		if(isset($_GET['d']) && $_GET['d'] == "reassign"){
			$controller->Display("ActionReassign", "ActionReassign");
		}
		if(isset($_GET['d']) && $_GET['d'] == "complete"){
			$controller->Display("ActionComplete", "ActionComplete");
		}
        if(isset($_GET['d']) && $_GET['d'] == "options"){
            $controller->Display("Options", "ActionOptions");
        }
        if(isset($_GET['d']) && $_GET['d'] == "reopenAction"){
            $controller->Display("ActionReopen", "ActionReopen");
        }
        if(isset($_GET['d']) && $_GET['d'] == "deleteAction"){
            $controller->Display("ActionDelete", "ActionDelete");
        }
        if(isset($_GET['d']) && $_GET['d'] == "audit"){
            $controller->Display("Audit", "Audit", "A");
        }
        if(isset($_GET['d']) && $_GET['d'] == "notifications"){
            $controller->Display("ActionNotifications", "ActionNotifications");
        }
        ?>
	</div>
    <div class="content-secondary">
        <?php $controller->Sidebar("viewaction", "ipad"); ?>        
    </div>
    <div class="iphone" data-role="panel" id="actionPanel" data-position="right" data-display="overlay" data-dismissible="true" data-theme="b">
        <h3>Menu</h3>
        <p>
        <?php $controller->Sidebar("viewaction"); ?>
    </div>
    </div>

