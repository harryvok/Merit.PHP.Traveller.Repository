
<?php if( $_SESSION['roleSecurity']->hide_customer_details == "N"){?>
<script type="text/javascript">
    $(document).ready(function () {
        var oTable = $('#requestIntrayTable').dataTable({
            iDisplayLength: 50,
            "aaSorting": [[0, "desc"]],
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
                { "sType": "date-euro" },
                { "sType": "date-euro" },
                { "iDataSort": 10 },
                null
            ]
        });

        $("#export").click(function () {
            $(this).attr("disabled", "disabled");
            var oSettings = oTable.fnSettings();
            var current = oSettings._iDisplayLength;
            oSettings._iDisplayLength = 1000;
            oTable.fnDraw();

            var rowsArray = {};
            var i = 0;
            $('#requestIntrayTable tr').each(function () {
                var i2 = 0;
                rowsArray[i] = {};
                $(this).find("th").each(function () {
                    rowsArray[i][i2] = $(this).html();
                    i2++;
                });
                $(this).find("td").each(function () {
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

<?php } else { ?>
 <script type="text/javascript">
$(document).ready(function() {
    var oTable = $('#requestIntrayTable').dataTable({
        iDisplayLength: 50,
        "aaSorting": [[0, "desc"]],
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
            { "sType": "date-euro" },
            { "sType": "date-euro" }, ,
            { "iDataSort": 9 },
            null
        ]
    });
    
    $("#export").click(function(){
        $(this).attr("disabled", "disabled");
        var oSettings = oTable.fnSettings();
        var current = oSettings._iDisplayLength;
        oSettings._iDisplayLength = 1000;
        oTable.fnDraw();

        var rowsArray = {};
        var i = 0;
        $('#requestIntrayTable tr').each(function(){
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
<?php } ?>
<?php
if(isset($_GET['filter'])){
	$filter = $_GET['filter'];	
}
else{
	$filter = $GLOBALS['default_filter'];
}

?>
<form action="process.export.php" method="post" id="exportForm">
<div class="float-right">
<br /><br /><form method="post" id="exportForm" action="process.export.php"><input type="hidden" name="tableArray" id="tableArray" /><input type="hidden" name="name" id="name" value="Request-Intray" /></form><input type="button" id="export" value="Export to Excel">
    
</div>
<div class="float-left">

<table id="requestIntrayTable" class="sortable" title="" cellspacing="0">
	<thead>
        <tr class="head">
            <th style="width:70px;">Request ID</th>
            <th>Description</th>
            <th>Category</th>
            <th>Facility</th>
            <th>Location Address</th>
            <?php if( $_SESSION['roleSecurity']->hide_customer_details == "N"){?><th>Customer</th><?php } ?>
            <th>Request Officer</th>
            <th>Received Date</th>
            <th>Due Date</th>
            <th></th>
            <th style="display:none"></th>
        </tr>
    </thead>
    <tbody>
    <?php
    $number = 0;
    $change = 0;
    if(isset($GLOBALS['result']->action_intray_details) && count($GLOBALS['result']->action_intray_details) > 1){
        foreach($GLOBALS['result']->action_intray_details as $request_details){
            $change = $change+1;
            ?>
            <tr data-link="index.php?page=view-request&id=<?php if(strlen($request_details->request_id) > 0){ echo $request_details->request_id; } else { echo ""; } ?>&filter=<?php echo $filter; ?>" class="<?php //echo $request_details->in_time_ind == "Y" ? "intime" : ''; ?> <?php echo $request_details->escalated_ind == "Y" ? "purple" : ''; ?> <?php echo strtotime(str_ireplace("00:00:00.000", "", $request_details->due_date)) < time() ? "red" : ''; ?>" onclick="change('<?php echo $change; ?>')" title="<?php echo htmlspecialchars($request_details->service_name) . " - " . htmlspecialchars($request_details->request_name); if(isset($request_details->function_name)) echo  " - " . htmlspecialchars($request_details->function_name); ?>">
                
                <td id="<?php echo $change; ?>" style="width:70px;"><?php if(strlen($request_details->request_id) > 0){ echo $request_details->request_id; } else { echo ""; } ?></td>
                <td><?php if(isset($request_details->request_description) && strlen($request_details->request_description) > 0){ echo $request_details->request_description; } else { echo ""; } ?></td>
                <td><?php echo $request_details->service_name . " - " .$request_details->request_name; if(isset($request_details->function_name)){ echo " - " . $request_details->function_name; }?></td>
                <td><?php if(isset($request_details->facility_name)){ echo $request_details->facility_name; } ?></td>
                <td><?php if(isset($request_details->location_house_suffix) && isset($request_details->location_house_no) && strlen($request_details->location_house_no) > 0 && strlen($request_details->location_house_suffix) > 0 && $request_details->location_house_no != $request_details->location_house_suffix){ echo $request_details->location_house_suffix; } else{ echo $request_details->location_house_no; } if(isset($request_details->location_street_name)){ echo " " .$request_details->location_street_name; } if(isset($request_details->location_street_type)){ echo " " .$request_details->location_street_type; } if(isset($request_details->location_locality_name)){ echo " " .$request_details->location_locality_name; } ?></td>
                <?php if( $_SESSION['roleSecurity']->hide_customer_details == "N"){?><td><?php if(isset($request_details->customer_given_name)){ if($request_details->customer_given_name != "Used") echo $request_details->customer_given_name; } if(isset($request_details->customer_surname)){ if($request_details->customer_given_name != "Not") echo " " .$request_details->customer_surname; } ?></td><?php } ?>
                <td><?php if(isset($request_details->officer_given_name)) {echo $request_details->officer_given_name;} if(isset($request_details->officer_surname)) {echo " " .$request_details->officer_surname;} ?></td>
                <td><?php if(strlen($request_details->request_date) > 0){ echo date('d/m/Y',strtotime(str_ireplace("00:00:00.000", "", $request_details->request_date))); } else { echo ""; } ?> <?php if(strlen($request_details->request_time) > 0){ echo date('h:i A',strtotime($request_details->request_time)); } else { echo ""; } ?></td>
                <td><?php if(strlen($request_details->due_date) > 0){ echo date('d/m/Y',strtotime(str_ireplace("00:00:00.000", "", $request_details->due_date))); } else { echo ""; } ?> <?php if(strlen($request_details->due_time) > 0){ echo date('h:i A',strtotime($request_details->due_time)); } else { echo ""; } ?></td>
                <td><?php 
                    if($request_details->status_code == "OPEN"){ 
                        echo '<img width="10" height="9" src="images/dotGreen.png" />';
                    }
					elseif($request_details->status_code == "SUSPENDED"){
						echo '<img width="10" height="9" src="images/dotYellow.png" />';
					}
                    else{
                        echo '<img width="10" height="9" src="images/dotRed.png" />';
                    } 
                    ?></td> 
                    <td style="display:none"><?php if($request_details->status_code == "OPEN"){ echo 'a'.$request_details->request_id; } elseif($request_details->status_code == "SUSPENDED"){ echo 'b'.$request_details->request_id; } else { echo 'c'.$request_details->request_id; } ?></td>
            </tr>
            <?php
        }
    }
    elseif(isset($GLOBALS['result']->action_intray_details) && count($GLOBALS['result']->action_intray_details) == 1){
        $request_details = $GLOBALS['result']->action_intray_details;	
        $change = $change+1;
        ?>
        
        <tr data-link="index.php?page=view-request&id=<?php if(strlen($request_details->request_id) > 0){ echo $request_details->request_id; } else { echo ""; } ?>&filter=<?php echo $filter; ?>" class="<?php //echo $request_details->in_time_ind == "Y" ? "intime" : ''; ?> <?php echo $request_details->escalated_ind == "Y" ? "purple" : ''; ?> <?php echo strtotime(str_ireplace("00:00:00.000", "", $request_details->due_date)) < time() ? "red" : ''; ?>" onclick="change('<?php echo $change; ?>')" title="<?php echo htmlspecialchars($request_details->service_name) . " - " . htmlspecialchars($request_details->request_name); if(isset($request_details->function_name)) echo " - " . htmlspecialchars($request_details->function_name); ?>">
            <td id="<?php echo $change; ?>" sorttable_customkey="<?php echo $number; ?>"><?php if(strlen($request_details->request_id) > 0){ echo $request_details->request_id; } else { echo ""; } ?></td>
            <td><?php if(isset($request_details->request_description) && strlen($request_details->request_description) > 0){ echo htmlspecialchars(substr($request_details->request_description,0 ,50) . ".."); } else { echo ""; } ?></td>
            <td><?php echo $request_details->service_name . " - " .$request_details->request_name; if(isset($request_details->function_name)){ echo " - " . $request_details->function_name; }?></td>
            <td><?php if(isset($request_details->facility_name)){ echo $request_details->facility_name; } ?></td>
            <td><?php if(isset($request_details->location_house_suffix) && isset($request_details->location_house_no) && strlen($request_details->location_house_no) > 0 && strlen($request_details->location_house_suffix) > 0 && $request_details->location_house_no != $request_details->location_house_suffix){ echo $request_details->location_house_suffix; } else{ echo $request_details->location_house_no; } if(isset($request_details->location_street_name)){ echo " " .$request_details->location_street_name; } if(isset($request_details->location_street_type)){ echo " " .$request_details->location_street_type; } if(isset($request_details->location_locality_name)){ echo " " .$request_details->location_locality_name; } ?></td>
            <?php if( $_SESSION['roleSecurity']->hide_customer_details == "N"){?><td><?php if(isset($request_details->customer_given_name)){ if($request_details->customer_given_name != "Used") echo $request_details->customer_given_name; } if(isset($request_details->customer_surname)){ if($request_details->customer_given_name != "Not") echo " " .$request_details->customer_surname; } ?></td><?php } ?>
            <td><?php if(isset($request_details->officer_given_name)) {echo $request_details->officer_given_name;} if(isset($request_details->officer_surname)) {echo " " .$request_details->officer_surname;} ?></td>
            <td><?php if(strlen($request_details->request_date) > 0){ echo date('d/m/Y',strtotime(str_ireplace("00:00:00.000", "", $request_details->request_date))); } else { echo ""; } ?> <?php if(strlen($request_details->request_time) > 0){ echo date('h:i A',strtotime($request_details->request_time)); } else { echo ""; } ?></td>
            <td><?php if(strlen($request_details->due_date) > 0){ echo date('d/m/Y',strtotime(str_ireplace("00:00:00.000", "", $request_details->due_date))); } else { echo ""; } ?> <?php if(strlen($request_details->due_time) > 0){ echo date('h:i A',strtotime($request_details->due_time)); } else { echo ""; } ?></td>
            <td><?php 
                    if($request_details->status_code == "OPEN"){ 
                        echo '<img width="10" height="9" src="images/dotGreen.png" />';
                    }
					elseif($request_details->status_code == "SUSPENDED"){
						echo '<img width="10" height="9" src="images/dotYellow.png" />';
					}
                    else{
                        echo '<img width="10" height="9" src="images/dotRed.png" />';
                    } 
                    ?></td>  
            <td style="display:none"><?php if($request_details->status_code == "OPEN"){ echo 'a'.$request_details->request_id; } elseif($request_details->status_code == "SUSPENDED"){ echo 'b'.$request_details->request_id; } else { echo 'c'.$request_details->request_id; } ?></td>          
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>

</div>
</form>