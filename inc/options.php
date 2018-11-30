<?php
// add the admin options page
add_action( 'admin_menu', 'wptaxime_admin_add_page' );

function wptaxime_admin_add_page() {
	$wptaximedashboard = __( 'WP Taxi Me - Settings', 'flistman' );
	$wptaximedashboardtitle = __( 'WP Taxi Me', 'flistman' );
	add_options_page( $wptaximedashboard, $wptaximedashboardtitle, 'manage_options', 'wptaxime_options_page', 'wptaxime_options_page' );
}






function wptaxime_options_page() {

	if ( is_user_logged_in() ) {
		 $current_user = wp_get_current_user();
	} else {
		 $current_user = '';
	}

	?>

	<div class="pea_admin_wrap">
		<div class="pea_admin_top">
			<h1><?php echo WP_TAXI_ME_PLUGIN_NAME?> <small> - <?php echo WP_TAXI_ME_PLUGIN_TAGLINE?></small></h1>
		</div>
		<div class="pea_admin_main_wrap">
			<div class="pea_admin_main_left">
				<div class="pea_admin_signup">
					<?php _e( 'Want to know about updates to this plugin without having to log into your site every time? Want to know about other cool plugins we\'ve made? Add your email and we\'ll add you to our very rare mail outs.', 'wp-taxi-me' ); ?>

					<!-- Begin MailChimp Signup Form -->
					<div id="mc_embed_signup">
						<form action="http://gospelrhys.us1.list-manage.com/subscribe/post?u=c656fe50ec16f06f152034ea9&amp;id=d9645e38c2" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
							<div class="mc-field-group">
								<label for="mce-EMAIL"> <?php _e( 'Email Address', 'inline-tweet-sharer' ); ?>
								</label>
								<input type="hidden" value="WP Taxi Me" name="SIGNUP" class="" id="mce-SIGNUP">
								<input type="email" value="<?php echo $current_user->user_email; ?>" name="EMAIL" class="required email" id="mce-EMAIL" tabindex="10">
								<button type="submit" name="subscribe" id="mc-embedded-subscribe" class="pea_admin_green"  tabindex="20">Sign Up!</button><br/>
								<label for="mce-MMERGE4">I want to Receive The Winwar Media Newsletter: </label>
								<input type="checkbox" value="yes" name="MMERGE4" class="" id="mce-MMERGE4" tabindex="15">

							</div>
							<div id="mce-responses" class="clear">
								<div class="response" id="mce-error-response" style="display:none"></div>
								<div class="response" id="mce-success-response" style="display:none"></div>
							</div>  <div class="clear"></div>
						</form>
					</div>
					<!--End mc_embed_signup-->

				</div>
				<form method="POST" action="options.php">
					<?php settings_fields( 'wptaxime_options' ); ?>
					<?php do_settings_sections( 'wptaxime_options_page' ); ?>
					<?php do_action( 'wptaxime_add_settings' ); ?>
					<?php submit_button(); ?>
				</form>
			</div>
			<div class="pea_admin_main_right">

				<?php if ( !defined( 'WP_TAXI_ME_HIDE_AD' ) ) { ?>

				<div class="pea_admin_box wptaxime_admin_box">
					<h2><?php _e( 'WP Taxi Me Pro', 'wp-taxi-me' ); ?></h2>

					<p class="pea_admin_clear"><?php _e( 'Want more features? WP Taxi Me Pro is the Premium version of WP Taxi Me, that allows you to do the following:-', 'wp-taxi-me' ); ?></p>

					<ul>
						<li><strong><?php _e( 'Lyft Integration', 'wp-taxi-me' ); ?>:</strong> <?php _e( 'Your city has Lyft? Great stuff! You can integrate Lyft with WP Taxi Me.', 'wp-taxi-me' ); ?></li>
						<li><strong><?php _e( 'Multiple Buttons/Locations', 'wp-taxi-me' ); ?>:</strong> <?php _e( 'If your business has multiple addresses, you can order taxis to each one.', 'wp-taxi-me' ); ?></li>
						<li><strong><?php _e( 'Button Stylings', 'wp-taxi-me' ); ?>:</strong> <?php _e( 'Easily style buttons using a graphical interface, allowing the button to fit the style of your site.', 'wp-taxi-me' ); ?></li>
						<li><strong><?php _e( 'Earn Money', 'wp-taxi-me' ); ?>:</strong> <?php _e( 'WP Taxi Me Pro allows you specify your own affiliate link on the "Register for Uber" button, earning you free taxis and money (if accepted to affiliate programme)', 'wp-taxi-me' ); ?></li>
					</ul>

					<p class="pea_admin_clear"><?php _e( 'To get a £5 discount, use the discount code ', 'wp-taxi-me' ); ?><strong>5FREE</strong>.</p>

					<p class="pea_admin_clear text-center"><a href="https://www.winwar.co.uk/plugins/wp-taxi-premium/?utm_source=options-page&utm_medium=plugin&utm_campaign=wptaxime"><button class="pea_admin_green"><?php _e( 'Buy WP Taxi Me Pro', 'wp-taxi-me' ); ?></button></a></p>

				</div>

				<?php } ?>

				
				<div class="pea_admin_box">

					<h2><?php _e( 'Like this Plugin?', 'wp-taxi-me' ); ?></h2>
					<a href="<?php echo WP_TAXI_ME_EXTEND_URL; ?>" target="_blank"><button type="submit" class="pea_admin_green"><?php _e( 'Rate this plugin', 'wp-taxi-me' ); ?> &#9733; &#9733; &#9733; &#9733; &#9733;</button></a><br><br>

					<div id="fb-root"></div>

					<script>(function(d, s, id) {
						var js, fjs = d.getElementsByTagName(s)[0];
						if (d.getElementById(id)) return;
						js = d.createElement(s); js.id = id;
						js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=181590835206577";
						fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
				</script>

				<div class="fb-like" data-href="<?php echo WP_TAXI_ME_PLUGIN_URL; ?>" data-send="true" data-layout="button_count" data-width="250" data-show-faces="true"></div>
				<br>
				<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo WP_TAXI_ME_PLUGIN_URL; ?>" data-text="Just been using <?php echo WP_TAXI_ME_PLUGIN_NAME; ?> #WordPress plugin" data-via="<?php echo WP_TAXI_ME_AUTHOR_TWITTER; ?>" data-related="WPBrewers">Tweet</a>

				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

				<br>
				<a href="http://bufferapp.com/add" class="buffer-add-button" data-text="Just been using <?php echo WP_TAXI_ME_PLUGIN_NAME; ?> #WordPress plugin" data-url="<?php echo WP_TAXI_ME_PLUGIN_URL; ?>" data-count="horizontal" data-via="<?php echo WP_TAXI_ME_AUTHOR_TWITTER; ?>">Buffer</a><script type="text/javascript" src="http://static.bufferapp.com/js/button.js"></script>

				<br>
				<div class="g-plusone" data-size="medium" data-href="<?php echo WP_TAXI_ME_PLUGIN_URL; ?>"></div>

				<script type="text/javascript">
					window.___gcfg = {lang: 'en-GB'};

					(function() {
						var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
						po.src = 'https://apis.google.com/js/plusone.js';
						var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
					})();
				</script>

				<br>

				<su:badge layout="3" location="<?php echo WP_TAXI_ME_PLUGIN_URL?>"></su:badge>

				<script type="text/javascript">
					(function() {
						var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true;
						li.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + '//platform.stumbleupon.com/1/widgets.js';
						var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s);
					})();
				</script>
			</div>


			<div class="pea_admin_box">
				<h2><?php _e( 'About the Author', 'wp-taxi-me' ); ?></h2>

				<?php
				$default = "http://reviews.evanscycles.com/static/0924-en_gb/noAvatar.gif";
				$size = 70;
				$rhys_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( "rhys@rhyswynne.co.uk" ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
				?>

				<p class="pea_admin_clear"><img class="pea_admin_fl" src="<?php echo $rhys_url; ?>" alt="Rhys Wynne" /> <h3>Rhys Wynne</h3><br><a href="https://twitter.com/winwaruk" class="twitter-follow-button" data-show-count="false">Follow @winwaruk</a>
					<div class="fb-subscribe" data-href="https://www.facebook.com/rhysywynne" data-layout="button_count" data-show-faces="false" data-width="220"></div>
				</p>

				<p class="pea_admin_clear"><?php _e( 'Rhys Wynne is a Digital Marketing Consultant currently at FireCask and a freelance WordPress developer and blogger. His plugins have had a total of 100,000 downloads, and his premium plugins have generated four figure sums in terms of sales. Rhys likes rubbish football (supporting Colwyn Bay FC) and Professional Wrestling.', 'wp-taxi-me' ); ?></p>

			</div>

		</div>
	</div>
	<?php
}

// add the admin settings and such
add_action( 'admin_init', 'wptaxime_admin_init', 1, 1 );

function wptaxime_admin_init() {

	/* SETTINGS PAGE */
	register_setting( 'wptaxime_options', 'wptaxime_options', 'wptaxime_options_validate' );
	add_settings_section( 'wptaxime_main', __( 'Main Settings', 'wp-taxi-me' ), 'wptaxime_main_text', 'wptaxime_options_page' );
	add_settings_field( 'wptaxime_business_name', __( 'Location Name', 'wp-taxi-me' ), 'wptaxime_business_name', 'wptaxime_options_page', 'wptaxime_main' );
	add_settings_field( 'wptaxime_address_1', __( 'Address 1', 'wp-taxi-me' ), 'wptaxime_address_1', 'wptaxime_options_page', 'wptaxime_main' );
	add_settings_field( 'wptaxime_address_2', __( 'Address 2', 'wp-taxi-me' ), 'wptaxime_address_2', 'wptaxime_options_page', 'wptaxime_main' );
	add_settings_field( 'wptaxime_state', __( 'State/County', 'wp-taxi-me' ), 'wptaxime_state', 'wptaxime_options_page', 'wptaxime_main' );
	add_settings_field( 'wptaxime_zip', __( 'Zip/Post Code', 'wp-taxi-me' ), 'wptaxime_zip', 'wptaxime_options_page', 'wptaxime_main' );
	add_settings_field( 'wptaxime_debug', __( 'Debug Mode', 'wp-taxi-me' ), 'wptaxime_debug', 'wptaxime_options_page', 'wptaxime_main' );

	add_settings_section( 'wptaxime_sharing', __( 'Sharing Settings', 'wp-taxi-me' ), 'wptaxime_sharing_text', 'wptaxime_options_page' );
	add_settings_field( 'wptaxime_registration', __( 'Show Register for Uber Button', 'wp-taxi-me' ), 'wptaxime_registrationlink', 'wptaxime_options_page', 'wptaxime_sharing' );
	add_settings_field( 'wptaxime_linkback', __( 'Link back to us (optional, but appreciated)', 'wp-taxi-me' ), 'wptaxime_linkback', 'wptaxime_options_page', 'wptaxime_sharing' );

	add_settings_section( 'wptaxime_api', __( 'API Settings', 'wp-taxi-me' ), 'wptaxime_apisettings_text', 'wptaxime_options_page' );
	add_settings_field( 'wptaxime_api_to_use', __( 'API to Use', 'wp-taxi-me' ), 'wptaxime_api_to_use', 'wptaxime_options_page', 'wptaxime_api' );
	add_settings_field( 'wptaxime_access_token', __( 'Access Token', 'wp-taxi-me' ), 'wptaxime_access_token', 'wptaxime_options_page', 'wptaxime_api' );

	do_action( 'wptaxime_do_options' );

}

function wptaxime_main_text() {
	?><p><?php _e( 'Here are the settings for your business for WP Taxi Me.', 'wp-taxi-me' ); ?></p>
	<?php
}

function wptaxime_business_name() {
	$options = get_option( 'wptaxime_options' );
	echo "<input id='wptaxime_business_name' name='wptaxime_options[business_name]' size='40' type='text' value='{$options['business_name']}' />";
}

function wptaxime_address_1() {
	$options = get_option( 'wptaxime_options' );
	echo "<input id='wptaxime_address_1' name='wptaxime_options[address_1]' size='40' type='text' value='{$options['address_1']}' />";
}

function wptaxime_address_2() {
	$options = get_option( 'wptaxime_options' );
	echo "<input id='wptaxime_address_2' name='wptaxime_options[address_2]' size='40' type='text' value='{$options['address_2']}' />";
}

function wptaxime_state() {
	$options = get_option( 'wptaxime_options' );
	echo "<input id='wptaxime_state' name='wptaxime_options[state]' size='40' type='text' value='{$options['state']}' />";
}

function wptaxime_zip() {
	$options = get_option( 'wptaxime_options' );
	echo "<input id='wptaxime_zip' name='wptaxime_options[zip]' size='40' type='text' value='{$options['zip']}' />";
}

function wptaxime_debug() {
	$options = get_option( 'wptaxime_options' );
	$debug = "";
	if ( isset ( $options['debug'] ) ) {
		$debug = $options['debug'];
	}
	echo "<input id='wptaxime_debug' name='wptaxime_options[debug]' type='checkbox' value='1' " . checked( $debug, 1, false ) . "/>";
}

function wptaxime_sharing_text() {
	?><p><?php _e( 'Here are some options to share WP Taxi Me.', 'wp-taxi-me' ); ?></p>
	<?php
}

function wptaxime_registrationlink() {
	$options = get_option( 'wptaxime_options' );
	$selected = "";

	if ( $options ) {
		if ( isset( $options['registration'] ) ) {
			$selected = $options['registration'];
		}
	}

	echo "<select id='wptaxime_registration' name='wptaxime_options[registration]'>
	<option value='nowhere' ".selected( 'Nowhere', $selected, false )." />".__( 'Show Nowhere', 'wptaxime' )."</option>
	<option value='everywhere' ".selected( 'everywhere', $selected, false )." />".__( 'Show Everywhere', 'wptaxime' )."</option>
	<option value='mobile' ".selected( 'mobile', $selected, false )." />".__( 'Show On Mobile Only', 'wptaxime' )."</option>
	<option value='desktop' ".selected( 'desktop', $selected, false )." />".__( 'Show On Desktop Only', 'wptaxime' )."</option>
	</select>";

}

function wptaxime_linkback() {
	$options = get_option( 'wptaxime_options' );
	echo "<input id='wptaxime_linkback' name='wptaxime_options[linkback]' type='checkbox' value='1' " . checked( $options['linkback'], 1, false ) . "/>";
}


function wptaxime_apisettings_text() {
	?><p><?php printf( __( 'From WP Taxi Me 2.3, you will need to sign up to an API such as Mapbox to use WP Taxi Me. <a href="%s">I discuss what you need to do in the documentation here</a>. Once you sign up to Mapbox <a href="%s">here</a>, you can get an access key to add to the box below.', 'wp-taxi-me' ), 'https://www.winwar.co.uk/documentation/wp-taxi-me/?utm_source=documentation&utm_medium=plugin&utm_campaign=wptaxime#13', 'https://www.mapbox.com' ); ?></p><?php
}

function wptaxime_api_to_use() {
	$options = get_option( 'wptaxime_options' );
	$selected = "";

	if ( $options ) {
		if ( isset( $options['apitouse'] ) ) {
			$selected = $options['apitouse'];
		}
	}

	echo "<select id='wptaxime_api_to_use' name='wptaxime_options[apitouse]'>
	<option value='mapbox' ".selected( 'mapbox', $selected, false )." />".__( 'Mapbox', 'wptaxime' )."</option>
	<option value='google' ".selected( 'google', $selected, false )." />".__( 'Google Maps Platform', 'wptaxime' )."</option>
	</select>";
}

function wptaxime_access_token() {
	$options = get_option( 'wptaxime_options' );
	echo "<input id='wptaxime_access_token' name='wptaxime_options[access_token]' size='40' type='text' value='{$options['access_token']}' />";
}

function wptaxime_options_validate( $input ) {

	$options = get_option( 'wptaxime_options' );
	$options['business_name'] = trim( $input['business_name'] );
	$options['address_1'] = trim( $input['address_1'] );
	$options['address_2'] = trim( $input['address_2'] );
	$options['state'] = trim( $input['state'] );
	$options['zip'] = trim( $input['zip'] );
	$options['access_token'] = trim( $input['access_token'] ); 
	$options['apitouse'] = trim( $input['apitouse'] ); 

	if (isset( $input['registration'] ) ) {
		$options['registration'] = trim( $input['registration'] );
	} else {
		$options['registration'] = FALSE;
	}

	if (isset( $input['linkback'] ) ) {
		$options['linkback'] = trim( $input['linkback'] );
	} else {
		$options['linkback'] = FALSE;
	}

	if (isset( $input['debug'] ) ) {
		$options['debug'] = trim( $input['debug'] );
	} else {
		$options['debug'] = FALSE;
	}

	$addressstring = $input['address_1'] . " " . $input['address_2'] . " " . $input['state'] . " " . $input['zip'];
	$geoloc = wptaxime_get_latlng_address( $addressstring, $options['access_token'], $options['apitouse'] );

	$options['lat'] = $geoloc['lat'];
	$options['lng'] = $geoloc['lng'];

	$options = apply_filters( 'wptaxime_save_options', $options, $input );

	return $options;
}





/*

	Function:

*/
	function wptaxime_add_admin_stylesheet() {

		wp_register_style( 'wp-taxi-me-admin-style', plugins_url( 'css/admin-css.css', __FILE__ ), array(), '0.5' );
		wp_enqueue_style( 'wp-taxi-me-admin-style' );

	} add_action( 'admin_init', 'wptaxime_add_admin_stylesheet' );



	?>
