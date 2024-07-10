/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	const valid_news_section_lists = ['recent-posts'];
	valid_news_section_lists.forEach(valid_news_homepage_scroll_preview);

	function valid_news_homepage_scroll_preview(item, index) {
        // Collect information from customize-controls.js about which panels are opening.
		wp.customize.bind('preview-ready', function() {

            // Initially hide the theme option placeholders on load.
			$('.panel-placeholder').hide();
			item = item.replace(/-/g, '_');
			wp.customize.preview.bind(item, function(data) {
                // Only on the front page.
				if (!$('body').hasClass('home')) {
					return;
				}

                // When the section is expanded, show and scroll to the content placeholders, exposing the edit links.
				if (true === data.expanded) {
					$('html, body').animate({
						'scrollTop': $('#valid_news_' + item + '_section').position().top
					});
				}
			});

		});
	}

}( jQuery ) );
