<?php
session_start();
include("../../framework/controller.php");
$controller = new Controller();
$search = $_POST['search_q'];
$_SESSION['search'] = $search;



?>
<script type="text/javascript">
	function change_req(id){
	    var rowId = document.getElementById(id).innerHTML;
        window.location = "index.php?page=view-request&id=" + rowId;
	}

	function change_act(id) {
	    var rowId = document.getElementById(id).innerHTML;
	    window.location = "index.php?page=view-action&id=" + rowId;
	}
	function change_add(id) {
	    var rowId = document.getElementById(id).innerHTML;
	   window.location = "index.php?page=view-address&id=" + rowId;
	}
	function change_name(id) {
	    var rowId = document.getElementById(id).innerHTML;
	    window.location = "index.php?page=view-name&id=" + rowId;
	}
	function change_addex(id) {
	    var rowId = document.getElementById(id).innerHTML;
	    window.location = "index.php?page=view-address&id=" + rowId + "&ex=1";
	}
	function change_nameex(id) {
	    var rowId = document.getElementById(id).innerHTML;
	    window.location = "index.php?page=view-name&id=" + rowId + "&ex=1";
	}
	function change_off(id, kid) {
	    var rowId = document.getElementById(id).innerHTML;
	    window.location = "index.php?page=view-officer&id=" + kid;
	}
	function change_ani(id){
		var rowId = document.getElementById(id).innerHTML;
		window.location = "index.php?page=view-animal&id="+rowId;
	}
	</script>
<?php
$number = 0;
$change = 0;
if(strlen($search) == 0){
	echo "Please enter a search query.";
}
else{
	$controller->Display("Search", "Search");
}
?>
