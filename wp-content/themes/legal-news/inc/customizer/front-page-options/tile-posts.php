<?php
/**
 * Tile Posts Section
 *
 * @package Legal_News
 */

$wp_customize->add_section(
	'legal_news_tile_posts_section',
	array(
		'panel'    => 'legal_news_front_page_options',
		'title'    => esc_html__( 'Tile Posts Section', 'legal-news' ),
		'priority' => 30,
	)
);

// Tile Posts Section - Enable Section.
$wp_customize->add_setting(
	'legal_news_enable_tile_posts_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'legal_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Legal_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'legal_news_enable_tile_posts_section',
		array(
			'label'    => esc_html__( 'Enable Tile Posts Section', 'legal-news' ),
			'section'  => 'legal_news_tile_posts_section',
			'settings' => 'legal_news_enable_tile_posts_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'legal_news_enable_tile_posts_section',
		array(
			'selector' => '#legal_news_tile_posts_section .section-link',
			'settings' => 'legal_news_enable_tile_posts_section',
		)
	);
}

// Tile Posts Section - Section Title.
$wp_customize->add_setting(
	'legal_news_tile_posts_title',
	array(
		'default'           => __( 'Tile Posts', 'legal-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'legal_news_tile_posts_title',
	array(
		'label'           => esc_html__( 'Section Title', 'legal-news' ),
		'section'         => 'legal_news_tile_posts_section',
		'settings'        => 'legal_news_tile_posts_title',
		'type'            => 'text',
		'active_callback' => 'legal_news_is_tile_posts_section_enabled',
	)
);

// Tile Posts Section - Content Type.
$wp_customize->add_setting(
	'legal_news_tile_posts_content_type',
	array(
		'default'           => 'category',
		'sanitize_callback' => 'legal_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'legal_news_tile_posts_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'legal-news' ),
		'section'         => 'legal_news_tile_posts_section',
		'settings'        => 'legal_news_tile_posts_content_type',
		'type'            => 'select',
		'active_callback' => 'legal_news_is_tile_posts_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'legal-news' ),
			'category' => esc_html__( 'Category', 'legal-news' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {
	// Tile Posts Section - Select Post.
	$wp_customize->add_setting(
		'legal_news_tile_posts_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'legal_news_tile_posts_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'legal-news' ), $i ),
			'section'         => 'legal_news_tile_posts_section',
			'settings'        => 'legal_news_tile_posts_content_post_' . $i,
			'active_callback' => 'legal_news_is_tile_posts_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => legal_news_get_post_choices(),
		)
	);

	// Tile Posts Section - Select Page.
	$wp_customize->add_setting(
		'legal_news_tile_posts_content_page_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'legal_news_tile_posts_content_page_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Page %d', 'legal-news' ), $i ),
			'section'         => 'legal_news_tile_posts_section',
			'settings'        => 'legal_news_tile_posts_content_page_' . $i,
			'active_callback' => 'legal_news_is_tile_posts_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => legal_news_get_page_choices(),
		)
	);

}

// Tile Posts Section - Select Category.
$wp_customize->add_setting(
	'legal_news_tile_posts_content_category',
	array(
		'sanitize_callback' => 'legal_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'legal_news_tile_posts_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'legal-news' ),
		'section'         => 'legal_news_tile_posts_section',
		'settings'        => 'legal_news_tile_posts_content_category',
		'active_callback' => 'legal_news_is_tile_posts_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => legal_news_get_post_cat_choices(),
	)
);

// Tile Posts Section - Button Label.
$wp_customize->add_setting(
	'legal_news_tile_posts_button_label',
	array(
		'default'           => __( 'View All', 'legal-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'legal_news_tile_posts_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'legal-news' ),
		'section'         => 'legal_news_tile_posts_section',
		'settings'        => 'legal_news_tile_posts_button_label',
		'type'            => 'text',
		'active_callback' => 'legal_news_is_tile_posts_section_enabled',
	)
);

// Posts Tile Section - Button Link.
$wp_customize->add_setting(
	'legal_news_tile_posts_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'legal_news_tile_posts_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'legal-news' ),
		'section'         => 'legal_news_tile_posts_section',
		'settings'        => 'legal_news_tile_posts_button_link',
		'type'            => 'url',
		'active_callback' => 'legal_news_is_tile_posts_section_enabled',
	)
);
