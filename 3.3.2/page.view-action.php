<?php
 // If a request ID has been selected,select it from the sr_web_input table
$action_id = strip_tags($_GET['id']);
if(isset($_GET['ref'])){ $ref = strip_tags($_GET['ref']); }
if(isset($_GET['ref_page'])){ $page = strip_tags($_GET['ref_page']); }
if(isset($_GET['filter'])){ $filter = strip_tags($_GET['filter']); }

$controller->Invoke("ActionHeader");
if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){
	$controller->Invoke("Action");
}
if(isset($_GET['d']) && $_GET['d'] == "udfs"){
	$controller->Invoke("ActionUDFs");		
}
if(isset($_GET['d']) && $_GET['d'] == "ca"){
	$controller->Invoke("ActionComments");
	$controller->Invoke("ActionAttachments");
}
if(isset($_GET['d']) && $_GET['d'] == "reassign"){
	$controller->Invoke("ActionReassign");
}
if(isset($_GET['d']) && $_GET['d'] == "complete"){
	$controller->Invoke("ActionComplete");
}
?>