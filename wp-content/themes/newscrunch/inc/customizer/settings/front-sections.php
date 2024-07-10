<?php
/**
 * Front Sections
 *
 * @package Newscrunch
*/

function newscrunch_front_sections ( $wp_customize ) {

    /* ====== FRONT SECTION ====== */
    $wp_customize->add_panel('newscrunch_front_widgets_panel', 
        array(
            'title'         => esc_html__('Front Sections' , 'newscrunch' ),
            'capability'    => 'edit_theme_options',
            'priority'      => 26
        )
    );

    $sidebar_widgets_front_page_1 = $wp_customize->get_section( 'sidebar-widgets-front-page-1' );
    if ( ! empty( $sidebar_widgets_front_page_1 ) ) {
        $sidebar_widgets_front_page_1->panel = 'newscrunch_front_widgets_panel';
    }

    $sidebar_widgets_front_page_2 = $wp_customize->get_section( 'sidebar-widgets-front-page-2' );
    if ( ! empty( $sidebar_widgets_front_page_2 ) ) {
        $sidebar_widgets_front_page_2->panel = 'newscrunch_front_widgets_panel';
    }

    $sidebar_widgets_front_page_side_1 = $wp_customize->get_section( 'sidebar-widgets-front-page-side-1' );
    if ( ! empty( $sidebar_widgets_front_page_side_1 ) ) {
        $sidebar_widgets_front_page_side_1->panel = 'newscrunch_front_widgets_panel';
    }

    $sidebar_widgets_front_page_side_2 = $wp_customize->get_section( 'sidebar-widgets-front-page-side-2' );
    if ( ! empty( $sidebar_widgets_front_page_side_2 ) ) {
        $sidebar_widgets_front_page_side_2->panel = 'newscrunch_front_widgets_panel';
    }

    $wp_customize->add_section('front_page_order_section',
    array(
        'title' => esc_html__('Reorder sections', 'newscrunch'),
        'panel' => 'newscrunch_front_widgets_panel',
        'priority' => 5
    ));

    /************************* Blog Meta Rearrange*********************************/
    if( function_exists( 'spncp_missed_section' ))
    {
        $default = array( 'front_content_1', 'vedio_content', 'missed_content', 'front_content_2', 'mainblog_content');
        $choices = array(
            'front_content_1' => esc_html__('Front Content', 'newscrunch' ) . ' 1',
            'vedio_content' => esc_html__( 'Featured Video', 'newscrunch' ),
            'missed_content' => esc_html__( 'Missed Section', 'newscrunch' ),
            'front_content_2' => esc_html__('Front Content', 'newscrunch') . ' 2',
            'mainblog_content' => esc_html__( 'Blog', 'newscrunch' ),
        );
    }
    else
    {
        $default = array( 'front_content_1', 'vedio_content', 'front_content_2', 'mainblog_content');
        $choices = array(
            'front_content_1' => esc_html__( 'Front Content', 'newscrunch') . ' 1',
            'vedio_content' => esc_html__('Featured Video', 'newscrunch'),
            'front_content_2' => esc_html__('Front Content', 'newscrunch') . ' 2',
            'mainblog_content' => esc_html__( 'Blog', 'newscrunch' ),
        );
    }
    

    $wp_customize->add_setting( 'front_page_content_sort',
    array(
        'capability'  => 'edit_theme_options',
        'sanitize_callback' => 'newscrunch_sanitize_array',
        'default'     => $default
    ) );

    $wp_customize->add_control( new Newscrunch_Control_Sortable( $wp_customize, 'front_page_content_sort',
    array(
        'label' => esc_html__( 'Drag And Drop to Rearrange', 'newscrunch' ),
        'section' => 'front_page_order_section',
        'settings' => 'front_page_content_sort',
        'type'=> 'sortable',
        'choices'     => $choices
    ) ) );


}
add_action( 'customize_register', 'newscrunch_front_sections' );