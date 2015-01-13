   
 <?php
        if(isset($GLOBALS['result']->address_list->address_lookup_det) && count($GLOBALS['result']->address_list->address_lookup_det) > 0){
    ?>

    <script type="text/javascript">
        $(document).ready(function () {

            $("#closeAddresses").click(function () {
                var name_id = "<?php echo $_POST['name_set']; ?>";
                $("#" + name_id + "-addressRow").toggle();
                $("#" + name_id + "-addresses").html("");
            });

            /* On click Trigger this function */
            $('.address_row').click(function () {                
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
                

                alert("Prefix: " + prefixOut);
                alert("Number: " + unitFromOut);
                alert("Code: " + unitCodeOut);

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
                $('#pref_title').val($('#ret_' + name_id + '_pref_title').val());
                $('#surname').val($('#ret_' + name_id + '_surname').val());
                $('#given').val($('#ret_' + name_id + '_given_names').val());
                $('#cust_phone').val($('#ret_' + name_id + '_telephone').val());
                $('#cust_work').val($('#ret_' + name_id + '_work_phone').val());
                $('#cust_mobile').val($('#ret_' + name_id + '_mobile_no').val());
                $('#email_address').val($('#ret_' + name_id + '_email_address').val());
                $('#company').val($('#ret_' + name_id + '_company_name').val());
                $('#name_id').val($('#ret_' + name_id + '_name_id').val());
                $('#name_ctr').val($('#ret_' + name_id + '_name_ctr').val());
                $('#name_origin').val($('#ret_' + name_id + '_name_origin').val());
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

                if ($.trim(prefixOut) == "PO Box" || $.trim(prefixOut) == "DX") {
                    alert("Detected that selection was PO or DX");
                }

                $('#popup').fadeOut("fast");
            });

            $("#continue").click(function () {
                var name_id = "<?php echo $_POST['name_set']; ?>";

		        $('#pref_title').val($('#ret_' + name_id + '_pref_title').val());
		        $('#surname').val($('#ret_' + name_id + '_surname').val());
		        $('#given').val($('#ret_' + name_id + '_given_names').val());
		        $('#old_name').val($('#ret_' + name_id + '_given_names').val());
		        $('#old_surname').val($('#ret_' + name_id + '_surname').val());
		        $('#cust_phone').val($('#ret_' + name_id + '_telephone').val());
		        $('#cust_work').val($('#ret_' + name_id + '_work_phone').val());
		        $('#cust_mobile').val($('#ret_' + name_id + '_mobile_no').val());
		        $('#email_address').val($('#ret_' + name_id + '_email_address').val());
		        $('#company').val($('#ret_' + name_id + '_company_name').val());
		        $('#name_id').val($('#ret_' + name_id + '_name_id').val());
		        $('#name_ctr').val($('#ret_' + name_id + '_name_ctr').val());
		        $('#name_origin').val($('#ret_' + name_id + '_name_origin').val());
		        //$('#old_name_id').val($('#ret_' + name_id + '_name_id').val());
		        $('#old_pref_title').val($('#ret_' + name_id + '_pref_title').val());
		        $('#old_given').val($('#ret_' + name_id + '_given_names').val());
		        $('#old_surname').val($('#ret_' + name_id + '_surname').val());
		        $('#old_cust_phone').val($('#ret_' + name_id + '_telephone').val());
		        $('#old_cust_work').val($('#ret_' + name_id + '_work_phone').val());
		        $('#old_cust_mobile').val($('#ret_' + name_id + '_mobile_no').val());
		        $('#old_email_address').val($('#ret_' + name_id + '_email_address').val());
		        $('#old_company').val($('#ret_' + name_id + '_company_name').val());
		        if ($('#ret_' + name_id + '_name_id').val() > 0 || $('#ret_' + name_id + '_name_id').val() != "0" || $('#ret_' + name_id + '_name_id').val() != 0) {
		            $("#CustSummary").removeAttr("disabled")
		        }
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
    $i = 0;
    if(isset($GLOBALS['result']->address_list->address_lookup_det) && count($GLOBALS['result']->address_list->address_lookup_det) > 1){
        foreach($GLOBALS['result']->address_list->address_lookup_det as $result_n_ar){
            $i++;
            $set = "addressrow_".$i.$result_n_ar->address_id.$result_n_ar->address_ctr;
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
            <input type="hidden" id="ret_<?php echo $set; ?>_house_suffix" value="<?php if(isset($result_n_ar->house_suffix)){ echo $result_n_ar->house_suffix; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_house_number" value="<?php if(isset($result_n_ar->house_number)) echo $result_n_ar->house_number; ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_street_name" value="<?php if(isset($result_n_ar->street_name)){ echo $result_n_ar->street_name; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_street_type" value="<?php if(isset($result_n_ar->street_type)){ echo $result_n_ar->street_type; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_locality" value="<?php if(isset($result_n_ar->locality)){ echo $result_n_ar->locality; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_postcode" value="<?php if(isset($result_n_ar->postcode)){ echo $result_n_ar->postcode; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_property_no" value="<?php if(isset($result_n_ar->property_no)){ echo $result_n_ar->property_no; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_address_ctr" value="<?php if(isset($result_n_ar->address_ctr)){ echo $result_n_ar->address_ctr; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_confidential" value="<?php if(isset($result_n_ar->confidential)){ echo $result_n_ar->confidential; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_origin_code" value="<?php if(isset($result_n_ar->origin_code)){ echo $result_n_ar->origin_code; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_origin_name" value="<?php if(isset($result_n_ar->origin_name)){ echo $result_n_ar->origin_name; } else { echo ""; } ?>" />
                <tr class="<?php echo $class; ?> address_row" id="<?php echo $set; ?>" title="">
                    <td><?php if(isset($result_n_ar->origin_name)){ echo $result_n_ar->origin_name; } else { echo ""; } ?></td>                    
                    <td><?php if(isset($result_n_ar->house_suffix)){ echo $result_n_ar->house_suffix; } else { echo ""; } ?></td>
                    <td><?php if(isset($result_n_ar->street_name)){ echo $result_n_ar->street_name; } else { echo ""; } ?></td>
                    <td><?php if(isset($result_n_ar->street_type)){ echo $result_n_ar->street_type; } else { echo ""; } ?></td>
                    <td><?php if(isset($result_n_ar->locality)){ echo $result_n_ar->locality; } else { echo ""; } ?></td>
                    <td><?php if(isset($result_n_ar->postcode)){ echo $result_n_ar->postcode; } else { echo ""; } ?></td>
                </tr>
                <?php unset($flat);
        }
    }
    elseif(isset($GLOBALS['result']->address_list->address_lookup_det) && count($GLOBALS['result']->address_list->address_lookup_det) == 1){
        $result_n_ar = $GLOBALS['result']->address_list->address_lookup_det;
        $i++;
        $set = $set = "addressrow_".$i.$result_n_ar->address_id.$result_n_ar->address_ctr;
        ?>

             <!-- Suffix Code -->
            <?php
            
            if(isset($result_n_ar->house_number)) {
                if($result_n_ar->house_suffix == $result_n_ar->house_number){
                    $flat[1] =  $result_n_ar->house_suffix;
                } 
                else {
                    $flat[1] =  $result_n_ar->house_suffix;
                    if ($result_n_ar->house_suffix == ""){
                        $flat[1] = $result_n_ar->house_number;
                    }
                }
            }
                                 
            if(isset($result_n_ar->house_suffix)  && !ctype_alnum($result_n_ar->house_suffix)){ 
               if(strpos($result_n_ar->house_suffix, "/") == true){$flat = explode("/", $result_n_ar->house_suffix);} 
               else if(strpos($result_n_ar->house_suffix, ",") == true){$flat = explode(",", $result_n_ar->house_suffix);}
            }
            
            ?>  
                    <input type="hidden" id="ret_<?php echo $set; ?>_unitno" value="<?php echo $flat[0]; ?>" />
                    <input type="hidden" id="ret_<?php echo $set; ?>_houseno" value="<?php echo $flat[1]."".$flat[2]."".$flat[3]; ?>" />

            <input type="hidden" id="ret_<?php echo $set; ?>_address_id" value="<?php if(isset($result_n_ar->address_id)){ echo $result_n_ar->address_id; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_house_suffix" value="<?php if(isset($result_n_ar->house_suffix)){ echo $result_n_ar->house_suffix; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_house_number" value="<?php if(isset($result_n_ar->house_number)) echo $result_n_ar->house_number; ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_street_name" value="<?php if(isset($result_n_ar->street_name)){ echo $result_n_ar->street_name; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_street_type" value="<?php if(isset($result_n_ar->street_type)){ echo $result_n_ar->street_type; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_locality" value="<?php if(isset($result_n_ar->locality)){ echo $result_n_ar->locality; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_postcode" value="<?php if(isset($result_n_ar->postcode)){ echo $result_n_ar->postcode; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_property_no" value="<?php if(isset($result_n_ar->property_no)){ echo $result_n_ar->property_no; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_address_ctr" value="<?php if(isset($result_n_ar->address_ctr)){ echo $result_n_ar->address_ctr; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>confidential" value="<?php if(isset($result_n_ar->confidential)){ echo $result_n_ar->confidential; } else { echo ""; } ?>" />
            <tr class="<?php echo $class; ?> address_row" id="<?php echo $set; ?>" title="">
                <td><?php if(isset($result_n_ar->origin_name)){ echo $result_n_ar->origin_name; } else { echo ""; } ?></td>
                <td><?php if(isset($result_n_ar->house_suffix)){ echo $result_n_ar->house_suffix; } else { echo ""; } ?></td>
                <td><?php if(isset($result_n_ar->street_name)){ echo $result_n_ar->street_name; } else { echo ""; } ?></td>
                <td><?php if(isset($result_n_ar->street_type)){ echo $result_n_ar->street_type; } else { echo ""; } ?></td>
                <td><?php if(isset($result_n_ar->locality)){ echo $result_n_ar->locality; } else { echo ""; } ?></td>
                <td><?php if(isset($result_n_ar->postcode)){ echo $result_n_ar->postcode; } else { echo ""; } ?></td>
            </tr>
            <?php unset($flat);
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
            $("#yes<?php echo $_POST['name_set']; ?>").click(function () {
                //alert("ok");
                var id = "<?php echo $_POST['name_set']; ?>";
                $('#pref_title').val($('#ret_' + id + '_pref_title').val());
                $('#surname').val($('#ret_' + id + '_surname').val());
                $('#given').val($('#ret_' + id + '_given_names').val());
                $('#cust_phone').val($('#ret_' + id + '_telephone').val());
                $('#cust_work').val($('#ret_' + id + '_work_phone').val());
                $('#cust_mobile').val($('#ret_' + id + '_mobile_no').val());
                $('#email_address').val($('#ret_' + id + '_email_address').val());
                $('#company').val($('#ret_' + id + '_company_name').val());
                $('#name_id').val($('#ret_' + id + '_name_id').val());
                $('#name_ctr').val($('#ret_' + id + '_name_ctr').val());
                $('#name_origin').val($('#ret_' + id + '_name_origin').val());
                $('#old_name_id').val($('#ret_' + id + '_name_id').val());
                $('#old_pref_title').val($('#ret_' + id + '_pref_title').val());
                $('#old_given').val($('#ret_' + id + '_given_names').val());
                $('#old_surname').val($('#ret_' + id + '_surname').val());
                $('#old_cust_phone').val($('#ret_' + id + '_telephone').val());
                $('#old_cust_work').val($('#ret_' + id + '_work_phone').val());
                $('#old_cust_mobile').val($('#ret_' + id + '_mobile_no').val());
                $('#old_email_address').val($('#ret_' + id + '_email_address').val());
                $('#old_company').val($('#ret_' + id + '_company_name').val());
                if ($('#ret_' + id + '_name_id').val() > 0 || $('#ret_' + id + '_name_id').val() != "0" || $('#ret_' + id + '_name_id').val() != 0) {
                    $("#CustSummary").removeAttr("disabled")
                }
                $("#popup").html("");
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

