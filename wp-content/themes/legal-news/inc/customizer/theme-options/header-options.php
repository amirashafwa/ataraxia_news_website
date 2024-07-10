<?php
/**
 * Header Options
 *
 * @package Legal_News
 */

$wp_customize->add_section(
	'legal_news_header_options',
	array(
		'panel' => 'legal_news_theme_options',
		'title' => esc_html__( 'Header Options', 'legal-news' ),
	)
);

// Header Options - Enable Topbar.
$wp_customize->add_setting(
	'legal_news_enable_topbar',
	array(
		'sanitize_callback' => 'legal_news_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Legal_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'legal_news_enable_topbar',
		array(
			'label'   => esc_html__( 'Enable Topbar', 'legal-news' ),
			'section' => 'legal_news_header_options',
		)
	)
);

// Header Section - Advertisement.
$wp_customize->add_setting(
	'legal_news_header_advertisement',
	array(
		'sanitize_callback' => 'legal_news_sanitize_image',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'legal_news_header_advertisement',
		array(
			'label'    => esc_html__( 'Advertisement', 'legal-news' ),
			'section'  => 'legal_news_header_options',
			'settings' => 'legal_news_header_advertisement',
		)
	)
);

// Header Section - Advertisement URL.
$wp_customize->add_setting(
	'legal_news_header_advertisement_url',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'legal_news_header_advertisement_url',
	array(
		'label'    => esc_html__( 'Advertisement URL', 'legal-news' ),
		'section'  => 'legal_news_header_options',
		'settings' => 'legal_news_header_advertisement_url',
		'type'     => 'url',
	)
);
