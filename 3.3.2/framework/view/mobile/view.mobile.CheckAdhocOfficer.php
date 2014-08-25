
<?php
if(isset($GLOBALS['result']->adhoc_officer_det) && count($GLOBALS['result']->adhoc_officer_det) >0){
	?>
    <script type="text/javascript">

		$(document).ready(function() {
			$(".newOfficerText").autocomplete({

				source: function(request, response) {
					$.ajax({
						url: "inc/ajax/ajax.officerList.php",
						dataType: "json",
						data: {
							term: request.term,
						},
						success: function(data) {
							response(data);
						},
					});
				},
				select: function(event, ui) {
					$(this).blur();
					$(this).attr("readonly", true);	
					$("#"+$(this).attr("id")+"_officer").val(ui.item.index);
				},
				delay: 0, 
				minLength:0, 
			});
			
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
					$("#submitButtonn").attr("disabled", false);
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
<span class="graytitle">Adhoc Officer Required</span>
		<?php
        if(count($GLOBALS['result']->adhoc_officer_det) > 1){
			$i=0;
            foreach($GLOBALS['result']->adhoc_officer_det as $adhoc){
                ?>
                <ul class="pageitem">
                	<li class="textbox">
                    <strong>Action Required:</strong> <?php echo $adhoc->action_reqd; ?>
                    </li>
                </ul>
                <ul class="pageitem">
                    <span class="graytitle">Assign to Officer:</span>
                    <li class="bigfield">
                        <input type="text" id="<?php echo $i; ?>" class="newOfficerText" placeholder="Search..." />
                        
                    </li>
                </ul>
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
            <ul class="pageitem">
                <li class="textbox">
                	<strong>Action Required:</strong> <?php echo $adhoc->action_reqd; ?>
                </li>
            </ul>
           
            <ul class="pageitem">
             <span class="graytitle">Assign to Officer:</span>
               <li class="bigfield">
                    <input type="text" id="0" class="newOfficerText" placeholder="Search..." />
                </li>
            </ul>
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
        <ul class="pageitem">
        	<li class="button">
            	<input type="button" id="submitAdhoc" value="Submit" >
            </li>
        </ul>
    </div>

<?php
}
else{
	?>
    <script type="text/javascript">
	$("#submitButtonn").attr("disabled", false);
		$("#newrequest").unbind("submit");
		$("#newrequest INPUT[type=submit]").click();
	</script>
    <?php	
}
?>
