<h2>
    <b><?php if(isset($GLOBALS['result']->officer_det->given_names)) echo $GLOBALS['result']->officer_det->given_names; ?> <?php if(isset($GLOBALS['result']->officer_det->surname)) echo $GLOBALS['result']->officer_det->surname; ?></b>
 </h2>
<?php
$GLOBALS['actionCount'] = $GLOBALS['result']->officer_det->action_count;
$GLOBALS['requestCount'] = $GLOBALS['result']->officer_det->request_count;
?>