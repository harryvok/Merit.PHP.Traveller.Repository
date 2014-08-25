 <div class="margin-right">
  <div class="summaryContainer">
   <div class="margin-right">
      <div class="float-left">
          <div style="float:left;">
              <span class="summaryColumnTitle"  style="float:left;">
              <?php
              $result_attrib = $GLOBALS['result']->attrib_sum_det;
              ?>
              <div style="float:left;">Attributes (<?php if(isset($result_attrib->attrib_sum_details)){ echo count($result_attrib->attrib_sum_details); } else{ echo 0; } ?>)</div>
              
              </span>
          </div>
          <input type="hidden" name="val-attrib" id="val-attrib" value="0" />
          <div id="attributes" class="dropdown">
          		<input type="text" id="addressAttributes" class="tableSearch" placeholder="Search..." />
                  <table id="addressAttributesTable" class=" sortable" title="" cellspacing="0">
                  <thead>
                  <tr>
                      <th class=" sortable">Count</th>
                      <th class="sortable">Description</th>
                      <th class=" sortable">Type</th>
                      <th class=" sortable">Key</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $number=0;
                  
                  if(isset($result_attrib->attrib_sum_details) && count($result_attrib->attrib_sum_details) > 1){
                      foreach($result_attrib->attrib_sum_details as $result_a_at){
                          $number = $number+1;
                          if($number == 2){
                              $class = "dark";
                              $number = 0;
                          }
                          else{
                              $class = "light";
                          }
                          ?>
                              <tr class="<?php echo $class; ?>" onClick="GetAttributeDetails('<?php echo $_GET['id']; ?>','<?php echo $result_a_at->type_txt; ?>','<?php echo $result_a_at->type_desc; ?>','<?php echo $result_a_at->type_cnt; ?>','<?php echo $result_a_at->type_key; ?>','<?php echo $result_a_at->type_code; ?>','<?php echo $result_a_at->status_ind; ?>')" title="">
                                  <td><?php echo $result_a_at->type_cnt; ?></td>
                                  <td><?php echo $result_a_at->type_desc; ?></td>
                                  <td><?php echo $result_a_at->type_txt; ?></td>
                                  <td><?php echo $result_a_at->type_key; ?></td>
                              </tr>
                              <?php
                      }
                  }
                  elseif(isset($result_attrib->attrib_sum_details) && count($result_attrib->attrib_sum_details) == 1){
                      $result_a_at = $result_attrib->attrib_sum_details;
                      ?>
                          <tr class="dark" onClick="GetAttributeDetails('<?php echo $_GET['id']; ?>','<?php echo $result_a_at->type_txt; ?>','<?php echo $result_a_at->type_desc; ?>','<?php echo $result_a_at->type_cnt; ?>','<?php echo $result_a_at->type_key; ?>','<?php echo $result_a_at->type_code; ?>','<?php echo $result_a_at->status_ind; ?>')" title="">
                                  <td><?php echo $result_a_at->type_cnt; ?></td>
                                  <td><?php echo $result_a_at->type_desc; ?></td>
                                  <td><?php echo $result_a_at->type_txt; ?></td>
                                  <td><?php echo $result_a_at->type_key; ?></td>
                              </tr>
                          <?php
                  }
                  ?>
                  </tbody>
                  </table>
                  <div id="attribute_details">
      
                  </div>
          </div>
      </div>
   </div>