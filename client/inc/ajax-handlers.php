<?php
/**
 * AJAX Handlers for Consultation Registration
 *
 * @package Soonchunhyang
 */

if (!defined('ABSPATH')) {
    exit;
}

function sch_handle_submit_lead() {
    check_ajax_referer('sch_consultation_nonce', 'nonce');

    $full_name = isset($_POST['fullName']) ? sanitize_text_field($_POST['fullName']) : '';
    $phone     = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
    $email     = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $province  = isset($_POST['province']) ? sanitize_text_field($_POST['province']) : '';
    $major     = isset($_POST['major']) ? sanitize_text_field($_POST['major']) : '';
    $notes     = isset($_POST['notes']) ? sanitize_textarea_field($_POST['notes']) : '';

    if (empty($full_name) || empty($phone)) {
        wp_send_json_error(array('message' => 'Vui lòng điền đầy đủ Họ và tên cùng Số điện thoại liên hệ!'));
    }

    // Insert Lead Post
    $post_data = array(
        'post_title'   => $full_name,
        'post_type'    => 'sch_lead',
        'post_status'  => 'publish',
        'post_content' => $notes
    );

    $lead_id = wp_insert_post($post_data);

    if (is_wp_error($lead_id)) {
        wp_send_json_error(array('message' => 'Đã có lỗi xảy ra khi lưu thông tin. Vui lòng thử lại!'));
    }

    // Update Meta
    update_post_meta($lead_id, '_sch_lead_phone', $phone);
    update_post_meta($lead_id, '_sch_lead_email', $email);
    update_post_meta($lead_id, '_sch_lead_province', $province);
    update_post_meta($lead_id, '_sch_lead_major', $major);
    update_post_meta($lead_id, '_sch_lead_notes', $notes);
    update_post_meta($lead_id, '_sch_lead_status', 'new');

    wp_send_json_success(array(
        'message' => 'Đăng ký tư vấn thành công! Cán bộ Văn phòng tuyển sinh SCH sẽ liên hệ với bạn trong thời gian sớm nhất.'
    ));
}
add_action('wp_ajax_sch_submit_lead', 'sch_handle_submit_lead');
add_action('wp_ajax_nopriv_sch_submit_lead', 'sch_handle_submit_lead');
