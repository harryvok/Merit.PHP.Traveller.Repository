// Start Document - MOBILE
$(document).ready(function () {
    var emailCount = $("#emailCount").val();
    var smsCount = $("#smsCount").val();
    
    // Initially Hide/Disable Stuff
    $("#emailContainer").hide();
    $("#smsContainer").hide();

    $("#sendbutton").css('visibility', 'hidden');
    

    /* On action do stuff ------------------------------------------------------- */
    $("input[type=checkbox]").on("click", function () {
        var id = $(this).attr("id");

        $("#" + id + "Type").trigger("click");
        $("#" + id + "Name").trigger("click");
        $("#" + id + "Email").trigger("click");

        // On check
        if ($(this).is(":checked")) {
            // CHECKED EMAIL
            if ($(this).attr("data-type") == 'Email') {

                // Increase Counter
                emailCount = $("#emailCount").val();
                emailCount++;

                $("#emailCount").val(emailCount);

                // Show Container
                if (emailCount > 0) {
                    $("#emailContainer").show();
                    $("#emailContainer").trigger("expand");
                    $("#sendbutton").css('visibility','visible');
                }
            }
            // CHECKED SMS
            else if ($(this).attr("data-type") == 'SMS') {

                // Increase Counter
                smsCount = $("#smsCount").val();
                smsCount++;
                $("#smsCount").val(smsCount);

                // Show Container
                if (smsCount > 0) {
                    $("#smsContainer").show();
                    $("#smsContainer").trigger("expand");
                    $("#sendbutton").css('visibility', 'visible');
                }
            }
        }
            // On uncheck
        else {
            // If checkbox was Email
            if ($(this).attr("data-type") == 'Email') {
                // Reduce Counter
                emailCount = $("#emailCount").val();
                emailCount--;
                $("#emailCount").val(emailCount);
                // Hide Container
                if (emailCount == 0) {
                    $("#emailContainer").hide();
                }
            }
                // If checkbox was SMS
            else if ($(this).attr("data-type") == 'SMS') {
                // Reduce Counter
                smsCount = $("#smsCount").val();
                smsCount--;
                $("#smsCount").val(smsCount);
                // Hide Container
                if (smsCount == 0) {
                    $("#smsContainer").hide();
                }
            }
            // Disable Submission Button
            if (smsCount == 0 & emailCount == 0) {
                $("#sendbutton").css('visibility', 'hidden');
            }
        }

    });


    // From My Email --------------------------------------------------------
    $("#fromEmail").click(function () {
        $("#note").toggle();
    });


    // -----------------------------------------------------------------------
    // RESET BUTTON ----------------------------------------------------------
    $("#reset").click(function () {
        $("input[type='checkbox']:not(:disabled)").each(function () {
            $(this).prop("checked", false);
            var id = $(this).attr("id");
            $("#" + id + "Type").prop("checked", false);
            $("#" + id + "Name").prop("checked", false);
            $("#" + id + "Email").prop("checked", false);
            $("#listEmail").html("");
            $("#listSMS").html("");

            // Reset counters to 0
            emailCount = 0;
            $("#emailCount").val(emailCount);
            smsCount = 0;
            $("#smsCount").val(smsCount);

            // Hide the inputs as there is now no data.
            $("#smsContainer").hide();
            $("#emailContainer").hide();

            $("#emailAdd").show();
            $("#emailOfficerAdd").show();
            $("#smsAdd").show();
            $("#smsOfficerAdd").show();

            $("#emailmanualdiv").show();
            $("#smsmanualdiv").show();
            $("#emailheader").show();
            $("#smsheader").show();
            $("#manualdivrow").css("width", "50%");

            $("#sendbutton").css('visibility', 'hidden');
        });
    });

    // -----------------------------------------------------------------------
    // SUBMIT BUTTON ---------------------------------------------------------

    $("#sendbutton").click(function () {
        $("#sendbutton").remove();
        $("#notificationForm").submit();
        
    });
    // -----------------------------------------------------------------------



    // DELETE ------------------------------------------------------
    $(document).on("click", "[data-delete]", function (event) {
        $("#" + $(this).data("delete")).remove();

        emailCount = $("#emailCount").val();
        smsCount = $("#smsCount").val();

        if (emailCount == 0) {
            $("#emailContainer").hide();
        }
        if (smsCount == 0) {
            $("#smsContainer").hide();
        }
        if (smsCount == 0 & emailCount == 0) {
            $("#sendbutton").css('visibility', 'hidden');
        }

    });


    // -----------------------------------------------------------------------
    // ADD Email -------------------------------------------------------------
    var email = 0;
    $("#emailAdd").click(function () {

        emailCount = $("#emailCount").val();
        emailCount++;
        $("#emailCount").val(emailCount);

        $("#emailAdd").hide();
        $("#emailOfficerAdd").hide();

        $("#smsmanualdiv").hide();
        $("#smsheader").hide();
        $("#manualdivrow").css("width", "100%");

        $("#listEmail").html($("#listEmail").html() +
                                "<script>function decrementemail() { var tempEmailCounter= $(\"#emailCount\").val(); " +
                                "tempEmailCounter--; $(\"#emailCount\").val(tempEmailCounter);  $(\"#emailAdd\").show(); $(\"#emailOfficerAdd\").show(); $(\"#smsmanualdiv\").show(); $(\"#smsheader\").show(); $(\"#manualdivrow\").css('width', '50%'); }" +
                                "</script>" +

                                "<div id='emailText" + email + "List'>" +

                                "<label for id='emailText" + email + "NameLab' style='margin-left: 3% !important; margin-top:2% !important; display:inline; padding-right: 10px;'>Name:</label>" +
                                "<input type='text' name='emailText' id='emailText" + email + "Name' value='' data-mini='true' class='mobileform ui-input-text ui-body-c'>" +

                                "<label for id='emailText" + email + "EmailLab' style='margin-left: 3% !important;'>Email:</label>" +
                                "<input type='text' id='emailText" + email + "Email' value='' data-mini='true' class='mobileform ui-input-text ui-body-c' />" +

                                "<input id='emailText" + email + "Type' type='hidden' value='' />" +
                                "<div data-role='button' data-shadow='true' data-iconshadow='true' data-wrapperels='span' data-theme='c' class='ui-btn ui-btn-up-c ui-shadow ui-btn-corner-all' id='emailText" + email + "Add' style='margin-left: 3% !important; margin-bottom:2% !important; width:30% !important; margin-right: 2% !important; display:inline-block !important;'>Add</div>" +
                              //  "<div data-role='button' onClick='decrementemail()' data-delete='emailText" + email + "List' data-shadow='true' data-iconshadow='true' data-wrapperels='span' data-theme='c' class='ui-btn ui-btn-up-c ui-shadow ui-btn-corner-all' style='margin-left: 3% !important; margin-bottom:2% !important; width:30% !important; margin-right: 2% !important;display:inline-block !important;'>Cancel</div></div>");

         "<img onClick='decrementemail()' id='emailText" + email + "Delete' data-delete='emailText" + email + "List' src='images/delete-icon.png' style='padding-top:2px'></div>");

        
        // <input id='emailText" + email + "Name' type='text'  value='' />

        $("#emailText" + email + "Add").click(function () {

            if ($("#emailText" + email + "Email").val().length > 0 && $("#emailText" + email + "Name").val().length > 0 && validateEmail($("#emailText" + email + "Email").val())) {

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
                $("#smsmanualdiv").show();
                $("#smsheader").show();
                $("#manualdivrow").css("width", "50%");
                email++;

                emailCount = $("#emailCount").val();
                if (emailCount > 0) {
                    $("#emailContainer").show();
                    $("#emailContainer").trigger("expand");
                    $("#sendbutton").css('visibility', 'visible');
                }

            }
            else {
                alert("Please ensure you have entered a valid name and email address");
            }
        });
    });
    // -----------------------------------------------------------------------
    // Add officer Email -----------------------------------------------------

    $("#emailOfficerAdd").click(function () {

        emailCount = $("#emailCount").val();
        emailCount++;
        $("#emailCount").val(emailCount);

        $("#emailAdd").hide();
        $("#emailOfficerAdd").hide();

        $("#smsmanualdiv").hide();
        $("#smsheader").hide();
        $("#manualdivrow").css("width", "100%");

        $("#listEmail").html($("#listEmail").html() +
                    "<script>function decrementemail() { var tempEmailCounter= $(\"#emailCount\").val(); " +
                    "tempEmailCounter--; $(\"#emailCount\").val(tempEmailCounter); $(\"#emailAdd\").show(); $(\"#emailOfficerAdd\").show(); $(\"#smsmanualdiv\").show(); $(\"#smsheader\").show(); $(\"#manualdivrow\").css('width', '50%'); $(\"#emailTextDelete\").css('margin-left', '0%');}" +
                    "</script>" +
                    "<div id='emailText" + email + "List'>" +

                    "<label for id='emailText" + email + "NameLab' style='margin-left: 3% !important; margin-top:2% !important; display:inline; padding-right: 10px;'>Officer:</label>" +
                    "<input type='text' name='emailText' id='emailText" + email + "Officer' value='' data-mini='true' class='mobileform ui-input-text ui-body-c'>" +

                    "<input id='emailText" + email + "OfficerCode' type='hidden'  value='' />" +
                    "<input id='emailText" + email + "Name' type='hidden'  value='' />" +
                    "<input id='emailText" + email + "Type' type='hidden' value='' />" +
                    "<input id='emailText" + email + "Email' type='hidden'  value='' /> " +  
                    "<img id='emailTextDelete' onClick='decrementemail()' data-delete='emailText" + email + "List' src='images/delete-icon.png' style='padding-top:2px; margin-left:3%;'></div>");
                    // "<div data-role='button' onClick='decrementemail()' data-delete='emailText" + email + "List' data-shadow='true' data-iconshadow='true' data-wrapperels='span' data-theme='c' class='ui-btn ui-btn-up-c ui-shadow ui-btn-corner-all' style='margin-left: 3% !important; margin-bottom:2% !important; width:30% !important; margin-right: 2% !important;display:inline-block !important;'>Cancel</div></div>")

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
                                if ($("#emailText" + email + "Name").length > 0 && $("#emailText" + email + "Email").length > 0) {
                                    $("#emailText" + email + "NameLab").html($("#emailText" + email + "Name").val());
                                    $("#emailText" + email + "Officer").css("display", "none");
                                    $("#emailText" + email + "Name").attr("name", "email_name[]");
                                    $("#emailText" + email + "Email").attr("name", "email_to[]");
                                    $("#emailText" + email + "Type").css("display", "none").attr("name", "email_name_type[]");
                                    $("#emailText" + email + "Type").val("P");
                                    $("#emailText" + email + "Add").remove();
                                    $("#emailAdd").show();
                                    $("#emailOfficerAdd").show();
                                    $("#smsmanualdiv").show();
                                    $("#smsheader").show();
                                    $("#manualdivrow").css("width", "50%");
                                    email++;

                                    emailCount = $("#emailCount").val();
                                    if (emailCount > 0) {
                                        $("#emailContainer").show();
                                        $("#emailContainer").trigger("expand");
                                        $("#sendbutton").css('visibility', 'visible');
                                    }

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
    var sms = 0;
    $("#smsAdd").click(function () {

        smsCount = $("#smsCount").val();
        smsCount++;
        $("#smsCount").val(smsCount);

        $("#smsAdd").hide();
        $("#smsOfficerAdd").hide();

        $("#emailmanualdiv").hide();
        $("#emailheader").hide();
        $("#manualdivrow").css("width", "100%");

        $("#listSMS").html($("#listSMS").html() +
            "<script>function decrementsms() { var tempSmsCounter= $(\"#smsCount\").val(); " +
            "tempSmsCounter--; $(\"#smsCount\").val(tempSmsCounter); $(\"#smsAdd\").show(); $(\"#smsOfficerAdd\").show(); $(\"#emailmanualdiv\").show(); $(\"#emailheader\").show(); $(\"#manualdivrow\").css('width', '50%');}" +
            "</script>" +

            "<div id='smsText" + sms + "List'>" +

            "<label for id='smsText" + sms + "NameLab' style='margin-left: 3% !important; margin-top:2% !important; display:inline; padding-right: 10px;'>Name:</label>" +
            "<input type='text' name='emailText' id='smsText" + sms + "Name' value='' data-mini='true' class='mobileform ui-input-text ui-body-c'>" +

            "<label for id='smsText" + sms + "MobileLab' style='margin-left: 3% !important;'>Mobile Number:</label>" +
            "<input type='text' id='smsText" + sms + "Mobile' value='' data-mini='true' class='mobileform ui-input-text ui-body-c' />" +

            "<div data-role='button' data-shadow='true' data-iconshadow='true' data-wrapperels='span' data-theme='c' class='ui-btn ui-btn-up-c ui-shadow ui-btn-corner-all' id='smsText" + sms + "Add' style='margin-left: 3% !important; margin-bottom:2% !important; width:30% !important; margin-right: 2% !important; display:inline-block !important;'>Add</div>" +
           // "<div data-role='button' onClick='decrementsms()' data-delete='smsText" + sms + "List' data-shadow='true' data-iconshadow='true' data-wrapperels='span' data-theme='c' class='ui-btn ui-btn-up-c ui-shadow ui-btn-corner-all' style='margin-left: 3% !important; margin-bottom:2% !important; width:30% !important; margin-right: 2% !important;display:inline-block !important;'>Cancel</div></div>");
            "<img onClick='decrementsms()' id='smsText" + sms + "Delete' data-delete='smsText" + sms + "List' src='images/delete-icon.png' style='padding-top:2px'></div>");

        $("#smsText" + sms + "Add").click(function () {
            if ($("#smsText" + sms + "Name").length > 0 && $("#smsText" + sms + "Mobile").length > 0 && isNumber($("#smsText" + sms + "Mobile").val())) {
                $("#smsText" + sms + "NameLab").html($("#smsText" + sms + "Name").val());
                $("#smsText" + sms + "Name").css("display", "none").attr("name", "sms_name[]");
                $("#smsText" + sms + "Mobile").css("display", "none").attr("name", "sms_mobile_no[]");
                $("#smsText" + sms + "MobileLab").remove();
                $("#smsText" + sms + "Add").remove();
                $("#smsAdd").show();
                $("#smsOfficerAdd").show();
                $("#emailmanualdiv").show();
                $("#emailheader").show();
                $("#manualdivrow").css("width", "50%");
                sms++;

                smsCount = $("#smsCount").val();
                if (smsCount > 0) {
                    $("#smsContainer").show();
                    $("#smsContainer").trigger("expand");
                    $("#sendbutton").css('visibility', 'visible');
                }

            }
            else {
                alert("Please ensure you have entered a valid name and mobile number.");
            }
        });
    });
    // -----------------------------------------------------------------------
    // Add Officer SMS -------------------------------------------------------

    $("#smsOfficerAdd").click(function () {

        smsCount = $("#smsCount").val();
        smsCount++;
        $("#smsCount").val(smsCount);

        $("#smsAdd").hide();
        $("#smsOfficerAdd").hide();

        $("#emailmanualdiv").hide();
        $("#emailheader").hide();
        $("#manualdivrow").css("width", "100%");

        $("#listSMS").html($("#listSMS").html() +
            "<script>function decrementsms() { var tempSmsCounter= $(\"#smsCount\").val(); " +
            "tempSmsCounter--; $(\"#smsCount\").val(tempSmsCounter); $(\"#smsAdd\").show(); $(\"#smsOfficerAdd\").show(); $(\"#emailmanualdiv\").show(); $(\"#emailheader\").show(); $(\"#manualdivrow\").css('width', '50%');}" +
            "</script>" +

            "<div id='smsText" + sms + "List'>" +

            "<label for id='smsText" + sms + "NameLab' style='margin-left: 3% !important; margin-top:2% !important; display:inline; padding-right: 10px;'>Officer:</label>" +
            "<input type='text' name='emailText' id='smsText" + sms + "Officer' value='' data-mini='true' class='mobileform ui-input-text ui-body-c'>" +


            "<input id='smsText" + sms + "OfficerCode' type='hidden'  value='' />" +  
            "<input id='smsText" + sms + "Name' type='hidden'  value='' />" +
            "<input id='smsText" + sms + "Mobile' type='hidden'  value='' />" + 

           // "<div data-role='button' onClick='decrementsms()' data-delete='smsText" + sms + "List' data-shadow='true' data-iconshadow='true' data-wrapperels='span' data-theme='c' class='ui-btn ui-btn-up-c ui-shadow ui-btn-corner-all' style='margin-left: 3% !important; margin-bottom:2% !important; width:30% !important; margin-right: 2% !important;display:inline-block !important;'>Cancel</div></div>");
            "<img onClick='decrementsms()' id='smsTextDelete' data-delete='smsText" + sms + "List' src='images/delete-icon.png' style='padding-top:2px; margin-left:3%;'></div>");
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
                                if ($("#smsText" + sms + "Name").length > 0 && $("#smsText" + sms + "Mobile").length > 0 ) {
                                    $("#smsText" + sms + "NameLab").html($("#smsText" + sms + "Name").val());
                                    $("#smsText" + sms + "Officer").css("display", "none");
                                    $("#smsText" + sms + "Name").attr("name", "sms_name[]");
                                    $("#smsText" + sms + "Mobile").attr("name", "sms_mobile_no[]");
                                    $("#smsAdd").show();
                                    $("#smsOfficerAdd").show();
                                    $("#emailmanualdiv").show();
                                    $("#emailheader").show();
                                    $("#manualdivrow").css("width", "50%");
                                    sms++;

                                    smsCount = $("#smsCount").val();
                                    if (smsCount > 0) {
                                        $("#smsContainer").show();
                                        $("#smsContainer").trigger("expand");
                                        $("#sendbutton").css('visibility', 'visible');
                                    }
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