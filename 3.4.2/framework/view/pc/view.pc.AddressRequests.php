<div class="margin-right">
  <div class="summaryContainer">
   <div class="margin-right">
   <div class="float-left">
          <div style="float:left;">
              <span class="summaryColumnTitle"  style="float:left;">
              <?php
              if(isset($GLOBALS['result']->req_dets->request_details) && count($GLOBALS['result']->req_dets->request_details) > 1){
                  $added_addresses_count = array();
                  $count=0;
                  foreach($GLOBALS['result']->req_dets->request_details as $result_a_ar){
                      if(in_array($result_a_ar->request_id, $added_addresses_count) == false){
                          $count=$count+1;
                          array_push($added_addresses_count, $result_a_ar->request_id);
                      }
                  }
              }
              elseif(isset($GLOBALS['result']->req_dets->request_details) && count($GLOBALS['result']->req_dets->request_details) == 1){
                  $count = 1;
              }
              else{
                  $count=0;	
              }
              ?>
              <div style="float:left;">Requests (<?php echo $count; ?>)</div>
              
              </span>
          </div>
          <input type="hidden" name="val" id="val" value="0" />
          <div id="history" class="dropdown">
          	<input type="text" id="addressRequests" class="tableSearch" placeholder="Search..." />
                  <table id="addressRequestsTable" class=" sortable" title="" cellspacing="0">
                  <thead>
                  <tr>
                      <th class="job-id sortable">Request ID</th>
                      <th class="description sortable">Issue</th>
                      <th class="date sortable">Received Date</th>
                      <th class="date sortable">Completed Date</th>
                      <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $number=0;
                  
                  if(isset($GLOBALS['result']->req_dets->request_details) && count($GLOBALS['result']->req_dets->request_details) > 1){
                      $added_addresses = array();
                      foreach($GLOBALS['result']->req_dets->request_details as $result_a_ar){
                          if(in_array($result_a_ar->request_id, $added_addresses) == false){
                              array_push($added_addresses, $result_a_ar->request_id);
                              $change = $result_a_ar->request_id;
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
                                  <td id="<?php echo $change; ?>"><?php if(strlen($result_a_ar->request_id) > 0){ echo $result_a_ar->request_id; } else { echo ""; } ?></td>
                                  <td><?php if(strlen($result_a_ar->service_name) > 0){ echo $result_a_ar->service_name; } else { echo ""; } ?><?php if(strlen($result_a_ar->request_name) > 0){ echo " / ".$result_a_ar->request_name; } else { echo ""; } ?><?php if(strlen($result_a_ar->function_name) > 0){ echo " / ".$result_a_ar->function_name; } else { echo ""; } ?></td>
                                  <td><?php if(isset($result_a_ar->request_datetime) && strlen($result_a_ar->request_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T", " ", $result_a_ar->request_datetime))); } else { echo "N"; } ?></td>
                                  <td><?php if(isset($result_a_ar->status_datetime) && strlen($result_a_ar->status_datetime) > 0 && $result_a_ar->status_datetime != "1900-01-01T00:00:00" && $result_a_ar->finalised_ind == "Y"){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T", " ", $result_a_ar->status_datetime))); } ?></td>
                              <td><?php 
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
                              </td>
                              </tr>
                              <?php
                          }
                      }
                  }
                  elseif(isset($GLOBALS['result']->req_dets->request_details) && count($GLOBALS['result']->req_dets->request_details) == 1){
                      $change = $GLOBALS['result']->req_dets->request_details->request_id;
                      ?>
                          <tr class="dark" onClick="change('<?php echo $change; ?>')" title="">
                              <td id="<?php echo $change; ?>"><?php if(strlen($GLOBALS['result']->req_dets->request_details->request_id) > 0){ echo $GLOBALS['result']->req_dets->request_details->request_id; } else { echo ""; } ?></td>
                              <td><?php if(strlen($GLOBALS['result']->req_dets->request_details->service_name) > 0){ echo $GLOBALS['result']->req_dets->request_details->service_name; } else { echo ""; } ?><?php if(strlen($GLOBALS['result']->req_dets->request_details->request_name) > 0){ echo " / ".$GLOBALS['result']->req_dets->request_details->request_name; } else { echo ""; } ?><?php if(strlen($GLOBALS['result']->req_dets->request_details->function_name) > 0){ echo " / ".$GLOBALS['result']->req_dets->request_details->function_name; } else { echo ""; } ?></td>
                              <td><?php if(isset($GLOBALS['result']->req_dets->request_details->request_datetime) && strlen($GLOBALS['result']->req_dets->request_details->request_datetime) > 0){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T", " ", $GLOBALS['result']->req_dets->request_details->request_datetime))); } else { echo "N"; } ?></td>
                                  <td><?php if(isset($GLOBALS['result']->req_dets->request_details->status_datetime) && strlen($GLOBALS['result']->req_dets->request_details->status_datetime) > 0 && $GLOBALS['result']->req_dets->request_details->status_datetime != "1900-01-01T00:00:00" && $GLOBALS['result']->req_dets->request_details->finalised_ind == "Y"){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T", " ", $GLOBALS['result']->req_dets->request_details->status_datetime))); } ?></td>
                              <td><?php 
                      if($GLOBALS['result']->req_dets->request_details->status_code == "OPEN"){ 
                          echo '<img width="10" height="9" src="images/dotGreen.png" />';
                      }
                      elseif($GLOBALS['result']->req_dets->request_details->status_code == "SUSPENDED"){ 
                          echo '<img width="10" height="9" src="images/dotYellow.png" />';
                      } 
                      else{
                          echo '<img width="10" height="9" src="images/dotRed.png" />';
                      }
                                  ?>  
                      </td>
                          </tr>
                          <?php
                  }
                  ?>
                  </tbody>
                  </table>
          </div>
      </div>
   </div>