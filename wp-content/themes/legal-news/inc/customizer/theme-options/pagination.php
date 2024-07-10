<?php
/**
 * Pagination
 *
 * @package Legal_News
 */

$wp_customize->add_section(
	'legal_news_pagination',
	array(
		'panel' => 'legal_news_theme_options',
		'title' => esc_html__( 'Pagination', 'legal-news' ),
	)
);

// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'legal_news_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'legal_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Legal_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'legal_news_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'legal-news' ),
			'section'  => 'legal_news_pagination',
			'settings' => 'legal_news_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

$wp_customize->add_setting(
	'legal_news_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'legal_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'legal_news_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'legal-news' ),
		'section'         => 'legal_news_pagination',
		'settings'        => 'legal_news_pagination_type',
		'active_callback' => 'legal_news_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'legal-news' ),
			'numeric' => __( 'Numeric', 'legal-news' ),
		),
	)
);
