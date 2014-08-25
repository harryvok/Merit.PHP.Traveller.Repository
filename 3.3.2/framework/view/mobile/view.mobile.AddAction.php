<form method="post"  enctype="multipart/form-data" id="addaction" action="../process.php">
    <span class="graytitle">Required Action*</span>
    <ul class="pageitem">
        <li class="select">
            <select class="text required" name="required">
            <option value="">Select</option>
            <?php
			  if(count($GLOBALS['result']['actionreq']->action_reqd_details) > 1){
				  foreach($GLOBALS['result']['actionreq']->action_reqd_details as $actionreq){
					  if($GLOBALS['result']['override_ind'] == "Y"){
						  if($actionreq->function_code == $GLOBALS['function_code'] && $actionreq->active_ind == "Y"){
							  ?>
							  <option value="<?php echo $actionreq->assign_code; ?>"><?php echo $actionreq->assign_name; ?></option>
							  <?php
						  }
					  }
					  elseif($GLOBALS['result']['override_ind'] == "N"){
						  if($actionreq->service_code == $GLOBALS['service_code'] && $actionreq->request_code == $GLOBALS['request_code'] && trim($actionreq->function_code) == "" && $actionreq->active_ind == "Y"){
							  ?>
							 <option value="<?php echo $actionreq->assign_code; ?>"><?php echo $actionreq->assign_name; ?></option>
							  <?php
						  }
					  }
				  }
			  }
			  elseif(count($GLOBALS['result']['actionreq']->action_reqd_details) ==1){
				  $actionreq = $GLOBALS['result']['actionreq']->action_reqd_details;
					  if($GLOBALS['result']['override_ind'] == "Y"){
						  if($actionreq->function_code == $GLOBALS['function_code'] && $actionreq->active_ind == "Y"){
							  ?>
							  <option value="<?php echo $actionreq->assign_code; ?>"><?php echo $actionreq->assign_name; ?></option>
							  <?php
						  }
					  }
					  elseif($GLOBALS['result']['override_ind'] == "N"){
						  if($actionreq->service_code == $GLOBALS['service_code'] && $actionreq->request_code == $GLOBALS['request_code'] && trim($actionreq->function_code) == "" && $actionreq->active_ind == "Y"){
							  ?>
							 <option value="<?php echo $actionreq->assign_code; ?>"><?php echo $actionreq->assign_name; ?></option>
							  <?php
						  }
					  }
				  
			  }
              ?>
            
            </select>
            <span class="arrow"></span>
         </li>
     </ul>
    <span class="graytitle">Officer*</span>
    <ul class="pageitem">
        <li class="bigfield">
            <select class="text required" name="officer">
            <input id="new_officer_text" class="required" placeholder="Search..." /> 
              <input type="hidden" id="new_officer_code" name="officer"  class="required" />
        </li>
    </ul>
   <span class="graytitle">Due Date</span>
   <ul class="pageitem">
    <li class="bigfield">
        <input name="date" class="text" /><br>
        
    </li>
    <li class="button">
        <input type=button  value="Select Date" onClick="displayDatePicker('date');">
    </li>
    </ul>
    
    <span class="graytitle">Reason</span>
     <ul class="pageitem">
    <li class="bigfield">
        <input name="reason" class="text" />
    </li>
    </ul>
    <span class="graytitle">Notify Officer?</span>
    <ul class="pageitem">
        <li class="radiobutton"><span class="name">No</span>
        <input name="send_email" type="radio" value="N" checked /> </li>
        <li class="radiobutton"><span class="name">Yes</span>
        <input name="send_email" type="radio" value="Y" /> </li>
    </ul>
    
    
    <p>&nbsp;</p>
    <ul class="pageitem">
    </li>
        <li class="button"><input name="Submit input" type="submit" id="submit" value="Submit" /></li>
    </ul>
    <input type="hidden" name="page" value="request" />
     <input type="hidden" name="id" id="id" value="<?php echo $GLOBALS['request_id']; ?>" />
      <input type="hidden" name="action" value="AddAction" />
</form>
<script type="text/javascript">
			  	$(document).ready(function(){
					// validate signup form on keyup and submit
					$("#addaction").validate();
					$("#new_officer_text").autocomplete({

					  source: function(request, response) {
						  $.ajax({
							  url: "inc/ajax/ajax.officerList.php",
							  dataType: "json",
							  data: {
								  term: request.term,
							  },
							  success: function(data) {
								  response(data);
							  },
						  });
					  },
					  select: function(event, ui) {
						  $(this).blur();
						  $("#new_officer_text").attr("readonly", true);	
						  $("#new_officer_code").val(ui.item.index);
						  $("#clearOfficer").show();
					  },
					  delay: 0, 
					  minLength:0, 
				  });
				  
				  $("#addaction").submit(function(){
						if($(this).validate().numberOfInvalids() == 0){ $("#submit").attr("disabled", true); }
					});
				  
				  $("#new_officer_text").focus(function(){
					  if($(this).attr("readonly") == 'readonly'){
						  $(this).attr("readonly", false);
						  $(this).val("");
						  $("#new_officer_code").val("");
						  
					  }
					  $(this).autocomplete("search", "");
				  });	
				});
			  </script>