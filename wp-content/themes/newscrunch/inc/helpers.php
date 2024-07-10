<?php 
/**
 * This file includes helper functions used throughout the theme.
 *
 * @package Newscrunch
 */

/*
-------------------------------------------------------------------------------
 Table of contents 
-------------------------------------------------------------------------------*/

	# Header
    # Logo Width
    # Enqueue file for customizer preview
	# Footer Section
	# Footer Widget Layout
	# Footer Bar Menu
    # Scroll to Top
 	# Comment Reply Box
 	# Breadcrumbs Page title hook 
	# Sidebar layout 
	# Page Navigation
	# Wide and Boxed Layout
 	# Added skip link focus
	# Set post views count using post meta
	# Set overlay slider loop
	# Get content with fixed length
	# Get post date
	# Get the post title
	# Get the author datails
	# Get the categories
	# Get the featured image
	# Category color
	# Side Panel widgets
	# Breadcrumb Style
	# Convert dark layout & Search Full Screen
	# Check dark & light icon
	# Check search popup
/*
-------------------------------------------------------------------------------
 Header
-------------------------------------------------------------------------------*/

if ( ! function_exists( 'newscrunch_header_template' ) ) {
	function newscrunch_header_template() {
		if(get_theme_mod('header_layout','2') == '2')
		{
			get_template_part( 'partials/header/default-header' );
		}
		else
		{
			get_template_part( 'partials/header/main-header' );
		}
	}
	add_action( 'newscrunch_header', 'newscrunch_header_template' );
}

/*
-------------------------------------------------------------------------------
 Logo Width
-------------------------------------------------------------------------------*/
if (!function_exists('newscrunch_width_fn')) :
	function newscrunch_width_fn() { ?>
		<style>
			.custom-logo, .dark-custom-logo{
				width: <?php echo intval( get_theme_mod('newscrunch_logo_length',250) );?>px; 
				height: auto;
			}
			@media only screen and (max-width: 992px){
			.custom-logo, .dark-custom-logo{
				width: <?php echo intval( get_theme_mod('newscrunch_logo_tablet_length',200) );?>px; 
				height: auto;
			}}
			@media only screen and (max-width: 500px){
			.custom-logo, .dark-custom-logo{
				width: <?php echo intval( get_theme_mod('newscrunch_logo_mobile_length',150) );?>px; 
				height: auto;
			}}
		</style>
		<?php 
	}
	add_action('wp_head','newscrunch_width_fn');
endif;

/*
-------------------------------------------------------------------------------
 Enqueue file for customizer preview
-------------------------------------------------------------------------------*/
if ( ! function_exists( 'newscrunch_customizer_preview' ) ) {

	function newscrunch_customizer_preview() {
		wp_enqueue_script( 'newscrunch-customizer-preview-js', NEWSCRUNCH_TEMPLATE_DIR_URI .'/inc/customizer/assets/js/customizer-preview.js', array( 'customize-preview', 'jquery' ) );
	}
	add_action('customize_preview_init','newscrunch_customizer_preview');
}

/*
-------------------------------------------------------------------------------
 Footer Section
-------------------------------------------------------------------------------*/
if (!function_exists('newscrunch_footer_widget_section')) :

	function newscrunch_footer_widget_section() {
	    ?>
	    <footer itemscope itemtype="http://schema.org/WPFooter" class="site-footer bg-default bg-footer-lite spnc-footer-ribbon-<?php echo esc_attr(get_theme_mod('ribbon_layout',1));?>" <?php if (!empty(get_theme_mod('footer_widget_back_image'))): ?> style="background-image: url(<?php echo esc_url( get_theme_mod('footer_widget_back_image')); ?>);"  <?php endif; ?>>
	    	<?php 
    		if(get_theme_mod('footer_overlay_enable',true) == true): 
	    		$footer_overlay_color = get_theme_mod('footer_image_overlay_color', 'rgb(15,11,31,0.9)'); ?>
				<div class="overlay" style="background-color: <?php echo $footer_overlay_color; ?>;"></div>
	    	<?php endif;
	    	if(get_theme_mod('hide_show_footer_widgets',true)==true): 
	    	// Ribbon Section
			if( function_exists( 'ribbon_section' )): ribbon_section(); endif;?>
				<div class="spnc-container">	
					<?php if(is_active_sidebar('footer-sidebar-1') || is_active_sidebar('footer-sidebar-2') || is_active_sidebar('footer-sidebar-3') || is_active_sidebar('footer-sidebar-4')): 
	                 	get_template_part('partials/footer/footer-sidebar');
		            endif;?>  	
				</div>
			<?php endif; 
			if( (get_theme_mod('hide_show_footer_menus',true)==true) || (get_theme_mod('hide_show_footer_copyright',true)==true) ) { ?>
				<div class="site-info">
					<div data-wow-delay=".5s" class="wow-callback slideInLeft spnc-container">
						<div class="spnc-row">
							<?php if(get_theme_mod('hide_show_footer_menus',true)==true): ?>
								<div class="spnc-col-1 spnc-right">
									<?php echo newscrunch_footer_bar_menu(); ?>
								</div>
							<?php 
							endif;
							if(get_theme_mod('hide_show_footer_copyright',true)==true): ?>
								<div class="spnc-col-1 spnc-left">
									<p class="copyright-section">
										<?php $newscrunch_footer_copyright = get_theme_mod('footer_copyright', 'Newscrunch' . ' - ' . __('Magazine & Blog', 'newscrunch') . ' '. '<a href="https://wordpress.org">' . 'WordPress' . '</a>' . ' ' . __("Theme","newscrunch") . ' ' . '%year%'); 
										echo wp_kses_post( str_replace( '%year%', date('Y'), $newscrunch_footer_copyright ) );
										echo ' | ' . sprintf( esc_html('Powered By %s', 'newscrunch' ), '<a href="https://spicethemes.com/" rel="nofollow">' . ' ' . 'SpiceThemes'. '</a>');
									?>
									</p>
								</div> 
							<?php endif; ?>  
						</div>
					</div>
				</div>
			<?php } ?>
		</footer>
	<?php }
	add_action('newscrunch_footer_widgets', 'newscrunch_footer_widget_section');

endif;


/*
-------------------------------------------------------------------------------
 Footer Widget Layout
-------------------------------------------------------------------------------*/
if (!function_exists('newscrunch_footer_layout')) :

	function newscrunch_footer_layout($layout) {
		if( $layout == 2 ) {
			$class = 'spnc-col-8';
		}
		elseif( $layout == 3 ) {
			$class = 'spnc-col-9';
		}
		else {
			$class = 'spnc-col-10';
		}
		for($i=1; $i<=$layout; $i++)
		{
			echo '<div class="' . $class . '">';
			dynamic_sidebar('footer-sidebar-'.$i);
			echo '</div>';
		}
	}

endif;

/*
-------------------------------------------------------------------------------
 Footer Bar Menu
-------------------------------------------------------------------------------*/
if (!function_exists('newscrunch_footer_bar_menu')) {

    function newscrunch_footer_bar_menu() {
        ob_start();
        if (has_nav_menu('footer_menu')) {
            wp_nav_menu(
                array(
                    'theme_location' 	=> 'footer_menu',
                    'menu_class'		=> 'footer-nav nav-menu',
                    'items_wrap' 		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth' 			=> 1
                )
            );
        } 
        else {
            if (is_user_logged_in() && current_user_can('edit_theme_options')) { ?>
                <a itemprop="url" href="<?php echo esc_url(admin_url('/nav-menus.php?action=locations')); ?>"><?php esc_html_e('Assign Footer Menu', 'newscrunch'); ?></a>
            <?php }
        }
        return ob_get_clean();
    }
}


/*
-------------------------------------------------------------------------------
 Scroll to Top
-------------------------------------------------------------------------------*/

if ( ! function_exists( 'newscrunch_scroll_to_top' ) ) {

	function newscrunch_scroll_to_top() {
		$scrolltotop_icon_enable = get_theme_mod('hide_show_scroll_to_top', true);
    	if ($scrolltotop_icon_enable == true) { ?>
        	<div class="scroll-up custom <?php echo esc_attr(get_theme_mod('scroll_to_top_position','right') ); ?>"><a href="#totop"><i class="<?php echo esc_attr( get_theme_mod('scroll_to_top_icon_class', 'fa fa-arrow-up')); ?>"></i></a></div>
    	<?php } ?>
    	<style type="text/css">
    		.scroll-up {
    			<?php echo esc_attr( get_theme_mod('scroll_to_top_position','right') ); ?>: 3.75rem;
    		}
    		.scroll-up.left { right: auto; }
    		.scroll-up.custom a {
		        border-radius: <?php echo intval( get_theme_mod('scroll_to_top_button_radious', 3) ); ?>px;
		    }
    	</style>
    	<?php if(get_theme_mod('hide_show_scroll_to_top_color',true)==true) { ?>
    		<style type="text/css">
    			.scroll-up.custom a {
				    background: <?php echo esc_attr( get_theme_mod('scroll_to_top_back_color','#'));?>;
				    color: <?php echo esc_attr( get_theme_mod('scroll_to_top_icon_color','#fff'));?>;
    			}
    			.scroll-up.custom a:hover {
				    background: <?php echo esc_attr( get_theme_mod('scroll_to_top_back_hover_color','#') );?>;
				    color: <?php echo esc_attr( get_theme_mod('scroll_to_top_icon_hover_color','#fff'));?>;
    			}
    		</style>
    	<?php }
	}
	add_action('newscrunch_scrolltotop','newscrunch_scroll_to_top');

}

/*
-------------------------------------------------------------------------------
 Comment Reply Box
-------------------------------------------------------------------------------*/
if (!function_exists('newscrunch_comment_box')) :

	function newscrunch_comment_box($comment, $args, $depth) { ?>

		<div class="comment-box" itemscope itemtype="http://schema.org/UserComments">
			<span class="pull-left-comment">
			   <?php echo get_avatar($comment, 100, null, 'comments user', array('class' => array('img-fluid comment-img'))); ?>
			</span>
			<div class="comment-body">
				<div class="comment-detail">
				 	<h5 class="comment-detail-title"><?php esc_html(comment_author()); ?>
				 		<time itemprop="commentTime" class="comment-date"><?php 
				 			/* translators: %1$s: comment date and %2$s: comment time */
				 			printf(esc_html__('%1$s  %2$s', 'newscrunch' ), esc_html(get_comment_date()), esc_html(get_comment_time())); ?></time>
				 	</h5>
				 	<span itemprop="commentText"><?php comment_text(); ?></span>
					<div class="reply">
						<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?> 
				    </div>
				</div>       
			</div>      
		</div>

	<?php }

endif;

/*
-------------------------------------------------------------------------------
 Breadcrumbs Page title hook
-------------------------------------------------------------------------------*/

if ( ! function_exists( 'newscrunch_breadcrumbs_page_title_fn' ) ) {
	function newscrunch_breadcrumbs_page_title_fn(){
		if(get_theme_mod('enable_page_title',true) == true ){		
			if(get_theme_mod('bredcrumb_position','page_header')=='content_area'):
				$content_class='content-area-title';
			else:
				$content_class='';
			endif;
			$breadcrumbs_markup=get_theme_mod('bredcrumb_markup','h1');
		  	$page_title_markup_before='<' . $breadcrumbs_markup . '>';
		  	$page_title_markup_after='</' . $breadcrumbs_markup . '>';
		  	if (is_home() || is_front_page()) { 
		    	if( get_option('show_on_front') =='page') {
		        	if(is_front_page()) { ?>
		        		<div class="page-title <?php echo $content_class;?>">
							<?php echo $page_title_markup_before . esc_html(get_the_title( get_option('page_on_front', true) )) . $page_title_markup_after; ?>
						</div>
		        	<?php }
		        	elseif(is_home()) { ?>
		                <div class="page-title  <?php echo $content_class;?>">
		                    <?php echo $page_title_markup_before . esc_html(get_the_title( get_option('page_for_posts', true) )) . $page_title_markup_after; ?>
		                </div>          
		            <?php
		            }
		        }
		        else if(get_option('show_on_front')=='posts') { ?>
		            <div class="page-title  <?php echo $content_class;?>">
		                <?php echo $page_title_markup_before . wp_kses_post(get_theme_mod('blog_page_title_option', __('Home', 'newscrunch' ))) . $page_title_markup_after; ?>
		            </div>
		    	<?php
		    	} 
		    }
		    else { ?>
		    	<div class="page-title  <?php echo $content_class;?>">
		    		<?php if (is_search()){
		    			 echo $page_title_markup_before . get_search_query() . $page_title_markup_after;
		            }
		            else if(is_404()) {
		                echo $page_title_markup_before . esc_html__('Error 404','newscrunch' ) . $page_title_markup_after;  
		            }
		            else if(is_category()) {
		                echo $page_title_markup_before . ( esc_html__('Category:&nbsp;','newscrunch' ) . single_cat_title( '', false ) ) . $page_title_markup_after;   
		            } 
		            else if( is_tag() ) {
		                echo $page_title_markup_before . ( esc_html__('Tag:&nbsp;','newscrunch' ) . single_tag_title( '', false ) ) . $page_title_markup_after;
		            }
		            else if(is_archive()) {   
		            	the_archive_title( $page_title_markup_before, $page_title_markup_after );
		            }
		            else { ?>
		        		<?php echo $page_title_markup_before . esc_html(get_the_title('')) . $page_title_markup_after; ?>
		    		<?php }
		        ?>
		        </div>
		    <?php }
		}
	}
	add_action('newscrunch_breadcrumbs_page_title_hook','newscrunch_breadcrumbs_page_title_fn');
}


/*
-------------------------------------------------------------------------------
 Sidebar layout  
-------------------------------------------------------------------------------*/
if (!function_exists('newscrunch_sidebar_layout_fn')) :

	function newscrunch_sidebar_layout_fn() { ?>
		
		<?php
		if(((get_theme_mod('blog_sidebar_layout','right')=='stretched')  && get_post_meta(get_option('page_for_posts', true),'newscrunch_site_layout', true ) == '') || (get_post_meta(get_option('page_for_posts', true),'newscrunch_site_layout', true ) == 'newscrunch_site_layout_stretched'))
			{
			?>
			<style>
				@media (min-width: 1100px){
				body.blog .page-section-space.blog .spnc-container{
					width: 100%;
					max-width: 100%;
				}}
			</style>
		<?php }
		if(get_theme_mod('blog_sidebar_layout','right')=='stretched' )
		{?>
			<style>
				@media (min-width: 1100px){
				body.archive .page-section-space.blog .spnc-container {
					width: 100%;
					max-width: 100%;
				}
			}
			</style>
		<?php }
		if(((get_theme_mod('single_blog_sidebar_layout','right')=='stretched')  && get_post_meta(get_the_ID(),'newscrunch_site_layout', true ) == '') || ( get_post_meta(get_the_ID(),'newscrunch_site_layout', true ) =='newscrunch_site_layout_stretched'))	
		{?>
			<style>
				@media (min-width: 1100px){
				body.single-post .spnc-container.spnc-single-post{
					width: 100%;
					max-width: 100%;
				}}
			</style>
		<?php }
		if(((get_theme_mod('page_sidebar_layout','right')=='stretched')  && get_post_meta(get_the_ID(),'newscrunch_site_layout', true )=='') || ( get_post_meta(get_the_ID(),'newscrunch_site_layout', true ) == 'newscrunch_site_layout_stretched')){?>
			<style>
				@media (min-width: 1100px){
				body .page-section-space.stretched .spnc-container {
					width: 100%;
					max-width: 100%;
				}}
			</style>
		<?php } 
		if(get_theme_mod('page_widget1_sidebar_layout','right')=='stretched')
		{
			?>
			<style>
				@media (min-width: 1100px){
				body.blog .spnc-page-section-space.page_widget1 .spnc-container{
					width: 100%;
					max-width: 100%;
				}}
			</style>
			<?php
		}
		if(get_theme_mod('page_widget2_sidebar_layout','right')=='stretched')
		{
			?>
			<style>
				@media (min-width: 1100px){
				body.blog .spnc-page-section-space.page_widget2 .spnc-container{
					width: 100%;
					max-width: 100%;
				}}
			</style>
			<?php
		}
	}
	add_action('wp_head','newscrunch_sidebar_layout_fn');
endif;


/*
-------------------------------------------------------------------------------
 Preloader
-------------------------------------------------------------------------------*/
if ( ! function_exists( 'newscrunch_preloader_feature' ) ) {

	function newscrunch_preloader_feature() {
		if(get_theme_mod('preloader_enable',false)==true):?>
			<div id="preloader1" class="newscrunch-loader">
		        <div class="spnc_wrap">
                   <div class="spnc_loading1">
                      <div class="spnc_bounceball"></div>
                      <div class="spnc_preloader_text"><?php esc_html_e('Loading Now','newscrunch'); ?></div>
                    </div>
                </div>
		    </div>
		  <?php endif;
	}
	add_action('newscrunch_preloader','newscrunch_preloader_feature');

}


/*
-------------------------------------------------------------------------------
 Page Navigation
-------------------------------------------------------------------------------*/
if (!function_exists('newscrunch_custom_navigation')) :

    function newscrunch_custom_navigation() {
    	
    	if (!is_rtl()) {
            the_posts_pagination(array(
                'prev_text' => '<i class="fas fa-chevron-left"></i>',
                'next_text' => '<i class="fas fa-chevron-right"></i>',
            ));
        } else {
            the_posts_pagination(array(
                'prev_text' => '<i class="fas fa-chevron-right"></i>',
                'next_text' => '<i class="fas fa-chevron-left"></i>',
            ));
        }
    }
    add_action('newscrunch_page_navigation', 'newscrunch_custom_navigation');

endif;

/*
-------------------------------------------------------------------------------
 Wide and Boxed Layout
-------------------------------------------------------------------------------*/
if (!function_exists('newscrunch_theme_layout')) :

	function newscrunch_theme_layout() {
		$newscrunch_theme_layout = get_theme_mod('theme_layout', 'wide');
	    if ($newscrunch_theme_layout == "boxed") {
	        $newscrunch_layout_type = "boxed";
	    } 
	    else {
	        $newscrunch_layout_type = "wide";
	    }?>
	    <body <?php body_class($newscrunch_layout_type); ?> <?php newcrunch_schema_attributes(); ?>>
	<?php }
	add_action('newscrunch_wide_boxed_layout','newscrunch_theme_layout');

endif;

/*
-------------------------------------------------------------------------------
 Added skip link focus
-------------------------------------------------------------------------------*/
if (!function_exists('newscrunch_skip_link_fn')) :

	function newscrunch_skip_link_fn() { ?>
		<script>
		/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
		</script>
	<?php
	}
	add_action( 'wp_print_footer_scripts', 'newscrunch_skip_link_fn' );

endif;

/*
-------------------------------------------------------------------------------
 Set post views count using post meta
-------------------------------------------------------------------------------*/
if( ! function_exists( 'newscrunch_get_categories' ) ) :
function newscrunch_view($postID) {
    $countKey = 'newscrunch_views';
    $count = get_post_meta($postID, $countKey, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '0');
    }else{
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}
endif;

/*
-------------------------------------------------------------------------------
 Set overlay slider loop
-------------------------------------------------------------------------------*/
function newscrunch_overlay_item($input,$bool=true){
    switch($input) {
        case in_array($input, range(0,4,1)):{
            $prnt = "1";
            break;
        }
        case in_array($input, range(5,8,1)):{
            $prnt = "2";
            break;
        }
        case in_array($input, range(9,12,1)):{
            $prnt = "3";
            break;
        }
        case in_array($input, range(13,16,1)):{
            $prnt = "4";
            break;
        }
        case in_array($input, range(17,20,1)):{
            $prnt = "5";
            break;
        }
        case in_array($input, range(21,24,1)):{
            $prnt = "6";
            break;
        }
        case in_array($input, range(25,28,1)):{
            $prnt = "7";
            break;
        }
        case in_array($input, range(29,32,1)):{
            $prnt = "8";
            break;
        }
        case in_array($input, range(33,36,1)):{
            $prnt = "9";
            break;
        }
        case in_array($input, range(37,40,1)):{
            $prnt = "10";
            break;
        }
        default: {
            $prnt = "5";
        }
    }
    if($bool){
        return $prnt;
    }else{
        return $prnt;
    }   
}


/*
-------------------------------------------------------------------------------
 Get content with fixed length
-------------------------------------------------------------------------------*/
function newscrunch_excerpt($word_limit) {
    $content = wp_strip_all_tags(get_the_content() , true );
    echo wp_trim_words($content, $word_limit);
}

/*
-------------------------------------------------------------------------------
 Get post date
-------------------------------------------------------------------------------*/
function newscrunch_get_post_date($post_id) {
    echo '<a href="'.esc_url(home_url('/')).esc_html(date( 'Y/m' , strtotime( get_the_date('M-d-Y', $post_id) )) ).'"><time class="spsp-entry-date">'.esc_html(get_the_date( 'M d , Y', $post_id)).'</time></a>';
}

/*
-------------------------------------------------------------------------------
 Get the post title
-------------------------------------------------------------------------------*/
function newscrunch_get_the_title($post_id) {
    echo '<a href="'.esc_url(get_permalink($post_id)).'">'.esc_html(get_the_title($post_id)).'</a>';
}

/*
-------------------------------------------------------------------------------
 Get the author datails
-------------------------------------------------------------------------------*/
function newscrunch_get_author($post_id) {
	if (is_rtl()) { $dir='dir="rtl"';}else{ $dir='';}
    echo '<a '.$dir.' href="'.esc_url(get_author_posts_url(get_post_field ('post_author', $post_id))).'">';
    $author_id = get_post_field ('post_author', $post_id);
    $author_name = get_the_author_meta( 'display_name' , $author_id );
    echo esc_html($author_name).'</a>';
}

/*
-------------------------------------------------------------------------------
 Get the categories
-------------------------------------------------------------------------------*/
function newscrunch_get_catgories($post_id) {
	if (is_rtl()) { $dir='dir="rtl"';}else{ $dir='';}
    $category_detail=get_the_category($post_id);
	foreach($category_detail as $cd)
	{
		echo '<a '.$dir.' href="' . esc_url( get_category_link( $cd->term_id ) ) . '">'.esc_html($cd->cat_name).'  '.'</a>';
	}
}

/*
-------------------------------------------------------------------------------
 Get the featured image
-------------------------------------------------------------------------------*/
function newscrunch_get_the_featured_image ($post_id) {
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full', false, '' );
    if(isset($image[0]))
    {
    echo '<img src="'.esc_url($image[0]).'" class="img-fluid sp-thumb-img">';
	}
	else
	{
		echo '<img class="img-fluid sp-thumb-img" src="'.esc_url( NEWSCRUNCH_TEMPLATE_DIR_URI ).'/assets/images/no-preview.jpg">';
	}
}

/*
-------------------------------------------------------------------------------
 Category color
-------------------------------------------------------------------------------*/
if( ! function_exists( 'newscrunch_get_categories' ) ) :
   
    function newscrunch_get_categories( $post_id ) {
    	$categories = get_the_category();
		if ( ! empty( $categories ) ) {
		  foreach ( $categories as $cat ) { 
		  	$category_id = get_cat_ID( $cat->name );?>
		  	<a href="<?php echo esc_url(get_category_link( $category_id ));?>" class="newscrunch_category_<?php echo esc_attr($cat->slug);?>"><?php echo esc_html($cat->name);?></a>
		  	<?php
		  	 }
		}
    }
endif;


/*
-------------------------------------------------------------------------------
 Side Panel widgets
-------------------------------------------------------------------------------*/
if ( ! function_exists( 'newscrunch_side_panel_widget_area' ) ) {

  /**
   * Get Side Panel Widgets
   *
   */
  function newscrunch_side_panel_widget_area( $sidebar_id ) {

    if ( is_active_sidebar( $sidebar_id ) ) {
      dynamic_sidebar( $sidebar_id );
    } elseif ( current_user_can( 'edit_theme_options' ) ) {

      global $wp_registered_sidebars;
      $sidebar_name = '';
      if ( isset( $wp_registered_sidebars[ $sidebar_id ] ) ) {
        $sidebar_name = $wp_registered_sidebars[ $sidebar_id ]['name'];
      }
      ?>
      <div class="widget ast-no-widget-row">
        <h2 class='widget-title'><?php echo esc_html( $sidebar_name ); ?></h2>

        <p class='no-widget-text'>
          <a href='<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>'>
            <?php esc_html_e( 'Add Side Panel Widgets Area.', 'newscrunch' ); ?>
          </a>
        </p>
      </div>
      <?php
    }
  }
}


/*
-------------------------------------------------------------------------------
Breadcrumb Styling
-------------------------------------------------------------------------------*/
if (!function_exists('newscrunch_breadcrumb_css')) :

	function newscrunch_breadcrumb_css() {
		if( get_theme_mod('breadcrumb_banner_enable', true) == false): ?> 
            <style type="text/css">
                .header-sidebar{
                   position: relative;
                }
            </style>
	    <?php endif;
	    if(is_home() && !is_front_page()): ?>
		    <style type="text/css">
		        .header-sidebar{
		           position: relative;
		        }
		    </style>
	    <?php endif;
		if(is_front_page() &&  !is_home() ): ?>
		    <style type="text/css">
		        body.home.newscrunch .header-sidebar{
		           position: absolute;
		        }
		    </style>
	    <?php endif;
    	if (get_theme_mod('breadcrumb_section_padding', false) == true): ?>
        	<style type="text/css">
        		@media (min-width:1100px){
        		.page-title-section{
        			padding-top:<?php echo intval(get_theme_mod('breadcrumb_top_padding',260))?>px !important;
      				padding-right:<?php echo intval(get_theme_mod('breadcrumb_right_padding',0))?>px;
  					padding-bottom:<?php echo intval(get_theme_mod('breadcrumb_bottom_padding',30))?>px;
      				padding-left:<?php echo intval(get_theme_mod('breadcrumb_left_padding',0))?>px;
        		}
        	}
        	</style>
    	<?php endif;
    	if (get_theme_mod('breadcrumb_overlay_enable', false) == true):
    		if( get_header_image() ){ ?>
	    		<style type="text/css">
	        		.breadcrumb-overlay{
						  position: absolute;
						  top: 0;
						  bottom: 0;
						  left: 0;
						  right: 0;
						  height: 100%;
						  width: 100%;
						  background-color: rgba(0, 0, 0, 0.3); 
					}
	        	</style>
    		<?php } 
    	endif;
	}
	add_action('wp_head','newscrunch_breadcrumb_css');
endif;

/* ---------------------------------------------- /*
 * Convert dark layout & Search Full Screen
/* ---------------------------------------------- */
function newscrunch_footerscript() {
	if ( class_exists('Newscrunch_Plus') ){
		if(get_theme_mod('spncp_skin_mode','spnc_light') == "spnc_light")
		{
			$spncp_skin_mode='spnc_light';
		}
		else
		{
			$spncp_skin_mode='spnc_dark';
		}
	}
	else
	{
		$spncp_skin_mode='spnc_light';
	}	
?>
<script>     
        let spncStore = 'spnc-theme';
        var spncp_skin_mode = '<?php echo $spncp_skin_mode;?>';
        let spncGetColor = function () {
            if (localStorage.getItem(spncStore)) {
                return localStorage.getItem(spncStore)
            }
            else {
            	if(spncp_skin_mode == 'spnc_light')
            	{
                return window.matchMedia('(spnc-color-scheme: spnc_dark)').matches ? 'spnc_dark' : 'spnc_light';
                }
                else
                {
                return window.matchMedia('(spnc-color-scheme: spnc_dark)').matches ? 'spnc_light' : 'spnc_dark';	
                }    
            }
        }


        let theme = {
            value: spncGetColor()
        };


        let setPreference = function () {
            localStorage.setItem(spncStore, theme.value);
            reflectPreference();
        }


        if(jQuery('.custom-logo')[0] ){
        var img1 = document.querySelector('.custom-logo').src;
        var img2 = document.querySelector('.dark-custom-logo').src;
        }


        let reflectPreference = function () {
            document.firstElementChild.setAttribute("data-theme", theme.value);
            document.querySelector("#spnc-layout-icon")?.setAttribute("aria-label", theme.value);
            if(jQuery('.custom-logo')[0] ){
            let logoImageUrl = document.querySelector('img.custom-logo');
            logoImageUrl.src = theme.value === 'spnc_light' ? img1 : img2;
            logoImageUrl.srcset=theme.value === 'spnc_light' ? img1 : img2;
           }
            let toggleBtn1 = document.querySelector("#spnc-layout-icon");
            let iconCode = toggleBtn1.querySelector(".fa-solid");
            iconCode.className = theme.value === 'spnc_light' ? 'fa-solid fa-moon' : 'fa-solid fa-sun';
        }


        // set early so no page flashes / CSS is made aware
        reflectPreference();
        window.addEventListener('load', function () {
            reflectPreference();
            let toggleBtn = document.querySelector("#spnc-layout-icon");
            if (toggleBtn) {
                toggleBtn.addEventListener("click", function (event) {
                	event.preventDefault();
                	if(spncp_skin_mode == 'spnc_light')
                	{
                	theme.value = theme.value === 'spnc_light' ? 'spnc_dark' : 'spnc_light';			
                	}
                	else
                	{
                		theme.value = theme.value === 'spnc_dark' ? 'spnc_light' : 'spnc_dark';
                	}
                    
                    setPreference();
                });
            }
        });

        
        // sync with system changes
        window.matchMedia('(spnc-color-scheme: spnc_light)')
            .addEventListener('change', ({matches: isDark}) => {
                theme.value = isDark ? 'spnc_light' : 'spnc_dark';
                setPreference();
        });     
</script>
<?php
if( get_theme_mod('hide_show_search_icon',true ) == true ) { ?>
			<script>
				// search   
		        const search_elm = document.getElementById('searchbar_fullscreen');
		            search_elm.addEventListener('focusout', (event) => {
		                if(search_elm.contains(event.relatedTarget)==false){
		                    jQuery("#searchbar_fullscreen").removeClass('open');
		            }
		        });
			</script>
	<?php }
 }
add_action('newscrunch_script_footer', 'newscrunch_footerscript');


/* ---------------------------------------------- /*
 * Check dark & light icon
/* ---------------------------------------------- */
if (!function_exists('newscrunch_hide_show_dark_light_icon')) :
	function newscrunch_hide_show_dark_light_icon() {
		if( get_theme_mod('hide_show_dark_light_icon',true ) == false ) { ?>
			<style>
				.menu-item.spnc-dark-layout{ display: none;}
			</style>
	<?php }
	}
	add_action('wp_head','newscrunch_hide_show_dark_light_icon');
endif;