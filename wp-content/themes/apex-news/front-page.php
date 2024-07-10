<?php

get_header();

if ( is_front_page() && is_home() ) {

	require get_template_directory() . '/home.php';

} elseif ( is_front_page() && ! is_home() ) {
	?>
	<main id="primary" class="site-main">
		<?php require get_theme_file_path() . '/inc/sections/sections.php'; ?>
	</main><!-- #main -->
	<?php
}

if ( true === get_theme_mod( 'legal_news_enable_frontpage_content', false ) && 'page' == get_option( 'show_on_front' ) ) {
	?>
	<div class="ascendoor-wrapper">
		<div class="ascendoor-page">
			<div class="homepage-primary">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</div>
			<?php
			if ( legal_news_is_sidebar_enabled() ) {
				get_sidebar();
			}
			?>
		</div>
	</div>

	<?php
}

get_footer();
