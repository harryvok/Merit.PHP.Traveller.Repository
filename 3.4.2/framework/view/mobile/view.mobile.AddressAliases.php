<script type="text/javascript">
 $(document).ready(function(){
	$('.alias').click(function(){
		var id = $(this).attr("id");
		var address_id = $("#al"+id+"-address_id").val();
		var type_txt = $("#al"+id+"-type_txt").val();
		var type_desc = $("#al"+id+"-type_desc").val();
		var type_cnt = $("#al"+id+"-type_cnt").val();
		var type_key = $("#al"+id+"-type_key").val();
		var type_code = $("#al"+id+"-type_code").val();
		GetAliasDetails_iphone(id,address_id,type_txt,type_desc,type_cnt,type_key,type_code);   
			
	 }); 
 });
</script>
<?php
 $result_alias = $GLOBALS['result']->alias_sum_det;
  ?>

    <ul class="no-ellipses" data-role="listview" id="listview" data-count-theme="b" data-inset="true">
        <?php
        if(isset($result_alias->alias_sum_details)  && count($result_alias->alias_sum_details) > 1){
            $number=0;
            foreach($result_alias->alias_sum_details as $result_a_as){
                $number=$number+1;
                ?>
                    <li>
                        <input id="al<?php echo $number; ?>-address_id" value="<?php echo $_GET['id']; ?>" type="hidden" />
                        <input id="al<?php echo $number ?>-type_txt" value="<?php echo $result_a_as->type_txt; ?>" type="hidden" />
                        <input id="al<?php echo $number ?>-type_desc" value="<?php echo $result_a_as->type_desc; ?>" type="hidden" />
                        <input id="al<?php echo $number ?>-type_cnt" value="<?php echo $result_a_as->type_cnt; ?>" type="hidden" />
                        <input id="al<?php echo $number ?>-type_key" value="<?php echo $result_a_as->type_key; ?>" type="hidden" />
                        <input id="al<?php echo $number ?>-type_code" value="<?php echo $result_a_as->type_code; ?>" type="hidden" />
                        
                        <a href="#" id="<?php echo $number; ?>" class="alias">
                        <?php echo $result_a_as->type_desc." - ".$result_a_as->type_key; ?> (<?php echo $result_a_as->type_cnt; ?>)
                        </a>
                    </li>
                    <li><a name="anchoral<?php echo $number ?>"></a></li>
                    <li id="showhide-<?php echo $number;?>" style="display: none;">
                    <div id="alias_details<?php echo $number ?>">
        
                    </div>
                    </li>
                    <?php
            }
        }
        elseif(isset($result_alias->alias_sum_details)  && count($result_alias->alias_sum_details) == 1){
            $result_a_as = $result_alias->alias_sum_details;
            $number=1;
            ?>
                <li>
                    
                        <input id="al<?php echo $number ?>-type_txt" value="<?php echo $result_a_as->type_txt; ?>" type="hidden" />
                        <input id="al<?php echo $number ?>-type_desc" value="<?php echo $result_a_as->type_desc; ?>" type="hidden" />
                        <input id="al<?php echo $number ?>-type_cnt" value="<?php echo $result_a_as->type_cnt; ?>" type="hidden" />
                        <input id="al<?php echo $number ?>-type_key" value="<?php echo $result_a_as->type_key; ?>" type="hidden" />
                        <input id="al<?php echo $number ?>-type_code" value="<?php echo $result_a_as->type_code; ?>" type="hidden" />
                        <input id="al<?php echo $number; ?>-address_id" value="<?php echo $_GET['id']; ?>" type="hidden" />
                        
                        <a href="#" id="<?php echo $number ?>" class="alias">
                       <?php echo $result_a_as->type_desc." - ".$result_a_as->type_key; ?> (<?php echo $result_a_as->type_cnt; ?>)
                        </a>
                    </li>
                    <a name="anchoral<?php echo $number ?>"></a>
                    <li id="showhide-<?php echo $number;?>" style="display: none;">
                    <div id="alias_details<?php echo $number ?>">
        
                    </div>
                    </li>
                <?php
        }
		else{
			"<li>No aliases found.</li>";	
		}
        unset($number);
        ?>
        
        
    </ul>