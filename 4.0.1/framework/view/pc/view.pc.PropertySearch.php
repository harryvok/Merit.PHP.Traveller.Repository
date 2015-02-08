<?php
    if(isset($GLOBALS['result']->property_details)){
?>
    <style>
        #propertyLookupTable tr.selected td {
            background: none repeat scroll 0 0 #FFCF8B;
            color: #000000;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#popup").fadeIn("fast");
            var oTable = $('#propertyLookupTable').dataTable({
                iDisplayLength: 25,
                "aaSorting": [[0, "asc"]]
            })
        });

        $('#propertyLookupTable tbody').on("click", "tr", function () {
            var table = $('#propertyLookupTable').DataTable();
            var id = "";
            var id = $(this).attr('id');
                
                if ($(this).hasClass("selected")) {
                    $(this).removeClass("selected");
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            $("#submitProperty").click(function () {                
                $('#'+id).dblclick();
            });
        });

        $(document).on("dblclick", ".address_row", function () {
            var id = "";
            var id = $(this).attr('id');
			if ($("#loc_address").val() == "Y" && $("#cust_address").val() == "N") {
			    $('#lno').val($('#ret_' + id + '_house_number').val());
			    $('#lfno').val($('#ret_' + id + '_unit').val());
			    $('#property_no').removeClass("ui-autocomplete-loading");
			    $('#property_no').val($('#ret_' + id + '_property_no').val());
			    $('#addressId').val($('#ret_' + id + '_address_id').val());
			    $('#address').val($('#ret_' + id + '_address_id').val());
			    $("#loc_address_ctr").val($('#ret_' + id + '_address_ctr').val());

			    if ($('#ret_' + id + '_address_id').val() == "0" || $('#ret_' + id + '_address_id').val() == 0 || $('#ret_' + id + '_address_id').val() == "") {
			        $("#AddrSummary").attr("disabled", "disabled");
			    }
			    else {
			        $("#AddrSummary").removeAttr("disabled");
			    }

			}
             /* Customer Address prompt */
			else if ($("#loc_address").val() == "N" && $("#cust_address").val() == "Y") {

			    /* What to parse with regEx */
			    var tocheck = $('#ret_' + id + '_house').val();

			    /* Parse to variables */
			    var prefixOut = tocheck.match(/(\D{0,7})\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})\s?[/]?\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})$/)[1];
			    var unitFromOut = tocheck.match(/(\D{0,7})\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})\s?[/]?\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})$/)[2];
			    var unitToOut = tocheck.match(/(\D{0,7})\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})\s?[/]?\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})$/)[3];
			    var unitCodeOut = tocheck.match(/(\D{0,7})\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})\s?[/]?\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})$/)[4];
			    var streetFromOut = tocheck.match(/(\D{0,7})\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})\s?[/]?\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})$/)[5];
			    var streetToOut = tocheck.match(/(\D{0,7})\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})\s?[/]?\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})$/)[6];
			    var streetCodeOut = tocheck.match(/(\D{0,7})\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})\s?[/]?\s?(\d{0,5})\s?-?\s?(\d{0,5})\s?(\D{0,1})$/)[7];

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

			    /* Compare */ $('#comparei_cstreet').val($('#ret_' + id + '_street_name').val());
			    /* Compare */ $('#comparei_ctype').val($('#ret_' + id + '_street_type').val());
			    /* Compare */    $('#comparei_csuburb').val($('#ret_' + id + '_locality').val());
			    /* Compare */    $('#comparei_cpostcode').val($('#ret_' + id + '_postcode').val());
			    /* Prop No. */    $('#i_cpropertynumber').val($('#ret_' + id + '_property_no').val());
			                      $('#i_cpropertynumber').removeClass("ui-autocomplete-loading");
			    /* Compare */    $('#comparei_cpropertynumber').val($('#ret_' + id + '_property_no').val());

			    /* Cust add id */ $('#cust_address_id').val($('#ret_' + id + '_address_id').val());
			    /* Compare */   $('#comparecust_address_id').val($('#ret_' + id + '_address_id').val());
			    /* Something */   $('#cust_address_ctr').val($('#ret_' + id + '_address_ctr').val());
			    /* Compare */   $('#comparecust_address_ctr').val($('#ret_' + id + '_address_ctr').val());


			    /* Set the old values */
			    $('#old_custid').val($('#ret_' + id + '_address_id').val());
			    $('#old_cno').val($('#ret_' + id + '_house_number').val());
			    $('#old_suffix').val($('#ret_' + id + '_house').val());
			    $('#old_cstreet').val($('i_cstreet').val());
			    $('#old_ctype').val($('i_cstype').val());
			    $('#old_csuburb').val($('i_csuburb').val());
			    $('#old_cpostcode').val($('i_cpostcode').val());
			    $('#old_cpropertynumber').val($('#ret_' + id + '_property_no').val());

                // Address summary things
			    if ($('#ret_' + id + '_address_id').val() == "0" || $('#ret_' + id + '_address_id').val() == 0 || $('#ret_' + id + '_address_id').val() == "") {
			        $("#CustAddSummary").attr("disabled", "disabled");
			    }
			    else {
			        $("#CustAddSummary").removeAttr("disabled");
			    }
			}			
			$('#popup').fadeOut("fast");

			var show = "N";
			$("#chk_showall").val("No");
			getAllowanceDetails(show);
            //proceed to check booking summary
			var date = new Date().toISOString();
			GetBookingSummary(date);
        });

        $("#closePropertySearch").click(function () {
            $('#popup').fadeOut("fast");
            $("#popup").html("");
            $('#i_cpropertynumber').removeClass("ui-autocomplete-loading");
            $('#property_no').removeClass("ui-autocomplete-loading");
        });
	</script>
    <h1>Found Properties<span  class="closePopup" id="closePropertySearch"><img src="images/delete-icon.png" />Close</span></h1>
	<div>
        <table id="propertyLookupTable" class="sortable" title="" cellspacing="0" style="color:black;">
            <thead>
                <tr>
                    <th class="job-id sortable">House</th>
                    <th class="job-id sortable">Street Name</th>
                    <th class="job-id sortable">Locality</th>
                    <th class="job-id sortable">Postcode</th>
                    <th class="job-id sortable">Legal Description</th>
                    <th class="job-id sortable">Property No</th>
                    <th class="job-id sortable">Assessment No</th>
                    <th class="job-id sortable">Status</th>
                    <th class="job-id sortable">Property Type</th>
                    <th class="job-id sortable">Rate Analysis</th>        
                </tr>
            </thead>
            <tbody>
                <?php
                $number=0;
                $count = 0;
                if(isset($GLOBALS['result']->property_details) && count($GLOBALS['result']->property_details) > 1){
                    foreach($GLOBALS['result']->property_details as $result_n_ar){
                        $unitno = "";
                        $streetno = "";
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
                            <tr class="<?php echo $class; ?> address_row" id="<?php echo $set.$count; ?>" title="">
                                <?php
                                    if(isset($result_n_ar->house_suffix)){ 
                                        $hn = explode(" ",$result_n_ar->house_suffix,2); 
                                        if(count($hn) > 1)
                                        {
                                            if(preg_match("/^[a-zA-Z]*$/",$hn[0])) {
                                                 $house = $hn[1];
                                                 $no = explode("/",$house,2);
                                                 if($hn[0] == "Unit"){
                                                     $unitno = $no[0];
                                                     $streetno = $no[1];
                                                 }
                                                 else if($hn[0] != "Unit")
                                                 {
                                                     $unitno = $hn[0]." ".$no[0]; 
                                                     $streetno = $no[1];
                                                 }
                                            } 
                                            else{
                                                $house = $result_n_ar->house_suffix; 
                                                $no = explode("/",$house,2);
                                                if(count($no) > 1){
                                                    $unitno = $no[0];
                                                    $streetno = $no[1];
                                                }
                                                else{
                                                    $streetno = $house;
                                                }                                  
                                            }
                                        }
                                        else{
                                            $streetno = $result_n_ar->house_suffix;
                                            $house = $result_n_ar->house_suffix;
                                        }
                                    }                   
                                ?>
                                <input type="hidden" id="ret_<?php echo $set.$count; ?>_house" value="<?php if(isset($result_n_ar->house_suffix) && strpos($result_n_ar->house_suffix, "-") !== false || ctype_alnum($result_n_ar->house_suffix)) echo $result_n_ar->house_suffix; else echo $result_n_ar->house_number; ?>" />
                                <input type="hidden" id="ret_<?php echo $set.$count; ?>_house_number" value="<?php if($streetno != "") echo $streetno; else echo $result_n_ar->house_number; ?>" />
                                <input type="hidden" id="ret_<?php echo $set.$count; ?>_unit" value="<?php echo $unitno; ?>" />
                                <input type="hidden" id="ret_<?php echo $set.$count; ?>_property_no" value="<?php if(isset($result_n_ar->property_no)){ echo $result_n_ar->property_no; } else { echo ""; } ?>" />
                                <input type="hidden" id="ret_<?php echo $set.$count; ?>_address_id" value="<?php if(isset($result_n_ar->address_id)){ echo $result_n_ar->address_id; } else { echo ""; } ?>" />
                                <input type="hidden" id="ret_<?php echo $set.$count; ?>_address_ctr" value="<?php if(isset($result_n_ar->address_ctr)){ echo $result_n_ar->address_ctr; } else { echo ""; } ?>" />
                                <td><?php echo $house; ?></td>
                                <td><?php if(isset($result_n_ar->street_name) && ($result_n_ar->street_type )){ echo $result_n_ar->street_name." ".$result_n_ar->street_type; } else { echo ""; } ?></td>
                                <td><?php if(isset($result_n_ar->locality)){ echo $result_n_ar->locality; } else { echo ""; } ?></td>
                                <td><?php if(isset($result_n_ar->postcode)){ echo $result_n_ar->postcode; } else { echo ""; } ?></td>
                                <td><?php if(isset($result_n_ar->legal_description)){ echo $result_n_ar->legal_description; } else { echo ""; } ?></td>
                                <td><?php if(isset($result_n_ar->property_no)){ echo $result_n_ar->property_no; } else { echo ""; } ?></td>
                                <td><?php if(isset($result_n_ar->assessment_no)){ echo $result_n_ar->assessment_no; } else { echo ""; } ?></td>
                                <td><?php if(isset($result_n_ar->status)){ echo $result_n_ar->status; } else { echo ""; } ?></td>
                                <td><?php if(isset($result_n_ar->prop_type)){ echo $result_n_ar->prop_type; } else { echo ""; } ?></td>
                                <td><?php if(isset($result_n_ar->rate_analysis)){ echo $result_n_ar->rate_analysis; } else { echo ""; } ?></td>                
                            </tr>
                            <?php
                        $count++;
                    }
                }
                ?>
            </tbody>
        </table>
        <div><input style="margin-top:10px;" type="button" id="submitProperty" value="Place"></div>
    </div>
<?php
}
?>