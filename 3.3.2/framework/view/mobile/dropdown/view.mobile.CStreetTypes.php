<select class="text" name="i_ctype" id="i_ctype" onChange="custadd()">
    <?php
    if(count($GLOBALS['result']->street_types_details) == 0){
        ?>
        <option disabled value=''>None</option>
        <?php	
    }
    else{
        if(isset($_SESSION['rem_ltype'])){
            if(count($GLOBALS['result']->street_types_details) > 1){
                foreach($GLOBALS['result']->street_types_details as $result_svtypes){
                    if($result_svtypes->street_type_name == $_SESSION['rem_ltype']){
                        ?>
                        <option selected value='<?php echo $result_svtypes->street_type_code; ?>'><?php echo $result_svtypes->street_type_name; ?></option>
                        <?php
                    }
                    else{
                        ?>
                        <option value='<?php echo $result_svtypes->street_type_code; ?>'><?php echo $result_svtypes->street_type_name; ?></option>
                        <?php
                    }
                }
            }
            else{
                ?>
                <option value='<?php echo $GLOBALS['result']->street_types_details->street_type_code; ?>'><?php echo $GLOBALS['result']->street_types_details->street_type_name; ?></option>
                <?php
            }
        } 
        else{
            if(count($GLOBALS['result']->street_types_details) > 1){
                ?>
                <option value=''>Select</option>
                <?php
                foreach($GLOBALS['result']->street_types_details as $result_svtypes){
                    ?>
                    <option value='<?php echo $result_svtypes->street_type_code; ?>'><?php echo $result_svtypes->street_type_name; ?></option>
                    <?php
                }
            }
            else{
                ?>
                <option value=''>Select</option>
                <option value='<?php echo $GLOBALS['result']->street_types_details->street_type_code; ?>'><?php echo $GLOBALS['result']->street_types_details->street_type_name; ?></option>
                <?php
            }
        }
    }
    ?>
</select>