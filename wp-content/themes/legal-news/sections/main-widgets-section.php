<?php
$sidebar_position = get_theme_mod( 'legal_news_frontpage_sidebar_position', 'frontpage-right-sidebar' );
$no_sidebar       = is_active_sidebar( 'secondary-widgets-section' ) ? '' : 'no-frontpage-sidebar';
if ( is_active_sidebar( 'primary-widgets-section' ) || is_active_sidebar( 'secondary-widgets-section' ) ) :
	?>
	<div class="main-widget-section">
		<div class="ascendoor-wrapper">
			<div class="main-widget-section-wrap <?php echo esc_attr( $sidebar_position ); ?> <?php echo esc_attr( $no_sidebar ); ?>">
				<div class="primary-widgets-section">
					<?php dynamic_sidebar( 'primary-widgets-section' ); ?>
				</div>
				<div class="secondary-widgets-section">
					<?php dynamic_sidebar( 'secondary-widgets-section' ); ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
