<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newscrunch
 */

get_header();
do_action( 'newscrunch_breadcrumbs_hook' );
if((get_post_meta(get_the_ID(),'newscrunch_site_layout', true )=='newscrunch_site_layout_stretched') || (get_theme_mod('page_sidebar_layout','right')=='stretched')) 
    {
        $newscrunch_page_class='stretched';   
    }
else 
    {
        $newscrunch_page_class='';
    }

$newscrunch_page_sidebar = get_post_meta(get_the_ID(),'newscrunch_page_sidebar', true );
if($newscrunch_page_sidebar =='') { $newscrunch_page_sidebar = 'sidebar-1';}
if(get_post_meta(get_the_ID(),'newscrunch_site_layout', true ) =='')
{
    if(get_theme_mod('page_sidebar_layout','right')=='right' || get_theme_mod('page_sidebar_layout','right')=='left'):        
       $page_column='<div class="spnc-col-7 spnc-sticky-content">';
    else:
        $page_column='<div class="spnc-col-1">';   
    endif;
}
else if(get_post_meta(get_the_ID(),'newscrunch_site_layout', true ) == 'newscrunch_site_layout_left')
{  
    $page_column='<div class="spnc-col-7 spnc-sticky-content">';
}
else if(get_post_meta(get_the_ID(),'newscrunch_site_layout', true ) == 'newscrunch_site_layout_right')
{
    $page_column='<div class="spnc-col-7 spnc-sticky-content">';
}
else if(get_post_meta(get_the_ID(),'newscrunch_site_layout', true ) == 'newscrunch_site_layout_without_sidebar')
{
    $page_column='<div class="spnc-col-1">';
}
else
{
    $page_column='<div class="spnc-col-1">';
}

?>

<section class="page-section-space blog bg-default spnc-default-page <?php echo esc_attr($newscrunch_page_class);?>" id="content">
    <div class="spnc-container">
        <?php
        if(get_theme_mod('bredcrumb_position','page_header')=='content_area'):
            echo '<div class="spnc-row"><div class="spnc-col-1">';
            do_action('newscrunch_breadcrumbs_page_title_hook');
            echo '</div></div>';
        endif;
        ?>
        <div class="spnc-row"> 
            <?php                    
            if(((get_theme_mod('page_sidebar_layout','right')=='left') && get_post_meta(get_the_ID(),'newscrunch_site_layout', true )== '') || get_post_meta(get_the_ID(),'newscrunch_site_layout', true )=='newscrunch_site_layout_left'):
                echo '<div class="spnc-col-9"><div class="spnc-sidebar spnc-main-sidebar"><div class="left-sidebar">';
                    dynamic_sidebar($newscrunch_page_sidebar); 
                echo '</div></div></div>';
            endif;
           
            echo  $page_column;
            echo '<div class="spnc-contact-wrapper">';
            while (have_posts()) : the_post();
                get_template_part('template-parts/content', 'page');
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
            endwhile;
            echo '</div>';
            ?>
        </div>  
        <?php 
        if(((get_theme_mod('page_sidebar_layout','right')=='right') && get_post_meta(get_the_ID(),'newscrunch_site_layout', true )=='') || get_post_meta(get_the_ID(),'newscrunch_site_layout', true )=='newscrunch_site_layout_right'):
                echo '<div class="spnc-col-9"><div class="spnc-sidebar spnc-main-sidebar"><div class="right-sidebar">';
                    dynamic_sidebar($newscrunch_page_sidebar); 
                echo '</div></div></div>';
        endif;
         ?>
    </div>
</section>
<?php
get_footer();