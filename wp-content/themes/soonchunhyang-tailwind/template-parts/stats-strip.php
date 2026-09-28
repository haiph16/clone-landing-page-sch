<?php
/**
 * Template Part: Stats Strip
 * Dữ liệu quản lý qua: wp-admin → Cài Đặt SCH → Số Liệu Thống Kê
 *
 * @package Soonchunhyang
 */

if (!defined('ABSPATH')) {
    exit;
}

$stats = array(
    array(
        'icon'   => sch_get_option('stat1_icon', 'fa-solid fa-passport'),
        'prefix' => sch_get_option('stat1_prefix', ''),
        'value'  => sch_get_option('stat1_value', '90'),
        'suffix' => sch_get_option('stat1_suffix', '%'),
        'label'  => sch_get_option('stat1_label', 'Tỷ Lệ Xét Đỗ Visa'),
        'desc'   => sch_get_option('stat1_desc', 'Top đầu Hàn Quốc, bảo lãnh uy tín'),
    ),
    array(
        'icon'   => sch_get_option('stat2_icon', 'fa-solid fa-trophy'),
        'prefix' => sch_get_option('stat2_prefix', 'Top '),
        'value'  => sch_get_option('stat2_value', '5'),
        'suffix' => sch_get_option('stat2_suffix', ''),
        'label'  => sch_get_option('stat2_label', 'Đại Học Toàn Quốc'),
        'desc'   => sch_get_option('stat2_desc', 'Bảng xếp hạng THE Impact Rankings'),
    ),
    array(
        'icon'   => sch_get_option('stat3_icon', 'fa-solid fa-won-sign'),
        'prefix' => sch_get_option('stat3_prefix', ''),
        'value'  => sch_get_option('stat3_value', '100'),
        'suffix' => sch_get_option('stat3_suffix', ' Tỷ Won'),
        'label'  => sch_get_option('stat3_label', 'Gói Tài Trợ 5 Năm'),
        'desc'   => sch_get_option('stat3_desc', 'Dự án Đại học Toàn cầu chính phủ'),
    ),
    array(
        'icon'   => sch_get_option('stat4_icon', 'fa-solid fa-hotel'),
        'prefix' => sch_get_option('stat4_prefix', ''),
        'value'  => sch_get_option('stat4_value', '4000'),
        'suffix' => sch_get_option('stat4_suffix', '+'),
        'label'  => sch_get_option('stat4_label', 'Chỗ Ở KTX Chuẩn 5 Sao'),
        'desc'   => sch_get_option('stat4_desc', '4 cụm ký túc xá rộng lớn, tiện nghi'),
    ),
);
?>

<div id="stats-strip" class="bg-gradient-to-r from-sch-950 via-sch-900 to-sch-950 text-white py-12 relative z-30 border-y border-white/10 shadow-xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php foreach ($stats as $s) : ?>
            <div class="flex items-center gap-5 p-4 rounded-2xl bg-white/5 border border-white/10 hover:border-accent-cyan/40 hover:bg-white/10 transition-all duration-300 group">
                <div class="w-14 h-14 rounded-xl bg-accent-cyan/15 border border-accent-cyan/30 flex items-center justify-center text-accent-cyan shrink-0 group-hover:scale-110 group-hover:bg-accent-cyan group-hover:text-sch-950 transition-all duration-300">
                    <i class="<?php echo esc_attr($s['icon']); ?> text-2xl"></i>
                </div>
                <div>
                    <div class="text-3xl font-extrabold text-white tracking-tight leading-none mb-1 stat-counter"
                         data-prefix="<?php echo esc_attr($s['prefix']); ?>"
                         data-target="<?php echo esc_attr($s['value']); ?>"
                         data-suffix="<?php echo esc_attr($s['suffix']); ?>">
                        <?php echo esc_html($s['prefix'] . '0' . $s['suffix']); ?>
                    </div>
                    <div class="text-sm font-bold text-slate-200"><?php echo esc_html($s['label']); ?></div>
                    <div class="text-xs text-slate-400 mt-0.5"><?php echo esc_html($s['desc']); ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
