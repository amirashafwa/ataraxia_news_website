<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newscrunch
 */

get_header();

if( class_exists('Spice_Slider_Pro') && !empty(get_theme_mod('spnc_spsp_shortcode'))){
    if(get_theme_mod('hide_show_banner',true) == true ): echo do_shortcode( get_theme_mod('spnc_spsp_shortcode') ); endif; 
}
else if( class_exists('Spice_Post_Slider') && !empty(get_theme_mod('spnc_spsp_shortcode'))){
    if(get_theme_mod('hide_show_banner',true) == true ): echo do_shortcode( get_theme_mod('spnc_spsp_shortcode') ); endif;
    }
else{
  get_template_part( 'partials/front/main-banner' ); 
}

if(get_theme_mod('highlight_layout','1') =='1')
{
    get_template_part( 'partials/front/news-highlight-1');
}
else
{
   get_template_part( 'partials/front/news-highlight-2'); 
}


if( function_exists( 'spncp_missed_section' ))
{
$newscrunch_sort=get_theme_mod( 'front_page_content_sort', array('front_content_1', 'vedio_content', 'missed_content', 'front_content_2', 'mainblog_content') );
}
else
{
 $newscrunch_sort=get_theme_mod( 'front_page_content_sort', array('front_content_1', 'vedio_content', 'front_content_2', 'mainblog_content') );   
}

if ( ! empty( $newscrunch_sort ) && is_array( $newscrunch_sort ) ) :
foreach ( $newscrunch_sort as $newscrunch_sort_key => $newscrunch_sort_val ) :


if(get_theme_mod('newscrunch_enable_front_content_1',true)==true):
    if ( 'front_content_1' === $newscrunch_sort_val ) :
        if ( is_active_sidebar( 'front-page-1' ) || is_active_sidebar( 'front-page-side-1' ) ):
        get_template_part( 'partials/front/news-home-1');
        endif;
endif; endif;        

if(get_theme_mod('newscrunch_enable_vedio_content',true)==true):
    if ( 'vedio_content' === $newscrunch_sort_val ) :
        if ( class_exists('Newscrunch_Plus') ):
            do_action( 'spncp_featured_video_variation' );
        else:    
            get_template_part( 'partials/front/news-video');
        endif;    
    endif; 
endif;  

if( function_exists( 'spncp_missed_section' )):
if(get_theme_mod('newscrunch_enable_missed_content',true)==true):
    if ( 'missed_content' === $newscrunch_sort_val ) :
 spncp_missed_section(); 
endif; endif;  endif;

if(get_theme_mod('newscrunch_enable_front_content_2',true)==true):
    if ( 'front_content_2' === $newscrunch_sort_val ) :
        if ( is_active_sidebar( 'front-page-2' ) || is_active_sidebar( 'front-page-side-2' ) ):
        get_template_part( 'partials/front/news-home-2');
        endif;
endif; endif;          


if(get_theme_mod('newscrunch_enable_mainblog_content',true)==true):
    if ( 'mainblog_content' === $newscrunch_sort_val ) :
$newscrunch_page_sidebar=get_post_meta(get_option('page_for_posts', true),'newscrunch_page_sidebar', true );
if($newscrunch_page_sidebar =='') { $newscrunch_page_sidebar = 'sidebar-1'; } 
$newscrunch_hide_show_blog_post = get_theme_mod('hide_show_blog_post',true) ;
 if($newscrunch_hide_show_blog_post == true) { ?>
<section class="spnc-page-section-space page-section-space blog spnc-category-page" id="content">
    <div class="spnc-container">
        <div class="spnc-row">
            <?php
            if(get_theme_mod('blog_sidebar_layout','right')=='left'): 
                echo '<div class="spnc-col-9"><div itemscope itemtype="https://schema.org/WPSideBar" class="spnc-sidebar spnc-main-sidebar"><div class="left-sidebar">';
                    dynamic_sidebar($newscrunch_page_sidebar); 
                    echo '</div></div></div>';
                 endif;
            if(get_theme_mod('blog_sidebar_layout','right')=='right' || get_theme_mod('blog_sidebar_layout','right')=='left'):        
                echo '<div class="spnc-col-7 spnc-sticky-content">';
            else:
                echo '<div class="spnc-col-1">';   
            endif;


            if ( class_exists('Newscrunch_Plus') ):
                if((get_theme_mod('post_nav_style_setting','pagination')=='load_more') || (get_theme_mod('post_nav_style_setting','pagination')=='infinite')) :
                    echo do_shortcode('[ajax_posts]');
                endif;
            endif;
            if((get_theme_mod('post_nav_style_setting','pagination') == 'pagination')  || ( class_exists('Newscrunch_Plus') && get_theme_mod('post_nav_style_setting','pagination') == 'pagination' )):
                 if (have_posts()): 
                    $i=1;
                    echo '<div class="spnc-blog-cat-wrapper">';
                   
                        while (have_posts()): the_post();
                            if($i==1){
                                get_template_part( 'template-parts/content-first');
                            }else{
                                 get_template_part( 'template-parts/content');
                            }
                        $i++;
                        endwhile;
                    echo'</div>';
                    
                    else:
                        get_template_part('template-parts/content', 'none');
                    endif;

                    echo '<div class="clrfix"></div>';
                    // pagination
                    do_action('newscrunch_page_navigation');
            endif;   
                  
             ?>      
            </div>  
            <?php if(get_theme_mod('blog_sidebar_layout','right')=='right'):
                echo '<div class="spnc-col-9"><div itemscope itemtype="https://schema.org/WPSideBar" class="spnc-sidebar spnc-main-sidebar"><div class="right-sidebar">';
                    dynamic_sidebar($newscrunch_page_sidebar);
                echo '</div></div></div>';
            endif;?>
        </div>
    </div>
</section> 
<?php
}
endif; endif;  

endforeach;
endif;
get_footer();