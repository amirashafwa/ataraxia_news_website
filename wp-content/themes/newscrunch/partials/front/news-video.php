<?php 
$newscrunch_hide_show_featured_video = get_theme_mod('hide_show_featured_video',false) ;
$newscrunch_hide_show_featured_video_meta = get_theme_mod('hide_show_featured_video_meta',true);
$newscrunch_video_url_id='';
for ($i=1; $i <=5 ; $i++) { 
	$newscrunch_video_url_id.= str_replace("","",get_theme_mod('featured_video_url_'.$i)). ',';
	$newscrunch_array_video_url = explode (",", $newscrunch_video_url_id);
	array_pop($newscrunch_array_video_url);
}

if($newscrunch_hide_show_featured_video == true) { 

	$newscrunch_featured_video_category 	= get_theme_mod('featured_video_dropdown_category',0);
	global $post;
	$newscrunch_featured_video_id='';
	$query_args = array( 'category__in'  => $newscrunch_featured_video_category, 'posts_per_page' => 5, 'order' => 'DESC', 'ignore_sticky_posts' => 1);
    $newscrunch_featured_video_arg = new WP_Query($query_args);
    if ( $newscrunch_featured_video_arg->have_posts() ) 
    {			
		$i=0;
        while ( $newscrunch_featured_video_arg->have_posts() ) 
        {	
    		$newscrunch_featured_video_arg->the_post(); 
            $newscrunch_featured_video_id.= get_the_ID() . ',';
            $array = explode (",", $newscrunch_featured_video_id);
            array_pop($array); 
        }
?>
<!-- Video section -->
<section class="spnc-page-section-space spnc-video video-layout-1">
	
	<div class="spnc-container <?php esc_attr_e(get_theme_mod('featured_video_section_width','default'));?>">
		<div class="spnc-video-row <?php if( class_exists('Newscrunch_Plus') && (!empty(get_theme_mod('video_background_img')))):?>video-img<?php endif;?>">
		<?php if(get_theme_mod('video_img_overlay',true)== true):?><div class="news-video-overlay"></div><?php endif;
		$newscrunch_fvideo_title = get_theme_mod('featured_video_title', __('Featured Video', 'newscrunch' ));
		if(!empty($newscrunch_fvideo_title)): ?>
			<div data-wow-delay=".5s" class="wow-callback bounce spnc-blog-1-wrapper">
				<div class="spnc-blog-1-heading">
				    <h4><?php echo esc_html($newscrunch_fvideo_title); ?></h4>
				</div>
		    </div>
		<?php endif; ?>
		<div class="spnc-container-box">
			<ul data-wow-delay=".5s" class="wow-callback slideInLeft spnc_column spnc_column-1">
				<?php
				$newscrunch_featured_video_img_url = get_the_post_thumbnail_url($array[$i],'full');
            	?>
				<li class="spnc_grid_item spnc_grid_item-1">
					<div class="spnc_item">
						<article class="spnc-post">
							<div class="spnc-post-overlay"></div>
							<div class="spnc-post-img"
								style="background-image:url(<?php echo esc_url($newscrunch_featured_video_img_url) ?>);">
								<div class="spnc-post-content">
									<div class="spnc-content-wrapper">
										<div class="spnc-post-wrapper">
											<div class="spnc-video-popup">
												<?php if($newscrunch_array_video_url[$i] != ''): ?>
													<a href="<?php	if(str_contains($newscrunch_array_video_url[$i], '&')) { echo strstr($newscrunch_array_video_url[$i], '&', true); } else { echo $newscrunch_array_video_url[$i]; } ?>" class="spncOpenVideo popup-youtube1"><i class="fas fa-solid fa-play"></i></a>
												<?php endif; ?>
	                                        </div>
											<header class="entry-header">
												<?php if($newscrunch_hide_show_featured_video_meta == true) { ?>
													<div class="spnc-entry-meta">
														<span class="spnc-cat-links">
															<?php newscrunch_get_categories(get_the_ID($newscrunch_featured_video_arg->the_post())); ?>
														</span>
													</div>
												<?php } ?>
												<h3 class="spnc-entry-title">
													<a href="<?php echo esc_url(get_permalink($array[$i])); ?>" alt="<?php echo esc_attr(get_the_title($array[$i]));?>"><?php echo esc_html(get_the_title($array[$i]));?></a>
												</h3>
											</header>
											<?php if($newscrunch_hide_show_featured_video_meta == true) { ?>
												<div class="spnc-entry-content">
													<div class="spnc-entry-meta">
														<span class="author"><i class="fas fa-user"></i><a <?php if (is_rtl()) { echo 'dir="rtl"'; } ?> href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
									                				<?php echo esc_html(get_the_author()); ?></a>
							                			</span>
							                			<span class="date"> 
							                				<i class="fa fa-solid fa-clock"></i>
							                				<a <?php if (is_rtl()) { echo 'dir="rtl"'; } ?> href="<?php echo esc_url(home_url('/')); ?><?php echo esc_html(date('Y/m', strtotime(get_the_date()))); ?>" alt="<?php esc_attr_e('date-time','newscrunch'); ?>">
											   					<time class="entry-date"><?php echo esc_html(get_the_date()); ?></time>
															</a>
														</span>
													</div>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</article>
					</div>
				</li>
			</ul>
			<ul data-wow-delay=".5s" class="wow-callback slideInDown spnc_column spnc_column-2">
				<?php
				for ( $i = 1; $i <= 2; $i++ ) :
					if (array_key_exists($i, $array)):
						$newscrunch_featured_video_img_url = get_the_post_thumbnail_url($array[$i],'full');
		            	?>
						<li class="spnc_grid_item spnc_grid_item-1">
							<div class="spnc_item">
								<article class="spnc-post">
									<div class="spnc-post-overlay"></div>
									<div class="spnc-post-img"
										style="background-image:url(<?php echo esc_url($newscrunch_featured_video_img_url) ?>);">
										<div class="spnc-post-content">
											<div class="spnc-content-wrapper">
												<div class="spnc-post-wrapper">
													<div class="spnc-video-popup">
														<?php if($newscrunch_array_video_url[$i] != ''): ?>
															<a href="<?php	if(str_contains($newscrunch_array_video_url[$i], '&')) { echo strstr($newscrunch_array_video_url[$i], '&', true); } else { echo $newscrunch_array_video_url[$i]; } ?>" class="spncOpenVideo popup-youtube2"><i class="fas fa-solid fa-play"></i></a>
														<?php endif; ?>
	                                              	</div>
													<header class="entry-header">
														<?php if($newscrunch_hide_show_featured_video_meta == true) { ?>
															<div class="spnc-entry-meta">
																<span class="spnc-cat-links">
																	<?php newscrunch_get_categories(get_the_ID($newscrunch_featured_video_arg->the_post())); ?>
																</span>
															</div>
														<?php } ?>
														<h3 class="spnc-entry-title">
															<a href="<?php echo esc_url(get_permalink($array[$i])); ?>" alt="<?php echo esc_attr(get_the_title($array[$i]));?>"><?php echo esc_html(get_the_title($array[$i]));?></a>
														</h3>
													</header>
												</div>
											</div>
										</div>
									</div>
								</article>
							</div>
						</li>
					<?php endif; 
				endfor;?>
			</ul>
			<ul data-wow-delay=".5s" class="wow-callback slideInRight spnc_column spnc_column-3">
				<?php
				for ( $i = 3; $i <= 4; $i++ ) :
					if (array_key_exists($i, $array)):
						$newscrunch_featured_video_img_url = get_the_post_thumbnail_url($array[$i],'full');
		            	?>
						<li class="spnc_grid_item spnc_grid_item-1">
							<div class="spnc_item">
								<article class="spnc-post">
									<div class="spnc-post-overlay"></div>
									<div class="spnc-post-img"
										style="background-image:url(<?php echo esc_url($newscrunch_featured_video_img_url) ?>);">
										<div class="spnc-post-content">
											<div class="spnc-content-wrapper">
												<div class="spnc-post-wrapper">
													<div class="spnc-video-popup">
														<?php if($newscrunch_array_video_url[$i] != ''): ?>
															<a href="<?php	if(str_contains($newscrunch_array_video_url[$i], '&')) { echo strstr($newscrunch_array_video_url[$i], '&', true); } else { echo $newscrunch_array_video_url[$i]; } ?>" class="spncOpenVideo popup-youtube3"><i class="fas fa-solid fa-play"></i></a>
														<?php endif; ?>
		                                          	</div>
													<header class="entry-header">
														<?php if($newscrunch_hide_show_featured_video_meta == true) { ?>
															<div class="spnc-entry-meta">
																<span class="spnc-cat-links">
																	<?php newscrunch_get_categories(get_the_ID($newscrunch_featured_video_arg->the_post())); ?>
																</span>
															</div>
														<?php } ?>
														<h3 class="spnc-entry-title">
															<a href="<?php echo esc_url(get_permalink($array[$i])); ?>" alt="<?php echo esc_attr(get_the_title($array[$i]));?>"><?php echo esc_html(get_the_title($array[$i]));?></a>
														</h3>
													</header>
												</div>
											</div>
										</div>
									</div>
								</article>
							</div>
						</li>
					<?php endif; 
				endfor;?>
			</ul>
		</div>
	    </div>
	</div>
</section>
<!-- Video section -->
<?php } } ?>