<?php

/**
 * Register Widgets
 */
function apex_news_register_widgets() {

	register_widget( 'Legal_News_Posts_Tile_And_List_Widget' );

}
add_action( 'widgets_init', 'apex_news_register_widgets' );

if ( ! class_exists( 'Legal_News_Posts_Tile_And_List_Widget' ) ) {
	/**
	 * Adds Legal_News_Posts_Tile_And_List_Widget Widget.
	 */
	class Legal_News_Posts_Tile_And_List_Widget extends WP_Widget {

		/**
		 * Register widget with WordPress.
		 */
		public function __construct() {
			$legal_news_posts_tile_list_widget_ops = array(
				'classname'   => 'ascendoor-widget magazine-tile-list-section style-2',
				'description' => __( 'Retrive Posts Tile And List Widgets', 'apex-news' ),
			);
			parent::__construct(
				'legal_news_posts_tile_and_list_widget',
				__( 'Ascendoor Posts Tile And List Widget', 'apex-news' ),
				$legal_news_posts_tile_list_widget_ops
			);
		}

		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget( $args, $instance ) {
			if ( ! isset( $args['widget_id'] ) ) {
				$args['widget_id'] = $this->id;
			}
			$tile_list_title        = ( ! empty( $instance['title'] ) ) ? ( $instance['title'] ) : '';
			$tile_list_title        = apply_filters( 'widget_title', $tile_list_title, $instance, $this->id_base );
			$tile_list_button_label = ( ! empty( $instance['button_label'] ) ) ? ( $instance['button_label'] ) : '';
			$tile_list_count        = isset( $instance['number'] ) ? absint( $instance['number'] ) : 4;
			$tile_list_offset       = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';
			$tile_list_category     = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';
			$tile_list_button_link  = ( ! empty( $instance['button_link'] ) ) ? ( $instance['button_link'] ) : esc_url( get_category_link( $tile_list_category ) );
			$tile_list_orderby      = isset( $instance['orderby'] ) && in_array( $instance['orderby'], array( 'title', 'date' ) ) ? $instance['orderby'] : 'date';
			$tile_list_order        = isset( $instance['order'] ) && in_array( $instance['order'], array( 'asc', 'desc' ) ) ? $instance['order'] : 'desc';

			echo $args['before_widget'];
			?>
			<div class="section-header">
				<?php
				if ( ! empty( $tile_list_title ) ) {
					echo $args['before_title'] . esc_html( $tile_list_title ) . $args['after_title'];
				}
				if ( ! empty( $tile_list_button_label ) ) {
					?>
					<a href="<?php echo esc_url( $tile_list_button_link ); ?>" class="mag-view-all-link">
						<?php echo esc_html( $tile_list_button_label ); ?>
					</a>
					<?php
				}
				?>
			</div>
			<div class="magazine-section-body">
				<div class="magazine-tile-list-section-wrapper">
					<?php
					$tile_list_widgets_args = array(
						'post_type'      => 'post',
						'posts_per_page' => absint( $tile_list_count ),
						'offset'         => absint( $tile_list_offset ),
						'orderby'        => $tile_list_orderby,
						'order'          => $tile_list_order,
						'cat'            => absint( $tile_list_category ),
					);

					$query = new WP_Query( $tile_list_widgets_args );
					if ( $query->have_posts() ) :
						$i = 1;
						while ( $query->have_posts() ) :
							$query->the_post();
							?>
							<div class="mag-post-single has-image <?php echo esc_attr( $i == 1 ? 'tile-design' : 'list-design' ); ?>">
								<div class="mag-post-img">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail(); ?>
									</a>
								</div>
								<div class="mag-post-detail">
									<div class="mag-post-category <?php echo esc_attr( 1 === $i ? 'with-background' : '' ); ?>">
										<?php
										$with_background = false;
										if ( 1 === $i ) {
											$with_background = true;
										}
										legal_news_categories_list( $with_background );
										?>
									</div>
									<h3 class="mag-post-title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<div class="mag-post-meta">
										<span class="post-author">
											<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="fas fa-user"></i><?php echo esc_html( get_the_author() ); ?></a>
										</span>
										<span class="post-date">
											<a href="<?php the_permalink(); ?>"><i class="far fa-clock"></i><?php echo esc_html( get_the_date() ); ?></a>
										</span>
									</div>
									<?php if ( 1 === $i ) : ?>
										<div class="mag-post-excerpt">
											<p><?php echo esc_html( wp_trim_words( get_the_content(), 25 ) ); ?></p>
										</div>
									<?php endif; ?>
								</div>
							</div>
							<?php
							$i++;
						endwhile;
						wp_reset_postdata();
					endif;
					?>
				</div>
			</div>
			<?php
			echo $args['after_widget'];
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			$tile_list_title        = isset( $instance['title'] ) ? ( $instance['title'] ) : '';
			$tile_list_button_label = isset( $instance['button_label'] ) ? ( $instance['button_label'] ) : '';
			$tile_list_button_link  = isset( $instance['button_link'] ) ? esc_url( $instance['button_link'] ) : '';
			$tile_list_count        = isset( $instance['number'] ) ? absint( $instance['number'] ) : 4;
			$tile_list_offset       = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';
			$tile_list_category     = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';
			$tile_list_orderby      = isset( $instance['orderby'] ) && in_array( $instance['orderby'], array( 'title', 'date' ) ) ? $instance['orderby'] : 'date';
			$tile_list_order        = isset( $instance['order'] ) && in_array( $instance['order'], array( 'asc', 'desc' ) ) ? $instance['order'] : 'desc';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Section Title:', 'apex-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $tile_list_title ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_label' ) ); ?>"><?php esc_html_e( 'View All Button:', 'apex-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_label' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_label' ) ); ?>" type="text" value="<?php echo esc_attr( $tile_list_button_label ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_link' ) ); ?>"><?php esc_html_e( 'View All Button URL:', 'apex-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_link' ) ); ?>" type="url" value="<?php echo esc_attr( $tile_list_button_link ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'apex-news' ); ?></label>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" max="4" value="<?php echo absint( $tile_list_count ); ?>" size="3" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>"><?php esc_html_e( 'Number of posts to displace or pass over:', 'apex-news' ); ?></label>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'offset' ) ); ?>" type="number" step="1" min="0" value="<?php echo absint( $tile_list_offset ); ?>" size="3" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Select the category to show posts:', 'apex-news' ); ?></label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>" class="widefat" style="width:100%;">
					<?php
					$categories = legal_news_get_post_cat_choices();
					foreach ( $categories as $category => $value ) {
						?>
						<option value="<?php echo absint( $category ); ?>" <?php selected( $tile_list_category, $category ); ?>><?php echo esc_html( $value ); ?></option>
						<?php
					}
					?>
				</select>
			</p>
			<p>
				<label><?php esc_html_e( 'Order By:', 'apex-news' ); ?></label>
				<ul>
					<li>
						<label>
							<input id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>" type="radio" value="date" <?php checked( 'date', $tile_list_orderby ); ?> /> 
								<?php esc_html_e( 'Published Date', 'apex-news' ); ?>
						</label>
					</li>
					<li>
						<label>
							<input id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>" type="radio" value="title" <?php checked( 'title', $tile_list_orderby ); ?> /> 
								<?php esc_html_e( 'Alphabetical Order', 'apex-news' ); ?>
						</label>
					</li>
				</ul>
			</p>
			<p>
				<label><?php esc_html_e( 'Sort By:', 'apex-news' ); ?></label>
				<ul>
					<li>
						<label>
							<input id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>" type="radio" value="asc" <?php checked( 'asc', $tile_list_order ); ?> /> 
								<?php esc_html_e( 'Ascending Order', 'apex-news' ); ?>
						</label>
					</li>
					<li>
						<label>
							<input id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>" type="radio" value="desc" <?php checked( 'desc', $tile_list_order ); ?> /> 
								<?php esc_html_e( 'Descending Order', 'apex-news' ); ?>
						</label>
					</li>
				</ul>
			</p>
			<?php
		}

		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update( $new_instance, $old_instance ) {
			$instance                 = $old_instance;
			$instance['title']        = sanitize_text_field( $new_instance['title'] );
			$instance['button_label'] = sanitize_text_field( $new_instance['button_label'] );
			$instance['button_link']  = esc_url_raw( $new_instance['button_link'] );
			$instance['number']       = (int) $new_instance['number'];
			$instance['offset']       = (int) $new_instance['offset'];
			$instance['category']     = (int) $new_instance['category'];
			$instance['orderby']      = wp_strip_all_tags( $new_instance['orderby'] );
			$instance['order']        = wp_strip_all_tags( $new_instance['order'] );
			return $instance;
		}
	}
}
