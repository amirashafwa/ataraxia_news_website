<?php
/**
 * Banner Section
 *
 * @package Legal_News
 */

$wp_customize->add_section(
	'legal_news_banner_section',
	array(
		'panel'    => 'legal_news_front_page_options',
		'title'    => esc_html__( 'Banner Section', 'legal-news' ),
		'priority' => 20,
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'legal_news_enable_banner_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'legal_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Legal_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'legal_news_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'legal-news' ),
			'section'  => 'legal_news_banner_section',
			'settings' => 'legal_news_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'legal_news_enable_banner_section',
		array(
			'selector' => '#legal_news_banner_section .section-link',
			'settings' => 'legal_news_enable_banner_section',
		)
	);
}

// Banner Section - Main Banner Title.
$wp_customize->add_setting(
	'legal_news_main_banner_title',
	array(
		'default'           => __( 'Main News', 'legal-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'legal_news_main_banner_title',
	array(
		'label'           => esc_html__( 'Banner Title', 'legal-news' ),
		'section'         => 'legal_news_banner_section',
		'settings'        => 'legal_news_main_banner_title',
		'type'            => 'text',
		'active_callback' => 'legal_news_is_banner_slider_section_enabled',
	)
);

// Banner Section - Main Banner Slider Content Type.
$wp_customize->add_setting(
	'legal_news_main_banner_slider_content_type',
	array(
		'default'           => 'category',
		'sanitize_callback' => 'legal_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'legal_news_main_banner_slider_content_type',
	array(
		'label'           => esc_html__( 'Select Banner Slider Content Type', 'legal-news' ),
		'section'         => 'legal_news_banner_section',
		'settings'        => 'legal_news_main_banner_slider_content_type',
		'type'            => 'select',
		'active_callback' => 'legal_news_is_banner_slider_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'legal-news' ),
			'category' => esc_html__( 'Category', 'legal-news' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {
	// Banner Section - Select Main Banner Post.
	$wp_customize->add_setting(
		'legal_news_main_banner_slider_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'legal_news_main_banner_slider_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'legal-news' ), $i ),
			'section'         => 'legal_news_banner_section',
			'settings'        => 'legal_news_main_banner_slider_content_post_' . $i,
			'active_callback' => 'legal_news_is_banner_slider_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => legal_news_get_post_choices(),
		)
	);

}

// Banner Section - Select Main Banner Category.
$wp_customize->add_setting(
	'legal_news_main_banner_slider_content_category',
	array(
		'sanitize_callback' => 'legal_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'legal_news_main_banner_slider_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'legal-news' ),
		'section'         => 'legal_news_banner_section',
		'settings'        => 'legal_news_main_banner_slider_content_category',
		'active_callback' => 'legal_news_is_banner_slider_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => legal_news_get_post_cat_choices(),
	)
);

// Banner Section - Horizontal Line.
$wp_customize->add_setting(
	'legal_news_banner_horizontal_line',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Legal_News_Customize_Horizontal_Line(
		$wp_customize,
		'legal_news_banner_horizontal_line',
		array(
			'section'         => 'legal_news_banner_section',
			'settings'        => 'legal_news_banner_horizontal_line',
			'active_callback' => 'legal_news_is_banner_slider_section_enabled',
			'type'            => 'hr',
		)
	)
);

// Banner Section - Editor Picks Title.
$wp_customize->add_setting(
	'legal_news_editor_picks_title',
	array(
		'default'           => __( 'Editor Picks', 'legal-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'legal_news_editor_picks_title',
	array(
		'label'           => esc_html__( 'Editor\'s Picks Title', 'legal-news' ),
		'section'         => 'legal_news_banner_section',
		'settings'        => 'legal_news_editor_picks_title',
		'active_callback' => 'legal_news_is_banner_slider_section_enabled',
		'type'            => 'text',
	)
);

// Banner Section - Editor Picks Content Type.
$wp_customize->add_setting(
	'legal_news_editor_picks_content_type',
	array(
		'default'           => 'category',
		'sanitize_callback' => 'legal_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'legal_news_editor_picks_content_type',
	array(
		'label'           => esc_html__( 'Select Editor\'s Picks Content Type', 'legal-news' ),
		'section'         => 'legal_news_banner_section',
		'settings'        => 'legal_news_editor_picks_content_type',
		'active_callback' => 'legal_news_is_banner_slider_section_enabled',
		'type'            => 'select',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'legal-news' ),
			'category' => esc_html__( 'Category', 'legal-news' ),
		),
	)
);

for ( $i = 1; $i <= 2; $i++ ) {
	// Banner Section - Editor Picks Select Post.
	$wp_customize->add_setting(
		'legal_news_editor_picks_post_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'legal_news_editor_picks_post_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'legal-news' ), $i ),
			'section'         => 'legal_news_banner_section',
			'settings'        => 'legal_news_editor_picks_post_content_post_' . $i,
			'active_callback' => 'legal_news_is_editor_picks_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => legal_news_get_post_choices(),
		)
	);

}

// Banner Section - Editor Picks Select Category.
$wp_customize->add_setting(
	'legal_news_editor_picks_post_content_category',
	array(
		'sanitize_callback' => 'legal_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'legal_news_editor_picks_post_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'legal-news' ),
		'section'         => 'legal_news_banner_section',
		'settings'        => 'legal_news_editor_picks_post_content_category',
		'active_callback' => 'legal_news_is_editor_picks_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => legal_news_get_post_cat_choices(),
	)
);

// Banner Section - Horizontal Line.
$wp_customize->add_setting(
	'legal_news_editor_picks_horizontal_line',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Legal_News_Customize_Horizontal_Line(
		$wp_customize,
		'legal_news_editor_picks_horizontal_line',
		array(
			'section'         => 'legal_news_banner_section',
			'settings'        => 'legal_news_editor_picks_horizontal_line',
			'active_callback' => 'legal_news_is_banner_slider_section_enabled',
			'type'            => 'hr',
		)
	)
);

// Banner Section - Trending Title.
$wp_customize->add_setting(
	'legal_news_trending_title',
	array(
		'default'           => __( 'Trending', 'legal-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'legal_news_trending_title',
	array(
		'label'           => esc_html__( 'Trending Title', 'legal-news' ),
		'section'         => 'legal_news_banner_section',
		'settings'        => 'legal_news_trending_title',
		'active_callback' => 'legal_news_is_banner_slider_section_enabled',
		'type'            => 'text',
	)
);

// Banner Section - Trending Slider Content Type.
$wp_customize->add_setting(
	'legal_news_trending_slider_content_type',
	array(
		'default'           => 'category',
		'sanitize_callback' => 'legal_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'legal_news_trending_slider_content_type',
	array(
		'label'           => esc_html__( 'Select Trending Content Type', 'legal-news' ),
		'section'         => 'legal_news_banner_section',
		'settings'        => 'legal_news_trending_slider_content_type',
		'active_callback' => 'legal_news_is_banner_slider_section_enabled',
		'type'            => 'select',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'legal-news' ),
			'category' => esc_html__( 'Category', 'legal-news' ),
		),
	)
);

for ( $i = 1; $i <= 6; $i++ ) {
	// Banner Section - Select Trending Post.
	$wp_customize->add_setting(
		'legal_news_trending_slider_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'legal_news_trending_slider_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'legal-news' ), $i ),
			'section'         => 'legal_news_banner_section',
			'settings'        => 'legal_news_trending_slider_content_post_' . $i,
			'active_callback' => 'legal_news_is_trending_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => legal_news_get_post_choices(),
		)
	);

}

// Banner Section - Select Trending Category.
$wp_customize->add_setting(
	'legal_news_trending_slider_content_category',
	array(
		'sanitize_callback' => 'legal_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'legal_news_trending_slider_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'legal-news' ),
		'section'         => 'legal_news_banner_section',
		'settings'        => 'legal_news_trending_slider_content_category',
		'active_callback' => 'legal_news_is_trending_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => legal_news_get_post_cat_choices(),
	)
);
