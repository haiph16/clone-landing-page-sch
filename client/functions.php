<?php
/**
 * Soonchunhyang Tailwind Theme Functions
 *
 * @package Soonchunhyang
 */

if (!defined('ABSPATH')) {
    exit;
}

// 1. Theme Setup
function sch_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 260,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

    register_nav_menus(array(
        'primary' => 'Menu Điều Hướng Chính',
        'footer'  => 'Menu Chân Trang'
    ));
}
add_action('after_setup_theme', 'sch_theme_setup');

// 2. Enqueue Styles & Scripts
function sch_enqueue_scripts() {
    // Google Fonts: Plus Jakarta Sans
    wp_enqueue_style(
        'sch-fonts',
        'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap',
        array(),
        null
    );

    // Font Awesome 6
    wp_enqueue_style(
        'sch-font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
        array(),
        '6.5.1'
    );

    // Tailwind CSS Compiled
    $tailwind_css = get_template_directory_uri() . '/assets/css/tailwind.css';
    $tailwind_file = get_template_directory() . '/assets/css/tailwind.css';
    $version = file_exists($tailwind_file) ? filemtime($tailwind_file) : '1.0.0';

    wp_enqueue_style('sch-tailwind', $tailwind_css, array(), $version);
    wp_enqueue_style('sch-style', get_stylesheet_uri(), array('sch-tailwind'), $version);

    // Main JavaScript
    $main_js = get_template_directory_uri() . '/assets/js/main.js';
    $main_file = get_template_directory() . '/assets/js/main.js';
    $js_version = file_exists($main_file) ? filemtime($main_file) : '1.0.0';

    wp_enqueue_script('sch-main-js', $main_js, array(), $js_version, true);

    // Localize Script for AJAX Consultation Submission
    wp_localize_script('sch-main-js', 'sch_ajax_obj', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('sch_consultation_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'sch_enqueue_scripts');

// 3. Include Components
require_once get_template_directory() . '/inc/theme-options.php';
require_once get_template_directory() . '/inc/custom-post-types.php';
require_once get_template_directory() . '/inc/ajax-handlers.php';
