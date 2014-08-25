

  <div class="view-request">
      <div class="float-left">
        <div class="column half">
        	 <span class="request-column-title">Surname</span>
              <div class="request-column">
                  <?php echo $GLOBALS['result']->surname; ?>
              </div>
          </div>
          <div class="column half">
              <div class="column quarter"> 
                  <span class="request-column-title">Title</span>
                  <div class="request-column">
                      <?php echo $GLOBALS['result']->pref_title; ?>
                  </div>
            </div>
            <div class="column quarter"> 
                  <span class="request-column-title">Initials</span>
                  <div class="request-column">
                      <?php echo $GLOBALS['result']->initials; ?>
                  </div>
            </div>
        </div>
    </div>
      
      <div class="float-left">
        <div class="column half">
         <span class="request-column-title">Given Name</span>
              <div class="request-column" style="width:100%;">
                  <?php echo $GLOBALS['result']->given_names; ?>
              </div>
          </div>
          <div class="column half"> 
              <span class="request-column-title">Email Address</span>
              <div class="request-column" style="width:100%;">
                  <?php echo $GLOBALS['result']->email_address; ?>
              </div>
        </div>
    </div>
    <div style="float:left;width:100%;">
        <div class="column half">
         <span class="request-column-title">Company Name</span>
          <div class="request-column" style="width:100%;">
            <?php echo $GLOBALS['result']->company_name; ?>
              </div>
          </div>

    </div>
    <div class="column quarter">
          <span class="request-column-title">Telephone</span>
          <div class="request-column"><?php echo $GLOBALS['result']->telephone; ?></div>
          <span class="request-column-title">Mobile No</span>
          <div class="request-column"><?php echo $GLOBALS['result']->mobile_no; ?></div>
      </div>
      <div class="column quarter">
          <span class="request-column-title">Work Phone</span>
          <div class="request-column"><?php echo $GLOBALS['result']->work_phone; ?></div>
          <span class="request-column-title">FAX No</span>
          <div class="request-column"><?php echo $GLOBALS['result']->fax_no; ?></div>
      </div>
      <div class="column quarter">
          <span class="request-column-title">NAR ID</span>
          <div class="request-column"> <?php echo $GLOBALS['result']->name_ctr; ?></div>
      </div>
 </div>