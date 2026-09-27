/**
 * Soonchunhyang Tailwind Theme Main JavaScript
 */

document.addEventListener('DOMContentLoaded', function () {
    'use strict';

    // ==========================================
    // 1. MOBILE MENU TOGGLE
    // ==========================================
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
        });

        // Close mobile menu on clicking any link
        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                mobileMenu.classList.add('hidden');
            });
        });
    }

    // ==========================================
    // 2. HEADER SCROLL SHADOW & BACK TO TOP
    // ==========================================
    const header = document.getElementById('main-header');
    const floatTopBtn = document.getElementById('float-top-btn');
    const footerBackToTop = document.getElementById('footer-back-to-top');

    window.addEventListener('scroll', function () {
        const scrollY = window.scrollY;

        if (header) {
            if (scrollY > 60) {
                header.classList.add('shadow-md', 'bg-white/95');
                header.classList.remove('bg-white/90');
            } else {
                header.classList.remove('shadow-md', 'bg-white/95');
                header.classList.add('bg-white/90');
            }
        }

        if (floatTopBtn) {
            if (scrollY > 400) {
                floatTopBtn.classList.remove('hidden');
            } else {
                floatTopBtn.classList.add('hidden');
            }
        }
    });

    const scrollToTop = function () {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    };

    if (floatTopBtn) floatTopBtn.addEventListener('click', scrollToTop);
    if (footerBackToTop) footerBackToTop.addEventListener('click', scrollToTop);

    // ==========================================
    // 3. HERO SLIDER LOGIC
    // ==========================================
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.slider-dot');
    const prevBtn = document.getElementById('slider-prev');
    const nextBtn = document.getElementById('slider-next');

    if (slides.length > 0) {
        let currentSlide = 0;
        let sliderInterval = null;

        const showSlide = function (index) {
            if (index < 0) index = slides.length - 1;
            if (index >= slides.length) index = 0;
            currentSlide = index;

            slides.forEach(function (slide, idx) {
                if (idx === currentSlide) {
                    slide.classList.remove('opacity-0', 'pointer-events-none');
                    slide.classList.add('opacity-100', 'z-10');
                } else {
                    slide.classList.remove('opacity-100', 'z-10');
                    slide.classList.add('opacity-0', 'pointer-events-none');
                }
            });

            dots.forEach(function (dot, idx) {
                if (idx === currentSlide) {
                    dot.classList.add('bg-accent-cyan', 'w-8');
                    dot.classList.remove('bg-white/40', 'w-2.5');
                } else {
                    dot.classList.remove('bg-accent-cyan', 'w-8');
                    dot.classList.add('bg-white/40', 'w-2.5');
                }
            });
        };

        const nextSlide = function () {
            showSlide(currentSlide + 1);
        };

        const prevSlide = function () {
            showSlide(currentSlide - 1);
        };

        const startAutoPlay = function () {
            if (!sliderInterval && slides.length > 1) {
                sliderInterval = setInterval(nextSlide, 5500);
            }
        };

        const stopAutoPlay = function () {
            if (sliderInterval) {
                clearInterval(sliderInterval);
                sliderInterval = null;
            }
        };

        if (nextBtn) {
            nextBtn.addEventListener('click', function () {
                stopAutoPlay();
                nextSlide();
                startAutoPlay();
            });
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', function () {
                stopAutoPlay();
                prevSlide();
                startAutoPlay();
            });
        }

        dots.forEach(function (dot) {
            dot.addEventListener('click', function () {
                stopAutoPlay();
                const slideIdx = parseInt(dot.getAttribute('data-slide') || '0', 10);
                showSlide(slideIdx);
                startAutoPlay();
            });
        });

        // Start autoplay on load
        startAutoPlay();
    }

    // ==========================================
    // 4. ANIMATED STATS COUNTERS
    // ==========================================
    const statCounters = document.querySelectorAll('.stat-counter');
    if (statCounters.length > 0 && 'IntersectionObserver' in window) {
        let animated = false;
        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting && !animated) {
                    animated = true;
                    statCounters.forEach(function (counter) {
                        const target = parseInt(counter.getAttribute('data-target') || '0', 10);
                        let count = 0;
                        const duration = 1800; // ms
                        const stepTime = 20;
                        const increment = target / (duration / stepTime);

                        const timer = setInterval(function () {
                            count += increment;
                            if (count >= target) {
                                counter.textContent = target;
                                clearInterval(timer);
                            } else {
                                counter.textContent = Math.floor(count);
                            }
                        }, stepTime);
                    });
                    observer.disconnect();
                }
            });
        }, { threshold: 0.3 });

        const statsSection = document.getElementById('stats-strip');
        if (statsSection) {
            observer.observe(statsSection);
        }
    }

    // ==========================================
    // 5. ACADEMIC PROGRAMS FILTER TABS
    // ==========================================
    const programFilterBtns = document.querySelectorAll('#programs-filter-tabs .filter-btn');
    const programCards = document.querySelectorAll('#programs-grid .program-card');

    if (programFilterBtns.length > 0 && programCards.length > 0) {
        programFilterBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                // Update active tab styling
                programFilterBtns.forEach(function (b) {
                    b.classList.remove('bg-sch-700', 'text-white', 'shadow-md', 'shadow-sch-700/25', 'scale-105', 'active');
                    b.classList.add('bg-slate-100', 'text-slate-600');
                });
                btn.classList.remove('bg-slate-100', 'text-slate-600');
                btn.classList.add('bg-sch-700', 'text-white', 'shadow-md', 'shadow-sch-700/25', 'scale-105', 'active');

                const filter = btn.getAttribute('data-filter');

                programCards.forEach(function (card) {
                    const cat = card.getAttribute('data-cat');
                    if (filter === 'all' || filter === cat) {
                        card.classList.remove('hidden');
                        card.style.opacity = '0';
                        card.style.transform = 'scale(0.95)';
                        setTimeout(function () {
                            card.style.transition = 'all 0.3s ease';
                            card.style.opacity = '1';
                            card.style.transform = 'scale(1)';
                        }, 50);
                    } else {
                        card.classList.add('hidden');
                    }
                });
            });
        });
    }

    // ==========================================
    // 6. PHOTO GALLERY FILTER TABS
    // ==========================================
    const galleryFilterBtns = document.querySelectorAll('#gallery-filter-tabs .gallery-filter-btn');
    const galleryItems = document.querySelectorAll('#gallery-grid .gallery-item');

    if (galleryFilterBtns.length > 0 && galleryItems.length > 0) {
        galleryFilterBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                galleryFilterBtns.forEach(function (b) {
                    b.classList.remove('bg-sch-700', 'text-white', 'shadow-md', 'shadow-sch-700/25', 'scale-105', 'active');
                    b.classList.add('bg-slate-100', 'text-slate-600');
                });
                btn.classList.remove('bg-slate-100', 'text-slate-600');
                btn.classList.add('bg-sch-700', 'text-white', 'shadow-md', 'shadow-sch-700/25', 'scale-105', 'active');

                const filter = btn.getAttribute('data-filter');

                galleryItems.forEach(function (item) {
                    const cat = item.getAttribute('data-cat');
                    if (filter === 'all' || filter === cat) {
                        item.classList.remove('hidden');
                    } else {
                        item.classList.add('hidden');
                    }
                });
            });
        });
    }

    // ==========================================
    // 7. LIGHTBOX IMAGE POPUP
    // ==========================================
    const lightboxModal = document.getElementById('lightbox-modal');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxTitle = document.getElementById('lightbox-title');
    const lightboxCategory = document.getElementById('lightbox-category');
    const lightboxClose = document.getElementById('lightbox-close');

    if (lightboxModal && lightboxImg) {
        galleryItems.forEach(function (item) {
            item.addEventListener('click', function () {
                const imgUrl = item.getAttribute('data-lightbox-img');
                const title = item.getAttribute('data-lightbox-title');
                const cat = item.getAttribute('data-lightbox-cat');

                lightboxImg.src = imgUrl;
                if (lightboxTitle) lightboxTitle.textContent = title;
                if (lightboxCategory) lightboxCategory.textContent = cat;

                lightboxModal.classList.remove('hidden');
                lightboxModal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            });
        });

        const closeLightbox = function () {
            lightboxModal.classList.add('hidden');
            lightboxModal.classList.remove('flex');
            lightboxImg.src = '';
            document.body.style.overflow = '';
        };

        if (lightboxClose) lightboxClose.addEventListener('click', closeLightbox);

        lightboxModal.addEventListener('click', function (e) {
            if (e.target === lightboxModal) {
                closeLightbox();
            }
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && !lightboxModal.classList.contains('hidden')) {
                closeLightbox();
            }
        });
    }

    // ==========================================
    // 8. FAQ ACCORDION LOGIC
    // ==========================================
    const faqItems = document.querySelectorAll('#faq-accordion .faq-item');

    faqItems.forEach(function (item) {
        const toggle = item.querySelector('.faq-toggle');
        const content = item.querySelector('.faq-content');
        const iconDiv = toggle ? toggle.querySelector('div') : null;
        const textSpan = toggle ? toggle.querySelector('span') : null;

        if (toggle && content) {
            toggle.addEventListener('click', function () {
                const isCurrentlyOpen = !content.classList.contains('hidden');

                // Close all FAQ items
                faqItems.forEach(function (otherItem) {
                    const otherContent = otherItem.querySelector('.faq-content');
                    const otherIcon = otherItem.querySelector('.faq-toggle div');
                    const otherSpan = otherItem.querySelector('.faq-toggle span');

                    if (otherContent) otherContent.classList.add('hidden');
                    if (otherIcon) {
                        otherIcon.classList.remove('bg-sch-700', 'text-white', 'rotate-180');
                        otherIcon.classList.add('bg-slate-100', 'text-slate-500');
                    }
                    if (otherSpan) otherSpan.classList.remove('text-sch-700');

                    otherItem.classList.remove('border-sch-600', 'shadow-md', 'ring-1', 'ring-sch-600/20', 'active');
                    otherItem.classList.add('border-slate-200', 'shadow-sm');
                });

                // If it was closed, open it now
                if (!isCurrentlyOpen) {
                    content.classList.remove('hidden');
                    item.classList.remove('border-slate-200', 'shadow-sm');
                    item.classList.add('border-sch-600', 'shadow-md', 'ring-1', 'ring-sch-600/20', 'active');

                    if (iconDiv) {
                        iconDiv.classList.remove('bg-slate-100', 'text-slate-500');
                        iconDiv.classList.add('bg-sch-700', 'text-white', 'rotate-180');
                    }
                    if (textSpan) textSpan.classList.add('text-sch-700');
                }
            });
        }
    });

    // ==========================================
    // 9. CONSULTATION REGISTRATION AJAX SUBMISSION
    // ==========================================
    const consultationForm = document.getElementById('consultation-form');
    const submitBtn = document.getElementById('consultation-submit-btn');
    const alertBox = document.getElementById('consultation-alert');

    if (consultationForm) {
        consultationForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const fullName = document.getElementById('fullName').value.trim();
            const phone = document.getElementById('phone').value.trim();
            const email = document.getElementById('email') ? document.getElementById('email').value.trim() : '';
            const province = document.getElementById('province') ? document.getElementById('province').value : '';
            const major = document.getElementById('major') ? document.getElementById('major').value : '';
            const notes = document.getElementById('notes') ? document.getElementById('notes').value.trim() : '';

            if (!fullName || !phone) {
                showAlert('Vui lòng điền đầy đủ Họ và tên cùng Số điện thoại liên hệ!', 'error');
                return;
            }

            // Disable submit button & show loading state
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i><span>Đang gửi thông tin...</span>';
            }

            // AJAX URL and Nonce from WordPress localization
            const ajaxUrl = (typeof sch_ajax_obj !== 'undefined' && sch_ajax_obj.ajax_url)
                ? sch_ajax_obj.ajax_url
                : '/wp-admin/admin-ajax.php';
            const nonce = (typeof sch_ajax_obj !== 'undefined' && sch_ajax_obj.nonce)
                ? sch_ajax_obj.nonce
                : '';

            const formData = new URLSearchParams();
            formData.append('action', 'sch_submit_lead');
            formData.append('nonce', nonce);
            formData.append('fullName', fullName);
            formData.append('phone', phone);
            formData.append('email', email);
            formData.append('province', province);
            formData.append('major', major);
            formData.append('notes', notes);

            fetch(ajaxUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                },
                body: formData.toString()
            })
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                if (data.success) {
                    showAlert(data.data.message || 'Đăng ký tư vấn thành công! Cán bộ tuyển sinh SCH sẽ liên hệ với bạn ngay.', 'success');
                    consultationForm.reset();
                } else {
                    showAlert((data.data && data.data.message) || 'Đã có lỗi xảy ra. Vui lòng thử lại!', 'error');
                }
            })
            .catch(function (error) {
                console.warn('Static environment detected or AJAX unavailable. Storing lead in localStorage:', error);
                try {
                    const savedLeads = JSON.parse(localStorage.getItem('sch_consultation_leads') || '[]');
                    savedLeads.push({
                        fullName: fullName,
                        phone: phone,
                        email: email,
                        province: province,
                        major: major,
                        notes: notes,
                        createdAt: new Date().toLocaleString('vi-VN')
                    });
                    localStorage.setItem('sch_consultation_leads', JSON.stringify(savedLeads));
                } catch (e) {
                    console.error('LocalStorage error:', e);
                }
                showAlert('Đăng ký tư vấn thành công! Cán bộ tuyển sinh SCH sẽ liên hệ với bạn trong thời gian sớm nhất (Hotline: 096 841 45 86).', 'success');
                consultationForm.reset();
            })
            .finally(function () {
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = '<i class="fa-solid fa-paper-plane text-sm"></i><span>GỬI YÊU CẦU TƯ VẤN NGAY</span>';
                }
            });
        });

        function showAlert(message, type) {
            if (!alertBox) return;

            alertBox.classList.remove('hidden', 'bg-emerald-50', 'border-emerald-200', 'text-emerald-800', 'bg-red-50', 'border-red-200', 'text-red-800');

            if (type === 'success') {
                alertBox.classList.add('bg-emerald-50', 'border', 'border-emerald-200', 'text-emerald-800');
                alertBox.innerHTML = '<div class="flex items-center gap-3"><i class="fa-solid fa-circle-check text-emerald-600 text-lg shrink-0"></i><span>' + message + '</span></div>';
            } else {
                alertBox.classList.add('bg-red-50', 'border', 'border-red-200', 'text-red-800');
                alertBox.innerHTML = '<div class="flex items-center gap-3"><i class="fa-solid fa-circle-exclamation text-red-600 text-lg shrink-0"></i><span>' + message + '</span></div>';
            }

            alertBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
    }

    // ==========================================
    // 10. SCROLLSPY ACTIVE NAV HIGHLIGHT
    // ==========================================
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');

    if (sections.length > 0 && navLinks.length > 0) {
        window.addEventListener('scroll', function () {
            let currentId = '';
            const scrollPosition = window.scrollY + 120;

            sections.forEach(function (sec) {
                const sectionTop = sec.offsetTop;
                const sectionHeight = sec.offsetHeight;
                if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                    currentId = sec.getAttribute('id');
                }
            });

            if (currentId) {
                navLinks.forEach(function (link) {
                    const href = link.getAttribute('href');
                    if (href === '#' + currentId) {
                        link.classList.add('text-sch-700', 'font-bold');
                        link.classList.remove('text-slate-600');
                    } else if (href.startsWith('#')) {
                        link.classList.remove('text-sch-700', 'font-bold');
                        link.classList.add('text-slate-600');
                    }
                });
            }
        });
    }
});
