

    <div class="summaryContainer">
    <?php $result_ac = $GLOBALS['result']->action_det; ?>
        <h1>Actions (<?php if(isset($result_ac->action_details)) echo count($result_ac->action_details); else { echo 0; } ?>)</h1>
           <div>

        <input type="hidden" name="val" id="val" value="0" />
        
        	<input type="text" id="officerActions" class="tableSearch" placeholder="Search..." />
                <table id="officerActionsTable" class=" sortable" title="" cellspacing="0">
                <thead>
                <tr>
                    <th class="job-id sortable">Request ID</th>
                    <th class="job-type sortable">Category</th>
                    <th class="job-name sortable">Action Required</th>     
                    <th class="date sortable">Date Assigned</th>
                    <th class="date sortable">Due Date</th>
                    <th class="date sortable">Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $number=0;
                if(isset($result_ac->action_details) && count($result_ac->action_details) > 1){
                    foreach($result_ac->action_details as $result_ar){
                        $change = $result_ar->action_id;
                        $number = $number+1;
                        if($number == 2){
                            $class = "dark";
                            $number = 0;
                        }
                        else{
                            $class = "light";
                        }
                        ?>

 


                            <tr class="<?php echo $class; ?>" onClick="change('<?php echo $change; ?>')" title="">
                                <td id="<?php echo $change; ?>"><?php if(strlen($result_ar->request_id) > 0){ echo $result_ar->request_id; } else { echo ""; } ?></td>
                                <td><?php echo $result_ar->service_name . " - " .$result_ar->request_name; if(isset($result_ar->function_name)) echo " - " . $result_ar->function_name;?></td>
                                <td class="job-name"><?php if(strlen($result_ar->reason_assigned_name) > 0){ echo $result_ar->reason_assigned_name; } else { echo ""; } ?></td>
                                <td><?php if(strlen($result_ar->assign_datetime) > 0 && $result_ar->assign_datetime != "1970-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $result_ar->assign_datetime))); }?></td>
                                <td><?php if(strlen($result_ar->due_datetime) > 0 && $result_ar->due_datetime != "1970-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $result_ar->due_datetime))); }?></td>
                                <td><?php 
                        if($result_ar->finalised_ind == "N"){
                            echo ' Open ';
                            echo '<img class="officerdot" width="10" height="9" src="images/dotGreen.png" />';
                        }
                        elseif($result_ar->finalised_ind == "Y"){
                            echo ' Closed ';
                            echo '<img class="officerdot" width="10" height="9" src="images/dotRed.png" />';
                        } 
                                ?></td>
                            </tr>
                            <?php
                    }
                }
                
                elseif(isset($result_ac->action_details) && count($result_ac->action_details) == 1){
                    $result_ar = $result_ac->action_details;
                    $change = $GLOBALS['result']->request_actions_details->action_id;
                    ?>
                        <tr class="dark" onClick="change('<?php echo $change; ?>')" title="">
                            <td id="<?php echo $change; ?>"><?php if(strlen($result_ar->request_id) > 0){ echo $result_ar->request_id; } else { echo ""; } ?></td>
                                <td><?php echo $result_ar->service_name . " - " .$result_ar->request_name; if(isset($result_ar->function_name)) echo " - " . $result_ar->function_name;?></td>
                                <td class="job-name"><?php if(strlen($result_ar->reason_assigned_name) > 0){ echo $result_ar->reason_assigned_name; } else { echo ""; } ?></td>
                                <td><?php if(strlen($result_ar->assign_datetime) > 0 && $result_ar->assign_datetime != "1970-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $result_ar->assign_datetime))); }?></td>
                                <td><?php if(strlen($result_ar->due_datetime) > 0 && $result_ar->due_datetime != "1970-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $result_ar->due_datetime))); }?></td>
                                <td><?php 
                    if($result_ar->finalised_ind == "N"){
                        echo ' Open ';
                        echo '<img class="officerdot" width="10" height="9" src="images/dotGreen.png" />';
                    }
                    elseif($result_ar->finalised_ind == "Y"){
                        echo ' Closed ';
                        echo '<img class="officerdot" width="10" height="9" src="images/dotRed.png" />';
                    }          ?></td>
                        </tr>
                        <?php
                }
                ?>
                </tbody>
                </table>
        </div>
</div>