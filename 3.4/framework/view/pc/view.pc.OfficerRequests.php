
      <div class="summaryContainer">
           <div class="float-left">
              <div style="float:left;">
                  <?php $result_re = $GLOBALS['result']->request_det; ?>
                  <span class="summaryColumnTitle"  style="float:left;">
                  <div style="float:left;">Requests (<?php if(isset($result_re->request_details)) echo count($result_re->request_details); else { echo 0; } ?>)</div>
                  
                  </span>
              </div>
              <input type="hidden" name="val-c" id="val-c" value="0" />
              <div id="comments" class="dropdown">
              	<input type="text" id="officerRequests" class="tableSearch" placeholder="Search..." />
                      <table id="officerRequestsTable" class=" sortable" title="" cellspacing="0">
                      <thead>
                      <tr>
                          <th class="job-id sortable">Request ID</th>
                          <th class="description sortable">Issue</th>
                          <th class="date sortable">Date Input</th>
                          <th>Status</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                      $number=0;
                      
                      if(isset($result_re->request_details) && count($result_re->request_details) > 1){
                          foreach($result_re->request_details as $result_arr){
                              $change = $result_arr->request_id;
                              $number = $number+1;
                              if($number == 2){
                                  $class = "dark";
                                  $number = 0;
                              }
                              else{
                                  $class = "light";
                              }
                              ?>
                                  <tr class="<?php echo $class; ?>" onClick="change_req('<?php echo $change; ?>')" title="">
                                      <td id="<?php echo $change; ?>"><?php if(strlen($result_arr->request_id) > 0){ echo $result_arr->request_id; } else { echo ""; } ?></td>
                                      <td><?php if(strlen($result_arr->service_name) > 0){ echo $result_arr->service_name; } else { echo ""; } ?><?php if(strlen($result_arr->function_name) > 0){ echo " / ".$result_arr->request_name; } else { echo ""; } ?><?php if(strlen($result_arr->function_name) > 0){ echo " / ".$result_arr->function_name; } else { echo ""; } ?></td>
                                      <td><?php if(strlen($result_arr->request_datetime) > 0){ echo str_ireplace("T", " ", $result_arr->request_datetime); } else { echo "N"; } ?></td>
                                      <td><?php 
                              if($result_arr->finalised_ind == "N"){ 
                                  echo '<img width="10" height="9" src="images/dotGreen.png" />';
                              }
                              elseif($result_arr->finalised_ind == "Y"){ 
                                  echo '<img width="10" height="9" src="images/dotRed.png" />';
                              } 
                                    ?></td>
                                  </tr>
                                  <?php
                          }
                      }
                      elseif(isset($result_re->request_details) && count($result_re->request_details) == 1){
                          $result_arr = $result_re->request_details;
                          $change = $result_arr->request_id;
                          ?>
                              <tr class="dark" onClick="change_req('<?php echo $change; ?>')" title="">
                                  <td id="<?php echo $change; ?>"><?php if(strlen($result_arr->request_id) > 0){ echo $result_arr->request_id; } else { echo ""; } ?></td>
                                  <td><?php if(strlen($result_arr->service_name) > 0){ echo $result_arr->service_name; } else { echo ""; } ?><?php if(strlen($result_arr->function_name) > 0){ echo " / ".$result_arr->request_name; } else { echo ""; } ?><?php if(strlen($result_arr->function_name) > 0){ echo " / ".$result_arr->function_name; } else { echo ""; } ?></td>
                                  <td><?php if(strlen($result_arr->request_datetime) > 0){ echo str_ireplace("T", " ", $result_arr->request_datetime); } else { echo "N"; } ?></td>
                                  <td><?php 
                          if($result_arr->finalised_ind == "N"){ 
                              echo '<img width="10" height="9" src="images/dotGreen.png" />';
                          }
                          elseif($result_arr->finalised_ind == "Y"){ 
                              echo '<img width="10" height="9" src="images/dotRed.png" />';
                          } 
                                    ?></td>
                              </tr>
                              <?php
                      }
                      ?>
                      </tbody>
                      </table>
              </div>
           </div>