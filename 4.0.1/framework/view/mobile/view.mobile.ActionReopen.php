<div data-role="collapsible" data-collapsed="false">
    <h4>Reopen Action</h4>
    <p>
        <form method="post" enctype="multipart/form-data" data-ajax="false" id="reopenRequest" action="process.php">
            <label>Officer<span style="color: red;">*</span></label>
            <input id="new_officer_text" data-officer="true" class="required" placeholder="Search..." value="<?php if(isset($GLOBALS['result']->surname)){ echo $GLOBALS['result']->surname; } ?>, <?php if(isset($GLOBALS['result']->given_names)){ echo $GLOBALS['result']->given_names; } ?>" />
            <input type="hidden" id="new_officer_textCode" name="officer"  value="<?php echo $GLOBALS['action_officer_code']; ?>" class="required" />
            <label>Reason<span style="color: red;">*</span></label>
            <input name="reason" class="text required" />
            <input name="Submit input" type="submit" id="submit" value="Submit" />
            <input type="hidden" name="page" value="action" />
            <input type="hidden" name="requestID" id="requestID" value="<?php echo $GLOBALS['request_id']; ?>" />
            <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>" />
            <input type="hidden" name="action" value="ReopenAction" />
        </form>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#reopenRequest").validate();

                $("#reopenRequest").submit(function () {
                    if ($(this).validate().numberOfInvalids() == 0) { $("#submit").attr("disabled", true); }
                });
            });
        </script>
    </p>
</div>




