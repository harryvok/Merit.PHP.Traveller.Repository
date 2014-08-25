<?php
if($GLOBALS['result']['action']['action']->status_code == "OPEN"&& $_SESSION['roleSecurity']->maint_reassign_action == "Y"){ 
?>
	<script type="text/javascript">
    $(document).ready(function(){
        var codeArray = Array();
        
        $("#clearOfficer").hide();
        
        $("#new_officer_text").autocomplete({
    
            source: function(request, response) {
                $.ajax({
                    url: "inc/ajax/ajax.officerList.php",
                    dataType: "json",
                    data: {
                        term: request.term,
                    },
                    success: function(data) {
                        response(data);
                        codeArray = data;
                    },
                });
            },
            select: function(event, ui) {
                $(this).blur();
                $("#new_officer_text").attr("readonly", true);	
                $("#new_officer_code").val(ui.item.index);
            },
            delay: 0, 
            minLength:0, 
        });
        
        $("#view-job-form").validate({ ignore: "" });
    
                $("#view-job-form").submit(function(){
                    if($(this).validate().numberOfInvalids() == 0){ $("#submit").attr("disabled", true); }
                });
        
        $("#new_officer_text").focus(function(){
            if($(this).attr("readonly") == 'readonly'){
                $(this).attr("readonly", false);
                $(this).val("");
                $("#new_officer_code").val("");
                
            }
			$(this).autocomplete("search", "");
        });	
        
    });
    </script>
    
    <span class="graytitle">Reassign Officer</span>
    <div id="ReassignShow">
      <ul class="pageitem">
        <li class="button">
          <input type="button" value="Show" class="openSection" id="Reassign" />
        </li>
      </ul>
    </div>
    <div id="ReassignSection" style="display:none;">
      <ul class="pageitem">
        <li class="textbox"> <span class="name">Name: </span><?php echo $GLOBALS['result']['officer']->given_names." ".$GLOBALS['result']['officer']->surname; ?></a> </li>
        <li class="textbox"> <span class="name">Mobile: </span>
          <?php if(isset($GLOBALS['result']['officer']->mobile_no)) echo $GLOBALS['result']['officer']->mobile_no ; ?>
          </a> </li>
        <li class="textbox"> <span class="name">Phone: </span>
          <?php if(isset($GLOBALS['result']['officer']->telephone)) echo $GLOBALS['result']['officer']->telephone; ?>
          </a> </li>
        <span class="graytitle">Assign to Officer:</span>
        <form id="view-job-form" method="post"  enctype="multipart/form-data"  action="process.php">
          <ul class="pageitem">
            <li class="bigfield">
              <input id="new_officer_text" id="new_officer_text" placeholder="Search..." />
              <input type="hidden" id="new_officer_code" name="new_officer"  class="required" />
            </li>
          </ul>
          <span class="graytitle">Reason</span>
          <ul class="pageitem">
            <li class="textbox">
              <textarea name="reason" rows="4" cols="5"></textarea>
            </li>
          </ul>
          <span class="graytitle">Reassign What?</span><br />
          <ul class="pageitem">
            <li class="radiobutton"> <span class="name">This action only</span>
              <input name="reassign_type" type="radio" value="O" checked />
            </li>
            <li class="radiobutton"> <span class="name">All for this officer</span>
              <input name="reassign_type" type="radio" value="P" />
            </li>
            <li class="radiobutton"> <span class="name">All for this request</span>
              <input name="reassign_type" type="radio" value="A" />
            </li>
          </ul>
          <span class="graytitle">Reassign To</span><br />
          <ul class="pageitem">
            <li class="radiobutton"> <span class="name">Officer specified above</span>
              <input name="reassign_to_type" type="radio" value="O" checked />
            </li>
            <li class="radiobutton"> <span class="name">Previous action officer</span>
              <input name="reassign_to_type" type="radio" value="P" />
            </li>
            <li class="radiobutton"> <span class="name">Request input officer</span>
              <input name="reassign_to_type" type="radio" value="I" />
            </li>
          </ul>
          <b></b><br />
          <ul class="pageitem">
            <li class="button">
              <input id="submit" class="button left" type='submit' value='Reassign' />
            </li>
          </ul>
          <input type="hidden" name="action_id" id="action_id" value="<?php echo $GLOBALS['result']['action']['action']->action_id; ?>" />
          <input type="hidden" name="request_id" id="request_id" value="<?php echo $GLOBALS['result']['action']['action']->request_id; ?>" />
          <input type="hidden" name="action_officer_code" value="<?php echo $GLOBALS['result']['action']['action']->action_officer_code; ?>" />
          <input type="hidden" name="page" value="action" />
          <input type="hidden" name="action" value="ReassignAction" />
        </form>
        <li class="button">
          <input type="button" value="Hide" class="closeSection" id="Reassign" />
        </li>
      </ul>
    </div>
<?php
}
?>
