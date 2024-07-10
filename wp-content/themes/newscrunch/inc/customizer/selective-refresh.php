<?php
/**
 * Includes functions for selective refresh
 * 
 * @package Newscrunch
 */
function newscrunch_customize_selective_refresh( $wp_customize ) {
    if ( ! isset( $wp_customize->selective_refresh ) ) return;
    // site title
    $wp_customize->selective_refresh->add_partial('blogname',
        array(
            'selector'        => '.site-title a',
            'render_callback' => 'newscrunch_customize_partial_blogname'
        )
    );
    // site tagline
    $wp_customize->selective_refresh->add_partial('blogdescription',
        array(
            'selector'        => '.site-description',
            'render_callback' => 'newscrunch_customize_partial_blogdescription'
        )
    );
    if(! function_exists( 'spncp_activate' )):
    // date
    $wp_customize->selective_refresh->add_partial('hide_show_date',
        array(
            'selector'        => '.head-contact-info .header-date',
            'render_callback' => 'hide_show_date'
        )
    );
    // time
    $wp_customize->selective_refresh->add_partial('hide_show_time',
        array(
            'selector'        => '.head-contact-info .header-time',
            'render_callback' => 'hide_show_time'
        )
    );
    // social icons
    $wp_customize->selective_refresh->add_partial('social_icons',
        array(
            'selector'        => '.custom-social-icons',
            'render_callback' => 'social_icons'
        )
    );
    endif;
    // copyright
    $wp_customize->selective_refresh->add_partial('footer_copyright',
        array(
            'selector'        => '.site-info .copyright-section',
            'render_callback' => 'newscrunch_footer_copyright'
        )
    );
    // news highlight
   $wp_customize->selective_refresh->add_partial('news_highlight_title',
        array(
            'selector'        => '.spnc-highlights-1 .spnc-highlights-title h3',
            'render_callback' => 'newscrunch_news_highlight_title'
        )
    );

    // featured video
    $wp_customize->selective_refresh->add_partial('featured_video_title',
        array(
            'selector'        => '.spnc-video .spnc-blog-1-heading h4',
            'render_callback' => 'newscrunch_featured_video_title'
        )
    );

    // Main banner
    $wp_customize->selective_refresh->add_partial('hide_show_banner',
        array(
            'selector'        => '.front-banner',
            'render_callback' => 'hide_show_banner'
        )
    );


}
add_action( 'customize_register', 'newscrunch_customize_selective_refresh' );


/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function newscrunch_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function newscrunch_customize_partial_blogdescription() {
    bloginfo( 'description' );
}
function newscrunch_news_highlight_title() {
    return get_theme_mod( 'news_highlight_title' );
}

function newscrunch_footer_copyright(){
    return get_theme_mod('footer_copyright');
}

function newscrunch_featured_video_title(){
    return get_theme_mod('featured_video_title');
}