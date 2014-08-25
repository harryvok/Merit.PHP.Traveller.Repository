
<?php

if(isset($GLOBALS['result']->name_search_det->name_search) && count($GLOBALS['result']->name_search_det->name_search) >0){
	?>
    <div id="lookupWrapper">
    <div id="scroller">
    <div id="nameLookup">
     
        <script type="text/javascript">
		    $(document).ready(function() {
              
			    $('#popup').fadeIn("fast");
                if(!supports('webkitOverflowScrolling')){
                    if(myScroll == undefined){
                        var myScroll = new iScroll('lookupWrapper');
                     }
                     else{
                        myScroll.destroy();
                        var myScroll = new iScroll('lookupWrapper');
                     }
                }
                
                
		    });
            $('.name_row').click(function(){
			        var id = $(this).attr('id');
			        $.ajax({
				        url: 'inc/ajax/ajax.getAddresses.php',
				        type: 'post',
				        data: {
					        name_set: id,
					        name_origin: $('#ret_'+id+'_name_origin').val(), 
					        name_id: $('#ret_'+id+'_name_id').val(), 
					        name_ctr: $('#ret_'+id+'_name_ctr').val(), 
				        },
				        success: function(data) {
                             $("#nameLookup").hide();
                             $("#addressLookup").html(data);
					        $("#addressLookup").show();
				        }
			        });
		        });
		    
	    </script>
    
	    <div class="popupTitle">
	        <h4>Found Names</h4>
	    </div>
        <div id="closeNames" class="closePopup">
		     <h5><img src="images/close.png" /> Close</h5>
	     </div> 
        <hr class="popupHr" />
        <ul class="pageitem">
                <li class="bigfield">
                    <input type="text" placeholder="Search..." id="searchText" />
                </li>
            </ul>
	    <div  class="popupContent">
	    
        <ul class="pageitem">
    
        <?php
    $i=0;
    if(isset($GLOBALS['result']->name_search_det->name_search) && count($GLOBALS['result']->name_search_det->name_search) > 1){
        foreach($GLOBALS['result']->name_search_det->name_search as $result_n_ar){
            $set = $result_n_ar->name_id;
            
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
                   <li class="textbox name_row" id="<?php echo $set; ?>">
               	    <div class="searchObject" id="searchObject<?php echo $i; ?>">
                        <?php if(isset($result_n_ar->name_origin) && strlen($result_n_ar->name_origin) > 0){ ?><b>Origin:</b> <?php  echo $result_n_ar->name_origin."<br>"; } else { echo ""; } ?>
                        <?php if(isset($result_n_ar->given_names) && strlen($result_n_ar->given_names) > 0 || isset($result_n_ar->surname) && strlen($result_n_ar->surname) > 0){ ?><b>Name:</b> <?php  echo $result_n_ar->given_names." ".$result_n_ar->surname."<br>"; } else { echo ""; } ?>
                       <?php if(isset($result_n_ar->telephone) && strlen($result_n_ar->telephone) > 0){ ?><b>Phone:</b> <?php echo $result_n_ar->telephone."<br>"; } else { echo ""; } ?>
                        <?php if(isset($result_n_ar->work_phone) && strlen($result_n_ar->work_phone) > 0){ ?><b>Work Phone:</b> <?php echo $result_n_ar->work_phone."<br>"; } else { echo ""; } ?>
                        <?php if(isset($result_n_ar->mobile_no) && strlen($result_n_ar->mobile_no) > 0){ ?><b>Mobile No:</b> <?php echo $result_n_ar->mobile_no."<br>"; } else { echo ""; } ?>
                        <?php  if(isset($result_n_ar->email_address) && strlen($result_n_ar->email_address) > 0){ ?><b>Email:</b> <?php echo $result_n_ar->email_address."<br>"; } else { echo ""; } ?>
                        <?php if(isset($result_n_ar->company_name) && strlen($result_n_ar->company_name) > 0){ ?><b>Company Name:</b> <?php echo $result_n_ar->company_name."<br>"; } else { echo ""; } ?>
                      </div>
                    </li>
                    <?php
            $i++;
        }
    }
    elseif(isset($GLOBALS['result']->name_search_det->name_search) && count($GLOBALS['result']->name_search_det->name_search) == 1){
        $result_n_ar = $GLOBALS['result']->name_search_det->name_search;
        $set = $result_n_ar->name_id;
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
           	    <li class="textbox name_row" id="<?php echo $set; ?>">
            	    <div cclass="searchObject" id="searchObject0">
                        <?php if(isset($result_n_ar->name_origin) && strlen($result_n_ar->name_origin) > 0){ ?><b>Origin:</b> <?php  echo $result_n_ar->name_origin."<br>"; } else { echo ""; } ?>
                        <?php if(isset($result_n_ar->given_names) && strlen($result_n_ar->given_names) > 0 || isset($result_n_ar->surname) && strlen($result_n_ar->surname) > 0){ ?><b>Name:</b> <?php  echo $result_n_ar->given_names." ".$result_n_ar->surname."<br>"; } else { echo ""; } ?>
                       <?php if(isset($result_n_ar->telephone) && strlen($result_n_ar->telephone) > 0){ ?><b>Phone:</b> <?php echo $result_n_ar->telephone."<br>"; } else { echo ""; } ?>
                        <?php if(isset($result_n_ar->work_phone) && strlen($result_n_ar->work_phone) > 0){ ?><b>Work Phone:</b> <?php echo $result_n_ar->work_phone."<br>"; } else { echo ""; } ?>
                        <?php if(isset($result_n_ar->mobile_no) && strlen($result_n_ar->mobile_no) > 0){ ?><b>Mobile No:</b> <?php echo $result_n_ar->mobile_no."<br>"; } else { echo ""; } ?>
                        <?php  if(isset($result_n_ar->email_address) && strlen($result_n_ar->email_address) > 0){ ?><b>Email:</b> <?php echo $result_n_ar->email_address."<br>"; } else { echo ""; } ?>
                        <?php if(isset($result_n_ar->company_name) && strlen($result_n_ar->company_name) > 0){ ?><b>Company Name:</b> <?php echo $result_n_ar->company_name."<br>"; } else { echo ""; } ?>
                      </div>
                    </li>
                <?php
    }
        ?>
    </ul>
    </div>
    </div>
    <div id="addressLookup">
    </div>
    </div>
    </div>
<?php
}
else{
?>
<script type="text/javascript">
	$(document).ready(function(){
		$("body input").attr("disabled", false);
	});
</script>
<?php
}
?>
