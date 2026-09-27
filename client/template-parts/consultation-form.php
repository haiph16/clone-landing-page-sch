<?php
/**
 * Template Part: Admissions Consultation Registration Form (AJAX enabled)
 *
 * @package Soonchunhyang
 */

if (!defined('ABSPATH')) {
    exit;
}

$hotline = sch_get_option('vn_hotline');
$address = sch_get_option('vn_currentAddress');
?>

<section id="dang-ky" class="py-24 bg-gradient-to-br from-sch-950 via-sch-900 to-sch-850 text-white relative overflow-hidden">
    <!-- Decorative background circles -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-accent-cyan/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-sch-600/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <!-- Left Info -->
            <div class="lg:col-span-5">
                <span class="inline-block bg-accent-cyan/20 text-accent-cyan border border-accent-cyan/30 px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-6">
                    TUYỂN SINH KỲ MỚI 2025 - 2026
                </span>

                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-tight mb-6">
                    Đăng Ký Tư Vấn &amp;
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-accent-cyan to-sky-300">
                        Nhận Hồ Sơ Miễn Phí
                    </span>
                </h2>

                <p class="text-slate-300 text-base leading-relaxed mb-8">
                    Điền thông tin vào mẫu đăng ký, chuyên viên Văn phòng tuyển sinh Đại học Soonchunhyang tại Hà Nội sẽ liên hệ hỗ trợ lộ trình du học, điều kiện học bổng và thủ tục visa hoàn toàn miễn phí.
                </p>

                <div class="space-y-4">
                    <div class="flex items-center gap-4 p-4 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md">
                        <div class="w-12 h-12 rounded-xl bg-accent-cyan/15 flex items-center justify-center text-accent-cyan shrink-0 text-xl">
                            <i class="fa-solid fa-phone animate-pulse"></i>
                        </div>
                        <div>
                            <div class="text-xs text-slate-400 font-semibold uppercase">Hotline Tiếp Nhận Hồ Sơ:</div>
                            <a href="tel:<?php echo esc_attr(str_replace(' ', '', $hotline)); ?>" class="text-lg font-bold text-white hover:text-accent-cyan transition-colors">
                                <?php echo esc_html($hotline); ?>
                            </a>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 p-4 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md">
                        <div class="w-12 h-12 rounded-xl bg-accent-gold/15 flex items-center justify-center text-accent-gold shrink-0 text-xl">
                            <i class="fa-solid fa-building-columns"></i>
                        </div>
                        <div>
                            <div class="text-xs text-slate-400 font-semibold uppercase">Văn Phòng Đại Diện Tại Việt Nam:</div>
                            <div class="text-sm font-bold text-white line-clamp-1">
                                <?php echo esc_html($address); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Form Card -->
            <div class="lg:col-span-7">
                <div class="bg-white text-slate-900 rounded-3xl p-8 sm:p-10 shadow-2xl border border-slate-100 relative">
                    <h3 class="text-2xl font-extrabold text-sch-950 mb-2">
                        Phiếu Đăng Ký Tư Vấn Trực Tuyến
                    </h3>
                    <p class="text-slate-500 text-sm mb-8">
                        Thông tin được bảo mật và phục vụ trực tiếp cho công tác tư vấn tuyển sinh SCH.
                    </p>

                    <!-- Alert message container -->
                    <div id="consultation-alert" class="hidden mb-6 p-4 rounded-2xl text-sm font-semibold"></div>

                    <form id="consultation-form" class="space-y-5">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="fullName" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                                    Họ và Tên <span class="text-red-500">*</span>
                                </label>
                                <input
                                    type="text"
                                    id="fullName"
                                    name="fullName"
                                    required
                                    placeholder="Nguyễn Văn A"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-sch-600 focus:bg-white transition-all"
                                />
                            </div>

                            <div>
                                <label for="phone" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                                    Số Điện Thoại / Zalo <span class="text-red-500">*</span>
                                </label>
                                <input
                                    type="tel"
                                    id="phone"
                                    name="phone"
                                    required
                                    placeholder="0987 654 321"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-sch-600 focus:bg-white transition-all"
                                />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                                    Email Liên Hệ
                                </label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    placeholder="example@gmail.com"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-sch-600 focus:bg-white transition-all"
                                />
                            </div>

                            <div>
                                <label for="province" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                                    Tỉnh / Thành Phố
                                </label>
                                <select
                                    id="province"
                                    name="province"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-sch-600 focus:bg-white transition-all"
                                >
                                    <option value="Hà Nội">Hà Nội</option>
                                    <option value="Hồ Chí Minh">TP. Hồ Chí Minh</option>
                                    <option value="Hải Phòng">Hải Phòng</option>
                                    <option value="Đà Nẵng">Đà Nẵng</option>
                                    <option value="Nghệ An">Nghệ An</option>
                                    <option value="Thanh Hóa">Thanh Hóa</option>
                                    <option value="Hà Tĩnh">Hà Tĩnh</option>
                                    <option value="Nam Định">Nam Định</option>
                                    <option value="Bắc Ninh">Bắc Ninh</option>
                                    <option value="Quảng Ninh">Quảng Ninh</option>
                                    <option value="Khác">Tỉnh / Thành khác</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="major" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                                Chuyên Ngành Hoặc Hệ Đào Tạo Quan Tâm
                            </label>
                            <select
                                id="major"
                                name="major"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-sch-600 focus:bg-white transition-all"
                            >
                                <option value="Hệ tiếng D4-1 (Học tiếng Hàn)">Hệ tiếng D4-1 (Khóa học tiếng Hàn)</option>
                                <option value="Y khoa & Điều dưỡng Đa khoa">Y khoa &amp; Điều dưỡng</option>
                                <option value="Khoa học AI & CNTT">Trí tuệ nhân tạo (AI) &amp; Công nghệ thông tin</option>
                                <option value="Kỹ thuật Dữ liệu lớn (Big Data)">Kỹ thuật Dữ liệu lớn (Big Data)</option>
                                <option value="Quản trị Kinh doanh & Tài chính IT">Quản trị Kinh doanh &amp; Tài chính IT</option>
                                <option value="Kiến trúc xanh & Thiết kế">Kiến trúc &amp; Đô thị thông minh</option>
                                <option value="Ngôn ngữ & Văn hóa Hàn Quốc">Ngôn ngữ &amp; Văn hóa Hàn Quốc</option>
                                <option value="Chuyên ngành khác">Chuyên ngành khác</option>
                            </select>
                        </div>

                        <div>
                            <label for="notes" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                                Ghi Chú Hoặc Câu Hỏi Cần Giải Đáp
                            </label>
                            <textarea
                                id="notes"
                                name="notes"
                                rows="3"
                                placeholder="Ví dụ: Em muốn tìm hiểu học bổng kỳ tháng 9, đã có TOPIK 2..."
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-sch-600 focus:bg-white transition-all resize-none"
                            ></textarea>
                        </div>

                        <button
                            type="submit"
                            id="consultation-submit-btn"
                            class="w-full inline-flex items-center justify-center gap-2 bg-gradient-to-r from-sch-700 to-sch-800 hover:from-sch-600 hover:to-sch-700 text-white font-bold text-base py-4 rounded-xl shadow-lg shadow-sch-700/30 transition-all hover:scale-[1.01] disabled:opacity-70 cursor-pointer"
                        >
                            <i class="fa-solid fa-paper-plane text-sm"></i>
                            <span>GỬI YÊU CẦU TƯ VẤN NGAY</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
