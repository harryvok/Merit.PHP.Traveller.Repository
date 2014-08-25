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

$controller->Invoke("NameHeader");
if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){
	$controller->Invoke("Name");
}
if(isset($_GET['d']) && $_GET['d'] == "requests"){
	$controller->Invoke("NameRequests");
}
if(isset($_GET['d']) && $_GET['d'] == "addresses"){
	$controller->Invoke("NameAddresses");
}
if(isset($_GET['d']) && $_GET['d'] == "hist"){
	$controller->Invoke("NameChanges");
}

?>