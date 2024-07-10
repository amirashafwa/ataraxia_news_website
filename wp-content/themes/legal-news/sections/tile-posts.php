<?php
if ( ! get_theme_mod( 'legal_news_enable_tile_posts_section', false ) ) {
	return;
}

$content_ids  = array();
$content_type = get_theme_mod( 'legal_news_tile_posts_content_type', 'category' );

if ( $content_type === 'post' ) {

	for ( $i = 1; $i <= 3; $i++ ) {
		$content_ids[] = get_theme_mod( 'legal_news_tile_posts_content_post_' . $i );
	}

	$args = array(
		'post_type'           => $content_type,
		'post__in'            => array_filter( $content_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 3 ),
		'ignore_sticky_posts' => true,
	);

} else {
	$cat_content_id = get_theme_mod( 'legal_news_tile_posts_content_category' );
	$args           = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 3 ),
	);
}

$args = apply_filters( 'legal_news_tile_posts_section_args', $args );

legal_news_render_tile_posts_section( $args );

/**
 * Render Tile Posts Section.
 */
function legal_news_render_tile_posts_section( $args ) {
	$section_title = get_theme_mod( 'legal_news_tile_posts_title', __( 'Tile Posts', 'legal-news' ) );
	$button_label  = get_theme_mod( 'legal_news_tile_posts_button_label', __( 'View All', 'legal-news' ) );
	$content_type  = get_theme_mod( 'legal_news_tile_posts_content_type', 'category' );
	$button_link   = get_theme_mod( 'legal_news_tile_posts_button_link' );

	if ( 'category' === $content_type ) {
			$tile_posts_category = get_theme_mod( 'legal_news_tile_posts_content_category' );
			$button_link         = ! empty( $button_link ) ? $button_link : get_category_link( $tile_posts_category );
	} else {
		$button_link = ! empty( $button_link ) ? $button_link : '#';
	}

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) :
		?>
		<section id="legal_news_tile_posts_section" class="magazine-frontpage-section magazine-tile-section style-1">
			<?php
			if ( is_customize_preview() ) :
				legal_news_section_link( 'legal_news_tile_posts_section' );
			endif;
			?>
			<div class="ascendoor-wrapper">
				<div class="section-header">
					<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
					<a href="<?php echo esc_url( $button_link ); ?>" class="mag-view-all-link"><?php echo esc_html( $button_label ); ?></a>
				</div>
				<div class="magazine-section-body">
					<div class="magazine-tile-section-wrapper">
						<?php
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
						?>
					</div>
				</div>
			</div>
		</section>
		<?php
	endif;
}
