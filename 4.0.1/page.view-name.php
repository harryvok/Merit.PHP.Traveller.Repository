<script type="text/javascript">
	function change(id){
		window.location = "index.php?page=view-request&id="+id;
	}
	function change_add(id){
		window.location = "index.php?page=view-address&id="+id;
	}
	</script>

<?php
include_once("model.php"); 
$model = new Model();  
$name_id = strip_tags($_GET['id']);
$parameters = new stdClass();
$parameters->user_id = $_SESSION['user_id'];
$parameters->password = $_SESSION['password'];
$parameters->a_id = $name_id;
$parameters->a_type = "N";
$GLOBALS["name_audit_count"] = $model->WebService(MERIT_REQUEST_FILE, "ws_get_audit_count", $parameters);

if(isset($_GET['ex'])){ $ex = strip_tags($_GET['ex']); }
if(isset($_GET['ref'])){ $ref = strip_tags($_GET['ref']); }
if(isset($_GET['ref_page'])){ $page = strip_tags($_GET['ref_page']); }

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
if(isset($_GET['d']) && $_GET['d'] == "audit"){
    $controller->Display("Audit", "NameAudit", "N");
}
?>