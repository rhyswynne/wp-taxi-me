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

	$name = urlencode( $options['business_name'] );
	$address = urlencode( $options['address_1'] . $options['address_2'] . $options['state'] . $options['zip'] );

	$echostring = '';

	if ( wp_is_mobile() ) {

		$echostring = '<p class="taxibuttonwrapper"><a href="uber://?action=setPickup&pickup=my_location&dropoff=' . $address . '" class="taximebutton">'. __( 'Book A Taxi Here', 'wptaxime' ) . '</a></p>';

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

	Function: Adds the shortcode "taxi-me", which adds the taxi button to the text.

*/
function wptaxime_taxi_button_shortcode() {
	return wptaxime_build_button();
}
add_shortcode( 'taxi-me', 'wptaxime_taxi_button_shortcode' );
?>
