<?php
/**
 * Getting started template
 */
$newscrunch_name = wp_get_theme();
?>
<div id="getting_started" class="newscrunch-tab-pane active">
	<div class="spice-container">
		<div class="spice-row">
			<div class="spice-col-1">
				<h1 class="newscrunch-info-title text-center"><?php 
				/* translators: %s: theme name */
				printf( esc_html__('%s Theme Configuration','newscrunch'), esc_html($newscrunch_name) ); ?><?php if( !empty($newscrunch_name['Version']) ): ?> <sup id="newscrunch-theme-version"><?php echo esc_html( $newscrunch_name['Version'] ); ?> </sup><?php endif; ?></h1>
			</div>
		</div>
		<div class="spice-row" style="margin-top: 20px;">
			<div class="spice-col-3"> 
				<div class="newscrunch-page" style="border: none;box-shadow: none;">
					<div class="mockup">
						<?php if(class_exists('Spice_Starter_Sites')): ?>
							<a href="<?php echo esc_url( admin_url( 'admin.php?page=spice-starter-sites' ) ); ?>">
								<img src="<?php echo NEWSCRUNCH_TEMPLATE_DIR_URI.'/admin/assets/img/import-demo-img.png';?>"/>
							</a>
						<?php else: ?>
							<img class="tooltip" src="<?php echo NEWSCRUNCH_TEMPLATE_DIR_URI.'/admin/assets/img/import-demo-img.png';?>"/>
						 	<span class="tooltiptext"><?php echo esc_html__('Need to install & activate the "Spice Starter Sites" plugin to import the demo.', 'newscrunch');?></span>
						<?php endif; ?>
			    	</div>
			    </div>
			</div>
			<div class="spice-col-3"> 
				<div class="newscrunch-page" style="border: none;box-shadow: none;">
			    	<div class="mockup">
			    		<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" target="_blank">
			    			<img src="<?php echo NEWSCRUNCH_TEMPLATE_DIR_URI.'/admin/assets/img/customize-img.png';?>"/>
			    		<a>
			    	</div>
				</div>
			</div>
		</div>
		<div class="spice-row" style="margin-top: 20px;">
			<div class="spice-col-3">
				<div class="newscrunch-page">
					<div class="newscrunch-page-top"><?php esc_html_e( 'Theme Features', 'newscrunch' ); ?></div>
					<div class="newscrunch-page-content">
						<ul class="newscrunch-page-list-flex">
							<li>
								<div class="dashicons dashicons-visibility"></div>
								<a class="newscrunch-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=title_tagline' ) ); ?>" target="_blank"><?php esc_html_e('Site Logo','newscrunch'); ?></a>
							</li>
							<li>
								<div class="dashicons dashicons-layout"></div>
								<a class="newscrunch-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=theme_layout_setting_section' ) ); ?>" target="_blank"><?php esc_html_e('Site Layout','newscrunch'); ?></a>
							</li>
							<li>
							 	<div class="dashicons dashicons-heading"></div>
								<a class="newscrunch-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=newscrunch_theme_header' ) ); ?>" target="_blank"><?php esc_html_e('Header Section','newscrunch'); ?></a>
							</li>
							<li>
								<div class="dashicons dashicons-format-aside"></div>
								<a class="newscrunch-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=sidebar_layout_setting_section' ) ); ?>" target="_blank"><?php esc_html_e('Sidebar Layout','newscrunch'); ?></a>
							</li>
							<li>
								<div class="dashicons dashicons-share"></div>
								<a class="newscrunch-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=newscrunch_social_icon_section' ) ); ?>" target="_blank"><?php esc_html_e('Social Icons','newscrunch'); ?></a>
							</li>
							<li>
								<div class="dashicons dashicons-columns"></div>
								<a class="newscrunch-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=newscrunch_theme_footer' ) ); ?>" target="_blank"><?php esc_html_e('Footer Widgets','newscrunch'); ?></a>
							</li>
							<li>
								<div class="dashicons dashicons-menu"></div>
								<a class="newscrunch-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>" target="_blank"><?php esc_html_e('Menus','newscrunch'); ?></a>
							</li>
							<li>
								<div class="dashicons dashicons-welcome-widgets-menus"></div>
								<a class="newscrunch-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>" target="_blank"><?php esc_html_e('Widgets','newscrunch'); ?></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="spice-col-3">
				<div class="newscrunch-page">
					<div class="newscrunch-page-top"><?php esc_html_e( 'Useful Links', 'newscrunch' ); ?></div>
					<div class="newscrunch-page-content">
						<ul class="newscrunch-page-list-flex page-theme-info">
							<li>
								<div class="dashicons dashicons-info"></div>
								<a class="newscrunch-page-quick-setting-link" href="<?php echo esc_url('https://spicethemes.com/newscrunch-wordpress-theme/'); ?>" target="_blank"><?php esc_html_e('Theme Detail','newscrunch'); ?></a>
							</li>
							<li>
								<div class="dashicons dashicons-download"></div>
								<a class="newscrunch-page-quick-setting-link" href="<?php echo esc_url('https://spicethemes.com/newscrunch-wordpress-theme/#newscrunch_demo_lite'); ?>" target="_blank"><?php esc_html_e('Theme Demos','newscrunch'); ?></a>
							</li>
							<li> 
								<div class="dashicons dashicons-media-text"></div>
								<a class="newscrunch-page-quick-setting-link" href="<?php echo esc_url('https://helpdoc.spicethemes.com/category/newscrunch/'); ?>" target="_blank"><?php echo esc_html__('Documentation','newscrunch'); ?></a>
							</li>
							<li>
								<div class="dashicons dashicons-businesswoman"></div>
								<a class="newscrunch-page-quick-setting-link" href="<?php echo esc_url('https://wordpress.org/support/theme/newscrunch/');?>" target="_blank"><?php esc_html_e('Support','newscrunch');?></a>
							</li>							
						    <li> 
						    	<div class="dashicons dashicons-thumbs-up"></div>
								<a class="newscrunch-page-quick-setting-link" href="<?php echo esc_url('https://wordpress.org/support/theme/newscrunch/reviews/#new-post'); ?>" target="_blank"><?php echo esc_html__('Your feedback is valuable to us','newscrunch'); ?></a>
							</li>
							<li> 
								<div class="dashicons dashicons-dashboard"></div>
								<a class="newscrunch-page-quick-setting-link" href="<?php echo esc_url('https://spicethemes.com/newscrunch-free-vs-plus/'); ?>" target="_blank"><?php echo esc_html__('Free vs Pro','newscrunch'); ?></a>
							</li>  
							<li> 
								<div class="dashicons dashicons-flag"></div>
								<a class="newscrunch-page-quick-setting-link" href="<?php echo esc_url('https://spicethemes.com/newscrunch-changelog/'); ?>" target="_blank"><?php echo esc_html__('Changelog','newscrunch'); ?></a>
							</li>
							<li> 
								<div class="dashicons dashicons-migrate"></div>
								<a class="newscrunch-page-quick-setting-link" href="<?php echo esc_url('https://demo-newscrunch.spicethemes.com/demo-pro-one/'); ?>" target="_blank"><?php echo esc_html__('Premium Version','newscrunch'); ?></a>
							</li>
							<li> 
								<div class="dashicons dashicons-info"></div>
								<a class="newscrunch-page-quick-setting-link" href="<?php echo esc_url('https://spicethemes.com/contact/'); ?>" target="_blank"><?php echo esc_html__('Pre-sales enquiry','newscrunch'); ?></a>
							</li> 						 
						</ul>
					</div>
				</div>
			</div>		
		</div>
	</div>
</div>