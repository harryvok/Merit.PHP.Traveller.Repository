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
            <strong>Request ID:</strong> <?php echo $_GET['id']; ?> <br />
            <strong>Service Name:</strong> <?php echo $GLOBALS['service_name']; ?> <br /> 
            <strong>Request Name:</strong> <?php echo $GLOBALS['request_name']; ?> <br />
            <strong>Function Name:</strong> <?php echo $GLOBALS['function_name']; ?> <br />
            <label>Reason<span style="color: red;">*</span></label>
            <textarea name="comment_text" class="required"></textarea>
            <br />
            <br />
            <strong>Email notify:</strong>   <input type="checkbox" id="actionOfficer" name="actionOfficer" /> Current Action Officer 
            <input type="checkbox" id="responsibleOfficer" name="responsibleOfficer" />Responsible Officer<br /><br />
            <input type="submit" value="Delete" id="submit" />
            <input type="hidden" name="requestID" value="<?php echo $GLOBALS['request_id']; ?>" />
            <input type="hidden" name="action" value="DeleteRequest" />
        </form>
    </div>
</div>

