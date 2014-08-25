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
?>
 <script type="text/javascript">
$(document).ready(function(){
	$('.alias').click(function(){
		var id = $(this).attr("id");
		var address_id = $("#al"+id+"-address_id").val();
		var type_txt = $("#al"+id+"-type_txt").val();
		var type_desc = $("#al"+id+"-type_desc").val();
		var type_cnt = $("#al"+id+"-type_cnt").val();
		var type_key = $("#al"+id+"-type_key").val();
		var type_code = $("#al"+id+"-type_code").val();
		GetAliasDetails_iphone(id,address_id,type_txt,type_desc,type_cnt,type_key,type_code);   
			
	 }); 
	 $('.attribute').click(function(){
		 var id = $(this).attr("id");
		var address_id = $("#attr"+id+"-address_id").val();
		var type_txt = $("#attr"+id+"-type_txt").val();
		var type_desc = $("#attr"+id+"-type_desc").val();
		var type_cnt = $("#attr"+id+"-type_cnt").val();
		var type_key = $("#attr"+id+"-type_key").val();
		var type_code = $("#attr"+id+"-type_code").val();
		var status_ind = $("#attr"+id+"-status_ind").val();
		GetAttributeDetails_iphone(id,address_id,type_txt,type_desc,type_cnt,type_key,type_code,status_ind);   
			
	 }); 
	 $('.assoc').click(function(){
		 var id = $(this).attr("id");
		var address_id = $("#asso"+id+"-address_id").val();
		var type_txt = $("#asso"+id+"-type_txt").val();
		var type_desc = $("#asso"+id+"-type_desc").val();
		var type_cnt = $("#asso"+id+"-type_cnt").val();
		var type_key = $("#asso"+id+"-type_key").val();
		var type_code = $("#asso"+id+"-type_code").val();
		var form_name = $("#asso"+id+"-form_name").val();
		var key_name = $("#asso"+id+"-key_name").val();
		GetAssociationDetails_iphone(id,type_txt,type_desc,type_cnt,type_key,type_code,form_name,key_name,address_id);   
			
	 }); 
 });
 </script>
<div id="topbar">
	<div id="title" style="padding-left: 50px;">
	View Address</div>
	<div id="leftnav">
	<a href="index.php?" href="#"><img alt="home" src="images/home.png" /></a><a href="<?php echo $_SESSION['backLink']; ?>">Back</a></div>
</div>
<div id="wrapper">
	<div id="scroller">
		<div id="content">
			<?php
			$controller->Invoke("Address");
			$controller->Invoke("AddressRequests");
			$controller->Invoke("AddressNames");
			$controller->Invoke("AddressAliases");
			$controller->Invoke("AddressAssociations");
			$controller->Invoke("AddressAttributes");
			?>
		</div>
	</div>
</div>