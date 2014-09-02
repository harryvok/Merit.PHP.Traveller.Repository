<script type="text/javascript">
    function change(id) {
        window.location = "index.php?page=view-action&id=" + id;
    }
    function change_req(id) {
        window.location = "index.php?page=view-request&id=" + id;
    }
</script>
<?php
$name_id = strip_tags($_GET['id']);
if(isset($_GET['ref'])){ $ref = strip_tags($_GET['ref']); }
if(isset($_GET['ref_page'])){ $page = strip_tags($_GET['ref_page']); }

$controller->Display("Officer", "OfficerHeader");
if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){
	$controller->Display("Officer","Officer");
}
if(isset($_GET['d']) && $_GET['d'] == "act"){
	$controller->Display("OfficerActions", "OfficerActions");
}
if(isset($_GET['d']) && $_GET['d'] == "req"){
	$controller->Display("OfficerRequests","OfficerRequests");
}
 
?>
