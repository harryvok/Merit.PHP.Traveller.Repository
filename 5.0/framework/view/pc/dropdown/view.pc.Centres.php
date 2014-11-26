
<select name="centre" id="centre">
    <option value="">Select</option>
    <?php
    if(isset($GLOBALS['result']->centre_details) && count($GLOBALS['result']->centre_details) > 1){
        foreach($GLOBALS['result']->centre_details as $priority){ ?>
            <option <?php echo $_SESSION['centre_code'] == $priority->centre_code ? "selected='selected'" : '' ?>value="<?php echo $priority->centre_code; ?>"><?php echo $priority->centre_name; ?></option>
        <?php  
        }
    }
    elseif(isset($GLOBALS['result']->centre_details) && count($GLOBALS['result']->centre_details) == 1){
        ?>
        <option selected value="<?php echo $GLOBALS['result']->centre_details->centre_code; ?>"><?php echo $GLOBALS['result']->centre_details->centre_name; ?></option>
        <?php
    }
    ?>
</select>