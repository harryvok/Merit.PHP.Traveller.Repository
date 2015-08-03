<?php        
if($_SESSION['roleSecurity']->maint_comp_action == "Y"){ 
?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#nextActs").hide();

	  // validate signup form on keyup and submit	  
        $('#requirement').change(function () {

        // Clear Var's
            var rs1 = "";
            var nan1 = "";
            var nan2 = "";
            var nan3 = "";
            var nao1 = "";
            var nao2 = "";
            var nao3 = "";

        // Req Status
            $('#rs1').html("");
        // Action 1
            $('#nan1').val("");
        // Officer 1
            $('#nao1').val("");
        // Action 2
            $('#nan2').val("");
        // Officer 2
            $('#nao2').val("");
        // Action 3
            $('#nan3').val("");
        // Officer 3
            $('#nao3').val("");
            $("#nextActs").hide();



            var reqid = $('#requirement').val();
            var splireqid = reqid.split('_')[1];
	      //if(splireqid != "NORESPONSE" && reqid != ""){
            if (reqid != "") {
		      var id = $(this).find(':selected')[0].id;
   		     if(id == "Y"){  $('#desc').addClass("required"); $("#indMand").show(); }
   		     else if (id == "N" || splireqid == "NORESPONSE") { $('#desc').removeClass("required"); $("#indMand").hide(); }
		      Load();
		      $.ajax({
			      url:'inc/ajax/ajax.getRequestUDFs.php',
			      type: 'post',
			      data: {
				      view: "OutcomeUDFs",
				      outcome: splireqid,
				      id: $('#request_id').val(),
				      act_id: $('#act_id').val()
			      },
			      success: function(data) {
				      Unload();
				      $('#outcome-udfs').html(data).trigger("create");
				      $('#outcome-udfs').show();
			      }
		      });
          }
          else{
            $("#udfsexist").val("0");
            $("#outcome-udfs").html("");
          }


            $.ajax({
                url: 'inc/ajax/ajax.getNextActions.php',
                type: 'post',
                dataType: "json",
                data: {
                    outcome: splireqid,
                    id: $('#request_id').val(),
                    act_id: $('#act_id').val()
                },
                success: function (data) {
                    Unload();

                    var rs1 = data.requestStatus;
                    var nan1 = data.nextn1;
                    var nan2 = data.nextn2;
                    var nan3 = data.nextn3;
                    var nao1 = data.nexto1;
                    var nao2 = data.nexto2;
                    var nao3 = data.nexto3;

                    if (rs1 != "") {
                        $("#nextActs").show();
                        $('#rs1').html(rs1);
                    }

                    if (nan1 != "") {
                        // Show headers
                        $('#nanh').show();
                        $('#naoh').show();

                        // Show First Action fields
                        $('#nan1').val("Action 1: " + nan1);
                        $('#nan1').show();
                        if (nao1 == "") {
                            $('#nao1').val("-");
                            $('#nao1').show();
                        }
                        else {
                            $('#nao1').val("For: " + nao1);
                            $('#nao1').show();
                        }
                    }
                    else {
                        $('#nan1').hide();
                        $('#nao1').hide();
                        $('#nanh').hide();
                        $('#naoh').hide();
                    }

                    if (nan2 != "") {
                        // Show Second Action fields
                        $('#nan2').val("Action 2: " + nan2);
                        $('#nan2').show();
                        $('#nao2').val("For: " + nao2);
                        $('#nao2').show();
                    }
                    else {
                        $('#nan2').hide();
                        $('#nao2').hide();
                    }

                    if (nan3 != "") {
                        // Show Third Action fields
                        $('#nan3').val("Action 3: " + nan3);
                        $('#nan3').show();
                        $('#nao3').val("For: " + nao3);
                        $('#nao3').show();
                    }
                    else {
                        $('#nan3').hide();
                        $('#nao3').hide();
                    }
                }
            });
	  });

	  $("#completeaction").validate();
   });
</script>
<form id="completeaction" method="post" class="completeaction" action="process.php">
  <label>Outcome</label>
  <select class="text required" id="requirement" name="requirement">
    <option value="">Select</option>
     <?php
    foreach($GLOBALS['result']['outcomes']->action_completed_det->action_completed_details as $result_outcomes){ ?>
                        <option id="<?php if(isset($result_outcomes->note_ind)){ echo $result_outcomes->note_ind; } else { echo "N"; } ?>" value="<?php echo $result_outcomes->note_ind."_".$result_outcomes->action_code."_".$result_outcomes->resubmit; ?>"><?php echo $result_outcomes->action_name; ?></option>
                    <?php } ?>
  </select>
  <label>Comment<span id="indMand" style="color:red; display:none;">*</span></label>
  <textarea spellcheck="true" id="desc" class="text" name="comment_act" style="min-height:70px;"></textarea>
  <div id="outcome-udfs">
    
  </div>
  <input type='hidden' name='udfs_exist' id='udfs_exist' value='0' />
  <input type="hidden" name="page" value="action" />
  <input id="submit" class="button left" type='submit' value='Complete' />
  <input type="hidden" name="act_id" id="act_id" value="<?php echo $_GET['id']; ?>" />
  <input type="hidden" name="action_id" id="action_id" value="<?php echo $_GET['id']; ?>" />
  <input type="hidden" name="request_id" id="request_id" value="<?php echo $GLOBALS['result']['action']->request_id; ?>" />
  <input type="hidden" name="service_name" id="service_name" value="<?php echo $GLOBALS['result']['action']->service_name; ?>" />	
  <input type="hidden" name="page" value="action" />
  <input type="hidden" name="action" value="CompleteAction" />
  <input type="hidden" name="status_code" id="status_code" value="<?php echo $GLOBALS['result']['action']->finalised_ind; ?>" />
  <input type="hidden" name="assign_name" id="assign_name" value="<?php echo $GLOBALS['result']['action']->assign_name; ?>" />
</form>
<br />
<div data-role="collapsible" data-content-theme="c" data-collapsed="false" id="nextActs">
   <h3>Next Steps / Actions</h3>
   <label style="padding-bottom:5px;">Request Status</label>
        <b><textarea name="name" id="rs1" readonly="readonly" style="width:100%; margin-top:2px; color:red;font-size:smaller" data-role="none"; ></textarea></b>

        <label style="padding-bottom:5px;">Next Action/s</label>

        <input type="text" name="name" id="nan1" value="" readonly="readonly" data-role="none" style="width:100%; margin-top:10px; color:black;"/>
        <input type="text" readonly="readonly" name="name" id="nao1" value="" data-role="none" style="width:100%;color:black"/>

        <input type="text" readonly="readonly" name="name" id="nan2" value="" data-role="none" style="width:100%; margin-top:10px;color:black"/>
        <input type="text" readonly="readonly" name="name" id="nao2" value="" data-role="none" style="width:100%;color:black"/>

        <input type="text" readonly="readonly" name="name" id="nan3" value="" data-role="none" style="width:100%; margin-top:10px; color:black"/>
        <input type="text" readonly="readonly" name="name" id="nao3" value="" data-role="none" style="width:100%;color:black"/>
    
        
        
       
</div>

    <!-- 
        <label id="nanh1" data-role="none" style="padding-top:10px; padding-bottom:5px;">Next Action Name</label>
        <label id="naoh1" data-role="none" style="padding-top:10px; padding-bottom:5px;">Next Action Officer</label>  
    -->

<?php
}
?>
