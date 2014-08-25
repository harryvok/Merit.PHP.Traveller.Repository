<span class="graytitle">Requests</span>
<div id="RequestsShow">
        <ul class="pageitem">
            <li class="button">
            <?php $result_re = $GLOBALS['result']->request_det; ?>
                <input type="button" value="Show (<?php if(isset($result_re->request_details)) echo count($result_re->request_details); else echo 0; ?>)" class="openSection" id='Requests' />
            </li>
        </ul>
        </div>
    <div id="RequestsSection" style="display:none;">
        <ul class="pageitem">
            <?php
            if(isset($result_re->request_details) && count($result_re->request_details) > 1){
                foreach($result_re->request_details as $result_arr){
                    ?>
                    <ul class="pageitem">
                        <li class="textbox">
                            <span class="header">
                            <?php 
                                        if($result_arr->finalised_ind == "N"){ 
                                            echo '<img width="10" height="9" src="images/green-dot.png" />';
                                        }
                                        elseif($result_arr->finalised_ind == "Y"){ 
                                            echo '<img width="10" height="9" src="images/red-dot.png" />';
                                        } 
                                        ?>
                                <?php 
                                echo $result_arr->service_name . " - " .
                                $result_arr->request_name . " - " . 
                                $result_arr->function_name;
                                ?>
                            </span>
                            <br />
                            <b>Request ID:</b> <?php echo $result_arr->request_id; ?><br />
                            <b>Date Input:</b> <?php if(strlen($result_arr->request_datetime) > 0){ echo date('d/m/Y',strtotime($result_arr->request_datetime)); } ?><br />
                            <b>Completed Date:</b> <?php if(strlen($result_arr->status_datetime) > 0 && $result_arr->status_datetime != "1900-01-01T00:00:00" && $result_arr->status != "Open"){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T", " ", $result_arr->status_datetime))); } ?>
                        </li>
                        <li class="menu">
                            <a href="index.php?page=view-request&id=<?php echo $result_arr->request_id; ?>&ref=<?php echo $_GET['id']; ?>&ref_page=view-officer">
                                <span class="name">View</span>
                                <span class="comment"></span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                    </ul>
                    <?php
                }
            }
            elseif(isset($result_re->request_details) && count($result_re->request_details) == 1){
                $result_arr = $result_re->request_details;
                ?>
               <ul class="pageitem">
                  <li class="textbox">
                      <span class="header">
                      <?php 
                                  if($result_arr->finalised_ind == "N"){ 
                                      echo '<img width="10" height="9" src="images/green-dot.png" />';
                                  }
                                  elseif($result_arr->finalised_ind == "Y"){ 
                                      echo '<img width="10" height="9" src="images/red-dot.png" />';
                                  } 
                                  ?>
                          <?php 
                          echo $result_arr->service_name . " - " .
                          $result_arr->request_name . " - " . 
                          $result_arr->function_name;
                          ?>
                      </span>
                      <br />
                      <b>Request ID:</b> <?php echo $result_arr->request_id; ?><br />
                      <b>Date Input:</b> <?php if(strlen($result_arr->request_datetime) > 0){ echo date('d/m/Y',strtotime($result_arr->request_datetime)); } ?><br />
                      <b>Completed Date:</b> <?php if(strlen($result_arr->status_datetime) > 0 && $result_arr->status_datetime != "1900-01-01T00:00:00" && $result_arr->status != "Open"){ echo date('d/m/Y h:i A',strtotime(str_ireplace("T", " ", $result_arr->status_datetime))); } ?>
                  </li>
                  <li class="menu">
                      <a href="index.php?page=view-request&id=<?php echo $result_arr->request_id; ?>&ref=<?php echo $_GET['id']; ?>&ref_page=view-officer">
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