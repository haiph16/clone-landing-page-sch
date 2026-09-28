<?php

    $customer_support_theme_css= "";

    /*--------------------------- Scroll to top positions -------------------*/

    $customer_support_scroll_position = get_theme_mod( 'customer_support_scroll_top_position','Right');
    if($customer_support_scroll_position == 'Right'){
        $customer_support_theme_css .='#button{';
            $customer_support_theme_css .='right: 20px;';
        $customer_support_theme_css .='}';
    }else if($customer_support_scroll_position == 'Left'){
        $customer_support_theme_css .='#button{';
            $customer_support_theme_css .='left: 20px;';
        $customer_support_theme_css .='}';
    }else if($customer_support_scroll_position == 'Center'){
        $customer_support_theme_css .='#button{';
            $customer_support_theme_css .='right: 50%;left: 50%;';
        $customer_support_theme_css .='}';
    }

    /*--------------------------- Footer Widget Heading Alignment -------------------*/

    $customer_support_footer_widget_heading_alignment = get_theme_mod( 'customer_support_footer_widget_heading_alignment','Left');
    if($customer_support_footer_widget_heading_alignment == 'Left'){
        $customer_support_theme_css .='#colophon h5, h5.footer-column-widget-title{';
        $customer_support_theme_css .='text-align: left;';
        $customer_support_theme_css .='}';
    }else if($customer_support_footer_widget_heading_alignment == 'Center'){
        $customer_support_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $customer_support_theme_css .='text-align: center;';
        $customer_support_theme_css .='}';
    }else if($customer_support_footer_widget_heading_alignment == 'Right'){
        $customer_support_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $customer_support_theme_css .='text-align: right;';
        $customer_support_theme_css .='}';
    }

    /*--------------------------- Footer Widget Content Alignment -------------------*/

    $customer_support_footer_widget_content_alignment = get_theme_mod( 'customer_support_footer_widget_content_alignment','Left');
    if($customer_support_footer_widget_content_alignment == 'Left'){
        $customer_support_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
        $customer_support_theme_css .='text-align: left;';
        $customer_support_theme_css .='}';
    }else if($customer_support_footer_widget_content_alignment == 'Center'){
        $customer_support_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $customer_support_theme_css .='text-align: center;';
        $customer_support_theme_css .='}';
    }else if($customer_support_footer_widget_content_alignment == 'Right'){
        $customer_support_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $customer_support_theme_css .='text-align: right;';
        $customer_support_theme_css .='}';
    }

    /*--------------------------- Copyright Content Alignment -------------------*/

    $customer_support_copyright_content_alignment = get_theme_mod( 'customer_support_copyright_content_alignment','Center');
    if($customer_support_copyright_content_alignment == 'Left'){
        $customer_support_theme_css .='.footer-menu-left{';
        $customer_support_theme_css .='text-align: left !important;';
        $customer_support_theme_css .='}';
    }else if($customer_support_copyright_content_alignment == 'Center'){
        $customer_support_theme_css .='.footer-menu-left{';
            $customer_support_theme_css .='text-align: center !important;';
        $customer_support_theme_css .='}';
    }else if($customer_support_copyright_content_alignment == 'Right'){
        $customer_support_theme_css .='.footer-menu-left{';
            $customer_support_theme_css .='text-align: right !important;';
        $customer_support_theme_css .='}';
    }

    /*---------------------------Width Layout -------------------*/

    $customer_support_width_option = get_theme_mod( 'customer_support_width_option','Full Width');
    if($customer_support_width_option == 'Boxed Width'){
        $customer_support_theme_css .='body{';
            $customer_support_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
        $customer_support_theme_css .='}';
        $customer_support_theme_css .='.scrollup i{';
            $customer_support_theme_css .='right: 100px;';
        $customer_support_theme_css .='}';
        $customer_support_theme_css .='.page-template-custom-home-page .home-page-header{';
            $customer_support_theme_css .='padding: 0px 40px 0 10px;';
        $customer_support_theme_css .='}';
    }else if($customer_support_width_option == 'Wide Width'){
        $customer_support_theme_css .='body{';
            $customer_support_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
        $customer_support_theme_css .='}';
        $customer_support_theme_css .='.scrollup i{';
            $customer_support_theme_css .='right: 30px;';
        $customer_support_theme_css .='}';
    }else if($customer_support_width_option == 'Full Width'){
        $customer_support_theme_css .='body{';
            $customer_support_theme_css .='max-width: 100%;';
        $customer_support_theme_css .='}';
    }

    /*------------------ Nav Menus -------------------*/

    $customer_support_nav_menu = get_theme_mod( 'customer_support_nav_menu_text_transform','Capitalize');
    if($customer_support_nav_menu == 'Capitalize'){
        $customer_support_theme_css .='.main-navigation .menu > li > a{';
            $customer_support_theme_css .='text-transform:Capitalize;';
        $customer_support_theme_css .='}';
    }
    if($customer_support_nav_menu == 'Lowercase'){
        $customer_support_theme_css .='.main-navigation .menu > li > a{';
            $customer_support_theme_css .='text-transform:Lowercase;';
        $customer_support_theme_css .='}';
    }
    if($customer_support_nav_menu == 'Uppercase'){
        $customer_support_theme_css .='.main-navigation .menu > li > a{';
            $customer_support_theme_css .='text-transform:Uppercase;';
        $customer_support_theme_css .='}';
    }

    /*-------------------- Global First Color -------------------*/

    $customer_support_first_color = get_theme_mod('customer_support_first_color');
    $customer_support_second_color = get_theme_mod('customer_support_second_color');

    if ($customer_support_first_color) {
        $customer_support_theme_css .= ':root {';
        $customer_support_theme_css .= '--first-color: ' . esc_attr($customer_support_first_color) . ' !important;';
        $customer_support_theme_css .= '} ';
    }
    
    if ($customer_support_second_color) {
        $customer_support_theme_css .= ':root {';
        $customer_support_theme_css .= '--second-color: ' . esc_attr($customer_support_second_color) . ' !important;';
        $customer_support_theme_css .= '} ';
    }

    /*-------------------- Heading typography -------------------*/

    $customer_support_heading_color = get_theme_mod('customer_support_heading_color');
    $customer_support_heading_font_family = get_theme_mod('customer_support_heading_font_family');
    $customer_support_heading_font_size = get_theme_mod('customer_support_heading_font_size');
    if($customer_support_heading_color != false || $customer_support_heading_font_family != false || $customer_support_heading_font_size != false){
        $customer_support_theme_css .='h1, h2, h3, h4, h5, h6, .navbar-brand h1.site-title, h2.entry-title, h1.entry-title, h2.page-title, #latest_post h2, h2.woocommerce-loop-product__title,.featured h3.main-heading, .article-box h3.entry-title, .featured h4.main-heading, #colophon h5, .sidebar h5{';
            $customer_support_theme_css .='color: '.esc_attr($customer_support_heading_color).'!important; 
            font-family: '.esc_attr($customer_support_heading_font_family).'!important;
            font-size: '.esc_attr($customer_support_heading_font_size).'px !important;';
        $customer_support_theme_css .='}';
    }

    $customer_support_paragraph_color = get_theme_mod('customer_support_paragraph_color');
    $customer_support_paragraph_font_family = get_theme_mod('customer_support_paragraph_font_family');
    $customer_support_paragraph_font_size = get_theme_mod('customer_support_paragraph_font_size');
    if($customer_support_paragraph_color != false || $customer_support_paragraph_font_family != false || $customer_support_paragraph_font_size != false){
        $customer_support_theme_css .='p, p.site-title, span, .article-box p, ul, li{';
            $customer_support_theme_css .='color: '.esc_attr($customer_support_paragraph_color).'!important; 
            font-family: '.esc_attr($customer_support_paragraph_font_family).'!important;
            font-size: '.esc_attr($customer_support_paragraph_font_size).'px !important;';
        $customer_support_theme_css .='}';
    }

    /*---------------- Logo CSS ----------------------*/
    $customer_support_logo_title_font_size = get_theme_mod( 'customer_support_logo_title_font_size');
    $customer_support_logo_tagline_font_size = get_theme_mod( 'customer_support_logo_tagline_font_size');
    if( $customer_support_logo_title_font_size != '') {
        $customer_support_theme_css .='#masthead .navbar-brand a{';
            $customer_support_theme_css .='font-size: '. absint( $customer_support_logo_title_font_size ). 'px;';
        $customer_support_theme_css .='}';
    }
    if( $customer_support_logo_tagline_font_size != '') {
        $customer_support_theme_css .='#masthead .navbar-brand p{';
            $customer_support_theme_css .='font-size: '. absint( $customer_support_logo_tagline_font_size ). 'px;';
        $customer_support_theme_css .='}';
    }