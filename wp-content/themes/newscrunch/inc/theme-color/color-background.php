<?php
/**
 * Use Color Background settings in the theme package
 *
 * @package Newscrunch
*/
function newscrunch_color_back_custom_css() {
    // Get values from the customizer settings
    $newscrunch_enable_date_time_color             =   get_theme_mod('hide_show_date_time_color', true);
    $newscrunch_enable_social_icon_color           =   get_theme_mod('hide_show_social_icon_color', true);
    $newscrunch_enable_site_identity_color         =   get_theme_mod('hide_show_site_identity_color', true);
    $newscrunch_enable_menu_submenu_color          =   get_theme_mod('hide_show_theme_header_color', true);
    $newscrunch_enable_theme_footer_color          =   get_theme_mod('hide_show_theme_footer_color', false);
    $newscrunch_enable_bottom_footer_color         =   get_theme_mod('hide_show_bottom_footer_color', true);
    $hide_show_header_border                       =   get_theme_mod('hide_show_header_border',false);
    $hide_show_header_border_radius                =   get_theme_mod('hide_show_header_border_radius',false);

    /* ====================
        * Date & Time 
    ==================== */
    if($newscrunch_enable_date_time_color == true) { ?>
        <style>
            body .header-sidebar .spnc-left .head-contact-info li.header-date .date {
                color: <?php echo esc_attr( get_theme_mod('date_color', '#') ); ?>;
            }
            body .header-sidebar .spnc-left .head-contact-info li.header-time .time {
                color: <?php echo esc_attr( get_theme_mod('time_color', '#') ); ?>;
            }
        </style>
    <?php }


     /* ====================
        * Category Color 
    ==================== */         
    $newscrunch_query_args = get_terms( 'category', array('hide_empty' => false));
    foreach ( $newscrunch_query_args as $term ) {
        if(!empty($term->count))
            { ?>
                <style type="text/css">
                    body.newscrunch #page .spnc-cat-links a.newscrunch_category_<?php echo esc_attr($term->slug);?>
                        {
                            background: <?php echo esc_attr( get_theme_mod('newscrunch_category_'.$term->slug, '#669c9b') ); ?>;
                        }
                    body .spnc-category-page .spnc-blog-cat-wrapper .spnc-first-catpost .spnc-cat-links a.newscrunch_category_<?php echo esc_attr($term->slug); ?>
                            {
                                color: <?php echo esc_attr( get_theme_mod('newscrunch_category_'.$term->slug, '#669c9b') ); ?>;
                            }
                </style>
            <?php
        }
    }

    /* ====================
        * Social Icons
    ==================== */
    if($newscrunch_enable_social_icon_color == true) { ?>
        <style>
            body .header-sidebar .widget .custom-social-icons li a {
                color: <?php echo esc_attr( get_theme_mod('social_icon_color', '#') ); ?>;
                background-color: <?php echo esc_attr( get_theme_mod('social_icon_bg_color', '#') ); ?>;
            }
            body .header-sidebar .widget .custom-social-icons li > a:hover {
                color: <?php echo esc_attr( get_theme_mod('social_icon_hover_color', '#') ); ?>;
                background-color: <?php echo esc_attr( get_theme_mod('social_icon_bg_hover_color', '#') ); ?>;
            }
            body.newscrunch-plus .header-sidebar .spnc-date-social.spnc-right .custom-date-social-icons li a {
                color: <?php echo esc_attr(get_theme_mod('social_icon_color','#') );?>;
            }
            body.newscrunch-plus .header-sidebar .spnc-date-social.spnc-right .custom-date-social-icons li a:hover {
                color: <?php echo esc_attr(get_theme_mod('social_icon_hover_color','#'));?>;
            }
        </style>
    <?php }

    /* ====================
        * Header section (Site title, Tagline) 
    ==================== */
    if($newscrunch_enable_site_identity_color == true) { ?>
        <style>
            body .custom-logo-link-url .site-title a, [data-theme="spnc_dark"] .custom-logo-link-url .site-title a,body .header-5 .custom-logo-link-url .site-title a,body .header-4 .custom-logo-link-url .site-title a,[data-theme="spnc_dark"]  body .header-5 .custom-logo-link-url .site-title a,[data-theme="spnc_dark"]  body .header-4 .custom-logo-link-url .site-title a {
                color: <?php echo esc_attr( get_theme_mod('site_title_color', '#') ); ?>;
            }
            body .custom-logo-link-url .site-title a:hover,body .header-5 .custom-logo-link-url .site-title a:hover,body .header-4 .custom-logo-link-url .site-title a:hover,[data-theme="spnc_dark"] body .header-5 .custom-logo-link-url .site-title a:hover,[data-theme="spnc_dark"] body .header-4 .custom-logo-link-url .site-title a:hover  {
                color: <?php echo esc_attr( get_theme_mod('site_title_hover_color', '#') ); ?>;
            }
            body .custom-logo-link-url .site-description,[data-theme="spnc_dark"] .custom-logo-link-url .site-description,body .header-5 .custom-logo-link-url .site-description,body .header-4 .custom-logo-link-url .site-description,[data-theme="spnc_dark"] body .header-5 .custom-logo-link-url .site-description,[data-theme="spnc_dark"] body .header-4 .custom-logo-link-url .site-description {
                color: <?php echo esc_attr( get_theme_mod('site_tagline_color', '#') ); ?>;
            }
        </style>
    <?php }
    /* ====================
        * Menus and Submenus 
    ==================== */
    if($newscrunch_enable_menu_submenu_color == true) { ?>
        <style>
              body .header-4 .spnc-custom .spnc-nav li > a,body .header-5 .spnc-custom .spnc-nav li > a,body .header-6 .spnc-custom .spnc-nav li > a, body .header-7 .spnc-custom .spnc-nav li > a, body .spnc-nav > li.parent-menu a, body .spnc-custom .spnc-nav .dropdown.open > a,
            body .spnc-custom .spnc-nav li > a,[data-theme="spnc_dark"] body .spnc-nav > li.parent-menu a,
            [data-theme="spnc_dark"] body .spnc-custom .spnc-nav .dropdown.open > a,[data-theme="spnc_dark"] body .spnc-custom .spnc-nav li > a {
                color: <?php echo esc_attr( get_theme_mod('menu_link_color', '#') ); ?>;
            }
            .header-6 .spnc-custom .spnc-nav li > a:before,[data-theme="spnc_dark"] .header-6 .spnc-custom .spnc-nav li > a:before{
               background-color: <?php echo esc_attr( get_theme_mod('menu_link_color', '#') ); ?>;
            }
            body .spnc-nav > li.parent-menu a:hover, body .spnc-custom .spnc-nav .open > a:hover, body .spnc-custom .spnc-nav .open.active > a:hover,[data-theme="spnc_dark"] body .spnc-nav > li.parent-menu a:hover, [data-theme="spnc_dark"] body .spnc-custom .spnc-nav .open > a:hover, [data-theme="spnc_dark"] body .spnc-custom .spnc-nav .open.active > a:hover {
                color: <?php echo esc_attr( get_theme_mod('menu_link_hover_color', '#') ); ?>;
            }

            [data-theme="spnc_dark"] body .spnc-nav > li.parent-menu a:hover, [data-theme="spnc_dark"] body .spnc-custom .spnc-nav .dropdown.open > a:hover, [data-theme="spnc_dark"] body .spnc-custom .spnc-nav li > a:hover{
                color: <?php echo esc_attr( get_theme_mod('menu_link_hover_color', '#') ); ?>;
            }
            body.newscrunch .spnc-custom .spnc-nav > li > a:focus, body.newscrunch .spnc-custom .spnc-nav > li > a:hover, body.newscrunch .spnc-custom .spnc-nav .open > a, body.newscrunch .spnc-custom .spnc-nav .open > a:focus, body.newscrunch .spnc-custom .spnc-nav .open > a:hover,
            [data-theme="spnc_dark"] body.newscrunch .header-4 .spnc-custom .spnc-nav li > a:hover, [data-theme="spnc_dark"] body .header-4 .spnc-custom .spnc-nav .open > a,[data-theme="spnc_dark"] body .header-4 .spnc-custom .spnc-nav .dropdown.open > a:hover,[data-theme="spnc_dark"] body.newscrunch .spnc-custom .spnc-nav .open > a,[data-theme="spnc_dark"] body .header-7 .spnc-nav > li.parent-menu a:hover, [data-theme="spnc_dark"] body .header-7 .spnc-custom .spnc-nav .dropdown.open > a:hover,body.newscrunch .spnc-custom .spnc-nav.nav > li > a:hover, body.newscrunch .spnc-custom .spnc-nav.nav > li > a:focus,[data-theme="spnc_dark"] body.newscrunch .spnc-custom .spnc-nav.nav > li > a:focus,[data-theme="spnc_dark"] body .spnc-nav > li.parent-menu .dropdown-menu a:focus{
                color: <?php echo esc_attr( get_theme_mod('menu_link_hover_color', '#') ); ?>;
            }
            body .spnc-custom .spnc-nav > .active > a, body .spnc-custom .spnc-nav .open .dropdown-menu > .active > a, .spnc-custom .spnc-nav .open .dropdown-menu > .active > a:hover, .spnc-custom .spnc-nav .open .dropdown-menu > .active > a:focus, .spnc-custom .spnc-nav > .active > a, .spnc-custom .spnc-nav > .active > a:hover, body .spnc-custom .spnc-nav > .active.open > a,body .spnc-custom .spnc-nav > .active > a:hover,[data-theme="spnc_dark"] body .spnc-custom .spnc-nav .open .dropdown-menu > .active > a  {
                color: <?php echo esc_attr( get_theme_mod('menu_active_link_color', '#') ); ?>;
            }

           body.newscrunch .spnc-custom .spnc-nav > .active > a:hover,body.newscrunch .spnc-custom .spnc-nav > .active > a, body.newscrunch .spnc-custom .spnc-nav > .active > a:focus, body.newscrunch .spnc-custom .spnc-nav > li.parent-menu.active > a:hover, .spnc-custom .spnc-nav li.active > a:hover,body.newscrunch .spnc-custom .spnc-nav .dropdown-menu > .active > a:hover, body.newscrunch .spnc-custom .spnc-nav .open .dropdown-menu > .active > a:hover,[data-theme="spnc_dark"] body .spnc-custom .spnc-nav .dropdown.open.active > a,[data-theme="spnc_dark"] body.newscrunch .spnc-custom .spnc-nav .open .dropdown-menu > .active > a:hover,[data-theme="spnc_dark"] body .spnc-custom .spnc-nav .dropdown.open.active > a:hover,body .spnc-wrapper .header-2 .spnc-custom .spnc-nav > .active > a, body .spnc-wrapper .header-2 .spnc-custom .spnc-nav > .active > a:hover, body .spnc-wrapper .header-2 .spnc-custom .spnc-nav > .active > a:focus {
                color: <?php echo esc_attr( get_theme_mod('menu_active_link_color', '#') ); ?>;
            }
            .header-6 .spnc-custom .spnc-nav li > a:hover:before{
                background-color: <?php echo esc_attr( get_theme_mod('menu_active_link_color', '#') ); ?>;
            }
            body .spnc-wrapper .header-2 .spnc-custom .spnc-nav li.active > a:after,body .spnc-wrapper .header-2 .spnc-custom .spnc-nav li.active > a:before,body .spnc-wrapper .header-2 .spnc-custom .spnc-nav li.active > a:hover:after,body .spnc-wrapper .header-2 .spnc-custom .spnc-nav li.active > a:hover:before, body.newscrunch .header-2 .spnc-custom .spnc-nav .open .dropdown-menu > .active > a:hover:after,.header-3 .spnc-custom .spnc-nav li.active > a:after, .header-3 .spnc-custom .spnc-nav li.active > a:before,.header-3 .spnc-custom .spnc-nav li.active > a:hover:after, .header-3 .spnc-custom .spnc-nav li.active > a:hover:before, body.newscrunch .header-3 .spnc-custom .spnc-nav .open .dropdown-menu > .active > a:hover:after,.header-5 .spnc-custom .spnc-nav li.active > a:before,.header-6 .spnc-custom .spnc-nav .dropdown-menu li.active > a:before,.header-6 .spnc-custom .spnc-nav li.active > a:before,.header-6 .spnc-custom .spnc-nav .dropdown-menu li.active > a:hover:before{
               background-color: <?php echo esc_attr( get_theme_mod('menu_active_link_color', '#') ); ?>;
           }
           body .spnc-wrapper .header-2 .spnc-custom .spnc-nav li a:hover:after,body .spnc-wrapper .header-2 .spnc-custom .spnc-nav li a:hover:before,.header-3 .spnc-custom .spnc-nav li a:hover:after, .header-3 .spnc-custom .spnc-nav li a:hover:before, .header-5 .spnc-custom .spnc-nav li a:hover:before, .header-6 .spnc-custom .spnc-nav li a:hover:before{
               background-color: <?php echo esc_attr( get_theme_mod('menu_link_hover_color', '#') ); ?>;
           }
            body .spnc-custom .dropdown-menu, body .spnc-custom .open .dropdown-menu,.header-6 .spnc-custom .spnc-nav .dropdown-menu li > a:before {
                background-color: <?php echo esc_attr( get_theme_mod('submenu_bg_color', '#21202e') ); ?>;
            }
            body .spnc-custom .dropdown-menu > li > a, body .spnc-custom .spnc-nav .open .dropdown-menu > a, body .spnc-custom .spnc-nav .dropdown-menu .open > a,[data-theme="spnc_dark"] body .spnc-custom .dropdown-menu > li > a, [data-theme="spnc_dark"] body .spnc-custom .spnc-nav .open .dropdown-menu > a, [data-theme="spnc_dark"] body .spnc-custom .spnc-nav .dropdown-menu .open > a,[data-theme="spnc_dark"] body .spnc-nav > li.parent-menu .dropdown-menu a,body .header-4 .spnc-custom .dropdown-menu > li > a,body .header-5 .spnc-custom .dropdown-menu > li > a,body .header-6 .spnc-custom .dropdown-menu > li > a , body .header-7 .spnc-custom .dropdown-menu > li > a {
                color: <?php echo esc_attr( get_theme_mod('submenu_link_color', '#d5d5d5') ); ?>;
                -webkit-text-fill-color: unset;
            }
            .header-6 .spnc-custom .spnc-nav .dropdown-menu li > a:before {
                background-color: <?php echo esc_attr( get_theme_mod('submenu_link_color', '#d5d5d5') ); ?>;
            }
            body .spnc-custom .spnc-nav .dropdown-menu > li > a:hover, body .spnc-custom .spnc-nav .open .dropdown-menu > .active > a:hover,[data-theme="spnc_dark"] body .spnc-custom .spnc-nav .dropdown-menu > li > a:hover, [data-theme="spnc_dark"] body .spnc-custom .spnc-nav .open .dropdown-menu > .active > a:hover,[data-theme="spnc_dark"] body .spnc-custom .spnc-nav .dropdown-menu .dropdown.open > a:hover, .header-4 .spnc-custom .spnc-nav .dropdown-menu .open > a:hover,[data-theme="spnc_dark"] body.newscrunch .header-4 .spnc-custom .spnc-nav .dropdown-menu li> a:hover ,.header-5 .spnc-custom .spnc-nav .dropdown-menu .open > a:hover,body.newscrunch .spnc-custom .spnc-nav .open > .dropdown-menu  a:hover {
                color: <?php echo esc_attr( get_theme_mod('submenu_link_hover_color', '#ffffff') ); ?>;
                -webkit-text-fill-color: unset;
            }
            body .spnc-wrapper .header-2 .spnc-custom .spnc-nav .dropdown-menu li a:hover:after, .header-3 .spnc-custom .spnc-nav .dropdown-menu li a:hover:after,.header-6 .spnc-custom .spnc-nav .dropdown-menu li > a:hover:before{
                background-color: <?php echo esc_attr( get_theme_mod('submenu_link_hover_color', '#ffffff') ); ?>;
            }
            @media (max-width: 1100px){
                body.newscrunch .spnc-custom .spnc-nav.nav > li.active > a{
                     color: <?php echo esc_attr( get_theme_mod('menu_active_link_color', '#') ); ?>;
                }
                body .spnc-custom .spnc-nav.nav li > a, body .spnc-custom .spnc-nav.nav li > a{ color: <?php echo esc_attr( get_theme_mod('menu_link_color', '#') ); ?>; }
                body .spnc-custom .dropdown-menu > li > a,  body .spnc-nav > li.parent-menu .dropdown-menu a{
                     color: <?php echo esc_attr( get_theme_mod('submenu_link_color', '#D5D5D5') ); ?>;
                }
                body .spnc-custom .dropdown-menu > li > a:hover,  body .spnc-nav > li.parent-menu .dropdown-menu a: hover{
                    color: <?php echo esc_attr( get_theme_mod('submenu_link_hover_color', '#FFFFFF') ); ?>;
                }
                body .spnc-custom .spnc-nav .open .dropdown-menu > .active > a{
                     color: <?php echo esc_attr( get_theme_mod('menu_active_link_color', '#') ); ?>;
                }
                body .spnc-custom .spnc-nav.nav .dropdown-menu > .active > a, body .spnc-custom .spnc-nav.nav .dropdown-menu > .active > a:hover, body .spnc-custom .spnc-nav.nav .dropdown-menu > .active > a:focus{
                    color: <?php echo esc_attr( get_theme_mod('menu_active_link_color', '#') ); ?>;
                }
                body.newscrunch .spnc-custom .spnc-nav li > a.search-icon{
                   color: #bbb;
                }
            }
        </style>
    <?php }

    /* ====================
        * Footer 
    ==================== */
    if($newscrunch_enable_theme_footer_color == true) { ?>
        <style>
            body .footer-sidebar .wp-block-search .wp-block-search__label, body .footer-sidebar .widget.widget_block h1, body .footer-sidebar .widget.widget_block h2, body .footer-sidebar .widget.widget_block h3, body .footer-sidebar .widget.widget_block h4, body .footer-sidebar .widget.widget_block h5, body .footer-sidebar .widget.widget_block h6, body .footer-sidebar .widget .widget-title {
                color: <?php echo esc_attr( get_theme_mod('fwidgets_title_color', '#ffffff') ); ?>;
            }
            body .footer-sidebar p, body .footer-sidebar .wp-block-calendar table tbody, body .footer-sidebar .widget, body .footer-sidebar address, body .footer-sidebar .widget_block p {
                color: <?php echo esc_attr( get_theme_mod('fwidgets_text_color', '#858585') ); ?>;
            }
            body .footer-sidebar a, body .footer-sidebar .widget .wp-block-tag-cloud a, [data-theme="spnc_dark"] .footer-sidebar .widget .wp-block-latest-posts li a, [data-theme="spnc_dark"] .footer-sidebar .widget .wp-block-archives li a, [data-theme="spnc_dark"] .footer-sidebar .widget .wp-block-categories li a, [data-theme="spnc_dark"] .footer-sidebar .widget .wp-block-page-list li a, [data-theme="spnc_dark"] .footer-sidebar .widget .wp-block-rss li a, [data-theme="spnc_dark"] .footer-sidebar .widget_meta ul li a, [data-theme="spnc_dark"] .footer-sidebar .widget .wp-block-latest-comments li a, [data-theme="spnc_dark"] .footer-sidebar .widget .widget_nav_menu li a, body .site-footer .footer-sidebar .widget_newscrunch_post_grid_two_col .widget-recommended-post li a, body .site-footer .widget_newscrunch_plus_list_view .newscrunch_plus_list_view_ul .spnc-post-content a {
                color: <?php echo esc_attr( get_theme_mod('fwidgets_link_color', '#ffffff') ); ?>;
            }
            body.newscrunch .footer-sidebar .widget a:hover, [data-theme="spnc_dark"] body.newscrunch .footer-sidebar .widget .wp-block-latest-posts li a:hover, [data-theme="spnc_dark"] body.newscrunch .footer-sidebar .widget .wp-block-archives li a:hover, [data-theme="spnc_dark"] body.newscrunch .footer-sidebar .widget .wp-block-categories li a:hover, [data-theme="spnc_dark"] body.newscrunch .footer-sidebar .widget .wp-block-page-list li a:hover, [data-theme="spnc_dark"] body.newscrunch .footer-sidebar .widget .wp-block-rss li a:hover, [data-theme="spnc_dark"] body.newscrunch .footer-sidebar .widget_meta ul li a:hover, [data-theme="spnc_dark"] body.newscrunch .footer-sidebar .widget .wp-block-latest-comments li a:hover, [data-theme="spnc_dark"] body.newscrunch .footer-sidebar .widget .widget_nav_menu li a:hover, [data-theme="spnc_dark"] body.newscrunch .site-footer .widget .wp-block-latest-posts li a:hover, 
                [data-theme="spnc_dark"] body.newscrunch .site-footer .widget .wp-block-archives li a:hover, 
                [data-theme="spnc_dark"] body.newscrunch .site-footer .widget .wp-block-categories li a:hover, 
                [data-theme="spnc_dark"] body.newscrunch .site-footer .widget .wp-block-page-list li a:hover,  
                [data-theme="spnc_dark"] body.newscrunch .site-footer .widget .wp-block-rss li a:hover, 
                [data-theme="spnc_dark"] body.newscrunch .site-footer .widget_meta ul li a:hover,  
                [data-theme="spnc_dark"] body.newscrunch .site-footer .widget .wp-block-latest-comments li a:hover,
                body .site-footer .footer-sidebar .widget_newscrunch_post_grid_two_col .widget-recommended-post li a:hover {
                color: <?php echo esc_attr( get_theme_mod('fwidgets_link_hover_color', '#') ); ?>;
                -webkit-text-fill-color: unset;
                -webkit-background-clip: unset;
                background-image: unset;
            }

            body .footer-sidebar .widget .wp-block-tag-cloud a:hover{
                background: <?php echo esc_attr( get_theme_mod('fwidgets_link_hover_color', '#') ); ?>;
                color: #ffffff !important;
            }
            
        </style>
    <?php }

    /* ====================
        * Footer Bar
    ==================== */
    if($newscrunch_enable_bottom_footer_color == true) { ?>
        <style>
            body .site-info {
                background-color: <?php echo esc_attr( get_theme_mod('bfooter_back_color', '#000000') ); ?>;
            }
            body .site-footer .site-info .footer-nav li a, body .site-footer .site-info .footer-nav li a {
                color: <?php echo esc_attr( get_theme_mod('bfooter_menu_color', '#ffffff') ); ?>;
            }
            body .site-footer .site-info .footer-nav li a:hover, body .site-footer .site-info .footer-nav li a:hover {
                color: <?php echo esc_attr( get_theme_mod('bfooter_menu_hover_color', '#') ); ?>;
            }
            body .site-info p.copyright-section {
                color: <?php echo esc_attr( get_theme_mod('copyright_text_color', '#878e94') ); ?>;
            }
            body .site-info p.copyright-section a {
                color: <?php echo esc_attr( get_theme_mod('copyright_link_color', '#ffffff') ); ?>;
            }
            body .site-info p.copyright-section a:hover {
                color: <?php echo esc_attr( get_theme_mod('copyright_link_hover_color', '#') ); ?>;
            }
        </style>
    <?php }

    /* ====================
        * Header Preset
    ==================== */
    if( $hide_show_header_border == false ) { ?> 
        <style type="text/css">
         .header-sidebar.header-1 .spnc-custom .spnc-navbar { padding: 0; }
        </style>
        <?php } 
    if( $hide_show_header_border_radius == false) { ?>
        <style type="text/css">
            .header-sidebar.header-1 .spnc-navbar .spnc-container {border-radius: 0;}
            .header-sidebar.header-1 .spnc-custom .spnc-navbar{border-radius: 0;}
        </style> 
    <?php }  
    if( ($hide_show_header_border == true )  && ( $hide_show_header_border_radius == false)) { ?>
        <style type="text/css">
            .header-1 .spnc-custom .spnc-navbar {padding: 1px 1px;}
        </style>
    <?php } 

    /* ====================
        * Featured Video
    ==================== */
    if( get_theme_mod('featured_video_section_width','default')=='full') { ?>
        <style type="text/css">
            .spnc-page-section-space.spnc-video .spnc-container
            {
                    max-width: 100%;
                    padding: 0;
            }
        </style>    
    <?php }

    

}
add_action('wp_head', 'newscrunch_color_back_custom_css');