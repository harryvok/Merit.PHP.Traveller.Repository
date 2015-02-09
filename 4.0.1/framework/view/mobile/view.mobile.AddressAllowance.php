<ul  class="no-ellipses" data-role="listview" data-count-theme="b" data-inset="true">
    <li data-role="list-divider">Summary of allowances used</li>
    <?php
    if(isset($GLOBALS['result']->allowance_history->annual_allowance_history) && count($GLOBALS['result']->allowance_history->annual_allowance_history) > 1){
        foreach($GLOBALS['result']->allowance_history->annual_allowance_history as $allowance_detail){
            ?>
            <li>
                <p><b>Description: </b><?php echo $allowance_detail->srf_description; ?></p>
                <p><b>Used: </b><?php echo $allowance_detail->allowance_date; ?></p>
                <p><b>Number: </b><?php echo $allowance_detail->number_used; ?></p>
            </li>
            <?php     
        }
    }
    else if(isset($GLOBALS['result']->allowance_history->annual_allowance_history) && count($GLOBALS['result']->allowance_history->annual_allowance_history) == 1){
            ?>
            <li>
                <p><b>Description: </b><?php echo $GLOBALS['result']->allowance_history->annual_allowance_history->srf_description; ?></p>
                <p><b>Used: </b><?php echo $GLOBALS['result']->allowance_history->annual_allowance_history->allowance_date; ?></p>
                <p><b>Number: </b><?php echo $GLOBALS['result']->allowance_history->annual_allowance_history->number_used; ?></p>
            </li>
            <?php                   
    }
    else{
        ?>
            <li>
                <p>No data found</p>
            </li>
        <?php
    }
    ?>          
</ul>
