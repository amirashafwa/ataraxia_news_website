<?php
if ( ! get_theme_mod( 'legal_news_enable_flash_news_section', false ) ) {
	return;
}

$content_ids  = array();
$content_type = get_theme_mod( 'legal_news_flash_news_content_type', 'category' );

if ( $content_type === 'post' ) {

	for ( $i = 1; $i <= 5; $i++ ) {
		$content_ids[] = get_theme_mod( 'legal_news_flash_news_content_post_' . $i );
	}

	$args = array(
		'post_type'           => $content_type,
		'post__in'            => array_filter( $content_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 5 ),
		'ignore_sticky_posts' => true,
	);

} else {
	$cat_content_id = get_theme_mod( 'legal_news_flash_news_content_category' );
	$args           = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 5 ),
	);
}

$args = apply_filters( 'legal_news_flash_news_section_args', $args );

legal_news_render_flash_news_section( $args );

/**
 * Render Flash News Section.
 */
function legal_news_render_flash_news_section( $args ) {
	$section_title    = get_theme_mod( 'legal_news_flash_news_title', __( 'Flash News', 'legal-news' ) );
	$speed_controller = get_theme_mod( 'legal_news_flash_news_speed_controller', 600 );

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) :
		?>
		<section id="legal_news_flash_news_section" class="flash-news-ticker">
			<?php
			if ( is_customize_preview() ) :
				legal_news_section_link( 'legal_news_flash_news_section' );
			endif;
			?>
			<div class="ascendoor-wrapper">
				<div class="flash-news-ticker-wrapper">
					<div class="title-part">
						<div class="title-wrap">
							<span class="flash-loader"><span class="loader"></span></span>
							<h3 class="flash-title">
								<?php echo esc_html( $section_title ); ?>
							</h3>
						</div>
					</div>
					<div class="flash-news-part" dir="ltr">
						<div class="marquee flash-news-slide" data-pauseOnHover="true" data-speed="<?php echo absint( $speed_controller ); ?>">
							<?php
							while ( $query->have_posts() ) :
								$query->the_post();
								?>
								<div class="mag-post-title-wrapper">
									<div class="mag-post-title-wrap">
										<span class="flash-img"><?php the_post_thumbnail( array( 40, 40 ) ); ?></span>
										<h4 class="flash-title"><a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
									</div>
								</div>
								<?php
							endwhile;
							wp_reset_postdata();
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
	endif;
}
