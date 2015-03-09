// New Request Common JS
 
$(document).ready(function () {
  

    // Validation for customer type ( If data is in given or surname require a cust type ) if empty remove the requirement.
    $("#given").focusout(function () {        
        if ($("#given").val().length > 0) {
            $("#cust_type").addClass("required");
        }
        if ($("#given").val() == "" && $("#surname").val().length == "") {
            $("#cust_type").removeClass("required");
        }
    })

    $('#o_cpobox').keydown(function () {
        if ($('#o_cpobox').val().length > 0) {
            $('#o_csuburb').addClass('required');
        }
        if ($('#o_cpobox').val().length < 1) {
            $('#o_csuburb').removeClass('required');
        }
    });

    $("#surname").focusout(function () {
        if ($("#surname").val().length > 0) {
            $("#cust_type").addClass("required");
        }
        if ($("#given").val() == "" && $("#surname").val().length == "") {
            $("#cust_type").removeClass("required");
        }
    })

    $(window).resize(function () {
        if ($(this).width() < 1050) {
            $("label[for='i_cstreet']").html("<span>Street Name</span><span class='customer_address_label mandLabel' style='color: red; display:none;'> *<br /><br /></span>");
        }
    });
    
    
    // CheckMandatoryFields($("#service").val(), $("#request").val(), $("#function").val());    REMOVED FOR OPTIMIZATION

    /* INITIALISE */
    $("#keywordSearch").autoCompleteInit("inc/ajax/ajax.keywordList.php", null, keywordResponse);
    $("#lstreet").autoCompleteInit("inc/ajax/ajax.getStreets.php", { term: "" }, (streetResponse));
    $("#i_cstreet").autoCompleteInit("inc/ajax/ajax.getStreets.php", { term: "" }, cStreetResponse);
    $("#requestInput").autoCompleteInitSeq(requestInit, "inc/ajax/ajax.getRequestTypes.php", { term: "", service_code: function () { return $("#service").val(); } }, requestResponse);
    $("#functionInput").autoCompleteInitSeq(functionInit, "inc/ajax/ajax.getFunctionTypes.php", { term: "", service_code: function () { return $("#service").val(); }, request_code: function () { return $("#request").val(); } }, functionResponse, functionSuccess);
    $("#i_ctype").autoCompleteInitSeq(cTypeInit, "inc/ajax/ajax.getStreetTypes.php", { term: $("#i_cstreet").val(), id: "i_ctype", street: function () { return $('#i_cstreet').val(); } }, cTypeResponse);
    $("#i_csuburb").autoCompleteInitSeq(cSuburbInit, "inc/ajax/ajax.getSuburbs.php", { term: $("#i_ctype").val(), id: "i_csuburb", house: function () { return $('#newLno').val(); }, street: function () { return $('#i_cstreet').val(); }, street_type: function () { return $('#i_ctype').val(); } }, cSuburbResponse);
    $("#ltype").autoCompleteInitSeq(streetTypeInit, "inc/ajax/ajax.getStreetTypes.php", { term: $("#lstreet").val(), id: "ltype", street: function () { return $('#lstreet').val(); } }, streetTypeResponse);
    $("#lsuburb").autoCompleteInitSeq(streetSuburbInit, "inc/ajax/ajax.getSuburbs.php", { term: $("#ltype").val(), id: "lsuburb", house: function () { return $('#newLno').val(); }, street: function () { return $('#lstreet').val(); }, street_type: function () { return $('#ltype').val(); } }, streetSuburbResponse);
    $("#facilityTypeInput").autoCompleteInit("inc/ajax/ajax.getFacilitiesTypeLookup.php", { term: "" }, facilityTypeResponse);
    $("#facilityInput").autoCompleteInit("inc/ajax/ajax.getFacilitiesLookup.php", { term: "" }, facilityResponse);
    $("#facilityInput").autoCompleteInitSeq(facilityInit, "inc/ajax/ajax.getFacilitiesLookup.php", { term: "", facilitiesName: function () { return $("#facilityInput").val(); }, facilitiesType: function () { return $("#facilityTypeInput").val(); } }, facilityResponse);
    $("#serviceInput").autoCompleteInit("inc/ajax/ajax.getServiceTypes.php", { term: "" }, serviceResponse);


    /* SRF */
    // Keyword Typealong
    $("#keywordSearch").on(eventName, function (event) {
        $("#infoHover").fadeOut("fast");
        $("#submit").prop('disabled', false).buttonState("enable");
        $("#saveMore").prop('disabled', false).buttonState("enable");
        $("#saveCountOnly").prop('disabled', false).buttonState("enable");
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
                data: { keyword: value },
                success: function (data) {
                    Unload();
                    $("#popup").css("top", "100px");
                    $('#popup').html(data);
                }
            });
        }
    }

    // Service Input
    $("#serviceInput").on(eventName, function (event) {
        $("#serviceInput").val("").attr("readonly", false).autocomplete("search", "");
        $("#submit").prop('disabled', false).buttonState("enable");
        $("#saveMore").prop('disabled', false).buttonState("enable");
        $("#saveCountOnly").prop('disabled', false).buttonState("enable");
        setTimeout(function () {
            serviceReset();
        }, 0);
    });

    function serviceReset() {
        window.clicked["requestInput"] = false;
        window.clicked["functionInput"] = false;
        ClearHelpNotes();
        $("#checkHistory").prop("disabled", true).buttonState("disable");
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
        //$("#service").val("");
        $("#workflowSRF").prop("disabled", true);
        $(".mandLabel").hide();
        $("[data-mand]").removeClass("required");        
        $("#udfs_exist").val("0");
        $("#udfs").slideUp("fast");

        //if readonly, it means the only option in the list has been selected
        if (!$("#serviceInput").is('[readonly]')) {
            $("#service").val("");
        }
    }

    function serviceResponse(event, ui) {        
        var label = ""; var code = ""; var service_note = ""; var sauto = "";
        if (typeof ui.content != "undefined" && ui.content.length === 1) { label = ui.content[0].label; code = ui.content[0].code; service_note = ui.content[0].service_note; sauto = ui.content[0].service_auto_help_notes;}
        else if (typeof ui.item != "undefined" && ui.item.label.length > 0) {
            label = ui.item.label; code = ui.item.code; service_note = ui.item.service_note; sauto = ui.item.service_auto_help_notes;}
        if (label.length > 0 || code.length > 0) {
            $("#udfs").slideUp("fast");
            $("#udfs_exist").val("0");
            $("#service").val(code);
            $("#request").val("");
            $("#function").val("");
            $("#rednote").html(service_note);
            QueryUDFs('0', '0', $("#service").val());
            GetHelpNotes('', '', $("#service").val(), sauto, "N", "N", "N");
            $("#functionInput").val("").attr("disabled", true).addClass("ui-disabled").textInputState('disable');
            //modded by harry 22/5
            if (typeof ui.content != "undefined" && ui.content.length === 1)
                $("#serviceInput").val(label).attr("readonly", true).autocomplete("close");
            else
                $("#serviceInput").val(label).attr("readonly", false).autocomplete("close");
            //end mod. original code was just readonly = false
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
        $(".mandLabel").hide();
        $("[data-mand]").removeClass("required");
        $("#functionInput").val("").attr("disabled", true).addClass("ui-disabled").textInputState('disable');
        //$(".hoverDiv").fadeOut("fast");
        $("#functionInput").removeClass("required");
        $("#functionRequired").hide();
        $("#adhocOfficer").html("");
        $("#chkCount").val("0");
        $("#checkHistory").prop("disabled", true).buttonState("disable");
        $("#countOnly").val("0");
        $("#requestInput").attr("readonly", false).trigger("focus");
        return $("#serviceInput").val();
    }

    function requestResponse(event, ui) {
        var label = ""; var code = ""; var priority = ""; var count_only = ""; var need_function = ""; var request_note = ""; var rauto = ""; var request_name_type = ""; var booking_required = ""; var edms_autosave_attach ="";
        if (typeof ui.content != "undefined" && ui.content.length === 1) { label = ui.content[0].label; code = ui.content[0].code; priority = ui.content[0].priority; count_only = ui.content[0].count_only; need_function = ui.content[0].need_function; request_note = ui.content[0].request_note; rauto = ui.content[0].request_auto_help_notes; request_name_type = ui.content[0].request_name_type; booking_required = ui.content[0].booking_required; request_allowance = ui.content[0].request_allowance; edms_autosave_attach = ui.content[0].edms_autosave_attach; }
        else if (typeof ui.item != "undefined" && ui.item.label.length > 0) { label = ui.item.label; code = ui.item.code; priority = ui.item.priority; count_only = ui.item.count_only; need_function = ui.item.need_function; request_note = ui.item.request_note; rauto = ui.item.request_auto_help_notes; request_name_type = ui.item.request_name_type; booking_required = ui.item.booking_required; request_allowance = ui.item.request_allowance; edms_autosave_attach = ui.item.edms_autosave_attach; }
        if (label.length > 0 || code.length > 0) {
            $(this).removeClass("ui-autocomplete-loading");
            $("#request").val(code);
            $("#function").val("");
            $("#priority").val(priority);
            $("#rednote").html(request_note);
            $("#need_r_booking").val(booking_required);
            $("#request_allowance").val(request_allowance);
            $("#function_allowance").val(0);
            CheckMandatoryFields($("#service").val(), $("#request").val(), '');
            $("#priority option").prop("selected", false);
            $("#priority option[value=" + priority + "]").prop("selected", true);
            $('#priority').selectmenuState('refresh', true);
            QueryUDFs('0', $("#request").val(), $("#service").val());
            GetHelpNotes('', $("#request").val(), $("#service").val(), "N", rauto, "N", "N");
            if (($("#historyaddrtype").val() == "L" && $("#lsuburb").val().length > 0)
                || ($("#historyaddrtype").val() == "C" && $("#i_csuburb").val().length > 0)
                || ($("#historyaddrtype").val() == "C" && $("#o_csuburb").val().length > 0)
                //|| ($("#historyaddrtype").val() == "B" && $("#lcsuburb").val().length > 0)
                || ($("#historyaddrtype").val() == "B" && $("#i_csuburb").val().length > 0)
                || ($("#historyaddrtype").val() == "B" && $("#o_csuburb").val().length > 0)
                ) {
                CheckHistory($("#historyaddrtype").val());
            }
            $("#requestInput").val(label).attr("readonly", true);
            if (need_function == "Y") {
                $("#functionInput").addClass("required");
                $("#functionRequired").show();
            }
            else {
                $("#functionRequired").hide();
                $("#functionInput").removeClass("required");
                $("#checkforWorkflow").trigger("click");

            }           
            $("#functionInput").val("").prop("disabled", false).prop("readonly", false).removeClass("ui-disabled");
            $("#functionInput").textInputState('enable');
            CheckCountOnly(count_only);
            $("#cust_type").val(request_name_type);
            $("#cust_type option").prop("selected", false);
            $("#cust_type option[value=" + request_name_type + "]").prop("selected", true);
            $('#cust_type').selectmenuState('refresh', true);
            $("#testing").val($("#cust_type").val());
            $("#edms_autosave_attach").val(edms_autosave_attach);
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
        $("#functionInput").val("").prop("readonly", false).prop("disabled", false);
        $("#adhocOfficer").html("");
        //$(".hoverDiv").fadeOut("fast");
        $("#countOnly").val("0");
        $(".mandLabel").hide();
        $("[data-mand]").removeClass("required");
        $("#function_help").fadeOut("fast");
        $("#checkHistory").prop("disabled", true).buttonState("disable");
        $("#function_helpText").val("");
        $("#function_helpURL").val("");
        $("#functionInput").trigger("focus");
        return $("#requestInput").val();
    }

    function functionResponse(event, ui) {        
        var label = ""; var code = ""; var priority = ""; var count_only = ""; var function_note = ""; var fauto = ""; var function_name_type; var edms_autosave_attach = "";
        if (typeof ui.content != "undefined" && ui.content.length === 1) { label = ui.content[0].label; code = ui.content[0].code; priority = ui.content[0].priority; count_only = ui.content[0].count_only; function_note = ui.content[0].function_note; fauto = ui.content[0].function_auto_help_notes; function_name_type = ui.content[0].function_name_type; booking_required = ui.content[0].booking_required; function_allowance = ui.content[0].function_allowance; edms_autosave_attach = ui.content[0].edms_autosave_attach; }
        else if (typeof ui.item != "undefined" && ui.item.label.length > 0) { label = ui.item.label; code = ui.item.code; priority = ui.item.priority; count_only = ui.item.count_only; function_note = ui.item.function_note; fauto = ui.item.function_auto_help_notes; function_name_type = ui.item.function_name_type; booking_required = ui.item.booking_required; function_allowance = ui.item.function_allowance; edms_autosave_attach = ui.item.edms_autosave_attach; }
        if (label.length > 0 || code.length > 0) {
            $("#functionInput").removeClass("ui-autocomplete-loading");
            $("#function").val(code);
            $("#functionInput").val(label).removeClass("ui-autocomplete-loading").attr("readonly", true);             
            $("#priority").val(priority);
            $("#rednote").html(function_note);
            $("#need_f_booking").val(booking_required);
            $("#function_allowance").val(function_allowance);
            $("#priority option").prop("selected", false);
            $("#priority option[value=" + priority + "]").prop("selected", true);
            $('#priority').selectmenuState('refresh', true);
            if (($("#historyaddrtype").val() == "L" && $("#lsuburb").val().length > 0)
                || ($("#historyaddrtype").val() == "C" && $("#i_csuburb").val().length > 0)
                || ($("#historyaddrtype").val() == "C" && $("#o_csuburb").val().length > 0)
                // || ($("#historyaddrtype").val() == "B" && $("#lcsuburb").val().length > 0)
                || ($("#historyaddrtype").val() == "B" && $("#i_csuburb").val().length > 0)
                || ($("#historyaddrtype").val() == "B" && $("#o_csuburb").val().length > 0)
                ) {
                CheckHistory($("#historyaddrtype").val());
            }
            CheckMandatoryFields($("#service").val(), $("#request").val(), $("#function").val());
            QueryUDFs($("#function").val(), $("#request").val(), $("#service").val());
            GetHelpNotes($("#function").val(), $("#request").val(), $("#service").val(), "N", "N", fauto, "N");
            // Perform count only check on full SRF
            CheckCountOnlyAjax($("#service").val(), $("#request").val(), $("#function").val());
            var date = new Date().toISOString();
            getEventBookingDetails();
            var show = "N";
            $("#chk_showall").val("No");
            getAllowanceDetails(show);
            GetBookingSummary(date);
            $("#workflowSRF").prop("disabled", false);
            $("#functionInput").autocomplete("close");
            getSRFRedText();
            $("#cust_type").val(function_name_type);
            $("#cust_type option").prop("selected", false);
            $("#cust_type option[value=" + function_name_type + "]").prop("selected", true);
            $('#cust_type').selectmenuState('refresh', true);
            $("#testing").val($("#cust_type").val());
            $("#edms_autosave_attach").val(edms_autosave_attach);
            if ($("#textareaissue").length) {
                $("#textareaissue").focus();
                $("#checkforWorkflow").trigger("click");
            } else {
                $("#add-request-textarea").focus();
            }            
        }             
       
    }

    function functionSuccess(data) {
        if ($("#textareaissue").length) {
            $("#textareaissue").focus();
        } else {
            $("#add-request-textarea").focus();
        }
        
        //$("#textareaissue").focus();
        if (data.length === 0) {
            $("#functionInput").val("");
            $("#functionInput").attr("readonly", true).attr("disabled", true).addClass("ui-disabled").textInputState('disable');


            // If function isn't entered, perform count only check
            CheckCountOnlyAjax($("#service").val(), $("#request").val(), '');
            return false;
        }
        
        return true;
    }

    $("#workflowSRF").on(eventName, function () {
        Load();
        $.ajax({
            url: 'inc/ajax/ajax.getWorkflowSRF.php',
            type: 'get',
            data: {
                service_code: $("#service").val(),
                request_code: $("#request").val(),
                function_code: $("#function").val(),
                serviceName: function () { return $("#serviceInput").val() },
                requestName: function () { return $("#requestInput").val() },
                functionName: function () { return $("#functionInput").val() },
            },
            dataType: 'html',
            success: function (data) {
                Unload();
                if (data == "None") {
                    alert("No workflow available.");
                    $("#submit").prop('disabled', true).buttonState("disable");
                    $("#saveMore").prop('disabled', true).buttonState("disable");
                }
                else {
                    $("#popup").html(data);
                    $("#submit").prop('disabled', false).buttonState("enable");
                    $("#saveMore").prop('disabled', false).buttonState("enable");
                }
            }
        });
    });

    $("#checkforWorkflow").on(eventName, function () {
        Load();
        $.ajax({
            url: 'inc/ajax/ajax.getWorkflowSRF.php',
            type: 'get',
            data: {
                service_code: $("#service").val(),
                request_code: $("#request").val(),
                function_code: $("#function").val(),
                serviceName: function () { return $("#serviceInput").val() },
                requestName: function () { return $("#requestInput").val() },
                functionName: function () { return $("#functionInput").val() },
            },
            dataType: 'html',
            success: function (data) {              
                Unload();
                if (data == "None") {
                    
                    $("#submit").prop('disabled', true).buttonState("disable");
                    $("#saveMore").prop('disabled', true).buttonState("disable");
                    
                }
                else {                    
                    if (($("#request_allowance").val() > 0 || $("#function_allowance").val() > 0) && ($("#addressId").val() == 0 || $("#addressId").val() == "") && $("#property_no").val() == "" && $("#lstreet").val() != "" && $("#ltype").val() != "" && $("#lsuburb").val() != "") {
                        $("#submit").prop('disabled', true).buttonState("disable");
                        $("#saveMore").prop('disabled', true).buttonState("disable");
                    }
                    else {
                        $("#submit").prop('disabled', false).buttonState("disable");
                        $("#saveMore").prop('disabled', false).buttonState("enable");
                    }

                }
            }
        });
    });

    /* */

    /* LOCATION ADDRESS */

    if ($("#lookup_enabled").val() == "Y") {
        function check_fields() {
            var i = 0;   
            if (($('#pref_title').val().length) > 0) i++;
            if (($('#given').val().length) > 0) i++;
            if (($('#surname').val().length) > 0) i++;
            if (($('#cust_mobile').val().length) > 0) { i = i + 2;}
            if (($('#cust_phone').val().length) > 0) { i = i + 2;}
            if (($("#cust_work").val().length) > 0) { i = i + 2;}
            if (($('#email_address').val().length) > 0) { i = i + 2; }
            if (($('#company').val().length) > 0) { i = i + 2; }
            if (i >= 2) return true;
            else return false;
        }

        $('.getlist').change(function () {
            //$('#name_id').val('0');
            //$('#name_ctr').val('0');
            $('#name_origin').val('');
            if ($("#given").val() == "" || $("#surname").val() == "") {
                $("#customerInfoXpert").attr("disabled", "disabled");                
            } else {
                var searchTerm = $("#surname").val() + "," + $("#given").val();
                searchCustomerDocument(searchTerm, "cust_searchResults");
            }
            if (check_fields()) {
                var self = this;
                $(this).addClass("ui-autocomplete-loading");
                var mobile = $('#cust_mobile').val();
                var phone = $('#cust_phone').val();
                var work = $('#cust_work').val();
                $.ajax({
                    url: 'inc/ajax/ajax.getNameLookup.php',
                    type: 'post',
                    data: {
                        pref_title: $('#pref_title').val(),
                        given: $('#given').val(),
                        surname: $('#surname').val(),
                        cust_mobile: mobile.replace(" ", ""),
                        cust_phone: phone.replace(" ", ""),
                        cust_work: work.replace(" ", ""),
                        company_name: $('#company').val(),
                        email_address: $('#email_address').val()
                    },
                    success: function (data) {
                        $('#popup').html(data);
                        //$("#popup").attr("data-position-to", "window");
                        $(self).removeClass("ui-autocomplete-loading");               
                    }
                });
            }

        });
    }

    // Clear Facility
    function clearFacility() {
        if (confirm("This will clear your current chosen facility. Continue?")) {
            $("#checkHistory").prop("disabled", true).buttonState("disable");
            $("#facilityTypeInput").val("");
            $("#facilityInput").val("");
            $("#facilityTypeId").val("");
            $("#facilityId").val("");
            $("#facilitydescription").val("");
            $("#responsible").val("");
            $("#property_no").val(""); $("#lpostcode").val("");
            $("#address_id").val("");
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
    $("#gmaps_Use").on(eventName, function (event) {
        $("#lfno").val($("#gmaps_FNumber").val()).attr("readonly", false);
        $("#lno").val($("#gmaps_Number").val()).attr("readonly", false);
        $("#newLno").val($("#lno").val());
        $("#lstreet").val($("#gmaps_StreetName").val()).attr("readonly", false);
        $("#ltype").val($("#gmaps_StreetType").val()).attr("disabled", false).textInputState('enable');
        $("#lsuburb").val($("#gmaps_Suburb").val()).attr("disabled", false).textInputState('enable');
        $("#lpostcode").val($("#gmaps_PostCode").val()).attr("disabled", false).textInputState('enable');
        $("#ldesc").val("");
        $("#facilityInput").val("");
        $("#facilityId").val("");
        $("#addressId").val("");
        GetAddressDetails();
        $("#use_gmaps_coord").val(1);
        if ($("#historyaddrtype").val() == "L") { CheckHistory("L"); }
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
            $("#facilityTypeInput").autocomplete("search", $("#facilityTypeInput").val());
            if ($(this).attr("readonly") == 'readonly') {
                window.clicked["facilityInput"] = false;
                $(this).attr("readonly", false).val("").attr("readonly", false);
                $("#facilityTypeId").val("");
                $("#facilityInput").val("").attr("disabled", false).textInputState('enable');

                $("#facilityId").val("");
                $("#addressId").val("");
                $("#property_no").val(""); $("#lpostcode").val("");
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
        var label = ""; var index = "";
        if (typeof ui.content != "undefined" && ui.content.length === 1) { label = ui.content[0].label; index = ui.content[0].index; }
        else if (typeof ui.item != "undefined" && ui.item.label.length > 0) { label = ui.item.label; index = ui.item.index; }
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
            $("#property_no").val(""); $("#lpostcode").val("");
            $("#lstreet").val("").attr("readonly", false);
            $("#ltype").val("").attr("readonly", false).attr("disabled", true).addClass("ui-disabled").addClass("required").textInputState('disable');
            $("#lsuburb").val("").attr("readonly", false).attr("disabled", true).addClass("ui-disabled").addClass("required").textInputState('disable');
            $("#ldesc").val("").attr("readonly", false);
            $("#lno").val("").attr("readonly", false).addClass("required");
            $("#lfno").val("").attr("readonly", false);
            $("#facilityInput").attr("readonly", false).val("");
        }


        $.ui.autocomplete.filter = function (array, term) {
            var matcher = new RegExp($.ui.autocomplete.escapeRegex(term), "i" );
            return $.grep(array, function (value) {
                return matcher.test(value.label || value.value || value);
            });
        }


        return $("#facilityTypeInput").val();
    }

    function facilityResponse(event, ui) {
        var label = "";
        var index = "";
        var address = "";
        var officer_name = "";
        var facility_description = "";
        if (typeof ui.content != "undefined" && ui.content.length === 1) {
            label = ui.content[0].label;
            index = ui.content[0].index;
            address = ui.content[0].address;
            officer_name = ui.content[0].officer_name;
            facility_description = ui.content[0].facility_description;
        }
        else if (typeof ui.item != "undefined" && ui.item.label.length > 0) {
            label = ui.item.label;
            index = ui.item.index;
            address = ui.item.address;
            officer_name = ui.item.officer_name;
            facility_description = ui.item.facility_description;
        }
        if (label.length > 0) {
            
            $("#property_no").val("");
            $("#lpostcode").val("");
            $("#facilityInput").blur();
            $("#facilityInput").attr("readonly", true);
            $("#facilityInput").val(label);
            $("#facilityId").val(index);
            $("#responsible").val(officer_name);
            $("#facilitydescription").val(facility_description);

            $("#lstreet").removeClass("required");
            $("#ltype").removeClass("required");
            $("#lsuburb").removeClass("required");
            $("#lno").removeClass("required");

            
            $("#addressId").val(address);

            if (address !== 0 && address !== "") {
                $("#lstreet").addClass("ui-autocomplete-loading");
                $("#ltype").addClass("ui-autocomplete-loading");
                $("#lsuburb").addClass("ui-autocomplete-loading");
                $("#lno").addClass("ui-autocomplete-loading");
                $("#lfno").addClass("ui-autocomplete-loading");
                $("#property_no").addClass("ui-autocomplete-loading");
                $("#lroad_type").addClass("ui-autocomplete-loading");
                $("#lroad_responsibility").addClass("ui-autocomplete-loading");
                $.ajax({
                    url: 'inc/ajax/ajax.getAddressBasic.php',
                    type: 'POST',
                    dataType: "json",
                    data: {
                        address_id: address
                    },
                    success: function (data) {
                        $("#lstreet").removeClass("ui-autocomplete-loading");
                        $("#property_no").removeClass("ui-autocomplete-loading");
                        $("#ltype").removeClass("ui-autocomplete-loading");
                        $("#lsuburb").removeClass("ui-autocomplete-loading");
                        $("#lno").removeClass("ui-autocomplete-loading");
                        $("#lfno").removeClass("ui-autocomplete-loading");
                        $("#lroad_type").removeClass("ui-autocomplete-loading");
                        $("#lroad_responsibility").removeClass("ui-autocomplete-loading");
                        $("#lstreet").val(data.street_name).attr("readonly", true);
                        $("#ltype").val(data.street_type).attr("readonly", true).attr("disabled", false).removeClass("ui-disabled").textInputState('enable');
                        $("#lsuburb").val(data.locality).attr("readonly", true).attr("disabled", false).removeClass("ui-disabled").textInputState('enable');
                        //$("#ldesc").val(data.address_desc).attr("readonly", true);
                        $("#property_no").val(data.property_no);
                        $("#lpostcode").val(data.postcode);
                        $("#addressId").val(data.address_id);
                        $("#lroad_type").val(data.road_type);
                        $("#lroad_responsibility").val(data.road_responsibility);
                        $("#larea_group").val(data.area_group);
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
                        if ($("#addressId").val() > 0 || $("#addressId").val() != "0" || $("#addressId").val() != 0) {
                            $("#AddrSummary").removeAttr("disabled")
                        }

                        if ($("#historyaddrtype").val() == "L") { CheckHistory("L"); }
                        showOnMap();

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
                alert("No address found.");
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

    $("#lstreet").autocomplete(
        $.ui.autocomplete.filter = function (array, term) {
            var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(term), "i");
            return $.grep(array, function (value) {
                return matcher.test(value.label || value.value || value);
            });
        });
        

    $("#lstreet").on(eventName, function (event) {
        if ($("#facilityTypeInput").val().length > 0) {
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
            $("#checkHistory").prop("disabled", true).buttonState("disable");
            $("#property_no").val("");
            $("#lpostcode").val("");
            $("#ltype").val("").attr("disabled", true).addClass("ui-disabled").textInputState('disable');
            $("#lsuburb").val("").attr("disabled", true).addClass("ui-disabled").textInputState('disable');
            $("#lstreet").attr("readonly", false).autocomplete("search", "");            
        }
    });

    function streetResponse (event, ui) {
        var label = "";
        if (typeof ui.content != "undefined" && ui.content.length === 1) {
            label = ui.content[0].label;
        }

        else if (typeof ui.item != "undefined" && ui.item.label.length > 0) {
            label = ui.item.label;
        }
        if (label.length > 0) {
            //alert(label);
            $("#lstreet").blur();
            $("#lstreet").removeClass("ui-autocomplete-loading").val(label);
            $("#ltype").trigger("click");
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
        $("#checkHistory").prop("disabled", true).buttonState("disable");
        $("#lsuburb").val("").attr("disabled", true).addClass("ui-disabled").textInputState('disable');
        $("#ltype").textInputState('enable');
        $("#ltype").attr("readonly", false).attr("disabled", false).removeClass("ui-disabled").val("");
        return $("#lstreet").val();
    }

    function streetTypeResponse(event, ui) {
        var label = "";
        if (typeof ui.content != "undefined" && ui.content.length === 1) { label = ui.content[0].label; }
        else if (typeof ui.item != "undefined" && ui.item.label.length > 0) { label = ui.item.label; }
        if (label.length > 0) {
            $("#property_no").val(""); $("#lpostcode").val("");
            var newlno = $("#lno").val();
            newlno = newlno.replace(/[^\d]/g, '');
            $("#newLno").val(newlno);
            $("#ltype").val(label).removeClass("ui-autocomplete-loading").attr("readonly", true);
            $("#ltype").autocomplete("close");
            $("#lsuburb").trigger("click");
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
        $("#property_no").val(""); $("#lpostcode").val("");
        $("#checkHistory").prop("disabled", true).buttonState("disable");
        //$("#lsuburb").textInputState('enable');
        $("#lsuburb").attr("readonly", false).val("").attr("disabled", false).removeClass("ui-disabled").textInputState('enable');
        return $("#ltype").val();
    }

    function streetSuburbResponse(event, ui) {
        var label = "";
        if (typeof ui.content != "undefined" && ui.content.length === 1) { label = ui.content[0].label; postcode = ui.content[0].postcode; }
        else if (typeof ui.item != "undefined" && ui.item.label.length > 0) { label = ui.item.label; postcode = ui.item.postcode; }
        if (label.length > 0) {
            $("#lsuburb").val(label).attr("readonly", true).removeClass("ui-autocomplete-loading");
            $("#lpostcode").addClass("ui-autocomplete-loading");
            $("#property_no").addClass("ui-autocomplete-loading");
            $("#lroad_type").addClass("ui-autocomplete-loading");
            $("#lroad_responsibility").addClass("ui-autocomplete-loading");           
            // need to get property number
            if ($("#historyaddrtype").val() == "L" || $("#historyaddrtype").val() == "B") { CheckHistory($("#historyaddrtype").val()); }
            showOnMap();
            GetAddressDetails();
            $("#lsuburb").autocomplete("close");
            $("#lpostcode").val(postcode).removeClass("ui-autocomplete-loading");
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
        $("#mydetsclicked").val("N");


        if ($("#testing").val().length > 0) {
        }
        else {
            $("#cust_type").val("");
            $("#cust_type").removeClass("required");
        }


        $("#name_id").val("0");
        $("#name_origin").val("");
        $("#name_ctr").val("");
        $("#CustSummary").attr("disabled", "disabled");
        $("#customerInfoXpert").attr("disabled", "disabled");

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
                $("#mydetsclicked").val("Y");
                $('#respCode').val(data.responsible_code);
            }                

        });
        //$("#CustSummary").removeAttr("disabled");
    });

    

    /* */

    /* CUSTOMER ADDRESS */

    // Customer Street Name

    $("#i_cstreet").autocomplete(
       $.ui.autocomplete.filter = function (array, term) {
           var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(term), "i");
           return $.grep(array, function (value) {
               return matcher.test(value.label || value.value || value);
           });
       });

    $("#i_cstreet").on(eventName, function (event) {
        window.clicked["i_ctype"] = false;
        window.clicked["i_csuburb"] = false;
        //$("#checkHistory").prop("disabled", true).buttonState("disable");
        $("#property_no").val("");
        $("#lpostcode").val("");
        $("#i_ctype").val("").attr("disabled", true).addClass("ui-disabled").textInputState('disable');
        $("#i_csuburb").val("").attr("disabled", true).addClass("ui-disabled").textInputState('disable');
        $("#i_cstreet").attr("readonly", false).autocomplete("search", "");
    });

    function cStreetResponse (event, ui) {
        var label = "";
        if (typeof ui.content != "undefined" && ui.content.length === 1) { label = ui.content[0].label; }
        else if (typeof ui.item != "undefined" && ui.item.label.length > 0) { label = ui.item.label; }
        if (label.length > 0) {
            $("#i_cstreet").blur();
            $("#i_cstreet").removeClass("ui-autocomplete-loading").val(label);
            $("#i_ctype").trigger("click");
            $("#caddsummary").prop('disabled', false);
            $("#caddhistory").prop('disabled', false);
            
        }
    }

    // Customer Street Type
    function cTypeInit() {
        $("#i_csuburb").val("").attr("disabled", true).addClass("ui-disabled").textInputState('disable');
        $("#i_ctype").textInputState('enable');
        $("#i_ctype").attr("readonly", false).attr("disabled", false).removeClass("ui-disabled").val("");
        return $("#i_cstreet").val();
    }

    //var cTypeResponse = function (event, ui) {   --- changed for #151 by Poonam
    function cTypeResponse(event, ui) {
        window.clicked["i_csuburb"] = false;
        var label = "";
        if (typeof ui.content != "undefined" && ui.content.length === 1) { label = ui.content[0].label; }
        else if (typeof ui.item != "undefined" && ui.item.label.length > 0) { label = ui.item.label; }
        if (label.length > 0) {
            $("#i_cpropertynumber").val(""); $("#i_cpostcode").val("");
            var newlno = $("#i_cno").val();
            newlno = newlno.replace(/[^\d]/g, '');
            $("#newLno").val(newlno);
            $("#i_ctype").val(label).removeClass("ui-autocomplete-loading").attr("readonly", true);
            $("#i_ctype").autocomplete("close");
            $("#i_csuburb").trigger("click");
        }
    }

    function cSuburbInit() {
        $("#i_csuburb").attr("readonly", false).val("").attr("disabled", false).removeClass("ui-disabled").textInputState('enable');
        return $("#i_ctype").val();
    }
   
    //var cSuburbResponse = function (event, ui) {  --- changed for #151 by Poonam
    function cSuburbResponse (event, ui) {
        var label = "";
        var postcode = "";
        if (typeof ui.content != "undefined" && ui.content.length === 1) { label = ui.content[0].label; postcode = ui.content[0].postcode; }
        else if (typeof ui.item != "undefined" && ui.item.label.length > 0) { label = ui.item.label; postcode = ui.item.postcode; }
        if (label.length > 0) {
            if ($("#historyaddrtype").val() == "C" || $("#historyaddrtype").val() == "B") { CheckHistory($("#historyaddrtype").val()); }
            $("#i_csuburb").val(label).attr("readonly", true).removeClass("ui-autocomplete-loading");
            $("#i_cpropertynumber").addClass("ui-autocomplete-loading");
            $("#i_cpostcode").val(postcode)//.attr("readonly", true).removeClass("ui-autocomplete-loading");
            GetCustomerAddressDetails();
            $("#i_csuburb").autocomplete("close");
            //$("#i_cpostcode").val(postcode);
        }
    }

    // Customer Details Change
    $('.cadd').change(function () {
        GetCustomerAddressDetails();
    });

    /* */

    /* OTHER */


    // SPLITSTRINGINTOSTUFF
    function getPOParts(input) {
        var match1 = input.match(/(\D{0,6})\s?[:]?[_]?[-]?\s?(\d{0,20})\s?-?\s?(\D{0,5})$/)[1];
        return match1;
    }

    function getDXParts(input) {
        var match1 = input.match(/(\D{0,1})\s?(\D{0,1})\s?[:]?[_]?[-]?\s?(\d{0,20})\s?-?\s?(\D{0,5})$/)[1];
        var match2 = input.match(/(\D{0,1})\s?(\D{0,1})\s?[:]?[_]?[-]?\s?(\d{0,20})\s?-?\s?(\D{0,5})$/)[2];
        var finalmatch = $.trim(match1) + $.trim(match2);
        return finalmatch;
    }

    // Adhoc Officer
    if ($("#skipAdhocCount").val() == 0) {

        $('#submit').on(eventName, function (event) {
            $(".text_udf:not(:visible)").each(function () {
                $(this).removeClass("required");
            });
            $(".req_text_udf:not(:visible)").each(function () {
                $(this).removeClass("required");
            });            
        });
        //$("#newrequest").bind("submit", submitHandler);
        $('#submit').on(eventName, function (event) {

            /* What to parse with regEx */
            if ($('#o_cpobox').val() != "") {

                // Stuff to pass to function

                var tocheck = $('#o_cpobox').val().toUpperCase();

                var pobox = getPOParts(tocheck);
                var dxbox = getDXParts(tocheck);
                var prefix = "";

                var number = tocheck.match(/(\D{0,6})\s?[:]?[_]?[-]?\s?(\d{0,20})\s?-?\s?(\D{0,5})$/)[2];
                var suffix = tocheck.match(/(\D{0,6})\s?[:]?[_]?[-]?\s?(\d{0,20})\s?-?\s?(\D{0,5})$/)[3];

                // Compare Prefix's, then save them in correct format to be passed to the final "save" var.
                if (pobox == "po box" || pobox == "Po Box" || pobox == "PO Box" || pobox == "PO BOX" || pobox == "po") {
                    prefix = "PO Box";
                }
                else if (dxbox == "dx" || dxbox == "d x" || dxbox == "Dx" || dxbox == "DX") {
                    prefix = "DX";
                }
                else if ($.trim(tocheck) != ""){
                    prefix="PO Box"
                }
                var save = prefix + " " + number + " " + suffix;

                $('#o_cpobox').val(save);
            }
        });
        $.validator.setDefaults({
            ignore: ""
        })
        $("#newrequest").validate({
            submitHandler: function (form) {

                $("#btnclick").val("N");
                $("#submit").prop('disabled', true).buttonState("disable");
                $("#saveMore").prop('disabled', true).buttonState("disable");
                $("#saveCountOnly").prop('disabled', true).buttonState("disable");
                if ($("#countOnlyInd").val() == "N") {
                    Load();
                    $("#newrequest").valid();
                    if ($("#newrequest").validate().numberOfInvalids() == 0) {                        
                        if ($("#process_allowance").val() == "No" && ($("#request_allowance").val() > 0 || $("#function_allowance").val() > 0)) {
                            $("#saveMore").prop("disabled", false).buttonState("enable");
                            $("#saveCountOnly").prop("disabled", false).buttonState("enable");
                            $("#submit").prop('disabled', false).buttonState("enable");
                            var show = "N";
                            $("#chk_showall").val("No");
                            getAllowanceDetails(show);
                        }                        
                        else if (($("#process_allowance").val() == "No" && ($("#request_allowance").val() == 0 || $("#function_allowance").val() == 0)) || ($("#process_allowance").val() == "Yes" && ($("#request_allowance").val() > 0 || $("#function_allowance").val() > 0))) {
                            //event.stopPropagation();
                            if ($("#mydetsclicked").val() == "N") {
                                if ($("#old_given").val() != $("#given").val() || $("#old_surname").val() != $("#surname").val()) {
                                    if ($("#old_given").val() != "") {
                                        change_name(); // call if given name or surname changed
                                    }
                                    else {
                                        check_adhoc();
                                    }
                                }
                                else {
                                    check_adhoc(); //call if adhoc officer required
                                }
                            }
                            else {
                                check_adhoc(); //call if adhoc officer required                         
                            }
                        }
                    }
                    else {
                        $("#newrequest").validate();
                        $("#saveMore").prop("disabled", false).buttonState("enable");
                        $("#saveCountOnly").prop("disabled", false).buttonState("enable");
                        $("#submit").prop('disabled', false).buttonState("enable");
                        Unload();
                    }
                }
                else {
                    check_adhoc();
                }                
            },
            invalidHandler: function (event, validator) {
                $(".error").closest(".col").trigger("expand");
                $(".error").focus();
            },
           // ignore: ""
        });
    }


    $('#saveMore').on(eventName, function (event) {
        
        $(".text_udf:not(:visible)").each(function () {
            $(this).removeClass("required");
        });
        $(".req_text_udf:not(:visible)").each(function () {
            $(this).removeClass("required");
        });

        $('#saveMore').on(eventName, function (event) {
            
            /* What to parse with regEx */
            if ($('#o_cpobox').val() != "") {

                // Stuff to pass to function

                var tocheck = $('#o_cpobox').val().toUpperCase();

                var pobox = getPOParts(tocheck);
                var dxbox = getDXParts(tocheck);

                var number = tocheck.match(/(\D{0,6})\s?[:]?[_]?[-]?\s?(\d{0,20})\s?-?\s?(\D{0,5})$/)[2];
                var suffix = tocheck.match(/(\D{0,6})\s?[:]?[_]?[-]?\s?(\d{0,20})\s?-?\s?(\D{0,5})$/)[3];

                // Compare Prefix's, then save them in correct format to be passed to the final "save" var.
                if (pobox == "po box" || pobox == "Po Box" || pobox == "PO Box" || pobox == "PO BOX") {
                    prefix = "PO Box";
                }
                else if (dxbox == "dx" || dxbox == "d x" || dxbox == "Dx" || dxbox == "DX") {
                    prefix = "DX";
                }
                else {
                    prefix = "PO Box"
                }
                var save = prefix + " " + number + " " + suffix;


                $('#o_cpobox').val(save);
            }

        });
        $.validator.setDefaults({
            ignore: ""
        })
        if ($("#countOnlyInd").val() == "N") {           
            $("#newrequest").valid();
            if ($("#newrequest").validate().numberOfInvalids() == 0) {    
                if ($("#process_allowance").val() == "No" && ($("#request_allowance").val() > 0 || $("#function_allowance").val() > 0)) {
                    $("#saveMore").prop("disabled", false).buttonState("enable");
                    $("#saveCountOnly").prop("disabled", false).buttonState("enable");
                    $("#submit").prop('disabled', false).buttonState("enable");
                    var show = "N";
                    $("#chk_showall").val("No");
                    getAllowanceDetails(show);
                }
                else if (($("#process_allowance").val() == "No" && ($("#request_allowance").val() == 0 || $("#function_allowance").val() == 0)) || ($("#process_allowance").val() == "Yes" && ($("#request_allowance").val() > 0 || $("#function_allowance").val() > 0))) {
                    $("#saveMore").attr("disabled", true).buttonState("disable");
                    $("#saveCountOnly").attr("disabled", true).buttonState("disable");
                    $("#submit").prop('disabled', true).buttonState("disable");
                    Load();
                    $("#btnclick").val("Y");
                    if ($("#mydetsclicked").val() == "N") {
                        if ($("#old_given").val() != $("#given").val() || $("#old_surname").val() != $("#surname").val()) {                       
                            if ($("#old_given").val() != "") {
                                change_name(); // call if given name or surname changed
                            }
                            else {
                                check_adhoc();
                            }
                        }
                        else {
                            check_adhoc(); //call if adhoc officer required
                        }
                    }
                    else {
                        check_adhoc(); //call if adhoc officer required                         
                    }
                }
            }
            else {
                Unload();
                alert("You must fill in the required fields. ");
                $("#newrequest").validate();
                $("#saveMore").prop("disabled", false).buttonState("enable");
                $("#btnclick").val("");
                $("#submit").prop('disabled', false).buttonState("enable");

            }
        }
    });

    
    $('#saveCountOnly').on(eventName, function (event) {

        $('#saveCountOnly').on(eventName, function (event) {
            
            /* What to parse with regEx */
            if ($('#o_cpobox').val() != "") {

                // Stuff to pass to function

                var tocheck = $('#o_cpobox').val().toUpperCase();

                var pobox = getPOParts(tocheck);
                var dxbox = getDXParts(tocheck);

                var number = tocheck.match(/(\D{0,6})\s?[:]?[_]?[-]?\s?(\d{0,20})\s?-?\s?(\D{0,5})$/)[2];
                var suffix = tocheck.match(/(\D{0,6})\s?[:]?[_]?[-]?\s?(\d{0,20})\s?-?\s?(\D{0,5})$/)[3];

                // Compare Prefix's, then save them in correct format to be passed to the final "save" var.
                if (pobox == "po box" || pobox == "Po Box" || pobox == "PO Box" || pobox == "PO BOX") {
                    prefix = "PO Box";
                }
                else if (dxbox == "dx" || dxbox == "d x" || dxbox == "Dx" || dxbox == "DX") {
                    prefix = "DX";
                }
                else {
                    prefix = "PO Box"
                }
                var save = prefix + " " + number + " " + suffix;

                $('#o_cpobox').val(save);
            }

        });
        // IF bypass enabled (Y) -------------------------------------------------------------------------------------------------
            if ($("#countonly_bypass").val() == "Y") {

                // IF SRF not count only
                if ($("#countOnlyInd").val() == "N") {

                    // Bypass is enabled, will not validate the form
                    if (confirm("This SRF has associated workflow. Are you sure you want to save request as COUNT ONLY?")) {
                        $("#countOnlyInd").val("Y");
                        $("#submit").prop('disabled', true).buttonState("disable");
                        $("#saveMore").prop('disabled', true).buttonState("disable");
                        $("#saveCountOnly").prop('disabled', true).buttonState("disable");
                        $("#reset").prop('disabled', true).buttonState("disable");                        

                        $.ajax({
                            url: 'inc/ajax/ajax.saveCountOnly.php',
                            data: $("#newrequest").serialize(),
                            type: 'POST',
                            success: function (data) {
                                Unload();
                                $("#skipAdhocCount").val('1');
                                location.reload();
                                $(window).scrollTop(0);
                            }
                        });
                        
                    }
                    else {
                        $("#submit").prop('disabled', false).buttonState("enable");
                        $("#saveMore").prop('disabled', false).buttonState("enable");
                        $("#saveCountOnly").prop('disabled', false).buttonState("enable");
                        $("#reset").prop('disabled', false).buttonState("enable");
                    }

                // IF SRF is count only
                } else {
                    $("#submit").prop('disabled', true).buttonState("disable");
                    $("#saveMore").prop('disabled', true).buttonState("disable");
                    $("#saveCountOnly").prop('disabled', true).buttonState("disable");
                    $("#reset").prop('disabled', true).buttonState("disable");

                    if ($("#mydetsclicked").val() == "N") {
                        if ($("#old_given").val() != $("#given").val() || $("#old_surname").val() != $("#surname").val()) {
                            change_name(); // call if given name or surname changed
                        }
                    }

                    $.ajax({
                        url: 'inc/ajax/ajax.saveCountOnly.php',
                        data: $("#newrequest").serialize(),
                        type: 'POST',
                        success: function (data) {
                            Unload();
                            $("#skipAdhocCount").val('1');
                            location.reload();
                            $(window).scrollTop(0);
                        }
                    });
                }
            }

          // IF bypass disabled (N) -----------------------------------------------------------------------------------------------
            else {

                // Fix the "cars" required bug
                $(".required").addClass("resetReq").removeClass("required");
                jQuery.validator.addClassRules({
                    req_text_udf: {
                        required: true,
                    },
                    req_text_time: {
                        required: true,
                        timeField: true
                    },
                    req_text_date: {
                        required: true,
                        dateField: true
                    }
                });


                if ($(".req_text_date").val() == "dd/mm/yyyy") {
                    $(".req_text_date").val("");
                }

                //apply validation rules to udfs
                $('.req_text_udf').each(function (index) {
                    $(this).rules("add", "required");
                });
                $('.req_text_time').each(function (index) {
                    $(this).rules("add", "required");
                    $(this).rules("add", "timeField");
                });
                $('.req_text_date').each(function (index) {
                    $(this).rules("add", "required");
                    $(this).rules("add", "dateField");
                });

                // IF SRF not count only
                if ($("#countOnlyInd").val() == "N") {

                    // Bypass is disabled, will only require UDF's
                    
                    if (confirm("This SRF has associated workflow. Are you sure you want to save request as COUNT ONLY?")) { 
                        $("#newrequest").valid();
                        if ($("#newrequest").validate().numberOfInvalids() == 0) {
                            $("#submit").prop('disabled', true).buttonState("disable");
                            $("#saveMore").prop('disabled', true).buttonState("disable");
                            $("#saveCountOnly").prop('disabled', true).buttonState("disable");
                            $("#reset").prop('disabled', true).buttonState("disable");
                            $("#countOnlyInd").val("Y");

                            $.ajax({
                                url: 'inc/ajax/ajax.saveCountOnly.php',
                                data: $("#newrequest").serialize(),
                                type: 'POST',
                                success: function (data) {
                                    Unload();
                                    $("#skipAdhocCount").val('1');
                                    location.reload();
                                    $(window).scrollTop(0);
                                }
                            });
                        } else {
                            $(window).scrollTop(0);
                        }
                        
                    }
                    else {
                        $("#submit").prop('disabled', false).buttonState("enable");
                        $("#saveMore").prop('disabled', false).buttonState("enable");
                        $("#saveCountOnly").prop('disabled', false).buttonState("enable");
                        $("#reset").prop('disabled', false).buttonState("enable");
                    }

                // IF SRF is count only
                } else {
                    $("#newrequest").valid();
                    if ($("#newrequest").validate().numberOfInvalids() == 0) {

                        $("#submit").prop('disabled', true).buttonState("disable");
                        $("#saveMore").prop('disabled', true).buttonState("disable");
                        $("#saveCountOnly").prop('disabled', true).buttonState("disable");
                        $("#reset").prop('disabled', true).buttonState("disable");

                        $("#countOnlyInd").val("Y");
                        $.ajax({
                            url: 'inc/ajax/ajax.saveCountOnly.php',
                            data: $("#newrequest").serialize(),
                            type: 'POST',
                            success: function (data) {
                                Unload();
                                $("#skipAdhocCount").val('1');
                                location.reload();
                                $(window).scrollTop(0);
                            }
                        });
                    } else {
                        $(window).scrollTop(0);
                    }
                }
            }
        });
    // ----------------------------------------------------------------------------------------------------------------------------


    $(".cadd").on(eventName, function (event) {
        $("#same").val("i");
    });

    /* */
    $("#reset").on(eventName, function (event) {
        clearCustomerAddress();
        clearLocationAddress();
        ClearHelpNotes();
        serviceReset();
        $("#surname").val("");
        $("#given").val("");
        $("#pref_title").val("");
        $("#cust_mobile").val("");
        $("#cust_work").val("");
        $("#cust_phone").val("");
        $("#cust_fax").val("");
        $("#email_address").val("");
        $("#company").val("");
        $("#mydetsclicked").val("N");
        $("#cust_type").val("");
        $("#cust_type").removeClass("required");
        $("#customerInfoXpert").attr("disabled", "disabled");
        $("#keywordSearch").val("");
        $("#refno").val("");
        $("#reqType").val("");
        $("#textareaissue").val("");
        $("#attachment").val("");
        $("#attachDesc").val("");
        $("#checkHistory").prop("disabled", true).buttonState("disable");
        $("#facilityTypeInput").val("");
        $("#facilityInput").val("").attr("readonly", false).attr("disabled", false).textInputState('disable');
        $("#facilityTypeId").val("");
        $("#facilityId").val("");
        $("#property_no").val(""); $("#lpostcode").val("");
        $("#address_id").val("");
        $("#lno").val("").attr("readonly", false);
        $("#lfno").val("").attr("readonly", false);
        $("#ldesc").val("").attr("readonly", false);
        $("#facility").val("").attr("readonly", false);
        $("#lstreet").val("").attr("readonly", false);
        $("#ltype").val("").attr("readonly", false).attr("disabled", true).addClass("ui-disabled").textInputState('disable');
        $("#lsuburb").val("").attr("readonly", false).attr("disabled", true).addClass("ui-disabled").textInputState('disable');
        $("#event_booking").css("visibility", "hidden");
    });
});

/* OTHER FUNCTIONS */

function changeLocationType() {

    $('#i_cno').val('');
    $('#i_cfno').val('');
    $('#i_cstreet').val('');
    $('#i_ctype').val('');
    $('#i_csuburb').val('');
    $('#i_cdesc').val('');
    $("#i_cpostcode").val("");
    $("#i_cpropertynumber").val("");
    $("#cust_address_id").val("");
    $("#CustAddSummary").prop("disabled", true);
    $("#o_cstreet").val("not required");
    $("#o_ctype").val("not required");
    $("#o_csuburb").val("not required");
    $('#o_cstreet').attr("placeholder", "Search...");
    $('#o_ctype').attr("placeholder", "Search...");
    $('#o_csuburb').attr("placeholder", "Search...");

    /* IF SAME = S, (SAME AS LOCATION PICKED) */

    if ($('#same').val() == "s") {


        // Show inside, hide outside
        $('#inside_ca').show();
        $('#outside_ca').hide();
        $('#o_cstreet').val('not required');
        $('#o_ctype').val('not required');
        $('#o_csuburb').val('not required');

        // Set Inside area to location var's
        $('#i_cno').val($('#lno').val());
        $('#i_cfno').val($('#lfno').val());
        $('#i_cstreet').val($('#lstreet').val());
        $('#i_ctype').val($('#ltype').val());
        $('#i_csuburb').val($('#lsuburb').val());
        $('#i_cdesc').val($('#ldesc').val());
        $("#i_cpostcode").val($("#lpostcode").val());
        $("#cust_address_id").val($("#addressId").val());
        $("#i_cpropertynumber").val($("#property_no").val());
        if ($("#i_ctype").val().length > 0) { $("#i_ctype").prop("disabled", false).prop("readonly", true).removeClass("ui-disabled").textInputState("enable"); }
        if ($("#i_csuburb").val().length > 0) {
            $("#i_csuburb").prop("disabled", false).prop("readonly", true).removeClass("ui-disabled").textInputState("enable");
            if ($("#cust_address_id").val() > 0) {
                $("#CustAddSummary").prop("disabled", false);
            }
        }
    }
    else if ($('#same').val() == "i") {

        // Show inside, hide outside
        $('#inside_ca').show();

        $('#i_cno').val('');
        $('#i_cfno').val('');
        $('#i_cstreet').val('');
        $('#i_ctype').val('');
        $('#i_csuburb').val('');
        $('#o_cstreet').attr("placeholder", "Search...");
        $('#o_ctype').attr("placeholder", "Search...");
        $('#o_csuburb').attr("placeholder", "Search...");
        $('#i_cdesc').val('');
        $("#i_cpostcode").val("");
        $("#i_cpropertynumber").val("");
        $("#cust_address_id").val("");
        $("#CustAddSummary").prop("disabled", true);

        // Set Outside area to nothing
        $('#o_cno').val("");
        $('#o_cfno').val('');
        $('#o_cstreet').val('not required');
        $('#o_ctype').val('not required');
        $('#o_csuburb').val('not required');
        $('#o_cdesc').val('');
        $("#o_cpostcode").val('');
        $("#cust_address_id").val('');
        
        $('#outside_ca').hide();

        if ($("#i_ctype").val().length > 0 || $("#i_ctype").val() != "") {
            $("#i_ctype").prop("disabled", true);
            $("#i_ctype").prop("readonly", true).addClass("ui-disabled");
            $("#i_ctype").textInputState("disable");
        }
        if ($("#i_csuburb").val().length > 0) {
            $("#i_csuburb").prop("disabled", true);
            $("#i_csuburb").prop("readonly", true).addClass("ui-disabled");
            $("#i_csuburb").textInputState("disable");
            if ($("#cust_address_id").val() > 0) {
                $("#CustAddSummary").prop("disabled", false);
            }
        }    
    }
    else if ($('#same').val() == "o") {

        // Set inside area to nothing
        $('#i_cno').val('');
        $('#i_cfno').val('');
        $("#i_cstreet").val("not required");
        $("#i_ctype").val("not required");
        $("#i_csuburb").val("not required");
        $('#i_cdesc').val('');
        $("#i_cpostcode").val("");
        $("#i_cpropertynumber").val("");
        $("#cust_address_id").val("");

        // Show outside, hide inside
        $('#inside_ca').hide();
        $('#outside_ca').show();
        
        $('#o_cno').val("");
        $('#o_cfno').val("");
        $('#o_cstreet').val("");
        $('#o_ctype').val("");
        $('#o_csuburb').val("");
        $('#o_cstreet').removeAttr("placeholder");
        $('#o_ctype').removeAttr("placeholder");
        $('#o_csuburb').removeAttr("placeholder");
        $('#o_cdesc').val("");
        $("#o_cpostcode").val("");      

        if ($("#o_ctype").val().length > 0) {
            $("#o_ctype").prop("disabled", true); ("#i_ctype").prop("readonly", true).addClass("ui-disabled"); $("#i_ctype").textInputState("disable");
        }
        if ($('#o_csuburb').val().length > 0) {
            $("#o_csuburb").prop("disabled", true); ("#o_csuburb").prop("readonly", true).addClass("ui-disabled"); $("#o_csuburb").textInputState("disable");
            if ($("#cust_address_id").val() > 0) {
                $("#CustAddSummary").prop("disabled", false);
            }
        }
    }

    if ($("#historyaddrtype").val() == "C" || $("#historyaddrtype").val() == "B") { CheckHistory($("#historyaddrtype").val()); }
}

function clearCustomerAddress() {
    //$('#same').val("i");
    $('#i_cno').val('');
    $('#i_cfno').val(''); 
    window.clicked["i_ctype"] = false;
    window.clicked["i_csuburb"] = false;
    $('#i_cfcode').val('');
    $('#i_cscode').val('');
    $('#i_cstreet').val('').attr("readonly", false);
    $('#i_ctype').val('').attr("readonly", true);
    $('#i_csuburb').val('');
    $('#i_cdesc').val('');
    $("#i_cpostcode").val("");
    $("#i_cpropertynumber").val("");
    $('#o_cfcode').val('');
    $('#o_cscode').val('');
    $('#o_cno').val("");
    $('#o_cfno').val("");
    $('#o_cstreet').val("");
    $('#o_ctype').val("");
    $('#o_csuburb').val("");
    $('#o_cstreet').attr("placeholder", "Search...");
    $('#o_ctype').attr("placeholder", "Search...");
    $('#o_csuburb').attr("placeholder", "Search...");
    $('#o_cdesc').val("");
    $("#o_cpostcode").val("");
    $("#cust_address_id").val("");
    $("#CustAddSummary").prop("disabled", true);
    if ($('#same').val() == "i" || $('#same').val() == "s") {
        $('#inside_ca').show();
        $('#outside_ca').hide();
        $('#same').val("i");
    }
    else if ($('#same').val() == "o")
    {
        $('#inside_ca').hide();
        $('#outside_ca').show();
    }
}

function clearLocationAddress() {
    $("#checkHistory").prop("disabled", true).buttonState("disable");
    $("#facilityTypeInput").val("");
    $("#facilityTypeId").val("");
    $("#facilityId").val("");
    $("#facilityInput").val("");
    $("#addressId").val("");
    $('#lfno').val('');
    $('#lno').val('');
    $('#lstreet').val('').attr("readonly", false);
    window.clicked["ltype"] = false;
    window.clicked["lsuburb"] = false;
    $("#ltype").val("").attr("readonly", true);
    $("#lsuburb").val("");
    $("#lroad_type").val("");
    $("#lroad_responsibility").val("");
    $("#larea_group").val("");
    $('#ldesc').val('');
    $("#lpostcode").val("");
    $("#property_no").val("");
    $("#AddrSummary").prop("disabled", true);
    $("#responsible").val("");
    $("#facilitydescription").val("");
    $("#AddrBooking").css("visibility", "hidden");
    $("#submit").prop('disabled', false).buttonState("enable");
    $("#saveMore").prop('disabled', false).buttonState("enable");
    $("#saveCountOnly").prop('disabled', false).buttonState("enable");
}

function ViewAddressDetails() {
        window.open("index.php?page=view-address&id=" + $("#addressId").val(), "_blank");
}

function ViewCustomerAddDetails() {
    window.open("index.php?page=view-address&id=" + $("#cust_address_id").val(), "_blank");
}

function ViewCustomerDetails() {
    window.open("index.php?page=view-name&id=" + $("#name_id").val(), "_blank");
}

// GOOGLE MAPS

var geocoder;
var map;
var infowindow = new google.maps.InfoWindow({
    disableAutoPan: false
});
var marker;
var initialLocation;
var browserSupportFlag = new Boolean();
var markersArray = [];

if (typeof $("#map-canvas").gmap == 'function') {


    function initialize() {
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
}
else {

    function initialize() {

        geocoder = new google.maps.Geocoder();
        var myOptions = {
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

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

function showOnMap() {
    var geocoder = new google.maps.Geocoder();
    var lat = "";
    var lng = "";

    var number = $("#lfno").val().length > 0 ? $("#lfno").val() : $("#lno").val();
    var street = $("#lstreet").val();
    var type = $("#ltype").val();
    var suburb = $("#lsuburb").val()

    function storeResults(latp, lngp) {
        placeMarker(map, latp, lngp);
    }

    var address = number + " " + street + " " + type + " " + suburb;

    geocoder.geocode({ 'address': address }, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            lat = results[0].geometry.location.lat();
            lng = results[0].geometry.location.lng();
        } else {
            alert("Unable to find address: " + status);
        }
        storeResults(lat, lng);
    });
}

function fullScreen() {
    $("#map-canvas").addClass("fullScreen");
    var currCenter = map.getCenter();
    google.maps.event.trigger(map, 'resize');
    map.setCenter(currCenter);
    $("#gmaps_SS").addClass("fullScreenButton");
}

function closeFullScreen() {
    $("#map-canvas").removeClass("fullScreen");
    var currCenter = map.getCenter();
    google.maps.event.trigger(map, 'resize');
    map.setCenter(currCenter);
    $("#gmaps_SS").removeClass("fullScreenButton");
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

                    initialize();
                }
            });
        }, 2500);
    }
    else {
        initialize();
    }

}



google.maps.event.addDomListener(window, 'load', getLatLong);
