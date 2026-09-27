<?php
/**
 * Template Part: Highlights Section (3 Pillars of SCH Advantage)
 *
 * @package Soonchunhyang
 */

if (!defined('ABSPATH')) {
    exit;
}

$cards = array(
    array(
        'icon'  => 'fa-solid fa-award',
        'badge' => 'VISA ƯU TIÊN TOP ĐẦU',
        'title' => '90% Sinh Viên Đỗ Visa',
        'desc'  => 'Đại học Soonchunhyang là một trong những trường đại học có tỷ lệ xét duyệt Visa cao nhất tại Hàn Quốc. Sinh viên hệ D2-2 được hưởng chính sách miễn phỏng vấn tại Đại sứ quán.',
        'color' => 'from-blue-600 to-cyan-500'
    ),
    array(
        'icon'  => 'fa-solid fa-building-columns',
        'badge' => 'CƠ SỞ VẬT CHẤT 5 SAO',
        'title' => '4 Ký Túc Xá Lớn Hiện Đại',
        'desc'  => 'Trường sở hữu 4 khu ký túc xá khang trang, sạch sẽ với sức chứa hơn 4.000 sinh viên. Trang bị đầy đủ phòng gym, phòng tự học 24/7, căng-tin đa dạng và an ninh tuyệt đối.',
        'color' => 'from-sch-700 to-indigo-600'
    ),
    array(
        'icon'  => 'fa-solid fa-users',
        'badge' => 'HỖ TRỢ TOÀN DIỆN',
        'title' => 'Kết Nối Du Học Sinh Quốc Tế',
        'desc'  => 'Cầu nối giúp sinh viên quốc tế giao lưu, làm quen với văn hóa Hàn Quốc và nhận được sự hỗ trợ tận tình từ nhà trường về học tập, đời sống và định hướng việc làm sau tốt nghiệp.',
        'color' => 'from-amber-500 to-orange-500'
    )
);
?>

<section id="uu-the" class="py-24 bg-slate-50 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 bg-sch-100 text-sch-800 px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider mb-4 border border-sch-200">
                <i class="fa-solid fa-star text-accent-gold text-xs"></i>
                <span>Vì sao lựa chọn Soonchunhyang</span>
            </div>

            <h2 class="text-3xl sm:text-4xl font-extrabold text-sch-950 tracking-tight leading-tight mb-4">
                Ưu Thế Vượt Trội Dành Cho
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-sch-700 to-accent-cyan">
                    Du Học Sinh Việt Nam
                </span>
            </h2>

            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                Trường cam kết mang đến môi trường học tập đẳng cấp quốc tế, lộ trình visa thuận lợi cùng các chính sách học bổng và việc làm hấp dẫn nhất.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($cards as $c) : ?>
                <div class="bg-white rounded-3xl p-8 sm:p-9 shadow-lg shadow-slate-200/80 border border-slate-200/80 hover:shadow-2xl hover:border-sch-500/40 hover:-translate-y-2 transition-all duration-300 relative group flex flex-col justify-between">
                    <!-- Top colored accent line -->
                    <div class="absolute top-0 left-8 right-8 h-1.5 rounded-t-full bg-gradient-to-r <?php echo esc_attr($c['color']); ?>"></div>

                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <div class="w-16 h-16 rounded-2xl bg-sch-50 border border-sch-100 flex items-center justify-center text-sch-700 group-hover:scale-110 group-hover:bg-sch-700 group-hover:text-white transition-all duration-300 shadow-sm text-2xl">
                                <i class="<?php echo esc_attr($c['icon']); ?>"></i>
                            </div>
                            <span class="text-[11px] font-extrabold tracking-wider uppercase text-slate-400 group-hover:text-sch-700 transition-colors">
                                <?php echo esc_html($c['badge']); ?>
                            </span>
                        </div>

                        <h3 class="text-xl font-bold text-sch-950 mb-3.5 group-hover:text-sch-700 transition-colors">
                            <?php echo esc_html($c['title']); ?>
                        </h3>

                        <p class="text-slate-600 text-sm leading-relaxed mb-6">
                            <?php echo esc_html($c['desc']); ?>
                        </p>
                    </div>

                    <a href="#dang-ky" class="pt-4 border-t border-slate-100 flex items-center justify-between text-sch-700 font-bold text-sm group-hover:text-sch-800">
                        <span>Khám phá chi tiết</span>
                        <i class="fa-solid fa-arrow-up-right-from-square text-xs group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
