<?php
$key = get_field('map_api_key', 'option');
?>
<style type="text/css">

.acf-map {
	width: 100%;
	height: 400px;
	border: #ccc solid 1px;
	margin: 20px 0;
}

/* fixes potential theme css conflict */
.acf-map img {
   max-width: inherit !important;
}

</style>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $key; ?>"></script>
<script type="text/javascript">
(function($) {

function new_map( $el ) {
	
	// var
	var $markers = $el.find('.marker');
	
	
	// vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};
	
	
	// create map	        	
	var map = new google.maps.Map( $el[0], args);
	
	
	// add a markers reference
	map.markers = [];
	
	
	// add markers
	$markers.each(function(){
		
    	add_marker( $(this), map );
		
	});
	
	
	// center map
	center_map( map );
	
	
	// return
	return map;
	
}

function add_marker( $marker, map ) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
	 var MAP_PIN = 'M11.085,0C4.963,0,0,4.963,0,11.085c0,4.495,2.676,8.362,6.521,10.101l4.564,13.56l4.564-13.56\
    c3.846-1.739,6.521-5.606,6.521-10.101C22.17,4.963,17.208,0,11.085,0 M11.085,15.062c-2.182,0-3.95-1.769-3.95-3.95\
    c0-2.182,1.768-3.95,3.95-3.95s3.951,1.768,3.951,3.95C15.036,13.293,13.267,15.062,11.085,15.062'; 
	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map,
		icon: {
                path: MAP_PIN,
                fillColor: '#f1592a',
                fillOpacity: 1,
                strokeColor: '',
                strokeWeight: 0,
                scale: 1.5,
                anchor: new google.maps.Point(11, 38)
                },
	});

	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});

		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/
// global var
var map = null;

$(document).ready(function(){

	$('.acf-map').each(function(){

		// create map
		map = new_map( $(this) );

	});

});

})(jQuery);
</script>

<?php 

$contact_us_map = get_field('contact_us_map');

if( !empty($contact_us_map) ):
?>
<div class="acf-map map" >
	<div class="marker" data-lat="<?php echo $contact_us_map['lat']; ?>" data-lng="<?php echo $contact_us_map['lng']; ?>"></div>
</div>
<?php endif; ?>