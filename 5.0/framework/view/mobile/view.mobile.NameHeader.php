
   <p> <b><?php echo $GLOBALS['result']->given_names; ?><?php echo $GLOBALS['result']->surname; ?>(Phone: <?php echo $GLOBALS['result']->telephone; ?>)</b></p>
<?php
$GLOBALS['addressCount'] = count($GLOBALS['result']->address_det->address_details);
$GLOBALS['requestCount'] = count($GLOBALS['result']->req_dets->request_details);
 ?>