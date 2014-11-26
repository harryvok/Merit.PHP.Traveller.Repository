
    <strong><?php echo $GLOBALS['result']->animal_type; ?>: <?php echo $GLOBALS['result']->animal_name; ?>(<?php echo $GLOBALS['result']->animal_no; ?>)</strong>
  <ul class="no-ellipses" data-role="listview" data-inset="true" data-divider-theme="d">
  	<li data-role="list-divider">Animal Details</li>
        <li>
            <p><strong>Animal Name:</strong> <?php echo $GLOBALS['result']->animal_name; ?></p> 
        </li>
        <li>
            <p><strong>Animal Type:</strong> <?php echo $GLOBALS['result']->animal_type; ?></p>
        </li>
        <li>
            <p><strong>License Number:</strong> <?php echo $GLOBALS['result']->licence_no; ?></p>
        </li>
        <li>
            <p><strong>Date of Birth:</strong> <?php if(strlen($GLOBALS['result']->dob) >0 || $GLOBALS['result']->dob != "0000-00-00T00:00:00"){ echo date('d/m/Y',strtotime($GLOBALS['result']->dob)); } else { echo ''; } ?></p>
            
        </li>
        <li>
            <p><strong>Age:</strong> <?php echo $GLOBALS['result']->age; ?></p>
        </li>
        <li>
            <p><strong>Desexed:</strong> <?php echo $GLOBALS['result']->desexed; ?></p>
        </li>
        <li>
            <p><strong>Breed:</strong> <?php echo $GLOBALS['result']->breed; ?></p>
        </li>
        <li>
            <p><strong>Gender:</strong> <?php echo $GLOBALS['result']->gender; ?></p>
        </li>
        <li>
            <p><strong>Chip Number:</strong> <?php echo $GLOBALS['result']->chip_no; ?></p>
        </li>
        <li>
            <p><strong>Owner Name:</strong> <?php echo $GLOBALS['result']->owner_name; ?></p>
        </li>
        <li>
            <p><strong>Property Number:</strong> <?php echo $GLOBALS['result']->property_no; ?></p>
        </li>
        <li>
            <p><strong>Address:</strong> <?php echo $GLOBALS['result']->address; ?></p>
        </li>
  </ul>  