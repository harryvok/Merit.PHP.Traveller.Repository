<script type="text/javascript">
	function change(id){
		window.location = "index.php?page=view-request&id="+id;
	}
	function change_name(id){
		window.location = "index.php?page=view-name&id="+id;
	}
	</script>

<?php
$address_id = strip_tags($_GET['id']);
if(isset($_GET['ex'])){ $ex = strip_tags($_GET['ex']); }
if(isset($_GET['ref'])){ $ref = strip_tags($_GET['ref']); }
if(isset($_GET['ref_page'])){ $page = strip_tags($_GET['ref_page']); }

$controller->Invoke("AddressHeader");
 if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){
	 $controller->Invoke("Address");
 }
 if(isset($_GET['d']) && $_GET['d'] == "requests"){
	 $controller->Invoke("AddressRequests");
 }
 if(isset($_GET['d']) && $_GET['d'] == "names"){
	 $controller->Invoke("AddressNames");
 }
 if(isset($_GET['d']) && $_GET['d'] == "aliases"){
	 $controller->Invoke("AddressAliases");
 }
 if(isset($_GET['d']) && $_GET['d'] == "assoc"){
	 $controller->Invoke("AddressAssociations");
 }
 if(isset($_GET['d']) && $_GET['d'] == "attrib"){
	 $controller->Invoke("AddressAttributes");
 }

?>