<?php
/**
 * Top Header Panel Customizer
 *
 * @package Newscrunch
*/

function newscrunch_archives_options_customizer ( $wp_customize ) {

    /* ====== Blog options ====== */
	$wp_customize->add_section('newscrunch_blog_section', 
		array(
			'title' 	=> esc_html__('Blog/Archives', 'newscrunch' ),
			'priority' 	=> 26
		)
	);

    $wp_customize->add_setting('newscrunch_enable_post_author',
        array(
            'default'           => true,
            'sanitize_callback' => 'newscrunch_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new Newscrunch_Toggle_Control($wp_customize, 'newscrunch_enable_post_author',
        array(
            'label'     => esc_html__('Hide/Show Author', 'newscrunch' ),
            'type'      => 'toggle',
            'section'   => 'newscrunch_blog_section',
            'priority'  => 11
        )
    ));
    $wp_customize->add_setting('newscrunch_enable_post_tag',
        array(
            'default'           => true,
            'sanitize_callback' => 'newscrunch_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Newscrunch_Toggle_Control($wp_customize, 'newscrunch_enable_post_tag',
        array(
            'label'     => esc_html__('Hide/Show Tag', 'newscrunch' ),
            'type'      => 'toggle',
            'section'   => 'newscrunch_blog_section',
            'priority'  => 11
        )
    ));

     $wp_customize->add_setting('newscrunch_enable_post_comment',
        array(
            'default'           => true,
            'sanitize_callback' => 'newscrunch_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Newscrunch_Toggle_Control($wp_customize, 'newscrunch_enable_post_comment',
        array(
            'label'     => esc_html__('Hide/Show Comments', 'newscrunch' ),
            'type'      => 'toggle',
            'section'   => 'newscrunch_blog_section',
            'priority'  => 11
        )
    ));
     $wp_customize->add_setting('newscrunch_enable_post_date',
        array(
            'default'           => true,
            'sanitize_callback' => 'newscrunch_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Newscrunch_Toggle_Control($wp_customize, 'newscrunch_enable_post_date',
        array(
            'label'     => esc_html__('Hide/Show Date', 'newscrunch' ),
            'type'      => 'toggle',
            'section'   => 'newscrunch_blog_section',
            'priority'  => 11
        )
    ));

}
add_action( 'customize_register', 'newscrunch_archives_options_customizer' );