
<?php
if(isset($GLOBALS['result']->name_search_det->name_search) && count($GLOBALS['result']->name_search_det->name_search) >0){
	?>
    <script type="text/javascript">

		$(document).ready(function() {
			$('#popup').fadeIn("fast");
		});
		
		$('#closeNames').click(function(){
			
			$('#popup').fadeOut("fast");
			
		});
		$('.name_row').click(function(){
            Load();
			var id = $(this).attr('id');
			$(".addressRow").hide();
			$("#"+id+"-addresses").html("");
			$.ajax({
				url: 'inc/ajax/ajax.getAddresses.php',
				type: 'post',
				data: {
					name_set: id,
					name_origin: $('#ret_'+id+'_name_origin').val(), 
					name_id: $('#ret_'+id+'_name_id').val(), 
					name_ctr: $('#ret_'+id+'_name_ctr').val(), 
				},
				success: function(data) {
                    Unload();
					$("#"+id+"-addressRow").show();
					$("#"+id+"-addresses").html(data);
				}
			});
		});
	</script>
	<div class="popupTitle">
	<div style="float:left;"><h4>Found Names</h4></div>
	
	<div id="closeNames" class="closePopup">
		<img src="images/close.png" /> Close
	</div> 
	</div>
	<div class="popupContent">
    <table id="nameLookupTable" class=" sortable" title="" cellspacing="0" style="color:black;">
    <thead>
    <tr>
        <th class="job-id sortable">Origin</th>
        <th class="date sortable">Name</th>
        <th class="job-id sortable">Telephone</th>
        <th class="job-id sortable">Work Phone</th>
        <th class="job-id sortable">Mobile</th>
        <th class="date sortable">Email Address</th>
        <th class="date sortable">Company Name</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $number=0;
    if(isset($GLOBALS['result']->name_search_det->name_search) && count($GLOBALS['result']->name_search_det->name_search) > 1){
        foreach($GLOBALS['result']->name_search_det->name_search as $result_n_ar){
            $set = $result_n_ar->name_id;
            $number = $number+1;
            if($number == 2){
                $class = "dark";
                $number = 0;
            }
            else{
                $class = "light";
            }
            ?>
            <input type="hidden" id="ret_<?php echo $set; ?>_name_origin" value="<?php if(isset($result_n_ar->name_origin)){ echo $result_n_ar->name_origin; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_name_ctr" value="<?php if(isset($result_n_ar->name_ctr)){ echo $result_n_ar->name_ctr; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_name_id" value="<?php if(isset($result_n_ar->name_id)){ echo $result_n_ar->name_id; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_surname" value="<?php if(isset($result_n_ar->surname)){ echo $result_n_ar->surname; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_given_names" value="<?php if(isset($result_n_ar->given_names)){ echo $result_n_ar->given_names; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_pref_title" value="<?php if(isset($result_n_ar->pref_title)){ echo $result_n_ar->pref_title; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_telephone" value="<?php if(isset($result_n_ar->telephone)){ echo $result_n_ar->telephone; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_work_phone" value="<?php if(isset($result_n_ar->work_phone)){ echo $result_n_ar->work_phone; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_mobile_no" value="<?php if(isset($result_n_ar->mobile_no)){ echo $result_n_ar->mobile_no; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_email_address" value="<?php if(isset($result_n_ar->email_address)){ echo $result_n_ar->email_address; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_company_name" value="<?php if(isset($result_n_ar->company_name)){ echo $result_n_ar->company_name; } else { echo ""; } ?>" />
                <tr class="<?php echo $class; ?> name_row" id="<?php echo $set; ?>" title="">
                    <td ><?php if(isset($result_n_ar->name_origin)){ echo $result_n_ar->name_origin; } else { echo ""; } ?></td>
                    <td><?php if(isset($result_n_ar->given_names)){ echo $result_n_ar->given_names; } else { echo ""; } ?> <?php if(isset($result_n_ar->surname)){ echo $result_n_ar->surname; } else { echo ""; } ?></td>
                    <td><?php if(isset($result_n_ar->telephone)){ echo $result_n_ar->telephone; } else { echo ""; } ?></td>
                    <td><?php if(isset($result_n_ar->work_phone)){ echo $result_n_ar->work_phone; } else { echo ""; } ?></td>
                    <td><?php if(isset($result_n_ar->mobile_no)){ echo $result_n_ar->mobile_no; } else { echo ""; } ?></td>
                    <td><?php if(isset($result_n_ar->email_address)){ echo $result_n_ar->email_address; } else { echo ""; } ?></td>
                    <td><?php if(isset($result_n_ar->company_name)){ echo $result_n_ar->company_name; } else { echo ""; } ?></td>
                </tr>
                <tr id="<?php echo $set; ?>-addressRow" style="display:none;" class="addressRow">
                	<td id="<?php echo $set; ?>-addresses" colspan="7">
                    </td>
                </tr>
                <?php
        }
    }
    elseif(isset($GLOBALS['result']->name_search_det->name_search) && count($GLOBALS['result']->name_search_det->name_search) == 1){
        $result_n_ar = $GLOBALS['result']->name_search_det->name_search;
        $set = $result_n_ar->name_id;
        ?>
        <input type="hidden" id="ret_<?php echo $set; ?>_name_origin" value="<?php if(isset($result_n_ar->name_origin)){ echo $result_n_ar->name_origin; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_name_ctr" value="<?php if(isset($result_n_ar->name_ctr)){ echo $result_n_ar->name_ctr; } else { echo ""; } ?>" />
        <input type="hidden" id="ret_<?php echo $set; ?>_name_id" value="<?php if(isset($result_n_ar->name_id)){ echo $result_n_ar->name_id; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_surname" value="<?php if(isset($result_n_ar->surname)){ echo $result_n_ar->surname; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_given_names" value="<?php if(isset($result_n_ar->given_names)){ echo $result_n_ar->given_names; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_pref_title" value="<?php if(isset($result_n_ar->pref_title)){ echo $result_n_ar->pref_title; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_telephone" value="<?php if(isset($result_n_ar->telephone)){ echo $result_n_ar->telephone; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_work_phone" value="<?php if(isset($result_n_ar->work_phone)){ echo $result_n_ar->work_phone; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_mobile_no" value="<?php if(isset($result_n_ar->mobile_no)){ echo $result_n_ar->mobile_no; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_email_address" value="<?php if(isset($result_n_ar->email_address)){ echo $result_n_ar->email_address; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_company_name" value="<?php if(isset($result_n_ar->company_name)){ echo $result_n_ar->company_name; } else { echo ""; } ?>" />
            <tr class="dark name_row"  id="<?php echo $set; ?>" title="">
                <td><?php if(isset($result_n_ar->name_origin)){ echo $result_n_ar->name_origin; } else { echo ""; } ?></td>
                <td><?php if(isset($result_n_ar->given_names)){ echo $result_n_ar->given_names; } else { echo ""; } ?> <?php if(isset($result_n_ar->surname)){ echo $result_n_ar->surname; } else { echo ""; } ?></td>
                <td><?php if(isset($result_n_ar->telephone)){ echo $result_n_ar->telephone; } else { echo ""; } ?></td>
                <td><?php if(isset($result_n_ar->work_phone)){ echo $result_n_ar->work_phone; } else { echo ""; } ?></td>
                <td><?php if(isset($result_n_ar->mobile_no)){ echo $result_n_ar->mobile_no; } else { echo ""; } ?></td>
                <td><?php if(isset($result_n_ar->email_address)){ echo $result_n_ar->email_address; } else { echo ""; } ?></td>
                <td><?php if(isset($result_n_ar->company_name)){ echo $result_n_ar->company_name; } else { echo ""; } ?></td>
            </tr>
            <tr id="<?php echo $set; ?>-addressRow" style="display:none;" class="addressRow">
                	<td id="<?php echo $set; ?>-addresses" colspan="7">
                    </td>
                </tr>
            <?php
    }
    ?>
    </tbody>
    </table>
    </div>

<?php
}
?>
