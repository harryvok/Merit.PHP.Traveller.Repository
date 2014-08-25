<?php
$GLOBALS['result'] = $GLOBALS['result']->officer_det;
?>

<div class="summaryContainer">
    <div class="float-left">
        <div class="column r50">
            <div class="column r25"> 
                <span class="summaryColumnTitle">Given Name</span>
                <div class="summaryColumn">
                    <?php if(isset($GLOBALS['result']->given_names)) echo $GLOBALS['result']->given_names; ?>
                </div>
          </div>
          <div class="column r25"> 
                <span class="summaryColumnTitle">Surname</span>
                <div class="summaryColumn">
                    <?php if(isset($GLOBALS['result']->surname)) echo $GLOBALS['result']->surname; ?>
             </div>
          </div>
          <div class="column r25"> 
                <span class="summaryColumnTitle">Officer Title</span>
                <div class="summaryColumn">
                   <?php if(isset($GLOBALS['result']->class_name)) echo $GLOBALS['result']->class_name; ?>
                </div>
          </div>
          <p>&nbsp;</p>
      </div>
  </div>
    <p>&nbsp;</p>
 <div class="float-left">
     <div class="column r50">
            <div class="column r50"> 
                <span class="summaryColumnTitle">Location</span>
                <div class="summaryColumn">
                    <?php if(isset($GLOBALS['result']->location)) echo $GLOBALS['result']->location; ?>
                </div>
          </div>
          <div class="column r50"> 
                <span class="summaryColumnTitle">Division</span>
                <div class="summaryColumn">
                    <?php if(isset($GLOBALS['result']->div_name)) echo $GLOBALS['result']->div_name; ?>
                </div>
          </div>
          
      </div>
        
  </div>
  <div class="float-left">
     <div class="column r50">
  <div class="column r50"> 
                <span class="summaryColumnTitle">Department</span>
                <div class="summaryColumn">
                    <?php if(isset($GLOBALS['result']->dep_name)) echo $GLOBALS['result']->dep_name; ?>
                </div>
          </div>
          <div class="column r50"> 
                <span class="summaryColumnTitle">Centre</span>
                <div class="summaryColumn">
                    <?php if(isset($GLOBALS['result']->centre_name)) echo $GLOBALS['result']->centre_name; ?>
                </div>
          </div>
          </div>
          
          </div>
  <div class="float-left">
  <div class="column r50"> 
      <div class="column r25">
            <span class="summaryColumnTitle">Telephone</span>
            <div class="summaryColumn"><?php if(isset($GLOBALS['result']->telephone)) echo $GLOBALS['result']->telephone; ?></div>
       </div>
      <div class="column r25">
            <span class="summaryColumnTitle">Mobile No</span>
            <div class="summaryColumn"><?php if(isset($GLOBALS['result']->mobile_no)) echo $GLOBALS['result']->mobile_no; ?></div>
      </div>
      <div class="column r25">
            <span class="summaryColumnTitle">FAX No</span>
            <div class="summaryColumn"><?php if(isset($GLOBALS['result']->fax_no)) echo $GLOBALS['result']->fax_no; ?></div>
        </div>
        </div>
  </div>
  <div class="column r25"> 
            <span class="summaryColumnTitle">Email Address</span>
            <div class="summaryColumn">
                <?php if(isset($GLOBALS['result']->mail_id)) echo $GLOBALS['result']->mail_id; ?>
            </div>
      </div>