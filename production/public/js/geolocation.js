// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.

function initMap() {
	// This shall be used when using the map view
	if(document.getElementById('map') !== null){ // This if statement is so that in case there is no div with an id of "map" AKA no maps but need the location of the user
		var map = new google.maps.Map(document.getElementById('map'), {
		  center: {lat: -34.397, lng: 150.644},
		  zoom: 6
		});
		var infoWindow = new google.maps.InfoWindow({map: map});
	}

	// Try HTML5 geolocation.
	if (navigator.geolocation) {
	  navigator.geolocation.getCurrentPosition(function(position) {
		var pos = {
		  lat: position.coords.latitude,
		  lng: position.coords.longitude
		};
		
		//This portion is to request from the google geocoding api
		
		getUserPos(pos);
		getUserCity(pos);
		
		// This shall be used when using the map view
		if(document.getElementById('map') !== null){
			infoWindow.setPosition(pos);
			infoWindow.setContent('Location found.');
			map.setCenter(pos);
		}
		
	  }, function() {
		Alert("Geolocating failed");
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

function getUserPos(pos){ //Gives Position of User
	
	var link = new XMLHttpRequest();
	
	var geoL = "lat="+pos.lat+"&lng="+pos.lng;
	var phpFile = "PutFileNameHere.php"; //Put the parsing script here
	
	link.open("POST",phpFile,true);
	link.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	link.send(geoL);
	
	/*
	document.write('<p>');
	document.write(pos.lat);
	document.write('</p>');
	*/
	
}

function getUserCity(pos){ //Gives City of User
	var req = new XMLHttpRequest();
		
	req.open("GET","https://maps.googleapis.com/maps/api/geocode/json?latlng=" + pos.lat + "," + pos.lng + "&key=AIzaSyCMqIdlNL1E-Rfw4SWL1hwQuwZ-MCZEaJk",false);
	req.send();
	parsed = JSON.parse(req.responseText);
	
	var link = new XMLHttpRequest();
	
	var city = "city="+parsed.results[0].address_components[2].long_name;
	var phpFile = "PutFileNameHere.php"; //Put the parsing script here
	
	link.open("POST",phpFile,true);
	link.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	link.send(city);
	/*
	document.write('<p>');
	document.write(parsed.results[0].address_components[2].long_name); // so basically, the city compononent of the address is equal to parsed.results[0].address_components[2].long_name
	document.write('</p>');
	*/
	
}

function destinationMarker(pos,name,map){
	var infoWindow = new google.maps.InfoWindow({map: map});
	infoWindow.setPosition(pos);
	infoWindow.setContent(name);
}