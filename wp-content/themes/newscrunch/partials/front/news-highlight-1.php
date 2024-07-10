<?php
$newscrunch_hide_show_news_highlight = get_theme_mod('hide_show_news_highlight',true) ;
$newscrunch_news_higlight_title = get_theme_mod('news_highlight_title', esc_html__('Highlight', 'newscrunch' ) );

if($newscrunch_hide_show_news_highlight == true) { 

	$newscrunch_news_highlight_category 	= get_theme_mod('news_highlight_dropdown_category',0);
	$newscrunch_news_highlight_post_title	= get_theme_mod('news_highlight_dropdown_post_title',0);
	$newscrunch_news_highlight_num_posts	= get_theme_mod('news_highlight_num_posts',8);

	global $post;

	if((get_theme_mod('newscrunch_highlight_search_option','category')=='category')) {
		$args = array( 'category__in'  => $newscrunch_news_highlight_category, 'posts_per_page' =>$newscrunch_news_highlight_num_posts,'order' =>'DESC','ignore_sticky_posts' => 1);
	}
	if((get_theme_mod('newscrunch_highlight_search_option','category')=='title')) {
		$args = array( 'post__in'  => $newscrunch_news_highlight_post_title, 'order' => 'DESC','ignore_sticky_posts' => 1);
	}
	$the_query = new WP_Query($args); ?>
	<section class="spnc-highlights-1 spnc-highlights-2">
		<div class="spnc-container">
			<div class="spnc-row">
				<?php if(!empty($newscrunch_news_higlight_title)): ?>
				<div class="spnc-col-13">
					<div class="spnc-highlights-title">
						<h3><?php echo esc_html($newscrunch_news_higlight_title);?></h3>
					</div>	
				</div>
				<?php endif; ?>
				<div class="spnc-col-4">			
					<div class="spnc-marquee-wrapper">
						<div class="spnc_highlights" style="animation-duration: 30s;">
							<?php
			            	if ( $the_query->have_posts() ) {
			                	while ( $the_query->have_posts() ) 
			                	{
			            		$the_query->the_post(); 
			            	?>
								<article class="spnc-post">
									
									<figure class="spnc-post-thumbnail">
										<?php if ( has_post_thumbnail() ){  
										 the_post_thumbnail( 'thumbnail', ['class' => 'img-fluid sp-thumb-img'] );
										 } else {?>
										 	<img src="<?php echo esc_url( NEWSCRUNCH_TEMPLATE_DIR_URI ); ?>/assets/images/no-preview.jpg" alt="<?php the_title_attribute(); ?>">
										 <?php } ?>	
									</figure>
									
									<div class="spnc-post-content">
										<h6 class="spnc-entry-title">
											<a href="<?php the_permalink();?>" alt="<?php the_title();?>"><?php the_title();?></a>
										</h6>
										
									</div>
								</article>
								<?php }
				        	wp_reset_query();
				    		}
			            	if ( $the_query->have_posts() ) {
			                	while ( $the_query->have_posts() ) 
			                	{
			            		$the_query->the_post(); 
			            	?>
								<article class="spnc-post">
									<figure class="spnc-post-thumbnail">
										<?php if ( has_post_thumbnail() ){  
										 the_post_thumbnail( 'thumbnail', ['class' => 'img-fluid sp-thumb-img'] );
										 } else {?>
										 	<img src="<?php echo esc_url( NEWSCRUNCH_TEMPLATE_DIR_URI ); ?>/assets/images/no-preview.jpg" alt="<?php the_title_attribute(); ?>">
										 <?php } ?>	
									</figure>
									<div class="spnc-post-content">
										<h6 class="spnc-entry-title">
											<a href="<?php the_permalink();?>" alt="<?php the_title();?>"><?php the_title();?></a>
										</h6>
										
									</div>
								</article>
								<?php }
				        	wp_reset_query();
				    		} ?>
						</div>	

					</div>
					<div class="spnc-highlights-controls">
			           <button id="spnc-marquee-left"><i class="fa fa-angle-left"></i></button>
			           <button id="spnc-marquee-right"><i class="fa fa-angle-right"></i></button>
	             	</div>
				</div>
			</div>
		</div>				
	</section>
	<?php 
} 
?>