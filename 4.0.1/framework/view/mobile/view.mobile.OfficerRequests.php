<?php $result_re = $GLOBALS['result']->request_det; ?>
    <ul class="no-ellipses" data-role="listview" data-count-theme="b" data-inset="true" data-filter="true" data-filter-placeholder="Search requests...">
            <?php
            if(isset($result_re->request_details) && count($result_re->request_details) > 1){
                foreach($result_re->request_details as $result_arr){
                    ?>
                    
                    <li class="textbox">
                         <a href="index.php?page=view-request&id=<?php echo $result_arr->request_id; ?>&ref=<?php echo $_GET['id']; ?>&ref_page=view-officer">
                        <p>
                        <?php 
                                    if($result_arr->finalised_ind == "N"){ 
                                        echo '<img width="10" height="9" src="images/dotGreen.png" />';
                                    }
                                    elseif($result_arr->finalised_ind == "Y"){ 
                                        echo '<img width="10" height="9" src="images/dotRed.png" />';
                                    } 
                                    ?>
                            <?php 
                            echo $result_arr->service_name . " - " .
                            $result_arr->request_name . " - " . 
                            $result_arr->function_name;
                            ?>
                        </p>
                        
                         <p><b>Request ID:</b> <?php echo $result_arr->request_id; ?></p>
                         <p><b>Date Input:</b> <?php if(strlen($result_arr->request_datetime) > 0){ echo date('d/m/Y',strtotime($result_arr->request_datetime)); } ?></p>
                        <p> <b>Completed Date:</b> <?php if(strlen($result_arr->status_datetime) > 0 && $result_arr->status_datetime != "1900-01-01T00:00:00" && $result_arr->status != "Open"){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T", " ", $result_arr->status_datetime))); } ?></p>
                   
                       
                            
                        </a>
                    </li>
                    
                    <?php
                }
            }
            elseif(isset($result_re->request_details) && count($result_re->request_details) == 1){
                $result_arr = $result_re->request_details;
                ?>
                 <li class="textbox">
                         <a href="index.php?page=view-request&id=<?php echo $result_arr->request_id; ?>&ref=<?php echo $_GET['id']; ?>&ref_page=view-officer">
                        <p>
                        <?php 
                                    if($result_arr->finalised_ind == "N"){ 
                                        echo '<img width="10" height="9" src="images/dotGreen.png" />';
                                    }
                                    elseif($result_arr->finalised_ind == "Y"){ 
                                        echo '<img width="10" height="9" src="images/dotRed.png" />';
                                    } 
                                    ?>
                            <?php 
                            echo $result_arr->service_name . " - " .
                            $result_arr->request_name . " - " . 
                            $result_arr->function_name;
                            ?>
                        </p>
                        
                         <p><b>Request ID:</b> <?php echo $result_arr->request_id; ?></p>
                         <p><b>Date Input:</b> <?php if(strlen($result_arr->request_datetime) > 0){ echo date('d/m/Y',strtotime($result_arr->request_datetime)); } ?></p>
                        <p> <b>Completed Date:</b> <?php if(strlen($result_arr->status_datetime) > 0 && $result_arr->status_datetime != "1900-01-01T00:00:00" && $result_arr->status != "Open"){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T", " ", $result_arr->status_datetime))); } ?></p>
                   
                       
                            
                        </a>
                    </li>

                <?php
            }
            ?>
           
        </ul>