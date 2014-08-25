<script type="text/javascript">
	function change(id){
		window.location = "index.php?page=view-action&id="+id;
	}
	function change_re(id){
		window.location = "index.php?page=view-request&id="+id;
	}
</script>
<?php
$name_id = strip_tags($_GET['id']);
if(isset($_GET['ref'])){ $ref = strip_tags($_GET['ref']); }
if(isset($_GET['ref_page'])){ $page = strip_tags($_GET['ref_page']); }

$controller->Invoke("OfficerHeader");
if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){
	$controller->Invoke("OfficerSummary");
}
if(isset($_GET['d']) && $_GET['d'] == "act"){
	$controller->Invoke("OfficerActions");
}
if(isset($_GET['d']) && $_GET['d'] == "req"){
	$controller->Invoke("OfficerRequests");
}

?>
