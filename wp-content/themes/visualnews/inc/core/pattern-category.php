<?php
/**
 * VisualNews: Block Patterns
 *
 * @since VisualNews 1.0
 */

/**
 * Registers pattern categories.
 *
 * @since VisualNews 1.0
 *
 * @return void
 */
function visualnews_register_pattern_category() {

	$patterns = array();

	$block_pattern_categories = array(
		'visualnews' => array( 'label' => __( 'VisualNews Theme', 'visualnews' ) )
	);

	$block_pattern_categories = apply_filters( 'visualnews_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}
}
add_action( 'init', 'visualnews_register_pattern_category', 9 );
