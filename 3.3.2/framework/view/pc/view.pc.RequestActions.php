

  <div class="view-request">
    <div class="float-left">
         
      <div class="float-left">
          <input type="hidden" name="val" id="val" value="0" />
          <div style="float:left;">
              <span class="request-column-title"  style="float:left;">
              <div style="float:left;">Actions (<?php if(isset($GLOBALS['result']['actions']->request_actions_det->request_actions_details)){echo count($GLOBALS['result']['actions']->request_actions_det->request_actions_details); } else { echo 0; } ?>)</div>
              
              </span>
          </div>
          <?php
		  if($_SESSION['roleSecurity']->maint_new_action == "Y"){
			  ?>
          <div style="float:right;" class="openPopup">
                  <a href="#addaction" onClick="addaction()" style="text-decoration:none;">
                  
                      <span style="text-decoration:none;">
                          <img src="images/page-add-icon.png" /> 
                      </span>
                      <span  class="openPopup" id="AddAction">Add Action</span>
                  
                  </a>
              </div>
              <?php
		  }
		  ?>
          <input type="hidden" name="val" id="val" value="0" />
          <div id="history" class="dropdown">
          	<input type="text" id="requestActions" class="tableSearch" placeholder="Search..." />
                  <table id="requestActionsTable" class=" sortable" title="" cellspacing="0">
                  <thead>
                  <tr>
                      <th class="job-id sortable">Action ID</th>
                      <th class="job-name sortable">Action Required</th>
                      <th class="date sortable">Officer</th>
                      <th class="date sortable">Date Assigned</th>
                      <th class="date sortable">Due Date</th>
                      <th class="date sortable">Completed Date</th>
                      <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $number=0;
                  if(isset($GLOBALS['result']['actions']->request_actions_det->request_actions_details) && count($GLOBALS['result']['actions']->request_actions_det->request_actions_details) > 1){
                      foreach($GLOBALS['result']['actions']->request_actions_det->request_actions_details as $result_a_ar){
                          $change = $result_a_ar->action_id;
                          $number = $number+1;
                          if($number == 2){
                              $class = "dark";
                              $number = 0;
                          }
                          else{
                              $class = "light";
                          }
                          ?>
                              <tr class="<?php echo $class; ?>" onClick="change('<?php echo $change; ?>')" title="">
                                  <td id="<?php echo $change; ?>"><?php if(strlen($result_a_ar->action_id) > 0){ echo $result_a_ar->action_id; } else { echo ""; } ?></td>
                                  <td class="job-name"><?php if(strlen($result_a_ar->action_required) > 0){ echo $result_a_ar->action_required; } else { echo ""; } ?></td>
                                  <td><?php if(strlen($result_a_ar->action_officer) > 0){ echo $result_a_ar->action_officer; } else { echo ""; } ?></td>
                                  <td><?php if(strlen($result_a_ar->assign_time) > 0){ echo date('d/m/Y h:i A',strtotime($result_a_ar->assign_time)); } ?></td>
                                  <td><?php if(strlen($result_a_ar->due_time) > 0 && $result_a_ar->due_time != "1970-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime($result_a_ar->due_time)); }  ?></td>
                                  <td><?php if($result_a_ar->finalised_ind == "Y"){ if($result_a_ar->outcome_time != "0001-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime($result_a_ar->outcome_time)); } } ?></td>
                                  <td><?php 
                                  if($result_a_ar->status == "Open" || $result_a_ar->status == "Re-open"){ 
                                      echo '<div class="green-dot" title="Open"></div>';
                                  }
								  elseif($result_a_ar->status == "Suspended"){ 
                                      echo '<div class="yellow-dot" title="Suspended"></div>';
                                  } 
                                  else{ 
                                      echo '<div class="red-dot" title="Finalised"></div>';
                                  } 
                                  ?></td>
                              </tr>
                              <?php
                      }
                  }
                  if(isset($GLOBALS['result']['actions']->request_actions_det->request_actions_details) && count($GLOBALS['result']['actions']->request_actions_det->request_actions_details) == 1){
                      $change = $GLOBALS['result']['actions']->request_actions_det->request_actions_details->action_id;
                      ?>
                          <tr class="dark" onClick="change('<?php echo $change; ?>')" title="">
                              <td id="<?php echo $change; ?>"><?php if(strlen($GLOBALS['result']['actions']->request_actions_det->request_actions_details->action_id) > 0){ echo $GLOBALS['result']['actions']->request_actions_det->request_actions_details->action_id; } else { echo ""; } ?></td>
                              <td class="job-name"><?php if(strlen($GLOBALS['result']['actions']->request_actions_det->request_actions_details->action_required) > 0){ echo $GLOBALS['result']['actions']->request_actions_det->request_actions_details->action_required; } else { echo ""; } ?></td>
                              <td><?php if(strlen($GLOBALS['result']['actions']->request_actions_det->request_actions_details->action_officer) > 0){ echo $GLOBALS['result']['actions']->request_actions_det->request_actions_details->action_officer; } else { echo ""; } ?></td>
                              <td><?php if(strlen($GLOBALS['result']['actions']->request_actions_det->request_actions_details->assign_time) > 0){ echo date('d/m/Y h:i A',strtotime($GLOBALS['result']['actions']->request_actions_det->request_actions_details->assign_time)); } ?></td>
                              <td><?php if(strlen($GLOBALS['result']['actions']->request_actions_det->request_actions_details->due_time) > 0 && $GLOBALS['result']['actions']->request_actions_det->request_actions_details->due_time != "1970-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime($GLOBALS['result']['actions']->request_actions_det->request_actions_details->due_time)); }  ?></td>
                              <td><?php if($GLOBALS['result']['actions']->request_actions_det->request_actions_details->finalised_ind == "Y"){ if($GLOBALS['result']['actions']->request_actions_det->request_actions_details->outcome_time != "0001-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime($GLOBALS['result']['actions']->request_actions_det->request_actions_details->outcome_time)); } } ?></td>
                              <td><?php 
							  		$result_a_ar = $GLOBALS['result']['actions']->request_actions_det->request_actions_details;
								  if($result_a_ar->status == "Open" || $result_a_ar->status == "Re-open"){ 
                                      echo '<div class="green-dot" title="Open"></div>';
                                  }
								  elseif($result_a_ar->status == "Suspended"){ 
                                      echo '<div class="yellow-dot" title="Suspended"></div>';
                                  } 
                                  else{ 
                                      echo '<div class="red-dot" title="Finalised"></div>';
                                  } 
                                  ?></td>
                          </tr>
                          <?php
                  }
                  ?>
                  </tbody>
                  </table>
          </div>

          <p>&nbsp;</p>
          <div class="popupDetail" id="AddActionPopup">
          

              <div class="popupTitle">
              <div style="float:left;"><h4>Add Action</h4></div>
          
              <div id="closeNames" class="closePopup">
                  <img src="images/close.png" /> Close
              </div> 
              </div>
              <div style="float:left;width:100%;overflow-y:scroll; height:90%;">
              <a title="addaction"></a>
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
              <form method="post"  enctype="multipart/form-data" id="addaction"  action="process.php">
              <label  for="required">Required Action<span style="color:red;">*</span></label>
              <select class="text-popup required" name="required">
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
              <label  for="officer">Officer<span style="color:red;">*</span></label>
              <input id="new_officer_text" placeholder="Search..." /> 
              <input type="hidden" id="new_officer_code" name="officer"  class="required" />
              <label  for="date">Due Date</label>
              <input name="date" type="text"  />
              <label  for="reason">Reason</label>
              <input name="reason"  />
              <label  for="send_email">Notify Officer?<span style="color:red;">*</span></label>
              <input name="send_email" type="radio" value="Y" /> <b>Yes</b>  <br />
              <input name="send_email" type="radio" value="N" checked />  <b>No</b> 
              <p>&nbsp;</p>
              <input id="submit" class="button left" type='submit' value='Add Action' />
              <input type="hidden" name="page" value="request" />
                <input type="hidden" name="id" id="id" value="<?php echo $GLOBALS['request_id']; ?>" />
                <input type="hidden" name="action" value="AddAction" />
             </form>
             </div>
             </div>

           </div>
          </div>
      </div>