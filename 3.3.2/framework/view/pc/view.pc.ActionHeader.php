<div class="float-right request-id-float" style="width:45%;">
    <span class="request-id-value"> 
        <a href="index.php?page=view-request&id=<?php echo $GLOBALS['result']['action']->request_id; ?>">
            <?php echo $GLOBALS['result']['action']->request_id; ?>
        </a>
    </span>
    <span class="request-id">Request Id </span>
</div>

<div class="float-left" style="width:45%;">
	<h2>Action <?php echo $GLOBALS['result']['action']->action_id; ?>: <b><?php echo $GLOBALS['result']['action']->reason_assigned_name; ?> <?php if($GLOBALS['result']['action']->status_code == "OPEN" || $GLOBALS['result']['action']->status_code == "REOPEN"){ echo '<img width="10" height="9" src="images/green-dot.png" />'; } elseif($GLOBALS['result']['action']->status_code == "SUSPENDED"){ echo '<img width="10" height="9" src="images/yellow-dot.png" />'; } else { echo '<img width="10" height="9" src="images/red-dot.png" />'; } ?></b></h2></div>

<?php
$_SESSION['sidebar_action_status'] = $GLOBALS['result']['action']->status_code;
$GLOBALS['request_id'] = $GLOBALS['result']['action']->request_id;
$_SESSION['request_id'] = $GLOBALS['result']['action']->request_id;
$GLOBALS['finalised_ind'] = $GLOBALS['result']['request']->finalised_ind;
$GLOBALS['act_finalised_ind'] = $GLOBALS['result']['action']->finalised_ind;
$_SESSION['assign_name'] = $GLOBALS['result']['action']->reason_assigned_name;
?>