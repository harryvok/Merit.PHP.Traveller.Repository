
<ul class="no-ellipses" data-role="listview" data-inset="true" data-divider-theme="d">
  	<li data-role="list-divider">Name Details</li>
        <li>
            <p><strong>Surname:</strong> <?php echo $GLOBALS['result']->surname; ?></p> 
        </li>
        <li>
            <p><strong>Given Names:</strong> <?php echo $GLOBALS['result']->given_names; ?></p>
        </li>
        <li>
            <p><strong>Initials:</strong> <?php echo $GLOBALS['result']->initials; ?></p>
        </li>
        <li>
            <p><strong>Title:</strong> <?php echo $GLOBALS['result']->pref_title; ?></p>
        </li>
        <li>
            <p><strong>Email Address:</strong> <?php echo $GLOBALS['result']->email_address; ?></p>
        </li>
        <li>
            <p><strong>Company Name:</strong> <?php echo $GLOBALS['result']->company_name; ?></p>
        </li>
        <li>
            <p><strong>Telephone:</strong> <?php echo $GLOBALS['result']->telephone; ?></p>
        </li>
        <li>
            <p><strong>Work Phone:</strong> <?php echo $GLOBALS['result']->work_phone; ?></p>
        </li>
        
        <li>
            <p><strong>Mobile Phone:</strong> <?php echo $GLOBALS['result']->mobile_no; ?></p>
        </li>
        <li>
            <p><strong>FAX No:</strong> <?php echo $GLOBALS['result']->fax_no; ?></p>
        </li>
        <li>
            <p><strong>NAR ID:</strong> <?php echo $GLOBALS['result']->name_ctr; ?></p>
        </li>
</ul>