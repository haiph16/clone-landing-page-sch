# Soonchunhyang WordPress Theme (Client)

Đây là toàn bộ mã nguồn giao diện frontend theme WordPress **Soonchunhyang University - Tailwind Edition**.

---

### 📂 Cấu Trúc Theme

- `style.css`: Khai báo thông tin theme WordPress
- `functions.php`: Đăng ký theme support, enqueue CSS/JS, localize script Nonce
- `header.php`: Thanh thông báo trên cùng và Navigation Bar toàn màn hình (Full Width)
- `footer.php`: Chân trang 4 cột, nút gọi hotline, nút chat Zalo và modal phóng to ảnh Lightbox
- `front-page.php`: Template trang chủ kết hợp toàn bộ các sections
- `index.php`: Fallback template chuẩn WordPress
- `tailwind.config.js`: Cấu hình hệ thống màu SCH và typography
- `template-parts/`: Các khối giao diện thành phần (hero-slider, stats, about, highlights, prestige, programs, jobs-guide, gallery, news, testimonials, faq, consultation-form, contact)
- `inc/`: Bộ điều khiển backend WordPress (theme-options, custom-post-types, ajax-handlers)
- `assets/`: File nguồn CSS Tailwind, JS điều khiển và thư viện ảnh

---

### 🛠️ Lệnh Biên Dịch CSS
```bash
# Biên dịch Tailwind CSS (minify):
npm run build:css

# Chế độ theo dõi file tự động:
npm run watch:css
```
