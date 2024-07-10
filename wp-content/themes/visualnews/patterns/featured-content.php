<?php
 /**
  * Title: Featured Content
  * Slug: visualnews/featured-content
  * Categories: visualnews
  */
?>

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"40%"} -->
<div class="wp-block-column" style="flex-basis:40%"><!-- wp:query {"queryId":22,"query":{"perPage":"3","pages":0,"offset":"1","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"list"},"className":"featured-left"} -->
<div class="wp-block-query featured-left"><!-- wp:post-template -->
<!-- wp:post-featured-image {"isLink":true,"width":"150px","height":"100px","align":"left"} /-->

<!-- wp:post-terms {"term":"category","style":{"typography":{"fontSize":"11px","textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}}}} /-->

<!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"10px"}}},"fontSize":"small"} /-->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%"><!-- wp:query {"queryId":23,"query":{"perPage":"1","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"list"},"className":"featured-right"} -->
<div class="wp-block-query featured-right"><!-- wp:post-template -->
<!-- wp:post-featured-image {"isLink":true,"height":"300px"} /-->

<!-- wp:post-title {"isLink":true,"fontSize":"big"} /-->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"1.5em"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="margin-top:1.5em"><!-- wp:query {"queryId":41,"query":{"perPage":"4","pages":0,"offset":"4","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"displayLayout":{"type":"flex","columns":4}} -->
<div class="wp-block-query"><!-- wp:post-template {"fontSize":"medium"} -->
<!-- wp:post-featured-image {"isLink":true,"style":{"spacing":{"margin":{"bottom":"10px"}}}} /-->

<!-- wp:post-terms {"term":"category","style":{"typography":{"fontSize":"11px","textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}}}} /-->

<!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"10px"}}},"fontSize":"small"} /-->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->