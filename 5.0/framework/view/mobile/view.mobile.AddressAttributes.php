<script type="text/javascript">
 $(document).ready(function(){
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
 });
</script>
<?php
$result_attrib = $GLOBALS['result']->attrib_sum_det;
?>

<ul class="no-ellipses" data-role="listview" id="listview" data-count-theme="b" data-inset="true">
<?php
	if(isset($result_attrib->attrib_sum_details)  && count($result_attrib->attrib_sum_details) > 1){
		$number=0;
		foreach($result_attrib->attrib_sum_details as $result_a_as){
			$number=$number+1;
			?>
				<li>
					<input id="attr<?php echo $number; ?>-address_id" value="<?php echo $_GET['id']; ?>" type="hidden" />
					<input id="attr<?php echo $number ?>-type_txt" value="<?php echo $result_a_as->type_txt; ?>" type="hidden" />
					<input id="attr<?php echo $number ?>-type_desc" value="<?php echo $result_a_as->type_desc; ?>" type="hidden" />
					<input id="attr<?php echo $number ?>-type_cnt" value="<?php echo $result_a_as->type_cnt; ?>" type="hidden" />
					<input id="attr<?php echo $number ?>-type_key" value="<?php echo $result_a_as->type_key; ?>" type="hidden" />
					<input id="attr<?php echo $number ?>-type_code" value="<?php echo $result_a_as->type_code; ?>" type="hidden" />
					<input id="attr<?php echo $number ?>-status_ind" value="<?php echo $result_a_as->status_ind; ?>" type="hidden" />
					
					<a id="<?php echo $number; ?>" class="attribute">
				   <?php echo $result_a_as->type_desc." - ".$result_a_as->type_key; ?>(<?php echo $result_a_as->type_cnt; ?>)
					</a>
				</li>
				<a name="anchoratt<?php echo $number;?>"></a>
				<li id="showhide-<?php echo $number;?>" style="display: none;">
				<div id="attribute_details<?php echo $number;?>">
	
				</div>
				</li>
				<?php
		}
	}
	elseif(isset($result_attrib->attrib_sum_details)  && count($result_attrib->attrib_sum_details) == 1){
		$result_a_as = $result_attrib->attrib_sum_details;
		$number=1;
		?>
			<li>
				<input id="attr<?php echo $number; ?>-address_id" value="<?php echo $_GET['id']; ?>" type="hidden" />
					<input id="attr<?php echo $number ?>-type_txt" value="<?php echo $result_a_as->type_txt; ?>" type="hidden" />
					<input id="attr<?php echo $number ?>-type_desc" value="<?php echo $result_a_as->type_desc; ?>" type="hidden" />
					<input id="attr<?php echo $number ?>-type_cnt" value="<?php echo $result_a_as->type_cnt; ?>" type="hidden" />
					<input id="attr<?php echo $number ?>-type_key" value="<?php echo $result_a_as->type_key; ?>" type="hidden" />
					<input id="attr<?php echo $number ?>-type_code" value="<?php echo $result_a_as->type_code; ?>" type="hidden" />
					 <input id="attr<?php echo $number ?>-status_ind" value="<?php echo $result_a_as->status_ind; ?>" type="hidden" />
					 
					<a id="<?php echo $number ?>" class="attribute">
					<?php echo $result_a_as->type_desc." - ".$result_a_as->type_key; ?>(<?php echo $result_a_as->type_cnt; ?>)
					</a>
				</li>
				<a name="anchoratt<?php echo $number;?>"></a>
				<li id="showhide-<?php echo $number;?>" style="display: none;">
				<div id="attribute_details<?php echo $number;?>">
	
				</div>
				</li>
			<?php
	}
	unset($number);
	?>
	
</ul>