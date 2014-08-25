<script type="text/javascript">
$(document).ready(function() {
    $('#requestIntrayTable').dataTable();
} );
</script>
<?php
if(isset($_GET['filter'])){
	$filter = $_GET['filter'];	
}
else{
	$filter = $GLOBALS['default_filter'];
}

?>
<div class="float-right">
<br /><br />
    Found <b><?php if(isset($GLOBALS['result']->action_intray_details)){ echo count($GLOBALS['result']->action_intray_details); } else { echo 0; } ?></b> for the filter selected.
</div>
<div class="float-left">
<table id="requestIntrayTable" class=" sortable " title="" cellspacing="0">
	<thead>
        <tr class="head">
            <th>Request ID</th>
            <th>Description</th>
            <th>Category</th>
            <th>Facility</th>
            <th>Location Address</th>
            <th>Customer</th>
            <th>Due Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $number = 0;
    $change = 0;
    if(isset($GLOBALS['result']->action_intray_details) && count($GLOBALS['result']->action_intray_details) > 1){
        foreach($GLOBALS['result']->action_intray_details as $request_details){
            $number = $number+1;
            $change = $change+1;
            if($number == 2){
                $class = "dark";
                $number = 0;
            }
            else{
                $class = "light";
            }
            ?>
            <tr class="<?php echo $class; ?>" onclick="change('<?php echo $change; ?>')" title="<?php echo htmlspecialchars($request_details->service_name) . " - " . htmlspecialchars($request_details->request_name); if(isset($request_details->function_name)) echo  " - " . htmlspecialchars($request_details->function_name); ?>">
                
                <td id="<?php echo $change; ?>"><?php if(strlen($request_details->request_id) > 0){ echo $request_details->request_id; } else { echo ""; } ?></td>
                <td><?php if(isset($request_details->request_description) && strlen($request_details->request_description) > 0){ echo htmlspecialchars(substr($request_details->request_description,0 ,50) . ".."); } else { echo ""; } ?></td>
                <td><?php echo $request_details->service_name . " - " .$request_details->request_name; if(isset($request_details->function_name)){ echo " - " . $request_details->function_name; }?></td>
                 <td><?php if(isset($request_details->facility_name)){ echo $request_details->facility_name; } ?></td>
                <td><?php if(isset($request_details->location_house_suffix)){ echo $request_details->location_house_suffix; } elseif(isset($request_details->location_house_no)) { echo $request_details->location_house_no; } if(isset($request_details->location_street_name)){ echo " " .$request_details->location_street_name; } if(isset($request_details->location_street_type)){ echo " " .$request_details->location_street_type; } if(isset($request_details->location_locality_name)){ echo " " .$request_details->location_locality_name; } ?></td>
                <td><?php if(isset($request_details->customer_given_name)){ if($request_details->customer_given_name != "Used") echo $request_details->customer_given_name; } if(isset($request_details->customer_surname)){ if($request_details->customer_given_name != "Not") echo " " .$request_details->customer_surname; } ?></td>
                
                <td><?php if(strlen($request_details->due_date) > 0){ echo date('d/m/Y',strtotime(str_ireplace("00:00:00.000", "", $request_details->due_date))); } else { echo ""; } ?></td>
                <td><?php 
                    if($request_details->status == "Open"){ 
                        echo '<img width="10" height="9" src="images/green-dot.png" />';
                    }
					elseif($request_details->status == "Suspended"){
						echo '<img width="10" height="9" src="images/yellow-dot.png" />';
					}
                    else{
                        echo '<img width="10" height="9" src="images/red-dot.png" />';
                    } 
                    ?></td>
            </tr>
            <?php
        }
    }
    elseif(isset($GLOBALS['result']->action_intray_details) && count($GLOBALS['result']->action_intray_details) == 1){
        $request_details = $GLOBALS['result']->action_intray_details;	
        $number = $number+1;
        $change = $change+1;
        if($number == 2){
            $class = "dark";
            $number = 0;
        }
        else{
            $class = "light";
        }
        ?>
        
        <tr class="<?php echo $class; ?>" onclick="change('<?php echo $change; ?>')" title="<?php echo htmlspecialchars($request_details->service_name) . " - " . htmlspecialchars($request_details->request_name); if(isset($request_details->function_name)) echo " - " . htmlspecialchars($request_details->function_name); ?>">
            <td id="<?php echo $change; ?>" sorttable_customkey="<?php echo $number; ?>"><?php if(strlen($request_details->request_id) > 0){ echo $request_details->request_id; } else { echo ""; } ?></td>
            <td><?php if(isset($request_details->request_description) && strlen($request_details->request_description) > 0){ echo htmlspecialchars(substr($request_details->request_description,0 ,50) . ".."); } else { echo ""; } ?></td>
            <td><?php echo $request_details->service_name . " - " .$request_details->request_name; if(isset($request_details->function_name)){ echo " - " . $request_details->function_name; }?></td>
            <td><?php if(isset($request_details->facility_name)){ echo $request_details->facility_name; } ?></td>
            <td><?php if(isset($request_details->location_house_suffix)){ echo $request_details->location_house_suffix; } elseif(isset($request_details->location_house_no)) { echo $request_details->location_house_no; } if(isset($request_details->location_street_name)){ echo " " .$request_details->location_street_name; } if(isset($request_details->location_street_type)){ echo " " .$request_details->location_street_type; } if(isset($request_details->location_locality_name)){ echo " " .$request_details->location_locality_name; } ?></td>
                <td><?php if(isset($request_details->customer_given_name)){ if($request_details->customer_given_name != "Used") echo $request_details->customer_given_name; } if(isset($request_details->customer_surname)){ if($request_details->customer_given_name != "Not") echo " " .$request_details->customer_surname; } ?></td>
            <td><?php if(strlen($request_details->due_date) > 0){ echo date('d/m/Y',strtotime(str_ireplace("00:00:00.000", "", $request_details->due_date))); } else { echo ""; } ?></td>
            <td><?php 
                    if($request_details->status == "Open"){ 
                        echo '<img width="10" height="9" src="images/green-dot.png" />';
                    }
					elseif($request_details->status == "Suspended"){
						echo '<img width="10" height="9" src="images/yellow-dot.png" />';
					}
                    else{
                        echo '<img width="10" height="9" src="images/red-dot.png" />';
                    } 
                    ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
</div>