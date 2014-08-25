<script src="inc/js/pages/js.recategoriseRequest.js"></script>
<div data-role="collapsible" data-collapsed="false">
    <h4>Recategorise Request</h4>
    <p>
        <?php
        include("mobile/page.output.php");
        ?>
        <form enctype='multipart/form-data' id='recategoriseRequest' name="recategoriseRequest" action='process.php' method='post'>

            <div data-role="collapsible" class="col" data-collapsed="false" data-content-theme="c">
                <h4>Request Details</h4>
                <p>
                    <label>Keyword</label>
                    <input class="text" name='keyword' id="keywordSearch" maxlength='15' placeholder="Search...">
                    <input type="hidden" name='service' id="service">
                    <label>Service<span style="color: red;">*</span></label>
                    <input class="text required" name='serviceInput' id="serviceInput" placeholder="Search...">
                    <input type="hidden" name='request' id="request">
                    <label>Request<span style="color: red;">*</span></label>
                    <input class="text required" disabled="disabled" name='requestInput' placeholder="Search..." id="requestInput">
                    <input type="hidden" name='function' id="function">
                    <label>Function<span id="functionRequired" style="color: red; display: none;">*</span></label>
                    <input class="text" disabled="disabled" name='functionInput' placeholder="Search..." id="functionInput">
                    <label>Reason<span style="color: red;">*</span></label>
                    <textarea rows="4" class="required" name='reason' maxlength='2000'></textarea>
                </p>
            </div>

            <div id="udfs" style="display: none;">
                <div data-role="collapsible" class="col" data-content-theme="c">
                    <h4>User Defined Fields</h4>
                    <p id="global-udfs">
                    </p>
                </div>
                <input type='hidden' name='udfs_exist' id='udfs_exist' value='0' />
            </div>

            <label>Notify Responsible Officer?</label>
            <label for="no">No</label>
            <input id="no" name="email_officer" type="radio" value="N" checked />
            <label for="yes">Yes</label>
            <input id="yes" name="email_officer" type="radio" value="Y" />

            <label>Notify Action Officer?</label>
            <label for="no2">No</label>
            <input id="no2" name="email_act_officer" type="radio" value="N" checked />
            <label for="yes2">Yes</label>
            <input id="yes2" name="email_act_officer" type="radio" value="Y" />

            <input type="hidden" name="request_id" value="<?php echo $_GET['id']; ?>" />
            <input type="hidden" name="action" value="RecategoriseRequest" />
            <input name="Submit input" type="submit" data-role="button" id="submit" value="Submit" />

        </form>
    </p>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#recategoriseRequest").validate({
            submitHandler: function (form) {
                $("#submit").prop("disabled", true);
                $(this)[0].submit();

            },
            invalidHandler: function (event, validator) {
                if (confirm("One or more user defined fields are mandatory and must be enetered before saving this Request. Would you like to continue without completing mandatory UDF?")) {
                    $(this)[0].submit();
                }
            }
        });
    });
</script>