// All AJAX javascript queries

function getIntray(intray, i) {
    $("#filter").blur();
    if ($("#filter option:selected").val() == 612371) {
        $.ajax({
            url: 'inc/ajax/ajax.dateFilter.php',
            dataType: "html",
            success: function (data) {
                $('#popup').html(data);
                Unload();
            }
        });
    }
    else {
        Load();
        $.ajax({
            url: "inc/ajax/ajax.getIntray.php",
            dataType: "html",
            data: {
                intray: intray,
                filterCode: i,
            },
            timeout: 3000000,
            success: function (data) {
                //alert(data);
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
}

function GetAddressDetails() {
    //alert("coming ajax");
    $("#loc_address").val("Y");
    $("#cust_address").val("N");
    //alert("camehere");
    if ($("#lno").val() == "") {
        $("#lno").css('font-size', '0px');
        $("#lno").val('0');
    }
    if ($("#lno").val().length > 0 && $("#lstreet").val().length > 0 && $("#ltype").val().length > 0 && $("#lsuburb").val().length > 0) {
        $.ajax({
            url: 'inc/ajax/ajax.getAddressBasic.php',
            type: 'POST',
            dataType: "json",
            data: {
                flatNumber: function () { return $("#lfno").val() },
                streetNumber: function () { return $("#newLno").val() },
                streetName: function () { return $("#lstreet").val() },
                streetType: function () { return $("#ltype").val() },
                streetSuburb: function () { return $("#lsuburb").val() }
            },
            success: function (data) {
                //alert("count: " + data.length);
                if (data.property_count > "1") {
                    $.ajax({
                        url: 'inc/ajax/ajax.getPropertySearch.php',
                        type: 'post',
                        data: {
                            addressId: data.address_id,
                            streetNumber: function () { return $("#newLno").val() },
                            streetName: function () { return $("#lstreet").val() },
                            streetType: function () { return $("#ltype").val() },
                            streetSuburb: function () { return $("#lsuburb").val() }
                        },
                        success: function (data) {
                            Unload();
                            $('#popup').html(data);
                            //$('#popup').css("margin-top", "25%");
                            //$('#popup').css("margin-left", "25%");
                            //$('#popup').css("position", "absolute");
                        },
                        error: function (request, status, error) {
                            Unload();
                            $("#" + intray + "Intray").html("<div class='float-left'>There has been an error: " + error + ". Please try again. If it continues please contact Merit.</div>");

                        }
                    });
                }
                else {
                    if (data.property_no == "0") {
                        $("#property_no").val("").removeClass("ui-autocomplete-loading");
                    }
                    else {
                        $("#property_no").val(data.property_no).removeClass("ui-autocomplete-loading");
                    }
                    $("#address").val(data.address_id);
                    $("#addressId").val(data.address_id);
                    //check if address_id is not zero and enable the summuary button
                    if ($("#addressId").val() != "0" || $("#addressId").val() != "" || $("#addressId").val() != 0) {
                        $("#AddrSummary").removeAttr("disabled");
                    }
                    $("#loc_address_ctr").val(data.address_ctr);

                    //proceed to check allowance summary
                    var show = "N";
                    $("#chk_showall").val("No");
                    getAllowanceDetails(show);

                    //proceed to check booking summary
                    var date = new Date().toISOString();
                    GetBookingSummary(date);
                }
                $("#lroad_type").val(data.road_type).removeClass("ui-autocomplete-loading");
                $("#lroad_responsibility").val(data.road_responsibility).removeClass("ui-autocomplete-loading");
                $("#larea_group").val(data.area_group);
                if ($("#lno").val() == "0") {
                    $("#lno").val('');
                    $("#lno").css('font-size', '12px');
                }
            }
        });
    }
}

function getEventBookingDetails() {    
    if ($("#serviceInput").val() != "" && $("#requestInput").val() != "" && $("#functionInput").val() != "") {
        if ($("#functionInput").val() == "Australia Day") {
            var serviceID = $("#service").val();
            var requestID = $("#request").val();
            var functionID = $("#function").val();
            Load();
            $.ajax({
                url: 'inc/ajax/ajax.getEventBookingDetails.php',
                type: 'POST',
                data: {
                    serviceID: serviceID,
                    requestID: requestID,
                    functionID: functionID
                },
                success: function (data) {
                    Unload();
                    $('#popup').html("");
                    $('#popup').html(data);
                },
            });
        }
        else {
            $("#event_booking").attr("disabled", "disabled");
            $("#event_booking").css("display", "none");
        }
    }
}

function getAllowanceDetails(show_all) {
    if ($("#serviceInput").val() != "" && $("#requestInput").val() != "" && $("#functionInput").val() != "" && $("#lstreet").val() != "" && $("#ltype").val() != "" && $("#lsuburb").val() != "") {
        if ($("#functionInput").val() == "Removal") {
            var serviceID = $("#service").val();
            var requestID = $("#request").val();
            var functionID = $("#function").val();
            var property_no = $("#property_no").val();
            var address_id = $("#addressId").val();
            Load();
            $.ajax({
                url: 'inc/ajax/ajax.getAllowanceDetails.php',
                type: 'POST',
                data: {
                    serviceID: serviceID,
                    requestID: requestID,
                    functionID: functionID,
                    property_no: property_no,
                    address_id: address_id,
                    show_all:show_all
                },
                success: function (data) {
                    Unload();
                    $('#popup').html("");                                      
                    $('#popup').html(data);
                },
            });
        }
    }
}

function GetBookingSummary(paramdate) {
     var date = "";
    if (paramdate == "")
        date = new Date().toISOString();
    else
        date = paramdate;
    if ($("#serviceInput").val() != "" && $("#requestInput").val() != "" && $("#lstreet").val() != "" && $("#ltype").val() != "" && $("#lsuburb").val() != "" && $("#functionInput").val() != "") {
        if ($("#need_r_booking").val() == "Y" || $("#need_f_booking").val() == "Y") {
            var serviceID = $("#service").val();
            var requestID = $("#request").val();
            var functionID = $("#function").val();
            var addressID = $("#addressId").val();
            var house_number = $("#lno").val();
            var house_suffix = $("#lfno").val();
            var street_name = $("#lstreet").val();
            var street_type = $("#ltype").val();
            var locality_name = $("#lsuburb").val();
            Load();
            $.ajax({
                url: 'inc/ajax/ajax.getBookingSummary.php',
                type: 'POST',
                data: {
                    serviceID: serviceID,
                    requestID: requestID,
                    functionID: functionID,
                    addressID: addressID,
                    house_number: house_number,
                    house_suffix: house_suffix,
                    street_name: street_name,
                    street_type: street_type,
                    locality_name: locality_name,
                    start_datetime: date
                },
                success: function (data) {
                    Unload();
                    $('#popup').html("");
                    $('#popup').html(data);
                },
            });
        }
        else {
            $("#AddrBooking").attr("disabled", "disabled");
        }
    }
    else {
        $("#AddrBooking").attr("disabled", "disabled");
    }
}

function bookingStartStop(action, bookingDate) {
    //alert(action + bookingDate);
    var service_code = $("#service").val();
    var request_code = $("#request").val();
    var function_code = $("#function").val();
    var booking_date = bookingDate;
    var a_type = action;
    Load();
    $.ajax({
        url: 'inc/ajax/ajax.bookingStartStop.php',
        type: 'POST',
        data: {
            service_code: service_code,
            request_code: request_code,
            function_code: function_code,
            booking_date: booking_date,
            a_type: a_type
        },
        success: function (data) {
            $("#get").trigger("click");
            Unload();
        },
    });
}

function GetCustomerAddressDetails() {
    $("#loc_address").val("N");
    $("#cust_address").val("Y");
    if ($("#same").val() == "s" && $("#i_cstreet").val().length > 0 && $("#i_ctype").val().length > 0 && $("#i_csuburb").val().length > 0
        || $("#same").val() == "i" && $("#i_cstreet").val().length > 0 && $("#i_ctype").val().length > 0 && $("#i_csuburb").val().length > 0) {
        $.ajax({
            url: 'inc/ajax/ajax.getAddressBasic.php',
            type: 'POST',
            dataType: "json",
            data: {
                flatNumber: function () { return $("#i_cfno").val() },
                streetNumber: function () { return $("#newLno").val() },
                streetName: function () { return $("#i_cstreet").val() },
                streetType: function () { return $("#i_ctype").val() },
                streetSuburb: function () { return $("#i_csuburb").val() }
            },
            success: function (data) {
                if (data.property_count > "1") {
                    $.ajax({
                        url: 'inc/ajax/ajax.getPropertySearch.php',
                        type: 'post',
                        data: {
                            addressId: data.address_id,
                            streetNumber: function () { return $("#newLno").val() },
                            streetName: function () { return $("#i_cstreet").val() },
                            streetType: function () { return $("#i_ctype").val() },
                            streetSuburb: function () { return $("#i_csuburb").val() }
                        },
                        success: function (data) {
                            Unload();
                            $('#popup').html(data);
                        }
                    });
                }
                else {                    
                    if (data.house_suffix == "")
                        $("#full_house_no").val(data.house_number);
                    else
                        $("#full_house_no").val(data.house_number);                    
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
                $("#countOnlyInd").val("Y");
                $("#submit").prop('disabled', true).buttonState("disable");
                $("#saveMore").prop('disabled', true).buttonState("disable");
                $("#saveCountOnly").prop('disabled', false).buttonState("enable");
                $("#workflowSRF").prop('disabled', true).buttonState("disable");

            }
            else if (data.flag_value == "N") {
                $("#countOnlyInd").val("N");
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

function GetHelpNotes(func, req, ser, sauto, rauto, fauto, keyword) {
    var sautoVal = ""; var rautoVal = ""; var fautoVal = "";
    if (keyword == "Y") {
        if ((sauto == "Y" && rauto == "Y" && fauto == "Y") || (sauto == "Y" && rauto == "N" && fauto == "Y") || (sauto == "N" && rauto == "Y" && fauto == "Y") || (sauto == "N" && rauto == "N" && fauto == "Y")) {
            sautoVal = "N"; raoutVal = "N"; fautoVal = "Y";
        }
        else if ((sauto == "Y" && rauto == "Y" && fauto == "N") || (sauto == "N" && rauto == "Y" && fauto == "N")) {
            sautoVal = "N"; faoutVal = "N"; rautoVal = "Y";
        }
        else if (sauto == "Y" && rauto == "N" && fauto == "N") {
            rautoVal = "N"; faoutVal = "N"; sautoVal = "Y";
        }
    } else {
        sautoVal = sauto;
        rautoVal = rauto;
        fautoVal = fauto;
    }
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
                    var element = document.getElementById('service_help'); //replace elementId with your element's Id.
                    var rect = element.getBoundingClientRect();
                    var x = rect.left;
                    var y = rect.top;
                    if (sautoVal == "Y") {
                        $('.hoverDiv').css({
                            left: x - 315,
                            top: y + 25
                        });
                        $("#helpText_data").val(data.helpText);
                        $("#helpURL").html(data.helpURL);
                        $(".hoverDiv").fadeIn("fast");
                        $("#helpText_mobile").html(data.helpText);
                        $("#helpURL_mobile").html(data.helpURL);
                        $("#popup").html($("#hoverDiv").html()).popup("open");
                        $("#popup").css("top", "100px");
                    }
                }

                if (ser.length > 0 && req.length > 0 && func.length == 0) {
                    $("#request_help").fadeIn("fast");
                    $("#request_helpText").val(data.helpText);
                    $("#request_helpURL").val(data.helpURL);
                    var element = document.getElementById('request_help'); //replace elementId with your element's Id.
                    var rect = element.getBoundingClientRect();
                    var x = rect.left;
                    var y = rect.top;
                    if (rautoVal == "Y") {
                        $('.hoverDiv').css({
                            left: x - 315,
                            top: y + 25
                        });
                        $("#helpText_data").val(data.helpText);
                        $("#helpURL").html(data.helpURL);
                        $(".hoverDiv").fadeIn("fast");
                        $("#helpText_mobile").html(data.helpText);
                        $("#helpURL_mobile").html(data.helpURL);
                        $("#popup").html($("#hoverDiv").html()).popup("open");
                        $("#popup").css("top", "100px");
                    }
                }
                if (ser.length > 0 && req.length > 0 && func.length > 0) {
                    $("#function_help").fadeIn("fast");
                    $("#function_helpText").val(data.helpText);
                    $("#function_helpURL").val(data.helpURL);
                    var element = document.getElementById('function_help'); //replace elementId with your element's Id.
                    var rect = element.getBoundingClientRect();
                    var x = rect.left;
                    var y = rect.top;
                    if (fautoVal == "Y") {
                        $('.hoverDiv').css({
                            left: x - 315,
                            top: y + 25
                        });
                        $("#helpText_data").val(data.helpText);
                        $("#helpURL").html(data.helpURL);
                        $(".hoverDiv").fadeIn("fast");
                        $("#helpText_mobile").html(data.helpText);
                        $("#helpURL_mobile").html(data.helpURL);
                        $("#popup").html($("#hoverDiv").html()).popup("open");
                        $("#popup").css("top", "100px");
                    }
                }
            }
            else {
                $("#infoHover").fadeOut("fast");
                //$("#popup").html($("#hoverDiv").html()).popup("close");
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
            $("#searchResults").trigger("create");
        }
    });
}

function searchCustomerDocument(search_param, resultsDisplay) {
    //var search_param = $("#searchterm").val();
    $("#cust_searchResults").html("");
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

            if ($("#deviceIndicator").val() != "mobile") {
                $("#cust_searchResults").html(data);
                if ($("#cust_searchResults").html().length > 18) {
                    $("#customerInfoXpert").removeAttr("disabled");
                } else {
                    $("#customerInfoXpert").attr("disabled", "disabled");
                }
            } else {
                $("#cust_searchResults").html(data);
                $("#cust_searchResults").trigger("create");
                if ($("#cust_searchResults").html().length > 18) {
                    $("#customerInfoXpert").removeAttr("disabled").button('refresh');;
                } else {
                    $("#customerInfoXpert").attr("disabled", "disabled").button('refresh');;
                }
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

// function gets called if customer name or surname gets changed - added by Poonam Hirpara
function change_name() {
    $.ajax({
        url: 'inc/ajax/ajax.changeNameDetails.php',
        type: 'post',
        data: {
            name_id: $("#name_id").val(),
            pref_title: $("#pref_title").val(),
            given: $("#given").val(),
            surname: $("#surname").val(),
            cust_mobile: $("#cust_mobile").val(),
            cust_phone: $("#cust_phone").val(),
            cust_work: $("#cust_work").val(),
            email_address: $("#email_address").val(),
            company: $("#company").val(),
            old_pref_title: $("#old_pref_title").val(),
            old_given: $("#old_given").val(),
            old_surname: $("#old_surname").val(),
            old_cust_phone: $("#old_cust_phone").val(),
            old_cust_work: $("#old_cust_work").val(),
            old_cust_mobile: $("#old_cust_mobile").val(),
            old_email_address: $("#old_email_address").val(),
            old_company: $("#old_company").val()
        },
        success: function (data) {
            //alert("ok");
            Unload();
            $('#popup').html(data);
            $(self).removeClass("ui-autocomplete-loading");
        }
    });
}

// function gets called user clicks Yes or No on name change details window - added by Poonam Hirpara
function modify_name(new_name) {
    $.ajax({
        url: 'inc/ajax/ajax.modifyNameDetails.php',
        type: 'post',
        data: {
            name_id: $("#name_id").val(),
            pref_title: $("#new_pref_title").val(),
            given: $("#new_given").val(),
            surname: $("#new_surname").val(),
            cust_mobile: $("#new_cust_mobile").val(),
            cust_phone: $("#new_cust_phone").val(),
            cust_work: $("#new_cust_work").val(),
            email_address: $("#new_email_address").val(),
            company: $("#new_company").val(),
            new_name: new_name
        },
        success: function (data) {
            //alert(data);
            $('#popup').html("");
            $('#popup').fadeOut("fast");
            if (data != "") {
                $("#name_id").val(data);
            }
            check_adhoc();
        }
    });
}

// function gets called to check adhoc officer - added by Poonam Hirpara
function check_adhoc() {
    Load();
    $.ajax({
        url: 'inc/ajax/ajax.chooseAdhocOfficer.php',
        type: 'post',
        data: {
            ser: $("#service").val(),
            req: $("#request").val(),
            func: $("#function").val()
        },
        success: function (data) {
            if ($("#deviceIndicator").val() == "pc") {
                $('#popup').html(data);
            } else {
                $("#adhocOfficer").html(data).trigger("create");
            }

        }
    });
}

function modifyCustomerDetails(name_id, initial, pref_title, given, surname, mobile, telephone, work, email, company, fax, name_ctr) {
    //alert(name_id + initial + pref_title + given + surname + mobile + telephone + work + email + company + fax + name_ctr);
    $.ajax({
        url: 'inc/ajax/ajax.modifyNameDetails.php',
        type: 'post',
        data: {
            name_id: name_id,
            initial: initial,
            pref_title: pref_title,
            given: given,
            surname: surname,
            cust_mobile: mobile,
            cust_phone: telephone,
            cust_work: work,
            email_address: email,
            company: company,
            fax: fax,
            name_ctr: name_ctr,
            new_name: "N"
        },
        success: function (data) {
            location.reload();
        }
    });
}

function resetdata() {
    $("#editInitial_val").val($("#editInitial").html().replace(/^\s+|\s+$/g, ''));
    $("#editPref_title_val").val($("#editPref_title").html().replace(/^\s+|\s+$/g, ''));
    $("#editGiven_names_val").val($("#editGiven_names").html().replace(/^\s+|\s+$/g, ''));
    $("#editSurname_val").val($("#editSurname").html().replace(/^\s+|\s+$/g, ''));
    $("#editMobile_no_val").val($("#editMobile_no").html().replace(/^\s+|\s+$/g, ''));
    $("#editTelephone_val").val($("#editTelephone").html().replace(/^\s+|\s+$/g, ''));
    $("#editWork_phone_val").val($("#editWork_phone").html().replace(/^\s+|\s+$/g, ''));
    $("#editEmail_address_val").val($("#editEmail_address").html().replace(/^\s+|\s+$/g, ''));
    $("#editCompany_name_val").val($("#editCompany_name").html().replace(/^\s+|\s+$/g, ''));
    $("#editFax_no_val").val($("#editFax_no").html().replace(/^\s+|\s+$/g, ''));
    $("#editName_ctr_val").val($("#editName_ctr").html().replace(/^\s+|\s+$/g, ''));
}