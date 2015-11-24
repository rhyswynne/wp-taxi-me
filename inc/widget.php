<?php

class WP_Taxi_Me_Widget_class extends WP_Widget {

	function WP_Taxi_Me_Widget_class() {
		parent::__construct( 'wp_taxi_me_widget', 'WP Taxi Me', array( 'description' => 'Add WP Taxi Me to the sidebar' ) );
	}


	function widget( $args, $instance ) {



		// $args is an array of strings which help your widget
		// conform to the active theme: before_widget, before_title,
		// after_widget, and after_title are the array keys.

		extract( $args );
		extract( $args, EXTR_SKIP );

		$title = empty( $instance['widget_title'] ) ? _( 'Get a Taxi', 'wp-taxi-me' ) : apply_filters( 'widget_title', $instance['widget_title'] );
		$text = empty( $instance['widget_text'] ) ? '' : $instance['widget_text'];

		echo $before_widget;

		echo $before_title . $title . $after_title;

		echo "<p>" . $text . "</p>";

		echo wptaxime_build_button();

		echo $after_widget;


	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['widget_title'] = strip_tags( $new_instance['widget_title'] );
		$instance['widget_text'] = strip_tags( $new_instance['widget_text'] );
		return $instance;
	}

	/**
	 * admin control form
	 */
	function form( $instance ) {
		$default =  array( 'widget_title' => __( 'Get a Taxi' ), 'widget_text' => __( '' ) );
		$instance = wp_parse_args( (array) $instance, $default );
		$title_id = "";
		$title_name = "";
		$text_id = "";
		$text_name = "";
		$title_id = $this->get_field_id( 'widget_title' );
		$title_name = $this->get_field_name( 'widget_title' );
		$text_id = $this->get_field_id( 'widget_text' );
		$text_name = $this->get_field_name( 'widget_text' );
		echo "\r\n".'<p><label for="'.$title_id.'">'.__( 'Title' ).': <input type="text" class="widefat" id="'.$title_id.'" name="'.$title_name.'" value="'.esc_attr( $instance['widget_title'] ).'" /><label></p>';
		echo "\r\n".'<p><label for="'.$text_id.'">'.__( 'Text' ).': <input type="text" class="widefat" id="'.$text_id.'" name="'.$text_name .'" value="'.esc_attr( $instance['widget_text'] ).'" /><label></p>';

	}

}

add_action( 'widgets_init', 'wptaxime_enable_widget' );

function wptaxime_enable_widget() {
	register_widget( 'WP_Taxi_Me_Widget_class' );
}

?>