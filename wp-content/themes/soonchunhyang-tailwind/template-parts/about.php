<?php
/**
 * Template Part: About University Section
 *
 * @package Soonchunhyang
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<section id="gioi-thieu" class="py-24 bg-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Visual Side -->
            <div class="relative">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl shadow-sch-900/15 border border-slate-100">
                    <img
                        src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/banner-2.webp'); ?>"
                        alt="Soonchunhyang University Campus"
                        class="w-full h-[460px] sm:h-[500px] object-cover hover:scale-105 transition-transform duration-700"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-sch-950/80 via-transparent to-transparent"></div>
                </div>

                <!-- Floating Experience Badge -->
                <div class="absolute -bottom-8 -right-4 sm:-right-8 bg-gradient-to-br from-sch-900 via-sch-800 to-sch-700 text-white p-6 sm:p-7 rounded-2xl shadow-2xl border border-white/20 max-w-xs backdrop-blur-md">
                    <div class="flex items-center gap-4">
                        <div class="text-4xl sm:text-5xl font-black text-accent-cyan tracking-tight leading-none">
                            48+
                        </div>
                        <div class="text-xs sm:text-sm font-bold text-slate-100 leading-snug">
                            Năm Kiến Tạo Tri Thức &amp; Nhân Lực Toàn Cầu (Thành lập 1978)
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Side -->
            <div>
                <div class="inline-flex items-center gap-2 bg-sch-50 border border-sch-200 text-sch-700 px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider mb-4">
                    <i class="fa-solid fa-landmark text-xs"></i>
                    <span>Về Trường Đại Học Soonchunhyang</span>
                </div>

                <h2 class="text-3xl sm:text-4xl font-extrabold text-sch-950 tracking-tight leading-tight mb-6">
                    Ngôi Trường Danh Tiếng Với Nền Tảng Y Học &amp;
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-sch-700 to-accent-cyan">
                        Công Nghệ Số
                    </span>
                </h2>

                <p class="text-base sm:text-lg text-slate-600 leading-relaxed mb-8">
                    Đại học Soonchunhyang (SCH) tọa lạc tại thành phố Asan yên bình bên bờ biển phía Tây Hàn Quốc. Được bao quanh bởi thiên nhiên tươi đẹp và gần các khu phức hợp công nghiệp hiện đại, SCH là điểm đến du học lý tưởng hàng đầu cho sinh viên Việt Nam với chính sách hỗ trợ toàn diện.
                </p>

                <div class="space-y-5 mb-10">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-sch-50 border border-sch-200 flex items-center justify-center text-sch-700 shrink-0 mt-0.5">
                            <i class="fa-solid fa-layer-group text-base"></i>
                        </div>
                        <div>
                            <h4 class="text-base font-bold text-sch-950 mb-1">5 Viện Đại Học Đào Tạo Mũi Nhọn</h4>
                            <p class="text-sm text-slate-500 leading-relaxed">Bao gồm Nhân văn, Khoa học Xã hội, Khoa học Tự nhiên, Kỹ thuật Công nghệ và Y khoa hàng đầu Hàn Quốc.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-sch-50 border border-sch-200 flex items-center justify-center text-sch-700 shrink-0 mt-0.5">
                            <i class="fa-solid fa-hospital text-base"></i>
                        </div>
                        <div>
                            <h4 class="text-base font-bold text-sch-950 mb-1">Sở Hữu 4 Bệnh Viện Đa Khoa Lớn</h4>
                            <p class="text-sm text-slate-500 leading-relaxed">Trực tiếp vận hành 4 bệnh viện lớn tại Seoul, Cheonan, Bucheon và Gumi với hơn 3.000 giường bệnh đạt chuẩn quốc tế.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-sch-50 border border-sch-200 flex items-center justify-center text-sch-700 shrink-0 mt-0.5">
                            <i class="fa-solid fa-compass text-base"></i>
                        </div>
                        <div>
                            <h4 class="text-base font-bold text-sch-950 mb-1">Hệ Sinh Thái Học Tập HyFlex Tiên Phong</h4>
                            <p class="text-sm text-slate-500 leading-relaxed">Mô hình kết hợp linh hoạt trực tiếp và thực tế ảo Metaverse, giảng đường thông minh, thư viện mở 24/7.</p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap items-center gap-4">
                    <a
                        href="#dang-ky"
                        class="inline-flex items-center gap-2 bg-sch-700 hover:bg-sch-600 text-white font-bold text-sm px-7 py-3.5 rounded-full shadow-lg shadow-sch-700/30 transition-all hover:-translate-y-0.5"
                    >
                        <span>Đăng Ký Nhận Hồ Sơ Miễn Phí</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>

                    <a
                        href="#tuyen-sinh"
                        class="inline-flex items-center gap-2 text-sch-700 hover:text-sch-900 font-bold text-sm px-6 py-3.5 rounded-full border border-slate-300 hover:border-sch-700 transition-all"
                    >
                        <span>Xem Ngành Đào Tạo</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
