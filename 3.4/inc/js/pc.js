/* Desktop Javascript */

// Base

function Load() {
    $('body').fadeTo("fast", 0.7);
    $('#loadingbar').fadeIn("fast");
}

function Unload() {
    $('body').fadeTo("fast", 1);
    $('#loadingbar').fadeOut("fast");
}

$(document).ready(function () {
    // Write on keyup event of keyword input element
    $(document).on("keyup", ".tableSearch", function () {
        // When value of the input is not blank
        if ($(this).val() != "") {
            // Show only matching TR, hide rest of them
            $("#" + $(this).attr("id") + "Table tbody>tr").hide();
            $("#" + $(this).attr("id") + "Table td:contains-ci('" + $(this).val() + "')").parent("tr").show();
        }
        else {
            // When there is no input or clean again, show everything back
            $("#" + $(this).attr("id") + "Table tbody>tr").show();
        }
    });
});

// jQuery expression for case-insensitive filter
$.extend($.expr[":"],
{
    "contains-ci": function (elem, i, match, array) {
        return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
});


// Bindings

$(document).on("click", "span.openPopup", function(){
	$('#popup').html($("#"+$(this).attr("id")+"Popup").html());	
	$('#popup').css({ 'opacity' : 1.0});
	$('#popup').fadeIn("fast");
	popup();
});

$(document).on("click", ".ViewFile", function () {
    Load();
    var path = $(this).attr("id");
    $.ajax({
        url: 'inc/ajax/ajax.getAttachment.php',
        type: 'post',
        data: { path: path },
        success: function (data) {
            Unload();
            window.open(data, '_blank');
            window.focus();
        }
    });
});

// Functions

function display_fld(fld){
	document.getElementById("attrib_flds"+fld).style.display = "block";
}

function capitalise(input){
	string = document.getElementById(input).value;
	document.getElementById(input).value = string.charAt(0).toUpperCase() + string.slice(1);
}

function QueryUDFs(func,req,ser){
	$.post("inc/ajax/ajax.getSrfUDFs.php",{ function_code: func, service_code: ser, request_code: req },
	function(data){
		$("#global-udfs").html(data);
	}, "html");
}