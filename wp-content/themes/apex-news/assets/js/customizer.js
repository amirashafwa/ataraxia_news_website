(function($) {

    const apex_news_section_lists = ['post-carousel'];
    apex_news_section_lists.forEach(apex_news_homepage_scroll_preview);

    function apex_news_homepage_scroll_preview(item, index) {
        // Collect information from customize-controls.js about which panels are opening.
        wp.customize.bind('preview-ready', function() {

            // Initially hide the theme option placeholders on load.
            $('.panel-placeholder').hide();
            item = item.replace('-', '_');
            wp.customize.preview.bind(item, function(data) {
                // Only on the front page.
                if (!$('body').hasClass('home')) {
                    return;
                }

                // When the section is expanded, show and scroll to the content placeholders, exposing the edit links.
                if (true === data.expanded) {
                    $('html, body').animate({
                        'scrollTop': $('#apex_news_' + item + '_section').position().top
                    });
                }
            });

        });
    }


}(jQuery));