
<!-- Javascript Validation -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#clearOfficer").hide();
	    $("#view-job-form").validate({ ignore: "" });
	    $("#view-job-form").submit(function(){
				    if($(this).validate().numberOfInvalids() == 0){ $("#submit").attr("disabled", true); }
			    });
    });
</script>

          <?php if($GLOBALS['result']['action']->status_code == "OPEN") { if($_SESSION['responsible_code'] == $GLOBALS['result']['action']->action_officer_code){ ?>
          <b>This action is assigned to you.</b>
          <?php } ?>

  <div class="summaryContainer">
    <h1>Reassign Officer</h1>
        <div>
              <div class="float-left">
                  <div class="column r15">
                        <span class="summaryColumnTitle">Officer:</span>
                        <div class="summaryColumn"><?php if(isset($GLOBALS['result']['officer']->given_names)){ echo $GLOBALS['result']['officer']->given_names; } if(isset($GLOBALS['result']['officer']->surname)){ echo " ".$GLOBALS['result']['officer']->surname; } ?></div>
                  </div>
                  <div class="column r15">
                        <span class="summaryColumnTitle">Mobile:</span>
                        <div class="summaryColumn"><?php if(isset($GLOBALS['result']['officer']->mobile_no)){ echo $GLOBALS['result']['officer']->mobile_no; } ?></div>
                  </div>
                  <div class="column r15">
                        <span class="summaryColumnTitle">Phone:</span>
                        <div class="summaryColumn"><?php if(isset($GLOBALS['result']['officer']->telephone)){ echo $GLOBALS['result']['officer']->telephone; } ?></div>
                  </div>
               </div>
                
              <p>&nbsp</p><span class="summaryColumnTitle">Assign to new Officer:</span>
              
              <form id="view-job-form" method="post"  enctype="multipart/form-data"  action="process.php">
                  <input  data-officer="true" id="new_officer_text" class="required" style="width:80%;" placeholder="Search..." />
                  <input type="hidden" id="new_officer_textCode" name="new_officer"  class="required" />
                  <label for="new_officer_textCode" class="error" style="font-size:0;height:0;"></label>
                  
                      <p>&nbsp</p><span class="summaryColumnTitle">Reason:</span>
                      <textarea name="reason"  style="width:80%; height:40px; padding:5px;"></textarea>

                  <div class="column r50">
                      <p>&nbsp</p><span class="summaryColumnTitle">Reassign What?</span>
                      <input name="reassign_type" type="radio" value="O" checked /> This action only<br />
                      <input name="reassign_type" type="radio" value="A" /> All actions for this request (this, open, pending)<br />
                      <input name="reassign_type" type="radio" value="P" /> All actions for this officer (this, open, pending)<br /><br />
                      <input id="submit" class="button left" type='submit' value='Reassign' />
                   </div>

                        <input type="hidden" name="action_id" id="action_id" value="<?php echo $GLOBALS['result']['action']->action_id; ?>" />
                        <input type="hidden" name="request_id" id="request_id" value="<?php echo $GLOBALS['result']['action']->request_id; ?>" />
                        <input type="hidden" name="action_officer_code" value="<?php echo $GLOBALS['result']['action']->action_officer_code; ?>" />
                        <input type="hidden" name="page" value="action" />
                        <input type="hidden" name="action" value="ReassignAction" />
               </form>
           </div>
        </div>
      <?php } ?>
                     

 