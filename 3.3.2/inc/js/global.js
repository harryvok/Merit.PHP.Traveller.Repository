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
        $("body").on("click", '.dateField', function () {
            $(this).blur();
            if (!$(this).hasClass("hasDatepicker")) {
                if ($(this).val() == "dd/mm/yyyy") {
                    $(this).val("");
                }
                $(this).datepicker({ defaultDate: $(this).val() });
                $(this).datepicker("option", "dateFormat", "dd/mm/yy");
                
            }
            $(this).datepicker("show");
        });
        $("body").on("click", '.timeField', function () {
            $(this).blur();
            if (!$(this).hasClass("hasDatepicker")) {
                if ($(this).val() == "--:-- --") {
                    $(this).val("");
                }
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



var imageArray = new Array();
imageArray[0] = "images/new/button-actions-hover.png";
imageArray[1] = "images/new/button-requests-hover.png";
imageArray[2] = "images/new/button-new-request-hover.png";
imageArray[3] = "images/new/button-search-hover.png";
imageArray[4] = "images/new/button-logout-hover.png";
imageArray[5] = "images/search.png";
imageArray[6] = "images/tb_new.gif";
imageArray[7] = "images/tb_reqintray.gif";
imageArray[8] = "images/exit.png";

for (var i = 0; i < imageArray.length; i++) {
    Image1 = new Image();
    Image1.src = imageArray[i];
}

function changeLocationType() {
    if (document.getElementById('same').value == "s") {
        document.getElementById('inside_ca').style.display = "block";
        document.getElementById('outside_ca').style.display = "none";
        document.getElementById('i_cno').value = document.getElementById('lno').value;
        document.getElementById('i_cfno').value = document.getElementById('lfno').value;
        document.getElementById('i_cstreet').value = document.getElementById('lstreet').value;
        document.getElementById('i_ctype').value = document.getElementById('ltype').value;
        document.getElementById('i_csuburb').value = document.getElementById('lsuburb').value;
        document.getElementById('i_cdesc').value = document.getElementById('ldesc').value;
    }
    else if (document.getElementById('same').value == "i") {
        document.getElementById('o_cno').value = "";
        document.getElementById('o_cfno').value = "";
        document.getElementById('o_cstreet').value = "";
        document.getElementById('o_ctype').value = "";
        document.getElementById('o_csuburb').value = "";
        document.getElementById('o_cdesc').value = "";
        document.getElementById('inside_ca').style.display = "block";
        document.getElementById('outside_ca').style.display = "none";
    }
    else if (document.getElementById('same').value == "o") {
        document.getElementById('inside_ca').style.display = "none";
        document.getElementById('outside_ca').style.display = "block";
    }

    if (document.getElementById('same').value == "i") {
        document.getElementById('i_cno').value = '';
        document.getElementById('i_cfno').value = '';
        document.getElementById('i_cstreet').value = '';
        document.getElementById('i_ctype').value = '';
        document.getElementById('i_csuburb').value = '';
        document.getElementById('i_cdesc').value = '';
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