<div class="summaryContainer">
    <h1>Delete Action</h1>
    <div>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#deleteAction").validate();
                $("#deleteAction").submit(function () {
                    if ($(this).validate().numberOfInvalids() == 0) { $("#submit").attr("disabled", true); }
                });
            });
        </script>
        <form method="post" action="process.php" id="deleteAction">
            <strong>Action ID:</strong> <?php echo $_GET['id']; ?>  - <?php echo $GLOBALS['assign_name']; ?><br />
            <strong>Request ID:</strong> <?php echo $GLOBALS['request_id']; ?><br />
            <label>Comment<span style="color: red;">*</span></label>
            <textarea name="comment_text" class="required"></textarea>
            <br />
            <input type="submit" value="Delete" id="submit" />
            <input type="hidden" name="actionID" value="<?php echo $_GET['id']; ?>" />
            <input type="hidden" name="requestID" value="<?php echo $GLOBALS['request_id']; ?>" />
            <input type="hidden" name="action" value="DeleteAction" />
        </form>
    </div>
</div>

