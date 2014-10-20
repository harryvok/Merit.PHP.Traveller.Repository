<?php
    if(isset($GLOBALS['result']->property_details)){
?>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#popup").fadeIn("fast");
            var oTable = $('#propertyLookupTable').dataTable({
                iDisplayLength: 25,
                "aaSorting": [[0, "asc"]]
            });
        });

        $('.address_row').click(function () {
            var id = "";
            var id = $(this).attr('id');
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
			    if ($('#ret_' + id + '_address_id').val() == "0" || $('#ret_' + id + '_address_id').val() == 0 || $('#ret_' + id + '_address_id').val() == "") {
			        $("#AddrSummary").prop("disabled", true);
			    }
			}
			else if ($("#loc_address").val() == "N" && $("#cust_address").val() == "Y") {
			    $('#i_cno').val($('#ret_' + id + '_house_number').val());
			    $('#i_cfno').val($('#ret_' + id + '_unit').val());
			    $('#i_cpropertynumber').removeClass("ui-autocomplete-loading");
			    $('#i_cpropertynumber').val($('#ret_' + id + '_property_no').val());
			    $('#cust_address_id').val($('#ret_' + id + '_address_id').val());
			    if ($('#ret_' + id + '_address_id').val() == "0" || $('#ret_' + id + '_address_id').val() == 0 || $('#ret_' + id + '_address_id').val() == "") {
			        $("#CustAddSummary").prop("disabled", true);
			    }
			}
			GetBookingSummary();
			$('#popup').fadeOut("fast");           
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
                    <!--<th class="job-id sortable">Unit/Flat Number</th>-->
                    <!--<th class="job-id sortable">Unit</th>
                    <th class="job-id sortable">Unit Suffix</th>-->
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
                                        if(preg_match("/^[a-zA-Z]*$/",$hn[0])) {
                                             $house = $hn[1];
                                        } 
                                        else {
                                             $house = $result_n_ar->house_suffix; 
                                        }
                                        if($hn[0] == "Unit")
                                            $r = true;
                                        else
                                            $r = false;                                    
                                        if ($r == true)
                                        {
                                        $no = explode("/",$house);
                                        $unitno = $no[0];
                                        $streetno = $no[1];
                                        }
                                        else{
                                            $streetno = $house;
                                        }
                                    }                   
                                ?>
                                <input type="hidden" id="house" value="<?php if(isset($result_n_ar->house_suffix) && strpos($result_n_ar->house_suffix, "-") !== false || ctype_alnum($result_n_ar->house_suffix)) echo $result_n_ar->house_suffix; else echo $result_n_ar->house_number; ?>" />
                                <input type="hidden" id="ret_<?php echo $set.$count; ?>_house_number" value="<?php if($streetno != "") echo $streetno; else echo $result_n_ar->house_number; ?>" />
                                <input type="hidden" id="ret_<?php echo $set.$count; ?>_unit" value="<?php echo $unitno; ?>" />
                                <input type="hidden" id="ret_<?php echo $set.$count; ?>_property_no" value="<?php if(isset($result_n_ar->property_no)){ echo $result_n_ar->property_no; } else { echo ""; } ?>" />
                                <input type="hidden" id="ret_<?php echo $set.$count; ?>_address_id" value="<?php if(isset($result_n_ar->address_id)){ echo $result_n_ar->address_id; } else { echo ""; } ?>" />
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