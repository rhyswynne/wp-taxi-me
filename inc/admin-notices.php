<?php

/**
 * Display the setup notice if the plugin hasn't been set up yet.
 * 
 * @return void
 */
function wptaxime_display_setup_notice() {

	$options = get_option( 'wptaxime_options' );

	if ( !is_array( $options ) ) {	

		echo '<div class="notice notice-warning is-dismissible"><p>';
		printf( __( 'Thank you for installing WP Taxi Me! This plugin needs to be set up before it works. Please visit the <a href="%s">WP Taxi Me Settings page</a> to set up the plugin.', 'wp-taxi-me' ), admin_url( 'options-general.php?page=wptaxime_options_page' ) );
		echo "</p></div>";

	}

} add_action( 'admin_notices', 'wptaxime_display_setup_notice' );


/**
 * Add the Admin Notice should the access token not exist
 *
 * @return void
 */
function wptaxime_display_access_token_notice() {
	
	$options = get_option( 'wptaxime_options' );

	if ( !array_key_exists( 'access_token', $options ) && is_array( $options ) ) {	

		echo '<div class="notice notice-warning is-dismissible"><p>';
		printf( __( 'Thank you for upgrading WP Taxi Me to version 2.3! This version has changed API for the time being from Google Maps to Mapbox. You will need to setup a Mapbox token <a href="%s">as described here</a>. Once done, please add it to the new API Key section on the <a href="%s">WP Taxi Me Settings page</a>.', 'wp-taxi-me' ), 'https://www.winwar.co.uk/documentation/wp-taxi-me/?utm_source=2point3notice&utm_medium=plugin&utm_campaign=wptaxime#13', admin_url( 'options-general.php?page=wptaxime_options_page' ) );
		echo "</p></div>";

	}
}
add_action( 'admin_notices', 'wptaxime_display_access_token_notice' );