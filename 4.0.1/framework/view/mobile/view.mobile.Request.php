<script type="text/javascript">
    $(document).ready(function () {
        $(".original").css("height", "15px");
        $(".drpdwn").css("display", "none");
        $(".edited").css("display", "none");        
        $("#modify").on(eventName, function () {
            if (confirm("Warning - Any changes to this Name Record will impact all requests associated with this name!") == true) {
                $(".original").css("height", "auto");
                $(".original").css("display", "none");
                $(".original1").css("display", "none");
                $(".edited").css("display", "block");
            }
        });
        $("#closeEdit").on(eventName, function () {
            $(".original").css("height", "15px");
            $(".original").css("display", "block");
            $(".original1").css("display", "block");
            $(".edited").css("display", "none");
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
        $(".modify").on(eventName, function () {            
            $(".flagval").css("height", "auto");
            $("#flag_val").css("display", "none");            
            $(".drpdwn").css("display", "block");
            $(".modify").css("display", "none");
        });

        $("#closeFlag").on(eventName, function () {
            $("#flag_val").css("display", "block");
            $(".modify").css("display", "block");
            $(".drpdwn").css("display", "none");
            $(".flagval").css("height", "25px");            
            $('#notify_cust').val($("#originalFlag").val()).trigger("change");
        });

        $("#saveFlag").on(eventName, function () {
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
    });
</script>
<?php
if(isset($_GET['filter'])){ $filter = strip_tags($_GET['filter']); } else { $filter=""; }
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
<ul class="no-ellipses" class="no-ellipses" data-role="listview" data-inset="true" data-divider-theme="d">
    <li data-role="list-divider">Request Details</li>
    <input type="hidden" id="req_id" name="req_id" value="<?php echo $_SESSION["request_id"]; ?>" />
    <li>
        <p><?php if($GLOBALS['result']['request']->count_only == "Y"){ echo "Count Only"; }  ?></p>
    </li>
    <li>
        <p><strong>Request ID:</strong> <?php echo $GLOBALS['request_id']; ?></p>
    </li>
    <?php if(isset($GLOBALS['result']['request']->request_datetime) && strlen($GLOBALS['result']['request']->request_datetime) > 0){ ?>
    <li>
        <p><strong>Date Input:</strong> <?php if(strlen($GLOBALS['result']['request']->request_datetime) > 0){ echo date('d/m/Y',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']['request']->request_datetime))); } ?></p>
    </li>
    <?php } ?>
    <?php if(isset($GLOBALS['result']['request']->due_datetime) && strlen($GLOBALS['result']['request']->due_datetime) > 0){ ?>
    <li>
        <p><strong>Due Date:</strong> <?php if(strlen($GLOBALS['result']['request']->due_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']['request']->due_datetime))); } ?></p>
    </li>
    <?php } ?>
    <?php if(isset($GLOBALS['result']['request']->status) && strlen($GLOBALS['result']['request']->status) > 0){ ?>
    <li>
        <p><strong>Completed Date:</strong> <?php if($GLOBALS['result']['request']->finalised_ind == "Y"){ if(strlen($GLOBALS['result']['request']->status_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']['request']->status_datetime))); } } ?></p>
    </li>
    <?php } ?>
    <?php if(isset($GLOBALS['result']['request']->priority) && strlen($GLOBALS['result']['request']->priority) > 0){ ?>
    <li>
        <p><strong>Priority:</strong> <?php echo $GLOBALS['result']['request']->priority; ?></p>
    </li>
    <?php } ?>
    <?php if(isset($GLOBALS['result']['request']->refer_no) && strlen($GLOBALS['result']['request']->refer_no) > 0){ ?>
    <li>
        <p><strong>Reference Number:</strong> <?php if(isset($GLOBALS['result']['request']->refer_no)){ echo $GLOBALS['result']['request']->refer_no; } ?></p>
    </li>
    <?php } ?>
    <?php if(isset($GLOBALS['result']['request']->officer_responsible_name) && strlen($GLOBALS['result']['request']->officer_responsible_name) > 0){ ?>
    <li>
        <p><strong>Request Officer:</strong> <?php if(isset($GLOBALS['result']['request']->officer_responsible_name)){ echo $GLOBALS['result']['request']->officer_responsible_name; } ?></p>
    </li>
    <?php } ?>



    <?php if(isset($GLOBALS['result']['request']->division_name) && strlen($GLOBALS['result']['request']->division_name) > 0){ ?>
    <li>
        <p><strong><?php echo $_SESSION['div_name']; ?>: </strong><?php if(isset($GLOBALS['result']['request']->division_name)){ echo $GLOBALS['result']['request']->division_name; } ?></p>
    </li>
    <?php } ?>
    <?php if(isset($GLOBALS['result']['request']->department_name) && strlen($GLOBALS['result']['request']->department_name) > 0){ ?>
    <li>
        <p><strong><?php echo $_SESSION['dept_name']; ?>: </strong><?php if(isset($GLOBALS['result']['request']->department_name)){ echo $GLOBALS['result']['request']->department_name; } ?></p>
    </li>
    <?php } ?>
    




    <?php if(isset($GLOBALS['result']['request']->input_by_name) && strlen($GLOBALS['result']['request']->input_by_name) > 0){ ?>
    <li>
        <p><strong>Input Officer:</strong> <?php if(isset($GLOBALS['result']['request']->input_by_name)){ echo $GLOBALS['result']['request']->input_by_name; } ?></p>
    </li>
    <?php } ?>
    <?php if(isset($GLOBALS['result']['request']->how_received_name) && strlen($GLOBALS['result']['request']->how_received_name) > 0){ ?>
    <li>
        <p><strong>How Received:</strong> <?php if(isset($GLOBALS['result']['request']->how_received_name)){ echo $GLOBALS['result']['request']->how_received_name; } ?></p>
    </li>
    <?php } ?>
    <li data-role="list-divider">Issue Details</li>
    <li>
        <p>
            <strong>Request Description:</strong>
            <br />
            <div id="EditDescriptionLabel"><?php /* Display the description */  echo stripslashes(base64_decode($GLOBALS['result']['request']->request_description)); ?></div>
        </p>
        <div><img src="images/modify-icon.png" width="16" height="16" title="Edit Description" class="edit" id="EditDescription" /></div>
        <div id="EditDescriptionEdit" class="editTextDiv">
            <textarea spellcheck="true" name="EditDescriptionText" id="EditDescriptionTextVal" data-request-id="<?php echo $_GET['id']; ?>"><?php /* Display the description */  if(isset($GLOBALS['result']['request']->request_description)){ echo base64_decode($GLOBALS['result']['request']->request_description); } ?></textarea>
            <input type="button" id="EditDescriptionSubmit" data-action="Request" value="Save" />
            <a href="#" class="editClose" id="EditDescriptionClose">Close</a>
        </div>
    </li>
    
    <li class="textbox">
        <p>
            <strong>Request Instruction:</strong>
            <br />
            <div id="EditInstructionsLabel"><?php /* Display the description */  echo base64_decode($GLOBALS['result']['request']->request_instruction); ?></div>
        </p>
        <div><img src="images/modify-icon.png" width="16" height="16" title="Edit Description" class="edit" id="EditInstructions" /></div>
        <div id="EditInstructionsEdit" class="editTextDiv">
            <textarea spellcheck="true" name="EditInstructionsText" id="EditInstructionsTextVal" data-request-id="<?php echo $_GET['id']; ?>"><?php /* Display the description */  if(isset($GLOBALS['result']['request']->request_instruction)){ echo base64_decode($GLOBALS['result']['request']->request_instruction); } ?></textarea>
            <input type="button" id="EditInstructionsSubmit" data-action="Request" value="Save" />
            <a href="#" class="editClose" id="EditInstructionsClose">Close</a>
        </div>
    </li>
    <li data-role="list-divider">Location Details</li>
    <li>
        <a href='index.php?page=view-address&id=<?php if(isset($loc_address_id)){ echo $loc_address_id; } ?>&ref_page=view-request&ref=<?php echo $_GET['id']; ?>&filter=<?php echo $filter; ?>'><?php if(isset($loc_house_suffix) && strlen($loc_house_suffix) > 0 && isset($loc_house_number) && strlen($loc_house_number > 0) && $loc_house_number != $loc_house_suffix){ echo $loc_house_suffix; } elseif(isset($loc_house_number)){ echo $loc_house_number; } ?> <?php if(isset($loc_street_name)){ echo $loc_street_name; } ?> <?php if(isset($loc_street_type)){ echo $loc_street_type; } ?> <?php if(isset($loc_locality)){ echo $loc_locality; } ?> <?php if(isset($loc_postcode)){ echo $loc_postcode; } ?> </a>
    </li>
    <li>
        <p><strong>Location Address Descr:</strong> <?php if(isset($loc_desc)){ echo " ".$loc_desc; } ?> </p>
    </li>
    <li>
        <p><strong>Property Number</strong> <?php if(isset($loc_property_no)){ echo $loc_property_no; } ?> </p>
    </li>
    <li>
        <p><strong>X Coords</strong> <?php if(isset($loc_gis_x_coord)){ echo $loc_gis_x_coord; } ?> </p>
    </li>
    <li>
        <p><strong>Y Coords</strong> <?php if(isset($loc_gis_y_coord)){ echo $loc_gis_y_coord; } ?></p>
    </li>
    <li>
        <p><strong>Road Type</strong> <?php if(isset($loc_property_no)){ echo $loc_road_type; } ?></p>
    </li>
    <li>
        <p><strong>Road Responsibility</strong> <?php if(isset($loc_property_no)){ echo $loc_road_responsibility; } ?></p>
    </li>
    <li>
        <p><strong>Area Group</strong> <?php if(isset($loc_property_no)){ echo $loc_area_group; } ?></p>
    </li>
    <?php if(isset($GLOBALS['result']['request']->facility_det) && count($GLOBALS['result']['request']->facility_det) > 0){
        foreach($GLOBALS['result']['request']->facility_det as $facility){ 
            if(isset($facility->facility_name) && strlen($facility->facility_name) > 0) { ?>
                <li>
                    <p><strong>Facility Name:</strong> <?php if(isset($facility->facility_name)) echo $facility->facility_name; ?></p>
                </li> <?php 
            } 
            if(isset($facility->facility_type) && strlen($facility->facility_type) > 0) { ?>
                <li>
                    <p><strong>Facility Type:</strong> <?php if(isset($facility->facility_type)){ echo $facility->facility_type; } ?></p>
                </li> <?php 
            } 
            if(isset($facility->officer_name) && strlen($facility->officer_name) > 0) { ?>
                <li>
                    <p><strong>Facility Officer:</strong> <?php if(isset($facility->officer_name)){ echo $facility->officer_name; } ?></p>
                </li> <?php 
            } 
            if(isset($facility->facility_desc) && strlen($facility->facility_desc) > 0) { ?>
                <li>
                    <p><strong>Facility Description:</strong> <?php if(isset($facility->facility_desc)){ echo $facility->facility_desc; } ?></p>
                </li> <?php 
            } 
        }
    }
    elseif(isset($GLOBALS['result']['request']->facility_det->facility_details) && count($GLOBALS['result']['request']->facility_det->facility_details) == 1){
        $facility = $GLOBALS['result']['request']->facility_det->facility_details;
        if(isset($facility->facility_name) && strlen($facility->facility_name) > 0) { ?>
            <li>
                <p><strong>Facility Name:</strong> <?php if(isset($facility->facility_name)) echo $facility->facility_name; ?></p>
            </li> <?php 
        } 
        if(isset($facility->facility_type) && strlen($facility->facility_type) > 0) { ?>
            <li>
                <p><strong>Facility Type:</strong> <?php if(isset($facility->facility_type)){ echo $facility->facility_type; } ?></p>
            </li><?php 
        }
        if(isset($facility->officer_name) && strlen($facility->officer_name) > 0) { ?>
                <li>
                    <p><strong>Facility Officer:</strong> <?php if(isset($facility->officer_name)){ echo $facility->officer_name; } ?></p>
                </li> <?php 
        } 
        if(isset($facility->facility_desc) && strlen($facility->facility_desc) > 0) { ?>
            <li>
                <p><strong>Facility Description:</strong> <?php if(isset($facility->facility_desc)){ echo $facility->facility_desc; } ?></p>
            </li><?php 
        } 
    }
    ?>

    <?php
if( $_SESSION['roleSecurity']->hide_customer_details == "N"){
 ?>
    <li data-role="list-divider">Customer Details</li>  
    <input type="hidden" id="name_id" name="name_id" value="<?php echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->name_id; ?>" />
    <input type="hidden" id="original_surname" name="original_surname" value="<?php echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->surname; ?>" />
    <input type="hidden" id="original_given" name="original_given" value="<?php echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->given_names; ?>" />
    <input type="hidden" id="original_initial" name="original_initial" value="<?php echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->initials; ?>" />
    <input type="hidden" id="original_prefTitle" name="original_prefTitle" value="<?php echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->pref_title; ?>" />
    <input type="hidden" id="original_fax" name="original_fax" value="<?php echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->fax_no; ?>" />
    <input type="hidden" id="original_name_ctr" name="original_name_ctr" value="<?php echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->name_ctr; ?>" />
    <?php
    if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->name_type) && strlen($GLOBALS['result']['request']->customer_name_det->customer_name_details->name_type) > 0){
    ?>
    <li>
        <p><strong>Customer Type:</strong> <?php echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->name_type; ?></p>
    </li>
    <?php
    }
    if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->given_names)  && strlen($GLOBALS['result']['request']->customer_name_det->customer_name_details->given_names) > 0 || isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->surname) && strlen($GLOBALS['result']['request']->customer_name_det->customer_name_details->surname) > 0){
        
    ?>
    <li class="original1">
        <?php
        $customer = "<a href='index.php?page=view-name&id=".$GLOBALS['result']['request']->customer_name_det->customer_name_details->name_id."&ref=".$_GET['id']."&ref_page=view-request'>".$GLOBALS['result']['request']->customer_name_det->customer_name_details->given_names." ".$GLOBALS['result']['request']->customer_name_det->customer_name_details->surname."</a>";
        echo $customer;
        ?>
    </li>
    <?php
    }
    if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->company_name) && strlen($GLOBALS['result']['request']->customer_name_det->customer_name_details->company_name) > 0){ ?>
    <li class="original">
        <p style="float:left">
            <strong>Company Name: &nbsp;</strong> 
            <p id="editCompany_name" style="float:left"><?php if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->company_name)){ echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->company_name; } ?></p>
        </p>
    </li>
    <?php 
      } 
    if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->telephone) && strlen($GLOBALS['result']['request']->customer_name_det->customer_name_details->telephone) > 0){
    ?>
    <li class="original">
        <p style="float:left">
            <strong>Phone Number: &nbsp;</strong>
            <p id="editTelephone" style="float:left"><a href="tel:<?php echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->telephone; ?>"><?php echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->telephone; ?></a></p>
        </p>
    </li>
    <?php
    }
    if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->mobile_no) && strlen($GLOBALS['result']['request']->customer_name_det->customer_name_details->mobile_no) > 0){
    ?>
    <li class="original">
        <p style="float:left">
            <strong>Mobile Number: &nbsp;</strong> 
            <p id="editMobile_no" style="float:left"><a href="tel:<?php echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->mobile_no; ?>"><?php echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->mobile_no; ?></a></p>
        </p>
    </li>
    <?php
    }
    if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->work_phone) && strlen($GLOBALS['result']['request']->customer_name_det->customer_name_details->work_phone) > 0){
    ?>
    <li class="original">
        <p style="float:left">
            <strong>Work Number: &nbsp;</strong> 
            <p id="editWork_phone" style="float:left"><a href="tel:<?php echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->work_phone; ?>"><?php echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->work_phone; ?></a></p>
        </p>
    </li>    
    <?php
    }
    
    if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->email_address) && strlen($GLOBALS['result']['request']->customer_name_det->customer_name_details->email_address) > 0){
    ?>
    <li class="original">
        <p style="float:left">
            <strong>Email Address: &nbsp;</strong>
            <p id="P1" style="float:left"> <?php echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->email_address; ?></p>
            <!--<p id="editEmail_address" style="float:left"><a href="mailto:<?php # echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->email_address; ?>"><?php #echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->email_address; ?></a></p>-->
        </p>
    </li>   
    <?php
    if($GLOBALS['result']['request']->finalised_ind == "N"){
            if($_SESSION['roleSecurity']->modify_name == "Y"){
                ?>
            <a href="#" data-role="button" title="Edit Description" class="original1" id="modify" style="width:120px;margin:10px auto;"><img src="images/modify-icon.png" width="16" height="16" />Modify</a>
        <?php
        }
    }
    ?>
    <li class="edited">
        <p style="float:left">
            <strong>Surname: &nbsp;</strong>
            </p>
        <div>
            <input type="text" spellcheck="true" name="EditInstructionsText" id="editSurname_val" value="<?php /* Display the description */  if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->surname)){echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->surname; } ?>" />
        </div>
    </li>
    <li class="edited">
        <p style="float:left">
            <strong>Given Name: &nbsp;</strong>
            </p>
        <div>
            <input type="text" spellcheck="true" name="EditInstructionsText" id="editGiven_names_val" value="<?php /* Display the description */  if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->given_names)){echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->given_names; } ?>" />
        </div>
    </li>
    <li class="edited">
        <p style="float:left">
            <strong>Company Name: &nbsp;</strong>
            </p>
        <div>
            <input type="text" spellcheck="true" name="EditInstructionsText" id="editCompany_name_val" value="<?php /* Display the description */  if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->company_name)){echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->company_name; } ?>" />            
        </div>
    </li>
    <li class="edited">
        <p style="float:left">
            <strong>Phone Number: &nbsp;</strong>
            </p>
        <div>
            <input type="text" spellcheck="true" name="EditInstructionsText" id="editTelephone_val" value="<?php /* Display the description */  if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->telephone)){echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->telephone; } ?>" />            
        </div>
    </li>
    <li class="edited">
        <p style="float:left">
            <strong>Mobile Number: &nbsp;</strong>
            </p>
        <div>
            <input type="text" spellcheck="true" name="EditInstructionsText" id="editMobile_no_val" value="<?php /* Display the description */  if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->mobile_no)){echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->mobile_no; } ?>" />            
        </div>
    </li>
    <li class="edited">
        <p style="float:left">
            <strong>Work Number: &nbsp;</strong>
            </p>
        <div>
            <input type="text" spellcheck="true" name="EditInstructionsText" id="editWork_phone_val" value="<?php /* Display the description */  if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->work_phone)){echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->work_phone; } ?>" />            
        </div>
    </li>
    <li class="edited">
        <p style="float:left">
            <strong>Email Address: &nbsp;</strong>
            </p>
        <div>
            <input type="text" spellcheck="true" name="EditInstructionsText" id="editEmail_address_val" value="<?php /* Display the description */  if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->email_address)){echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->email_address; } ?>" />            
        </div>
    </li>      
    <li class="edited">
    <input type="button" id="saveEdit" value="Save"  style="float:left"/> &nbsp;&nbsp;&nbsp;&nbsp;<input type="button" id="closeEdit" value="Close" />  
    </li>
    <div class="edited"><br /></div>
    <?php
    }
    if(isset($cust_address_id) && $cust_address_id != 0){
        if(strlen($cust_house_number) > 0 && $cust_house_number != 0 || strlen($cust_house_suffix) > 0 && $cust_house_suffix != 0 || strlen($cust_street_name) > 0 ||  strlen($cust_street_type) > 0 ||  strlen($cust_locality) > 0){
        ?>
        <li>
        <a href='index.php?page=view-address&amp;id=<?php if(isset($cust_address_id)){ echo $cust_address_id; } ?>'><?php if(isset($cust_house_suffix) && strlen($cust_house_suffix) > 0) echo $cust_house_suffix; else echo $cust_house_number; ?> <?php if(isset($cust_street_name)){ echo $cust_street_name; } ?> <?php if(isset($cust_street_type)){ echo $cust_street_type; } ?> <?php if(isset($cust_locality)){ echo $cust_locality; } ?> <?php if(isset($cust_postcode)){ echo $cust_postcode; } ?> </a>
        </li>
        <?php
        }
    }
            ?>
    <?php if(isset($cust_desc) && strlen($cust_desc) > 0){ ?><li>
        <p>
            <strong>Address Description:</strong> <?php 
              echo $cust_desc; ?>
        </p>
    </li>
    <?php
    }
         } 
?>
<li class="flagval" style="height:25px;">
        <p>
            <?php $flag = $GLOBALS['result']['request']->notify_customer_ind ?>
            <input type="hidden" id="originalFlag" value="<?php echo $flag; ?>" />
            <strong>Notify Customer: &nbsp;</strong> <?php echo $flag; ?> 
            <div style="float:left">
                <img src="images/modify-icon.png" width="16" height="16" title="Edit Description" class="modify" id="modify_flag" />
            </div>
            <div class="drpdwn">
                <select name="notify_cust" id="notify_cust" >
                    <option value="Yes" <?php if ($flag == "Yes") echo 'selected'; ?> >Yes</option>
                    <option value="No" <?php if ($flag == "No") echo 'selected'; ?> >No</option>
                </select> 
            </div>                       
        </p> 
    </li>   
    <li class="drpdwn">
    <input type="button" id="saveFlag" value="Save"  style="float:left"/> &nbsp;&nbsp;&nbsp;&nbsp;<input type="button" id="closeFlag" value="Close" />  
    </li>
    <div class="drpdwn"><br /></div>
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
            <li data-role="list-divider">Additional Information</li>        
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
            if($count_udf > 0){
            ?>
                <li>
                <div data-role="collapsible" data-count-theme="b" class="col" data-content-theme="c">
	            <h4>Request UDFs <?php echo "(".$count_udf.")"; ?></h4>
                <p>
    	            <ul data-role="listview" data-count-theme="b" data-inset="true">
			            <?php
                            if(count($GLOBALS['result']['udfs']->udf_details) > 1){
                                foreach($GLOBALS['result']['udfs']->udf_details as $udf){
                                    if($udf->udf_active_ind == "Y" && $udf->udf_action_id == 0){
                        ?>
						            <li>
								              <p><?php if($udf->udf_type == "G" || $udf->udf_type == "B" || $udf->udf_type == "P"){
                                                           if(isset($udf->udf_data)) {
                                                               if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a href="#" id='<?php echo str_ireplace("\\", "/", $udf->udf_data); ?>' class="ViewFile"><b><?php echo $udf->udf_name; ?></b> View</a> <?php } else { echo "<b>".$udf->udf_name."</b>"; }
                                                           } else { echo "<b>".$udf->udf_name."</b>"; }
                                                       }  else{ ?><?php if($udf->udf_type != "C" && $udf->udf_type != "E"){ ?><b><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>* </span>"; echo $udf->udf_name; } ?> <?php if($udf->udf_type == "D"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))) : ""; } elseif($udf->udf_type == "V"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y h:i A", strtotime(str_replace("/", "-", $udf->udf_data))) : ""; } else { echo $udf->udf_data; }
                                                       } ?></b></p>
						               </li>
						            <?php  
                                    }
                                }
                            }
                            elseif(count($GLOBALS['result']['udfs']->udf_details) == 1){
                                $udf =$GLOBALS['result']['udfs']->udf_details;
                                if($udf->udf_active_ind == "Y" && $udf->udf_action_id == 0){
                                    ?>
				            <li>
						            <p><?php if($udf->udf_type == "G" || $udf->udf_type == "B" || $udf->udf_type == "P"){
                                                 if(isset($udf->udf_data)) {
                                                     if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a href="#" id="A1" class="ViewFile"><b><?php echo $udf->udf_name; ?></b> View</a> <?php } else { echo "<b>".$udf->udf_name."</b>"; }
                                                 } else { echo "<b>".$udf->udf_name."</b>"; }
                                             } else{ ?><?php if($udf->udf_type != "C" && $udf->udf_type != "E"){ ?><b><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>* </span>"; echo $udf->udf_name; ?></b><?php } ?> <?php if($udf->udf_type == "D"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))) : ""; } elseif($udf->udf_type == "V"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y h:i A", strtotime(str_replace("/", "-", $udf->udf_data))) : ""; } else { echo $udf->udf_data; }
                                             } ?></b></p>
				               </li>
				            <?php  
                                }
                            }
                            ?>
		            </ul>
                    <?php
                            if($count_udf > 0 && $GLOBALS['finalised_ind'] == "N" && $_SESSION['roleSecurity']->mod_udf == "Y"){
                    ?>
           
				            <a  data-role="button" href="index.php?page=<?php echo $_GET['page']; ?>&id=<?php echo $GLOBALS['id']; ?>&req_id=<?php echo $GLOBALS['request_id']; ?>&d=modify-udfs">Modify</a>
			
                        <?php
                            }
                        ?>
                    </p>
        
		            </div> 
             <?php
            }
            $count_udf = 0;
            if(count($GLOBALS['result']['udfs']->udf_details) > 1){
                foreach($GLOBALS['result']['udfs']->udf_details as $udf){
                    if(isset($udf->udf_active_ind) && $udf->udf_active_ind == "Y"&& $udf->udf_action_id != 0){
                        $count_udf = $count_udf+1;
                    }					
                }
            }
            elseif(count($GLOBALS['result']['udfs']->udf_details) == 1){
                $udf = $GLOBALS['result']['udfs']->udf_details;
                if(isset($udf->udf_active_ind) && $udf->udf_active_ind == "Y"&& $udf->udf_action_id != 0){
                    $count_udf = $count_udf+1;
                }		
            }
            if($count_udf > 0)
            {
             ?>
<!--    <div data-role="collapsible">-->
        <div data-role="collapsible" class="col" data-content-theme="c">
	<h4>Action UDFs<?php echo "(".$count_udf.")"; ?></h4>
    <p>
    	<ul data-role="listview" data-count-theme="b" data-inset="true">
			<?php
                if($count_udf > 1){
                    foreach($GLOBALS['result']['udfs']->udf_details as $udf){

						if($udf->udf_active_ind == "Y"&& $udf->udf_action_id != 0){
            ?>
							<li>
                            	<p>
                            	<b><?php if($udf->udf_action_id == 0){ echo "(Request)</b>"; } else { echo "(Action ".$udf->udf_action_id.") - </b> ".$udf->action_required." - "; } ?>
            					<?php if($udf->udf_type == "G" || $udf->udf_type == "B" || $udf->udf_type == "P"){ ?><?php if(isset($udf->udf_data)) {
                                                                                                                               if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id="A2" href="#" class="ViewFile"> <?php }
                                                                                                                           }
                                                                                                                                                         } ?>
                            	<?php if($udf->udf_type != "C" && $udf->udf_type != "E"){ ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>* </span>"; echo $udf->udf_name; ?></b><?php } ?>
								   <?php if($udf->udf_type == "D"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))) : ""; } elseif($udf->udf_type == "V"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y h:i A", strtotime(str_replace("/", "-", $udf->udf_data))) : ""; } else{ echo $udf->udf_data;} ?>
                                  </a>
                                    </p>
							   </li>
							<?php  
						}
                    }
                }
                elseif($count_udf == 1){               
                    $udf =$GLOBALS['result']['udfs']->udf_details;
                        if($udf->udf_active_ind == "Y"&& $udf->udf_action_id != 0){
                            ?>
                            <li>
							<p>
            					<b><?php if($udf->udf_action_id == 0){ echo "(Request)</b>"; } else { echo "(Action ".$udf->udf_action_id.") ".$udf->action_required." : </b>"; } ?>
            					<?php if($udf->udf_type == "G" || $udf->udf_type == "B" || $udf->udf_type == "P"){ ?><?php if(isset($udf->udf_data)) {
                                                                                                                               if(stristr(str_ireplace("\\", "/", $udf->udf_data), ATTACHMENT_FOLDER)){ ?><a id="A5" href="#" class="ViewFile"> <?php }
                                                                                                                           }
                                                                                                                                                         } ?>
                            	<?php if($udf->udf_type != "C" && $udf->udf_type != "E"){ ?><?php if(isset($udf->udf_mandatory_ind) && $udf->udf_mandatory_ind == "Y" || $udf->udf_mandatory_ind == "I")  echo "<span style='color:red;'>* </span>"; echo $udf->udf_name; ?></b><?php } ?>
								   <?php if($udf->udf_type == "D"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y", strtotime(str_replace("/","-",$udf->udf_data))) : ""; } elseif($udf->udf_type == "V"){ echo strlen($udf->udf_data) > 0 ? date("d/m/Y h:i A", strtotime(str_replace("/", "-", $udf->udf_data))) : ""; } else{ echo $udf->udf_data;} ?>
                                  </a>
                                    </p>
							   </li>
							<?php  
						}
                    
                }
                            ?>
		</ul>
    </p>
</div>
    </li>
    <?php
            }
        }
    }
    ?>
</ul>
