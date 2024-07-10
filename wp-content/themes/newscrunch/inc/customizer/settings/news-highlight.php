<?php
/**
 * Banner Customizer
 *
 * @package Newscrunch
*/

function newscrunch_news_highlight ( $wp_customize ) {

    /* ====== NEWS HIGHLIGHT SECTION ====== */
    $wp_customize->add_section('newscrunch_news_highlight_section', 
        array(
            'title'     => esc_html__('News Highlight' , 'newscrunch' ),
            'priority'  => 23
        )
    );

    // enable/disable banner
    $wp_customize->add_setting('hide_show_news_highlight',
        array(
            'default'           => true,
            'sanitize_callback' => 'newscrunch_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Newscrunch_Toggle_Control( $wp_customize, 'hide_show_news_highlight',
        array(
            'label'     =>  esc_html__( 'Enable/Disable News Highlight', 'newscrunch'),
            'section'   =>  'newscrunch_news_highlight_section',
            'settings'   =>  'hide_show_news_highlight',
            'type'      =>  'toggle',
            'priority'  =>  1
        )
    ));

     // highlight layouts
    $wp_customize->add_setting( 'highlight_layout',
        array(
            'default'           => '1',
            'sanitize_callback' => 'newscrunch_sanitize_select'
        )
    );

    $wp_customize->add_control( new Newscrunch_Image_Radio_Button_Custom_Control( $wp_customize, 'highlight_layout',
        array(
            'label'         =>  esc_html__( 'Highlight Layout', 'newscrunch'  ),
            'priority'      =>  1,
            'section'       =>  'newscrunch_news_highlight_section',
            'active_callback'   => 'newscrunch_news_highlight_callback',
            'choices'       =>  array(
                '1'   => array( 
                    'image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/news-highlight-1.jpg',
                ),
                '2'  => array(
                    'image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/news-highlight-2.jpg',
                )
            )
        )
    ) );

    // scroll to top icon font
    $wp_customize->add_setting('news_highlight_title',
        array(
            'default'           => esc_html__('Highlight', 'newscrunch'),
            'capability'        => 'edit_theme_options',
            'transport'        => 'postMessage',
            'sanitize_callback' => 'newscrunch_sanitize_text'
        )
    );
    $wp_customize->add_control('news_highlight_title',
        array(
            'label'             => esc_html__('Title', 'newscrunch'),
            'section'           => 'newscrunch_news_highlight_section',
            'setting'           => 'news_highlight_title',
            'active_callback'   => 'newscrunch_news_highlight_callback',
            'priority'          => 2,
            'type'              => 'text'
        )
    );

    // news highlight search options
    $wp_customize->add_setting('newscrunch_highlight_search_option',
        array(
            'default'           =>  'category',
            'capability'        =>  'edit_theme_options',
            'sanitize_callback' =>  'newscrunch_sanitize_select'
        )
    );
    $wp_customize->add_control('newscrunch_highlight_search_option', 
        array(
            'label'             => esc_html__('Search By','newscrunch' ),
            'section'           => 'newscrunch_news_highlight_section',
            'setting'           => 'newscrunch_highlight_search_option',
            'active_callback'   => 'newscrunch_news_highlight_callback',
            'type'              => 'select',
            'choices'           =>  
                                    array(
                                        'category'  =>  esc_html__('Category', 'newscrunch' ),
                                        'title'     =>  esc_html__('Title', 'newscrunch' )
                                    ),
            'priority'          =>  3
        )
    );
   
    // select the news highlight category
    $wp_customize->add_setting( 'news_highlight_dropdown_category',
        array(
            'default'           =>  0,
            'sanitize_callback' =>  'absint'
        )
    );
    $wp_customize->add_control( new Newscrunch_Dropdown_Category_Control( $wp_customize, 'news_highlight_dropdown_category',
        array(
            'label'             =>  esc_html__( 'Select Post Category', 'newscrunch' ),
            'section'           =>  'newscrunch_news_highlight_section',
            'settings'          =>  'news_highlight_dropdown_category',
            'active_callback'   =>  function($control) {
                                        return (
                                            newscrunch_news_highlight_callback($control) &&
                                            newscrunch_highlight_category_option($control)
                                        );
                                    },
            'priority'          =>  4
        )
    ) );

    // select the news highlight post title
    $args = array('post_type' => 'post', 'posts_per_page' => -1);
    $newscrunch_posts = get_posts( $args ); 
    if( count( $newscrunch_posts ) ) {     
        foreach( $newscrunch_posts as $newscrunch_post ) {
        $choices[ $newscrunch_post->ID ] = $newscrunch_post->post_title;
        }     
    }

    $wp_customize->add_setting( 'news_highlight_dropdown_post_title',
        array(
             'default'           => array(),
             'capability'        => 'edit_theme_options',
             'sanitize_callback' =>  'newscrunch_sanitize_dropdown_post_title_field'       
        )
    );                              
    $wp_customize->add_control(new Newscrunch_Post_Title_Multiple_Select($wp_customize,'news_highlight_dropdown_post_title',
        array(
            'type'              =>  'multiple-select',
            'label'             =>  esc_html__( 'Select Post Title', 'newscrunch' ),
            'section'           =>  'newscrunch_news_highlight_section',
            'settings'          =>  'news_highlight_dropdown_post_title',
            'active_callback'   =>  function($control) {
                                        return (
                                            newscrunch_news_highlight_callback($control) &&
                                            newscrunch_highlight_title_option($control)
                                        );
                                    },
            'priority'          =>  5,
            'choices'           =>  $choices     
        )
    ));


    // banner center number of posts
    $wp_customize->add_setting( 'news_highlight_num_posts', 
        array(
            'default'           =>  8,
            'sanitize_callback' =>  'absint',
        ) 
    );
    // Add control
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'news_highlight_num_posts',
        array(
            'label'             =>  esc_html__('Number of posts to show', 'newscrunch'),
            'section'           =>  'newscrunch_news_highlight_section',
            'settings'          =>  'news_highlight_num_posts',
            'active_callback'   =>  function($control) {
                                        return (
                                            newscrunch_news_highlight_callback($control) &&
                                            newscrunch_highlight_category_option($control)
                                        );
                                    },
            'type'              =>  'number',
            'priority'          =>  6,
        )
    ));

}
add_action( 'customize_register', 'newscrunch_news_highlight' );