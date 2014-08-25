<script type="text/javascript">
$(document).ready(function() {
    $('#actionIntrayTable').dataTable();
} );
</script>
<div class="float-right">
    <br /><br />
    Found <b><?php if(isset($GLOBALS['result']->action_intray_details)){ echo count($GLOBALS['result']->action_intray_details); } else { echo 0; } ?></b> for the filter selected.
</div>
<div class="float-left">
    <table id="actionIntrayTable" class=" sortable" title="" cellspacing="0">
    <thead>
        <tr>
            <th>Request ID</th>
            <th>Action Required</th>
            <th>Category</th>
            <th>Facility</th>
            <th>Location Address</th>
            <th>Customer</th>
            <th>Received</th>
            <th>Due</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
		$number=0;
        if(isset($GLOBALS['result']->action_intray_details)){
            if(count($GLOBALS['result']->action_intray_details) > 1){
                foreach($GLOBALS['result']->action_intray_details as $action_details){
                    $change = $action_details->action_id;
                    $number = $number+1;
                    if($number == 2){
                        $class = "dark";
                        $number = 0;
                    }
                    else{
                        $class = "light";
                    }
                    ?>
                    <tr class="<?php echo $class; ?>" onclick="change('<?php echo $change; ?>')" title="">
                        <td id="<?php echo $change; ?>"><?php if(strlen($action_details->request_id) > 0){ echo $action_details->request_id; } else { echo ""; } ?></td>
                        <td><?php if(strlen($action_details->assign_name) > 0){ echo $action_details->assign_name; } else { echo ""; } ?></td>
                        <td><?php echo $action_details->service_name . " - " .$action_details->request_name; if(isset($action_details->function_name)) echo " - " . $action_details->function_name;?></td>
                        <td><?php if(isset($action_details->facility_name)){ echo $action_details->facility_name; } ?></td>
                        <td><?php if(isset($action_details->location_house_suffix)){ echo $action_details->location_house_suffix; } elseif(isset($request_details->location_house_no)) { echo $request_details->location_house_no; } if(isset($action_details->location_street_name)){ echo " " .$action_details->location_street_name; } if(isset($action_details->location_street_type)){ echo " " .$action_details->location_street_type; } if(isset($action_details->location_locality_name)){ echo " " .$action_details->location_locality_name; } ?></td>
                    <td><?php if(isset($action_details->customer_given_name)){ if($action_details->customer_given_name != "Used") echo $action_details->customer_given_name; } if(isset($action_details->customer_surname)){ if($action_details->customer_surname != "Not") echo " " .$action_details->customer_surname; } ?></td>
                    <td><?php if(isset($action_details->assign_date) && $action_details->assign_date != "1970-01-01T00:00:00" && strlen($action_details->assign_date) > 0){ echo date('d/m/Y',strtotime($action_details->assign_date)); } else { echo ""; }  ?></td>
                    <td><?php if(isset($action_details->due_time) && $action_details->due_time != "1970-01-01T00:00:00" && strlen($action_details->due_time) > 0){ echo date('d/m/Y h:i A',strtotime($action_details->due_time)); } else { echo ""; }  ?></td>
                        <td><?php if($action_details->status_code == "OPEN" || $action_details->status_code == "REOPEN"){ echo '<div class="green-dot" title="Open"></div>'; } elseif($action_details->status_code == "SUSPENDED"){ echo '<div class="yellow-dot" title="Suspended"></div>'; } else { echo '<div class="red-dot" tile="Finalised"></div>'; } ?></td>
                    </tr>
                    <?php
                }
            }
            elseif(count($GLOBALS['result']->action_intray_details) == 1){
                $action_details = $GLOBALS['result']->action_intray_details;
                $change = $action_details->action_id;
                $number = $number+1;
                if($number == 2){
                    $class = "dark";
                    $number = 0;
                }
                else{
                    $class = "light";
                }
                ?>
                <tr class="<?php echo $class; ?>" onclick="change('<?php echo $change; ?>')" title="">
                    <td id="<?php echo $change; ?>"><?php if(strlen($action_details->request_id) > 0){ echo $action_details->request_id; } else { echo ""; } ?></td>
                    <td><?php if(strlen($action_details->assign_name) > 0){ echo $action_details->assign_name; } else { echo ""; } ?></td>
                    <td><?php echo $action_details->service_name . " - " .$action_details->request_name . " - " . $action_details->function_name;?></td>
                     <td><?php if(isset($action_details->facility_name)){ echo $action_details->facility_name; } ?></td>
                     <td><?php if(isset($action_details->location_house_suffix)){ echo $action_details->location_house_suffix; } elseif(isset($request_details->location_house_no)) { echo $request_details->location_house_no; } if(isset($action_details->location_street_name)){ echo " " .$action_details->location_street_name; } if(isset($action_details->location_street_type)){ echo " " .$action_details->location_street_type; } if(isset($action_details->location_locality_name)){ echo " " .$action_details->location_locality_name; } ?></td>
                    <td><?php if(isset($action_details->customer_given_name)){ if($action_details->customer_given_name != "Used") echo $action_details->customer_given_name; } if(isset($action_details->customer_surname)){ if($action_details->customer_surname != "Not") echo " " .$action_details->customer_surname; } ?></td>
                    <td><?php if(isset($action_details->assign_date) && $action_details->assign_date != "1970-01-01T00:00:00" && strlen($action_details->assign_date) > 0){ echo date('d/m/Y',strtotime($action_details->assign_date)); } else { echo ""; }  ?></td>
                    <td><?php if(isset($action_details->due_time) && $action_details->due_time != "1970-01-01T00:00:00" && strlen($action_details->due_time) > 0){ echo date('d/m/Y h:i A',strtotime($action_details->due_time)); } else { echo ""; }  ?></td>
                    <td><?php if($action_details->status_code == "OPEN" || $action_details->status_code == "REOPEN"){ echo '<div class="green-dot" title="Open"></div>'; } elseif($action_details->status_code == "SUSPENDED"){ echo '<div class="yellow-dot" title="Suspended"></div>'; } else { echo '<div class="red-dot" tile="Finalised"></div>'; } ?></td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>