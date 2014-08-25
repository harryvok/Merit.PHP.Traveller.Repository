<div class="summaryContainer">
    <h1>Reopen Request</h1>
    <div>
         <script type="text/javascript">
             $(document).ready(function () {
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
            <input type="hidden" id="new_officer_textCode" name="officer" class="required" />
            <label for="date">Due Date<span style="color: red;">*</span></label>
            <input name="date" type="text" class="dateField required" />
            <label for="reason">Reason<span style="color: red;">*</span></label>
            <input name="reason" class="required" />
            <label for="email_officer">Notify Responsible Officer?</label><br>
            <input name="email_officer" type="radio" value="Y" />
            <b>Yes</b>
            <br />
            <input name="email_officer" type="radio" value="N" checked />
            <b>No</b>
            <p>&nbsp;</p>
            <label for="email_act_officer">Notify Action Officer?</label><br>
            <input name="email_act_officer" type="radio" value="Y" />
            <b>Yes</b>
            <br />
            <input name="email_act_officer" type="radio" value="N" checked />
            <b>No</b>
            <p>&nbsp;</p>
            <input id="submit" class="button left" type='submit' value='Reopen' />
            <input type="hidden" name="page" value="request" />
            <input type="hidden" name="id" id="id" value="<?php echo $GLOBALS['request_id']; ?>" />
            <input type="hidden" name="action" value="ReopenRequest" />
        </form>
    </div>
</div>

