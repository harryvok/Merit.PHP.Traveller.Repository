

var eventName;
if ('ontouchstart' in document) {
    eventName = 'touchstart';
} else {
    eventName = 'click';
}

$(document).ready(function () {
    $.datepicker.setDefaults({
        dateFormat: 'yy-mm-dd',
        constrainInput: true
    });

    // Init adhoc selection 

    
    
    //this thing controls wildcard searching
    /*
    $.ui.autocomplete.filter = function (array, term) {
        var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(term), "i");
        return $.grep(array, function (value) {
            return matcher.test(value.label || value.value || value);
        });
    };
    */

    generateDateTime();

    $("input[type=text]").prop("autocomplete", "off");

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
        }
    }
    
    
    $("input[data-officer]").autoCompleteInit("inc/ajax/ajax.officerList.php", { term: "" }, officerResponse);

    $("body").on("click", "input[data-officer]", function () {
        if ($(this).hasClass("ui-autocomplete-input")) {
            $("#" + $(this).attr("id") + "Code").val("");
            $(this).val("");
            $(this).attr("readonly", false);

            $("input[data-officer]").autoCompleteInit("inc/ajax/ajax.officerList.php", { term: "" }, officerResponse);
            $(this).autocomplete("search", "");

        }
        else {
            $("input[data-officer]").autoCompleteInit("inc/ajax/ajax.officerList.php", { term: "" }, officerResponse);
        }
    });
   
    /* $("body").on("click", "input[data-officer]", function () {
     
        if ($(this).hasClass("ui-autocomplete-input")) {
            $("#" + $(this).attr("id") + "Code").val("");
            $(this).val("");
            $(this).attr("readonly", false);
            $(this).autocomplete("search", "");
            
        }
        else{
            $("input[data-officer]").autoCompleteInit("inc/ajax/ajax.officerList.php", { term: "" }, officerResponse);
        }
    }); */

    $("body").on("click", "input[data-adhocofficer]", function () {

            
        
        if ($(this).hasClass("ui-autocomplete-input")) {
            $("#" + $(this).attr("id") + "Code").val("");
            $(this).val("");
            $(this).attr("readonly", false);

            
            $(this).autocomplete("search", "");

        }
        else {
            $("input[data-adhocofficer]").autoCompleteInit("inc/ajax/ajax.adhocOfficerList.php", { term: "" }, officerResponse);
        }
    });

    var windowOpen = "";

    $("body").on("click", "tr[data-link]", function () {
        window.location = $(this).attr("data-link");
    });

    $("body").on("click", "tr[data-new-window]", function () {
        if (windowOpen != "" && !windowOpen.closed) { windowOpen.location.href = $(this).attr("data-new-window"); windowOpen.focus(); }
        else windowOpen = window.open($(this).attr("data-new-window"));
    });

    // Edit Text
    $(".edit").on(eventName, function () {
        var self = this;
        var id = $(this).attr("id");

        $("#" + id + "Label").slideUp("fast");
        $("#" + id + "Edit").slideDown("fast");

        $("#" + id + "Close").on(eventName, function () {
            $("input:focus").blur().delay(350);
            $("#" + id + "Edit").slideUp();
            $("#" + id + "Label").slideDown("fast");
            $("#" + id + "TextVal").val($("#" + id + "Label").html());
        });
        $("#" + id + "Submit").on(eventName, function () {
            var action = $(this).attr("data-action");
            var dataExtra = $("#" + id + "TextVal").data();
            delete dataExtra.mobileTextinput;
            $("input:focus").blur().delay(350);
            $("#" + id + "Edit").slideUp("fast");
            var OldText = $("#" + id + "Label").html();
            $("#" + id + "Label").html($("#" + id + "TextVal").val());
            $("#" + id + "Label").slideDown("fast");

            $.ajax({
                url: 'inc/ajax/ajax.modify' + action + '.php',
                type: 'post',
                dataType: "json",
                data: { id: id, commentText: $("#" + id + "TextVal").val(), extra: dataExtra },
                success: function (data) {
                    if (data.status == false) {
                        alert("Error modifying. Please contact Merit or try again later.");
                        $("#" + id + "Label").html(OldText);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("Error modifying. Please contact Merit or try again later.");
                    $("#" + id + "Label").html(OldText);
                }
            });
            
        });
    });

    // Delete Text
    $(".delete").on(eventName, function () {
        var self = this;
        var id = $(this).attr("id");
        if (confirm("Are you sure you want to delete this item?")) {
            $("#" + id + "Object").slideUp("fast");
            var Editbox = id.replace("Parent", "");
            $("#" + Editbox + "Edit").slideUp("fast");
            var action = $(this).attr("data-action");
            var dataExtra = $(this).data();
            delete dataExtra.buttonElements;
            delete dataExtra.role;
            $.ajax({
                url: 'inc/ajax/ajax.modify' + action + '.php',
                type: 'post',
                dataType: "json",
                data: { id: id, commentText: '', extra: dataExtra },
                success: function (data) {
                    if (data.status == false) {
                        alert("Error deleting. Please contact Merit or try again later.");
                        $("#" + id + "Object").slideDown("fast");
                    } else {
                        //location.reload();
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("Http Error deleting. Please contact Merit or try again later." + jqXHR.responseText);
            
                    $("#" + id + "Object").slideDown("fast");
                }
            });
        }
    });
    $(".Unlink").on(eventName, function () {

        var docID = $(this).attr("data-docid");
        unlinkDocument(docID);
    });

    $(".Metadata").on(eventName, function () {
        var rownum = $(this).attr("data-rownum");
        $("#Document" + rownum + "MetaData").toggle();
    });
    $(".closeEdit").on(eventName, function () {
        var id = $(this).attr("id");
        $("#" + id + "Edit").toggle();
    });
    $(".toggleLinkDocForm").on(eventName, function () {
        var id = $(this).attr("id");
        $("#linkdocument").slideToggle();
    });
    
    $(".documentSearchButton").on(eventName, function () {
        if ($("#searchterm").val() != "") {
            searchDocument();
        }
    });
    
    $(".deleteAttachment").on(eventName, function () {

        var self = this;
        var id = $(this).attr("id");
        if (confirm("Are you sure you want to delete this attachment?")) {
            $("#" + id + "Object").slideUp("fast");
            var path = $(this).attr("data-path");
            var urlID = $(this).attr("data-urlid");
            var reqID = $(this).attr("data-reqid");
            var path = $(this).attr("data-path");
            var date = $(this).attr("data-date");
            var subtype = $(this).attr("data-subtype");
            var dataExtra = $(this).data();
            delete dataExtra.buttonElements;
            delete dataExtra.role;
            $.ajax({
                url: 'inc/ajax/ajax.deleteAttachment.php',
                type: 'post',
                dataType: "json",
                data: { subtype: subtype, date:date,path:path,urlID: urlID, reqID: reqID, id: id, commentText: '', extra: dataExtra, path: path },
                success: function (data) {
                    if (data.status != true) {
                        alert(data.status);
                        $("#" + id + "Object").slideDown("fast");
                      
                    } else {
                        location.reload();
                        //$(self).parent().parent().hide();
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("Error processing delete function. Please contact Merit or try again later.");
                    $("#" + id + "Object").slideDown("fast");
                   
                }
            });
        }
       
    });


});




function popup() {
    $(".dateField").each(function (index, element) {
        if ($(this).val() == "") {
            $(this).val("dd/mm/yyyy");
        }
    });
    $(".timeField").each(function (index, element) {
        if ($(this).val() == "") {
            $(this).val("--:-- --");
        }
    });
}

function ClearHelpNotes() {
    $(".hoverDiv").fadeOut("fast");
    $("#service_help").fadeOut("fast");
    $("#service_helpText").val("");
    $("#service_helpURL").val("");
    $("#request_help").fadeOut("fast");
    $("#request_helpText").val("");
    $("#request_helpURL").val("");
    $("#function_help").fadeOut("fast");
    $("#function_helpText").val("");
    $("#function_helpURL").val("");
}

function generateDateTime() {

    $(document).ajaxComplete(function (event, request, settings) {
        popup();
    });

    jQuery.validator.addClassRules({
        dateField: { dateField: true },
        timeField: { timeField: true }
    });

    $("body").on("focus", '.dateField', function () {
        if (!$(this).hasClass("hasDatepicker")) {
            $(this).datepicker({ defaultDate: $(this).val() });
            $(this).datepicker("option", "dateFormat", "dd/mm/yy");

        }
        $(this).datepicker("show");
    });
    $("body").on("focus", '.timeField', function () {
        if (!$(this).hasClass("hasDatepicker")) {
            //$(this).timepicker({ defaultValue: $(this).val() });
            $(this).timepicker({ timeFormat: 'hh:mm TT', controlType: 'select' });
        }
        $(this).timepicker("show");

    });

    $("body").on("submit", "form", function () {
        $(".dateField").each(function (index, element) {
            if ($(element).val() == "dd/mm/yyyy") {
                $(element).val("");
            }
        });
        $(".timeField").each(function (index, element) {
            if ($(element).val() == "--:-- --") {
                $(element).val("");
            }
        });
    });

    $("body").on("click", "input[data-ajax='true']", function () {
        $(".dateField").each(function (index, element) {
            if ($(element).val() == "dd/mm/yyyy") {
                $(element).val("");
            }
        });
        $(".timeField").each(function (index, element) {
            if ($(element).val() == "--:-- --") {
                $(element).val("");
            }
        });
    });
}

var supports = (function () {
    var div = document.createElement('div'),
       vendors = 'Khtml Ms O Moz Webkit'.split(' '),
       len = vendors.length;

    return function (prop) {
        if (prop in div.style) return true;

        prop = prop.replace(/^[a-z]/, function (val) {
            return val.toUpperCase();
        });

        while (len--) {
            if (vendors[len] + prop in div.style) {
                // browser supports box-shadow. Do what you need.  
                // Or use a bang (!) to test if the browser doesn't.  
                return true;
            }
        }
        return false;
    };
})();

// GLOBAL Javascript
// To do with pop ups, loading bars and preloading
function VarOperator(op) { //you object containing your operator
    this.operation = op;

    this.evaluate = function evaluate(param1, param2) {
        switch (this.operation) {
            case "=":
                return param1 == param2 ? true : false;
            case "<>":
                return param1 != param2 ? true : false;
            case "<":
                return param1 < param2 ? true : false;
            case ">":
                return param1 > param2 ? true : false;
            case "<=":
                return param1 <= param2 ? true : false;
            case ">=":
                return param1 >= param2 ? true : false;
        }
    }
}

var vo = Array();

$(document).on("click", ".closePopup", function () {
    $('#popup').html("");
    $('#popup').fadeOut("fast");
});

/* Plugins */

(function ($) {
    $.fn.textInputState = function (val) {
        if (typeof $(this).textinput == 'function') {
            $(this).textinput(val);
        }
    };

    $.fn.selectmenuState = function (val) {
        if (typeof $(this).selectmenu == 'function') {
            $(this).selectmenu(val);
        }
    };

    $.fn.triggerState = function (val) {
        if (typeof $(this).trigger == 'function') {
            $(this).trigger(val);
        }
    };

    $.fn.popupState = function (val) {
        if (typeof $(this).popup == 'function') {
            $(this).popup(val);
        }
    };

    $.fn.pageState = function (val) {
        if (typeof $(this).page == 'function') {
            $(this).page(val);
        }
    };

    $.fn.buttonState = function (val) {
        if (typeof $(this).button == 'function' && $(this).hasClass("ui-button")) {
            $(this).button(val);
        }
    };

    $.fn.autoCompleteInit = function (ajax, dataPass, response) {
        var self = this;
        $(this).addClass("ui-autocomplete-loading");
        //$(this).blur(function () {
        //    $(this).autocomplete("close");
        //});
        $.ajax({
            url: ajax,
            dataType: "json",
            data: dataPass,
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            },
            success: function (data) {
                $(self).removeClass("ui-autocomplete-loading");
                $(self).autocomplete({
                    source: data,
                    autoFocus: true,
                    delay: 0,
                    minLength: 0,
                    select: response,
                    response: response,
                    //added by harry
                    create: function (event, ui) {

                        //if this is the serviceInput
                        //autopopulate if there is one service
                        if ($(self).attr('id') == "serviceInput") {
                            $.ajax({
                                url: ajax,
                                dataType: "json",
                                data: dataPass,
                                success: function (data) {
                                    if (data.length == 1)
                                        //$("#serviceInput").click();
                                        $("#serviceInput").val("").attr("readonly", false).autocomplete("search", "");
                                }
                            });
                        }
                    }
                    //end addition by harry
                });
            }
        });
    };



    window.clicked = new Array();
    window.current = new Array();

    $.fn.autoCompleteInitSeq = function (init, ajax, dataPass, response, success, autoOpen) {
        var self = this;
        success = (typeof success === "undefined") ? function (test) { return true; } : success;
        autoOpen = (typeof autoOpen === "undefined") ? true : autoOpen;
        clicked[$(self).attr("id")] = false;
        current[$(self).attr("id")] = null;

        //$(self).blur(function () {
        //    $(self).autocomplete("close");
        //});

        $(self).click(function () {
            var prevVal = init();
            if ((current[$(self).attr("id")] == prevVal && $(self).attr('id') != "lsuburb" && $(self).attr('id') != "i_csuburb")) {
                $(self).autocomplete("search", $(self).val());
            }
            else {
                current[$(self).attr("id")] = prevVal;
                if (!clicked[$(self).attr("id")]) {
                    $(self).addClass("ui-autocomplete-loading");
                    if ($(self).hasClass("ui-autocomplete")) { $(self).autocomplete("destroy"); }
                    $.ajax({
                        url: ajax,
                        dataType: "json",
                        data: dataPass,
                        success: function (data) {
                            clicked[$(self).attr("id")] = true;
                            $(self).removeClass("ui-autocomplete-loading");
                            if (success(data)) {
                                $(self).autocomplete({
                                    source: data,
                                    autoFocus: true,
                                    delay: 0,
                                    minLength: 0,
                                    select: response,
                                    response: response
                                });
                                if (autoOpen == true) $(self).autocomplete("search", $(self).val());
                                $(self).trigger("focus");

                                if ($(self).attr('id') == "functionInput") {
                                    if (data.length == 1) {
                                        if ($("#textareaissue").length) {
                                            $("#textareaissue").focus();
                                        } else {
                                            $("#add-request-textarea").focus();
                                        }
                                    } else {
                                        $(self).focus();
                                    }
                                }
                            }
                        }
                    });
                }
            }
        });
    };

    $.fn.autoCompleteAjax = function (ajax, dataPass, response) {
        var self = this;
        $(self).focus(function () {

            $(self).addClass("ui-autocomplete-loading");
            $.ajax({
                url: ajax,
                dataType: "json",
                data: dataPass,
                success: function (data) {
                    $(self).removeClass("ui-autocomplete-loading");

                    $(self).autocomplete({
                        source: data,
                        autoFocus: true,
                        delay: 0,
                        minLength: 0,
                        select: response,
                        response: response
                    });

                    $(self).autocomplete("search", $(self).val());
                }
            });

        });

        //$(self).blur(function () {
        //    $(self).autocomplete("close");
        //});
    };

    $.fn.facClick = function () {
        if ($("#facilityInput").val().length > 0) {
            if (clearFacility()) {
                $(this).click();
            }
            else {
                $(this).blur();
                return;
            }
        }
    };

})(jQuery);