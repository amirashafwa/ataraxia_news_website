<?php
/**
 * Theme Customizer
 *
 * @package Apex_News
 */

function apex_news_customize_register( $wp_customize ) {

	require get_theme_file_path() . '/inc/customizer/post-carousel.php';

	// Upsell Section.
	$wp_customize->add_section(
		new Apex_News_Upsell_Section(
			$wp_customize,
			'upsell_sections',
			array(
				'title'            => __( 'Apex News Pro', 'apex-news' ),
				'button_text'      => __( 'Buy Pro', 'apex-news' ),
				'url'              => 'https://ascendoor.com/themes/apex-news-pro/',
				'background_color' => '#3e8de3',
				'text_color'       => '#fff',
				'priority'         => 0,
			)
		)
	);

}
add_action( 'customize_register', 'apex_news_customize_register' );

function apex_news_customize_preview_js() {
	wp_enqueue_script( 'apex-news-customizer', get_stylesheet_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview', 'legal-news-customizer' ), LEGAL_NEWS_VERSION, true );
}
add_action( 'customize_preview_init', 'apex_news_customize_preview_js' );

function apex_news_custom_control_scripts() {
	wp_enqueue_style( 'apex-news-custom-controls-css', get_stylesheet_directory_uri() . '/assets/css/custom-controls.css', array( 'legal-news-custom-controls-css' ), '1.0', 'all' );
	wp_enqueue_script( 'apex-news-custom-controls-js', get_stylesheet_directory_uri() . '/assets/js/custom-controls.js', array( 'legal-news-custom-controls-js', 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'apex_news_custom_control_scripts' );

/*=====================Active Callback=================*/

// Posts Carousel section.
function apex_news_is_post_carousel_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'apex_news_enable_post_carousel_section' )->value() );
}
function apex_news_is_post_carousel_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'apex_news_post_carousel_content_type' )->value();
	return ( apex_news_is_post_carousel_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function apex_news_is_post_carousel_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'apex_news_post_carousel_content_type' )->value();
	return ( apex_news_is_post_carousel_section_enabled( $control ) && ( 'category' === $content_type ) );
}
