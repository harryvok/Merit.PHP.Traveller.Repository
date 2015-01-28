<script type="text/javascript">
  $(document).ready(function(){
	  // validate signup form on keyup and submit
	  $('#requirement').change(function() {
            var reqid = $('#requirement').val();
            var splireqid = reqid.split('_')[1];
	      //if(splireqid != "NORESPONSE" && reqid != ""){
            if (reqid != "") {
		       var id = $(this).find(':selected')[0].id;
   		     if(id == "Y"){  $('#desc').addClass("required"); $("#indMand").show(); }
   		     else if (id == "N" || splireqid == "NORESPONSE") { $('#desc').removeClass("required"); $("#indMand").hide(); }
		      Load();              
		      $.ajax({
			      url:'inc/ajax/ajax.getRequestUDFs.php',
			      type: 'post',
			      data: {
				      view: "OutcomeUDFs",
				      outcome: splireqid,
				      id: $('#request_id').val(),
				      act_id: $('#act_id').val()
			      },
			      success: function(data) {
			          Unload();
				      $('#outcome-udfs').html(data);	
				      $('#outcome-udfs').show();
			      }
		      });
          }
          else{
            $("#udfs_exist").val("0");
            $("#outcome-udfs").html("");
          }
	  });

	  $('#completeaction').validate();
  });
</script>
	<div class="summaryContainer">
  <h1>Complete Action</h1>
  <div>
			
            <script type="text/javascript">
			  $(document).ready(function(){
				  // validate signup form on keyup and submit
				  
				  $("#completeaction").validate();
                  
                   $("#completeaction").submit(function(e){
                        if($('#completeaction').validate().numberOfInvalids() == 0){
                            $("#submitbutton").prop('disabled', true);
                            return true;
                            }else{
                            $("#submitbutton").prop('disabled', false);
                            }
                  });
			  });
		    </script>
            <form id="completeaction" method="post" class="completeaction" enctype="multipart/form-data"  action="process.php">
                <label  id="lab1">Outcome:</label>

                <!-- this is the dropdown for outcomes, add a dropdown for adhoc officers here -->
                <select class="text required" id="requirement" name="requirement">
                    <option value="">Select</option>
                    <?php
                        foreach($GLOBALS['result']['outcomes']->action_completed_det->action_completed_details as $result_outcomes){ ?>
                        <option id="<?php if(isset($result_outcomes->note_ind)){ echo $result_outcomes->note_ind; } else { echo 'N'; } ?>" value="<?php echo $result_outcomes->note_ind."_".$result_outcomes->action_code."_".$result_outcomes->resubmit; ?>"><?php echo $result_outcomes->action_name; ?></option>
                    <?php } ?>
                </select>
                
                <!-- adhoc label here -->
                <!-- adhoc select here -->


                  <label  id="lab2">Comment: <span id="indMand" style="color:red; display:none;">*</span></label> 
                  <textarea spellcheck="true" name="comment_act" class="text" id="desc" style="width:100%; height:40px; padding:5px;"></textarea>
                <div id="outcome-udfs" style="display:none">
                
                </div>
                <input type='hidden' name='udfs_exist' id='udfs_exist' value='0' />
                <p>&nbsp;</p>
                <input type="hidden" name="page" id="page" value="action" />
                <input type="hidden" name="act_id" id="act_id" value="<?php echo $_GET['id']; ?>" />
                <input type="hidden" name="action_id" id="action_id" value="<?php echo $_GET['id']; ?>" />
                <input type="hidden" name="request_id" id="request_id" value="<?php echo $GLOBALS['result']['action']->request_id; ?>" />
                <input type="hidden" name="service_name" id="service_name" value="<?php echo $GLOBALS['result']['action']->service_name; ?>" />				
                <input type="hidden" name="action" value="CompleteAction" />
                <input type="hidden" name="status_code" id="status_code" value="<?php echo $GLOBALS['result']['outcomes']->finalised_ind; ?>" />
                <input type="hidden" name="assign_name" id="assign_name" value="<?php echo $GLOBALS['result']['outcomes']->assign_name; ?>" />
                <input  type='submit' id="submitbutton" value='Complete' />
            </form>          
	    </div>
  </div>
<<<<<<< HEAD

  <div class="summaryContainer">
  <h1>Next Steps / Action</h1>
      <div>

      </div>
  </div>
=======
>>>>>>> parent of e15ebc3... test
