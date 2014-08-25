<h2>
    <b><?php if(isset($GLOBALS['result']->house_suffix) && strlen($GLOBALS['result']->house_suffix) > 0){ echo $GLOBALS['result']->house_suffix; } else { echo $GLOBALS['result']->house_number; } ?> <?php echo $GLOBALS['result']->street_name; ?> <?php echo $GLOBALS['result']->street_type; ?> <?php echo $GLOBALS['result']->locality; ?> <?php echo $GLOBALS['result']->postcode; ?></b>
 </h2>