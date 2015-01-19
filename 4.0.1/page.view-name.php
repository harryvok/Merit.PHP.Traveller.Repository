<script type="text/javascript">
	function change(id){
		window.location = "index.php?page=view-request&id="+id;
	}
	function change_add(id){
		window.location = "index.php?page=view-address&id="+id;
	}
	</script>

<?php
$name_id = strip_tags($_GET['id']);
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