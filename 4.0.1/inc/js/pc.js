/* Desktop Javascript */

// Bindings

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

    $(".infoHover").click(function (e) {
        if ($("#" + $(this).attr("id") + "Text").val().length > 0 || $("#" + $(this).attr("id") + "URL").val().length > 0) {
            $('.hoverDiv').css({
                left: e.pageX - 315,
                top: e.pageY + 15
            });
            $("#helpText_data").val($("#" + $(this).attr("id") + "Text").val());
            $("#helpURL").html($("#" + $(this).attr("id") + "URL").val());
            $(".hoverDiv").fadeIn("fast");
        }
    });

    $("#infoHoverClose").click(function () {
        $(".hoverDiv").fadeOut("fast");
        $("#helpText_data").val("");
        $("#helpURL").html("");
    });

    $("li[data-open]").click(function () {
        $("li[data-open]").each(function () {
            $(this).removeClass("act");
            $("#" + $(this).data("open")).hide();
        });
        $(this).addClass("act");
        $("#" + $(this).data("open")).fadeIn("fast");
        $("#subPageTitle").html($(this).attr("data-title"));
    });

    $("#workflow").click(function () {
        Load();
        $.ajax({
            url: 'inc/ajax/ajax.getWorkflowSRF.php',
            type: 'get',
            data: {
                request_id: $("#workflow").data("requestid"),
                service_code: $("#workflow").data("service"),
                request_code: $("#workflow").data("request"),
                function_code: $("#workflow").data("function"),
                serviceName: $("#workflow").data("servicename"),
                requestName: $("#workflow").data("requestname"),
                functionName: $("#workflow").data("functionname"),
                requestDate: $("#workflow").data("requestdate")
            },
            dataType: 'html',
            success: function (data) {
                Unload();
                if (data == "None") {
                    alert("No workflow available.");
                }
                else {
                    $("#popup").html(data);
                }
            }
        });
    });

    
});

// jQuery expression for case-insensitive filter
$.extend($.expr[":"],
{
    "contains-ci": function (elem, i, match, array) {
        return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
});

// Open Popup
$(document).on("click", ".openPopup", function(){
	$('#popup').html($("#"+$(this).attr("id")+"Popup").html());	
	$('#popup').css({ 'opacity' : 1.0});
	  $("#popup").fadeIn("fast");
	popup();
});

// Edit Comment
$(document).on("click", ".editComment", function(){
    $("#editCommentText").val($(this).attr("data-comment"));
    $("#modify_action_id").val($(this).attr("data-action-id"));
    $("#modify_note_id").val($(this).attr("data-note-id"));
    $("#modify_note_class").val($(this).attr("data-note-class"));
});

$(document).on("click", ".deleteComment", function () {
    $("#delete_action_id").val($(this).attr("data-action-id"));
    $("#delete_note_id").val($(this).attr("data-note-id"));
    $("#delete_note_class").val($(this).attr("data-note-class"));
});

// Edit Attachment
$(document).on("click", ".editAttachment", function(){
    var currentAttachment = $(this).parent().prev().html();
    $("#currentAttachment").html(currentAttachment);
    var attachDesc = $(this).parent().prev().prev().children().last().html();
    $("#EditAttachDesc").val(attachDesc);

    var path = $(this).attr("data-path");
    var urlID = $(this).attr("data-urlid");
    var reqID = $(this).attr("data-reqid");
    var path = $(this).attr("data-path");
    var date = $(this).attr("data-date");
    var subtype = $(this).attr("data-subtype");


    $("#epath").val($(this).attr("data-path"));
    $("#edate").val($(this).attr("data-date"));
    $("#esubtype").val($(this).attr("data-subtype"));
});

// Open Attachment
$(document).on("click", ".ViewFile", function () {
    Load();
    var path = $(this).attr("id");
    $.ajax({
        url:'inc/ajax/ajax.getAttachment.php',
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

function Load() {
    $('body').fadeTo("fast", 0.7);
    $('#loadingbar').fadeIn("fast");
}

function Unload() {
    $('body').fadeTo("fast", 1);
    $('#loadingbar').fadeOut("fast");
}

function display_fld(fld){
	document.getElementById("attrib_flds"+fld).style.display = "block";
}

function capitalise(input){
	string = document.getElementById(input).value;
	document.getElementById(input).value = string.charAt(0).toUpperCase() + string.slice(1);
}

function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

function isNumber(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}