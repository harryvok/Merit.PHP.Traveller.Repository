<div style="float:left;">
<h2>
    <b><?php echo $GLOBALS['result']->animal_type; ?>: <?php echo $GLOBALS['result']->animal_name; ?>(<?php echo $GLOBALS['result']->animal_no; ?>)</b>
    
 </h2>
 </div>
<div style="float:right;">

    <h2><b>Status:</b> <?php echo $GLOBALS['result']->status; ?></h2>
</div>
    <div class="summaryContainer">
        <div class="float-left">
                <div class="column r50">
                   <span class="summaryColumnTitle">Animal Name</span>
                    <div class="summaryColumn">
                        <?php echo $GLOBALS['result']->animal_name; ?>
                        </div>
                    </div>

                <div class="column r50">
                   <span class="summaryColumnTitle">Owner Name</span>
                    <div class="summaryColumn">
                        <?php echo $GLOBALS['result']->owner_name; ?>
                        </div>
                    </div>
        </div>
        <div class="float-left">
                <div class="column r50">
                   <span class="summaryColumnTitle">License Number</span>
                    <div class="summaryColumn">
                        <?php echo $GLOBALS['result']->licence_no; ?>
                        </div>
                    </div>

                <div class="column r50">
                   <span class="summaryColumnTitle">Address</span>
                    <div class="summaryColumn">
                        <?php echo $GLOBALS['result']->address; ?>
                        </div>
                    </div>
        </div>
      <div class="column r25">
             <span class="summaryColumnTitle">Animal Type</span>
            <div class="summaryColumn"><?php echo $GLOBALS['result']->animal_type; ?></div>
            <span class="summaryColumnTitle">Age</span>
            <div class="summaryColumn"><?php echo $GLOBALS['result']->age; ?></div>
            <span class="summaryColumnTitle">Breed</span>
            <div class="summaryColumn"><?php echo $GLOBALS['result']->breed; ?></div>
            <span class="summaryColumnTitle">Chip Number</span>
            <div class="summaryColumn"><?php echo $GLOBALS['result']->chip_no; ?></div>
        </div>
        <div class="column r25">
            <span class="summaryColumnTitle">Property Number</span>
            <div class="summaryColumn"><?php echo $GLOBALS['result']->property_no; ?></div>
            <span class="summaryColumnTitle">Date of Birth</span>
            <div class="summaryColumn"><?php if(strlen($GLOBALS['result']->dob) >0 || $GLOBALS['result']->dob != "0000-00-00T00:00:00"){ echo date('d/m/Y',strtotime($GLOBALS['result']->dob)); } else { echo ''; } ?></div>
            <span class="summaryColumnTitle">Desexed</span>
            <div class="summaryColumn"><?php echo $GLOBALS['result']->desexed; ?></div>
            <span class="summaryColumnTitle">Gender</span>
            <div class="summaryColumn"><?php echo $GLOBALS['result']->gender; ?></div>
            
        </div>
</div>