<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-slate-50 text-slate-800 font-sans antialiased selection:bg-sch-600 selection:text-white'); ?>>
<?php wp_body_open(); ?>

<!-- ================= TOP ANNOUNCEMENT BAR ================= -->
<div class="bg-gradient-to-r from-sch-950 via-sch-900 to-sch-800 text-slate-200 text-xs border-b border-white/10 relative z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
        <div className="flex flex-wrap items-center justify-between gap-3" style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between;">
            <!-- Left Items -->
            <div class="flex items-center gap-4 flex-wrap">
                <span class="inline-flex items-center gap-1.5 bg-accent-cyan/15 text-accent-cyan font-bold px-2.5 py-0.5 rounded-full text-[11px] border border-accent-cyan/30">
                    <i class="fa-solid fa-award"></i>
                    VĂN PHÒNG ĐẠI DIỆN CHÍNH THỨC
                </span>
                <div class="hidden md:flex items-center gap-1.5 text-slate-300">
                    <i class="fa-solid fa-location-dot text-accent-cyan shrink-0"></i>
                    <span class="truncate max-w-md">
                        <?php echo esc_html(sch_get_option('vn_currentAddress')); ?>
                    </span>
                </div>
            </div>

            <!-- Right Items -->
            <div class="flex items-center gap-4 text-xs ml-auto">
                <?php $hotline = sch_get_option('vn_hotline'); ?>
                <a href="tel:<?php echo esc_attr(str_replace(' ', '', $hotline)); ?>" class="flex items-center gap-1.5 text-slate-200 hover:text-white transition-colors">
                    <i class="fa-solid fa-phone text-accent-cyan animate-pulse"></i>
                    <span>Hotline: <strong class="text-white font-bold"><?php echo esc_html($hotline); ?></strong></span>
                </a>

                <?php $email = sch_get_option('vn_email'); ?>
                <a href="mailto:<?php echo esc_attr($email); ?>" class="hidden sm:flex items-center gap-1.5 text-slate-200 hover:text-white transition-colors">
                    <i class="fa-solid fa-envelope text-accent-cyan"></i>
                    <span><?php echo esc_html($email); ?></span>
                </a>

                <a href="<?php echo esc_url(admin_url()); ?>" class="inline-flex items-center gap-1.5 bg-accent-gold/20 hover:bg-accent-gold text-accent-goldLight hover:text-sch-950 font-bold px-3 py-1 rounded-full text-[11px] border border-accent-gold/40 transition-all shadow-sm">
                    <i class="fa-solid fa-lock"></i>
                    <span>Quản Trị WP</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- ================= MAIN HEADER & NAVIGATION ================= -->
<header id="main-header" class="sticky top-0 z-40 bg-white/90 backdrop-blur-md py-3.5 sm:py-4 border-b border-slate-200/60 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3 group">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.svg'); ?>" alt="Soonchunhyang University" class="h-10 sm:h-12 w-auto transition-transform group-hover:scale-105" />
                    <?php
                }
                ?>
                <div class="flex flex-col">
                    <span class="font-extrabold text-base sm:text-lg text-sch-900 tracking-tight leading-none group-hover:text-sch-700 transition-colors">
                        SOON CHUN HYANG
                    </span>
                    <span class="text-[10px] sm:text-xs font-semibold text-slate-500 uppercase tracking-widest mt-1">
                        Văn Phòng Tuyển Sinh Tại Việt Nam
                    </span>
                </div>
            </a>

            <!-- Desktop Nav Links -->
            <nav class="hidden lg:flex items-center gap-7">
                <a href="#home" class="py-1 text-sm font-semibold text-slate-600 hover:text-sch-700 transition-colors nav-link active">Trang chủ</a>
                <a href="#gioi-thieu" class="py-1 text-sm font-semibold text-slate-600 hover:text-sch-700 transition-colors nav-link">Giới thiệu</a>
                <a href="#uu-the" class="py-1 text-sm font-semibold text-slate-600 hover:text-sch-700 transition-colors nav-link">Ưu thế SCH</a>
                <a href="#tuyen-sinh" class="py-1 text-sm font-semibold text-slate-600 hover:text-sch-700 transition-colors nav-link">Tuyển sinh</a>
                <a href="#viec-lam" class="py-1 text-sm font-semibold text-slate-600 hover:text-sch-700 transition-colors nav-link">Việc làm</a>
                <a href="#thu-vien-anh" class="py-1 text-sm font-semibold text-slate-600 hover:text-sch-700 transition-colors nav-link">Hình ảnh</a>
                <a href="#tin-tuc" class="py-1 text-sm font-semibold text-slate-600 hover:text-sch-700 transition-colors nav-link">Tin tức</a>
                <a href="#faq" class="py-1 text-sm font-semibold text-slate-600 hover:text-sch-700 transition-colors nav-link">Hỏi đáp</a>
                <a href="#lien-he" class="py-1 text-sm font-semibold text-slate-600 hover:text-sch-700 transition-colors nav-link">Liên hệ</a>
            </nav>

            <!-- Actions -->
            <div class="flex items-center gap-3">
                <a href="#dang-ky" class="hidden sm:inline-flex items-center gap-2 bg-gradient-to-r from-sch-700 to-sch-800 hover:from-sch-600 hover:to-sch-700 text-white font-bold text-xs sm:text-sm px-5 py-2.5 rounded-full shadow-md shadow-sch-700/25 hover:shadow-lg hover:shadow-sch-700/35 transition-all transform hover:-translate-y-0.5">
                    <span>Đăng Ký Tư Vấn</span>
                    <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>

                <button id="mobile-menu-btn" class="lg:hidden p-2 rounded-lg text-slate-700 hover:text-sch-700 hover:bg-slate-100 transition-colors" aria-label="Toggle Menu">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Drawer -->
    <div id="mobile-menu" class="hidden lg:hidden bg-white/98 backdrop-blur-lg border-b border-slate-200 px-4 pt-3 pb-6 shadow-xl">
        <div class="flex flex-col gap-2">
            <a href="#home" class="px-3 py-2 rounded-lg text-sm font-semibold text-sch-700 font-bold bg-sch-50">Trang chủ</a>
            <a href="#gioi-thieu" class="px-3 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">Giới thiệu</a>
            <a href="#uu-the" class="px-3 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">Ưu thế SCH</a>
            <a href="#tuyen-sinh" class="px-3 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">Tuyển sinh</a>
            <a href="#viec-lam" class="px-3 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">Việc làm tại Hàn</a>
            <a href="#thu-vien-anh" class="px-3 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">Hình ảnh</a>
            <a href="#tin-tuc" class="px-3 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">Tin tức</a>
            <a href="#faq" class="px-3 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">Hỏi đáp FAQ</a>
            <a href="#lien-he" class="px-3 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">Liên hệ</a>
            <div class="pt-3 border-t border-slate-100">
                <a href="#dang-ky" class="flex items-center justify-center gap-2 bg-sch-700 text-white font-bold text-sm py-3 rounded-xl shadow-md text-center">
                    <span>Đăng Ký Tư Vấn Ngay</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</header>
