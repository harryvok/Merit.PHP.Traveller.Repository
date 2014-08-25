<?php
$GLOBALS['result'] = $GLOBALS['result']->officer_det;
?>
<ul class="no-ellipses" data-role="listview" data-inset="true" data-divider-theme="d">
  	<li data-role="list-divider">Officer Details</li>
        <li>
            <p><strong>Surname:</strong> <?php if(isset($GLOBALS['result']->surname)) echo $GLOBALS['result']->surname; ?></p> 
        </li>
        <li>
            <p><strong>Given Names:</strong> <?php if(isset($GLOBALS['result']->given_names)) echo $GLOBALS['result']->given_names; ?></p>
        </li>
        <li>
            <p><strong>Officer Title:</strong> <?php if(isset($GLOBALS['result']->class_name)) echo $GLOBALS['result']->class_name; ?></p>
        </li>
        <li>
            <p><strong>Location:</strong> <?php if(isset($GLOBALS['result']->location)) echo $GLOBALS['result']->location; ?></p>
        </li>
        <li>
            <p><strong>Division::</strong> <?php if(isset($GLOBALS['result']->div_name)) echo $GLOBALS['result']->div_name; ?></p>
        </li>
        <li>
            <p><strong>Department:</strong> <?php if(isset($GLOBALS['result']->dep_name)) echo $GLOBALS['result']->dep_name; ?></p>
        </li>
        <li>
            <p><strong>Centre: <?php if(isset($GLOBALS['result']->centre_name)) echo $GLOBALS['result']->centre_name; ?></strong> </p>
        </li>
        <li>
            <p><strong>Email Address:</strong> <?php if(isset($GLOBALS['result']->mail_id)) echo $GLOBALS['result']->mail_id; ?></p>
        </li>
        <li>
            <p><strong>Telephone:</strong> <?php if(isset($GLOBALS['result']->telephone)) echo $GLOBALS['result']->telephone; ?></p>
        </li>
        <li>
            <p><strong>Mobile Phone:</strong> <?php if(isset($GLOBALS['result']->mobile_no)) echo $GLOBALS['result']->mobile_no; ?></p>
        </li>
        <li>
            <p><strong>FAX No:</strong> <?php if(isset($GLOBALS['result']->fax_no)) echo $GLOBALS['result']->fax_no; ?></p>
        </li>
    <br />
    </ul>
</ul>
</ul>  