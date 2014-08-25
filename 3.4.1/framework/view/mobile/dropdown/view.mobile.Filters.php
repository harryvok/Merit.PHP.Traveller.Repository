<select name="filter" id="filter" class="text" OnChange="getIntray('<?php if($_GET['page'] == "actions") echo "action"; elseif($_GET['page'] == "requests") echo "request"; ?>',this.options[selectedIndex].value)">
    <?php
    if(count($GLOBALS['result']['Array']->filter_details) > 1){
        foreach($GLOBALS['result']['Array']->filter_details as $action_filter){ ?>
            <option <?php 
        if(empty($_GET['filter'])) 
        { 
            if($action_filter->filter_no == $GLOBALS['result']['Default']){ 
                echo 'selected'; 
                $GLOBALS['filterLink'] = $GLOBALS['result']['Default'];
            } 
        } 
        else{ 
            if($action_filter->filter_no == $_GET['filter']){ 
                echo 'selected'; 
                $GLOBALS['filterLink'] = $_GET['filter'];
            } 
        }
        ?> value="<?php echo $action_filter->filter_no; ?>"><?php echo $action_filter->filter_name; ?></option>
        <?php  
        }
    }
    else{
        ?>
        <option selected value="<?php echo $GLOBALS['result']['Array']->filter_details->filter_no; ?>"><?php echo $GLOBALS['result']['Array']->filter_details->filter_name; ?></option>
        <?php
    }
    ?>
</select>