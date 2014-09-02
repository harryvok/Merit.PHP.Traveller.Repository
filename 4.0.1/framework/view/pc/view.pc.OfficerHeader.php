<h2>
    <b><?php if(isset($GLOBALS['result']->officer_det->given_names)) echo $GLOBALS['result']->officer_det->given_names; ?> <?php if(isset($GLOBALS['result']->officer_det->surname)) echo $GLOBALS['result']->officer_det->surname; ?></b>
 </h2>
<?php
$GLOBALS['requestCount'] = count($GLOBALS['result']->req_dets->request_details);
echo $GLOBALS['requestCount'];
?>