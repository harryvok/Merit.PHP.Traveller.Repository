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
include_once("model.php");  
$model = new Model();  
$parameters = new stdClass();
$parameters->user_id = $_SESSION['user_id'];
$parameters->password = $_SESSION['password'];
$parameters->service_code = "";
$parameters->request_code = "";
$parameters->function_code = "";
$parameters->address_id = $address_id;
$parameters->property_no = "";  
$result = $model->WebService(MERIT_REQUEST_FILE, "ws_get_annual_allowance", $parameters);
$_SESSION["allowance_count"] = count($GLOBALS['result']->allowance_history->annual_allowance_history);

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
 if(isset($_GET['d']) && $_GET['d'] == "allowance"){
	 $controller->Display("Allowance", "AllowanceAllowance", $address_id);
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