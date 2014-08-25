<script type="text/javascript">
 $(document).ready(function(){
	 $('.assoc').click(function(){
		 var id = $(this).attr("id");
		var address_id = $("#asso"+id+"-address_id").val();
		var type_txt = $("#asso"+id+"-type_txt").val();
		var type_desc = $("#asso"+id+"-type_desc").val();
		var type_cnt = $("#asso"+id+"-type_cnt").val();
		var type_key = $("#asso"+id+"-type_key").val();
		var type_code = $("#asso"+id+"-type_code").val();
		var form_name = $("#asso"+id+"-form_name").val();
		var key_name = $("#asso"+id+"-key_name").val();
		GetAssociationDetails_iphone(id,type_txt,type_desc,type_cnt,type_key,type_code,form_name,key_name,address_id);   
			
	 });
 });
</script>
<?php
        $result_asso = $GLOBALS['result']->assoc_sum_det;
        ?>
 
    <ul class="no-ellipses" data-role="listview" id="listview" data-count-theme="b" data-inset="true">
        <?php
        if(isset($result_asso->assoc_sum_details)  && count($result_asso->assoc_sum_details) > 1){
            $number=0;
            foreach($result_asso->assoc_sum_details as $result_a_as){
                $number=$number+1;
                ?>
                    <li>
                        
                        <input id="asso<?php echo $number ?>-type_txt" value="<?php echo $result_a_as->type_txt; ?>" type="hidden" />
                        <input id="asso<?php echo $number ?>-type_desc" value="<?php echo $result_a_as->type_desc; ?>" type="hidden" />
                        <input id="asso<?php echo $number ?>-type_cnt" value="<?php echo $result_a_as->type_cnt; ?>" type="hidden" />
                        <input id="asso<?php echo $number ?>-type_key" value="<?php echo $result_a_as->type_key; ?>" type="hidden" />
                        <input id="asso<?php echo $number ?>-type_code" value="<?php echo $result_a_as->type_code; ?>" type="hidden" />
                       <input id="asso<?php echo $number ?>-form_name" value="<?php echo $result_a_as->form_name; ?>" type="hidden" />
                        <input id="asso<?php echo $number ?>-key_name" value="<?php echo $result_a_as->key_name; ?>" type="hidden" />
                        <input id="asso<?php echo $number; ?>-address_id" value="<?php echo $_GET['id']; ?>" type="hidden" />

                        <a href="#" id="<?php echo $number; ?>" class="assoc">
                        <?php echo $result_a_as->type_desc." - ".$result_a_as->type_key; ?> (<?php echo $result_a_as->type_cnt; ?>)
                        </a>
                        
                    </li>
                    <a name="anchorass<?php echo $number ?>"></a>
                    <li id="showhide-<?php echo $number;?>" style="display: none;">
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
                <li>
                    
                        <input id="asso<?php echo $number ?>-type_txt" value="<?php echo $result_a_as->type_txt; ?>" type="hidden" />
                        <input id="asso<?php echo $number ?>-type_desc" value="<?php echo $result_a_as->type_desc; ?>" type="hidden" />
                        <input id="asso<?php echo $number ?>-type_cnt" value="<?php echo $result_a_as->type_cnt; ?>" type="hidden" />
                        <input id="asso<?php echo $number ?>-type_key" value="<?php echo $result_a_as->type_key; ?>" type="hidden" />
                        <input id="asso<?php echo $number ?>-type_code" value="<?php echo $result_a_as->type_code; ?>" type="hidden" />
                        <input id="asso<?php echo $number ?>-form_name" value="<?php echo $result_a_as->form_name; ?>" type="hidden" />
                        <input id="asso<?php echo $number ?>-key_name" value="<?php echo $result_a_as->key_name; ?>" type="hidden" />
                        <input id="asso<?php echo $number; ?>-address_id" value="<?php echo $_GET['id']; ?>" type="hidden" />
                        <a id="<?php echo $number ?>" class="assoc">
                        <?php echo $result_a_as->type_desc." - ".$result_a_as->type_key; ?> (<?php echo $result_a_as->type_cnt; ?>)
                        </a>
                    </li>
                    <a href="#" name="anchorass<?php echo $number ?>"></a>
                    <li id="showhide-<?php echo $number;?>" style="display: none;">
                        <div id="association_details<?php echo $number ?>">
            
                        </div>
                    </li>
                <?php
        }
        unset($number);
        ?>
        
        
    </ul>
