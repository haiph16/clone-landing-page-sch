<?php
/**
 * Theme Footer
 *
 * @package Soonchunhyang
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<!-- ================= MAIN FOOTER ================= -->
<footer class="bg-sch-950 text-slate-400 pt-20 pb-12 border-t border-white/10 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 pb-16 border-b border-white/10">
            <!-- Col 1: Brand Info -->
            <div>
                <div class="flex items-center gap-3 mb-6">
                    <img
                        src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo-white.svg'); ?>"
                        alt="SCH White Logo"
                        class="h-10 w-auto"
                        onerror="this.src='<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.svg'); ?>'"
                    />
                    <span class="font-extrabold text-white text-lg tracking-tight">
                        SOON CHUN HYANG
                    </span>
                </div>
                <p class="text-sm text-slate-400 leading-relaxed mb-6">
                    Trường Đại học Soonchunhyang (SCH) – Cơ sở giáo dục đại học hàng đầu Hàn Quốc với thế mạnh vượt trội trong đào tạo Y khoa, Trí tuệ nhân tạo và Kinh doanh toàn cầu.
                </p>
                <div class="text-xs text-accent-cyan font-semibold">
                    Văn phòng tuyển sinh chính thức tại Việt Nam
                </div>
            </div>

            <!-- Col 2: Quick Links -->
            <div>
                <h4 class="text-white font-bold text-base mb-6 relative pb-3 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-10 after:h-0.5 after:bg-accent-cyan after:rounded-full">
                    Liên Kết Nhanh
                </h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="#home" class="flex items-center gap-2 hover:text-accent-cyan transition-colors"><i class="fa-solid fa-chevron-right text-xs text-accent-cyan"></i> <span>Trang chủ</span></a></li>
                    <li><a href="#gioi-thieu" class="flex items-center gap-2 hover:text-accent-cyan transition-colors"><i class="fa-solid fa-chevron-right text-xs text-accent-cyan"></i> <span>Về trường SCH</span></a></li>
                    <li><a href="#uu-the" class="flex items-center gap-2 hover:text-accent-cyan transition-colors"><i class="fa-solid fa-chevron-right text-xs text-accent-cyan"></i> <span>Ưu thế &amp; Học bổng</span></a></li>
                    <li><a href="#tuyen-sinh" class="flex items-center gap-2 hover:text-accent-cyan transition-colors"><i class="fa-solid fa-chevron-right text-xs text-accent-cyan"></i> <span>Chuyên ngành đào tạo</span></a></li>
                    <li><a href="#viec-lam" class="flex items-center gap-2 hover:text-accent-cyan transition-colors"><i class="fa-solid fa-chevron-right text-xs text-accent-cyan"></i> <span>Chính sách việc làm</span></a></li>
                    <li><a href="#thu-vien-anh" class="flex items-center gap-2 hover:text-accent-cyan transition-colors"><i class="fa-solid fa-chevron-right text-xs text-accent-cyan"></i> <span>Thư viện hình ảnh</span></a></li>
                    <li><a href="#faq" class="flex items-center gap-2 hover:text-accent-cyan transition-colors"><i class="fa-solid fa-chevron-right text-xs text-accent-cyan"></i> <span>Hỏi đáp thường gặp</span></a></li>
                </ul>
            </div>

            <!-- Col 3: VN Office -->
            <div>
                <h4 class="text-white font-bold text-base mb-6 relative pb-3 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-10 after:h-0.5 after:bg-accent-cyan after:rounded-full">
                    Văn Phòng Việt Nam
                </h4>
                <div class="space-y-3.5 text-sm">
                    <div class="flex items-start gap-2.5">
                        <i class="fa-solid fa-location-dot text-accent-cyan shrink-0 mt-1"></i>
                        <span><?php echo esc_html(sch_get_option('vn_currentAddress')); ?></span>
                    </div>
                    <?php $hotline = sch_get_option('vn_hotline'); ?>
                    <div class="flex items-center gap-2.5">
                        <i class="fa-solid fa-phone text-accent-cyan shrink-0"></i>
                        <a href="tel:<?php echo esc_attr(str_replace(' ', '', $hotline)); ?>" class="text-white font-bold hover:underline">
                            <?php echo esc_html($hotline); ?>
                        </a>
                    </div>
                    <?php $email = sch_get_option('vn_email'); ?>
                    <div class="flex items-center gap-2.5">
                        <i class="fa-solid fa-envelope text-accent-cyan shrink-0"></i>
                        <a href="mailto:<?php echo esc_attr($email); ?>" class="hover:text-white">
                            <?php echo esc_html($email); ?>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Col 4: Korea HQ -->
            <div>
                <h4 class="text-white font-bold text-base mb-6 relative pb-3 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-10 after:h-0.5 after:bg-accent-cyan after:rounded-full">
                    Trụ Sở Hàn Quốc
                </h4>
                <div class="space-y-3.5 text-sm">
                    <div class="flex items-start gap-2.5">
                        <i class="fa-solid fa-building-columns text-accent-cyan shrink-0 mt-1"></i>
                        <span><?php echo esc_html(sch_get_option('kr_address')); ?></span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <i class="fa-solid fa-phone text-accent-cyan shrink-0"></i>
                        <span><?php echo esc_html(sch_get_option('kr_phone')); ?></span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <i class="fa-solid fa-globe text-accent-cyan shrink-0"></i>
                        <a href="<?php echo esc_url(sch_get_option('kr_website')); ?>" target="_blank" rel="noreferrer" class="hover:text-white">
                            www.sch.ac.kr
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs">
            <div>
                © 2026 Soonchunhyang University Vietnam. Bảo lưu mọi quyền.
            </div>

            <div class="flex items-center gap-6">
                <a href="<?php echo esc_url(admin_url()); ?>" class="inline-flex items-center gap-1.5 text-slate-400 hover:text-white transition-colors">
                    <i class="fa-solid fa-lock text-accent-gold"></i>
                    <span>Đăng nhập Quản Trị</span>
                </a>

                <button id="footer-back-to-top" class="inline-flex items-center gap-1 text-slate-400 hover:text-white transition-colors">
                    <i class="fa-solid fa-arrow-up"></i>
                    <span>Về đầu trang</span>
                </button>
            </div>
        </div>
    </div>
</footer>

<!-- ================= FLOATING ACTION BUTTONS ================= -->
<div class="fixed bottom-6 right-6 z-50 flex flex-col items-center gap-3">
    <!-- Zalo Button -->
    <a
        href="<?php echo esc_url(sch_get_option('vn_zalo')); ?>"
        target="_blank"
        rel="noreferrer"
        class="w-13 h-13 rounded-full bg-blue-600 hover:bg-blue-500 text-white shadow-xl shadow-blue-600/30 flex items-center justify-center transition-all hover:scale-110 group relative"
        title="Chat Zalo Tư Vấn Tuyển Sinh"
        style="width: 52px; height: 52px;"
    >
        <i class="fa-solid fa-comment-dots text-2xl"></i>
        <span class="absolute right-16 bg-slate-900 text-white text-xs font-bold px-3 py-1.5 rounded-lg whitespace-nowrap opacity-0 pointer-events-none group-hover:opacity-100 transition-opacity shadow-lg">
            Chat Zalo Tuyển Sinh
        </span>
    </a>

    <!-- Phone Call Button -->
    <a
        href="tel:<?php echo esc_attr(str_replace(' ', '', sch_get_option('vn_hotline'))); ?>"
        class="w-13 h-13 rounded-full bg-emerald-600 hover:bg-emerald-500 text-white shadow-xl shadow-emerald-600/30 flex items-center justify-center transition-all hover:scale-110 group relative animate-bounce"
        title="Gọi Hotline Tuyển Sinh"
        style="width: 52px; height: 52px;"
    >
        <i class="fa-solid fa-phone text-xl"></i>
        <span class="absolute right-16 bg-slate-900 text-white text-xs font-bold px-3 py-1.5 rounded-lg whitespace-nowrap opacity-0 pointer-events-none group-hover:opacity-100 transition-opacity shadow-lg">
            Gọi <?php echo esc_html(sch_get_option('vn_hotline')); ?>
        </span>
    </a>

    <!-- Back to top -->
    <button
        id="float-top-btn"
        class="hidden w-11 h-11 rounded-full bg-sch-700 hover:bg-sch-600 text-white shadow-lg flex items-center justify-center transition-all hover:scale-110"
        title="Lên đầu trang"
        style="width: 44px; height: 44px;"
    >
        <i class="fa-solid fa-arrow-up text-sm"></i>
    </button>
</div>

<!-- ================= LIGHTBOX IMAGE MODAL ================= -->
<div id="lightbox-modal" class="fixed inset-0 z-50 bg-black/90 backdrop-blur-md hidden items-center justify-center p-4 sm:p-8">
    <div class="relative max-w-4xl max-h-[90vh] flex flex-col items-center">
        <button id="lightbox-close" class="absolute -top-12 right-0 text-white/80 hover:text-white p-2 rounded-full transition-colors text-3xl">
            &times;
        </button>
        <img id="lightbox-img" src="" alt="Ảnh phóng to" class="max-h-[75vh] w-auto max-w-full rounded-2xl shadow-2xl object-contain border border-white/10" />
        <div class="mt-4 text-center">
            <span id="lightbox-category" class="text-xs text-accent-cyan font-bold uppercase tracking-wider block"></span>
            <h3 id="lightbox-title" class="text-lg sm:text-xl font-bold text-white mt-1"></h3>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div id="toast-container" class="fixed top-6 right-6 z-50 flex flex-col gap-3"></div>

<?php wp_footer(); ?>
</body>
</html>
