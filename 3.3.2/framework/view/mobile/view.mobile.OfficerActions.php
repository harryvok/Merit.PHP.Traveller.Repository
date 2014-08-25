<span class="graytitle">Actions</span>
<div id="ActionsShow">
        <ul class="pageitem">
            <li class="button">
            <?php $result_ac = $GLOBALS['result']->action_det; ?>
                <input type="button" value="Show (<?php if(isset($result_ac->action_details)) echo count($result_ac->action_details); else echo 0; ?>)" class="openSection" id="Actions" />
            </li>
        </ul>
        </div>
    <div id="ActionsSection" style="display:none;">
        <ul class="pageitem">
            <?php
            
            if(isset($result_ac->action_details) && count($result_ac->action_details) > 1){
                foreach($result_ac->action_details as $result_ar){
                    ?>
                    <ul class="pageitem">
                            <li class="textbox">
                            
                                <span class="header">
                                    <div class="status_code">
                                    <?php 
                                    if($result_ar->finalised_ind == "N"){ 
                                        echo '<img width="10" height="9" src="images/green-dot.png" />';
                                    }
                                    elseif($result_ar->finalised_ind == "Y"){ 
                                        echo '<img width="10" height="9" src="images/red-dot.png" />';
                                    } 
                                    ?>
                                    </div>
                                    <?php echo $result_ar->action_id; ?> - <?php echo $result_ar->reason_assigned_name; ?> 
                                </span>
                                <b>Date Assigned:</b> <?php if(strlen($result_ar->assign_datetime) > 0){ echo date('d/m/Y h:i A',strtotime($result_ar->assign_datetime)); } ?><br />
                                <b>Completed Date:</b> <?php if($result_ar->finalised_ind == "Y"){ if($result_ar->outcome_datetime != "0001-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime($result_ar->outcome_datetime)); } } ?><br />
                            </li>
                            <li class="menu">
                                <a href="index.php?page=view-action&id=<?php echo $result_ar->action_id; ?>&ref=<?php echo $_GET['id']; ?>&ref_page=view-officer">
                                <span class="name">View</span>
                                <span class="comment"><?php if(strlen($result_ar->due_datetime) > 0 && $result_ar->due_datetime != "1970-01-01T00:00:00"){ echo "<b>Due: </b>".date('d/m/Y h:i A',strtotime($result_ar->due_datetime)); }  ?></span>
                                <span class="arrow"></span>
                                </a>
                            </li>
                        </ul>
                    <?php
                }
            }
            elseif(isset($result_ac->action_details) && count($result_ac->action_details) == 1){
                $result_ar = $result_ac->action_details;
                ?>
               <ul class="pageitem">
                            <li class="textbox">
                            
                                <span class="header">
                                    <div class="status_code">
                                    <?php 
                                    if($result_ar->finalised_ind == "N"){ 
                                        echo '<img width="10" height="9" src="images/green-dot.png" />';
                                    }
                                    elseif($result_ar->finalised_ind == "Y"){ 
                                        echo '<img width="10" height="9" src="images/red-dot.png" />';
                                    } 
                                    ?>
                                    </div>
                                    <?php echo $result_ar->action_id; ?> - <?php echo $result_ar->reason_assigned_name; ?> 
                                </span>
                                <b>Date Assigned:</b> <?php if(strlen($result_ar->assign_datetime) > 0){ echo date('d/m/Y h:i A',strtotime($result_ar->assign_datetime)); } ?><br />
                                <b>Completed Date:</b> <?php if($result_ar->finalised_ind == "Y"){ if($result_ar->outcome_datetime != "0001-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime($result_ar->outcome_datetime)); } } ?><br />
                            </li>
                            <li class="menu">
                                <a href="index.php?page=view-action&id=<?php echo $result_ar->action_id; ?>&ref=<?php echo $GLOBALS['request_id']; ?>&ref=<?php echo $GLOBALS['request_id']; ?>&ref_page=view-request">
                                <span class="name">View</span>
                                <span class="comment"><?php if(strlen($result_ar->due_datetime) > 0 && $result_ar->due_datetime != "1970-01-01T00:00:00"){ echo "<b>Due: </b>".date('d/m/Y h:i A',strtotime($result_ar->due_datetime)); }  ?></span>
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
        </ul>
        </div>