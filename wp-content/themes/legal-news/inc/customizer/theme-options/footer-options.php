<?php
/**
 * Footer Options
 *
 * @package Legal_News
 */

$wp_customize->add_section(
	'legal_news_footer_options',
	array(
		'panel' => 'legal_news_theme_options',
		'title' => esc_html__( 'Footer Options', 'legal-news' ),
	)
);

// Footer Options - Copyright Text.
/* translators: 1: Year, 2: Site Title with home URL. */
$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'legal-news' ), '[the-year]', '[site-link]' );
$wp_customize->add_setting(
	'legal_news_footer_copyright_text',
	array(
		'default'           => $copyright_default,
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'legal_news_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'legal-news' ),
		'section'  => 'legal_news_footer_options',
		'settings' => 'legal_news_footer_copyright_text',
		'type'     => 'textarea',
	)
);

// Footer Options - Scroll Top.
$wp_customize->add_setting(
	'legal_news_scroll_top',
	array(
		'sanitize_callback' => 'legal_news_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Legal_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'legal_news_scroll_top',
		array(
			'label'   => esc_html__( 'Enable Scroll Top Button', 'legal-news' ),
			'section' => 'legal_news_footer_options',
		)
	)
);
