<?php
if(isset($_GET['clear']) && $_GET['clear'] == 1){
	unset($_SESSION['search']);	
}

if(isset($_GET['search'])){
  $_SESSION['search'] = $_GET['search'];
}
?>
<script type="text/javascript">
$(document).ready(function(){
  $('#search_button').click(function(eve){
	  Search($("#search").val());  
	  $("#search").select();
	  
  }); 
  $('#search').keydown(function(event){
	  if(event.which == 13){
		  Search($("#search").val());   
		  $("#search").select();
	  }
	  
  }); 
});
</script>
  This form will search the database for anything that you type in the below text box.<p>&nbsp;</p>
  <div class="float-left">
	  <input class="text" name='search' id="search" class="required" placeholder="Search..." value='<?php if(isset($_SESSION['search'])){ echo $_SESSION['search']; } ?>'>
  </div>
  <input id="search_button"  type='button' value='Search' />
  <div id="search_query" class="float-left">
	  <?php
	  if(isset($_SESSION['search'])){ 
		  $search= $_SESSION['search'];
		  ?>
		  <script type="text/javascript">
			  function change_req(id){
				  var rowId = document.getElementById(id).innerHTML;
				  window.location = "index.php?page=view-request&id="+rowId;
			  }
		  
			  function change_act(id){
				  var rowId = document.getElementById(id).innerHTML;
				  window.location = "index.php?page=view-action&id="+rowId;
			  }
			  function change_add(id){
				  var rowId = document.getElementById(id).innerHTML;
				  window.location = "index.php?page=view-address&id="+rowId;
			  }
			  function change_name(id){
				  var rowId = document.getElementById(id).innerHTML;
				  window.location = "index.php?page=view-name&id="+rowId;
			  }
			  function change_addex(id){
				  var rowId = document.getElementById(id).innerHTML;
				  window.location = "index.php?page=view-address&id="+rowId+"&ex=1";
			  }
			  function change_nameex(id){
				  var rowId = document.getElementById(id).innerHTML;
				  window.location = "index.php?page=view-name&id="+rowId+"&ex=1";
			  }
			  function change_off(id, rowId){
				  window.location = "index.php?page=view-officer&id="+rowId;
			  }
			  function change_ani(id){
				  var rowId = document.getElementById(id).innerHTML;
				  window.location = "index.php?page=view-animal&id="+rowId;
			  }
			  </script>
		  <?php
		  if(strlen($search) == 0){
			  echo "Please enter a search query.";
		  }
		  else{
			  $controller->Display("Search", "Search");
		  }

	  }
	  ?>
  </div>