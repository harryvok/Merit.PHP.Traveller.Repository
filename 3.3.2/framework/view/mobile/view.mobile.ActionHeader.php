<span class="graytitle">
    <?php ;
    if($GLOBALS['result']['action']->status_code == "OPEN" || $GLOBALS['result']['action']->status_code == "REOPEN"){ 
        echo '<img width="10" height="9" src="images/green-dot.png" />'; 
    } 
	elseif($GLOBALS['result']['action']->status_code == "SUSPENDED"){ 
        echo '<img width="10" height="9" src="images/yellow-dot.png" />'; 
    } 
    else { 
        echo '<img width="10" height="9" src="images/red-dot.png" />'; 
    } 
    ?> 
    <b><?php echo $GLOBALS['result']['action']->reason_assigned_name; ?></b>
</span>

<?php
$GLOBALS['request_id'] = $GLOBALS['result']['action']->request_id;
$_SESSION['request_id'] = $GLOBALS['result']['action']->request_id;
$GLOBALS['finalised_ind'] = $GLOBALS['result']['request']->finalised_ind;
$GLOBALS['act_finalised_ind'] = $GLOBALS['result']['action']->finalised_ind;
$_SESSION['assign_name'] = $GLOBALS['result']['action']->reason_assigned_name;
?>