<?php
/**
 * Template Part: Frequently Asked Questions Accordion
 * Dữ liệu quản lý qua: wp-admin → Cài Đặt SCH → Câu Hỏi Thường Gặp
 *
 * @package Soonchunhyang
 */

if (!defined('ABSPATH')) {
    exit;
}

$faqs = array();
for ($i = 1; $i <= 5; $i++) {
    $q = sch_get_option("faq{$i}_q", '');
    $a = sch_get_option("faq{$i}_a", '');
    if (!empty($q) && !empty($a)) {
        $faqs[] = array('id' => $i, 'question' => $q, 'answer' => $a);
    }
}

// Default fallback nếu chưa có settings
if (empty($faqs)) {
    $faqs = array(
        array('id' => 1, 'question' => 'Chưa biết tiếng Hàn có thể đăng ký du học trường Soonchunhyang được không?', 'answer' => 'Hoàn toàn được! Bạn có thể đăng ký khóa đào tạo tiếng Hàn hệ Visa D4-1 tại Viện Giáo dục Quốc tế của trường. Khóa học được thiết kế chuyên biệt từ sơ cấp đến nâng cao giúp học viên đạt TOPIK 3 - 4 chỉ sau 1 năm để chuyển tiếp thẳng lên hệ Đại học chính quy.'),
        array('id' => 2, 'question' => 'Trường có những chính sách học bổng nào cho du học sinh Việt Nam?', 'answer' => 'SCH dành riêng nhiều suất học bổng từ 30% đến 100% học phí kỳ đầu tiên cho sinh viên Việt Nam căn cứ trên chứng chỉ ngoại ngữ (TOPIK 3 trở lên hoặc IELTS từ 5.5). Từ kỳ thứ 2, sinh viên duy trì GPA xuất sắc sẽ tiếp tục nhận học bổng khuyến khích học tập của nhà trường.'),
        array('id' => 3, 'question' => 'Chi phí ký túc xá và sinh hoạt tại thành phố Asan thế nào so với Seoul?', 'answer' => 'Ký túc xá SCH có 4 tòa nhà hiện đại đầy đủ phòng gym, thư viện, nhà ăn với mức phí rất hợp lý (khoảng 800.000 - 1.200.000 KRW/kỳ 4 tháng). Chi phí sinh hoạt tại Asan chỉ bằng 50% - 60% so với khu vực trung tâm Seoul nhưng tàu điện ngầm tuyến số 1 kết nối thẳng tới Seoul chỉ mất khoảng 1 giờ.'),
        array('id' => 4, 'question' => 'Du học hệ D2-2 tại SCH có phải phỏng vấn tại Đại sứ quán không?', 'answer' => 'Đại học Soonchunhyang là trường thuộc diện ưu tiên cao của Bộ Giáo dục và Bộ Tư pháp Hàn Quốc. Do đó, học sinh nộp hồ sơ hệ Đại học chính quy D2-2 được hưởng đặc quyền MIỄN PHỎNG VẤN tại Đại sứ quán / Tổng Lãnh sự quán Hàn Quốc, thủ tục ra visa nhanh chóng và thuận lợi hơn rất nhiều.'),
        array('id' => 5, 'question' => 'Sau khi tốt nghiệp cử nhân tại SCH, cơ hội việc làm và định cư tại Hàn Quốc ra sao?', 'answer' => 'Trung tâm University Job Plus của trường hỗ trợ sinh viên đổi sang Visa tìm việc D-10 (thời hạn 2 năm), kết nối phỏng vấn với các đối tác doanh nghiệp lớn tại Hàn Quốc và hướng dẫn chuyển đổi lên Visa tay nghề cao E-7 hoặc Visa định cư thường trú F-2.'),
    );
}
?>

<section id="faq" class="py-24 bg-slate-50 relative">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 bg-sch-100 text-sch-800 px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider mb-4 border border-sch-200">
                <i class="fa-solid fa-circle-question text-sch-700"></i>
                <span>Giải Đáp Thắc Mắc</span>
            </div>

            <h2 class="text-3xl sm:text-4xl font-extrabold text-sch-950 tracking-tight leading-tight mb-4">
                Câu Hỏi Thường Gặp Về
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-sch-700 to-accent-cyan">
                    Du Học SCH
                </span>
            </h2>

            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                Tổng hợp những câu hỏi phụ huynh và học sinh quan tâm nhiều nhất khi chuẩn bị hồ sơ du học Hàn Quốc.
            </p>
        </div>

        <div class="space-y-4" id="faq-accordion">
            <?php foreach ($faqs as $index => $faq) : ?>
                <div class="faq-item bg-white rounded-2xl border <?php echo $index === 0 ? 'border-sch-600 shadow-md ring-1 ring-sch-600/20 active' : 'border-slate-200 hover:border-slate-300 shadow-sm'; ?> transition-all duration-300 overflow-hidden">
                    <button
                        type="button"
                        class="faq-toggle w-full py-5 px-6 sm:px-8 flex items-center justify-between gap-4 text-left font-bold text-base sm:text-lg text-sch-950 transition-colors"
                    >
                        <span class="<?php echo $index === 0 ? 'text-sch-700' : ''; ?>">
                            <?php echo esc_html($faq['question']); ?>
                        </span>
                        <div class="w-8 h-8 rounded-full flex items-center justify-center shrink-0 transition-transform duration-300 <?php echo $index === 0 ? 'bg-sch-700 text-white rotate-180' : 'bg-slate-100 text-slate-500'; ?>">
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </div>
                    </button>

                    <div class="faq-content px-6 sm:px-8 pb-6 pt-1 text-slate-600 text-sm sm:text-base leading-relaxed border-t border-slate-100 <?php echo $index === 0 ? '' : 'hidden'; ?>">
                        <p><?php echo nl2br(esc_html($faq['answer'])); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
