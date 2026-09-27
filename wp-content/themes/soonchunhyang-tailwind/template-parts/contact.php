<?php
/**
 * Template Part: Contact Details & Office Addresses
 *
 * @package Soonchunhyang
 */

if (!defined('ABSPATH')) {
    exit;
}

$vn_name        = sch_get_option('vn_name');
$vn_curr_addr   = sch_get_option('vn_currentAddress');
$vn_old_addr    = sch_get_option('vn_oldAddress');
$vn_hotline     = sch_get_option('vn_hotline');
$vn_email       = sch_get_option('vn_email');
$vn_hours       = sch_get_option('vn_workingHours');
$vn_map         = sch_get_option('vn_mapEmbedUrl');

$kr_name        = sch_get_option('kr_name');
$kr_addr        = sch_get_option('kr_address');
$kr_addr_kr     = sch_get_option('kr_addressKorean');
$kr_phone       = sch_get_option('kr_phone');
$kr_email       = sch_get_option('kr_email');
$kr_website     = sch_get_option('kr_website');
?>

<section id="lien-he" class="py-24 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 bg-sch-50 border border-sch-200 text-sch-700 px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider mb-4">
                <i class="fa-solid fa-map-location-dot text-xs"></i>
                <span>Địa Điểm &amp; Liên Hệ</span>
            </div>

            <h2 class="text-3xl sm:text-4xl font-extrabold text-sch-950 tracking-tight leading-tight mb-4">
                Văn Phòng Tuyển Sinh &amp;
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-sch-700 to-accent-cyan">
                    Trụ Sở SCH
                </span>
            </h2>

            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                Quý phụ huynh và học sinh có thể đến trực tiếp văn phòng tại Hà Nội để được tư vấn hồ sơ chi tiết.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
            <!-- Vietnam Representative Office Card -->
            <div class="bg-slate-50 rounded-3xl p-8 sm:p-10 border border-slate-200 shadow-md flex flex-col justify-between">
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <span class="text-3xl">🇻🇳</span>
                        <div>
                            <h3 class="text-xl font-bold text-sch-950"><?php echo esc_html($vn_name); ?></h3>
                            <p class="text-xs text-slate-500 font-medium">Đại diện tuyển sinh chính thức tại Hà Nội</p>
                        </div>
                    </div>

                    <div class="space-y-4 mb-8 text-sm">
                        <div class="flex items-start gap-3">
                            <i class="fa-solid fa-location-dot text-sch-700 shrink-0 mt-1"></i>
                            <div>
                                <strong class="text-slate-900 block font-bold">Địa chỉ mới (Hiện tại):</strong>
                                <span class="text-slate-600"><?php echo esc_html($vn_curr_addr); ?></span>
                                <?php if (!empty($vn_old_addr)) : ?>
                                    <div class="text-xs text-slate-400 mt-1">
                                        (Địa chỉ cũ: <?php echo esc_html($vn_old_addr); ?>)
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <i class="fa-solid fa-phone text-sch-700 shrink-0 mt-1"></i>
                            <div>
                                <strong class="text-slate-900 block font-bold">Hotline tư vấn:</strong>
                                <a href="tel:<?php echo esc_attr(str_replace(' ', '', $vn_hotline)); ?>" class="text-sch-700 font-extrabold text-base hover:underline">
                                    <?php echo esc_html($vn_hotline); ?>
                                </a>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <i class="fa-solid fa-envelope text-sch-700 shrink-0 mt-1"></i>
                            <div>
                                <strong class="text-slate-900 block font-bold">Email tiếp nhận:</strong>
                                <a href="mailto:<?php echo esc_attr($vn_email); ?>" class="text-slate-600 hover:text-sch-700">
                                    <?php echo esc_html($vn_email); ?>
                                </a>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <i class="fa-regular fa-clock text-sch-700 shrink-0 mt-1"></i>
                            <div>
                                <strong class="text-slate-900 block font-bold">Giờ làm việc:</strong>
                                <span class="text-slate-600"><?php echo esc_html($vn_hours); ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Embedded Google Maps -->
                <div class="rounded-2xl overflow-hidden border border-slate-200 shadow-inner h-60 w-full mt-4">
                    <iframe
                        title="Bản đồ văn phòng SCH"
                        src="<?php echo esc_url($vn_map); ?>"
                        class="w-full h-full border-0"
                        loading="lazy"
                        allowfullscreen
                    ></iframe>
                </div>
            </div>

            <!-- Korea Headquarters Card -->
            <div class="bg-slate-50 rounded-3xl p-8 sm:p-10 border border-slate-200 shadow-md flex flex-col justify-between">
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <span class="text-3xl">🇰🇷</span>
                        <div>
                            <h3 class="text-xl font-bold text-sch-950"><?php echo esc_html($kr_name); ?></h3>
                            <p class="text-xs text-slate-500 font-medium">Trụ sở chính tại Hàn Quốc</p>
                        </div>
                    </div>

                    <div class="space-y-4 mb-8 text-sm">
                        <div class="flex items-start gap-3">
                            <i class="fa-solid fa-building-columns text-sch-700 shrink-0 mt-1"></i>
                            <div>
                                <strong class="text-slate-900 block font-bold">Địa chỉ trường:</strong>
                                <span class="text-slate-600 block"><?php echo esc_html($kr_addr); ?></span>
                                <?php if (!empty($kr_addr_kr)) : ?>
                                    <span class="text-xs text-slate-400 block mt-0.5">(<?php echo esc_html($kr_addr_kr); ?>)</span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <i class="fa-solid fa-phone text-sch-700 shrink-0 mt-1"></i>
                            <div>
                                <strong class="text-slate-900 block font-bold">Điện thoại quốc tế:</strong>
                                <a href="tel:<?php echo esc_attr(str_replace(array(' ', '-'), '', $kr_phone)); ?>" class="text-sch-700 font-extrabold hover:underline">
                                    <?php echo esc_html($kr_phone); ?>
                                </a>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <i class="fa-solid fa-envelope text-sch-700 shrink-0 mt-1"></i>
                            <div>
                                <strong class="text-slate-900 block font-bold">Email ban đối ngoại:</strong>
                                <a href="mailto:<?php echo esc_attr($kr_email); ?>" class="text-slate-600 hover:text-sch-700">
                                    <?php echo esc_html($kr_email); ?>
                                </a>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <i class="fa-solid fa-globe text-sch-700 shrink-0 mt-1"></i>
                            <div>
                                <strong class="text-slate-900 block font-bold">Website chính thức:</strong>
                                <a href="<?php echo esc_url($kr_website); ?>" target="_blank" rel="noreferrer" class="text-sch-700 hover:underline">
                                    www.sch.ac.kr
                                </a>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <i class="fa-solid fa-hospital text-sch-700 shrink-0 mt-1"></i>
                            <div>
                                <strong class="text-slate-900 block font-bold">Hệ thống 4 bệnh viện đại học:</strong>
                                <span class="text-slate-600">Bệnh viện SCH Seoul • Bucheon • Cheonan • Gumi</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-sch-50 border border-sch-200/80 rounded-2xl p-6 mt-4">
                    <div class="flex items-center gap-2 text-sch-900 font-bold text-sm mb-1">
                        <i class="fa-solid fa-shield-halved text-sch-700"></i>
                        <span>Cam kết hỗ trợ học sinh trọn đời</span>
                    </div>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        Văn phòng đại diện tại Việt Nam trực tiếp hỗ trợ dịch thuật, hoàn thiện hồ sơ xin thư mời, hướng dẫn chứng minh tài chính và bảo trợ học tập tại Hàn Quốc không qua trung gian.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
