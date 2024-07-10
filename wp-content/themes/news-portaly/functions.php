<?php 
add_action( 'wp_enqueue_scripts', 'news_portaly_enqueue_styles' );
function news_portaly_enqueue_styles() {
	wp_enqueue_style( 'news-portaly-parent-style', get_template_directory_uri() . '/style.css' ); 
} 

function news_portaly_load_google_fonts() {
	wp_enqueue_style( 'news-portaly-google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:400,500,600' ); 
}
add_action( 'wp_enqueue_scripts', 'news_portaly_load_google_fonts' ); 


if ( ! function_exists( 'feather_magazine_archive_post' ) ) {
	function feather_magazine_archive_post( $layout = '' ) { 
		?>
		<article class="post excerpt post-list-item">
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="post-blogs-container-thumbnails">
				<?php } else { ?>
					<div class="post-blogs-container">
					<?php } ?>
					<?php if ( empty($feather_magazine_full_posts) ) : ?>
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="featured-thumbnail-container">
								<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" id="featured-thumbnail">
									<?php  $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');  
									echo '<div class="blog-featured-thumbnail" style="background-image:url('.esc_url($featured_img_url).')"></div>';
									?> 
								</a>
							</div>
							<div class="thumbnail-post-content">
							<?php } else { ?>
								<div class="nothumbnail-post-content">
								<?php } ?>
								
								<h2 class="title">
									<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
								</h2>
								<span class="entry-meta">
									<?php echo get_the_date(); ?>
									<?php
									if ( is_sticky() && is_home() && ! is_paged() ) {
										printf( ' / <span class="sticky-text">%s</span>', esc_html( 'Featured', 'news-portaly' ) );
									} ?>
								</span>
								<div class="post-content">
									<?php echo esc_html(feather_magazine_excerpt(26)); ?><?php echo esc_html_e('...','news-portaly'); ?>
								</div>
							<?php else : ?>
								<?php if (feather_magazine_post_has_moretag()) : ?>
									<?php feather_magazine_readmore(); ?>
								</div>
							</div>
						<?php endif; ?>
					<?php endif; ?>
				</article>
			<?php }
		}



		function news_portaly_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'feather_single_settings', array(
		'title'      => __('Single Post / Page Settings','news_portaly'),
		'priority'   => 100,
		'capability' => 'edit_theme_options',

	) );

    //Related Posts
	$wp_customize->add_setting('feather_magazine_relatedposts_section', array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_key',
		'transport'         => 'refresh',
		'default'           => '1',
	));
	$wp_customize->add_control('feather_magazine_relatedposts_section', array(
		'label'    => __('Related Posts Section', 'news_portaly'),
		'section'  => 'feather_single_settings',
		'description' => __('This setting will only affect blog posts.','news_portaly'),
		'settings' => 'feather_magazine_relatedposts_section',
		'type'     => 'radio',
		'choices'  => array(
			'0' => __('OFF', 'news_portaly'),
			'1' => __('ON', 'news_portaly'),
		),
	));

    //Author Box
	$wp_customize->add_setting('feather_magazine_authorbox_section', array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_key',
		'transport'         => 'refresh',
		'default'           => '1',
	));
	$wp_customize->add_control('feather_magazine_authorbox_section', array(
		'label'    => __('Author box Section', 'news_portaly'),
		'section'  => 'feather_single_settings',
		'description' => __('This setting will only affect blog posts.','news_portaly'),
		'settings' => 'feather_magazine_authorbox_section',
		'type'     => 'radio',
		'choices'  => array(
			'0' => __('OFF', 'news_portaly'),
			'1' => __('ON', 'news_portaly'),
		),
	));



	function news_portly_sanitize_checkbox( $input ){
		return ( isset( $input ) ? true : false );
	}


}
add_action( 'customize_register', 'news_portaly_customize_register' );

if(! function_exists('news_portly_color_output' ) ):
/**
* Set the header background color 
*/
function news_portly_color_output(){

	?>

	<style type="text/css">
		<?php if ( get_theme_mod( 'footer_widgets_frontpage_only' ) == '1' ) : ?>
			body:not(.home) .footer-widgets{
				display:none;
				visibility:hidden;
			}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'footer_copyright_frontpage_only' ) == '1' ) : ?>
			body:not(.home) .copyrights{
				display:none;
				visibility:hidden;
			}
		<?php endif; ?>

		#site-header { background-color: <?php echo esc_attr(get_theme_mod( 'top_header_background_color')); ?>; }
		.primary-navigation, #navigation ul ul li, #navigation.mobile-menu-wrapper { background-color: <?php echo esc_attr(get_theme_mod( 'navigation_background_color')); ?>; }
		a#pull, #navigation .menu a, #navigation .menu a:hover, #navigation .menu .fa > a, #navigation .menu .fa > a, #navigation .toggle-caret { color: <?php echo esc_attr(get_theme_mod( 'navigation_link_color')); ?> }
		#sidebars .widget h3, #sidebars .widget h3 a, #sidebars h3 { color: <?php echo esc_attr(get_theme_mod( 'sidebar_headline_color')); ?>; }
		#sidebars .widget a, #sidebars a, #sidebars li a { color: <?php echo esc_attr(get_theme_mod( 'sidebar_link_color')); ?>; }
		#sidebars .widget, #sidebars, #sidebars .widget li { color: <?php echo esc_attr(get_theme_mod( 'sidebar_text_color')); ?>; }
		.post.excerpt .post-content, .pagination a, .pagination2, .pagination .dots { color: <?php echo esc_attr(get_theme_mod( 'all_blog_posts_text')); ?>; }
		.post.excerpt h2.title a { color: <?php echo esc_attr(get_theme_mod( 'all_blog_posts_headline')); ?>; }
		.pagination a, .pagination2, .pagination .dots { border-color: <?php echo esc_attr(get_theme_mod( 'all_blog_posts_text')); ?>; }
		span.entry-meta{ color: <?php echo esc_attr(get_theme_mod( 'all_blog_posts_date')); ?>; }
		.article h1, .article h2, .article h3, .article h4, .article h5, .article h6, .total-comments, .article th{ color: <?php echo esc_attr(get_theme_mod( 'post_page_headline')); ?>; }
		.article, .article p, .related-posts .title, .breadcrumb, .article #commentform textarea  { color: <?php echo esc_attr(get_theme_mod( 'post_page_text')); ?>; }
		.article a, .breadcrumb a, #commentform a { color: <?php echo esc_attr(get_theme_mod( 'post_page_link')); ?>; }
		#commentform input#submit, #commentform input#submit:hover{ background: <?php echo esc_attr(get_theme_mod( 'post_page_link')); ?>; }
		.post-date-feather, .comment time { color: <?php echo esc_attr(get_theme_mod( 'post_page_date')); ?>; }
		.footer-widgets #searchform input[type='submit'],  .footer-widgets #searchform input[type='submit']:hover{ background: <?php echo esc_attr(get_theme_mod( 'footer_link_color')); ?>; }
		.footer-widgets h3:after{ background: <?php echo esc_attr(get_theme_mod( 'footer_headline_color')); ?>; }
		.footer-widgets h3{ color: <?php echo esc_attr(get_theme_mod( 'footer_headline_color')); ?>; }
		.footer-widgets .widget li, .footer-widgets .widget, #copyright-note{ color: <?php echo esc_attr(get_theme_mod( 'footer_text_color')); ?>; }
		footer .widget a, #copyright-note a, #copyright-note a:hover, footer .widget a:hover, footer .widget li a:hover{ color: <?php echo esc_attr(get_theme_mod( 'footer_link_color')); ?>; }
	</style>
<?php }
add_action( 'wp_head', 'news_portly_color_output' );
endif;



/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for child theme Lightweightly Blog for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

require_once get_stylesheet_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'news_portaly_register_required_plugins' );

function news_portaly_register_required_plugins() {
	$plugins = array(

		array(
			'name'      => 'Tables',
			'slug'      => 'superb-tables',
			'required'  => false,
		),
		array(
			'name'      => 'Coupon Reveal Buttons',
			'slug'      => 'coupon-reveal-button',
			'required'  => false,
		),
	);

	$config = array(
		'id'           => 'news-portaly',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
