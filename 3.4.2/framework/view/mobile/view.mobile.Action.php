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
$_SESSION['request_id'] = $GLOBALS['result']['action']->request_id; 
$action_id = $GLOBALS['result']['action']->action_id;
?>

 <ul class="no-ellipses" data-role="listview" data-inset="true" data-divider-theme="d">
  
	<li data-role="list-divider">Request Details</li>
    <li>
        <p><strong>Category:</strong> <?php echo $GLOBALS['result']['request']->service_name . " - " .$GLOBALS['result']['request']->request_name; if(isset($GLOBALS['result']['request']->function_name) && $GLOBALS['result']['request']->function_name != '') echo " - " . $GLOBALS['result']['request']->function_name; ?></p>
    </li>
    <li>
        <a href="index.php?page=view-request&id=<?php echo $GLOBALS['result']['action']->request_id; ?>&ref=<?php echo $action_id; ?>&ref_page=view-action"><strong>Request:</strong> <?php echo $GLOBALS['result']['action']->request_id; ?></a>
    </li>
    <li>
        <p><strong>Action ID:</strong> <?php echo $GLOBALS['result']['action']->action_id; ?></p>
    </li>
    <?php if(isset($GLOBALS['result']['action']->assign_datetime) && strlen($GLOBALS['result']['action']->assign_datetime) > 0){ ?><li>
        <p><strong>Date Assigned:</strong> <?php if(strlen($GLOBALS['result']['action']->assign_datetime) > 0){ echo date('d/m/Y',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']['action']->assign_datetime))); }?></p>
    </li><?php } ?>
    <?php if(isset($GLOBALS['result']['action']->due_datetime) && strlen($GLOBALS['result']['action']->due_datetime) > 0){ ?><li>
        <p><strong>Due Date:</strong> <?php if(strlen($GLOBALS['result']['action']->due_datetime) > 0 && $GLOBALS['result']['action']->due_datetime != "1970-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']['action']->due_datetime))); }?></p>
    </li><?php } ?>
    <?php if(isset($GLOBALS['result']['action']->finalised_ind) && strlen($GLOBALS['result']['action']->finalised_ind) > 0){ ?><li>
        <p><strong>Completed Date:</strong> <?php if($GLOBALS['result']['action']->finalised_ind == "Y"){echo date('d/m/Y h:i A',strtotime($GLOBALS['result']['action']->outcome_datetime)); } ?></p>
    </li><?php } ?>
    <?php if(isset($GLOBALS['result']['action']->priority) && strlen($GLOBALS['result']['action']->priority) > 0){ ?><li>
        <p><strong>Priority:</strong> <?php echo $GLOBALS['result']['action']->priority; ?></p>
    </li><?php } ?>
    <?php if(isset($GLOBALS['result']['action']->outcome_name) && strlen($GLOBALS['result']['action']->outcome_name) > 0){ ?><li>
        <p><strong>Completed Outcome:</strong> <?php if(isset($GLOBALS['result']['action']->outcome_name)){ echo $GLOBALS['result']['action']->outcome_name; } ?></p>
    </li><?php } ?>
    <?php if(isset($GLOBALS['result']['request']->refer_no) && strlen($GLOBALS['result']['request']->refer_no) > 0){ ?><li>
        <p><strong>Reference Number:</strong> <?php if(isset($GLOBALS['result']['request']->refer_no)){ echo $GLOBALS['result']['request']->refer_no; } ?></p>
    </li><?php } ?>
    <?php if(isset($GLOBALS['result']['action']->action_officer_name) && strlen($GLOBALS['result']['action']->action_officer_name) > 0){ ?><li>
        <p><strong>Action Officer:</strong> <?php if(isset($GLOBALS['result']['action']->action_officer_name)){ echo $GLOBALS['result']['action']->action_officer_name; } ?></p>
    </li><?php } ?>
    <?php if(isset($GLOBALS['result']['request']->input_by_name) && strlen($GLOBALS['result']['request']->input_by_name) > 0){ ?><li>
        <p><strong>Input Officer:</strong> <?php if(isset($GLOBALS['result']['request']->input_by_name)){ echo $GLOBALS['result']['request']->input_by_name; } ?></p>
    </li><?php } ?>
    <?php if(isset($GLOBALS['result']['request']->how_received_name) && strlen($GLOBALS['result']['request']->how_received_name) > 0){ ?><li>
        <p><strong>How Received:</strong> <?php if(isset($GLOBALS['result']['request']->how_received_name)){ echo $GLOBALS['result']['request']->how_received_name; } ?></p>
    </li><?php } ?>
      <li data-role="list-divider">Issue Details</li>
     <li>
                <p><strong>Request Description:</strong> <br /><?php /* Display the description */  echo isset($GLOBALS['result']['request']->request_description) ? base64_decode($GLOBALS['result']['request']->request_description) : ""; ?></p>
            </li>
            <li class="textbox">
                <p><strong>Request Instructions:</strong> <br /><?php /* Display the description */  echo isset($GLOBALS['result']['request']->request_instruction) ? base64_decode($GLOBALS['result']['request']->request_instruction) : ""; ?></p>
            </li>
            
       <li data-role="list-divider">Location Details</li>
<?php 
if(isset($loc_address_id)){
        ?>
    <li>
        
        <a href='index.php?page=view-address&id=<?php if(isset($loc_address_id)){ echo $loc_address_id; } ?>'><?php if(isset($loc_house_suffix) && strlen($loc_house_suffix) > 0 && isset($loc_house_number) && strlen($loc_house_number) > 0 && $loc_house_number != $loc_house_suffix){ echo $loc_house_suffix; } elseif(isset($loc_house_number)){ echo $loc_house_number; } ?> <?php if(isset($loc_street_name)){ echo $loc_street_name; } ?> <?php if(isset($loc_street_type)){ echo $loc_street_type; } ?> <?php if(isset($loc_locality)){ echo $loc_locality; } ?> <?php if(isset($loc_postcode)){ echo $loc_postcode; } ?> </a>
        
        
            </li>
            <?php
}
    ?>
        <li>
        <p><strong>Address Description:</strong> <?php 
                                                 if(isset($loc_address_id)){
                                                     if(isset($loc_desc)){ echo " ".$loc_desc; }
                                                 }
    ?></p>
            </li>
            
            <?php
            
			if(isset($GLOBALS['result']['request']->facility_det) && count($GLOBALS['result']['request']->facility_det) > 0){
				foreach($GLOBALS['result']['request']->facility_det as $facility){
					?>
					<li>
						<p><strong>Facility Name:</strong> <?php if(isset($facility->facility_name)) echo $facility->facility_name; ?></p>
					</li>
					<li>
						<p><strong>Facility Type:</strong> <?php if(isset($facility->facility_type)){ echo $facility->facility_type; } ?></p>
					</li>
                    <li>
						<p><strong>Facility Description:</strong> <?php if(isset($facility->facility_desc)){ echo $facility->facility_desc; } ?></p>
					</li>
					<?php
				}
			}
			elseif(isset($GLOBALS['result']['request']->facility_det->facility_details) && count($GLOBALS['result']['request']->facility_det->facility_details) == 1){
				$facility = $GLOBALS['result']['request']->facility_det->facility_details;
				?>
				<li>
					<p><strong>Facility Name:</strong> <?php if(isset($facility->facility_name)) echo $facility->facility_name; ?></p>
				</li>
				<li>
					<p><strong>Facility Type:</strong> <?php if(isset($facility->facility_type)){ echo $facility->facility_type; } ?></p>
				</li>
                <li>
						<p><strong>Facility Description:</strong> <?php if(isset($facility->facility_desc)){ echo $facility->facility_desc; } ?></p>
					</li>
				<?php
			}
			?>
   <li data-role="list-divider">Customer Details</li>
   <?php
			if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->given_names) || isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->surname)){?>
        <li>
            <?php
                $customer = "<a href='index.php?page=view-name&id=".$GLOBALS['result']['request']->customer_name_det->customer_name_details->name_id."&ref=".$action_id."&ref_page=view-action'>".$GLOBALS['result']['request']->customer_name_det->customer_name_details->given_names." ".$GLOBALS['result']['request']->customer_name_det->customer_name_details->surname."</a>";
            echo $customer;
			?>
        </li>
		<?php
		}
            ?>
        <li>
            <p><strong>Company Name:</strong> <?php if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->company_name)){ echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->company_name; } ?></p>
        </li>
        <?php
    if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->telephone)){
        ?>
        <li>
            <p><strong>Phone Number:</strong> <?php echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->telephone; ?></p>
        </li>
        <?php
    }
    if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->mobile_no)){
        ?>
        <li>
            <p><strong>Mobile Number:</strong> <?php echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->mobile_no; ?></p>
        </li>
    <?php
    }
    if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->work_phone)){
        ?>
        <li>
            <p><strong>Work Number:</strong> <?php echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->work_phone; ?></p>
        </li>
    <?php
    }
	if(isset($GLOBALS['result']['request']->customer_name_det->customer_name_details->email_address)){
		?>
		<li>
			<p><strong>Email Address:</strong> <?php echo $GLOBALS['result']['request']->customer_name_det->customer_name_details->email_address; ?></p>
		</li>
	<?php
	}

	if(isset($cust_address_id) && $cust_address_id != 0){
					if(strlen($cust_house_number) > 0 && $cust_house_number != 0 || strlen($cust_house_suffix) > 0 && $cust_house_suffix != 0 || strlen($cust_street_name) > 0 ||  strlen($cust_street_type) > 0 ||  strlen($cust_locality) > 0){
                    ?>
                    <li>
                   <a href='index.php?page=view-address&amp;id=<?php if(isset($cust_address_id)){ echo $cust_address_id; } ?>'><?php if(isset($cust_house_suffix) && strlen($cust_house_suffix) > 0 && isset($cust_house_number) && strlen($cust_house_number > 0) && $cust_house_number != $cust_house_suffix){ echo $cust_house_suffix; } elseif(isset($cust_house_number)){ echo $cust_house_number; } ?> <?php if(isset($cust_street_name)){ echo $cust_street_name; } ?> <?php if(isset($cust_street_type)){ echo $cust_street_type; } ?> <?php if(isset($cust_locality)){ echo $cust_locality; } ?> <?php if(isset($cust_postcode)){ echo $cust_postcode; } ?> </a>
                    </li>
                    <?php
					}
                }
?>
     <li>
        <p><strong>Address Description:</strong> <?php 
if(isset($cust_address_id)){
    if(isset($cust_desc)){ echo " ".$cust_desc; }
}
?></p>
    </li>


            
            

</ul>