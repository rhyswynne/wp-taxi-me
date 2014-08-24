<?php


/*

	Function: Enqueue the CSS & scripts associated with the plugins.

*/
function wptaxime_enqueue_scipts() {
	wp_enqueue_style( 'taxime-css', plugins_url( 'css/taximebutton.css', __FILE__ ), array(), '0.5' );
}
add_action( 'wp_enqueue_scripts', 'wptaxime_enqueue_scipts' );










/*

	Function: Builds the button for WP Uber Me

*/
function wptaxime_build_button() {

	$options = get_option( 'wptaxime_options' );

	$name = rawurlencode( $options['business_name'] );
	$address = $options['address_1'] . " " . $options['address_2'] . " " . $options['state'] . " " . $options['zip'];

	$geoloc = wptaxime_get_latlng_address( $address );

	$address = rawurlencode( $address );

	$echostring = '';

	if ( wp_is_mobile() ) {

	$echostring = '<p class="taxibuttonwrapper"><a href="uber://?action=setPickup&pickup=my_location&dropoff[nickname]='. $name .'&dropoff[formatted_address]=' . $address . '&dropoff[latitude]='. $geoloc['lat'] .'&dropoff[longitude]='. $geoloc['lng'] .'" class="taximebutton">'. __( 'Book A Taxi Here', 'wptaxime' ) . '</a></p>';

	} 

	if ( $options['registration'] ) {
		$echostring .= '<p class="taxibuttonwrapper"><a href="https://www.uber.com/invite/s94j3" class="taximebutton">' . __( 'Register for Uber', 'wptaxime' ) . '</a></p>';
	}

	if ( $options['linkback'] ) {

		$echostring .= '<p class="taxibuttonwrapper"><a href="' . WP_TAXI_ME_PLUGIN_URL .'">WP Taxi Me</a> ' . __( 'by', 'wptaxime' ) . ' <a href="http://winwar.co.uk/">Winwar Media</a>';

	}

	return $echostring;

}






/*

	Function: Get latitude & longitude for an address.

*/
function wptaxime_get_latlng_address( $address ) {

	$prepAddr = str_replace( ' ', '+', $address );
	$geocode=file_get_contents( 'http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false' );
	$output = json_decode( $geocode );

	//format into a better array.
	$returnarray = array(

		'lat' => $output->results[0]->geometry->location->lat,
		'lng' => $output->results[0]->geometry->location->lng

	);

	return $returnarray;

}






/*

	Function: Adds the shortcode "taxi-me", which adds the taxi button to the text.

*/
function wptaxime_taxi_button_shortcode() {
return wptaxime_build_button();
}
add_shortcode( 'taxi-me', 'wptaxime_taxi_button_shortcode' );
?>
