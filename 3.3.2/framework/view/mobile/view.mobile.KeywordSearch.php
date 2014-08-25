<?php
if(isset($GLOBALS['result']->keyword_result_details) && count($GLOBALS['result']->keyword_result_details) >1){
	?>
    <script type="text/javascript">
		
		$(document).ready(function() {
			$('#popup').fadeIn("fast");
            if(!supports("-webkit-overflow-scrolling")){
                var myScroll = new iScroll('lookupWrapper');
            }
            
            $('.keyword_row').click(function(){
			    $('#popup').fadeOut("fast");
			    var id = $(this).attr('id');
			
			    $("#serviceInput").val($("#ret_"+id+"_service_name").val());
			    $("#service").val($("#ret_"+id+"_service_code").val());
			    $("#serviceInput").attr("readonly", true);
			    $("#requestInput").val($("#ret_"+id+"_request_name").val());
			    $("#requestInput").attr("readonly", true);
			    $("#request").val($("#ret_"+id+"_request_code").val());
			    $("#request").attr("disabled", false);
			

			    $("#functionInput").val($("#ret_"+id+"_function_name").val());
			    $("#functionInput").attr("readonly", true);
			    $("#function").val($("#ret_"+id+"_function_code").val());
			    $("#function").attr("disabled", false);
                
                if ($("#ret_"+id+"_request_need_func").val() == "Y") {
                            $("#functionInput").addClass("required");
                            $("#functionRequired").show();

                        }
                        else {
                            $("#functionRequired").hide();
                            $("#functionInput").removeClass("required");
                        }
			 if($("#ret_"+id+"_function_name").val().length > 0){
                $("#priority").val($("#ret_"+id+"_function_priority").val());
            }
            else{
                $("#priority").val($("#ret_"+id+"_request_priority").val());
            }    
			    $("#functionInput").attr("disabled", false);
			    $("#requestInput").attr("disabled", false);
			
			    QueryUDFs($("#function").val(),$("#request").val(),$("#service").val()); 
                ClearHelpNotes();
			    GetHelpNotes($("#function").val(),$("#request").val(),$("#service").val());
                GetHelpNotes("",$("#request").val(),$("#service").val());
                GetHelpNotes("","",$("#service").val());
			    CheckCountOnly($("#service").val(), $("#request").val(), $("#function").val());
			
		    });
		});
		
		
	</script>
    
	<div class="popupTitle">
	    <h4>Found Keywords</h4>
    </div>
	<div id="closeKeywords" class="closePopup">
		<h5><img src="images/close.png" /> Close</h5>
	</div> 
    <hr class="popupHr" />
    <ul class="pageitem">
            <li class="bigfield">
                <input type="text" placeholder="Search..." id="searchText"/>
            </li>
        </ul>
	<div id="lookupWrapper" class="popupContent">
	<div id="scroller">
    <ul class="pageitem">

    <?php
    $i=0;
	$set = 0;
	foreach($GLOBALS['result']->keyword_result_details as $result_n_ar){
		$set ++;
		?>
		<input type="hidden" id="ret_<?php echo $set; ?>_service_code" value="<?php if(isset($result_n_ar->service_code)){ echo $result_n_ar->service_code; } else { echo ""; } ?>" />
				<input type="hidden" id="ret_<?php echo $set; ?>_request_code" value="<?php if(isset($result_n_ar->request_code)){ echo $result_n_ar->request_code; } else { echo ""; } ?>" />
				<input type="hidden" id="ret_<?php echo $set; ?>_function_code" value="<?php if(isset($result_n_ar->function_code)){ echo $result_n_ar->function_code; } else { echo ""; } ?>" />
				<input type="hidden" id="ret_<?php echo $set; ?>_service_name" value="<?php if(isset($result_n_ar->service_name)){ echo $result_n_ar->service_name; } else { echo ""; } ?>" />
				<input type="hidden" id="ret_<?php echo $set; ?>_request_name" value="<?php if(isset($result_n_ar->request_name)){ echo $result_n_ar->request_name; } else { echo ""; } ?>" />
				<input type="hidden" id="ret_<?php echo $set; ?>_function_name" value="<?php if(isset($result_n_ar->function_name)){ echo $result_n_ar->function_name; } else { echo ""; } ?>" />
                 <input type="hidden" id="ret_<?php echo $set; ?>_request_need_func" value="<?php if(isset($result_n_ar->request_need_func)){ echo $result_n_ar->request_need_func; } else { echo ""; } ?>" />
                 <input type="hidden" id="ret_<?php echo $set; ?>_request_priority" value="<?php if(isset($result_n_ar->request_priority)){ echo $result_n_ar->request_priority; } else { echo ""; } ?>" />
                    <input type="hidden" id="ret_<?php echo $set; ?>_function_priority" value="<?php if(isset($result_n_ar->function_priority)){ echo $result_n_ar->function_priority; } else { echo ""; } ?>" />
			<li class="textbox keyword_row" id="<?php echo $set; ?>">
				<div class="searchObject" id="searchObject<?php echo $i; ?>">
				<b>Keyword:</b> <?php if(isset($result_n_ar->keyword)){ echo $result_n_ar->keyword; } else { echo ""; } ?><br />
				<b>Service Name:</b> <?php if(isset($result_n_ar->service_name)){ echo $result_n_ar->service_name; } else { echo ""; } ?><br />
				<b>Request Name:</b> <?php if(isset($result_n_ar->request_name)){ echo $result_n_ar->request_name; } else { echo ""; } ?><br />
				<b>Function Name:</b> <?php if(isset($result_n_ar->function_name)){ echo $result_n_ar->function_name; } else { echo ""; } ?>
				</div>
			  </li>
			<?php
		$i++;
	}
    
    ?>
    </ul>
    </div>
</div>


<?php
}
elseif(isset($GLOBALS['result']->keyword_result_details) && count($GLOBALS['result']->keyword_result_details) ==1){
	$result_n_ar = $GLOBALS['result']->keyword_result_details;
	?>
    <input type="hidden" id="ret_service_code" value="<?php if(isset($result_n_ar->service_code)){ echo $result_n_ar->service_code; } else { echo ""; } ?>" />
	<input type="hidden" id="ret_request_code" value="<?php if(isset($result_n_ar->request_code)){ echo $result_n_ar->request_code; } else { echo ""; } ?>" />
	<input type="hidden" id="ret_function_code" value="<?php if(isset($result_n_ar->function_code)){ echo $result_n_ar->function_code; } else { echo ""; } ?>" />
    <input type="hidden" id="ret_service_name" value="<?php if(isset($result_n_ar->service_name)){ echo $result_n_ar->service_name; } else { echo ""; } ?>" />
    <input type="hidden" id="ret_request_name" value="<?php if(isset($result_n_ar->request_name)){ echo $result_n_ar->request_name; } else { echo ""; } ?>" />
    <input type="hidden" id="ret_function_name" value="<?php if(isset($result_n_ar->function_name)){ echo $result_n_ar->function_name; } else { echo ""; } ?>" />
     <input type="hidden" id="ret_request_need_func" value="<?php if(isset($result_n_ar->request_need_func)){ echo $result_n_ar->request_need_func; } else { echo ""; } ?>" />
     <input type="hidden" id="ret_request_priority" value="<?php if(isset($result_n_ar->request_priority)){ echo $result_n_ar->request_priority; } else { echo ""; } ?>" />
     <input type="hidden" id="ret_function_priority" value="<?php if(isset($result_n_ar->function_priority)){ echo $result_n_ar->function_priority; } else { echo ""; } ?>" />
	<script type="text/javascript">
		$(document).ready(function() {
			
			$("#serviceInput").val($("#ret_service_name").val());
			$("#service").val($("#ret_service_code").val());
			$("#serviceInput").attr("readonly", true);

			$("#requestInput").val($("#ret_request_name").val());
			$("#requestInput").attr("readonly", true);
			$("#request").val($("#ret_request_code").val());
			$("#request").attr("disabled", false);
			$("#requestInput").attr("disabled", false);

			$("#functionInput").val($("#ret_function_name").val());
			$("#functionInput").attr("readonly", true);
			$("#function").val($("#ret_function_code").val());
			$("#function").attr("disabled", false);
			$("#functionInput").attr("disabled", false);
            
            if ($("#ret_request_need_func").val() == "Y") {
                            $("#functionInput").addClass("required");
                            $("#functionRequired").show();

                        }
                        else {
                            $("#functionRequired").hide();
                            $("#functionInput").removeClass("required");
                        }
            if($("#ret_function_name").val().length > 0){
                $("#priority").val($("#ret_function_priority").val());
            }
            else{
                $("#priority").val($("#ret_request_priority").val());
            }
			QueryUDFs($("#function").val(),$("#request").val(),$("#service").val());
			ClearHelpNotes();
            GetHelpNotes($("#function").val(),$("#request").val(),$("#service").val());
            GetHelpNotes("",$("#request").val(),$("#service").val());
            GetHelpNotes("","",$("#service").val());
			CheckCountOnly($("#service").val(), $("#request").val(), $("#function").val());
			
		});
	</script>
    <?php
}
?>