<!DOCTYPE html>
<html>
  <head>
    <title>А-локатор</title>
    <link href="<?php echo $this->config->item('base_url'); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_url'); ?>assets/css/bootstrap-switch.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_url'); ?>assets/css/jAutochecklist.min.css" rel="stylesheet">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body{
        height: 100%;
        margin: 0px;
        padding: 0px;
      }
    </style>
    <style>
      #map-canvas {
      height: 93%;
      margin-top: -20px;
      }
    </style>
	<style type="text/css">
	   .labels {
	     color: white;
	     background-color: transparent;
	     font-family: "Lucida Grande", "Arial", sans-serif;
	     font-size: 10px;
	     text-align: center;
	     width: 100px;
	     white-space: nowrap;
	   }
	 </style>
    <!--
    Include the maps javascript with sensor=true because this code is using a
    sensor (a GPS locator) to determine the user's location.
    See: https://developers.google.com/maps/documentation/javascript/tutorial#Loading_the_Maps_API
    -->
	<script src="<?php echo $this->config->item('base_url'); ?>assets/js/jquery-latest.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('base_url'); ?>assets/js/jAutochecklist.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
    <script type="text/javascript" src="<?php echo $this->config->item('base_url'); ?>assets/js/markerwithlabel.js"></script>
    <script>
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
		  pictureLabel.src = "<?php echo $this->config->item('base_url'); ?>assets/img/users/an-3.png";
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
    </script>
 
	<script type="text/javascript">
	$(document).ready(function() {
	    $(".showcomments").click(function() {
	        $('#myModal').modal('show');
	        rescale();
	    });
	    $("[rel=tooltip]").tooltip();
	});
	function rescale(){
	    var size = {width: $(window).width() , height: $(window).height() }
	    /*CALCULATE SIZE*/
	    var offset = 20;
	    var offsetBody = 150;
	    $('#myModal').css('height', size.height - offset );
	    $('.modal-body').css('height', size.height - (offset + offsetBody));
	    $('#myModal').css('top', 0);
	}
	$(window).bind("resize", rescale);
	</script>
  </head>
  <body>
  	<div>
		<div class="navbar">
			<nav class="navbar-inner">
				<a class="brand">А-локатор</a>
				<ul class="nav">
					<li class="divider-vertical"></li>
					<li><a href="#">Все друзья</a></li>
					<li><a href="#">История</a></li>
				</ul>
				<ul class="nav pull-right">
					<li><a>Бобошко Андрей</a></li>
					<li class="divider-vertical"></li>
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a>Пригласить друга</a></li>
						<li><a href=#modal role="button" data-toggle="modal">Настройки</a></li>
						<li><a href="<?php echo $this->config->item('base_url');?>index.php/auth/logout">Выход</a></li>
					</ul>
					</li>
				</ul>
			</nav>
		</div>
	</div>
    <div id="map-canvas"></div>
	<div id="modal" class="modal hide fade">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h2>Настройки</h2>
		</div>
		<div class="modal-body">
			<ul class="nav nav-tabs" id="SettingsTab">
				<li class="active"><a href="#position" data-toggle="tab">Местоположения</a></li>
				<li class><a href="#private" data-toggle="tab">Приватности</a></li>
				<li class><a href="#history" data-toggle="tab">Истории</a></li>
				<li class><a href="#account" data-toggle="tab">Аккаунта</a></li>
			</ul>
			<div class="tab-content" id="SettingsTabContent">
				<div class="tab-pane fade active in" id="position">
					<p>Определять положение</p>
					<div id="position-mode-switch" class="make-switch" data-on-label="Авто" data-off-label="Руч">
					    <input type="radio">
					</div>
				</div>
				<div class="tab-pane fade" id="private">
					<p>Скрыть меня от </p>
					<select class="jAutochecklist" id="UserList" multiple>
					    <option>Вася Пупкин</option>
					    <option>Алексей Гагарин</option>
					    <option>Иво Бобул</option>
					</select>
				</div>
				<div class="tab-pane fade" id="history">
					Ведение истории местоположений
				</div>
				<div class="tab-pane fade" id="account">
					Пароли
				</div>
			</div>
		</div>
	</div>
	<script>
	    $(function(){
	    	$('#UserList').jAutochecklist({
	    	}); 
	    });
	</script>
    <script src="<?php echo $this->config->item('base_url'); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $this->config->item('base_url'); ?>assets/js/bootstrap-switch.js"></script>
  </body>
</html>