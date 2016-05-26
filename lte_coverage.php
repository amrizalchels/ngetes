<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

<div id="zcontentwrapper" class="zcontentwrapper">
    <div class="pageheader notab">
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<meta charset="utf-8">
		<style>
		  html, body {
			height: 100%;
			margin: 0;
			padding: 0;
		  }
		  #map {
			height: 100%;
		  }
	.controls {
	  margin-top: 10px;
	  border: 1px solid transparent;
	  border-radius: 2px 0 0 2px;
	  box-sizing: border-box;
	  -moz-box-sizing: border-box;
	  height: 32px;
	  outline: none;
	  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
	}

	#pac-input {
	  background-color: #fff;
	  font-family: Roboto;
	  font-size: 15px;
	  font-weight: 300;
	  margin-left: 12px;
	  padding: 0 11px 0 13px;
	  text-overflow: ellipsis;
	  width: 300px;
	}

	#pac-input:focus {
	  border-color: #4d90fe;
	}

	.pac-container {
	  font-family: Roboto;
	}

	#type-selector {
	  color: #fff;
	  background-color: #4d90fe;
	  padding: 5px 11px 0px 11px;
	}

	#type-selector label {
	  font-family: Roboto;
	  font-size: 13px;
	  font-weight: 300;
	}

		</style>
        <h1 class="pagetitle">Cakupan 4G LTE <img id="loader-show" src="<?=base_url()?>file/images/loaders/loader3.gif" style="display:none"> </h1>		
		<style>
		  #target {
			width: 345px;
		  }
		</style>
    </div>
</div>

<div class="box" style="padding:10px;">
    <input id="pac-input" class="controls" type="text" placeholder="Search Box">	
    <div id="map" style="width:98%;height:700px;margin:10px;border:1px solid grey;"></div>
</div>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyC0JhNTyjMpdmUPMDYWIVuE57dUIHZH1SU&sensor=true&libraries=places&callback=initAutocomplete" async defer></script>
<script>	
    function initAutocomplete() {
	  var map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: -2.796647, lng: 117.621416666667},
		zoom: 5,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	  });

	  // Create the search box and link it to the UI element.
	  var input = document.getElementById('pac-input');
	  var searchBox = new google.maps.places.SearchBox(input);
	  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

	  // Bias the SearchBox results towards current map's viewport.
	  map.addListener('bounds_changed', function() {
		searchBox.setBounds(map.getBounds());
	  });

	  var markers = [];
	  var infoPolygon;
	  var polygons = [];
	  //showMap();
	  var imageBounds = {
		north: 8.559047,
		south: -11.878127,
		east: 125.647806,
		west: 94.662194
	  };

	  historicalOverlay = new google.maps.GroundOverlay(
		  '<?php echo base_url('file/images/icongis/lte_coverage2.png');?>',
		  //'https://www.lib.utexas.edu/maps/historical/newark_nj_1922.jpg',
		  imageBounds);
	  historicalOverlay.setMap(map);
	  // [START region_getplaces]
	  // Listen for the event fired when the user selects a prediction and retrieve
	  // more details for that place.
	  searchBox.addListener('places_changed', function() {
		var places = searchBox.getPlaces();

		if (places.length == 0) {
		  return;
		}

		// Clear out the old markers.
		markers.forEach(function(marker) {
		  marker.setMap(null);
		});
		markers = [];

		// For each place, get the icon, name and location.
		var bounds = new google.maps.LatLngBounds();
		places.forEach(function(place) {
		  var icon = {
			url: place.icon,
			size: new google.maps.Size(71, 71),
			origin: new google.maps.Point(0, 0),
			anchor: new google.maps.Point(17, 34),
			scaledSize: new google.maps.Size(25, 25)
		  };

		  // Create a marker for each place.
		  markers.push(new google.maps.Marker({
			map: map,
//			icon: '<?php echo base_url('file/images/icongis/bts.png');?>',
			title: place.name,
			position: place.geometry.location
		  }));

		  if (place.geometry.viewport) {
			// Only geocodes have viewport.
			bounds.union(place.geometry.viewport);
		  } else {
			bounds.extend(place.geometry.location);
		  }
		});
		map.setCenter(bounds.getCenter());		
		map.fitBounds(bounds);		
		map.setZoom(map.getZoom()-1);
		//map.panTo(curmarker.position);
	  });
	  // [END region_getplaces]
	  
	  function showMap(formData) {
        $('#loader-show').fadeIn('fast');
        $.ajax({
            type    : 'post',
            url     : '<?php echo base_url('gis/get_json_data_lte'); ?>',
            data    : formData,
            dataType: 'json',
            success: function(data) {
                if (data.coordinats.length>0) {
                    var bounds = new google.maps.LatLngBounds();
                    
                    //Bikin polygon dulu, supaya marker bisa diklik
                    var path = [];
                    var grup = 0;
                    var latLongBound, region, cluster, content;
                    $.each(data.coordinats, function (index, coordinat){
                       latLongBound = new google.maps.LatLng(coordinat.lat, coordinat.lon);
                       bounds.extend(latLongBound);
                       if (coordinat.grup==grup) { //jika grup nya sama, kumpulkan koordinat
                           path.push(latLongBound); 
                       } else { //jika grup nya beda, bikin polygon
                           content = '<div style="min-width:200px;"><b>'+region+' > '+cluster+'</b>';
                           addPolygon(path, content);
                           path = [];
                           path.push(latLongBound);
                       }
                       region 	= coordinat.region_name;
                       cluster 	= coordinat.cluster_name;
					   grup 	= coordinat.grup; 
                       
                    });
                    content = '<div style="min-width:200px;"><b>'+region+' > '+cluster+'</b>';
                    addPolygon(path, content);
					
					
					//Bikin marker di sini
                        
							/*console.log("data.address_lat : "+data.address_lat);
							console.log("data.address_lon : "+data.address_lon);
							console.log("data.address : "+data.address);
					if($('#address').val() != '')
					{
						console.log("$('#address').val() ketiga : "+$('#address').val());
						var latLong = new google.maps.LatLng(-25.363882, 131.044922);
                        var layer   = 1;
                        bounds.extend(latLong);
                        //if (data.address_icon!='outlet.png')
                          //  layer = 9999;

                        var marker = new google.maps.Marker({
                            position    : latLong,
                            map         : map,
                            title       : "Hello World!",
                            icon        : '<?php echo base_url('file/images/icongis/outlet.png');?>',
                            zIndex      : layer
                        });
                        markers.push(marker);
					}*/       
					
                    map.fitBounds(bounds);
                } else {
                    alert('Sorry, no data.');
                }
                
            },
            error: function(xhr, status, message) {
	              if(message !=='') {
	                alert(status.toUpperCase() + ' : ' + message + ', please try again.');
	              }
            },
            complete : function () {
                $('#loader-show').fadeOut('slow');    
            }
        });
    }
	  
	  function getRandomColor() {
        var letters = '0123456789ABCDEF'.split('');
        var color = '#';
        for (var i = 0; i < 6; i++ ) {
            color += letters[Math.round(Math.random() * 15)];
        }
        return color;
    } 
  
	  function addPolygon(path, content) {
		var polygon = new google.maps.Polygon({
			path            : path,
			strokeColor     : 'grey',
			strokeOpacity   : 0.8,
			strokeWeight    : 1,
			fillColor       : getRandomColor(),
			fillOpacity     : 0.35
		});
		polygons.push(polygon);
		polygon.setMap(map);

		//info window buat polygon
		infoPolygon = new google.maps.InfoWindow();
		google.maps.event.addListener(polygon, 'click', function (event){
			infoPolygon.setContent(content);
			infoPolygon.setPosition(event.latLng);
			infoPolygon.open(map);
		});
	  }
	  
	}
  
</script>