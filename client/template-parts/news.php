<?php
/**
 * Template Part: News & Announcements Section
 *
 * @package Soonchunhyang
 */

if (!defined('ABSPATH')) {
    exit;
}

$news_query = new WP_Query(array(
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'post_status'    => 'publish'
));

$news_items = array();

if ($news_query->have_posts()) {
    while ($news_query->have_posts()) {
        $news_query->the_post();
        // Skip default Hello world if it's the only one without thumbnail
        if (get_the_title() === 'Hello world!' && !has_post_thumbnail()) {
            continue;
        }
        $thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
        $news_items[] = array(
            'id'       => get_the_ID(),
            'title'    => get_the_title(),
            'summary'  => get_the_excerpt(),
            'date'     => get_the_date('d/m/Y'),
            'author'   => get_the_author(),
            'category' => 'Tuyển Sinh',
            'imageUrl' => $thumb ? $thumb : get_template_directory_uri() . '/assets/images/news-office.jpg'
        );
    }
    wp_reset_postdata();
}

if (empty($news_items)) {
    $theme_uri = get_template_directory_uri();
    $news_items = array(
        array(
            'id'       => 1,
            'title'    => 'Thông Báo Tuyển Sinh Kỳ Thu 2025 & Tiếp Nhận Hồ Sơ Chuyên Ngành D2-2',
            'summary'  => 'Văn phòng tuyển sinh SCH Việt Nam chính thức nhận hồ sơ ứng tuyển học bổng kỳ Thu 2025 với mức hỗ trợ lên tới 100% học phí dành cho học sinh có TOPIK 3 trở lên.',
            'date'     => '15/08/2025',
            'author'   => 'SCH Vietnam',
            'category' => 'Tuyển Sinh 2025',
            'imageUrl' => $theme_uri . '/assets/images/news-opening-2025.png'
        ),
        array(
            'id'       => 2,
            'title'    => 'Hội Thảo Định Hướng Việc Làm & Chuyển Đổi Visa E-7 Sau Tốt Nghiệp',
            'summary'  => 'Trung tâm University Job Plus phối hợp cùng các doanh nghiệp đối tác tại Hàn Quốc tổ chức chương trình hướng dẫn thực tập và cấp phép làm việc dài hạn cho sinh viên SCH.',
            'date'     => '28/07/2025',
            'author'   => 'Ban Hợp Tác',
            'category' => 'Việc Làm',
            'imageUrl' => $theme_uri . '/assets/images/news-job-support.png'
        ),
        array(
            'id'       => 3,
            'title'    => 'Lễ Trao Học Bổng Global Leader & Vinh Danh Sinh Viên Xuất Sắc 2024 - 2025',
            'summary'  => 'Đại học Soonchunhyang trao tặng học bổng Global Leader cho hơn 120 sinh viên quốc tế đạt thành tích học tập vượt trội trong năm học vừa qua.',
            'date'     => '10/06/2025',
            'author'   => 'SCH Media',
            'category' => 'Học Bổng',
            'imageUrl' => $theme_uri . '/assets/images/news-scientists.png'
        ),
    );
}
?>

<section id="tin-tuc" class="py-24 bg-slate-50 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 bg-sch-100 text-sch-800 px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider mb-4 border border-sch-200">
                <i class="fa-solid fa-newspaper text-sch-700"></i>
                <span>Tin Tức &amp; Thông Báo Tuyển Sinh</span>
            </div>

            <h2 class="text-3xl sm:text-4xl font-extrabold text-sch-950 tracking-tight leading-tight mb-4">
                Bản Tin Cập Nhật
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-sch-700 to-accent-cyan">
                    Soonchunhyang
                </span>
            </h2>

            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                Cập nhật những thông tin tuyển sinh mới nhất, các hoạt động học thuật và thông báo từ văn phòng đại diện.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($news_items as $item) : ?>
                <article class="bg-white rounded-3xl overflow-hidden shadow-lg shadow-slate-200/60 border border-slate-200/80 hover:shadow-2xl hover:border-sch-400 hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <div class="relative h-52 overflow-hidden">
                            <img
                                src="<?php echo esc_url($item['imageUrl']); ?>"
                                alt="<?php echo esc_attr($item['title']); ?>"
                                class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-700"
                                loading="lazy"
                            />
                            <div class="absolute top-4 left-4 bg-sch-700 text-white text-[11px] font-extrabold uppercase px-3 py-1 rounded-full shadow-md">
                                <?php echo esc_html($item['category']); ?>
                            </div>
                        </div>

                        <div class="p-7">
                            <div class="flex items-center gap-4 text-xs font-semibold text-slate-400 mb-3">
                                <span class="flex items-center gap-1.5">
                                    <i class="fa-regular fa-calendar text-sch-600"></i>
                                    <?php echo esc_html($item['date']); ?>
                                </span>
                                <span class="flex items-center gap-1.5">
                                    <i class="fa-solid fa-user-pen text-sch-600"></i>
                                    <?php echo esc_html($item['author']); ?>
                                </span>
                            </div>

                            <h3 class="text-lg font-bold text-sch-950 leading-snug mb-3 group-hover:text-sch-700 transition-colors line-clamp-2">
                                <?php echo esc_html($item['title']); ?>
                            </h3>

                            <p class="text-slate-600 text-sm leading-relaxed line-clamp-3">
                                <?php echo esc_html($item['summary']); ?>
                            </p>
                        </div>
                    </div>

                    <div class="p-7 pt-0 border-t border-slate-100 mt-2">
                        <a
                            href="#dang-ky"
                            class="inline-flex items-center gap-2 text-sch-700 font-bold text-sm hover:gap-3 transition-all pt-4"
                        >
                            <span>Đọc Chi Tiết &amp; Tư Vấn</span>
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
