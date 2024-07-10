<?php
/**
 * Template part for displaying blog template content
 *
 * @package Newscrunch Theme
 */

?>  
<article data-wow-delay=".8s" itemscope itemtype="https://schema.org/Article" id="post-<?php the_ID(); ?>" <?php post_class('spnc-grid-catpost spnc-post wow-callback zoomIn '); ?> >
	<div class="spnc-post-overlay"></div>
    <?php
	if(has_post_thumbnail()): ?>
		<!-- Post Featured Image -->
		<figure class="spnc-post-thumbnail">
			<a itemprop="url" href="<?php the_permalink(); ?>" >
				<img itemprop="image" width="360" height="270" class="img-fluid" src="<?php the_post_thumbnail_url(); ?>">
			</a>				
		</figure>
	<?php endif; ?>			
	<div class="spnc-post-content <?php if(!has_post_thumbnail()): ?>featured-img<?php endif; ?>">
		<div class="spnc-content-wrapper">
            <div class="spnc-post-wrapper">		       
            	<header class="spnc-entry-header">
                    <div class="spnc-entry-meta">
                        <!-- Post Author -->
			 			<?php if ( get_theme_mod('newscrunch_enable_post_author',true) == true ) :?>
							<span itemprop="author" class="spnc-author">
							<i class="fas fa-solid fa-user"></i>
								<a <?php if (is_rtl()) { echo 'dir="rtl"';} ?> itemprop="url" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
				                <?php echo esc_html(get_the_author()); ?></a>
				            </span>				            
						<?php endif; ?>
						<!-- Post Tag -->
						<?php
			        	if(get_theme_mod('newscrunch_enable_post_tag',true)==true): 
			        		if(has_tag()): ?>
							<span class="tag-links"><i class="fa fa-tags"></i>
							 	 <?php echo the_tags('',', '); ?>
						 	</span>
					 	<?php	
						 	endif;
						endif; ?>	
						<!-- Post Comments -->
	                    <?php if(get_theme_mod('newscrunch_enable_post_comment',true)==true):?>
							<span class="comment-links"><i class="fas fa-comment-alt"></i>
								<a <?php if (is_rtl()) { echo 'dir="rtl"';} ?> itemprop="url" href="<?php the_permalink(); ?>#respond" alt="<?php esc_attr_e('Comments','newscrunch'); ?>">
								     			<?php echo esc_html(get_comments_number()); ?>&nbsp;<?php echo esc_html__('Comments','newscrunch'); ?>
						     	</a>
					     	</span>
				     	<?php endif;?>
					</div>
					<h3 itemprop="name" class="spnc-entry-title">
                        <a itemprop="url" href="<?php the_permalink();?>"><?php the_title();?></a>
                    </h3>   
                    <div class="spnc-description"><p><?php newscrunch_excerpt(30); ?></p></div>
	            </header>
	            <div class="spnc-entry-content">
	            	<div class="spnc-footer-meta">
	            		<div class="spnc-entry-meta">
				     	<!-- Post Date -->
				    		<?php
							if ( get_theme_mod('newscrunch_enable_post_date',true) == true ) :?>
					            <span class="spnc-date">	
					            	<i class="fas fa-solid fa-clock"></i>
									<a itemprop="url" href="<?php echo esc_url(home_url('/')); ?><?php echo esc_html(date('Y/m', strtotime(get_the_date()))); ?>" alt="<?php esc_attr_e('date-time','newscrunch'); ?>">
									   <time itemprop="datePublished" class="entry-date"><?php echo esc_html(get_the_date()); ?></time>
									</a>
								</span>
							<?php endif; ?>   
				        </div>
				     </div>
                </div>                                                                                    
			</div>
		</div>
	</div>
</article>