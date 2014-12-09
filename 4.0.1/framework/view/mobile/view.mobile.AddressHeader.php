
    <p><b><?php if(isset($GLOBALS['result']->house_suffix) && strlen($GLOBALS['result']->house_suffix) > 0){ echo $GLOBALS['result']->house_suffix; } else { echo $GLOBALS['result']->house_number; } ?> <?php echo $GLOBALS['result']->street_name; ?> <?php echo $GLOBALS['result']->street_type; ?> <?php echo $GLOBALS['result']->locality; ?> <?php echo $GLOBALS['result']->postcode; ?></b></p>
 <?php
 $GLOBALS['nameCount'] = count($GLOBALS['result']->name_dets->name_details);
 $GLOBALS['assocCount'] = $GLOBALS['result']->assoc_cnt;
 $GLOBALS['aliasCount'] = $GLOBALS['result']->alias_cnt;
 $GLOBALS['attribCount'] = $GLOBALS['result']->attrib_cnt;
 ?>

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
    
   $added_addresses = array();
                      foreach($GLOBALS['result']->req_dets->request_details as $result_a_ar){
                          if(in_array($result_a_ar->request_id, $added_addresses) == false){
                              array_push($added_addresses, $result_a_ar->request_id);
                              $change = $result_a_ar->request_id;
                              $numb = $numb+1;
                          }
                      }
                      $GLOBALS['requestCount']= $numb;

?>