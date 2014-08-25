
<div class="view-request">
<div class="float-left">
        <input type="hidden" name="val" id="val" value="0" />
        <div style="float:left;">
        <?php $result_ac = $GLOBALS['result']->action_det; ?>
            <span class="request-column-title"  style="float:left;">
            <div style="float:left;">Actions (<?php if(isset($result_ac->action_details)) echo count($result_ac->action_details); else echo 0; ?>)</div>
            
            </span>
        </div>
        <input type="hidden" name="val" id="val" value="0" />
        <div id="history" class="dropdown">
        	<input type="text" id="officerActions" class="tableSearch" placeholder="Search..." />
                <table id="officerActionsTable" class=" sortable" title="" cellspacing="0">
                <thead>
                <tr>
                    <th class="job-id sortable">Action ID</th>
                    <th class="job-name sortable">Action Required</th>
                    <th class="date sortable">Date Assigned</th>
                    <th class="date sortable">Due Date</th>
                    <th class="date sortable">Outcome Date</th>
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
                                <td id="<?php echo $change; ?>"><?php if(strlen($result_ar->action_id) > 0){ echo $result_ar->action_id; } else { echo ""; } ?></td>
                                <td class="job-name"><?php if(strlen($result_ar->reason_assigned_name) > 0){ echo $result_ar->reason_assigned_name; } else { echo ""; } ?></td>
                                <td><?php if(strlen($result_ar->assign_datetime) > 0){ echo substr($result_ar->assign_datetime, 0, 10); } else { echo ""; } ?></td>
                                <td><?php if(strlen($result_ar->due_datetime) > 0){ echo substr($result_ar->due_datetime, 0, 10); } else { echo ""; }  ?></td>
                                <td><?php 
                                if($result_ar->outcome_datetime == "0001-01-01 00:00:00"){ echo ''; } else { echo substr($result_ar->outcome_datetime, 0, 10); } ?></td>
                            </tr>
                            <?php
                    }
                }
                elseif(isset($result_ac->action_details) && count($result_ac->action_details) == 1){
                    $result_ar = $result_ac->action_details;
                    $change = $GLOBALS['result']->request_actions_details->action_id;
                    ?>
                        <tr class="dark" onClick="change('<?php echo $change; ?>')" title="">
                            <td id="<?php echo $change; ?>"><?php if(strlen($result_ar->action_id) > 0){ echo $result_ar->action_id; } else { echo ""; } ?></td>
                            <td class="job-name"><?php if(strlen($result_ar->reason_assigned_name) > 0){ echo $result_ar->reason_assigned_name; } else { echo ""; } ?></td>
                            <td><?php if(strlen($result_ar->assign_datetime) > 0){ echo str_ireplace("T", " ", $result_ar->assign_datetime); } else { echo "N"; } ?></td>
                            <td><?php if(strlen($result_ar->due_datetime) > 0){ echo str_ireplace("T", " ", $result_ar->due_datetime); } else { echo ""; }  ?></td>
                            <td><?php 
                                if($result_ar->outcome_datetime == "0001-01-01 00:00:00"){ echo ''; } else { echo substr($result_ar->outcome_datetime, 0, 10); } ?>
                        </tr>
                        <?php
                }
                ?>
                </tbody>
                </table>
        </div>
</div>