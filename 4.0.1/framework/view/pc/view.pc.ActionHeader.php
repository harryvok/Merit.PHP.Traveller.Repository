
<div class="float-left">
    <div class="column r80">

        <?php 
        
          if ($GLOBALS['result']['action']->reason_assigned_name == "") {
               $header = $GLOBALS['result']['action']->action_required;
          }
          else {
              $header = $GLOBALS['result']['action']->reason_assigned_name;
          }
  
        ?>

        <h2>Action <?php echo $GLOBALS['result']['action']->action_id; ?>: <b><?php echo $header; ?> <?php if($GLOBALS['result']['action']->status_code == "OPEN" || $GLOBALS['result']['action']->status_code == "REOPEN"){ echo '<img width="10" height="9" src="images/dotGreen.png" />'; } elseif($GLOBALS['result']['action']->status_code == "SUSPENDED"){ echo '<img width="10" height="9" src="images/dotYellow.png" />'; } else { echo '<img width="10" height="9" src="images/dotRed.png" />'; } ?></b></h2>
    </div>
    <div class="column r20">
        <span class="request-id-value">
            <a href="index.php?page=view-request&id=<?php echo $GLOBALS['result']['action']->request_id; ?>">
                <?php echo $GLOBALS['result']['action']->request_id; ?>
            </a>
        </span>
        <span class="request-id">Request Id </span>
    </div>
</div>

<?php
if(count($GLOBALS['result']['request']->request_actions_det->request_actions_details) > 1){
    $c = 0;
    foreach($GLOBALS['result']['request']->request_actions_det->request_actions_details as $cnt){
        if ($cnt->finalised_ind == "N"){
            $c++;
        }
    }
}

$_SESSION['sidebar_action_status'] = $GLOBALS['result']['action']->status_code;
$GLOBALS['request_id'] = $GLOBALS['result']['action']->request_id;
$_SESSION['request_id'] = $GLOBALS['result']['action']->request_id;
$GLOBALS['finalised_ind'] = $GLOBALS['result']['request']->finalised_ind;
$GLOBALS['act_finalised_ind'] = $GLOBALS['result']['action']->finalised_ind;
$_SESSION['assign_name'] = $GLOBALS['result']['action']->reason_assigned_name;
$GLOBALS['assign_name'] = $GLOBALS['result']['action']->reason_assigned_name;
//$GLOBALS['action_count'] = count($GLOBALS['result']['request']->request_actions_det->request_actions_details);
$GLOBALS['action_count'] = $c;
$GLOBALS['audit_count'] = $GLOBALS['result']['action']->audit_count;
?> 
<input type="hidden" name="requestID" id="requestID" value="<?php echo $GLOBALS['result']['action']->request_id; ?>" />
<input type="hidden" name="actionID" id="actionID" value="<?php echo $_GET['id']; ?>" />