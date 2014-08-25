<ul class="pageitem">
    <li class="textbox">
        Found <b><?php if(isset($GLOBALS['result']->action_intray_details)){ echo count($GLOBALS['result']->action_intray_details); } else{ echo 0; } ?></b> for the filter selected.
    </li>
</ul>

<?php  
if(isset($GLOBALS['result']->action_intray_details) && count($GLOBALS['result']->action_intray_details) > 1){
	$i = 0;
	?>
    <ul class="pageitem">
        <li class="bigfield">
        	<input type="text" placeholder="Search..." id="searchText" />
        </li>
    </ul>
    <?php
    foreach($GLOBALS['result']->action_intray_details as $action_details){
        ?>
        <ul class="pageitem searchObject" id="searchObject<?php echo $i; ?>">
            <li class="textbox">
                <span class="header">
                    <div class="status_code">
                        <?php 
                        if($action_details->status_code == "OPEN" || $action_details->status_code == "REOPEN"){ echo '<div class="green-dot" title="Open"></div>'; } elseif($action_details->status_code == "SUSPENDED"){ echo '<div class="yellow-dot" title="Suspended"></div>'; } else { echo '<div class="red-dot" tile="Finalised"></div>'; } 
                        ?>
                    </div>
                    <?php echo $action_details->assign_name; ?> 
                </span>
                <b>Request ID:</b> <?php echo $action_details->request_id; ?><br />
                <?php echo $action_details->service_name . " - " .$action_details->request_name; if(isset($action_details->function_name)){ echo " - " . $action_details->function_name; }?><br />
				<?php if(isset($action_details->facility_name) && strlen($action_details->facility_name) > 0){ ?><b>Facility Name:</b> <?php  echo $action_details->facility_name;  ?><br /><?php }?>
                 <b>Location Address:</b> <?php if(isset($action_details->location_house_suffix)){ echo $action_details->location_house_suffix; } elseif(isset($request_details->location_house_no)) { echo $request_details->location_house_no; } if(isset($action_details->location_street_name)){ echo " " .$action_details->location_street_name; } if(isset($action_details->location_street_type)){ echo " " .$action_details->location_street_type; } if(isset($action_details->location_locality_name)){ echo " " .$action_details->location_locality_name; } ?><br />
                <b>Customer Name:</b> <?php if(isset($action_details->customer_given_name)){ if($action_details->customer_given_name != "Used") echo $action_details->customer_given_name; } if(isset($action_details->customer_surname)){ if($action_details->customer_surname != "Not") echo " " .$action_details->customer_surname; } ?><br />
                <b>Received:</b> <?php if(isset($action_details->assign_date) && $action_details->assign_date != "1970-01-01T00:00:00" && strlen($action_details->assign_date) > 0){ echo date('d/m/Y',strtotime($action_details->assign_date)); } else { echo ""; }  ?><br />
            </li>
            <li class="menu">
            <?php
			if(isset($_GET['filter'])){ ?> <a href="index.php?page=view-action&id=<?php echo $action_details->action_id; ?>&ref_page=actions&filter=<?php echo $_GET['filter']; ?>"> 
			<?php } else { ?> <a href="index.php?page=view-action&id=<?php echo $action_details->action_id; ?>&ref_page=actions"> <?php } ?>
                <span class="name">View</span>
                <span class="comment"><?php echo "<b>Due: </b>"; if(isset($action_details->due_time) && $action_details->due_time != "1970-01-01T00:00:00" && strlen($action_details->due_time) > 0){ echo date('d/m/Y h:i A',strtotime($action_details->due_time)); } ?></span>
                <span class="arrow"></span>
                </a>
            </li>
        </ul>
    <?php
		$i++;
    }
}
elseif(isset($GLOBALS['result']->action_intray_details) && count($GLOBALS['result']->action_intray_details) == 1){
	
    $action_details = $GLOBALS['result']->action_intray_details;
    ?>
     <ul class="pageitem">
        <li class="textbox">
            <span class="header">
                <div class="status_code">
                    <?php 
                        if($action_details->status_code == "OPEN" || $action_details->status_code == "REOPEN"){ echo '<div class="green-dot" title="Open"></div>'; } elseif($action_details->status_code == "SUSPENDED"){ echo '<div class="yellow-dot" title="Suspended"></div>'; } else { echo '<div class="red-dot" tile="Finalised"></div>'; } 
                        ?>
                </div>
                <?php echo $action_details->assign_name; ?> 
            </span>
            <b>Request ID:</b> <?php echo $action_details->request_id; ?><br />
            <?php echo $action_details->service_name . " - " .$action_details->request_name . " - " . $action_details->function_name;?><br />
           <?php if(isset($action_details->facility_name) && strlen($action_details->facility_name) > 0){ ?><b>Facility Name:</b> <?php  echo $action_details->facility_name;  ?><br /><?php }?>
                 <b>Location Address:</b> <?php if(isset($action_details->location_house_suffix)){ echo $action_details->location_house_suffix; } elseif(isset($request_details->location_house_no)) { echo $request_details->location_house_no; } if(isset($action_details->location_street_name)){ echo " " .$action_details->location_street_name; } if(isset($action_details->location_street_type)){ echo " " .$action_details->location_street_type; } if(isset($action_details->location_locality_name)){ echo " " .$action_details->location_locality_name; } ?><br />
                <b>Customer Name:</b> <?php if(isset($action_details->customer_given_name)){ if($action_details->customer_given_name != "Used") echo $action_details->customer_given_name; } if(isset($action_details->customer_surname)){ if($action_details->customer_surname != "Not") echo " " .$action_details->customer_surname; } ?><br />
                <b>Received:</b> <?php if(isset($action_details->assign_date) && $action_details->assign_date != "1970-01-01T00:00:00" && strlen($action_details->assign_date) > 0){ echo date('d/m/Y',strtotime($action_details->assign_date)); } else { echo ""; }  ?><br />
        </li>
        <li class="menu">
            <?php
			if(isset($_GET['filter'])){ ?> <a href="index.php?page=view-action&id=<?php echo $action_details->action_id; ?>&ref_page=actions&filter=<?php echo $_GET['filter']; ?>"> 
			<?php } else { ?> <a href="index.php?page=view-action&id=<?php echo $action_details->action_id; ?>&ref_page=actions"> <?php } ?>
            <span class="name">View</span>
            <span class="comment"><?php echo "<b>Due: </b>"; if(isset($action_details->due_time) && $action_details->due_time != "1970-01-01T00:00:00" && strlen($action_details->due_time) > 0){ echo date('d/m/Y h:i A',strtotime($action_details->due_time)); } ?></span>
            <span class="arrow"></span>
            </a>
        </li>
    </ul>
<?php	
}
?>