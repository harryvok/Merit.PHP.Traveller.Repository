$(document).ready(function () {
    enableBeforeUnload();

    function enableBeforeUnload() {
        window.onbeforeunload = function (e) {
            return "You must select an Adhoc Officer.";
        };
    }
    function disableBeforeUnload() {
        window.onbeforeunload = null;
    }

    $("form").on("submit", function () {
        window.onbeforeunload = null;
    });

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
            $("#new_officer_code").val(index);
            $("#new_officer_text").val(label);
            $("#new_officer_text").attr("readonly", true);
            $("#new_officer_text").blur();
        }
    }

    $("#new_officer_text").autoCompleteInit("inc/ajax/ajax.AdhocOfficerList.php", { term: "" }, officerResponse);

	
	$("#new_officer_text").click(function(){
		$("#new_officer_code").val("");
		$("#new_officer_text").val("");
		$("#new_officer_text").attr("readonly", false);
		$("#new_officer_text").autocomplete("search","");
	});
	
	$("#adhocOfficer").validate();
	
	$("#adhocOfficer").submit(function(){
		if($(this).validate().numberOfInvalids() == 0){ $("#submit").attr("disabled", true); }
	});
	
});