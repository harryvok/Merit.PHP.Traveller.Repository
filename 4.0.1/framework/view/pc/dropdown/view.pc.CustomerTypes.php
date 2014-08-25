<select class="text inline" name="cust_type" id="cust_type">
	<?php
    if(count($GLOBALS['result']->name_types_details) == 0){
        ?>
        <option disabled value='BLANK'>None</option>
        <?php	
    }
    else{
        if(isset($_SESSION['rem_cust_type'])){
            if(count($GLOBALS['result']->name_types_details) > 1){
                foreach($GLOBALS['result']->name_types_details as $result_nametypes){
                    if($result_nametypes->name_type == $_SESSION['rem_cust_type']){
                        ?>
                        <option selected value='<?php echo $result_nametypes->name_type; ?>'><?php echo $result_nametypes->name_type_desc; ?></option>
                        <?php
                    }
                    else{
                        ?>
                        <option value='<?php echo $result_nametypes->name_type; ?>'><?php echo $result_nametypes->name_type_desc; ?></option>
                        <?php
                    }
                }
            }
            else{
                ?>
                <option value='<?php echo $GLOBALS['result']->name_types_details->name_type; ?>'><?php echo $GLOBALS['result']->name_types_details->name_type_desc; ?></option>
                <?php
            }
        } 
        else{
            if(count($GLOBALS['result']->name_types_details) > 1){
                ?>
                <option value='BLANK'>Select</option>
                <?php
                foreach($GLOBALS['result']->name_types_details as $result_nametypes){
                    ?>
                    <option value='<?php echo $result_nametypes->name_type; ?>'><?php echo $result_nametypes->name_type_desc; ?></option>
                    <?php
                }
            }
            else{
                ?>
                <option value='BLANK'>Select</option>
                <option value='<?php echo $GLOBALS['result']->name_types_details->name_type; ?>'><?php echo $GLOBALS['result']->name_types_details->name_type_desc; ?></option>
                <?php
            }
        }
    }
    ?>
</select>