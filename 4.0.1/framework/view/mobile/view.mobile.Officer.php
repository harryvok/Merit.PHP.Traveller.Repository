<?php
$GLOBALS['result'] = $GLOBALS['result']->officer_det;
?>
<ul class="no-ellipses" data-role="listview" data-inset="true" data-divider-theme="b">
  	<li data-role="list-divider">Officer Details</li>
    <li><p><strong>Given Names:</strong> <?php if(isset($GLOBALS['result']->given_names)) echo $GLOBALS['result']->given_names; ?></p></li>
    <li><p><strong>Surname: </strong><?php if(isset($GLOBALS['result']->surname)) echo $GLOBALS['result']->surname; ?></p></li>


    <li><p><strong>Phone No: </strong><a href="tel:<?php echo $GLOBALS['result']->telephone; ?>"><?php echo $GLOBALS['result']->telephone; ?></a></p></li>
    <li><p><strong>Mobile No: </strong><a href="tel:<?php echo $GLOBALS['result']->mobile_no; ?>"><?php echo $GLOBALS['result']->mobile_no; ?></a></p></li>
    <li><p><strong>FAX No: </strong> <?php if(isset($GLOBALS['result']->fax_no)) echo $GLOBALS['result']->fax_no; ?></p></li>
    <li><p><strong>Email Address: </strong><a href="mailto:<?php echo $GLOBALS['result']->mail_id; ?>"><?php echo $GLOBALS['result']->mail_id; ?></a></p></li>
</ul>
<ul class="no-ellipses" data-role="listview" data-inset="true" data-divider-theme="b">
    <li data-role="list-divider">Organisation</li>
    <li><p><strong>Officer Title:</strong> <?php if(isset($GLOBALS['result']->class_name)) echo $GLOBALS['result']->class_name; ?></p></li>
    <li><p><strong><?php echo $_SESSION['div_name']; ?>:</strong> <?php if(isset($GLOBALS['result']->div_name)) echo $GLOBALS['result']->div_name; ?></p></li>
    <li><p><strong><?php echo $_SESSION['dept_name']; ?>:</strong> <?php if(isset($GLOBALS['result']->dep_name)) echo $GLOBALS['result']->dep_name; ?></p></li> 
    <li><p><strong>Centre: </strong><?php if(isset($GLOBALS['result']->centre_name)) echo $GLOBALS['result']->centre_name; ?> </p></li>   
    <li><p><strong>Location:</strong> <?php if(isset($GLOBALS['result']->location)) echo $GLOBALS['result']->location; ?></p></li>
</ul> 