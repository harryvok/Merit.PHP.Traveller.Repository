// Start Document
$(document).ready(function () {

    /* Does something ----------------------------------------------------- */
                                $("input[data-name]").click(function () {
                                        var id = $(this).attr("id");
                                        $("#" + id + "Type").trigger("click");
                                        $("#" + id + "Name").trigger("click");
                                        $("#" + id + "Email").trigger("click");
                                });


    // From My Email --------------------------------------------------------
                                    $("#fromEmail").click(function () {
                                        $("#note").toggle();
                                    });
    // -----------------------------------------------------------------------
    // RESET BUTTON ----------------------------------------------------------
            $("input[type='reset']").click(function () {
                $("input[type='checkbox']:not(:disabled)").each(function () {
                    $(this).prop("checked", false);
                    var id = $(this).attr("id");
                    $("#" + id + "Type").prop("checked", false);
                    $("#" + id + "Name").prop("checked", false);
                    $("#" + id + "Email").prop("checked", false);
                    $("#listEmail").html("");
                    $("#listSMS").html("");
                });
            });
    // -----------------------------------------------------------------------
    // SUBMIT BUTTON ---------------------------------------------------------
                $("form").submit(function () {
                    return true;
                });
    // -----------------------------------------------------------------------
    // DELETE Email/sms ------------------------------------------------------
            $(document).on("click", "[data-delete]", function (event) {
                $("#" + $(this).data("delete")).remove();
                $("#emailAdd").show();
                $("#emailOfficerAdd").show();
                $("#smsAdd").show();
                $("#smsOfficerAdd").show();
            });
    // -----------------------------------------------------------------------
    // ADD Email -------------------------------------------------------------
            
            $("#emailAdd").click(function () {
                $("#emailAdd").hide();
                $("#emailOfficerAdd").hide();
        
                $("#listEmail").html($("#listEmail").html() +
                                        "<span id='emailText" + email + "List'>" +
                                        "<span id='emailText" + email + "NameLab'>Name:</span>" +
                                        "<input id='emailText" + email + "Name' type='text'  value='' />" +
                                        "<span id='emailText" + email + "EmailLab'>Email:</span>" +
                                        "<input id='emailText" + email + "Email' type='text' value='' />" +
                                        "<input id='emailText" + email + "Type' type='hidden' value='' />" +
                                        "<input type='button' value='Add' id='emailText" + email + "Add' />" +
                                        "<img data-delete='emailText" + email + "List' src='images/delete-icon.png'><br /></span>");

                $("#emailText" + email + "Add").click(function () {
                    if ($("#emailText" + email + "Name").length > 0 && $("#emailText" + email + "Email").length > 0 && validateEmail($("#emailText" + email + "Email").val())) {

                        var emailaddress = $("#emailText" + email + "Email").val();
                        var name = $("#emailText" + email + "Name").val();
                        $("#emailText" + email + "NameLab").html($("#emailText" + email + "Name").val());
                        $("#emailText" + email + "Name").css("display", "none").attr("name", "email_name[]");
                        $("#emailText" + email + "Email").css("display", "none").attr("name", "email_to[]");
                        $("#emailText" + email + "Type").css("display", "none").attr("name", "email_name_type[]");
                        $("#emailText" + email + "Type").val("X");
                        $("#emailText" + email + "EmailLab").remove();
                        $("#emailText" + email + "Add").remove();
                        $("#emailText" + email + "Name").attr("value", name);
                        $("#emailText" + email + "Email").attr("value", emailaddress);

                        $("#emailAdd").show();
                        $("#emailOfficerAdd").show();
                        email++;

                    }
                    else {
                        alert("Please ensure you have entered a valid name and email address");
                    }
                });
            });
    // -----------------------------------------------------------------------
    // Add officer Email -----------------------------------------------------
    
            $("#emailOfficerAdd").click(function () {
                $("#emailAdd").hide();
                $("#emailOfficerAdd").hide();
                $("#listEmail").html($("#listEmail").html() +
                            "<span id='emailText" + email + "List'>" + 
                            "<span id='emailText" + email + "NameLab'>Officer:</span>" +
                            "<input id='emailText" + email + "Officer' type='text'  value='' />" +
                            "<input id='emailText" + email + "OfficerCode' type='hidden'  value='' />" +
                            "<input id='emailText" + email +"Name' type='hidden'  value='' />" +
                            "<input id='emailText" + email + "Email' type='hidden'  value='' /> " +
                            "<img data-delete='emailText" + email +"List' src='images/delete-icon.png'><br /></span>");

                // Get officer
                var officerResponse = function (event, ui) {
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
                    if (label.length > 0 || index.length > 0) {
                        $("#" + $(this).attr("id") + "Code").val(index);
                        $("#" + $(this).attr("id")).val(label);
                        $("#" + $(this).attr("id")).attr("readonly", true);
                        $("#" + $(this).attr("id")).blur();
                        $.ajax({
                            url: 'inc/ajax/ajax.getOfficer.php',
                            type: 'get',
                            dataType: "json",
                            data: { id: index },
                            success: function (data) {
                                var emailText = data.mail_id !== undefined ? data.mail_id : '';
                                var name = data.given_names + " " + data.surname;
                                $("#emailText" + email + "Email").val(emailText);
                                $("#emailText" + email + "Name").val(name);
                                if (emailText.length > 0) {
                                    if (confirm("Choose this officer?")) {
                                        if ($("#emailText" + email + "Name").length > 0 && $("#emailText" + email + "Email").length > 0 && validateEmail($("#emailText" + email + "Email").val())) {
                                            $("#emailText" + email + "NameLab").html($("#emailText" + email + "Name").val());
                                            $("#emailText" + email + "Officer").css("display", "none");
                                            $("#emailText" + email + "Name").attr("name", "email_name[]");
                                            $("#emailText" + email + "Email").attr("name", "email_to[]");
                                            $("#emailText" + email + "Type").val("O");
                                            $("#emailText" + email + "Add").remove();
                                            $("#emailAdd").show();
                                            $("#emailOfficerAdd").show();
                                            email++;
                                        }
                                        else {
                                            alert("Please ensure you have entered a valid name and email address");
                                        }
                                    }
                                }
                                else {
                                    alert("This officer does not have an email address");
                                    $("#emailText" + email + "Officer").val("");
                                    $("#emailText" + email + "OfficerCode").val("");
                                }
                            }
                        });
                    }
                }

                $("#emailText" + email + "Officer").autoCompleteInit("inc/ajax/ajax.officerList.php", { term: "" }, officerResponse);
                $("#emailText" + email + "Officer").click(function () {
                    $("#" + $(this).attr("id") + "Code").val("");
                    $(this).val("");
                    $(this).attr("readonly", false);
                    $(this).autocomplete("search", "");
                });
            });
    // -----------------------------------------------------------------------
    // Add SMS ---------------------------------------------------------------

            $("#smsAdd").click(function () {
                $("#smsAdd").hide();
                $("#smsOfficerAdd").hide();
                $("#listSMS").html($("#listSMS").html() + "<span id='smsText" + sms + "List'><span id='smsText" + sms + "NameLab'>Name:</span><input id='smsText" + sms + "Name' type='text' value='' /><span id='smsText" + sms + "MobileLab'>Mobile:</span><input id='smsText" + sms + "Mobile' type='text' value='' /><input type='button' value='Add' id='smsText" + sms + "Add' /> <img data-delete='smsText" + sms + "List' src='images/delete-icon.png'><br /></span>");
                $("#smsText" + sms + "Add").click(function () {
                    if ($("#smsText" + sms + "Name").length > 0 && $("#smsText" + sms + "Mobile").length > 0 && isNumber($("#smsText" + sms + "Mobile").val())) {
                        $("#smsText" + sms + "NameLab").html($("#smsText" + sms + "Name").val());
                        $("#smsText" + sms + "Name").css("display", "none").attr("name", "sms_name[]");
                        $("#smsText" + sms + "Mobile").css("display", "none").attr("name", "sms_mobile_no[]");
                        $("#smsText" + sms + "MobileLab").remove();
                        $("#smsText" + sms + "Add").remove();
                        $("#smsAdd").show();
                        $("#smsOfficerAdd").show();
                        sms++;
                    }
                    else {
                        alert("Please ensure you have entered a valid name and mobile number.");
                    }
                });
            });
    // -----------------------------------------------------------------------
    // Add Officer SMS -------------------------------------------------------

            $("#smsOfficerAdd").click(function () {
                $("#smsAdd").hide();
                $("#smsOfficerAdd").hide();
                $("#listSMS").html($("#listSMS").html() + "<span id='smsText" + sms + "List'><span id='smsText" + sms + "NameLab'>Officer:</span> <input id='smsText" + sms + "Officer' type='text'  value='' /><input id='smsText" + sms + "OfficerCode' type='hidden'  value='' /><input id='smsText" + sms + "Name' type='hidden'  value='' /><input id='smsText" + sms + "Mobile' type='hidden'  value='' /> <img data-delete='smsText" + sms + "List' src='images/delete-icon.png'><br /></span>");

                var officerResponse = function (event, ui) {
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
                    if (label.length > 0 || index.length > 0) {
                        $("#" + $(this).attr("id") + "Code").val(index);
                        $("#" + $(this).attr("id")).val(label);
                        $("#" + $(this).attr("id")).attr("readonly", true);
                        $("#" + $(this).attr("id")).blur();
                        $.ajax({
                            url: 'inc/ajax/ajax.getOfficer.php',
                            type: 'get',
                            dataType: "json",
                            data: { id: index },
                            success: function (data) {
                                var mobile = data.mobile_no !== undefined ? data.mobile_no : '';
                                var name = data.given_names + " " + data.surname;
                                $("#smsText" + sms + "Mobile").val(mobile);
                                $("#smsText" + sms + "Name").val(name);
                                if (mobile.length > 0) {
                                    if (confirm("Choose this officer?")) {
                                        if ($("#smsText" + sms + "Name").length > 0 && $("#smsText" + sms + "Mobile").length > 0 && isNumber($("#smsText" + sms + "Mobile").val())) {
                                            $("#smsText" + sms + "NameLab").html($("#smsText" + sms + "Name").val());
                                            $("#smsText" + sms + "Officer").css("display", "none");
                                            $("#smsText" + sms + "Name").attr("name", "sms_name[]");
                                            $("#smsText" + sms + "Mobile").attr("name", "sms_mobile_no[]");
                                            $("#smsAdd").show();
                                            $("#smsOfficerAdd").show();
                                            sms++;
                                        }
                                        else {
                                            alert("Please ensure you have entered a valid name and mobile number.");
                                        }
                                    }
                                }
                                else {
                                    alert("This officer does not have a mobile number.");
                                    $("#smsText" + sms + "Officer").val("");
                                    $("#smsText" + sms + "OfficerCode").val("");
                                }
                            }
                        });
                    }
                }

                $("#smsText" + sms + "Officer").autoCompleteInit("inc/ajax/ajax.officerList.php", { term: "" }, officerResponse);
                $("#smsText" + sms + "Officer").click(function () {
                    $("#" + $(this).attr("id") + "Code").val("");
                    $(this).val("");
                    $(this).attr("readonly", false);
                    $(this).autocomplete("search", "");
                });
            });
    // -----------------------------------------------------------------------
}); // FINISH DOC