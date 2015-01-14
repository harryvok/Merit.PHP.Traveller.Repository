<?php
if(isset($GLOBALS['result']->address_list->address_lookup_det) && count($GLOBALS['result']->address_list->address_lookup_det) >0){
	?>
    <script type="text/javascript">
	 $(document).ready(function(){
		$('.address_row').click(function(){
		    var id = "";
		    id = $(this).attr('id');
		    $('#same').val('i');

            /* What to parse with regEx */
                var tocheck = $('#ret_' + id + '_house_suffix').val();

                /* Parse to variables */
                var prefixOut = tocheck.match(/(\D{0,7})\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})\s?[/]?\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})$/)[1];
                var unitFromOut = tocheck.match(/(\D{0,7})\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})\s?[/]?\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})$/)[2];
                var unitToOut = tocheck.match(/(\D{0,7})\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})\s?[/]?\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})$/)[3];
                var unitCodeOut = tocheck.match(/(\D{0,7})\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})\s?[/]?\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})$/)[4];
                var streetFromOut = tocheck.match(/(\D{0,7})\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})\s?[/]?\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})$/)[5];
                var streetToOut = tocheck.match(/(\D{0,7})\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})\s?[/]?\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})$/)[6];
                var streetCodeOut = tocheck.match(/(\D{0,7})\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})\s?[/]?\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})$/)[7];

             /*   alert("Prefix: " + prefixOut);
                alert("Unit From: " + unitFromOut);
                alert("Unit To: " + unitToOut);
                alert("Unit Code: " + unitCodeOut);
                alert("Street From: " + streetFromOut);
                alert("Street To: " + streetToOut);
                alert("Street Code: " + streetCodeOut); */
                
                /* Catch exceptions */
                var unitNumber;
                var streetNumber;

                /* If prefix is empty */
                if (prefixOut == "") {

                    /* Set Unit values to Street values */
                    if (streetFromOut == "") {
                        streetFromOut = unitFromOut;
                        streetToOut = unitToOut;
                        streetCodeOut = unitCodeOut;
                        unitFromOut = "";
                        unitToOut = "";
                        unitCodeOut = "";
                    }
                }

                /* So "-"'s aren't added to empty fields */
                if (unitFromOut != "") {
                    if (unitToOut != "") {
                        unitNumber = unitFromOut + '-' + unitToOut;
                    }
                    else {
                        unitNumber = unitFromOut;
                    }
                }
                if (streetFromOut != "") {
                    if (streetToOut != "") {
                        streetNumber = streetFromOut + '-' + streetToOut;
                    }
                    else {
                        streetNumber = streetFromOut;
                    }
                }

                /* If no unit code the regEx will take this "/" from string, clear it */
                if (unitCodeOut == "/") {
                    unitCodeOut = "";
                }


                $('#prefixholder').val(prefixOut);
                var poprefix = $('#prefixholder').val().toUpperCase();

                /* Flat Number  */  $('#i_cfno').val(unitNumber);
                /* Flat Code    */  $('#i_cfcode').val(unitCodeOut);
                /* House Number */  $('#i_cno').val(streetNumber);
                /* House Suffix */  $('#i_cscode').val(streetCodeOut);

                /* Street Name */ $('#i_cstreet').val($('#ret_' + id + '_street_name').val());
                /* Compare */ $('#comparei_cstreet').val($('#ret_' + id + '_street_name').val());

                /* Street Type */ $('#i_ctype').val($('#ret_' + id + '_street_type').val());
                /* Compare */ $('#comparei_ctype').val($('#ret_' + id + '_street_type').val());

                /* Suburb */      $('#i_csuburb').val($('#ret_' + id + '_locality').val());
                /* Compare */    $('#comparei_csuburb').val($('#ret_' + id + '_locality').val());

                /* Postcode */    $('#i_cpostcode').val($('#ret_' + id + '_postcode').val());
                /* Compare */    $('#comparei_cpostcode').val($('#ret_' + id + '_postcode').val());

                /* Prop No. */    $('#i_cpropertynumber').val($('#ret_' + id + '_property_no').val());
                /* Compare */    $('#comparei_cpropertynumber').val($('#ret_' + id + '_property_no').val());

                /* Cust add id */ $('#cust_address_id').val($('#ret_' + id + '_address_id').val());
                    /* Compare */ $('#comparecust_address_id').val($('#ret_' + id + '_address_id').val());

                /* Something */   $('#cust_address_ctr').val($('#ret_' + id + '_address_ctr').val());
                    /* Compare */   $('#comparecust_address_ctr').val($('#ret_' + id + '_address_ctr').val());


                /* Set the old values */
                $('#old_custid').val($('#ret_' + id + '_address_id').val());
                $('#old_cno').val($('#ret_' + id + '_house_number').val());
                $('#old_suffix').val($('#ret_' + id + '_house_suffix').val());
                $('#old_cstreet').val($('#ret_' + id + '_street_name').val());
                $('#old_ctype').val($('#ret_' + id + '_street_type').val());
                $('#old_csuburb').val($('#ret_' + id + '_locality').val());
                $('#old_cpostcode').val($('#ret_' + id + '_postcode').val());
                $('#old_cpropertynumber').val($('#ret_' + id + '_property_no').val());
                              
                /* Rules */
                $("#i_cpostcode").prop("disabled", false).prop("readonly", true).removeClass("ui-disabled").textInputState("enable");
                $("#i_cpropertynumber").prop("disabled", false).prop("readonly", true).removeClass("ui-disabled").textInputState("enable");
                
                var name_id = "<?php echo $_POST['name_set']; ?>";
               /* $('#pref_title').val($('#ret_' + name_id + '_pref_title').val());
                $('#surname').val($('#ret_' + name_id + '_surname').val());
                $('#given').val($('#ret_' + name_id + '_given_names').val());
                $('#cust_phone').val($('#ret_' + name_id + '_telephone').val());
                $('#cust_work').val($('#ret_' + name_id + '_work_phone').val());
                $('#cust_mobile').val($('#ret_' + name_id + '_mobile_no').val());
                $('#email_address').val($('#ret_' + name_id + '_email_address').val());
                $('#company').val($('#ret_' + name_id + '_company_name').val());
                $('#name_id').val($('#ret_' + name_id + '_name_id').val());
                $('#name_ctr').val($('#ret_' + name_id + '_name_ctr').val());
                $('#name_origin').val($('#ret_' + name_id + '_name_origin').val()); */
		    //$('#old_name_id').val($('#ret_' + name_id + '_name_id').val());
                $('#old_pref_title').val($('#ret_' + name_id + '_pref_title').val());
                $('#old_given').val($('#ret_' + name_id + '_given_names').val());
                $('#old_surname').val($('#ret_' + name_id + '_surname').val());
                $('#old_cust_phone').val($('#ret_' + name_id + '_telephone').val());
                $('#old_cust_work').val($('#ret_' + name_id + '_work_phone').val());
                $('#old_cust_mobile').val($('#ret_' + name_id + '_mobile_no').val());
                $('#old_email_address').val($('#ret_' + name_id + '_email_address').val());
                $('#old_company').val($('#ret_' + name_id + '_company_name').val());


                if ($("#i_ctype").val().length > 0) {
                    $("#i_ctype").prop("disabled", false).prop("readonly", true).removeClass("ui-disabled").textInputState("enable");
                }
                if ($("#i_csuburb").val().length > 0) {
                    $("#i_csuburb").prop("disabled", false).prop("readonly", true).removeClass("ui-disabled").textInputState("enable");
                }
                if ($('#ret_' + name_id + '_name_id').val() > 0 || $('#ret_' + name_id + '_name_id').val() != "0" || $('#ret_' + name_id + '_name_id').val() != 0) {
                    $("#CustSummary").removeAttr("disabled")
                }
                if ($('#ret_' + id + '_address_id').val() > 0 || $('ret_' + id + '_address_id').val() != "0" || $('ret_' + id + '_address_id').val() != 0) {
                    $("#CustAddSummary").removeAttr("disabled")
                }

                if ($.trim(poprefix) == "PO BOX" || $.trim(poprefix) == "DX") {
                    // alert("Detected that selection was PO or DX");
                    $('#same').val('o');
                    $('#same').selectmenu('refresh');
                    $('#inside_ca').hide();
                    $('#outside_ca').show();

                    /* Street Name */ $('#o_cstreet').val($('#ret_' + id + '_street_name').val());
                    /* Street Type */ $('#o_ctype').val($('#ret_' + id + '_street_type').val());
                    /* Suburb */      $('#o_csuburb').val($('#ret_' + id + '_locality').val());
                    /* Postcode */    $('#o_cpostcode').val($('#ret_' + id + '_postcode').val());
                    /* Prop No. */    $('#o_cpobox').val(prefixOut + " " + unitFromOut + unitCodeOut);
                    /* Cust add id */ $('#cust_address_id').val($('#ret_' + id + '_address_id').val());
                    /* Something */   $('#cust_address_ctr').val($('#ret_' + id + '_address_ctr').val());
                }


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
             <input type="hidden" id="ret_<?php echo $set; ?>_house_suffix" value="<?php if(isset($result_n_ar->house_suffix)){ echo $result_n_ar->house_suffix; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_house_number" value="<?php if(isset($result_n_ar->house_number)) echo $result_n_ar->house_number; ?>" />
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
