<?php

// Featured Posts Widget.
require get_template_directory() . '/inc/widgets/featured-posts-widget.php';

// Social Widget.
require get_template_directory() . '/inc/widgets/social-widget.php';

/**
 * Register Widgets
 */
function recent_blog_register_widgets() {

	register_widget( 'Recent_Blog_Featured_Posts_Widget' );

	register_widget( 'Recent_Blog_Social_Widget' );

}
add_action( 'widgets_init', 'recent_blog_register_widgets' );
