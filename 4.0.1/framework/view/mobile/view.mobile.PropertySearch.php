<?php
if(isset($GLOBALS['result']->property_details)){
?>
<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left">Close</a>
    <div data-role="header" data-tap-toggle="false">
        <h1>Found Properties</h1>
    </div>
    <div data-role="content">
    	<p>
            <ul data-role="listview" data-filter="true" data-filter-placeholder="Search properties..." data-inset="true">
                <script type="text/javascript">
                $(document).ready(function () {
                    $("#popup").popup("open");
                    $("#default").page('destroy');
                    $("#default").page();
                });
                $('.address_row').click(function(){
                    var id = "";
                    var id = $(this).attr('id');
	                if ($("#loc_address").val() == "Y" && $("#cust_address").val() == "N") {
		                $('#lfno').val($('#ret_' + id + '_house_number').val());
		                $('#property_no').removeClass("ui-autocomplete-loading");
		                $('#property_no').val($('#ret_' + id + '_property_no').val());
		                $('#addressId').val($('#ret_' + id + '_address_id').val());
		                $('#address').val($('#ret_' + id + '_address_id').val());
		                if ($('#ret_' + id + '_address_id').val() == "0" || $('#ret_' + id + '_address_id').val() == 0 || $('#ret_' + id + '_address_id').val() == "") {
			                $("#AddrSummary").prop("disabled", true);
		                }
	                }
	                else if ($("#loc_address").val() == "N" && $("#cust_address").val() == "Y") {
		                $('#i_cfno').val($('#ret_' + id + '_house_number').val());
		                $('#i_cpropertynumber').removeClass("ui-autocomplete-loading");
		                $('#i_cpropertynumber').val($('#ret_' + id + '_property_no').val());
		                $('#cust_address_id').val($('#ret_' + id + '_address_id').val());
		                if ($('#ret_' + id + '_address_id').val() == "0" || $('#ret_' + id + '_address_id').val() == 0 || $('#ret_' + id + '_address_id').val() == "") {
			                $("#CustAddSummary").prop("disabled", true);
		                }
	                }			
	                $("#popup").popup("close");
                });
                </script>
                <?php
                $number=0;
                $count = 0;
                if(isset($GLOBALS['result']->property_details) && count($GLOBALS['result']->property_details) > 1){
                    foreach($GLOBALS['result']->property_details as $result_n_ar){
                        $set = $result_n_ar->address_id;
                        ?>
                        <input type="hidden" id="ret_<?php echo $set.$count; ?>_house_number" value="<?php if(isset($result_n_ar->house_suffix) && strpos($result_n_ar->house_suffix, "-") !== false || ctype_alnum($result_n_ar->house_suffix)) echo $result_n_ar->house_suffix; else echo $result_n_ar->house_number; ?>" />
                        <input type="hidden" id="ret_<?php echo $set.$count; ?>_property_no" value="<?php if(isset($result_n_ar->property_no)){ echo $result_n_ar->property_no; } else { echo ""; } ?>" />
                        <input type="hidden" id="ret_<?php echo $set.$count; ?>_address_id" value="<?php if(isset($result_n_ar->address_id)){ echo $result_n_ar->address_id; } else { echo ""; } ?>" />
                        <li class="address_row" id="<?php echo $set.$count; ?>">
                            <a>
                                <p><b>House:</b><?php if(isset($result_n_ar->house_number)){ echo $result_n_ar->house_number; } else { echo ""; } ?></p>
                                <p><b>Suffix:</b><?php if(isset($result_n_ar->house_suffix)){ echo $result_n_ar->house_suffix; } else { echo ""; } ?></p>
                                <p><b>Street Name:</b><?php if(isset($result_n_ar->street_name) && ($result_n_ar->street_type )){ echo $result_n_ar->street_name." ".$result_n_ar->street_type; } else { echo ""; } ?></p>
                                <p><b>Locality:</b><?php if(isset($result_n_ar->locality)){ echo $result_n_ar->locality; } else { echo ""; } ?></p>
                                <p><b>Postcode:</b><?php if(isset($result_n_ar->postcode)){ echo $result_n_ar->postcode; } else { echo ""; } ?></p>
                                <p><b>Legal Description:</b><?php if(isset($result_n_ar->legal_description)){ echo $result_n_ar->legal_description; } else { echo ""; } ?></p>
                                <p><b>Property No:</b><?php if(isset($result_n_ar->property_no)){ echo $result_n_ar->property_no; } else { echo ""; } ?></p>
                                <p><b>Assessment No:</b><?php if(isset($result_n_ar->assessment_no)){ echo $result_n_ar->assessment_no; } else { echo ""; } ?></</p>
                                <p><b>Status:</b><?php echo "Current"; ?></p>
                                <p><b>Property Type:</b><?php if(isset($result_n_ar->prop_type)){ echo $result_n_ar->prop_type; } else { echo ""; } ?></p>
                                <p><b>Rate Analysis:</b><?php if(isset($result_n_ar->rate_analysis)){ echo $result_n_ar->rate_analysis; } else { echo ""; } ?></p>
                            </a>
                        </li>
                        <?php
                        $count++;
                    }
                }
                ?>
            </ul>
    	</p>
    </div>
<?php
}
?>


    