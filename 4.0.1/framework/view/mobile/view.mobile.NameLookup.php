<?php

if(isset($GLOBALS['result']->name_search_det->name_search) && count($GLOBALS['result']->name_search_det->name_search) >0){
	?>
    <script type="text/javascript">
	 $(document).ready(function(){
	    $("#popup").popup("open");	     
	    $("#default").page('destroy').page();	     
		$('.name_row').click(function(){
			var id = $(this).attr('id');
			$('#pref_title').val($('#ret_'+id+'_pref_title').val());
			$('#surname').val($('#ret_'+id+'_surname').val());
			$('#given').val($('#ret_'+id+'_given_names').val());
			$('#cust_phone').val($('#ret_'+id+'_telephone').val());
			$('#cust_work').val($('#ret_'+id+'_work_phone').val());
			$('#cust_mobile').val($('#ret_'+id+'_mobile_no').val());
			$('#email_address').val($('#ret_'+id+'_email_address').val());
			$('#company').val($('#ret_'+id+'_company_name').val());
			$('#name_id').val($('#ret_'+id+'_name_id').val());
			$('#name_ctr').val($('#ret_'+id+'_name_ctr').val());
			$('#name_origin').val($('#ret_' + id + '_name_origin').val());
			$('#old_pref_title').val($('#ret_' + id + '_pref_title').val());
			$('#old_given').val($('#ret_' + id + '_given_names').val());
			$('#old_surname').val($('#ret_' + id + '_surname').val());
			$('#old_cust_phone').val($('#ret_' + id + '_telephone').val());
			$('#old_cust_work').val($('#ret_' + id + '_work_phone').val());
			$('#old_cust_mobile').val($('#ret_' + id + '_mobile_no').val());
			$('#old_email_address').val($('#ret_' + id + '_email_address').val());
			$('#old_company').val($('#ret_' + id + '_company_name').val());
			$("#popup").popup("close");
			$.ajax({
				url:'inc/ajax/ajax.getAddresses.php',
				type: 'post',
				data: {
					
					name_origin: $('#ret_'+id+'_name_origin').val(), 
					name_id: $('#ret_'+id+'_name_id').val(), 
					name_ctr: $('#ret_' + id + '_name_ctr').val(),
					name_origin_code: $('#ret_' + id + '_name_origin_code').val(),
				},
				success: function(data) {
				    if (data) {
				        $('#popup').html(data);
				        $("#popup").popup("open");
				    }
					$("#default").page('destroy').page();
				}				
			});
		});
	 });
	</script>
	<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left">Close</a>
    <div data-role="header" data-tap-toggle="false">
        <h1>Found Names</h1>
    </div>
    <div data-role="content">
    	<p>
        <ul data-role="listview" data-filter="true" data-filter-placeholder="Search names..." data-inset="true">
    <?php
    $i = 0;
    if(isset($GLOBALS['result']->name_search_det->name_search) && count($GLOBALS['result']->name_search_det->name_search) > 1){
        foreach($GLOBALS['result']->name_search_det->name_search as $result_n_ar){
            $i++;
            $set = "namerow_".$i;
            
            ?>
            <input type="hidden" id="ret_<?php echo $set; ?>_name_origin" value="<?php if(isset($result_n_ar->name_origin)){ echo $result_n_ar->name_origin; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_name_ctr" value="<?php if(isset($result_n_ar->name_ctr)){ echo $result_n_ar->name_ctr; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_name_id" value="<?php if(isset($result_n_ar->name_id)){ echo $result_n_ar->name_id; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_surname" value="<?php if(isset($result_n_ar->surname)){ echo $result_n_ar->surname; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_given_names" value="<?php if(isset($result_n_ar->given_names)){ echo $result_n_ar->given_names; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_pref_title" value="<?php if(isset($result_n_ar->pref_title)){ echo $result_n_ar->pref_title; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_telephone" value="<?php if(isset($result_n_ar->telephone)){ echo $result_n_ar->telephone; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_work_phone" value="<?php if(isset($result_n_ar->work_phone)){ echo $result_n_ar->work_phone; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_mobile_no" value="<?php if(isset($result_n_ar->mobile_no)){ echo $result_n_ar->mobile_no; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_email_address" value="<?php if(isset($result_n_ar->email_address)){ echo $result_n_ar->email_address; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_company_name" value="<?php if(isset($result_n_ar->company_name)){ echo $result_n_ar->company_name; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_name_origin_code" value="<?php if(isset($result_n_ar->name_origin_code)){ echo $result_n_ar->name_origin_code; } else { echo ""; } ?>" />
               <li class="name_row" id="<?php echo $set; ?>">
               	<a>
                    <?php if(isset($result_n_ar->name_origin) && strlen($result_n_ar->name_origin) > 0){ ?>
                        <p><b>Origin:</b>
                        <?php  echo $result_n_ar->name_origin."</p>"; 
                          } else {
                              echo ""; 
                          } ?>
                    <?php if(isset($result_n_ar->given_names) && strlen($result_n_ar->given_names) > 0 || isset($result_n_ar->surname) && strlen($result_n_ar->surname) > 0){ ?><p><b>Name:</b> <?php  echo $result_n_ar->given_names." ".$result_n_ar->surname."</p>"; } else { echo ""; } ?>
                   <?php if(isset($result_n_ar->telephone) && strlen($result_n_ar->telephone) > 0){ ?><p><b>Phone:</b> <?php echo $result_n_ar->telephone."</p>"; } else { echo ""; } ?>
                    <?php if(isset($result_n_ar->work_phone) && strlen($result_n_ar->work_phone) > 0){ ?><p><b>Work Phone:</b> <?php echo $result_n_ar->work_phone."</p>"; } else { echo ""; } ?>
                    <?php if(isset($result_n_ar->mobile_no) && strlen($result_n_ar->mobile_no) > 0){ ?><p><b>Mobile No:</b> <?php echo $result_n_ar->mobile_no."</p>"; } else { echo ""; } ?>
                    <?php  if(isset($result_n_ar->email_address) && strlen($result_n_ar->email_address) > 0){ ?><p><b>Email:</b> <?php echo $result_n_ar->email_address."</p>"; } else { echo ""; } ?>
                    <?php if(isset($result_n_ar->company_name) && strlen($result_n_ar->company_name) > 0){ ?><p><b>Company Name:</b> <?php echo $result_n_ar->company_name."</p>"; } else { echo ""; } ?>
                </a> 
                </li>
                <?php
				$i++;
        }
    }
    elseif(isset($GLOBALS['result']->name_search_det->name_search) && count($GLOBALS['result']->name_search_det->name_search) == 1){
        $result_n_ar = $GLOBALS['result']->name_search_det->name_search;
        $i++;
        $set = "namerow_00";
        ?>
        <input type="hidden" id="ret_<?php echo $set; ?>_name_origin" value="<?php if(isset($result_n_ar->name_origin)){ echo $result_n_ar->name_origin; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_name_ctr" value="<?php if(isset($result_n_ar->name_ctr)){ echo $result_n_ar->name_ctr; } else { echo ""; } ?>" />
        <input type="hidden" id="ret_<?php echo $set; ?>_name_id" value="<?php if(isset($result_n_ar->name_id)){ echo $result_n_ar->name_id; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_surname" value="<?php if(isset($result_n_ar->surname)){ echo $result_n_ar->surname; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_given_names" value="<?php if(isset($result_n_ar->given_names)){ echo $result_n_ar->given_names; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_pref_title" value="<?php if(isset($result_n_ar->pref_title)){ echo $result_n_ar->pref_title; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_telephone" value="<?php if(isset($result_n_ar->telephone)){ echo $result_n_ar->telephone; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_work_phone" value="<?php if(isset($result_n_ar->work_phone)){ echo $result_n_ar->work_phone; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_mobile_no" value="<?php if(isset($result_n_ar->mobile_no)){ echo $result_n_ar->mobile_no; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_email_address" value="<?php if(isset($result_n_ar->email_address)){ echo $result_n_ar->email_address; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_company_name" value="<?php if(isset($result_n_ar->company_name)){ echo $result_n_ar->company_name; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_name_origin_code" value="<?php if(isset($result_n_ar->name_origin_code)){ echo $result_n_ar->name_origin_code; } else { echo ""; } ?>" />
           	<li class="name_row" id="<?php echo $set; ?>">
				<a>
                     <?php if(isset($result_n_ar->name_origin) && strlen($result_n_ar->name_origin) > 0){ ?><p><b>Origin:</b> <?php  echo $result_n_ar->name_origin."</p>"; } else { echo ""; } ?>
                    <?php if(isset($result_n_ar->given_names) && strlen($result_n_ar->given_names) > 0 || isset($result_n_ar->surname) && strlen($result_n_ar->surname) > 0){ ?><p><b>Name:</b> <?php  echo $result_n_ar->given_names." ".$result_n_ar->surname."</p>"; } else { echo ""; } ?>
                   <?php if(isset($result_n_ar->telephone) && strlen($result_n_ar->telephone) > 0){ ?><p><b>Phone:</b> <?php echo $result_n_ar->telephone."</p>"; } else { echo ""; } ?>
                    <?php if(isset($result_n_ar->work_phone) && strlen($result_n_ar->work_phone) > 0){ ?><p><b>Work Phone:</b> <?php echo $result_n_ar->work_phone."</p>"; } else { echo ""; } ?>
                    <?php if(isset($result_n_ar->mobile_no) && strlen($result_n_ar->mobile_no) > 0){ ?><p><b>Mobile No:</b> <?php echo $result_n_ar->mobile_no."</p>"; } else { echo ""; } ?>
                    <?php  if(isset($result_n_ar->email_address) && strlen($result_n_ar->email_address) > 0){ ?><p><b>Email:</b> <?php echo $result_n_ar->email_address."</p>"; } else { echo ""; } ?>
                    <?php if(isset($result_n_ar->company_name) && strlen($result_n_ar->company_name) > 0){ ?><p><b>Company Name:</b> <?php echo $result_n_ar->company_name."</p>"; } else { echo ""; } ?>
                  </a>
                </li>
            <?php
    }
    ?>
</ul>
</div>

<?php
}
?>
