
<select name="reqType" id="reqType" data-mand="request_type">
    <option value="">Select</option>
    <?php
    if(isset($GLOBALS['result']->req_type_details) && count($GLOBALS['result']->req_type_details) > 1){
        foreach($GLOBALS['result']->req_type_details as $reqType){ ?>
            <option value="<?php echo $reqType->req_type_code; ?>"><?php echo $reqType->req_type_name; ?></option>
        <?php  
        }
    }
    elseif(isset($GLOBALS['result']->req_type_details) && count($GLOBALS['result']->req_type_details) == 1){
        ?>
        <option selected value="<?php echo $GLOBALS['result']->req_type_details->req_type_code; ?>"><?php echo $GLOBALS['result']->req_type_details->req_type_name; ?></option>
        <?php
    }
    ?>
</select>