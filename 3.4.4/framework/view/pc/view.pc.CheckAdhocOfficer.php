
<?php
if(isset($GLOBALS['result']->adhoc_officer_det) && count($GLOBALS['result']->adhoc_officer_det) >0){
	?>
    <script type="text/javascript">

		$(document).ready(function() {
			$('#popup').fadeIn("fast");
            
            function officerResponse(event, ui){
                var value = "";
                var index = "";
                if (typeof ui.content != "undefined" && ui.content.length === 1) {
                    value = ui.content[0].label;
                    index = ui.content[0].index;
                }
                else if (typeof ui.item != "undefined" && ui.item.value.length > 0) {
                    value = ui.item.label;
                    index = ui.item.index;
                }
                if (value.length > 0) {
                    $(this).blur();
					$(this).attr("readonly", true);	
                    $(this).val(value);
					$("#"+$(this).attr("id")+"_officer").val(index);
                }
            }
            
			$(".newOfficerText").autoCompleteInit("inc/ajax/ajax.officerList.php", null, officerResponse);
			
			$(".newOfficerText").click(function(){
				if($(this).attr("readonly") == 'readonly'){
					$(this).attr("readonly", false);
					$(this).val("");
					$("#"+$(this).attr("id")+"_officer").val("");
					
				}
				$(this).autocomplete("search", "");
			});

			$("#submitAdhoc").click(function(){
				if($(".newOfficerText").val().length > 0 && $(".officer").val().length > 0){
					$("#adhocOfficer").html("");
					var i = 0;
					$(".adhocOfficerContent").each(function(){
						var valu = $("#"+i+"_officer").val();
						$("#adhocOfficer").append($(this).html());
						$("#adhocOfficer #"+i+"_officer").val(valu);
						i++;
					});				
					
					$("#newrequest").unbind("submit");
					$("#newrequest INPUT[type=submit]").click();
					$(this).attr("disabled", true);
				}
				else{
					alert("Please type and choose a valid officer");	
				}
			});	
			
		});
	</script>
	<div class="popupTitle">
	<h4>Adhoc Officer Required</h4>
	</div>
	<div class="popupContent">
    	
		<?php
    if(count($GLOBALS['result']->adhoc_officer_det) > 1){
        $i=0;
        foreach($GLOBALS['result']->adhoc_officer_det as $adhoc){
                ?>
                <h2>Action Required: <?php echo $adhoc->action_reqd; ?></h2>
                <b>Assign to Officer:</b> 
                <input id="<?php echo $i; ?>" class="newOfficerText" placeholder="Search..." />
                <div class="adhocOfficerContent">
                    <input type="hidden" id="<?php echo $i; ?>_officer" class="officer" name="<?php echo $i; ?>_officer" />
                    <input type="hidden" id="<?php echo $i; ?>_action_reqd" name="<?php echo $i; ?>_action_reqd" value="<?php echo $adhoc->action_reqd; ?>" />
                    <input type="hidden" id="<?php echo $i; ?>_position_no" name="<?php echo $i; ?>_position_no" value="<?php echo $adhoc->position_no; ?>" />
                </div>
                <hr />  
                <?php
            $i++;
        }
    }
    elseif(count($GLOBALS['result']->adhoc_officer_det) == 1){
        $adhoc = $GLOBALS['result']->adhoc_officer_det;
            ?>
            <h2>Action Required: <?php echo $adhoc->action_reqd; ?></h2>
            <b>Assign to Officer:</b> 
            <input id="0" class="newOfficerText" placeholder="Search..." />
            <div class="adhocOfficerContent">
                <input type="hidden" id="0_officer" name="0_officer" class="officer" />
                <input type="hidden" id="0_action_reqd" name="0_action_reqd" value="<?php echo $adhoc->action_reqd; ?>" />
                <input type="hidden" id="0_position_no" name="0_position_no" value="<?php echo $adhoc->position_no; ?>" />
            </div>
            <?php
        $i=1;
    }
        ?>
        <div class="adhocOfficerContent">
        <input type="hidden" name="countAdhoc" id="countAdhoc" value="<?php echo $i; ?>" />
        </div>
    	<input type="button" id="submitAdhoc" value="Submit" >
    </div>

<?php
}
else{
	?>
    <script type="text/javascript">
		$("#newrequest").unbind("submit");
		$("#newrequest INPUT[type=submit]").click();
		$("#submit").attr("disabled", true);
	</script>
    <?php	
}
?>

