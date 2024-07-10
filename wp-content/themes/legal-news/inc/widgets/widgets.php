<?php

// Posts Grid Widgets.
require get_template_directory() . '/inc/widgets/posts-grid-widget.php';

// Posts List Widgets.
require get_template_directory() . '/inc/widgets/posts-list-widget.php';

// Posts Tile and List Widgets.
require get_template_directory() . '/inc/widgets/posts-tile-and-list-widget.php';

// Post Slider Widgets.
require get_template_directory() . '/inc/widgets/posts-slider-widget.php';

// Post Carousel Widgets.
require get_template_directory() . '/inc/widgets/posts-carousel-widget.php';

// Author Info Widget.
require get_template_directory() . '/inc/widgets/info-author-widget.php';

// Social Icons Widget.
require get_template_directory() . '/inc/widgets/social-icons-widget.php';

/**
 * Register Widgets
 */
function legal_news_register_widgets() {

	register_widget( 'Legal_News_Posts_Grid_Widget' );

	register_widget( 'Legal_News_Posts_List_Widget' );

	register_widget( 'Legal_News_Posts_Tile_And_List_Widget' );

	register_widget( 'Legal_News_Posts_Slider_Widget' );

	register_widget( 'Legal_News_Posts_Carousel_Widget' );

	register_widget( 'Legal_News_Author_Info_Widget' );

	register_widget( 'Legal_News_Social_Icons_Widget' );

}
add_action( 'widgets_init', 'legal_news_register_widgets' );
