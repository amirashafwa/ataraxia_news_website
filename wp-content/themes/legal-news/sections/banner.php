<?php
if ( ! get_theme_mod( 'legal_news_enable_banner_section', false ) ) {
	return;
}

$slider_content_ids    = $editor_content_ids = $trending_content_ids = array();
$slider_content_type   = get_theme_mod( 'legal_news_main_banner_slider_content_type', 'category' );
$editor_content_type   = get_theme_mod( 'legal_news_editor_picks_content_type', 'category' );
$trending_content_type = get_theme_mod( 'legal_news_trending_slider_content_type', 'category' );

if ( $slider_content_type === 'post' ) {
	for ( $i = 1; $i <= 3; $i++ ) {
		$slider_content_ids[] = get_theme_mod( 'legal_news_main_banner_slider_content_post_' . $i );
	}
	$banner_slider_args = array(
		'post_type'           => $slider_content_type,
		'post__in'            => array_filter( $slider_content_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 3 ),
		'ignore_sticky_posts' => true,
	);
} else {
	$cat_content_id     = get_theme_mod( 'legal_news_main_banner_slider_content_category' );
	$banner_slider_args = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 3 ),
	);
}
$banner_slider_args = apply_filters( 'legal_news_main_banner_section_args', $banner_slider_args );

if ( $editor_content_type === 'post' ) {
	for ( $i = 1; $i <= 2; $i++ ) {
		$editor_content_ids[] = get_theme_mod( 'legal_news_editor_picks_post_content_post_' . $i );
	}
	$editor_args = array(
		'post_type'           => $editor_content_type,
		'post__in'            => array_filter( $editor_content_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 2 ),
		'ignore_sticky_posts' => true,
	);
} else {
	$cat_content_id = get_theme_mod( 'legal_news_editor_picks_post_content_category' );
	$editor_args    = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 2 ),
	);
}
$editor_args = apply_filters( 'legal_news_main_banner_section_args', $editor_args );

if ( $trending_content_type === 'post' ) {
	for ( $i = 1; $i <= 6; $i++ ) {
		$trending_content_ids[] = get_theme_mod( 'legal_news_trending_slider_content_post_' . $i );
	}
	$trending_args = array(
		'post_type'           => $trending_content_type,
		'post__in'            => array_filter( $trending_content_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 6 ),
		'ignore_sticky_posts' => true,
	);
} else {
	$cat_content_id = get_theme_mod( 'legal_news_trending_slider_content_category' );
	$trending_args  = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 6 ),
	);
}
$trending_args = apply_filters( 'legal_news_main_banner_section_args', $trending_args );

legal_news_render_banner_section( $banner_slider_args, $editor_args, $trending_args );

/**
 * Render Banner Section.
 */
function legal_news_render_banner_section( $banner_slider_args, $editor_args, $trending_args ) {
	$main_banner_title  = get_theme_mod( 'legal_news_main_banner_title', __( 'Main News', 'legal-news' ) );
	$trending_title     = get_theme_mod( 'legal_news_trending_title', __( 'Trending', 'legal-news' ) );
	$editor_picks_title = get_theme_mod( 'legal_news_editor_picks_title', __( 'Editor Picks', 'legal-news' ) );
	?>

	<section id="legal_news_banner_section" class="banner-section banner-section-with-trending-editor style-1">
		<?php
		if ( is_customize_preview() ) :
			legal_news_section_link( 'legal_news_banner_section' );
		endif;
		?>
		<div class="ascendoor-wrapper">
			<div class="banner-section-wrapper">
				<!-- Editor Picks Area -->
				<div class="editor-picks-part">
					<div class="section-header">
						<h3 class="section-title"><?php echo esc_html( $editor_picks_title ); ?></h3>
					</div>
					<?php
					$editor_query = new WP_Query( $editor_args );
					if ( $editor_query->have_posts() ) :
						?>
						<div class="editor-picks-wrapper">
							<?php
							while ( $editor_query->have_posts() ) :
								$editor_query->the_post();
								?>
								<div class="mag-post-single banner-gird-single has-image tile-design">
									<div class="mag-post-img">
										<a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>">
											<?php the_post_thumbnail( 'full' ); ?>
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
						<?php
					endif;
					?>
				</div>
				<!-- End Editor Picks Area -->
				<!-- Main Banner Slider Area -->
				<div class="slider-part">
					<div class="section-header">
						<h3 class="section-title"><?php echo esc_html( $main_banner_title ); ?></h3>
					</div>
					<?php
					$banner_query = new WP_Query( $banner_slider_args );
					if ( $banner_query->have_posts() ) :
						?>
						<div class="magazine-slider-wrapper banner-slider magazine-carousel-slider-navigation">
							<?php
							while ( $banner_query->have_posts() ) :
								$banner_query->the_post();
								?>
								<div class="mag-post-single has-image tile-design">
									<div class="mag-post-img">
										<a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>">
											<?php the_post_thumbnail( 'full' ); ?>
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
						<?php
					endif;
					?>
				</div>
				<!-- End Main Banner Slider Area -->
				<!-- Trending Area Section -->
				<div class="trending-part">
					<div class="section-header">
						<h3 class="section-title"><?php echo esc_html( $trending_title ); ?></h3>
					</div>
					<?php
					$trending_query = new WP_Query( $trending_args );
					if ( $trending_query->have_posts() ) :
						?>
						<div class="trending-wrapper banner-trending-carousel">
							<?php
							$i = 1;
							while ( $trending_query->have_posts() ) :
								$trending_query->the_post();
								?>
								<div class="mag-post-single banner-gird-single has-image list-design">
									<div class="mag-post-img">
										<a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>">
											<?php the_post_thumbnail( 'post-thumbnail' ); ?>
										</a>
										<span class="trending-no"><?php echo absint( $i ); ?></span>
									</div>
									<div class="mag-post-detail">
										<h4 class="mag-post-title">
											<a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>"><?php the_title(); ?></a>
										</h4>
									</div>
								</div>
								<?php
								$i++;
							endwhile;
							wp_reset_postdata();
							?>
						</div>
						<?php
					endif;
					?>
				</div>
				<!-- End Trending Area Section -->
			</div>
		</div>
	</section>

	<?php
}
