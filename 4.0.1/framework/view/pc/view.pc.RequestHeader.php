<h2>        
  Request <?php echo $_GET['id']; ?>: <b><?php echo $GLOBALS['result']->service_name . " - " .$GLOBALS['result']->request_name; 
                if(isset($GLOBALS['result']->function_name) && $GLOBALS['result']->function_name != '') echo " - " . $GLOBALS['result']->function_name; ?></b>
  <?php 
  if(isset($GLOBALS['result']->request_id) && $GLOBALS['result']->status_code == "OPEN"){ 
      echo '<img width="10" height="9" src="images/dotGreen.png" />'; 
  } 
  elseif(isset($GLOBALS['result']->request_id) && $GLOBALS['result']->status_code == "SUSPENDED"){ 
      echo '<img width="10" height="9" src="images/dotYellow.png" />'; 
  } 
  else { 
      echo '<img width="10" height="9" src="images/dotRed.png" />'; 
  } 
  ?> 
</h2>
<?php
$GLOBALS['finalised_ind'] = $GLOBALS['result']->finalised_ind;
$GLOBALS['count_only'] = $GLOBALS['result']->count_only;
$GLOBALS['audit_count'] = $GLOBALS['result']->audit_count;
//$_SESSION['sidebar_action_status'] = $GLOBALS['result']['request']->status_code;
$GLOBALS['request_id'] = $GLOBALS['result']->request_id;
$_SESSION['request_id'] = $GLOBALS['result']->request_id;
//$GLOBALS['finalised_ind'] = $GLOBALS['result']['request']->finalised_ind;
//$GLOBALS['req_finalised_ind'] = $GLOBALS['result']['request']->finalised_ind;
$_SESSION['service_name'] = $GLOBALS['result']->service_name;
$GLOBALS['service_name'] = $GLOBALS['result']->service_name;
$GLOBALS['request_name'] = $GLOBALS['result']->request_name;
$GLOBALS['function_name'] = $GLOBALS['result']->function_name;
$GLOBALS['action_officer'] = $GLOBALS['result']->action_officer;
$GLOBALS['officer_responsible_name'] = $GLOBALS['result']->officer_responsible_name;
$GLOBALS['officer_responsible_code'] = $GLOBALS['result']->officer_responsible_code;

?>
<input type="hidden" name="requestID" id="requestID" value="<?php echo $_GET['id']; ?>" />