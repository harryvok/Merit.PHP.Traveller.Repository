$(document).ready(function(){
	var codeArray = Array();
	$("#new_officer_text").autocomplete({

		source: function(request, response) {
			$.ajax({
				url: "inc/ajax/ajax.officerList.php",
				dataType: "json",
				data: {
					term: request.term,
				},
				success: function(data) {
					response(data);
					codeArray = data;
				},
			});
		},
		select: function(event, ui) {
			$(this).blur();
			$("#new_officer_code").val(ui.item.index);	
			$("#new_officer_text").attr("readonly", true);
		},
		delay: 0, 
		minLength:0, 
	});

	$("#new_officer_text").focus(function(){
		$("#new_officer_code").val("");
		$("#new_officer_text").val("");
		$("#new_officer_text").attr("readonly", false);
		$("#new_officer_text").autocomplete("search", "");
	});
	
	$("#adhocOfficer").validate();
	
	$("#adhocOfficer").submit(function(){
		if($(this).validate().numberOfInvalids() == 0){ $("#submit").attr("disabled", true); }
	});
	
});