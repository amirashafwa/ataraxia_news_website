<?php
/**
 * Color Option
 *
 * @package Legal_News
 */

// Primary Color.
$wp_customize->add_setting(
	'primary_color',
	array(
		'default'           => '#d82926',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'primary_color',
		array(
			'label'    => __( 'Primary Color', 'legal-news' ),
			'section'  => 'colors',
			'priority' => 5,
		)
	)
);
