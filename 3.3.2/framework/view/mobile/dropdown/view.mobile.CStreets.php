<select class="text" name="i_cstreet" id="i_cstreet" onChange="custadd()">
	<?php
    if(count($GLOBALS['result']->street_details) == 0){
        ?>
        <option disabled value=''>None</option>
        <?php	
    }
    else{
        if(isset($_SESSION['rem_lstreet'])){
            if(count($GLOBALS['result']->street_details) > 1){
                foreach($GLOBALS['result']->street_details as $result_streets){
                    if($result_streets->street_code == $_SESSION['rem_lstreet']){
                        ?>
                        <option selected value='<?php echo $result_streets->street_code; ?>'><?php echo $result_streets->street_name; ?></option>
                        <?php
                    }
                    else{
                        ?>
                        <option value='<?php echo $result_streets->street_code; ?>'><?php echo $result_streets->street_name; ?></option>
                        <?php
                    }
                }
            }
            else{
                ?>
                <option value='<?php echo $GLOBALS['result']->street_details->street_code; ?>'><?php echo $GLOBALS['result']->street_details->street_name; ?></option>
                <?php
            }
        } 
        else{
            if(count($GLOBALS['result']->street_details) > 1){
                ?>
                <option value=''>Select</option>
                <?php
                foreach($GLOBALS['result']->street_details as $result_streets){
                    ?>
                    <option value='<?php echo $result_streets->street_code; ?>'><?php echo $result_streets->street_name; ?></option>
                    <?php
                }
            }
            else{
                ?>
                <option value=''>Select</option>
                <option value='<?php echo $GLOBALS['result']->street_details->street_code; ?>'><?php echo $GLOBALS['result']->street_details->street_name; ?></option>
                <?php
            }
        }
    }
    ?>
</select>