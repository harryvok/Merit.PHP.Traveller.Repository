 <select class="text" name="resp_officer" id="resp_officer">
    <option value="">Select</option>
   <?php
    if(isset($GLOBALS['result']->officer_details)){
        foreach($GLOBALS['result']->officer_details as $officers){
            if($officers->status_ind == "Y" && $officers->terminate_ind == "N"){
                ?>
                <option value="<?php echo $officers->responsible_code; ?>"><?php if(isset($officers->surname)){ echo $officers->surname; } ?> <?php if(isset($officers->given_names)){ echo ", ".$officers->given_names; } ?></option>
                <?php
            }
        }
    }
    ?>

</select>