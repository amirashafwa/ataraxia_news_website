<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Legal_News
 */

?>
<?php if ( ! is_front_page() || is_home() ) { ?>
</div>
</div>
</div><!-- #content -->
<?php } ?>

<footer id="colophon" class="site-footer">
	<?php if ( is_active_sidebar( 'footer-widget' ) || is_active_sidebar( 'footer-widget-2' ) || is_active_sidebar( 'footer-widget-3' ) || is_active_sidebar( 'footer-widget-4' ) ) : ?>
	<div class="site-footer-top">
		<div class="ascendoor-wrapper">
			<div class="footer-widgets-wrapper"> 
				<div class="footer-widget-single">
					<?php dynamic_sidebar( 'footer-widget' ); ?>
				</div>
				<div class="footer-widget-single">
					<?php dynamic_sidebar( 'footer-widget-2' ); ?>
				</div>
				<div class="footer-widget-single">
					<?php dynamic_sidebar( 'footer-widget-3' ); ?>
				</div>
				<div class="footer-widget-single">
					<?php dynamic_sidebar( 'footer-widget-4' ); ?>
				</div>
			</div>
		</div>
	</div><!-- .footer-top -->
<?php endif; ?>
<div class="site-footer-bottom">
	<div class="ascendoor-wrapper">
		<div class="site-footer-bottom-wrapper">
			<div class="site-info">
				<?php
						/**
						 * Hook: legal_news_footer_copyright.
						 *
						 * @hooked - legal_news_output_footer_copyright_content - 10
						 */
						do_action( 'legal_news_footer_copyright' );
				?>
					</div><!-- .site-info -->
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->

	<?php
	$is_scroll_top_active = get_theme_mod( 'legal_news_scroll_top', true );
	if ( $is_scroll_top_active ) :
		?>
		<a href="#" id="scroll-to-top" class="magazine-scroll-to-top" aria-label="scroll to top"><i class="fas fa-chevron-up"></i></a>
		<?php
	endif;
	?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
