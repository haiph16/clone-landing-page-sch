/**
 * Soonchunhyang University Vietnam Portal - Frontend Script
 */

let appData = {
  contacts: null,
  banners: [],
  gallery: [],
  news: [],
  testimonials: [],
  faqs: []
};

let currentSlideIndex = 0;
let slideInterval = null;

// Initialize on DOM Ready
document.addEventListener('DOMContentLoaded', () => {
  initNavbar();
  initCounters();
  initFormHandler();
  initLightbox();
  initFloatingActions();
  fetchPublicData();
});

// Fetch all dynamic data from Backend API
async function fetchPublicData() {
  try {
    const res = await fetch('/api/public-data');
    const result = await res.json();
    if (result.success && result.data) {
      appData = result.data;
      renderContacts(appData.contacts);
      renderBanners(appData.banners);
      renderGallery(appData.gallery);
      renderNews(appData.news);
      renderFaqs(appData.faqs);
      renderTestimonials(appData.testimonials);
    }
  } catch (err) {
    console.error('Lỗi khi tải dữ liệu từ máy chủ:', err);
  }
}

// 1. Render Contacts
function renderContacts(contacts) {
  if (!contacts) return;
  const vn = contacts.vietnamOffice || {};
  const kr = contacts.koreaHeadquarters || {};

  // Top bar & Header
  updateText('#top-hotline', vn.hotline || '096 841 45 86');
  updateHref('#top-hotline-link', `tel:${(vn.hotline || '0327366093').replace(/\s+/g, '')}`);
  updateText('#top-email', vn.email || 'haiph161299@gmail.com');
  updateHref('#top-email-link', `mailto:${vn.email || 'haiph161299@gmail.com'}`);
  updateText('#top-address', vn.currentAddress ? `Văn phòng: ${vn.currentAddress}` : '');

  // Floating Buttons
  updateHref('#float-zalo-link', vn.zalo || 'https://zalo.me/0327366093');
  updateHref('#float-phone-link', `tel:${(vn.phone || '0327366093').replace(/\s+/g, '')}`);

  // Contact section: VN Office
  updateText('#vn-office-name', vn.name || 'Văn phòng tuyển sinh SCH Việt Nam');
  updateText('#vn-address-new', vn.currentAddress || 'BT7,8,9 Lô BT3, KĐT Xuân Phương, Hà Nội');
  updateText('#vn-address-old', vn.oldAddress ? `(Địa chỉ cũ: ${vn.oldAddress})` : '');
  updateText('#vn-phone', vn.phone || '096 841 45 86');
  updateHref('#vn-phone-link', `tel:${(vn.phone || '0327366093').replace(/\s+/g, '')}`);
  updateText('#vn-email', vn.email || 'haiph161299@gmail.com');
  updateHref('#vn-email-link', `mailto:${vn.email || 'haiph161299@gmail.com'}`);
  updateText('#vn-hours', vn.workingHours || '08:00 - 17:30');

  // Map Iframe
  if (vn.mapEmbedUrl) {
    const mapEl = document.querySelector('#vn-map-iframe');
    if (mapEl) mapEl.src = vn.mapEmbedUrl;
  }

  // Contact section: Korea HQ
  updateText('#kr-hq-name', kr.name || 'Trường Đại học Soon Chun Hyang');
  updateText('#kr-hq-addr', kr.address || '22-9 Soonchunhyang-ro, Sinchang-myeon, Asan-si, Chungnam');
  updateText('#kr-hq-addr-kr', kr.addressKorean ? `(${kr.addressKorean})` : '');
  updateText('#kr-hq-phone', kr.phone || '+82-41-530-1303');
  updateHref('#kr-hq-phone-link', `tel:${(kr.phone || '+82415301303').replace(/\s+/g, '')}`);
  updateText('#kr-hq-email', kr.email || 'yecha@sch.ac.kr');
  updateHref('#kr-hq-email-link', `mailto:${kr.email || 'yecha@sch.ac.kr'}`);
  updateHref('#kr-hq-web-link', kr.website || 'https://www.sch.ac.kr');

  // Footer Contacts
  updateText('#footer-vn-addr', vn.currentAddress || '');
  updateText('#footer-vn-phone', vn.phone || '');
  updateText('#footer-vn-email', vn.email || '');
  updateText('#footer-kr-addr', kr.address || '');
  updateText('#footer-kr-phone', kr.phone || '');

  // Social Links
  updateHref('#link-fb', vn.facebook || 'https://facebook.com');
  updateHref('#link-yt', vn.youtube || 'https://youtube.com');
  updateHref('#link-zalo', vn.zalo || 'https://zalo.me/0327366093');
}

// 2. Render Hero Slider Banners
function renderBanners(banners) {
  const container = document.querySelector('#hero-slider-wrap');
  const dotsContainer = document.querySelector('#slider-dots');
  if (!container || !banners || banners.length === 0) return;

  container.innerHTML = '';
  dotsContainer.innerHTML = '';

  banners.forEach((banner, idx) => {
    const slide = document.createElement('div');
    slide.className = `slide-item ${idx === 0 ? 'active' : ''}`;
    slide.innerHTML = `
      <div class="slide-bg" style="background-image: url('${banner.imageUrl || '/images/banner-1.webp'}');"></div>
      <div class="slide-overlay"></div>
      <div class="container">
        <div class="slide-content-wrap">
          ${banner.badge ? `<div class="slide-badge"><i class="fa-solid fa-graduation-cap"></i> ${banner.badge}</div>` : ''}
          <h1 class="slide-title">${banner.title || 'Soonchunhyang University'}</h1>
          <p class="slide-desc">${banner.subtitle || ''}</p>
          <div class="slide-buttons">
            <a href="${banner.buttonLink || '#dang-ky'}" class="btn btn-primary btn-pulse">
              ${banner.buttonText || 'ĐĂNG KÝ NGAY'} <i class="fa-solid fa-arrow-right"></i>
            </a>
            ${banner.secondaryButtonText ? `
              <a href="${banner.secondaryButtonLink || '#gioi-thieu'}" class="btn btn-outline-white">
                ${banner.secondaryButtonText} <i class="fa-solid fa-circle-info"></i>
              </a>
            ` : ''}
          </div>
        </div>
      </div>
    `;
    container.appendChild(slide);

    const dot = document.createElement('div');
    dot.className = `slider-dot ${idx === 0 ? 'active' : ''}`;
    dot.addEventListener('click', () => goToSlide(idx));
    dotsContainer.appendChild(dot);
  });

  currentSlideIndex = 0;
  startSlideAutoPlay();

  // Next / Prev buttons
  const prevBtn = document.querySelector('#slider-prev-btn');
  const nextBtn = document.querySelector('#slider-next-btn');
  if (prevBtn) prevBtn.onclick = prevSlide;
  if (nextBtn) nextBtn.onclick = nextSlide;
}

function goToSlide(index) {
  const slides = document.querySelectorAll('.slide-item');
  const dots = document.querySelectorAll('.slider-dot');
  if (slides.length === 0) return;

  slides.forEach(s => s.classList.remove('active'));
  dots.forEach(d => d.classList.remove('active'));

  currentSlideIndex = (index + slides.length) % slides.length;
  slides[currentSlideIndex].classList.add('active');
  if (dots[currentSlideIndex]) dots[currentSlideIndex].classList.add('active');
}

function nextSlide() {
  goToSlide(currentSlideIndex + 1);
}

function prevSlide() {
  goToSlide(currentSlideIndex - 1);
}

function startSlideAutoPlay() {
  if (slideInterval) clearInterval(slideInterval);
  slideInterval = setInterval(nextSlide, 6000);

  const heroWrap = document.querySelector('.hero-slider-section');
  if (heroWrap) {
    heroWrap.onmouseenter = () => clearInterval(slideInterval);
    heroWrap.onmouseleave = () => {
      slideInterval = setInterval(nextSlide, 6000);
    };
  }
}

// 3. Render Photo Gallery
function renderGallery(gallery) {
  const grid = document.querySelector('#gallery-grid');
  if (!grid || !gallery) return;

  window.allGalleryItems = gallery;
  filterGallery('all');

  // Filter Buttons
  const filterBtns = document.querySelectorAll('.gallery-tab-btn');
  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      filterGallery(btn.dataset.category);
    });
  });
}

function filterGallery(category) {
  const grid = document.querySelector('#gallery-grid');
  if (!grid || !window.allGalleryItems) return;

  const items = category === 'all'
    ? window.allGalleryItems
    : window.allGalleryItems.filter(item => item.category === category);

  grid.innerHTML = items.map(item => `
    <div class="gallery-card" onclick="openLightbox('${item.imageUrl}', '${item.title}')">
      <img src="${item.imageUrl}" alt="${item.title}" loading="lazy" />
      <div class="gallery-card-overlay">
        <span class="gallery-cat">${formatCategory(item.category)}</span>
        <h4 class="gallery-title">${item.title}</h4>
      </div>
    </div>
  `).join('');
}

function formatCategory(cat) {
  const map = {
    campus: 'Khuôn viên trường',
    dormitory: 'Ký túc xá',
    hospital: 'Bệnh viện SCH',
    activities: 'Hoạt động & Sự kiện'
  };
  return map[cat] || 'Hình ảnh';
}

// 4. Render News
function renderNews(news) {
  const grid = document.querySelector('#news-grid');
  if (!grid || !news) return;

  grid.innerHTML = news.slice(0, 3).map(item => `
    <article class="news-card">
      <div class="news-thumb-wrap">
        <img src="${item.imageUrl || '/images/news-office.jpg'}" alt="${item.title}" loading="lazy" />
        <span class="news-cat-badge">${item.category || 'Tin tức'}</span>
      </div>
      <div class="news-body">
        <div class="news-meta">
          <span><i class="fa-regular fa-calendar"></i> ${formatDate(item.date)}</span>
          <span><i class="fa-regular fa-user"></i> ${item.author || 'SCH Vietnam'}</span>
        </div>
        <h3 class="news-title">${item.title}</h3>
        <p class="news-summary">${item.summary || ''}</p>
        <a href="#dang-ky" class="news-read-more">
          Chi tiết bài viết <i class="fa-solid fa-arrow-right"></i>
        </a>
      </div>
    </article>
  `).join('');
}

// 5. Render FAQs
function renderFaqs(faqs) {
  const wrap = document.querySelector('#faq-accordion-wrap');
  if (!wrap || !faqs) return;

  wrap.innerHTML = faqs.map((faq, idx) => `
    <div class="faq-item ${idx === 0 ? 'active' : ''}">
      <div class="faq-question">
        <span>${faq.question}</span>
        <div class="faq-icon"><i class="fa-solid fa-chevron-down"></i></div>
      </div>
      <div class="faq-answer" style="${idx === 0 ? 'max-height: 500px;' : ''}">
        <p>${faq.answer}</p>
      </div>
    </div>
  `).join('');

  // Attach accordion click events
  wrap.querySelectorAll('.faq-question').forEach(q => {
    q.addEventListener('click', () => {
      const item = q.parentElement;
      const answer = item.querySelector('.faq-answer');
      const isActive = item.classList.contains('active');

      // Close other items
      wrap.querySelectorAll('.faq-item').forEach(other => {
        other.classList.remove('active');
        other.querySelector('.faq-answer').style.maxHeight = null;
      });

      if (!isActive) {
        item.classList.add('active');
        answer.style.maxHeight = `${answer.scrollHeight + 30}px`;
      }
    });
  });
}

// 6. Render Testimonials
function renderTestimonials(testimonials) {
  const track = document.querySelector('#testimonials-track');
  if (!track || !testimonials) return;

  track.innerHTML = testimonials.slice(0, 3).map(t => `
    <div class="testimonial-card">
      <p class="testimonial-text">${t.text}</p>
      <div class="testimonial-author">
        <img class="author-avatar" src="${t.avatar || '/images/student-klb.jpg'}" alt="${t.name}" />
        <div class="author-info">
          <h4>${t.name}</h4>
          <p>${t.role}</p>
        </div>
      </div>
    </div>
  `).join('');
}

// 7. Form Submission Handler
function initFormHandler() {
  const form = document.querySelector('#consultation-form');
  if (!form) return;

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const btn = form.querySelector('button[type="submit"]');
    const originalText = btn.innerHTML;

    const fullName = form.querySelector('[name="fullName"]').value.trim();
    const phone = form.querySelector('[name="phone"]').value.trim();
    const email = form.querySelector('[name="email"]').value.trim();
    const province = form.querySelector('[name="province"]').value;
    const major = form.querySelector('[name="major"]').value;
    const notes = form.querySelector('[name="notes"]').value.trim();

    if (!fullName || !phone) {
      showToast('Vui lòng nhập Họ tên và Số điện thoại', 'error');
      return;
    }

    try {
      btn.disabled = true;
      btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Đang gửi yêu cầu...';

      const res = await fetch('/api/leads', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ fullName, phone, email, province, major, notes })
      });

      const data = await res.json();
      if (data.success) {
        showToast('Đăng ký tư vấn thành công! Văn phòng tuyển sinh SCH sẽ liên hệ với bạn ngay.', 'success');
        form.reset();
      } else {
        showToast(data.message || 'Đã có lỗi xảy ra', 'error');
      }
    } catch (err) {
      showToast('Không thể kết nối đến máy chủ. Vui lòng thử lại sau!', 'error');
    } finally {
      btn.disabled = false;
      btn.innerHTML = originalText;
    }
  });
}

// 8. Sticky Navbar & Mobile Navigation
function initNavbar() {
  const header = document.querySelector('.main-header');
  const toggle = document.querySelector('.mobile-toggle');
  const navLinks = document.querySelector('.nav-links');

  window.addEventListener('scroll', () => {
    if (window.scrollY > 40) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  });

  if (toggle && navLinks) {
    toggle.addEventListener('click', () => {
      navLinks.classList.toggle('open');
      const icon = toggle.querySelector('i');
      if (icon) {
        icon.classList.toggle('fa-bars');
        icon.classList.toggle('fa-xmark');
      }
    });

    navLinks.querySelectorAll('a').forEach(a => {
      a.addEventListener('click', () => {
        navLinks.classList.remove('open');
        const icon = toggle.querySelector('i');
        if (icon) {
          icon.classList.add('fa-bars');
          icon.classList.remove('fa-xmark');
        }
      });
    });
  }

  // Active Link on Scroll
  const sections = document.querySelectorAll('section[id]');
  window.addEventListener('scroll', () => {
    const scrollY = window.pageYOffset + 150;
    sections.forEach(current => {
      const sectionHeight = current.offsetHeight;
      const sectionTop = current.offsetTop;
      const sectionId = current.getAttribute('id');
      const link = document.querySelector(`.nav-links a[href*="${sectionId}"]`);
      if (link) {
        if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
          link.classList.add('active');
        } else {
          link.classList.remove('active');
        }
      }
    });
  });
}

// 9. Lightbox Functionality
function initLightbox() {
  const modal = document.querySelector('#lightbox-modal');
  const closeBtn = document.querySelector('#lightbox-close');
  if (!modal) return;

  closeBtn.onclick = () => modal.classList.remove('active');
  modal.onclick = (e) => {
    if (e.target === modal) modal.classList.remove('active');
  };

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal.classList.contains('active')) {
      modal.classList.remove('active');
    }
  });
}

function openLightbox(imageUrl, title) {
  const modal = document.querySelector('#lightbox-modal');
  const img = document.querySelector('#lightbox-img');
  const caption = document.querySelector('#lightbox-caption');
  if (!modal || !img) return;

  img.src = imageUrl;
  caption.textContent = title || '';
  modal.classList.add('active');
}

// 10. Floating Actions & Back to top
function initFloatingActions() {
  const topBtn = document.querySelector('#float-top-btn');
  if (!topBtn) return;

  window.addEventListener('scroll', () => {
    if (window.scrollY > 400) {
      topBtn.classList.add('show');
    } else {
      topBtn.classList.remove('show');
    }
  });

  topBtn.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
}

// 11. Counters Animation
function initCounters() {
  const counters = document.querySelectorAll('.stat-number[data-target]');
  let animated = false;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting && !animated) {
        animated = true;
        counters.forEach(counter => {
          const target = +counter.getAttribute('data-target');
          const suffix = counter.getAttribute('data-suffix') || '';
          let count = 0;
          const step = Math.max(1, Math.ceil(target / 40));
          const timer = setInterval(() => {
            count += step;
            if (count >= target) {
              counter.innerHTML = `${target}<span>${suffix}</span>`;
              clearInterval(timer);
            } else {
              counter.innerHTML = `${count}<span>${suffix}</span>`;
            }
          }, 35);
        });
      }
    });
  }, { threshold: 0.3 });

  const statsSection = document.querySelector('.stats-strip');
  if (statsSection) observer.observe(statsSection);
}

// Toast Notifications
function showToast(message, type = 'success') {
  let container = document.querySelector('.toast-container');
  if (!container) {
    container = document.createElement('div');
    container.className = 'toast-container';
    document.body.appendChild(container);
  }

  const toast = document.createElement('div');
  toast.className = `toast ${type}`;
  toast.innerHTML = `
    <i class="fa-solid ${type === 'success' ? 'fa-circle-check' : 'fa-circle-exclamation'}"></i>
    <span>${message}</span>
  `;
  container.appendChild(toast);

  setTimeout(() => {
    toast.style.opacity = '0';
    toast.style.transform = 'translateX(100%)';
    toast.style.transition = 'all 0.4s ease';
    setTimeout(() => toast.remove(), 400);
  }, 4500);
}

// Utility Helpers
function updateText(selector, text) {
  const el = document.querySelector(selector);
  if (el) el.textContent = text;
}

function updateHref(selector, href) {
  const el = document.querySelector(selector);
  if (el) el.setAttribute('href', href);
}

function formatDate(dateStr) {
  if (!dateStr) return '';
  const d = new Date(dateStr);
  if (isNaN(d.getTime())) return dateStr;
  return `${d.getDate().toString().padStart(2, '0')}/${(d.getMonth() + 1).toString().padStart(2, '0')}/${d.getFullYear()}`;
}
