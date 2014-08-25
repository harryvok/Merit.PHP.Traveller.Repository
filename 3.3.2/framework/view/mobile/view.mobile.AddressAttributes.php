<span class="graytitle">Attributes</span>
<div id="AttributesShow">
    <ul class="pageitem">
        <li class="button">
        <?php
        $result_attrib = $GLOBALS['result']->attrib_sum_det;
        ?>
            <input type="button" value="Show (<?php if(isset($result_attrib->attrib_sum_details)){ echo count($result_attrib->attrib_sum_details); } else { echo 0; } ?>)"  class="openSection" id="Attributes" />
        </li>
    </ul>
    </div>
<div id="AttributesSection" style="display:none;">
    <ul class="pageitem">
        
        <?php
        if(isset($result_attrib->attrib_sum_details)  && count($result_attrib->attrib_sum_details) > 1){
            $number=0;
            foreach($result_attrib->attrib_sum_details as $result_a_as){
                $number=$number+1;
                ?>
                    <li class="menu">
                        <input id="attr<?php echo $number; ?>-address_id" value="<?php echo $_GET['id']; ?>" type="hidden" />
                        <input id="attr<?php echo $number ?>-type_txt" value="<?php echo $result_a_as->type_txt; ?>" type="hidden" />
                        <input id="attr<?php echo $number ?>-type_desc" value="<?php echo $result_a_as->type_desc; ?>" type="hidden" />
                        <input id="attr<?php echo $number ?>-type_cnt" value="<?php echo $result_a_as->type_cnt; ?>" type="hidden" />
                        <input id="attr<?php echo $number ?>-type_key" value="<?php echo $result_a_as->type_key; ?>" type="hidden" />
                        <input id="attr<?php echo $number ?>-type_code" value="<?php echo $result_a_as->type_code; ?>" type="hidden" />
                        <input id="attr<?php echo $number ?>-status_ind" value="<?php echo $result_a_as->status_ind; ?>" type="hidden" />
                        
                        <a id="<?php echo $number; ?>" class="attribute" href="#anchoratt<?php echo $number;?>" onclick="return false;">
                       <span class="name"><?php echo $result_a_as->type_desc." - ".$result_a_as->type_key; ?> (<?php echo $result_a_as->type_cnt; ?>)</span><span class="arrow"></span>
                        </a>
                    </li>
                    <a name="anchoratt<?php echo $number;?>"></a>
                    <li class="textbox">
                    <div id="attribute_details<?php echo $number;?>">
        
                    </div>
                    </li>
                    <?php
            }
        }
        elseif(isset($result_attrib->attrib_sum_details)  && count($result_attrib->attrib_sum_details) == 1){
            $result_a_as = $result_attrib->attrib_sum_details;
            $number=1;
            ?>
                <li class="menu">
                    <input id="attr<?php echo $number; ?>-address_id" value="<?php echo $_GET['id']; ?>" type="hidden" />
                        <input id="attr<?php echo $number ?>-type_txt" value="<?php echo $result_a_as->type_txt; ?>" type="hidden" />
                        <input id="attr<?php echo $number ?>-type_desc" value="<?php echo $result_a_as->type_desc; ?>" type="hidden" />
                        <input id="attr<?php echo $number ?>-type_cnt" value="<?php echo $result_a_as->type_cnt; ?>" type="hidden" />
                        <input id="attr<?php echo $number ?>-type_key" value="<?php echo $result_a_as->type_key; ?>" type="hidden" />
                        <input id="attr<?php echo $number ?>-type_code" value="<?php echo $result_a_as->type_code; ?>" type="hidden" />
                         <input id="attr<?php echo $number ?>-status_ind" value="<?php echo $result_a_as->status_ind; ?>" type="hidden" />
                         
                        <a id="<?php echo $number ?>" class="attribute" href="#anchoratt<?php echo $number;?>" onclick="return false;">
                        <span class="name"><?php echo $result_a_as->type_desc." - ".$result_a_as->type_key; ?> (<?php echo $result_a_as->type_cnt; ?>)</span><span class="arrow"></span>
                        </a>
                    </li>
                    <a name="anchoratt<?php echo $number;?>"></a>
                    <li class="textbox">
                    <div id="attribute_details<?php echo $number;?>">
        
                    </div>
                    </li>
                <?php
        }
        unset($number);
        ?>
        
        <li class="button">
            <input type="button" value="Hide" class="closeSection" id="Attributes" />
        </li>
    </ul>
    </div>