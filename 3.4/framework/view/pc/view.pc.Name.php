

  <div class="summaryContainer">
      <div class="float-left">
        <div class="column half">
        	 <span class="summaryColumnTitle">Surname</span>
              <div class="summaryColumn">
                  <?php echo $GLOBALS['result']->surname; ?>
              </div>
          </div>
          <div class="column half">
              <div class="column quarter"> 
                  <span class="summaryColumnTitle">Title</span>
                  <div class="summaryColumn">
                      <?php echo $GLOBALS['result']->pref_title; ?>
                  </div>
            </div>
            <div class="column quarter"> 
                  <span class="summaryColumnTitle">Initials</span>
                  <div class="summaryColumn">
                      <?php echo $GLOBALS['result']->initials; ?>
                  </div>
            </div>
        </div>
    </div>
      
      <div class="float-left">
        <div class="column half">
         <span class="summaryColumnTitle">Given Name</span>
              <div class="summaryColumn" style="width:100%;">
                  <?php echo $GLOBALS['result']->given_names; ?>
              </div>
          </div>
          <div class="column half"> 
              <span class="summaryColumnTitle">Email Address</span>
              <div class="summaryColumn" style="width:100%;">
                  <?php echo $GLOBALS['result']->email_address; ?>
              </div>
        </div>
    </div>
    <div style="float:left;width:100%;">
        <div class="column half">
         <span class="summaryColumnTitle">Company Name</span>
          <div class="summaryColumn" style="width:100%;">
            <?php echo $GLOBALS['result']->company_name; ?>
              </div>
          </div>

    </div>
    <div class="column quarter">
          <span class="summaryColumnTitle">Telephone</span>
          <div class="summaryColumn"><?php echo $GLOBALS['result']->telephone; ?></div>
          <span class="summaryColumnTitle">Mobile No</span>
          <div class="summaryColumn"><?php echo $GLOBALS['result']->mobile_no; ?></div>
      </div>
      <div class="column quarter">
          <span class="summaryColumnTitle">Work Phone</span>
          <div class="summaryColumn"><?php echo $GLOBALS['result']->work_phone; ?></div>
          <span class="summaryColumnTitle">FAX No</span>
          <div class="summaryColumn"><?php echo $GLOBALS['result']->fax_no; ?></div>
      </div>
      <div class="column quarter">
          <span class="summaryColumnTitle">NAR ID</span>
          <div class="summaryColumn"> <?php echo $GLOBALS['result']->name_ctr; ?></div>
      </div>
 </div>