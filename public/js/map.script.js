
//  google map 1 function custom ========================== //

	if(jQuery('#gmap_canvas').length){
		
		function init_map1() {
			
			var myOptions = {
				zoom: 10,
				center: new google.maps.LatLng(51.5073509, -0.12775829999998223),
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				// This is where you would paste any style found on Snazzy Maps.
				styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
			};
			// Let's also add a marker while we're at it
			map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
			marker = new google.maps.Marker({
				map: map,
				position: new google.maps.LatLng(51.5073509, -0.12775829999998223),
				optimized: false,
				icon: new google.maps.MarkerImage('images/marker.png')
			});
	
			marker.setDraggable(true);		
			// marker on click show infowindow
			infowindow = new google.maps.InfoWindow({
				content: '<strong>Title</strong><br>London, United Kingdom<br>'
			});
			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map, marker);
			});
		}
		google.maps.event.addDomListener(window, 'load', init_map1);
	
	}


//  google map 2 function custom ========================== //

	if(jQuery('#gmap_canvas2').length){
		
		function init_map2() {
			
			var myOptions = {
				zoom: 10,
				center: new google.maps.LatLng(40.6700, -73.9400),
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				// This is where you would paste any style found on Snazzy Maps.
				styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
			};
			// Let's also add a marker while we're at it
			map2 = new google.maps.Map(document.getElementById('gmap_canvas2'), myOptions);
			marker2 = new google.maps.Marker({
				map: map2,
				position: new google.maps.LatLng(40.6700, -73.9400),
				optimized: false,
				icon: new google.maps.MarkerImage('images/marker.png')
			});
	
			marker2.setDraggable(true);		
			// marker on click show infowindow
	
			infowindow2 = new google.maps.InfoWindow({
				content: '<strong>Title</strong><br>London, United Kingdom<br>'
			});
			google.maps.event.addListener(marker2, 'click', function() {
				infowindow2.open(map2, marker2);
			});
		}
		google.maps.event.addDomListener(window, 'load', init_map2); 
	
	}
	
//  google map 3 default function custom ========================== //

	if(jQuery('#gmap_canvas3').length){
		
		function init_map3() {
			
			var myOptions = {
				zoom: 10,
				center: new google.maps.LatLng(40.6700, -73.9400),
				mapTypeId: google.maps.MapTypeId.ROADMAP,
			};
			// Let's also add a marker while we're at it
			map3 = new google.maps.Map(document.getElementById('gmap_canvas3'), myOptions);
			marker3 = new google.maps.Marker({
				map: map3,
				position: new google.maps.LatLng(40.6700, -73.9400),
				optimized: false,
				icon: new google.maps.MarkerImage('images/marker.png')
			});
	
			marker3.setDraggable(true);		
			// marker on click show infowindow
	
			infowindow3 = new google.maps.InfoWindow({
				content: '<strong>Title</strong><br>London, United Kingdom<br>'
			});
			google.maps.event.addListener(marker3, 'click', function() {
				infowindow3.open(map3, marker3);
			});
		}
		google.maps.event.addDomListener(window, 'load', init_map3);
	
	}
	
