<select name="priority" id="priority">
    <option value="">Select</option>
    <?php
    if(isset($GLOBALS['result']->priority_details) && count($GLOBALS['result']->priority_details) > 1){
        foreach($GLOBALS['result']->priority_details as $priority){ ?>
            <option value="<?php echo $priority->priority_code; ?>"><?php echo $priority->priority_name; ?></option>
        <?php  
        }
    }
    elseif(isset($GLOBALS['result']->priority_details) && count($GLOBALS['result']->priority_details) == 1){
        ?>
        <option selected value="<?php echo $GLOBALS['result']->priority_details->priority_code; ?>"><?php echo $GLOBALS['result']->priority_details->priority_name; ?></option>
        <?php
    }
    ?>
</select>