// New Request Common JS

$(document).ready(function () {


    /* SRF */

    // Keyword Typealong
    $("#keywordSearch").on(eventName, function (event) {
        $("#infoHover").fadeOut("fast");
        $("#keywordSearch").val("").autocomplete("search", "");
    });
    function keywordResponse(event, ui) {
        var value = "";
        if (typeof ui.content != "undefined" && ui.content.length === 1) {
            value = ui.content[0].value;
        }
        else if (typeof ui.item != "undefined" && ui.item.value.length > 0) {
            value = ui.item.value;
        }
        if (value.length > 0) {
            Load();
            $("#keywordSearch").val(value).blur().autocomplete("close");
            $.ajax({
                url: 'inc/ajax/ajax.keywordSearch.php',
                type: 'post',
                data: { keyword: value },
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
    }

    var serviceResponse = function (event, ui) {
        var label = "";
        var code = "";
        if (typeof ui.content != "undefined" && ui.content.length === 1) {
            label = ui.content[0].label;
            code = ui.content[0].code;
        }
        else if (typeof ui.item != "undefined" && ui.item.label.length > 0) {
            label = ui.item.label;
            code = ui.item.code;
        }
        if (label.length > 0 || code.length > 0) {
            $("#service").val(code);
            $("#request").val("");
            $("#function").val("");

            QueryUDFs('0', '0', $("#service").val());
            GetHelpNotes('', '', $("#service").val());

            $("#functionInput").val("").attr("disabled", true).addClass("ui-disabled").textInputState('disable');
            $("#serviceInput").val(label).attr("readonly", true).autocomplete("close");
            $("#requestInput").val("").attr("disabled", false).removeClass("ui-disabled").textInputState('enable');
            $("#requestInput").trigger("click");
        }
    }

    // Request Input
    function requestInit() {
        window.clicked["functionInput"] = false;
        $("#request").val("");
        $("#requestInput").val("").attr("disabled", false).textInputState('enable');
        $("#request_help").fadeOut("fast");
        $("#request_helpText").val("");
        $("#request_helpURL").val("");
        $("#function_help").fadeOut("fast");
        $("#function_helpText").val("");
        $("#function_helpURL").val("");
        $("#priority").val("");
        $("#priority option").prop("selected", false);
        $('#priority').selectmenuState('refresh', true);
        $("#function").val("");
        $("#functionInput").val("").attr("disabled", true).addClass("ui-disabled").textInputState('disable');
        $(".hoverDiv").fadeOut("fast");
        $("#functionInput").removeClass("required");
        $("#functionRequired").hide();
        $("#adhocOfficer").html("");
        $("#chkCount").val("0");
        $("#countOnly").val("0");
        $("#requestInput").attr("readonly", false).trigger("focus");
        return $("#serviceInput").val();
    }
    var requestResponse = function (event, ui) {
        var label = "";
        var code = "";
        var need_function = "";
        var priority = "";
        if (typeof ui.content != "undefined" && ui.content.length === 1) {
            label = ui.content[0].label;
            code = ui.content[0].code;
            need_function = ui.content[0].need_function;
            priority = ui.content[0].priority;
        }
        else if (typeof ui.item != "undefined" && ui.item.label.length > 0) {
            label = ui.item.label;
            code = ui.item.code;
            need_function = ui.item.need_function;
            priority = ui.item.priority;
        }
        if (label.length > 0 || code.length > 0) {
            
                
            $(this).removeClass("ui-autocomplete-loading");
            $("#request").val(code);
            $("#function").val("");
            $("#priority").val(priority);

            $("#priority option").prop("selected", false);
            $("#priority option[value=" + priority + "]").prop("selected", true);
            $('#priority').selectmenuState('refresh', true);

            QueryUDFs('0', $("#request").val(), $("#service").val());
            GetHelpNotes('', $("#request").val(), $("#service").val());

            $("#requestInput").val(label).attr("readonly", true);
            if (need_function == "Y") {
                $("#functionInput").addClass("required");
                $("#functionRequired").show();

            }
            else {
                $("#functionRequired").hide();
                $("#functionInput").removeClass("required");
            }
                
            $("#functionInput").val("").prop("disabled", false).prop("readonly", false).removeClass("ui-disabled");
            $("#functionInput").textInputState('enable');
            $("#requestInput").autocomplete("close");
            $("#functionInput").trigger("click");
        }
    }

    // Function Input
    function functionInit() {
        $("#priority").val("");
        $("#priority option").prop("selected", false);
        $('#priority').selectmenuState('refresh', true);
        $("#function").val("");
        $("#functionInput").val("").attr("readonly", false);
        $("#adhocOfficer").html("");
        $(".hoverDiv").fadeOut("fast");
        $("#countOnly").val("0");
        $("#function_help").fadeOut("fast");
        $("#function_helpText").val("");
        $("#function_helpURL").val("");
        $("#functionInput").trigger("focus");
        return $("#requestInput").val();
    }
    var functionResponse = function (event, ui) {
        var label = "";
        var code = "";
        var priority = "";
        if (typeof ui.content != "undefined" && ui.content.length === 1) {
            label = ui.content[0].label;
            code = ui.content[0].code;
            priority = ui.content[0].priority;
        }
        else if (typeof ui.item != "undefined" && ui.item.label.length > 0) {
            label = ui.item.label;
            code = ui.item.code;
            priority = ui.item.priority;
        }
        if (label.length > 0 || code.length > 0) {
            $("#functionInput").removeClass("ui-autocomplete-loading");
            $("#function").val(code);
            $("#functionInput").val(label).removeClass("ui-autocomplete-loading").attr("readonly", true);
            $("#priority").val(priority);
            $("#priority option").prop("selected", false);
            $("#priority option[value=" + priority + "]").prop("selected", true);
            $('#priority').selectmenuState('refresh', true);
            QueryUDFs($("#function").val(), $("#request").val(), $("#service").val());
            GetHelpNotes($("#function").val(), $("#request").val(), $("#service").val());
            CheckCountOnly($("#service").val(), $("#request").val(), $("#function").val());
            $("#functionInput").autocomplete("close");
        }
    }
    function functionSuccess(data) {
        if (data.length === 0) {
            if ($("#chkCount").val() === "0") {
                $("#chkCount").val("1");
                CheckCountOnly($("#service").val(), $("#request").val(), '');

            }
            $("#functionInput").attr("readonly", true).attr("disabled", true).addClass("ui-disabled").textInputState('disable');
            return false;
        }
        return true;
    }
    
    /* */

    /* LOCATION ADDRESS */

    // Clear Facility
    function clearFacility() {
        if (confirm("This will clear your current chosen facility. Continue?")) {
            $("#facilityTypeInput").val("");
            $("#facilityInput").val("").attr("readonly", false).attr("disabled", false).textInputState('disable');
            $("#facilityTypeId").val("");
            $("#facilityId").val("");
            $("#lno").val("").attr("readonly", false);
            $("#lfno").val("").attr("readonly", false);
            $("#ldesc").val("").attr("readonly", false);
            $("#facility").val("").attr("readonly", false);
            $("#lstreet").val("").attr("readonly", false);
            $("#ltype").val("").attr("readonly", false).attr("disabled", true).addClass("ui-disabled").textInputState('disable');
            $("#lsuburb").val("").attr("readonly", false).attr("disabled", true).addClass("ui-disabled").textInputState('disable');
            return true;
        }
        else {
            return false;
        }
    }

    // Use GPS Address
    $("#gmaps_Use").on(eventName, function(event) {
        $("#lfno").val($("#gmaps_FNumber").val()).attr("readonly", false);
        $("#lno").val($("#gmaps_Number").val()).attr("readonly", false);
        $("#lstreet").val($("#gmaps_StreetName").val()).attr("readonly", false);
        $("#ltype").val($("#gmaps_StreetType").val()).attr("disabled", false).textInputState('enable');
        $("#lsuburb").val($("#gmaps_Suburb").val()).attr("disabled", false).textInputState('enable');
        $("#ldesc").val("");
        $("#facilityInput").val("");
        $("#facilityId").val("");
        $("#addressId").val("");

        $("#use_gmaps_coord").val(1);
    });

    // Facility type
    $("#facilityTypeInput").on(eventName, function (event) {
        if ($("#facilityTypeInput").val().length > 0) {
            if (clearFacility()) {
                $("#facilityTypeInput").trigger("click");
            }
            else {
                $(this).blur();
                return;
            }
        }
        else {
            $("#facilityTypeInput").autocomplete("search", "");
            if ($(this).attr("readonly") == 'readonly') {
                window.clicked["facilityInput"] = false;
                $(this).attr("readonly", false).val("").attr("readonly", false);
                $("#facilityTypeId").val("");
                $("#facilityInput").val("").attr("disabled", false).textInputState('enable');

                $("#facilityId").val("");
                $("#addressId").val("");
                $("#lstreet").val("").attr("readonly", false);
                $("#ltype").val("").attr("readonly", false);
                $("#lsuburb").val("").attr("readonly", false);
                $("#ldesc").val("").attr("readonly", false);
                $("#lno").val("").attr("readonly", false);
                $("#lfno").val("").attr("readonly", false);

                $("#ltype").attr("disabled", true).textInputState('disable');
                $("#ltype").addClass("ui-disabled");
                $("#lsuburb").attr("disabled", true).textInputState('disable');
                $("#lsuburb").addClass("ui-disabled");
                $("#lstreet").addClass("required");
                $("#ltype").addClass("required");
                $("#lsuburb").addClass("required");
                $("#lno").addClass("required");
                $(this).trigger("click");
            }
        }
    });
    function facilityTypeResponse(event, ui) {
        var label = "";
        var index = "";
        if (typeof ui.content != "undefined" && ui.content.length === 1) {
            label = ui.content[0].label;
            index = ui.content[0].index;
        }
        else if (typeof ui.item != "undefined" && ui.item.label.length > 0) {
            label = ui.item.label;
            index = ui.item.index;
        }
        if (label.length > 0) {

            $("#facilityTypeInput").blur();
            $("#facilityTypeInput").attr("readonly", true).val(label);
            $("#facilityTypeId").val(index);
            $("#facilityInput").textInputState('enable');
            $("#facilityInput").attr("disabled", false).trigger("click");
        }
    }

    // Facility Name
    function facilityInit() {
        if ($("#facilityInput").attr("readonly") == 'readonly') {
            $("#facilityId").val("");
            $("#addressId").val("");
            $("#lstreet").val("").attr("readonly", false);
            $("#ltype").val("").attr("readonly", false).attr("disabled", true).addClass("ui-disabled").addClass("required").textInputState('disable');
            $("#lsuburb").val("").attr("readonly", false).attr("disabled", true).addClass("ui-disabled").addClass("required").textInputState('disable');
            $("#ldesc").val("").attr("readonly", false);
            $("#lno").val("").attr("readonly", false).addClass("required");
            $("#lfno").val("").attr("readonly", false);
            $("#facilityInput").attr("readonly", false).val("");
        }

        return $("#facilityTypeInput").val();
    }
    function facilityResponse(event, ui) {
        var label = "";
        var index = "";
        var address = "";
        if (typeof ui.content != "undefined" && ui.content.length === 1) {
            label = ui.content[0].label;
            index = ui.content[0].index;
            address = ui.content[0].address;
        }
        else if (typeof ui.item != "undefined" && ui.item.label.length > 0) {
            label = ui.item.label;
            index = ui.item.index;
            address = ui.item.address;
        }
        if (label.length > 0) {
            $("#facilityInput").blur();
            $("#facilityInput").attr("readonly", true);
            $("#facilityInput").val(label);
            $("#facilityId").val(index);

            $("#lstreet").removeClass("required");
            $("#ltype").removeClass("required");
            $("#lsuburb").removeClass("required");
            $("#lno").removeClass("required");

            $("#addressId").val(address);
            if (address !== 0) {
                $.ajax({
                    url: 'inc/ajax/ajax.getAddress.php',
                    type: 'POST',
                    dataType: "json",
                    data: 'addressId=' + address,
                    success: function (data) {
                        $("#lstreet").val(data.street_name).attr("readonly", true);
                        $("#ltype").val(data.street_type).attr("readonly", true).attr("disabled", false).removeClass("ui-disabled").textInputState('enable');
                        $("#lsuburb").val(data.locality).attr("readonly", true).attr("disabled", false).removeClass("ui-disabled").textInputState('enable');
                        $("#ldesc").val(data.address_desc).attr("readonly", true);

                        if (data.house_number.length > 0) {
                            $("#lno").val(data.house_number);
                            $("#lno").val($("#lno").val().replace(/[A-Za-z$-]/g, ""));
                        }
                        else if (data.house_suffix.length > 0) {
                            $("#lno").val(data.house_suffix);
                            $("#lno").val($("#lno").val().replace(/[A-Za-z$-]/g, ""));
                        }
                        else {
                            $("#lno").val(0);
                        }
                        if (data.house_suffix.length > 0) {
                            $("#lfno").val(data.house_suffix);
                        }
                        else if (data.house_number.length > 0) {
                            $("#lfno").val(data.house_number);
                        }
                        else {
                            $("#lfno").val(0);
                        }

                        if (parseInt(data.house_suffix) == parseInt(data.house_number)) {
                            $("#lfno").val("");
                        }

                        $("#lno").attr("readonly", true);
                        $("#lfno").attr("readonly", true);

                        $("#use_gmaps_coord").val(0);
                    }
                });
            }
            else {
                $("#lstreet").val("").attr("readonly", false);
                $("#ltype").val("").attr("readonly", false).attr("disabled", true).textInputState('disable');
                $("#lsuburb").val("").attr("readonly", false).attr("disabled", true).textInputState('disable');
                $("#ldesc").val("").attr("readonly", false);
                $("#lno").val("").attr("readonly", false);
                $("#lfno").val("").attr("readonly", false);
            }
        }
    }

    $("#lno").on(eventName, function (event) {
        if ($("#facilityInput").val().length > 0) {
            if (clearFacility()) {
                $("#lno").trigger("click");
            }
            else {
                $(this).blur();
                return;
            }
        }
    });

    $("#lfno").on(eventName, function (event) {
        if ($("#facilityInput").val().length > 0) {
            if (clearFacility()) {
                $("#lfno").trigger("click");
            }
            else {
                $(this).blur();
                return;
            }
        }
    });
    // Location Street Name
    $("#lstreet").on(eventName, function (event) {
        if ($("#facilityInput").val().length > 0) {
            if (clearFacility()) {
                $("#lstreet").trigger("click");
            }
            else {
                $(this).blur();
                return;
            }
        }
        else {
            window.clicked["ltype"] = false;
            window.clicked["lsuburb"] = false;
            $("#ltype").val("").attr("disabled", true).addClass("ui-disabled").textInputState('disable');
            $("#lsuburb").val("").attr("disabled", true).addClass("ui-disabled").textInputState('disable');
            $("#lstreet").attr("readonly", false).val("").autocomplete("search", "");
        }
    });
    var streetResponse = function (event, ui) {
        var label = "";
        if (typeof ui.content != "undefined" && ui.content.length === 1) {
            label = ui.content[0].label;

        }
        else if (typeof ui.item != "undefined" && ui.item.label.length > 0) {
            label = ui.item.label;
        }
        if (label.length > 0) {
            $("#lstreet").val(label).attr("readonly", true).attr("disabled", false).removeClass("ui-autocomplete-loading").autocomplete("close").textInputState('enable');
            $("#ltype").textInputState('enable');
            $("#ltype").attr("disabled", false).removeClass("ui-disabled").trigger("click");
        }
    }
    
    // Location Street Type
    function streetTypeInit() {
        window.clicked["lsuburb"] = false;
        if ($("#facilityInput").val().length > 0) {
            if (clearFacility()) {
                $("#lstreet").trigger("click");
            }
            else {
                $(this).blur();
                return;
            }
        }

        $("#lsuburb").val("").attr("disabled", true).addClass("ui-disabled").textInputState('disable');
        $("#ltype").textInputState('enable');
        $("#ltype").attr("readonly", false).attr("disabled", false).removeClass("ui-disabled").val("").trigger("focus");
        return $("#lstreet").val();
    }
    var streetTypeResponse = function (event, ui) {
        var label = "";
        if (typeof ui.content != "undefined" && ui.content.length === 1) {
            label = ui.content[0].label;

        }
        else if (typeof ui.item != "undefined" && ui.item.label.length > 0) {
            label = ui.item.label;
        }
        if (label.length > 0) {
            $("#ltype").val(label).removeClass("ui-autocomplete-loading").attr("readonly", true);
            $("#lsuburb").textInputState('enable');
            $("#ltype").autocomplete("close");
            $("#lsuburb").attr("disabled", false).removeClass("ui-disabled").trigger("click");
               
        }
    }

    // Location Street Suburb
    function streetSuburbInit() {
        if ($("#facilityInput").val().length > 0) {
            if (clearFacility()) {
                $("#lstreet").trigger("click");
            }
            else {
                $(this).blur();
                return;
            }
        }
        $("#lsuburb").attr("readonly", false).val("").attr("disabled", false).removeClass("ui-disabled").textInputState('enable');
        return $("#ltype").val();
    }
    var streetSuburbResponse = function (event, ui) {
        var label = "";
        if (typeof ui.content != "undefined" && ui.content.length === 1) {
            label = ui.content[0].label;

        }
        else if (typeof ui.item != "undefined" && ui.item.label.length > 0) {
            label = ui.item.label;
        }
        if (label.length > 0) {
            $("#lsuburb").val(label).attr("readonly", true).removeClass("ui-autocomplete-loading");
            $("#lsuburb").autocomplete("close");
        }
    }

    $("#lno").facClick();
    $("#lfno").facClick();
    $("#ldesc").facClick();

    /* */
    
    /* CUSTOMER DETAILS */

    // Clear Customer Details
    $("#clearDetails").on(eventName, function (event) {
        $("#surname").val("");
        $("#given").val("");
        $("#pref_title").val("");
        $("#cust_mobile").val("");
        $("#cust_work").val("");
        $("#cust_phone").val("");
        $("#cust_fax").val("");
        $("#email_address").val("");
        $("#company").val("");
        $("#cust_type").val("");
    });

    // My Details Button
    $('#myDetails').on(eventName, function (event) {
        Load();
        $.ajax({
            url: 'inc/ajax/ajax.getMyDetails.php',
            dataType: "json",
            success: function (data) {
                Unload();
                $("#surname").val(data.surname);
                $("#given").val(data.given_names);
                $("#pref_title").val("");
                $("#cust_mobile").val(data.mobile_no);
                $("#cust_phone").val(data.telephone);
                $("#cust_fax").val("");
                $("#email_address").val(data.mail_id);
                $("#company").val("");
                $("#cust_type").val("STAFF");
                $('#cust_type').selectmenuState('refresh');
            }
        });
    });

    /* */

    /* CUSTOMER ADDRESS */

    // Customer Street Name
    $("#i_cstreet").on(eventName, function (event) {
        window.clicked["i_ctype"] = false;
        window.clicked["i_csuburb"] = false;
        $("#i_ctype").val("").attr("disabled", true).addClass("ui-disabled").textInputState('disable');
        $("#i_csuburb").val("").attr("disabled", true).addClass("ui-disabled").textInputState('disable');
        $("#i_cstreet").val("").attr("readonly", false).autocomplete("search", "");
    });
    var cStreetResponse = function (event, ui) {
        var label = "";
        if (typeof ui.content != "undefined" && ui.content.length === 1) {
            label = ui.content[0].label;

        }
        else if (typeof ui.item != "undefined" && ui.item.label.length > 0) {
            label = ui.item.label;
        }
        if (label.length > 0) {
            $("#i_cstreet").val(label).attr("readonly", true).attr("disabled", false).removeClass("ui-autocomplete-loading").autocomplete("close").textInputState('enable');
            $("#i_ctype").textInputState('enable');
            $("#i_ctype").attr("disabled", false).removeClass("ui-disabled").trigger("click");
        }
    }

    // Customer Street Type
    function cTypeInit() {
        window.clicked["i_csuburb"] = false;

        $("#i_csuburb").val("").attr("disabled", true).addClass("ui-disabled").textInputState('disable');
        $("#i_ctype").attr("readonly", false).attr("disabled", false).removeClass("ui-disabled").val("").trigger("focus").textInputState('enable');
        return $("#i_cstreet").val();
    }
    var cTypeResponse = function (event, ui) {
        var label = "";
        if (typeof ui.content != "undefined" && ui.content.length === 1) {
            label = ui.content[0].label;

        }
        else if (typeof ui.item != "undefined" && ui.item.label.length > 0) {
            label = ui.item.label;
        }
        if (label.length > 0) {
            $("#i_ctype").val(label).removeClass("ui-autocomplete-loading").attr("readonly", true);
            $("#i_csuburb").textInputState('enable');
            $("#i_csuburb").attr("disabled", false).removeClass("ui-disabled").trigger("click");
            $("#i_csuburb").autocomplete("close");
        }
    }

    // Customer Street Suburb
    function cSuburbInit() {
        $("#i_csuburb").attr("readonly", false).val("").attr("disabled", false).removeClass("ui-disabled").textInputState('enable');
        return $("#i_ctype").val();
    }
    var cSuburbResponse = function (event, ui) {
        var label = "";
        if (typeof ui.content != "undefined" && ui.content.length === 1) {
            label = ui.content[0].label;

        }
        else if (typeof ui.item != "undefined" && ui.item.label.length > 0) {
            label = ui.item.label;
        }
        if (label.length > 0) {
            $("#i_csuburb").val(label).attr("readonly", true).removeClass("ui-autocomplete-loading");
            $("#i_csuburb").autocomplete("close");
        }
    }

    // Customer Details Change
    $('.cadd').change(function () {
        $('#cust_address_id').val('0');
        $('#cust_address_ctr').val('0');
    });

    /* */

    /* OTHER */

    // Adhoc Officer
    $("#newrequest").validate({
        submitHandler: function (form) {
//$("#submit").buttonState("disable");
            $.ajax({
                url: "inc/ajax/ajax.chkIfWorkflow.php",
                dataType: "json",
                data: {
                    request_code: $("#request").val(), service_code: $("#service").val(), function_code: $("#function").val()
                },
                success: function (data) {
                    if (data.workflow_ind == "N" && $("#countOnly").val() == "0") {
                        alert("There is no workflow, please choose another request.");
                        $("#service").val("");
                        $("#request").val("");
                        $("#function").val("");
                        $("#requestInput").val("").attr("disabled", true).textInputState('disable');
                        $("#functionInput").val("").attr("disabled", true).textInputState('disable');
                        $("#serviceInput").val("").autocomplete("search", "").attr("readonly", false);
                        $("#keywordSearch").val("");
                        $("#adhocOfficer").html("");

                    }
                    else {
                        $.ajax({
                            url: 'inc/ajax/ajax.chooseAdhocOfficer.php',
                            type: 'post',
                            data: {
                                ser: $("#service").val(),
                                req: $("#request").val(),
                                func: $("#function").val()
                            },
                            success: function (data) {
                                $('#popup').html(data);
                                $("#adhocOfficer").html(data).trigger("create");
                            }
                        });
                    }
                },
            });
        },
        invalidHandler: function(event, validator) {
            $(".col").trigger("expand");
        },
        ignore: ""
    });

    /* */

    /* INITIALISE */

    $("#keywordSearch").autoCompleteInit("inc/ajax/ajax.keywordList.php", null, keywordResponse);
    $("#serviceInput").autoCompleteInit("inc/ajax/ajax.getServiceTypes.php", { term: "" }, serviceResponse);
    $("#requestInput").autoCompleteInitSeq(requestInit, "inc/ajax/ajax.getRequestTypes.php", { term: "", service_code: function () { return $("#service").val(); } }, requestResponse);
    $("#functionInput").autoCompleteInitSeq(functionInit, "inc/ajax/ajax.getFunctionTypes.php", { term: "", service_code: function () { return $("#service").val(); }, request_code: function () { return $("#request").val(); } }, functionResponse, functionSuccess);
    $("#i_cstreet").autoCompleteAjax("inc/ajax/ajax.getStreets.php", { term: "", id: "i_cstreet" }, cStreetResponse);
    $("#i_ctype").autoCompleteInitSeq(cTypeInit, "inc/ajax/ajax.getStreetTypes.php", { term: "", id: "i_ctype", street: function () { return $('#i_cstreet').val(); } }, cTypeResponse);
    $("#i_csuburb").autoCompleteInitSeq(cSuburbInit, "inc/ajax/ajax.getSuburbs.php", { term: "", id: "i_csuburb", house: function () { return $('#i_cfno').val(); }, street: function () { return $('#i_cstreet').val(); }, street_type: function () { return $('#i_ctype').val(); } }, cSuburbResponse);
    $("#lstreet").autoCompleteAjax("inc/ajax/ajax.getStreets.php", { term: "", id: "lstreet" }, streetResponse);
    $("#ltype").autoCompleteInitSeq(streetTypeInit, "inc/ajax/ajax.getStreetTypes.php", { term: "", id: "ltype", street: function () { return $('#lstreet').val(); } }, streetTypeResponse);
    $("#lsuburb").autoCompleteInitSeq(streetSuburbInit, "inc/ajax/ajax.getSuburbs.php", { term: "", id: "lsuburb", house: function () { return $('#lno').val(); }, street: function () { return $('#lstreet').val(); }, street_type: function () { return $('#ltype').val(); } }, streetSuburbResponse);
    $("#facilityTypeInput").autoCompleteInit("inc/ajax/ajax.getFacilitiesTypeLookup.php", { term: "" }, facilityTypeResponse);
    $("#facilityInput").autoCompleteInit("inc/ajax/ajax.getFacilitiesLookup.php", { term: "" }, facilityResponse);
    $("#facilityInput").autoCompleteInitSeq(facilityInit, "inc/ajax/ajax.getFacilitiesLookup.php", { term: "", facilitiesName: function () { return $("#facilityInput").val(); }, facilitiesType: function () { return $("#facilityTypeInput").val(); } }, facilityResponse);

    /* */
});
if (typeof $("#map-canvas").gmap == 'function') {
    function generateGoogleMaps() {
        var geocoder;
        var map;
        var infowindow = new google.maps.InfoWindow({
            disableAutoPan: false
        });
        var marker;
        var initialLocation;
        var browserSupportFlag = new Boolean();
        var markersArray = [];

        $('#map-canvas').gmap().bind('init', function (event, map) {
            // Try W3C Geolocation (Preferred)
            if (navigator.geolocation) {

                browserSupportFlag = true;
                $('#map-canvas').gmap('getCurrentPosition', function (position, status) {
                    if (status === 'OK') {
                        placeMarker(map, position.coords.latitude, position.coords.longitude)
                    }
                }, function () {
                    handleNoGeolocation(map, browserSupportFlag);
                });
            }
                // Browser doesn't support Geolocation
            else {
                browserSupportFlag = false;
                handleNoGeolocation(map, browserSupportFlag);
            }

            //add click listener to change position of map
            google.maps.event.addListener(map, 'click', function (event) {
                deleteOverlays();

                placeMarker(map, event.latLng.lat(), event.latLng.lng());
            });
        });

        function placeMarker(map, lat, long) {

            $("#gmaps_Number").val("");
            $("#gmaps_FNumber").val("");
            $("#gmaps_StreetName").val("");
            $("#gmaps_FNumber").val("");
            $("#gmaps_StreetName").val("");
            $("#gmaps_StreetType").val("");
            $("#gmaps_PostCode").val("");
            $("#gmaps_Suburb").val("");

            var initialLocation = new google.maps.LatLng(lat, long);

            var latlng = initialLocation;
            setTimeout(function () {
                $("#map-canvas").search({ 'location': latlng }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            $('#map-canvas').gmap('addMarker', { 'position': latlng, 'bounds': false },
                                function (map, marker) {
                                    marker.setTitle(results[0].formatted_address);
                                    markersArray.push(marker);
                                }
                            );

                            for (var i = 0; i <= results[0].address_components.length - 1; i++) {

                                if (results[0].address_components[i].types[0] == "street_number") {
                                    $("#gmaps_Number").val(results[0].address_components[i].short_name);
                                    //$("#gmaps_FNumber").val(results[0].address_components[i].long_name);
                                }
                                if (results[0].address_components[i].types[0] == "route") {
                                    var streetDetails = results[0].address_components[i].long_name.split(" ");
                                    var lastIndex = results[0].address_components[i].short_name.lastIndexOf(" ");
                                    $("#gmaps_StreetName").val(results[0].address_components[i].short_name.substring(0, lastIndex));
                                    $("#gmaps_StreetType").val(streetDetails[streetDetails.length - 1].toUpperCase());
                                }
                                if (results[0].address_components[i].types[0] == "postal_code") {
                                    $("#gmaps_PostCode").val(results[0].address_components[i].long_name);
                                }
                                if (results[0].address_components[i].types[0] == "locality") {
                                    $("#gmaps_Suburb").val(results[0].address_components[i].long_name);
                                }

                            }
                            $("#gmaps_x").val(lat);
                            $("#gmaps_y").val(long);
                            $("#address_gps").val(results[0].formatted_address);
                        } else {
                            alert('No results found');
                        }
                    } else {
                        alert('Geocoder failed due to: ' + status);
                    }
                });
            }, 2500);
        }

        //this gets called each time user selects a different location
        function deleteOverlays() {
            if (markersArray) {
                for (i in markersArray) {
                    markersArray[i].setMap(null);
                }
                markersArray.length = 0;
            }
        }

        function handleNoGeolocation(map, errorFlag) {

            var defaultLat = $("#defaultLat").val();
            var defaultLng = $("#defaultLng").val();

            if (errorFlag == true) {
                placeMarker(map, defaultLat, defaultLng);
            } else {
                placeMarker(map, defaultLat, defaultLng);
            }

        }
    }
}
else {
    function generateGoogleMaps() {
        var geocoder;
        var map;
        var infowindow = new google.maps.InfoWindow({
            disableAutoPan: false
        });
        var marker;
        var initialLocation;
        var browserSupportFlag = new Boolean();
        var markersArray = [];

        function initialize() {

            geocoder = new google.maps.Geocoder();
            var myOptions = {
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

            // Try W3C Geolocation (Preferred)
            if (navigator.geolocation) {

                browserSupportFlag = true;
                navigator.geolocation.getCurrentPosition(function (position) {
                    //place marker on map with coordinates of device
                    placeMarker(map, position.coords.latitude, position.coords.longitude)
                }, function () {
                    handleNoGeolocation(map, browserSupportFlag);
                });
            }
                // Browser doesn't support Geolocation
            else {
                browserSupportFlag = false;
                handleNoGeolocation(map, browserSupportFlag);
            }

            //add click listener to change position of map
            google.maps.event.addListener(map, 'click', function (event) {
                deleteOverlays();

                placeMarker(map, event.latLng.lat(), event.latLng.lng());
            });

        }

        function placeMarker(map, lat, long) {

            $("#gmaps_Number").val("");
            $("#gmaps_FNumber").val("");
            $("#gmaps_StreetName").val("");
            $("#gmaps_FNumber").val("");
            $("#gmaps_StreetName").val("");
            $("#gmaps_StreetType").val("");
            $("#gmaps_PostCode").val("");
            $("#gmaps_Suburb").val("");

            var initialLocation = new google.maps.LatLng(lat, long);
            map.setCenter(initialLocation);
            var latlng = initialLocation;
            setTimeout(function () {
                geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            marker = new google.maps.Marker({
                                position: latlng,
                                map: map
                            });

                            infowindow.setContent(results[0].formatted_address);
                            infowindow.open(map, marker);

                            for (var i = 0; i <= results[0].address_components.length - 1; i++) {

                                if (results[0].address_components[i].types[0] == "street_number") {
                                    $("#gmaps_Number").val(results[0].address_components[i].short_name);
                                    //$("#gmaps_FNumber").val(results[0].address_components[i].long_name);
                                }
                                if (results[0].address_components[i].types[0] == "route") {

                                    var streetDetails = results[0].address_components[i].long_name.split(" ");
                                    var lastIndex = results[0].address_components[i].short_name.lastIndexOf(" ");
                                    $("#gmaps_StreetName").val(results[0].address_components[i].short_name.substring(0, lastIndex));
                                    $("#gmaps_StreetType").val(streetDetails[streetDetails.length - 1].toUpperCase());
                                }
                                if (results[0].address_components[i].types[0] == "postal_code") {
                                    $("#gmaps_PostCode").val(results[0].address_components[i].long_name);
                                }
                                if (results[0].address_components[i].types[0] == "locality") {
                                    $("#gmaps_Suburb").val(results[0].address_components[i].long_name);
                                }

                            }
                            $("#gmaps_x").val(lat);
                            $("#gmaps_y").val(long);
                            $("#address_gps").val(results[0].formatted_address);

                            markersArray.push(marker);


                        } else {
                            alert('No results found');
                        }
                    } else {
                        alert('Geocoder failed due to: ' + status);
                    }
                });
            }, 2500);
        }

        //this gets called each time user selects a different location
        function deleteOverlays() {
            if (markersArray) {
                for (i in markersArray) {
                    markersArray[i].setMap(null);
                }
                markersArray.length = 0;
            }
        }

        function handleNoGeolocation(map, errorFlag) {

            var defaultLat = $("#defaultLat").val();
            var defaultLng = $("#defaultLng").val();

            if (errorFlag == true) {
                placeMarker(map, defaultLat, defaultLng);
            } else {
                placeMarker(map, defaultLat, defaultLng);
            }

        }

        initialize();
    }
}

function getLatLong(callback) {
    var geocoder = new google.maps.Geocoder();
    var address = document.getElementById("address").value;
    if (address.length > 0) {
        setTimeout(function () {
            geocoder.geocode({ 'address': address }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    $("#defaultLat").val(results[0].geometry.location.lat());
                    $("#defaultLng").val(results[0].geometry.location.lng());

                    generateGoogleMaps();
                }
            });
        }, 2500);
    }
    else {
        generateGoogleMaps();
    }

}

google.maps.event.addDomListener(window, 'load', getLatLong);