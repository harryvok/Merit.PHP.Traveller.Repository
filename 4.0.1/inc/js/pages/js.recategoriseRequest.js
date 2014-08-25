// Recategorise Request Common JS

$(document).ready(function () {


    /* SRF */

    // Keyword Typealong
    $("#keywordSearch").on(eventName, function (event) {
        $("#keywordSearch").val("").autocomplete("search", "");
    });
    function keywordResponse(event, ui) {
        var value = "";
        if (typeof ui.content != "undefined" && ui.content.length === 1) { value = ui.content[0].value; }
        else if (typeof ui.item != "undefined" && ui.item.value.length > 0) { value = ui.item.value; }
        if (value.length > 0) {
            Load();
            $("#keywordSearch").val(value).blur().autocomplete("close");
            $.ajax({
                url: 'inc/ajax/ajax.keywordSearch.php',
                type: 'post',
                data: { keyword: value, lite: true },
                success: function (data) {
                    Unload();
                    $('#popup').html(data);
                }
            });
        }
    }

    // Service Input
    $("#serviceInput").on(eventName, function (event) {
        $("#serviceInput").val("").attr("readonly", false).autocomplete("search", "");
        setTimeout(function () {
            serviceReset();
        }, 0);
    });

    function serviceReset() {
        window.clicked["requestInput"] = false;
        window.clicked["functionInput"] = false;
        ClearHelpNotes();
        $("#keywordSearch").val("");
        $("#adhocOfficer").html("");
        $("#chkCount").val("0");
        $("#priority").val("");
        $("#priority option").prop("selected", false);
        $('#priority').selectmenuState('refresh', true);
        $("#functionRequired").hide();
        $("#countOnly").val("0");
        $("#request").val("");
        $("#requestInput").val("").attr("disabled", true).textInputState('disable');
        $("#function").val("");
        $("#functionInput").val("").attr("disabled", true).removeClass("required").textInputState('disable');
        $("#service").val("");
        $("#workflowSRF").prop("disabled", true);
    }

    var serviceResponse = function (event, ui) {
        var label = ""; var code = "";
        if (typeof ui.content != "undefined" && ui.content.length === 1) { label = ui.content[0].label; code = ui.content[0].code; }
        else if (typeof ui.item != "undefined" && ui.item.label.length > 0) { label = ui.item.label; code = ui.item.code; }
        if (label.length > 0 || code.length > 0) {
            $("#service").val(code);
            $("#request").val("");
            $("#function").val("");
            $("#functionInput").val("").attr("disabled", true).addClass("ui-disabled").textInputState('disable');
            $("#serviceInput").val(label).attr("readonly", true).autocomplete("close");
            $("#requestInput").val("").attr("disabled", false).removeClass("ui-disabled").textInputState('enable');
            QueryUDFs('0', '0', $("#service").val());
            $("#requestInput").trigger("click");
        }
    }

    // Request Input
    function requestInit() {
        window.clicked["functionInput"] = false;
        $("#request").val("");
        $("#requestInput").val("").attr("disabled", false).textInputState('enable');
        $("#function").val("");
        $("#functionInput").val("").attr("disabled", true).addClass("ui-disabled").textInputState('disable');
        $("#functionInput").removeClass("required");
        $("#functionRequired").hide();
        $("#requestInput").attr("readonly", false).trigger("focus");
        return $("#serviceInput").val();
    }
    var requestResponse = function (event, ui) {
        var label = ""; var code = ""; var priority = ""; var count_only = ""; var need_function = "";
        if (typeof ui.content != "undefined" && ui.content.length === 1) { label = ui.content[0].label; code = ui.content[0].code; priority = ui.content[0].priority; count_only = ui.content[0].count_only; need_function = ui.content[0].need_function; }
        else if (typeof ui.item != "undefined" && ui.item.label.length > 0) { label = ui.item.label; code = ui.item.code; priority = ui.item.priority; count_only = ui.item.count_only; need_function = ui.item.need_function; }
        if (label.length > 0 || code.length > 0) {
            $(this).removeClass("ui-autocomplete-loading");
            $("#request").val(code);
            $("#function").val("");
            $("#requestInput").val(label).attr("readonly", true);
            if (need_function == "Y") {
                $("#functionInput").addClass("required");
                $("#functionRequired").show();

            }
            else {
                $("#functionRequired").hide();
                $("#functionInput").removeClass("required");
            }
            QueryUDFs('0', $("#request").val(), $("#service").val());
            $("#functionInput").val("").prop("disabled", false).prop("readonly", false).removeClass("ui-disabled");
            $("#functionInput").textInputState('enable');
            $("#requestInput").autocomplete("close");
            $("#functionInput").trigger("click");


        }
    }

    // Function Input
    function functionInit() {
        $("#function").val("");
        $("#functionInput").val("").attr("readonly", false);
        $("#functionInput").trigger("focus");
        return $("#requestInput").val();
    }
    var functionResponse = function (event, ui) {
        var label = ""; var code = ""; var priority = ""; var count_only = "";
        if (typeof ui.content != "undefined" && ui.content.length === 1) { label = ui.content[0].label; code = ui.content[0].code; priority = ui.content[0].priority; count_only = ui.content[0].count_only; }
        else if (typeof ui.item != "undefined" && ui.item.label.length > 0) { label = ui.item.label; code = ui.item.code; priority = ui.item.priority; count_only = ui.item.count_only; }
        if (label.length > 0 || code.length > 0) {
            $("#functionInput").removeClass("ui-autocomplete-loading");
            $("#function").val(code);
            QueryUDFs($("#function").val(), $("#request").val(), $("#service").val());
            $("#functionInput").val(label).removeClass("ui-autocomplete-loading").attr("readonly", true);
            $("#functionInput").autocomplete("close");
        }
    }

    
    /* INITIALISE */

    $("#keywordSearch").autoCompleteInit("inc/ajax/ajax.keywordList.php", null, keywordResponse);
    $("#serviceInput").autoCompleteInit("inc/ajax/ajax.getServiceTypes.php", { term: "" }, serviceResponse);
    $("#requestInput").autoCompleteInitSeq(requestInit, "inc/ajax/ajax.getRequestTypes.php", { term: "", service_code: function () { return $("#service").val(); } }, requestResponse);
    $("#functionInput").autoCompleteInitSeq(functionInit, "inc/ajax/ajax.getFunctionTypes.php", { term: "", service_code: function () { return $("#service").val(); }, request_code: function () { return $("#request").val(); } }, functionResponse);
   
    /* */
});