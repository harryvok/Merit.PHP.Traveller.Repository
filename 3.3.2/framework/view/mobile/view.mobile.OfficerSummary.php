<?php
$GLOBALS['result'] = $GLOBALS['result']->officer_det;
?>
<span class="graytitle">
    <b><?php if(isset($GLOBALS['result']->given_names)) echo $GLOBALS['result']->given_names; ?> <?php if(isset($GLOBALS['result']->surname)) echo $GLOBALS['result']->surname; ?> (<?php if(isset($GLOBALS['result']->responsible_code)) echo $GLOBALS['result']->responsible_code; ?>)</b>
</span>
<ul class="pageitem">
    <span class="graytitle">Officer Details</span>
    <ul class="pageitem">
        <li class="textbox">
            <b>Surname:</b> <?php if(isset($GLOBALS['result']->surname)) echo $GLOBALS['result']->surname; ?> 
        </li>
        <li class="textbox">
            <b>Given Names:</b> <?php if(isset($GLOBALS['result']->given_names)) echo $GLOBALS['result']->given_names; ?>
        </li>
        <li class="textbox">
            <b>Location:</b> <?php if(isset($GLOBALS['result']->location)) echo $GLOBALS['result']->location; ?>
        </li>
        <li class="textbox">
            <b>Officer Type:</b> <?php if(isset($GLOBALS['result']->officer_type)) echo $GLOBALS['result']->officer_type; ?>
        </li>
        <li class="textbox">
            <b>Email Address:</b> <?php if(isset($GLOBALS['result']->mail_id)) echo $GLOBALS['result']->mail_id; ?>
        </li>
        <li class="textbox">
            <b>Telephone:</b> <?php if(isset($GLOBALS['result']->telephone)) echo $GLOBALS['result']->telephone; ?>
        </li>
        <li class="textbox">
            <b>Mobile Phone:</b> <?php if(isset($GLOBALS['result']->mobile_no)) echo $GLOBALS['result']->mobile_no; ?>
        </li>
        <li class="textbox">
            <b>FAX No:</b> <?php if(isset($GLOBALS['result']->fax_noo)) echo $GLOBALS['result']->fax_no; ?>
        </li>
    <br />
    </ul>
</ul>
</ul>  