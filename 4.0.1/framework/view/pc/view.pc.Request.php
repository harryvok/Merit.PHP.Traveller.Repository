<script type="text/javascript">
    $(document).ready(function () {
        $("#edited").css("display", "none");
        $(".drpdwn").css("display", "none");
        $(".edit").on(eventName, function () {           
            $("#flag_val").css("display", "none");
            $(".drpdwn").css("display", "block");
        });
        $("#close").on(eventName, function () {                    
            $("#flag_val").css("display", "block");
            $(".drpdwn").css("display", "none");
            $('#notify_cust').val($("#flag_val").html()).trigger();
        });
        $("#saveModify").on(eventName, function () {            
            var sel = document.getElementById("notify_cust");
            var val = sel.options[sel.selectedIndex].value;            
            if (val == "Yes")
                var flag = "Y"
            else if (val == "No")
                flag = "N";
            Load();
            $.ajax({
                url: 'inc/ajax/ajax.modifyNotifyCustomer.php',
                type: 'post',
                data: {
                    request_id: $("#req_id").val(),
                    customer_notify_ind: flag
                },
                success: function (data) {
                    location.reload();
                }
            });            
        });
        $(".modify").on(eventName, function () {
            if (confirm("Warning - Any changes to this Name Record will impact all requests associated with this name!") == true) {
                $("#original").css("display", "none");
                $("#edited").css("display", "block");
            }
        });
        $("#closeEdit").on(eventName, function () {            
            $("#original").css("display", "block");
            $("#edited").css("display", "none");            
            $("#editGiven_names_val").val($("#original_given").val());
            $("#editSurname_val").val($("#original_surname").val());
            $("#editMobile_no_val").val($("#editMobile_no").html().replace(/^\s+|\s+$/g, ''));
            $("#editTelephone_val").val($("#editTelephone").html().replace(/^\s+|\s+$/g, ''));
            $("#editWork_phone_val").val($("#editWork_phone").html().replace(/^\s+|\s+$/g, ''));
            $("#editEmail_address_val").val($("#editEmail_address").html().replace(/^\s+|\s+$/g, ''));
            $("#editCompany_name_val").val($("#editCompany_name").html().replace(/^\s+|\s+$/g, ''));            
        });
        $("#saveEdit").on(eventName, function () {
            Load();
            modifyCustomerDetails($("#name_id").val(), $("#original_initial").val(), $("#original_prefTitle").val(), $("#editGiven_names_val").val(), $("#editSurname_val").val(), $("#editMobile_no_val").val(), $("#editTelephone_val").val(), $("#editWork_phone_val").val(), $("#editEmail_address_val").val(), $("#editCompany_name_val").val(), $("#original_fax").val(), $("#original_name_ctr").val());
        });
    });
</script>
<?php
if(isset($GLOBALS['result']['request']->address_det->address_details) && count($GLOBALS['result']['request']->address_det->address_details) > 1){
	foreach($GLOBALS['result']['request']->address_det->address_details as $address)
	{
		if($address->address_type == "Customer"){
			$cust_address_id = $address->address_id;
			$cust_house_number = $address->house_number;
			if(isset($address->house_suffix)) $cust_house_suffix = $address->house_suffix;
			$cust_property_no = $address->property_no;
			$cust_street_name = $address->street_name;
			$cust_street_type = $address->street_type;
			$cust_locality = $address->locality;
			$cust_postcode = $address->postcode;
            $cust_gis_x_coords = $address->gis_x_coords;
            $cust_gis_y_coords = $address->gis_y_coords;
            $cust_road_type = $address->road_type;
            $cust_road_responsibility = $address->road_responsibility;
            $cust_area_group = $address->area_group;
			if(isset($address->address_desc)) $cust_desc = $address->address_desc;
		}
		if($address->address_type == "Location" || $address->address_type == "Facility"){
			$loc_address_id = $address->address_id;
			$loc_house_number = $address->house_number;
			if(isset($address->house_suffix)) $loc_house_suffix = $address->house_suffix;
			$loc_property_no = $address->property_no;
			$loc_street_name = $address->street_name;
			$loc_street_type = $address->street_type;
			$loc_locality = $address->locality;
			$loc_postcode = $address->postcode;
            $loc_gis_x_coords = $address->gis_x_coords;
            $loc_gis_y_coords = $address->gis_y_coords;
            $loc_road_type = $address->road_type;
            $loc_road_responsibility = $address->road_responsibility;
            $loc_area_group = $address->area_group;
			if(isset($address->address_desc)) $loc_desc = $address->address_desc;
		}
	}
}
elseif(isset($GLOBALS['result']['request']->address_det->address_details) && count($GLOBALS['result']['request']->address_det->address_details) == 1){
	$address = $GLOBALS['result']['request']->address_det->address_details;
	if($address->address_type == "Customer"){
		$cust_address_id = $address->address_id;
		$cust_house_number = $address->house_number;
		if(isset($address->house_suffix)) $cust_house_suffix = $address->house_suffix;
		$cust_property_no = $address->property_no;
		$cust_street_name = $address->street_name;
		$cust_street_type = $address->street_type;
		$cust_locality = $address->locality;
		$cust_postcode = $address->postcode;
        $cust_gis_x_coords = $address->gis_x_coords;
        $cust_gis_y_coords = $address->gis_y_coords;
        $cust_road_type = $address->road_type;
        $cust_road_responsibility = $address->road_responsibility;
        $cust_area_group = $address->area_group;
		if(isset($address->address_desc)) $cust_desc = $address->address_desc;
	}
	if($address->address_type == "Location" || $address->address_type == "Facility"){
		$loc_address_id = $address->address_id;
		$loc_house_number = $address->house_number;
		if(isset($address->house_suffix)) $loc_house_suffix = $address->house_suffix;
		$loc_property_no = $address->property_no;
		$loc_street_name = $address->street_name;
		$loc_street_type = $address->street_type;
		$loc_locality = $address->locality;
		$loc_postcode = $address->postcode;
        $loc_gis_x_coords = $address->gis_x_coords;
        $loc_gis_y_coords = $address->gis_y_coords;
        $loc_road_type = $address->road_type;
        $loc_road_responsibility = $address->road_responsibility;
        $loc_area_group = $address->area_group;
		if(isset($address->address_desc)) $loc_desc = $address->address_desc;
	}
}
?>

<div class="summaryContainer">
    <input type="hidden" id="req_id" name="req_id" value="<?php echo $_SESSION["request_id"]; ?>" />
    <h1>Request Details</h1>
    <div>
        <div class="float-left"><?php if($GLOBALS['result']['request']->count_only == "Y"){ echo "Count Only"; } else { ?><input type="button" id="workflow" value="Show Workflow" data-service="<?php echo $GLOBALS['result']['request']->service_code; ?>" data-request="<?php echo $GLOBALS['result']['request']->request_code; ?>" data-function="<?php echo $GLOBALS['result']['request']->function_code; ?>" data-servicename="<?php echo $GLOBALS['result']['request']->service_name; ?>" data-requestname="<?php echo $GLOBALS['result']['request']->request_name; ?>" data-functionname="<?php echo $GLOBALS['result']['request']->function_name; ?>" data-requestid="<?php echo $_GET["id"]; ?>"  data-requestdate="<?php if(isset($GLOBALS['result']['request']->due_datetime) && strlen($GLOBALS['result']['request']->due_datetime) > 0){ echo date('d-M-y',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']['request']->due_datetime))); } ?>" /><?php } ?></div>
        <div class="float-left">
            <div class="float-left">
                <div class="column r15">
                    <span class="summaryColumnTitle">Date Input</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']['request']->request_datetime) && strlen($GLOBALS['result']['request']->request_datetime) > 0){ echo date('d/m/Y H:i A',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']['request']->request_datetime))); } else { echo "No date found."; } ?></div>
                </div>
                <div class="column r15">
                    <span class="summaryColumnTitle">Date Due</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']['request']->due_datetime) && strlen($GLOBALS['result']['request']->due_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']['request']->due_datetime))); } else { echo "No date found."; } ?></div>
                </div>
                <div class="column r15">
                    <span class="summaryColumnTitle">Date Completed</span>
                    <div class="summaryColumn"><?php if($GLOBALS['result']['request']->finalised_ind == "Y"){ if(isset($GLOBALS['result']['request']->status_datetime) && strlen($GLOBALS['result']['request']->status_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']['request']->status_datetime))); } } ?></div>
                </div>
                <div class="column r10">
                    <span class="summaryColumnTitle">Priority</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']['request']->priority)){ echo $GLOBALS['result']['request']->priority; } ?></div>
                </div>
                <div class="column r5">
                    <span class="summaryColumnTitle">Intime</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']['request']->in_time_ind)){ echo $GLOBALS['result']['request']->in_time_ind == "Y" ? "Yes" : "No"; } ?></div>
                </div>
                <!--<div class="column r5">
                    <span class="summaryColumnTitle">Escalated</span>
                    <div class="summaryColumn"><?php # if(isset($GLOBALS['result']['request']->escalated_ind)){ echo $GLOBALS['result']['request']->escalated_ind == "Y" ? "Yes" : "No"; } ?></div>
                </div>-->
            </div>
            <div class="float-left">
                <div class="column r15">
                    <span class="summaryColumnTitle">Request Type</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']['request']->request_type)){ echo $GLOBALS['result']['request']->request_type; } ?></div>
                </div>
                <div class="column r20">
                    <span class="summaryColumnTitle">Request Officer</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']['request']->officer_responsible_name)){ echo $GLOBALS['result']['request']->officer_responsible_name; } ?></div>
                </div>
                <div class="column r20">
                    <span class="summaryColumnTitle"><?php echo $_SESSION['div_name']; ?></span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']['request']->division_name)){ echo $GLOBALS['result']['request']->division_name; } ?></div>
                </div>
                <div class="column r20">
                    <span class="summaryColumnTitle"><?php echo $_SESSION['dept_name']; ?></span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']['request']->department_name)){ echo $GLOBALS['result']['request']->department_name; } ?></div>
                </div>
            </div>
            <div class="float-left">
                <div class="column r15">
                    <span class="summaryColumnTitle">Reference No.</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']['request']->refer_no)){echo $GLOBALS['result']['request']->refer_no; } ?></div>
                </div>
                <div class="column r15">
                    <span class="summaryColumnTitle">Input Officer</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']['request']->input_by_name)){ echo $GLOBALS['result']['request']->input_by_name; } ?></div>
                </div>
                <div class="column r15">
                    <span class="summaryColumnTitle">How Received</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']['request']->how_received_name)){ echo $GLOBALS['result']['request']->how_received_name; } ?></div>
                </div>
                <div class="column r15">
                    <span class="summaryColumnTitle">Centre</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']['request']->centre_name)){ echo $GLOBALS['result']['request']->centre_name; } ?></div>
                </div>
                <div class="column r15">
                    <span class="summaryColumnTitle">Provider</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']['request']->provider_name)){ echo $GLOBALS['result']['request']->provider_name; } ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="summaryContainer">
    <h1>Issue Details</h1>
    <div>
        <span class="summaryColumnTitle">Request Description <?php if($_SESSION['roleSecurity']->maint_desc == "Y") { ?><a class="edit" id="EditDescription"><img src="images/modify-icon.png"></a><?php } ?></span>
        <div class="summaryColumn">
            <div id="EditDescriptionLabel"><?php /* Display the description */  if(isset($GLOBALS['result']['request']->request_description)){ echo base64_decode($GLOBALS['result']['request']->request_description); } ?></div>
            <div id="EditDescriptionEdit" class="editTextDiv">
                <textarea spellcheck="true" name="EditDescriptionText" id="EditDescriptionTextVal" data-request-id="<?php echo $_GET['id']; ?>"><?php /* Display the description */  if(isset($GLOBALS['result']['request']->request_description)){ echo base64_decode($GLOBALS['result']['request']->request_description); } ?></textarea>
                <input type="button" id="EditDescriptionSubmit" data-action="Request" value="Save" />
                <a class="editClose" id="EditDescriptionClose">Close</a>
            </div>
        </div>
    </div>
</div>
<div class="summaryContainer">
    <h1>Location Details</h1>
    <div>
        <div class="column r50">
            <span class="summaryColumnTitle">Location Address</span>
            <div class="summaryColumn">                
                <a href='index.php?page=view-address&amp;id=<?php if(isset($loc_address_id)){ echo $loc_address_id; } ?>'><?php if(isset($loc_house_suffix) && strlen($loc_house_suffix) > 0 && isset($loc_house_number) && strlen($loc_house_number > 0) && $loc_house_number != $loc_house_suffix){ echo $loc_house_suffix; } elseif(isset($loc_house_number)){ echo $loc_house_number; } ?> <?php if(isset($loc_street_name)){ echo $loc_street_name; } ?> <?php if(isset($loc_street_type)){ echo $loc_street_type; } ?> <?php if(isset($loc_locality)){ echo $loc_locality; } ?> <?php if(isset($loc_postcode)){ echo $loc_postcode; } ?> </a>
            </div>
        </div>
        <div class="column r50">
            <span class="summaryColumnTitle">Location Address Descr</span>
            <div class="summaryColumn">              
                    <?php if(isset($loc_desc)){ echo " ".$loc_desc; } ?>
            </div>
        </div>
        <div class="float-left">
            <div class="column r15">
                <span class="summaryColumnTitle">Property Number</span>
                <div class="summaryColumn">
                    <?php 
                        if(isset($loc_property_no)){ echo $loc_property_no; }
                    ?>
                </div>
            </div>
            <div class="column r15">
                <span class="summaryColumnTitle">X Coord</span>
                <div class="summaryColumn">
                    <?php 
                        if(isset($loc_gis_x_coord)){ echo $loc_gis_x_coord; }
                    ?>
                </div>
            </div>
            <div class="column r15">
                <span class="summaryColumnTitle">Y Coord</span>
                <div class="summaryColumn">
                    <?php 
                        if(isset($loc_gis_y_coord)){ echo $loc_gis_y_coord; }
                    ?>
                </div>
            </div>
        </div>
        <div class="float-left">
            <div class="column r15">
                <span class="summaryColumnTitle">Road Type</span>
                <div class="summaryColumn">
                    <?php 
                        if(isset($loc_property_no)){ echo $loc_road_type; }
                    ?>
                </div>
            </div>
            <div class="column r15">
                <span class="summaryColumnTitle">Road Responsibility</span>
                <div class="summaryColumn">
                    <?php 
                        if(isset($loc_property_no)){ echo $loc_road_responsibility; }
                    ?>
                </div>
            </div>
            <div class="column r15">
                <span class="summaryColumnTitle">Area Group</span>
                <div class="summaryColumn">
                    <?php 
                        if(isset($loc_property_no)){ echo $loc_area_group; }
                    ?>
                </div>
            </div>
        </div>
        <?php
        
        if(isset($GLOBALS['result']['request']->facility_det) && count($GLOBALS['result']['request']->facility_det) > 1){
            $i=1;
            echo "There are <strong>".count($GLOBALS['result']['request']->facility_det)."</strong> facilities.<br />";
            foreach($GLOBALS['result']['request']->facility_det as $facility){
        ?>
        <div class="float-left">
            <div class="column r30">
                <span class="summaryColumnTitle">Facility Name</span>
                <div class="summaryColumn">
                    <?php if(isset($facility->facility_name)) echo $facility->facility_name; ?>
                </div>
            </div>
            <div class="column r30">
                <span class="summaryColumnTitle">Facility Type</span>
                <div class="summaryColumn">
                    <?php if(isset($facility->facility_type)){ echo $facility->facility_type; } ?>
                </div>
            </div>
            <div class="column r30">
                <span class="summaryColumnTitle">Facility Officer</span>
                <div class="summaryColumn">
                    <?php if(isset($facility->officer_name)){ echo $facility->officer_name; } ?>
                </div>
            </div>
        </div>
        <div class="float-left">
            <span class="summaryColumnTitle">Facility Description</span>
            <div class="summaryColumn" style="width: 100%;">
                <?php if(isset($facility->facility_desc)){ echo $facility->facility_desc; } ?>
            </div>
            <?php if($i != count($GLOBALS['result']['request']->facility_det)){ ?><hr /><?php }?>

        </div>
        <?php
                $i++;
            }
        }
        elseif(isset($GLOBALS['result']['request']->facility_det->facility_details) && count($GLOBALS['result']['request']->facility_det->facility_details) == 1){
            $facility = $GLOBALS['result']['request']->facility_det->facility_details;
        ?>
        <div class="float-left">
            <div class="column r30">
                <span class="summaryColumnTitle">Facility Name</span>
                <div class="summaryColumn">
                    <?php if(isset($facility->facility_name)) echo $facility->facility_name; ?>
                </div>
            </div>
            <div class="column r30">
                <span class="summaryColumnTitle">Facility Type</span>
                <div class="summaryColumn">
                    <?php if(isset($facility->facility_type)){ echo $facility->facility_type; } ?>
                </div>
            </div>
            <div class="column r30">
                <span class="summaryColumnTitle">Facility Officer</span>
                <div class="summaryColumn">
                    <?php if(isset($facility->officer_name)){ echo $facility->officer_name; } ?>
                </div>
            </div>
        </div>
        <div class="float-left">
            <span class="summaryColumnTitle">Facility Description</span>
            <div class="summaryColumn" style="width: 100%;">
                <?php if(isset($facility->facility_desc)){ echo $facility->facility_desc; } ?>
            </div>
        </div>
        <?php
        }
        ?>
    </div>    
</div>


<?php
if( $_SESSION['roleSecurity']->hide_customer_details == "N"){
 ?>
<div class="summaryContainer">
    <h1>Customer Details 
        <?php
        if($GLOBALS['result']['request']->finalised_ind == "N"){
            if($_SESSION['roleSecurity']->modify_name == "Y"){
                ?> <span class="summaryColumnTitle" style="float:right"><a class="modify" id="modify" style="color:white"><img src="images/modify-icon.png">Modify</a></span>
            <?php
            }
        }
        ?>
    </h1>
    <div>
        <div id="original">
        <div class="float-left">
            <div class="column r15">
                <span class="summaryColumnTitle">Customer Type</span>
                <div class="summaryColumn">
                    <?php if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->name_type)){ echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->name_type;  } ?>
                </div>
            </div>
            <div class="column r15">
                <span class="summaryColumnTitle">Customer Name</span>
                <div class="summaryColumn">
                    <input type="hidden" id="name_id" name="name_id" value="<?php echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->name_id; ?>" />
                    <input type="hidden" id="original_surname" name="original_surname" value="<?php echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->surname; ?>" />
                    <input type="hidden" id="original_given" name="original_given" value="<?php echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->given_names; ?>" />
                    <input type="hidden" id="original_initial" name="original_initial" value="<?php echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->initials; ?>" />
                    <input type="hidden" id="original_prefTitle" name="original_prefTitle" value="<?php echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->pref_title; ?>" />
                    <input type="hidden" id="original_fax" name="original_fax" value="<?php echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->fax_no; ?>" />
                    <input type="hidden" id="original_name_ctr" name="original_name_ctr" value="<?php echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->name_ctr; ?>" />
                    <?php
                    if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->given_names) || isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->surname)){
                        $customer = "<a href='index.php?page=view-name&id=".$GLOBALS['result']['request']->customer_name_det->customer_name_details->name_id."'>".$GLOBALS['result']['request']->customer_name_det->customer_name_details->given_names." ".$GLOBALS['result']['request']->customer_name_det->customer_name_details->surname."</a>";
                        echo "<a href='index.php?page=view-name&id=".$GLOBALS['result']['request']->customer_name_det->customer_name_details->name_id."'>".$customer."</a>";
                    }
                    ?>
                </div>                
            </div>
            <div class="column r20">
                <span class="summaryColumnTitle">Company Name</span>
                <div class="summaryColumn" id="editCompany_name">
                    <?php if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->company_name)){ echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->company_name; } ?>
                </div>
            </div>
            <div class="column r15">
                <span class="summaryColumnTitle">Notify Customer      <a class="edit" id="EditNameDetails" style="color:white"><img src="images/modify-icon.png"></a></span>
                <?php $flag = $GLOBALS['result']['request']->notify_customer_ind ?>
                <div class="summaryColumn" id="flag_val" style="width:50px;"><?php echo $flag; ?></div>
                <div class="drpdwn">
                    <select name="notify_cust" id="notify_cust" style="width:70px;">
                        <option value="Yes" <?php if ($flag == "Yes") echo 'selected'; ?> >Yes</option>
                        <option value="No" <?php if ($flag == "No") echo 'selected'; ?> >No</option>
                    </select>              
                    <input type="button" id="saveModify" name="saveModify" value="Save" />       <input type="button" id="close" name="close" value="Close" />
                </div>
            </div>
        </div>
        <div class="column r15">
            <span class="summaryColumnTitle">Phone Number</span>
            <div class="summaryColumn" id="editTelephone"><?php if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->telephone)){ echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->telephone;  }?></div>
        </div>
        <div class="column r15">
            <span class="summaryColumnTitle">Mobile Number</span>
            <div class="summaryColumn" id="editMobile_no"><?php if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->mobile_no)){ echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->mobile_no;  }?></div>
        </div>
        <div class="column r15">
            <span class="summaryColumnTitle">Work Number</span>
            <div class="summaryColumn" id="editWork_phone"><?php if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->work_phone)){ echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->work_phone; } ?></div>
        </div>
        <div class="column r30">
            <span class="summaryColumnTitle">Customer Email</span>
            <div class="summaryColumn" id="editEmail_address">
                <?php if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->email_address)){ echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->email_address; }?>
            </div>
        </div>
        <div class="float-left">
            <div class="column r50">
                <span class="summaryColumnTitle">Customer Address</span>
                <div class="summaryColumn">
                    <?php 
                    if(isset($cust_address_id) && $cust_address_id != 0){
                        if(strlen($cust_house_number) > 0 && $cust_house_number != 0 || strlen($cust_house_suffix) > 0 && $cust_house_suffix != 0 || strlen($cust_street_name) > 0 ||  strlen($cust_street_type) > 0 ||  strlen($cust_locality) > 0){
                    ?>
                    <a href='index.php?page=view-address&amp;id=<?php if(isset($cust_address_id)){ echo $cust_address_id; } ?>'><?php if(isset($cust_house_suffix) && strlen($cust_house_suffix) > 0) echo $cust_house_suffix; else echo $cust_house_number; ?> <?php if(isset($cust_street_name)){ echo $cust_street_name; } ?> <?php if(isset($cust_street_type)){ echo $cust_street_type; } ?> <?php if(isset($cust_locality)){ echo $cust_locality; } ?> <?php if(isset($cust_postcode)){ echo $cust_postcode; } ?> </a>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
            <div class="column r50">
                <span class="summaryColumnTitle">Customer Address Descr</span>
                <div class="summaryColumn">
                    <?php 
                    if(isset($cust_address_id)){
                        if(isset($cust_desc)){ echo " ".$cust_desc; }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div id="edited">
        <div class="float-left">            
            <div class="column r15">
                <span class="summaryColumnTitle">Surname</span>
                <input type="text" spellcheck="true" name="EditDescriptionText" id="editSurname_val" value="<?php /* Display the surname */  if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->surname)){ echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->surname; } ?>" />
            </div>
            <div class="column r15">
                <span class="summaryColumnTitle">Given Name</span>
                <input type="text" spellcheck="true" name="EditDescriptionText" id="editGiven_names_val" value="<?php /* Display the given_names */  if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->given_names)){ echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->given_names; } ?>" />
            </div>
            <div class="column r20">
                <span class="summaryColumnTitle">Company Name</span>
                <input type="text" spellcheck="true" name="EditDescriptionText" id="editCompany_name_val" value="<?php /* Display the company_name */  if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->company_name)){ echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->company_name; } ?>" />
            </div>
        </div>
        <div>
            <div class="column r15">
                <span class="summaryColumnTitle">Phone Number</span>
                <input type="text" spellcheck="true" name="EditDescriptionText" id="editTelephone_val" value="<?php /* Display the telephone */  if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->telephone)){ echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->telephone; } ?>" />
            </div>
            <div class="column r15">
                <span class="summaryColumnTitle">Mobile Number</span>
                <input type="text" spellcheck="true" name="EditDescriptionText" id="editMobile_no_val" value="<?php /* Display the mobile_no */  if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->mobile_no)){ echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->mobile_no; } ?>" />
            </div>
            <div class="column r15">
                <span class="summaryColumnTitle">Work Number</span>
                <input type="text" spellcheck="true" name="EditDescriptionText" id="editWork_phone_val" value="<?php /* Display the work_phone */  if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->work_phone)){ echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->work_phone; } ?>" />
            </div>
            <div class="column r15">
                <span class="summaryColumnTitle">Customer Email</span>
                <input type="text" spellcheck="true" name="EditDescriptionText" id="editEmail_address_val" value="<?php /* Display the email_address */  if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->email_address)){ echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->email_address; } ?>" />
            </div>
        </div>
        <div class="float-left">
            <br />
            <br />
            <input type="button" id="saveEdit" value="Save" /> &nbsp;&nbsp;&nbsp&nbsp;
            <input type="button" id="closeEdit" value="Close" />
        </div>
    </div>
    </div>
</div>
<?php
        }
?>



<?php
if( $_SESSION['roleSecurity']->maint_udf == "Y"){
    $show_hide = 0;
    if(count($GLOBALS['result']['udfs']->udf_details) > 1){
        foreach($GLOBALS['result']['udfs']->udf_details as $udf){
            if(isset($udf->udf_active_ind) && $udf->udf_active_ind == "Y" /*&& $udf->udf_action_id == 0*/){
                $show_hide = $show_hide + 1;
            }					
        }
    }
    elseif(count($GLOBALS['result']['udfs']->udf_details) == 1){
        $udf = $GLOBALS['result']['udfs']->udf_details;
        if(isset($udf->udf_active_ind) && $udf->udf_active_ind == "Y" /*&& $udf->udf_action_id == 0*/){
            $show_hide = $show_hide + 1;
        }		
    }
    elseif(count($GLOBALS['result']['udfs']->udf_details) > 1){
        foreach($GLOBALS['result']['udfs']->udf_details as $udf){
            if(isset($udf->udf_active_ind) && $udf->udf_active_ind == "Y" && $udf->udf_action_id != 0){
                $show_hide = $show_hide + 1;
            }					
        }
    }
    elseif(count($GLOBALS['result']['udfs']->udf_details) == 1){
        $udf = $GLOBALS['result']['udfs']->udf_details;
        if(isset($udf->udf_active_ind) && $udf->udf_active_ind == "Y" && $udf->udf_action_id != 0){
            $show_hide = $show_hide + 1;
        }		
    }  
    if ($show_hide > 0)
    {
?>  
<div class="summaryContainer">
    <h1>Additional Information</h1>
    <div>
        <?php
        $count_udf = 0;
        if(count($GLOBALS['result']['udfs']->udf_details) > 1){
            foreach($GLOBALS['result']['udfs']->udf_details as $udf){
                if(isset($udf->udf_active_ind) && $udf->udf_active_ind == "Y" && $udf->udf_action_id == 0){
                    $count_udf = $count_udf+1;
                }					
            }
        }
        elseif(count($GLOBALS['result']['udfs']->udf_details) == 1){
            $udf = $GLOBALS['result']['udfs']->udf_details;
            if(isset($udf->udf_active_ind) && $udf->udf_active_ind == "Y" && $udf->udf_action_id == 0){
                $count_udf = $count_udf+1;
            }		
        }
        if($count_udf > 0)
        {
        ?>
            <input type="hidden" name="val-u" id="val-u" value="0" />
            <span class="summaryColumnTitle">Request User Defined Fields</span>
            <?php
            if($count_udf > 0 && $GLOBALS['finalised_ind'] == "N" && $_SESSION['roleSecurity']->mod_udf == "Y"){
            ?>
                <div style="float:right;" class="openPopup">
                    <span style="text-decoration:none;">
                    <img src="images/iconAdd.png" /> 
                    </span>
                    <span  class="openPopup" id="ActionUDFs">Modify</span>
                </div>
                <?php
            }
                ?>
            <div id="udf" class="dropdown">
                <table id="filterTableJobs" class=" sortable" title="" cellspacing="0">
                    <tr>
                        <th>Name</th>
                        <th>Value</th>
                    </tr>
                    <?php
            $number=0;
            if(count($GLOBALS['result']['udfs']->udf_details) > 1){
                foreach($GLOBALS['result']['udfs']->udf_details as $udf){
                    if($udf->udf_active_ind == "Y"  && $udf->udf_action_id == 0){
                        $number = $number+1;
                        if($number == 2){
                            $class = "dark";
                            $number = 0;
                        }
                        else{
                            $class = "light";
                        }
                    ?>
                                <tr class="<?php echo $class; ?>_nocur">
                                    <?php if($udf->udf_type != "C" && $udf->udf_type != "E"){ ?><td><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></td><?php } ?>
                                    <td <?php 
                        if($udf->udf_type == "C" || $udf->udf_type == "E"){ 
                                        ?>colspan="2"<?php 
                        } ?>><?php 
                        if($udf->udf_type == "G" || $udf->udf_type == "B" || $udf->udf_type == "P"){ 
                                             ?><?php 
                            if(isset($udf->udf_data)) {
                                if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id='<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>' class="ViewFile">View</a> <?php }
                            }
                        }
                        elseif($udf->udf_type == "D"){ 
                            echo strlen($udf->udf_data) > 0 ? date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))) : ""; 
                        } 
                        elseif($udf->udf_type == "V"){
                            echo strlen($udf->udf_data) > 0 ? date("d/m/Y h:i A", strtotime(str_replace("/", "-", $udf->udf_data))) : ""; 
                        }
                        else{
                            echo $udf->udf_data;
                        }
                                                                                                                                                                                                                    ?>
                                    </td>
                                </tr>
                                <?php  
                    }
                }
            }
            elseif(count($GLOBALS['result']['udfs']->udf_details) == 1){
                $udf = $GLOBALS['result']['udfs']->udf_details;
                if($udf->udf_active_ind == "Y"){
                                ?>
                            <tr class="light_nocur">
                                <?php 
                    if($udf->udf_type != "C" && $udf->udf_type != "E"){
                                ?><td><?php echo $udf->udf_name; ?><?php 
                        if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                            echo "<span style='color:red;'>*</span>"; ?></td><?php 
                    } ?>
                                <td <?php 
                    if($udf->udf_type == "C" || $udf->udf_type == "E"){ 
                                    ?>colspan="2"<?php 
                    } ?>><?php 
                    if($udf->udf_type == "G" || $udf->udf_type == "B" || $udf->udf_type == "P"){ 
                                     ?><?php 
                        if(isset($udf->udf_data)) {
                            if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ 
                                      ?><a id='<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>' class="ViewFile">View</a> <?php 
                            }
                        }
                    } 
                    elseif($udf->udf_type == "D"){ 
                        echo strlen($udf->udf_data) > 0 ? date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))) : ""; 
                    }
                    elseif($udf->udf_type == "V"){ 
                        echo strlen($udf->udf_data) > 0 ? date("d/m/Y h:i A", strtotime(str_replace("/", "-", $udf->udf_data))) : ""; 
                    }
                    else{
                        echo $udf->udf_data; 
                    } ?></td>
                            </tr>
                            <?php
                }
            }
                            ?>
            </table>
        </div>
        <div class="popupDetail" id="ActionUDFsPopup">
                <h4>Modify Request User Defined Fields</h4>  
                <div id="closeNames" class="closePopup"><img src="images/close.png" /> Close </div> 
            <div >
                <script type="text/javascript">
                    $(document).ready(function () {
                        // validate signup form on keyup and submit
                        $("#actionudf").validate();

                        $("#actionudf").submit(function (event) {
                            $('#submit').attr('disabled', true);
                            return true;
                        });
                       
                    });
                </script>    
                <form method="post"  enctype="multipart/form-data" id="actionudf" action="process.php">
                <?php
            if(isset($GLOBALS['result']['udfs']->udf_details)){
                if(count($GLOBALS['result']['udfs']->udf_details)> 1){
                    $i=0;
                    foreach($GLOBALS['result']['udfs']->udf_details as $udf){
                        if($udf->udf_active_ind == "Y" && $udf->udf_action_id == 0){
                            if($udf->udf_depends != 0){
                ?>
                                    <div id="depends_<?php echo $udf->udf_order; ?>" class="udfDependant">
                                    <?php
                            }
                            if($udf->udf_type == "L"){
                                $i=$i+1;
                                //Begin Web Service Call UDFs
                                $wsdl2 = WEB_SERVICES_PATH.MERIT_REQUEST_FILE."?wsdl";
                                $client2 = new SoapClient ($wsdl2);
                                $parameters2 = new stdClass();
                                $parameters2->user_id = $_SESSION['user_id'];
                                $parameters2->password = $_SESSION['password'];
                                $parameters2->look_type = $udf->udf_looktype;
                                $result2 = $client2->ws_get_udf_ddlb_dets($parameters2)->ws_get_udf_ddlb_detsResult;
                                $udf_ddld = array();
                                    ?>
                                    <div class="float-left">
                                        <label  for="refno"><?php echo $udf->udf_name; ?><?php 
                                if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                    echo "<span style='color:red;'>*</span>"; ?></label>
                                    </div>
                                    <div class="float-left">
                                        <select class="text-popup_udf <?php 
                                if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                    echo "required"; ?>" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>">
                                            <option value="">Select</option>
                                            <?php
                                if(count($result2->udf_ddlb_det->string) > 1){
                                    foreach($result2->udf_ddlb_det->string as $udf_ddld){
                                            ?>
                                                    <option <?php if(isset($udf->udf_data)){ if($udf->udf_data == $udf_ddld){ echo "selected"; } } ?>  value="<?php echo $udf_ddld; ?>"><?php echo $udf_ddld; ?></option>
                                                    <?php	
                                    }
                                }
                                elseif(count($result2->udf_ddlb_det->string) == 1){
                                    $udf_ddld =  $result2->udf_ddlb_det->string
                                                    ?>
                                                <option <?php
                                    if(isset($udf->udf_data)){ 
                                        if($udf->udf_data == $udf_ddld){ 
                                            echo "selected"; 
                                        }
                                    }
                                                        ?>  value="<?php echo $udf_ddld; ?>"><?php echo $udf_ddld; ?></option>
                                                <?php
                                }
                                                ?>
                                        </select>
                                    </div>
                                <?php	
                            }
                            elseif($udf->udf_type == "I"){
                                $i=$i+1;
                                ?>
                                    <div class="float-left">
                                        <label  for="refno"><?php echo $udf->udf_name; ?><?php 
                                if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                    echo "<span style='color:red;'>*</span>"; ?></label>
                                    </div>
                                    <div class="float-left">
                                        <input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="Text1" class="text-popup_udf <?php 
                                if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                    echo "required"; ?> digits" value="<?php 
                                if(isset($udf->udf_data)) 
                                    echo $udf->udf_data; ?>" size="5" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
                                    </div>
                                    <?php
                            }
                            elseif($udf->udf_type == "A"){
                                $i=$i+1;
                                    ?>
                                    <div class="float-left">
                                        <label  for="refno"><?php echo $udf->udf_name; ?><?php 
                                if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                    echo "<span style='color:red;'>*</span>"; ?></label>
                                    </div>
                                    <div class="float-left">
                                        $<input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="Text2" class="text-popup_udf <?php 
                                if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                    echo "required"; ?> number" value="<?php if(isset($udf->udf_data)) echo str_ireplace("$","",$udf->udf_data); ?>" size="5" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
                                    </div>
                                    <?php
                            }
                            elseif($udf->udf_type == "T"){
                                $i=$i+1;
                                    ?>
                                    <div class="float-left">
                                        <label  for="refno"><?php echo $udf->udf_name; ?><?php 
                                if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                    echo "<span style='color:red;'>*</span>"; ?></label>
                                    </div>
                                    <div class="float-left">
                                        <input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="Text3" class="text-popup_udf <?php 
                                if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                    echo "required"; ?>" value="<?php if(isset($udf->udf_data)) echo $udf->udf_data; ?>" size="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
                                    </div>
                                    <?php
                            }
                            elseif($udf->udf_type == "D"){
                                $i=$i+1;
                                    ?>
                                    <div class="float-left">
                                    <label  for="refno"><?php echo $udf->udf_name; ?><?php 
                                if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                    echo "<span style='color:red;'>*</span>"; ?></label>
                                    </div>
                                    <div class="float-left">
                                    <input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="Text4" class="dateField text-popup_udf <?php 
                                if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                    echo "required"; ?>" value="<?php if(isset($udf->udf_data) && strlen($udf->udf_data) > 0) echo date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))); ?>" size="5" maxlength="10"  >
                                    </div>
                                    <?php	
                            }
                            elseif($udf->udf_type == "Y"){
                                $i=$i+1;
                                    ?>
                                    <div class="float-left">
                                        <label  for="refno"><?php echo $udf->udf_name; ?><?php 
                                if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                    echo "<span style='color:red;'>*</span>"; ?></label>
                                    </div>
                                    <div class="float-left">
                                        <b>Yes</b> <input class="<?php 
                                if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                    echo "required"; ?>" type="radio" name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>_Y" <?php 
                                if(isset($udf->udf_data) && $udf->udf_data == 'Y'){ 
                                    echo "checked"; 
                                } ?>  value="Y" /> <b>No</b> <input class="<?php 
                                if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                    echo "required"; ?>" type="radio" <?php 
                                if(isset($udf->udf_data) && $udf->udf_data == 'N'){ 
                                    echo "checked"; 
                                } ?> name="udf_<?php echo $udf->udf_name; ?>" id="udf_<?php echo $udf->udf_order; ?>_N"  value="N" /> 
                                    </div>
                                    <?php	
                            }
                            elseif($udf->udf_type == "M"){
                                $i=$i+1;
                                    ?>
                                    <div class="float-left">
                                        <label  for="refno"><?php echo $udf->udf_name; ?><?php 
                                if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                    echo "<span style='color:red;'>*</span>"; ?></label>
                                    </div>
                                    <div class="float-left">
                                        <input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="Text5" class="timeField text-popup_udf <?php 
                                if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                    echo "required"; ?>" value="<?php 
                                if(isset($udf->udf_data) && strlen($udf->udf_data) > 0) 
                                    echo date("h:i A", strtotime($udf->udf_data)); ?>" size="5" maxlength="10">
                                    </div>
                                    <?php	
                            }
                            elseif($udf->udf_type == "V"){
                                $i=$i+1;
                                    ?>
                                    <div class="float-left">
                                        <label  for="refno"><?php echo $udf->udf_name; ?><?php 
                                if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                    echo "<span style='color:red;'>*</span>"; ?></label>
                                    </div>
                                    <div class="float-left">
                                        <?php 
                                $udfdata = explode(" ", $udf->udf_data);
                                if(isset($udfdata[0]) && !isset($udfdata[1])){
                                    $udfdata[1] = substr($udfdata[0],10,15);
                                    $udfdata[0] = substr($udfdata[0],0,10);
                                }
                                        ?>
                                        Date: <input type="text" name="udf_<?php echo $udf->udf_name; ?>_date" id="udf_<?php echo $udf->udf_order; ?>_date" class="dateField text_udf_small <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udfdata[0]) && strlen($udfdata[0]) > 0) echo date("d/m/Y", strtotime(str_replace("/","-",$udfdata[0]))); ?>" size="5" maxlength="10" >
                                        Time: <input type="text" name="udf_<?php echo $udf->udf_name; ?>_time" id="udf_<?php echo $udf->udf_order; ?>_time" class="timeField text_udf_small <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udfdata[1]) && strlen($udfdata[1]) > 0) echo date("h:i A", strtotime($udfdata[1])); ?>" size="5" maxlength="10">
					                </div>
                                    <?php	
                            }
                            elseif($udf->udf_type == "G"){
                                $i=$i+1;
                                    ?>
                                    <div class="float-left">
                                        <label  for="refno"><?php echo $udf->udf_name; ?><?php 
                                if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                    echo "<span style='color:red;'>*</span>"; ?></label>
                                    </div>
                                    <div class="float-left">
                                        <?php 
                                if(isset($udf->udf_data)){
                                    if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ 
                                        ?><a id='<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>' class="ViewFile">View Attachment</a> <?php 
                                    } 
                                    else{ 
                                        echo $udf->udf_data; 
                                    }                                
                                }  ?><br />
                                        Upload New:</strong> <input type="file" name="udf_<?php echo $udf->udf_name; ?>" id="File1" class="text-popup_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" >
                                    </div>
                                <?php
                            }
                            elseif($udf->udf_type == "B"){
                                $i=$i+1;
                                ?>
                                    <div class="float-left">
                                        <label  for="refno"><?php echo $udf->udf_name; ?><?php 
                                if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                    echo "<span style='color:red;'>*</span>"; ?></label>
                                    </div>
                                    <div class="float-left">
                                        <?php 
                                if(isset($udf->udf_data)){
                                    if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ 
                                        ?><a id='<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>' class="ViewFile">View Attachment</a> <?php 
                                    } 
                                    else{ 
                                        echo $udf->udf_data; 
                                    }
                                }  ?><br />
                                        Upload New:</strong> <input type="file" name="udf_<?php echo $udf->udf_name; ?>" id="File2" class="text-popup_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" >

                                    </div>
                                    <?php
                            }
                            elseif($udf->udf_type == "P"){
                                $i=$i+1;
                                    ?>
                                    <div class="float-left">
                                        <label  for="refno"><?php echo $udf->udf_name; ?><?php 
                                if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                    echo "<span style='color:red;'>*</span>"; ?></label>
                                    </div>
                                    <div class="float-left">
                                        <?php 
                                if(isset($udf->udf_data)){
                                    if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){
                                        ?><a id='<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>' class="ViewFile">View Attachment</a> <?php 
                                    } 
                                    else{
                                        echo $udf->udf_data; 
                                    }
                                }  ?><br />
                                        Upload New:</strong> <input type="file" name="udf_<?php echo $udf->udf_name; ?>" id="File3" class="text-popup_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" >
                                    </div>
                                    <?php
                            }
                            else{
                                    ?>
                                    <input type="hidden" name="udf_<?php echo $udf->udf_name; ?>" value="<?php echo $udf->udf_data; ?>" />
                                    <?php	
                            }
                            if($udf->udf_depends != 0){
                                    ?>
                                    </div>
                                        <script type="text/javascript">
                                            $(document).ready(function () {
                                                var rand = Math.floor(Math.random() * 10000) + 2; vo[rand] = new VarOperator("="); vo[rand].operation = "<?php echo $udf->udf_op_code; ?>";
                                                if ($("[id^=udf_<?php echo $udf->udf_depends; ?>]").attr('type') == "radio") {
                                                    if ($("#udf_<?php echo $udf->udf_depends; ?>_<?php echo $udf->udf_dep_value; ?>").attr("checked") == "checked" || $("#udf_<?php echo $udf->udf_depends; ?>_<?php echo $udf->udf_dep_value; ?>").attr("checked") == true) {
                                                        $("#depends_<?php echo $udf->udf_order; ?>").fadeIn("fast");
                                                    }
                                                }
                                                else {
                                                    if ($("[id^=udf_<?php echo $udf->udf_depends; ?>]").val() != "" && vo[rand].evaluate($("[id^=udf_<?php echo $udf->udf_depends; ?>]").val(), "<?php echo $udf->udf_dep_value; ?>")) {
                                                        $("#depends_<?php echo $udf->udf_order; ?>").fadeIn("fast");
                                                    }
                                                }
                                                $("[id^=udf_<?php echo $udf->udf_depends; ?>]").change(function () {
                                                    if (vo[rand].evaluate($(this).val(), "<?php echo $udf->udf_dep_value; ?>")) {
                                                        $("#depends_<?php echo $udf->udf_order; ?>").fadeIn("fast");
                                                    }
                                                    else {
                                                        $("#depends_<?php echo $udf->udf_order; ?>").fadeOut("fast");
                                                    }
                                                });
                                            });
                                        </script>
                                        <?php
                            }
                        }
                    }        
                }
                elseif(count($GLOBALS['result']['udfs']->udf_details)== 1){
                    $udf = $GLOBALS['result']['udfs']->udf_details;
                    $i=0;        
                    if($udf->udf_active_ind == "Y" && $udf->udf_action_id == 0){
                        if($udf->udf_depends != 0){
                                        ?>
                                            <div id="Div1" class="udfDependant">
                                            <?php
                        }
                        if($udf->udf_type == "L"){
                            $i=$i+1;
                            //Begin Web Service Call
                            //UDFs
                            $wsdl2 = WEB_SERVICES_PATH.MERIT_REQUEST_FILE."?wsdl";
                            $client2 = new SoapClient ($wsdl2);
                            $parameters2 = new stdClass();
                            $parameters2->user_id = $_SESSION['user_id'];
                            $parameters2->password = $_SESSION['password'];
                            $parameters2->look_type = $udf->udf_looktype;
                            $result2 = $client2->ws_get_udf_ddlb_dets($parameters2)->ws_get_udf_ddlb_detsResult;
                            $udf_ddld = array();
                                            ?>
                                            <div class="float-left">
                                                <label  for="refno"><?php echo $udf->udf_name; ?><?php 
                            if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                echo "<span style='color:red;'>*</span>"; ?></label>
                                            </div>
                                            <div class="float-left">
                                                <select class="text-popup_udf <?php 
                            if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                echo "required"; ?>" name="udf_<?php echo $udf->udf_name; ?>" id="Select1">
                                                    <option value="">Select</option>
                                                    <?php
                            if(count($result2->udf_ddlb_det->string) > 1){
                                foreach($result2->udf_ddlb_det->string as $udf_ddld){
                                                    ?>
                                                            <option <?php if(isset($udf->udf_data)){ if($udf->udf_data == $udf_ddld){ echo "selected"; } } ?>  value="<?php echo $udf_ddld; ?>"><?php echo $udf_ddld; ?></option>
                                                            <?php	
                                }
                            }
                            elseif(count($result2->udf_ddlb_det->string) == 1){
                                $udf_ddld =  $result2->udf_ddlb_det->string
                                                            ?>
                                                        <option <?php 
                                if(isset($udf->udf_data)){
                                    if($udf->udf_data == $udf_ddld){ 
                                        echo "selected"; 
                                    } 
                                } ?>  value="<?php echo $udf_ddld; ?>"><?php echo $udf_ddld; ?></option>
                                                        <?php
                            }
                                                        ?>
                                                </select>
                                            </div>
                                            <?php	
                        }
                        elseif($udf->udf_type == "I"){
                            $i=$i+1;
                                            ?>
                                            <div class="float-left">
                                                <label  for="refno"><?php echo $udf->udf_name; ?><?php 
                            if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                echo "<span style='color:red;'>*</span>"; ?></label>
                                            </div>
                                            <div class="float-left">
                                                <input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="Text6" class="text-popup_udf <?php 
                            if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                echo "required"; ?> digits" value="<?php if(isset($udf->udf_data)) echo $udf->udf_data; ?>" size="5" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
                                            </div>
                                            <?php
                        }
                        elseif($udf->udf_type == "A"){
                            $i=$i+1;
                                            ?>
                                            <div class="float-left">
                                                <label  for="refno"><?php echo $udf->udf_name; ?><?php 
                            if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                echo "<span style='color:red;'>*</span>"; ?></label>
                                            </div>
                                            <div class="float-left">
                                                <input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="Text7" class="text-popup_udf <?php 
                            if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                echo "required"; ?> number" value="<?php if(isset($udf->udf_data)) echo str_ireplace("$","",$udf->udf_data); ?>" size="5" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
                                            </div>
                                            <?php
                        }
                        elseif($udf->udf_type == "T"){
                            $i=$i+1;
                                            ?>
                                            <div class="float-left">
                                                <label  for="refno"><?php echo $udf->udf_name; ?><?php 
                            if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                echo "<span style='color:red;'>*</span>"; ?></label>
                                            </div>
                                            <div class="float-left">
                                                <input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="Text8" class="text-popup_udf <?php 
                            if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                echo "required"; ?>" value="<?php 
                            if(isset($udf->udf_data)) 
                                echo $udf->udf_data; ?>" size="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>" maxlength="<?php if($udf->udf_fld_size > 0){ echo $udf->udf_fld_size; } ?>">
                                            </div>
                                            <?php
                        }
                        elseif($udf->udf_type == "D"){
                            $i=$i+1;
                                            ?>
                                            <div class="float-left">
                                                <label  for="refno"><?php echo $udf->udf_name; ?><?php 
                            if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                echo "<span style='color:red;'>*</span>"; ?></label>
                                            </div>
                                            <div class="float-left">
                                                <input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="Text9" class="dateField text-popup_udf <?php 
                            if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                echo "required"; ?>" value="<?php if(isset($udf->udf_data) && strlen($udf->udf_data) > 0) echo date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))); ?>" size="5" maxlength="10"  >
                                            </div>
                                            <?php	
                        }
                        elseif($udf->udf_type == "Y"){
                            $i=$i+1;
                                            ?>
                                            <div class="float-left">
                                                <label  for="refno"><?php echo $udf->udf_name; ?><?php 
                            if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                echo "<span style='color:red;'>*</span>"; ?></label>
                                            </div>
                                            <div class="float-left">
                                                <b>Yes</b> <input class="<?php 
                            if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                echo "required"; ?>" type="radio" name="udf_<?php echo $udf->udf_name; ?>" id="Radio1" <?php 
                            if(isset($udf->udf_data) && $udf->udf_data == 'Y'){ 
                                echo "checked"; 
                            } ?>  value="Y" /> <b>No</b> 
                                                    <input class="<?php 
                            if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                echo "required"; ?>" type="radio" <?php 
                            if(isset($udf->udf_data) && $udf->udf_data == 'N'){ 
                                echo "checked"; 
                            } ?> name="udf_<?php echo $udf->udf_name; ?>" id="Radio2"  value="N" /> 
                                            </div>
                                            <?php	
                        }
                        elseif($udf->udf_type == "M"){
                            $i=$i+1;
                                            ?>
                                            <div class="float-left">
                                                <label  for="refno"><?php echo $udf->udf_name; ?><?php 
                            if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                echo "<span style='color:red;'>*</span>"; ?></label>
                                            </div>
                                            <div class="float-left">
                                                <input type="text" name="udf_<?php echo $udf->udf_name; ?>" id="Text10" class="timeField text-popup_udf <?php 
                            if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  
                                echo "required"; ?>" value="<?php 
                            if(isset($udf->udf_data) && strlen($udf->udf_data) > 0) 
                                echo date("h:i A", strtotime($udf->udf_data)); ?>" size="5" maxlength="10">
                                            </div>
                                            <?php	
                        }
                        elseif($udf->udf_type == "V"){
                            $i=$i+1;
                                            ?>
                                            <div class="float-left">
                                            <label  for="refno"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
                                            </div>
                                            <div class="float-left">
                                            <?php 
                            $udfdata = explode(" ", $udf->udf_data);
                            if(isset($udfdata[0]) && !isset($udfdata[1])){
                                $udfdata[1] = substr($udfdata[0],10,15);
                                $udfdata[0] = substr($udfdata[0],0,10);
                            }
                                            ?>
                                            Date: <input type="text" name="udf_<?php echo $udf->udf_name; ?>_date" id="Text11" class="dateField text_udf_small <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udfdata[0]) && strlen($udfdata[0]) > 0) echo date("d/m/Y", strtotime(str_replace("/","-",$udfdata[0]))); ?>" size="5" maxlength="10" >
                                            Time: <input type="text" name="udf_<?php echo $udf->udf_name; ?>_time" id="Text12" class="timeField text_udf_small <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" value="<?php if(isset($udfdata[1]) && strlen($udfdata[1]) > 0) echo date("h:i A", strtotime($udfdata[1])); ?>" size="5" maxlength="10">
                                            </div>
                                            <?php
                        }
                        elseif($udf->udf_type == "G"){
                            $i=$i+1;
                                            ?>
                                            <div class="float-left">
                                                <label  for="refno"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
                                            </div>
                                            <div class="float-left">  <?php 
                            if(isset($udf->udf_data)){
                                if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){
                                                                      ?><a id='<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>' class="ViewFile">View Attachment</a> <?php 
                                } 
                                else{
                                    echo $udf->udf_data; 
                                }
                            }  ?><br />
                                                Upload New:</strong> <input type="file" name="udf_<?php echo $udf->udf_name; ?>" id="File4" class="text-popup_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" >
                                            </div>
                                            <?php
                        }
                        elseif($udf->udf_type == "B"){
                            $i=$i+1;
                                            ?>
                                            <div class="float-left">
                                                <label  for="refno"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
                                            </div>
                                            <div class="float-left"><?php 
                            if(isset($udf->udf_data)){
                                if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){
                                                                    ?><a id='<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>' class="ViewFile">View</a> <?php 
                                } 
                                else{
                                    echo $udf->udf_data; 
                                }
                            } ?>
                                                Upload New:</strong> <input type="file" name="udf_<?php echo $udf->udf_name; ?>" id="File5" class="text-popup_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" >
                                            </div>
                                            <?php
                        }
                        elseif($udf->udf_type == "P"){
                            $i=$i+1;
                                            ?>
                                            <div class="float-left">
                                            <label  for="refno"><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></label>
                                            </div>
                                            <div class="float-left">
                                            <?php if(isset($udf->udf_data)){
                                                      if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id='<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>' class="ViewFile">View Attachment</a> <?php } else{ echo $udf->udf_data; }
                                                  }  ?><br />
                                            Upload New:</strong> <input type="file" name="udf_<?php echo $udf->udf_name; ?>" id="File6" class="text-popup_udf <?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "required"; ?>" >
                                            </div>
                                            <?php
                        }
                        else{
                                            ?>
                                        <input type="hidden" name="udf_<?php echo $udf->udf_name; ?>" value="<?php echo $udf->udf_data; ?>" />
                                        <?php	
                        }
                        if($udf->udf_depends != 0){
                                        ?>
                                        </div>
                                        <script type="text/javascript">
                                            $(document).ready(function () {
                                                var rand = Math.floor(Math.random() * 10000) + 2; vo[rand] = new VarOperator("="); vo[rand].operation = "<?php echo $udf->udf_op_code; ?>";
                                                if ($("[id^=udf_<?php echo $udf->udf_depends; ?>]").attr('type') == "radio") {

                                                    if ($("#udf_<?php echo $udf->udf_depends; ?>_<?php echo $udf->udf_dep_value; ?>").attr("checked") == "checked" || $("#udf_<?php echo $udf->udf_depends; ?>_<?php echo $udf->udf_dep_value; ?>").attr("checked") == true) {
                                                    $("#depends_<?php echo $udf->udf_order; ?>").fadeIn("fast");
                                                }
                                            }
                                            else {
                                                if ($("[id^=udf_<?php echo $udf->udf_depends; ?>]").val() != "" && vo[rand].evaluate($("[id^=udf_<?php echo $udf->udf_depends; ?>]").val(), "<?php echo $udf->udf_dep_value; ?>")) {
                                                    $("#depends_<?php echo $udf->udf_order; ?>").fadeIn("fast");
                                        }
                                    }
                                                $("[id^=udf_<?php echo $udf->udf_depends; ?>]").change(function () {
                                                    if (vo[rand].evaluate($(this).val(), "<?php echo $udf->udf_dep_value; ?>")) {
                        $("#depends_<?php echo $udf->udf_order; ?>").fadeIn("fast");
                    }
                    else {
                        $("#depends_<?php echo $udf->udf_order; ?>").fadeOut("fast");
                    }
                });
                                            });
            </script>
            <?php
                        }
                    }
                }    
            }
            ?>
            <p>&nbsp;</p>
            <input id="submit" class="button left" type='submit' value='Save'>
            <input type="hidden" name="page" value="action" />
            <input type="hidden" name="id" id="id" value="<?php echo $_SESSION['request_id']; ?>" />
            <!--<input type="hidden" name="act_id" id="act_id" value="<?php echo $_GET['id']; ?>" />-->
            <input type="hidden" name="service" value="<?php echo $GLOBALS['result']['request']->service_code; ?>" />
            <input type="hidden" name="request" value="<?php echo $GLOBALS['result']['request']->request_code; ?>" />
            <input type="hidden" name="function" value="<?php echo $GLOBALS['result']['request']->function_code; ?>" />
            <input type="hidden" name="action" value="EditUDFs" />
            </form>
            </div>
            </div>

            <?php
        }
        
            ?>
        <div class="summaryContainer">

        <?php
        $count_udf = 0;
        if(count($GLOBALS['result']['udfs']->udf_details) > 1){
            foreach($GLOBALS['result']['udfs']->udf_details as $udf){
                if(isset($udf->udf_active_ind) && $udf->udf_active_ind == "Y" && $udf->udf_action_id != 0){
                    $count_udf = $count_udf+1;
                }					
            }
        }
        elseif(count($GLOBALS['result']['udfs']->udf_details) == 1){
            $udf = $GLOBALS['result']['udfs']->udf_details;
            if(isset($udf->udf_active_ind) && $udf->udf_active_ind == "Y" && $udf->udf_action_id != 0){
                $count_udf = $count_udf+1;
            }		
        }
        if($count_udf > 0)
        {
        ?>
        <input type="hidden" name="val-u" id="Hidden4" value="0" />
        <div style="float:left;">
        <span class="summaryTableTitle"  style="float:left;">
        <div style="float:left;">Action User Defined Fields</div>
              
        </span>
        </div>
        <div id="Div5" class="dropdown">

        <table id="Table2" class=" sortable" title="" cellspacing="0">
        <tr>
        <th class="id">Action ID</th>
        <th>Action Name</th>
        <th>Name</th>
        <th>Value</th>
        </tr>
        <?php
            $number=0;
            if(count($GLOBALS['result']['udfs']->udf_details) > 1){
                foreach($GLOBALS['result']['udfs']->udf_details as $udf){
                    if($udf->udf_active_ind == "Y" && $udf->udf_action_id != 0){
                        $number = $number+1;
                        if($number == 2){
                            $class = "dark";
                            $number = 0;
                        }
                        else{
                            $class = "light";
                        }
        ?>
        <tr class="<?php echo $class; ?>_nocur">
        <td><?php echo $udf->udf_action_id; ?></td>
        <td><?php echo $udf->action_required; ?></td>
        <?php if($udf->udf_type != "C" && $udf->udf_type != "E"){ ?><td><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></td><?php } ?>
        <td <?php if($udf->udf_type == "C" || $udf->udf_type == "E"){ ?>colspan="2"<?php } ?>><?php if($udf->udf_type == "G" || $udf->udf_type == "B" || $udf->udf_type == "P"){ ?><?php if(isset($udf->udf_data)) {
                                                                                                                                                                                             if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id='<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>' class="ViewFile">View</a> <?php }
                                                                                                                                                                                         }
                                                                                                                                                                                                                                                                                     } elseif($udf->udf_type == "D"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))) : ""; } elseif($udf->udf_type == "V"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y h:i A", strtotime(str_replace("/", "-", $udf->udf_data))) : ""; } else{ echo $udf->udf_data; } ?></td>
        </tr>
        <?php  
                    }
                }
            }
            elseif(count($GLOBALS['result']['udfs']->udf_details) == 1){
                $udf = $GLOBALS['result']['udfs']->udf_details;
                if($udf->udf_active_ind == "Y" && $udf->udf_action_id != 0){
        ?>
        <tr class="light_nocur">
        <td><?php echo "Action ".$udf->udf_action_id; ?></td>
        <td><?php echo $udf->action_required;  ?></td>
        <?php if($udf->udf_type != "C" && $udf->udf_type != "E"){ ?><td><?php echo $udf->udf_name; ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>*</span>"; ?></td><?php } ?>
        <td <?php if($udf->udf_type == "C" || $udf->udf_type == "E"){ ?>colspan="2"<?php } ?>><?php if($udf->udf_type == "G" || $udf->udf_type == "B" || $udf->udf_type == "P"){ ?><?php if(isset($udf->udf_data)) {
                                                                                                                                                                                             if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id='<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>' class="ViewFile">View</a> <?php }
                                                                                                                                                                                         }
                                                                                                                                                                                                                                                                                     } elseif($udf->udf_type == "D"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))) : ""; } elseif($udf->udf_type == "V"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y h:i A", strtotime(str_replace("/", "-", $udf->udf_data))) : ""; } else{ echo $udf->udf_data; } ?></td>
        </tr>
        <?php
                }
            }
        ?>
        </table>

        </div>

        </div>
            </div>
 

        <?php
        }
    }
}?> 
      