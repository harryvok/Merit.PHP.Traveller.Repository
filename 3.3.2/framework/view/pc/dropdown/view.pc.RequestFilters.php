<select name="filter" class="dropdown" OnChange="location.href=this.options[selectedIndex].value">
    <?php
    if(isset($GLOBALS['result']['Array']->filter_details) && count($GLOBALS['result']['Array']->filter_details) > 1){
        foreach($GLOBALS['result']['Array']->filter_details as $action_filter){ ?>
            <option <?php 
        if(empty($_GET['filter'])) 
        { 
            if($action_filter->filter_no == $GLOBALS['result']['Default']){ 
                echo 'selected'; 
            } 
        } 
        else{ 
            if($action_filter->filter_no == $_GET['filter']){ 
                echo 'selected'; 
            } 
        }
        ?> value="index.php?page=requests&filter=<?php echo $action_filter->filter_no; ?>"><?php echo $action_filter->filter_name; ?></option>
        <?php  
        }
    }
    elseif(isset($GLOBALS['result']['Array']->filter_details) && count($GLOBALS['result']['Array']->filter_details) == 1){
        ?>
        <option selected value="<?php echo $GLOBALS['result']['Array']->filter_details->filter_no; ?>"><?php echo $GLOBALS['result']['Array']->filter_details->filter_name; ?></option>
        <?php
    }
	else{
		?>
        <option value="">None</option>
        <?php	
	}
    ?>
</select>