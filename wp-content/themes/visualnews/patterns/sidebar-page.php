<?php
 /**
  * Title: Sidebar Page
  * Slug: visualnews/sidebar-page
  * Categories: visualnews
  */
?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search","buttonText":"Search","buttonPosition":"button-inside","buttonUseIcon":true} /--></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:image {"id":140,"sizeSlug":"full","linkDestination":"custom"} -->
<figure class="wp-block-image size-full"><a href="#" target="_blank" rel="noreferrer noopener"><img src="<?php echo esc_url( get_stylesheet_directory_uri() );?>/assets/images/300x250.png" alt="" class="wp-image-140"/></a></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"className":"section-header","layout":{"type":"constrained"}} -->
<div class="wp-block-group section-header"><!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"tiny"} -->
<h2 class="wp-block-heading has-tiny-font-size" style="text-transform:uppercase"><strong>Follow Us</strong></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:social-links {"showLabels":true,"style":{"spacing":{"blockGap":{"top":"10px","left":"10px"},"margin":{"top":"1.25rem"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"space-between"}} -->
<ul class="wp-block-social-links has-visible-labels is-style-logos-only" style="margin-top:1.25rem"><!-- wp:social-link {"url":"#","service":"twitter"} /-->

<!-- wp:social-link {"url":"#","service":"youtube"} /-->

<!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"linkedin"} /-->

<!-- wp:social-link {"url":"#","service":"dribbble"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"1.5rem"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"className":"section-header","layout":{"type":"constrained"}} -->
<div class="wp-block-group section-header"><!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"tiny"} -->
<h2 class="wp-block-heading has-tiny-font-size" style="text-transform:uppercase"><strong>Recent Posts</strong></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"1.5em"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="margin-top:1.5em"><!-- wp:query {"queryId":13,"query":{"perPage":"5","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"displayLayout":{"type":"list","columns":2},"className":"featured-left post-list"} -->
<div class="wp-block-query featured-left post-list"><!-- wp:post-template {"fontSize":"extra-small"} -->
<!-- wp:post-featured-image {"isLink":true,"width":"90px","height":"90px","align":"left","style":{"spacing":{"margin":{"right":"15px"}}}} /-->

<!-- wp:post-terms {"term":"category","style":{"typography":{"fontSize":"11px","textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}}}} /-->

<!-- wp:post-title {"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"top":"10px","bottom":"0px"}}},"fontSize":"extra-small"} /-->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"1.5rem"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"className":"section-header","layout":{"type":"constrained"}} -->
<div class="wp-block-group section-header"><!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"tiny"} -->
<h2 class="wp-block-heading has-tiny-font-size" style="text-transform:uppercase"><strong>Tags</strong></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:tag-cloud {"numberOfTags":30,"smallestFontSize":"12px","largestFontSize":"12px","className":"is-style-default"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->