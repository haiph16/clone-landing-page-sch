<?php
/**
 * Seed initial Banners, Gallery items, and sample Lead in WordPress
 */

require_once __DIR__ . '/wp-load.php';

echo "Seeding initial WordPress data...\n";

// Helper to attach an existing image in theme assets as post thumbnail
function sch_attach_existing_theme_image($post_id, $relative_theme_path, $title = '') {
    $theme_dir = get_template_directory();
    $file_path = $theme_dir . '/' . ltrim($relative_theme_path, '/');
    if (!file_exists($file_path)) {
        return 0;
    }

    $upload_dir = wp_upload_dir();
    $filename = basename($file_path);
    $target_path = $upload_dir['path'] . '/' . $filename;

    if (!file_exists($target_path)) {
        copy($file_path, $target_path);
    }

    $attachment = array(
        'post_mime_type' => mime_content_type($target_path),
        'post_title'     => sanitize_text_field($title ? $title : $filename),
        'post_content'   => '',
        'post_status'    => 'inherit'
    );

    $attach_id = wp_insert_attachment($attachment, $target_path, $post_id);
    require_once ABSPATH . 'wp-admin/includes/image.php';
    $attach_data = wp_generate_attachment_metadata($attach_id, $target_path);
    wp_update_attachment_metadata($attach_id, $attach_data);
    set_post_thumbnail($post_id, $attach_id);

    return $attach_id;
}

// 1. Seed Banners
$existing_banners = get_posts(array('post_type' => 'sch_banner', 'posts_per_page' => 1));
if (empty($existing_banners)) {
    echo "Creating initial banners...\n";
    $banners = array(
        array(
            'title'     => 'Đại Học Soonchunhyang: Bệ Phóng Cho Thế Hệ Nhân Lực Số',
            'badge'     => 'GÓI HỖ TRỢ 100 TỶ WON TỪ CHÍNH PHỦ HÀN QUỐC',
            'subtitle'  => 'Trường đại học xuất sắc dẫn đầu vùng duyên hải phía Tây Hàn Quốc, tiên phong đào tạo Công nghệ thông tin, Trí tuệ nhân tạo và Y sinh lâm sàng.',
            'image'     => 'assets/images/banner-1.webp',
            'btn1_text' => 'ĐĂNG KÝ TƯ VẤN NGAY',
            'btn1_link' => '#dang-ky',
            'btn2_text' => 'TÌM HIỂU THÊM',
            'btn2_link' => '#gioi-thieu',
            'order'     => 1
        ),
        array(
            'title'     => 'Top 5 Trường Đại Học Hàng Đầu Hàn Quốc & Top 100 Thế Giới',
            'badge'     => 'CHỨNG NHẬN GIẢI THƯỞNG SÁNG TẠO GIÁO DỤC QUỐC GIA',
            'subtitle'  => 'Xếp hạng theo THE Impact Rankings. Sở hữu 4 bệnh viện đại học hiện đại bậc nhất và mạng lưới đối tác công nghệ toàn cầu tại Seoul và Asan.',
            'image'     => 'assets/images/banner-2.webp',
            'btn1_text' => 'XEM CHƯƠNG TRÌNH HỌC',
            'btn1_link' => '#tuyen-sinh',
            'btn2_text' => 'ƯU THẾ SCH',
            'btn2_link' => '#uu-the',
            'order'     => 2
        ),
        array(
            'title'     => 'Môi Trường Sống & Học Tập Chuẩn Quốc Tế Cho Sinh Viên Việt Nam',
            'badge'     => 'TỶ LỆ XÉT DUYỆT VISA ĐẠT 90% • KTX 4000 CHỖ',
            'subtitle'  => 'Chính sách visa ưu tiên, miễn phỏng vấn cho hệ Đại học, cam kết hỗ trợ việc làm thêm và chuyển tiếp visa kỹ sư E-7 sau khi tốt nghiệp.',
            'image'     => 'assets/images/banner-3.webp',
            'btn1_text' => 'CHÍNH SÁCH VIỆC LÀM',
            'btn1_link' => '#viec-lam',
            'btn2_text' => 'LIÊN HỆ VĂN PHÒNG VN',
            'btn2_link' => '#lien-he',
            'order'     => 3
        )
    );

    foreach ($banners as $b) {
        $banner_id = wp_insert_post(array(
            'post_title'   => $b['title'],
            'post_type'    => 'sch_banner',
            'post_status'  => 'publish',
            'menu_order'   => $b['order']
        ));

        update_post_meta($banner_id, '_sch_banner_badge', $b['badge']);
        update_post_meta($banner_id, '_sch_banner_subtitle', $b['subtitle']);
        update_post_meta($banner_id, '_sch_banner_btn1_text', $b['btn1_text']);
        update_post_meta($banner_id, '_sch_banner_btn1_link', $b['btn1_link']);
        update_post_meta($banner_id, '_sch_banner_btn2_text', $b['btn2_text']);
        update_post_meta($banner_id, '_sch_banner_btn2_link', $b['btn2_link']);

        sch_attach_existing_theme_image($banner_id, $b['image'], $b['title']);
    }
    echo "3 Banners created successfully.\n";
}

// 2. Seed Gallery Items
$existing_gallery = get_posts(array('post_type' => 'sch_gallery', 'posts_per_page' => 1));
if (empty($existing_gallery)) {
    echo "Creating initial gallery items...\n";
    $gallery_data = array(
        array('title' => 'Toàn cảnh khuôn viên Đại học Soonchunhyang hiện đại', 'cat' => 'campus', 'image' => 'assets/images/banner-1.webp'),
        array('title' => 'Giảng đường trung tâm & khu phức hợp công nghệ HyFlex', 'cat' => 'campus', 'image' => 'assets/images/banner-2.webp'),
        array('title' => 'Khuôn viên xanh rợp bóng cây tại thành phố Asan', 'cat' => 'campus', 'image' => 'assets/images/banner-3.webp'),
        array('title' => 'Ký túc xá tiện nghi sức chứa hơn 4.000 sinh viên', 'cat' => 'dormitory', 'image' => 'assets/images/admissions-side.jpg'),
        array('title' => 'Trung tâm Hỗ trợ Việc làm University Job Plus', 'cat' => 'activities', 'image' => 'assets/images/news-job-support.png'),
        array('title' => 'Văn phòng đại diện tuyển sinh chính thức SCH tại Hà Nội', 'cat' => 'campus', 'image' => 'assets/images/news-office.jpg'),
        array('title' => 'Lễ khai giảng và chào đón tân sinh viên quốc tế', 'cat' => 'activities', 'image' => 'assets/images/news-opening-2024.png'),
        array('title' => 'Hội nghị hợp tác khoa học quốc tế SCH', 'cat' => 'activities', 'image' => 'assets/images/news-scientists.png'),
    );

    foreach ($gallery_data as $g) {
        $g_id = wp_insert_post(array(
            'post_title'   => $g['title'],
            'post_type'    => 'sch_gallery',
            'post_status'  => 'publish'
        ));

        // Assign taxonomy term
        wp_set_object_terms($g_id, $g['cat'], 'sch_gallery_cat');
        sch_attach_existing_theme_image($g_id, $g['image'], $g['title']);
    }
    echo "8 Gallery items created successfully.\n";
}

// 3. Seed Sample Consultation Lead
$existing_leads = get_posts(array('post_type' => 'sch_lead', 'posts_per_page' => 1));
if (empty($existing_leads)) {
    echo "Creating sample consultation lead...\n";
    $lead_id = wp_insert_post(array(
        'post_title'   => 'Nguyễn Minh Quân',
        'post_type'    => 'sch_lead',
        'post_status'  => 'publish',
        'post_content' => 'Em đã tốt nghiệp THPT GPA 8.2, đã có bằng TOPIK 3. Em muốn được tư vấn nộp học bổng ngành Trí Tuệ Nhân Tạo (AI) kỳ nhập học tháng 9/2026.'
    ));

    update_post_meta($lead_id, '_sch_lead_phone', '0912 345 678');
    update_post_meta($lead_id, '_sch_lead_email', 'quan.nguyen@gmail.com');
    update_post_meta($lead_id, '_sch_lead_province', 'Hà Nội');
    update_post_meta($lead_id, '_sch_lead_major', 'Khoa học AI & CNTT');
    update_post_meta($lead_id, '_sch_lead_status', 'new');
    update_post_meta($lead_id, '_sch_lead_admin_notes', 'Đã nhận hồ sơ, hẹn lịch gọi điện thoại trao đổi lúc 14:00.');
    echo "Sample consultation lead created.\n";
}

echo "All initial data seeded successfully!\n";
