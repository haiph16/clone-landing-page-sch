<?php
/**
 * Front Page Template
 *
 * @package Soonchunhyang
 */

get_header();

// 1. Hero Banner Slider
get_template_part('template-parts/hero-slider');

// 2. Key Stats Strip
get_template_part('template-parts/stats-strip');

// 3. About University
get_template_part('template-parts/about');

// 4. Core Highlights & Advantages
get_template_part('template-parts/highlights');

// 5. Global Prestige & Rankings
get_template_part('template-parts/prestige');

// 6. Academic Programs & Majors
get_template_part('template-parts/programs');

// 7. Jobs Guide & Visa Policies (D4-1 vs D2-2)
get_template_part('template-parts/jobs-guide');

// 8. Photo Gallery & Lightbox
get_template_part('template-parts/gallery');

// 9. News & Announcements
get_template_part('template-parts/news');

// 10. Student Testimonials
get_template_part('template-parts/testimonials');

// 11. FAQ Accordion
get_template_part('template-parts/faq');

// 12. Admissions Consultation Form (AJAX)
get_template_part('template-parts/consultation-form');

// 13. Contact & Office Locations
get_template_part('template-parts/contact');

get_footer();
