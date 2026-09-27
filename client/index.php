<?php
/**
 * Main Template File (Fallback)
 *
 * @package Soonchunhyang
 */

get_header();

if (is_front_page()) {
    get_template_part('template-parts/hero-slider');
    get_template_part('template-parts/stats-strip');
    get_template_part('template-parts/about');
    get_template_part('template-parts/highlights');
    get_template_part('template-parts/prestige');
    get_template_part('template-parts/programs');
    get_template_part('template-parts/jobs-guide');
    get_template_part('template-parts/gallery');
    get_template_part('template-parts/news');
    get_template_part('template-parts/testimonials');
    get_template_part('template-parts/faq');
    get_template_part('template-parts/consultation-form');
    get_template_part('template-parts/contact');
} else {
    ?>
    <main class="py-20 min-h-[60vh] max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                ?>
                <article class="bg-white rounded-3xl p-8 sm:p-12 shadow-md border border-slate-200">
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-sch-950 mb-6"><?php the_title(); ?></h1>
                    <div class="prose max-w-none text-slate-700 leading-relaxed">
                        <?php the_content(); ?>
                    </div>
                </article>
                <?php
            endwhile;
        else :
            ?>
            <div class="text-center py-16">
                <h2 class="text-2xl font-bold text-slate-800 mb-2">Không tìm thấy nội dung</h2>
                <p class="text-slate-500 mb-6">Trang bạn tìm kiếm hiện không tồn tại hoặc đã được chuyển đi.</p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center gap-2 bg-sch-700 text-white font-bold px-6 py-3 rounded-full">
                    <span>Quay về trang chủ</span>
                </a>
            </div>
            <?php
        endif;
        ?>
    </main>
    <?php
}

get_footer();
