
<select name="howReceived" id="howReceived">
    <option value="">Select</option>
    <?php
    if(isset($GLOBALS['result']->how_received_details) && count($GLOBALS['result']->how_received_details) > 1){
        foreach($GLOBALS['result']->how_received_details as $priority){ ?>
            <option <?php 
                if(isset($_GET['back_act']) && $_GET['back_act'] == "RequestSearch" ) {
                    if($_SESSION['howReceived'] == $priority->how_received_code){
                        echo "selected='selected'";
                    }
                }
                else{
                    if(strlen($GLOBALS['default']) > 0){
                        echo $GLOBALS['default'] == $priority->how_received_code ? "selected='selected'" : '';
                    }
                } 
                ?> value="<?php echo $priority->how_received_code; ?>"><?php echo $priority->how_received_name; ?></option>
        <?php  
        }
    }
    elseif(isset($GLOBALS['result']->how_received_details) && count($GLOBALS['result']->how_received_details) == 1){
        ?>
        <option selected value="<?php echo $GLOBALS['result']->how_received_details->how_received_code; ?>"><?php echo $GLOBALS['result']->how_received_details->how_received_name; ?></option>
        <?php
    }
    ?>
</select>