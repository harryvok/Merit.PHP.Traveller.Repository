<span class="graytitle">Actions</span>
    <div id="ActionsShow">
            <ul class="pageitem">
                <li class="button">
                    <input type="button" value="Show (<?php if(isset($GLOBALS['result']['actions']->request_actions_det->request_actions_details)) echo count($GLOBALS['result']['actions']->request_actions_det->request_actions_details); else echo 0; ?>)" class="openSection" id="Actions" />
                </li>
                <?php
		  if($_SESSION['roleSecurity']->maint_new_action == "Y"){
			  ?>
                <li class="button">
                    <input type="button" value="Add" onclick="self.location='mobile/page.add-action.php?req_id=<?php echo $GLOBALS['request_id']; ?>'" />
                </li>
                <?php
		  }
		  ?>
            </ul>
            </div>
        <div id="ActionsSection" style="display:none;">
            <ul class="pageitem">
                <?php
                if(isset($GLOBALS['result']['actions']->request_actions_det->request_actions_details) && count($GLOBALS['result']['actions']->request_actions_det->request_actions_details) > 1){
                    foreach($GLOBALS['result']['actions']->request_actions_det->request_actions_details as $result_a_ar){
                        ?>
                        <ul class="pageitem">
                            <li class="textbox">
                            
                                <span class="header">
                                    <div class="status_code">
                                    <?php 
                                    if($result_a_ar->status == "Open" || $result_a_ar->status == "Re-open"){ 
                                      echo '<div class="green-dot" title="Open"></div>';
                                  }
								  elseif($result_a_ar->status == "Suspended"){ 
                                      echo '<div class="yellow-dot" title="Suspended"></div>';
                                  } 
                                  else{ 
                                      echo '<div class="red-dot" title="Finalised"></div>';
                                  } 
                                    ?>
                                    </div>
                                    <?php echo $result_a_ar->action_id; ?> - <?php echo $result_a_ar->action_required; ?> 
                                </span>
                                <b>Date Assigned:</b> <?php if(strlen($result_a_ar->assign_time) > 0){ echo date('d/m/Y h:i A',strtotime($result_a_ar->assign_time)); } ?><br />
                                <b>Completed Date:</b> <?php if($result_a_ar->finalised_ind == "Y"){ if($result_a_ar->outcome_time != "0001-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime($result_a_ar->outcome_time)); } } ?><br />
                                <b>Action Officer:</b> <?php if(strlen($result_a_ar->action_officer) > 0){ echo $result_a_ar->action_officer; } else { echo ""; } ?>
                            </li>
                            <li class="menu">
                                <a href="index.php?page=view-action&id=<?php echo $result_a_ar->action_id; ?>&ref=<?php echo $GLOBALS['request_id']; ?>&ref=<?php echo $GLOBALS['request_id']; ?>&ref_page=view-request">
                                <span class="name">View</span>
                                <span class="comment"><?php if(strlen($result_a_ar->due_time) > 0 && $result_a_ar->due_time != "1970-01-01T00:00:00"){ echo "<b>Due: </b>".date('d/m/Y h:i A',strtotime($result_a_ar->due_time)); }  ?></span>
                                <span class="arrow"></span>
                                </a>
                            </li>
                        </ul>
                        <?php
                    }
                }
                elseif(isset($GLOBALS['result']['actions']->request_actions_det->request_actions_details) && count($GLOBALS['result']['actions']->request_actions_det->request_actions_details)== 1){
                    $result_a_ar = $GLOBALS['result']['actions']->request_actions_det->request_actions_details;
                    ?>
                    <ul class="pageitem">
                            <li class="textbox">
                                
                                <span class="header">
                                    <div class="status_code">
                                    <?php 
                                    if($result_a_ar->status == "Open" || $result_a_ar->status == "Re-open"){ 
                                      echo '<div class="green-dot" title="Open"></div>';
                                  }
								  elseif($result_a_ar->status == "Suspended"){ 
                                      echo '<div class="yellow-dot" title="Suspended"></div>';
                                  } 
                                  else{ 
                                      echo '<div class="red-dot" title="Finalised"></div>';
                                  } 
                                    ?>
                                    </div>
                                    <?php echo $result_a_ar->action_id; ?> - <?php echo $result_a_ar->action_required; ?> 
                                </span>
                                <b>Date Assigned:</b> <?php if(strlen($result_a_ar->assign_time) > 0){ echo date('d/m/Y h:i A',strtotime($result_a_ar->assign_time)); } ?><br />
                                <b>Completed Date:</b> <?php if($result_a_ar->finalised_ind == "Y"){ if($result_a_ar->outcome_time != "0001-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime($result_a_ar->outcome_time)); } } ?><br />
                                 <b>Action Officer:</b> <?php if(strlen($result_a_ar->action_officer) > 0){ echo $result_a_ar->action_officer; } else { echo ""; } ?>
                            </li>
                            <li class="menu">
                                <a href="index.php?page=view-action&id=<?php echo $result_a_ar->action_id; ?>&ref=<?php echo $GLOBALS['request_id']; ?>&ref=<?php echo $GLOBALS['request_id']; ?>&ref_page=view-request">
                                <span class="name">View</span>
                                <span class="comment"><?php if(strlen($result_a_ar->due_time) > 0 && $result_a_ar->due_time != "1970-01-01T00:00:00"){ echo "<b>Due: </b>".date('d/m/Y h:i A',strtotime($result_a_ar->due_time)); }  ?></span>
                                <span class="arrow"></span>
                                </a>
                            </li>
                        </ul>
                    <?php
                }
                ?>
                <li class="button">
                    <input type="button" value="Hide" class="closeSection" id="Actions" />
                </li>
                 <li class="button">
                    <input type="button" value="Add" onclick="self.location='mobile/page.add-action.php?req_id=<?php echo $GLOBALS['request_id']; ?>&ref=<?php echo $GLOBALS['request_id']; ?>&ref_page=view-request'" />
                </li>
            </ul>
            </div>