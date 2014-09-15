<?php

/**
 * This page has been added to delete request with all the validations anf=d confirmation.
 * No email notification required after request delete.
 *
 * @version 1.0
 * @author phirpara
 */
    ?>
<div class="summaryContainer">
    <h1>Delete Request</h1>
    <div>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#deleteRequest").validate();
                $("#deleteRequest").submit(function () {
                    if ($(this).validate().numberOfInvalids() == 0) { $("#submit").attr("disabled", true); }
                });
            });
        </script>
        <form method="post" action="process.php" id="deleteRequest">
            <strong>Request ID:</strong> <?php echo $_GET['id']; ?>  : <?php echo $GLOBALS['result']->service_name . " - " .$GLOBALS['result']->request_name; 
                if(isset($GLOBALS['result']->function_name) && $GLOBALS['result']->function_name != '') echo " - " . $GLOBALS['result']->function_name; ?><br />
            <label>Comment<span style="color: red;">*</span></label>
            <textarea name="comment_text" class="required"></textarea>
            <br />
            <input type="submit" value="Delete" id="submit" />
            <input type="hidden" name="actionID" value="<?php echo $_GET['id']; ?>" />
            <input type="hidden" name="requestID" value="<?php echo $GLOBALS['request_id']; ?>" />
            <input type="hidden" name="request" value="DeleteRequest" />
        </form>
    </div>
</div>

