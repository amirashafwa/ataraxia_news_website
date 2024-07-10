<?php
 /**
  * Title: Content Block 6
  * Slug: visualnews/content-block-6
  * Categories: visualnews
  */
?>

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"className":"section-header","layout":{"type":"constrained"}} -->
<div class="wp-block-group section-header"><!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"tiny"} -->
<h2 class="wp-block-heading has-tiny-font-size" style="text-transform:uppercase"><a href="#">Category Name</a></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"1.5em"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="margin-top:1.5em"><!-- wp:query {"queryId":13,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"displayLayout":{"type":"list","columns":2},"className":"post-list"} -->
<div class="wp-block-query post-list"><!-- wp:post-template -->
<!-- wp:post-featured-image {"isLink":true,"height":"120px","style":{"spacing":{"margin":{"bottom":"10px"}}}} /-->

<!-- wp:post-title {"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}},"fontSize":"small"} /-->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->