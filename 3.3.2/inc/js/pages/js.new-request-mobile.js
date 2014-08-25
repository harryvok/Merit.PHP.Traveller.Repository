// New Request Common JS
$(document).ready(function(){

	// Service Typealong
    $("#serviceInput").click(function(){
		$("#service").val("");
		$("#serviceInput").val("");
		$("#request").val("");
		$("#requestInput").val("");
		
		$("#function").val("");
		$("#functionInput").val("");
		$("#keywordSearch").val("");
		$("#adhocOfficer").html("");
		$("#submitButton").show();
		$("#chkCount").val("0");

		$("#serviceInput").attr("readonly", false);
		ClearHelpNotes();
		$("#functionInput").removeClass("required");
		$("#functionRequired").hide();
		$("#priority").val("");
		$("#countOnly").val("0");
		$("#serviceInput").focus();
		$("#serviceInput").autocomplete("search", "");
	});
	
    $("#newrequest").validate({
        submitHandler: function (form) {
            $.ajax({
                url: "inc/ajax/ajax.chkIfWorkflow.php",
                dataType: "json",
                data: {
                    request_code: $("#request").val(), service_code: $("#service").val(), function_code: $("#function").val()
                },
                success: function (data) {
                    if (data.workflow_ind == "N" && $("#countOnly").val() == "0") {
                        alert("There is no workflow, please choose another request.");
                        $("#service").val("");
                        $("#serviceInput").val("");
                        $("#request").val("");
                        $("#requestInput").val("").attr("disabled", true);
                        $("#function").val("");
                        $("#functionInput").val("").attr("disabled", true);
                        $("#serviceInput").autocomplete("search", "");
                        $("#serviceInput").attr("readonly", false);
                        $("#keywordSearch").val("");
                        $("#adhocOfficer").html("");

                    }
                    else {
                        $.ajax({
                            url: 'inc/ajax/ajax.chooseAdhocOfficer.php',
                            type: 'post',
                            data: {
                                ser: $("#service").val(),
                                req: $("#request").val(),
                                func: $("#function").val()
                            },
                            success: function (data) {
                                $('#adhocOfficer').html(data).trigger("create");
                                $("#submitButton").hide();
                            }
                        });
                    }
                },
            });
        }
    });

	// My Details Button
	$('#myDetails').click(function(){
		Load();
		$.ajax({
			url: 'inc/ajax/ajax.getMyDetails.php',
			dataType: "json",
			success: function(data) {
				Unload();
				$("#surname").val(data.surname);
				$("#given").val(data.given_names);
				$("#pref_title").val("");
				$("#cust_mobile").val(data.mobile_no);
				$("#cust_phone").val(data.telephone);
				$("#cust_fax").val("");
				$("#email_address").val(data.mail_id);
				$("#company").val("");
				$("#cust_type").val("STAFF");
			}
		});
	});
	
	$("#clearDetails").click(function(){
		$("#surname").val("");
		$("#given").val("");
		$("#pref_title").val("");
		$("#cust_mobile").val("");
		$("#cust_work").val("");
		$("#cust_phone").val("");
		$("#cust_fax").val("");
		$("#email_address").val("");
		$("#company").val("");
		$("#cust_type").val("");
	});
	
	// Service Typealong
	$("#serviceInput").autocomplete({
		source: function(request, response) {
			$.ajax({
				url: "inc/ajax/ajax.getServiceTypes.php",
				dataType: "json",
				data: {
					term: request.term
				},
				success: function(data) {
					if(data.length > 1){
						response(data);
					}
					else if (data.length == 1) {
					    $("#serviceInput").removeClass("ui-autocomplete-loading");
						$("#service").val(data[0].code);
						$("#serviceInput").val(data[0].label);
						$("#request").val("");
						$("#requestInput").val("");
						$("#function").val("");
						$("#functionInput").val("");
						
						$("#requestInput").attr("disabled", false);
						$("#serviceInput").attr("readonly", true);
						$("#requestInput").attr("readonly", false);
						QueryUDFs('0','0',$("#service").val()); 
						GetHelpNotes('','',$("#service").val()); 
						$("#serviceInput").autocomplete("close");
						$("#requestInput").click();
					}
				}
			});
		},
		autoFocus: true,
		delay: 0, 
		minLength:0,
		select: function (event, ui) {
		    $(this).removeClass("ui-autocomplete-loading");
			$("#service").val(ui.item.code);
			$("#serviceInput").val(ui.item.label);
			$("#request").val("");
			$("#requestInput").val("");
			$("#function").val("");
			$("#functionInput").val("");
			
			
			$("#serviceInput").attr("readonly", true);
			$("#requestInput").attr("readonly", false);
			$("#requestInput").attr("disabled", false);
			QueryUDFs('0','0',$("#service").val()); 
			GetHelpNotes('','',$("#service").val()); 
			$("#requestInput").click();
		}
		
	});
	
	// Request Typealong Focus
	$("#requestInput").click(function(){
		$("#request").val("");
		$("#requestInput").val("");
		$("#function").val("");
		$("#functionInput").val("");
		$("#adhocOfficer").html("");
		$("#chkCount").val("0");
		$(".hoverDiv").fadeOut("fast");
		$("#request_help").fadeOut("fast");
		$("#request_helpText").val("");
		$("#request_helpURL").val("");
		$("#function_help").fadeOut("fast");
		$("#function_helpText").val("");
		$("#function_helpURL").val("");
		$("#functionInput").removeClass("required");
		$("#functionRequired").hide();
		$("#requestInput").attr("readonly", false);
		$("#priority").val("");
		$("#countOnly").val("0");
		$("#requestInput").focus();
		$("#requestInput").autocomplete("search", "");
	});
	
	// Request Typealong
	$("#requestInput").autocomplete({
		source: function(request, response) {
			$.ajax({
				url: "inc/ajax/ajax.getRequestTypes.php",
				dataType: "json",
				data: {
					term: request.term,
					service_code: $("#service").val()
				},
				success: function(data) {
					if(data.length > 1){
						response(data);
					}
					else if(data.length == 1){
					    $("#requestInput").removeClass("ui-autocomplete-loading");
						$("#request").val(data[0].code);
						$("#requestInput").val(data[0].label);
						$("#function").val("");
						$("#functionInput").val("");
						$("#requestInput").attr("readonly", true);
						$("#priority").val(data[0].priority);
						QueryUDFs('0',$("#request").val(),$("#service").val());
						GetHelpNotes('', $("#request").val(), $("#service").val());
						$("#requestInput").autocomplete("close");
						
						
						$("#functionInput").attr("disabled", false);
						$("#functionInput").attr("readonly", false);
						if (data[0].need_function == "Y") {
						    $("#functionInput").addClass("required");
						    $("#functionRequired").show();

						}
						else {
						    $("#functionRequired").hide();
						    $("#functionInput").removeClass("required");
						}
						$("#functionInput").click();

					}

				},
			});
		},
		autoFocus: true,
		delay: 0, 
		minLength:0,
		select: function(event, ui){ $(this).removeClass("ui-autocomplete-loading");
			$(this).blur();
			
			$("#request").val(ui.item.code);
			$("#requestInput").val(ui.item.label);
			$("#function").val("");
			$("#functionInput").val("");
			$("#requestInput").attr("readonly", true);
			
			QueryUDFs('0',$("#request").val(),$("#service").val());
			GetHelpNotes('',$("#request").val(),$("#service").val());
			
			$("#priority").val(ui.item.priority);
			$("#functionInput").attr("disabled", false);
			$("#functionInput").attr("readonly", false);
			if (ui.item.need_function == "Y") {
			    $("#functionInput").addClass("required");
			    $("#functionRequired").show();
			   
			}
			else {
			    $("#functionRequired").hide();
			    $("#functionInput").removeClass("required");
			}
			$("#functionInput").click();
			
		}
	});
	
	// Function Typealong Focus	
	$("#functionInput").click(function(){
		$("#function").val("");
		$("#functionInput").val("");
		$("#functioninput").attr("readonly", false);
		$("#adhocOfficer").html("");
		$(".hoverDiv").fadeOut("fast");
		$("#function_help").fadeOut("fast");
		$("#function_helpText").val("");
		$("#function_helpURL").val("");
		$("#priority").val("");
		$("#countOnly").val("0");
		$("#functionInput").focus();
		$("#functionInput").autocomplete("search", "");
		
	});
	
	// Function Typealong
	$("#functionInput").autocomplete({
		source: function(request, response) {
			$.ajax({
				url: "inc/ajax/ajax.getFunctionTypes.php",
				dataType: "json",
				data: {
					term: request.term,
					service_code: $("#service").val(),
					request_code: $("#request").val()
				},
				success: function (data) {
				    if (data.length === 0) {
				        if ($("#chkCount").val() === "0") {
				            $("#chkCount").val("1");
				            CheckCountOnly($("#service").val(), $("#request").val(), '');

				        }
				        $("#functionInput").removeClass("ui-autocomplete-loading");
				        $("#functionInput").attr("readonly", true);
				        $("#functionInput").attr("disabled", true);

				    }
				    else {
				        $("#functionInput").attr("disabled", false);
				        response(data);

				    }
					
				}
			});
		},
		autoFocus: true,
		delay: 0, 
		minLength:0,
		select: function(event, ui){
			$("#functionInput").removeClass("ui-autocomplete-loading");
			$("#function").val(ui.item.code);
			$("#functionInput").val(ui.item.label);
			$("#functionInput").attr("readonly", true);
			$("#priority").val(ui.item.priority);
			QueryUDFs($("#function").val(),$("#request").val(),$("#service").val());
			GetHelpNotes($("#function").val(),$("#request").val(),$("#service").val());
			CheckCountOnly($("#service").val(), $("#request").val(), $("#function").val());
			
		}
		
	});
	
	
	// Location Street Name Typealong
	$("#lstreet").autocomplete({
		source: function(request, response) {
			$.ajax({
				url: "inc/ajax/ajax.getStreets.php",
				dataType: "json",
				data: {
					term: request.term,
					id: "lstreet"
				},
				success: function(data) {
					if(data.length == 1){
						$("#lstreet").val(data[0]);
						$("#lstreet").attr("readonly", true).removeClass("ui-autocomplete-loading");
						$("#lstreet").autocomplete("close");
						$("#ltype").attr("disabled", false);
						$("#ltype").click();
					}
					else {
					    
						response(data);
					}
				}
			});
		},
		delay: 0, 
		minLength:0,
		select: function(event, ui){
			$("#lstreet").val(ui.item.label);
			$("#lstreet").attr("readonly", true).removeClass("ui-autocomplete-loading");
			$("#ltype").attr("disabled", false);
			$("#ltype").click();
		}
	});
	
	// Location Street Name Focus
	$("#lstreet").click(function(){
		if($("#facilityInput").val().length > 0){
			if(clearFacility()){
				$("#lstreet").click();
			}
			else{
				
				return;
			}
		}
		else{
			$(this).attr("readonly", false);
			$(this).val("");
			$("#ltype").val("");
			$("#ltype").attr("disabled", true);
			
			$("#lsuburb").val("");
			$("#lsuburb").attr("disabled", true);
			$("#lstreet").focus();
			$("#lstreet").autocomplete("search", "");
			
		}
	});
	
	// Location Street Type Typealong
	$("#ltype").autocomplete({
		source: function(request, response) {
			$.ajax({
				url: "inc/ajax/ajax.getStreetTypes.php",
				dataType: "json",
				data: {
					term: request.term,
					id: "ltype",
					street: $('#lstreet').val()
				},
				success: function(data) {
					if(data.length == 1){
						$("#ltype").val(data[0]);
						$("#ltype").removeClass("ui-autocomplete-loading");
						$("#ltype").attr("readonly", true);
						$("#ltype").autocomplete("close");
						$("#lsuburb").attr("disabled", false);
						$("#lsuburb").click();
					}
					else{
						response(data);
					}
				}
			});
		},
		autoFocus: true,
		delay: 0, 
		minLength:0, 
		select: function(event, ui){
			$("#ltype").val(ui.item.label);
			$("#ltype").removeClass("ui-autocomplete-loading");
			$("#ltype").attr("readonly", true);
			$("#lsuburb").attr("disabled", false);
			$("#lsuburb").click();
		}
	});
	
	// Location Street Type Focus
	$("#ltype").click(function(){
		
		
		
		if($("#facilityInput").val().length > 0){
			if(clearFacility()){
				$("#lstreet").click();
			}
			else{
				
				return;	
			}
		}
		else{
			$(this).attr("readonly", false);
				
			
			$("#ltype").val("");
			$("#lsuburb").val("");
			$("#ltype").focus();
			$("#ltype").autocomplete("search", "");	
			
		}
	});
	
	
	// Location Street Suburb Typealong
	$("#lsuburb").autocomplete({
		source: function(request, response) {
			$.ajax({
				url: "inc/ajax/ajax.getSuburbs.php",
				dataType: "json",
				data: {
					term: request.term,
					id: "lsuburb",
					house: function() { return $('#lfno').val(); },
					street: function() { return $('#lstreet').val(); },
					street_type: function() { return $('#ltype').val(); }
				},
				success: function(data) {
					if(data.length == 1){
						$("#lsuburb").val(data[0]);
						$("#lsuburb").attr("readonly", true);
						$("#lsuburb").autocomplete("close");
						$("#lsuburb").removeClass("ui-autocomplete-loading");
					}
					else{
						response(data);
					}
				}
			});
		},
		delay: 0, 
		minLength:0, 
		select: function(event, ui){
			$("#lsuburb").val(ui.item.label);
			$("#lsuburb").removeClass("ui-autocomplete-loading");
			$("#lsuburb").attr("readonly", true);
		}
	});
	
	// Location Street Suburb Focus
	$("#lsuburb").click(function(){
		
		if($("#facilityInput").val().length > 0){
			if(clearFacility()){
				$("#lstreet").click();
			}
			else{
				
				return;
			}
		}
		else{
			$(this).attr("readonly", false);
			$("#lsuburb").val("");
			$("#lsuburb").focus();
			$("#lsuburb").autocomplete("search", "");
			
		}
	});
	
	function clearFacility() {
	    if (confirm("This will clear your current chosen facility. Continue?")) {
	        $("#facilityTypeInput").val("");
	        $("#facilityInput").val("");
	        $("#facilityTypeId").val("");
	        $("#facilityId").val("");
	        $("#lno").val("");
	        $("#lfno").val("");
	        $("#ldesc").val("");
	        $("#facility").val("");
	        $("#lstreet").val("");
	        $("#ltype").val("");
	        $("#lsuburb").val("");

	        $("#facilityInput").attr("readonly", false);
	        $("#facilityInput").attr("disabled", false);
	        $("#lstreet").attr("readonly", false);
	        $("#ltype").attr("readonly", false);
	        $("#lsuburb").attr("readonly", false);
	        $("#lno").attr("readonly", false);
	        $("#lfno").attr("readonly", false);
	        $("#ldesc").attr("readonly", false);

	        $("#lsuburb").attr("disabled", true);
	        $("#lsuburb").addClass("ui-disabled");
	        $("#ltype").attr("disabled", true);
	        $("#ltype").addClass("ui-disabled");
	        return true;
	    }
	    return false;
	}
	
	// Location Street Number Focus
	$("#lno").click(function(){
		if($("#facilityInput").val().length > 0){
			if(clearFacility()){
				$("#lno").click();
			}
			else{
				
				return;
			}
		}
	});
	
	// Location Street Number Focus
	$("#lfno").click(function(){
		if($("#facilityInput").val().length > 0){
			if(clearFacility()){
				$("#lfno").click();
			}
			else{
				
				return;
			}
		}
	});
	
	// Location Street Number Focus
	$("#ldesc").click(function(){
		if($("#facilityInput").val().length > 0){
			if(clearFacility()){
				$("#ldesc").click();
			}
			else{
				
				return;
			}
		}
	});
	
	// Customer Street Name Typealong
	$("#i_cstreet").autocomplete({
		source: function(request, response) {
			$.ajax({
				url: "inc/ajax/ajax.getStreets.php",
				dataType: "json",
				data: {
					term: request.term,
					id: "i_cstreet"
				},
				success: function(data) {
					if(data.length == 1){
						$("#i_cstreet").val(data[0]);
						$("#i_cstreet").removeClass("ui-autocomplete-loading");
						$("#i_cstreet").attr("readonly", true);
						$("#i_ctype").attr("disabled", false);
						$("#i_ctype").click();
					}
					else{
						response(data);
					}
				}
			});
		},
		delay: 0, 
		minLength:0, 
		select: function(event, ui){
			$("#i_cstreet").val(ui.item.label);
			$("#i_cstreet").removeClass("ui-autocomplete-loading");
			$("#i_cstreet").attr("readonly", true);
			$("#i_ctype").attr("disabled", false);
			$("#i_ctype").click();
			
			
		}
	});
	
	// Customer Street Name Focus
	$("#i_cstreet").click(function(){
		$(this).attr("readonly", false);
		$(this).val("");
		$("#i_ctype").val("");
		$("#i_ctype").attr("disabled", true);
		
		$("#i_csuburb").val("");
		$("#i_csuburb").attr("disabled", true);
		$("#i_cstreet").focus();
		$("#i_cstreet").autocomplete("search", "");
	});
	
	// Customer Street Type Typealong
	$("#i_ctype").autocomplete({
		source: function(request, response) {
			$.ajax({
				url: "inc/ajax/ajax.getStreetTypes.php",
				dataType: "json",
				data: {
					term: request.term,
					id: "i_ctype",
					street: function() { return $('#i_cstreet').val(); }
				},
				success: function(data) {
					if(data.length == 1){
						$("#i_ctype").val(data[0]);
						$("#i_ctype").removeClass("ui-autocomplete-loading");
						$("#i_ctype").attr("readonly", true);
						$("#i_csuburb").attr("disabled", false);
						$("#i_csuburb").click();
					}
					else{
						response(data);
					}
				}
			});
		},
		delay: 0, 
		minLength:0, 
		select: function(event, ui){
			$("#i_ctype").val(ui.item.label);
			$("#i_ctype").removeClass("ui-autocomplete-loading");
			$("#i_ctype").attr("readonly", true);
			$("#i_csuburb").attr("disabled", false);
			$("#i_csuburb").click();
		}
	});
	
	// Customer Street Type Focus
	$("#i_ctype").click(function(){
		$(this).attr("readonly", false);
			
		
		$("#i_ctype").val("");
		$("#i_csuburb").val("");
		$("#i_csuburb").attr("disabled", true);
		$("#i_ctype").focus();
		$("#i_ctype").autocomplete("search", "");
	});
	
	// Customer Street Suburb Typealong
	$("#i_csuburb").autocomplete({
		source: function(request, response) {
			$.ajax({
				url: "inc/ajax/ajax.getSuburbs.php",
				dataType: "json",
				data: {
					term: request.term,
					id: "i_csuburb",
					house: function() { return $('#i_cfno').val() },
					street: function() { return $('#i_cstreet').val() },
					street_type: function() { return $('#i_ctype').val() }
				},
				success: function(data) {
					if(data.length == 1){
						$("#i_csuburb").val(data[0]);
						$("#i_csuburb").removeClass("ui-autocomplete-loading");
						$("#i_csuburb").attr("readonly", true);
					}
					else{
						response(data);
					}
				}
			});
		},
		delay: 0, 
		minLength:0, 
		select: function(event, ui){
			$("#i_csuburb").val(ui.item.label);
			$("#i_csuburb").removeClass("ui-autocomplete-loading");
			$("#i_csuburb").attr("readonly", true);
		}
	});
	
	// Customer Street Suburb Focus
	$("#i_csuburb").click(function(){
		$(this).attr("readonly", false);
		$("#i_csuburb").val("");
			
		$("#i_csuburb").focus();
		$("#i_csuburb").autocomplete("search", "");
	});
	
	// Customer Details Change
	$('.cadd').change(function(){
		$('#cust_address_id').val('0');
		$('#cust_address_ctr').val('0');
	});
	
	
	//Facility Typealong Focus
	$("#facilityInput").click(function () {
	    $("#facilityInput").autocomplete("search", "");
	    if ($(this).attr("readonly") == 'readonly') {
	        $(this).attr("readonly", false);
	        $(this).val("");
	        $("#facilityId").val("");
	        $("#addressId").val("");
	        $("#lstreet").val("");
	        $("#ltype").val("");
	        $("#lsuburb").val("");
	        $("#ldesc").val("");
	        $("#lno").val("");
	        $("#lfno").val("");

	        $("#lstreet").attr("readonly", false);
	        $("#ltype").attr("readonly", false);
	        $("#lsuburb").attr("readonly", false);
	        $("#ldesc").attr("readonly", false);
	        $("#lno").attr("readonly", false);
	        $("#lfno").attr("readonly", false);

	        $("#ltype").attr("disabled", true);
	        $("#ltype").addClass("ui-disabled");
	        $("#lsuburb").attr("disabled", true);
	        $("#lsuburb").addClass("ui-disabled");
	        $("#lstreet").addClass("required");
	        $("#ltype").addClass("required");
	        $("#lsuburb").addClass("required");
	        $("#lno").addClass("required");
	        $(this).click();
	    }

	});

	$("#facilityTypeInput").click(function () {

	    $("#facilityTypeInput").autocomplete("search", "");
	    if ($(this).attr("readonly") == 'readonly') {
	        $(this).attr("readonly", false);
	        $(this).val("");
	        $("#facilityTypeInput").val("");
	        $("#facilityTypeId").val("");
	        $("#facilityTypeInput").attr("readonly", false);
	        $("#facilityInput").attr("disabled", false);
	        $("#facilityInput").val("");
	        $("#facilityId").val("");
	        $("#addressId").val("");
	        $("#lstreet").val("");
	        $("#ltype").val("");
	        $("#lsuburb").val("");
	        $("#ldesc").val("");
	        $("#lno").val("");
	        $("#lfno").val("");

	        $("#lstreet").attr("readonly", false);
	        $("#ltype").attr("readonly", false);
	        $("#lsuburb").attr("readonly", false);
	        $("#ldesc").attr("readonly", false);
	        $("#lno").attr("readonly", false);
	        $("#lfno").attr("readonly", false);

	        $("#ltype").attr("disabled", true);
	        $("#ltype").addClass("ui-disabled");
	        $("#lsuburb").attr("disabled", true);
	        $("#lsuburb").addClass("ui-disabled");
	        $("#lstreet").addClass("required");
	        $("#ltype").addClass("required");
	        $("#lsuburb").addClass("required");
	        $("#lno").addClass("required");
	        $(this).click();
	    }
	});
	
    // Facility Type Typealong
	$("#facilityTypeInput").autocomplete({
	    source: function (request, response) {
	        $.ajax({
	            url: "inc/ajax/ajax.getFacilitiesTypeLookup.php",
	            dataType: "json",
	            data: {
	                term: request.term,
	            },
	            success: function (data) {
	                $("#facilityInput").removeClass("ui-autocomplete-loading");
	                response(data);
	            },
	        });
	    },
	    autoFocus: true,
	    delay: 0,
	    minLength: 0,
	    select: function (event, ui) {
	        $(this).blur();
	        $("#facilityTypeInput").attr("readonly", true);
	        $("#facilityTypeInput").val(ui.item.label);
	        $("#facilityTypeId").val(ui.item.index);

	        $("#facilityInput").attr("disabled", false);
	        $("#facilityInput").click();
	    }
	});

	// Facility Typealong
	$("#facilityInput").autocomplete({
		source: function(request, response) {
			$.ajax({
				url: "inc/ajax/ajax.getFacilitiesLookup.php",
				dataType: "json",
				data: {
				    facilitiesName: request.term,
				    facilitiesType: function () { return $("#facilityTypeInput").val(); }
				},
				success: function (data) {
				    $("#facilityInput").removeClass("ui-autocomplete-loading");
					response(data);
				},
			});
		},
		autoFocus: true,
		delay: 0, 
		minLength:0,
		select: function(event, ui){ 
			$("#facilityInput").attr("readonly", true);	
			$("#facilityId").val(ui.item.index);
			
			$("#lstreet").removeClass("required");
			$("#ltype").removeClass("required");
			$("#lsuburb").removeClass("required");
			$("#lno").removeClass("required");
			
			var addressId = ui.item.address;
			$("#addressId").val(addressId);
			if(addressId !== 0){
				Load();
				$.ajax({
					url: 'inc/ajax/ajax.getAddress.php',
					type: 'POST',
					dataType: "json",
					data: 'addressId=' + addressId,
					success: function(data) {
						Unload();
						$("#lstreet").val(data.street_name);
						$("#ltype").val(data.street_type);
						$("#lsuburb").val(data.locality);
						$("#ldesc").val(data.address_desc);
						
						if(data.house_number.length > 0){
							$("#lno").val(data.house_number);
						}
						else if(data.house_suffix.length > 0){
							$("#lno").val(data.house_suffix);
						}
						else{
							$("#lno").val(0);	
						}
						if(data.house_suffix.length > 0){
							$("#lfno").val(data.house_suffix);
						}
					else if(data.house_number.length > 0){
							$("#lfno").val(data.house_number);
						}
						else{
							$("#lfno").val(0);	
						}
	
						$("#lstreet").attr("readonly",true);
						$("#ltype").attr("readonly",true);
						$("#lsuburb").attr("readonly",true);
						$("#ldesc").attr("readonly",true);
						$("#lno").attr("readonly",true);
						$("#lfno").attr("readonly",true);
						
						$("#ltype").attr("disabled", true);
						$("#lsuburb").attr("disabled", true);
						
						$("#lstreet").removeClass("ui-autocomplete-loading");
						$("#ltype").removeClass("ui-autocomplete-loading");
						$("#lsuburb").removeClass("ui-autocomplete-loading");
						}
				});
			}
			else{
				$("#lstreet").val("");
				$("#ltype").val("");
				$("#lsuburb").val("");
				$("#ldesc").val("");
				$("#lno").val("");
				$("#lfno").val("");
				$("#lstreet").attr("readonly",false);
				$("#ltype").attr("readonly",false);
				$("#lsuburb").attr("readonly",false);
				$("#ldesc").attr("readonly",false);
				$("#lno").attr("readonly",false);
				$("#lfno").attr("readonly",false);
				
				$("#ltype").attr("disabled", true);
				$("#lsuburb").attr("disabled", true);
				
				$("#lstreet").removeClass("ui-autocomplete-loading");
				$("#ltype").removeClass("ui-autocomplete-loading");
				$("#lsuburb").removeClass("ui-autocomplete-loading");
			}
		}
	});
	
	// Keyword Typealong
	$("#keywordSearch").autocomplete({
		source: "inc/ajax/ajax.keywordList.php", 
		delay: 0, 
		minLength:0, 
		select: function(event, ui) {
			Load();
			$.ajax({
				url: 'inc/ajax/ajax.keywordSearch.php',
				type: 'post',
				data: { keyword: ui.item.value },
				success: function(data) {
					Unload();
					$("#keywordSearch").removeClass("ui-autocomplete-loading");
					$("#popup").html(data);
				}
			});	
		}, 
	});
	
	// Keyword Typealong Focus
	$("#keywordSearch").click(function(){
	    $("#keywordSearch").val("");
	    
		$("#keywordSearch").autocomplete("search", "");
		$("#infoHover").fadeOut("fast");
	});

	$(".ui-autocomplete").position({
	    my: "left bottom",
	    at: "left top",
	    of: $("body"),
	    collision: "flip flip"
	});
});