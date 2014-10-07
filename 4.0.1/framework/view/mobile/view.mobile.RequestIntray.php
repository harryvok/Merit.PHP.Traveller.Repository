<a href="#bottomAnc" data-role="button" data-inline="true" data-icon="arrow-d" data-mini="true" style="float:right" data-ajax="false">Go to bottom</a> 
<p>Found <b><?php if(isset($GLOBALS['result']->action_intray_details)){ echo count($GLOBALS['result']->action_intray_details); } else { echo 0; } ?></b>.</p>
                
<ul class="no-ellipses" data-role="listview" data-filter="true" data-filter-placeholder="Search requests..." data-inset="true">
  
<?php
if(isset($_GET['filter'])){
	$filter = $_GET['filter'];	
}
else{
	$filter = $GLOBALS['default_filter'];
}
if(isset($GLOBALS['result']->action_intray_details) && count($GLOBALS['result']->action_intray_details) > 1){
	$i = 0;
    foreach($GLOBALS['result']->action_intray_details as $request_details){ 
		?>        
        <li class="<?php echo $request_details->in_time_ind == "Y" ? "intime" : ''; ?> <?php echo $request_details->escalated_ind == "Y" ? "purple" : ''; ?> <?php echo strtotime(str_ireplace("00:00:00.000", "", $request_details->due_date)) < time() ? "red" : ''; ?>">
         <a data-transition="slide" href="index.php?page=view-request&id=<?php echo $request_details->request_id; ?>&ref_page=requests&filter=<?php echo $filter; ?>">
              <p><div class="status-code" style="display:inline">
                  <?php 
                  if($request_details->status_code == "OPEN"){ 
                      echo '<img width="10" height="9" src="images/dotGreen.png" />';
                  }
                  elseif($request_details->status_code == "SUSPENDED"){
                      echo '<img width="10" height="9" src="images/dotYellow.png" />';
                  }
                  else{
                      echo '<img width="10" height="9" src="images/dotRed.png" />';
                  } 
                  ?>
              </div>
              <?php 
              echo $request_details->service_name . " - " .
              $request_details->request_name;
              if(isset($request_details->function_name)) echo  " - " . $request_details->function_name;
              ?></p>
              <p><b>Request ID:</b> <?php echo $request_details->request_id; ?></p>
              <p><b>Issue:</b> <?php if(isset($request_details->request_description)){ echo htmlspecialchars(substr($request_details->request_description,0 ,50) . ".."); } else { echo ""; } ?></p>
               <p><?php if(isset($request_details->facility_name) && strlen($request_details->facility_name) > 0){ ?><b>Facility Name:</b> <?php  echo $request_details->facility_name;  ?></p><?php }?>
               <p><b>Location Address:</b> <?php if(isset($request_details->location_house_suffix) && isset($request_details->location_house_no) && strlen($request_details->location_house_no) > 0 && strlen($request_details->location_house_suffix) > 0 && $request_details->location_house_no != $request_details->location_house_suffix){ echo $request_details->location_house_suffix; } else{ echo $request_details->location_house_no; } if(isset($request_details->location_street_name)){ echo " " .$request_details->location_street_name; } if(isset($request_details->location_street_type)){ echo " " .$request_details->location_street_type; } if(isset($request_details->location_locality_name)){ echo " " .$request_details->location_locality_name; } ?></p>
              <p><b>Customer Name:</b> <?php if(isset($request_details->customer_given_name)){ if($request_details->customer_given_name != "Used") echo $request_details->customer_given_name; } if(isset($request_details->customer_surname)){ if($request_details->customer_given_name != "Not") echo " " .$request_details->customer_surname; } ?></p>
              <p><b>Received Date:</b> <?php if(strlen($request_details->request_date) > 0){ echo date('d/m/Y',strtotime(str_ireplace("00:00:00.000", "", $request_details->request_date))); } else { echo ""; } ?> <?php if(strlen($request_details->request_time) > 0){ echo date('h:i A',strtotime($request_details->request_time)); } else { echo ""; } ?></p>
             <p><b>Due Date:</b> <?php if(strlen($request_details->due_date) > 0){ echo date('d/m/Y',strtotime(str_ireplace("00:00:00.000", "", $request_details->due_date))); } else { echo ""; } ?> <?php if(strlen($request_details->due_time) > 0){ echo date('h:i A',strtotime($request_details->due_time)); } else { echo ""; } ?></p>
          </a>
         </li>        
		 <?php
		$i++;
    }
}
elseif(isset($GLOBALS['result']->action_intray_details) && count($GLOBALS['result']->action_intray_details) == 1){
    $request_details = $GLOBALS['result']->action_intray_details;
    ?>
    <li class="<?php echo $request_details->in_time_ind == "Y" ? "intime" : ''; ?> <?php echo $request_details->escalated_ind == "Y" ? "purple" : ''; ?> <?php echo strtotime(str_ireplace("00:00:00.000", "", $request_details->due_date)) < time() ? "red" : ''; ?>">
         <a data-transition="slide" href="index.php?page=view-request&id=<?php echo $request_details->request_id; ?>&ref_page=requests&filter=<?php echo $filter; ?>">
              <p>
              <div class="status-code" style="display:inline">
					  <?php 
                  if($request_details->status_code == "OPEN"){ 
                      echo '<img width="10" height="9" src="images/dotGreen.png" />';
                  }
                  elseif($request_details->status_code == "SUSPENDED"){
                      echo '<img width="10" height="9" src="images/dotYellow.png" />';
                  }
                  else{
                      echo '<img width="10" height="9" src="images/dotRed.png" />';
                  } 
                  ?>
              </div>
              <?php 
              echo $request_details->service_name . " - " .
              $request_details->request_name;
              if(isset($request_details->function_name)) echo  " - " . $request_details->function_name;
              ?></p>
              <p><b>Request ID:</b> <?php echo $request_details->request_id; ?></p>
              <p><b>Issue:</b> <?php if(isset($request_details->request_description)){ echo htmlspecialchars(substr($request_details->request_description,0 ,50) . ".."); } else { echo ""; } ?></p>
                <p><?php if(isset($request_details->facility_name) && strlen($request_details->facility_name) > 0){ ?><b>Facility Name:</b> <?php  echo $request_details->facility_name;  ?></p><?php }?>
               <p><b>Location Address:</b> <?php if(isset($request_details->location_house_suffix) && isset($request_details->location_house_no) && strlen($request_details->location_house_no) > 0 && strlen($request_details->location_house_suffix) > 0 && $request_details->location_house_no != $request_details->location_house_suffix){ echo $request_details->location_house_suffix; } else { echo $request_details->location_house_no; } if(isset($request_details->location_street_name)){ echo " " .$request_details->location_street_name; } if(isset($request_details->location_street_type)){ echo " " .$request_details->location_street_type; } if(isset($request_details->location_locality_name)){ echo " " .$request_details->location_locality_name; } ?></p>
              <p><b>Customer Name:</b> <?php if(isset($request_details->customer_given_name)){ if($request_details->customer_given_name != "Used") echo $request_details->customer_given_name; } if(isset($request_details->customer_surname)){ if($request_details->customer_given_name != "Not") echo " " .$request_details->customer_surname; } ?></p>
              <p><b>Received Date:</b> <?php if(strlen($request_details->request_date) > 0){ echo date('d/m/Y',strtotime(str_ireplace("00:00:00.000", "", $request_details->request_date))); } else { echo ""; } ?> <?php if(strlen($request_details->request_time) > 0){ echo date('h:i A',strtotime($request_details->request_time)); } else { echo ""; } ?></p>
             <p><b>Due Date:</b> <?php if(strlen($request_details->due_date) > 0){ echo date('d/m/Y',strtotime(str_ireplace("00:00:00.000", "", $request_details->due_date))); } else { echo ""; } ?> <?php if(strlen($request_details->due_time) > 0){ echo date('h:i A',strtotime($request_details->due_time)); } else { echo ""; } ?></p>
          </a>
         </li> 
    <?php
}
?></ul>
<a href="#topAnc" data-role="button" data-icon="arrow-u" data-inline="true" data-mini="true"  style="float:right"data-ajax="false">Go to top</a>