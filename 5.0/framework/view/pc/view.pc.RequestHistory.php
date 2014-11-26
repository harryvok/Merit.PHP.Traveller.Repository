<?php
if(isset($GLOBALS['result']->address_history_details) && count($GLOBALS['result']->address_history_details) >0){
?>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#popup").fadeIn("fast");
            $("#checkHistory").prop("disabled", false).buttonState("enable");
        });
    </script>
    <h1>History for Address<span  class="closePopup"><img src="images/delete-icon.png" /> Close</span></h1>
	<div>
    <h2>Open Requests for <?php if(isset($GLOBALS['house_suffix']) && strlen($GLOBALS['house_suffix']) > 0 && isset($GLOBALS['house_no']) && strlen($GLOBALS['house_no']) > 0 && $GLOBALS['house_no'] != $GLOBALS['house_suffix']){ echo $GLOBALS['house_suffix']; } elseif(isset($GLOBALS['house_no'])){ echo $GLOBALS['house_no']; } ?><?php if(isset($GLOBALS['street_name'])){ echo $GLOBALS['street_name']; } ?><?php if(isset($GLOBALS['street_type'])){ echo $GLOBALS['street_type']; } ?><?php if(isset($GLOBALS['street_suburb'])){ echo $GLOBALS['street_suburb']; } ?>(<?php if($_SESSION['meritIni']['HISTORYADDRTYPE'] == "B") echo "Both"; elseif($_SESSION['meritIni']['HISTORYADDRTYPE'] == "C") echo "Customer"; elseif($_SESSION['meritIni']['HISTORYADDRTYPE'] == "C") echo "Customer"; elseif($_SESSION['meritIni']['HISTORYADDRTYPE'] == "L") echo "Location"; ?>)</h2>
    
    <input type="text" id="requestHistoryLookup" class="tableSearch" placeholder="Search..." />
    <table id="requestHistoryLookupTable" class=" sortable" title="" cellspacing="0" style="color: black;">
        <thead>
            <tr>
                <th class="sortable">Req. ID</th>
                <th class="sortable">Request Date</th>
                <th class="sortable">Service</th>
                <th class="sortable">Request</th>
                <th class="sortable">Function</th>
                <th class="sortable">Finalised</th>
                <th class="sortable">Count Only</th>
                <th class="sortable">Due Date</th>
                <th class="sortable">Address</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $number=0;
            if(isset($GLOBALS['result']->address_history_details) && count($GLOBALS['result']->address_history_details) > 1){
                foreach($GLOBALS['result']->address_history_details as $requestHistoryRecord){
                    $number = $number+1;
                    if($number == 2){
                        $class = "dark";
                        $number = 0;
                    }
                    else{
                        $class = "light";
                    }
            ?>
            <tr class="<?php echo $class; ?>" data-new-window="index.php?page=view-request&id=<?php echo isset($requestHistoryRecord->request_id) ? $requestHistoryRecord->request_id : ""; ?>">
                <td><?php echo isset($requestHistoryRecord->request_id) ? $requestHistoryRecord->request_id : ""; ?></td>
                <td><?php if(strlen($requestHistoryRecord->request_date) > 0){ echo date('d/m/Y',strtotime(str_ireplace("00:00:00.000", "", $requestHistoryRecord->request_date))); }?></td>
                <td><?php echo isset($requestHistoryRecord->service_name) ? $requestHistoryRecord->service_name : ""; ?></td>
                <td><?php echo isset($requestHistoryRecord->request_name) ? $requestHistoryRecord->request_name : ""; ?></td>
                <td><?php echo isset($requestHistoryRecord->function_name) ? $requestHistoryRecord->function_name : ""; ?></td>
                <td><?php echo isset($requestHistoryRecord->finalised_ind) ? $requestHistoryRecord->finalised_ind : ""; ?></td>
                <td><?php echo isset($requestHistoryRecord->count_only) ? $requestHistoryRecord->count_only : ""; ?></td>
                <td><?php if(strlen($requestHistoryRecord->due_date) > 0){ echo date('d/m/Y',strtotime(str_ireplace("00:00:00.000", "", $requestHistoryRecord->due_date))); }?></td>
                <td><?php if(isset($requestHistoryRecord->house_number) && isset($requestHistoryRecord->house_suffix) && $requestHistoryRecord->house_suffix != $requestHistoryRecord->house_number && strpos($requestHistoryRecord->house_suffix, "-") == false && !ctype_alnum($requestHistoryRecord->house_suffix)){ $flat = explode("/", $requestHistoryRecord->house_suffix); echo $flat[0]; } ?>
                    <?php if(isset($requestHistoryRecord->house_suffix) && strpos($requestHistoryRecord->house_suffix, "-") !== false || ctype_alnum($requestHistoryRecord->house_suffix)) echo $requestHistoryRecord->house_suffix; else echo $requestHistoryRecord->house_number; ?>
                    <?php if(isset($requestHistoryRecord->street_name)){ echo $requestHistoryRecord->street_name; } else { echo ""; } ?>
                    <?php if(isset($requestHistoryRecord->street_type)){ echo $requestHistoryRecord->street_type; } else { echo ""; } ?>
                    <?php if(isset($requestHistoryRecord->locality_name)){ echo $requestHistoryRecord->locality_name; } else { echo ""; } ?>
                    <?php if(isset($requestHistoryRecord->postcode)){ echo $requestHistoryRecord->postcode; } else { echo ""; } ?></td>
            </tr>
            <?php
                }
            }
            elseif(isset($GLOBALS['result']->address_history_details) && count($GLOBALS['result']->address_history_details) == 1){
                $requestHistoryRecord = $GLOBALS['result']->address_history_details;
            ?>
            <tr class="dark" data-new-window="index.php?page=view-request&id=<?php echo isset($requestHistoryRecord->request_id) ? $requestHistoryRecord->request_id : ""; ?>">
                <td><?php echo isset($requestHistoryRecord->request_id) ? $requestHistoryRecord->request_id : ""; ?></td>
                <td><?php if(strlen($requestHistoryRecord->request_date) > 0){ echo date('d/m/Y',strtotime(str_ireplace("00:00:00.000", "", $requestHistoryRecord->request_date))); }?></td>
                <td><?php echo isset($requestHistoryRecord->service_name) ? $requestHistoryRecord->service_name : ""; ?></td>
                <td><?php echo isset($requestHistoryRecord->request_name) ? $requestHistoryRecord->request_name : ""; ?></td>
                <td><?php echo isset($requestHistoryRecord->function_name) ? $requestHistoryRecord->function_name : ""; ?></td>
                <td><?php echo isset($requestHistoryRecord->finalised_ind) ? $requestHistoryRecord->finalised_ind : ""; ?></td>
                <td><?php echo isset($requestHistoryRecord->count_only) ? $requestHistoryRecord->count_only : ""; ?></td>
                <td><?php if(strlen($requestHistoryRecord->due_date) > 0){ echo date('d/m/Y',strtotime(str_ireplace("00:00:00.000", "", $requestHistoryRecord->due_date))); }?></td>
                <td><?php if(isset($requestHistoryRecord->house_number) && isset($requestHistoryRecord->house_suffix) && $requestHistoryRecord->house_suffix != $requestHistoryRecord->house_number && strpos($requestHistoryRecord->house_suffix, "-") == false && !ctype_alnum($requestHistoryRecord->house_suffix)){ $flat = explode("/", $requestHistoryRecord->house_suffix); echo $flat[0]; } ?>
                    <?php if(isset($requestHistoryRecord->house_suffix) && strpos($requestHistoryRecord->house_suffix, "-") !== false || ctype_alnum($requestHistoryRecord->house_suffix)) echo $requestHistoryRecord->house_suffix; else echo $requestHistoryRecord->house_number; ?>
                    <?php if(isset($requestHistoryRecord->street_name)){ echo $requestHistoryRecord->street_name; } else { echo ""; } ?>
                    <?php if(isset($requestHistoryRecord->street_type)){ echo $requestHistoryRecord->street_type; } else { echo ""; } ?>
                    <?php if(isset($requestHistoryRecord->locality_name)){ echo $requestHistoryRecord->locality_name; } else { echo ""; } ?>
                    <?php if(isset($requestHistoryRecord->postcode)){ echo $requestHistoryRecord->postcode; } else { echo ""; } ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
 

<?php
}
?>

