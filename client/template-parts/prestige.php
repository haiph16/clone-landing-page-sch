<?php
/**
 * Template Part: Global Prestige & Accreditations
 *
 * @package Soonchunhyang
 */

if (!defined('ABSPATH')) {
    exit;
}

$pillars = array(
    array(
        'badge' => 'Chỉ định cấp Quốc Gia',
        'title' => 'Trường Đại Học Toàn Cầu',
        'desc'  => 'Nhận gói tài trợ 100 tỷ won trong 5 năm từ Bộ Giáo dục Hàn Quốc nhằm bồi dưỡng nhân tài chất lượng cao, mở rộng mạng lưới hợp tác học thuật và chương trình trao đổi sinh viên quốc tế.',
        'icon'  => 'fa-solid fa-globe'
    ),
    array(
        'badge' => 'Chất lượng hàng đầu',
        'title' => 'Giải Thưởng Sáng Tạo Quốc Gia',
        'desc'  => '3 năm liên tiếp được Bộ Giáo dục Hàn Quốc vinh danh Giải thưởng Sáng tạo Giáo dục Quốc gia. Soonchunhyang tự hào đứng thứ 3 toàn quốc về tỷ lệ chọi nhập học của sinh viên bản địa.',
        'icon'  => 'fa-solid fa-trophy'
    ),
    array(
        'badge' => 'Bảng xếp hạng Thế Giới',
        'title' => 'Top 5 Hàn Quốc & Top 100 Thế Giới',
        'desc'  => 'Theo THE Impact Rankings. Riêng ngành Y khoa đứng thứ 10 trong nước và Top 400 thế giới năm 2024, sở hữu 4 bệnh viện lớn tại Seoul, Cheonan, Bucheon và Gumi với hơn 3.000 giường.',
        'icon'  => 'fa-solid fa-shield-halved'
    )
);
?>

<section class="py-20 bg-gradient-to-br from-sch-950 via-sch-900 to-sch-850 text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#1ebbf0_1px,transparent_1px)] [background-size:24px_24px]"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-block bg-accent-cyan/15 text-accent-cyan border border-accent-cyan/30 px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4">
                Đẳng Cấp Quốc Tế
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight mb-4">
                Khẳng Định Vị Thế Giáo Dục Trên Bản Đồ Học Thuật
            </h2>
            <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                Những danh hiệu và bảng xếp hạng bảo chứng cho chất lượng giảng dạy và cơ hội phát triển tương lai của sinh viên.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($pillars as $p) : ?>
                <div class="bg-white/5 border border-white/10 rounded-3xl p-8 hover:bg-white/10 hover:border-accent-cyan/40 transition-all duration-300 backdrop-blur-sm group">
                    <div class="w-14 h-14 rounded-2xl bg-accent-cyan/15 border border-accent-cyan/30 flex items-center justify-center text-accent-cyan mb-6 group-hover:scale-110 group-hover:bg-accent-cyan group-hover:text-sch-950 transition-all duration-300 text-2xl">
                        <i class="<?php echo esc_attr($p['icon']); ?>"></i>
                    </div>

                    <div class="inline-block text-[11px] font-extrabold text-accent-cyan uppercase tracking-wider mb-2">
                        <?php echo esc_html($p['badge']); ?>
                    </div>

                    <h3 class="text-xl font-bold text-white mb-3 group-hover:text-accent-cyan transition-colors">
                        <?php echo esc_html($p['title']); ?>
                    </h3>

                    <p class="text-slate-300 text-sm leading-relaxed">
                        <?php echo esc_html($p['desc']); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
