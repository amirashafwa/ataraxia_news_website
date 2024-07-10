<?php
/**
 * Excerpt
 *
 * @package Legal_News
 */

$wp_customize->add_section(
	'legal_news_excerpt_options',
	array(
		'panel' => 'legal_news_theme_options',
		'title' => esc_html__( 'Excerpt', 'legal-news' ),
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'legal_news_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'legal_news_sanitize_number_range',
		'validate_callback' => 'legal_news_validate_excerpt_length',
	)
);

$wp_customize->add_control(
	'legal_news_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'legal-news' ),
		'description' => esc_html__( 'Note: Min 1 & Max 200. Please input the valid number and save. Then refresh the page to see the change.', 'legal-news' ),
		'section'     => 'legal_news_excerpt_options',
		'settings'    => 'legal_news_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 1,
			'max'  => 200,
			'step' => 1,
		),
	)
);
