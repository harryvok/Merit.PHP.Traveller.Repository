<span class="graytitle">
    <b><?php echo $GLOBALS['result']->given_names; ?> <?php echo $GLOBALS['result']->surname; ?> (Phone: <?php echo $GLOBALS['result']->telephone; ?>)</b>
</span>
<ul class="pageitem">
    <span class="graytitle">Name Details</span>
    <ul class="pageitem">
        <li class="textbox">
            <b>Surname:</b> <?php echo $GLOBALS['result']->surname; ?> 
        </li>
        <li class="textbox">
            <b>Given Names:</b> <?php echo $GLOBALS['result']->given_names; ?>
        </li>
        <li class="textbox">
            <b>Initials:</b> <?php echo $GLOBALS['result']->initials; ?>
        </li>
        <li class="textbox">
            <b>Title:</b> <?php echo $GLOBALS['result']->pref_title; ?>
        </li>
        <li class="textbox">
            <b>Email Address:</b> <?php echo $GLOBALS['result']->email_address; ?>
        </li>
        <li class="textbox">
            <b>Company Name:</b> <?php echo $GLOBALS['result']->company_name; ?>
        </li>
        <li class="textbox">
            <b>Telephone:</b> <?php echo $GLOBALS['result']->telephone; ?>
        </li>
        <li class="textbox">
            <b>Work Phone:</b> <?php echo $GLOBALS['result']->work_phone; ?>
        </li>
        
        <li class="textbox">
            <b>Mobile Phone:</b> <?php echo $GLOBALS['result']->mobile_no; ?>
        </li>
        <li class="textbox">
            <b>FAX No:</b> <?php echo $GLOBALS['result']->fax_no; ?>
        </li>
        <li class="textbox">
            <b>NAR ID:</b> <?php echo $GLOBALS['result']->name_ctr; ?>
        </li>
    <br />
    </ul>
</ul>
</ul>