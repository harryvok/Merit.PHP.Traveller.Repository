<h2>
    <b><?php if(isset($GLOBALS['result']->house_suffix) && strlen($GLOBALS['result']->house_suffix) > 0){ echo $GLOBALS['result']->house_suffix; } else { echo $GLOBALS['result']->house_number; } ?><?php echo $GLOBALS['result']->street_name; ?><?php echo $GLOBALS['result']->street_type; ?><?php echo $GLOBALS['result']->locality; ?><?php echo $GLOBALS['result']->postcode; ?></b>
 </h2>
 <?php
 $GLOBALS['nameCount'] = count($GLOBALS['result']->name_dets->name_details);
 $GLOBALS['requestCount'] = count($GLOBALS['result']->req_dets->request_details);
 $GLOBALS['assocCount'] = $GLOBALS['result']->assoc_cnt;
 $GLOBALS['aliasCount'] = $GLOBALS['result']->alias_cnt;
 $GLOBALS['attribCount'] = $GLOBALS['result']->attrib_cnt;
 ?>