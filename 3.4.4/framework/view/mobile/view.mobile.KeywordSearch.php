<?php
if(isset($GLOBALS['result']->keyword_result_details) && count($GLOBALS['result']->keyword_result_details) >0){
	?>
    <a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left">Close</a>
    <div data-role="header">
        <h1>Found Keywords</h1>
    </div>
    <div data-role="content">
    	<p>
        <ul data-role="listview" data-filter="true" data-filter-placeholder="Search keywords..." data-inset="true">
<?php
    if(isset($GLOBALS['result']->keyword_result_details) && count($GLOBALS['result']->keyword_result_details) >1){
	?>
    <script type="text/javascript">
		 $(document).ready(function(){
            $("#popup").popup("open");
             $("#default").page('destroy');
             $("#default").page();
		$('.keyword_row').click(function(){
			var id = $(this).attr('id');
			
			$("#serviceInput").val($("#ret_"+id+"_service_name").val());
			$("#service").val($("#ret_"+id+"_service_code").val());
			$("#serviceInput").attr("readonly", true);
			$("#requestInput").val($("#ret_"+id+"_request_name").val());
			$("#requestInput").attr("readonly", true);
			$("#request").val($("#ret_"+id+"_request_code").val());
			
			$("#functionInput").val($("#ret_"+id+"_function_name").val());
			$("#functionInput").attr("readonly", true);
			$("#function").val($("#ret_"+id+"_function_code").val());
            
            if ($("#ret_"+id+"_request_need_func").val() == "Y") {
                            $("#functionInput").addClass("required");
                            $("#functionRequired").show();

                        }
                        else {
                            $("#functionRequired").hide();
                            $("#functionInput").removeClass("required");
                        }
			 if($("#ret_"+id+"_function_name").val().length > 0){
                 var nameVar = $("#ret_"+id+"_function_priority").val();
                 $("#priority option").prop("selected", false);
                $("#priority option[value="+nameVar+"]").prop("selected", true);
            }
            else{
                var nameVar = $("#ret_"+id+"_request_priority").val();
                 $("#priority option").prop("selected", false);
                $("#priority option[value="+nameVar+"]").prop("selected", true);
            }    
            $('#priority').selectmenu('refresh', true);
			$("#functionInput").attr("disabled", false).textinput('enable');
			$("#requestInput").attr("disabled", false).textinput('enable');
			
			QueryUDFs($("#function").val(),$("#request").val(),$("#service").val()); 
			ClearHelpNotes();
            GetHelpNotes($("#function").val(),$("#request").val(),$("#service").val());
            GetHelpNotes("",$("#request").val(),$("#service").val());
            GetHelpNotes("","",$("#service").val());
			CheckCountOnly($("#service").val(), $("#request").val(), $("#function").val());
			$("#popup").popup("close");
			
		});
		 });
	</script>
    
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
			<li class="keyword_row" id="<?php echo $set; ?>">
            	<a>
				<p><b>Keyword:</b> <?php if(isset($result_n_ar->keyword)){ echo $result_n_ar->keyword; } else { echo ""; } ?></p>
				<p><b>Service Name:</b> <br /><?php if(isset($result_n_ar->service_name)){ echo $result_n_ar->service_name; } else { echo ""; } ?></p>
				<p><b>Request Name:</b> <br /><?php if(isset($result_n_ar->request_name)){ echo $result_n_ar->request_name; } else { echo ""; } ?></p>
				<p><b>Function Name:</b> <br /><?php if(isset($result_n_ar->function_name)){ echo $result_n_ar->function_name; } else { echo ""; } ?></p>
                </a>
			  </li>
			<?php
            $i++;
        }
        
    ?>



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
         $("#popup").popup("open");
             $("#default").page('destroy');
             $("#default").page();
			$("#serviceInput").val($("#ret_service_name").val());
			$("#service").val($("#ret_service_code").val());
			$("#serviceInput").attr("readonly", true);

			$("#requestInput").val($("#ret_request_name").val());
			$("#requestInput").attr("readonly", true);
			$("#request").val($("#ret_request_code").val());
			$("#requestInput").attr("disabled", false).textinput('enable');

			$("#functionInput").val($("#ret_function_name").val());
			$("#functionInput").attr("readonly", true);
			$("#function").val($("#ret_function_code").val());
            
            if ($("#ret_request_need_func").val() == "Y") {
                            $("#functionInput").addClass("required");
                            $("#functionRequired").show();

                        }
                        else {
                            $("#functionRequired").hide();
                            $("#functionInput").removeClass("required");
                        }
             if($("#ret_function_name").val().length > 0){
                 var nameVar = $("#ret_function_priority").val();
                 $("#priority option").prop("selected", false);
                $("#priority option[value="+nameVar+"]").prop("selected", true);
            }
            else{
                var nameVar = $("#ret_request_priority").val();
                 $("#priority option").prop("selected", false);
                $("#priority option[value="+nameVar+"]").prop("selected", true);
            }    
            $('#priority').selectmenu('refresh', true);
			$("#functionInput").attr("disabled", false).textinput('enable');
			QueryUDFs($("#function").val(),$("#request").val(),$("#service").val());
			ClearHelpNotes();
            GetHelpNotes($("#function").val(),$("#request").val(),$("#service").val());
            GetHelpNotes("",$("#request").val(),$("#service").val());
            GetHelpNotes("","",$("#service").val());
			CheckCountOnly($("#service").val(), $("#request").val(), $("#function").val());
            $("#popup").popup("close");
		});
	</script>
    <?php
    }
?>
	</ul>
	</p>
</div>
<?php
}
else{
    if($_SESSION['roleSecurity']->maint_exclude == "Y"){
?>
    <script type="text/javascript">
        alert("The keyword you've chosen is associated with a count only SRF. Please choose another keyword.");
	</script>
    <?php
    }
    else{
    ?>
    <script type="text/javascript">
        alert("There are no SRFs associated with this keyword.");
	 </script>
     <?php
    }
}
?>