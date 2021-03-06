

<div class="summaryContainer">
    <?php $result_re = $GLOBALS['result']->request_det; ?>
        <h1>Requests (<?php if(isset($result_re->request_details)) echo count($result_re->request_details); else { echo 0; } ?>)</h1>
           <div>
              <input type="hidden" name="val-c" id="val-c" value="0" />
              
              	<input type="text" id="officerRequests" class="tableSearch" placeholder="Search..." />
                      <table id="officerRequestsTable" class=" sortable" title="" cellspacing="0">
                      <thead>
                      <tr>
                          <th class="job-id sortable">Request ID</th>
                          <th class="description sortable">Category</th>
                          <th class="date sortable">Date Assigned</th>
                          <th class="date sortable">Request Due Date</th>
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
                                      <td>
                                          <?php if(strlen($result_arr->service_name) > 0){ echo $result_arr->service_name; } else { echo ""; } ?>
                                          <?php if(strlen($result_arr->request_name) > 0){ echo " / ".$result_arr->request_name; } else { echo ""; } ?>
                                          <?php if(strlen($result_arr->function_name) > 0){ echo " / ".$result_arr->function_name; } else { echo ""; } ?>
                                      </td>
                                      <td><?php if(strlen($result_arr->request_datetime) > 0 && $result_arr->request_datetime != "1970-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $result_arr->request_datetime))); }?></td>
                                      <td><?php if(strlen($result_arr->due_datetime) > 0 && $result_arr->due_datetime != "1970-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $result_arr->due_datetime))); }?></td>
                                      <td><?php 
                              if($result_arr->finalised_ind == "N"){
                                  echo ' Open ';
                                  echo ' <img class="officerdot" width="10" height="9" src="images/dotGreen.png" />';
                              }
                              elseif($result_arr->finalised_ind == "Y"){  
                                  echo ' Closed ';
                                  echo ' <img class="officerdot" width="10" height="9" src="images/dotRed.png" />';
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
                                      <td><?php if(strlen($result_arr->request_datetime) > 0 && $result_arr->request_datetime != "1970-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $result_arr->request_datetime))); }?></td>
                                      <td><?php if(strlen($result_arr->due_datetime) > 0 && $result_arr->due_datetime != "1970-01-01T00:00:00"){ echo date('d/m/Y h:i A',strtotime(str_ireplace("00:00:00.000", "", $result_arr->due_datetime))); }?></td>
                                      <td><?php 
                          if($result_arr->finalised_ind == "N"){
                              echo ' Open ';
                              echo ' <img class="officerdot" width="10" height="9"  src="images/dotGreen.png" />';
                          }
                          elseif($result_arr->finalised_ind == "Y"){  
                              echo ' Closed ';
                              echo ' <img class="officerdot" width="10" height="9" src="images/dotRed.png" />';
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
           </div>