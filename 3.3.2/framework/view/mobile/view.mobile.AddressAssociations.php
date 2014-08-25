<span class="graytitle">Associations</span>
<div id="AssociationsShow">
    <ul class="pageitem">
        <li class="button">
        <?php
        $result_asso = $GLOBALS['result']->assoc_sum_det;
        ?>
            <input type="button" value="Show (<?php if(isset($result_asso->assoc_sum_details)){ echo count($result_asso->assoc_sum_details); } else { echo 0; } ?>)" id="Associations" class="openSection" />
        </li>
    </ul>
    </div>
<div id="AssociationsSection" style="display:none;">
    <ul class="pageitem">
        
        <?php
        if(isset($result_asso->assoc_sum_details)  && count($result_asso->assoc_sum_details) > 1){
            $number=0;
            foreach($result_asso->assoc_sum_details as $result_a_as){
                $number=$number+1;
                ?>
                    <li class="menu">
                        
                        <input id="asso<?php echo $number ?>-type_txt" value="<?php echo $result_a_as->type_txt; ?>" type="hidden" />
                        <input id="asso<?php echo $number ?>-type_desc" value="<?php echo $result_a_as->type_desc; ?>" type="hidden" />
                        <input id="asso<?php echo $number ?>-type_cnt" value="<?php echo $result_a_as->type_cnt; ?>" type="hidden" />
                        <input id="asso<?php echo $number ?>-type_key" value="<?php echo $result_a_as->type_key; ?>" type="hidden" />
                        <input id="asso<?php echo $number ?>-type_code" value="<?php echo $result_a_as->type_code; ?>" type="hidden" />
                       <input id="asso<?php echo $number ?>-form_name" value="<?php echo $result_a_as->form_name; ?>" type="hidden" />
                        <input id="asso<?php echo $number ?>-key_name" value="<?php echo $result_a_as->key_name; ?>" type="hidden" />
                        <input id="asso<?php echo $number; ?>-address_id" value="<?php echo $_GET['id']; ?>" type="hidden" />

                        <a id="<?php echo $number; ?>" class="assoc" href="#anchorass<?php echo $number ?>">
                        <span class="name"><?php echo $result_a_as->type_desc." - ".$result_a_as->type_key; ?> (<?php echo $result_a_as->type_cnt; ?>)</span><span class="arrow"></span>
                        </a>
                        
                    </li>
                    <a name="anchorass<?php echo $number ?>"></a>
                    <li class="textbox">
                        <div id="association_details<?php echo $number ?>">
            
                        </div>
                    </li>
                    <?php
            }
        }
        elseif(isset($result_asso->assoc_sum_details)  && count($result_asso->assoc_sum_details) == 1){
            $result_a_as = $result_asso->assoc_sum_details;
            $number=1;
            ?>
                <li class="menu">
                    
                        <input id="asso<?php echo $number ?>-type_txt" value="<?php echo $result_a_as->type_txt; ?>" type="hidden" />
                        <input id="asso<?php echo $number ?>-type_desc" value="<?php echo $result_a_as->type_desc; ?>" type="hidden" />
                        <input id="asso<?php echo $number ?>-type_cnt" value="<?php echo $result_a_as->type_cnt; ?>" type="hidden" />
                        <input id="asso<?php echo $number ?>-type_key" value="<?php echo $result_a_as->type_key; ?>" type="hidden" />
                        <input id="asso<?php echo $number ?>-type_code" value="<?php echo $result_a_as->type_code; ?>" type="hidden" />
                        <input id="asso<?php echo $number ?>-form_name" value="<?php echo $result_a_as->form_name; ?>" type="hidden" />
                        <input id="asso<?php echo $number ?>-key_name" value="<?php echo $result_a_as->key_name; ?>" type="hidden" />
                        <input id="asso<?php echo $number; ?>-address_id" value="<?php echo $_GET['id']; ?>" type="hidden" />
                        <a id="<?php echo $number ?>" class="assoc" href="#anchorass<?php echo $number ?>">
                        <span class="name"><?php echo $result_a_as->type_desc." - ".$result_a_as->type_key; ?> (<?php echo $result_a_as->type_cnt; ?>)</span><span class="arrow"></span>
                        </a>
                    </li>
                    <a name="anchorass<?php echo $number ?>"></a>
                    <li class="textbox">
                        <div id="association_details<?php echo $number ?>">
            
                        </div>
                    </li>
                <?php
        }
        unset($number);
        ?>
        
        <li class="button">
            <input type="button" value="Hide" class="closeSection" id="Associations" /
        </li>
    </ul>
    </div>