<?php
/**
 * The template for displaying the footer
 *
 * @package Newscrunch
 */
if ( class_exists('Newscrunch_Plus') ):
	do_action('spncp_footer_widgets');
else:
	do_action('newscrunch_footer_widgets');
endif;

do_action('newscrunch_scrolltotop');
?>
</div>
<?php 
do_action('newscrunch_script_footer');
wp_footer(); ?>
</body>
</html>