<?php
	/*	
	*	Goodlayers Function File
	*	---------------------------------------------------------------------
	*	This file include all of important function and features of the theme
	*	---------------------------------------------------------------------
	*/


// Rest of the CSS & JS
function styles_scripts(){


		// add style for new design 2021
		wp_enqueue_style('owl-carusel', get_stylesheet_directory_uri() . '/js/new-design/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css');
		wp_enqueue_style('new-style', get_stylesheet_directory_uri() . '/css/new-design/style.css');
		 
	
		
	
		wp_deregister_script( 'jquery' );
		// add scripts for new design 2021
	
		wp_enqueue_script('jquery', get_template_directory_uri() . '/js/new-design/jquery.js');
		wp_enqueue_script('owl-carusel', get_template_directory_uri() . '/js/new-design/OwlCarousel2-2.3.4/dist/owl.carousel.min.js', array('jquery'),'3.6.0',true);
		wp_enqueue_script('main', get_template_directory_uri() . '/js/new-design/main.js', array('jquery'),'3.6.0',true);
	

}
add_action('wp_enqueue_scripts', 'styles_scripts',99);














	// goodlayers core plugin function
	include_once(get_template_directory() . '/admin/core/sidebar-generator.php');
	include_once(get_template_directory() . '/admin/core/utility.php');
	include_once(get_template_directory() . '/admin/core/media.php' );
	
	// create admin page
	if( is_admin() ){
		include_once(get_template_directory() . '/admin/tgmpa/class-tgm-plugin-activation.php');
		include_once(get_template_directory() . '/admin/tgmpa/plugin-activation.php');
		include_once(get_template_directory() . '/admin/function/getting-start.php');	
	}
	
	// plugins
	include_once(get_template_directory() . '/plugins/wpml.php');
	include_once(get_template_directory() . '/plugins/revslider.php');
	
	/////////////////////
	// front end script
	/////////////////////
	
	include_once(get_template_directory() . '/include/utility.php' );
	include_once(get_template_directory() . '/include/function-regist.php' );
	include_once(get_template_directory() . '/include/navigation-menu.php' );
	include_once(get_template_directory() . '/include/include-script.php' );
	include_once(get_template_directory() . '/include/goodlayers-core-filter.php' );
	include_once(get_template_directory() . '/include/goodlayers-core-blog-style.php' );
	include_once(get_template_directory() . '/include/maintenance.php' );
	include_once(get_template_directory() . '/woocommerce/woocommerce-settings.php' );
	
	/////////////////////
	// execute module 
	/////////////////////
	
	// initiate sidebar structure
	new gdlr_core_sidebar_generator( array(
		'before_widget' => '<div id="%1$s" class="widget %2$s realfactory-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="realfactory-widget-title">',
		'after_title'   => '</h3>' ) );
	
	// remove the core default action to enqueue the theme script
	remove_action('after_setup_theme', 'gdlr_init_goodlayers_core_elements');
	add_action('after_setup_theme', 'realfactory_init_goodlayers_core_elements');
	if( !function_exists('realfactory_init_goodlayers_core_elements') ){
		function realfactory_init_goodlayers_core_elements(){

			// create an admin option and customizer
			if( (is_admin() || is_customize_preview()) && class_exists('gdlr_core_admin_option') && class_exists('gdlr_core_theme_customizer') ){
				
				$realfactory_admin_option = new gdlr_core_admin_option(array(
					'filewrite' => realfactory_get_style_custom(true)
				));	
				
				include_once( get_template_directory() . '/include/options/general.php');
				include_once( get_template_directory() . '/include/options/typography.php');
				include_once( get_template_directory() . '/include/options/color.php');
				include_once( get_template_directory() . '/include/options/plugin-settings.php');
				include_once( get_template_directory() . '/include/options/customize-utility.php');

				if( is_customize_preview() ){
					new gdlr_core_theme_customizer($realfactory_admin_option);
				}

				// clear an option for customize page
				add_action('wp', 'realfactory_clear_option');
				
			}
			
			// add the script for page builder / page options / post option
			if( is_admin() ){
				
				if( class_exists('gdlr_core_revision') ){
					$revision_num = 5;
					new gdlr_core_revision($revision_num);
				}
				
				// create page option
				if( class_exists('gdlr_core_page_option') ){

					// for page post type
					new gdlr_core_page_option(array(
						'post_type' => array('page'),
						'options' => array(
							'layout' => array(
								'title' => esc_html__('Layout', 'realfactory'),
								'options' => array(
									'enable-header-area' => array(
										'title' => esc_html__('Enable Header Area', 'realfactory'),
										'type' => 'checkbox',
										'default' => 'enable'
									),
									'enable-page-title' => array(
										'title' => esc_html__('Enable Page Title', 'realfactory'),
										'type' => 'checkbox',
										'default' => 'enable',
										'condition' => array( 'enable-header-area' => 'enable' )
									),
									'page-caption' => array(
										'title' => esc_html__('Caption', 'realfactory'),
										'type' => 'textarea',
										'condition' => array( 'enable-header-area' => 'enable', 'enable-page-title' => 'enable' )
									),					
									'title-background' => array(
										'title' => esc_html__('Page Title Background', 'realfactory'),
										'type' => 'upload',
										'condition' => array( 'enable-header-area' => 'enable', 'enable-page-title' => 'enable' )
									),
									'enable-breadcrumbs' => array(
										'title' => esc_html__('Enable Breadcrumbs ( Breadcrumb NavXT Plugin )', 'realfactory'),
										'type' => 'combobox',
										'options' => array(
											'default' => esc_html__('Default', 'realfactory'),
											'enable' => esc_html__('Enable', 'realfactory'),
											'disable' => esc_html__('Disable', 'realfactory'),
										),
										'default' => 'default',
										'condition' => array( 'enable-header-area' => 'enable', 'enable-page-title' => 'enable' )
									),
									'show-content' => array(
										'title' => esc_html__('Show WordPress Editor Content', 'realfactory'),
										'type' => 'checkbox',
										'default' => 'enable',
										'description' => esc_html__('Disable this to hide the content in editor to show only page builder content.', 'realfactory'),
									),
									'sidebar' => array(
										'title' => esc_html__('Sidebar', 'realfactory'),
										'type' => 'radioimage',
										'options' => 'sidebar',
										'default' => 'none',
										'wrapper-class' => 'gdlr-core-fullsize'
									),
									'sidebar-left' => array(
										'title' => esc_html__('Sidebar Left', 'realfactory'),
										'type' => 'combobox',
										'options' => 'sidebar',
										'condition' => array( 'sidebar' => array('left', 'both') )
									),
									'sidebar-right' => array(
										'title' => esc_html__('Sidebar Right', 'realfactory'),
										'type' => 'combobox',
										'options' => 'sidebar',
										'condition' => array( 'sidebar' => array('right', 'both') )
									),
									'enable-footer' => array(
										'title' => esc_html__('Enable Footer', 'realfactory'),
										'type' => 'combobox',
										'options' => array(
											'default' => esc_html__('Default', 'realfactory'),
											'enable' => esc_html__('Enable', 'realfactory'),
											'disable' => esc_html__('Disable', 'realfactory'),
										)
									),
									'enable-copyright' => array(
										'title' => esc_html__('Enable Copyright', 'realfactory'),
										'type' => 'combobox',
										'options' => array(
											'default' => esc_html__('Default', 'realfactory'),
											'enable' => esc_html__('Enable', 'realfactory'),
											'disable' => esc_html__('Disable', 'realfactory'),
										)
									),

								)
							), // layout
							'title' => array(
								'title' => esc_html__('Title Style', 'realfactory'),
								'options' => array(

									'title-style' => array(
										'title' => esc_html__('Page Title Style', 'realfactory'),
										'type' => 'combobox',
										'options' => array(
											'default' => esc_html__('Default', 'realfactory'),
											'small' => esc_html__('Small', 'realfactory'),
											'medium' => esc_html__('Medium', 'realfactory'),
											'large' => esc_html__('Large', 'realfactory'),
											'custom' => esc_html__('Custom', 'realfactory'),
										),
										'default' => 'default'
									),
									'title-align' => array(
										'title' => esc_html__('Page Title Alignment', 'realfactory'),
										'type' => 'radioimage',
										'options' => 'text-align',
										'with-default' => true,
										'default' => 'default'
									),
									'title-spacing' => array(
										'title' => esc_html__('Page Title Padding', 'realfactory'),
										'type' => 'custom',
										'item-type' => 'padding',
										'data-input-type' => 'pixel',
										'options' => array('padding-top', 'padding-bottom', 'caption-top-margin'),
										'wrapper-class' => 'gdlr-core-fullsize gdlr-core-no-link gdlr-core-large',
										'condition' => array( 'title-style' => 'custom' )
									),
									'title-font-size' => array(
										'title' => esc_html__('Page Title Font Size', 'realfactory'),
										'type' => 'custom',
										'item-type' => 'padding',
										'data-input-type' => 'pixel',
										'options' => array('title-size', 'title-letter-spacing', 'caption-size', 'caption-letter-spacing'),
										'wrapper-class' => 'gdlr-core-fullsize gdlr-core-no-link gdlr-core-large',
										'condition' => array( 'title-style' => 'custom' )
									),
									'title-font-weight' => array(
										'title' => esc_html__('Page Title Font Weight', 'realfactory'),
										'type' => 'custom',
										'item-type' => 'padding',
										'options' => array('title-weight', 'caption-weight'),
										'wrapper-class' => 'gdlr-core-fullsize gdlr-core-no-link gdlr-core-large',
										'condition' => array( 'title-style' => 'custom' )
									),
									'title-font-transform' => array(
										'title' => esc_html__('Page Title Font Transform', 'realfactory'),
										'type' => 'combobox',
										'options' => array(
											'none' => esc_html__('None', 'realfactory'),
											'uppercase' => esc_html__('Uppercase', 'realfactory'),
											'lowercase' => esc_html__('Lowercase', 'realfactory'),
											'capitalize' => esc_html__('Capitalize', 'realfactory'),
										),
										'default' => 'uppercase',
										'condition' => array( 'title-style' => 'custom' )
									),
									'title-background-overlay-opacity' => array(
										'title' => esc_html__('Page Title Background Overlay Opacity', 'realfactory'),
										'type' => 'text',
										'description' => esc_html__('Fill the number between 0 - 1 ( Leave Blank For Default Value )', 'realfactory'),
										'condition' => array( 'title-style' => 'custom' )
									),
									'title-color' => array(
										'title' => esc_html__('Page Title Color', 'realfactory'),
										'type' => 'colorpicker',
									),
									'caption-color' => array(
										'title' => esc_html__('Page Caption Color', 'realfactory'),
										'type' => 'colorpicker',
									),
									'title-background-overlay-color' => array(
										'title' => esc_html__('Page Background Overlay Color', 'realfactory'),
										'type' => 'colorpicker',
									),

								)
							), // title
							'header' => array(
								'title' => esc_html__('Header', 'realfactory'),
								'options' => array(

									'header-slider' => array(
										'title' => esc_html__('Header Slider ( Above Navigation )', 'realfactory'),
										'type' => 'combobox',
										'options' => array(
											'none' => esc_html__('None', 'realfactory'),
											'layer-slider' => esc_html__('Layer Slider', 'realfactory'),
											'master-slider' => esc_html__('Master Slider', 'realfactory'),
											'revolution-slider' => esc_html__('Revolution Slider', 'realfactory'),
										),
										'description' => esc_html__('For header style plain / bar / boxed', 'realfactory'),
									),
									'layer-slider-id' => array(
										'title' => esc_html__('Choose Layer Slider', 'realfactory'),
										'type' => 'combobox',
										'options' => gdlr_core_get_layerslider_list(),
										'condition' => array( 'header-slider' => 'layer-slider' )
									),
									'master-slider-id' => array(
										'title' => esc_html__('Choose Master Slider', 'realfactory'),
										'type' => 'combobox',
										'options' => gdlr_core_get_masterslider_list(),
										'condition' => array( 'header-slider' => 'master-slider' )
									),
									'revolution-slider-id' => array(
										'title' => esc_html__('Choose Revolution Slider', 'realfactory'),
										'type' => 'combobox',
										'options' => gdlr_core_get_revolution_slider_list(),
										'condition' => array( 'header-slider' => 'revolution-slider' )
									),

								) // header options
							), // header
							'bullet-anchor' => array(
								'title' => esc_html__('Bullet Anchor', 'realfactory'),
								'options' => array(
									'bullet-anchor-description' => array(
										'type' => 'description',
										'description' => esc_html__('This feature is used for one page navigation. It will appear on the right side of page. You can put the id of element in \'Anchor Link\' field to let the bullet scroll the page to.', 'realfactory')
									),
									'bullet-anchor' => array(
										'title' => esc_html__('Add Anchor', 'realfactory'),
										'type' => 'custom',
										'item-type' => 'tabs',
										'options' => array(
											'title' => array(
												'title' => esc_html__('Anchor Link', 'realfactory'),
												'type' => 'text',
											),
											'anchor-color' => array(
												'title' => esc_html__('Anchor Color', 'realfactory'),
												'type' => 'colorpicker',
											),
											'anchor-hover-color' => array(
												'title' => esc_html__('Anchor Hover Color', 'realfactory'),
												'type' => 'colorpicker',
											)
										),
										'wrapper-class' => 'gdlr-core-fullsize'
									),
								)
							)
						)
					));

					// for post post type
					new gdlr_core_page_option(array(
						'post_type' => array('post'),
						'options' => array(
							'layout' => array(
								'title' => esc_html__('Layout', 'realfactory'),
								'options' => array(

									'show-content' => array(
										'title' => esc_html__('Show WordPress Editor Content', 'realfactory'),
										'type' => 'checkbox',
										'default' => 'enable',
										'description' => esc_html__('Disable this to hide the content in editor to show only page builder content.', 'realfactory'),
									),
									'sidebar' => array(
										'title' => esc_html__('Sidebar', 'realfactory'),
										'type' => 'radioimage',
										'options' => 'sidebar',
										'with-default' => true,
										'default' => 'default',
										'wrapper-class' => 'gdlr-core-fullsize'
									),
									'sidebar-left' => array(
										'title' => esc_html__('Sidebar Left', 'realfactory'),
										'type' => 'combobox',
										'options' => 'sidebar',
										'condition' => array( 'sidebar' => array('left', 'both') )
									),
									'sidebar-right' => array(
										'title' => esc_html__('Sidebar Right', 'realfactory'),
										'type' => 'combobox',
										'options' => 'sidebar',
										'condition' => array( 'sidebar' => array('right', 'both') )
									),
								)
							),
							'metro-layout' => array(
								'title' => esc_html__('Metro Layout', 'realfactory'),
								'options' => array(
									'metro-column-size' => array(
										'title' => esc_html__('Column Size', 'realfactory'),
										'type' => 'combobox',
										'options' => array( 'default'=> esc_html__('Default', 'realfactory'), 
											60 => '1/1', 30 => '1/2', 20 => '1/3', 40 => '2/3', 
											15 => '1/4', 45 => '3/4', 12 => '1/5', 24 => '2/5', 36 => '3/5', 48 => '4/5',
											10 => '1/6', 50 => '5/6'),
										'default' => 'default',
										'description' => esc_html__('Choosing default will display the value selected by the page builder item.', 'realfactory')
									),
									'metro-thumbnail-size' => array(
										'title' => esc_html__('Thumbnail Size', 'realfactory'),
										'type' => 'combobox',
										'options' => 'thumbnail-size',
										'with-default' => true,
										'default' => 'default',
										'description' => esc_html__('Choosing default will display the value selected by the page builder item.', 'realfactory')
									)
								)
							),						
							'title' => array(
								'title' => esc_html__('Title', 'realfactory'),
								'options' => array(

									'blog-title-style' => array(
										'title' => esc_html__('Blog Title Style', 'realfactory'),
										'type' => 'combobox',
										'options' => array(
											'default' => esc_html__('Default', 'realfactory'),
											'small' => esc_html__('Small', 'realfactory'),
											'large' => esc_html__('Large', 'realfactory'),
											'custom' => esc_html__('Custom', 'realfactory'),
											'inside-content' => esc_html__('Inside Content', 'realfactory'),
											'none' => esc_html__('None', 'realfactory'),
										),
										'default' => 'default'
									),
									'blog-title-padding' => array(
										'title' => esc_html__('Blog Title Padding', 'realfactory'),
										'type' => 'custom',
										'item-type' => 'padding',
										'data-input-type' => 'pixel',
										'options' => array('padding-top', 'padding-bottom'),
										'wrapper-class' => 'gdlr-core-fullsize gdlr-core-no-link gdlr-core-large',
										'condition' => array( 'blog-title-style' => 'custom' )
									),
									'blog-feature-image' => array(
										'title' => esc_html__('Blog Feature Image Location', 'realfactory'),
										'type' => 'combobox',
										'options' => array(
											'default' => esc_html__('Default', 'realfactory'),
											'content' => esc_html__('Inside Content', 'realfactory'),
											'title-background' => esc_html__('Title Background', 'realfactory'),
											'none' => esc_html__('None', 'realfactory'),
										)
									),
									'blog-title-background-image' => array(
										'title' => esc_html__('Blog Title Background Image', 'realfactory'),
										'type' => 'upload',
										'data-type' => 'file',
										'condition' => array( 
											'blog-title-style' => array('default', 'small', 'large', 'custom'),
											'blog-feature-image' => array('default', 'content', 'none')
										),
										'description' => esc_html__('Will be overridden by feature image if selected.', 'realfactory'),
									),
									'blog-title-background-overlay-opacity' => array(
										'title' => esc_html__('Blog Title Background Overlay Opacity', 'realfactory'),
										'type' => 'text',
										'description' => esc_html__('Fill the number between 0 - 1 ( Leave Blank For Default Value )', 'realfactory'),
										'condition' => array( 'blog-title-style' => 'custom', 'blog-feature-image' => array( 'default', 'content', 'none' ) ),
									),
									'enable-breadcrumbs' => array(
										'title' => esc_html__('Enable Breadcrumbs ( Breadcrumb NavXT Plugin )', 'realfactory'),
										'type' => 'combobox',
										'options' => array(
											'default' => esc_html__('Default', 'realfactory'),
											'enable' => esc_html__('Enable', 'realfactory'),
											'disable' => esc_html__('Disable', 'realfactory'),
										),
										'default' => 'default',
										'condition' => array( 'blog-title-style' => array('default', 'small', 'large', 'custom') ),
									),
								) // options
							) // title
						)
					));
				}

			}
			
			// create page builder
			if( class_exists('gdlr_core_page_builder') ){
				new gdlr_core_page_builder(array(
					'style' => array(
						'style-custom' => realfactory_get_style_custom()
					)
				));
			}
			
		} // realfactory_init_goodlayers_core_elements
	} // function_exists
