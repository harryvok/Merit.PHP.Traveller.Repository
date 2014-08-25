<div style="float:left;">
<h2>
    <b><?php echo $GLOBALS['result']->animal_type; ?>: <?php echo $GLOBALS['result']->animal_name; ?> (<?php echo $GLOBALS['result']->animal_no; ?>)</b>
    
 </h2>
 </div>
<div style="float:right;">

    <h2><b>Status:</b> <?php echo $GLOBALS['result']->status; ?></h2>
</div>
    <div class="view-request">
        <div class="float-left">
                <div class="column half">
                   <span class="request-column-title">Animal Name</span>
                    <div class="request-column">
                        <?php echo $GLOBALS['result']->animal_name; ?>
                        </div>
                    </div>

                <div class="column half">
                   <span class="request-column-title">Owner Name</span>
                    <div class="request-column">
                        <?php echo $GLOBALS['result']->owner_name; ?>
                        </div>
                    </div>
        </div>
        <div class="float-left">
                <div class="column half">
                   <span class="request-column-title">License Number</span>
                    <div class="request-column">
                        <?php echo $GLOBALS['result']->licence_no; ?>
                        </div>
                    </div>

                <div class="column half">
                   <span class="request-column-title">Address</span>
                    <div class="request-column">
                        <?php echo $GLOBALS['result']->address; ?>
                        </div>
                    </div>
        </div>
      <div class="column quarter">
             <span class="request-column-title">Animal Type</span>
            <div class="request-column"><?php echo $GLOBALS['result']->animal_type; ?></div>
            <span class="request-column-title">Age</span>
            <div class="request-column"><?php echo $GLOBALS['result']->age; ?></div>
            <span class="request-column-title">Breed</span>
            <div class="request-column"><?php echo $GLOBALS['result']->breed; ?></div>
            <span class="request-column-title">Chip Number</span>
            <div class="request-column"><?php echo $GLOBALS['result']->chip_no; ?></div>
        </div>
        <div class="column quarter">
            <span class="request-column-title">Property Number</span>
            <div class="request-column"><?php echo $GLOBALS['result']->property_no; ?></div>
            <span class="request-column-title">Date of Birth</span>
            <div class="request-column"><?php if(strlen($GLOBALS['result']->dob) >0 || $GLOBALS['result']->dob != "0000-00-00T00:00:00"){ echo date('d/m/Y',strtotime($GLOBALS['result']->dob)); } else { echo ''; } ?></div>
            <span class="request-column-title">Desexed</span>
            <div class="request-column"><?php echo $GLOBALS['result']->desexed; ?></div>
            <span class="request-column-title">Gender</span>
            <div class="request-column"><?php echo $GLOBALS['result']->gender; ?></div>
            
        </div>
</div>