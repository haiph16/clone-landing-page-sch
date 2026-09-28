<?php
/**
 * Register Custom Post Types: Banners, Gallery & Consultation Leads
 *
 * @package Soonchunhyang
 */

if (!defined('ABSPATH')) {
    exit;
}

// 1. Register Banners CPT
function sch_register_banner_cpt() {
    $labels = array(
        'name'               => 'Banners Slider',
        'singular_name'      => 'Banner',
        'add_new'            => 'Thêm Banner Mới',
        'add_new_item'       => 'Thêm Banner Slider Mới',
        'edit_item'          => 'Chỉnh Sửa Banner',
        'new_item'           => 'Banner Mới',
        'view_item'          => 'Xem Banner',
        'search_items'       => 'Tìm Banner',
        'not_found'          => 'Chưa có banner nào',
        'menu_name'          => 'Banners Slider'
    );

    $args = array(
        'labels'              => $labels,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-images-alt2',
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'supports'            => array('title', 'thumbnail', 'page-attributes'),
        'has_archive'         => false
    );

    register_post_type('sch_banner', $args);
}
add_action('init', 'sch_register_banner_cpt');

// Banner Meta Boxes
function sch_add_banner_meta_boxes() {
    add_meta_box('sch_banner_details', 'Chi Tiết Banner Slider', 'sch_render_banner_meta_box', 'sch_banner', 'normal', 'high');
}
add_action('add_meta_boxes', 'sch_add_banner_meta_boxes');

function sch_render_banner_meta_box($post) {
    wp_nonce_field('sch_save_banner_meta', 'sch_banner_meta_nonce');
    $subtitle     = get_post_meta($post->ID, '_sch_banner_subtitle', true);
    $badge        = get_post_meta($post->ID, '_sch_banner_badge', true);
    $btn1_text    = get_post_meta($post->ID, '_sch_banner_btn1_text', true);
    $btn1_link    = get_post_meta($post->ID, '_sch_banner_btn1_link', true);
    $btn2_text    = get_post_meta($post->ID, '_sch_banner_btn2_text', true);
    $btn2_link    = get_post_meta($post->ID, '_sch_banner_btn2_link', true);
    ?>
    <p>
        <label for="sch_banner_badge"><strong>Huy hiệu nhỏ (Badge phía trên tiêu đề):</strong></label><br>
        <input type="text" id="sch_banner_badge" name="sch_banner_badge" value="<?php echo esc_attr($badge); ?>" class="large-text" placeholder="Ví dụ: GÓI HỖ TRỢ 100 TỶ WON" />
    </p>
    <p>
        <label for="sch_banner_subtitle"><strong>Mô tả ngắn / Phụ đề:</strong></label><br>
        <textarea id="sch_banner_subtitle" name="sch_banner_subtitle" rows="3" class="large-text"><?php echo esc_textarea($subtitle); ?></textarea>
    </p>
    <div style="display: flex; gap: 20px;">
        <div style="flex: 1;">
            <label for="sch_banner_btn1_text"><strong>Tên Nút Chính (CTA 1):</strong></label><br>
            <input type="text" id="sch_banner_btn1_text" name="sch_banner_btn1_text" value="<?php echo esc_attr($btn1_text ? $btn1_text : 'ĐĂNG KÝ TƯ VẤN'); ?>" class="large-text" />
        </div>
        <div style="flex: 1;">
            <label for="sch_banner_btn1_link"><strong>Liên Kết Nút Chính:</strong></label><br>
            <input type="text" id="sch_banner_btn1_link" name="sch_banner_btn1_link" value="<?php echo esc_attr($btn1_link ? $btn1_link : '#dang-ky'); ?>" class="large-text" />
        </div>
    </div>
    <div style="display: flex; gap: 20px; margin-top: 15px;">
        <div style="flex: 1;">
            <label for="sch_banner_btn2_text"><strong>Tên Nút Phụ (CTA 2):</strong></label><br>
            <input type="text" id="sch_banner_btn2_text" name="sch_banner_btn2_text" value="<?php echo esc_attr($btn2_text ? $btn2_text : 'TÌM HIỂU THÊM'); ?>" class="large-text" />
        </div>
        <div style="flex: 1;">
            <label for="sch_banner_btn2_link"><strong>Liên Kết Nút Phụ:</strong></label><br>
            <input type="text" id="sch_banner_btn2_link" name="sch_banner_btn2_link" value="<?php echo esc_attr($btn2_link ? $btn2_link : '#gioi-thieu'); ?>" class="large-text" />
        </div>
    </div>
    <?php
}

function sch_save_banner_meta($post_id) {
    if (!isset($_POST['sch_banner_meta_nonce']) || !wp_verify_nonce($_POST['sch_banner_meta_nonce'], 'sch_save_banner_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['sch_banner_badge'])) update_post_meta($post_id, '_sch_banner_badge', sanitize_text_field($_POST['sch_banner_badge']));
    if (isset($_POST['sch_banner_subtitle'])) update_post_meta($post_id, '_sch_banner_subtitle', sanitize_textarea_field($_POST['sch_banner_subtitle']));
    if (isset($_POST['sch_banner_btn1_text'])) update_post_meta($post_id, '_sch_banner_btn1_text', sanitize_text_field($_POST['sch_banner_btn1_text']));
    if (isset($_POST['sch_banner_btn1_link'])) update_post_meta($post_id, '_sch_banner_btn1_link', sanitize_text_field($_POST['sch_banner_btn1_link']));
    if (isset($_POST['sch_banner_btn2_text'])) update_post_meta($post_id, '_sch_banner_btn2_text', sanitize_text_field($_POST['sch_banner_btn2_text']));
    if (isset($_POST['sch_banner_btn2_link'])) update_post_meta($post_id, '_sch_banner_btn2_link', sanitize_text_field($_POST['sch_banner_btn2_link']));
}
add_action('save_post_sch_banner', 'sch_save_banner_meta');


// 2. Register Gallery CPT
function sch_register_gallery_cpt() {
    $labels = array(
        'name'               => 'Thư Viện Ảnh',
        'singular_name'      => 'Hình Ảnh',
        'add_new'            => 'Thêm Ảnh Mới',
        'add_new_item'       => 'Thêm Ảnh Mới Vào Thư Viện',
        'edit_item'          => 'Sửa Ảnh',
        'new_item'           => 'Ảnh Mới',
        'view_item'          => 'Xem Ảnh',
        'search_items'       => 'Tìm Ảnh',
        'not_found'          => 'Chưa có ảnh nào',
        'menu_name'          => 'Thư Viện Ảnh'
    );

    $args = array(
        'labels'              => $labels,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-format-gallery',
        'supports'            => array('title', 'thumbnail'),
        'has_archive'         => false
    );

    register_post_type('sch_gallery', $args);

    // Register Category Taxonomy for Gallery
    register_taxonomy('sch_gallery_cat', 'sch_gallery', array(
        'labels' => array(
            'name' => 'Danh Mục Hình Ảnh',
            'singular_name' => 'Danh Mục',
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
    ));
}
add_action('init', 'sch_register_gallery_cpt');


// 3. Register Consultation Leads CPT
function sch_register_lead_cpt() {
    $labels = array(
        'name'               => 'Đăng Ký Tư Vấn',
        'singular_name'      => 'Hồ Sơ Tư Vấn',
        'add_new'            => 'Thêm Hồ Sơ',
        'add_new_item'       => 'Hồ Sơ Mới',
        'edit_item'          => 'Chi Tiết Hồ Sơ',
        'view_item'          => 'Xem Hồ Sơ',
        'search_items'       => 'Tìm Học Sinh',
        'not_found'          => 'Chưa có hồ sơ tư vấn nào',
        'menu_name'          => 'Đăng Ký Tư Vấn'
    );

    $args = array(
        'labels'              => $labels,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-id-alt',
        'supports'            => array('title'),
        'has_archive'         => false
    );

    register_post_type('sch_lead', $args);
}
add_action('init', 'sch_register_lead_cpt');

// Lead Meta Boxes
function sch_add_lead_meta_boxes() {
    add_meta_box('sch_lead_details', 'Thông Tin Học Sinh Đăng Ký', 'sch_render_lead_meta_box', 'sch_lead', 'normal', 'high');
}
add_action('add_meta_boxes', 'sch_add_lead_meta_boxes');

function sch_render_lead_meta_box($post) {
    wp_nonce_field('sch_save_lead_meta', 'sch_lead_meta_nonce');
    $phone      = get_post_meta($post->ID, '_sch_lead_phone', true);
    $email      = get_post_meta($post->ID, '_sch_lead_email', true);
    $province   = get_post_meta($post->ID, '_sch_lead_province', true);
    $major      = get_post_meta($post->ID, '_sch_lead_major', true);
    $notes      = get_post_meta($post->ID, '_sch_lead_notes', true);
    $status     = get_post_meta($post->ID, '_sch_lead_status', true);
    $adminNotes = get_post_meta($post->ID, '_sch_lead_admin_notes', true);

    if (!$status) $status = 'new';
    ?>
    <table class="form-table">
        <tr>
            <th><label>Họ và Tên:</label></th>
            <td><strong><?php echo esc_html($post->post_title); ?></strong></td>
        </tr>
        <tr>
            <th><label>Số Điện Thoại:</label></th>
            <td><a href="tel:<?php echo esc_attr($phone); ?>" style="font-size: 16px; font-weight: bold; color: #00489f;"><?php echo esc_html($phone); ?></a></td>
        </tr>
        <tr>
            <th><label>Email:</label></th>
            <td><?php echo esc_html($email ? $email : '—'); ?></td>
        </tr>
        <tr>
            <th><label>Tỉnh / Thành Phố:</label></th>
            <td><?php echo esc_html($province ? $province : '—'); ?></td>
        </tr>
        <tr>
            <th><label>Ngành Học / Hệ Đào Tạo:</label></th>
            <td><strong><?php echo esc_html($major); ?></strong></td>
        </tr>
        <tr>
            <th><label>Lời Nhắn Của Học Sinh:</label></th>
            <td><em><?php echo nl2br(esc_html($notes ? $notes : 'Không có')); ?></em></td>
        </tr>
        <tr>
            <th><label for="sch_lead_status">Trạng Thái Xử Lý:</label></th>
            <td>
                <select name="sch_lead_status" id="sch_lead_status">
                    <option value="new" <?php selected($status, 'new'); ?>>Mới tiếp nhận (Chưa gọi)</option>
                    <option value="contacted" <?php selected($status, 'contacted'); ?>>Đang tư vấn / Đã gọi điện</option>
                    <option value="enrolled" <?php selected($status, 'enrolled'); ?>>Đã nộp hồ sơ / Đã nhập học</option>
                    <option value="cancelled" <?php selected($status, 'cancelled'); ?>>Hủy tư vấn</option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="sch_lead_admin_notes">Ghi Chú Của Tư Vấn Viên:</label></th>
            <td>
                <textarea name="sch_lead_admin_notes" id="sch_lead_admin_notes" rows="4" class="large-text"><?php echo esc_textarea($adminNotes); ?></textarea>
            </td>
        </tr>
    </table>
    <?php
}

function sch_save_lead_meta($post_id) {
    if (!isset($_POST['sch_lead_meta_nonce']) || !wp_verify_nonce($_POST['sch_lead_meta_nonce'], 'sch_save_lead_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['sch_lead_status'])) update_post_meta($post_id, '_sch_lead_status', sanitize_text_field($_POST['sch_lead_status']));
    if (isset($_POST['sch_lead_admin_notes'])) update_post_meta($post_id, '_sch_lead_admin_notes', sanitize_textarea_field($_POST['sch_lead_admin_notes']));
}
add_action('save_post_sch_lead', 'sch_save_lead_meta');

// Custom Columns for Leads in WP Admin
function sch_set_lead_columns($columns) {
    $new_columns = array(
        'cb'        => '<input type="checkbox" />',
        'title'     => 'Họ và Tên',
        'phone'     => 'Số Điện Thoại',
        'province'  => 'Tỉnh Thành',
        'major'     => 'Ngành Học Quan Tâm',
        'status'    => 'Trạng Thái',
        'date'      => 'Thời Gian Gửi'
    );
    return $new_columns;
}
add_filter('manage_sch_lead_posts_columns', 'sch_set_lead_columns');

function sch_custom_lead_column($column, $post_id) {
    switch ($column) {
        case 'phone':
            $phone = get_post_meta($post_id, '_sch_lead_phone', true);
            echo '<a href="tel:' . esc_attr($phone) . '"><strong>' . esc_html($phone) . '</strong></a>';
            break;
        case 'province':
            echo esc_html(get_post_meta($post_id, '_sch_lead_province', true));
            break;
        case 'major':
            echo esc_html(get_post_meta($post_id, '_sch_lead_major', true));
            break;
        case 'status':
            $status = get_post_meta($post_id, '_sch_lead_status', true);
            $map = array(
                'new'       => '<span style="color: #b45309; background: #fef3c7; padding: 3px 8px; border-radius: 9999px; font-weight: bold; font-size: 11px;">Mới nhận</span>',
                'contacted' => '<span style="color: #1e40af; background: #dbeafe; padding: 3px 8px; border-radius: 9999px; font-weight: bold; font-size: 11px;">Đang tư vấn</span>',
                'enrolled'  => '<span style="color: #065f46; background: #d1fae5; padding: 3px 8px; border-radius: 9999px; font-weight: bold; font-size: 11px;">Đã nhập học</span>',
                'cancelled' => '<span style="color: #475569; background: #f1f5f9; padding: 3px 8px; border-radius: 9999px; font-weight: bold; font-size: 11px;">Hủy</span>',
            );
            echo isset($map[$status]) ? $map[$status] : esc_html($status);
            break;
    }
}
add_action('manage_sch_lead_posts_custom_column', 'sch_custom_lead_column', 10, 2);


// =========================================================
// 4. Register News CPT (sch_news)
// =========================================================
function sch_register_news_cpt() {
    $labels = array(
        'name'          => 'Tin Tức & Thông Báo',
        'singular_name' => 'Bài Viết',
        'add_new'       => 'Thêm Bài Viết Mới',
        'add_new_item'  => 'Thêm Tin Tức Mới',
        'edit_item'     => 'Chỉnh Sửa Bài Viết',
        'view_item'     => 'Xem Bài Viết',
        'search_items'  => 'Tìm Bài Viết',
        'not_found'     => 'Chưa có bài viết nào',
        'menu_name'     => 'Tin Tức',
    );

    $args = array(
        'labels'          => $labels,
        'public'          => false,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'menu_icon'       => 'dashicons-megaphone',
        'capability_type' => 'post',
        'supports'        => array('title', 'thumbnail'),
        'has_archive'     => false,
        'menu_position'   => 6,
    );

    register_post_type('sch_news', $args);

    // Category taxonomy for news
    register_taxonomy('sch_news_cat', 'sch_news', array(
        'labels'            => array(
            'name'          => 'Danh Mục Tin Tức',
            'singular_name' => 'Danh Mục',
            'add_new_item'  => 'Thêm Danh Mục',
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
    ));
}
add_action('init', 'sch_register_news_cpt');

// News Meta Boxes
function sch_add_news_meta_boxes() {
    add_meta_box('sch_news_details', 'Chi Tiết Bài Viết', 'sch_render_news_meta_box', 'sch_news', 'normal', 'high');
}
add_action('add_meta_boxes', 'sch_add_news_meta_boxes');

function sch_render_news_meta_box($post) {
    wp_nonce_field('sch_save_news_meta', 'sch_news_meta_nonce');
    $author  = get_post_meta($post->ID, '_sch_news_author', true);
    $summary = get_post_meta($post->ID, '_sch_news_summary', true);
    $content = get_post_meta($post->ID, '_sch_news_content', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="sch_news_author">Tác Giả / Nguồn</label></th>
            <td><input type="text" id="sch_news_author" name="sch_news_author"
                       value="<?php echo esc_attr($author); ?>" class="regular-text"
                       placeholder="Ví dụ: Ban Truyền thông SCH" /></td>
        </tr>
        <tr>
            <th><label for="sch_news_summary">Tóm Tắt (Hiển thị trên thẻ bài viết)</label></th>
            <td><textarea id="sch_news_summary" name="sch_news_summary" rows="3" class="large-text"><?php echo esc_textarea($summary); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="sch_news_content">Nội Dung Đầy Đủ</label></th>
            <td><textarea id="sch_news_content" name="sch_news_content" rows="8" class="large-text"><?php echo esc_textarea($content); ?></textarea></td>
        </tr>
    </table>
    <p class="description" style="padding:0 10px 10px;">💡 Ảnh đại diện bài viết: Thiết lập tại <strong>Ảnh Đại Diện</strong> (Featured Image) ở cột phải.</p>
    <?php
}

function sch_save_news_meta($post_id) {
    if (!isset($_POST['sch_news_meta_nonce']) || !wp_verify_nonce($_POST['sch_news_meta_nonce'], 'sch_save_news_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['sch_news_author']))  update_post_meta($post_id, '_sch_news_author',  sanitize_text_field($_POST['sch_news_author']));
    if (isset($_POST['sch_news_summary'])) update_post_meta($post_id, '_sch_news_summary', sanitize_textarea_field($_POST['sch_news_summary']));
    if (isset($_POST['sch_news_content'])) update_post_meta($post_id, '_sch_news_content', sanitize_textarea_field($_POST['sch_news_content']));
}
add_action('save_post_sch_news', 'sch_save_news_meta');

// Custom Columns for News in WP Admin
function sch_set_news_columns($columns) {
    return array(
        'cb'       => '<input type="checkbox" />',
        'title'    => 'Tiêu Đề',
        'thumb'    => 'Ảnh',
        'author'   => 'Tác Giả',
        'taxonomy-sch_news_cat' => 'Danh Mục',
        'date'     => 'Ngày Đăng',
    );
}
add_filter('manage_sch_news_posts_columns', 'sch_set_news_columns');

function sch_custom_news_column($column, $post_id) {
    if ($column === 'thumb') {
        $thumb = get_the_post_thumbnail($post_id, array(60, 40));
        echo $thumb ? $thumb : '—';
    }
    if ($column === 'author') {
        echo esc_html(get_post_meta($post_id, '_sch_news_author', true) ?: '—');
    }
}
add_action('manage_sch_news_posts_custom_column', 'sch_custom_news_column', 10, 2);
