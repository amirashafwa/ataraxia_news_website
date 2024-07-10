<?php
/**
 * feather Lite functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package feather Lite
 */

if ( ! function_exists( 'feather_magazine_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */


function feather_magazine_setup() {
    /*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on feather, use a find and replace
	 * to change 'feather-magazine' to the name of your theme in all the template files.
	 */
    load_theme_textdomain( 'feather-magazine', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true );
	add_image_size( 'feather-magazine-related', 200, 125, true ); //related

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'feather-magazine' ),
 ) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
 ) );

	// Set up the WordPress core custom background feature.
  add_theme_support( 'custom-background', apply_filters( 'feather_magazine_custom_background_args', array(
    'default-color' => '#fff',
    'default-image' => '',
  ) ) );
}
endif;
add_action( 'after_setup_theme', 'feather_magazine_setup' );

function feather_magazine_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'feather_magazine_content_width', 678 );
}
add_action( 'after_setup_theme', 'feather_magazine_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function feather_magazine_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'feather-magazine' ),
		'id'            => 'sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
 ) );

	// Header Ad sidebar
  register_sidebar(array(
    'name' => __('Header Ad', 'feather-magazine'),
    'description'   => __( '728x90 Ad Area', 'feather-magazine' ),
    'id' => 'widget-header',
    'before_widget' => '<div id="%1$s" class="widget-header">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ));

    // First Footer 
  register_sidebar( array(
    'name'          => __( 'Footer 1', 'feather-magazine' ),
    'description'   => __( 'First footer column', 'feather-magazine' ),
    'id'            => 'footer-first',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );

	// Second Footer 
  register_sidebar( array(
    'name'          => __( 'Footer 2', 'feather-magazine' ),
    'description'   => __( 'Second footer column', 'feather-magazine' ),
    'id'            => 'footer-second',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );

	// Third Footer 
  register_sidebar( array(
    'name'          => __( 'Footer 3', 'feather-magazine' ),
    'description'   => __( 'Third footer column', 'feather-magazine' ),
    'id'            => 'footer-third',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
}
add_action( 'widgets_init', 'feather_magazine_widgets_init' );

function feather_magazine_custom_sidebar() {
  $sidebar = 'sidebar';
  return $sidebar;
}

/**
 * Enqueue scripts and styles.
 */
function feather_magazine_scripts() {
	wp_enqueue_style( 'feather-magazine-style', get_stylesheet_uri() );

	$handle = 'feather-magazine-style';

  wp_enqueue_script( 'feather-magazine-customscripts', get_template_directory_uri() . '/js/customscripts.js',array('jquery'),'',true); 

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'feather_magazine_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Copyrights
 */
if ( ! function_exists( 'feather_magazine_copyrights_credit' ) ) {
  function feather_magazine_copyrights_credit() { 
    global $feathermagazine_options
    ?>
    <!--start copyrights-->
    <div class="copyrights">
      <div class="container">
        <div class="row" id="copyright-note">
          <span>
            <?php echo '&copy; '. esc_html(date_i18n(__('Y','feather-magazine'))); ?> <?php bloginfo( 'name' ); ?> <span class="footer-info-right">
              <?php echo esc_html_e(' | WordPress Theme by', 'feather-magazine') ?> <a href="<?php echo esc_url('https://superbthemes.com/', 'feather-magazine'); ?>" rel="nofollow noopener"><?php echo esc_html_e(' Superb WordPress Themes', 'feather-magazine') ?></a>          </span>
              <div class="top">
                <a href="#top" class="toplink"><?php esc_html_e('Back to Top','feather-magazine'); ?> &uarr;</a>
              </div>
            </div>
          </div>
        </div>
        <!--end copyrights-->
      <?php }
    }

/**
 * Custom Comments template
 */
if ( ! function_exists( 'feather_magazine_comments' ) ) {
	function feather_magazine_comment($comment, $args, $depth) { ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>" style="position:relative;">
      <div class="comment-author vcard">
       <?php echo get_avatar( $comment->comment_author_email, 70 ); ?>
       <div class="comment-metadata">
        <?php printf('<span class="fn">%s</span>', get_comment_author_link()) ?>
        <span class="comment-meta">
          <?php edit_comment_link(__('(Edit)', 'feather-magazine'),'  ','') ?>
        </span>
      </div>
    </div>
    <?php if ($comment->comment_approved == '0') : ?>
      <em><?php esc_html_e('Your comment is awaiting moderation.', 'feather-magazine') ?></em>
      <br />
    <?php endif; ?>
    <div class="commentmetadata" itemprop="commentText">
     <?php comment_text() ?>
     <time><?php comment_date(get_option( 'date_format' )); ?></time>
     <span class="reply">
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </span>
  </div>
</div>
</li>
<?php }
}

/*
 * Excerpt
 */
function feather_magazine_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt);
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

/**
 * Shorthand function to check for more tag in post.
 *
 * @return bool|int
 */
function feather_magazine_post_has_moretag() {
  return strpos( get_the_content(), '<!--more-->' );
}

if ( ! function_exists( 'feather_magazine_readmore' ) ) {
    /**
     * Display a "read more" link.
     */
    function feather_magazine_readmore() {
      ?>
      <div class="readMore">
        <a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php the_title_attribute(); ?>">
          <?php esc_html_e( 'Read More', 'feather-magazine' ); ?>
        </a>
      </div>
      <?php 
    }
  }

/**
 * Breadcrumbs
 */
if (!function_exists('feather_magazine_the_breadcrumb')) {
  function feather_magazine_the_breadcrumb() {
    if ( is_front_page() ) {
      return;
    }
    echo '<span class="root"><a  href="';
    echo esc_url( home_url() );
    echo '">'.esc_html(sprintf( __( "Home", 'feather-magazine' )));
    echo '</a></span><span><i class="feather-icon icon-angle-double-right"></i></span>';
    if (is_single()) {
      $categories = get_the_category();
      if ( $categories ) {
        $level = 0;
        $hierarchy_arr = array();
        foreach ( $categories as $cat ) {
          $anc = get_ancestors( $cat->term_id, 'category' );
          $count_anc = count( $anc );
          if (  0 < $count_anc && $level < $count_anc ) {
            $level = $count_anc;
            $hierarchy_arr = array_reverse( $anc );
            array_push( $hierarchy_arr, $cat->term_id );
          }
        }
        if ( empty( $hierarchy_arr ) ) {
          $category = $categories[0];
          echo '<span><a href="'. esc_url( get_category_link( $category->term_id ) ).'" >'.esc_html( $category->name ).'</a></span><span><i class="feather-icon icon-angle-double-right"></i></span>';
        } else {
          foreach ( $hierarchy_arr as $cat_id ) {
            $category = get_term_by( 'id', $cat_id, 'category' );
            echo '<span><a href="'. esc_url( get_category_link( $category->term_id ) ).'" >'.esc_html( $category->name ).'</a></span><span><i class="feather-icon icon-angle-double-right"></i></span>';
          }
        }
      }
      echo "<span><span>";
      the_title();
      echo "</span></span>";
    } elseif (is_page()) {
      $parent_id  = wp_get_post_parent_id( get_the_ID() );
      if ( $parent_id ) {
        $breadcrumbs = array();
        while ( $parent_id ) {
          $page = get_page( $parent_id );
          $breadcrumbs[] = '<span><a href="'.esc_url( get_permalink( $page->ID ) ).'" >'.esc_html( get_the_title($page->ID) ). '</a></span><span><i class="feather-icon icon-angle-double-right"></i></span>';
          $parent_id  = $page->post_parent;
        }
        $breadcrumbs = array_reverse( $breadcrumbs );
        foreach ( $breadcrumbs as $crumb ) { echo esc_html($crumb); }
      }
      echo "<span><span>";
      the_title();
      echo "</span></span>";
    } elseif (is_category()) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $this_cat_id = $cat_obj->term_id;
      $hierarchy_arr = get_ancestors( $this_cat_id, 'category' );
      if ( $hierarchy_arr ) {
        $hierarchy_arr = array_reverse( $hierarchy_arr );
        foreach ( $hierarchy_arr as $cat_id ) {
          $category = get_term_by( 'id', $cat_id, 'category' );
          echo '<span><a href="'.esc_url( get_category_link( $category->term_id ) ).'" >'.esc_html( $category->name ).'</a></span><span><i class="feather-icon icon-angle-double-right"></i></span>';
        }
      }
      echo "<span><span>";
      single_cat_title();
      echo "</span></span>";
    } elseif (is_author()) {
      echo "<span><span>";
      if(get_query_var('author_name')) :
        $curauth = get_user_by('slug', get_query_var('author_name'));
      else :
        $curauth = get_userdata(get_query_var('author'));
      endif;
      echo esc_html( $curauth->nickname );
      echo "</span></span>";
    } elseif (is_search()) {
      echo "<span><span>";
      the_search_query();
      echo "</span></span>";
    } elseif (is_tag()) {
      echo "<span><span>";
      single_tag_title();
      echo "</span></span>";
    }
  }
}

/*
 * Google Fonts
 */
function feather_magazine_fonts_url() {
  $fonts_url = '';

    /* Translators: If there are characters in your language that are not
    * supported by Monda, translate this to 'off'. Do not translate
    * into your own language.
    */
    $monda = _x( 'on', 'Monda font: on or off', 'feather-magazine' );

    if ( 'off' !== $monda ) {
      $font_families = array();

      if ( 'off' !== $monda ) {
        $font_families[] = urldecode('Roboto:400,500,700,900');
      }

      $query_args = array(
        'family' => urlencode( implode( '|', $font_families ) ),
            //'subset' => urlencode( 'latin,latin-ext' ),
      );

      $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }

    return $fonts_url;
  }

  function feather_magazine_scripts_styles() {
    wp_enqueue_style( 'feather-magazine-fonts', feather_magazine_fonts_url(), array(), null );
  }
  add_action( 'wp_enqueue_scripts', 'feather_magazine_scripts_styles' );

/**
 * WP Mega Menu Plugin Support
 */
function feather_magazine_megamenu_parent_element( $selector ) {
  return '.primary-navigation .container';
}
add_filter( 'wpmm_container_selector', 'feather_magazine_megamenu_parent_element' );

/**
 * Post Layout for Archives
 */
if ( ! function_exists( 'feather_magazine_archive_post' ) ) {
    /**
     * Display a post of specific layout.
     * 
     * @param string $layout
     */
    function feather_magazine_archive_post( $layout = '' ) { 
     ?>
     <article class="post excerpt">

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
                    printf( ' / <span class="sticky-text">%s</span>', __( 'Featured', 'feather-magazine' ) );
                  } ?>
                </span>
                <div class="post-content">
                  <?php echo feather_magazine_excerpt(26); ?>...
                </div>
                <?php if ( get_theme_mod( 'show_readmore_btn' ) == '1' ) : ?>
                  <?php feather_magazine_readmore(); ?>
                <?php endif; ?>
              <?php else : ?>

              </div>
            </div>
          <?php endif; ?>

        </article>
      <?php }
    }




/**
 * Copyright and License for Upsell button by Justin Tadlock - 2016 © Justin Tadlock. Customizer button https://gitblogily.com/justintadlock/trt-customizer-pro
 */
require_once( trailingslashit( get_template_directory() ) . 'justinadlock-customizer-button/class-customize.php' );









// Theme page start

add_action('admin_menu', 'feather_magazine_themepage');
function feather_magazine_themepage()
{
  $option = get_option('feather_magazine_themepage_seen');
  $awaiting = !$option ? ' <span class="awaiting-mod">1</span>' : '';
  $theme_info = add_theme_page(__('Theme Settings', 'feather-magazine'), __('Theme Settings', 'feather-magazine').$awaiting, 'manage_options', 'feather-magazine-info.php', 'feather_magazine_info_page', 1);
}
function feather_magazine_info_page()
{
  $user = wp_get_current_user();
  $theme = wp_get_theme();
  $parent_name = is_child_theme() ? wp_get_theme($theme->Template) : '';
  $theme_name = is_child_theme() ? $theme." ".__("and", "feather-magazine")." ".$parent_name : $theme;
  $demo_text = is_child_theme() ? sprintf(__("Need inspiration? Take a moment to view our theme demo for the %s parent theme %s!", "feather-magazine"), $theme, $parent_name) : __("Need inspiration? Take a moment to view our theme demo!", "feather-magazine");
  $premium_text = is_child_theme() ? sprintf(__("Unlock all features by upgrading to the premium edition of %s and its parent theme %s.", "feather-magazine"), $theme, $parent_name) : sprintf(__("Unlock all features by upgrading to the premium edition of %s.", "feather-magazine"),$theme);
  $option_name = 'feather_magazine_themepage_seen';
  $option = get_option($option_name, null);
  if (is_null($option)) {
    add_option($option_name, true);
  } elseif (!$option) {
    update_option($option_name, true);
  } ?>
  <div class="wrap">

    <div class="spt-theme-settings-wrapper">
      <div class="spt-theme-settings-wrapper-main-content">
        <div class="spt-theme-settings-tabs">

         <div class="spt-theme-settings-tab">
           <input type="radio" id="tab-1" name="tab-group-1">



           <label class="spt-theme-settings-label" for="tab-1"><?php esc_html_e("Get started with", "feather-magazine"); ?> <?php echo esc_html($theme_name); ?></label>

           <div class="spt-theme-settings-content">

            <div class="spt-theme-settings-content-getting-started-wrapper">
              <div class="spt-theme-settings-content-item">
                <div class="spt-theme-settings-content-item-header">
                  <?php esc_html_e("Add Menus", "feather-magazine"); ?>
                </div>
                <div class="spt-theme-settings-content-item-content">
                 <a href="<?php echo esc_url(admin_url('nav-menus.php'))  ?>"><?php esc_html_e("Go to Menus", "feather-magazine"); ?></a>
               </div>
             </div>

             <div class="spt-theme-settings-content-item">
              <div class="spt-theme-settings-content-item-header">
               <?php esc_html_e("Add Widgets", "feather-magazine"); ?>
             </div>
             <div class="spt-theme-settings-content-item-content">
              <a href="<?php echo esc_url(admin_url('widgets.php'))  ?>"><?php esc_html_e("Go to Widgets", "feather-magazine"); ?></a>
            </div>
          </div>

          <div class="spt-theme-settings-content-item">
            <div class="spt-theme-settings-content-item-header">
              <?php esc_html_e("Change Header Image", "feather-magazine"); ?>
            </div>
            <div class="spt-theme-settings-content-item-content">
              <a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "feather-magazine"); ?></a>
            </div>
          </div>

          <div class="spt-theme-settings-content-item">
            <div class="spt-theme-settings-content-item-header">
              <?php esc_html_e("Customize Header Text & Background", "feather-magazine"); ?>
            </div>
            <div class="spt-theme-settings-content-item-content">
              <a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "feather-magazine"); ?></a>
            </div>
          </div>


          <div class="spt-theme-settings-content-item">
            <div class="spt-theme-settings-content-item-header">
             <?php esc_html_e("Upload Logo", "feather-magazine"); ?>
           </div>
           <div class="spt-theme-settings-content-item-content">
            <a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "feather-magazine"); ?></a>
          </div>
        </div>

        <div class="spt-theme-settings-content-item">
          <div class="spt-theme-settings-content-item-header">
           <?php esc_html_e("Change Background Color / Image", "feather-magazine"); ?>
         </div>
         <div class="spt-theme-settings-content-item-content">
          <a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "feather-magazine"); ?></a>
        </div>
      </div>


      <a target="_blank" href="https://superbthemes.com/feather-mag/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Customize All Fonts", "feather-magazine"); ?></span> <span><?php esc_html_e("Premium", "feather-magazine"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "feather-magazine"); ?></span>
        </div>
      </a>

      <a target="_blank" href="https://superbthemes.com/feather-mag/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Customize All Colors", "feather-magazine"); ?></span> <span><?php esc_html_e("Premium", "feather-magazine"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "feather-magazine"); ?></span>
        </div>
      </a>

      <a target="_blank" href="https://superbthemes.com/feather-mag/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Import Demo Content", "feather-magazine"); ?></span> <span><?php esc_html_e("Premium", "feather-magazine"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Demo Import", "feather-magazine"); ?></span>
        </div>
      </a>

      <a target="_blank" href="https://superbthemes.com/feather-mag/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Contact Premium Support", "feather-magazine"); ?></span> <span><?php esc_html_e("Premium", "feather-magazine"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "feather-magazine"); ?></span>
        </div>
      </a>

      <a target="_blank" href="https://superbthemes.com/feather-mag/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Unlock Full SEO Optimization", "feather-magazine"); ?></span> <span><?php esc_html_e("Premium", "feather-magazine"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "feather-magazine"); ?></span>
        </div>
      </a>

      <a target="_blank" href="https://superbthemes.com/feather-mag/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Numbered or Next/Previous Pagination", "feather-magazine"); ?></span> <span><?php esc_html_e("Premium", "feather-magazine"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "feather-magazine"); ?></span>
        </div>
      </a>

      <a target="_blank" href="https://superbthemes.com/feather-mag/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Hide/Show Breadcrumbs", "feather-magazine"); ?></span> <span><?php esc_html_e("Premium", "feather-magazine"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "feather-magazine"); ?></span>
        </div>
      </a>

      <a target="_blank" href="https://superbthemes.com/feather-mag/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Hide/Show Tags Section", "feather-magazine"); ?></span> <span><?php esc_html_e("Premium", "feather-magazine"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "feather-magazine"); ?></span>
        </div>
      </a>


      <a target="_blank" href="https://superbthemes.com/feather-mag/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Hide/Show Related Posts", "feather-magazine"); ?></span> <span><?php esc_html_e("Premium", "feather-magazine"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "feather-magazine"); ?></span>
        </div>
      </a>

      <a target="_blank" href="https://superbthemes.com/feather-mag/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Unlock Elementor Compatibility", "feather-magazine"); ?></span> <span><?php esc_html_e("Premium", "feather-magazine"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Install Elementor", "feather-magazine"); ?></span>
        </div>
      </a>

      <a target="_blank" href="https://superbthemes.com/feather-mag/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Access All Child Themes", "feather-magazine"); ?></span> <span><?php esc_html_e("Premium", "feather-magazine"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("View Child Themes", "feather-magazine"); ?></span>
        </div>
      </a>


      <a target="_blank" href="https://superbthemes.com/feather-mag/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Add Recent Posts Widget", "feather-magazine"); ?></span> <span><?php esc_html_e("Premium", "feather-magazine"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Widgets", "feather-magazine"); ?></span>
        </div>
      </a>

      <a target="_blank" href="https://superbthemes.com/feather-mag/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Hide/Show Author Box", "feather-magazine"); ?></span> <span><?php esc_html_e("Premium", "feather-magazine"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "feather-magazine"); ?></span>
        </div>
      </a>


      <a target="_blank" href="https://superbthemes.com/feather-mag/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Custom Copyright Text", "feather-magazine"); ?></span> <span><?php esc_html_e("Premium", "feather-magazine"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "feather-magazine"); ?></span>
        </div>
      </a>


      <a target="_blank" href="https://superbthemes.com/feather-mag/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Remove 'Tag' from tag page title", "feather-magazine"); ?></span> <span><?php esc_html_e("Premium", "feather-magazine"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "feather-magazine"); ?></span>
        </div>
      </a>


      <a target="_blank" href="https://superbthemes.com/feather-mag/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Remove 'Author' from author page title", "feather-magazine"); ?></span> <span><?php esc_html_e("Premium", "feather-magazine"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "feather-magazine"); ?></span>
        </div>
      </a>


      <a target="_blank" href="https://superbthemes.com/feather-mag/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Remove 'Category' from author page title", "feather-magazine"); ?></span> <span><?php esc_html_e("Premium", "feather-magazine"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "feather-magazine"); ?></span>
        </div>
      </a>


      <a target="_blank" href="https://superbthemes.com/feather-mag/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Only Show Footer Widgets on Frontpage", "feather-magazine"); ?></span> <span><?php esc_html_e("Premium", "feather-magazine"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "feather-magazine"); ?></span>
        </div>
      </a>
      <a target="_blank" href="https://superbthemes.com/feather-mag/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Full Width Page Template", "feather-magazine"); ?></span> <span><?php esc_html_e("Premium", "feather-magazine"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "feather-magazine"); ?></span>
        </div>
      </a>
      <a target="_blank" href="https://superbthemes.com/feather-mag/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Only Show Footer Copyright Section on Frontpage", "feather-magazine"); ?></span> <span><?php esc_html_e("Premium", "feather-magazine"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "feather-magazine"); ?></span>
        </div>
      </a>

      <a target="_blank" href="https://superbthemes.com/feather-mag/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
        <div class="spt-theme-settings-content-item-header">
          <span><?php esc_html_e("Show/Hide Read More Button On Post Feed", "feather-magazine"); ?></span> <span><?php esc_html_e("Premium", "feather-magazine"); ?></span>
        </div>
        <div class="spt-theme-settings-content-item-content">
          <span><?php esc_html_e("Go to Customizer", "feather-magazine"); ?></span>
        </div>
      </a>
    


    </div>
  </div> 
</div>


</div>      
</div>

<div class="spt-theme-settings-wrapper-sidebar">

  <div class="spt-theme-settings-wrapper-sidebar-item">
    <div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Additional Resources", "feather-magazine"); ?></div>
    <div class="spt-theme-settings-wrapper-sidebar-item-content">
      <ul>
        <li>
          <a target="_blank" href="https://wordpress.org/support/forums/"><span class="dashicons dashicons-wordpress"></span><?php esc_html_e("WordPress.org Support Forum", "feather-magazine"); ?></a>
        </li>
        <li>
          <a target="_blank" href="https://www.facebook.com/superbthemescom/"><span class="dashicons dashicons-facebook-alt"></span><?php esc_html_e("Find us on Facebook", "feather-magazine"); ?></a>
        </li>
        <li>
          <a target="_blank" href="https://twitter.com/superbthemescom"><span class="dashicons dashicons-twitter"></span><?php esc_html_e("Find us on Twitter", "feather-magazine"); ?></a>
        </li>
        <li>
          <a target="_blank" href="https://www.instagram.com/superbthemes/"><span class="dashicons dashicons-instagram"></span><?php esc_html_e("Find us on Instagram", "feather-magazine"); ?></a>
        </li>

      </ul>
    </div>
  </div>


  <div class="spt-theme-settings-wrapper-sidebar-item">
    <div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("View Demo", "feather-magazine"); ?></div>
    <div class="spt-theme-settings-wrapper-sidebar-item-content">
      <p><?php echo esc_html($demo_text); ?></p>
      <a href="https://superbthemes.com/demo/feather-mag/" target="_blank" class="button button-primary"><?php esc_html_e("View Demo", "feather-magazine"); ?></a>
    </div>
  </div>

  <div class="spt-theme-settings-wrapper-sidebar-item">
    <div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Upgrade to Premium", "feather-magazine"); ?></div>
    <div class="spt-theme-settings-wrapper-sidebar-item-content">
      <p><?php echo esc_html($premium_text); ?></p>
      <a href="https://superbthemes.com/feather-mag/" target="_blank" class="button button-primary"><?php esc_html_e("View Premium Version", "feather-magazine"); ?></a>
    </div>
  </div>

  <div class="spt-theme-settings-wrapper-sidebar-item">
    <div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Helpdesk", "feather-magazine"); ?></div>
    <div class="spt-theme-settings-wrapper-sidebar-item-content">
      <p><?php esc_html_e("If you have issues with", "feather-magazine"); ?> <?php echo esc_html($theme); ?> <?php esc_html_e("then send us an email through our website!", "feather-magazine"); ?></p>
      <a href="https://superbthemes.com/customer-support/" target="_blank" class="button"><?php esc_html_e("Contact Support", "feather-magazine"); ?></a>
    </div>
  </div>

  <div class="spt-theme-settings-wrapper-sidebar-item">
    <div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Review the Theme", "feather-magazine"); ?></div>
    <div class="spt-theme-settings-wrapper-sidebar-item-content">
      <p><?php esc_html_e("Do you enjoy using", "feather-magazine"); ?> <?php echo esc_html($theme); ?><?php esc_html_e("? Support us by reviewing us on WordPress.org!", "feather-magazine"); ?></p>
      <a href="https://wordpress.org/support/theme/<?php echo esc_attr(get_stylesheet()); ?>/reviews/#new-post" target="_blank" class="button"><?php esc_html_e("Leave a Review", "feather-magazine"); ?></a>
    </div>
  </div>



</div>

</div>
</div>


<?php
}

function feather_magazine_comparepage_css($hook) {
  if ('appearance_page_feather-magazine-info' != $hook) {
    return;
  }
  wp_enqueue_style('feather-magazine-custom-style', get_template_directory_uri() . '/css/compare.css');
}
add_action('admin_enqueue_scripts', 'feather_magazine_comparepage_css');

// Theme page end





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
 * @version    2.6.1 for parent theme Feather Magazine for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/inc/tgm/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/inc/tgm/class-tgm-plugin-activation.php';
 */ 
require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'feather_magazine_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function feather_magazine_register_required_plugins() {
  /*
   * Array of plugin arrays. Required keys are name and slug.
   * If the source is NOT from the .org repo, then source is also required.
   */
  $plugins = array(


    array(
      'name'      => 'Superb Helper',
      'slug'      => 'superb-helper',
      'required'  => false,
    ),


    array(
      'name'      => 'Superb Addons - WordPress Editor And Elementor Blocks, Sections & Patterns',
      'slug'      => 'superb-blocks',
      'required'  => false,
    ),


  );

  /*
   * Array of configuration settings. Amend each line as needed.
   *
   * TGMPA will start providing localized text strings soon. If you already have translations of our standard
   * strings available, please help us make TGMPA even better by giving us access to these translations or by
   * sending in a pull-request with .po file(s) with the translations.
   *
   * Only uncomment the strings in the config array if you want to customize the strings.
   */
  $config = array(
    'id'           => 'feather-magazine',                 // Unique ID for hashing notices for multiple instances of TGMPA.
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




add_action('admin_init', 'feather_magazine_spbThemesNotification', 8);

function feather_magazine_spbThemesNotification(){
  $notifications = include('inc/admin_notification/Autoload.php');
  $notifications->Add("feather_magazine_notification", "Unlock All Features with Feather Magazine Premium – Limited Time Offer", "

    Take advantage of the up to <span style='font-weight:bold;'>40% discount</span> and unlock all features with Feather Magazine Premium. 
    The discount is only available for a limited time.

    <div>
    <a style='margin-bottom:15px;' class='button button-large button-secondary' target='_blank' href='https://superbthemes.com/feather-mag/'>Read More</a> <a style='margin-bottom:15px;' class='button button-large button-primary' target='_blank' href='https://superbthemes.com/feather-mag/'>Upgrade Now</a>
    </div>

    ", "info");



  $options_notification_start = array("delay"=> "-1 seconds", "wpautop" => false);
  $notifications->Add("feathermag_notification_start", "Let's get you started with Feather Mag!", '
    <span class="st-notification-wrapper">
    <span class="st-notification-column-wrapper">
    <span class="st-notification-column">
    <img src="'. esc_url( get_template_directory_uri() . '/inc/admin_notification/src/preview.png' ).'" width="150" height="177" />
    </span>

    <span class="st-notification-column">
    <h2>Why Feather Mag</h2>
    <ul class="st-notification-column-list">
    <li>Easy to Use & Customize</li>
    <li>Search Engine Optimized</li>
    <li>Lightweight and Fast</li>
    <li>Top-notch Customer Support</li>
    </ul>
    <a href="https://superbthemes.com/demo/feather-mag/" target="_blank" class="button">View Feather Mag Demo <span aria-hidden="true" class="dashicons dashicons-external"></span></a> 

    </span>
    <span class="st-notification-column">
    <h2>Customize Feather Mag</h2>
    <ul>
    <li><a href="'. esc_url( admin_url( 'customize.php' ) ) .'" class="button button-primary">Customize The Design</a></li>
    <li><a href="'. esc_url( admin_url( 'widgets.php' ) ) .'" class="button button-primary">Add/Edit Widgets</a></li>
    <li><a href="https://superbthemes.com/customer-support/" target="_blank" class="button">Contact Support <span aria-hidden="true" class="dashicons dashicons-external"></span></a> </li>
    </ul>
    </span>
    </span>
    <span class="st-notification-footer">
    Feather Mag is created by SuperbThemes. We have 100.000+ users and are rated <strong>Excellent</strong> on Trustpilot <img src="'. esc_url( get_template_directory_uri() . '/inc/admin_notification/src/stars.svg' ).'" width="87" height="16" />
    </span>
    </span>

    <style>.st-notification-column-wrapper{width:100%;display:-webkit-box;display:-ms-flexbox;display:flex;border-top:1px solid #eee;padding-top:20px;margin-top:3px}.st-notification-column-wrapper h2{margin:0}.st-notification-footer img{margin-bottom:-3px;margin-left:10px}.st-notification-column-wrapper .button{min-width:180px;text-align:center;margin-top:10px}.st-notification-column{margin-right:10px;padding:0 10px;max-width:250px;width:100%}.st-notification-column img{border:1px solid #eee}.st-notification-footer{display:inline-block;width:100%;padding:15px 0;border-top:1px solid #eee;margin-top:10px}.st-notification-column:first-of-type{padding-left:0;max-width:160px}.st-notification-column-list li{list-style-type:circle;margin-left:15px;font-size:14px}@media only screen and (max-width:1000px){.st-notification-column{max-width:33%}}@media only screen and (max-width:800px){.st-notification-column{max-width:50%}.st-notification-column:first-of-type{display:none}}@media only screen and (max-width:600px){.st-notification-column-wrapper{display:block}.st-notification-column{width:100%;max-width:100%;display:inline-block;padding:0;margin:0}span.st-notification-column:last-of-type{margin-top:30px}}</style>

    ', "info", $options_notification_start);
  $notifications->Boot();
}
