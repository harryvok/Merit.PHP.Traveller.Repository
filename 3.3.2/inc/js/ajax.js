// All AJAX javascript queries

function QueryUDFs(func,req,ser){
	$.post("inc/ajax/ajax.get_udf.php",{ function_code: func, service_code: ser, request_code: req },
	function(data){
		$("#global-udfs").html(data);
	}, "html");
}


function Search(sear){
	Load();
	$.post("inc/ajax/ajax.search.php",{ search_q: sear },
	function(data){
		$("#search_query").html(data);
	}, "html");
	
	
}

function GetAssociationDetails(type_txt,type_desc,type_cnt,type_key,type_code,form_name,key_name,address_id){
	Load();
	$.post("inc/ajax/ajax.assoc_details.php",{ type_txt : type_txt, type_desc : type_desc, type_cnt : type_cnt, type_key : type_key, type_code : type_code, form_name : form_name, key_name : key_name, address_id : address_id },
	function(data){
		$("#association_details").html(data);
	}, "html");
	
}

function GetAliasDetails(address_id,type_txt,type_desc,type_cnt,type_key,type_code){
	Load();
	$.post("inc/ajax/ajax.alias_details.php",{ address_id : address_id, type_txt : type_txt, type_desc : type_desc, type_cnt : type_cnt, type_key : type_key, type_code : type_code  },
	function(data){
		$("#alias_details").html(data);
	}, "html");
	
}

function GetAttributeDetails(address_id,type_txt,type_desc,type_cnt,type_key,type_code,status_ind){
	Load();
	$.post("inc/ajax/ajax.attribute_details.php",{ type_txt : type_txt, type_desc : type_desc, type_cnt : type_cnt, type_key : type_key, type_code : type_code, address_id : address_id, status_ind: status_ind },
	function(data){
		$("#attribute_details").html(data);
	}, "html");
	
}

function GetAliasDetails_iphone(id,address_id,type_txt,type_desc,type_cnt,type_key,type_code){
	Load();
	$.post("inc/ajax/ajax.alias_details.php",{ address_id : address_id, type_txt : type_txt, type_desc : type_desc, type_cnt : type_cnt, type_key : type_key, type_code : type_code  },
	function(data){
		$("#alias_details"+id).html(data);
	}, "html");
	
}
function GetAssociationDetails_iphone(id,type_txt,type_desc,type_cnt,type_key,type_code,form_name,key_name,address_id){
	Load();
	document.getElementById('association_details'+id).innerHTML = '<img src="images/ajax-loader.gif" width="16" height="16" /> <span style="font-size:10px;">Searching...</span>';
	$.post("inc/ajax/ajax.assoc_details.php",{ type_txt : type_txt, type_desc : type_desc, type_cnt : type_cnt, type_key : type_key, type_code : type_code, form_name : form_name, key_name : key_name, address_id : address_id },
	function(data){
		$("#association_details"+id).html(data);
	}, "html");
	
}
function GetAttributeDetails_iphone(id,address_id,type_txt,type_desc,type_cnt,type_key,type_code,status_ind){
	Load();
	$.post("inc/ajax/ajax.attribute_details.php",{ type_txt : type_txt, type_desc : type_desc, type_cnt : type_cnt, type_key : type_key, type_code : type_code, address_id : address_id, status_ind: status_ind },
	function(data){
		$("#attribute_details"+id).html(data);
	}, "html");
}

function CheckCountOnly(ser, req, func){
	$.ajax({
		url: "inc/ajax/ajax.chkCountOnly.php",
		dataType: "json",
		data: {
			request_code: req, service_code: ser, function_code: func
		},
		success: function(data) {
			if(data.countOnly == true){
			    if (!confirm("This is a count only request so there is no workflow associated and the request will be closed upon save. Do you want to continue?")) {
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
			        $("#countOnly").val("0");
			    }
			    else {
			        $("#countOnly").val("1");
			    }
			}
		},
	});
}

function CheckIfWorkflow(ser, req, func) {
    $.ajax({
        url: "inc/ajax/ajax.chkIfWorkflow.php",
        dataType: "json",
        data: {
            request_code: req, service_code: ser, function_code: func
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
        },
    });
}

function GetHelpNotes(func, req, ser){
	
	$.ajax({
		url: "inc/ajax/ajax.getHelpNotes.php",
		dataType: "json",
		data: {
			request_code: req, service_code: ser, function_code: func
		},
		success: function(data) {
		    if (data.helpText.length > 0 || data.helpURL.length > 0) {
		        if (ser.length > 0 && req.length == 0 && func.length == 0) {
		            $("#service_help").fadeIn("fast");
		            $("#service_helpText").val(data.helpText);
		            $("#service_helpURL").val(data.helpURL);
		        }

		        if (ser.length > 0 && req.length > 0 && func.length == 0) {
		            $("#request_help").fadeIn("fast");
		            $("#request_helpText").val(data.helpText);
		            $("#request_helpURL").val(data.helpURL);
		        }

		        if (ser.length > 0 && req.length > 0 && func.length > 0) {
		            $("#function_help").fadeIn("fast");
		            $("#function_helpText").val(data.helpText);
		            $("#function_helpURL").val(data.helpURL);
		        }
				
			}
			else{
				$("#infoHover").fadeOut("fast");
			}
		},
	});
}