<?php
/**
 * Valid News functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Valid News
 */

add_theme_support( 'title-tag' );

add_theme_support( 'automatic-feed-links' );

add_theme_support( 'register_block_style' );

add_theme_support( 'register_block_pattern' );

add_theme_support( 'responsive-embeds' );

add_theme_support( 'wp-block-styles' );

add_theme_support( 'align-wide' );

add_theme_support(
	'html5',
	array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	)
);

add_theme_support(
	'custom-logo',
	array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	)
);

if ( ! function_exists( 'valid_news_setup' ) ) :
	function valid_news_setup() {
		/*
		* Make child theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
		load_child_theme_textdomain( 'valid-news', get_stylesheet_directory() . '/languages' );
	}
endif;
add_action( 'after_setup_theme', 'valid_news_setup' );

if ( ! function_exists( 'valid_news_enqueue_styles' ) ) :
	/**
	 * Enqueue scripts and styles.
	 */
	function valid_news_enqueue_styles() {
		$parenthandle = 'fact-news-style';
		$theme        = wp_get_theme();

		wp_enqueue_style(
			$parenthandle,
			get_template_directory_uri() . '/style.css',
			array(
				'fact-news-fonts',
				'fact-news-slick-style',
				'fact-news-fontawesome-style',
				'fact-news-blocks-style',
			),
			$theme->parent()->get( 'Version' )
		);

		wp_enqueue_style(
			'valid-news-style',
			get_stylesheet_uri(),
			array( $parenthandle ),
			$theme->get( 'Version' )
		);

		// Custom script.
		wp_enqueue_script( 'valid-news-custom-script', get_stylesheet_directory_uri() . '/assets/js/custom.min.js', array( 'jquery', 'fact-news-custom-script' ), true );

	}

endif;

add_action( 'wp_enqueue_scripts', 'valid_news_enqueue_styles' );

// Customizer.
require get_theme_file_path() . '/inc/customizer/customizer.php';

/**
 * Image sanitization callback example.
 *
 * Checks the image's file extension and mime type against a whitelist. If they're allowed,
 * send back the filename, otherwise, return the setting default.
 *
 * - Sanitization: image file extension
 * - Control: text, WP_Customize_Image_Control
 */
function valid_news_sanitize_image( $image, $setting ) {
	/*
	 * Array of valid image file types.
	 *
	 * The array includes image mime types that are included in wp_get_mime_types()
	 */
	$mimes = array(
		'jpg|jpeg|jpe' => 'image/jpeg',
		'gif'          => 'image/gif',
		'png'          => 'image/png',
		'bmp'          => 'image/bmp',
		'tif|tiff'     => 'image/tiff',
		'ico'          => 'image/x-icon',
		'svg'          => 'image/svg+xml',
	);
	// Return an array with file extension and mime_type.
	$file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
	return ( $file['ext'] ? $image : $setting->default );
}

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses valid_news_header_style()
 */
function valid_news_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'fact_news_custom_header_args',
			array(
				'default-image'      => '',
				'default-text-color' => '3a7fd8',
				'width'              => 1000,
				'height'             => 250,
				'flex-height'        => true,
				'wp-head-callback'   => 'fact_news_header_style',
			)
		)
	);
}
add_action( 'after_setup_theme', 'valid_news_custom_header_setup' );

function valid_news_header_text_style() {
	?>
	<style type="text/css">

		/* Site title */
		.site-title a{
		color: #<?php echo esc_attr( get_header_textcolor() ); ?>;
		}
		/* End Site title */

	</style>
	<?php
}
add_action( 'wp_head', 'valid_news_header_text_style' );

function valid_news_load_custom_wp_admin_style() {
	?>
	<style type="text/css">
		.ocdi p.demo-data-download-link {
		display: none !important;
		}
	</style>
	<?php
}
add_action( 'admin_enqueue_scripts', 'valid_news_load_custom_wp_admin_style' );

// One Click Demo Import after import setup.
if ( class_exists( 'OCDI_Plugin' ) ) {
	require get_theme_file_path() . '/inc/demo-import.php';
}

// Style for demo data download link.
function valid_news_admin_panel_demo_data_download_link() {
	?>
	<style type="text/css">
		p.valid-news-demo-data {
		font-size: 16px;
		font-weight: 700;
		display: inline-block;
		border: 0.5px solid #dfdfdf;
		padding: 8px;
		background: #ffff;
		}
	</style>
	<?php
}
add_action( 'admin_enqueue_scripts', 'valid_news_admin_panel_demo_data_download_link' );