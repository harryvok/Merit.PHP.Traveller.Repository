// All AJAX javascript queries

function getIntray(intray, i) {
    $("#filter").blur();
    Load();
    $.ajax({
        url: "inc/ajax/ajax.getIntray.php",
        dataType: "html",
        data: {
            intray: intray,
            filterCode: i
        },
        timeout: 30000000, 
        success: function (data) {
            Unload();
            $("#" + intray + "Intray").html(data);
            $("#default").trigger("create");

        },
        error: function (request, status, error) {
            Unload();
            $("#" + intray + "Intray").html("<div class='float-left'>There has been an error: " + error + ". Please try again. If it continues please contact Merit.</div>");

        }
    });
}

function GetAddressDetails() {
    //alert("coming ajax");
    if ($("#lno").val().length > 0 && $("#lstreet").val().length > 0 && $("#ltype").val().length > 0 && $("#lsuburb").val().length > 0) {
        $.ajax({
            url: 'inc/ajax/ajax.getAddressBasic.php',
            type: 'POST',
            dataType: "json",
            data: {
                flatNumber: function () { return $("#lfno").val() },
                streetNumber: function () { return $("#lno").val() },
                streetName: function () { return $("#lstreet").val() },
                streetType: function () { return $("#ltype").val() },
                streetSuburb: function () { return $("#lsuburb").val() }
            },
            success: function (data) {
                //alert("prop id: " + data.property_no);
                if (data.property_no == "0" || data.property_no == "" ) {
                    $("#property_no").val("").removeClass("ui-autocomplete-loading");
                }
                else {                    
                    $("#property_no").val(data.property_no).removeClass("ui-autocomplete-loading");
                }
                $("#address").val(data.address_id);
                $("#addressId").val(data.address_id);
                $("#lroad_type").val(data.road_type);
                $("#lroad_responsibility").val(data.road_responsibility);
                if (data.address_id != "0" || data.address_id != "" || data.address_id > 0 ) {
                    $("#AddrSummary").removeAttr("disabled");
                }
            }
        });
    }
}

function GetCustomerAddressDetails() {
    if ($("#same").val() == "s" && $("#i_cno").val().length > 0 && $("#i_cstreet").val().length > 0 && $("#i_ctype").val().length > 0 && $("#i_csuburb").val().length > 0
        || $("#same").val() == "i" && $("#i_cno").val().length > 0 && $("#i_cstreet").val().length > 0 && $("#i_ctype").val().length > 0 && $("#i_csuburb").val().length > 0) {
        $.ajax({
            url: 'inc/ajax/ajax.getAddressBasic.php',
            type: 'POST',
            dataType: "json",
            data: {
                flatNumber: function () { return $("#i_cfno").val() },
                streetNumber: function () { return $("#i_cno").val() },
                streetName: function () { return $("#i_cstreet").val() },
                streetType: function () { return $("#i_ctype").val() },
                streetSuburb: function () { return $("#i_csuburb").val() }
            },
            success: function (data) {
                //$("#i_cpostcode").val(data.postcode);
                $("#cust_address_id").val(data.address_id);
                if (data.property_no == "0" || data.property_no == "") {
                    $("#i_cpropertynumber").val("").removeClass("ui-autocomplete-loading");
                }
                else {
                    $("#i_cpropertynumber").val(data.property_no).removeClass("ui-autocomplete-loading");
                }
                if (data.address_id != "0" || data.address_id != "" || data.address_id > 0) {
                    $("#CustAddSummary").removeAttr("disabled");
                }
            }
        });
    }
    else if ($("#same").val() == "o" && $("#o_cno").val().length > 0 && $("#o_cstreet").val().length > 0 && $("#o_ctype").val().length > 0 && $("#o_csuburb").val().length > 0) {
        $.ajax({
            url: 'inc/ajax/ajax.getAddressBasic.php',
            type: 'POST',
            dataType: "json",
            data: {
                flatNumber: function () { return $("#o_cfno").val() },
                streetNumber: function () { return $("#o_cno").val() },
                streetName: function () { return $("#o_cstreet").val() },
                streetType: function () { return $("#o_ctype").val() },
                streetSuburb: function () { return $("#o_csuburb").val() }
            },
            success: function (data) {
                $("#o_cpostcode").val(data.postcode);
                $("#cust_address_id").val(data.address_id);
                $("#o_cpropertynumber").val(data.property_no);
                if (data.address_id != "0" || data.address_id != "" || data.address_id > 0) {
                    $("#CustAddSummary").removeAttr("disabled");
                }
            }
        });
    }
}

function Search(sear) {
    if (sear.length > 0) {
        Load();
        $.post("inc/ajax/ajax.search.php", { search_q: sear },
		function (data) {
		    $("#search_query").html(data);
		}, "html");
    }
    else {
        $("#search_query").html("Please enter a search query.");
    }
}

function GetAssociationDetails(type_txt, type_desc, type_cnt, type_key, type_code, form_name, key_name, address_id) {
    Load();
    $.post("inc/ajax/ajax.getAssociationDetails.php", { type_txt: type_txt, type_desc: type_desc, type_cnt: type_cnt, type_key: type_key, type_code: type_code, form_name: form_name, key_name: key_name, address_id: address_id },
	function (data) {
	    $("#association_details").html(data);
	}, "html");

}

function GetAliasDetails(address_id, type_txt, type_desc, type_cnt, type_key, type_code) {
    Load();
    $.post("inc/ajax/ajax.getAliasDetails.php", { address_id: address_id, type_txt: type_txt, type_desc: type_desc, type_cnt: type_cnt, type_key: type_key, type_code: type_code },
	function (data) {
	    $("#alias_details").html(data);
	}, "html");

}

function GetAttributeDetails(address_id, type_txt, type_desc, type_cnt, type_key, type_code, status_ind) {
    Load();
    $.post("inc/ajax/ajax.getAttributeDetails.php", { type_txt: type_txt, type_desc: type_desc, type_cnt: type_cnt, type_key: type_key, type_code: type_code, address_id: address_id, status_ind: status_ind },
	function (data) {
	    $("#attribute_details").html(data);
	}, "html");

}

function GetAliasDetails_iphone(id, address_id, type_txt, type_desc, type_cnt, type_key, type_code) {
    Load();
    $.post("inc/ajax/ajax.getAliasDetails.php", { address_id: address_id, type_txt: type_txt, type_desc: type_desc, type_cnt: type_cnt, type_key: type_key, type_code: type_code },
	function (data) {
	    $('#popup').html(data);
	    $("#popup").popup("open");
	    $("#view-address").page('destroy').page();
	}, "html");

}
function GetAssociationDetails_iphone(id, type_txt, type_desc, type_cnt, type_key, type_code, form_name, key_name, address_id) {
    Load();
    $.post("inc/ajax/ajax.getAssociationDetails.php", { type_txt: type_txt, type_desc: type_desc, type_cnt: type_cnt, type_key: type_key, type_code: type_code, form_name: form_name, key_name: key_name, address_id: address_id },
	function (data) {
	    $('#popup').html(data);
	    $("#popup").popup("open");
	    $("#view-address").page('destroy').page();
	}, "html");

}
function GetAttributeDetails_iphone(id, address_id, type_txt, type_desc, type_cnt, type_key, type_code, status_ind) {
    Load();
    $.post("inc/ajax/ajax.getAttributeDetails.php", { type_txt: type_txt, type_desc: type_desc, type_cnt: type_cnt, type_key: type_key, type_code: type_code, address_id: address_id, status_ind: status_ind },
	function (data) {
	    $('#popup').html(data);
	    $("#popup").popup("open");
	    $("#view-address").page('destroy').page();
	}, "html");
}

function CheckCountOnlyAjax(ser, req, func) {
    $.ajax({
        url: "inc/ajax/ajax.chkCountOnly.php",
        dataType: "json",
        data: {
            request_code: req, service_code: ser, function_code: func
        },
        success: function (data) {
            if (data.flag_value == "Y") {
                if (confirm("This is a count only request so there is no workflow associated and the request will be closed upon save. Do you want to continue?")) {
                        $("#countOnlyInd").val("N");
                        $("#submit").prop('disabled', false).buttonState("enable");
                        $("#saveMore").prop('disabled', false).buttonState("enable");
                        $("#saveCountOnly").prop('disabled', false).buttonState("enable");
                        $("#workflowSRF").prop('disabled', false).buttonState("enable");
                    }else{
                        $("#countOnlyInd").val("Y");
                        $("#submit").prop('disabled', true).buttonState("disable");
                        $("#saveMore").prop('disabled', true).buttonState("disable");
                        $("#saveCountOnly").prop('disabled', false).buttonState("enable");
                        $("#workflowSRF").prop('disabled', true).buttonState("disable");
                    }
            }
            else if (data.flag_value == "N") {
                $("#countOnlyInd").val("N");
                $("#submit").prop('disabled', false).buttonState("enable");
                $("#saveMore").prop('disabled', false).buttonState("enable");
                $("#saveCountOnly").prop('disabled', false).buttonState("enable");
                $("#workflowSRF").prop('disabled', false).buttonState("enable");
            }
            else if (data.flag_value == "S") {
                $("#countOnlyInd").val("N");
                $("#submit").prop('disabled', false).buttonState("enable");
                $("#saveMore").prop('disabled', false).buttonState("enable");
                $("#saveCountOnly").prop('disabled', true).buttonState("disable");
                $("#workflowSRF").prop('disabled', false).buttonState("enable");
            }
        }
    });
}

function CheckCountOnly(count_only) {
    if (count_only == "Y") {
        $("#countOnlyInd").val("Y");
        $("#submit").prop('disabled', true).buttonState("disable");
        $("#saveMore").prop('disabled', true).buttonState("disable");
        $("#saveCountOnly").prop('disabled', false).buttonState("enable");
        $("#workflowSRF").prop('disabled', true).buttonState("disable");
    }
    else if (count_only == "N") {
        $("#countOnlyInd").val("N");
        $("#submit").prop('disabled', false).buttonState("enable");
        $("#saveMore").prop('disabled', false).buttonState("enable");
        $("#saveCountOnly").prop('disabled', false).buttonState("enable");
        $("#workflowSRF").prop('disabled', false).buttonState("enable");
    }
    else if (count_only == "S") {
        $("#countOnlyInd").val("N");
        $("#submit").prop('disabled', false).buttonState("enable");
        $("#saveMore").prop('disabled', false).buttonState("enable");
        $("#saveCountOnly").prop('disabled', true).buttonState("disable");
        $("#workflowSRF").prop('disabled', false).buttonState("enable");
    }
}

function GetHelpNotes(func, req, ser) {

    $.ajax({
        url: "inc/ajax/ajax.getHelpNotes.php",
        dataType: "json",
        data: {
            request_code: req, service_code: ser, function_code: func
        },
        success: function (data) {
            if (data.helpText.length > 0 || data.helpURL.length > 0) {
                if (ser.length > 0 && req.length == 0 && func.length == 0) {
                    $("#service_help").fadeIn("fast");
                    $("#service_helpText").val(data.helpText);
                    $("#service_helpURL").val(data.helpURL);
                }

                if (ser.length > 0 && req.length > 0 && func.length == 0) {
                    $("#request_help").fadeIn("fast");
                    $("#request_helpText").val(data.helpText);
                    $("#request_helpURL").val(data.helpURL);
                }

                if (ser.length > 0 && req.length > 0 && func.length > 0) {
                    $("#function_help").fadeIn("fast");
                    $("#function_helpText").val(data.helpText);
                    $("#function_helpURL").val(data.helpURL);
                }

            }
            else {
                $("#infoHover").fadeOut("fast");
            }
        }
    });
}

function QueryUDFs(func, req, ser) {
    $.ajax({
        url: "inc/ajax/ajax.getSrfUDFs.php",
        type: 'post',
        data: { function_code: func, service_code: ser, request_code: req },
        success: function (data) {
            $("#global-udfs").html(data);
            $("#default").trigger("create");
        }
    });
}

function QuerySearchUDFs(func, req, ser) {
    $.ajax({
        url: "inc/ajax/ajax.getSearchUDFs.php",
        type: 'post',
        data: { function_code: func, service_code: ser, request_code: req },
        success: function (data) {
            $("#global-udfs").html(data);
            $("#default").trigger("create");
        }
    });
}

function CheckHistory(type) {
    if (type == "B") {
        CheckLocationHistoryCount(type);
        CheckCustomerHistoryCount(type);
    }
    else if (type == "C") {
        CheckCustomerHistoryCount(type);
    }
    else if (type == "L") {
        CheckLocationHistoryCount(type);
    }
}

function CheckHistoryDirect(type) {

    if (type == "B") {
        CheckLocationHistory();
        CheckCustomerHistory();
    }
    else if (type == "C") {
        CheckCustomerHistory();
    }
    else if (type == "L") {
        CheckLocationHistory();
    }

}

function CheckLocationHistory() {
    $.ajax({
        url: "inc/ajax/ajax.getRequestHistory.php",
        type: 'post',
        data: {
            flatNumber: function () { return $("#lfno").val() },
            streetNumber: function () { return $("#lno").val() },
            streetName: function () { return $("#lstreet").val() },
            streetType: function () { return $("#ltype").val() },
            streetSuburb: function () { return $("#lsuburb").val() }
        },
        success: function (data) {
            $("#popup").html(data);
        }
    });
}

function CheckCustomerHistory() {
    if ($("#same").val() == "i" || $("#same").val() == "s") {
        var fno = function () { return $("#i_cfno").val() };
        var no = function () { return $("#i_cno").val() };
        var street = function () { return $("#i_cstreet").val() };
        var type = function () { return $("#i_ctype").val() };
        var suburb = function () { return $("#i_csuburb").val() };
    }
    else {
        var fno = function () { return $("#o_cfno").val() };
        var no = function () { return $("#o_cno").val() };
        var street = function () { return $("#o_cstreet").val() };
        var type = function () { return $("#o_ctype").val() };
        var suburb = function () { return $("#o_csuburb").val() };
    }

    $.ajax({
        url: "inc/ajax/ajax.getRequestHistory.php",
        type: 'post',
        data: {
            flatNumber: fno,
            streetNumber: no,
            streetName: street,
            streetType: type,
            streetSuburb: suburb
        },
        success: function (data) {
            $("#popup").html(data);
        }
    });
}

function CheckLocationHistoryCount(type) {
    $.ajax({
        url: "inc/ajax/ajax.getRequestHistoryCount.php",
        type: 'post',
        dataType: 'json',
        data: {
            function_code: function () { return $("#function").val() },
            service_code: function () { return $("#service").val() },
            request_code: function () { return $("#request").val() },
            flatNumber: function () { return $("#lfno").val() },
            streetNumber: function () { return $("#lno").val() },
            streetName: function () { return $("#lstreet").val() },
            streetType: function () { return $("#ltype").val() },
            streetSuburb: function () { return $("#lsuburb").val() }
        },
        success: function (data) {
            if (data.auto_show_count > 0) {
                $("#checkHistory").prop('disabled', false).buttonState('enable');
                if ($("#historysearchautoopenoff").val() == "N") CheckHistoryDirect(type);
            }
            if (data.total_count > 0) {
                $("#checkHistory").prop('disabled', false).buttonState('enable');
            }
        }
    });
}

function CheckCustomerHistoryCount(Atype) {
    if ($("#same").val() == "i" || $("#same").val() == "s") {
        var fno = function () { return $("#i_cfno").val() };
        var no = function () { return $("#i_cno").val() };
        var street = function () { return $("#i_cstreet").val() };
        var type = function () { return $("#i_ctype").val() };
        var suburb = function () { return $("#i_csuburb").val() };
    }
    else {
        var fno = function () { return $("#o_cfno").val() };
        var no = function () { return $("#o_cno").val() };
        var street = function () { return $("#o_cstreet").val() };
        var type = function () { return $("#o_ctype").val() };
        var suburb = function () { return $("#o_csuburb").val() };
    }

    $.ajax({
        url: "inc/ajax/ajax.getRequestHistoryCount.php",
        type: 'post',
        dataType: 'json',
        data: {
            function_code: function () { return $("#function").val() },
            service_code: function () { return $("#service").val() },
            request_code: function () { return $("#request").val() },
            flatNumber: fno,
            streetNumber: no,
            streetName: street,
            streetType: type,
            streetSuburb: suburb
        },
        success: function (data) {
            if (data.auto_show_count > 0) {
                $("#checkHistoryC").prop('disabled', false).buttonState('enable');
                if ($("#historysearchautoopenoff").val() == "N") CheckHistoryDirect(Atype);
            }
            if (data.total_count > 0) {
                $("#checkHistoryC").prop('disabled', false).buttonState('enable');
            }
        }
    });
}

function CheckMandatoryFields(ser, req, func) {
    $(".mandLabel").hide();
    $("[data-mand]").removeClass("required");
    $.ajax({
        url: 'inc/ajax/ajax.checkMandatoryFields.php',
        data: { service_code: ser, request_code: req, function_code: func },
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            $("input, textarea, select").each(function (key, value) {
                if ($(this).data("mand") !== undefined) {
                    var mand = data[$(this).data("mand")];
                    if ($(this).data("reliance") !== undefined) {
                        var reliance = data[$(this).data("reliance")];
                        if (mand == "Y" && reliance == "Y") {
                            $(this).addClass("required");
                            $("." + $(this).data("mand") + "_label").show();
                        }
                        else {
                            $(this).removeClass("required");
                            $("." + $(this).data("mand") + "_label").hide();
                        }
                    }
                    else if (mand == "Y") {
                        $(this).addClass("required");
                        $("." + $(this).data("mand") + "_label").show();
                    }
                    else {
                        $(this).removeClass("required");
                        $("." + $(this).data("mand") + "_label").hide();
                    }
                }
            });
        }
    });
}

function searchDocument() {
    var search_param = $("#searchterm").val();
    var search_type = $('input:radio[name=Search_type]:checked').val();
    Load()
    $.ajax({
        url: "inc/ajax/ajax.getDocumentSearch.php",
        type: 'post',
        data: {
            search_param: search_param,
            search_type: search_type,
        },
        success: function (data) {
            Unload();
            $("#searchResults").html(data);
        }
    });
}

function searchCustomerDocument(search_param, resultsDisplay) {
    //var search_param = $("#searchterm").val();
    var search_type = $('input:radio[name=Search_type]:checked').val();
    Load()
    $.ajax({
        url: "inc/ajax/ajax.getDocumentSearch.php",
        type: 'post',
        data: {
            search_param: search_param,
            search_type: search_type,
        },
        success: function (data) {
            Unload();

            $("#cust_searchResults").html(data);
            if ($("#cust_searchResults").html().length > 18) {
                $("#customerInfoXpert").removeAttr("disabled");
            } else {
                $("#cust_searchResults").attr("disabled","disabled");
            }
        }
    });
}

function unlinkDocument(doc_id) {
    Load()
    $.ajax({
        url: "inc/ajax/ajax.unlinkDocument.php",
        dataType: "json",
        type: 'post',
        data: {
            doc_id: doc_id,
        },
        success: function (data) {
            //Unload();
            location.reload();
            
        }
    });
}

function notifyInsuranceOfficer() {
    Load()
    $.ajax({
        url: "inc/ajax/ajax.notifyInsuranceOfficer.php",
        dataType: "json",
        type: 'post',
        success: function (data) {
            Unload();
            if (data.status = true)
                alert("Notification sent");
            else
                alert("Error Sending Notification");
        }
    });
}

function getSRFRedText() {
    Load()
    $.ajax({
        url: "inc/ajax/ajax.getSRFRedText.php",
        dataType: "json",
        type: 'post',
        data: {
            serviceid: $("#service").val(),
            requestid: $("#request").val(),
            functionid: $("#function").val()
        },
        success: function (data) {
            Unload();
            $("#rednote").html(data.note);

        }
    });
}