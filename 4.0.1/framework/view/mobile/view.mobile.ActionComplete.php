<?php        
if($_SESSION['roleSecurity']->maint_comp_action == "Y"){ 
?>
<script type="text/javascript">
   $(document).ready(function(){
	  // validate signup form on keyup and submit
	  
	  $('#requirement').change(function() {
            var reqid = $('#requirement').val();
            var splireqid = reqid.split('_')[1];
        if(splireqid != "NORESPONSE" && reqid != ""){
		      var id = $(this).find(':selected')[0].id;
   		     if(id == "Y"){  $('#desc').addClass("required"); $("#indMand").show(); }
		     else if(id == "N"){ $('#desc').removeClass("required"); $("#indMand").hide(); }
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
				      $('#outcome-udfs').html(data).trigger("create");
				      $('#outcome-udfs').show();
			      }
		      });
          }
          else{
            $("#udfsexist").val("0");
            $("#outcome-udfs").html("");
          }
	  });

	  $("#completeaction").validate();
   });
</script>
<form id="completeaction" method="post" class="completeaction" action="process.php">
  <label>Outcome</label>
  <select class="text required" id="requirement" name="requirement">
    <option value="">Select</option>
     <?php
    foreach($GLOBALS['result']['outcomes']->action_completed_det->action_completed_details as $result_outcomes){ ?>
                        <option id="<?php if(isset($result_outcomes->note_ind)){ echo $result_outcomes->note_ind; } else { echo "N"; } ?>" value="<?php echo $result_outcomes->note_ind."_".$result_outcomes->action_code; ?>"><?php echo $result_outcomes->action_name; ?></option>
                    <?php } ?>
  </select>
  <label>Comment<span id="indMand" style="color:red; display:none;">*</span></label>
  <input spellcheck="true" type="text" id="desc" class="text" name="comment_act" />
  <div id="outcome-udfs">
    
  </div>
  <input type='hidden' name='udfs_exist' id='udfs_exist' value='0' />
  <input type="hidden" name="page" value="action" />
  <input id="submit" class="button left" type='submit' value='Complete' />
  <input type="hidden" name="act_id" id="act_id" value="<?php echo $_GET['id']; ?>" />
  <input type="hidden" name="action_id" id="action_id" value="<?php echo $_GET['id']; ?>" />
  <input type="hidden" name="request_id" id="request_id" value="<?php echo $GLOBALS['result']['action']->request_id; ?>" />
  <input type="hidden" name="service_name" id="service_name" value="<?php echo $GLOBALS['result']['action']->service_name; ?>" />	
  <input type="hidden" name="page" value="action" />
  <input type="hidden" name="action" value="CompleteAction" />
  <input type="hidden" name="status_code" id="status_code" value="<?php echo $GLOBALS['result']['action']->finalised_ind; ?>" />
  <input type="hidden" name="assign_name" id="assign_name" value="<?php echo $GLOBALS['result']['action']->assign_name; ?>" />
</form>
<?php
}
?>
