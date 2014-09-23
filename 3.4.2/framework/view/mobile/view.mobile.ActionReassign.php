<?php
if($GLOBALS['result']['action']->status_code == "OPEN"&& $_SESSION['roleSecurity']->maint_reassign_action == "Y"){ 
?>
	<script type="text/javascript">
    $(document).ready(function(){
        $("#clearOfficer").hide();
        
        var officerResponse = function (event, ui) {
            var label = "";
            var index = "";
            if (typeof ui.content != "undefined" && ui.content.length === 1) {
                label = ui.content[0].label;
                index = ui.content[0].index;
            }
            else if (typeof ui.item != "undefined" && ui.item.label.length > 0) {
                label = ui.item.label;
                index = ui.item.index;
            }
            if (label.length > 0 || index.length > 0) {
                $("#new_officer_code").val(index);
                $("#new_officer_text").val(label);
                $("#new_officer_text").attr("readonly", true);
                $("#new_officer_text").blur();
            }
        }

        $("#new_officer_text").autoCompleteInit("inc/ajax/ajax.officerList.php", { term: "" }, officerResponse);

	
	    $("#new_officer_text").click(function(){
		    $("#new_officer_code").val("");
		    $("#new_officer_text").val("");
		    $("#new_officer_text").attr("readonly", false);
		    $("#new_officer_text").autocomplete("search","");
	    });
        
        $("#view-job-form").validate({ ignore: "" });
    
                $("#view-job-form").submit(function(){
                    if($(this).validate().numberOfInvalids() == 0){ $("#submit").attr("disabled", true); }
                });
        
        
    });
    </script>
    
    <ul class="no-ellipses" data-role="listview" data-inset="true">
      <li >
        <label>Name: </label>
        <?php if(isset($GLOBALS['result']['officer']->given_names) && isset($GLOBALS['result']['officer']->surname)) echo $GLOBALS['result']['officer']->given_names." ".$GLOBALS['result']['officer']->surname; ?> </li>
      <li >
        <label>Mobile: </label>
        <?php if(isset($GLOBALS['result']['officer']->mobile_no)) echo $GLOBALS['result']['officer']->mobile_no ; ?>
      </li>
      <li >
        <label>Phone: </label>
        <?php if(isset($GLOBALS['result']['officer']->telephone)) echo $GLOBALS['result']['officer']->telephone; ?>
      </li>
    </ul>
    <label>Assign to Officer:</label>
    <form id="view-job-form" method="post" action="process.php">
      <input id="new_officer_text" id="new_officer_text" placeholder="Search..." />
      <input type="hidden" id="new_officer_code" name="new_officer"  class="required" />
      <label>Reason</label>
      <textarea name="reason" rows="4" cols="5"></textarea>
      <label>Reassign What?</label>
      <label for="tao">This action only</label>
      <input id="tao" name="reassign_type" type="radio" value="O" checked />
      <label for="tao2">All for this officer</label>
      <input id="tao2" name="reassign_type" type="radio" value="P" />
      <label for="tao3">All for this request</label>
      <input id="tao3" name="reassign_type" type="radio" value="A" />
      <label>Reassign To</label>
      <label for="osa">Officer specified above</label>
      <input id="osa" name="reassign_to_type" type="radio" value="O" checked />
      <label for="osa2">Previous action officer</label>
      <input id="osa2" name="reassign_to_type" type="radio" value="P" />
      <label for="osa3">Request input officer</label>
      <input id="osa3" name="reassign_to_type" type="radio" value="I" />
      <input id="submit" class="button left" type='submit' value='Reassign' />
     
      <input type="hidden" name="action_id" id="action_id" value="<?php echo $GLOBALS['result']['action']->action_id; ?>" />
      <input type="hidden" name="request_id" id="request_id" value="<?php echo $GLOBALS['result']['action']->request_id; ?>" />
      <input type="hidden" name="action_officer_code" value="<?php echo $GLOBALS['result']['action']->action_officer_code; ?>" />
      <input type="hidden" name="page" value="action" />
      <input type="hidden" name="action" value="ReassignAction" />
    </form>
 <?php
}
?>
