<h2>        
  Request <?php echo $_GET['id']; ?>: <b><?php echo $GLOBALS['result']->service_name . " - " .$GLOBALS['result']->request_name; if(isset($GLOBALS['result']->function_name) && $GLOBALS['result']->function_name != '') echo " - " . $GLOBALS['result']->function_name; ?></b>
  <?php 
  if(isset($GLOBALS['result']->request_id) && $GLOBALS['result']->status == "Open"){ 
      echo '<img width="10" height="9" src="images/dotGreen.png" />'; 
  } 
  elseif(isset($GLOBALS['result']->request_id) && $GLOBALS['result']->status == "Suspended"){ 
      echo '<img width="10" height="9" src="images/dotYellow.png" />'; 
  } 
  else { 
      echo '<img width="10" height="9" src="images/dotRed.png" />'; 
  } 
  ?> 
</h2>
<?php
$GLOBALS['finalised_ind'] = $GLOBALS['result']->finalised_ind;
?>
