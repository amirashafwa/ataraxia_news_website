<?php

// List Posts Widget.
require get_theme_file_path() . '/inc/widgets/list-posts-widget.php';

// Featured Posts Widget.
require get_theme_file_path() . '/inc/widgets/featured-posts-widget.php';

/**
 * Register Widgets
 */
function valid_news_register_widgets() {

	register_widget( 'Valid_News_List_Posts_Widget' );

	register_widget( 'Fact_News_Featured_Posts_Widget' );

}
add_action( 'widgets_init', 'valid_news_register_widgets' );
