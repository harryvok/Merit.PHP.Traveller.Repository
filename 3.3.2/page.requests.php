<script type="text/javascript">
function change(id){
	var rowId = document.getElementById(id).innerHTML;
	window.location = "index.php?page=view-request&id="+rowId;
}
</script>



<div style="float:left;">
<img width="10" height="9" src="images/green-dot.png" /> <span class="small"><b>Open Request</b></span> <img width="10" height="9" src="images/red-dot.png" /> <span class="small"><b>Finalised Request</b></span> <img width="10" height="9" src="images/yellow-dot.png" /> <span class="small"><b>Suspended Request</b></span><br />
	<div class="float-left">
		<a href="#bottom">Bottom</a>
		<a name="top" title="top"></a>
	</div>
	<br />
		<b>Filter:</b> 
		<?php
		$controller->Dropdown("RequestFilters");
		?>
</div>
<?php
$controller->Invoke("RequestIntray");
?>
<div class="float-left">
<a href="#top">Top</a>
<a name="bottom" title="bottom"></a>
</div>
