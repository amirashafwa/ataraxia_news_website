<?php
if ( ! class_exists( 'Legal_News_Posts_Slider_Widget' ) ) {
	/**
	 * Adds Legal_News_Posts_Slider_Widget Widget.
	 */
	class Legal_News_Posts_Slider_Widget extends WP_Widget {

		/**
		 * Register widget with WordPress.
		 */
		public function __construct() {
			$legal_news_posts_slider_widget_ops = array(
				'classname'   => 'ascendoor-widget magazine-post-slider-section',
				'description' => __( 'Retrive Posts Slider Widgets', 'legal-news' ),
			);
			parent::__construct(
				'legal_news_posts_slider_widget',
				__( 'Ascendoor Posts Slider Widget', 'legal-news' ),
				$legal_news_posts_slider_widget_ops
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
			$slider_title        = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
			$slider_title        = apply_filters( 'widget_title', $slider_title, $instance, $this->id_base );
			$slider_button_label = ( ! empty( $instance['button_label'] ) ) ? $instance['button_label'] : '';
			$slider_count        = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
			$slider_offset       = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';
			$slider_category     = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';
			$slider_button_link  = ( ! empty( $instance['button_link'] ) ) ? $instance['button_link'] : esc_url( get_category_link( $slider_category ) );
			$slider_orderby      = isset( $instance['orderby'] ) && in_array( $instance['orderby'], array( 'title', 'date' ) ) ? $instance['orderby'] : 'date';
			$slider_order        = isset( $instance['order'] ) && in_array( $instance['order'], array( 'asc', 'desc' ) ) ? $instance['order'] : 'desc';

			echo $args['before_widget'];
			if ( ! empty( $slider_title || $slider_button_label ) ) {
				?>
				<div class="section-header">
					<?php
					if ( ! empty( $slider_title ) ) {
						echo $args['before_title'] . esc_html( $slider_title ) . $args['after_title'];
					}
					if ( ! empty( $slider_button_label ) ) {
						?>
						<a href="<?php echo esc_url( $slider_button_link ); ?>" class="mag-view-all-link">
							<?php echo esc_html( $slider_button_label ); ?>
						</a>
						<?php
					}
					?>
				</div>
				<?php
			}
			?>
			<div class="magazine-section-body">
				<div class="magazine-post-slider-section-wrapper post-slider magazine-carousel-slider-navigation">
					<?php
					$slider_widgets_args = array(
						'post_type'      => 'post',
						'posts_per_page' => absint( $slider_count ),
						'offset'         => absint( $slider_offset ),
						'orderby'        => $slider_orderby,
						'order'          => $slider_order,
						'cat'            => absint( $slider_category ),
					);

					$query = new WP_Query( $slider_widgets_args );
					if ( $query->have_posts() ) :
						while ( $query->have_posts() ) :
							$query->the_post();
							?>
							<div class="mag-post-single has-image tile-design">
								<div class="mag-post-img">
									<a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>">
										<?php the_post_thumbnail(); ?>
									</a>
								</div>
								<div class="mag-post-detail">
									<div class="mag-post-category with-background">
										<?php legal_news_categories_list( true ); ?>
									</div>
									<h4 class="mag-post-title">
										<a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>"><?php the_title(); ?></a>
									</h4>
									<div class="mag-post-meta">
										<?php
											legal_news_posted_by();
											legal_news_posted_on();
										?>
									</div>
								</div>
							</div>
							<?php
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
			$slider_title        = isset( $instance['title'] ) ? $instance['title'] : '';
			$slider_button_label = isset( $instance['button_label'] ) ? $instance['button_label'] : '';
			$slider_button_link  = isset( $instance['button_link'] ) ? $instance['button_link'] : '#';
			$slider_count        = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
			$slider_offset       = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';
			$slider_category     = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';
			$slider_orderby      = isset( $instance['orderby'] ) && in_array( $instance['orderby'], array( 'title', 'date' ) ) ? $instance['orderby'] : 'date';
			$slider_order        = isset( $instance['order'] ) && in_array( $instance['order'], array( 'asc', 'desc' ) ) ? $instance['order'] : 'desc';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Section Title:', 'legal-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $slider_title ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_label' ) ); ?>"><?php esc_html_e( 'View All Button:', 'legal-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_label' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_label' ) ); ?>" type="text" value="<?php echo esc_attr( $slider_button_label ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_link' ) ); ?>"><?php esc_html_e( 'View All Button URL:', 'legal-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_link' ) ); ?>" type="text" value="<?php echo esc_attr( $slider_button_link ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'legal-news' ); ?></label>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" max="3" value="<?php echo absint( $slider_count ); ?>" size="3" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>"><?php esc_html_e( 'Number of posts to displace or pass over:', 'legal-news' ); ?></label>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'offset' ) ); ?>" type="number" step="1" min="0" value="<?php echo absint( $slider_offset ); ?>" size="3" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Select the category to show posts:', 'legal-news' ); ?></label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>" class="widefat" style="width:100%;">
					<?php
					$categories = legal_news_get_post_cat_choices();
					foreach ( $categories as $category => $value ) {
						?>
						<option value="<?php echo absint( $category ); ?>" <?php selected( $slider_category, $category ); ?>><?php echo esc_html( $value ); ?></option>
						<?php
					}
					?>
				</select>
			</p>
			<p>
				<label><?php esc_html_e( 'Order By:', 'legal-news' ); ?></label>
				<ul>
					<li>
						<label>
							<input id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>" type="radio" value="date" <?php checked( 'date', $slider_orderby ); ?> /> 
							<?php esc_html_e( 'Published Date', 'legal-news' ); ?>
						</label>
					</li>
					<li>
						<label>
							<input id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>" type="radio" value="title" <?php checked( 'title', $slider_orderby ); ?> /> 
							<?php esc_html_e( 'Alphabetical Order', 'legal-news' ); ?>
						</label>
					</li>
				</ul>
			</p>
			<p>
				<label><?php esc_html_e( 'Sort By:', 'legal-news' ); ?></label>
				<ul>
					<li>
						<label>
							<input id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>" type="radio" value="asc" <?php checked( 'asc', $slider_order ); ?> /> 
							<?php esc_html_e( 'Ascending Order', 'legal-news' ); ?>
						</label>
					</li>
					<li>
						<label>
							<input id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>" type="radio" value="desc" <?php checked( 'desc', $slider_order ); ?> /> 
							<?php esc_html_e( 'Descending Order', 'legal-news' ); ?>
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
