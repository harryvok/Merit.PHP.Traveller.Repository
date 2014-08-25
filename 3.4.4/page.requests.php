<script type="text/javascript">
$(document).ready(function(){
	getIntray("request", "<?php if(isset($_GET['filter'])) echo $_GET['filter']; elseif(isset($_SESSION['req_back_filter'])) echo $_SESSION['req_back_filter']; ?>");
});
</script>



<div style="float:left;">
<img width="10" height="9" src="images/dotGreen.png" /> <span class="small"><b>Open Request</b></span> <img width="10" height="9" src="images/dotRed.png" /> <span class="small"><b>Finalised Request</b></span> <img width="10" height="9" src="images/dotYellow.png" /> <span class="small"><b>Suspended Request</b></span><br />
	
	<br />
		<b>Filter:</b> 
		<?php
		$controller->Dropdown("Filters", "Filters", array("filter" => "C", "filter_type" => "complaint"));
		?>
</div>
<div id="requestIntray">
          
</div>
