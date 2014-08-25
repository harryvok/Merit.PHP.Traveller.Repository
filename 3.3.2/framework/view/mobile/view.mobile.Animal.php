<span class="graytitle">
    <b><?php echo $GLOBALS['result']->animal_type; ?>: <?php echo $GLOBALS['result']->animal_name; ?> (<?php echo $GLOBALS['result']->animal_no; ?>)</b>
  </span>
  <ul class="pageitem">
    <span class="graytitle">Animal Details</span>
    <ul class="pageitem">
        <li class="textbox">
            <b>Animal Name:</b> <?php echo $GLOBALS['result']->animal_name; ?> 
        </li>
        <li class="textbox">
            <b>Animal Type:</b> <?php echo $GLOBALS['result']->animal_type; ?>
        </li>
        <li class="textbox">
            <b>License Number:</b> <?php echo $GLOBALS['result']->licence_no; ?>
        </li>
        <li class="textbox">
            <b>Date of Birth:</b> <?php if(strlen($GLOBALS['result']->dob) >0 || $GLOBALS['result']->dob != "0000-00-00T00:00:00"){ echo date('d/m/Y',strtotime($GLOBALS['result']->dob)); } else { echo ''; } ?>
            
        </li>
        <li class="textbox">
            <b>Age:</b> <?php echo $GLOBALS['result']->age; ?>
        </li>
        <li class="textbox">
            <b>Desexed:</b> <?php echo $GLOBALS['result']->desexed; ?>
        </li>
        <li class="textbox">
            <b>Breed:</b> <?php echo $GLOBALS['result']->breed; ?>
        </li>
        <li class="textbox">
            <b>Gender:</b> <?php echo $GLOBALS['result']->gender; ?>
        </li>
        <li class="textbox">
            <b>Chip Number:</b> <?php echo $GLOBALS['result']->chip_no; ?>
        </li>
        <li class="textbox">
            <b>Owner Name:</b> <?php echo $GLOBALS['result']->owner_name; ?>
        </li>
        <li class="textbox">
            <b>Property Number:</b> <?php echo $GLOBALS['result']->property_no; ?>
        </li>
        <li class="textbox">
            <b>Address:</b> <?php echo $GLOBALS['result']->address; ?>
        </li>
    <br />
    </ul>
  </ul>
  </ul>  