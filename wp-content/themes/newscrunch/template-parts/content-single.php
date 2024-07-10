<article data-wow-delay=".8s" itemscope itemtype="https://schema.org/Article" id="post-<?php the_ID(); ?>" <?php post_class('spnc-post wow-callback zoomIn')?> >
	<div class="spnc-post-overlay">
		<?php 
		if(has_post_thumbnail()): ?>
			<figure class="spnc-post-thumbnail">
			<?php the_post_thumbnail('full', array('class'=>'img-fluid', 'loading' => false, 'itemprop'=>'image' )); ?>
			</figure>
		<?php endif; ?>
	</div>
    <div class="spnc-post-content">
        <div class="spnc-entry-meta">
        	<!-- Post Category -->
        	<?php
        	if(get_theme_mod('newscrunch_enable_single_post_categories',true)==true):
	        	if ( has_category() ) :
					echo '<span itemprop="about" class="spnc-cat-links">';
					 newscrunch_get_categories(get_the_ID());
					echo '</span>';
				endif; 
			endif; ?>
			<!-- Post Tag -->
			<?php
        	if(get_theme_mod('newscrunch_enable_single_post_tag',true)==true):
				if(has_tag()):
					echo '<span class="spnc-tag-links"><i class="fas fa fa-tags"></i>';
				 	the_tags('',', ');
				 	echo'</span>';	
			 	endif;
			endif; ?> 			
    		<!-- Post Author -->
    		<?php
			if ( get_theme_mod('newscrunch_enable_single_post_author',true) == true ) :?>
				<span itemprop="author" class="spnc-author">
				<i class="fas fa-solid fa-user"></i>
					<a <?php if (is_rtl()) { echo 'dir="rtl"';} ?> itemprop="url" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
	                <?php echo esc_html(get_the_author()); ?></a>
	            </span>				            
			<?php endif; ?>
      		<!-- Post Date -->
    		<?php
			if ( get_theme_mod('newscrunch_enable_single_post_date',true) == true ) :?>
	            <span class="spnc-date">	
	            	<i class="fas fa-solid fa-clock"></i>
					<a <?php if (is_rtl()) { echo 'dir="rtl"';} ?> itemprop="url" href="<?php echo esc_url(home_url('/')); ?><?php echo esc_html(date('Y/m', strtotime(get_the_date()))); ?>" alt="<?php esc_attr_e('date-time','newscrunch'); ?>">
					   <time itemprop="datePublished" class="entry-date"><?php echo esc_html(get_the_date()); ?></time>
					</a>
				</span>
			<?php endif; ?>
        </div>
        <header class="entry-header">
			<h4 itemprop="name" class="spnc-entry-title">
				<?php the_title();?>
			</h4>                                                  
		</header>
        <div itemprop="articleBody" class="spnc-entry-content">
            <?php the_content();
            	wp_link_pages();?>
        </div>
    </div>
    <?php
    if(get_theme_mod('newscrunch_enable_single_post_tag',true)==true):
		if(has_tag()): ?>
			<div class="spnc-post-footer-content">
				<div class="spnc-footer-meta spnc-entry-meta">
					<span class="spnc-text-black"><?php esc_html_e('Tag','newscrunch'); ?></span>
					<span class="spnc-tag-links"><?php  the_tags('',' ');?></span>
				</div>
			</div> 
		<?php endif;
	endif;?>
</article>