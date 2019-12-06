<?php
/**

	Template name: Tiendas

 */

get_header();
?>
    <main>

<div class="wrapper">

	<h1 class="semiBold purple titulo">Dónde comprar nuestros alimentos</h1>
	
	<section class="search" data-aos="fade-in">
		<form>
		  <div class="search-content calle">
			<input type="search" id="address" name="address" placeholder="Buscá por calle y número">
			<input type="hidden" name="latitude" id="latitude">
			<input type="hidden" name="longitude" id="longitude">
			<button id="search" type="submit">Ir</button>
		  </div>

		  <div class="search-content postal">
			<input type="search" id="buscar-postal" name="search-postal" placeholder="O buscá por código postal">
			<button id="buscar-posta-search" type="submit">Ir</button>
		  </div>

		  <div class="check-content">
			  <!--<div class="left">
					<label class="pink">PET SHOP
					  <input type="checkbox">
					  <span class="checkmark"></span>
					</label>
					<label class="lightblue">VETERINARIA
					  <input type="checkbox">
					  <span class="checkmark"></span>
					</label>
					<label class="purple">PET SHOP CON VETERINARIA
					  <input type="checkbox">
					  <span class="checkmark"></span>
					</label>
			  </div>-->


			  <h3>¿Buscás un servicio adicional?<br>Filtrá los resultados por servicio:</h3>
			  <div class="checkbox">

				<?php
					$tipo = get_terms( array(
						'taxonomy' => 'category',
						'hide_empty' => true,
					) );
					foreach($tipo as $tip){
				?>
					<label>
						<input class="category" type="checkbox" name="categories[]" value="<?php echo $tip->term_id ?>">
						<span class="checkmark">
							<img src="<?php echo get_field('imagen', 'term_'. $tip->term_id); ?>" class="svg" alt="locator"> 
							<p><?php echo $tip->name ?></p>
						</span>
					</label>
				<?php
					}
				?>
			  </div>
		  </div>  

		</form>
	</section>

</div>


<section class="map">
	<div class="wrapper">

		<div class="tabs-menu">
		  <button class="activo tablink" onclick="jQuery('#listado').hide();jQuery('#mapa').show();jQuery('.activo').removeClass('activo');jQuery(this).addClass('activo');">mapa</button>
		  <button class="tablink" onclick="jQuery('#mapa').hide();jQuery('#listado').show();jQuery('.activo').removeClass('activo');jQuery(this).addClass('activo');">listado</button>
		</div>

		<div id="listado" class="tabs">
			<article class="puntos-venta">
				<ul class="stores-items">

				</ul>
				<!--<a class="arrow-link"></a>-->
			</article>
		</div>


		<div id="mapa" class="tabs">
			<div class="mapa">
				<button class="bt-localizarme" style="z-index: 1"><span class="icon"></span><p>localizarme</p></button>
				<div id="map"></div>
			</div>

			
		</div>
	</div>
</section>


</main> 

	<script>
		var map;
		var markers = [];
		var bounds;
		var geocoder;
		
		function initMap() {
			var uluru = {lat: -34.607196, lng: -58.436202};
			map = new google.maps.Map(document.getElementById('map'), {zoom: 6, center: uluru});
			bounds = new google.maps.LatLngBounds();
			geocoder = new google.maps.Geocoder();
			 var defaultBounds = new google.maps.LatLngBounds(
				  new google.maps.LatLng(-34.607196, -58.436202),
				  new google.maps.LatLng(-34.607196, -58.436202));

var input = document.getElementById('address');
var options = {
  bounds: defaultBounds
};

autocomplete = new google.maps.places.Autocomplete(input, options);
		}
		
		jQuery(function($) {
			var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
			var templateurl = "<?php echo bloginfo('template_url'); ?>"
			
			$( document ).ready(function() {	
				load_store_items();
			});
			
			function load_store_items(categories) {
				$('.stores-items').html('<p>Cargando...</p>');
				$.ajax({
					url: ajaxurl,
					method: 'POST',
					dataType : 'json',
					data : {
						'action' : 'getNearStores',
						'categories' : categories,
								'latitude' : $('#latitude').val(), 
								'longitude' : $('#longitude').val()
					} 
				}).done(function(response) {
					$('.stores-items').html('');
					parse_store_results(response);
					//console.log(response);
				});
			}
			
			function parse_store_results(stores, nearer = false) {
				clearMarkers();
				//console.log(stores);
				for(var i=0; i < stores.length; i++) {
					

					
				//console.log(stores[i]);
				var cats = stores[i].cats;
					$('.stores-items').append('<li><div class="info"><h3 class="semiBold nombre">'+stores[i].title+'</h3><p class="medium direccion">'+stores[i].direccion+'</p>	<p class="medium telefono">'+stores[i].telefono+'</p></div><div class="icons"><ul>'+ cats.toString().replace(/,/g,'')+'</ul></div></li>');

					// marker & infowindow
					var location = { lat: parseFloat(stores[i].latitud), lng: parseFloat(stores[i].longitud) };

					var contentString = '<div class="punto-elegido info"><h3 class="semiBold nombre">'+stores[i].title+'</h3><p class="medium direccion">'+stores[i].direccion+'</p><p class="medium telefono">'+stores[i].telefono+'</p></div>';

					var infowindow = new google.maps.InfoWindow({
						content: contentString
					});

					/*if(nearer) {
						marker = new google.maps.Marker({
							map: map,
							position: {lat: parseFloat($('#latitude').val()), lng: parseFloat($('#longitude').val())},
						//	icon: templateurl + '/assets/images/home-marker-icon.png'
						});
						bounds.extend(marker.position);
						markers.push(marker);
					}
					else {
						$('#address').val('');
						
					}*/

					/*var marker = new google.maps.Marker({
						position: location,
						map: map,
						title: stores[i].title,
						//icon: stores[i].icono.url
					});*/
					var marker = createMarker(location, contentString);

					bounds.extend(marker.position);

					markers.push(marker);
					markerk.push(marker);
				}	
				//console.log(markers)
				
				map.fitBounds(bounds);
				var mapDim = { height: $('#map').height(), width: $('#map').width() };
				map.setZoom(getBoundsZoomLevel(bounds, mapDim));
				map.setCenter(bounds.getCenter());
				//console.log(location);
				// google.maps.event.trigger(map, 'resize');
			}

            var template = [
                    '<svg width="48" height="80" viewBox="0 0 48 80" version="1.1" stroke="#FFFFFF" stroke-width="3px" xmlns="http://www.w3.org/2000/svg">',
                        ' <path  fill="{{ color }}" d="M24,0.9C11,0.9,0.5,11.8,0.5,25.3c0,2.1,0.1,2.9,0.1,2.9c0.3,1.8,0.8,4,1.1,4.9C2,34,2.5,35.1,2.7,35.6 c0.2,0.5,1.5,3.1,2.3,4.7l17.7,37.5c0.8,1.6,2,1.6,2.8,0L43,40.4c0.8-1.6,1.6-3.3,1.8-3.8c0.2-0.5,1.1-2.6,1.4-3.5 c0.3-0.9,0.8-3.1,1.1-4.9c0,0,0.1-0.8,0.1-2.9C47.5,11.8,37,0.9,24,0.9z"/> ',
                    '</svg>'
                ].join('\n');
            var svg = template.replace('{{ color }}', '#52457C');

var infowindow;
var prev_infowindow;
var markerk = [];
			function createMarker(latlng, html) {
				var contentString = html;
				var marker = new google.maps.Marker({
					position: latlng,
					icon: { url: 'data:image/svg+xml;charset=UTF-8,' + encodeURIComponent(svg), scaledSize: new google.maps.Size(24, 40) },
					map: map,
					zIndex: Math.round(latlng.lat*-100000)<<5
					});

				markerk.push(marker);
				google.maps.event.addListener(marker, 'click', function() {

        if( prev_infowindow ) {
           prev_infowindow.close();
        }

 
					infowindow = new google.maps.InfoWindow({
						content: html
					});
					infowindow.setContent(contentString); 
        prev_infowindow = infowindow;
					infowindow.open(map,marker);
				});

				return marker;

			}
			
			function getStoreClass(store) {
				if(store.category.find(function(cat){
					return cat.slug === 'accesorios';
				})) {
					return "pink";
				}
				else if(store.category.find(function(cat){
					return cat.slug === 'veterinaria';
				})) {
					return "lightblue";
				} 
				else if(store.category.find(function(cat){
					return cat.slug === 'peluqueria';
				})) {
					return "purple";
				}
				else if(store.category.find(function(cat){
					return cat.slug === 'delivery';
				})) {
					return "purple";
				}
			}
			
			$('.category').on('click', function() {
				load_store_items(get_selected_categories());

			});
			
			
$(window).resize(function(){
    if($(window).width() > 1000)$('#mapa').show();

})
			$('body').on('click', '.stores-items > li',function(e) {
				e.preventDefault();
				        google.maps.event.trigger(markers[$(this).index()], 'click');
						map.setZoom(17);

						map.panTo(markers[$(this).index()].position);
  if($(window).width() < 1000){jQuery('#listado').hide();jQuery('#mapa').show();jQuery('.activo').removeClass('activo');jQuery('.store section.map .tabs-menu button:eq(0)').addClass('activo');}

			});
			
			function get_selected_categories() {
				var checkedCategories = []
				$("input[name='categories[]']:checked").each(function () {
					checkedCategories.push(parseInt($(this).val()));
				});
				
				return checkedCategories;
			}


			// Sets the map on all markers in the array.
			function setMapOnAll(map) {
				for (var i = 0; i < markers.length; i++) {
					markers[i].setMap(map);

					// remove(markers, markers[i]);
				}
					markers = [];
			}

			// Removes the markers from the map, but keeps them in the array.
			function clearMarkers() {
				setMapOnAll(null);
				markers = [];
				markerk = [];
			bounds = new google.maps.LatLngBounds();
			}

			function remove(array, element) {
				const index = array.indexOf(element);
				array.splice(index, 1);
			}

			function codeAddress() {
				var address = document.getElementById('address').value;
				//if(address == '')return false;
				if(address == ''){

								$('#latitude').val(''), 
								 $('#longitude').val('');

						$.ajax({
							url: ajaxurl,
							method: 'POST',
							dataType : 'json',
							data : {
								'action' : 'getNearStores',
								'categories' : get_selected_categories(),
								'latitude' : $('#latitude').val(), 
								'longitude' : $('#longitude').val()
							} 
						}).done(function(response) {
							$('.stores-items').html('');
							parse_store_results(response, true);
						});
				}else{

				geocoder.geocode( { 'address': address}, function(results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
						//map.setCenter(results[0].geometry.location);
						document.getElementById('latitude').value = results[0].geometry.location.lat();
						document.getElementById('longitude').value = results[0].geometry.location.lng();

						$.ajax({
							url: ajaxurl,
							method: 'POST',
							dataType : 'json',
							data : {
								'action' : 'getNearStores',
								'categories' : get_selected_categories(),
								'latitude' : $('#latitude').val(), 
								'longitude' : $('#longitude').val()
							} 
						}).done(function(response) {
							$('.stores-items').html('');
							parse_store_results(response, true);
						});
					} else {
						alert('Geocode was not successful for the following reason: ' + status);
					}
				});
				}
			}
			// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
						map.setZoom(15);
						map.panTo(geolocation);

  })
}
}
			 function codePostal() {
			// 	var address = document.getElementById('buscar-postal').value;
			// 	if(address == '')return false;
			// 	geocoder.geocode( { 'address': 'Argentina+'+address}, function(results, status) {
			// 		if (status == google.maps.GeocoderStatus.OK) {
			// 			// map.setCenter(results[0].geometry.location);
			// 			document.getElementById('latitude').value = results[0].geometry.location.lat();
			// 			document.getElementById('longitude').value = results[0].geometry.location.lng();

			// 			$.ajax({
			// 				url: ajaxurl,
			// 				method: 'POST',
			// 				dataType : 'json',
			// 				data : {
			// 					'action' : 'getNearStores',
			// 					'categories' : get_selected_categories(),
			// 					'latitude' : $('#latitude').val(), 
			// 					'longitude' : $('#longitude').val()
			// 				} 
			// 			}).done(function(response) {
			// 				$('.stores-items').html('');
			// 				parse_store_results(response, true);
			// 			});
			// 		} else {
			// 			alert('Geocode was not successful for the following reason: ' + status);
			// 		}
			// 	});
				var client = new XMLHttpRequest();
				client.open("GET", "https://api.zippopotam.us/AR/"+document.getElementById('buscar-postal').value, true);
				client.onreadystatechange = function() {
					if(client.readyState == 4) {
				places = JSON.parse(client.responseText);
					if(places.places.length > 0) {



		 			$.ajax({
		 				url: ajaxurl,
		 				method: 'POST',
		 				dataType : 'json',
		 				data : {
		 					'action' : 'getNearStores',
		 					'categories' : get_selected_categories(),
		 					'latitude' : places.places[0].latitude, 
		 					'longitude' : places.places[0].longitude
		 				} 
		 			}).done(function(response) {
		 				$('.stores-items').html('');
		 				parse_store_results(response, true);
		 			});
					};
					};
				};

				client.send();
			}

			$('#search').on('click', function(e) {
				e.preventDefault();
				codeAddress();
								  if($(window).width() < 1000) $('html, body').animate({scrollTop: $('#map').offset().top-70 }, 1000, function() {}); 


			});

			$('#buscar-posta-search').on('click', function(e) {
				e.preventDefault();
				codePostal();
								  if($(window).width() < 1000) $('html, body').animate({scrollTop: $('#map').offset().top-70 }, 1000, function() {}); 


			});

			$('.bt-localizarme').on('click', function(e) {
				e.preventDefault();
				geolocate()
			});

			$('#address').on('change', function() {
				if($('#address').val() === '') {
					load_store_items(get_selected_categories(), get_selected_tags());
				}
			});

			function getBoundsZoomLevel(bounds, mapDim) {
				var WORLD_DIM = { height: 300, width: 300 };
				var ZOOM_MAX = 21;

				function latRad(lat) {
					var sin = Math.sin(lat * Math.PI / 180);
					var radX2 = Math.log((1 + sin) / (1 - sin)) / 2;
					return Math.max(Math.min(radX2, Math.PI), -Math.PI) / 2;
				}

				function zoom(mapPx, worldPx, fraction) {
					return Math.floor(Math.log(mapPx / worldPx / fraction) / Math.LN2);
				}

				var ne = bounds.getNorthEast();
				var sw = bounds.getSouthWest();

				var latFraction = (latRad(ne.lat()) - latRad(sw.lat())) / Math.PI;

				var lngDiff = ne.lng() - sw.lng();
				var lngFraction = ((lngDiff < 0) ? (lngDiff + 360) : lngDiff) / 360;

				var latZoom = zoom(mapDim.height, WORLD_DIM.height, latFraction);
				var lngZoom = zoom(mapDim.width, WORLD_DIM.width, lngFraction);

				return Math.min(latZoom, lngZoom, ZOOM_MAX);
			}
		});
		</script>

		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARgrwkf-lPtVhi7_FtZXZAD9xSNmODsOE&callback=initMap&libraries=places" async defer></script>

	<?php
get_footer();