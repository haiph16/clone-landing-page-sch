<?php
/**
 * Template Part: Photo Gallery with Lightbox & Category Filter
 *
 * @package Soonchunhyang
 */

if (!defined('ABSPATH')) {
    exit;
}

$categories = array(
    array('id' => 'all',        'label' => 'Tất Cả'),
    array('id' => 'campus',     'label' => 'Khuôn Viên Trường'),
    array('id' => 'dormitory',  'label' => 'Ký Túc Xá'),
    array('id' => 'hospital',   'label' => 'Bệnh Viện SCH'),
    array('id' => 'activities', 'label' => 'Sự Kiện & Sinh Viên'),
);

// Query WordPress CPT sch_gallery
$gallery_query = new WP_Query(array(
    'post_type'      => 'sch_gallery',
    'posts_per_page' => -1,
    'post_status'    => 'publish'
));

$gallery_items = array();

if ($gallery_query->have_posts()) {
    while ($gallery_query->have_posts()) {
        $gallery_query->the_post();
        $cats = wp_get_post_terms(get_the_ID(), 'sch_gallery_cat', array('fields' => 'slugs'));
        $cat = !empty($cats) ? $cats[0] : 'campus';
        $img = get_the_post_thumbnail_url(get_the_ID(), 'full');
        if ($img) {
            $gallery_items[] = array(
                'id'       => get_the_ID(),
                'title'    => get_the_title(),
                'category' => $cat,
                'imageUrl' => $img
            );
        }
    }
    wp_reset_postdata();
}

// Fallback authentic photos if none added in WP Admin yet
if (empty($gallery_items)) {
    $theme_uri = get_template_directory_uri();
    $gallery_items = array(
        array(
            'id'       => 1,
            'title'    => 'Toàn cảnh khuôn viên Đại học Soonchunhyang hiện đại',
            'category' => 'campus',
            'imageUrl' => $theme_uri . '/assets/images/banner-1.webp'
        ),
        array(
            'id'       => 2,
            'title'    => 'Giảng đường trung tâm & khu phức hợp công nghệ HyFlex',
            'category' => 'campus',
            'imageUrl' => $theme_uri . '/assets/images/banner-2.webp'
        ),
        array(
            'id'       => 3,
            'title'    => 'Khuôn viên xanh rợp bóng cây tại thành phố Asan',
            'category' => 'campus',
            'imageUrl' => $theme_uri . '/assets/images/banner-3.webp'
        ),
        array(
            'id'       => 4,
            'title'    => 'Ký túc xá tiện nghi sức chứa hơn 4.000 sinh viên',
            'category' => 'dormitory',
            'imageUrl' => $theme_uri . '/assets/images/admissions-side.jpg'
        ),
        array(
            'id'       => 5,
            'title'    => 'Trung tâm Hỗ trợ Việc làm University Job Plus',
            'category' => 'activities',
            'imageUrl' => $theme_uri . '/assets/images/news-job-support.png'
        ),
        array(
            'id'       => 6,
            'title'    => 'Văn phòng tuyển sinh chính thức SCH tại Foresa Xuân Phương',
            'category' => 'campus',
            'imageUrl' => $theme_uri . '/assets/images/news-office.jpg'
        ),
        array(
            'id'       => 7,
            'title'    => 'Lễ khai giảng và chào đón tân sinh viên quốc tế 2024',
            'category' => 'activities',
            'imageUrl' => $theme_uri . '/assets/images/news-opening-2024.png'
        ),
        array(
            'id'       => 8,
            'title'    => 'Hội nghị hợp tác khoa học quốc tế SCH 2025',
            'category' => 'activities',
            'imageUrl' => $theme_uri . '/assets/images/news-scientists.png'
        ),
    );
}

function sch_get_cat_label($cat_slug) {
    $map = array(
        'campus'     => 'Khuôn viên',
        'dormitory'  => 'Ký túc xá',
        'hospital'   => 'Bệnh viện SCH',
        'activities' => 'Hoạt động sinh viên'
    );
    return isset($map[$cat_slug]) ? $map[$cat_slug] : 'Hình ảnh';
}
?>

<section id="thu-vien-anh" class="py-24 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-14">
            <div class="inline-flex items-center gap-2 bg-sch-50 border border-sch-200 text-sch-700 px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider mb-4">
                <i class="fa-solid fa-camera text-xs"></i>
                <span>Hình Ảnh Thực Tế</span>
            </div>

            <h2 class="text-3xl sm:text-4xl font-extrabold text-sch-950 tracking-tight leading-tight mb-4">
                Thư Viện Ảnh
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-sch-700 to-accent-cyan">
                    Soonchunhyang
                </span>
            </h2>

            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                Khám phá cơ sở vật chất tân tiến, ký túc xá tiện nghi và đời sống sinh viên sôi động tại Asan, Hàn Quốc.
            </p>
        </div>

        <!-- Categories Filter -->
        <div class="flex flex-wrap items-center justify-center gap-2.5 mb-12" id="gallery-filter-tabs">
            <?php foreach ($categories as $index => $c) : ?>
                <button
                    type="button"
                    data-filter="<?php echo esc_attr($c['id']); ?>"
                    class="gallery-filter-btn px-5 py-2 rounded-full text-xs sm:text-sm font-bold transition-all duration-200 <?php echo $index === 0 ? 'bg-sch-700 text-white shadow-md shadow-sch-700/25 scale-105 active' : 'bg-slate-100 hover:bg-slate-200 text-slate-600'; ?>"
                >
                    <?php echo esc_html($c['label']); ?>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" id="gallery-grid">
            <?php foreach ($gallery_items as $item) : ?>
                <div
                    data-cat="<?php echo esc_attr($item['category']); ?>"
                    data-lightbox-img="<?php echo esc_url($item['imageUrl']); ?>"
                    data-lightbox-title="<?php echo esc_attr($item['title']); ?>"
                    data-lightbox-cat="<?php echo esc_attr(sch_get_cat_label($item['category'])); ?>"
                    class="gallery-item group relative h-64 rounded-2xl overflow-hidden shadow-md cursor-pointer border border-slate-100 hover:shadow-2xl transition-all duration-300"
                >
                    <img
                        src="<?php echo esc_url($item['imageUrl']); ?>"
                        alt="<?php echo esc_attr($item['title']); ?>"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                        loading="lazy"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-sch-950/90 via-sch-950/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-5 text-white">
                        <span class="text-[11px] font-bold text-accent-cyan uppercase tracking-wider mb-1">
                            <?php echo esc_html(sch_get_cat_label($item['category'])); ?>
                        </span>
                        <h4 class="text-sm font-bold leading-snug line-clamp-2"><?php echo esc_html($item['title']); ?></h4>
                        <div class="mt-2 flex items-center gap-1.5 text-[11px] text-slate-300 font-medium">
                            <i class="fa-solid fa-expand text-accent-cyan"></i>
                            <span>Xem phóng to</span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
