<?php
/**
 * Frontpage Sidebar Position
 *
 * @package Legal_News
 */

$wp_customize->add_section(
	'legal_news_frontpage_sidebar',
	array(
		'panel' => 'legal_news_theme_options',
		'title' => esc_html__( 'Frontpage Sidebar Position', 'legal-news' ),
	)
);

// Frontpage Sidebar Position - Frontpage Sidebar Position.
$wp_customize->add_setting(
	'legal_news_frontpage_sidebar_position',
	array(
		'default'           => 'frontpage-right-sidebar',
		'sanitize_callback' => 'legal_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'legal_news_frontpage_sidebar_position',
	array(
		'label'    => esc_html__( 'Frontpage Sidebar Position', 'legal-news' ),
		'section'  => 'legal_news_frontpage_sidebar',
		'settings' => 'legal_news_frontpage_sidebar_position',
		'type'     => 'select',
		'choices'  => array(
			'frontpage-left-sidebar'  => __( 'Frontpage Left Sidebar', 'legal-news' ),
			'frontpage-right-sidebar' => __( 'Frontpage Right Sidebar', 'legal-news' ),
		),
	)
);
