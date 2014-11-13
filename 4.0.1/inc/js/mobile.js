/* Mobile Javascript */
var iWebkit; if (!iWebkit) { iWebkit = window.onload = function () { function fullscreen() { var a = document.getElementsByTagName("a"); for (var i = 0; i < a.length; i++) { if (a[i].className.match("noeffect")) { } else { a[i].onclick = function () { window.location = this.getAttribute("href"); return false } } } } function hideURLbar() { window.scrollTo(0, 0.9) } iWebkit.init = function () { fullscreen(); hideURLbar() }; iWebkit.init() } }

// Bindings

$(document).on("click", "input[type=text], textarea", function () {
    $(".ui-header-fixed").fadeOut("fast");
});

$(document).on("blur", "input[type=text], textarea", function () {
    $(".ui-header-fixed").fadeIn("fast");
});


$(document).ready(function () {
    // Write on keyup event of keyword input element
    $(document).on("input paste", "#searchText", function () {

        // When value of the input is not blank
        var leng = $(".searchObject").length;
        if ($("#searchText").val() != "" && $("#searchText").val().length > 1) {
            // Show only matching TR, hide rest of them
            var i = leng; while (i--) {
                if ($("#searchObject" + i).html().toLowerCase().indexOf($("#searchText").val().toLowerCase()) > 0) {
                    $("#searchObject" + i).show();
                }
                else {
                    $("#searchObject" + i).hide();
                }
            }
        }
        else {
            var i = leng; while (i--) {
                $("#searchObject" + i).show();
            }
        }
    });


    $("#filterChange").on("change", function () {

        // When value of the input is not blank
        var leng = $(".searchObject").length;

        // Show only matching TR, hide rest of them
        if ($(this).val() != "") {
            var i = leng; while (i--) {
                if ($("#searchObject" + i).html().toLowerCase().indexOf($(this).val().toLowerCase()) > 0) {
                    $("#searchObject" + i).show();
                }
                else {
                    $("#searchObject" + i).hide();
                }
            }
        }
        else {
            var i = leng; while (i--) {
                $("#searchObject" + i).show();
            }
        }
    });

    $(document).on("click", ".infoHover", function () {
        if ($("#" + $(this).attr("id") + "Text").val().length > 0 || $("#" + $(this).attr("id") + "URL").val().length > 0) {
            $("#helpText_mobile").html($("#" + $(this).attr("id") + "Text").val());
            $("#helpURL_mobile").html($("#" + $(this).attr("id") + "URL").val());
            $("#popup").html($("#hoverDiv").html()).popup("open");
            $("#default").page("destroy");
            $("#default").page();
            $("#popup").css("top", "100px");

        }
    });

    $(document).on("click", "#infoHoverClose", function () {
        $("#popup").html($("#hoverDiv").html()).popup("close");
        $("#helpText_mobile").html("");
        $("#helpURL_mobile").html("");
    });

});

$(document).on("click", ".ViewFile", function () {
    
    Load();
    var path = $(this).attr("id");
    var request_id = $("#request_id").val();
    var action_id = $("#action_id").val();
    $.ajax({
        url:'inc/ajax/ajax.getAttachmentMobile.php',
        type: 'post',
        data: { path: path, req_id: request_id, act_id: action_id },
        success: function(data) {
            Unload();
            $("#popupContent").html(data);
            $("#popup").popup("open");
            $("#default").page('destroy');
            $("#default").page();
        }
    });
    return false;
});



$(document).on("pageinit", function () {
    $("#popup iframe")
		.attr("width", 0)
		.attr("height", 0);

    $("#popup").on({
        popupbeforeposition: function () {
            var size = scale(497, 298, 15, 1),
				w = size.width,
				h = size.height;

            $("#popup iframe")
				.attr("width", w)
				.attr("height", h);
            
        },
        popupafterclose: function () {
            $("#popup iframe")
				.attr("width", 0)
				.attr("height", 0);

        }
    });
});

// Functions

function Load() {
    $.mobile.loading("show");
}

function Unload() {
    $.mobile.loading("hide");
}

function display_fld(fld){
    document.getElementById("attrib_flds"+fld).style.display = "block";
    document.getElementById("button"+fld).style.display = "none";
}

function scale(width, height, padding, border) {
    var scrWidth = $(window).width() - 30,
		scrHeight = $(window).height() - 30,
		ifrPadding = 2 * padding,
		ifrBorder = 2 * border,
		ifrWidth = width + ifrPadding + ifrBorder,
		ifrHeight = height + ifrPadding + ifrBorder,
		h, w;

    if (ifrWidth < scrWidth && ifrHeight < scrHeight) {
        w = ifrWidth;
        h = ifrHeight;
    } else if ((ifrWidth / scrWidth) > (ifrHeight / scrHeight)) {
        w = scrWidth;
        h = (scrWidth / ifrWidth) * ifrHeight;
    } else {
        h = scrHeight;
        w = (scrHeight / ifrHeight) * ifrWidth;
    }

    return {
        'width': w - (ifrPadding + ifrBorder),
        'height': h - (ifrPadding + ifrBorder)
    };
};

function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

function isNumber(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}