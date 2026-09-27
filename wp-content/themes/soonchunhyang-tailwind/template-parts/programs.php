<?php
/**
 * Template Part: Academic Programs & Majors
 *
 * @package Soonchunhyang
 */

if (!defined('ABSPATH')) {
    exit;
}

$categories = array(
    array('id' => 'all',      'label' => 'Tất Cả Các Ngành'),
    array('id' => 'medical',  'label' => 'Y Dược & Sức Khỏe'),
    array('id' => 'tech',     'label' => 'AI & Khoa Học Công Nghệ'),
    array('id' => 'business', 'label' => 'Kinh Tế & Tài Chính IT'),
    array('id' => 'design',   'label' => 'Kiến Trúc & Ngôn Ngữ'),
);

$programs = array(
    array(
        'id'          => 1,
        'cat'         => 'medical',
        'tag'         => 'Ngành Mũi Nhọn Hàng Đầu',
        'title'       => 'Y Khoa & Điều Dưỡng Lâm Sàng',
        'desc'        => 'Được đào tạo thực hành trực tiếp tại 4 bệnh viện đại học trực thuộc SCH tại Seoul và Cheonan. Chương trình đạt chuẩn kiểm định y khoa quốc tế WFME.',
        'duration'    => '4 - 6 năm',
        'scholarship' => '50% - 100% Học phí',
        'highlight'   => 'Thực tập tại hệ thống bệnh viện SCH'
    ),
    array(
        'id'          => 2,
        'cat'         => 'tech',
        'tag'         => 'Công Nghệ Xu Hướng 4.0',
        'title'       => 'Khoa Học AI & Trí Tuệ Nhân Tạo',
        'desc'        => 'Nghiên cứu chuyên sâu về Học máy (Machine Learning), Thị giác máy tính, Xử lý ngôn ngữ tự nhiên và Robotics với phòng thí nghiệm siêu máy tính GPU.',
        'duration'    => '4 năm',
        'scholarship' => '40% - 80% Học phí',
        'highlight'   => 'Hợp tác nghiên cứu viện Stanford'
    ),
    array(
        'id'          => 3,
        'cat'         => 'tech',
        'tag'         => 'Nhu Cầu Tuyển Dụng Cao',
        'title'       => 'Kỹ Thuật Dữ Liệu Lớn (Big Data)',
        'desc'        => 'Đào tạo kỹ sư khai phá dữ liệu, kiến trúc Cloud và phân tích dữ liệu kinh doanh phục vụ các tập đoàn công nghệ lớn như Samsung, Naver, Kakao, LG.',
        'duration'    => '4 năm',
        'scholarship' => '30% - 70% Học phí',
        'highlight'   => 'Cấp chứng chỉ thực hành doanh nghiệp'
    ),
    array(
        'id'          => 4,
        'cat'         => 'business',
        'tag'         => 'Song Hành Công Nghệ',
        'title'       => 'Quản Trị Kinh Doanh & Tài Chính IT',
        'desc'        => 'Kết hợp tư duy quản trị tài chính quốc tế và công nghệ Fintech, thương mại điện tử toàn cầu, đào tạo thế hệ lãnh đạo kinh doanh thời kỳ số.',
        'duration'    => '4 năm',
        'scholarship' => '30% - 100% Học phí',
        'highlight'   => 'Liên kết trao đổi sinh viên Mỹ & EU'
    ),
    array(
        'id'          => 5,
        'cat'         => 'design',
        'tag'         => 'Kiến Trúc Tương Lai',
        'title'       => 'Kiến Trúc Xanh & Thiết Kế Đô Thị',
        'desc'        => 'Ứng dụng công nghệ mô hình hóa thông tin BIM, quy hoạch đô thị thông minh và vật liệu sinh thái thích ứng với biến đổi khí hậu.',
        'duration'    => '5 năm',
        'scholarship' => '40% - 70% Học phí',
        'highlight'   => 'Xưởng thiết kế Studio 24/7'
    ),
    array(
        'id'          => 6,
        'cat'         => 'design',
        'tag'         => 'Giao Lưu Văn Hóa',
        'title'       => 'Ngôn Ngữ & Văn Hóa Hàn Quốc',
        'desc'        => 'Đào tạo chuyên sâu ngôn ngữ, biên phiên dịch cấp cao, nghiệp vụ sư phạm tiếng Hàn và nghiên cứu truyền thông văn hóa K-Culture toàn cầu.',
        'duration'    => '4 năm',
        'scholarship' => '30% - 80% Học phí',
        'highlight'   => 'Miễn giảm học phí khi có TOPIK cao'
    )
);
?>

<section id="tuyen-sinh" class="py-24 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-14">
            <div class="inline-flex items-center gap-2 bg-sch-50 border border-sch-200 text-sch-700 px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider mb-4">
                <i class="fa-solid fa-book-open text-xs"></i>
                <span>Chương Trình Đào Tạo 2025 - 2026</span>
            </div>

            <h2 class="text-3xl sm:text-4xl font-extrabold text-sch-950 tracking-tight leading-tight mb-4">
                Các Ngành Đào Tạo Trọng Điểm Tại
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-sch-700 to-accent-cyan">
                    Soonchunhyang
                </span>
            </h2>

            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                Chương trình đào tạo gắn liền với thực tiễn doanh nghiệp và mở ra cơ hội việc làm lâu dài tại Hàn Quốc.
            </p>
        </div>

        <!-- Category Tabs -->
        <div class="flex flex-wrap items-center justify-center gap-2.5 mb-14" id="programs-filter-tabs">
            <?php foreach ($categories as $index => $c) : ?>
                <button
                    type="button"
                    data-filter="<?php echo esc_attr($c['id']); ?>"
                    class="filter-btn px-5 py-2.5 rounded-full text-xs sm:text-sm font-bold transition-all duration-200 <?php echo $index === 0 ? 'bg-sch-700 text-white shadow-md shadow-sch-700/25 scale-105 active' : 'bg-slate-100 hover:bg-slate-200 text-slate-600'; ?>"
                >
                    <?php echo esc_html($c['label']); ?>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Programs Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="programs-grid">
            <?php foreach ($programs as $p) : ?>
                <div
                    data-cat="<?php echo esc_attr($p['cat']); ?>"
                    class="program-card bg-white rounded-3xl p-8 border border-slate-200/80 shadow-md hover:shadow-2xl hover:border-sch-500/30 hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between group"
                >
                    <div>
                        <span class="inline-block text-[11px] font-extrabold text-sch-700 bg-sch-50 px-3 py-1 rounded-full uppercase tracking-wider mb-4 border border-sch-100">
                            <?php echo esc_html($p['tag']); ?>
                        </span>

                        <h3 class="text-xl font-bold text-sch-950 mb-3 group-hover:text-sch-700 transition-colors">
                            <?php echo esc_html($p['title']); ?>
                        </h3>

                        <p class="text-slate-600 text-sm leading-relaxed mb-6">
                            <?php echo esc_html($p['desc']); ?>
                        </p>

                        <div class="space-y-2 mb-6">
                            <div class="flex items-center gap-2 text-xs text-slate-500 font-medium">
                                <i class="fa-solid fa-sparkles text-accent-gold"></i>
                                <span><?php echo esc_html($p['highlight']); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="pt-5 border-t border-slate-100">
                        <div class="flex items-center justify-between text-xs font-semibold text-slate-500 mb-4">
                            <span class="flex items-center gap-1.5">
                                <i class="fa-regular fa-clock text-sch-600"></i>
                                <?php echo esc_html($p['duration']); ?>
                            </span>
                            <span class="flex items-center gap-1.5 text-accent-emerald font-bold">
                                <i class="fa-solid fa-award"></i>
                                <?php echo esc_html($p['scholarship']); ?>
                            </span>
                        </div>

                        <a
                            href="#dang-ky"
                            class="w-full inline-flex items-center justify-center gap-2 bg-slate-100 hover:bg-sch-700 hover:text-white text-sch-800 font-bold text-xs py-2.5 rounded-xl transition-all"
                        >
                            <span>Tư Vấn Hồ Sơ Ngành Này</span>
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
