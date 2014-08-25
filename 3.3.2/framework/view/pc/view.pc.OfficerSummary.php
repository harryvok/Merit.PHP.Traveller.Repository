<?php
$GLOBALS['result'] = $GLOBALS['result']->officer_det;
?>

<div class="view-request">
    <div class="float-left">
      <div class="column half">
           <span class="request-column-title">Surname</span>
            <div class="request-column">
                <?php if(isset($GLOBALS['result']->surname)) echo $GLOBALS['result']->surname; ?>
            </div>
        </div>
      <div class="column half">
            <div class="column quarter"> 
                <span class="request-column-title">Location</span>
                <div class="request-column">
                    <?php if(isset($GLOBALS['result']->location)) echo $GLOBALS['result']->location; ?>
                </div>
          </div>
          <div class="column quarter"> 
                <span class="request-column-title">Officer Type</span>
                <div class="request-column">
                    <?php if(isset($GLOBALS['result']->officer_type)) echo $GLOBALS['result']->officer_type; ?>
                </div>
          </div>
      </div>
  </div>
    
 <div class="float-left">
    <div class="column half">
       <span class="request-column-title">Given Name</span>
            <div class="request-column">
                <?php if(isset($GLOBALS['result']->given_names)) echo $GLOBALS['result']->given_names; ?>
            </div>
        </div>
        <div class="column half"> 
            <span class="request-column-title">Email Address</span>
            <div class="request-column">
                <?php if(isset($GLOBALS['result']->email_address)) echo $GLOBALS['result']->email_address; ?>
            </div>
      </div>
  </div>
  <div class="float-left">
      <div class="column quarter">
            <span class="request-column-title">Telephone</span>
            <div class="request-column"><?php if(isset($GLOBALS['result']->telephone)) echo $GLOBALS['result']->telephone; ?></div>
       </div>
      <div class="column quarter">
            <span class="request-column-title">Mobile No</span>
            <div class="request-column"><?php if(isset($GLOBALS['result']->mobile_no)) echo $GLOBALS['result']->mobile_no; ?></div>
      </div>
      <div class="column quarter">
            <span class="request-column-title">FAX No</span>
            <div class="request-column"><?php if(isset($GLOBALS['result']->fax_no)) echo $GLOBALS['result']->fax_no; ?></div>
        </div>
  </div>