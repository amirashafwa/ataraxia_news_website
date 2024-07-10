<?php
/**
 * Archive Layout
 *
 * @package Legal_News
 */

$wp_customize->add_section(
	'legal_news_archive_layout',
	array(
		'title' => esc_html__( 'Archive Layout', 'legal-news' ),
		'panel' => 'legal_news_theme_options',
	)
);

// Archive Layout - Grid Style.
$wp_customize->add_setting(
	'legal_news_archive_grid_style',
	array(
		'default'           => 'grid-column-3',
		'sanitize_callback' => 'legal_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'legal_news_archive_grid_style',
	array(
		'label'   => esc_html__( 'Grid Style', 'legal-news' ),
		'section' => 'legal_news_archive_layout',
		'type'    => 'select',
		'choices' => array(
			'grid-column-1' => __( 'Column 1', 'legal-news' ),
			'grid-column-2' => __( 'Column 2', 'legal-news' ),
			'grid-column-3' => __( 'Column 3', 'legal-news' ),
		),
	)
);
