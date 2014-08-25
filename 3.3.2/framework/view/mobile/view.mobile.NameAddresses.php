<span class="graytitle">Addresses</span>
<div id="AddressesShow">
      <ul class="pageitem">
          <li class="button">
              <input type="button" value="Show (<?php if(isset($GLOBALS['result']->address_details)){ echo count($GLOBALS['result']->address_details); } else { echo 0; }?>)" class="openSection" id="Addresses" />
          </li>
      </ul>
      </div>
  <div id="AddressesSection" style="display:none;">

      <ul class="pageitem">
          <?php
          if(isset($GLOBALS['result']->address_details) && count($GLOBALS['result']->address_details) > 1){
              foreach($GLOBALS['result']->address_details as $result_a_ad){
                  ?>
                  <ul class="pageitem">
                          <li class="textbox">
                              <span class="header">
                                   <?php echo $result_a_ad->house_number; ?> <?php echo $result_a_ad->street_name; ?> <?php echo $result_a_ad->street_type; ?> <?php echo $result_a_ad->locality; ?> <?php echo $result_a_ad->postcode; ?>
                              </span>
                          </li>
                          <li class="menu">
                              <a href="index.php?page=view-address&id=<?php echo $result_a_ad->address_id; ?>&ref=<?php echo $result_a_ad->address_id; ?>&ref_page=view-name">
                                  <span class="name">View</span>
                                  <span class="comment"><?php echo $result_a_ad->address_id; ?></span>
                                  <span class="arrow"></span>
                              </a>
                          </li>
                      </ul>
                  <?php
              }
          }
          elseif(isset($GLOBALS['result']->address_details) && count($GLOBALS['result']->address_details) == 1){
              $result_a_ad = $GLOBALS['result']->address_details;
              ?>
               <ul class="pageitem">
                  <li class="textbox">
                      <span class="header">
                           <?php echo $result_a_ad->house_number; ?> <?php echo $result_a_ad->street_name; ?> <?php echo $result_a_ad->street_type; ?> <?php echo $result_a_ad->locality; ?> <?php echo $result_a_ad->postcode; ?>
                      </span>
                  </li>
                  <li class="menu">
                      <a href="index.php?page=view-address&id=<?php echo $result_a_ad->address_id; ?>&ref=<?php echo $result_a_ad->address_id; ?>&ref_page=view-name">
                          <span class="name">View</span>
                          <span class="comment"><strong>ID:</strong> <?php echo $result_a_ad->address_id; ?></span>
                          <span class="arrow"></span>
                      </a>
                  </li>
              </ul>
              <?php
          }
          ?>
          <li class="button">
              <input type="button" value="Hide"class="closeSection" id="Addresses" />
          </li>
      </ul>
      </div>