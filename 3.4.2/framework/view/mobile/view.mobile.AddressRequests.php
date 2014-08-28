<?php $result = $GLOBALS['result']->req_dets; ?>
<?php
if(isset($result->request_details) && count($result->request_details) > 1){
  $added_addresses_count = array();
  $count=0;
  foreach($result->request_details as $result_a_ar){
	  if(in_array($result_a_ar->request_id, $added_addresses_count) == false){
		  $count=$count+1;
		  array_push($added_addresses_count, $result_a_ar->request_id);
	  }
  }
}
elseif(isset($result->request_details) && count($result->request_details) == 1){
  $count = 1;
}
else{
  $count=0;	
}
?>

    <ul class="no-ellipses" data-role="listview" data-count-theme="b" data-inset="true" data-filter="true" data-filter-placeholder="Search requests...">
            <?php
            if(isset($result->request_details) && count($result->request_details) > 1){
                $added_addresses_count = array();
                $count=0;
                foreach($result->request_details as $result_a_ar){
                    if(in_array($result_a_ar->request_id, $added_addresses_count) == false){
                        $count=$count+1;
                        array_push($added_addresses_count, $result_a_ar->request_id);
                        ?>
                            <li>
                            	<a href="index.php?page=view-request&id=<?php echo $result_a_ar->request_id; ?>&ref=<?php echo $_GET['id']; ?>&ref_page=view-address">
                                <p>
                                
                                    <div class="status_code">
                                    <?php 
                                        if($result_a_ar->status_code == "OPEN"){ 
                                            echo '<img width="10" height="9" src="images/dotGreen.png" />';
                                        }
                                        elseif($result_a_ar->status_code == "SUSPENDED"){ 
                                            echo '<img width="10" height="9" src="images/dotYellow.png" />';
                                        } 
										else{
											echo '<img width="10" height="9" src="images/dotRed.png" />';
										}
                                        ?>
                                    </div>
                                    <?php 
                                    echo $result_a_ar->service_name . " - " .
                                    $result_a_ar->request_name . " - " . 
                                    $result_a_ar->function_name;
                                    ?>
                                </p>
                                
                                <p><b>Request ID:</b> <?php echo $result_a_ar->request_id; ?></p>
                                <p><b>Received Date:</b> <?php if(strlen($result_a_ar->request_datetime) > 0){ echo date('d/m/Y',strtotime($result_a_ar->request_datetime)); } ?></p>
                                 <p><b>Completed Date:</b> <?php if($result_a_ar->finalised_ind == "Y"){ if(strlen($result_a_ar->status_datetime) > 0 && $result_a_ar->status_datetime != "1900-01-01T00:00:00" && $result_a_ar->status != "Open"){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T", " ", $result_a_ar->status_datetime))); }} ?></p>
                            
                                </a>
                            </li>
                        
                        <?php
                    }
                }
            }
            elseif(isset($result->request_details) && count($result->request_details) == 1){
                $result_a_ar = $result->request_details;
                ?>
               <li>
                    <a href="index.php?page=view-request&id=<?php echo $result_a_ar->request_id; ?>&ref=<?php echo $_GET['id']; ?>&ref_page=view-address">
                    <p>
                    
                        <div class="status_code">
                        <?php 
                            if($result_a_ar->status_code == "OPEN"){ 
                                echo '<img width="10" height="9" src="images/dotGreen.png" />';
                            }
                            elseif($result_a_ar->status_code == "SUSPENDED"){ 
                                echo '<img width="10" height="9" src="images/dotYellow.png" />';
                            } 
                            else{
                                echo '<img width="10" height="9" src="images/dotRed.png" />';
                            }
                            ?>
                        </div>
                        <?php 
                        echo $result_a_ar->service_name . " - " .
                        $result_a_ar->request_name . " - " . 
                        $result_a_ar->function_name;
                        ?>
                    </p>
                    
                    <p><b>Request ID:</b> <?php echo $result_a_ar->request_id; ?></p>
                    <p><b>Received Date:</b> <?php if(strlen($result_a_ar->request_datetime) > 0){ echo date('d/m/Y',strtotime($result_a_ar->request_datetime)); } ?></p>
                    <p><b>Completed Date:</b> <?php if($result_a_ar->finalised_ind == "Y"){ if(strlen($result_a_ar->status_datetime) > 0 && $result_a_ar->status_datetime != "1900-01-01T00:00:00" && $result_a_ar->status != "Open"){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T", " ", $result_a_ar->status_datetime))); }} ?></p>
                
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>