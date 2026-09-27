<?php
/**
 * Theme Options & Contact Information Settings
 *
 * @package Soonchunhyang
 */

if (!defined('ABSPATH')) {
    exit;
}

function sch_get_option($key, $default = '') {
    $options = get_option('sch_theme_options', array());
    if (isset($options[$key]) && $options[$key] !== '') {
        return $options[$key];
    }

    $defaults = array(
        'vn_name'           => 'VĂN PHÒNG TUYỂN SINH TRƯỜNG ĐẠI HỌC SOONCHUNHYANG TẠI VIỆT NAM',
        'vn_subtitle'       => 'Đại diện tuyển sinh chính thức tại Hà Nội',
        'vn_hotline'        => '096 841 45 86',
        'vn_phone'          => '096 841 45 86',
        'vn_email'          => 'Tuannv2312@gmail.com',
        'vn_currentAddress' => 'BT7,8,9 Lô BT3, đường Foresa 5A, KĐT sinh thái Xuân Phương, phường Xuân Phương, TP. Hà Nội',
        'vn_oldAddress'     => 'Số 66-68 Ngõ 28/11 Dương Khuê, Phường Phú Diễn, TP. Hà Nội',
        'vn_workingHours'   => 'Thứ Hai - Thứ Bảy: 08:00 - 17:30 (Chủ nhật nghỉ)',
        'vn_zalo'           => 'https://zalo.me/0968414586',
        'vn_facebook'       => 'https://facebook.com/soonchunhyang.edu.vn',
        'vn_youtube'        => 'https://youtube.com',
        'vn_mapEmbedUrl'    => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.896796593922!2d105.73663047587042!3d21.036814987501306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b5dfd4f8fb%3A0x6b4be93e9ad15f21!2zS8SQVCBYdcOibiBQaMawxqFuZw!5e0!3m2!1svi!2svn!4v1710000000000',
        
        'kr_name'           => 'SOON CHUN HYANG UNIVERSITY (순천향대학교)',
        'kr_address'        => '22-9 Soonchunhyang-ro, Sinchang-myeon, Asan-si, Chungcheongnam-do, Republic of Korea',
        'kr_addressKorean'  => '충청남도 아산시 신창면 순천향로 22-9',
        'kr_phone'          => '+82-41-530-1303',
        'kr_email'          => 'yecha@sch.ac.kr',
        'kr_website'        => 'https://www.sch.ac.kr',
    );

    return isset($defaults[$key]) ? $defaults[$key] : $default;
}

// Add Admin Menu
function sch_add_admin_menu() {
    add_menu_page(
        'Quản Trị SCH',
        'Cài Đặt SCH',
        'manage_options',
        'sch-settings',
        'sch_render_settings_page',
        'dashicons-welcome-learn-more',
        25
    );
}
add_action('admin_menu', 'sch_add_admin_menu');

// Register Settings
function sch_register_settings() {
    register_setting('sch_theme_options_group', 'sch_theme_options');
}
add_action('admin_init', 'sch_register_settings');

// Render Settings Page
function sch_render_settings_page() {
    ?>
    <div class="wrap">
        <h1>Quản Lý Thông Tin Liên Hệ &amp; Thiết Lập Website (SCH Vietnam)</h1>
        <?php settings_errors(); ?>

        <form method="post" action="options.php">
            <?php
            settings_fields('sch_theme_options_group');
            $options = get_option('sch_theme_options', array());
            ?>

            <h2 class="title" style="margin-top: 24px;">1. Văn Phòng Tuyển Sinh Tại Việt Nam (Hà Nội)</h2>
            <table class="form-table" role="presentation">
                <tr>
                    <th scope="row"><label for="vn_name">Tên Văn Phòng</label></th>
                    <td>
                        <input name="sch_theme_options[vn_name]" type="text" id="vn_name" value="<?php echo esc_attr(sch_get_option('vn_name')); ?>" class="regular-text" style="width: 100%; max-width: 600px;" />
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="vn_currentAddress">Địa Chỉ Mới (Hiện Tại)</label></th>
                    <td>
                        <input name="sch_theme_options[vn_currentAddress]" type="text" id="vn_currentAddress" value="<?php echo esc_attr(sch_get_option('vn_currentAddress')); ?>" class="regular-text" style="width: 100%; max-width: 600px;" />
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="vn_oldAddress">Địa Chỉ Cũ (Ghi chú)</label></th>
                    <td>
                        <input name="sch_theme_options[vn_oldAddress]" type="text" id="vn_oldAddress" value="<?php echo esc_attr(sch_get_option('vn_oldAddress')); ?>" class="regular-text" style="width: 100%; max-width: 600px;" />
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="vn_hotline">Số Hotline Tư Vấn</label></th>
                    <td>
                        <input name="sch_theme_options[vn_hotline]" type="text" id="vn_hotline" value="<?php echo esc_attr(sch_get_option('vn_hotline')); ?>" class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="vn_email">Email Liên Hệ</label></th>
                    <td>
                        <input name="sch_theme_options[vn_email]" type="email" id="vn_email" value="<?php echo esc_attr(sch_get_option('vn_email')); ?>" class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="vn_workingHours">Giờ Làm Việc</label></th>
                    <td>
                        <input name="sch_theme_options[vn_workingHours]" type="text" id="vn_workingHours" value="<?php echo esc_attr(sch_get_option('vn_workingHours')); ?>" class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="vn_zalo">Đường Dẫn Zalo (https://zalo.me/...)</label></th>
                    <td>
                        <input name="sch_theme_options[vn_zalo]" type="url" id="vn_zalo" value="<?php echo esc_attr(sch_get_option('vn_zalo')); ?>" class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="vn_mapEmbedUrl">Link Nhúng Google Maps</label></th>
                    <td>
                        <textarea name="sch_theme_options[vn_mapEmbedUrl]" id="vn_mapEmbedUrl" rows="3" class="large-text"><?php echo esc_textarea(sch_get_option('vn_mapEmbedUrl')); ?></textarea>
                    </td>
                </tr>
            </table>

            <h2 class="title" style="margin-top: 32px;">2. Trụ Sở Chính Tại Hàn Quốc (Soonchunhyang University)</h2>
            <table class="form-table" role="presentation">
                <tr>
                    <th scope="row"><label for="kr_name">Tên Trường</label></th>
                    <td>
                        <input name="sch_theme_options[kr_name]" type="text" id="kr_name" value="<?php echo esc_attr(sch_get_option('kr_name')); ?>" class="regular-text" style="width: 100%; max-width: 600px;" />
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="kr_address">Địa Chỉ Tiếng Anh</label></th>
                    <td>
                        <input name="sch_theme_options[kr_address]" type="text" id="kr_address" value="<?php echo esc_attr(sch_get_option('kr_address')); ?>" class="regular-text" style="width: 100%; max-width: 600px;" />
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="kr_addressKorean">Địa Chỉ Tiếng Hàn</label></th>
                    <td>
                        <input name="sch_theme_options[kr_addressKorean]" type="text" id="kr_addressKorean" value="<?php echo esc_attr(sch_get_option('kr_addressKorean')); ?>" class="regular-text" style="width: 100%; max-width: 600px;" />
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="kr_phone">Điện Thoại Quốc Tế</label></th>
                    <td>
                        <input name="sch_theme_options[kr_phone]" type="text" id="kr_phone" value="<?php echo esc_attr(sch_get_option('kr_phone')); ?>" class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="kr_email">Email Tuyển Sinh Quốc Tế</label></th>
                    <td>
                        <input name="sch_theme_options[kr_email]" type="email" id="kr_email" value="<?php echo esc_attr(sch_get_option('kr_email')); ?>" class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="kr_website">Website Chính Thức</label></th>
                    <td>
                        <input name="sch_theme_options[kr_website]" type="url" id="kr_website" value="<?php echo esc_attr(sch_get_option('kr_website')); ?>" class="regular-text" />
                    </td>
                </tr>
            </table>

            <?php submit_button('Lưu Thay Đổi'); ?>
        </form>
    </div>
    <?php
}
