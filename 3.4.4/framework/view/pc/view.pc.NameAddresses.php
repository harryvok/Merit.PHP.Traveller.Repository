<div class="margin-right">
  <div class="summaryContainer">
   <div class="margin-right">
        <div class="float-left">
          <div style="float:left;">
              <span class="summaryColumnTitle"  style="float:left;">
              <div style="float:left;">Addresses (<?php if(isset($GLOBALS['result']->address_det->address_details)){ echo count($GLOBALS['result']->address_det->address_details); } else{ echo 0; } ?>)</div>
              
              </span>
          </div>
          <input type="hidden" name="val-a" id="val-a" value="0" />
          <div id="addresses"  class="dropdown">
				<input type="text" id="nameAddresses" class="tableSearch" placeholder="Search..." />
                  <table id="nameAddressesTable" class=" sortable" title="" cellspacing="0">
                  <thead>
                  <tr>
                      <th class="job-id sortable">Unit/Flat Number</th>
                      <th class="job-id sortable">House Number</th>
                      <th class="name sortable">Street</th>
                      <th class="date sortable">Type</th>
                      <th class="name sortable">Suburb</th>
                      <th class="date sortable">Postcode</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $number=0;
                  if(isset($GLOBALS['result']->address_det->address_details) && count($GLOBALS['result']->address_det->address_details) > 1){
                      foreach($GLOBALS['result']->address_det->address_details as $result_a_ad){
                          $change = $result_a_ad->address_id;
                          $number = $number+1;
                          if($number == 2){
                              $class = "dark";
                              $number = 0;
                          }
                          else{
                              $class = "light";
                          }
                          ?>
                              <tr class="<?php echo $class; ?>" onClick="change_add('<?php echo $change; ?>')" title="">
                                  <td id="<?php echo $change; ?>"><?php echo $result_a_ad->house_suffix != $result_a_ad->house_number ? $result_a_ad->house_suffix : ""; ?></td>
                                  <td><?php echo $result_a_ad->house_number; ?></td>
                                  <td class="name"><?php echo $result_a_ad->street_name; ?></td>
                                  <td><?php echo $result_a_ad->street_type; ?></td>
                                  <td class="name"><?php echo $result_a_ad->locality; ?></td>
                                  <td><?php echo $result_a_ad->postcode; ?></td>
                              </tr>
                              <?php
                      }
                  }
                  elseif(isset($GLOBALS['result']->address_det->address_details) && count($GLOBALS['result']->address_det->address_details) == 1){
                      $change = $GLOBALS['result']->address_det->address_details->address_id;
                      ?>
                          <tr class="dark" onClick="change_add('<?php echo $change; ?>')" title="">
                              <td id="<?php echo $change; ?>"><?php echo $GLOBALS['result']->address_det->address_details->house_suffix != $GLOBALS['result']->address_det->address_details->house_number ? $GLOBALS['result']->address_det->address_details->house_suffix : ""; ?></td>
                              <td><?php echo $GLOBALS['result']->address_det->address_details->house_suffix; ?></td>
                              <td class="name"><?php echo $GLOBALS['result']->address_det->address_details->street_name; ?></td>
                              <td><?php echo $GLOBALS['result']->address_det->address_details->street_type; ?></td>
                              <td class="name"><?php echo $GLOBALS['result']->address_det->address_details->locality; ?></td>
                              <td><?php echo $GLOBALS['result']->address_det->address_details->postcode; ?></td>
                          </tr>
                          <?php
                  }
                  ?>
                  </tbody>
                  </table>
          </div>
      </div>
   </div>