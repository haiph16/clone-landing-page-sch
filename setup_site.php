<?php
/**
 * Automated Installer and Initializer for Soonchunhyang WordPress Site
 */

define('WP_INSTALLING', true);

require_once __DIR__ . '/wp-load.php';
require_once ABSPATH . 'wp-admin/includes/upgrade.php';
require_once ABSPATH . 'wp-admin/includes/image.php';

echo "WordPress loaded successfully.\n";

// 1. Install WordPress if not already installed
if (!is_blog_installed()) {
    echo "Installing WordPress database tables...\n";
    $result = wp_install(
        'Đại Học Soonchunhyang Việt Nam', // Site title
        'admin',                           // Admin username
        'haiph161299@gmail.com',            // Admin email
        true,                              // Public
        '',                                // Deprecated
        'admin123',                        // Admin password
        'vi'                               // Language
    );
    echo "WordPress installation result: " . print_r($result, true) . "\n";
} else {
    echo "WordPress is already installed.\n";
}

// 2. Switch to Soonchunhyang Tailwind Theme
switch_theme('soonchunhyang-tailwind');
echo "Theme active: " . wp_get_theme()->get('Name') . "\n";

// 3. Set front page to static or default
update_option('show_on_front', 'posts');

// 4. Populate Default Theme Options if empty
$options = get_option('sch_theme_options', array());
if (empty($options)) {
    $default_options = array(
        'vn_name' => 'VĂN PHÒNG TUYỂN SINH TRƯỜNG ĐẠI HỌC SOONCHUNHYANG TẠI VIỆT NAM',
        'vn_subtitle' => 'Đại diện tuyển sinh chính thức tại Hà Nội',
        'vn_hotline' => '096 841 45 86',
        'vn_phone' => '096 841 45 86',
        'vn_email' => 'haiph161299@gmail.com',
        'vn_currentAddress' => 'BT7,8,9 Lô BT3, đường Foresa 5A, KĐT sinh thái Xuân Phương, phường Xuân Phương, TP. Hà Nội',
        'vn_oldAddress' => 'Số 66-68 Ngõ 28/11 Dương Khuê, Phường Phú Diễn, TP. Hà Nội',
        'vn_workingHours' => 'Thứ Hai - Thứ Bảy: 08:00 - 17:30 (Chủ nhật nghỉ)',
        'vn_zalo' => 'https://zalo.me/0327366093',
        'vn_mapEmbedUrl' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.896796593922!2d105.73663047587042!3d21.036814987501306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b5dfd4f8fb%3A0x6b4be93e9ad15f21!2zS8SQVCBYdcOibiBQaMawxqFuZw!5e0!3m2!1svi!2svn!4v1710000000000',
        'kr_name' => 'SOON CHUN HYANG UNIVERSITY (순천향대학교)',
        'kr_address' => '22-9 Soonchunhyang-ro, Sinchang-myeon, Asan-si, Chungcheongnam-do, Republic of Korea',
        'kr_addressKorean' => '충청남도 아산시 신창면 순천향로 22-9',
        'kr_phone' => '+82-41-530-1303',
        'kr_email' => 'yecha@sch.ac.kr',
        'kr_website' => 'https://www.sch.ac.kr',
    );
    update_option('sch_theme_options', $default_options);
    echo "Default theme options initialized.\n";
}

echo "Setup completed successfully!\n";
