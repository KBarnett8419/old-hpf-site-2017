<?php 
add_action( 'widgets_init', 'hmp_load_widgets' );

/**
 * Register our widget.
 * 'hmp_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function hmp_load_widgets() {
	register_widget( 'hmp_Widget' );
}

/**
 * hmp Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class hmp_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function hmp_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'hmp', 'description' => __('Html5 player widget to show player on the site', 'hmp') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'hmp-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'hmp-widget', __('Html5 Player  Widget', 'hmp'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$playlist_name = $instance['playlist_name'];
		

		/* Before widget (defined by themes). */
		echo $before_widget;
		
		/* If show sex was selected, display the user's sex. */
		
			//printf( '<p>' . __('I am a %1$s.', 'hmp.') . '</p>', $playlist_name );
			echo do_shortcode($playlist_name);
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		

		/* No need to strip tags for sex and show_sex. */
		$instance['playlist_name'] = $new_instance['playlist_name'];
		

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		
		$instance = wp_parse_args( $instance ); ?>

		<!-- Select Playlist -->
		<p>
			<label for="<?php echo $this->get_field_id( 'playlist_name' ); ?>"><?php _e('Select Playlist:', 'hmp'); ?></label> 
			<select id="<?php echo $this->get_field_id( 'playlist_name' ); ?>" name="<?php echo $this->get_field_name( 'playlist_name' ); ?>" class="widefat" style="width:100%;">
            <?php
			global $wpdb;
			$table		=	$wpdb->prefix."hmp_playlists";
			$sql		=	"SELECT * FROM $table";
			$results 	= 	$wpdb->get_results( $sql );
			 ?>
             <?php foreach( $results as $result ): ?>
				<option value="<?php echo $short	= str_replace('"', "'", $result->shortcode); ?>"><?php echo $result->playlist_name; ?></option>
              <?php endforeach; ?>
				
			</select>
		</p>


	<?php
	}
}