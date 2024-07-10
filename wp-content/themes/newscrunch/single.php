<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Newscrunch
 */

get_header();
do_action( 'newscrunch_breadcrumbs_hook' );
if((get_post_meta(get_the_ID(),'newscrunch_site_layout', true )=='newscrunch_site_layout_stretched') || (get_theme_mod('single_blog_sidebar_layout','full')=='stretched'))  { $newscrunch_page_class='stretched';   }
else { $newscrunch_page_class=''; }

$newscrunch_page_sidebar = get_post_meta(get_the_ID(),'newscrunch_page_sidebar', true );
if($newscrunch_page_sidebar =='') { $newscrunch_page_sidebar ='sidebar-1';} ?>
<section class="spnc-container spnc-single-post <?php echo esc_attr($newscrunch_page_class);?>" id="content">
    <?php 
    if(get_theme_mod('bredcrumb_position','page_header')=='content_area'):
        echo '<div class="spnc-row"><div class="spnc-col-1">';
        do_action('newscrunch_breadcrumbs_page_title_hook');
        echo '</div></div>';
    endif;
    ?>
    <div class="spnc-row"> 
        <?php
        if(get_post_meta(get_the_ID(),'newscrunch_site_layout', true ) == '' )
        {
            if(get_theme_mod('single_blog_sidebar_layout','full')=='left'):
                echo '<div class="spnc-col-9"><div class="spnc-sidebar spnc-main-sidebar"><div class="left-sidebar">';
                      dynamic_sidebar($newscrunch_page_sidebar); 
                echo '</div></div></div>';
            endif;  
            if(get_theme_mod('single_blog_sidebar_layout','full')=='right'|| get_theme_mod('single_blog_sidebar_layout','right')=='left'):        
                echo '<div class="spnc-col-7 spnc-sticky-content">';
            else:
                echo '<div class="spnc-col-1">';   
            endif;
        }
        else if(get_post_meta(get_the_ID(),'newscrunch_site_layout', true ) == 'newscrunch_site_layout_left')
        {   
            echo '<div class="spnc-col-9"><div class="spnc-sidebar spnc-main-sidebar"><div class="left-sidebar">';
                    dynamic_sidebar($newscrunch_page_sidebar); 
            echo '</div></div></div>';
            echo '<div class="spnc-col-7 spnc-sticky-content">';
        } 
        else if(get_post_meta(get_the_ID(),'newscrunch_site_layout', true ) == 'newscrunch_site_layout_right')
        {
            echo '<div class="spnc-col-7 spnc-sticky-content">';
        } 
        else if(get_post_meta(get_the_ID(),'newscrunch_site_layout', true ) == 'newscrunch_site_layout_without_sidebar')
        {
            echo '<div class="spnc-col-1">'; 
        }
        else
        {
            echo '<div class="spnc-col-1">'; 
        }
        echo '<div class="spnc-blog-wrapper">'; 
        while (have_posts()): the_post();    
            newscrunch_view(get_the_ID());        
            get_template_part('template-parts/content', 'single');
        endwhile;

        do_action('spncp_related_post_hook');

        if (comments_open() || get_comments_number()) : comments_template();
        endif;
        ?>
        </div>
        </div>
        <!-- Sidebar --> 
        <?php if(((get_theme_mod('single_blog_sidebar_layout','full')=='right') && get_post_meta(get_the_ID(),'newscrunch_site_layout', true )=='') ||  get_post_meta(get_the_ID(),'newscrunch_site_layout', true )=='newscrunch_site_layout_right'):
                echo '<div class="spnc-col-9"><div class="spnc-sidebar spnc-main-sidebar"><div class="right-sidebar">';
                    dynamic_sidebar($newscrunch_page_sidebar); 
                echo '</div></div></div>';
        endif;?>    
    </div>
</section>
<?php
get_footer();