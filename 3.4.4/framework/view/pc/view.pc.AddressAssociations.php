<div class="margin-right">
<div class="summaryContainer">
 <div class="margin-right">
    <div class="float-left">
        <div style="float:left;">
            <span class="summaryColumnTitle"  style="float:left;">
            <?php
            $result_asso = $GLOBALS['result']->assoc_sum_det;
            ?>
            <div style="float:left;">Associations (<?php if(isset($result_asso->assoc_sum_details)){ echo count($result_asso->assoc_sum_details); } else{ echo 0; } ?>)</div>                      
            </span>
        </div>
        <input type="hidden" name="val-asso" id="val-asso" value="0" />
        <div id="associations" class="dropdown">
			<input type="text" id="addressAssociations" class="tableSearch" placeholder="Search..." />
                <table id="addressAssociationsTable" class=" sortable" title="" cellspacing="0">
                <thead>
                <tr>
                    <th class=" sortable">Count</th>
                    <th class="sortable">Description</th>
                    <th class=" sortable">Type</th>
                    <th class=" sortable">Key</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $number=0;
                
                if(isset($result_asso->assoc_sum_details) && count($result_asso->assoc_sum_details) > 1){
                    foreach($result_asso->assoc_sum_details as $result_a_as){
                        $number = $number+1;
                        if($number == 2){
                            $class = "dark";
                            $number = 0;
                        }
                        else{
                            $class = "light";
                        }
                        ?>
                            <tr class="<?php echo $class; ?>" onClick="GetAssociationDetails('<?php echo $result_a_as->type_txt; ?>','<?php echo $result_a_as->type_desc; ?>','<?php echo $result_a_as->type_cnt; ?>','<?php echo $result_a_as->type_key; ?>','<?php echo $result_a_as->type_code; ?>','<?php echo $result_a_as->form_name; ?>','<?php echo $result_a_as->key_name; ?>','<?php echo $_GET['id']; ?>')" title="">
                                <td><?php echo $result_a_as->type_cnt; ?></td>
                                <td><?php echo $result_a_as->type_desc; ?></td>
                                <td><?php echo $result_a_as->type_txt; ?></td>
                                <td><?php echo $result_a_as->type_key; ?></td>
                            </tr>
                            <?php
                    }
                }
                elseif(isset($result_asso->assoc_sum_details) && count($result_asso->assoc_sum_details) == 1){
                    $result_a_as = $result_asso->assoc_sum_details;
                    ?>
                        <tr class="dark" onClick="GetAssociationDetails('<?php echo $result_a_as->type_txt; ?>','<?php echo $result_a_as->type_desc; ?>','<?php echo $result_a_as->type_cnt; ?>','<?php echo $result_a_as->type_key; ?>','<?php echo $result_a_as->type_code; ?>','<?php echo $result_a_as->form_name; ?>','<?php echo $result_a_as->key_name; ?>','<?php echo $_GET['id']; ?>')" title="">
                                <td><?php echo $result_a_as->type_cnt; ?></td>
                                <td><?php echo $result_a_as->type_desc; ?></td>
                                <td><?php echo $result_a_as->type_txt; ?></td>
                                <td><?php echo $result_a_as->type_key; ?></td>
                            </tr>
                        <?php
                }
                ?>
                </tbody>
                </table>
                <div id="association_details">
    
                </div>

        </div>
     </div>
   </div>