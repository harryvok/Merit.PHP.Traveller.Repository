<?php
 // If a request ID has been selected,select it from the sr_web_input table
$action_id = strip_tags($_GET['id']);
if(isset($_GET['ref'])){ $ref = strip_tags($_GET['ref']); }
if(isset($_GET['ref_page'])){ $page = strip_tags($_GET['ref_page']); }
if(isset($_GET['filter'])){ $filter = strip_tags($_GET['filter']); }
$_SESSION['act_back_filter'] = $filter;
$controller->Display("Action", "ActionHeader");
if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){
	$controller->Display("Action", "Action");
}
if(isset($_GET['d']) && $_GET['d'] == "udfs"){
	$controller->Display("RequestUDFs", "ActionUDFs", $GLOBALS['request_id']);		
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
?>