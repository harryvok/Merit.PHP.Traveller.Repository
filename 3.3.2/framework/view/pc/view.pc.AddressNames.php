<div class="margin-right">
<div class="view-request">
 <div class="margin-right">
    <div class="float-left">
        <div style="float:left;">
            <span class="request-column-title"  style="float:left;">
            <?php

            $result_n = $GLOBALS['result'];
            ?>
            <div style="float:left;">Names (<?php if(isset($result_n->name_details)){ echo count($result_n->name_details); } else{ echo 0; } ?>)</div>
            
            </span>
        </div>
        <input type="hidden" name="val-n" id="val-n" value="0" />
        <div id="names" class="dropdown">
			<input type="text" id="addressNames" class="tableSearch" placeholder="Search..." />
                <table id="addressNamesTable" class=" sortable" title="" cellspacing="0">
                <thead>
                <tr>
                    <th class="job-id sortable">Name ID</th>
                    <th class="description sortable">Name</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $number=0;
                if(isset($result_n->name_details) && count($result_n->name_details) > 1){
                    foreach($result_n->name_details as $result_n_ar){
                        $change = $result_n_ar->name_id;
                        $number = $number+1;
                        if($number == 2){
                            $class = "dark";
                            $number = 0;
                        }
                        else{
                            $class = "light";
                        }
                        ?>
                            <tr class="<?php echo $class; ?>" onClick="change_name('<?php echo $change; ?>')" title="">
                                <td id="<?php echo $change; ?>"><?php if(strlen($result_n_ar->name_id) > 0){ echo $result_n_ar->name_id; } else { echo ""; } ?></td>
                                <td><?php if(strlen($result_n_ar->given_names) > 0){ echo $result_n_ar->given_names; } else { echo ""; } ?> <?php if(strlen($result_n_ar->surname) > 0){ echo $result_n_ar->surname; } else { echo ""; } ?></td>
                            </tr>
                            <?php
                    }
                }
                elseif(isset($result_n->name_details) && count($result_n->name_details) == 1){
                    $result_n_ar = $result_n->name_details;
                    $change = $result_n_ar->name_id;
                    ?>
                        <tr class="dark" onClick="change_name('<?php echo $change; ?>')" title="">
                            <td id="<?php echo $change; ?>"><?php if(strlen($result_n_ar->name_id) > 0){ echo $result_n_ar->name_id; } else { echo ""; } ?></td>
                            <td><?php if(strlen($result_n_ar->given_names) > 0){ echo $result_n_ar->given_names; } else { echo ""; } ?> <?php if(strlen($result_n_ar->surname) > 0){ echo $result_n_ar->surname; } else { echo ""; } ?></td>
                        </tr>
                        <?php
                }
                ?>
                </tbody>
                </table>
        </div>
      </div>
   </div>