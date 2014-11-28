<div class="summaryContainer">

    <h1>Actions (<?php if(isset($GLOBALS['result']['actions']->request_actions_det->request_actions_details)){echo count($GLOBALS['result']['actions']->request_actions_det->request_actions_details); } else { echo 0; } ?>) 
        <?php
        if($_SESSION['roleSecurity']->maint_new_action == "Y" && $GLOBALS['finalised_ind'] != "Y"){
        ?>
        <span class="openPopup" id="AddAction">
            <img src="images/iconAdd.png" />
            Add Action</span>
        <?php
        }
        ?>
    </h1>
    
    <div>
        <?php
        if(isset($_GET['addAction'])){
            ?>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#AddAction").trigger("click");
            });
        </script>
        
        <?php
        }
        ?>
        <input type="hidden" name="val" id="val" value="0" />
        <input type="text" id="requestActions" class="tableSearch" placeholder="Search..." />
        <table id="requestActionsTable" class=" sortable" title="" cellspacing="0">
            <thead>
                <tr>
                    <th class="sortable">Action ID</th>
                    <th class="sortable">Action Required</th>
                    <th class="sortable">Officer</th>
                    <th class="sortable">Date Assigned</th>
                    <th class="sortable">Due Date</th>
                    <th class="sortable">Completed Date</th>
                    <th class="sortable">Options</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $number=0;
                if(isset($GLOBALS['result']['actions']->request_actions_det->request_actions_details) && count($GLOBALS['result']['actions']->request_actions_det->request_actions_details) > 1){
                    foreach($GLOBALS['result']['actions']->request_actions_det->request_actions_details as $result_a_ar){
                        $change = $result_a_ar->action_id;
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
                    <td id="<?php echo $change; ?>"><?php if(strlen($result_a_ar->action_id) > 0){ echo $result_a_ar->action_id; } else { echo ""; } ?></td>
                    <td><?php if(strlen($result_a_ar->action_required) > 0){ echo $result_a_ar->action_required; } else { echo ""; } ?></td>
                    <td><?php if(strlen($result_a_ar->action_officer) > 0){ echo $result_a_ar->action_officer; } else { echo ""; } ?></td>
                    <td><?php if(strlen($result_a_ar->assign_time) > 0){ echo date('d/m/Y h:i A',strtotime($result_a_ar->assign_time)); } ?></td>
                    <td><?php if(strlen($result_a_ar->due_time) > 0 && $result_a_ar->due_time != "1970-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime($result_a_ar->due_time)); }  ?></td>
                    <td><?php if($result_a_ar->finalised_ind == "Y"){ if($result_a_ar->outcome_time != "0001-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime($result_a_ar->outcome_time)); } } ?></td>
                    <td>
                        <?php if($_SESSION['roleSecurity']->maint_comp_action == "Y" && $GLOBALS['act_finalised_ind'] != "Y") { ?><a href="index.php?page=view-action&id=<?php echo $change ?>&d=complete" class="button" style="text-decoration:none !important">Complete</a><?php } ?>
                        <?php if($_SESSION['roleSecurity']->maint_reassign_action == "Y" && $GLOBALS['act_finalised_ind'] != "Y"){ ?><a href="index.php?page=view-action&id=<?php echo $change ?>&d=reassign" class="button" style="text-decoration:none !important">Reassign</a><?php } ?>
                    </td>
                    <td><?php 
                        if($result_a_ar->status_code == "OPEN" || $result_a_ar->status_code == "REOPEN"){ 
                            echo '<div class="dotGreen" title="Open"></div>';
                        }
                        elseif($result_a_ar->status_code == "SUSPENDED"){ 
                            echo '<div class="dotYellow" title="Suspended"></div>';
                        } 
                        else{ 
                            echo '<div class="dotRed" title="Finalised"></div>';
                        } 
                        ?></td>
                </tr>
                <?php
                    }
                }
                if(isset($GLOBALS['result']['actions']->request_actions_det->request_actions_details) && count($GLOBALS['result']['actions']->request_actions_det->request_actions_details) == 1){
                    $change = $GLOBALS['result']['actions']->request_actions_det->request_actions_details->action_id;
                ?>
                <tr class="dark" onClick="change('<?php echo $change; ?>')" title="">
                    <td id="<?php echo $change; ?>"><?php if(strlen($GLOBALS['result']['actions']->request_actions_det->request_actions_details->action_id) > 0){ echo $GLOBALS['result']['actions']->request_actions_det->request_actions_details->action_id; } else { echo ""; } ?></td>
                    <td><?php if(strlen($GLOBALS['result']['actions']->request_actions_det->request_actions_details->action_required) > 0){ echo $GLOBALS['result']['actions']->request_actions_det->request_actions_details->action_required; } else { echo ""; } ?></td>
                    <td><?php if(strlen($GLOBALS['result']['actions']->request_actions_det->request_actions_details->action_officer) > 0){ echo $GLOBALS['result']['actions']->request_actions_det->request_actions_details->action_officer; } else { echo ""; } ?></td>
                    <td><?php if(strlen($GLOBALS['result']['actions']->request_actions_det->request_actions_details->assign_time) > 0){ echo date('d/m/Y h:i A',strtotime($GLOBALS['result']['actions']->request_actions_det->request_actions_details->assign_time)); } ?></td>
                    <td><?php if(strlen($GLOBALS['result']['actions']->request_actions_det->request_actions_details->due_time) > 0 && $GLOBALS['result']['actions']->request_actions_det->request_actions_details->due_time != "1970-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime($GLOBALS['result']['actions']->request_actions_det->request_actions_details->due_time)); }  ?></td>
                    <td><?php if($GLOBALS['result']['actions']->request_actions_det->request_actions_details->finalised_ind == "Y"){ if($GLOBALS['result']['actions']->request_actions_det->request_actions_details->outcome_time != "0001-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime($GLOBALS['result']['actions']->request_actions_det->request_actions_details->outcome_time)); } } ?></td>
                    <td>
                        <?php if($_SESSION['roleSecurity']->maint_comp_action == "Y" && $GLOBALS['act_finalised_ind'] != "Y") { ?><a href="index.php?page=view-action&id=<?php echo $change ?>&d=complete" class="button" style="text-decoration:none !important">Complete</a><?php } ?>
                        <?php if($_SESSION['roleSecurity']->maint_reassign_action == "Y" && $GLOBALS['act_finalised_ind'] != "Y"){ ?><a href="index.php?page=view-action&id=<?php echo $change ?>&d=reassign" class="button" style="text-decoration:none !important">Reassign</a><?php } ?>
                    </td>
                    <td><?php 
                    $result_a_ar = $GLOBALS['result']['actions']->request_actions_det->request_actions_details;
                    if($result_a_ar->status_code == "OPEN" || $result_a_ar->status_code == "REOPEN"){ 
                        echo '<div class="dotGreen" title="Open"></div>';
                    }
                    elseif($result_a_ar->status_code == "SUSPENDED"){ 
                        echo '<div class="dotYellow" title="Suspended"></div>';
                    } 
                    else{ 
                        echo '<div class="dotRed" title="Finalised"></div>';
                    } 
                        ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="popupDetail" id="AddActionPopup">
        <h1>Add Action<span class="closePopup"><img src="images/delete-icon.png" />
            Close</span></h1>
        <div>
            <a title="addaction"></a>
            <script type="text/javascript">
                $(document).ready(function () {

                   /*added by Harry*/
                   /*need to initialize autoCompleteInit here since this is a popup window.*/
                    $("input[type=text]").prop("autocomplete", "off");

                    var officerResponse = function (event, ui) {
                        var label = "";
                        var index = "";
                        if (typeof ui.content != "undefined" && ui.content.length === 1) {
                            label = ui.content[0].label;
                            index = ui.content[0].index;
                        }
                        else if (typeof ui.item != "undefined" && ui.item.label.length > 0) {
                            label = ui.item.label;
                            index = ui.item.index;
                        }
                        if (label.length > 0 || index.length > 0) {
                            $("#" + $(this).attr("id") + "Code").val(index);
                            $("#" + $(this).attr("id")).val(label);
                            $("#" + $(this).attr("id")).attr("readonly", true);
                            $("#" + $(this).attr("id")).blur();
                        }
                    } 
                    $("input[data-officer]").autoCompleteInit("inc/ajax/ajax.officerList.php", { term: "" }, officerResponse);
                    /*finished added by Harry*/
                
                    $("#addaction").validate();

                    $("#addaction").submit(function () {
                        if ($(this).validate().numberOfInvalids() == 0) { $("#submit").attr("disabled", true); }
                    });

                });
            </script>
            <form method="post" enctype="multipart/form-data" id="addaction" action="process.php">
                <label for="required">Required Action<span style="color: red;">*</span></label>
                <select class="text-popup required" name="required">
                    <option value="">Select</option>
                    <?php
                    if(count($GLOBALS['result']['actionreq']->action_reqd_details) > 1){
                        foreach($GLOBALS['result']['actionreq']->action_reqd_details as $actionreq){
                            if($GLOBALS['result']['override_ind'] == "Y"){
                                if($actionreq->function_code == $GLOBALS['function_code'] && $actionreq->active_ind == "Y"){
                    ?>
                    <option value="<?php echo $actionreq->assign_code; ?>"><?php echo $actionreq->assign_name; ?></option>
                    <?php
                                }
                            }
                            elseif($GLOBALS['result']['override_ind'] == "N"){
                                if($actionreq->service_code == $GLOBALS['service_code'] && $actionreq->request_code == $GLOBALS['request_code'] && trim($actionreq->function_code) == "" && $actionreq->active_ind == "Y"){
                    ?>
                    <option value="<?php echo $actionreq->assign_code; ?>"><?php echo $actionreq->assign_name; ?></option>
                    <?php
                                }
                            }
                        }
                    }
                    elseif(count($GLOBALS['result']['actionreq']->action_reqd_details) ==1){
                        $actionreq = $GLOBALS['result']['actionreq']->action_reqd_details;
                        if($GLOBALS['result']['override_ind'] == "Y"){
                            if($actionreq->function_code == $GLOBALS['function_code'] && $actionreq->active_ind == "Y"){
                    ?>
                    <option value="<?php echo $actionreq->assign_code; ?>"><?php echo $actionreq->assign_name; ?></option>
                    <?php
                            }
                        }
                        elseif($GLOBALS['result']['override_ind'] == "N"){
                            if($actionreq->service_code == $GLOBALS['service_code'] && $actionreq->request_code == $GLOBALS['request_code'] && trim($actionreq->function_code) == "" && $actionreq->active_ind == "Y"){
                    ?>
                    <option value="<?php echo $actionreq->assign_code; ?>"><?php echo $actionreq->assign_name; ?></option>
                    <?php
                            }
                        }
                        
                    }
                    ?>
                </select>
                <label for="officer">Officer<span style="color: red;">*</span></label>
                <input id="new_officer_text" data-officer="true" class="required" placeholder="Search..." />
                <input type="hidden" id="new_officer_textCode" name="new_officer_textCode" class="required" />
                
                <label for="date">Due Date<span style="color: red;">*</span></label>
                <input name="date" type="text" class="dateField required" />
                <label for="reason">Reason<span style="color: red;">*</span></label>
                <input name="reason" class="required" />
                <label for="send_email">Notify Officer?</label><br>
                <input name="send_email" type="radio" value="Y" />
                <b>Yes</b>
                <br />
                <input name="send_email" type="radio" value="N" checked />
                <b>No</b>
                <p>&nbsp;</p>
                <input id="submit" class="button left" type='submit' value='Add Action' />
                <input type="hidden" name="page" value="request" />
                <input type="hidden" name="id" id="id" value="<?php echo $GLOBALS['request_id']; ?>" />
                <input type="hidden" name="action" value="AddAction" />
            </form>
        </div>
    </div>
</div>
