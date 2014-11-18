
<!-- Role Security -->
<?php
    if($GLOBALS['result']['action']->status_code == "OPEN"&& $_SESSION['roleSecurity']->maint_reassign_action == "Y"){ 
?>

<!-- Javascript Validation -->
	<script type="text/javascript">
            $(document).ready(function(){
                $("#clearOfficer").hide();
                $("#view-job-form").validate({ ignore: "" });
                        $("#view-job-form").submit(function(){
                            if($(this).validate().numberOfInvalids() == 0){ $("#submit").attr("disabled", true); }
                        });
            });
    </script>
    <b>Reassign Action</b>

    <ul class="no-ellipses" data-role="listview" data-inset="true">
        <li data-role="list-divider">Currently Assigned Officer</li>
          <li><p><strong>Names: </strong><?php if(isset($GLOBALS['result']['officer']->given_names) && isset($GLOBALS['result']['officer']->surname)) echo $GLOBALS['result']['officer']->given_names." ".$GLOBALS['result']['officer']->surname; ?></p></li>
          <li><p><strong>Mobile No: </strong><?php if(isset($GLOBALS['result']['officer']->mobile_no)) echo $GLOBALS['result']['officer']->mobile_no ; ?></p></li>
          <li ><p><strong>Phone No: </strong> <?php if(isset($GLOBALS['result']['officer']->telephone)) echo $GLOBALS['result']['officer']->telephone; ?></p></li>
    </ul>
    
    <form id="view-job-form" method="post" action="process.php">

        <ul class="no-ellipses" data-role="listview" data-inset="true">
           <li data-role="list-divider">Reassign To:</li>
           <li><p><label>Assign to Officer:</label><input id="new_officer_text" placeholder="Search..." data-officer="true" /><br /></p></li>
           <li><p><label>Reason<strong style="color:red; font-size:large;"> *</strong></label><textarea name="reason" rows="4" cols="5" class="required"></textarea><br /></p></li>    
       </ul>
          
          

        <ul class="no-ellipses" data-role="listview" data-inset="true">
            <li data-role="list-divider">Reassign What?</li>
            <li><p><input id="tao" name="reassign_type" type="radio" value="O" checked/></p></li>         
            <li><p><input id="tao1" name="reassign_type" type="radio" value="A" /></p></li>
            <li><p><input id="tao2" name="reassign_type" type="radio" value="P" /></p></li>
        </ul>
          <label for="tao">This action only</label>
          <label for="tao1">All actions for this request</label>
          <label for="tao2">All actions for this officer</label>         
            
     
      <input type="hidden" name="action_id" id="action_id" value="<?php echo $GLOBALS['result']['action']->action_id; ?>" />
      <input type="hidden" name="request_id" id="request_id" value="<?php echo $GLOBALS['result']['action']->request_id; ?>" />
      <input type="hidden" name="action_officer_code" value="<?php echo $GLOBALS['result']['action']->action_officer_code; ?>" />
      <input type="hidden" name="reassign_to_type" value="O" />
      <input type="hidden" id="new_officer_textCode" name="new_officer"  class="required" />
      <input type="hidden" name="page" value="action" />
      <input type="hidden" name="action" value="ReassignAction" />
      <input id="submit" class="button left" type='submit' value='Reassign' />
      <label for="new_officer_textCode" class="error" style="font-size:0;">This field is required.</label>
    </form>
 <?php
}
?>
