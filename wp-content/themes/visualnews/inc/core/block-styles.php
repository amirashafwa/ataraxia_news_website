<?php
/**
 * Block Styles
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 */
	function visualnews_register_block_styles() {
		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'visualnews-border',
				'label' => esc_html__( 'Borders', 'visualnews' ),
			)
		);
	}
	add_action( 'init', 'visualnews_register_block_styles' );
}
