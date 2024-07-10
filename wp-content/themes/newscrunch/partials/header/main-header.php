<!-- Header section-->
	<header class="header-sidebar header-1 <?php if(get_theme_mod('header_layout','2')=='center'){echo "spnc-header-center";}?>" itemscope itemtype="http://schema.org/WPHeader">
		<?php 
		// call the top header file
		get_template_part( 'partials/header/top-header' );

		$newscrunch_sticky_header = get_theme_mod('hide_show_sticky_header',false) ?>
		<nav class="spnc spnc-custom <?php if($newscrunch_sticky_header != false):?>header-sticky<?php endif; ?> trsprnt-menu " role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
			<div class="spnc-navbar">
				<div class="spnc-container">
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
						<?php
							}
						}
						$newscrunch_site_title 	= get_theme_mod('hide_show_site_title',true); 
						$newscrunch_site_tagline 	= get_theme_mod('hide_show_site_tagline',true);
						if( ((get_option('blogname')!='') || (get_option('blogdescription')!='' )) && ( ($newscrunch_site_title == true) || ($newscrunch_site_tagline == true )) ) {
						?>
						<div class="custom-logo-link-url">
							<?php if(get_option('blogname')!='' && ( $newscrunch_site_title == true ) ) { ?>
								<h2 class="site-title" itemprop="name">
									<a class="site-title-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a>
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

					<div class="collapse spnc-collapse" id="custom-collapse">
						<div class="ml-auto">
							<?php
							$newscrunch_shop_button = '<ul class="nav spnc-nav spnc-right">%3$s';
							$newscrunch_shop_button .= '<li class="menu-item dropdown search_exists">'; 

							//Hence This condition only work when search will be activate
							if( get_theme_mod('hide_show_search_icon',true ) == true )
							{
						    	$newscrunch_shop_button .= 
						    							'<a href="#searchbar_fullscreen" class="search-icon" aria-haspopup="true" aria-expanded="false"><i class="fas fa-search"></i></a>
						    								<div id="searchbar_fullscreen">
		                                                    <button type="button" class="close">×</button><form method="get" id="searchform" autocomplete="off" class="search-form" action="'.  esc_url( home_url( '/' )).'"><label><input autofocus type="search" class="search-field" placeholder="'. esc_attr__('Search','newscrunch').'" value="" name="s" id="s" autofocus></label><input type="submit" class="search-submit btn" value="'.esc_attr__('Search','newscrunch').'">
		                                                    </form>
                                                           </div>';
			       			}
			       			$newscrunch_shop_button .= '</li>';
			       				$newscrunch_shop_button .= '<div class="menu-item spnc-dark-layout"><a class="spnc-dark-icon" id="spnc-layout-icon" href="#"><i class="fas fa-solid fa-moon"></i></a></div>';
			       			
			       			if( get_theme_mod('hide_show_toggle_icon',true ) == true )
							{
			       				$newscrunch_shop_button .= '<div class="menu-item spnc-widget-toggle"><a class="spnc-toggle-icon" onclick="spncOpenPanel()" href="#"><i class="fas fa-bars"></i></a></div>';
			       			}
						   	$newscrunch_shop_button .= '</ul>'; 
						   	$newscrunch_menu_class='';
						    wp_nav_menu( array (
								'theme_location'	=>	'primary', 
								'menu_class'    	=>	'nav spnc-nav spnc-right '.$newscrunch_menu_class.'',
								'items_wrap'    	=>	$newscrunch_shop_button,
								'fallback_cb'   	=>	'newscrunch_fallback_page_menu',
								'walker'        	=>	new newscrunch_Nav_Walker()
							));
							?>
						</div>
					</div>
					<!-- /.spnc-collapse -->
				</div>	
				<!-- /.spnc-container-fluid -->
			</div>
		<!-- /.spnc-navbar -->
		</nav>
	<!--/Logo & Menu Section-->
</header>
<!-- End Header Sidebar-->

<div class="clrfix"></div>
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