<?php
/**
 * Typography
 *
 * @package Legal_News
 */

$wp_customize->add_section(
	'legal_news_typography',
	array(
		'panel' => 'legal_news_theme_options',
		'title' => esc_html__( 'Typography', 'legal-news' ),
	)
);

// Typography - Site Title Font.
$wp_customize->add_setting(
	'legal_news_site_title_font',
	array(
		'default'           => 'Titillium Web',
		'sanitize_callback' => 'legal_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'legal_news_site_title_font',
	array(
		'label'    => esc_html__( 'Site Title Font Family', 'legal-news' ),
		'section'  => 'legal_news_typography',
		'settings' => 'legal_news_site_title_font',
		'type'     => 'select',
		'choices'  => legal_news_get_all_google_font_families(),
	)
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'legal_news_site_description_font',
	array(
		'default'           => 'Titillium Web',
		'sanitize_callback' => 'legal_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'legal_news_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'legal-news' ),
		'section'  => 'legal_news_typography',
		'settings' => 'legal_news_site_description_font',
		'type'     => 'select',
		'choices'  => legal_news_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'legal_news_header_font',
	array(
		'default'           => 'Titillium Web',
		'sanitize_callback' => 'legal_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'legal_news_header_font',
	array(
		'label'    => esc_html__( 'Header Font Family', 'legal-news' ),
		'section'  => 'legal_news_typography',
		'settings' => 'legal_news_header_font',
		'type'     => 'select',
		'choices'  => legal_news_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'legal_news_body_font',
	array(
		'default'           => 'Titillium Web',
		'sanitize_callback' => 'legal_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'legal_news_body_font',
	array(
		'label'    => esc_html__( 'Body Font Family', 'legal-news' ),
		'section'  => 'legal_news_typography',
		'settings' => 'legal_news_body_font',
		'type'     => 'select',
		'choices'  => legal_news_get_all_google_font_families(),
	)
);
