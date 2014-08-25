<ul class="pageitem">
    <li class="textbox">
    Found <b><?php if(isset($GLOBALS['result']->action_intray_details)){ echo count($GLOBALS['result']->action_intray_details); } else { echo 0; } ?></b> for the filter selected.</li>
   
</ul>
<?php
if(isset($_GET['filter'])){
	$filter = $_GET['filter'];	
}
else{
	$filter = $GLOBALS['default_filter'];
}
if(isset($GLOBALS['result']->action_intray_details) && count($GLOBALS['result']->action_intray_details) > 1){
	?>
    <ul class="pageitem">
        <li class="bigfield">
        	<input type="text" placeholder="Search..." id="searchText" />
        </li>
    </ul>
    <?php
	$i = 0;
    foreach($GLOBALS['result']->action_intray_details as $request_details){ 
			?>
        <ul class="pageitem searchObject" id="searchObject<?php echo $i; ?>">
            <li class="textbox">
                <span class="header">
                    <div class="status_code">
                    
                        <?php 
                    if($request_details->status == "Open"){ 
                        echo '<img width="10" height="9" src="images/green-dot.png" />';
                    }
					elseif($request_details->status == "Suspended"){
						echo '<img width="10" height="9" src="images/yellow-dot.png" />';
					}
                    else{
                        echo '<img width="10" height="9" src="images/red-dot.png" />';
                    } 
                    ?>
                    </div>
                    <?php 
                    echo $request_details->service_name . " - " .
                    $request_details->request_name;
					if(isset($request_details->function_name)) echo  " - " . $request_details->function_name;
                    ?>
                </span>
                <br />
                <b>Request ID:</b> <?php echo $request_details->request_id; ?><br />
                <?php if(isset($request_details->facility_name) && strlen($request_details->facility_name) > 0){ ?><b>Facility Name:</b> <?php  echo $request_details->facility_name;  ?><br /><?php }?>
                 <b>Location Address:</b> <?php if(isset($request_details->location_house_suffix)){ echo $request_details->location_house_suffix; } elseif(isset($request_details->location_house_no)) { echo $request_details->location_house_no; } if(isset($request_details->location_street_name)){ echo " " .$request_details->location_street_name; } if(isset($request_details->location_street_type)){ echo " " .$request_details->location_street_type; } if(isset($request_details->location_locality_name)){ echo " " .$request_details->location_locality_name; } ?><br />
                <b>Customer Name:</b> <?php if(isset($request_details->customer_given_name)){ if($request_details->customer_given_name != "Used") echo $request_details->customer_given_name; } if(isset($request_details->customer_surname)){ if($request_details->customer_given_name != "Not") echo " " .$request_details->customer_surname; } ?><br />
                <?php if(isset($request_details->request_description)){ echo htmlspecialchars(substr($request_details->request_description,0 ,50) . ".."); } else { echo ""; } ?>
            </li>
            <li class="menu">
                <a href="index.php?page=view-request&id=<?php echo $request_details->request_id; ?>&ref_page=requests&filter=<?php echo $filter; ?>">
                    <span class="name">View</span>
                    <span class="comment"><?php if(strlen($request_details->due_time) > 0) { echo "<b>Due: </b>".date('d/m/Y h:i A',strtotime($request_details->due_time)); } else { echo ""; } ?></span>
                    <span class="arrow"></span>
                </a>
            </li>
        </ul>
        <?php
		$i++;
    }
}
elseif(isset($GLOBALS['result']->action_intray_details) && count($GLOBALS['result']->action_intray_details) == 1){
    $request_details = $GLOBALS['result']->action_intray_details;
    ?>
    <ul class="pageitem searchObject" id="searchObject0">
        <li class="textbox">
            <span class="header">
                <div class="status_code">
                     <?php 
                    if($request_details->status == "Open"){ 
                        echo '<img width="10" height="9" src="images/green-dot.png" />';
                    }
					elseif($request_details->status == "Suspended"){
						echo '<img width="10" height="9" src="images/yellow-dot.png" />';
					}
                    else{
                        echo '<img width="10" height="9" src="images/red-dot.png" />';
                    } 
                    ?>
                </div>
                <?php 
                echo $request_details->service_name . " - " .
                $request_details->request_name;
				if(isset($request_details->function_name)) echo  " - " . $request_details->function_name;
                ?>
            </span>
            <br />
            <b>Request ID:</b> <?php echo $request_details->request_id; ?><br />
              <?php if(isset($request_details->facility_name) && strlen($request_details->facility_name) > 0){ ?><b>Facility Name:</b> <?php  echo $request_details->facility_name;  ?><br /><?php }?>
                 <b>Location Address:</b> <?php if(isset($request_details->location_house_suffix)){ echo $request_details->location_house_suffix; } elseif(isset($request_details->location_house_no)) { echo $request_details->location_house_no; } if(isset($request_details->location_street_name)){ echo " " .$request_details->location_street_name; } if(isset($request_details->location_street_type)){ echo " " .$request_details->location_street_type; } if(isset($request_details->location_locality_name)){ echo " " .$request_details->location_locality_name; } ?><br />
                <b>Customer Name:</b> <?php if(isset($request_details->customer_given_name)){ if($request_details->customer_given_name != "Used") echo $request_details->customer_given_name; } if(isset($request_details->customer_surname)){ if($request_details->customer_given_name != "Not") echo " " .$request_details->customer_surname; } ?><br />
            <?php if(isset($request_details->request_description)){ echo htmlspecialchars(substr($request_details->request_description,0 ,50) . ".."); } else { echo ""; } ?>
        </li>
        <li class="menu">
            <a href="index.php?page=view-request&id=<?php echo $request_details->request_id; ?>&ref=requests&filter=<?php echo $filter; ?>">
                <span class="name">View</span>
                <span class="comment"><?php if(strlen($request_details->due_time) > 0) { echo "<b>Due: </b>".date('d/m/Y h:i A',strtotime($request_details->due_time)); } else { echo ""; } ?></span>
                <span class="arrow"></span>
            </a>
        </li>
    </ul>
    <?php
}
?>