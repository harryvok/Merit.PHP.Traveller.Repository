
<script type="text/javascript">


$(document).ready(function() {
    var oTable = $('#actionIntrayTable').dataTable({
        iDisplayLength: "50",
        "aaSorting": [[ 5, "asc" ]],
        "oLanguage": {
                "sSearch": "Intray Filter: "
         },
        "aoColumns": [
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            {"sType": "date-uk" },
            {"sType": "date-euro" },
            null
        ]
    });
  
    $("#export").click(function(){
        $("#export").prop({
          disabled: true
        });
        
        var oSettings = oTable.fnSettings();
        var current = oSettings._iDisplayLength;
        oSettings._iDisplayLength = 1000;
        oTable.fnDraw();

        var rowsArray = {};
        var i = 0;
        $('#actionIntrayTable tr').each(function(){
            var i2 = 0;
            rowsArray[i] = {};
            $(this).find("th").each(function(){
                rowsArray[i][i2] = $(this).html();
                i2++;
            });
            $(this).find("td").each(function(){
                rowsArray[i][i2] = $(this).html();
                i2++;
            });
            i++;
        });
        
        oSettings._iDisplayLength = current;
        oTable.fnDraw();
        $("#tableArray").val(JSON.stringify(rowsArray));
        $("#exportForm").submit();
    });
});


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
    <br /><br /><form method="post" id="exportForm" action="process.export.php"><input type="hidden" name="tableArray" id="tableArray" /><input type="hidden" name="name" id="name" value="Action-Intray" /></form><input type="button" id="export" value="Export to Excel">
</div>

<div class="float-left">
    

    <table id="actionIntrayTable" class="sortable" title="" cellspacing="0">
  
    <!-- HEADER ///////////////////////////////////////////// -->
      <thead>
        <tr>
            <th style="width:70px;">Request ID</th>
            <th>Action Required</th>
            <th>Category</th>
            <th>Facility</th>
            <th>Address</th>
            <th>Suburb</th>
            <th>Customer</th>
            <th>Received</th>
            <th>Due</th>
            <th></th>
        </tr>
    </thead>

     <!-- BODY ///////////////////////////////////////////// -->

    <tbody>
        <?php
		$number=0;
        if(isset($GLOBALS['result']->action_intray_details)){
            if(count($GLOBALS['result']->action_intray_details) > 1){
                foreach($GLOBALS['result']->action_intray_details as $action_details){
                    $change = $action_details->action_id;
                    ?>
                    <tr data-link="index.php?page=view-action&id=<?php if(strlen($action_details->action_id) > 0){ echo $action_details->action_id; } else { echo ""; } ?>&filter=<?php echo $filter; ?>" class="<?php echo $action_details->in_time_ind == "Y" ? "intime" : ''; ?> <?php echo $action_details->escalated_ind == "Y" ? "purple" : ''; ?> <?php echo strtotime($action_details->due_time) < time() ? "red" : ''; ?>" onclick="change('<?php echo $change; ?>')" title="">
                        <td id="<?php echo $change; ?>" style="width:70px;"><?php if(strlen($action_details->request_id) > 0){ echo $action_details->request_id; } else { echo ""; } ?></td>
                        <td><?php if(strlen($action_details->assign_name) > 0){ echo $action_details->assign_name; } else { echo ""; } ?></td>
                        <td><?php echo $action_details->service_name . " - " .$action_details->request_name; if(isset($action_details->function_name)) echo " - " . $action_details->function_name;?></td>
                         <td><?php if(isset($action_details->facility_name)){ echo $action_details->facility_name; } ?></td>
                        <td><?php if(isset($action_details->location_house_suffix) && isset($action_details->location_house_no) && strlen($action_details->location_house_no) > 0 && strlen($action_details->location_house_suffix) > 0 && $action_details->location_house_no != $action_details->location_house_suffix){ echo $action_details->location_house_suffix; } else { echo $action_details->location_house_no; } if(isset($action_details->location_street_name)){ echo " " .$action_details->location_street_name; } if(isset($action_details->location_street_type)){ echo " " .$action_details->location_street_type; } ?></td>
                        <td><?php if(isset($action_details->location_locality_name)){ echo " " .$action_details->location_locality_name; } ?></td>
                    <td><?php if(isset($action_details->customer_given_name)){ if($action_details->customer_given_name != "Used") echo $action_details->customer_given_name; } if(isset($action_details->customer_surname)){ if($action_details->customer_surname != "Not") echo " " .$action_details->customer_surname; } ?></td>
                    <td><?php if(isset($action_details->assign_date) && $action_details->assign_date != "1970-01-01T00:00:00" && strlen($action_details->assign_date) > 0){ echo date('d/m/Y',strtotime($action_details->assign_date)); } else { echo ""; }  ?></td>
                    <td><?php if(isset($action_details->due_time) && $action_details->due_time != "1970-01-01T00:00:00" && strlen($action_details->due_time) > 0){ echo date('d/m/Y h:i A',strtotime($action_details->due_time)); } else { echo ""; }  ?></td>
                        <td><?php if($action_details->status_code == "OPEN" || $action_details->status_code == "REOPEN"){ echo '<div class="dotGreen" title="Open"></div>'; } elseif($action_details->status_code == "SUSPENDED"){ echo '<div class="dotYellow" title="Suspended"></div>'; } else { echo '<div class="dotRed" tile="Finalised"></div>'; } ?></td>
                    </tr>
                    <?php
                }
            }
            elseif(count($GLOBALS['result']->action_intray_details) == 1){
                $action_details = $GLOBALS['result']->action_intray_details;
                $change = $action_details->action_id;
                ?>
                <tr data-link="index.php?page=view-action&id=<?php if(strlen($action_details->action_id) > 0){ echo $action_details->action_id; } else { echo ""; } ?>&filter=<?php echo $filter; ?>"  class="<?php echo $action_details->in_time_ind == "Y" ? "intime" : ''; ?> <?php echo $action_details->escalated_ind == "Y" ? "purple" : ''; ?> <?php echo strtotime($action_details->due_time) < time() ? "red" : ''; ?>" onclick="change('<?php echo $change; ?>')" title="">
                    <td id="<?php echo $change; ?>"><?php if(strlen($action_details->action_id) > 0){ echo $action_details->action_id; } else { echo ""; } ?></td>
                    <td><?php if(strlen($action_details->assign_name) > 0){ echo $action_details->assign_name; } else { echo ""; } ?></td>
                    <td><?php echo $action_details->service_name . " - " .$action_details->request_name . " - " . $action_details->function_name;?></td>
                     <td><?php if(isset($action_details->facility_name)){ echo $action_details->facility_name; } ?></td>
                     <td><?php if(isset($action_details->location_house_suffix) && isset($action_details->location_house_no) && strlen($action_details->location_house_no) > 0 && strlen($action_details->location_house_suffix) > 0 && $action_details->location_house_no != $action_details->location_house_suffix){ echo $action_details->location_house_suffix; } else{ echo $action_details->location_house_no; } if(isset($action_details->location_street_name)){ echo " " .$action_details->location_street_name; } if(isset($action_details->location_street_type)){ echo " " .$action_details->location_street_type; } if(isset($action_details->location_locality_name)){ echo " " .$action_details->location_locality_name; } ?></td>
                     <td><?php if(isset($action_details->location_locality_name)){ echo " " .$action_details->location_locality_name; } ?></td>
                    <td><?php if(isset($action_details->customer_given_name)){ if($action_details->customer_given_name != "Used") echo $action_details->customer_given_name; } if(isset($action_details->customer_surname)){ if($action_details->customer_surname != "Not") echo " " .$action_details->customer_surname; } ?></td>
                    <td><?php if(isset($action_details->assign_date) && $action_details->assign_date != "1970-01-01T00:00:00" && strlen($action_details->assign_date) > 0){ echo date('d/m/Y',strtotime($action_details->assign_date)); } else { echo ""; }  ?></td>
                    <td><?php if(isset($action_details->due_time) && $action_details->due_time != "1970-01-01T00:00:00" && strlen($action_details->due_time) > 0){ echo date('d/m/Y h:i A',strtotime($action_details->due_time)); } else { echo ""; }  ?></td>
                    <td><?php if($action_details->status_code == "OPEN" || $action_details->status_code == "REOPEN"){ echo '<div class="dotGreen" title="Open"></div>'; } elseif($action_details->status_code == "SUSPENDED"){ echo '<div class="dotYellow" title="Suspended"></div>'; } else { echo '<div class="dotRed" tile="Finalised"></div>'; } ?></td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>