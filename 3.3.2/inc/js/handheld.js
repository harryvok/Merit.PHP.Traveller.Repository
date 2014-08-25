
var iWebkit;if(!iWebkit){iWebkit=window.onload=function(){function fullscreen(){var a=document.getElementsByTagName("a");for(var i=0;i<a.length;i++){if(a[i].className.match("noeffect")){}else{a[i].onclick=function(){window.location=this.getAttribute("href");return false}}}}function hideURLbar(){window.scrollTo(0,0.9)}iWebkit.init=function(){fullscreen();hideURLbar()};iWebkit.init()}}

$(document).on("click", ".ViewFile", function(){
	var path = $(this).attr("id");
	var request_id = $("#request_id").val();
	var action_id = $("#action_id").val();
	$.ajax({
		  url: 'inc/ajax/ajax.getAttachmentMobile.php',
		  type: 'post',
		  data: { path: path, req_id: request_id, act_id: action_id },
		  success: function(data) {
			  self.location = data;
		  }
	  });
});

$(document).on("click", ".openSection", function(){
	$("#"+$(this).attr("id")+"Show").hide();
	$("#"+$(this).attr("id")+"Section").show();
});

$(document).on("click", ".closeSection", function(){
	$("#"+$(this).attr("id")+"Show").show();
	$("#"+$(this).attr("id")+"Section").hide();
});

function display_fld(fld){
	document.getElementById("attrib_flds"+fld).style.display = "block";
	document.getElementById("button"+fld).style.display = "none";
}
function addElement() {
	document.getElementById('theValue').value =1;
}

var map;
		var info;
		var marker;
		 function initializeMap() {
			if (GBrowserIsCompatible()) {
				//---shows the Google Maps in the DIV element---
				map = new GMap2(document.getElementById("message"));
		 
				//---set it to a particular location---
				map.setCenter(new GLatLng(37.4419, -122.1419), 18);        
		 
				//---set the map type to Hybrid---
				map.setMapType(G_HYBRID_MAP);
			}
		}
		function load()
		{
			//---displays the map in the DIV element---
			initializeMap();
		 
			//---get the DIV element---
			info = document.getElementById("text");
		 
			//---show the current position---
			navigator.geolocation.getCurrentPosition(showMap);      
		 
			//---monitor the current position---  
			navigator.geolocation.watchPosition(panMap, handleError);      
		}
		function showMap(position)
		{
			//---display the current location---
			info.innerText = "Lat: " + position.coords.latitude + 
							 " Lng: " + position.coords.longitude;
		 	
			//---set the map to the current location---
			map.setCenter(
				new GLatLng(position.coords.latitude,position.coords.longitude), 18);
		}
		function panMap(position)
		{
			//---pans to the new location---
			map.panTo(new 
				GLatLng(position.coords.latitude,position.coords.longitude), 18);
		 
			//---get the address of the location---
			var geocoder = new GClientGeocoder();
		 
			//---perform reverse geocoding---
			geocoder.getLocations(
				new GLatLng(position.coords.latitude, position.coords.longitude), 
				showAddress);
		}
		 
		//---shows error when monitoring location changes---
		function handleError(error) {
			info.innerText = "Error: " + error;
		}
		 
		function showAddress(response)
		{
			if (!response || response.Status.code!=200) {
				alert("Status Code: " + response.Status.code);
			} else {
				place = response.Placemark[0];
				point = new GLatLng(place.Point.coordinates[1],place.Point.coordinates[0]);
				map.setCenter(point,18);
		 
				//---remove all existing markers---
				map.clearOverlays();
		 
				//---add a marker---
				marker = new GMarker(point);
				map.addOverlay(marker);
		 
				//---display location details---
				info.innerText = 
					'Your Address: ' + place.address; 
				document.getElementById('address_gps').value = place.address;
				document.getElementById('geo_x_coord').value = place.Point.coordinates[0];
				document.getElementById('geo_y_coord').value = place.Point.coordinates[1];
			}
		}
		
function Load(){
	$('#loadingbar').fadeIn("fast");	
}

function Unload(){
	$('#loadingbar').fadeOut("fast");	
}
$(document).ready(function(){
	// Write on keyup event of keyword input element
	$(document).on("input paste", "#searchText", function(){
		
		// When value of the input is not blank
		var leng = $(".searchObject").length;
		if( $("#searchText").val() != "" && $("#searchText").val().length > 1 )
		{
			// Show only matching TR, hide rest of them
			var i=leng; while(i--) { 
				if($("#searchObject"+i).html().toLowerCase().indexOf($("#searchText").val().toLowerCase()) > 0){
					$("#searchObject"+i).show();
				}
				else{
					$("#searchObject"+i).hide();	
				}
			}
		}
		else
		{
			var i=leng; while(i--) { 
				$("#searchObject"+i).show();
			}
		}
	});
});