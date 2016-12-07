// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.

var map;
var service;
var autocomplete;
var pos;
var place;
function initMap() {
	// This shall be used when using the map view
	if(document.getElementById('map') !== null){ // This if statement is so that in case there is no div with an id of "map" AKA no maps but need the location of the user
		map = new google.maps.Map(document.getElementById('map'), {
		  center: {lat: -34.397, lng: 150.644},
		  zoom: 13
		});
		var infoWindow = new google.maps.InfoWindow({map: map});
	}
	

	// Try HTML5 geolocation.
	
	if (navigator.geolocation) {
	  navigator.geolocation.getCurrentPosition(function(position) {
		pos = {
		  lat: position.coords.latitude,
		  lng: position.coords.longitude
		};
		
		
		//Creation of the autocomplete input bar
		var userDetails = getUserAddress();
		
		var nameInput = document.getElementById('name');
		
		var n = userDetails.results[0].geometry.viewport.northeast.lat;
		var e = userDetails.results[0].geometry.viewport.northeast.lng;
		var s = userDetails.results[0].geometry.viewport.southwest.lat;
		var w = userDetails.results[0].geometry.viewport.southwest.lng;
		
		
		var defbounds = new google.maps.LatLngBounds(new google.maps.LatLng(n,w),new google.maps.LatLng(s,w));
		
		
		var nioptions = {
			//bounds: defbounds,
			//componentRestrictions:{country: userDetails.results[0].address_components[5].short_name}
			componentRestrictions:{country: "PH"}
		};
		
		autocomplete = new google.maps.places.Autocomplete(nameInput, nioptions);
		autocomplete.addListener('place_changed', getGeocode);
		
		if(document.getElementById('map') !== null){
			service = new google.maps.places.PlacesService(map);
		}
		
		// This shall be used when using the map view
		if(document.getElementById('map') !== null){
			infoWindow.setPosition(pos);
			infoWindow.setContent('You are here!');
			map.setCenter(pos);
		}
		
	  }, function() {
		console.log("Fail?");
		if(document.getElementById('map') !== null){ // This if statement is so that in case there is no div with an id of "map" AKA no maps but need the location of the user
			map = new google.maps.Map(document.getElementById('map'), {
			  center: {lat: -34.397, lng: 150.644},
			  zoom: 12
			});
			var infoWindow = new google.maps.InfoWindow({map: map});
		}
		
		$.getJSON('https://ipinfo.io/geo', function(response) { 
			var loc = response.loc.split(',');
			pos = {
				lat: parseFloat(loc[0]),
				lng: parseFloat(loc[1])
			};
			
			var userDetails = getUserAddress();
			
			var nameInput = document.getElementById('name');
			
			var n = userDetails.results[0].geometry.viewport.northeast.lat;
			var e = userDetails.results[0].geometry.viewport.northeast.lng;
			var s = userDetails.results[0].geometry.viewport.southwest.lat;
			var w = userDetails.results[0].geometry.viewport.southwest.lng;
			
			
			var defbounds = new google.maps.LatLngBounds(new google.maps.LatLng(n,w),new google.maps.LatLng(s,w));
			
			console.log(userDetails.results[0].address_components[5].short_name);
			
			var nioptions = {
				//bounds: defbounds,
				//componentRestrictions:{country: userDetails.results[0].address_components[5].short_name}
				componentRestrictions:{country: "PH"}
			};
			
			
			console.log(typeof nameInput);
			if(nameInput !== null){ // Creates the autocomplete
				console.log("Creating autocomplete...");
				autocomplete = new google.maps.places.Autocomplete(nameInput, nioptions);
				autocomplete.addListener('place_changed', getGeocode);
				console.log("Autocomplete done...");
			}
			
			if(document.getElementById('map') !== null){
			service = new google.maps.places.PlacesService(map);
			}
			
			// This shall be used when using the map view
			if(document.getElementById('map') !== null){
				infoWindow.setPosition(pos);
				infoWindow.setContent('You are somewhere here!');
				map.setCenter(pos);
			}
			
		});
		
		// Seems that the bottom thing relies on infoWindow which was commented out on top
		//handleLocationError(true, infoWindow, map.getCenter());
	  });
	} else {
		Alert("Geolocation not supported by browser");
	  // Browser doesn't support Geolocation
	  //handleLocationError(false, infoWindow, map.getCenter());
	}
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
infoWindow.setPosition(pos);
infoWindow.setContent(browserHasGeolocation ?
  'Error: The Geolocation service failed.' :
  'Error: Your browser doesn\'t support geolocation.');
}

function getUserPos(pos){ //Gives Position of User to AJAX
	
	/*
	var link = new XMLHttpRequest();
	
	var geoL = "lat="+pos.lat+"&lng="+pos.lng;
	var phpFile = "test.php"; //Put the parsing script here
	
	link.open("POST",phpFile,true);
	link.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	link.send(geoL);
	*/
	
	return pos; // to be replaced with ajax
	
	/*
	document.write('<p>');
	document.write(pos.lat);
	document.write('</p>');
	*/
	
}

function getUserAddress(){ //Gives City of User to AJAX or other javascript functions
	var req = new XMLHttpRequest();
	req.open("GET","https://maps.googleapis.com/maps/api/geocode/json?latlng=" + pos.lat + "," + pos.lng + "&key=AIzaSyCMqIdlNL1E-Rfw4SWL1hwQuwZ-MCZEaJk",false);
	req.send();
	parsed = JSON.parse(req.responseText);
	console.log("User Address= " + parsed.results[0].address_components[2].long_name);
	
	return parsed; // to be replaced with ajax
	
	/*
	document.write('<p>');
	document.write(parsed.results[0].address_components[2].long_name); // so basically, the city compononent of the address is equal to parsed.results[0].address_components[2].long_name
	document.write('</p>');
	*/
	
}

function markForItinerary(){ //This is when loading the suggestion, so we'll have a map to locate the suggested locations/destinations (get from db,)
	var destinations; 
	$.getJSON('url', data, function(jsonData) {
		neededData = jsonData; 
	});
	
	for(i = 0; i < Object.keys(destinations).length;i++){
		var pos = {
			lat: jsonData.lat[i],
			lng: jsonData.lat[i]
		};
		var name = jsonData.name[i];
		destinationMarker(pos,name,map);
	}
	
}

function getLocationData(){ //made it JSON
	var latitude = place.geometry.location.lat();
	var longitude = place.geometry.location.lng();
	var locationName = document.getElementById('name').value;
	var locationData = "{ name: "locationName+", lat: "+latitude+", lng: "+longitude+ "}";
	return locationData;
}

function destinationMarker(pos,name,map){
	var infoWindow = new google.maps.InfoWindow({map: map});
	infoWindow.setPosition(pos);
	infoWindow.setContent(name);
}

function manual(){
	var name = document.getElementById('name').value.split(",")[0];
	destinationMarker(pos,name,map);
}

function getGeocode(){
	var name = document.getElementById('name').value.split(",")[0];
	place = autocomplete.getPlace();
	console.log("Get geocode function, lat= " + place.geometry.location.lat() +"; lng= " + place.geometry.location.lng());
	pos = {lat: place.geometry.location.lat(),lng: place.geometry.location.lng()};
	/* Debugging
	document.getElementById('lat').value = place.geometry.location.lat();
	document.getElementById('lng').value = place.geometry.location.lng();
	*/
}