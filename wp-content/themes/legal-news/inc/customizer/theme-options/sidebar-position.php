<?php
/**
 * Sidebar Position
 *
 * @package Legal_News
 */

$wp_customize->add_section(
	'legal_news_sidebar_position',
	array(
		'title' => esc_html__( 'Sidebar Position', 'legal-news' ),
		'panel' => 'legal_news_theme_options',
	)
);

// Sidebar Position - Global Sidebar Position.
$wp_customize->add_setting(
	'legal_news_sidebar_position',
	array(
		'sanitize_callback' => 'legal_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'legal_news_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'legal-news' ),
		'section' => 'legal_news_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'legal-news' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'legal-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'legal-news' ),
		),
	)
);

// Sidebar Position - Post Sidebar Position.
$wp_customize->add_setting(
	'legal_news_post_sidebar_position',
	array(
		'sanitize_callback' => 'legal_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'legal_news_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'legal-news' ),
		'section' => 'legal_news_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'legal-news' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'legal-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'legal-news' ),
		),
	)
);

// Sidebar Position - Page Sidebar Position.
$wp_customize->add_setting(
	'legal_news_page_sidebar_position',
	array(
		'sanitize_callback' => 'legal_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'legal_news_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'legal-news' ),
		'section' => 'legal_news_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'legal-news' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'legal-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'legal-news' ),
		),
	)
);
