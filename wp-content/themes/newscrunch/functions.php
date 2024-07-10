<?php
/**
 * Newscrunch functions and definitions
 *
 * @package Newscrunch
 */

// Global variables define
define('NEWSCRUNCH_TEMPLATE_DIR_URI', get_template_directory_uri());
define('NEWSCRUNCH_TEMPLATE_DIR', get_template_directory());

// wp_body_open function definition
if ( ! function_exists( 'wp_body_open' ) ) {

    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action( 'wp_body_open' );
    }
}

/**
 * Load all core theme function files
*/
require NEWSCRUNCH_TEMPLATE_DIR . '/inc/scripts/script.php';
require NEWSCRUNCH_TEMPLATE_DIR . '/inc/helpers.php';
require NEWSCRUNCH_TEMPLATE_DIR . '/inc/breadcrumbs/breadcrumbs.php';
require NEWSCRUNCH_TEMPLATE_DIR . '/inc/menu/default_menu_walker.php';
require NEWSCRUNCH_TEMPLATE_DIR . '/inc/menu/newscrunch_nav_walker.php';
require NEWSCRUNCH_TEMPLATE_DIR . '/partials/widgets/register-sidebars.php';
require NEWSCRUNCH_TEMPLATE_DIR . '/inc/customizer/customizer.php';
require NEWSCRUNCH_TEMPLATE_DIR . '/inc/theme-color/custom-color.php';
require NEWSCRUNCH_TEMPLATE_DIR . '/inc/theme-color/color-background.php';
require NEWSCRUNCH_TEMPLATE_DIR . '/inc/customizer/selective-refresh.php';
require NEWSCRUNCH_TEMPLATE_DIR . '/inc/meta-boxes/newscrunch-meta-box.php'; 
require NEWSCRUNCH_TEMPLATE_DIR . '/inc/pagination/newscrunch-pagination.php';
if( class_exists( 'Spice_Starter_Sites' )):
require NEWSCRUNCH_TEMPLATE_DIR . '/inc/customizer/upsell/class-customize.php'; 
endif;
require NEWSCRUNCH_TEMPLATE_DIR . '/inc/customizer/customizer-recommended-plugin.php';

if ( ! function_exists( 'spncp_activate' ) ) {
	require NEWSCRUNCH_TEMPLATE_DIR . '/inc/font/font.php';
}

if ( ! function_exists( 'newscrunch_setup' ) ) :
	/**
		* Sets up theme defaults and registers support for various WordPress features.
		*
		* Note that this function is hooked into the after_setup_theme hook, which
		* runs before the init hook. The init hook is too late for some features, such
		* as indicating support for post thumbnails.
	 */
	function newscrunch_setup() {
		/*
			* Make theme available for translation.
			* Translations can be filed in the /languages/ directory.
			* If you're building a theme based on News Crunch, use a find and replace
			* to change 'newscrunch' to the name of your theme in all the template files.
		*/
		load_theme_textdomain( 'newscrunch', NEWSCRUNCH_TEMPLATE_DIR . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		* Let WordPress manage the document title.
		*/
		add_theme_support( 'title-tag' );

		/*
		* Enable support for Post Thumbnails on posts and pages.
		*/
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'newscrunch' ),
				'footer_menu' => esc_html__( 'Footer Menu', 'newscrunch' ),
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'newscrunch_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
 		* Add support for core custom logo.
		*/
		add_theme_support('custom-logo',
			array(
				'height'      => 60,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
				'header-text' => array('site-title', 'site-description')
			)
		);

		if( !class_exists('Newscrunch_Plus') ) {
			//About Theme	         
	        $newscrunch_theme = wp_get_theme(); // gets the current theme
	        if ('Newscrunch' == $newscrunch_theme->name || 'Newscrunch Child' == $newscrunch_theme->name || 'Newscrunch child' == $newscrunch_theme->name ) {
	            if (is_admin()) {                       
	                require NEWSCRUNCH_TEMPLATE_DIR . '/admin/admin-init.php';
	            }
	        }
		}	
	}
endif;
add_action( 'after_setup_theme', 'newscrunch_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function newscrunch_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'newscrunch_content_width', 640 );
}
add_action( 'after_setup_theme', 'newscrunch_content_width', 0 );

/*
 * Add Body Class
 */
add_filter( 'body_class', 'newscrunch_body_class' );
function newscrunch_body_class( $classes ) {
        $classes[] = 'newscrunch';
	return $classes;
}

function newscrunch_hedder_full_layout(){
    if(get_theme_mod('header_layout','2')=='full'):?>
        <style type="text/css">
           @media (min-width: 1200px){
           	.spnc-topbar{padding:0 50px;}
           	.header-sidebar .spnc-container,.header-1 .spnc-custom .spnc-navbar{max-width: 100%;}
           	.header-sidebar.header-1 .spnc-navbar .spnc-container {padding: 12px 50px;}
           }
           .stickymenu {
           	max-width: 100%;
           }
        </style>
    <?php 
    endif;
}
add_action('wp_head','newscrunch_hedder_full_layout');


// Notice to add required plugin
if(!class_exists('Newscrunch_Plus')){
    function newscrunch_admin_plugin_notice_warn() {
        $theme_name=wp_get_theme();
        if ( get_option( 'dismissed-newscrunch_comanion_plugin', false ) ) {
           return;
        }?>

        <div class="updated notice is-dismissible newscrunch-theme-notice">
        	<div class="dashboard-hero-panel">
	            <div class="hero-panel-content">
	                <div class="hero-panel-subtitle">
	                    <?php esc_html_e('Hello', 'newscrunch'); 
	                    echo ', '; 
	                    $current_user = wp_get_current_user();
	                    echo esc_html($current_user->display_name);
	                    ?>
	                </div>
	                <div class="hero-panel-title">
	                    <?php 
	                    /* translators: %s: theme name */
	                    printf(esc_html__('Welcome to', 'newscrunch') . ' %s', $theme_name ); ?>
	                </div>
	                <div class="hero-panel-description">
	                    <?php 
	                    /* translators: %s: theme name */
	                    printf(esc_html__("%s is now installed and ready to use. We've provide some links to get you started.", 'newscrunch'), $theme_name ); ?>
	                </div>
	                <div class="theme-admin-button-wrap theme-admin-button-group">
	                	<a href="<?php echo esc_url(admin_url('admin.php?page=newscrunch-welcome')); ?>" class="button theme-admin-button admin-button-secondary" target="_self">
		                        <span class="dashicons dashicons-dashboard"></span>
		                        <span><?php esc_html_e('Theme Dashboard', 'newscrunch'); ?></span>
		                </a>
	                    <a href="<?php echo esc_url('https://spicethemes.com/newscrunch-wordpress-theme/#newscrunch_demo_lite'); ?>" class="button theme-admin-button admin-button-secondary" target="_blank">
	                        <span class="dashicons dashicons-welcome-view-site"></span>
	                        <span><?php esc_html_e('View Live Demos', 'newscrunch'); ?></span>
	                    </a>
	                    <a href="<?php echo esc_url('https://helpdoc.spicethemes.com/category/newscrunch/'); ?>" class="button theme-admin-button admin-button-secondary" target="_blank">
	                        <span class="dashicons dashicons-media-document"></span>
	                        <span><?php esc_html_e('Theme Documentation', 'newscrunch'); ?></span>
	                    </a>
		                <?php
				            $newscrunch_about_page=newscrunch_about_page();            
				            $newscrunch_actions = $newscrunch_about_page->recommended_actions;
				            $newscrunch_actions_todo = get_option( 'recommended_actions', false );
				            if($newscrunch_actions): 
				                foreach ($newscrunch_actions as $key => $newscrunch_val):
				                    if($newscrunch_val['id']=='install_spice-starter-sites'):
				                        /* translators: %s: theme name */
				                        echo '<p class="newscrunch-import-btn">'.wp_kses_post($newscrunch_val['link']).'</p>';
				                    endif;
				                endforeach;
			            endif;?>
	                </div>
	            </div>
	            <div class="hero-panel-image">
	                    <img src="<?php echo esc_url(get_theme_file_uri().'/admin/assets/img/welcome-banner.png');?>" alt="<?php esc_attr_e('Welcome Banner','newscrunch'); ?>">
	            </div>
        	</div>
        </div>
        
        <script type="text/javascript">
            jQuery(function($) {
            $( document ).on( 'click', '.newscrunch-theme-notice .notice-dismiss', function () {
                var type = $( this ).closest( '.newscrunch-theme-notice' ).data( 'notice' );
                $.ajax( ajaxurl,
                  {
                    type: 'POST',
                    data: {
                      action: 'dismissed_notice_handler',
                      type: type,
                    }
                  } );
              } );
          });
        </script>
    <?php

    }
     global $pagenow;
    if ( "themes.php" == $pagenow && is_admin() ) {
    add_action( 'admin_notices', 'newscrunch_admin_plugin_notice_warn' );
    add_action( 'wp_ajax_dismissed_notice_handler', 'newscrunch_ajax_notice_handler');
	}

}


if ( ! function_exists( 'newcrunch_schema_attributes' ) ) :
	function newcrunch_schema_attributes() {
		$itemtype = 'WebPage'; 
		$blog_page = ( is_home() || is_archive() || is_attachment() || is_tax() || is_single() );
		$itemtype = ( $blog_page ) ? 'Blog' : $itemtype;
		$itemtype = ( is_search() ) ? 'SearchResultsPage' : $itemtype;
		$itemtype_final = apply_filters( 'newcrunch_schema_attributes_itemtype', $itemtype );
		echo apply_filters( 'newcrunch_schema_attributes', "itemtype='https://schema.org/" . esc_attr( $itemtype_final ) . "' itemscope='itemscope'" );
	}
endif;

// Freemius snippet code
if ( ! function_exists( 'new_fs' ) ) {
	if(class_exists('Spice_Starter_Sites') && defined( 'SPICE_STARTER_SITES_PLUGIN_PATH' ) && file_exists(SPICE_STARTER_SITES_PLUGIN_PATH . '/freemius/start.php')) {
	    // Create a helper function for easy SDK access.
	    function new_fs() {
	        global $new_fs;

	        if ( ! isset( $new_fs ) ) {
	            // Include Freemius SDK.
	            require_once SPICE_STARTER_SITES_PLUGIN_PATH . '/freemius/start.php';

	            $new_fs = fs_dynamic_init( array(
	                'id'                  => 	'12701',
	                'slug'                => 	'newscrunch',
	                'type'                => 	'theme',
	                'public_key'          => 	'pk_364d8ab336ff6a7292ae9fa7719fe',
	                'is_premium'          =>	true,
	                'has_premium_version' => 	false,
	                'has_addons'          => 	true,
	                'has_paid_plans'      => 	false,
	                'menu'                => 	array(
	                    'slug'           =>		'newscrunch-welcome',
	                    'account'        =>		true,
	                    'support'        =>		true,
	                )
	            ) );
	        }

	        return $new_fs;
	    }

	    // Init Freemius.
	    new_fs();
	    // Signal that SDK was initiated.
	    do_action( 'new_fs_loaded' );
	}
}