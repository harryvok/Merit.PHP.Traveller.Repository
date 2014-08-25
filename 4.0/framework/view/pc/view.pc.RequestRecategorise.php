<script src="inc/js/pages/js.recategoriseRequest.js"></script>
<div class="summaryContainer">
    <h1>Recategorise Request</h1>
    <div>
        <form enctype='multipart/form-data' id='recategoriseRequest' name="recategoriseRequest" action='process.php' method='post'>
            <input type='hidden' name='udfs_exist' id='udfs_exist' value='0' />

            <div class="column r60">
                <div class="column r25">
                    <label for="service">Keyword</label>
                    <input class="text" name='keyword' id="keywordSearch" maxlength='15' placeholder="Search...">
                </div>
                <div class="column r25">
                    <label for="service">Service<span style="color: red;">*</span></label>
                    <input class="text required" name='serviceInput' id="serviceInput"  placeholder="Search...">
                    <input type="hidden" name='service' id="service">
                </div>
                <div class="column r25">
                    <label for="request">Request<span style="color: red;">*</span></label>
                    <input class="text required" name='requestInput' disabled="disabled" id="requestInput">
                    <input type="hidden" name='request' id="request">
                </div>
                <div class="column r25">
                    <label for="function">Function<span id="functionRequired" style="color: red; display: none;">*</span></label>
                    <input class="text checkNone" name='functionInput' disabled="disabled" id="functionInput">
                    <input type="hidden" name='function' id="function">
                </div>
            </div>

            <br />
            <div class="float-left">
                <label for="issue">Reason<span style="color: red;">*</span></label>
                <textarea rows="4" class="text required" name='reason' id='reason' maxlength='2000'></textarea>
            </div>

            <div id="udfs" style="display: none;">
                <div class="float-left">
                    <br /><br />
                    <h4>User Defined Fields</h4>
                    <div style="margin-right: 24px;" id="global-udfs">
                    </div>
                </div>
            </div>

            <div class="float-left">
                <br /><br />
                <div class="column r25">
                    <label for="send_email">Notify Responsible Officer?</label><br>
                    <input name="email_officer" type="radio" value="Y" />
                    <b>Yes</b>
                    <br />
                    <input name="email_officer" type="radio" value="N" checked />
                    <b>No</b>
                </div>
                <div class="column r25">
                    <label for="send_email">Notify Action Officer?</label><br>
                    <input name="email_act_officer" type="radio" value="Y" />
                    <b>Yes</b>
                    <br />
                    <input name="email_act_officer" type="radio" value="N" checked />
                    <b>No</b>
                </div>
            </div>
            <div class="float-left">
                <br />
                <br />
                <input type="submit" value="Submit" id="submit" />
                <input type="hidden" name="request_id" value="<?php echo $_GET['id']; ?>" />
                <input type="hidden" name="action" value="RecategoriseRequest" />
            </div>


        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#recategoriseRequest").validate({
            submitHandler: function (form) {
                $("#submit").prop("disabled", true);
                $(this)[0].submit();
                
            },
            invalidHandler: function (event, validator) {
                if (confirm("One or more user defined fields or other fields are mandatory and must be entered before saving this Request. Would you like to continue without completing them?")) {
                    $(this)[0].submit();
                }
            }
        });
    });
</script>