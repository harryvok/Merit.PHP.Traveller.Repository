
<script type="text/javascript">
	function change(id){
		window.location = "index.php?page=view-action&id="+id;
	}
	function change_add(id){
		window.location = "index.php?page=view-address&id="+id;
	}
	</script>

<?php
if(isset($_GET['id'])){ $GLOBALS['request_id'] = strip_tags($_GET['id']); }
if(isset($_GET['ref'])){ $ref = strip_tags($_GET['ref']); }
if(isset($_GET['ref_page'])){ $page = strip_tags($_GET['ref_page']); }
if(isset($_GET['filter'])){ $filter = strip_tags($_GET['filter']); }
$_SESSION['req_back_filter'] = $filter;
$address = array();

$controller->Display("Request", "RequestHeader");
if(isset($_GET['d']) && $_GET['d'] == "summary" ||  !isset($_GET['d'])){
	$controller->Display("Request", "Request");	
}
if(isset($_GET['d']) && $_GET['d'] == "udfs"){
	$controller->Display("RequestUDFs","RequestUDFs", $_GET['id']);
}
if(isset($_GET['d']) && $_GET['d'] == "actions"){
	$controller->Display("RequestActions", "RequestActions");
}
if(isset($_GET['d']) && $_GET['d'] == "ca"){
	$controller->Display("Comments", "RequestComments");
	$controller->Display("Attachments", "RequestAttachments");
}

?>