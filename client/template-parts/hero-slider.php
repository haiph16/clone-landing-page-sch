<?php
/**
 * Template Part: Hero Slider
 *
 * @package Soonchunhyang
 */

if (!defined('ABSPATH')) {
    exit;
}

// Query custom post type banners
$banners_query = new WP_Query(array(
    'post_type'      => 'sch_banner',
    'posts_per_page' => 10,
    'orderby'        => 'menu_order',
    'order'          => 'ASC'
));

$slides = array();

if ($banners_query->have_posts()) {
    while ($banners_query->have_posts()) {
        $banners_query->the_post();
        $thumb_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : get_template_directory_uri() . '/assets/images/banner-1.webp';
        $slides[] = array(
            'title'     => get_the_title(),
            'badge'     => get_post_meta(get_the_ID(), '_sch_banner_badge', true),
            'subtitle'  => get_post_meta(get_the_ID(), '_sch_banner_subtitle', true),
            'btn1_text' => get_post_meta(get_the_ID(), '_sch_banner_btn1_text', true) ?: 'ĐĂNG KÝ TƯ VẤN',
            'btn1_link' => get_post_meta(get_the_ID(), '_sch_banner_btn1_link', true) ?: '#dang-ky',
            'btn2_text' => get_post_meta(get_the_ID(), '_sch_banner_btn2_text', true),
            'btn2_link' => get_post_meta(get_the_ID(), '_sch_banner_btn2_link', true),
            'image'     => $thumb_url
        );
    }
    wp_reset_postdata();
} else {
    // Default high-resolution slides
    $slides = array(
        array(
            'title'     => 'SCH Chuyên Ngành Toàn Cầu',
            'badge'     => 'CHƯƠNG TRÌNH ĐÀO TẠO TOÀN CẦU',
            'subtitle'  => 'Hãy đến học tại Đại học Soonchunhyang và tận hưởng thiên nhiên tươi đẹp, môi trường giàu văn hóa cùng nền giáo dục đẳng cấp quốc tế.',
            'btn1_text' => 'ĐĂNG KÝ TƯ VẤN',
            'btn1_link' => '#dang-ky',
            'btn2_text' => 'TÌM HIỂU THÊM',
            'btn2_link' => '#gioi-thieu',
            'image'     => get_template_directory_uri() . '/assets/images/banner-1.webp'
        ),
        array(
            'title'     => 'SCH Trường Đại Học Toàn Cầu',
            'badge'     => 'GÓI HỖ TRỢ 100 TỶ WON',
            'subtitle'  => 'Được Bộ Giáo dục Hàn Quốc chỉ định là Trường Đại học Toàn cầu, nhận gói tài trợ 100 tỷ won trong 5 năm bồi dưỡng nhân tài chất lượng cao.',
            'btn1_text' => 'ĐĂNG KÝ HỌC',
            'btn1_link' => '#dang-ky',
            'btn2_text' => 'XEM HỌC BỔNG',
            'btn2_link' => '#tuyen-sinh',
            'image'     => get_template_directory_uri() . '/assets/images/banner-2.webp'
        ),
        array(
            'title'     => 'SCH Trao Đổi Sinh Viên & Học Bổng',
            'badge'     => 'CƠ HỘI DU HỌC ĐẶC BIỆT',
            'subtitle'  => 'Cơ hội cho sinh viên học tập trao đổi 1 học kỳ hoặc 1 năm, liên thông trực tiếp hệ đại học và cao học với học bổng lên đến 100%.',
            'btn1_text' => 'KHÁM PHÁ CƠ HỘI',
            'btn1_link' => '#tuyen-sinh',
            'btn2_text' => 'LIÊN HỆ VĂN PHÒNG',
            'btn2_link' => '#lien-he',
            'image'     => get_template_directory_uri() . '/assets/images/banner-3.webp'
        )
    );
}
?>

<section id="home" class="relative min-h-[560px] lg:min-h-[640px] bg-sch-950 overflow-hidden select-none flex items-center">
    <div id="hero-slider" class="absolute inset-0 w-full h-full">
        <?php foreach ($slides as $index => $slide) : ?>
            <div class="slide-item absolute inset-0 transition-opacity duration-1000 ease-in-out <?php echo $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none'; ?>" data-slide-index="<?php echo $index; ?>">
                <div class="absolute inset-0 bg-cover bg-center transform scale-105 transition-transform duration-10000 ease-out" style="background-image: url('<?php echo esc_url($slide['image']); ?>');"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-sch-950/95 via-sch-900/80 to-sch-950/40"></div>
                
                <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 w-full h-full flex items-center">
                    <div class="max-w-2xl lg:max-w-3xl">
                        <?php if (!empty($slide['badge'])) : ?>
                            <div class="inline-flex items-center gap-2 bg-accent-cyan/20 border border-accent-cyan/40 backdrop-blur-md text-accent-cyan font-bold text-xs uppercase tracking-wider px-3.5 py-1.5 rounded-full mb-6 shadow-sm">
                                <i class="fa-solid fa-sparkles animate-pulse"></i>
                                <span><?php echo esc_html($slide['badge']); ?></span>
                            </div>
                        <?php endif; ?>

                        <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-[1.15] mb-5 drop-shadow-md">
                            <?php echo esc_html($slide['title']); ?>
                        </h1>

                        <p class="text-base sm:text-lg lg:text-xl text-slate-200 leading-relaxed mb-8 font-normal drop-shadow">
                            <?php echo esc_html($slide['subtitle']); ?>
                        </p>

                        <div class="flex flex-wrap items-center gap-4">
                            <a href="<?php echo esc_url($slide['btn1_link']); ?>" class="inline-flex items-center gap-2.5 bg-gradient-to-r from-sch-600 via-sch-700 to-sch-800 hover:from-sch-500 hover:to-sch-600 text-white font-extrabold text-sm sm:text-base px-7 py-3.5 rounded-full shadow-lg shadow-sch-700/40 hover:shadow-xl hover:shadow-sch-700/60 transition-all transform hover:-translate-y-0.5">
                                <span><?php echo esc_html($slide['btn1_text']); ?></span>
                                <i class="fa-solid fa-arrow-right text-xs"></i>
                            </a>

                            <?php if (!empty($slide['btn2_text'])) : ?>
                                <a href="<?php echo esc_url($slide['btn2_link']); ?>" class="inline-flex items-center gap-2.5 bg-white/10 hover:bg-white/20 text-white border border-white/30 backdrop-blur-md font-bold text-sm sm:text-base px-6 py-3.5 rounded-full transition-all">
                                    <i class="fa-solid fa-circle-info text-xs"></i>
                                    <span><?php echo esc_html($slide['btn2_text']); ?></span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Navigation Arrows -->
    <?php if (count($slides) > 1) : ?>
        <button id="slider-prev" class="hidden sm:flex absolute left-4 lg:left-8 top-1/2 -translate-y-1/2 z-30 w-12 h-12 rounded-full bg-white/10 hover:bg-sch-600 border border-white/20 backdrop-blur-md text-white items-center justify-center transition-all hover:scale-110 shadow-lg" aria-label="Slide trước">
            <i class="fa-solid fa-chevron-left text-lg"></i>
        </button>
        <button id="slider-next" class="hidden sm:flex absolute right-4 lg:right-8 top-1/2 -translate-y-1/2 z-30 w-12 h-12 rounded-full bg-white/10 hover:bg-sch-600 border border-white/20 backdrop-blur-md text-white items-center justify-center transition-all hover:scale-110 shadow-lg" aria-label="Slide tiếp theo">
            <i class="fa-solid fa-chevron-right text-lg"></i>
        </button>

        <!-- Dots -->
        <div id="slider-dots" class="absolute bottom-6 left-1/2 -translate-x-1/2 z-30 flex items-center gap-2.5">
            <?php foreach ($slides as $index => $slide) : ?>
                <button class="slider-dot transition-all duration-300 rounded-full <?php echo $index === 0 ? 'w-8 h-2.5 bg-accent-cyan shadow-sm' : 'w-2.5 h-2.5 bg-white/40 hover:bg-white/70'; ?>" data-index="<?php echo $index; ?>" aria-label="Slide <?php echo $index + 1; ?>"></button>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>
