<?php
if(isset($GLOBALS['result']->address_list->address_lookup_det) && count($GLOBALS['result']->address_list->address_lookup_det) >0){
	?>
    <script type="text/javascript">
		$(document).ready(function(){
			$("#closeAddresses").click(function(){
				var name_id = "<?php echo $_POST['name_set']; ?>";
				$("#"+name_id+"-addressRow").toggle();
				$("#"+name_id+"-addresses").html("");
			});

		    $('.address_row').click(function () {
		        var id = "";
				id = $(this).attr('id');
				$('#same').val('i');
				$('#i_cno').val($('#ret_'+id+'_house_number').val());
				$('#i_cfno').val($('#ret_'+id+'_house_suffix').val());
				$('#i_cstreet').val($('#ret_'+id+'_street_name').val());
				$('#i_ctype').val($('#ret_'+id+'_street_type').val());
				$('#i_csuburb').val($('#ret_'+id+'_locality').val());
				$('#cust_address_id').val($('#ret_' + id + '_address_id').val());
				$('#cust_address_ctr').val($('#ret_'+id+'_address_ctr').val());
				
				var name_id = "<?php echo $_POST['name_set']; ?>";
				
				$('#pref_title').val($('#ret_'+name_id+'_pref_title').val());
				$('#surname').val($('#ret_'+name_id+'_surname').val());
				$('#given').val($('#ret_'+name_id+'_given_names').val());
				$('#cust_phone').val($('#ret_'+name_id+'_telephone').val());
				$('#cust_work').val($('#ret_'+name_id+'_work_phone').val());
				$('#cust_mobile').val($('#ret_'+name_id+'_mobile_no').val());
				$('#email_address').val($('#ret_'+name_id+'_email_address').val());
				$('#company').val($('#ret_'+name_id+'_company_name').val());
				$('#name_id').val($('#ret_'+name_id+'_name_id').val());
				$('#name_ctr').val($('#ret_'+name_id+'_name_ctr').val());
				$('#name_origin').val($('#ret_'+name_id+'_name_origin').val());
				
				$('#popup').fadeOut("fast");
			});
            
            $("#continue").click(function(){
                var name_id = "<?php echo $_POST['name_set']; ?>";
				
				    $('#pref_title').val($('#ret_'+name_id+'_pref_title').val());
				    $('#surname').val($('#ret_'+name_id+'_surname').val());
				    $('#given').val($('#ret_'+name_id+'_given_names').val());
				    $('#cust_phone').val($('#ret_'+name_id+'_telephone').val());
				    $('#cust_work').val($('#ret_'+name_id+'_work_phone').val());
				    $('#cust_mobile').val($('#ret_'+name_id+'_mobile_no').val());
				    $('#email_address').val($('#ret_'+name_id+'_email_address').val());
				    $('#company').val($('#ret_'+name_id+'_company_name').val());
				    $('#name_id').val($('#ret_'+name_id+'_name_id').val());
				    $('#name_ctr').val($('#ret_'+name_id+'_name_ctr').val());
				    $('#name_origin').val($('#ret_'+name_id+'_name_origin').val());
				
                $("#popup").html("");
                
			    $('#popup').fadeOut("fast");
            });
		});
	</script>
    <h1>Found Addresses<span  class="closePopup"><img src="images/delete-icon.png" /> Close</span></h1>
	<div>
	<input type="text" id="addressLookup" class="tableSearch" placeholder="Search..." />
    <table id="addressLookupTable" class=" sortable" title="" cellspacing="0" style="color:black;">
    <thead>
    <tr>
        <!--<th class="job-id sortable">Unit/Flat Number</th>-->
        <th class="job-id sortable">Origin</th>
        <th class="job-id sortable">House Number</th>
        <th class="job-id sortable">Street Name</th>
        <th class="job-id sortable">Street Type</th>
        <th class="job-id sortable">Suburb</th>
        <th class="date sortable">Postcode</th>
    </tr>
    </thead>
    <tbody>
        <tr class="dark" id="continue" title="">
            <td colspan="6"  style="text-align:center;font-weight:bold; padding:10px;">Continue without address</td>
        </tr>
    <?php
    $number=0;
    if(isset($GLOBALS['result']->address_list->address_lookup_det) && count($GLOBALS['result']->address_list->address_lookup_det) > 1){
        foreach($GLOBALS['result']->address_list->address_lookup_det as $result_n_ar){
            $set = $result_n_ar->address_id;
            $number = $number+1;
            if($number == 2){
                $class = "dark";
                $number = 0;
            }
            else{
                $class = "light";
            }
            ?>
            <input type="hidden" id="ret_<?php echo $set; ?>_address_id" value="<?php if(isset($result_n_ar->address_id)){ echo $result_n_ar->address_id; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_house_suffix" value="<?php if(isset($result_n_ar->house_number) && isset($result_n_ar->house_suffix) && $result_n_ar->house_suffix != $result_n_ar->house_number && strpos($result_n_ar->house_suffix, "-") == false && !ctype_alnum($result_n_ar->house_suffix)){ $flat = explode("/", $result_n_ar->house_suffix); echo $flat[0]; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_house_number" value="<?php if(isset($result_n_ar->house_suffix) && strpos($result_n_ar->house_suffix, "-") !== false || ctype_alnum($result_n_ar->house_suffix)) echo $result_n_ar->house_suffix; else echo $result_n_ar->house_number; ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_street_name" value="<?php if(isset($result_n_ar->street_name)){ echo $result_n_ar->street_name; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_street_type" value="<?php if(isset($result_n_ar->street_type)){ echo $result_n_ar->street_type; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_locality" value="<?php if(isset($result_n_ar->locality)){ echo $result_n_ar->locality; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_postcode" value="<?php if(isset($result_n_ar->postcode)){ echo $result_n_ar->postcode; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_property_no" value="<?php if(isset($result_n_ar->property_no)){ echo $result_n_ar->property_no; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_address_ctr" value="<?php if(isset($result_n_ar->address_ctr)){ echo $result_n_ar->address_ctr; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_confidential" value="<?php if(isset($result_n_ar->confidential)){ echo $result_n_ar->confidential; } else { echo ""; } ?>" />
                <tr class="<?php echo $class; ?> address_row" id="<?php echo $set; ?>" title="">
                    <td><?php if(isset($result_n_ar->origin_name)){ echo $result_n_ar->origin_name; } else { echo ""; } ?></td>
                    <!--<td><?php if(isset($result_n_ar->house_number) && isset($result_n_ar->house_suffix) && $result_n_ar->house_suffix != $result_n_ar->house_number && strpos($result_n_ar->house_suffix, "-") == false && !ctype_alnum($result_n_ar->house_suffix)){ $flat = explode("/", $result_n_ar->house_suffix); echo $flat[0]; } ?></td>-->
                    <td><?php if(isset($result_n_ar->house_suffix) && strpos($result_n_ar->house_suffix, "-") !== false || ctype_alnum($result_n_ar->house_suffix)) echo $result_n_ar->house_suffix; else echo $result_n_ar->house_suffix; ?></td>
                    <td><?php if(isset($result_n_ar->street_name)){ echo $result_n_ar->street_name; } else { echo ""; } ?></td>
                    <td><?php if(isset($result_n_ar->street_type)){ echo $result_n_ar->street_type; } else { echo ""; } ?></td>
                    <td><?php if(isset($result_n_ar->locality)){ echo $result_n_ar->locality; } else { echo ""; } ?></td>
                    <td><?php if(isset($result_n_ar->postcode)){ echo $result_n_ar->postcode; } else { echo ""; } ?></td>
                </tr>
                <?php
        }
    }
    elseif(isset($GLOBALS['result']->address_list->address_lookup_det) && count($GLOBALS['result']->address_list->address_lookup_det) == 1){
        $result_n_ar = $GLOBALS['result']->address_list->address_lookup_det;
        $set = $result_n_ar->address_id;
        ?>
         <input type="hidden" id="ret_<?php echo $set; ?>_address_id" value="<?php if(isset($result_n_ar->address_id)){ echo $result_n_ar->address_id; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_house_suffix" value="<?php if(isset($result_n_ar->house_number) && isset($result_n_ar->house_suffix) && $result_n_ar->house_suffix != $result_n_ar->house_number && strpos($result_n_ar->house_suffix, "-") == false && !ctype_alnum($result_n_ar->house_suffix)){ $flat = explode("/", $result_n_ar->house_suffix); echo $flat[0]; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_house_number" value="<?php if(isset($result_n_ar->house_suffix) && strpos($result_n_ar->house_suffix, "-") !== false || ctype_alnum($result_n_ar->house_suffix)) echo $result_n_ar->house_suffix; else echo $result_n_ar->house_number; ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_street_name" value="<?php if(isset($result_n_ar->street_name)){ echo $result_n_ar->street_name; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_street_type" value="<?php if(isset($result_n_ar->street_type)){ echo $result_n_ar->street_type; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_locality" value="<?php if(isset($result_n_ar->locality)){ echo $result_n_ar->locality; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_postcode" value="<?php if(isset($result_n_ar->postcode)){ echo $result_n_ar->postcode; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_property_no" value="<?php if(isset($result_n_ar->property_no)){ echo $result_n_ar->property_no; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_address_ctr" value="<?php if(isset($result_n_ar->address_ctr)){ echo $result_n_ar->address_ctr; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_confidential" value="<?php if(isset($result_n_ar->confidential)){ echo $result_n_ar->confidential; } else { echo ""; } ?>" />
            <tr class="dark address_row"  id="<?php echo $set; ?>" title="">
                <td><?php if(isset($result_n_ar->origin_name)){ echo $result_n_ar->origin_name; } else { echo ""; } ?></td>
                <!--<td><?php if(isset($result_n_ar->house_number) && isset($result_n_ar->house_suffix) && $result_n_ar->house_suffix != $result_n_ar->house_number && strpos($result_n_ar->house_suffix, "-") == false && !ctype_alnum($result_n_ar->house_suffix)){ $flat = explode("/", $result_n_ar->house_suffix); echo $flat[0]; } ?></td>-->
                    <td><?php if(isset($result_n_ar->house_suffix) && strpos($result_n_ar->house_suffix, "-") !== false || ctype_alnum($result_n_ar->house_suffix)) echo $result_n_ar->house_suffix; else echo $result_n_ar->house_suffix; ?></td>
                <td><?php if(isset($result_n_ar->street_name)){ echo $result_n_ar->street_name; } else { echo ""; } ?></td>
                <td><?php if(isset($result_n_ar->street_type)){ echo $result_n_ar->street_type; } else { echo ""; } ?></td>
                <td><?php if(isset($result_n_ar->locality)){ echo $result_n_ar->locality; } else { echo ""; } ?></td>
                <td><?php if(isset($result_n_ar->postcode)){ echo $result_n_ar->postcode; } else { echo ""; } ?></td>
            </tr>
            <?php
    }
    ?>
    </tbody>
    </table>
    </div>
<?php
}
else{
	?>
    <script type="text/javascript">
        $(document).ready(function () {
			$("#yes<?php echo $_POST['name_set']; ?>").click(function(){
				var id = "<?php echo $_POST['name_set']; ?>";
				$('#pref_title').val($('#ret_'+id+'_pref_title').val());
				$('#surname').val($('#ret_'+id+'_surname').val());
				$('#given').val($('#ret_'+id+'_given_names').val());
				$('#cust_phone').val($('#ret_'+id+'_telephone').val());
				$('#cust_work').val($('#ret_'+id+'_work_phone').val());
				$('#cust_mobile').val($('#ret_'+id+'_mobile_no').val());
				$('#email_address').val($('#ret_'+id+'_email_address').val());
				$('#company').val($('#ret_'+id+'_company_name').val());
				$('#name_id').val($('#ret_'+id+'_name_id').val());
				$('#name_ctr').val($('#ret_'+id+'_name_ctr').val());
				$('#name_origin').val($('#ret_'+id+'_name_origin').val());
				$("#popup").fadeOut("fast");
			});
		});
	</script>
    <h1>No Addresses<span  class="closePopup"><img src="images/delete-icon.png" /> Close</span></h1>
	<div>
        There were no addresses found. Would you like to use this name?<br />
        <input type="button" value="Yes" id="yes<?php echo $_POST['name_set']; ?>" />
    </div>
    <?php	
}
?>

