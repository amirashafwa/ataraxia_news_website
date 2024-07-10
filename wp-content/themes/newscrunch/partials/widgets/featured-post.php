<?php
/**
* Widget API: Featured Post Widget Class
* @package Newscrunch
*/
class Newscrunch_Featured_Post_Widget_Controller extends WP_Widget {

    //construct part
    function __construct()
    {
        parent::__construct(
        //Base ID of widget
        'newscrunch_featured_post',

        //widget name will appear in UI
        esc_html__('Newscrunch : Featured Post','newscrunch'),

        // Widget description
        array( 'description' => esc_html__('Display your post as featured post','newscrunch'))  
        );

    }

    //Widget Front End
    public function widget( $args, $instance ) {
        if ( ! isset( $args['widget_id'] ) ) { $args['widget_id'] = $this->id;}
        $title      = isset( $instance['title'] ) ? $instance['title'] : '';
        $category   = isset( $instance['category'] ) ? $instance['category'] : '';
        $date       = isset( $instance['date'] ) ? $instance['date'] : '';
        $show_cat   = isset( $instance['show_cat'] ) ? $instance['show_cat'] : '';
        $show_auth  = isset( $instance['show_auth'] ) ? $instance['show_auth'] : '';
        $show_comments = isset( $instance['show_comments'] ) ? $instance['show_comments'] : '';
        $show_read  = isset( $instance['show_read'] ) ? $instance['show_read'] : '';
        echo wp_kses_post($args['before_widget']);
        if ( $title ) { echo wp_kses_post($args['before_title']) . esc_html($title) . wp_kses_post($args['after_title']); }
        ?>
            <div class="spnc-wrapper-3-filter featured-post">
                 <?php
                    $query_args = new WP_Query( apply_filters( 'widget_posts_args', array(
                        'no_found_rows'       => true,
                        'post_status'         => 'publish',
                        'category_name'       => $category,
                        'posts_per_page'      => 5,
                        'order'                 => 'DESC',
                        'ignore_sticky_posts' => true
                    ) ) );
                    if ( $query_args->have_posts() ) { 
                       
                        while ( $query_args->have_posts() ) {
                        $query_args->the_post();?>
                         
                            <div class="spnc-first-post">
                                <div class="spnc-filter">
                                    <article class="spnc-post">
                                        <div class="spnc-post-overlay">
                                            <figure class="spnc-post-thumbnail">
                                                <?php 
                                                if ( has_post_thumbnail() ){ the_post_thumbnail( 'full', ['class' => 'img-fluid sp-thumb-img'] ); } 
                                                else {
                                                     ?>
                                                        <img class="img-fluid sp-thumb-img" src="<?php echo esc_url( NEWSCRUNCH_TEMPLATE_DIR_URI ); ?>/assets/images/no-preview.jpg" alt="<?php the_title_attribute(); ?>">
                                                    <?php 
                                                } ?>
                                            </figure>   
                                        </div>
                                        <?php if($show_cat=='on') { ?>
                                        <div class="spnc-entry-meta">
                                            <span class="spnc-cat-links">
                                                <?php newscrunch_get_categories(get_the_ID()); ?>
                                            </span>
                                        </div>
                                        <?php } ?>
                                        <div class="spnc-post-content">
                                            <?php if($date=='on') { ?>
                                            <div class="spnc-entry-meta">
                                                <span class="spnc-date"> 
                                                    <a <?php if (is_rtl()) { echo 'dir="rtl"';} ?> href="<?php echo esc_url( home_url('/') ); ?><?php echo esc_html(date( 'Y/m' , strtotime( get_the_date() )) ); ?>">
                                                        <time class="spnc-entry-date"><?php echo esc_html(get_the_time( get_option( 'date_format' ) ));?></time>
                                                    </a>
                                                </span>
                                            </div>
                                            <?php } ?>
                                            <header class="entry-header">
                                                <h4 class="spnc-entry-title">
                                                    <a href="<?php the_permalink();?>" alt="<?php the_title();?>"><?php the_title();?></a>
                                                </h4>
                                            </header>
                                            <div class="spnc-entry-content">
                                                <div class="spnc-footer-meta spnc-entry-meta">
                                                    <?php if($show_auth=='on') { ?>
                                                    <span class="spnc-author">
                                                        <i class="fas fa-user"></i>
                                                        <a <?php if (is_rtl()) { echo 'dir="rtl"';} ?> href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" > <?php echo esc_html(get_the_author());?></a>
                                                    </span>
                                                    <?php } if($show_comments=='on') { ?>
                                                    <span class="spnc-comment-links">
                                                        <i class="fas fa-comment-alt"></i> 
                                                        <a <?php if (is_rtl()) { echo 'dir="rtl"';} ?> href="<?php the_permalink(); ?>#respond"><?php echo esc_html(get_comments_number()); echo' '; echo esc_html__('Comments','newscrunch');?></a>
                                                    </span>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <?php  
                            break;
                           }
                        wp_reset_postdata();
                        echo '<div class="spnc-list-post">';
                        while ( $query_args->have_posts() ) {
                        $query_args->the_post();?>
                            <div class="spnc-filter">
                                <article class="spnc-post">
                                    <div class="spnc-post-overlay">
                                        <figure class="spnc-post-thumbnail">
                                            <?php 
                                                if ( has_post_thumbnail() ){ the_post_thumbnail( 'thumbnail', ['class' => 'img-fluid sp-thumb-img'] ); } 
                                                else {
                                                     ?>
                                                        <img class="img-fluid sp-thumb-img" src="<?php echo esc_url( NEWSCRUNCH_TEMPLATE_DIR_URI ); ?>/assets/images/no-preview.jpg" alt="<?php the_title_attribute(); ?>">
                                                    <?php 
                                                } ?>
                                        </figure>   
                                    </div>
                                    <div class="spnc-post-content">
                                        <div class="spnc-entry-meta">
                                            <?php 
                                                if($date=='on') { ?>
                                                <span class="spnc-date">
                                                    <i class="fa fa-clock"></i>
                                                    <a <?php if (is_rtl()) { echo 'dir="rtl"';} ?> href="<?php echo esc_url(home_url('/')); ?><?php echo esc_html(date( 'Y/m' , strtotime( get_the_date('M-d-Y') )) );?>"><time ><?php echo esc_html(get_the_date( 'M '));?><?php echo esc_html(get_the_date( 'd'));?>,<?php echo esc_html(get_the_date('Y '));?></time>
                                                    </a>
                                                </span>
                                            <?php } if($show_auth=='on') { ?>
                                                <span class="spnc-author"><i class="fas fa-user"></i> <a <?php if (is_rtl()) { echo 'dir="rtl"';} ?> href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" > <?php echo esc_html(get_the_author());?></a></span>
                                                <?php }  ?>
                                        </div>
                                        <header class="entry-header">
                                            <h4 class="spnc-entry-title">
                                                <a href="<?php the_permalink();?>" alt="<?php the_title();?>"><?php the_title();?></a>
                                            </h4>
                                        </header>
                                        <?php if($show_read=='on') { ?>
                                            <div class="spnc-entry-content">
                                                <a href="<?php the_permalink();?>" class="spnc-more-link"><?php echo esc_html__('Read More', 'newscrunch' );?></a>
                                            </div>
                                        <?php }  ?>
                                    </div>
                            </article>
                        </div>
                    <?php
                        }
                        echo '</div>';
                        wp_reset_postdata();
                    }
                ?>
            </div>    
        <?php
        echo wp_kses_post($args['after_widget']);

    }

    //Widget Back End
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ])){ $title = $instance[ 'title' ]; } else { $title = esc_html__("Widget title","newscrunch" ); }
        if ( isset( $instance[ 'category' ])){ $category = $instance[ 'category' ]; }
        if ( isset( $instance[ 'date' ])){ $date = $instance[ 'date' ]; }
        if ( isset( $instance[ 'show_cat' ])){ $show_cat = $instance[ 'show_cat' ]; }  
        if ( isset( $instance[ 'show_auth' ])){ $show_auth = $instance[ 'show_auth' ]; }  
        if ( isset( $instance[ 'show_comments' ])){ $show_comments = $instance[ 'show_comments' ]; }  
        if ( isset( $instance[ 'show_read' ])){ $show_read = $instance[ 'show_read' ]; }
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
                    <option value=""><?php echo esc_html__( 'Select category', 'newscrunch' );?></option>
                    <?php  
                    $categories = get_categories(); 
                    foreach( $categories as $cat ): ?>
                    <option  value="<?php echo esc_attr($cat->slug);?>" <?php if($cat->slug == $category) { echo 'selected'; } ?>><?php echo esc_html($cat->name). ' (' .esc_html($cat->count). ') ';?></option>
                    <?php endforeach;?>
                </select>
            </p>
            <!-- date -->
            <p class="newscrunch-widet-area" style="float: left; width: 100%;">
                <input <?php if($date=='on') { echo 'checked'; }?> class="widefat" id="<?php echo esc_attr($this->get_field_id( 'date' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'date' )); ?>" type="checkbox" />
                <label for="<?php echo esc_attr($this->get_field_id( 'date' )); ?>"> <?php echo esc_html__( 'Show post date','newscrunch' ); ?> </label>
            </p>
            <!-- Show Category -->
            <p class="newscrunch-widet-area" style="float: left; width: 100%;">
                <input <?php if($show_cat=='on') { echo 'checked'; }?> class="widefat" id="<?php echo esc_attr($this->get_field_id( 'show_cat' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_cat' )); ?>" type="checkbox"/>
                <label for="<?php echo esc_attr($this->get_field_id( 'show_cat' )); ?>"> <?php echo esc_html__( 'Show post category','newscrunch' ); ?> </label>
            </p>
            <!-- Show Author -->
            <p class="newscrunch-widet-area" style="float: left; width: 100%;">
                <input <?php if($show_auth=='on') { echo 'checked'; }?> class="widefat" id="<?php echo esc_attr($this->get_field_id( 'show_auth' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_auth' )); ?>" type="checkbox"/>
                <label for="<?php echo esc_attr($this->get_field_id( 'show_auth' )); ?>"> <?php echo esc_html__( 'Show author details','newscrunch' ); ?> </label>
            </p>
            <!-- Show Comment -->
            <p class="newscrunch-widet-area" style="float: left; width: 100%;">
                <input <?php if($show_comments=='on') { echo 'checked'; }?> class="widefat" id="<?php echo esc_attr($this->get_field_id( 'show_comments' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_comments' )); ?>" type="checkbox"/>
                <label for="<?php echo esc_attr($this->get_field_id( 'show_comments' )); ?>"> <?php echo esc_html__( 'Show comments','newscrunch' ); ?> </label>
            </p>
            <!-- Show Read more -->
            <p class="newscrunch-widet-area" style="float: left; width: 100%;">
                <input <?php if($show_read=='on') { echo 'checked'; }?> class="widefat" id="<?php echo esc_attr($this->get_field_id( 'show_read' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_read' )); ?>" type="checkbox"/>
                <label for="<?php echo esc_attr($this->get_field_id( 'show_read' )); ?>"> <?php echo esc_html__( 'Show read more','newscrunch' ); ?> </label>
            </p>
           
        <?php
    }

    //save or uption option
    public function update( $new_instance, $old_instance)
    {
      $instance = array();
      $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
      $instance['category'] = ( ! empty( $new_instance['category'] ) ) ? sanitize_text_field( $new_instance['category'] ) : '';
      $instance['date'] = ( ! empty( $new_instance['date'] ) ) ? newscrunch_sanitize_checkbox( $new_instance['date'] ) : '';
      $instance['show_cat'] = ( ! empty( $new_instance['show_cat'] ) ) ? newscrunch_sanitize_checkbox( $new_instance['show_cat'] ) : ''; 
      $instance['show_auth'] = ( ! empty( $new_instance['show_auth'] ) ) ? newscrunch_sanitize_checkbox( $new_instance['show_auth'] ) : ''; 
      $instance['show_comments'] = ( ! empty( $new_instance['show_comments'] ) ) ? newscrunch_sanitize_checkbox( $new_instance['show_comments'] ) : ''; 
      $instance['show_read'] = ( ! empty( $new_instance['show_read'] ) ) ? newscrunch_sanitize_checkbox( $new_instance['show_read'] ) : ''; 

      return $instance;
    }

}