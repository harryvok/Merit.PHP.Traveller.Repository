<?php
if(isset($GLOBALS['result']->address_list->address_lookup_det) && count($GLOBALS['result']->address_list->address_lookup_det) >0){
	?>
    <script type="text/javascript">
	 $(document).ready(function(){
		$('.address_row').click(function(){
			var id = $(this).attr('id');
			$('#same').val('i');
			changeLocationType();
			$('#i_cno').val($('#ret_'+id+'_house_number').val());
			$('#i_cfno').val($('#ret_'+id+'_house_suffix').val());
			$('#i_cstreet').val($('#ret_'+id+'_street_name').val());
			$('#i_ctype').val($('#ret_'+id+'_street_type').val());
			$('#i_csuburb').val($('#ret_'+id+'_locality').val());
			$('#cust_address_id').val($('#ret_' + id + '_address_id').val());
			$('#cust_address_ctr').val($('#ret_' + id + '_address_ctr').val());
			$('#i_cpostcode').val($('#ret_' + id + '_postcode').val());
			$('#i_cpropertynumber').val($('#ret_' + id + '_property_no').val());
			$("#i_ctype").textinput('enable');
			$("#i_csuburb").textinput('enable');
			$('#popup').popup("close");
			
		});
        
        $("#continue").click(function(){
                $('#popup').popup("close");
            });
	 });
	</script>
	<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left">Close</a>
    <div data-role="header" data-tap-toggle="false">
        <h1>Found Addresses</h1>
    </div>
    <div data-role="content">
    	<p>
        <ul data-role="listview" data-filter="true" data-filter-placeholder="Search addresses..." data-inset="true">
            <li id="continue"><a>Continue without address</a></li>
    <?php    
    $i = 0;
    if(isset($GLOBALS['result']->address_list->address_lookup_det) && count($GLOBALS['result']->address_list->address_lookup_det) > 1){
        foreach($GLOBALS['result']->address_list->address_lookup_det as $result_n_ar){
            $i++;
            $set = "addressrow_".$i.$result_n_ar->address_id.$result_n_ar->address_ctr;
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
                <li class=" address_row" id="<?php echo $set; ?>">
                	<a>
                    <?php if(isset($result_n_ar->origin_name) && strlen($result_n_ar->origin_name) > 0){ ?><p><b>Origin:</b> <?php echo $result_n_ar->origin_name."</p>"; } else { echo ""; } ?>
                    <?php if(isset($result_n_ar->house_number) && isset($result_n_ar->house_suffix) && $result_n_ar->house_suffix != $result_n_ar->house_number && strpos($result_n_ar->house_suffix, "-") == false && !ctype_alnum($result_n_ar->house_suffix)){
                              $flat = explode("/", $result_n_ar->house_suffix); 
                             // echo $result_n_ar->house_suffix;
                    } ?>
                    <?php if(isset($result_n_ar->house_suffix) && strpos($result_n_ar->house_suffix, "-") !== false || ctype_alnum($result_n_ar->house_suffix)){ ?>
                              <p><b>House Number:</b> <?php /*echo $result_n_ar->house_suffix;*/  echo $result_n_ar->house_suffix; ?>
                    <?php   }else{ ?>
                              
                              <p><b>House Number:</b><?php echo $result_n_ar->house_suffix;?> 
                    <?php }?>
                   <?php if(isset($result_n_ar->street_name) && strlen($result_n_ar->street_name) > 0){ ?><p><b>Street Name:</b> <?php echo $result_n_ar->street_name."</p>"; } else { echo ""; } ?>
                    <?php if(isset($result_n_ar->street_type) && strlen($result_n_ar->street_type) > 0){ ?><p><b>Street Type:</b> <?php echo $result_n_ar->street_type."</p>"; } else { echo ""; } ?>
                    <?php if(isset($result_n_ar->locality) && strlen($result_n_ar->locality) > 0){ ?><p><b>Suburb:</b> <?php echo $result_n_ar->locality."</p>"; } else { echo ""; } ?>
                    <?php  if(isset($result_n_ar->postcode) && strlen($result_n_ar->postcode) > 0){ ?><p><b>Postcode:</b> <?php echo $result_n_ar->postcode."</p>"; } else { echo ""; } ?>              
                    </a>
                  </li>
                <?php
				$i++;
        }
    }
    elseif(isset($GLOBALS['result']->address_list->address_lookup_det) && count($GLOBALS['result']->address_list->address_lookup_det) == 1){
        $result_n_ar = $GLOBALS['result']->address_list->address_lookup_det;
        $i++;
        $set = $set = "addressrow_".$i.$result_n_ar->address_id.$result_n_ar->address_ctr;
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
             <li class="address_row" id="<?php echo $set; ?>">
             	<a>
                 <?php if(isset($result_n_ar->origin_name) && strlen($result_n_ar->origin_name) > 0){ ?><p><b>Origin:</b> <?php echo $result_n_ar->origin_name."</p>"; } else { echo ""; } ?>
                 <?php if(isset($result_n_ar->house_number) && isset($result_n_ar->house_suffix) && $result_n_ar->house_suffix != $result_n_ar->house_number && strpos($result_n_ar->house_suffix, "-") == false && !ctype_alnum($result_n_ar->house_suffix)){ 
                           $flat = explode("/", $result_n_ar->house_suffix); 
                           /*echo $result_n_ar->house_suffix;*/
                       } ?>
                    <?php if(isset($result_n_ar->house_suffix) && strpos($result_n_ar->house_suffix, "-") !== false || ctype_alnum($result_n_ar->house_suffix)){ ?>
                              <p><b>House Number:</b> <?php /*echo $result_n_ar->house_suffix;*/  echo $result_n_ar->house_suffix; ?>
                    <?php   }else{ ?>
                              
                              <p><b>House Number:</b><?php echo $result_n_ar->house_suffix;?> 
                    <?php }?>
                   <?php if(isset($result_n_ar->street_name) && strlen($result_n_ar->street_name) > 0){ ?><p><b>Street Name:</b> <?php echo $result_n_ar->street_name."</p>"; } else { echo ""; } ?>
                    <?php if(isset($result_n_ar->street_type) && strlen($result_n_ar->street_type) > 0){ ?><p><b>Street Type:</b> <?php echo $result_n_ar->street_type."</p>"; } else { echo ""; } ?>
                    <?php if(isset($result_n_ar->locality) && strlen($result_n_ar->locality) > 0){ ?><p><b>Suburb:</b> <?php echo $result_n_ar->locality."</p>"; } else { echo ""; } ?>
                    <?php  if(isset($result_n_ar->postcode) && strlen($result_n_ar->postcode) > 0){ ?><p><b>Postcode:</b> <?php echo $result_n_ar->postcode."</p>"; } else { echo ""; } ?>               
                   </a>
                  </li>
            <?php
    }
    ?>
    </ul>
</div>


<?php
}
?>
