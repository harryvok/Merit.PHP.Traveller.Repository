
<?php
if($_SESSION['roleSecurity']->maint_new_action == "Y" && $_SESSION['roleSecurity']->view_request == "Y"){
?>
<form method="post" enctype="multipart/form-data" data-ajax="false" id="addaction" action="process.php">
    <label>Required Action<span style="color: red;">*</span></label>
    <select class="text required" name="required">
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
    <label>Officer<span style="color: red;">*</span></label>
    <input id="new_officer_text" class="required" placeholder="Search..." data-officer="true" />
    <input type="hidden" id="new_officer_textCode" name="new_officer_textCode" class="required" />
    <label>Due Date<span style="color: red;">*</span></label>
    <input name="date" type="text" class="dateField required" />

    <label>Reason<span style="color: red;">*</span></label>
    <input name="reason" class="text required" />
    <label>Notify Officer?</label>
    <label for="no">No</label>
    <input id="no" name="send_email" type="radio" value="N" checked />
    <label for="yes">Yes</label>
    <input id="yes" name="send_email" type="radio" value="Y" />
    <input name="Submit input" type="submit" id="submit" value="Submit" />
    <input type="hidden" name="page" value="request" />
    <input type="hidden" name="id" id="id" value="<?php echo $GLOBALS['request_id']; ?>" />
    <input type="hidden" name="action" value="AddAction" />
</form>

<script type="text/javascript">
    $(document).ready(function () {
        $("#addaction").validate();

        $("#addaction").submit(function () {
            if ($(this).validate().numberOfInvalids() == 0) { $("#submit").attr("disabled", true); }
        });
    });
</script>
<?php
}
?>