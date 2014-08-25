<?php
if(isset($GLOBALS['result']->address_det->address_details) && count($GLOBALS['result']->address_det->address_details) > 1){
	foreach($GLOBALS['result']->address_det->address_details as $address)
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
			if(isset($address->address_desc)) $loc_desc = $address->address_desc;
		}
	}
}
elseif(isset($GLOBALS['result']->address_det->address_details) && count($GLOBALS['result']->address_det->address_details) == 1){
	$address = $GLOBALS['result']->address_det->address_details;
	if($address->address_type == "Customer"){
		$cust_address_id = $address->address_id;
		$cust_house_number = $address->house_number;
		if(isset($address->house_suffix)) $cust_house_suffix = $address->house_suffix;
		$cust_property_no = $address->property_no;
		$cust_street_name = $address->street_name;
		$cust_street_type = $address->street_type;
		$cust_locality = $address->locality;
		$cust_postcode = $address->postcode;
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
		if(isset($address->address_desc)) $loc_desc = $address->address_desc;
	}
}
?>

<div class="summaryContainer">
    <h1>Request Details</h1>
    <div>
        <div class="float-left"><?php if($GLOBALS['result']->count_only == "Y"){ echo "Count Only"; } else { ?><input type="button" id="workflow" value="Show Workflow" data-service="<?php echo $GLOBALS['result']->service_code; ?>" data-request="<?php echo $GLOBALS['result']->request_code; ?>" data-function="<?php echo $GLOBALS['result']->function_code; ?>" data-servicename="<?php echo $GLOBALS['result']->service_name; ?>" data-requestname="<?php echo $GLOBALS['result']->request_name; ?>" data-functionname="<?php echo $GLOBALS['result']->function_name; ?>" data-requestid="<?php echo $_GET["id"]; ?>"  data-requestdate="<?php if(isset($GLOBALS['result']->due_datetime) && strlen($GLOBALS['result']->due_datetime) > 0){ echo date('d-M-y',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']->due_datetime))); } ?>" /><?php } ?></div>
        <div class="float-left">
            <div class="float-left">
                <div class="column r15">
                    <span class="summaryColumnTitle">Date Input</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']->request_datetime) && strlen($GLOBALS['result']->request_datetime) > 0){ echo date('d/m/Y H:i A',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']->request_datetime))); } else { echo "No date found."; } ?></div>
                </div>
                <div class="column r15">
                    <span class="summaryColumnTitle">Date Due</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']->due_datetime) && strlen($GLOBALS['result']->due_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']->due_datetime))); } else { echo "No date found."; } ?></div>
                </div>
                <div class="column r15">
                    <span class="summaryColumnTitle">Date Completed</span>
                    <div class="summaryColumn"><?php if($GLOBALS['result']->status != "Open"){ if(isset($GLOBALS['result']->status_datetime) && strlen($GLOBALS['result']->status_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']->status_datetime))); } } ?></div>
                </div>
                <div class="column r10">
                    <span class="summaryColumnTitle">Priority</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']->priority)){ echo $GLOBALS['result']->priority; } ?></div>
                </div>
                <div class="column r5">
                    <span class="summaryColumnTitle">Intime</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']->in_time_ind)){ echo $GLOBALS['result']->in_time_ind == "Y" ? "Yes" : "No"; } ?></div>
                </div>
                <div class="column r5">
                    <span class="summaryColumnTitle">Escalated</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']->escalated_ind)){ echo $GLOBALS['result']->escalated_ind == "Y" ? "Yes" : "No"; } ?></div>
                </div>
            </div>
            <div class="float-left">
                <div class="column r15">
                    <span class="summaryColumnTitle">Request Type</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']->request_type)){ echo $GLOBALS['result']->request_type; } ?></div>
                </div>
                <div class="column r20">
                    <span class="summaryColumnTitle">Request Officer</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']->officer_responsible_name)){ echo $GLOBALS['result']->officer_responsible_name; } ?></div>
                </div>
                <div class="column r20">
                    <span class="summaryColumnTitle">Division</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']->division_name)){ echo $GLOBALS['result']->division_name; } ?></div>
                </div>
                <div class="column r20">
                    <span class="summaryColumnTitle">Department</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']->department_name)){ echo $GLOBALS['result']->department_name; } ?></div>
                </div>
            </div>
            <div class="float-left">
                <div class="column r15">
                    <span class="summaryColumnTitle">Reference No.</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']->refer_no)){echo $GLOBALS['result']->refer_no; } ?></div>
                </div>
                <div class="column r15">
                    <span class="summaryColumnTitle">Input Officer</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']->input_by_name)){ echo $GLOBALS['result']->input_by_name; } ?></div>
                </div>
                <div class="column r15">
                    <span class="summaryColumnTitle">How Received</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']->how_received_name)){ echo $GLOBALS['result']->how_received_name; } ?></div>
                </div>
                <div class="column r15">
                    <span class="summaryColumnTitle">Centre</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']->centre_name)){ echo $GLOBALS['result']->centre_name; } ?></div>
                </div>
                <div class="column r15">
                    <span class="summaryColumnTitle">Provider</span>
                    <div class="summaryColumn"><?php if(isset($GLOBALS['result']->provider_name)){ echo $GLOBALS['result']->provider_name; } ?></div>
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
            <div id="EditDescriptionLabel"><?php /* Display the description */  if(isset($GLOBALS['result']->request_description)){ echo base64_decode($GLOBALS['result']->request_description); } ?></div>
            <div id="EditDescriptionEdit" class="editTextDiv">
                <textarea spellcheck="true" name="EditDescriptionText" id="EditDescriptionTextVal" data-request-id="<?php echo $_GET['id']; ?>"><?php /* Display the description */  if(isset($GLOBALS['result']->request_description)){ echo base64_decode($GLOBALS['result']->request_description); } ?></textarea>
                <input type="button" id="EditDescriptionSubmit" data-action="Request" value="Save" />
                <a class="editClose" id="EditDescriptionClose">Close</a>
            </div>
        </div>
        <span class="summaryColumnTitle">Request Instructions <?php if($_SESSION['roleSecurity']->maint_desc == "Y") { ?><a class="edit" id="EditInstructions"><img src="images/modify-icon.png"></a><?php } ?></span>
        <div class="summaryColumn">
            <div id="EditInstructionsLabel"><?php /* Display the description */  if(isset($GLOBALS['result']->request_instruction)){ echo base64_decode($GLOBALS['result']->request_instruction); } ?></div>
            <div id="EditInstructionsEdit" class="editTextDiv">
                <textarea spellcheck="true" name="EditInstructionsText" id="EditInstructionsTextVal" data-request-id="<?php echo $_GET['id']; ?>"><?php /* Display the description */  if(isset($GLOBALS['result']->request_instruction)){ echo base64_decode($GLOBALS['result']->request_instruction); } ?></textarea>
                <input type="button" id="EditInstructionsSubmit" data-action="Request" value="Save" />
                <a class="editClose" id="EditInstructionsClose">Close</a>
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
                <?php 
                if(isset($loc_address_id)){
                ?>
                <a href='index.php?page=view-address&amp;id=<?php if(isset($loc_address_id)){ echo $loc_address_id; } ?>'><?php if(isset($loc_house_suffix) && strlen($loc_house_suffix) > 0 && isset($loc_house_number) && strlen($loc_house_number > 0) && $loc_house_number != $loc_house_suffix){ echo $loc_house_suffix; } elseif(isset($loc_house_number)){ echo $loc_house_number; } ?> <?php if(isset($loc_street_name)){ echo $loc_street_name; } ?> <?php if(isset($loc_street_type)){ echo $loc_street_type; } ?> <?php if(isset($loc_locality)){ echo $loc_locality; } ?> <?php if(isset($loc_postcode)){ echo $loc_postcode; } ?> </a>
                <?php
                }
                ?>

            </div>
        </div>
        <div class="column r50">
            <span class="summaryColumnTitle">Location Address Descr</span>
            <div class="summaryColumn">

                <?php 
                if(isset($loc_address_id)){
                    if(isset($loc_desc)){ echo " ".$loc_desc; }
                }
                ?>
            </div>
        </div>

        <div class="float-left">
            <?php
            if(isset($address->property_no)){
            ?>
            <div class="column r15">
                <span class="summaryColumnTitle">Property Number</span>
                <div class="summaryColumn">
                    <?php 
                if(isset($address->property_no)){ echo $address->property_no; }
                    ?>
                </div>
            </div>

            <?php
            }
            if(isset($address->gis_x_coord) || isset($address->gis_y_coord)){
            ?>
            <div class="column r15">
                <span class="summaryColumnTitle">X Coord</span>
                <div class="summaryColumn">
                    <?php 
                if(isset($address->gis_x_coord)){ echo $address->gis_x_coord; }
                    ?>
                </div>
            </div>
            <div class="column r15">
                <span class="summaryColumnTitle">Y Coord</span>
                <div class="summaryColumn">
                    <?php 
                if(isset($address->gis_y_coord)){ echo $address->gis_y_coord; }
                    ?>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <?php
        
        if(isset($GLOBALS['result']->facility_det) && count($GLOBALS['result']->facility_det) > 1){
            $i=1;
            echo "There are <strong>".count($GLOBALS['result']->facility_det)."</strong> facilities.<br />";
            foreach($GLOBALS['result']->facility_det as $facility){
        ?>
        <div class="float-left">
            <div class="column r50">
                <span class="summaryColumnTitle">Facility Name</span>
                <div class="summaryColumn">
                    <?php if(isset($facility->facility_name)) echo $facility->facility_name; ?>
                </div>
            </div>
            <div class="column r50">
                <span class="summaryColumnTitle">Facility Type</span>
                <div class="summaryColumn">
                    <?php if(isset($facility->facility_type)){ echo $facility->facility_type; } ?>
                </div>
            </div>
        </div>
        <div class="float-left">
            <span class="summaryColumnTitle">Facility Description</span>
            <div class="summaryColumn" style="width: 100%;">
                <?php if(isset($facility->facility_desc)){ echo $facility->facility_desc; } ?>
            </div>
            <?php if($i != count($GLOBALS['result']->facility_det)){ ?><hr /><?php }?>

        </div>
        <?php
                $i++;
            }
        }
        elseif(isset($GLOBALS['result']->facility_det->facility_details) && count($GLOBALS['result']->facility_det->facility_details) == 1){
            $facility = $GLOBALS['result']->facility_det->facility_details;
        ?>
        <div class="float-left">
            <div class="column r50">
                <span class="summaryColumnTitle">Facility Name</span>
                <div class="summaryColumn">
                    <?php if(isset($facility->facility_name)) echo $facility->facility_name; ?>
                </div>
            </div>
            <div class="column r50">
                <span class="summaryColumnTitle">Facility Type</span>
                <div class="summaryColumn">
                    <?php if(isset($facility->facility_type)){ echo $facility->facility_type; } ?>
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
<div class="summaryContainer">
    <h1>Customer Details</h1>
    <div>
        <div class="float-left">
            <div class="column r15">
                <span class="summaryColumnTitle">Customer Type</span>
                <div class="summaryColumn">
                    <?php if(isset($GLOBALS['result']->customer_name_det->customer_name_details->name_type)){ echo $GLOBALS['result']->customer_name_det->customer_name_details->name_type;  }?>
                </div>
            </div>
            <div class="column r15">
                <span class="summaryColumnTitle">Customer Name</span>
                <div class="summaryColumn">
                    <?php
                    if(isset($GLOBALS['result']->customer_name_det->customer_name_details->given_names) || isset($GLOBALS['result']->customer_name_det->customer_name_details->surname)){
                        $customer = "<a href='index.php?page=view-name&id=".$GLOBALS['result']->customer_name_det->customer_name_details->name_id."'>".$GLOBALS['result']->customer_name_det->customer_name_details->given_names." ".$GLOBALS['result']->customer_name_det->customer_name_details->surname."</a>";
                        echo "<a href='index.php?page=view-name&id=".$GLOBALS['result']->customer_name_det->customer_name_details->name_id."'>".$customer."</a>";
                    }
                    ?>
                </div>
            </div>
            <div class="column r20">
                <span class="summaryColumnTitle">Company Name</span>
                <div class="summaryColumn">
                    <?php if(isset($GLOBALS['result']->customer_name_det->customer_name_details->company_name)){ echo $GLOBALS['result']->customer_name_det->customer_name_details->company_name; } ?>
                </div>
            </div>
        </div>
        <div class="column r15">
            <span class="summaryColumnTitle">Phone Number</span>
            <div class="summaryColumn"><?php if(isset($GLOBALS['result']->customer_name_det->customer_name_details->telephone)){ echo $GLOBALS['result']->customer_name_det->customer_name_details->telephone;  }?></div>
        </div>
        <div class="column r15">
            <span class="summaryColumnTitle">Mobile Number</span>
            <div class="summaryColumn"><?php if(isset($GLOBALS['result']->customer_name_det->customer_name_details->mobile_no)){ echo $GLOBALS['result']->customer_name_det->customer_name_details->mobile_no;  }?></div>
        </div>
        <div class="column r15">
            <span class="summaryColumnTitle">Work Number</span>
            <div class="summaryColumn"><?php if(isset($GLOBALS['result']->customer_name_det->customer_name_details->work_phone)){ echo $GLOBALS['result']->customer_name_det->customer_name_details->work_phone; } ?></div>
        </div>
        <div class="column r30">
            <span class="summaryColumnTitle">Customer Email</span>
            <div class="summaryColumn">
                <?php if(isset($GLOBALS['result']->customer_name_det->customer_name_details->email_address)){ echo $GLOBALS['result']->customer_name_det->customer_name_details->email_address; }?>
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
                    <a href='index.php?page=view-address&amp;id=<?php if(isset($cust_address_id)){ echo $cust_address_id; } ?>'><?php if(isset($cust_house_suffix) && strlen($cust_house_suffix) > 0 && isset($cust_house_number) && strlen($cust_house_number > 0) && $cust_house_number != $cust_house_suffix){ echo $cust_house_suffix; } elseif(isset($cust_house_number)){ echo $cust_house_number; } ?> <?php if(isset($cust_street_name)){ echo $cust_street_name; } ?> <?php if(isset($cust_street_type)){ echo $cust_street_type; } ?> <?php if(isset($cust_locality)){ echo $cust_locality; } ?> <?php if(isset($cust_postcode)){ echo $cust_postcode; } ?> </a>
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
</div>
