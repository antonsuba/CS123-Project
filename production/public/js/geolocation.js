// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.


function initMap() {
	/* This shall be used when using the map view
	var map = new google.maps.Map(document.getElementById('map'), {
	  center: {lat: -34.397, lng: 150.644},
	  zoom: 6
	});
	var infoWindow = new google.maps.InfoWindow({map: map});
	*/

	// Try HTML5 geolocation.
	if (navigator.geolocation) {
	  navigator.geolocation.getCurrentPosition(function(position) {
		var pos = {
		  lat: position.coords.latitude,
		  lng: position.coords.longitude
		};
		
		//This portion is to request from the google geocoding api
		
		var req = new XMLHttpRequest();
		req.open("GET","https://maps.googleapis.com/maps/api/geocode/json?latlng=" + pos.lat + "," + pos.lng + "&key=AIzaSyCMqIdlNL1E-Rfw4SWL1hwQuwZ-MCZEaJk",false);
		req.send();
		var parsed = JSON.parse(req.responseText);
		
		/* This shall be used when using the map view
		infoWindow.setPosition(pos);
		infoWindow.setContent('Location found.');
		map.setCenter(pos);
		*/
		
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