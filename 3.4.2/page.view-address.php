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

$controller->Display("Address", "AddressHeader", $address_id);
 if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){
	 $controller->Display("Address", "Address", $address_id);
 }
 if(isset($_GET['d']) && $_GET['d'] == "requests"){
	 $controller->Display("Address", "AddressRequests", $address_id);
 }
 if(isset($_GET['d']) && $_GET['d'] == "names"){
	 $controller->Display("Address", "AddressNames", $address_id);
 }
 if(isset($_GET['d']) && $_GET['d'] == "aliases"){
	 $controller->Display("AddressAliases", "AddressAliases");
 }
 if(isset($_GET['d']) && $_GET['d'] == "assoc"){
	 $controller->Display("AddressAssociations", "AddressAssociations");
 }
 if(isset($_GET['d']) && $_GET['d'] == "attrib"){
	 $controller->Display("AddressAttributes", "AddressAttributes");
 }

?>