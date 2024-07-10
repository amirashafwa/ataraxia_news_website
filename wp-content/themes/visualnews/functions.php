<?php

if ( ! function_exists( 'visualnews_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function visualnews_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on VisualNews, use a find and replace
		 * to change 'visualnews' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'visualnews', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'align-wide' );

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Experimental support for adding blocks inside nav menus
		add_theme_support( 'block-nav-menus' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );
	}
endif;
add_action( 'after_setup_theme', 'visualnews_setup' );

if ( ! function_exists( 'visualnews_fonts_url' ) ) :
	/**
	 * Register Google fonts for VisualNews
	 *
	 * Create your own visualnews_fonts_url() function to override in a child theme.
	 *
	 * @since 1.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function visualnews_fonts_url() {
		$fonts_url = '';

		/* Translators: If there are characters in your language that are not
		* supported by Poppins, translate this to 'off'. Do not translate
		* into your own language.
		*/
		$font_families = array( 'Inter:wght@400;600;700' );

		if ( ! empty( $font_families  ) ) {

			$query_args = array(
				'family' => implode( '&family=', $font_families ), //urlencode( implode( '|', $font_families ) ),
				// 'subset' => urlencode( 'latin,latin-ext' ),
				'display' => 'swap',
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css2' );
		}

		if ( ! class_exists( 'WPTT_WebFont_Loader' ) ) {
			// Load Google fonts from Local.
			require_once get_theme_file_path( 'inc/lib/wptt-webfont-loader.php' );
		}

		return esc_url( wptt_get_webfont_url( $fonts_url ) );
	}
endif;

/**
 * Enqueue scripts and styles.
 */
function visualnews_enqueue_scripts() {
	$min  = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	// Register theme stylesheet.
	$theme_version = wp_get_theme()->get( 'Version' );
	// FontAwesome.
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome/css/all' . $min . '.css', array(), '5.15.3', 'all' );
	wp_enqueue_style( 'visualnews-fonts', visualnews_fonts_url(), array(), null );

	$deps = array( 'font-awesome' );
	global $wp_styles;
	if ( in_array( 'wc-blocks-vendors-style', $wp_styles->queue ) ) {
		$deps[] = 'wc-blocks-vendors-style';
	}

	wp_enqueue_style( 'visualnews-style', get_stylesheet_uri(), $deps, date( 'Ymd-Gis', filemtime( get_theme_file_path( 'style.css' ) ) ) );
	wp_enqueue_style( 'visualnews-design', get_template_directory_uri() . '/design' . $min . '.css', array(), '1.0.4', 'all' );		
	wp_enqueue_style( 'visualnews-responsive-style', get_template_directory_uri() . '/responsive.css', $deps, date( 'Ymd-Gis', filemtime( get_theme_file_path( 'responsive.css' ) ) ) );

}
add_action( 'wp_enqueue_scripts', 'visualnews_enqueue_scripts' );

function visualnews_block_assets() {
	$min = '';
	// FontAwesome.
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome/css/all' . $min . '.css', array(), '5.15.3', 'all' );

	wp_enqueue_style( 'visualnews-admin-style', get_template_directory_uri() . '/assets/css/admin-style' . $min . '.css', array(), '1.0.0', 'all' );	

	wp_enqueue_style( 'visualnews-design', get_template_directory_uri() . '/design' . $min . '.css', array(), '1.0.4', 'all' );	

}
add_action( 'enqueue_block_assets', 'visualnews_block_assets' );

/**
 *
 * Enqueue scripts and styles.
 */
function visualnews_editor_styles() {
	// Enqueue editor styles.
	add_editor_style(
		array(
			visualnews_fonts_url(),
		)
	);
}
add_action( 'admin_init', 'visualnews_editor_styles' );

/**
 * Post Thumbnails.
 */
if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 600, 400, true );
    add_image_size( 'visualnews_post_thumb', 600, 400, true );
}

/**
 * Load core file.
 */
require_once get_template_directory() . '/inc/init.php';
