<?php
/**
 * The template for displaying search results pages
 *
 * @package Newscrunch
 */

get_header();
do_action( 'newscrunch_breadcrumbs_hook' );
?>
<section class="page-section-space blog bg-default spnc-category-page" id="content">
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
            if ( is_active_sidebar( 'sidebar-1' ) ):        
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
                             get_template_part( 'template-parts/content-search');
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
            <?php get_sidebar();?>
        </div>
    </div>
</section>  
<?php
get_footer();