
    <ul  class="no-ellipses" data-role="listview" data-count-theme="b" data-inset="true" data-filter="true" data-filter-placeholder="Search addresses...">
          <?php
          if(isset($GLOBALS['result']->address_det->address_details) && count($GLOBALS['result']->address_det->address_details) > 1){
              foreach($GLOBALS['result']->address_det->address_details as $result_a_ad){
                  ?>
                  
                  <li>
                     <a href="index.php?page=view-address&id=<?php echo $result_a_ad->address_id; ?>&ref=<?php echo $result_a_ad->address_id; ?>&ref_page=view-name">
                     
                           <?php if(isset($result_a_ad->house_suffix) && isset($result_a_ad->house_number) && $result_a_ad->house_suffix != $result_a_ad->house_number){ echo $result_a_ad->house_suffix; } elseif(isset($result_a_ad->house_number)){ echo $result_a_ad->house_number; } ?><?php echo $result_a_ad->street_name; ?><?php echo $result_a_ad->street_type; ?><?php echo $result_a_ad->locality; ?><?php echo $result_a_ad->postcode; ?>
                      
                      </a>
                  </li>
                      
                  <?php
              }
          }
          elseif(isset($GLOBALS['result']->address_det->address_details) && count($GLOBALS['result']->address_det->address_details) == 1){
              $result_a_ad = $GLOBALS['result']->address_det->address_details;
              ?>
                  <li>
                     <a href="index.php?page=view-address&id=<?php echo $result_a_ad->address_id; ?>&ref=<?php echo $result_a_ad->address_id; ?>&ref_page=view-name">
                     
                           <?php if(isset($result_a_ad->house_suffix) && isset($result_a_ad->house_number) && $result_a_ad->house_suffix != $result_a_ad->house_number){ echo $result_a_ad->house_suffix; } elseif(isset($result_a_ad->house_number)){ echo $result_a_ad->house_number; } ?><?php echo $result_a_ad->street_name; ?><?php echo $result_a_ad->street_type; ?><?php echo $result_a_ad->locality; ?><?php echo $result_a_ad->postcode; ?>
                      
                      </a>
                  </li>

              <?php
          }
          ?>
          
      </ul>
