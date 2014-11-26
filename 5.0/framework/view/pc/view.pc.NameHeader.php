<h2>
    <b><?php echo $GLOBALS['result']->given_names; ?><?php echo $GLOBALS['result']->surname; 
             if ($GLOBALS['result']->work_phone != "") echo " (Phone: " .$GLOBALS['result']->work_phone.")";
             else if ($GLOBALS['result']->mobile_no != "") echo " (Mobile: " .$GLOBALS['result']->mobile_no.")";
             else if ($GLOBALS['result']->telephone != "") echo " (Mobile: " .$GLOBALS['result']->telephone.")";
             ?></b>
 </h2>
  <?php
  $GLOBALS['addressCount'] = count($GLOBALS['result']->address_det->address_details);
  $GLOBALS['requestCount'] = count($GLOBALS['result']->req_dets->request_details);
 ?>