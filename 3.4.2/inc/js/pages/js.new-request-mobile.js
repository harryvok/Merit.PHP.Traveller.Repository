// New Request Common JS
function generateGoogleMaps() {
    var geocoder;
    var map;
    var infowindow = new google.maps.InfoWindow();
    var marker;
    var initialLocation;
    var browserSupportFlag = new Boolean();
    var markersArray = [];

    function initialize() {
        geocoder = new google.maps.Geocoder();
        var myOptions = {
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

        marker = new google.maps.Marker({
            position: map.getCenter(),
            map: map,
        });


        // Try W3C Geolocation (Preferred)
        if (navigator.geolocation) {
            browserSupportFlag = true;
            navigator.geolocation.getCurrentPosition(function (position) {

                //place marker on map with coordinates of device
                placeMarker(map, position.coords.latitude, position.coords.longitude)

            }, function () {
                handleNoGeolocation(browserSupportFlag);
            });
        }
            // Browser doesn't support Geolocation
        else {
            browserSupportFlag = false;
            handleNoGeolocation(browserSupportFlag);
        }

        //add click listener to change position of map
        google.maps.event.addListener(map, 'click', function (event) {
            deleteOverlays();
            placeMarker(map, event.latLng.lat(), event.latLng.lng());
        });


    }

    function placeMarker(map, lat, long) {


        var initialLocation = new google.maps.LatLng(lat, long);
        map.setCenter(initialLocation);

        var latlng = initialLocation;
        geocoder.geocode({ 'latLng': latlng }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    marker = new google.maps.Marker({
                        position: latlng,
                        map: map
                    });

                    infowindow.setContent(results[0].formatted_address);
                    infowindow.open(map, marker);

                    for (var i = 0; i <= results[0].address_components.length - 1; i++) {

                        if (results[0].address_components[i].types[0] == "street_number") {
                            $("#gmaps_Number").val(results[0].address_components[i].short_name);
                            $("#gmaps_FNumber").val(results[0].address_components[i].long_name);
                        }
                        if (results[0].address_components[i].types[0] == "route") {

                            var streetDetails = results[0].address_components[i].long_name.split(" ");
                            $("#gmaps_StreetName").val(results[0].address_components[i].short_name);
                            $("#gmaps_StreetType").val(streetDetails[streetDetails.length - 1].toUpperCase());
                        }
                        if (results[0].address_components[i].types[0] == "postal_code") {
                            $("#gmaps_PostCode").val(results[0].address_components[i].long_name);
                        }
                        if (results[0].address_components[i].types[0] == "locality") {
                            $("#gmaps_Suburb").val(results[0].address_components[i].long_name);
                        }

                    }
                    $("#gmaps_x").val(lat);
                    $("#gmaps_y").val(long);
                    markersArray.push(marker);


                } else {
                    alert('No results found');
                }
            } else {
                alert('Geocoder failed due to: ' + status);
            }
        });

    }

    $("#gmaps_Number").val("");
    $("#gmaps_FNumber").val("");

    //this gets called each time user selects a different location
    function deleteOverlays() {
        if (markersArray) {
            for (i in markersArray) {
                markersArray[i].setMap(null);
            }
            markersArray.length = 0;
        }
    }

    function handleNoGeolocation(errorFlag) {
        if (errorFlag == true) {
            alert("Geolocation service failed.");
            initialLocation = newyork;
        } else {
            //alert("Your browser doesn't support geolocation. We've placed you in Siberia.");-34.397, 150.644
            initialLocation = google.maps.LatLng(-34.397, 150.644);
        }
        map.setCenter(initialLocation);
    }


    google.maps.event.addDomListener(window, 'load', initialize);

}

$(document).ready(function(){

    generateGoogleMaps();

	$( "#newrequest" ).validate({
	    submitHandler: function (form) {
	        $.ajax({
	            url: "inc/ajax/ajax.chkIfWorkflow.php",
	            dataType: "json",
	            data: {
	                request_code: $("#request").val(), service_code: $("#service").val(), function_code: $("#function").val()
	            },
	            success: function (data) {
	                if (data.workflow_ind == "N") {
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

	$("#gmaps_Use").click(function(){
		$("#lno").val($("#gmaps_Number").val());
		$("#lfno").val($("#gmaps_FNumber").val());
		$("#lstreet").val($("#gmaps_StreetName").val());
		$("#ltype").val($("#gmaps_StreetType").val());
		$("#lsuburb").val($("#gmaps_Suburb").val());
		$("#ldesc").val("");
		$("#facilityInput").val("");
		$("#facilityId").val("");
		$("#addressId").val("");
		$("#ltype").attr("disabled", false);
		$("#lsuburb").attr("disabled", false);
		$("#lno").attr("readonly", false);
		$("#lfno").attr("readonly", false);
		$("#ldesc").attr("readonly", false);
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
	$("#serviceInput").click(function () {
	    $("#service").val("");
	    $("#serviceInput").val("");
	    $("#request").val("");
	    $("#requestInput").val("").textinput('disable').removeClass("ui-disabled");
	    $("#requestInput").textinput('enable').addClass("ui-disabled").addClass("ui-state-disabled").addClass("mobile-textinput-disabled");
	    $("#function").val("");
	    $("#functionInput").val("").textinput('disable').removeClass("ui-disabled");
	    $("#functionInput").addClass("ui-disabled").addClass("ui-state-disabled").addClass("mobile-textinput-disabled");
	    $("#keywordSearch").val("");
	    $("#adhocOfficer").html("");
	    $("#submitButton").show();
	    $("#chkCount").val("0");
	    $("#serviceInput").attr("readonly", false);
	    $("#priority").val("");
	    $("#functionInput").removeClass("required");
	    $("#functionRequired").hide();
	    $("#serviceInput").autocomplete("search", "");
	    $("#serviceInput").focus();

	});

	$("#serviceInput").click(function () {
	    $("#service").val("");
	    $("#serviceInput").val("");
	    $("#request").val("");
	    $("#requestInput").val("").attr("disabled", true);
	    $("#function").val("");
	    $("#functionInput").val("").attr("disabled", true);
	    $("#serviceInput").attr("readonly", false);
	    $("#keywordSearch").val("");
	    $("#adhocOfficer").html("");
	    $("#chkCount").val("0");
	    ClearHelpNotes();
	    $("#functionInput").removeClass("required");
	    $("#priority").val("");
	    $("#functionRequired").hide();
	    requestClicked = false;
	    functionClicked = false;
	    $("#serviceInput").autocomplete("search", "");

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
						$("#requestInput").textinput('enable').addClass("ui-disabled");	
						$("#requestInput").removeClass("ui-disabled").removeClass("ui-state-disabled").removeClass("mobile-textinput-disabled");
						$("#function").val("");
						$("#functionInput").val("");
						$("#functionInput").textinput('disable').removeClass("ui-disabled");
						$("#functionInput").addClass("ui-disabled").addClass("ui-state-disabled").addClass("mobile-textinput-disabled");
						$("#serviceInput").attr("readonly", true);
						$("#requestInput").attr("disabled", false);
						$("#requestInput").attr("readonly", false);
						QueryUDFs('0','0',$("#service").val()); 
						GetHelpNotes($("#function").val(),$("#request").val(),$("#service").val());
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
			$("#requestInput").textinput('enable').addClass("ui-disabled");	
			$("#requestInput").removeClass("ui-disabled").removeClass("ui-state-disabled").removeClass("mobile-textinput-disabled");
			$("#function").val("");
			$("#functionInput").val("");
			$("#functionInput").textinput('disable').removeClass("ui-disabled");
			$("#functionInput").addClass("ui-disabled").addClass("ui-state-disabled").addClass("mobile-textinput-disabled");
			$("#serviceInput").attr("readonly", true);
			$("#requestInput").attr("disabled", false);
			$("#requestInput").attr("readonly", false);
			QueryUDFs('0','0',$("#service").val()); 
			GetHelpNotes($("#function").val(),$("#request").val(),$("#service").val());
			$("#requestInput").click();
		}
		
	});
	
	// Request Typealong Focus
	$("#requestInput").click(function(){
		$("#request").val("");
		$("#requestInput").val("");
		$("#function").val("");
		$("#functionInput").val("").textinput('disable').removeClass("ui-disabled");
		$("#functionInput").addClass("ui-disabled").addClass("ui-state-disabled").addClass("mobile-textinput-disabled");
		$("#requestInput").attr("readonly", false);
		$("#adhocOfficer").html("");
		$("#chkCount").val("0");
		$("#functionInput").removeClass("required");
		$("#priority").val("");
		$("#functionRequired").hide();
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
			$("#request").val(ui.item.code);
			$("#requestInput").val(ui.item.label);
			$("#function").val("");
			$("#functionInput").val("");
         $("#requestInput").attr("readonly", true);

			QueryUDFs('0',$("#request").val(),$("#service").val());
			GetHelpNotes('', $("#request").val(), $("#service").val());
			
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
		$("#functionInput").attr("readonly", false);
		$("#adhocOfficer").html("");
		$("#priority").val("");
		$("#functionInput").autocomplete("search", "");
		$("#functionInput").focus();
		
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
				        if ($("#chkCount").val() === 0) {
				            $("#chkCount").val("1");
				            CheckCountOnly($("#service").val(), $("#request").val(), '');
				        }
				        $("#functionInput").removeClass("ui-autocomplete-loading");
				        $("#functionInput").attr("readonly", true);
				        $("#functionInput").textinput('disable').removeClass("ui-disabled");
				        $("#functionInput").addClass("ui-disabled").addClass("ui-state-disabled").addClass("mobile-textinput-disabled");
				    }
				    else {
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
						
						$("#lstreet").attr("readonly", true);
						$("#ltype").textinput('enable').addClass("ui-disabled");	
						$("#ltype").removeClass("ui-disabled").removeClass("ui-state-disabled").removeClass("mobile-textinput-disabled");
						$("#ltype").click();
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
			 
			$("#lstreet").attr("readonly", true);
			$("#ltype").textinput('enable').addClass("ui-disabled");	
			$("#ltype").removeClass("ui-disabled").removeClass("ui-state-disabled").removeClass("mobile-textinput-disabled");
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
			$("#ltype").textinput('disable').removeClass("ui-disabled");
			$("#ltype").addClass("ui-disabled").addClass("ui-state-disabled").addClass("mobile-textinput-disabled");
			$("#lsuburb").val("");
			$("#lsuburb").textinput('disable').removeClass("ui-disabled");
			$("#lsuburb").addClass("ui-disabled").addClass("ui-state-disabled").addClass("mobile-textinput-disabled");
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
					street: function() { return $('#lstreet').val(); }
				},
				success: function(data) {
					if(data.length == 1){
						$("#ltype").val(data[0]);
						$("#ltype").removeClass("ui-autocomplete-loading");
						$("#ltype").attr("readonly", true);
						$("#lsuburb").textinput('enable').addClass("ui-disabled");	
						$("#lsuburb").removeClass("ui-disabled").removeClass("ui-state-disabled").removeClass("mobile-textinput-disabled");
						$("#lsuburb").click();
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
			$("#ltype").removeClass("ui-autocomplete-loading");
			$("#ltype").attr("readonly", true);
			$("#lsuburb").textinput('enable').addClass("ui-disabled");	
			$("#lsuburb").removeClass("ui-disabled").removeClass("ui-state-disabled").removeClass("mobile-textinput-disabled");
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
			$("#ltype").textinput('enable').addClass("ui-disabled");	
			$("#ltype").removeClass("ui-disabled").removeClass("ui-state-disabled").removeClass("mobile-textinput-disabled");
			$("#ltype").val("");
			$("#lsuburb").val("");
			$("#lsuburb").textinput('disable').removeClass("ui-disabled");
			$("#lsuburb").addClass("ui-disabled").addClass("ui-state-disabled").addClass("mobile-textinput-disabled");
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
			$("#lsuburb").textinput('enable').addClass("ui-disabled");	
			$("#lsuburb").removeClass("ui-disabled").removeClass("ui-state-disabled").removeClass("mobile-textinput-disabled");
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
						$("#i_ctype").textinput('enable').addClass("ui-disabled");	
						$("#i_ctype").removeClass("ui-disabled").removeClass("ui-state-disabled").removeClass("mobile-textinput-disabled");
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
			$("#i_cstreet").removeClass("ui-autocomplete-loading");
			$("#i_cstreet").attr("readonly", true);
			$("#i_ctype").textinput('enable').addClass("ui-disabled");	
			$("#i_ctype").removeClass("ui-disabled").removeClass("ui-state-disabled").removeClass("mobile-textinput-disabled");
			
		}
	});
	
	// Customer Street Name Focus
	$("#i_cstreet").click(function(){
		$(this).attr("readonly", false);
		$(this).val("");
		$("#i_ctype").val("");
		$("#i_ctype").textinput('disable').removeClass("ui-disabled");
		$("#i_ctype").addClass("ui-disabled").addClass("ui-state-disabled").addClass("mobile-textinput-disabled");
		$("#i_csuburb").val("");
		$("#i_csuburb").textinput('disable').removeClass("ui-disabled");
		$("#i_csuburb").addClass("ui-disabled").addClass("ui-state-disabled").addClass("mobile-textinput-disabled");
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
					st: function() { return $('#i_cstreet').val(); }
				},
				success: function(data) {
					if(data.length == 1){
						$("#i_ctype").val(data[0]);
						$("#i_ctype").removeClass("ui-autocomplete-loading");
						$("#i_ctype").attr("readonly", true);
						$("#i_csuburb").textinput('enable').addClass("ui-disabled");	
						$("#i_csuburb").removeClass("ui-disabled").removeClass("ui-state-disabled").removeClass("mobile-textinput-disabled");
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
			$("#i_ctype").removeClass("ui-autocomplete-loading");
			$("#i_ctype").attr("readonly", true);
			$("#i_csuburb").textinput('enable').addClass("ui-disabled");	
			$("#i_csuburb").removeClass("ui-disabled").removeClass("ui-state-disabled").removeClass("mobile-textinput-disabled");
		}
	});
	
	// Customer Street Type Focus
	$("#i_ctype").click(function(){
		$(this).attr("readonly", false);
		$("#i_ctype").textinput('enable').addClass("ui-disabled");	
		$("#i_ctype").removeClass("ui-disabled").removeClass("ui-state-disabled").removeClass("mobile-textinput-disabled");
		$("#i_ctype").val("");
		$("#i_csuburb").val("");
		$("#i_csuburb").textinput('disable').removeClass("ui-disabled");
		$("#i_csuburb").addClass("ui-disabled").addClass("ui-state-disabled").addClass("mobile-textinput-disabled");
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
					id: "i_csu`burb",
					st: function() { return $('#i_cstreet').val() },
					ty: function() { return $('#i_ctype').val() }
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
			$("#i_csuburb").removeClass("ui-autocomplete-loading");
			$("#i_csuburb").attr("readonly", true);
		}
	});
	
	// Customer Street Suburb Focus
	$("#i_csuburb").click(function(){
		$(this).attr("readonly", false);
		$("#i_csuburb").val("");
		$("#i_csuburb").textinput('enable').addClass("ui-disabled");	
		$("#i_csuburb").removeClass("ui-disabled").removeClass("ui-state-disabled").removeClass("mobile-textinput-disabled");
		$("#i_csuburb").autocomplete("search", "");
	});
	
	// Customer Details Change
	$('.cadd').change(function(){
		$('#cust_address_id').val('0');
		$('#cust_address_ctr').val('0');
	});
	
	
	//Facility Typealong Focus
	$("#facilityInput").click(function(){
		$("#facilityInput").autocomplete("search", "");
		if($(this).attr("readonly") == 'readonly'){
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
			
			$("#lstreet").attr("readonly",false);
			$("#ltype").attr("readonly",false);
			$("#lsuburb").attr("readonly",false);
			$("#ldesc").attr("readonly",false);
			$("#lno").attr("readonly",false);
			$("#lfno").attr("readonly",false);
			
			$("#ltype").textinput('disable').removeClass("ui-disabled");
			$("#ltype").addClass("ui-disabled").addClass("ui-state-disabled").addClass("mobile-textinput-disabled");
			$("#lsuburb").textinput('disable').removeClass("ui-disabled");
			$("#lsuburb").addClass("ui-disabled").addClass("ui-state-disabled").addClass("mobile-textinput-disabled");
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

	        $("#ltype").textinput('disable').removeClass("ui-disabled");
	        $("#ltype").addClass("ui-disabled").addClass("ui-state-disabled").addClass("mobile-textinput-disabled");
	        $("#lsuburb").textinput('disable').removeClass("ui-disabled");
	        $("#lsuburb").addClass("ui-disabled").addClass("ui-state-disabled").addClass("mobile-textinput-disabled");
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

	        $("#facilityInput").textinput('enable').removeClass("ui-disabled").removeClass("ui-state-disabled").removeClass("mobile-textinput-disabled");
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
					term: request.term,
				},
				success: function(data) {
					response(data);
				},
			});
		},
		autoFocus: true,
		delay: 0, 
		minLength:0,
		select: function(event, ui){ 
		    $("#facilityInput").attr("readonly", true);
		    $("#facilityInput").val(ui.item.label);
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
						
						$("#ltype").textinput('enable').addClass("ui-disabled");	
						$("#ltype").removeClass("ui-disabled").removeClass("ui-state-disabled").removeClass("mobile-textinput-disabled");
						$("#lsuburb").textinput('enable').addClass("ui-disabled");	
						$("#lsuburb").removeClass("ui-disabled").removeClass("ui-state-disabled").removeClass("mobile-textinput-disabled");
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
				
				$("#ltype").attr("disabled", true).addClass("ui-disabled").addClass("ui-state-disabled").addClass("mobile-textinput-disabled");
				$("#lsuburb").attr("disabled", true).addClass("ui-disabled").addClass("ui-state-disabled").addClass("mobile-textinput-disabled");
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
					$("#popup").popup("open");
					$("#default").page('destroy').page();
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
});