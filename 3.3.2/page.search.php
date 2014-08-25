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
  $('#search_button').click(function(){
	  Search($("#search").val());  
	  $("#search").select();
	  
  }); 
  $('#search').keypress(function(){
	  if(event.which == 13){
		  Search($("#search").val());   
		  $("#search").select();
	  }
	  
  }); 
});
</script>
  This form will search the database for anything that you type in the below text box.<p>&nbsp;</p>
  <div class="float-left">
	  <input class="text" name='search' id="search" value='<?php if(isset($_SESSION['search'])){ echo $_SESSION['search']; } ?>'>
  </div>
  <input id="search_button"  type='button' value='Search' />
  <div id="search_query" class="float-left">
	  <?php
	  if(isset($_SESSION['search'])){ 
		  $search= $_SESSION['search'];
		  ?>
		  
		  <?php
		  if(strlen($search) == 0){
			  echo "Please enter a search query.";
		  }
		  else{
			  $controller->Invoke("Search");
		  }

	  }
	  ?>
  </div>