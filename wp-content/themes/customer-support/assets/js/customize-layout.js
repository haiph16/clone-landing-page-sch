(function( $ ) {
	wp.customize.bind( 'ready', function() {

		var optPrefix = '#customize-control-customer_support_options-';
		
		// Label
		function customer_support_customizer_label( id, title ) {

			// Site Identity

			if ( id === 'custom_logo' || id === 'site_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-customer_support_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Global Color Setting

			if ( id === 'customer_support_first_color' || id === 'customer_support_heading_color' || id === 'customer_support_paragraph_color') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-customer_support_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// General Setting

			if ( id === 'customer_support_scroll_hide' || id === 'customer_support_preloader_hide' || id === 'customer_support_sticky_header' || id === 'customer_support_products_per_row' || id === 'customer_support_scroll_top_position' || id === 'customer_support_products_per_row' || id === 'customer_support_width_option' || id === 'customer_support_nav_menu_text_transform')  {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-customer_support_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Colors

			if ( id === 'customer_support_theme_color' || id === 'background_color' || id === 'background_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-customer_support_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header Image

			if ( id === 'header_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-customer_support_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}


			// Banner

			if ( id === 'customer_support_banner_section_setting' || id === 'customer_support_banner_review_head' || id === 'customer_support_banner_image1' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-customer_support_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Products

			if ( id === 'customer_support_activities_section_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-customer_support_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Footer

			if ( id === 'customer_support_footer_widget_content_alignment' || id === 'customer_support_show_hide_copyright') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-customer_support_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Post Settings

			if ( id === 'customer_support_post_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-customer_support_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Settings

			if ( id === 'customer_support_single_post_page_content' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-customer_support_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}

	    // Site Identity
		customer_support_customizer_label( 'custom_logo', 'Logo Setup' );
		customer_support_customizer_label( 'site_icon', 'Favicon' );

		// Global Color Setting
		customer_support_customizer_label( 'customer_support_first_color', 'Global Color' );
		customer_support_customizer_label( 'customer_support_heading_color', 'Heading Typography' );
		customer_support_customizer_label( 'customer_support_paragraph_color', 'Paragraph Typography' );

		// General Setting
		customer_support_customizer_label( 'customer_support_preloader_hide', 'Preloader' );
		customer_support_customizer_label( 'customer_support_scroll_hide', 'Scroll To Top' );
		customer_support_customizer_label( 'customer_support_scroll_top_position', 'Scroll to top Position' );
		customer_support_customizer_label( 'customer_support_products_per_row', 'woocommerce Setting' );
		customer_support_customizer_label( 'customer_support_width_option', 'Site Width Layouts' );
		customer_support_customizer_label( 'customer_support_nav_menu_text_transform', 'Nav Menus Text Transform' );

		// Colors
		customer_support_customizer_label( 'customer_support_theme_color', 'Theme Color' );
		customer_support_customizer_label( 'background_color', 'Colors' );
		customer_support_customizer_label( 'background_image', 'Image' );

		//Header Image
		customer_support_customizer_label( 'header_image', 'Header Image' );

		//Slider
		customer_support_customizer_label( 'customer_support_banner_section_setting', 'Banner' );
		customer_support_customizer_label( 'customer_support_banner_review_head', 'Client Review' );
		customer_support_customizer_label( 'customer_support_banner_image1', 'Banner Images' );

		//Products
		customer_support_customizer_label( 'customer_support_service_section', 'Service Section' );

		//Footer
		customer_support_customizer_label( 'customer_support_footer_widget_content_alignment', 'Footer' );
		customer_support_customizer_label( 'customer_support_show_hide_copyright', 'Copyright' );

		//Post setting
		customer_support_customizer_label( 'customer_support_post_page_title', 'Post Settings' );

		//Single post setting
		customer_support_customizer_label( 'customer_support_single_post_page_content', 'Single Post Settings' );
	

	});

})( jQuery );
