<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="UTF-8">
	<title>myRestaurant</title>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
    <script>
		var map;
		var infowindow;
		var placesList;
		var markers = [];
		var placeIDs = [];
		var isSearch = 0;
		var squery = '';
		
		function initialize() {
		  var home = new google.maps.LatLng(-27.4667, 153.0333);
		  var search = '<?php echo $_POST['query'] ?>';
		  squery = 'restaurant';
		  
		  if(search.length > 0) {
			  squery = search;
			  isSearch = 1;
		  }
		  
		  map = new google.maps.Map(document.getElementById('map-canvas'), {
			center: home,
			zoom: 16
		  });

		  var request = {
			location: home,
			radius: 500,
			query: squery
			//types: ['restaurant']
		  };
		  
		  placesList = document.getElementById('places');
		  if(isSearch == 1) {
			  placesList.innerHTML += '<h1>Search results for "' + squery + '"</h1><hr>';
		  }
		  infowindow = new google.maps.InfoWindow();
		  var service = new google.maps.places.PlacesService(map);
		  service.textSearch(request, callback);
		  
		  google.maps.event.addListener(map, 'dragend', reload);
		}
		
		function reload() {
			var newRequest = {
				location: map.getCenter(),
				radius: 500,
				query: squery
			}
			
			removeMarkers();
			
			while(placesList.hasChildNodes()) {
				placesList.removeChild(placesList.firstChild);
			}
			
			if(isSearch == 1) {
			  placesList.innerHTML += '<h1>Search results for "' + squery + '"</h1><hr>';
			}
			
			var service = new google.maps.places.PlacesService(map);
			service.textSearch(newRequest, callback);
		}
		
		function callback(results, status) {
		  if (status == google.maps.places.PlacesServiceStatus.OK) {
			//for (var i = 0; i < results.length; i++) {
			for (var i = 0; i < 5; i++) {
			  createMarker(results[i], i);
			}
		  }
		}

		function createMarker(place, index) {
		  var placeLoc = place.geometry.location;
		  var marker = new google.maps.Marker({
			map: map,
			position: place.geometry.location
		  });
		  
		  markers.push(marker);
		  placeIDs[index] = place.place_id;

		  google.maps.event.addListener(marker, 'click', function() {
			infowindow.setContent('<div id="window">' + place.name + '</div>');
			infowindow.open(map, this);
		  });
		  
		  placesList.innerHTML += '<li><h1>' + place.name + '</h1></li>';
		  placesList.innerHTML += '<li>' + place.formatted_address + '</li>';
		  placesList.innerHTML += '<li id="p' + index + '"></li>';
		  showComments(index);
		  placesList.innerHTML += '<li id="n' + index + '"></li>';
		  placesList.innerHTML += '<br><form action="JavaScript:addComment(' + index + ')"><input type="text" id="t' + index + '"> <input type="submit" value="Add Comment"></form>';
		}
		
		function removeMarkers(){
			for(i=0; i<markers.length; i++){
				markers[i].setMap(null);
			}
		}
		
		function showComments(index){
			var xmlhttp;
			var idstr = "";
			var pid = "";
			if (window.XMLHttpRequest) {
				xmlhttp=new XMLHttpRequest();
			} else {
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			idstr = "p" + index.toString();
			pid = placeIDs[index];
			
			xmlhttp.onreadystatechange=function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					document.getElementById(idstr).innerHTML=xmlhttp.responseText;
				}
			}
			
			xmlhttp.open("GET", "comments.php?q="+pid,true);
			xmlhttp.send();
		}
		
		function addComment(index){
			var xmlhttp;
			var cstr = "";
			var ctid = "";
			var ctext = "";
			var pid = "";
			if (window.XMLHttpRequest) {
				xmlhttp=new XMLHttpRequest();
			} else {
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			cstr = "p" + index.toString();
			ctid = "t" + index.toString();
			ctext = document.getElementById("t0").value;
			pid = placeIDs[index];
			
			xmlhttp.onreadystatechange=function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					document.getElementById(cstr).innerHTML += xmlhttp.responseText;
				}
			}
			
			xmlhttp.open("GET", "add_comment.php?q=" + pid + "&t=" + ctext,true);
			xmlhttp.send();
		}
		
		google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>
<body>
	<header>
		<a href="index.php">myRestaurant</a>
		<form action="index.php" method="post">
			Search: <input type="text" name="query"> <input type="submit" value="Search">
		</form>
	</header>
	<div id="map-canvas"></div>
	<div id="places"></div>
</body>
</html>