<p>
    <?php ;
    if($GLOBALS['result']['action']->status_code == "OPEN" || $GLOBALS['result']['action']->status_code == "REOPEN"){ 
        echo '<img width="10" height="9" src="images/dotGreen.png" />'; 
    } 
	elseif($GLOBALS['result']['action']->status_code == "SUSPENDED"){ 
        echo '<img width="10" height="9" src="images/dotYellow.png" />'; 
    } 
    else { 
        echo '<img width="10" height="9" src="images/dotRed.png" />'; 
    } 
    ?> 
    <b><?php echo $GLOBALS['result']['action']->reason_assigned_name; ?></b>
</p>

<?php
$GLOBALS['request_id'] = $GLOBALS['result']['action']->request_id;
$_SESSION['request_id'] = $GLOBALS['result']['action']->request_id;
$GLOBALS['finalised_ind'] = $GLOBALS['result']['request']->finalised_ind;
$GLOBALS['act_finalised_ind'] = $GLOBALS['result']['action']->finalised_ind;
$_SESSION['act_finalised_ind'] = $GLOBALS['result']['action']->finalised_ind;
$_SESSION['assign_name'] = $GLOBALS['result']['action']->reason_assigned_name;
?>