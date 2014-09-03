
    <p><b><?php if(isset($GLOBALS['result']->officer_det->given_names)) echo $GLOBALS['result']->officer_det->given_names; ?> <?php if(isset($GLOBALS['result']->officer_det->surname)) echo $GLOBALS['result']->officer_det->surname; ?></b></p>

<?php
$GLOBALS['actionCount'] = $GLOBALS['result']->officer_det->action_count;
$GLOBALS['requestCount'] = $GLOBALS['result']->officer_det->request_count;
?>