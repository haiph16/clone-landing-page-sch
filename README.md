# Cổng Thông Tin Tuyển Sinh Đại Học Soonchunhyang (SCH Vietnam)
## Phiên Bản Toàn Diện: WordPress + Tailwind CSS & Bản Xuất Tĩnh (GitHub Pages Ready)

Dự án được xây dựng toàn diện với 2 chế độ linh hoạt:
1. **Chế độ Tĩnh Hardcoded (Static / GitHub Pages)**: Chỉ cần mở trình duyệt hoặc deploy lên GitHub Pages là chạy ngay toàn bộ hiệu ứng, slider, bộ lọc, modal ảnh, không cần cài đặt PHP hay cơ sở dữ liệu.
2. **Chế độ WordPress Core + Tailwind**: Nền tảng CMS đầy đủ để quản trị nội dung (đổi thông tin liên hệ, thêm ảnh gallery, đổi banner, quản lý form tư vấn) với cơ sở dữ liệu SQLite zero-config.

---

### 🌐 Cách 1: Chạy Ngay Website Tĩnh (Không Cần PHP/MySQL)

Bạn có thể chạy thử nghiệm hoặc xem trực tiếp website tĩnh:

```bash
# 1. Chạy server preview nội bộ (Cổng 5000):
npm start
# hoặc:
npm run preview
```
Truy cập: **[http://localhost:5000](http://localhost:5000)**

Hoặc mở trực tiếp file [`docs/index.html`](file:///c:/Users/3D/Downloads/clone/docs/index.html) bằng bất kỳ trình duyệt web nào (Chrome, Edge, Firefox).

---

### 🚀 Hướng Dẫn Deploy Lên GitHub Pages

Toàn bộ tài nguyên tĩnh (HTML, CSS đã minify, JS, hình ảnh) đã được đóng gói chuẩn chỉnh và đặt trong thư mục `docs/`.

#### Cách A: Tự Động Qua GitHub Actions (Khuyên dùng - 1 click)
Dự án đã tích hợp sẵn file cấu hình CI/CD tại [`.github/workflows/deploy.yml`](file:///c:/Users/3D/Downloads/clone/.github/workflows/deploy.yml).

1. Tạo một repository mới trên GitHub (ví dụ: `soonchunhyang-portal`).
2. Đẩy toàn bộ mã nguồn lên GitHub:
   ```bash
   git add .
   git commit -m "feat: release soonchunhyang portal with static github pages build"
   git remote add origin https://github.com/<tai-khoan-cua-ban>/<ten-repo>.git
   git push -u origin main
   ```
3. Trên GitHub, vào mục **Settings** -> **Pages**:
   - Tại mục **Build and deployment** -> **Source**: Chọn **GitHub Actions**.
   - GitHub sẽ tự động build và cung cấp link xem website: `https://<tai-khoan-cua-ban>.github.io/<ten-repo>/`.

#### Cách B: Chọn nhánh và thư mục `/docs`
1. Đẩy code lên GitHub như bước trên.
2. Vào **Settings** -> **Pages**:
   - Tại **Source**: Chọn **Deploy from a branch**.
   - Nhánh: Chọn `main` và thư mục chọn `/docs`.
   - Bấm **Save**. Trang web sẽ được xuất bản sau 1-2 phút.

#### Cách C: Deploy qua lệnh CLI với `gh-pages`
```bash
npm run deploy
```
Lệnh này sẽ tự động build lại dữ liệu tĩnh mới nhất và đẩy thẳng lên nhánh `gh-pages` của kho lưu trữ GitHub.

---

### 🛠️ Cách 2: Chạy Server WordPress Đầy Đủ Để Quản Trị Nội Dung

Khi bạn muốn thay đổi thông tin liên hệ, thay đổi banner trang chủ, thêm ảnh vào thư viện hoặc xem danh sách học sinh đăng ký tư vấn:

```bash
# Khởi động server WordPress (PHP built-in server):
npm run wp:start
# hoặc:
php -S localhost:8000
```

- **Trang chủ WordPress**: [http://localhost:8000](http://localhost:8000)
- **Trang Quản Trị (WP Admin)**: [http://localhost:8000/wp-admin](http://localhost:8000/wp-admin)
  - **Tài khoản**: `admin`
  - **Mật khẩu**: `admin123`

#### Cập nhật lại bản tĩnh sau khi sửa đổi trong WordPress Admin:
Bất cứ khi nào bạn cập nhật nội dung mới trong WordPress Admin và muốn đưa lên GitHub Pages:
```bash
npm run build:static
```
Lệnh này sẽ tự động crawl trang WordPress nội bộ, chuyển đổi toàn bộ đường dẫn sang tương đối (`./assets/...`), loại bỏ các tham số thừa, làm sạch mã và lưu kết quả vào thư mục `docs/`.

---

### 🎨 Tổng Quan Các Thành Phần Giao Diện Đã Tích Hợp

- **Top Announcement Strip**: Địa chỉ văn phòng Landmark 72 Hà Nội, số Hotline 0327 366 093, email haiph161299@gmail.com.
- **Hero Slider**: Chuyển slide mượt mà tự động sau 5.5 giây kèm chấm định vị và nút điều hướng.
- **Dải Thống Kê Số Liệu (Counter-up)**: Đếm tăng dần tự động khi cuộn trang (90% Visa, Top 5 Hàn Quốc, 100 Tỷ Won, 4000 KTX).
- **Giới Thiệu Đại Học SCH**: Lịch sử 48 năm, 5 viện đào tạo mũi nhọn, 4 bệnh viện lớn và giảng đường thông minh HyFlex.
- **Ưu Thế SCH (3 Trụ Cột)**: Thẻ nhận diện nổi bật kèm icon và gradient màu.
- **Chuyên Ngành Đào Tạo (Filterable)**: Lọc động 5 nhóm ngành (Y Dược, AI & CNTT, Big Data, QTKD & Tài chính, Kiến trúc & Ngôn ngữ).
- **Cẩm Nang Việc Làm & Visa**: Bảng so sánh trực quan quyền lợi giữa Visa D4-1 và Visa D2-2.
- **Thư Viện Ảnh (Lightbox Popup)**: Lọc theo 4 danh mục và click để xem ảnh phóng to toàn màn hình.
- **Bản Tin & Thông Báo**: Danh sách bài viết tuyển sinh kỳ mới và hoạt động đối ngoại.
- **Cảm Nhận Du Học Sinh**: Chia sẻ chân thực từ các sinh viên Việt Nam tại Hàn Quốc.
- **Hỏi Đáp FAQ (Accordion)**: Đóng/mở câu trả lời mượt mà.
- **Phiếu Đăng Ký Tư Vấn Trực Tuyến**:
  - Khi chạy WordPress: Gửi thông tin qua AJAX (`admin-ajax.php`) lưu trực tiếp vào CPT `sch_lead`.
  - Khi chạy tĩnh / GitHub Pages: Tự động phát hiện môi trường tĩnh, lưu trữ an toàn vào `localStorage` của trình duyệt, hiển thị thông báo thành công và hotline tư vấn.
- **Nút Hành Động Nổi (Floating Actions)**: Nút gọi hotline rung lắc thu hút, nút Chat Zalo trực tiếp, nút cuộn nhanh về đầu trang.

---

### 📁 Cấu Trúc Dự Án

```
├── docs/                          # Thư mục chứa toàn bộ website tĩnh để deploy GitHub Pages
│   ├── index.html                 # File HTML tĩnh độc lập, tối ưu SEO và tương thích 100%
│   ├── .nojekyll                  # Tắt bộ tiền xử lý Jekyll của GitHub Pages
│   └── assets/                    # Toàn bộ CSS, JS và hình ảnh tối ưu
│       ├── css/tailwind.css       # Tailwind CSS biên dịch tối ưu (39KB)
│       ├── js/main.js             # Logic slider, lightbox, counter, tabs, local storage form
│       └── images/                # Bộ ảnh gốc chất lượng cao
├── .github/workflows/deploy.yml   # Kịch bản GitHub Actions tự động deploy Pages
├── build_static.cjs               # Script tự động trích xuất tĩnh từ WordPress sang docs/
├── preview_server.cjs             # Web server tĩnh nhẹ không phụ thuộc thư viện bên ngoài
├── wp-content/                    # Toàn bộ hệ thống WordPress & SQLite database
│   ├── themes/soonchunhyang-tailwind/ # Theme Tailwind CSS tùy chỉnh
│   └── database/.ht.sqlite        # Database SQLite zero-config
├── package.json                   # Các lệnh quản lý, build, preview và deploy
└── README.md                      # Hướng dẫn chi tiết
```
