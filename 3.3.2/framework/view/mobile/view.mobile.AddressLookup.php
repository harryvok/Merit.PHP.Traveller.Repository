<?php
if(isset($GLOBALS['result']->address_list->address_lookup_det) && count($GLOBALS['result']->address_list->address_lookup_det) >0){
	?>
    
    <script type="text/javascript">
		
		$(document).ready(function() {
             
            $("#closeAddresses").click(function(){
				$("#nameLookup").show();
                $("#addressLookup").hide();
				$("#addressLookup").html("");
			});
        
		    $('.address_row').click(function(){
			    $('body').css('position', 'inherit');
			    $("body input").attr("disabled", false);
			    var id = $(this).attr('id');
			    $('#same').val('f');
			    changeLocationType();
			    $('#i_cno').val($('#ret_'+id+'_house_number').val());
			    $('#i_cfno').val($('#ret_'+id+'_house_suffix').val());
			    $('#i_cstreet').val($('#ret_'+id+'_street_name').val());
			    $('#i_ctype').val($('#ret_'+id+'_street_type').val());
			    $('#i_csuburb').val($('#ret_'+id+'_locality').val());
			    $('#cust_address_id').val($('#ret_'+id+'_address_id').val());
			    $('#cust_address_ctr').val($('#ret_'+id+'_address_ctr').val());
            
                var name_id = "<?php echo $_POST['name_set']; ?>";
				
				    $('#pref_title').val($('#ret_'+name_id+'_pref_title').val());
				    $('#surname').val($('#ret_'+name_id+'_surname').val());
				    $('#given').val($('#ret_'+name_id+'_given_names').val());
				    $('#cust_phone').val($('#ret_'+name_id+'_telephone').val());
				    $('#cust_work').val($('#ret_'+name_id+'_work_phone').val());
				    $('#cust_mobile').val($('#ret_'+name_id+'_mobile_no').val());
				    $('#email_address').val($('#ret_'+name_id+'_email_address').val());
				    $('#company').val($('#ret_'+name_id+'_company_name').val());
				    $('#name_id').val($('#ret_'+name_id+'_name_id').val());
				    $('#name_ctr').val($('#ret_'+name_id+'_name_ctr').val());
				    $('#name_origin').val($('#ret_'+name_id+'_name_origin').val());
				
                $("#popup").html("");
                
			    $('#popup').fadeOut("fast");
			
		    });
            
            $("#continue").click(function(){
                var name_id = "<?php echo $_POST['name_set']; ?>";
				
				    $('#pref_title').val($('#ret_'+name_id+'_pref_title').val());
				    $('#surname').val($('#ret_'+name_id+'_surname').val());
				    $('#given').val($('#ret_'+name_id+'_given_names').val());
				    $('#cust_phone').val($('#ret_'+name_id+'_telephone').val());
				    $('#cust_work').val($('#ret_'+name_id+'_work_phone').val());
				    $('#cust_mobile').val($('#ret_'+name_id+'_mobile_no').val());
				    $('#email_address').val($('#ret_'+name_id+'_email_address').val());
				    $('#company').val($('#ret_'+name_id+'_company_name').val());
				    $('#name_id').val($('#ret_'+name_id+'_name_id').val());
				    $('#name_ctr').val($('#ret_'+name_id+'_name_ctr').val());
				    $('#name_origin').val($('#ret_'+name_id+'_name_origin').val());
				
                $("#popup").html("");
                
			    $('#popup').fadeOut("fast");
            });
		});
        
        
	</script>
    <div id="closeAddresses" class="goBack">
		<h5> < Back</h5>
	</div> 
	<div class="popupTitle">
	    <h4>Found Addresses</h4>
	</div>
    <div id="closeNames" class="closePopup">
		 <h5><img src="images/close.png" /> Close</h5>
	 </div> 
      <hr class="popupHr" />
	<div class="popupContent">
	
    <ul class="pageitem">
            <li class="bigfield">
                <input type="text" placeholder="Search..." id="searchText" />
            </li>
        </ul>
    <ul class="pageitem">
        <li class="button"><input type="button" value="Continue without address" id="continue"></li>

    <?php
    $i=0;
    if(isset($GLOBALS['result']->address_list->address_lookup_det) && count($GLOBALS['result']->address_list->address_lookup_det) > 1){
        foreach($GLOBALS['result']->address_list->address_lookup_det as $result_n_ar){
            $set = $result_n_ar->address_id;
            ?>
            <input type="hidden" id="ret_<?php echo $set; ?>_address_id" value="<?php if(isset($result_n_ar->address_id)){ echo $result_n_ar->address_id; } else { echo ""; } ?>" />
           <input type="hidden" id="ret_<?php echo $set; ?>_house_suffix" value="<?php if(isset($result_n_ar->house_suffix) && $result_n_ar->house_suffix != $result_n_ar->house_number){ echo $result_n_ar->house_suffix; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_house_number" value="<?php if(isset($result_n_ar->house_number)){ echo $result_n_ar->house_number; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_street_name" value="<?php if(isset($result_n_ar->street_name)){ echo $result_n_ar->street_name; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_street_type" value="<?php if(isset($result_n_ar->street_type)){ echo $result_n_ar->street_type; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_locality" value="<?php if(isset($result_n_ar->locality)){ echo $result_n_ar->locality; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_postcode" value="<?php if(isset($result_n_ar->postcode)){ echo $result_n_ar->postcode; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_property_no" value="<?php if(isset($result_n_ar->property_no)){ echo $result_n_ar->property_no; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_address_ctr" value="<?php if(isset($result_n_ar->address_ctr)){ echo $result_n_ar->address_ctr; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_confidential" value="<?php if(isset($result_n_ar->confidential)){ echo $result_n_ar->confidential; } else { echo ""; } ?>" />
                <li class="textbox address_row" id="<?php echo $set; ?>">
                	<div class="searchObject" id="searchObject<?php echo $i; ?>">
                    <?php if(isset($result_n_ar->house_suffix) && strlen($result_n_ar->house_suffix) > 0 && isset($result_n_ar->house_number) && strlen($result_n_ar->house_number) > 0 && $result_n_ar->house_number != $result_n_ar->house_suffix){ ?><b>Unit/Flat Number: </b> <?php  echo $result_n_ar->house_suffix."<br>"; } else { echo ""; } ?>
                    <?php if(isset($result_n_ar->house_number) && strlen($result_n_ar->house_number) > 0){ ?><b>House Number:</b> <?php  echo $result_n_ar->house_number."<br>"; } else { echo ""; } ?>
                   <?php if(isset($result_n_ar->street_name) && strlen($result_n_ar->street_name) > 0){ ?><b>Street Name:</b> <?php echo $result_n_ar->street_name."<br>"; } else { echo ""; } ?>
                    <?php if(isset($result_n_ar->street_type) && strlen($result_n_ar->street_type) > 0){ ?><b>Street Type:</b> <?php echo $result_n_ar->street_type."<br>"; } else { echo ""; } ?>
                    <?php if(isset($result_n_ar->locality) && strlen($result_n_ar->locality) > 0){ ?><b>Suburb:</b> <?php echo $result_n_ar->locality."<br>"; } else { echo ""; } ?>
                    <?php  if(isset($result_n_ar->postcode) && strlen($result_n_ar->postcode) > 0){ ?><b>Postcode:</b> <?php echo $result_n_ar->postcode; } else { echo ""; } ?>               
                    </div>
                  </li>
                <?php
            $i++;
        }
    }
    elseif(isset($GLOBALS['result']->address_list->address_lookup_det) && count($GLOBALS['result']->address_list->address_lookup_det) == 1){
        $result_n_ar = $GLOBALS['result']->address_list->address_lookup_det;
        $set = $result_n_ar->address_id;
        ?>
         <input type="hidden" id="ret_<?php echo $set; ?>_address_id" value="<?php if(isset($result_n_ar->address_id)){ echo $result_n_ar->address_id; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_house_suffix" value="<?php if(isset($result_n_ar->house_suffix) && $result_n_ar->house_suffix != $result_n_ar->house_number){ echo $result_n_ar->house_suffix; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_house_number" value="<?php if(isset($result_n_ar->house_number)){ echo $result_n_ar->house_number; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_street_name" value="<?php if(isset($result_n_ar->street_name)){ echo $result_n_ar->street_name; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_street_type" value="<?php if(isset($result_n_ar->street_type)){ echo $result_n_ar->street_type; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_locality" value="<?php if(isset($result_n_ar->locality)){ echo $result_n_ar->locality; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_postcode" value="<?php if(isset($result_n_ar->postcode)){ echo $result_n_ar->postcode; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_property_no" value="<?php if(isset($result_n_ar->property_no)){ echo $result_n_ar->property_no; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_address_ctr" value="<?php if(isset($result_n_ar->address_ctr)){ echo $result_n_ar->address_ctr; } else { echo ""; } ?>" />
            <input type="hidden" id="ret_<?php echo $set; ?>_confidential" value="<?php if(isset($result_n_ar->confidential)){ echo $result_n_ar->confidential; } else { echo ""; } ?>" />
             <li class="textbox address_row" id="<?php echo $set; ?>">
             	<div class="searchObject" id="searchObject0">
                 <?php if(isset($result_n_ar->house_suffix) && strlen($result_n_ar->house_suffix) > 0 && isset($result_n_ar->house_number) && strlen($result_n_ar->house_number) > 0 && $result_n_ar->house_number != $result_n_ar->house_suffix){ ?><b>Unit/Flat Number: </b> <?php  echo $result_n_ar->house_suffix."<br>"; } else { echo ""; } ?>
                    <?php if(isset($result_n_ar->house_number) && strlen($result_n_ar->house_number) > 0){ ?><b>House Number:</b> <?php  echo $result_n_ar->house_number."<br>"; } else { echo ""; } ?>
                   <?php if(isset($result_n_ar->street_name) && strlen($result_n_ar->street_name) > 0){ ?><b>Street Name:</b> <?php echo $result_n_ar->street_name."<br>"; } else { echo ""; } ?>
                    <?php if(isset($result_n_ar->street_type) && strlen($result_n_ar->street_type) > 0){ ?><b>Street Type:</b> <?php echo $result_n_ar->street_type."<br>"; } else { echo ""; } ?>
                    <?php if(isset($result_n_ar->locality) && strlen($result_n_ar->locality) > 0){ ?><b>Suburb:</b> <?php echo $result_n_ar->locality."<br>"; } else { echo ""; } ?>
                    <?php  if(isset($result_n_ar->postcode) && strlen($result_n_ar->postcode) > 0){ ?><b>Postcode:</b> <?php echo $result_n_ar->postcode; } else { echo ""; } ?>               
                   </div>
                  </li>
            <?php
    }
    ?>
    </ul>
    <div>



<?php
}
else{
?>
<script type="text/javascript">
	$(document).ready(function(){
		$("body input").attr("disabled", false);
        var name_id = "<?php echo $_POST['name_set']; ?>";
				
				    $('#pref_title').val($('#ret_'+name_id+'_pref_title').val());
				    $('#surname').val($('#ret_'+name_id+'_surname').val());
				    $('#given').val($('#ret_'+name_id+'_given_names').val());
				    $('#cust_phone').val($('#ret_'+name_id+'_telephone').val());
				    $('#cust_work').val($('#ret_'+name_id+'_work_phone').val());
				    $('#cust_mobile').val($('#ret_'+name_id+'_mobile_no').val());
				    $('#email_address').val($('#ret_'+name_id+'_email_address').val());
				    $('#company').val($('#ret_'+name_id+'_company_name').val());
				    $('#name_id').val($('#ret_'+name_id+'_name_id').val());
				    $('#name_ctr').val($('#ret_'+name_id+'_name_ctr').val());
				    $('#name_origin').val($('#ret_'+name_id+'_name_origin').val());
				
            $("#popup").html("");
                
			    $('#popup').fadeOut("fast");
	});
</script>
<?php
}
?>
