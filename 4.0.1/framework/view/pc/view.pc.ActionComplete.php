<script type="text/javascript">
    $(document).ready(function () {
        $("#nextActs").hide();

	  // validate signup form on keyup and submit
        $('#requirement').change(function () {
            
        // Clear Var's
            var rs1 = "";
            var nan1 = "";
            var nan2 = "";
            var nan3 = "";
            var nao1 = "";
            var nao2 = "";
            var nao3 = "";
        
          // Req Status
            $('#rs1').val("");
          // Action 1
            $('#nan1').val("");
          // Officer 1
            $('#nao1').val("");
          // Action 2
            $('#nan2').val("");
          // Officer 2
            $('#nao2').val("");
          // Action 3
            $('#nan3').val("");
          // Officer 3
            $('#nao3').val("");
            $("#nextActs").hide();


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

            $.ajax({
                url: 'inc/ajax/ajax.getNextActions.php',
                type: 'post',
                dataType: "json",
                data: {
                    outcome: splireqid,
                    id: $('#request_id').val(),
                    act_id: $('#act_id').val()
                },
                success: function (data) {
                    Unload();
                    
                    var rs1 = data.requestStatus;
                    var nan1 = data.nextn1;
                    var nan2 = data.nextn2;
                    var nan3 = data.nextn3;
                    var nao1 = data.nexto1;
                    var nao2 = data.nexto2;
                    var nao3 = data.nexto3;

                    if (rs1 != "") {
                        $("#nextActs").show();
                        $('#rs1').val(rs1);
                    }

                    if (nan1 != "") {
                        // Show headers
                        $('#nanh').show();
                        $('#naoh').show();

                        // Show First Action fields
                        $('#nan1').val("Action: " + nan1);
                        $('#nan1').show();
                        if (nao1 == "") {
                            $('#nao1').val("-");
                            $('#nao1').show();
                        }
                        else {
                            $('#nao1').val("For: " + nao1);
                            $('#nao1').show();
                        }
                    }
                    else {
                        $('#nan1').hide();
                        $('#nao1').hide();
                        $('#nanh').hide();
                        $('#naoh').hide();
                    }

                    if (nan2 != "") {
                        // Show Second Action fields
                        $('#nan2').val("Action: " + nan2);
                        $('#nan2').show();
                        $('#nao2').val("For: " + nao2);
                        $('#nao2').show();
                    }
                    else {
                        $('#nan2').hide();
                        $('#nao2').hide();
                    }

                    if (nan3 != "") {
                        // Show Third Action fields
                        $('#nan3').val("Action: " + nan3);
                        $('#nan3').show();
                        $('#nao3').val("For: " + nao3);
                        $('#nao3').show();
                    }
                    else {
                        $('#nan3').hide();
                        $('#nao3').hide();
                    }
                }
            });         
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

  <div class="summaryContainer" id="nextActs">
  <h1>Next Steps / Action</h1>
          <div class="float-left">
            <div class="column r100">
                <span class="summaryColumnTitle">Request Status</span>
                <input type="text" disabled id="rs1" style="color:red" />
            </div>
           
            <div class="column r50">
                <span class="summaryColumnTitle" id="nanh">Next Action Name</span>
                <input type="text" disabled id="nan1"/>
                <input type="text" disabled id="nan2"/>
                <input type="text" disabled id="nan3"/>
            </div>

            <div class="column r50">
                <span class="summaryColumnTitle" id="naoh">Next Action Officer</span>
                <input type="text" disabled id="nao1"/>
                <input type="text" disabled id="nao2"/>
                <input type="text" disabled id="nao3"/>
            </div>
        </div>
  </div>

