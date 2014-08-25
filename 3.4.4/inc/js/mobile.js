/* Mobile Javascript */
var iWebkit; if (!iWebkit) { iWebkit = window.onload = function () { function fullscreen() { var a = document.getElementsByTagName("a"); for (var i = 0; i < a.length; i++) { if (a[i].className.match("noeffect")) { } else { a[i].onclick = function () { window.location = this.getAttribute("href"); return false } } } } function hideURLbar() { window.scrollTo(0, 0.9) } iWebkit.init = function () { fullscreen(); hideURLbar() }; iWebkit.init() } }

// Base

function Load() {
    $.mobile.loading("show");
}

function Unload() {
    $.mobile.loading("hide");
}

$(document).on("click", "input, textarea", function () {
    $(".ui-header-fixed").fadeOut("fast");
});

$(document).on("blur", "input, textarea", function () {
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

    
});


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

// Bindings

$(document).on("click", ".ViewFile", function(){
	Load();
	var path = $(this).attr("id");
	var request_id = $("#request_id").val();
	var action_id = $("#action_id").val();
	$.ajax({
		  url: 'inc/ajax/ajax.getAttachmentMobile.php',
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

function display_fld(fld){
	document.getElementById("attrib_flds"+fld).style.display = "block";
	document.getElementById("button"+fld).style.display = "none";
}
function addElement() {
	document.getElementById('theValue').value =1;
}

function QueryUDFs(func,req,ser){
	$.post("inc/ajax/ajax.getSrfUDFs.php",{ function_code: func, service_code: ser, request_code: req },
	function(data){
		$("#global-udfs").html(data).trigger( "create" );
	}, "html");
}

