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

		// Do a check to make sure that we have set the lat/lng. If not, get it.
		if ( !array_key_exists( 'lat', $options ) || !array_key_exists( 'lng', $options ) ) {

			$geoloc = wptaxime_get_latlng_address( $address );

			$options['lat'] = $geoloc['lat'];
			$options['lng'] = $geoloc['lng'];

		}

		$address = rawurlencode( $address );

		$echostring = '';

		if ( !empty($options['debug']) || ( $options['debug'] ) ) {
			
			$buttontext = apply_filters( 'wptaxime_button_text', __( 'Book A Taxi Here', 'wptaxime' )  );
			$echostring = '<p class="taxibuttonwrapper"><a href="uber://?action=setPickup&pickup=my_location&dropoff[nickname]='. $name .'&dropoff[formatted_address]=' . $address . '&dropoff[latitude]='. $options['lat'] .'&dropoff[longitude]='. $options['lng'] .'" class="taximebutton">'. $buttontext . '</a></p>';
			
		} else {

			if ( wp_is_mobile() ) {

				$buttontext = apply_filters( 'wptaxime_button_text', __( 'Book A Taxi Here', 'wptaxime' )  );
				$echostring = '<p class="taxibuttonwrapper"><a href="uber://?action=setPickup&pickup=my_location&dropoff[nickname]='. $name .'&dropoff[formatted_address]=' . $address . '&dropoff[latitude]='. $options['lat'] .'&dropoff[longitude]='. $options['lng'] .'" class="taximebutton">'. $buttontext . '</a></p>';

			}

		}

		if ( $options['registration'] ) {
			$afflink = apply_filters( 'wptaxime_change_afflink', 'https://www.uber.com/invite/s94j3' );

			$echostring .= '<p class="taxibuttonwrapper"><a href="'.$afflink.'" class="taximebutton">' . __( 'Register for Uber', 'wptaxime' ) . '</a></p>';
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
