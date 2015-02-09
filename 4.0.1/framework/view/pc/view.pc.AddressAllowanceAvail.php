<div class="summaryContainer">
    <div>
        <h1>Annual Allowance still available</h1>
        <div> 
            <table id="allowanceTable" class=" sortable" title="" cellspacing="0">
                <thead>
                    <tr>
                        <th class="jdescription sortable">Description</th>                                                  
                        <th>Available</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if(isset($GLOBALS['result']->allowance_history->annual_allowance_history) && count($GLOBALS['result']->allowance_history->annual_allowance_history) > 1){
                        foreach($GLOBALS['result']->allowance_history->annual_allowance_history as $allowance_detail){
                            $i=$i+1;
                            $number = $number+1;
                            if($number == 2){
                                $class = "dark";
                                $number = 0;
                            }
                            else{
                                $class = "light";
                            }                        
                            ?>
                            <tr class="<?php echo $class; ?>">                                                       
                                <td style="width:75%"><?php echo $allowance_detail->srf_description; ?></td>
                                <td style="width:10%"><?php echo $allowance_detail->available_cnt; ?></td>                                
                            </tr>
                            <?php
                            }
                        }
                    else if(isset($GLOBALS['result']->allowance_history->annual_allowance_history) && count($GLOBALS['result']->allowance_history->annual_allowance_history) == 1){
                            ?>
                        <tr class="light">
                            <td style="width:75%"><?php echo $GLOBALS['result']->allowance_history->annual_allowance_history->srf_description; ?></td>                        
                            <td style="width:10%"><?php echo $GLOBALS['result']->allowance_history->annual_allowance_history->available_cnt; ?></td>                                
                        </tr>
                    <?php
                    }
                    else{
                        ?>
                        <tr class="light"> 
                            <td colspan="3" style="text-align:center">No data found</td>   
                        </tr>
                    <?php
                    }
                    ?>                 
                </tbody>
            </table>
        </div>        
    </div>
</div>