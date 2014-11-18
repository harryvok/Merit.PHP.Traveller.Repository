<script type="text/javascript">
    function change(id) {
        window.location = "index.php?page=view-request&id=" + id;
    }
    function change_name(id) {
        window.location = "index.php?page=view-name&id=" + id;
    }
	</script>

<?php
$address_id = strip_tags($_GET['id']);
if(isset($_GET['ex'])){ $ex = strip_tags($_GET['ex']); }
if(isset($_GET['ref'])){ $ref = strip_tags($_GET['ref']); }
if(isset($_GET['ref_page'])){ $page = strip_tags($_GET['ref_page']); }

    $controller->Display("Customer", "CustomerHeader", $customer_id);
 if(isset($_GET['d']) && $_GET['d'] == "summary" || !isset($_GET['d'])){
	 $controller->Display("Customer", "Customer", $customer_id);
 }
 

?>