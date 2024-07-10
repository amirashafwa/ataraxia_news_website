<?php

// Header Section Advertisement Image.
$wp_customize->add_setting(
	'valid_news_advertisement_image',
	array(
		'default'           => '',
		'sanitize_callback' => 'valid_news_sanitize_image',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'valid_news_advertisement_image',
		array(
			'label'    => esc_html__( 'Advertisement Image', 'valid-news' ),
			'settings' => 'valid_news_advertisement_image',
			'section'  => 'fact_news_header_options_section',
			'priority' => 10,
		)
	)
);

	// Header Advertisement Url.
$wp_customize->add_setting(
	'valid_news_advertisement_url',
	array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'valid_news_advertisement_url',
	array(
		'label'    => esc_html__( 'Advertisement Url', 'valid-news' ),
		'settings' => 'valid_news_advertisement_url',
		'section'  => 'fact_news_header_options_section',
		'type'     => 'url',
		'priority' => 15,
	)
);
