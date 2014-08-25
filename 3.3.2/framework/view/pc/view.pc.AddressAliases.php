<div class="margin-right">
<div class="view-request">
 <div class="margin-right">
    <div class="float-left">
        <div style="float:left;">
            <span class="request-column-title"  style="float:left;">
            <?php
            $result_alias = $GLOBALS['result']->alias_sum_det;
            ?>
            <div style="float:left;">Aliases (<?php if(isset($result_alias->alias_sum_details)){ echo count($result_alias->alias_sum_details); } else{ echo 0; } ?>)</div>
            
            </span>
        </div>
        <input type="hidden" name="val-alias" id="val-alias" value="0" />
        <div id="aliases" class="dropdown">
			 <input type="text" id="addressAliases" class="tableSearch" placeholder="Search..." />
                <table id="addressAliasesTable" class=" sortable" title="" cellspacing="0">
                <thead>
                <tr>
                    <th class="job-id sortable">Count</th>
                    <th class="description sortable">Description</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $number=0;
                
                if(isset($result_alias->alias_sum_details) && count($result_alias->alias_sum_details) > 1){
                    foreach($result_alias->alias_sum_details as $result_a_as){
                        $change = $result_a_as->name_id;
                        $number = $number+1;
                        if($number == 2){
                            $class = "dark";
                            $number = 0;
                        }
                        else{
                            $class = "light";
                        }
                        ?>
                            <tr class="<?php echo $class; ?>" onClick="GetAliasDetails('<?php echo $_GET['id']; ?>', '<?php echo $result_a_as->type_txt; ?>','<?php echo $result_a_as->type_desc; ?>','<?php echo $result_a_as->type_cnt; ?>','<?php echo $result_a_as->type_key; ?>','<?php echo $result_a_as->type_code; ?>')" title="">
                                <td><?php echo $result_a_as->type_cnt; ?></td>
                                <td><?php echo $result_a_a->type_desc."-".$result_a_as->type_key; ?></td>
                            </tr>
                            <?php
                    }
                }
                elseif(isset($result_alias->alias_sum_details) && count($result_alias->alias_sum_details) == 1){
                    $result_a_as = $result_alias->alias_sum_details;
                    ?>
                        <tr class="dark" onClick="GetAliasDetails('<?php echo $_GET['id']; ?>', '<?php echo $result_a_as->type_txt; ?>','<?php echo $result_a_as->type_desc; ?>','<?php echo $result_a_as->type_cnt; ?>','<?php echo $result_a_as->type_key; ?>','<?php echo $result_a_as->type_code; ?>')" title="">
                                <td><?php echo $result_a_as->type_cnt; ?></td>
                                <td><?php echo $result_a_as->type_desc."-".$result_a_as->type_key; ?> </td>
                            </tr>
                        <?php
                }
                ?>
                </tbody>
                </table>
                <div id="alias_details">
    
                </div>

        </div>
    </div>
   </div>