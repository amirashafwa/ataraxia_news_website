<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package VisualNews
 */

/**
 * Add customizer default values.
 *
 * @param array $default_options
 * @return array
 */
function visualnews_customizer_add_defaults( $default_options) {
	$defaults = array(
		// Excerpt Options
		'visualnews_excerpt_length'    => 30,
	);


	$updated_defaults = wp_parse_args( $defaults, $default_options );

	return $updated_defaults;
}
add_filter( 'visualnews_customizer_defaults', 'visualnews_customizer_add_defaults' );

/**
 * Returns theme mod value saved for option merging with default option if available.
 * @since 1.0
 */
function visualnews_gtm( $option ) {
	// Get our Customizer defaults
	$defaults = apply_filters( 'visualnews_customizer_defaults', true );

	return isset( $defaults[ $option ] ) ? get_theme_mod( $option, $defaults[ $option ] ) : get_theme_mod( $option );
}

if ( ! function_exists( 'visualnews_excerpt_length' ) ) :
	/**
	 * Sets the post excerpt length to n words.
	 *
	 * function tied to the excerpt_length filter hook.
	 * @uses filter excerpt_length
	 */
	function visualnews_excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}

		// Getting data from Theme Options
		$length	= visualnews_gtm( 'visualnews_excerpt_length' );

		return absint( $length );
	} // visualnews_excerpt_length.
endif;
add_filter( 'excerpt_length', 'visualnews_excerpt_length', 999 );

/*
 * Remove parentheses from categories widget
 */
function visualnewscategories_postcount_filter ($variable) {
   $variable = str_replace('(', '<span class="post-count"> ', $variable);
   $variable = str_replace(')', ' </span>', $variable);
   return $variable;
}
add_filter('wp_list_categories','visualnewscategories_postcount_filter');

/**
 * Customize excerpt more.
 */
if ( ! function_exists( 'visualnews_excerpt_more' ) ) :

function visualnews_excerpt_more( $more ) {
    if ( is_admin() ) {
        return $more;
    } else {
        return '... ';
    }
}
add_filter( 'excerpt_more', 'visualnews_excerpt_more' );

endif;

/*
 * Admin Notice
 */
function visualnews_notice() {

    $theme = wp_get_theme();

    echo '<div class="notice notice-success is-dismissible"><p>'. esc_html('Thank you for installing the VisualNews theme!','visualnews') . '</p><p><a class="button-secondary" href="' . esc_url( $theme->get( 'ThemeURI' ) ) . '" target="_blank">' . esc_html( 'Theme Demo', 'visualnews' ) . '</a> '. '&nbsp;' . ' <a class="button-primary" href="' . esc_url( $theme->get( 'AuthorURI' ) . '/themes/visualnews-pro' ) . '" target="_blank">' . esc_html( 'Upgrade to PRO theme', 'visualnews' ) . '</a></p></div>';

}

add_action('admin_notices', 'visualnews_notice');
