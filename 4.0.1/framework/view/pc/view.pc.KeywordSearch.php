<?php
if(isset($GLOBALS['result']->keyword_result_details) && count($GLOBALS['result']->keyword_result_details) >1){
?>
<script type="text/javascript">

    $(document).ready(function () {
        $("#popup").fadeIn("fast");
        $("#keywordHelpNotes").hide();

        $("#keywordsLookupTable").dataTable();

        $.ajax({
            url: "inc/ajax/ajax.getHelpNotes.php",
            dataType: "json",
            data: {
                request_code: $("#ret_1_request_code").val(), service_code: $("#ret_1_service_code").val(), function_code: $("#ret_1_function_code").val()
            },
            success: function (data) {
                $("#keywordHelpNotes").fadeIn("fast");
                $("#keyword_helpText").val(data.helpText);
                $("#helpnotes_ServiceName").html($("#ret_1_service_name").val() + " / ");
                $("#helpnotes_RequestName").html($("#ret_1_request_name").val() + " / ");
                $("#helpnotes_FunctionName").html($("#ret_1_function_name").val());
                if (data.helpText.length > 0) {
                    $("#keyword_helpText").val(data.helpText);
                }
                else {
                    $("#keyword_helpText").val("No helpnotes available.");
                }
                if (data.helpURL.length > 0) {
                    $("#keyword_helpURL").html(data.helpURL);
                }
                else {
                    $("#keyword_helpURL").html("");
                }


            }
        });
    });

    $('#closeKeywords').click(function () {
        $('#popup').fadeOut("fast");
    });

    $(document).on("click", ".keyword_row",function () {
        var id = $(this).attr('id');
        Load();
        $.ajax({
            url: "inc/ajax/ajax.getHelpNotes.php",
            dataType: "json",
            data: {
                request_code: $("#ret_" + id + "_request_code").val(), service_code: $("#ret_" + id + "_service_code").val(), function_code: $("#ret_" + id + "_function_code").val()
            },
            success: function (data) {
                Unload();
                $("#keywordHelpNotes").fadeIn("fast");
                $("#keyword_helpText").val(data.helpText);
                $("#helpnotes_ServiceName").html($("#ret_" + id + "_service_name").val() + " / ");
                $("#helpnotes_RequestName").html($("#ret_" + id + "_request_name").val() + " / ");
                $("#helpnotes_FunctionName").html($("#ret_" + id + "_function_name").val());
                if (data.helpText.length > 0) {
                    $("#keyword_helpText").val(data.helpText);
                }
                else {
                    $("#keyword_helpText").val("No helpnotes available.");
                }
                if (data.helpURL.length > 0) {
                    $("#keyword_helpURL").html(data.helpURL);
                }
                else {
                    $("#keyword_helpURL").html("");
                }
            }
        });
    });

    $(document).on("dblclick", ".keyword_row", function () {
        $('#popup').fadeOut("fast");
        var id = $(this).attr('id');
        $("#udfs").slideUp("fast");
        $("#udfs_exist").val("0");
        $("#checkHistory").prop("disabled", true).buttonState("disable");
        $("#serviceInput").val($("#ret_" + id + "_service_name").val());
        $("#service").val($("#ret_" + id + "_service_code").val());
        $("#serviceInput").attr("readonly", true);
        $("#requestInput").val($("#ret_" + id + "_request_name").val());
        $("#requestInput").attr("readonly", true);
        $("#request").val($("#ret_" + id + "_request_code").val());
        $("#request").attr("disabled", false);
        $("#functionInput").val($("#ret_" + id + "_function_name").val());
        $("#functionInput").attr("readonly", true);
        $("#function").val($("#ret_" + id + "_function_code").val());
        $("#function").attr("disabled", false);

        if ($("#ret_" + id + "_request_need_func").val() == "Y") {
            $("#functionInput").addClass("required");
            $("#functionRequired").show();

        }
        else {
            $("#functionRequired").hide();
            $("#functionInput").removeClass("required");
        }

        if ($("#ret_" + id + "_function_name").val().length > 0) {
            $("#priority").val($("#ret_" + id + "_function_priority").val());
        }
        else {
            $("#priority").val($("#ret_" + id + "_request_priority").val());
        }

        $("#functionInput").attr("disabled", false);
        $("#requestInput").attr("disabled", false);
        $("#workflowSRF").prop("disabled", false);
        QueryUDFs($("#function").val(), $("#request").val(), $("#service").val());
			<?php if (!isset($_POST['lite'])) { ?>
        ClearHelpNotes();
        CheckMandatoryFields($("#service").val(), $("#request").val(), $("#function").val());
        GetHelpNotes($("#function").val(), $("#request").val(), $("#service").val());
        GetHelpNotes("", $("#request").val(), $("#service").val());
        GetHelpNotes("", "", $("#service").val());
        CheckCountOnlyAjax($("#service").val(), $("#request").val(), $("#function").val());
        if (($("#historyaddrtype").val() == "L" && $("#lsuburb").val().length > 0)
            || ($("#historyaddrtype").val() == "C" && $("#i_csuburb").val().length > 0)
            || ($("#historyaddrtype").val() == "C" && $("#o_csuburb").val().length > 0)
            || ($("#historyaddrtype").val() == "B" && $("#lcsuburb").val().length > 0)
            || ($("#historyaddrtype").val() == "B" && $("#i_csuburb").val().length > 0)
            || ($("#historyaddrtype").val() == "B" && $("#o_csuburb").val().length > 0)
            ) {
            CheckHistory($("#historyaddrtype").val());
        }
        if ($("#textareaissue").length) {
            $("#textareaissue").focus();
        } else {
            $("#add-request-textarea").focus();
        }
        <?php } ?>
    });
</script>
<h1>Found Keywords <span class="closePopup">
    <img src="images/delete-icon.png" />
    Close</span></h1>
<div>
    <strong>Click to view helpnotes. Double click to choose SRF.</strong><br />
    <table id="keywordsLookupTable" class="sortable" title="" cellspacing="0" style="color: black;">
        <thead>
            <tr>
                <th>Keyword</th>
                <th>Service Name</th>
                <th>Request Name</th>
                <th>Function Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
    $number=0;
	$set = 0;
	foreach($GLOBALS['result']->keyword_result_details as $result_n_ar){
        $set ++;
        $number = $number+1;
        if($number == 2){
            $class = "dark";
            $number = 0;
        }
        else{
            $class = "light";
        }
            ?>
            <tr class="<?php echo $class; ?> keyword_row" id="<?php echo $set; ?>" title="">
                <input type="hidden" id="ret_<?php echo $set; ?>_service_code" value="<?php if(isset($result_n_ar->service_code)){ echo $result_n_ar->service_code; } else { echo ""; } ?>" />
                <input type="hidden" id="ret_<?php echo $set; ?>_request_code" value="<?php if(isset($result_n_ar->request_code)){ echo $result_n_ar->request_code; } else { echo ""; } ?>" />
                <input type="hidden" id="ret_<?php echo $set; ?>_function_code" value="<?php if(isset($result_n_ar->function_code)){ echo $result_n_ar->function_code; } else { echo ""; } ?>" />
                <input type="hidden" id="ret_<?php echo $set; ?>_service_name" value="<?php if(isset($result_n_ar->service_name)){ echo $result_n_ar->service_name; } else { echo ""; } ?>" />
                <input type="hidden" id="ret_<?php echo $set; ?>_request_name" value="<?php if(isset($result_n_ar->request_name)){ echo $result_n_ar->request_name; } else { echo ""; } ?>" />
                <input type="hidden" id="ret_<?php echo $set; ?>_function_name" value="<?php if(isset($result_n_ar->function_name)){ echo $result_n_ar->function_name; } else { echo ""; } ?>" />
                <input type="hidden" id="ret_<?php echo $set; ?>_request_need_func" value="<?php if(isset($result_n_ar->request_need_func)){ echo $result_n_ar->request_need_func; } else { echo ""; } ?>" />
                <input type="hidden" id="ret_<?php echo $set; ?>_request_priority" value="<?php if(isset($result_n_ar->request_priority)){ echo $result_n_ar->request_priority; } else { echo ""; } ?>" />
                <input type="hidden" id="ret_<?php echo $set; ?>_function_priority" value="<?php if(isset($result_n_ar->function_priority)){ echo $result_n_ar->function_priority; } else { echo ""; } ?>" />
                <td><?php if(isset($result_n_ar->keyword)){ echo $result_n_ar->keyword; } else { echo ""; } ?></td>
                <td><?php if(isset($result_n_ar->service_name)){ echo $result_n_ar->service_name; } else { echo ""; } ?></td>
                <td><?php if(isset($result_n_ar->request_name)){ echo $result_n_ar->request_name; } else { echo ""; } ?></td>
                <td><?php if(isset($result_n_ar->function_name)){ echo $result_n_ar->function_name; } else { echo ""; } ?></td>
            </tr>
            <?php
                          
                          
	}
    
            ?>
        </tbody>
    </table>
    <div id="keywordHelpNotes" class="float-left">
        <h2>Helpnotes</h2>
        <strong><span id="helpnotes_ServiceName"></span><span id="helpnotes_RequestName"></span><span id="helpnotes_FunctionName"></span></strong>
        <br />
        <strong>Link:</strong> <span id="keyword_helpURL"></span>
        <br />
        <br />
        <textarea id="keyword_helpText" readonly="readonly" style="height: 230px;"></textarea>
    </div>
</div>

<?php
}
elseif(isset($GLOBALS['result']->keyword_result_details) && count($GLOBALS['result']->keyword_result_details) ==1){
	$result_n_ar = $GLOBALS['result']->keyword_result_details;
?>
<input type="hidden" id="ret_service_code" value="<?php if(isset($result_n_ar->service_code)){ echo $result_n_ar->service_code; } else { echo ""; } ?>" />
<input type="hidden" id="ret_request_code" value="<?php if(isset($result_n_ar->request_code)){ echo $result_n_ar->request_code; } else { echo ""; } ?>" />
<input type="hidden" id="ret_function_code" value="<?php if(isset($result_n_ar->function_code)){ echo $result_n_ar->function_code; } else { echo ""; } ?>" />
<input type="hidden" id="ret_service_name" value="<?php if(isset($result_n_ar->service_name)){ echo $result_n_ar->service_name; } else { echo ""; } ?>" />
<input type="hidden" id="ret_request_name" value="<?php if(isset($result_n_ar->request_name)){ echo $result_n_ar->request_name; } else { echo ""; } ?>" />
<input type="hidden" id="ret_function_name" value="<?php if(isset($result_n_ar->function_name)){ echo $result_n_ar->function_name; } else { echo ""; } ?>" />
<input type="hidden" id="ret_request_need_func" value="<?php if(isset($result_n_ar->request_need_func)){ echo $result_n_ar->request_need_func; } else { echo ""; } ?>" />
<input type="hidden" id="ret_request_priority" value="<?php if(isset($result_n_ar->request_priority)){ echo $result_n_ar->request_priority; } else { echo ""; } ?>" />
<input type="hidden" id="ret_function_priority" value="<?php if(isset($result_n_ar->function_priority)){ echo $result_n_ar->function_priority; } else { echo ""; } ?>" />

<script type="text/javascript">
    $(document).ready(function () {
        $("#serviceInput").val($("#ret_service_name").val());
        $("#service").val($("#ret_service_code").val());
        $("#serviceInput").attr("readonly", true);
        $("#udfs").slideUp("fast");
        $("#udfs_exist").val("0");
        $("#requestInput").val($("#ret_request_name").val());
        $("#requestInput").attr("readonly", true);
        $("#request").val($("#ret_request_code").val());
        $("#request").attr("disabled", false);
        $("#requestInput").attr("disabled", false);
        $("#checkHistory").prop("disabled", true).buttonState("disable");
        $("#functionInput").val($("#ret_function_name").val());
        $("#functionInput").attr("readonly", true);
        $("#function").val($("#ret_function_code").val());
        $("#function").attr("disabled", false);
        $("#workflowSRF").prop("disabled", false);
        if ($("#ret_request_need_func").val() == "Y") {
            $("#functionInput").addClass("required");
            $("#functionRequired").show();

        }
        else {
            $("#functionRequired").hide();
            $("#functionInput").removeClass("required");
        }

        if ($("#ret_function_name").val().length > 0) {
            $("#priority").val($("#ret_function_priority").val());
        }
        else {
            $("#priority").val($("#ret_request_priority").val());
        }

        $("#functionInput").attr("disabled", false);
        QueryUDFs($("#function").val(), $("#request").val(), $("#service").val());
			<?php if (!isset($_POST['lite'])) { ?>
        ClearHelpNotes();
        GetHelpNotes($("#function").val(), $("#request").val(), $("#service").val());
        GetHelpNotes("", $("#request").val(), $("#service").val());
        GetHelpNotes("", "", $("#service").val());
        CheckCountOnlyAjax($("#service").val(), $("#request").val(), $("#function").val());
        CheckMandatoryFields($("#service").val(), $("#request").val(), $("#function").val());
        CheckHistory();
        <?php } ?>
    });
</script>
<?php
}
else{
    if($_SESSION['roleSecurity']->maint_exclude == "Y"){
?>
<script type="text/javascript">
    alert("The keyword you've chosen is associated with a count only SRF. Please choose another keyword.");
</script>
<?php
    }
    else{
?>
<script type="text/javascript">
    alert("There are no SRFs associated with this keyword.");
</script>
<?php
    }
}
?>

