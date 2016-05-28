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