<div class="summaryContainer">
    <h1>Reopen Action</h1>
    <div>
         <script type="text/javascript">
             $(document).ready(function () {
                 $("#addaction").validate();

                 $("#addaction").submit(function () {
                     if ($(this).validate().numberOfInvalids() == 0) { $("#submit").attr("disabled", true); }
                 });

             });
			  </script>
        <form method="post" enctype="multipart/form-data" id="addaction" action="process.php">
            <label for="officer">Officer<span style="color: red;">*</span></label>
            <input id="new_officer_text" data-officer="true" class="required" placeholder="Search..." value="<?php if(isset($GLOBALS['result']->surname)){ echo $GLOBALS['result']->surname; } ?>, <?php if(isset($GLOBALS['result']->given_names)){ echo $GLOBALS['result']->given_names; } ?>" />
            <input type="hidden" id="new_officer_textCode" name="officer" value="<?php echo $GLOBALS['action_officer_code']; ?>" class="required" />
            <label for="reason">Reason<span style="color: red;">*</span></label>
            <input name="reason" class="required" />
            <p>&nbsp;</p>
            <input id="submit" class="button left" type='submit' value='Reopen' />
            <input type="hidden" name="page" value="action" />
            <input type="hidden" name="requestID" id="requestID" value="<?php echo $GLOBALS['request_id']; ?>" />
            <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>" />
            <input type="hidden" name="action" value="ReopenAction" />
        </form>
    </div>
</div>

