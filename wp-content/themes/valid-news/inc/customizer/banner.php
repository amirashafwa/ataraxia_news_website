<?php
/**
 * Adore Themes Customizer
 *
 * @package Valid News
 *
 * Banner Section
 */

// Featured Posts Sub Heading.
$wp_customize->add_setting(
	'valid_news_featured_posts_sub_heading',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Valid_News_Sub_Section_Heading_Custom_Control(
		$wp_customize,
		'valid_news_featured_posts_sub_heading',
		array(
			'label'           => esc_html__( 'Featured Posts Section', 'valid-news' ),
			'settings'        => 'valid_news_featured_posts_sub_heading',
			'section'         => 'fact_news_banner_section',
			'active_callback' => 'fact_news_if_banner_enabled',
			'priority'        => 12,
		)
	)
);

// banner featured posts content type settings.
$wp_customize->add_setting(
	'valid_news_featured_posts_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'fact_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'valid_news_featured_posts_content_type',
	array(
		'label'           => esc_html__( 'Featured Posts Content type:', 'valid-news' ),
		'description'     => esc_html__( 'Choose where you want to render the content from.', 'valid-news' ),
		'section'         => 'fact_news_banner_section',
		'settings'        => 'valid_news_featured_posts_content_type',
		'type'            => 'select',
		'active_callback' => 'fact_news_if_banner_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'valid-news' ),
			'category' => esc_html__( 'Category', 'valid-news' ),
		),
		'priority'        => 14,
	)
);

for ( $i = 1; $i <= 2; $i++ ) {
	// Featured Posts post setting.
	$wp_customize->add_setting(
		'valid_news_featured_posts_post_' . $i,
		array(
			'sanitize_callback' => 'fact_news_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'valid_news_featured_posts_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Post %d', 'valid-news' ), $i ),
			'section'         => 'fact_news_banner_section',
			'type'            => 'select',
			'choices'         => fact_news_get_post_choices(),
			'active_callback' => 'valid_news_featured_posts_section_content_type_post_enabled',
			'priority'        => 16,
		)
	);

}

// Featured Posts category setting.
$wp_customize->add_setting(
	'valid_news_featured_posts_category',
	array(
		'sanitize_callback' => 'fact_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'valid_news_featured_posts_category',
	array(
		'label'           => esc_html__( 'Category', 'valid-news' ),
		'section'         => 'fact_news_banner_section',
		'type'            => 'select',
		'choices'         => fact_news_get_post_cat_choices(),
		'active_callback' => 'valid_news_featured_posts_section_content_type_category_enabled',
		'priority'        => 18,
	)
);

/*========================Active Callback==============================*/
// banner featured posts
function valid_news_featured_posts_section_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'valid_news_featured_posts_content_type' )->value();
	return fact_news_if_banner_enabled( $control ) && ( 'post' === $content_type );
}
function valid_news_featured_posts_section_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'valid_news_featured_posts_content_type' )->value();
	return fact_news_if_banner_enabled( $control ) && ( 'category' === $content_type );
}