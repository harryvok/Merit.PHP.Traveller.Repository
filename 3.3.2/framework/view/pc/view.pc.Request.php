
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

    <div class="view-request">
		<h5>Request Details</h5>
        <div class="column quarter">
        	<span class="request-column-title">Date Input</span>
            <div class="request-column"><?php if(isset($GLOBALS['result']->request_datetime) && strlen($GLOBALS['result']->request_datetime) > 0){ echo date('d/m/Y',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']->request_datetime))); } else { echo "No date found."; } ?></div>
            <span class="request-column-title">Request Officer</span>
            <div class="request-column"><?php if(isset($GLOBALS['result']->officer_responsible_name)){ echo $GLOBALS['result']->officer_responsible_name; } ?></div>
            <span class="request-column-title">Priority</span>
            <div class="request-column"><?php if(isset($GLOBALS['result']->priority)){ echo $GLOBALS['result']->priority; } ?></div>
        </div>
        <div class="column quarter">
        	<span class="request-column-title">Date Due</span>
            <div class="request-column"><?php if(isset($GLOBALS['result']->due_datetime) && strlen($GLOBALS['result']->due_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']->due_datetime))); } else { echo "No date found."; } ?></div>
            <span class="request-column-title">Input Officer</span>
            <div class="request-column"><?php if(isset($GLOBALS['result']->input_by_name)){ echo $GLOBALS['result']->input_by_name; } ?></div>
            <span class="request-column-title">Reference No.</span>
            <div class="request-column"><?php if(isset($GLOBALS['result']->refer_no)){echo $GLOBALS['result']->refer_no; } ?></div>
        </div>
        <div class="column quarter column-end">
            <span class="request-column-title">Date Completed</span>
            <div class="request-column"><?php if($GLOBALS['result']->status != "Open"){ if(isset($GLOBALS['result']->status_datetime) && strlen($GLOBALS['result']->status_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $GLOBALS['result']->status_datetime))); } } ?></div>
            <span class="request-column-title">How Received</span>
            <div class="request-column"><?php if(isset($GLOBALS['result']->how_received_name)){ echo $GLOBALS['result']->how_received_name; } ?></div>
        </div>
        
         
        <div class="float-left">
        	<p>&nbsp;</p>
        	<h5>Location Details</h5>
          <div class="column half">
           <span class="request-column-title">Location Address</span>
            <div class="request-column">
            <?php 
                    if(isset($loc_address_id)){
                        ?>
                        <a href='index.php?page=view-address&amp;id=<?php if(isset($loc_address_id)){ echo $loc_address_id; } ?>'><?php if(isset($loc_house_suffix) && strlen($loc_house_suffix) > 0){ echo $loc_house_suffix; } elseif(isset($loc_house_number)){ echo $loc_house_number; } ?> <?php if(isset($loc_street_name)){ echo $loc_street_name; } ?> <?php if(isset($loc_street_type)){ echo $loc_street_type; } ?> <?php if(isset($loc_locality)){ echo $loc_locality; } ?> <?php if(isset($loc_postcode)){ echo $loc_postcode; } ?> </a>
                        <?php
                    }
                    ?>
              
                </div>
            </div>
            <div class="column half"> 
                <span class="request-column-title">Location Address Descr</span>
                <div class="request-column">
                    
                    <?php 
                    if(isset($loc_address_id)){
                        if(isset($loc_desc)){ echo " ".$loc_desc; }
                    }
                    ?>
                </div>
          </div>
          <?php

		if(isset($GLOBALS['result']->facility_det) && count($GLOBALS['result']->facility_det) > 1){
			$i=1;
			echo "There are <strong>".count($GLOBALS['result']->facility_det)."</strong> facilities.<br />";
			foreach($GLOBALS['result']->facility_det as $facility){
				?>
                <div class="column half"> 
				<span class="request-column-title">Facility Name</span>
				<div class="request-column" style="width:100%;">
				  <?php if(isset($facility->facility_name)) echo $facility->facility_name; ?>
				</div>
                </div>
                <div class="column half"> 
				<span class="request-column-title">Facility Type</span>
				<div class="request-column" style="width:100%;">
				  <?php if(isset($facility->facility_type)){ echo $facility->facility_type; } ?>
				</div>
                </div>
                <div class="float-left"> 
				<span class="request-column-title">Facility Description</span>
				<div class="request-column" style="width:100%;">
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
            <div class="column half"> 
            <span class="request-column-title">Facility Name</span>
            <div class="request-column" style="width:100%;">
              <?php if(isset($facility->facility_name)) echo $facility->facility_name; ?>
            </div>
            </div>
            <div class="column half"> 
            <span class="request-column-title">Facility Type</span>
            <div class="request-column" style="width:100%;">
              <?php if(isset($facility->facility_type)){ echo $facility->facility_type; } ?>
            </div>
            </div>
            <div class="float-left"> 
				<span class="request-column-title">Facility Description</span>
				<div class="request-column" style="width:100%;">
				  <?php if(isset($facility->facility_desc)){ echo $facility->facility_desc; } ?>
				</div>
                </div>
            <?php
		}
		?>

      </div>
      
       <div class="float-left">
       <p>&nbsp;</p>
       <h5>Customer Details</h5>
          <div class="column half">
           <span class="request-column-title">Customer Name</span>
            <div class="request-column">
              <?php
			  if(isset($GLOBALS['result']->customer_name_det->customer_name_details->given_names) || isset($GLOBALS['result']->customer_name_det->customer_name_details->surname)){
                $customer = "<a href='index.php?page=view-name&id=".$GLOBALS['result']->customer_name_det->customer_name_details->name_id."'>".$GLOBALS['result']->customer_name_det->customer_name_details->given_names." ".$GLOBALS['result']->customer_name_det->customer_name_details->surname."</a>";
                echo "<a href='index.php?page=view-name&id=".$GLOBALS['result']->customer_name_det->customer_name_details->name_id."'>".$customer."</a>";
			  }
                ?>
                </div>
            </div>
             <div class="column half"> 
            <span class="request-column-title">Company Name</span>
                <div class="request-column">
              <?php if(isset($GLOBALS['result']->customer_name_det->customer_name_details->company_name)){ echo $GLOBALS['result']->customer_name_det->customer_name_details->company_name; } ?>
                </div>
            </div>
      </div>
      <div class="column quarter">
            <span class="request-column-title">Phone Number</span>
            <div class="request-column"><?php if(isset($GLOBALS['result']->customer_name_det->customer_name_details->telephone)){ echo $GLOBALS['result']->customer_name_det->customer_name_details->telephone;  }?></div>
        </div>
        <div class="column quarter">
            <span class="request-column-title">Mobile Number</span>
            <div class="request-column"><?php if(isset($GLOBALS['result']->customer_name_det->customer_name_details->mobile_no)){ echo $GLOBALS['result']->customer_name_det->customer_name_details->mobile_no;  }?></div>
        </div>
        <div class="column quarter">
            <span class="request-column-title">Work Number</span>
            <div class="request-column"><?php if(isset($GLOBALS['result']->customer_name_det->customer_name_details->work_phone)){ echo $GLOBALS['result']->customer_name_det->customer_name_details->work_phone; } ?></div>
        </div>
        <div class="float-left">
          <div class="column half">
           <span class="request-column-title">Customer Address</span>
            <div class="request-column">
            	<?php 
                if(isset($cust_address_id) && $cust_address_id != 0){
					if(strlen($cust_house_number) > 0 && $cust_house_number != 0 || strlen($cust_house_suffix) > 0 && $cust_house_suffix != 0 || strlen($cust_street_name) > 0 ||  strlen($cust_street_type) > 0 ||  strlen($cust_locality) > 0){
                    ?>
                    <a href='index.php?page=view-address&amp;id=<?php if(isset($cust_address_id)){ echo $cust_address_id; } ?>'><?php if(isset($cust_house_suffix) && strlen($cust_house_suffix) > 0){ echo $cust_house_suffix; } elseif(isset($cust_house_number)){ echo $cust_house_number; } ?> <?php if(isset($cust_street_name)){ echo $cust_street_name; } ?> <?php if(isset($cust_street_type)){ echo $cust_street_type; } ?> <?php if(isset($cust_locality)){ echo $cust_locality; } ?> <?php if(isset($cust_postcode)){ echo $cust_postcode; } ?> </a>
                    <?php
					}
                }
                ?>
                
                </div>
            </div>
            <div class="column half"> 
                <span class="request-column-title">Customer Address Descr</span>
                <div class="request-column">
                    <?php 
					if(isset($cust_address_id)){
						if(isset($cust_desc)){ echo " ".$cust_desc; }
					}
					?>
                </div>
          </div>
      </div>
      <div class="float-left">
          <div class="column half">
           <span class="request-column-title">Customer Email</span>
            <div class="request-column">
            	<?php if(isset($GLOBALS['result']->customer_name_det->customer_name_details->email_address)){ echo $GLOBALS['result']->customer_name_det->customer_name_details->email_address; }?>
                </div>
            </div>
      </div>
      
       
        <div class="float-left">
        <p>&nbsp;</p>
        <h5>Request</h5>
            <span class="request-column-title">Request Description</span>
            <div class="request-column"><?php /* Display the description */  if(isset($GLOBALS['result']->request_description)){ echo base64_decode($GLOBALS['result']->request_description); } ?></div>
            <span class="request-column-title">Request Instructions</span>
            <div class="request-column"><?php /* Display the description */  if(isset($GLOBALS['result']->request_instruction)){ echo base64_decode($GLOBALS['result']->request_instruction); } ?></div>
        </div>

     
 </div>