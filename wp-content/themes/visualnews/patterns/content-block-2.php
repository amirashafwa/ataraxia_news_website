<?php
 /**
  * Title: Content Block 2
  * Slug: visualnews/content-block-2
  * Categories: visualnews
  */
?>

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"className":"section-header","layout":{"type":"default"}} -->
<div class="wp-block-group section-header"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"spacing":{"margin":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}},"typography":{"textTransform":"uppercase"}},"fontSize":"tiny"} -->
<h2 class="wp-block-heading has-tiny-font-size" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;text-transform:uppercase"><a href="#">Category Name</a></h2>
<!-- /wp:heading -->

<!-- wp:group {"style":{"typography":{"fontSize":"12px","textTransform":"uppercase","fontStyle":"normal","fontWeight":"600"},"spacing":{"blockGap":"20px"},"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}}},"className":"sub-links","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group sub-links has-link-color" style="font-size:12px;font-style:normal;font-weight:600;text-transform:uppercase"><!-- wp:paragraph -->
<p><a href="#">Sub Cat 1</a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><a href="#">Sub Cat 2</a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><a href="#">Sub Cat 3</a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><a href="#">Sub Cat 4</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"1.5em"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="margin-top:1.5em"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%"><!-- wp:query {"queryId":8,"query":{"perPage":"1","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false,"taxQuery":null,"parents":[]},"displayLayout":{"type":"list"},"className":"featured-right"} -->
<div class="wp-block-query featured-right"><!-- wp:post-template -->
<!-- wp:post-featured-image {"isLink":true,"height":"300px"} /-->

<!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"bottom":"10px","top":"10px"}}},"fontSize":"big"} /-->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"40%"} -->
<div class="wp-block-column" style="flex-basis:40%"><!-- wp:group {"style":{"spacing":{"blockGap":"0px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:query {"queryId":13,"query":{"perPage":"3","pages":0,"offset":"1","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false,"taxQuery":null},"displayLayout":{"type":"list","columns":3},"className":"featured-left"} -->
<div class="wp-block-query featured-left"><!-- wp:post-template -->
<!-- wp:post-featured-image {"isLink":true,"width":"150px","height":"100px","align":"left","style":{"spacing":{"margin":{"right":"15px"}}}} /-->

<!-- wp:post-terms {"term":"category","style":{"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}},"typography":{"fontSize":"11px","textTransform":"uppercase"}}} /-->

<!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"10px"}}},"fontSize":"small"} /-->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->