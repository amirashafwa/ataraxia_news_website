<?php
/**
 * The template for displaying archive pages
 *
 * @package Newscrunch
 */

get_header();

do_action( 'newscrunch_breadcrumbs_hook' );

$newscrunch_page_sidebar=get_post_meta(get_option('page_for_posts', true),'newscrunch_page_sidebar', true );
if($newscrunch_page_sidebar =='') { $newscrunch_page_sidebar = 'sidebar-1'; } ?>
 
<section class="page-section-space blog spnc-category-page" id="content">
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
            if(get_theme_mod('blog_sidebar_layout','right')=='left'): 
                echo '<div class="spnc-col-9"><div class="spnc-sidebar spnc-main-sidebar"><div class="left-sidebar">';
                    dynamic_sidebar($newscrunch_page_sidebar); 
                    echo '</div></div></div>';
                 endif;
            if(get_theme_mod('blog_sidebar_layout','right')=='right' || get_theme_mod('blog_sidebar_layout','right')=='left'):        
                echo '<div class="spnc-col-7 spnc-sticky-content">';
            else:
                echo '<div class="spnc-col-1">';   
            endif;

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
            ?>      
            </div>  
            <?php if(get_theme_mod('blog_sidebar_layout','right')=='right'):
                echo '<div class="spnc-col-9"><div class="spnc-sidebar spnc-main-sidebar"><div class="right-sidebar">';
                    dynamic_sidebar($newscrunch_page_sidebar);
                echo '</div></div></div>';
            endif;?>
        </div>
    </div>
</section> 
<?php
get_footer();