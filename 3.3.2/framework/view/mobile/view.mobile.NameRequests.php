<?php
if(isset($GLOBALS['result']->request_details) && count($GLOBALS['result']->request_details) > 1){
	$added_addresses_count = array();
	$count=0;
	foreach($GLOBALS['result']->request_details as $result_a_ar){
		if(in_array($result_a_ar->request_id, $added_addresses_count) == false){
			$count=$count+1;
			array_push($added_addresses_count, $result_a_ar->request_id);
		}
	}
}
elseif(isset($GLOBALS['result']->request_details) && count($GLOBALS['result']->request_details) == 1){
	$count = 1;
}
else{
	$count=0;	
}
?>
<span class="graytitle">Requests</span>
  <div id="RequestsShow">
          <ul class="pageitem">
              <li class="button">
                  <input type="button" value="Show (<?php echo $count; ?>)" class="openSection" id="Requests" />
              </li>
          </ul>
          </div>
      <div id="RequestsSection" style="display:none;">
      <ul class="pageitem">
            <li class="bigfield">
        	    <input type="text" placeholder="Search..." id="searchText" />
            </li>
        </ul>
          <ul class="pageitem">
              
              <?php
              if(isset($GLOBALS['result']->request_details) && count($GLOBALS['result']->request_details) > 1){
                  $i=0;
                  foreach($GLOBALS['result']->request_details as $result_a_ar){
                     
                      ?>
                      <ul class="pageitem searchObject" id="searchObject<?php echo $i; ?>">
                          <li class="textbox">
                              <span class="header">
                                  <div class="status_code">
                                  <?php 
                                  if($result_a_ar->status == "Open"){ 
                                            echo '<img width="10" height="9" src="images/green-dot.png" />';
                                        }
                                        elseif($result_a_ar->status == "Suspended"){ 
                                            echo '<img width="10" height="9" src="images/yellow-dot.png" />';
                                        } 
										else{
											echo '<img width="10" height="9" src="images/red-dot.png" />';
										}
                                  ?>
                                  </div>
                                  <?php 
                                  echo $result_a_ar->service_name . " - " .
                                  $result_a_ar->request_name . " - " . 
                                  $result_a_ar->function_name;
                                  ?>
                              </span>
                              <br />
                              <b>Request ID:</b> <?php echo $result_a_ar->request_id; ?><br />
                              <b>Date Input:</b> <?php if(strlen($result_a_ar->request_datetime) > 0){ echo date('d/m/Y',strtotime($result_a_ar->request_datetime)); } ?><br />
                              <b>Completed Date:</b> <?php if(strlen($result_a_ar->status_datetime) > 0 && $result_a_ar->status_datetime != "1900-01-01T00:00:00" && $result_a_ar->finalised_ind == "Y"){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T", " ", $result_a_ar->status_datetime))); } ?>
                          </li>
                          <li class="menu">
                              <a href="index.php?page=view-request&id=<?php echo $result_a_ar->request_id; ?>&ref=<?php echo $_GET['id']; ?>&ref_page=view-name">
                                  <span class="name">View</span>
                                  <span class="comment"></span>
                                  <span class="arrow"></span>
                              </a>
                          </li>
                      </ul>
                      <?php
                      $i = $i+1;
                  }
              }
              elseif(isset($GLOBALS['result']->request_details) && count($GLOBALS['result']->request_details) == 1){
                  $result_a_ar = $GLOBALS['result']->request_details;
                  ?>
                  <ul class="pageitem">
                      <li class="textbox">
                          <span class="header">
                              <div class="status_code">
                              <?php 
                                  if($result_a_ar->status == "Open"){ 
                                            echo '<img width="10" height="9" src="images/green-dot.png" />';
                                        }
                                        elseif($result_a_ar->status == "Suspended"){ 
                                            echo '<img width="10" height="9" src="images/yellow-dot.png" />';
                                        } 
										else{
											echo '<img width="10" height="9" src="images/red-dot.png" />';
										}
                                  ?>
                              </div>
                              <?php 
                              echo $result_a_ar->service_name . " - " .
                              $result_a_ar->request_name . " - " . 
                              $result_a_ar->function_name;
                              ?>
                          </span>
                          <br />
                          <b>Request ID:</b> <?php echo $result_a_ar->request_id; ?><br />
                          <b>Date Input:</b> <?php if(strlen($result_a_ar->request_datetime) > 0){ echo date('d/m/Y',strtotime($result_a_ar->request_datetime)); } ?><br />
                          <b>Completed Date:</b> <?php if(strlen($result_a_ar->status_datetime) > 0 && $result_a_ar->status_datetime != "1900-01-01T00:00:00" && $result_a_ar->finalised_ind == "Y"){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T", " ", $result_a_ar->status_datetime))); } ?>
                      </li>
                      <li class="menu">
                          <a href="index.php?page=view-request&id=<?php echo $result_a_ar->request_id; ?>&ref=<?php echo $name_id; ?>&ref_page=view-name">
                              <span class="name">View</span>
                              <span class="comment"></span>
                              <span class="arrow"></span>
                          </a>
                      </li>
                  </ul>
                  <?php
              }
              ?>
              <li class="button">
                  <input type="button" value="Hide" class="closeSection" id="Requests" />
              </li>
          </ul>
          </div>