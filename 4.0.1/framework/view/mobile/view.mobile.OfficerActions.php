<?php $result_ac = $GLOBALS['result']->action_det; ?>

    <ul class="no-ellipses" data-role="listview" data-count-theme="b" data-inset="true"data-filter="true" data-filter-placeholder="Search actions...">
            <?php
            
            if(isset($result_ac->action_details) && count($result_ac->action_details) > 1){
                foreach($result_ac->action_details as $result_ar){
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
                                <?php echo $result_ar->action_id; ?> - <?php echo $result_ar->reason_assigned_name; ?> 
                            </p>
                            <p> <b>Date Assigned:</b> <?php if(strlen($result_ar->assign_datetime) > 0){ echo date('d/m/Y h:i A',strtotime($result_ar->assign_datetime)); } ?></p>
                             <p><b>Completed Date:</b> <?php if($result_ar->finalised_ind == "Y"){ if($result_ar->status_code != "OPEN"){ echo date('d/m/Y h:i A',strtotime($result_ar->outcome_datetime)); } } ?></p>

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
                          <?php echo $result_ar->action_id; ?> - <?php echo $result_ar->reason_assigned_name; ?> 
                      </p>
                      <p> <b>Date Assigned:</b> <?php if(strlen($result_ar->assign_datetime) > 0){ echo date('d/m/Y h:i A',strtotime($result_ar->assign_datetime)); } ?></p>
                       <p><b>Completed Date:</b> <?php if($result_ar->finalised_ind == "Y"){ if($result_ar->status_code != "OPEN"){ echo date('d/m/Y h:i A',strtotime($result_ar->outcome_datetime)); } } ?></p>

                      </a>
                  </li>
                <?php
            }
            ?>
            
        </ul>