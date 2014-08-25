<h2>Actions</h2>
<?php if($_SESSION['roleSecurity']->maint_new_action == "Y" && $GLOBALS['finalised_ind'] != "Y"){ ?><a  href="index.php?page=view-request&id=<?php echo $GLOBALS['id']; ?>&d=add-action" data-role="button">Add</a><br /><?php }?>
    	<ul class="no-ellipses" data-role="listview" data-filter="true" data-filter-placeholder="Search actions..." data-inset="true">
                <?php
                if(isset($GLOBALS['result']['actions']->request_actions_det->request_actions_details) && count($GLOBALS['result']['actions']->request_actions_det->request_actions_details) > 1){
                    foreach($GLOBALS['result']['actions']->request_actions_det->request_actions_details as $result_a_ar){
                        ?>
                            <li class="textbox">
                            	<a href="index.php?page=view-action&id=<?php echo $result_a_ar->action_id; ?>&ref=<?php echo $GLOBALS['request_id']; ?>&ref=<?php echo $GLOBALS['request_id']; ?>&ref_page=view-request">
                                
                                <p><div class="status_code">
                                <?php 
                                if($result_a_ar->status_code == "OPEN" || $result_a_ar->status_code == "REPOEN"){ 
                                  echo '<div class="dotGreen" title="Open"></div>';
                              }
                              elseif($result_a_ar->status_code == "SUSPENDED"){ 
                                  echo '<div class="dotYellow" title="Suspended"></div>';
                              } 
                              else{ 
                                  echo '<div class="dotRed" title="Finalised"></div>';
                              } 
                                ?>
                                </div>
                                <?php echo $result_a_ar->action_id; ?> - <?php echo $result_a_ar->action_required; ?> </p>
                            
                               <p><b>Date Assigned:</b> <?php if(strlen($result_a_ar->assign_time) > 0){ echo date('d/m/Y h:i A',strtotime($result_a_ar->assign_time)); } ?></p>
                                <p><b>Completed Date:</b> <?php if($result_a_ar->finalised_ind == "Y"){ if($result_a_ar->outcome_time != "0001-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime($result_a_ar->outcome_time)); } } ?></p>
                                <p><b>Action Officer:</b> <?php if(strlen($result_a_ar->action_officer) > 0){ echo $result_a_ar->action_officer; } else { echo ""; } ?></p>
                            
                                </a>
                            </li>
                        <?php
                    }
                }
                elseif(isset($GLOBALS['result']['actions']->request_actions_det->request_actions_details) && count($GLOBALS['result']['actions']->request_actions_det->request_actions_details)== 1){
                    $result_a_ar = $GLOBALS['result']['actions']->request_actions_det->request_actions_details;
                    ?>
                    <li class="textbox">
                        <a href="index.php?page=view-action&id=<?php echo $result_a_ar->action_id; ?>&ref=<?php echo $GLOBALS['request_id']; ?>&ref=<?php echo $GLOBALS['request_id']; ?>&ref_page=view-request">
                        
                        <p><div class="status_code">
                        <?php 
                        if($result_a_ar->status_code == "OPEN" || $result_a_ar->status_code == "REOPEN"){ 
                          echo '<div class="dotGreen" title="Open"></div>';
                      }
                      elseif($result_a_ar->status_code == "SUSPENDED"){ 
                          echo '<div class="dotYellow" title="Suspended"></div>';
                      } 
                      else{ 
                          echo '<div class="dotRed" title="Finalised"></div>';
                      } 
                        ?>
                        </div>
                        <?php echo $result_a_ar->action_id; ?> - <?php echo $result_a_ar->action_required; ?> </p>
                    
                       <p><b>Date Assigned:</b> <?php if(strlen($result_a_ar->assign_time) > 0){ echo date('d/m/Y h:i A',strtotime($result_a_ar->assign_time)); } ?></p>
                        <p><b>Completed Date:</b> <?php if($result_a_ar->finalised_ind == "Y"){ if($result_a_ar->outcome_time != "0001-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime($result_a_ar->outcome_time)); } } ?></p>
                        <p><b>Action Officer:</b> <?php if(strlen($result_a_ar->action_officer) > 0){ echo $result_a_ar->action_officer; } else { echo ""; } ?></p>
                    
                        </a>
                    </li>
				<?php
				}
				?>
            </ul>
 
