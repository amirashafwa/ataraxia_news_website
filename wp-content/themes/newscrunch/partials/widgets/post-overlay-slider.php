<?php
/**
* Widget API: Overlay Slider Widget Class
* @package Newscrunch
*/
class Newscrunch_Overlay_Slider_Widget_Controller extends WP_Widget {
    //construct part
    function __construct()
    {
        parent::__construct(
        //Base ID of widget
        'newscrunch_overlay_slider',

        //widget name will appear in UI
        esc_html__('Newscrunch : Overlay Slider','newscrunch'),

        // Widget description
        array( 'description' => esc_html__('Display your posts as an overlay slider.','newscrunch'))  
        );

    }

    //Widget Front End
    public function widget( $args, $instance ) {
        if ( ! isset( $args['widget_id'] ) ) { $args['widget_id'] = $this->id; }
        $title    = isset( $instance['title'] ) ? $instance['title'] : '';
        $category = isset( $instance['category'] ) ? $instance['category'] : '';
        $number   = isset( $instance['number'] ) ? $instance['number'] : 8;
        $date     = isset( $instance['date'] ) ? $instance['date'] : '';
        $show_cat = isset( $instance['show_cat'] ) ? $instance['show_cat'] : '';
        $show_auth= isset( $instance['show_auth'] ) ? $instance['show_auth'] : '';
        $loop=newscrunch_overlay_item($number);
        echo wp_kses_post($args['before_widget']);
        if ( $title ) { echo wp_kses_post($args['before_title']) . esc_html($title) . wp_kses_post($args['after_title']); }
        ?>
        <div id="overlay-slider<?php echo esc_attr($this->id);?>" class="owl-carousel spnc-blog1-carousel">
            <?php
            global $post;
            $query_args = new WP_Query( apply_filters( 'widget_posts_args', array(
                'no_found_rows'       => true,
                'post_status'         => 'publish',
                'category_name'       => $category,
                'posts_per_page'      => $number,
                'order'               => 'DESC',
                'ignore_sticky_posts' => true
                ) ) );
            if ( $query_args->have_posts() ) { 
                $banner_id='';
                while ( $query_args->have_posts() ) 
                {   
                    $query_args->the_post(); 
                    $banner_id.= get_the_ID() . ',';
                    $array = explode (",", $banner_id);
                    array_pop($array); 
                }
                wp_reset_query();
                $j=0; $i=1;
                while ( $query_args->have_posts() ) {
                $query_args->the_post();?>
                <div class="spnc-filter">
                    <?php if(isset($array[$j])):?>
                    <article class="spnc-post">
                        <div class="spnc-post-overlay">
                            <figure class="spnc-post-thumbnail">
                                 <?php newscrunch_get_the_featured_image($array[$j]);?>
                            </figure>
                        </div>
                        <div class="spnc-post-content">
                            <?php if($date=='on'): ?>
                            <div class="spnc-entry-meta">
                                <span class="spnc-date"> 
                                    <?php newscrunch_get_post_date($array[$j]);?>
                                </span>
                            </div>
                            <?php endif;?>
                            <header class="entry-header">
                                <h4 class="spnc-entry-title">
                                    <?php newscrunch_get_the_title($array[$j]);?>
                                </h4>
                            </header>
                            <div class="spnc-entry-content">
                                <div class="spnc-footer-meta spnc-entry-meta">
                                    <?php if($show_auth=='on'): ?>
                                    <span class="spnc-author">
                                        <i class="fas fa-user"></i>
                                        <?php newscrunch_get_author($array[$j]);?>
                                    </span>
                                    <?php endif; if($show_cat=='on'):?>
                                    <span class="spnc-cat-links">
                                        <i class="fas fa-folder-open"></i>
                                       <?php newscrunch_get_catgories($array[$j]);?>
                                    </span>
                                <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </article>
                    <?php endif;
                    if(isset($array[$j+1])):?>
                    <article class="spnc-post">
                        <div class="spnc-post-overlay">
                            <figure class="spnc-post-thumbnail">
                                <?php newscrunch_get_the_featured_image($array[$j+1]);?>
                            </figure>
                        </div>
                        <div class="spnc-post-content">
                            <?php if($date=='on'): ?>
                            <div class="spnc-entry-meta">
                                <span class="spnc-date"> 
                                    <?php newscrunch_get_post_date($array[$j+1]);?>
                                </span>
                            </div>
                            <?php endif;?>
                            <header class="entry-header">
                                <h4 class="spnc-entry-title">
                                    <?php newscrunch_get_the_title($array[$j+1]);?>
                                </h4>
                            </header>
                            <div class="spnc-entry-content">
                                <div class="spnc-footer-meta spnc-entry-meta">
                                    <?php if($show_auth=='on'): ?>
                                    <span class="spnc-author">
                                        <i class="fas fa-user"></i>
                                        <?php newscrunch_get_author($array[$j+1]);?>
                                    </span>
                                    <?php endif; if($show_cat=='on'):?>
                                    <span class="spnc-cat-links">
                                        <i class="fas fa-folder-open"></i>
                                        <?php newscrunch_get_catgories($array[$j+1]);?>
                                    </span>
                                <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </article>
                    <?php endif;
                    if(isset($array[$j+2])):?>
                    <article class="spnc-post">
                        <div class="spnc-post-overlay">
                            <figure class="spnc-post-thumbnail">
                                <?php newscrunch_get_the_featured_image($array[$j+2]);?>
                            </figure>
                        </div>
                        <div class="spnc-post-content">
                            <?php if($date=='on'): ?>    
                            <div class="spnc-entry-meta">
                                <span class="spnc-date"> 
                                    <?php newscrunch_get_post_date($array[$j+2]);?>
                                </span>
                            </div>
                            <?php endif;?>
                            <header class="entry-header">
                                <h4 class="spnc-entry-title">
                                    <?php newscrunch_get_the_title($array[$j+2]);?>
                                </h4>
                            </header>
                            <div class="spnc-entry-content">
                                <div class="spnc-footer-meta spnc-entry-meta">
                                    <?php if($show_auth=='on'): ?>
                                    <span class="spnc-author">
                                        <i class="fas fa-user"></i>
                                        <?php newscrunch_get_author($array[$j+2]);?>
                                    </span>
                                    <?php endif; if($show_cat=='on'):?>
                                    <span class="spnc-cat-links">
                                        <i class="fas fa-folder-open"></i>
                                       <?php newscrunch_get_catgories($array[$j+2]);?>
                                    </span>
                                <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </article>
                   <?php endif;
                   if(isset($array[$j+3])):?>
                    <article class="spnc-post">
                        <div class="spnc-post-overlay">
                            <figure class="spnc-post-thumbnail">
                                <?php newscrunch_get_the_featured_image($array[$j+3]);?>
                            </figure>
                        </div>
                        <div class="spnc-post-content">
                            <?php if($date=='on'): ?>      
                            <div class="spnc-entry-meta">
                                <span class="spnc-date"> 
                                    <?php newscrunch_get_post_date($array[$j+3]);?>
                                </span>
                            </div>
                            <?php endif;?>
                            <header class="entry-header">
                                <h4 class="spnc-entry-title">
                                    <?php newscrunch_get_the_title($array[$j+3]);?>
                                </h4>
                            </header>
                            <div class="spnc-entry-content">
                                <div class="spnc-footer-meta spnc-entry-meta">
                                    <?php if($show_auth=='on'): ?>
                                    <span class="spnc-author">
                                        <i class="fas fa-user"></i>
                                         <?php newscrunch_get_author($array[$j+3]);?>
                                    </span>
                                    <?php endif; if($show_cat=='on'):?>
                                    <span class="spnc-cat-links">
                                        <i class="fas fa-folder-open"></i>
                                         <?php newscrunch_get_catgories($array[$j+3]);?>
                                    </span>
                                <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </article>
                   <?php endif;?>
                </div>
                <?php 
                if($loop == $i) break;
                    $i++;
                    $j=$j+4;
                    
            }
                wp_reset_postdata();
            }
            ?>  
        </div>
            <script type="text/javascript">
                jQuery(document).ready(function() 
                {
                   jQuery("#overlay-slider<?php echo esc_attr($this->id);?>").owlCarousel({
                   navigation : true, // Show next and prev buttons        
                    autoplay: true,
                    autoplayTimeout: 8000,
                    autoplayHoverPause: true,
                    smartSpeed: 7300,
                    loop:true, // loop is true up to 1199px screen.
                    nav:true, // is true across all sizes
                    margin:20, // margin 10px till 960 breakpoint
                    autoHeight: true,
                    responsiveClass:true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
                    //items: 3,
                    dots: false,
                    navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
                    responsive:{    
                        200:{ items:1 },
                        480:{ items:1 },
                        768:{ items:1 },
                        1000:{ items:1 }            
                    }
                });
                });
            </script>
        <?php
        echo wp_kses_post($args['after_widget']);

    }

    //Widget Back End
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ])){ $title = $instance[ 'title' ]; } else { $title = esc_html__('Widget title','newscrunch' ); }
        if ( isset( $instance[ 'category' ])){ $category = $instance[ 'category' ]; }
        if ( isset( $instance[ 'number' ])){ $number = $instance[ 'number' ]; } else { $number = 8; }
        if ( isset( $instance[ 'date' ])){ $date = $instance[ 'date' ]; }
        if ( isset( $instance[ 'show_cat' ])){ $show_cat = $instance[ 'show_cat' ]; }
        if ( isset( $instance[ 'show_auth' ])){ $show_auth = $instance[ 'show_auth' ]; }
        ?>
            <!-- Heading -->
            <p class="newscrunch-widet-area">
                <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php echo esc_html__( 'Widget Title','newscrunch' ); echo ':'; ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <!-- Category -->
            <p class="newscrunch-widet-area">
                <label for="<?php echo esc_attr($this->get_field_id( 'category' )); ?>"><?php echo esc_html__( 'Categories','newscrunch' ); echo ':'; ?></label>
                <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'category' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'category' )); ?>">
                    <option value=""><?php echo esc_html__( 'All Category', 'newscrunch' );?></option>
                    <?php  
                    $categories = get_categories(); 
                    foreach( $categories as $cat ): ?>
                    <option  value="<?php echo esc_attr($cat->slug);?>" <?php if($cat->slug == $category) { echo 'selected'; } ?>><?php echo esc_html($cat->name). ' (' .esc_html($cat->count). ') ';?></option>
                    <?php endforeach;?>
                </select>
            </p>
             <!-- No of post -->
            <p class="newscrunch-widet-area">
                <label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"> <?php echo esc_html__( 'Number of posts to show','newscrunch' ); echo ':'; ?> </label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="number" value="<?php echo esc_attr( $number ); ?>" min="1" />
            </p>
             <!-- date -->
            <p class="newscrunch-widet-area" style="float: left; width: 100%;">
                <input <?php if($date=='on') { echo 'checked'; }?> class="widefat" id="<?php echo esc_attr($this->get_field_id( 'date' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'date' )); ?>" type="checkbox" />
                <label for="<?php echo esc_attr($this->get_field_id( 'date' )); ?>"> <?php echo esc_html__( 'Show post date','newscrunch' ); ?> </label>
            </p>
            <!-- Show Author -->
            <p class="newscrunch-widet-area" style="float: left; width: 100%;">
                <input <?php if($show_auth=='on') { echo 'checked'; }?> class="widefat" id="<?php echo esc_attr($this->get_field_id( 'show_auth' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_auth' )); ?>" type="checkbox"/>
                <label for="<?php echo esc_attr($this->get_field_id( 'show_auth' )); ?>"> <?php echo esc_html__( 'Show author details','newscrunch' ); ?> </label>
            </p>
            <!-- Show Category -->
            <p class="newscrunch-widet-area" style="float: left; width: 100%;">
                <input <?php if($show_cat=='on') { echo 'checked'; }?> class="widefat" id="<?php echo esc_attr($this->get_field_id( 'show_cat' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_cat' )); ?>" type="checkbox"/>
                <label for="<?php echo esc_attr($this->get_field_id( 'show_cat' )); ?>"> <?php echo esc_html__( 'Show post category','newscrunch' ); ?> </label>
            </p>
        <?php
    }

    //save or uption option
    public function update( $new_instance, $old_instance)
    {
      $instance = array();
      $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
      $instance['category'] = ( ! empty( $new_instance['category'] ) ) ? sanitize_text_field( $new_instance['category'] ) : '';
      $instance['number'] = ( ! empty( $new_instance['number'] ) ) ? absint( $new_instance['number'] ) : '';
      $instance['date'] = ( ! empty( $new_instance['date'] ) ) ? newscrunch_sanitize_checkbox( $new_instance['date'] ) : '';
      $instance['show_cat'] = ( ! empty( $new_instance['show_cat'] ) ) ? newscrunch_sanitize_checkbox( $new_instance['show_cat'] ) : '';
      $instance['show_auth'] = ( ! empty( $new_instance['show_auth'] ) ) ? newscrunch_sanitize_checkbox( $new_instance['show_auth'] ) : '';
      return $instance;
    }

}