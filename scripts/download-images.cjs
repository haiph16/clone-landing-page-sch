const fs = require('fs');
const path = require('path');
const https = require('https');
const http = require('http');

const images = [
  { url: 'https://soonchunhyang.edu.vn/wp-content/uploads/2025/10/logo.svg', name: 'logo.svg' },
  { url: 'https://soonchunhyang.edu.vn/wp-content/uploads/2025/10/logo-white-1.svg', name: 'logo-white.svg' },
  { url: 'https://soonchunhyang.edu.vn/wp-content/uploads/2025/10/SCH-Vietnam-Admissions-Center-Information-2-21.webp', name: 'banner-1.webp' },
  { url: 'https://soonchunhyang.edu.vn/wp-content/uploads/2025/10/SCH_Campus_Summer-2000x1000-1.webp', name: 'banner-2.webp' },
  { url: 'https://soonchunhyang.edu.vn/wp-content/uploads/2025/10/Overall_01.webp', name: 'banner-3.webp' },
  { url: 'https://soonchunhyang.edu.vn/wp-content/uploads/2025/10/school.svg', name: 'icon-school.svg' },
  { url: 'https://soonchunhyang.edu.vn/wp-content/uploads/2025/10/cert.svg', name: 'icon-cert.svg' },
  { url: 'https://soonchunhyang.edu.vn/wp-content/uploads/2025/10/student.svg', name: 'icon-student.svg' },
  { url: 'https://soonchunhyang.edu.vn/wp-content/uploads/2026/06/VAN-PHONG-DAI-DIEN-TRUONG-DAI-HOC-SOONCHUNHYANG-1140x570.jpg', name: 'news-office.jpg' },
  { url: 'https://soonchunhyang.edu.vn/wp-content/uploads/2025/10/soonchunhyang-khai-giang-2024-1140x570.png', name: 'news-opening-2024.png' },
  { url: 'https://soonchunhyang.edu.vn/wp-content/uploads/2025/10/sch-ho-tro-viec-lam-chuyen-sau-1140x570.png', name: 'news-job-support.png' },
  { url: 'https://soonchunhyang.edu.vn/wp-content/uploads/2025/10/16-Nha-Nghien-Cuu-Cua-SCH-Lot-Danh-Sach-2-Nha-Khoa-Hoc-Hang-Dau-The-Gioi-1140x570.png', name: 'news-scientists.png' },
  { url: 'https://soonchunhyang.edu.vn/wp-content/uploads/2025/10/Soonchunhyang-To-Chuc-Le-Khai-Giang-Nam-Hoc-2025-1140x570.png', name: 'news-opening-2025.png' },
  { url: 'https://soonchunhyang.edu.vn/wp-content/uploads/2025/10/klb-150x150.jpg', name: 'student-klb.jpg' },
  { url: 'https://soonchunhyang.edu.vn/wp-content/uploads/2025/10/Screenshot-2025-08-20-144942-150x150.jpg', name: 'student-dung.jpg' },
  { url: 'https://soonchunhyang.edu.vn/wp-content/uploads/2025/10/asian-businesswoman-working-office-with-working-notepad-tablet-laptop-documents-office-150x150.jpg', name: 'student-giang.jpg' },
  { url: 'https://soonchunhyang.edu.vn/wp-content/uploads/2025/10/man-sitting-reading-book-stairs_1150-24626-150x150.jpg', name: 'student-huy.jpg' },
  { url: 'https://soonchunhyang.edu.vn/wp-content/uploads/2025/10/2-1-150x150.jpg', name: 'student-minh.jpg' },
  { url: 'https://soonchunhyang.edu.vn/wp-content/uploads/2025/10/front-view-graduation-cap-pile-book-768x1024.jpg', name: 'admissions-side.jpg' }
];

const targetDir = path.join(__dirname, '..', 'public', 'images');
fs.mkdirSync(targetDir, { recursive: true });

function downloadFile(url, dest) {
  return new Promise((resolve, reject) => {
    const file = fs.createWriteStream(dest);
    const client = url.startsWith('https') ? https : http;
    const req = client.get(url, {
      headers: {
        'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'
      }
    }, (res) => {
      if (res.statusCode >= 300 && res.statusCode < 400 && res.headers.location) {
        file.close();
        downloadFile(res.headers.location, dest).then(resolve).catch(reject);
        return;
      }
      if (res.statusCode !== 200) {
        file.close();
        fs.unlinkSync(dest);
        return resolve({ success: false, status: res.statusCode, url });
      }
      res.pipe(file);
      file.on('finish', () => {
        file.close();
        resolve({ success: true, url });
      });
    });
    req.on('error', (err) => {
      file.close();
      if (fs.existsSync(dest)) fs.unlinkSync(dest);
      resolve({ success: false, error: err.message, url });
    });
    req.setTimeout(15000, () => {
      req.abort();
      file.close();
      if (fs.existsSync(dest)) fs.unlinkSync(dest);
      resolve({ success: false, error: 'timeout', url });
    });
  });
}

async function run() {
  console.log('📥 Downloading images to public/images/...');
  for (const img of images) {
    const dest = path.join(targetDir, img.name);
    try {
      const res = await downloadFile(img.url, dest);
      console.log(`  ${img.name}: ${res.success ? '✅ OK' : '❌ Failed (' + (res.error || res.status) + ')'}`);
    } catch (e) {
      console.log(`  ${img.name}: ❌ Error ${e.message}`);
    }
  }
  console.log('✅ Done downloading images.');
}

run();
