<div class="margin-right">
  <div class="summaryContainer">
   <div class="margin-right">
      <div class="float-left">
           <input type="hidden" name="val-c" id="val-c" value="0" />
          <div style="float:left;">
              <span class="summaryColumnTitle"  style="float:left;">
              <div style="float:left;">History of Changes</div>
              </span>
          </div>
          
         
          <div id="comments" style="float:left; width: 100%; padding: 20px 20px 20px 20px;">
              <div style="margin-right: 40px;">
                   
                  <table id="filterTableJobs" class="" title="" cellspacing="0">
                      <tr>
                         <th class="description sortable">Description</th>
                      </tr>
                  <?php
                  $number=0;
                  if(isset($GLOBALS['result']->request_remark_details) && count($GLOBALS['result']->request_remark_details) > 1){
                      foreach($GLOBALS['result']->request_remark_details as $result_c_ar){
                          if($result_c_ar->sub_type == "Change"){
                              $number = $number+1;
                              if($number == 2){
                                  $class = "dark";
                                  $number = 0;
                              }
                              else{
                                  $class = "light";
                              }
                              ?>
                                  <tr class="<?php echo $class; ?>">
                                      <td><?php echo $result_c_ar->note_datetime;?> - <?php echo base64_decode($result_c_ar->comment); ?></td>
                                  </tr>
                                  <?php
                          }
                      }
                  }
                  elseif(isset($GLOBALS['result']->request_remark_details) && count($GLOBALS['result']->request_remark_details) == 1){
                      if($GLOBALS['result']->request_remark_details->sub_type == "Change"){
                      ?>
                          <tr class="dark" title="">
                              <td><?php echo $GLOBALS['result']->request_remark_details->note_datetime; ?> - <?php echo base64_decode($GLOBALS['result']->request_remark_details->comment); ?></td>
                          <?php
                      }
                  }
                  ?>
                  </table>
                  
              </div>
          </div>
      
   </div>
   
</div>
</div>