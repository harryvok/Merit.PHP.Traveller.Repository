<script type="text/javascript">
  $(document).ready(function(){
	  // validate signup form on keyup and submit
	  $('#requirement').change(function() {
		  var id = $(this).find(':selected')[0].id;
   		 if(id == "Y"){  $('#desc').addClass("required"); $("#indMand").show(); }
		 else if(id == "N"){ $('#desc').removeClass("required"); $("#indMand").hide(); }
		 
		  Load();
		  $.ajax({
			  url: 'inc/ajax/ajax.get_outcome_udfs.php',
			  type: 'post',
			  data: {
				  outcome: $('#requirement').val(),
				  id: $('#request_id').val(),
				  act_id: $('#act_id').val()
			  },
			  success: function(data) {
				  Unload();
				  $('#outcome-udfs').html(data);	
				  $('#outcome-udfs').show();
			  }
		  });
	  });
	  
	  $('#completeaction').validate();
  });
</script>
<div class="margin-right">
	<div class="view-request">
		<div class="margin-right">
			<span class="request-column-title">Complete Action</span>
			<?php
            if($GLOBALS['result']['action']['action']->status_code == "OPEN"){ 
            ?>
            <script type="text/javascript">
			  $(document).ready(function(){
				  // validate signup form on keyup and submit
				  
				  
				  $("#completeaction").validate();
			  });
		    </script>
            <form id="completeaction" method="post" class="completeaction" enctype="multipart/form-data"  action="process.php">
                <label  id="lab1">Outcome*:</label>
                <select class="text required" id="requirement" name="requirement">
                    <option value="">Select</option>
                    <?php
                    foreach($GLOBALS['result']['outcomes']->action_completed_details as $result_outcomes){
                        
                        if($GLOBALS['result']['override_ind'] == "Y"){
                            if($result_outcomes->function_code == $GLOBALS['result']['action']['request']->function_code && $result_outcomes->assign_code == $GLOBALS['result']['action']['action']->reason_assigned && $result_outcomes->active_ind == "Y"){
                                ?>
                                <option id="<?php if(isset($result_outcomes->note_ind)){ echo $result_outcomes->note_ind; } else { echo "N"; } ?>" value="<?php echo $result_outcomes->action_code; ?>"><?php echo $result_outcomes->action_name; ?></option>
                                <?php
                            }
                        }
                        elseif($GLOBALS['result']['override_ind'] == "N"){
                            if($result_outcomes->service_code == $GLOBALS['result']['action']['request']->service_code && $result_outcomes->request_code == $GLOBALS['result']['action']['request']->request_code && trim($result_outcomes->function_code) == "" && $result_outcomes->assign_code == $GLOBALS['result']['action']['action']->reason_assigned && $result_outcomes->active_ind == "Y"){
                                ?>
                                <option id="<?php if(isset($result_outcomes->note_ind)){ echo $result_outcomes->note_ind; } else { echo "N"; } ?>" value="<?php echo $result_outcomes->action_code; ?>"><?php echo $result_outcomes->action_name; ?></option>
                                <?php
                            }
                        }
                    }
                    ?>
                </select>
                  <label  id="lab2">Comment: <span id="indMand" style="color:red; display:none;">*</span></label> 
                  <textarea name="comment_act" class="text" id="desc" style="width:100%; height:40px; padding:5px;"></textarea>
                <div id="outcome-udfs" style="display:none">
                
                </div>
                <input type='hidden' name='udfs_exist' id='udfs_exist' value='0' />
                <p>&nbsp;</p>
                <input type="hidden" name="page" id="page" value="action" />
                <input type="hidden" name="act_id" id="act_id" value="<?php echo $_GET['id']; ?>" />
                <input type="hidden" name="action_id" id="action_id" value="<?php echo $_GET['id']; ?>" />
                <input type="hidden" name="request_id" id="request_id" value="<?php echo $GLOBALS['result']['action']['request']->request_id; ?>" />
                <input type="hidden" name="service_name" id="service_name" value="<?php echo $GLOBALS['result']['action']['request']->service_name; ?>" />				
                <input type="hidden" name="action" id="action" value="CompleteAction" />
                <input type="hidden" name="status_code" id="status_code" value="<?php echo $GLOBALS['result']['action']['action']->status_code; ?>" />
                <input type="hidden" name="assign_name" id="assign_name" value="<?php echo $GLOBALS['result']['action']['action']->reason_assigned_name; ?>" />
                <input  type='submit' id="submitbutton" value='Complete' />
            </form>
          <?php
      }
      else{
          ?>
              <label >Outcome*:</label>
              <select class="text" name="requirement2" disabled="disabled">
                  <option value="NORESPONSE">Select</option>
                  </select>
                  <div style="margin-right:15px;">
                     <label >Comment:</label> 
                     <input type="text" id="desc2" class="text" name="comment_act2" disabled="disabled" /><p>&nbsp;</p>
                  </div>
              <input class="grey left" type='submit' value='Submit' disabled="disabled" />
      <?php
      }
      ?>  
	</div>
  </div>
</div>