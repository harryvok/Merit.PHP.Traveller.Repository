
<?php
if(isset($_GET['filter'])){ $filter = strip_tags($_GET['filter']); } else { $filter=""; }
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

  <ul class="pageitem">
      <li class="textbox">
          <b>Request ID:</b> <?php echo $GLOBALS['request_id']; ?> 
      </li>
      <li class="textbox">
          <b>Priority:</b> <?php echo $GLOBALS['result']->priority; ?>
      </li>
      <li class="textbox">
          <b>Date Input:</b> <?php if(strlen($GLOBALS['result']->request_datetime) > 0){ echo date('d/m/Y',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']->request_datetime))); } ?>
      </li>
      <li class="textbox">
          <b>Due Date:</b> <?php if(strlen($GLOBALS['result']->due_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']->due_datetime))); } ?>
      </li>
      <li class="textbox">
          <b>Completed Date:</b> <?php if($GLOBALS['result']->status != "Open"){ if(strlen($GLOBALS['result']->status_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']->status_datetime))); } } ?>
      </li>
      <li class="textbox">
          <b>Reference Number:</b> <?php if(isset($GLOBALS['result']->refer_no)){ echo $GLOBALS['result']->refer_no; } ?>
      </li>
      <li class="textbox">
          <b>Request Officer:</b> <?php if(isset($GLOBALS['result']->officer_responsible_name)){ echo $GLOBALS['result']->officer_responsible_name; } ?>
      </li>
      <li class="textbox">
          <b>Input Officer:</b> <?php if(isset($GLOBALS['result']->input_by_name)){ echo $GLOBALS['result']->input_by_name; } ?>
      </li>
      <li class="textbox">
          <b>How Received:</b> <?php if(isset($GLOBALS['result']->how_received_name)){ echo $GLOBALS['result']->how_received_name; } ?>
      </li>
      <br />
      <span class="graytitle">Customer</span>
      <ul class="pageitem">
          <li class="textbox">
            <?php
			if(isset($GLOBALS['result']->customer_name_det->customer_name_details->given_names) || isset($GLOBALS['result']->customer_name_det->customer_name_details->surname)){
                $customer = "<a href='index.php?page=view-name&id=".$GLOBALS['result']->customer_name_det->customer_name_details->name_id."&ref=".$_GET['id']."&ref_page=view-request&filter=".$filter."'>".$GLOBALS['result']->customer_name_det->customer_name_details->given_names." ".$GLOBALS['result']->customer_name_det->customer_name_details->surname."</a>";
				echo $customer;
				}
				?>
			</li>
			<li class="textbox">
				<b>Company Name:</b> <?php if(isset($GLOBALS['result']->customer_name_det->customer_name_details->company_name)){ echo $GLOBALS['result']->customer_name_det->customer_name_details->company_name; } ?>
			</li>
			<?php
		if(isset($GLOBALS['result']->customer_name_det->customer_name_details->telephone)){
			?>
			<li class="textbox">
				<b>Phone Number:</b> <?php echo $GLOBALS['result']->customer_name_det->customer_name_details->telephone; ?>
			</li>
			<?php
		}
		if(isset($GLOBALS['result']->customer_name_det->customer_name_details->mobile_no)){
			?>
			<li class="textbox">
				<b>Mobile Number:</b> <?php echo $GLOBALS['result']->customer_name_det->customer_name_details->mobile_no; ?>
			</li>
		<?php
		}
		if(isset($GLOBALS['result']->customer_name_det->customer_name_details->work_phone)){
			?>
			<li class="textbox">
				<b>Work Number:</b> <?php echo $GLOBALS['result']->customer_name_det->customer_name_details->work_phone; ?>
			</li>
		<?php
		}
		
        if(isset($GLOBALS['result']->customer_name_det->customer_name_details->email_address)){
			?>
			<li class="textbox">
				<b>Email Address:</b> <?php echo $GLOBALS['result']->customer_name_det->customer_name_details->email_address; ?>
			</li>
		<?php
		}
		?>
         <li class="textbox">
              <b>Customer Address:</b> <?php 
      if(isset($cust_address_id) && $cust_address_id != 0){
					if(strlen($cust_house_number) > 0 && $cust_house_number != 0 || strlen($cust_house_suffix) > 0 && $cust_house_suffix != 0 || strlen($cust_street_name) > 0 ||  strlen($cust_street_type) > 0 ||  strlen($cust_locality) > 0){
                    ?>
                    <a href='index.php?page=view-address&amp;id=<?php if(isset($cust_address_id)){ echo $cust_address_id; } ?>'><?php if(isset($cust_house_suffix) && strlen($cust_house_suffix) > 0){ echo $cust_house_suffix; } elseif(isset($cust_house_number)){ echo $cust_house_number; } ?> <?php if(isset($cust_street_name)){ echo $cust_street_name; } ?> <?php if(isset($cust_street_type)){ echo $cust_street_type; } ?> <?php if(isset($cust_locality)){ echo $cust_locality; } ?> <?php if(isset($cust_postcode)){ echo $cust_postcode; } ?> </a>
                    <?php
					}
                }
      ?>
          </li>
           <li class="textbox">
              <b>Address Description:</b> <?php 
      if(isset($cust_address_id)){
          if(isset($cust_desc)){ echo " ".$cust_desc; }
      }
      ?>
          </li>
      </ul>
      <span class="graytitle">Details</span>
      <ul class="pageitem">
          <li class="textbox">
              <b>Location Address:</b> <?php 
          if(isset($loc_address_id)){
              ?>
              <a href='index.php?page=view-address&id=<?php if(isset($loc_address_id)){ echo $loc_address_id; } ?>&ref=<?php echo $_GET['id']; ?>&ref_page=view-request&filter=<?php echo $filter; ?>'><?php if(isset($loc_house_suffix) && strlen($loc_house_suffix) > 0){ echo $loc_house_suffix; } elseif(isset($loc_house_number)){ echo $loc_house_number; } ?> <?php if(isset($loc_street_name)){ echo $loc_street_name; } ?> <?php if(isset($loc_street_type)){ echo $loc_street_type; } ?> <?php if(isset($loc_locality)){ echo $loc_locality; } ?> <?php if(isset($loc_postcode)){ echo $loc_postcode; } ?> </a>
              <?php
          }
          ?>
              
                  </li>
          <li class="textbox">
              <b>Address Description:</b> <?php 
          if(isset($loc_address_id)){
              if(isset($loc_desc)){ echo " ".$loc_desc; }
          }
          ?>
                  </li>
                  
          <?php
		  
			if(isset($GLOBALS['result']->facility_det) && count($GLOBALS['result']->facility_det) > 0){
				foreach($GLOBALS['result']->facility_det as $facility){
					?>
					<li class="textbox">
						<b>Facility Name:</b> <?php if(isset($facility->facility_name)) echo $facility->facility_name; ?>
					</li>
					<li class="textbox">
						<b>Facility Type:</b> <?php if(isset($facility->facility_type)){ echo $facility->facility_type; } ?>
					</li>
                    <li class="textbox">
						<p><strong>Facility Description:</strong> <?php if(isset($facility->facility_desc)){ echo $facility->facility_desc; } ?></p>
					</li>
					<?php
				}
			}
			elseif(isset($GLOBALS['result']->facility_det->facility_details) && count($GLOBALS['result']->facility_det->facility_details) == 1){
				$facility = $GLOBALS['result']->facility_det->facility_details;
				?>
				<li class="textbox">
					<b>Facility Name:</b> <?php if(isset($facility->facility_name)) echo $facility->facility_name; ?>
				</li>
				<li class="textbox">
					<b>Facility Type:</b> <?php if(isset($facility->facility_type)){ echo $facility->facility_type; } ?>
				</li>
                <li class="textbox">
						<p><strong>Facility Description:</strong> <?php if(isset($facility->facility_desc)){ echo $facility->facility_desc; } ?></p>
					</li>
				<?php
			}
			?>
          <li class="textbox">
              <b>Request Description:</b> <br /><?php /* Display the description */  echo base64_decode($GLOBALS['result']->request_description); ?>
          </li>
           <li class="textbox">
              <b>Request Instruction:</b> <br /><?php /* Display the description */  echo base64_decode($GLOBALS['result']->request_instruction); ?>
          </li>
      </ul>
  </ul>