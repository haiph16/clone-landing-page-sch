<?php
/**
 * Customer Support Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Customer Support
 */

if ( ! function_exists( 'customer_support_file_setup' ) ) :

    function customer_support_file_setup() {

        if ( ! defined( 'CUSTOMER_SUPPORT_URL' ) ) {
            define( 'CUSTOMER_SUPPORT_URL', esc_url( 'https://www.themagnifico.net/products/customer-support-wordpress-theme', 'customer-support') );
        }
        if ( ! defined( 'CUSTOMER_SUPPORT_TEXT' ) ) {
            define( 'CUSTOMER_SUPPORT_TEXT', __( 'Customer Support Pro','customer-support' ));
        }

    }
endif;
add_action( 'after_setup_theme', 'customer_support_file_setup' );

use WPTRT\Customize\Section\Customer_Support_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Customer_Support_Button::class );

    $manager->add_section(
        new Customer_Support_Button( $manager, 'customer_support_pro', [
            'title'       => esc_html( CUSTOMER_SUPPORT_TEXT,'customer-support' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'customer-support' ),
            'button_url'  => esc_url( CUSTOMER_SUPPORT_URL )
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'customer-support-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'customer-support-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function customer_support_customize_register($wp_customize){

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    $wp_customize->add_setting('customer_support_logo_title_text', array(
        'default' => true,
        'sanitize_callback' => 'customer_support_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'customer_support_logo_title_text',array(
        'label'          => __( 'Enable Disable Title', 'customer-support' ),
        'section'        => 'title_tagline',
        'settings'       => 'customer_support_logo_title_text',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('customer_support_logo_title_font_size',array(
        'default'   => '',
        'sanitize_callback' => 'customer_support_sanitize_number_absint'
    ));
    $wp_customize->add_control('customer_support_logo_title_font_size',array(
        'label' => esc_html__('Title Font Size','customer-support'),
        'section' => 'title_tagline',
        'type'    => 'number'
    ));

    $wp_customize->add_setting('customer_support_theme_description', array(
        'default' => false,
        'sanitize_callback' => 'customer_support_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'customer_support_theme_description',array(
        'label'          => __( 'Enable Disable Tagline', 'customer-support' ),
        'section'        => 'title_tagline',
        'settings'       => 'customer_support_theme_description',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('customer_support_logo_tagline_font_size',array(
        'default'   => '',
        'sanitize_callback' => 'customer_support_sanitize_number_absint'
    ));
    $wp_customize->add_control('customer_support_logo_tagline_font_size',array(
        'label' => esc_html__('Tagline Font Size','customer-support'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));

    //Logo
    $wp_customize->add_setting('customer_support_logo_max_height',array(
        'default'   => '200',
        'sanitize_callback' => 'customer_support_sanitize_number_absint'
    ));
    $wp_customize->add_control('customer_support_logo_max_height',array(
        'label' => esc_html__('Logo Width','customer-support'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));

    // Global Color Settings
     $wp_customize->add_section('customer_support_global_color_settings',array(
        'title' => esc_html__('Global Settings','customer-support'),
        'priority'   => 28,
    ));

    $wp_customize->add_setting( 'customer_support_first_color', array(
        'default' => '#2777FC',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'customer_support_first_color', array(
        'label' => __('Select Your First Color', 'customer-support'),
        'description' => __('Change the global color of the theme in one click.', 'customer-support'),
        'section' => 'customer_support_global_color_settings',
        'settings' => 'customer_support_first_color',
    )));

    $wp_customize->add_setting( 'customer_support_second_color', array(
        'default' => '#DAF1FF',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'customer_support_second_color', array(
        'label' => __('Select Your Second Color', 'customer-support'),
        'description' => __('Change the global color of the theme in one click.', 'customer-support'),
        'section' => 'customer_support_global_color_settings',
        'settings' => 'customer_support_second_color',
    )));

    //Typography option
    $customer_support_font_array = array(
        ''                       => 'No Fonts',
        'Abril Fatface'          => 'Abril Fatface',
        'Acme'                   => 'Acme',
        'Anton'                  => 'Anton',
        'Architects Daughter'    => 'Architects Daughter',
        'Sail'                   => 'Sail',
        'Arimo'                  => 'Arimo',
        'Arsenal'                => 'Arsenal',
        'Arvo'                   => 'Arvo',
        'Alegreya'               => 'Alegreya',
        'Alfa Slab One'          => 'Alfa Slab One',
        'Averia Serif Libre'     => 'Averia Serif Libre',
        'Bangers'                => 'Bangers',
        'Boogaloo'               => 'Boogaloo',
        'Bad Script'             => 'Bad Script',
        'Bitter'                 => 'Bitter',
        'Bree Serif'             => 'Bree Serif',
        'BenchNine'              => 'BenchNine',
        'Cabin'                  => 'Cabin',
        'Cardo'                  => 'Cardo',
        'Courgette'              => 'Courgette',
        'Cherry Swash'           => 'Cherry Swash',
        'Cormorant Garamond'     => 'Cormorant Garamond',
        'Crimson Text'           => 'Crimson Text',
        'Cuprum'                 => 'Cuprum',
        'Cookie'                 => 'Cookie',
        'Chewy'                  => 'Chewy',
        'Days One'               => 'Days One',
        'Dosis'                  => 'Dosis',
        'Droid Sans'             => 'Droid Sans',
        'Economica'              => 'Economica',
        'Fredoka One'            => 'Fredoka One',
        'Fjalla One'             => 'Fjalla One',
        'Francois One'           => 'Francois One',
        'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
        'Gloria Hallelujah'      => 'Gloria Hallelujah',
        'Great Vibes'            => 'Great Vibes',
        'Handlee'                => 'Handlee',
        'Hammersmith One'        => 'Hammersmith One',
        'Inconsolata'            => 'Inconsolata',
        'Indie Flower'           => 'Indie Flower',
        'IM Fell English SC'     => 'IM Fell English SC',
        'Julius Sans One'        => 'Julius Sans One',
        'Josefin Slab'           => 'Josefin Slab',
        'Josefin Sans'           => 'Josefin Sans',
        'Kanit'                  => 'Kanit',
        'Lobster'                => 'Lobster',
        'Lato'                   => 'Lato',
        'Lora'                   => 'Lora',
        'Libre Baskerville'      => 'Libre Baskerville',
        'Lobster Two'            => 'Lobster Two',
        'Merriweather'           => 'Merriweather',
        'Monda'                  => 'Monda',
        'Montserrat'             => 'Montserrat',
        'Muli'                   => 'Muli',
        'Marck Script'           => 'Marck Script',
        'Noto Serif'             => 'Noto Serif',
        'Open Sans'              => 'Open Sans',
        'Overpass'               => 'Overpass',
        'Overpass Mono'          => 'Overpass Mono',
        'Oxygen'                 => 'Oxygen',
        'Orbitron'               => 'Orbitron',
        'Patua One'              => 'Patua One',
        'Pacifico'               => 'Pacifico',
        'Padauk'                 => 'Padauk',
        'Playball'               => 'Playball',
        'Playfair Display'       => 'Playfair Display',
        'PT Sans'                => 'PT Sans',
        'Philosopher'            => 'Philosopher',
        'Permanent Marker'       => 'Permanent Marker',
        'Poiret One'             => 'Poiret One',
        'Quicksand'              => 'Quicksand',
        'Quattrocento Sans'      => 'Quattrocento Sans',
        'Raleway'                => 'Raleway',
        'Rubik'                  => 'Rubik',
        'Roboto'                 => 'Roboto',
        'Rokkitt'                => 'Rokkitt',
        'Russo One'              => 'Russo One',
        'Righteous'              => 'Righteous',
        'Slabo'                  => 'Slabo',
        'Source Sans Pro'        => 'Source Sans Pro',
        'Shadows Into Light Two' => 'Shadows Into Light Two',
        'Shadows Into Light'     => 'Shadows Into Light',
        'Sacramento'             => 'Sacramento',
        'Shrikhand'              => 'Shrikhand',
        'Tangerine'              => 'Tangerine',
        'Ubuntu'                 => 'Ubuntu',
        'VT323'                  => 'VT323',
        'Varela Round'           => 'Varela Round',
        'Vampiro One'            => 'Vampiro One',
        'Vollkorn'               => 'Vollkorn',
        'Volkhov'                => 'Volkhov',
        'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
    );

    // Heading Typography
    $wp_customize->add_setting( 'customer_support_heading_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'customer_support_heading_color', array(
        'label' => __('Heading Color', 'customer-support'),
        'section' => 'customer_support_global_color_settings',
        'settings' => 'customer_support_heading_color',
    )));

    $wp_customize->add_setting('customer_support_heading_font_family', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'customer_support_sanitize_choices',
    ));
    $wp_customize->add_control( 'customer_support_heading_font_family', array(
        'section' => 'customer_support_global_color_settings',
        'label'   => __('Heading Fonts', 'customer-support'),
        'type'    => 'select',
        'choices' => $customer_support_font_array,
    ));

    $wp_customize->add_setting('customer_support_heading_font_size',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('customer_support_heading_font_size',array(
        'label' => esc_html__('Heading Font Size','customer-support'),
        'section' => 'customer_support_global_color_settings',
        'setting' => 'customer_support_heading_font_size',
        'type'  => 'text'
    ));

    // Paragraph Typography
    $wp_customize->add_setting( 'customer_support_paragraph_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'customer_support_paragraph_color', array(
        'label' => __('Paragraph Color', 'customer-support'),
        'section' => 'customer_support_global_color_settings',
        'settings' => 'customer_support_paragraph_color',
    )));

    $wp_customize->add_setting('customer_support_paragraph_font_family', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'customer_support_sanitize_choices',
    ));
    $wp_customize->add_control( 'customer_support_paragraph_font_family', array(
        'section' => 'customer_support_global_color_settings',
        'label'   => __('Paragraph Fonts', 'customer-support'),
        'type'    => 'select',
        'choices' => $customer_support_font_array,
    ));

    $wp_customize->add_setting('customer_support_paragraph_font_size',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('customer_support_paragraph_font_size',array(
        'label' => esc_html__('Paragraph Font Size','customer-support'),
        'section' => 'customer_support_global_color_settings',
        'setting' => 'customer_support_paragraph_font_size',
        'type'  => 'text'
    ));

    // Post Layouts Settings
     $wp_customize->add_section('customer_support_post_layouts_settings',array(
        'title' => esc_html__('Post Layouts Settings','customer-support'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('customer_support_post_layout',array(
        'default' => 'pattern_two_column_right',
        'sanitize_callback' => 'customer_support_sanitize_choices'
    ));
    $wp_customize->add_control(new Customer_Support_Image_Radio_Control($wp_customize, 'customer_support_post_layout', array(
        'type' => 'select',
        'label' => __('Blog Post Layouts','customer-support'),
        'section' => 'customer_support_post_layouts_settings',
        'choices' => array(
            'pattern_one_column' => esc_url(get_template_directory_uri()).'/assets/img/1column.png',
            'pattern_two_column_right' => esc_url(get_template_directory_uri()).'/assets/img/right-sidebar.png',
            'pattern_two_column_left' => esc_url(get_template_directory_uri()).'/assets/img/left-sidebar.png',
            'pattern_three_column' => esc_url(get_template_directory_uri()).'/assets/img/3column.png',
            'pattern_four_column' => esc_url(get_template_directory_uri()).'/assets/img/4column.png',
            'pattern_grid_post' => esc_url(get_template_directory_uri()).'/assets/img/grid.png',
    ))
    ));

    // General Settings
     $wp_customize->add_section('customer_support_general_settings',array(
        'title' => esc_html__('General Settings','customer-support'),
        'priority'   => 30,
    ));

     $wp_customize->add_setting('customer_support_width_option',array(
        'default' => 'Full Width',
        'transport' => 'refresh',
        'sanitize_callback' => 'customer_support_sanitize_choices'
    ));
    $wp_customize->add_control('customer_support_width_option',array(
        'type' => 'select',
        'section' => 'customer_support_general_settings',
        'choices' => array(
            'Full Width' => __('Full Width','customer-support'),
            'Wide Width' => __('Wide Width','customer-support'),
            'Boxed Width' => __('Boxed Width','customer-support')
        ),
    ) );

    $wp_customize->add_setting('customer_support_nav_menu_text_transform',array(
        'default'=> 'Capitalize',
        'sanitize_callback' => 'customer_support_sanitize_choices'
    ));
    $wp_customize->add_control('customer_support_nav_menu_text_transform',array(
        'type' => 'radio',
        'choices' => array(
            'Uppercase' => __('Uppercase','customer-support'),
            'Capitalize' => __('Capitalize','customer-support'),
            'Lowercase' => __('Lowercase','customer-support'),
        ),
        'section'=> 'customer_support_general_settings',
    ));

    $wp_customize->add_setting('customer_support_preloader_hide', array(
        'default' => 0,
        'sanitize_callback' => 'customer_support_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'customer_support_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'customer-support' ),
        'section'        => 'customer_support_general_settings',
        'settings'       => 'customer_support_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'customer_support_preloader_bg_color', array(
        'default' => '#2777FC',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'customer_support_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','customer-support'),
        'section' => 'customer_support_general_settings',
        'settings' => 'customer_support_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'customer_support_preloader_dot_1_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'customer_support_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','customer-support'),
        'section' => 'customer_support_general_settings',
        'settings' => 'customer_support_preloader_dot_1_color'
    )));

    $wp_customize->add_setting( 'customer_support_preloader_dot_2_color', array(
        'default' => '#222222',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'customer_support_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','customer-support'),
        'section' => 'customer_support_general_settings',
        'settings' => 'customer_support_preloader_dot_2_color'
    )));

    $wp_customize->add_setting('customer_support_scroll_hide', array(
        'default' => true,
        'sanitize_callback' => 'customer_support_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'customer_support_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'customer-support' ),
        'section'        => 'customer_support_general_settings',
        'settings'       => 'customer_support_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('customer_support_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'customer_support_sanitize_choices'
    ));
    $wp_customize->add_control('customer_support_scroll_top_position',array(
        'type' => 'radio',
        'section' => 'customer_support_general_settings',
        'choices' => array(
            'Right' => __('Right','customer-support'),
            'Left' => __('Left','customer-support'),
            'Center' => __('Center','customer-support')
        ),
    ) );

    $wp_customize->add_setting( 'customer_support_scroll_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'customer_support_scroll_bg_color', array(
        'label' => esc_html__('Scroll Top Background Color','customer-support'),
        'section' => 'customer_support_general_settings',
        'settings' => 'customer_support_scroll_bg_color'
    )));

    $wp_customize->add_setting( 'customer_support_scroll_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'customer_support_scroll_color', array(
        'label' => esc_html__('Scroll Top Color','customer-support'),
        'section' => 'customer_support_general_settings',
        'settings' => 'customer_support_scroll_color'
    )));

    $wp_customize->add_setting('customer_support_scroll_font_size',array(
        'default'   => 16,
        'sanitize_callback' => 'customer_support_sanitize_number_absint'
    ));
    $wp_customize->add_control('customer_support_scroll_font_size',array(
        'label' => __('Scroll Top Font Size','customer-support'),
        'description' => __('Put in px','customer-support'),
        'section'   => 'customer_support_general_settings',
        'type'      => 'number'
    ));

    $wp_customize->add_setting('customer_support_scroll_border_radius',array(
        'default'   => 0,
        'sanitize_callback' => 'absint'
    ));
    $wp_customize->add_control('customer_support_scroll_border_radius',array(
        'label' => __('Scroll Top Border Radius','customer-support'),
        'description' => __('Put in %','customer-support'),
        'section'   => 'customer_support_general_settings',
        'type'      => 'number'
    ));

    // Product Columns
    $wp_customize->add_setting( 'customer_support_products_per_row' , array(
       'default'           => '3',
       'transport'         => 'refresh',
       'sanitize_callback' => 'customer_support_sanitize_select',
    ) );

    $wp_customize->add_control('customer_support_products_per_row', array(
       'label' => __( 'Product per row', 'customer-support' ),
       'section'  => 'customer_support_general_settings',
       'type'     => 'select',
       'choices'  => array(
           '2' => '2',
           '3' => '3',
           '4' => '4',
       ),
    ) );

    $wp_customize->add_setting('customer_support_product_per_page',array(
        'default'   => 9,
        'sanitize_callback' => 'customer_support_sanitize_number_absint'
    ));
    $wp_customize->add_control('customer_support_product_per_page',array(
        'label' => __('Product per page','customer-support'),
        'section'   => 'customer_support_general_settings',
        'type'      => 'number'
    ));

    // Product Columns
    $wp_customize->add_setting('custom_related_products_number_per_row',array(
        'default'           => 3,
        'transport'         => 'refresh',
        'sanitize_callback' => 'customer_support_sanitize_number_range',
    ));

    $wp_customize->add_control('custom_related_products_number_per_row',array(
        'label'       => esc_html__('Related Products Column Count', 'customer-support'),
        'section'     => 'customer_support_general_settings',
        'type'        => 'number',
        'input_attrs' => array(
            'step' => 1,
            'min'  => 1,
            'max'  => 4,
        ),
    ));

    // Product Columns
    $wp_customize->add_setting('custom_related_products_number',array(
        'default'           => 3,
        'transport'         => 'refresh',
        'sanitize_callback' => 'customer_support_sanitize_number_range',
    ));

    $wp_customize->add_control('custom_related_products_number',array(
        'label'       => esc_html__('Number of Related Products Per Page', 'customer-support'),
        'section'     => 'customer_support_general_settings',
        'type'        => 'number',
        'input_attrs' => array(
            'step' => 1,
            'min'  => 1,
            'max'  => 10,
        ),
    ));

    $wp_customize->add_setting('customer_support_related_product_display_setting', array(
        'default' => true,
        'sanitize_callback' => 'customer_support_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'customer_support_related_product_display_setting',array(
        'label'          => __( 'Show Related Products', 'customer-support' ),
        'section'        => 'customer_support_general_settings',
        'settings'       => 'customer_support_related_product_display_setting',
        'type'           => 'checkbox',
    )));

    //Woocommerce shop page Sidebar
    $wp_customize->add_setting('customer_support_woocommerce_shop_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'customer_support_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'customer_support_woocommerce_shop_page_sidebar',array(
        'label'          => __( 'Hide Shop Page Sidebar', 'customer-support' ),
        'section'        => 'customer_support_general_settings',
        'settings'       => 'customer_support_woocommerce_shop_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('customer_support_shop_page_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'customer_support_sanitize_choices'
    ));
    $wp_customize->add_control('customer_support_shop_page_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Shop Page Sidebar','customer-support'),
        'section' => 'customer_support_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','customer-support'),
            'Right Sidebar' => __('Right Sidebar','customer-support'),
        ),
    ) );

    //Woocommerce Single Product page Sidebar
    $wp_customize->add_setting('customer_support_woocommerce_single_product_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'customer_support_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'customer_support_woocommerce_single_product_page_sidebar',array(
        'label'          => __( 'Hide Single Product Page Sidebar', 'customer-support' ),
        'section'        => 'customer_support_general_settings',
        'settings'       => 'customer_support_woocommerce_single_product_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('customer_support_single_product_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'customer_support_sanitize_choices'
    ));
    $wp_customize->add_control('customer_support_single_product_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Single Product Page Sidebar','customer-support'),
        'section' => 'customer_support_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','customer-support'),
            'Right Sidebar' => __('Right Sidebar','customer-support'),
        ),
    ) );

    // Top Bar
    $wp_customize->add_section( 'customer_support_topbar', array(
        'title'    => esc_html__( 'Top Bar', 'customer-support' ),
        'priority' => 9,
    ) );

    $wp_customize->add_setting( 'customer_support_topbar_setting', array(
        'default'           => true,
        'sanitize_callback' => 'customer_support_sanitize_checkbox',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'customer_support_topbar_setting', array(
        'label'    => __( 'Enable Top Bar', 'customer-support' ),
        'section'  => 'customer_support_topbar',
        'settings' => 'customer_support_topbar_setting',
        'type'     => 'checkbox',
    ) ) );

    $wp_customize->add_setting( 'customer_support_topbar_location', array(
        'default'           => __( 'US - Los Angeles', 'customer-support' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'customer_support_topbar_location', array(
        'label'   => esc_html__( 'Location Text', 'customer-support' ),
        'section' => 'customer_support_topbar',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'customer_support_topbar_email', array(
        'default'           => 'info@example.com',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'customer_support_topbar_email', array(
        'label'   => esc_html__( 'Email Address', 'customer-support' ),
        'section' => 'customer_support_topbar',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'customer_support_topbar_phone', array(
        'default'           => '00123 456 789',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'customer_support_topbar_phone', array(
        'label'   => esc_html__( 'Phone Number', 'customer-support' ),
        'section' => 'customer_support_topbar',
        'type'    => 'text',
    ) );

    $customer_support_topbar_socials = array(
        'facebook'  => __( 'Facebook URL', 'customer-support' ),
        'twitter'   => __( 'Twitter / X URL', 'customer-support' ),
        'instagram' => __( 'Instagram URL', 'customer-support' ),
        'linkedin'  => __( 'LinkedIn URL', 'customer-support' ),
        'youtube'   => __( 'YouTube URL', 'customer-support' ),
    );
    foreach ( $customer_support_topbar_socials as $customer_support_social_key => $customer_support_social_label ) {
        $wp_customize->add_setting( 'customer_support_topbar_' . $customer_support_social_key, array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'customer_support_topbar_' . $customer_support_social_key, array(
            'label'   => $customer_support_social_label,
            'section' => 'customer_support_topbar',
            'type'    => 'url',
        ) );
    }
    unset( $customer_support_topbar_socials, $customer_support_social_key, $customer_support_social_label );

    //Header
    $wp_customize->add_section('customer_support_header',array(
        'title' => esc_html__('Header Option','customer-support'),
        'priority' => 10,
    ));

    $wp_customize->add_setting( 'customer_support_header_btn_text', array(
        'default'           => __( 'Get Support', 'customer-support' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'customer_support_header_btn_text', array(
        'label'   => esc_html__( 'Header Button Text', 'customer-support' ),
        'section' => 'customer_support_header',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'customer_support_header_btn_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'customer_support_header_btn_url', array(
        'label'   => esc_html__( 'Header Button URL', 'customer-support' ),
        'section' => 'customer_support_header',
        'type'    => 'url',
    ) );

    $wp_customize->add_setting( 'customer_support_header_show_search', array(
        'default'           => true,
        'sanitize_callback' => 'customer_support_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'customer_support_header_show_search', array(
        'label'   => esc_html__( 'Show Search Icon', 'customer-support' ),
        'section' => 'customer_support_header',
        'type'    => 'checkbox',
    ) );

    // Hero / Slider Section
    $wp_customize->add_section( 'customer_support_top_slider', array(
        'title'       => esc_html__( 'Banner Settings', 'customer-support' ),
        'description' => esc_html__( 'Controls the hero section with left content and the right appointment form. Select a page to pull the heading, description, and featured image. You can also upload a custom hero image below.', 'customer-support' ),
        'priority' => 10,
    ) );

    $wp_customize->add_setting('customer_support_top_slider_setting', array(
        'default' => false,
        'sanitize_callback' => 'customer_support_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'customer_support_top_slider_setting',array(
        'label'          => __( 'Enable Disable Banner', 'customer-support' ),
        'section'        => 'customer_support_top_slider',
        'settings'       => 'customer_support_top_slider_setting',
        'type'           => 'checkbox',
    )));

    // Slider section background image
    $wp_customize->add_setting( 'customer_support_slider_bg_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'customer_support_slider_bg_image', array(
        'label'   => __( 'Slider Background Image', 'customer-support' ),
        'section' => 'customer_support_top_slider',
    ) ) );

    $wp_customize->add_setting( 'customer_support_banner_heading', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'customer_support_banner_heading', array(
        'label'       => __( 'Main Heading', 'customer-support' ),
        'section'     => 'customer_support_top_slider',
        'type'        => 'text',
    ) );


    $wp_customize->add_setting( 'customer_support_banner_content', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'customer_support_banner_content', array(
        'label'       => __( 'Banner Content', 'customer-support' ),
        'section'     => 'customer_support_top_slider',
        'type'        => 'text',
    ) );

    // Hero CTA button
    $wp_customize->add_setting( 'customer_support_slider_button_text_2', array(
        'default'           => __( 'Contact Support', 'customer-support' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'customer_support_slider_button_text_2', array(
        'label'   => __( 'Contact Support Button Text', 'customer-support' ),
        'section' => 'customer_support_top_slider',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'customer_support_slider_button_text_2_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'customer_support_slider_button_text_2_url', array(
        'label'   => esc_html__( 'Contact Support Button URL', 'customer-support' ),
        'section' => 'customer_support_top_slider',
        'type'    => 'url',
    ) );

    // Customer stats number
    $wp_customize->add_setting( 'customer_support_banner_stats_number', array(
        'default'           => '2025+K',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'customer_support_banner_stats_number', array(
        'label'   => __( 'Customer Stats Number', 'customer-support' ),
        'section' => 'customer_support_top_slider',
        'type'    => 'text',
    ) );

    // Customer stats label
    $wp_customize->add_setting( 'customer_support_banner_stats_label', array(
        'default'           => __( 'Happy Customer', 'customer-support' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'customer_support_banner_stats_label', array(
        'label'   => __( 'Customer Stats Label', 'customer-support' ),
        'section' => 'customer_support_top_slider',
        'type'    => 'text',
    ) );

    // Happy customer avatar images (stacked circles under the stats badge)
    $wp_customize->add_setting( 'customer_support_banner_stats_avatar_1', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'customer_support_banner_stats_avatar_1', array(
        'label'   => __( 'Happy Customer Avatar 1', 'customer-support' ),
        'section' => 'customer_support_top_slider',
    ) ) );

    $wp_customize->add_setting( 'customer_support_banner_stats_avatar_2', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'customer_support_banner_stats_avatar_2', array(
        'label'   => __( 'Happy Customer Avatar 2', 'customer-support' ),
        'section' => 'customer_support_top_slider',
    ) ) );

    $wp_customize->add_setting( 'customer_support_banner_stats_avatar_3', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'customer_support_banner_stats_avatar_3', array(
        'label'   => __( 'Happy Customer Avatar 3', 'customer-support' ),
        'section' => 'customer_support_top_slider',
    ) ) );

    $wp_customize->add_setting( 'customer_support_banner_stats_avatar_4', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'customer_support_banner_stats_avatar_4', array(
        'label'   => __( 'Happy Customer Avatar 4', 'customer-support' ),
        'section' => 'customer_support_top_slider',
    ) ) );

    // Hero support-request form card
    $wp_customize->add_setting( 'customer_support_hero_form_setting', array(
        'default'           => true,
        'sanitize_callback' => 'customer_support_sanitize_checkbox',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'customer_support_hero_form_setting', array(
        'label'    => __( 'Enable Support Request Form', 'customer-support' ),
        'section'  => 'customer_support_top_slider',
        'settings' => 'customer_support_hero_form_setting',
        'type'     => 'checkbox',
    ) ) );

    $wp_customize->add_setting( 'customer_support_hero_form_heading', array(
        'default'           => __( 'Whether You Need On Site Support', 'customer-support' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'customer_support_hero_form_heading', array(
        'label'   => __( 'Form Heading', 'customer-support' ),
        'section' => 'customer_support_top_slider',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'customer_support_hero_form_subheading', array(
        'default'           => __( 'Lorem ipsum dolor sit amit.', 'customer-support' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'customer_support_hero_form_subheading', array(
        'label'   => __( 'Form Subheading', 'customer-support' ),
        'section' => 'customer_support_top_slider',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'customer_support_hero_form_shortcode', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'customer_support_hero_form_shortcode', array(
        'label'       => __( 'Form Shortcode', 'customer-support' ),
        'description' => __( 'Paste a shortcode from your form plugin (e.g. Contact Form 7). Leave blank to show a static placeholder form.', 'customer-support' ),
        'section'     => 'customer_support_top_slider',
        'type'        => 'textarea',
    ) );

    // Services Section
    $wp_customize->add_section( 'customer_support_services_section', array(
        'title'    => esc_html__( 'Services Section', 'customer-support' ),
        'priority' => 10,
    ) );

    $wp_customize->add_setting( 'customer_support_services_section_setting', array(
        'default'           => false,
        'sanitize_callback' => 'customer_support_sanitize_checkbox',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'customer_support_services_section_setting', array(
        'label'    => __( 'Enable Services Section', 'customer-support' ),
        'section'  => 'customer_support_services_section',
        'settings' => 'customer_support_services_section_setting',
        'type'     => 'checkbox',
    ) ) );

    $wp_customize->add_setting( 'customer_support_services_section_badge', array(
        'default'           => __( 'What We Do', 'customer-support' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'customer_support_services_section_badge', array(
        'label'   => __( 'Section Eyebrow Badge', 'customer-support' ),
        'section' => 'customer_support_services_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'customer_support_services_section_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'customer_support_services_section_title', array(
        'label'   => __( 'Section Title', 'customer-support' ),
        'section' => 'customer_support_services_section',
        'type'    => 'text',
    ) );

    // Service cards 1-3
    $customer_support_feat_icon_defaults = array(
        1 => 'fab fa-whatsapp',
        2 => 'fas fa-wrench',
        3 => 'fas fa-headset',
    );
    for ( $customer_support_feat_i = 1; $customer_support_feat_i <= 3; $customer_support_feat_i++ ) {

        $wp_customize->add_setting( 'customer_support_feature_' . $customer_support_feat_i . '_icon', array(
            'default'           => $customer_support_feat_icon_defaults[ $customer_support_feat_i ],
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'customer_support_feature_' . $customer_support_feat_i . '_icon', array(
            'label'       => sprintf( __( 'Service %d Icon (Font Awesome class)', 'customer-support' ), $customer_support_feat_i ),
            'description' => __( 'Used only when no image is set below, e.g. "fas fa-headset".', 'customer-support' ),
            'section'     => 'customer_support_services_section',
            'type'        => 'text',
        ) );

        $wp_customize->add_setting( 'customer_support_feature_' . $customer_support_feat_i . '_title', array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'customer_support_feature_' . $customer_support_feat_i . '_title', array(
            'label'   => sprintf( __( 'Service %d Title', 'customer-support' ), $customer_support_feat_i ),
            'section' => 'customer_support_services_section',
            'type'    => 'text',
        ) );

        $wp_customize->add_setting( 'customer_support_feature_' . $customer_support_feat_i . '_desc', array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'customer_support_feature_' . $customer_support_feat_i . '_desc', array(
            'label'   => sprintf( __( 'Service %d Description', 'customer-support' ), $customer_support_feat_i ),
            'section' => 'customer_support_services_section',
            'type'    => 'text',
        ) );

        $wp_customize->add_setting( 'customer_support_feature_' . $customer_support_feat_i . '_url', array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'customer_support_feature_' . $customer_support_feat_i . '_url', array(
            'label'   => sprintf( __( 'Service %d Link URL', 'customer-support' ), $customer_support_feat_i ),
            'section' => 'customer_support_services_section',
            'type'    => 'url',
        ) );

        $wp_customize->add_setting( 'customer_support_feature_' . $customer_support_feat_i . '_image', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'customer_support_feature_' . $customer_support_feat_i . '_image', array(
            'label'   => sprintf( __( 'Service %d Image', 'customer-support' ), $customer_support_feat_i ),
            'section' => 'customer_support_services_section',
        ) ) );

    }
    unset( $customer_support_feat_i, $customer_support_feat_icon_defaults );

    // Post Settings
     $wp_customize->add_section('customer_support_post_settings',array(
        'title' => esc_html__('Post Settings','customer-support'),
        'priority'   =>40,
    ));

    $wp_customize->add_setting('customer_support_post_page_title',array(
        'sanitize_callback' => 'customer_support_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('customer_support_post_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Title', 'customer-support'),
        'section'     => 'customer_support_post_settings',
        'description' => esc_html__('Check this box to enable title on post page.', 'customer-support'),
    ));

    $wp_customize->add_setting('customer_support_post_page_meta',array(
        'sanitize_callback' => 'customer_support_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('customer_support_post_page_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Meta', 'customer-support'),
        'section'     => 'customer_support_post_settings',
        'description' => esc_html__('Check this box to enable meta on post page.', 'customer-support'),
    ));

    $wp_customize->add_setting('customer_support_post_page_thumb',array(
        'sanitize_callback' => 'customer_support_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('customer_support_post_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Thumbnail', 'customer-support'),
        'section'     => 'customer_support_post_settings',
        'description' => esc_html__('Check this box to enable thumbnail on post page.', 'customer-support'),
    ));

    $wp_customize->add_setting('customer_support_post_page_content',array(
        'sanitize_callback' => 'customer_support_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('customer_support_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Content', 'customer-support'),
        'section'     => 'customer_support_post_settings',
        'description' => esc_html__('Check this box to enable content on post page.', 'customer-support'),
    ));

    $wp_customize->add_setting('customer_support_post_page_excerpt_length',array(
        'sanitize_callback' => 'customer_support_sanitize_number_range',
        'default'           => 30,
    ));
    $wp_customize->add_control('customer_support_post_page_excerpt_length',array(
        'label'       => esc_html__('Post Page Excerpt Length', 'customer-support'),
        'section'     => 'customer_support_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ));

    $wp_customize->add_setting('customer_support_post_page_excerpt_suffix',array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '[...]',
    ));
    $wp_customize->add_control('customer_support_post_page_excerpt_suffix',array(
        'type'        => 'text',
        'label'       => esc_html__('Post Page Excerpt Suffix', 'customer-support'),
        'section'     => 'customer_support_post_settings',
        'description' => esc_html__('For Ex. [...], etc', 'customer-support'),
    ));

    $wp_customize->add_setting('customer_support_post_page_pagination',array(
        'sanitize_callback' => 'customer_support_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('customer_support_post_page_pagination',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Pagination', 'customer-support'),
        'section'     => 'customer_support_post_settings',
        'description' => esc_html__('Check this box to enable pagination on post page.', 'customer-support'),
    ));

    $wp_customize->add_setting('customer_support_single_post_page_content',array(
        'sanitize_callback' => 'customer_support_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('customer_support_single_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Page Content', 'customer-support'),
        'section'     => 'customer_support_post_settings',
        'description' => esc_html__('Check this box to enable content on single post page.', 'customer-support'),
    ));
    
    // Footer
    $wp_customize->add_section('customer_support_site_footer_section', array(
        'title' => esc_html__('Footer', 'customer-support'),
    ));

    $wp_customize->add_setting('customer_support_footer_widget_content_alignment',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'customer_support_sanitize_choices'
    ));
    $wp_customize->add_control('customer_support_footer_widget_content_alignment',array(
        'type' => 'select',
        'label' => __('Footer Widget Content Alignment','customer-support'),
        'section' => 'customer_support_site_footer_section',
        'choices' => array(
            'Left' => __('Left','customer-support'),
            'Center' => __('Center','customer-support'),
            'Right' => __('Right','customer-support')
        ),
    ) );

    $wp_customize->add_setting('customer_support_show_hide_copyright',array(
        'default' => true,
        'sanitize_callback' => 'customer_support_sanitize_checkbox'
    ));
    $wp_customize->add_control('customer_support_show_hide_copyright',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Copyright','customer-support'),
        'section' => 'customer_support_site_footer_section',
    ));

    $wp_customize->add_setting('customer_support_footer_text_setting', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('customer_support_footer_text_setting', array(
        'label' => __('Replace the footer text', 'customer-support'),
        'section' => 'customer_support_site_footer_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('customer_support_copyright_content_alignment',array(
        'default' => 'Center',
        'transport' => 'refresh',
        'sanitize_callback' => 'customer_support_sanitize_choices'
    ));
    $wp_customize->add_control('customer_support_copyright_content_alignment',array(
        'type' => 'select',
        'label' => __('Copyright Content Alignment','customer-support'),
        'section' => 'customer_support_site_footer_section',
        'choices' => array(
            'Left' => __('Left','customer-support'),
            'Center' => __('Center','customer-support'),
            'Right' => __('Right','customer-support')
        ),
    ) );
}
add_action('customize_register', 'customer_support_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function customer_support_customize_partial_blogname(){
    echo esc_html( get_bloginfo( 'name' ) );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function customer_support_customize_partial_blogdescription(){
    echo esc_html( get_bloginfo( 'description' ) );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function customer_support_customize_preview_js(){
    wp_enqueue_script('customer-support-customizer', esc_url( get_template_directory_uri() . '/assets/js/customizer.js' ), array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'customer_support_customize_preview_js');

/*
** Load dynamic logic for the customizer controls area.
*/
function customer_support_panels_js() {
    wp_enqueue_style( 'customer-support-customizer-layout-css', esc_url( get_theme_file_uri( '/assets/css/customizer-layout.css' ) ) );
    wp_enqueue_script( 'customer-support-customize-layout', esc_url( get_theme_file_uri( '/assets/js/customize-layout.js' ) ), array(), '1.2', true );
}
add_action( 'customize_controls_enqueue_scripts', 'customer_support_panels_js' );