    /*
    Include the maps javascript with sensor=true because this code is using a
    sensor (a GPS locator) to determine the user's location.
    See: https://developers.google.com/maps/documentation/javascript/tutorial#Loading_the_Maps_API
    */
	// Note: This example requires that you consent to location sharing when
	// prompted by your browser. If you see a blank space instead of the map, this
	// is probably because you have denied permission for location sharing.
	
	var map;
	
	function initialize() {
	  var myLatlng = new google.maps.LatLng(49.363882,35.044922);
	  var mapOptions = {
	    zoom: 6,
	    center: myLatlng,
	    mapTypeId: google.maps.MapTypeId.ROADMAP
	  };
	  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	  // Try HTML5 geolocation
	  if(navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(function(position) {
	      var pos = new google.maps.LatLng(position.coords.latitude,
	                                       position.coords.longitude);	      
	      map.setCenter(pos);
		  var pictureLabel = document.createElement("img");
		  pictureLabel.src = "http://"+ location.hostname + "/assets/img/userpics/thumbnail/1lRCK0L.jpg";
		  var marker = new MarkerWithLabel({
		       position: pos,
		       map: map,
		       draggable: false,
		       raiseOnDrag: true,
		       labelContent: pictureLabel,
		       labelAnchor: new google.maps.Point(51, 50),
		       labelClass: "labels", // the CSS class for the label
		       labelStyle: {opacity: 1.0}
		     });		  
		    }, function() {
	      handleNoGeolocation(true);
	    });
	  } else {
	    // Browser doesn't support Geolocation
	    handleNoGeolocation(false);
	  }
	}
	
	function handleNoGeolocation(errorFlag) {
	  if (errorFlag) {
	    var content = 'Error: The Geolocation service failed.';
	  } else {
	    var content = 'Error: Your browser doesn\'t support geolocation.';
	  }	
	  var options = {
	    map: map,
	    position: new google.maps.LatLng(60, 105),
	    content: content
	  };
	  map.setCenter(options.position);
	}
	google.maps.event.addDomListener(window, 'load', initialize);