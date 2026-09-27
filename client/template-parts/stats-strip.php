<?php
/**
 * Template Part: Stats Strip
 *
 * @package Soonchunhyang
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<div id="stats-strip" class="bg-gradient-to-r from-sch-950 via-sch-900 to-sch-950 text-white py-12 relative z-30 border-y border-white/10 shadow-xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Stat 1 -->
            <div class="flex items-center gap-5 p-4 rounded-2xl bg-white/5 border border-white/10 hover:border-accent-cyan/40 hover:bg-white/10 transition-all duration-300 group">
                <div class="w-14 h-14 rounded-xl bg-accent-cyan/15 border border-accent-cyan/30 flex items-center justify-center text-accent-cyan shrink-0 group-hover:scale-110 group-hover:bg-accent-cyan group-hover:text-sch-950 transition-all duration-300">
                    <i class="fa-solid fa-passport text-2xl"></i>
                </div>
                <div>
                    <div class="text-3xl font-extrabold text-white tracking-tight leading-none mb-1 stat-counter" data-target="90" data-suffix="%">
                        0%
                    </div>
                    <div class="text-sm font-bold text-slate-200">Tỷ Lệ Xét Đỗ Visa</div>
                    <div class="text-xs text-slate-400 mt-0.5">Top đầu Hàn Quốc, bảo lãnh uy tín</div>
                </div>
            </div>

            <!-- Stat 2 -->
            <div class="flex items-center gap-5 p-4 rounded-2xl bg-white/5 border border-white/10 hover:border-accent-cyan/40 hover:bg-white/10 transition-all duration-300 group">
                <div class="w-14 h-14 rounded-xl bg-accent-cyan/15 border border-accent-cyan/30 flex items-center justify-center text-accent-cyan shrink-0 group-hover:scale-110 group-hover:bg-accent-cyan group-hover:text-sch-950 transition-all duration-300">
                    <i class="fa-solid fa-trophy text-2xl"></i>
                </div>
                <div>
                    <div class="text-3xl font-extrabold text-white tracking-tight leading-none mb-1 stat-counter" data-target="5" data-prefix="Top ">
                        Top 0
                    </div>
                    <div class="text-sm font-bold text-slate-200">Đại Học Toàn Quốc</div>
                    <div class="text-xs text-slate-400 mt-0.5">Bảng xếp hạng THE Impact Rankings</div>
                </div>
            </div>

            <!-- Stat 3 -->
            <div class="flex items-center gap-5 p-4 rounded-2xl bg-white/5 border border-white/10 hover:border-accent-cyan/40 hover:bg-white/10 transition-all duration-300 group">
                <div class="w-14 h-14 rounded-xl bg-accent-cyan/15 border border-accent-cyan/30 flex items-center justify-center text-accent-cyan shrink-0 group-hover:scale-110 group-hover:bg-accent-cyan group-hover:text-sch-950 transition-all duration-300">
                    <i class="fa-solid fa-won-sign text-2xl"></i>
                </div>
                <div>
                    <div class="text-3xl font-extrabold text-white tracking-tight leading-none mb-1 stat-counter" data-target="100" data-suffix=" Tỷ Won">
                        0 Tỷ Won
                    </div>
                    <div class="text-sm font-bold text-slate-200">Gói Tài Trợ 5 Năm</div>
                    <div class="text-xs text-slate-400 mt-0.5">Dự án Đại học Toàn cầu chính phủ</div>
                </div>
            </div>

            <!-- Stat 4 -->
            <div class="flex items-center gap-5 p-4 rounded-2xl bg-white/5 border border-white/10 hover:border-accent-cyan/40 hover:bg-white/10 transition-all duration-300 group">
                <div class="w-14 h-14 rounded-xl bg-accent-cyan/15 border border-accent-cyan/30 flex items-center justify-center text-accent-cyan shrink-0 group-hover:scale-110 group-hover:bg-accent-cyan group-hover:text-sch-950 transition-all duration-300">
                    <i class="fa-solid fa-hotel text-2xl"></i>
                </div>
                <div>
                    <div class="text-3xl font-extrabold text-white tracking-tight leading-none mb-1 stat-counter" data-target="4000" data-suffix="+">
                        0+
                    </div>
                    <div class="text-sm font-bold text-slate-200">Chỗ Ở KTX Chuẩn 5 Sao</div>
                    <div class="text-xs text-slate-400 mt-0.5">4 cụm ký túc xá rộng lớn, tiện nghi</div>
                </div>
            </div>
        </div>
    </div>
</div>
