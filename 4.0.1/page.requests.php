<?php 

$timeset = REFRESHTABLE;
$timeset = $timeset * 60000;            
if ($timeset < 1)
    $timeset = 999999999;
echo '<script type="text/javascript"> var settime = '.json_encode($timeset).'; </script>';
?>



<script type="text/javascript">
$(document).ready(function(){
	getIntray("request", "<?php if(isset($_GET['filter'])) echo $_GET['filter']; elseif(isset($_SESSION['req_back_filter'])) echo $_SESSION['req_back_filter']; ?>");
});

    setTimeout(function () {
        location.reload(true);
    }, settime);
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
