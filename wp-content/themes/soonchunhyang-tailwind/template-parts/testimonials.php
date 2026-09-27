<?php
/**
 * Template Part: Testimonials & Student Reviews
 *
 * @package Soonchunhyang
 */

if (!defined('ABSPATH')) {
    exit;
}

$theme_uri = get_template_directory_uri();
$testimonials = array(
    array(
        'id'     => 1,
        'name'   => 'Nguyễn Thùy Giang',
        'role'   => 'Sinh viên K59 Ngành Quản trị Kinh doanh',
        'text'   => 'Khuôn viên trường rất xanh và trong lành. Thầy cô ở văn phòng quốc tế chăm sóc sinh viên Việt Nam chu đáo từ lúc đón tại sân bay Incheon đến khi nhận phòng ký túc xá.',
        'avatar' => $theme_uri . '/assets/images/student-giang.jpg'
    ),
    array(
        'id'     => 2,
        'name'   => 'Trần Đức Huy',
        'role'   => 'Kỹ sư phần mềm tại Seoul (Cựu sinh viên K56 CNTT)',
        'text'   => 'Nhờ học bổng 80% của SCH mà mình giảm bớt gánh nặng tài chính rất nhiều. Trường có trung tâm hỗ trợ việc làm kết nối trực tiếp với các tập đoàn công nghệ lớn tại Hàn.',
        'avatar' => $theme_uri . '/assets/images/student-huy.jpg'
    ),
    array(
        'id'     => 3,
        'name'   => 'Lê Hoàng Dũng',
        'role'   => 'Du học sinh năm 3 Ngành Y sinh lâm sàng',
        'text'   => 'Hệ thống bệnh viện trường quá hiện đại, sinh viên được trực tiếp quan sát và thực tập lâm sàng. Quyết định học tập tại Soonchunhyang là bước ngoặt lớn của cuộc đời mình.',
        'avatar' => $theme_uri . '/assets/images/student-dung.jpg'
    )
);
?>

<section class="py-24 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 bg-sch-50 border border-sch-200 text-sch-700 px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider mb-4">
                <i class="fa-solid fa-quote-left text-xs"></i>
                <span>Chia Sẻ Từ Du Học Sinh</span>
            </div>

            <h2 class="text-3xl sm:text-4xl font-extrabold text-sch-950 tracking-tight leading-tight mb-4">
                Cảm Nhận Của
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-sch-700 to-accent-cyan">
                    Sinh Viên Việt Nam
                </span>
                Tại SCH
            </h2>

            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                Lắng nghe những trải nghiệm chân thực từ các bạn cựu sinh viên và du học sinh đang học tập tại Đại học Soonchunhyang.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($testimonials as $item) : ?>
                <div class="bg-slate-50 rounded-3xl p-8 border border-slate-200/80 shadow-md hover:shadow-2xl hover:border-sch-400 hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between relative group">
                    <i class="fa-solid fa-quote-left text-3xl text-sch-700/15 mb-4"></i>

                    <p class="text-slate-700 text-sm leading-relaxed italic mb-8">
                        &ldquo;<?php echo esc_html($item['text']); ?>&rdquo;
                    </p>

                    <div class="flex items-center gap-4 pt-4 border-t border-slate-200/60">
                        <img
                            src="<?php echo esc_url($item['avatar']); ?>"
                            alt="<?php echo esc_attr($item['name']); ?>"
                            class="w-13 h-13 rounded-full object-cover border-2 border-sch-600 shadow-sm"
                            style="width: 52px; height: 52px;"
                        />
                        <div>
                            <h4 class="text-base font-bold text-sch-950"><?php echo esc_html($item['name']); ?></h4>
                            <p class="text-xs text-slate-500 font-medium"><?php echo esc_html($item['role']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
