
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

  <ul class="no-ellipses" class="no-ellipses" data-role="listview" data-inset="true" data-divider-theme="d">
  		<li data-role="list-divider">Request Details</li>
      <li>
          <p><strong>Request ID:</strong> <?php echo $GLOBALS['request_id']; ?></p> 
      </li>
      <li>
          <p><strong>Priority:</strong> <?php echo $GLOBALS['result']->priority; ?></p>
      </li>
      <li>
          <p><strong>Date Input:</strong> <?php if(strlen($GLOBALS['result']->request_datetime) > 0){ echo date('d/m/Y',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']->request_datetime))); } ?></p>
      </li>
      <li>
          <p><strong>Due Date:</strong> <?php if(strlen($GLOBALS['result']->due_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']->due_datetime))); } ?></p>
      </li>
      <li>
          <p><strong>Completed Date:</strong> <?php if($GLOBALS['result']->finalised_ind == "Y"){ if(strlen($GLOBALS['result']->status_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']->status_datetime))); } } ?></p>
      </li>
      <li>
          <p><strong>Reference Number:</strong> <?php if(isset($GLOBALS['result']->refer_no)){ echo $GLOBALS['result']->refer_no; } ?></p>
      </li>
      <li>
          <p><strong>Request Officer:</strong> <?php if(isset($GLOBALS['result']->officer_responsible_name)){ echo $GLOBALS['result']->officer_responsible_name; } ?></p>
      </li>
      <li>
          <p><strong>Input Officer:</strong> <?php if(isset($GLOBALS['result']->input_by_name)){ echo $GLOBALS['result']->input_by_name; } ?></p>
      </li>
      <li>
          <p><strong>How Received:</strong> <?php if(isset($GLOBALS['result']->how_received_name)){ echo $GLOBALS['result']->how_received_name; } ?></p>
      </li>
      <li data-role="list-divider">Issue Details</li>
      <li>
              <p><strong>Request Description:</strong> <br /><?php /* Display the description */  echo base64_decode($GLOBALS['result']->request_description); ?></p>
          </li>
          <li class="textbox">
              <p><strong>Request Instruction:</strong> <br /><?php /* Display the description */  echo base64_decode($GLOBALS['result']->request_instruction); ?></p>
          </li>
    <li data-role="list-divider">Location Details</li>
     <?php 
     if(isset($loc_address_id)){
              ?>
          <li>
               
              <a href='index.php?page=view-address&id=<?php if(isset($loc_address_id)){ echo $loc_address_id; } ?>&ref_page=view-request&ref=<?php echo $_GET['id']; ?>&filter=<?php echo $filter; ?>'><?php if(isset($loc_house_suffix) && strlen($loc_house_suffix) > 0 && isset($loc_house_number) && strlen($loc_house_number > 0) && $loc_house_number != $loc_house_suffix){ echo $loc_house_suffix; } elseif(isset($loc_house_number)){ echo $loc_house_number; } ?> <?php if(isset($loc_street_name)){ echo $loc_street_name; } ?> <?php if(isset($loc_street_type)){ echo $loc_street_type; } ?> <?php if(isset($loc_locality)){ echo $loc_locality; } ?> <?php if(isset($loc_postcode)){ echo $loc_postcode; } ?> </a>
              
              
                  </li>
                  <?php
     }
          ?>
          <?php 
              if(isset($loc_desc) && strlen($loc_desc) > 0){
            ?>
                <li>
                    <p>
                        <strong>Address Description:</strong> <?php 
                          echo $loc_desc; 
                         ?>
                    </p>
                </li>
        <?php
              }
              if(isset($address->property_no) && strlen($address->property_no) > 0){
        ?>
        <li>
            <p><strong>Property Number</strong> <?php if(isset($address->property_no)) echo $address->property_no; ?></p>
        </li>
        <?php
          }
		  
          if(isset($GLOBALS['result']->facility_det) && count($GLOBALS['result']->facility_det) > 0){
              foreach($GLOBALS['result']->facility_det as $facility){
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
          elseif(isset($GLOBALS['result']->facility_det->facility_details) && count($GLOBALS['result']->facility_det->facility_details) == 1){
              $facility = $GLOBALS['result']->facility_det->facility_details;
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
            if(isset($GLOBALS['result']->customer_name_det->customer_name_details->name_type) && strlen($GLOBALS['result']->customer_name_det->customer_name_details->name_type) > 0){
        ?>
        <li>
            <p><strong>Customer Type:</strong> <?php echo $GLOBALS['result']->customer_name_det->customer_name_details->name_type; ?></p>
        </li>
        <?php
        }    
        if(isset($GLOBALS['result']->customer_name_det->customer_name_details->given_names)  && strlen($GLOBALS['result']->customer_name_det->customer_name_details->given_names) > 0 || isset($GLOBALS['result']->customer_name_det->customer_name_details->surname) && strlen($GLOBALS['result']->customer_name_det->customer_name_details->surname) > 0){
            
        ?>

        <li>
            <?php
            $customer = "<a href='index.php?page=view-name&id=".$GLOBALS['result']->customer_name_det->customer_name_details->name_id."&ref=".$_GET['id']."&ref_page=view-request'>".$GLOBALS['result']->customer_name_det->customer_name_details->given_names." ".$GLOBALS['result']->customer_name_det->customer_name_details->surname."</a>";
            echo $customer;
            ?>
        </li>
        
        <?php
            }
            if(isset($GLOBALS['result']->customer_name_det->customer_name_details->company_name) && strlen($GLOBALS['result']->customer_name_det->customer_name_details->company_name) > 0){ ?>
        <li>
            <p><strong>Company Name:</strong> <?php if(isset($GLOBALS['result']->customer_name_det->customer_name_details->company_name)){ echo $GLOBALS['result']->customer_name_det->customer_name_details->company_name; } ?></p>
        </li>
        <?php 
            } 
            if(isset($GLOBALS['result']->customer_name_det->customer_name_details->telephone) && strlen($GLOBALS['result']->customer_name_det->customer_name_details->telephone) > 0){
        ?>
        <li>
            <p><strong>Phone Number:</strong> <?php echo $GLOBALS['result']->customer_name_det->customer_name_details->telephone; ?></p>
        </li>
        <?php
            }
            if(isset($GLOBALS['result']->customer_name_det->customer_name_details->mobile_no) && strlen($GLOBALS['result']->customer_name_det->customer_name_details->mobile_no) > 0){
        ?>
        <li>
            <p><strong>Mobile Number:</strong> <?php echo $GLOBALS['result']->customer_name_det->customer_name_details->mobile_no; ?></p>
        </li>
        <?php
            }
            if(isset($GLOBALS['result']->customer_name_det->customer_name_details->work_phone) && strlen($GLOBALS['result']->customer_name_det->customer_name_details->work_phone) > 0){
        ?>
        <li>
            <p><strong>Work Number:</strong> <?php echo $GLOBALS['result']->customer_name_det->customer_name_details->work_phone; ?></p>
        </li>
        <?php
            }
        
            if(isset($GLOBALS['result']->customer_name_det->customer_name_details->email_address) && strlen($GLOBALS['result']->customer_name_det->customer_name_details->email_address) > 0){
        ?>
        <li>
            <p><strong>Email Address:</strong> <?php echo $GLOBALS['result']->customer_name_det->customer_name_details->email_address; ?></p>
        </li>
        <?php
            }
        ?></p>
            <?php 
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
        <?php if(isset($cust_desc) && strlen($cust_desc) > 0){ ?><li>
            <p>
                <strong>Address Description:</strong> <?php 
                  echo $cust_desc; 
              
                                                      ?>
            </p>
        </li><?php
              }
             ?>


  </ul>