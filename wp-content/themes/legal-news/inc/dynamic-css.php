<?php

/**
 * Dynamic CSS
 */
function legal_news_dynamic_css() {

	$primary_color         = get_theme_mod( 'primary_color', '#d82926' );
	$site_title_font       = get_theme_mod( 'legal_news_site_title_font', 'Titillium Web' );
	$site_description_font = get_theme_mod( 'legal_news_site_description_font', 'Titillium Web' );
	$header_font           = get_theme_mod( 'legal_news_header_font', 'Titillium Web' );
	$body_font             = get_theme_mod( 'legal_news_body_font', 'Titillium Web' );

	$custom_css  = '';
	$custom_css .= '
    /* Color */
    :root {
        --primary-color: ' . esc_attr( $primary_color ) . ';
        --header-text-color: ' . esc_attr( '#' . get_header_textcolor() ) . ';
    }
    ';

	$custom_css .= '
    /* Typograhpy */
    :root {
        --font-heading: "' . esc_attr( $header_font ) . '", serif;
        --font-main: -apple-system, BlinkMacSystemFont,"' . esc_attr( $body_font ) . '", "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
    }

    body,
	button, input, select, optgroup, textarea {
        font-family: "' . esc_attr( $body_font ) . '", serif;
	}

	.site-title a {
        font-family: "' . esc_attr( $site_title_font ) . '", serif;
	}
    
	.site-description {
        font-family: "' . esc_attr( $site_description_font ) . '", serif;
	}
    ';

	wp_add_inline_style( 'legal-news-style', $custom_css );

}
add_action( 'wp_enqueue_scripts', 'legal_news_dynamic_css', 99 );
