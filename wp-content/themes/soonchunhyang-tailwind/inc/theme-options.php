<?php
/**
 * Theme Options & Content Management Settings
 * Quản lý toàn bộ nội dung website qua WordPress Admin
 *
 * @package Soonchunhyang
 */

if (!defined('ABSPATH')) {
    exit;
}

// =========================================================
// HELPER: Get option with default fallback
// =========================================================
function sch_get_option($key, $default = '')
{
    $options = get_option('sch_theme_options', array());
    if (isset($options[$key]) && $options[$key] !== '') {
        return $options[$key];
    }

    $defaults = array(
        // --- Thông tin liên hệ Vietnam ---
        'vn_name' => 'VĂN PHÒNG TUYỂN SINH TRƯỜNG ĐẠI HỌC SOONCHUNHYANG TẠI VIỆT NAM',
        'vn_subtitle' => 'Đại diện tuyển sinh chính thức tại Hà Nội',
        'vn_hotline' => '096 841 45 86',
        'vn_phone' => '096 841 45 86',
        'vn_email' => 'haiph161299@gmail.com',
        'vn_currentAddress' => 'BT7,8,9 Lô BT3, đường Foresa 5A, KĐT sinh thái Xuân Phương, phường Xuân Phương, TP. Hà Nội',
        'vn_oldAddress' => 'Số 66-68 Ngõ 28/11 Dương Khuê, Phường Phú Diễn, TP. Hà Nội',
        'vn_workingHours' => 'Thứ Hai - Thứ Bảy: 08:00 - 17:30 (Chủ nhật nghỉ)',
        'vn_zalo' => 'https://zalo.me/0327366093',
        'vn_facebook' => 'https://facebook.com/soonchunhyang.edu.vn',
        'vn_youtube' => 'https://youtube.com',
        'vn_mapEmbedUrl' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.896796593922!2d105.73663047587042!3d21.036814987501306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b5dfd4f8fb%3A0x6b4be93e9ad15f21!2zS8SQVCBYdcOibiBQaMawxqFuZw!5e0!3m2!1svi!2svn!4v1710000000000',

        // --- Thông tin trụ sở Hàn Quốc ---
        'kr_name' => 'SOON CHUN HYANG UNIVERSITY (순천향대학교)',
        'kr_address' => '22-9 Soonchunhyang-ro, Sinchang-myeon, Asan-si, Chungcheongnam-do, Republic of Korea',
        'kr_addressKorean' => '충청남도 아산시 신창면 순천향로 22-9',
        'kr_phone' => '+82-41-530-1303',
        'kr_email' => 'yecha@sch.ac.kr',
        'kr_website' => 'https://www.sch.ac.kr',

        // --- Stats Strip ---
        'stat1_value' => '90',
        'stat1_suffix' => '%',
        'stat1_label' => 'Tỷ Lệ Xét Đỗ Visa',
        'stat1_desc' => 'Top đầu Hàn Quốc, bảo lãnh uy tín',
        'stat1_icon' => 'fa-solid fa-passport',

        'stat2_prefix' => 'Top ',
        'stat2_value' => '5',
        'stat2_suffix' => '',
        'stat2_label' => 'Đại Học Toàn Quốc',
        'stat2_desc' => 'Bảng xếp hạng THE Impact Rankings',
        'stat2_icon' => 'fa-solid fa-trophy',

        'stat3_value' => '100',
        'stat3_suffix' => ' Tỷ Won',
        'stat3_label' => 'Gói Tài Trợ 5 Năm',
        'stat3_desc' => 'Dự án Đại học Toàn cầu chính phủ',
        'stat3_icon' => 'fa-solid fa-won-sign',

        'stat4_value' => '4000',
        'stat4_suffix' => '+',
        'stat4_label' => 'Chỗ Ở KTX Chuẩn 5 Sao',
        'stat4_desc' => '4 cụm ký túc xá rộng lớn, tiện nghi',
        'stat4_icon' => 'fa-solid fa-hotel',

        // --- Highlights (3 cards) ---
        'hl1_icon' => 'fa-solid fa-award',
        'hl1_badge' => 'VISA ƯU TIÊN TOP ĐẦU',
        'hl1_title' => '90% Sinh Viên Đỗ Visa',
        'hl1_desc' => 'Đại học Soonchunhyang là một trong những trường đại học có tỷ lệ xét duyệt Visa cao nhất tại Hàn Quốc. Sinh viên hệ D2-2 được hưởng chính sách miễn phỏng vấn tại Đại sứ quán.',

        'hl2_icon' => 'fa-solid fa-building-columns',
        'hl2_badge' => 'CƠ SỞ VẬT CHẤT 5 SAO',
        'hl2_title' => '4 Ký Túc Xá Lớn Hiện Đại',
        'hl2_desc' => 'Trường sở hữu 4 khu ký túc xá khang trang, sạch sẽ với sức chứa hơn 4.000 sinh viên. Trang bị đầy đủ phòng gym, phòng tự học 24/7, căng-tin đa dạng và an ninh tuyệt đối.',

        'hl3_icon' => 'fa-solid fa-users',
        'hl3_badge' => 'HỖ TRỢ TOÀN DIỆN',
        'hl3_title' => 'Kết Nối Du Học Sinh Quốc Tế',
        'hl3_desc' => 'Cầu nối giúp sinh viên quốc tế giao lưu, làm quen với văn hóa Hàn Quốc và nhận được sự hỗ trợ tận tình từ nhà trường về học tập, đời sống và định hướng việc làm sau tốt nghiệp.',

        // --- Testimonials (3) ---
        'tm1_name' => 'Nguyễn Thùy Giang',
        'tm1_role' => 'Sinh viên K59 Ngành Quản trị Kinh doanh',
        'tm1_text' => 'Khuôn viên trường rất xanh và trong lành. Thầy cô ở văn phòng quốc tế chăm sóc sinh viên Việt Nam chu đáo từ lúc đón tại sân bay Incheon đến khi nhận phòng ký túc xá.',
        'tm1_avatar' => '',

        'tm2_name' => 'Trần Đức Huy',
        'tm2_role' => 'Kỹ sư phần mềm tại Seoul (Cựu sinh viên K56 CNTT)',
        'tm2_text' => 'Nhờ học bổng 80% của SCH mà mình giảm bớt gánh nặng tài chính rất nhiều. Trường có trung tâm hỗ trợ việc làm kết nối trực tiếp với các tập đoàn công nghệ lớn tại Hàn.',
        'tm2_avatar' => '',

        'tm3_name' => 'Lê Hoàng Dũng',
        'tm3_role' => 'Du học sinh năm 3 Ngành Y sinh lâm sàng',
        'tm3_text' => 'Hệ thống bệnh viện trường quá hiện đại, sinh viên được trực tiếp quan sát và thực tập lâm sàng. Quyết định học tập tại Soonchunhyang là bước ngoặt lớn của cuộc đời mình.',
        'tm3_avatar' => '',

        // --- FAQs (5) ---
        'faq1_q' => 'Chưa biết tiếng Hàn có thể đăng ký du học trường Soonchunhyang được không?',
        'faq1_a' => 'Hoàn toàn được! Bạn có thể đăng ký khóa đào tạo tiếng Hàn hệ Visa D4-1 tại Viện Giáo dục Quốc tế của trường. Khóa học được thiết kế chuyên biệt từ sơ cấp đến nâng cao giúp học viên đạt TOPIK 3 - 4 chỉ sau 1 năm để chuyển tiếp thẳng lên hệ Đại học chính quy.',

        'faq2_q' => 'Trường có những chính sách học bổng nào cho du học sinh Việt Nam?',
        'faq2_a' => 'SCH dành riêng nhiều suất học bổng từ 30% đến 100% học phí kỳ đầu tiên cho sinh viên Việt Nam căn cứ trên chứng chỉ ngoại ngữ (TOPIK 3 trở lên hoặc IELTS từ 5.5). Từ kỳ thứ 2, sinh viên duy trì GPA xuất sắc sẽ tiếp tục nhận học bổng khuyến khích học tập của nhà trường.',

        'faq3_q' => 'Chi phí ký túc xá và sinh hoạt tại thành phố Asan thế nào so với Seoul?',
        'faq3_a' => 'Ký túc xá SCH có 4 tòa nhà hiện đại đầy đủ phòng gym, thư viện, nhà ăn với mức phí rất hợp lý (khoảng 800.000 - 1.200.000 KRW/kỳ 4 tháng). Chi phí sinh hoạt tại Asan chỉ bằng 50% - 60% so với khu vực trung tâm Seoul nhưng tàu điện ngầm tuyến số 1 kết nối thẳng tới Seoul chỉ mất khoảng 1 giờ.',

        'faq4_q' => 'Du học hệ D2-2 tại SCH có phải phỏng vấn tại Đại sứ quán không?',
        'faq4_a' => 'Đại học Soonchunhyang là trường thuộc diện ưu tiên cao của Bộ Giáo dục và Bộ Tư pháp Hàn Quốc. Do đó, học sinh nộp hồ sơ hệ Đại học chính quy D2-2 được hưởng đặc quyền MIỄN PHỎNG VẤN tại Đại sứ quán / Tổng Lãnh sự quán Hàn Quốc, thủ tục ra visa nhanh chóng và thuận lợi hơn rất nhiều.',

        'faq5_q' => 'Sau khi tốt nghiệp cử nhân tại SCH, cơ hội việc làm và định cư tại Hàn Quốc ra sao?',
        'faq5_a' => 'Trung tâm University Job Plus của trường hỗ trợ sinh viên đổi sang Visa tìm việc D-10 (thời hạn 2 năm), kết nối phỏng vấn với các đối tác doanh nghiệp lớn tại Hàn Quốc và hướng dẫn chuyển đổi lên Visa tay nghề cao E-7 hoặc Visa định cư thường trú F-2.',
    );

    return isset($defaults[$key]) ? $defaults[$key] : $default;
}

// =========================================================
// Helper: Get testimonial avatar (fallback to theme image)
// =========================================================
function sch_get_testimonial_avatar($n)
{
    $opts = get_option('sch_theme_options', array());
    $key = "tm{$n}_avatar";
    $map = array(
        1 => 'student-giang.jpg',
        2 => 'student-huy.jpg',
        3 => 'student-dung.jpg',
    );
    if (!empty($opts[$key])) {
        return esc_url($opts[$key]);
    }
    $fallback = isset($map[$n]) ? $map[$n] : 'student-giang.jpg';
    return esc_url(get_template_directory_uri() . '/assets/images/' . $fallback);
}

// =========================================================
// Admin Menu
// =========================================================
function sch_add_admin_menu()
{
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

function sch_register_settings()
{
    register_setting('sch_theme_options_group', 'sch_theme_options');
}
add_action('admin_init', 'sch_register_settings');

// =========================================================
// Admin Settings Page
// =========================================================
function sch_render_settings_page()
{
    $tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'contact';
    $tabs = array(
        'contact' => array('icon' => '📞', 'label' => 'Liên Hệ'),
        'stats' => array('icon' => '📊', 'label' => 'Số Liệu Thống Kê'),
        'highlights' => array('icon' => '⭐', 'label' => 'Ưu Thế Nổi Bật'),
        'testimonials' => array('icon' => '💬', 'label' => 'Cảm Nhận Sinh Viên'),
        'faqs' => array('icon' => '❓', 'label' => 'Câu Hỏi Thường Gặp'),
    );
    ?>
        <div class="wrap">
            <h1 style="display:flex;align-items:center;gap:10px;"><span>🎓</span> Quản Lý Toàn Bộ Nội Dung Website SCH Vietnam
            </h1>
            <?php settings_errors(); ?>

            <!-- Tab Nav -->
            <nav class="nav-tab-wrapper wp-clearfix" style="margin-top:20px;">
                <?php foreach ($tabs as $slug => $t): ?>
                        <a href="?page=sch-settings&tab=<?php echo $slug; ?>"
                            class="nav-tab <?php echo $tab === $slug ? 'nav-tab-active' : ''; ?>">
                            <?php echo $t['icon']; ?>                 <?php echo $t['label']; ?>
                        </a>
                <?php endforeach; ?>
            </nav>

            <form method="post" action="options.php" style="margin-top:24px;">
                <?php settings_fields('sch_theme_options_group'); ?>

                <?php if ($tab === 'contact'): ?>
                        <?php sch_render_tab_contact(); ?>

                <?php elseif ($tab === 'stats'): ?>
                        <?php sch_render_tab_stats(); ?>

                <?php elseif ($tab === 'highlights'): ?>
                        <?php sch_render_tab_highlights(); ?>

                <?php elseif ($tab === 'testimonials'): ?>
                        <?php sch_render_tab_testimonials(); ?>

                <?php elseif ($tab === 'faqs'): ?>
                        <?php sch_render_tab_faqs(); ?>
                <?php endif; ?>

                <?php submit_button('💾 Lưu Thay Đổi'); ?>
            </form>

            <!-- Quick links to CPTs -->
            <div style="margin-top:32px; padding:20px; background:#f0f4ff; border-left:4px solid #00489f; border-radius:6px;">
                <h3 style="margin:0 0 12px; color:#00489f;">⚡ Quản Lý Nội Dung Nâng Cao (Custom Post Types)</h3>
                <div style="display:flex;gap:12px;flex-wrap:wrap;">
                    <a href="<?php echo admin_url('edit.php?post_type=sch_banner'); ?>" class="button button-primary">🖼 Banners
                        Slider</a>
                    <a href="<?php echo admin_url('edit.php?post_type=sch_gallery'); ?>" class="button button-primary">🗃 Thư
                        Viện Ảnh</a>
                    <a href="<?php echo admin_url('edit.php?post_type=sch_news'); ?>" class="button button-primary">📰 Tin
                        Tức</a>
                    <a href="<?php echo admin_url('edit.php?post_type=sch_lead'); ?>" class="button button-secondary">📋 Đăng Ký
                        Tư Vấn</a>
                </div>
            </div>
        </div>
        <?php
}

// =========================================================
// TAB: Liên Hệ
// =========================================================
function sch_render_tab_contact()
{ ?>
        <h2 class="title">1. Văn Phòng Tuyển Sinh Tại Việt Nam (Hà Nội)</h2>
        <table class="form-table" role="presentation">
            <?php
            $vn_fields = array(
                'vn_name' => array('Tên Văn Phòng', 'text'),
                'vn_subtitle' => array('Phụ đề / Mô tả ngắn', 'text'),
                'vn_currentAddress' => array('Địa Chỉ Hiện Tại', 'text'),
                'vn_oldAddress' => array('Địa Chỉ Cũ (Ghi chú)', 'text'),
                'vn_hotline' => array('Số Hotline Tư Vấn', 'text'),
                'vn_phone' => array('Số Điện Thoại', 'text'),
                'vn_email' => array('Email Liên Hệ', 'email'),
                'vn_workingHours' => array('Giờ Làm Việc', 'text'),
                'vn_zalo' => array('Link Zalo (https://zalo.me/...)', 'url'),
                'vn_facebook' => array('Link Facebook', 'url'),
                'vn_youtube' => array('Link YouTube', 'url'),
            );
            foreach ($vn_fields as $key => list($label, $type)): ?>
                    <tr>
                        <th scope="row"><label for="<?php echo $key; ?>"><?php echo $label; ?></label></th>
                        <td>
                            <input name="sch_theme_options[<?php echo $key; ?>]" type="<?php echo $type; ?>" id="<?php echo $key; ?>"
                                value="<?php echo esc_attr(sch_get_option($key)); ?>" class="regular-text"
                                style="width:100%;max-width:600px;" />
                        </td>
                    </tr>
            <?php endforeach; ?>
            <tr>
                <th scope="row"><label for="vn_mapEmbedUrl">Link Nhúng Google Maps</label></th>
                <td>
                    <textarea name="sch_theme_options[vn_mapEmbedUrl]" id="vn_mapEmbedUrl" rows="3"
                        class="large-text"><?php echo esc_textarea(sch_get_option('vn_mapEmbedUrl')); ?></textarea>
                    <p class="description">Lấy link từ Google Maps → Chia sẻ → Nhúng bản đồ → Sao chép URL trong src="..."</p>
                </td>
            </tr>
        </table>

        <h2 class="title" style="margin-top:32px;">2. Trụ Sở Chính Tại Hàn Quốc</h2>
        <table class="form-table" role="presentation">
            <?php
            $kr_fields = array(
                'kr_name' => array('Tên Trường', 'text'),
                'kr_address' => array('Địa Chỉ Tiếng Anh', 'text'),
                'kr_addressKorean' => array('Địa Chỉ Tiếng Hàn', 'text'),
                'kr_phone' => array('Điện Thoại Quốc Tế', 'text'),
                'kr_email' => array('Email Tuyển Sinh Quốc Tế', 'email'),
                'kr_website' => array('Website Chính Thức', 'url'),
            );
            foreach ($kr_fields as $key => list($label, $type)): ?>
                    <tr>
                        <th scope="row"><label for="<?php echo $key; ?>"><?php echo $label; ?></label></th>
                        <td>
                            <input name="sch_theme_options[<?php echo $key; ?>]" type="<?php echo $type; ?>" id="<?php echo $key; ?>"
                                value="<?php echo esc_attr(sch_get_option($key)); ?>" class="regular-text"
                                style="width:100%;max-width:600px;" />
                        </td>
                    </tr>
            <?php endforeach; ?>
        </table>
<?php }

// =========================================================
// TAB: Stats Strip
// =========================================================
function sch_render_tab_stats()
{ ?>
        <p style="color:#555;">Cập nhật các số liệu thống kê hiển thị trên thanh nổi bật giữa trang.</p>
        <?php for ($i = 1; $i <= 4; $i++): ?>
                <h2 class="title" style="margin-top:28px; border-top:1px solid #ddd; padding-top:20px;">Chỉ Số <?php echo $i; ?></h2>
                <table class="form-table" role="presentation">
                    <tr>
                        <th><label>Icon (Font Awesome class)</label></th>
                        <td>
                            <input name="sch_theme_options[stat<?php echo $i; ?>_icon]" type="text"
                                value="<?php echo esc_attr(sch_get_option("stat{$i}_icon")); ?>" class="regular-text"
                                placeholder="Ví dụ: fa-solid fa-passport" />
                            <p class="description">Xem tại <a href="https://fontawesome.com/icons"
                                    target="_blank">fontawesome.com/icons</a></p>
                        </td>
                    </tr>
                    <?php if ($i === 2): ?>
                            <tr>
                                <th><label>Tiền Tố (Prefix)</label></th>
                                <td><input name="sch_theme_options[stat<?php echo $i; ?>_prefix]" type="text"
                                        value="<?php echo esc_attr(sch_get_option("stat{$i}_prefix")); ?>" class="small-text"
                                        placeholder="Ví dụ: Top " /></td>
                            </tr>
                    <?php endif; ?>
                    <tr>
                        <th><label>Giá Trị (số)</label></th>
                        <td><input name="sch_theme_options[stat<?php echo $i; ?>_value]" type="number"
                                value="<?php echo esc_attr(sch_get_option("stat{$i}_value")); ?>" class="small-text" /></td>
                    </tr>
                    <tr>
                        <th><label>Hậu Tố (Suffix)</label></th>
                        <td><input name="sch_theme_options[stat<?php echo $i; ?>_suffix]" type="text"
                                value="<?php echo esc_attr(sch_get_option("stat{$i}_suffix")); ?>" class="small-text"
                                placeholder="Ví dụ: %, + , Tỷ Won" /></td>
                    </tr>
                    <tr>
                        <th><label>Tiêu Đề</label></th>
                        <td><input name="sch_theme_options[stat<?php echo $i; ?>_label]" type="text"
                                value="<?php echo esc_attr(sch_get_option("stat{$i}_label")); ?>" class="regular-text"
                                style="width:300px;" /></td>
                    </tr>
                    <tr>
                        <th><label>Mô Tả Nhỏ</label></th>
                        <td><input name="sch_theme_options[stat<?php echo $i; ?>_desc]" type="text"
                                value="<?php echo esc_attr(sch_get_option("stat{$i}_desc")); ?>" class="regular-text"
                                style="width:400px;" /></td>
                    </tr>
                </table>
        <?php endfor;
}

// =========================================================
// TAB: Highlights (3 ưu thế)
// =========================================================
function sch_render_tab_highlights()
{
    $labels = array(1 => 'Card Trái (Visa)', 2 => 'Card Giữa (KTX)', 3 => 'Card Phải (Hỗ Trợ)');
    for ($i = 1; $i <= 3; $i++): ?>
                <h2 class="title" style="margin-top:28px; border-top:1px solid #ddd; padding-top:20px;"><?php echo $labels[$i]; ?></h2>
                <table class="form-table" role="presentation">
                    <tr>
                        <th><label>Icon (Font Awesome class)</label></th>
                        <td><input name="sch_theme_options[hl<?php echo $i; ?>_icon]" type="text"
                                value="<?php echo esc_attr(sch_get_option("hl{$i}_icon")); ?>" class="regular-text"
                                placeholder="Ví dụ: fa-solid fa-award" /></td>
                    </tr>
                    <tr>
                        <th><label>Badge nhỏ phía trên</label></th>
                        <td><input name="sch_theme_options[hl<?php echo $i; ?>_badge]" type="text"
                                value="<?php echo esc_attr(sch_get_option("hl{$i}_badge")); ?>" class="regular-text"
                                style="width:300px;" /></td>
                    </tr>
                    <tr>
                        <th><label>Tiêu Đề Card</label></th>
                        <td><input name="sch_theme_options[hl<?php echo $i; ?>_title]" type="text"
                                value="<?php echo esc_attr(sch_get_option("hl{$i}_title")); ?>" class="regular-text"
                                style="width:400px;" /></td>
                    </tr>
                    <tr>
                        <th><label>Nội Dung Mô Tả</label></th>
                        <td><textarea name="sch_theme_options[hl<?php echo $i; ?>_desc]" rows="3"
                                class="large-text"><?php echo esc_textarea(sch_get_option("hl{$i}_desc")); ?></textarea></td>
                    </tr>
                </table>
        <?php endfor;
}

// =========================================================
// TAB: Testimonials
// =========================================================
function sch_render_tab_testimonials()
{
    $labels = array(1 => 'Sinh Viên 1', 2 => 'Sinh Viên 2', 3 => 'Sinh Viên 3');
    for ($i = 1; $i <= 3; $i++): ?>
                <h2 class="title" style="margin-top:28px; border-top:1px solid #ddd; padding-top:20px;"><?php echo $labels[$i]; ?></h2>
                <table class="form-table" role="presentation">
                    <tr>
                        <th><label>Họ và Tên</label></th>
                        <td><input name="sch_theme_options[tm<?php echo $i; ?>_name]" type="text"
                                value="<?php echo esc_attr(sch_get_option("tm{$i}_name")); ?>" class="regular-text"
                                style="width:300px;" /></td>
                    </tr>
                    <tr>
                        <th><label>Vai Trò / Trường / Năm học</label></th>
                        <td><input name="sch_theme_options[tm<?php echo $i; ?>_role]" type="text"
                                value="<?php echo esc_attr(sch_get_option("tm{$i}_role")); ?>" class="regular-text"
                                style="width:450px;" /></td>
                    </tr>
                    <tr>
                        <th><label>Nội Dung Đánh Giá</label></th>
                        <td><textarea name="sch_theme_options[tm<?php echo $i; ?>_text]" rows="4"
                                class="large-text"><?php echo esc_textarea(sch_get_option("tm{$i}_text")); ?></textarea></td>
                    </tr>
                    <tr>
                        <th><label>URL Ảnh Đại Diện</label></th>
                        <td>
                            <input name="sch_theme_options[tm<?php echo $i; ?>_avatar]" type="url"
                                value="<?php echo esc_attr(sch_get_option("tm{$i}_avatar")); ?>" class="regular-text"
                                style="width:450px;" placeholder="https://... hoặc để trống dùng ảnh mặc định" />
                            <p class="description">Để trống → dùng ảnh mặc định từ theme. Hoặc tải ảnh lên <a
                                    href="<?php echo admin_url('media-new.php'); ?>" target="_blank">Thư Viện Media</a> và dán URL vào
                                đây.</p>
                            <?php $av = sch_get_testimonial_avatar($i); ?>
                            <img src="<?php echo $av; ?>"
                                style="width:60px;height:60px;border-radius:50%;object-fit:cover;margin-top:8px;border:2px solid #00489f;" />
                        </td>
                    </tr>
                </table>
        <?php endfor;
}

// =========================================================
// TAB: FAQs
// =========================================================
function sch_render_tab_faqs()
{
    for ($i = 1; $i <= 5; $i++): ?>
                <h2 class="title" style="margin-top:28px; border-top:1px solid #ddd; padding-top:20px;">Câu Hỏi <?php echo $i; ?></h2>
                <table class="form-table" role="presentation">
                    <tr>
                        <th><label>Câu Hỏi</label></th>
                        <td><textarea name="sch_theme_options[faq<?php echo $i; ?>_q]" rows="2"
                                class="large-text"><?php echo esc_textarea(sch_get_option("faq{$i}_q")); ?></textarea></td>
                    </tr>
                    <tr>
                        <th><label>Câu Trả Lời</label></th>
                        <td><textarea name="sch_theme_options[faq<?php echo $i; ?>_a]" rows="5"
                                class="large-text"><?php echo esc_textarea(sch_get_option("faq{$i}_a")); ?></textarea></td>
                    </tr>
                </table>
        <?php endfor;
}
