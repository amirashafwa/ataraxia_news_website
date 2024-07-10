<?php
/**
 * Breadcrumb
 *
 * @package Legal_News
 */

$wp_customize->add_section(
	'legal_news_breadcrumb',
	array(
		'title' => esc_html__( 'Breadcrumb', 'legal-news' ),
		'panel' => 'legal_news_theme_options',
	)
);

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'legal_news_enable_breadcrumb',
	array(
		'sanitize_callback' => 'legal_news_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Legal_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'legal_news_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'legal-news' ),
			'section' => 'legal_news_breadcrumb',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'legal_news_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'legal_news_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'legal-news' ),
		'active_callback' => 'legal_news_is_breadcrumb_enabled',
		'section'         => 'legal_news_breadcrumb',
	)
);
