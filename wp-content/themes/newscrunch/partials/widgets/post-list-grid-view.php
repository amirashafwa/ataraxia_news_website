<?php
/**
* Widget API: List Grid View Widget Class
* @package Newscrunch
*/
class Newscrunch_List_Grid_View_Widget_Controller extends WP_Widget {

    //construct part
    function __construct()
    {
        parent::__construct(
        //Base ID of widget
        'newscrunch_list_grid_view',

        //widget name will appear in UI
        esc_html__('Newscrunch : List Grid View','newscrunch'),

        // Widget description
        array( 'description' => esc_html__('Display your blog in a grid view with a list layout','newscrunch'))  
        );

    }

    //Widget Front End
    public function widget( $args, $instance ) {
        if ( ! isset( $args['widget_id'] ) ) { $args['widget_id'] = $this->id; }
        $title    = isset( $instance['title'] ) ? $instance['title'] : '';
        $category = isset( $instance['category'] ) ? $instance['category'] : '';
        $number   = isset( $instance['number'] ) ? $instance['number'] : 4;
        $date     = isset( $instance['date'] ) ? $instance['date'] : '';
        echo wp_kses_post($args['before_widget']);
        if ( $title ) { echo wp_kses_post($args['before_title']) . esc_html($title) . wp_kses_post($args['after_title']);}
        ?>
            <div class="spnc-blog-wrapper-1">
                <div class="spnc-blog-1-post">
                    <?php
                        $query_args = new WP_Query( apply_filters( 'widget_posts_args', array(
                            'no_found_rows'       => true,
                            'post_status'         => 'publish',
                            'category_name'       => $category,
                            'posts_per_page'      => $number,
                            'order'                 => 'DESC',
                            'ignore_sticky_posts' => true
                        ) ) );
                        if ( $query_args->have_posts() ) { 
                            while ( $query_args->have_posts() ) {
                            $query_args->the_post();?>
                            <div class="spnc-post-wrapper">
                                <article class="spnc-post">
                                    <div class="spnc-post-overlay">
                                        <figure class="spnc-post-thumbnail">
                                            <?php 
                                            if ( has_post_thumbnail() ){ 
                                                the_post_thumbnail( 'medium', ['class' => 'img-fluid sp-thumb-img'] ); 
                                            }   
                                            else { ?>
                                                <img class="img-fluid sp-thumb-img" src="<?php echo esc_url( NEWSCRUNCH_TEMPLATE_DIR_URI ); ?>/assets/images/no-preview.jpg" alt="<?php the_title_attribute(); ?>">
                                                <?php 
                                            } ?>
                                        </figure>
                                    </div>
                                    <div class="spnc-post-content">
                                        <header class="entry-header">
                                            <h4 class="spnc-entry-title">
                                                <a href="<?php the_permalink();?>" alt="<?php the_title();?>"><?php the_title();?></a>
                                            </h4>
                                        </header>
                                        <?php if($date=='on') { ?>
                                        <div class="spnc-footer-meta spnc-entry-meta">
                                            <span class="spnc-date"> 
                                               <a href="<?php echo esc_url( home_url('/') ); ?><?php echo esc_html(date( 'Y/m' , strtotime( get_the_date() )) ); ?>">
                                                    <i class="fa fa-clock"></i>
                                                    <time class="spnc-entry-date">
                                                       <?php echo esc_html(get_the_date( 'M d , Y'));?>
                                                    </time>
                                                </a>
                                            </span>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </article>
                            </div>
                            <?php }
                            wp_reset_postdata();
                        }
                    ?>
                </div>
            </div>               
        <?php
        echo wp_kses_post($args['after_widget']);
    }

    //Widget Back End
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ])){ $title = $instance[ 'title' ]; } else { $title = esc_html__("Widget title","newscrunch" ); }
        if ( isset( $instance[ 'category' ])){ $category = $instance[ 'category' ]; }
        if ( isset( $instance[ 'number' ])){ $number = $instance[ 'number' ]; } else { $number = 4; }
        if ( isset( $instance[ 'date' ])){ $date = $instance[ 'date' ]; }
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
      return $instance;
    }

}