<?php $result_ac = $GLOBALS['result']->action_det; ?>


    <ul class="no-ellipses" data-role="listview" data-count-theme="b" data-inset="true"data-filter="true" data-filter-placeholder="Search actions...">
                 <li data-role="list-divider">Actions</li>
            <?php
            if(isset($result_ac->action_details) && count($result_ac->action_details) > 1){
                foreach($result_ac->action_details as $result_ar){
                    ?>

                    <li class="textbox">
                         <a href="index.php?page=view-action&id=<?php echo $result_ar->action_id; ?>&ref=<?php echo $_GET['id']; ?>&ref_page=view-officer">
                            <p>
                                <?php 
                                if($result_ar->finalised_ind == "N"){ 
                                    echo '<img width="10" height="9" src="images/dotGreen.png" />';
                                }
                                elseif($result_ar->finalised_ind == "Y"){ 
                                    echo '<img width="10" height="9" src="images/dotRed.png" />';
                                } 
                                ?>
                                <?php echo $result_ar->request_id; ?>- <b>
                                <?php
                                      echo $result_ar->service_name . " - " .
                                           $result_ar->request_name . " - " . 
                                           $result_ar->function_name;
                                ?></b>
                             </p>
                             <p><b>Action Required: </b><?php echo $result_ar->reason_assigned_name ?></p>
                             <p><b>Date Assigned: </b><?php if(strlen($result_ar->assign_datetime) > 0){ echo date('d/m/Y h:i A',strtotime($result_ar->assign_datetime)); } ?></p>
                             <p><b>Due Date: </b><?php if(strlen($result_ar->due_datetime) > 0 && $result_rr->due_datetime != "1970-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $result_ar->due_datetime))); }?></p>
                            </a>
                        </li>
                    <?php
                }
            }
            elseif(isset($result_ac->action_details) && count($result_ac->action_details) == 1){
                $result_ar = $result_ac->action_details;
                ?>
                <li>
                   <a href="index.php?page=view-action&id=<?php echo $result_ar->action_id; ?>&ref=<?php echo $_GET['id']; ?>&ref_page=view-officer">
                      <p>
                          <div class="status_code">
                          <?php 
                          if($result_ar->finalised_ind == "N"){ 
                              echo '<img width="10" height="9" src="images/dotGreen.png" />';
                          }
                          elseif($result_ar->finalised_ind == "Y"){ 
                              echo '<img width="10" height="9" src="images/dotRed.png" />';
                          } 
                          ?>
                          </div>
                          <?php echo $result_ar->action_id; ?>- <?php echo $result_ar->reason_assigned_name; ?>
                      </p>
                      <p> <b>Date Assigned:</b> <?php if(strlen($result_ar->assign_datetime) > 0){ echo date('d/m/Y h:i A',strtotime($result_ar->assign_datetime)); } ?></p>
                       <p><b>Completed Date:</b> <?php if($result_ar->finalised_ind == "Y"){ if($result_ar->status_code != "OPEN"){ echo date('d/m/Y h:i A',strtotime($result_ar->outcome_datetime)); } } ?></p>

                      </a>
                  </li>
                <?php
            }
            ?>
            
        </ul>