
<a href="#bottomAnc" data-role="button" data-inline="true" data-icon="arrow-d" data-mini="true" style="float:right"data-ajax="false">Go to bottom</a> 
<p>Found <b><?php if(isset($GLOBALS['result']->action_intray_details)){ echo count($GLOBALS['result']->action_intray_details); } else{ echo 0; } ?></b>.</p>

<ul class="no-ellipses" data-role="listview" data-filter="true" data-filter-placeholder="Search actions..." data-inset="true">

<?php  
$filter = $GLOBALS['default_filter'];
if(isset($GLOBALS['result']->action_intray_details) && count($GLOBALS['result']->action_intray_details) > 1){
	$i = 0;
    foreach($GLOBALS['result']->action_intray_details as $action_details){
        ?>
        <li id="<?php echo $action_details->request_id; ?>" class="<?php echo $action_details->in_time_ind == "Y" ? "intime" : ''; ?> <?php echo $action_details->escalated_ind == "Y" ? "purple" : ''; ?> <?php echo strtotime($action_details->due_time) < time() ? "red" : ''; ?>">
            <a data-transition="slide" href="index.php?page=view-action&id=<?php echo $action_details->action_id; ?>&ref_page=actions&filter=<?php echo $filter; ?>">
        	<p><div class="status-code" style="display:inline">
				<?php 
                if($action_details->status_code == "OPEN" || $action_details->status_code == "REOPEN"){ echo '<div class="dotGreen" title="Open"></div>'; } elseif($action_details->status_code == "SUSPENDED"){ echo '<div class="dotYellow" title="Suspended"></div>'; } else { echo '<div class="dotRed" tile="Finalised"></div>'; } 
                ?>
            </div>
            <?php echo $action_details->assign_name; ?> </p>
             <p><b>Request ID:</b> <?php echo $action_details->request_id; ?></p>
              <p><?php echo $action_details->service_name . " - " .$action_details->request_name; if(isset($action_details->function_name)){ echo " - " . $action_details->function_name; }?></p>
              <p><?php if(isset($action_details->facility_name) && strlen($action_details->facility_name) > 0){ ?><b>Facility Name:</b> <?php  echo $action_details->facility_name;  ?></p><?php }?>
              <p><b>Issue: </b><?php if(strlen($action_details->request_description) > 0){ echo $action_details->request_description; } else { echo ""; } ?></p>
              <p><b>Location Address:</b> <?php if(isset($action_details->location_house_suffix) && isset($action_details->location_house_no) && strlen($action_details->location_house_no) > 0 && strlen($action_details->location_house_suffix) > 0 && $action_details->location_house_no != $action_details->location_house_suffix){ echo $action_details->location_house_suffix; } else{ if(isset($action_details->location_house_no)) echo $action_details->location_house_no; } if(isset($action_details->location_street_name)){ echo " " .$action_details->location_street_name; } if(isset($action_details->location_street_type)){ echo " " .$action_details->location_street_type; } if(isset($action_details->location_locality_name)){ echo " " .$action_details->location_locality_name; } ?></p>
              <p><b>Customer Name:</b> <?php if(isset($action_details->customer_given_name)){ if($action_details->customer_given_name != "Used") echo $action_details->customer_given_name; } if(isset($action_details->customer_surname)){ if($action_details->customer_surname != "Not") echo " " .$action_details->customer_surname; } ?></p>
              <p><b>Received:</b> <?php if(isset($action_details->assign_date) && $action_details->assign_date != "1970-01-01T00:00:00" && strlen($action_details->assign_date) > 0){ echo date('d/m/Y',strtotime($action_details->assign_date)); } else { echo ""; }  ?></p>
              <p><?php echo "<b>Due: </b>"; if(isset($action_details->due_time) && $action_details->due_time != "1970-01-01T00:00:00" && strlen($action_details->due_time) > 0){ echo date('d/m/Y h:i A',strtotime($action_details->due_time)); } ?></p>
			</a>
             
        </li>
    <?php
		$i++;
    }
}
elseif(isset($GLOBALS['result']->action_intray_details) && count($GLOBALS['result']->action_intray_details) == 1){
	
    $action_details = $GLOBALS['result']->action_intray_details;
    ?>
     <li id="<?php echo $action_details->request_id; ?>" class="<?php echo $action_details->in_time_ind == "Y" ? "intime" : ''; ?> <?php echo $action_details->escalated_ind == "Y" ? "purple" : ''; ?> <?php echo strtotime($action_details->due_time) < time() ? "red" : ''; ?>">
		<a data-transition="slide" href="index.php?page=view-action&id=<?php echo $action_details->action_id; ?>&ref_page=actions&filter=<?php echo $filter; ?>">
        <p><div class="status-code" style="display:inline">
            <?php 
            if($action_details->status_code == "OPEN" || $action_details->status_code == "REOPEN"){ echo '<div class="dotGreen" title="Open"></div>'; } elseif($action_details->status_code == "SUSPENDED"){ echo '<div class="dotYellow" title="Suspended"></div>'; } else { echo '<div class="dotRed" tile="Finalised"></div>'; } 
            ?>
            <?php echo $action_details->assign_name; ?>
        </div>
         </p>
         <p><b>Request ID:</b> <?php echo $action_details->request_id; ?></p>
          <p><?php echo $action_details->service_name . " - " .$action_details->request_name; if(isset($action_details->function_name)){ echo " - " . $action_details->function_name; }?></p>
          <?php if(isset($action_details->facility_name) && strlen($action_details->facility_name) > 0){ ?><b>Facility Name:</b> <?php  echo $action_details->facility_name;  ?><br /><?php }?>
          <p><b>Issue: </b><?php if(strlen($action_details->request_description) > 0){ echo $action_details->request_description; } else { echo ""; } ?></p>
          <p><b>Location Address:</b> <?php if(isset($action_details->location_house_suffix) && isset($action_details->location_house_no) && strlen($action_details->location_house_no) > 0 && strlen($action_details->location_house_suffix) > 0 && $action_details->location_house_no != $action_details->location_house_suffix){ echo $action_details->location_house_suffix; } else{ echo $action_details->location_house_no; } if(isset($action_details->location_street_name)){ echo " " .$action_details->location_street_name; } if(isset($action_details->location_street_type)){ echo " " .$action_details->location_street_type; } if(isset($action_details->location_locality_name)){ echo " " .$action_details->location_locality_name; } ?></p>
          <p><b>Customer Name:</b> <?php if(isset($action_details->customer_given_name)){ if($action_details->customer_given_name != "Used") echo $action_details->customer_given_name; } if(isset($action_details->customer_surname)){ if($action_details->customer_surname != "Not") echo " " .$action_details->customer_surname; } ?></p>
          <p><b>Received:</b> <?php if(isset($action_details->assign_date) && $action_details->assign_date != "1970-01-01T00:00:00" && strlen($action_details->assign_date) > 0){ echo date('d/m/Y',strtotime($action_details->assign_date)); } else { echo ""; }  ?></p>
          <p><?php echo "<b>Due: </b>"; if(isset($action_details->due_time) && $action_details->due_time != "1970-01-01T00:00:00" && strlen($action_details->due_time) > 0){ echo date('d/m/Y h:i A',strtotime($action_details->due_time)); } ?></p>
        </a>
         
    </li>
<?php	
}
?>
</ul>


<a href="#topAnc" data-role="button" data-icon="arrow-u" data-inline="true" data-mini="true"  style="float:right;"data-ajax="false">Go to top</a>