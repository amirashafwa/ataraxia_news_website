<?php
/**
 * Apex News functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Apex_News
 */

if ( ! function_exists( 'apex_news_setup' ) ) :
	function apex_news_setup() {
		/*
		* Make child theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
		load_child_theme_textdomain( 'apex-news', get_stylesheet_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'register_block_pattern' );

		add_theme_support( 'register_block_style' );

		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'align-wide' );

		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'apex_news_setup' );

if ( ! function_exists( 'apex_news_enqueue_styles' ) ) :
	/**
	 * Enqueue scripts and styles.
	 */
	function apex_news_enqueue_styles() {
		$parenthandle = 'legal-news-style';
		$theme        = wp_get_theme();

		wp_enqueue_style(
			$parenthandle,
			get_template_directory_uri() . '/style.css',
			array(
				'legal-news-slick-style',
				'legal-news-fontawesome-style',
				'legal-news-google-fonts',
			),
			$theme->parent()->get( 'Version' )
		);

		wp_enqueue_style(
			'apex-news-style',
			get_stylesheet_uri(),
			array( $parenthandle ),
			$theme->get( 'Version' )
		);

	}

endif;

add_action( 'wp_enqueue_scripts', 'apex_news_enqueue_styles' );

function admin_style() {
	?>
	<style type="text/css">

		.apex-news-demo-data {
				display: block !important;
				margin: 0 0 30px 0;
				background: #fff;
				border: 1px solid #72aee6;
				border-left-width: 4px;
				box-shadow: 0 1px 1px rgb(0 0 0 / 4%);
				padding: 1px 12px;
		}
		.apex-news-demo-data .demo-file-content {
			margin: 0.5em 0;
    		padding: 2px;
		}

		.ocdi .notice.notice-info {
			display: none !important;
		}
	</style>
	<?php
}
add_action('admin_enqueue_scripts', 'admin_style');

require get_theme_file_path() . '/inc/customizer.php';

// Custom Controls
require get_theme_file_path() . '/inc/custom-controls.php';

// Widgets.
require get_theme_file_path() . '/inc/widgets/posts-tile-and-list-widget.php';

/**
 * One Click Demo Import after import setup.
 */
if ( class_exists( 'OCDI_Plugin' ) ) {
	require get_theme_file_path() . '/inc/ocdi.php';
}

/**
 * Renders customizer section link
 */
function apex_news_section_link( $section_id ) {
	$section_name      = str_replace( 'apex_news_', ' ', $section_id );
	$section_name      = str_replace( '_', ' ', $section_name );
	$starting_notation = '#';
	?>
	<span class="section-link">
		<span class="section-link-title"><?php echo esc_html( $section_name ); ?></span>
	</span>
	<style type="text/css">
		<?php echo $starting_notation . $section_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>:hover .section-link {
			visibility: visible;
		}
	</style>
	<?php
}
