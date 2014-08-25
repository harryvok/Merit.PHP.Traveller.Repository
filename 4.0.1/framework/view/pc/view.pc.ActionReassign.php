<script type="text/javascript">
$(document).ready(function(){
    $("#clearOfficer").hide();
	
	$("#view-job-form").validate({ ignore: "" });
	$("#view-job-form").submit(function(){
				if($(this).validate().numberOfInvalids() == 0){ $("#submit").attr("disabled", true); }
			});
});
</script>
  <div class="summaryContainer">
  <h1>Reassign Officer</h1>
  <div>
          <div class="column r15">
          <span style="font-weight:bold;">Officer:</span><br  />
          <?php if(isset($GLOBALS['result']['officer']->given_names)){ echo $GLOBALS['result']['officer']->given_names; } if(isset($GLOBALS['result']['officer']->surname)){ echo " ".$GLOBALS['result']['officer']->surname; } ?>
          </div>
          <div class="column r15">
          <span style="font-weight:bold;">Mobile:</span><br  />
          <?php if(isset($GLOBALS['result']['officer']->mobile_no)){ echo $GLOBALS['result']['officer']->mobile_no; } ?>
          </div>
          <div class="column r15">
          <span style="font-weight:bold;">Phone:</span><br  />
          <?php if(isset($GLOBALS['result']['officer']->telephone)){ echo $GLOBALS['result']['officer']->telephone; } ?>
          </div>
          
          <div style="width:100%; float:left;">

          <p>&nbsp;</p>
           <?php
           if($GLOBALS['result']['action']->status_code == "OPEN"){ 
               
               if($_SESSION['responsible_code'] == $GLOBALS['result']['action']->action_officer_code){
              ?>
              <b>This action is assigned to you.</b>
              <br /><br />
              <?php
               }
              ?>
              <b>Assign to Officer:</b> 
              
               <form id="view-job-form" method="post"  enctype="multipart/form-data"  action="process.php">
              <input  data-officer="true" id="new_officer_text" class="required" placeholder="Search..." />
              <input type="hidden" id="new_officer_textCode" name="new_officer"  class="required" />
              <p>&nbsp;</p>
              <b>Reason:</b><br />
              <textarea name="reason"  style="width:100%; height:40px; padding:5px;"></textarea>
              <p>&nbsp;</p>
              <div class="column r50">
              <b>Reassign What?</b><br />
              <input name="reassign_type" type="radio" value="O" checked /> This action only<br />
              <input name="reassign_type" type="radio" value="P" /> All actions for this officer (this, open, pending)<br />
              <input name="reassign_type" type="radio" value="A" /> All actions for this request (this, open, pending)
              </div>
              <div class="column r50">
              <b>Reassign To</b><br />
              <input name="reassign_to_type" type="radio" value="O" checked /> Officer specified above<br />
              <input name="reassign_to_type" type="radio" value="P" /> Previous action officer<br />
              <input name="reassign_to_type" type="radio" value="I" /> Request input officer
              </div>
              <div class="float-left" style="width:100%">
              <p>&nbsp;</p>
             
              <input id="submit" class="button left" type='submit' value='Reassign' />
              <?php
           }
           else{
               if($_SESSION['responsible_code'] == $GLOBALS['result']['action']['action']->action_officer_code){
              ?>
              <b>This action is assigned to you.</b>
              <br /><br />
              <?php
               }
              ?>
              <b>Assign to Officer:</b> 
              
               <form method="post"  enctype="multipart/form-data"  action="process.php">
              <input   class="required" disabled="disabled" />
              <input type="hidden" name="new_officer"disabled="disabled"  class="required" />
              <p>&nbsp;</p>
              <b>Reason:</b><br />
              <textarea name="reason"  style="width:100%; height:40px; padding:5px;" disabled="disabled"></textarea>
              <p>&nbsp;</p>
              <div class="column r50">
              <b>Reassign What?</b><br />
              <input disabled="disabled" name="reassign_type" type="radio" value="O" checked /> This action only<br />
              <input disabled="disabled" name="reassign_type" type="radio" value="P" /> All actions for this officer (this, open, pending)<br />
              <input disabled="disabled" name="reassign_type" type="radio" value="A" /> All actions for this request (this, open, pending)
              </div>
              <div class="column r50">
              <b>Reassign To</b><br />
              <input disabled="disabled" name="reassign_to_type" type="radio" value="O" checked /> Officer specified above<br />
              <input disabled="disabled" name="reassign_to_type" type="radio" value="P" /> Previous action officer<br />
              <input disabled="disabled" name="reassign_to_type" type="radio" value="I" /> Request input officer
              </div>
              <div class="float-left" style="width:100%">
              <p>&nbsp;</p>

              <input class="grey left" type='submit' value='Submit' disabled="disabled" value="Reassign" />
              <?php
           }
              ?>
              <input type="hidden" name="action_id" id="action_id" value="<?php echo $GLOBALS['result']['action']->action_id; ?>" />
                <input type="hidden" name="request_id" id="request_id" value="<?php echo $GLOBALS['result']['action']->request_id; ?>" />
                <input type="hidden" name="action_officer_code" value="<?php echo $GLOBALS['result']['action']->action_officer_code; ?>" />
                <input type="hidden" name="page" value="action" />
                <input type="hidden" name="action" value="ReassignAction" />
                </div>
                </form>
          </div>
      </div>	
      </div>