<header class="header-sidebar spncp-common-hp header-2" itemscope itemtype="http://schema.org/WPHeader">
	<?php get_template_part( 'partials/header/top-header' ); ?>

	<nav class="spnc spnc-custom <?php if(get_theme_mod('hide_show_sticky_header',false) != false):?>header-sticky<?php endif; ?> trsprnt-menu" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
		<div class="spnc-navbar">
			<div class="spnc-container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="spnc-header">
					<!-- Light Layout default logo -->
					<?php
					if(has_custom_logo()){
						the_custom_logo();
					}
				 	if(get_theme_mod('dark_header_logo')){ ?>
						<!-- Dark Layout logo -->
						<a href="<?php echo esc_url(home_url('/'));?>" class="dark-custom-logo-link " rel="home" aria-current="page" itemprop="url">
							<img width="220" height="120" src="<?php echo esc_url( get_theme_mod('dark_header_logo')); ?>" class="dark-custom-logo" style="display: none;" itemprop="image">
						</a>
				 	<?php
					} else{ 
						if(has_custom_logo()){
							$newscrunch_logo_id = get_theme_mod( 'custom_logo' );
							$newscrunch_logo_image = wp_get_attachment_image_src( $newscrunch_logo_id , 'full' );
							?>
							<a href="<?php echo esc_url(home_url('/'));?>" class="dark-custom-logo-link " rel="home" aria-current="page" itemprop="url">
								<img width="220" height="120" src="<?php echo esc_url($newscrunch_logo_image[0]); ?>" class="dark-custom-logo" style="display: none;" itemprop="image">
							</a>
						<?php }
					}
					$newscrunch_site_title 	= get_theme_mod('hide_show_site_title',true); 
					$newscrunch_site_tagline 	= get_theme_mod('hide_show_site_tagline',true); 
					if( ((get_option('blogname')!='') || (get_option('blogdescription')!='' )) && ( ($newscrunch_site_title == true) || ($newscrunch_site_tagline == true )) ) {
					?>
						<div class="custom-logo-link-url">
							<?php if(get_option('blogname')!='' && ( $newscrunch_site_title == true ) ) { ?>
								<h2 class="site-title" itemprop="name">
									<a class="site-title-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="outline: none;" itemprop="url"><?php bloginfo( 'name' ); ?></a>
								</h2>
							<?php
							}
							if(get_option('blogdescription')!='' && ( $newscrunch_site_tagline == true ) ) {
								$newscrunch_description = get_bloginfo( 'description', 'display' );
								if ( $newscrunch_description || is_customize_preview() ) : ?>
									<p class="site-description" itemprop="description"><?php echo $newscrunch_description; ?></p>
								<?php endif;
							} ?>
						</div>
					<?php } ?>
				   	<button id="spnc-toggle" class="spnc-toggle" data-toggle="collapse" type="button"
							aria-controls="menu" aria-expanded="false"><i class="fas fa-bars"></i>
					</button>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->


				<div class="collapse spnc-collapse" id="custom-collapse">
					<div class="ml-auto">
						<?php
						$newscrunch_shop_button = '<ul class="nav spnc-nav spnc-right">%3$s';
						$newscrunch_shop_button .= '<li class="menu-item dropdown search_exists">'; 

						
		       			$newscrunch_shop_button .= '</li>';
		       			
		       			
					   	$newscrunch_shop_button .= '</ul>'; 
					   	$newscrunch_menu_class='';
					    wp_nav_menu( array (
							'theme_location'	=>	'primary', 
							'menu_class'    	=>	'nav spnc-nav spnc-right '.$newscrunch_menu_class.'',
							'items_wrap'    	=>	$newscrunch_shop_button,
							'fallback_cb'   	=>	'newscrunch_fallback_page_menu',
							'walker'        	=>	new Newscrunch_Nav_Walker()
						));
						?>
					</div>
					<div class=spnc-head-wrap>
				<div class="spnc-header-right">
					<?php if( get_theme_mod('hide_show_search_icon',true ) == true ):?>
					<ul class="nav spnc-nav">					         
				         <li class="menu-item dropdown">
								<a href="#searchbar_fullscreen" class="search-icon" aria-haspopup="true" aria-expanded="false"><i class="fas fa-search"></i></a>
							</li>
					</ul>
					<div id="searchbar_fullscreen">
						<button type="button" class="close">×</button>
						<form method="get" id="searchform" autocomplete="off" class="search-form" action="<?php echo esc_url( home_url( '/' )); ?>">
						<label>
							<input autofocus type="search" class="search-field" placeholder="<?php echo esc_attr__('Search','newscrunch'); ?>" value="" name="s" id="s" autofocus>
						</label>
						<input type="submit" class="search-submit btn" value="<?php echo esc_attr__('Search','newscrunch');?>">
						</form>
					</div>
					<?php endif; if( get_theme_mod('hide_show_dark_light_icon',true ) == true ):?>
				
				<div class="spnc-dark-layout menu-item">
					<a class="spnc-dark-icon" id="spnc-layout-icon" href="#"><i class="fas fa-solid fa-moon"></i></a>
				</div>
				<?php endif;?>
				
		      </div>
		      				<?php if( get_theme_mod('hide_show_toggle_icon',true ) == true ):?>
		      <div class="spnc-widget-toggle menu-item">
					<a class="spnc-toggle-icon" onclick="spncOpenPanel()" href="#"><i class="fas fa-bars"></i></a>
				</div>
				
			<?php endif;?>

			</div>
				</div><!-- /.spnc-collapse -->
			</div><!-- /.spnc-container-fluid -->
		</div><!-- /.spnc-navbar -->
	</nav>
	<!--/Logo & Menu Section-->
</header>
<!-- Sidebar panel-->
<div id="spnc_panelSidebar" class="spnc_sidebar_panel">
	<a href="javascript:void(0)" class="spnc_closebtn" onclick="spncClosePanel()">×</a>
		<div class="spnc-right-sidebar">
			<div class="spnc-sidebar" id="spnc-sidebar-panel-fixed">
		    	<div class="right-sidebar">      
					<?php newscrunch_side_panel_widget_area( 'menu-widget-area' );?>        
				</div>
			</div>
		</div>
</div>
<!-- /Sidebar panel-->        
<div class="clrfix"></div>