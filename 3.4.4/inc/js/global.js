
var eventName;
if ('ontouchstart' in document) {
    eventName = 'touchstart';
} else {
    eventName = 'click';
}

$(document).ready(function () {
    $.datepicker.setDefaults({
        dateFormat: 'yy-mm-dd',
        constrainInput: true,
    });

    generateDateTime();
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
        switch(this.operation) {
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

$(document).on("click", ".closePopup", function(){
	$('#popup').html("");	
	$('#popup').fadeOut("fast");
});



var imageArray = new Array();
imageArray[0] = "images/pc/button-actions-hover.png";
imageArray[1] = "images/pc/button-requests-hover.png";
imageArray[2] = "images/pc/button-new-request-hover.png";
imageArray[3] = "images/pc/button-search-hover.png";
imageArray[4] = "images/pc/button-logout-hover.png";

for(var i=0;i<imageArray.length;i++){
	Image1 = new Image();
	Image1.src = imageArray[i];
}



function ValidURL(str) {
    var pattern = new RegExp('^(https?:\/\/)?' + // protocol
      '((([a-z\d]([a-z\d-]*[a-z\d])*)\.)+[a-z]{2,}|' + // domain name
      '((\d{1,3}\.){3}\d{1,3}))' + // OR ip (v4) address
      '(\:\d+)?(\/[-a-z\d%_.~+]*)*' + // port and path
      '(\?[;&a-z\d%_.~+=-]*)?' + // query string
      '(\#[-a-z\d_]*)?$', 'i'); // fragment locater
    if (!pattern.test(str)) {
        alert("Please enter a valid URL.");
        return false;
    } else {
        return true;
    }
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
        if (typeof $(this).button == 'function') {
            $(this).button(val);
        }
    };

    $.fn.autoCompleteInit = function (ajax, dataPass, response) {
        var self = this;
        $(this).addClass("ui-autocomplete-loading");
        $(this).blur(function () {
            $(this).autocomplete("close");
        });
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
            }
        });
    };

    

    window.clicked = new Array();
    window.current = new Array();

    $.fn.autoCompleteInitSeq = function (init, ajax, dataPass, response, success) {
        var self = this;
        success = (typeof success === "undefined") ? function (test) { return true; } : success;
        clicked[$(self).attr("id")] = false;
        current[$(self).attr("id")] = null;

        $(self).blur(function () {
            $(self).autocomplete("close");
        });

        $(self).click(function(){
            var prevVal = init();
            if (current[$(self).attr("id")] == prevVal) {
                $(self).autocomplete("search", "");
            }
            else {
                current[$(self).attr("id")] = prevVal;
                if (!clicked[$(self).attr("id")]) {
                    $(self).addClass("ui-autocomplete-loading");
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
                                $(self).autocomplete("search", "");
                                $(self).trigger("focus");
                                
                            }
                        }
                    });
                }
            }
        });
    };

    $.fn.autoCompleteAjax = function (ajax, dataPass, response) {
        var self = this;
        $(self).click(function () {
            $(self).addClass("ui-autocomplete-loading");

        });
        $(self).blur(function () {
            $(self).autocomplete("close");
        });

        $(self).autocomplete({
            source: function (request, resp) {
                $.ajax({
                    url: ajax,
                    dataType: "json",
                    data: { term: request.term, id: $(self).attr("id") },
                    success: function (data) {
                        $(self).removeClass("ui-autocomplete-loading");
                        resp(data);
                    }
                });
            },
            autoFocus: true,
            delay: 0,
            minLength: 0,
            select: response,
            response: response
        });


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