<?php            
if($GLOBALS['result']['action']['action']->status_code == "OPEN" && $_SESSION['roleSecurity']->maint_comp_action == "Y"){ 
?>
	<script type="text/javascript">
  $(document).ready(function(){
	  // validate signup form on keyup and submit
	  $('#requirement').change(function() {
		  var id = $(this).find(':selected')[0].id;
   		 if(id == "Y"){  $('#descField').addClass("required"); $("#indMand").show(); }
		 else if(id == "N"){ $('#descField').removeClass("required"); $("#indMand").hide(); }
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
      $("#completeaction").removeAttr("novalidate");
  });
</script>
    
    <span class="graytitle">Complete Action</span>
    <form id="completeaction" method="post" class="completeaction" enctype="multipart/form-data"  action="process.php">
      <ul class="pageitem">
      <span class="graytitle">Outcome</span>
      <ul class="pageitem">
        <li class="select">
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
        </li>
      </ul>
      <span class="graytitle">Comment<span id="indMand" style="color:red; display:none;">*</span></span>
      <ul class="pageitem">
        <li class="bigfield">
          <input type="text" id="descField" class="text" name="comment_act" />
        </li>
      </ul>
      <div id="outcome-udfs" style="display:none;"> </div>
      <input type='hidden' name='udfs_exist' id='udfs_exist' value='0' />
      <ul class="pageitem">
      <li class="button">
        <input type="hidden" name="page" value="action" />
        <input id="submit" class="button left" type='submit' value='Complete' />
        <input type="hidden" name="act_id" id="act_id" value="<?php echo $_GET['id']; ?>" />
        <input type="hidden" name="action_id" id="action_id" value="<?php echo $_GET['id']; ?>" />
        <input type="hidden" name="request_id" id="request_id" value="<?php echo $GLOBALS['result']['action']['request']->request_id; ?>" />
        <input type="hidden" name="service_name" id="service_name" value="<?php echo $GLOBALS['result']['action']['request']->service_name; ?>" />
        <input type="hidden" name="page" value="action" />
        <input type="hidden" name="action" value="CompleteAction" />
        <input type="hidden" name="status_code" id="status_code" value="<?php echo $GLOBALS['result']['action']['action']->status_code; ?>" />
        <input type="hidden" name="assign_name" id="assign_name" value="<?php echo $GLOBALS['result']['action']['action']->reason_assigned_name; ?>" />
    </form>
    </li>
    </ul>
<?php
}
?>
