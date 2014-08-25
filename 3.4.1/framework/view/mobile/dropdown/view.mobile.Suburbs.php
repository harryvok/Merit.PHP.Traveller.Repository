<select class="text" name="lsuburb" id="lsuburb" onChange="changeLocationType()">
	<?php
    if(count($GLOBALS['result']->locality_details) == 0){
        ?>
        <option disabled value=''>None</option>
        <?php	
    }
    else{
        if(isset($_SESSION['rem_lsuburb'])){
            if(count($GLOBALS['result']->locality_details) > 1){
                foreach($GLOBALS['result']->locality_details as $result_suburbs){
                    if($result_suburbs->locality_name == $_SESSION['rem_lsuburb']){
                        ?>
                        <option selected value='<?php echo $result_suburbs->locality_code; ?>'><?php echo $result_suburbs->locality_name; ?></option>
                        <?php
                    }
                    else{
                        ?>
                        <option value='<?php echo $result_suburbs->locality_code; ?>'><?php echo $result_suburbs->locality_name; ?></option>
                        <?php
                    }
                }
            }
            else{
                ?>
                <option value='<?php echo $GLOBALS['result']->locality_details->locality_code; ?>'><?php echo $GLOBALS['result']->locality_details->locality_name; ?></option>
                <?php
            }
        } 
        else{
            if(count($GLOBALS['result']->locality_details) > 1){
                ?>
                <option value=''>Select</option>
                <?php
                foreach($GLOBALS['result']->locality_details as $result_suburbs){
                    ?>
                    <option value='<?php echo $result_suburbs->locality_code; ?>'><?php echo $result_suburbs->locality_name; ?></option>
                    <?php
                }
            }
            else{
                ?>
                <option value=''>Select</option>
                <option value='<?php echo $GLOBALS['result']->locality_details->locality_code; ?>'><?php echo $GLOBALS['result']->locality_details->locality_name; ?></option>
                <?php
            }
        }
    }
    ?>
</select>