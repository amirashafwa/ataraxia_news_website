<?php
 /**
  * Title: Content Block 7
  * Slug: visualnews/content-block-7
  * Categories: visualnews
  */
?>

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"className":"section-header","layout":{"type":"default"}} -->
<div class="wp-block-group section-header"><!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"tiny"} -->
<h2 class="wp-block-heading has-tiny-font-size" style="text-transform:uppercase"><a href="#">Category Name</a></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"1.5em"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="margin-top:1.5em"><!-- wp:query {"queryId":13,"query":{"perPage":"4","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"displayLayout":{"type":"list","columns":2},"className":"featured-left post-list"} -->
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