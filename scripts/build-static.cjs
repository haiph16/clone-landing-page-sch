/**
 * Static Site Generator for Soonchunhyang University Website
 * Exports the WordPress site to standalone static HTML/CSS/JS/Images
 * ready for GitHub Pages and any static hosting.
 */

const fs = require('fs');
const path = require('path');

const ROOT_DIR = path.join(__dirname, '..');
const THEME_DIR = path.join(ROOT_DIR, 'wp-content', 'themes', 'soonchunhyang-tailwind');
const DOCS_DIR = path.join(ROOT_DIR, 'docs');
const DIST_DIR = path.join(ROOT_DIR, 'dist');

async function buildStatic() {
  console.log('🚀 Starting static site build for GitHub Pages...');

  // 1. Fetch current rendered HTML from running WordPress server (localhost:8000)
  let rawHtml = '';
  try {
    const res = await fetch('http://localhost:8000');
    if (!res.ok) throw new Error(`HTTP error! status: ${res.status}`);
    rawHtml = await res.text();
    console.log('✅ Successfully fetched HTML from WordPress server (length:', rawHtml.length, ')');
  } catch (err) {
    console.error('❌ Could not fetch from http://localhost:8000. Is WordPress running? Error:', err.message);
    process.exit(1);
  }

  // 2. Prepare target directories
  [DOCS_DIR, DIST_DIR].forEach((dir) => {
    if (!fs.existsSync(dir)) fs.mkdirSync(dir, { recursive: true });
    const assetsDir = path.join(dir, 'assets');
    const cssDir = path.join(assetsDir, 'css');
    const jsDir = path.join(assetsDir, 'js');
    const imgDir = path.join(assetsDir, 'images');

    [cssDir, jsDir, imgDir].forEach((d) => {
      if (!fs.existsSync(d)) fs.mkdirSync(d, { recursive: true });
    });
  });

  // 3. Copy Assets (CSS, JS, Images)
  const sourceCss = path.join(THEME_DIR, 'assets', 'css', 'tailwind.css');
  const sourceJs = path.join(THEME_DIR, 'assets', 'js', 'main.js');
  const sourceImages = path.join(THEME_DIR, 'assets', 'images');

  [DOCS_DIR, DIST_DIR].forEach((dir) => {
    // Copy CSS
    if (fs.existsSync(sourceCss)) {
      fs.copyFileSync(sourceCss, path.join(dir, 'assets', 'css', 'tailwind.css'));
    }

    // Copy JS
    if (fs.existsSync(sourceJs)) {
      fs.copyFileSync(sourceJs, path.join(dir, 'assets', 'js', 'main.js'));
    }

    // Copy Images
    if (fs.existsSync(sourceImages)) {
      const files = fs.readdirSync(sourceImages);
      files.forEach((file) => {
        const srcFile = path.join(sourceImages, file);
        if (fs.statSync(srcFile).isFile()) {
          fs.copyFileSync(srcFile, path.join(dir, 'assets', 'images', file));
        }
      });
    }

    // Also check and copy any images uploaded to wp-content/uploads/
    const uploadsDir = path.join(ROOT_DIR, 'wp-content', 'uploads');
    if (fs.existsSync(uploadsDir)) {
      function copyUploadsRecursive(curDir) {
        const entries = fs.readdirSync(curDir, { withFileTypes: true });
        for (const entry of entries) {
          const fullPath = path.join(curDir, entry.name);
          if (entry.isDirectory()) {
            copyUploadsRecursive(fullPath);
          } else if (entry.isFile()) {
            fs.copyFileSync(fullPath, path.join(dir, 'assets', 'images', entry.name));
          }
        }
      }
      copyUploadsRecursive(uploadsDir);
    }

    // Create .nojekyll for GitHub Pages
    fs.writeFileSync(path.join(dir, '.nojekyll'), '');
  });

  console.log('✅ Assets copied to docs/ and dist/ directories');

  // 4. Transform HTML for Static Hosting
  let cleanHtml = rawHtml;

  // Replace WordPress absolute URLs with relative paths
  cleanHtml = cleanHtml.replace(/http:\/\/localhost:8000\/wp-content\/themes\/soonchunhyang-tailwind\/assets\/css\/tailwind\.css(?:\?[^"'\s]*)?/g, './assets/css/tailwind.css');
  cleanHtml = cleanHtml.replace(/http:\/\/localhost:8000\/wp-content\/themes\/soonchunhyang-tailwind\/style\.css(?:\?[^"'\s]*)?/g, './assets/css/tailwind.css');
  cleanHtml = cleanHtml.replace(/http:\/\/localhost:8000\/wp-content\/themes\/soonchunhyang-tailwind\/assets\/js\/main\.js(?:\?[^"'\s]*)?/g, './assets/js/main.js');
  cleanHtml = cleanHtml.replace(/http:\/\/localhost:8000\/wp-content\/themes\/soonchunhyang-tailwind\/assets\/images\/([a-zA-Z0-9_\-\.]+)/g, './assets/images/$1');
  cleanHtml = cleanHtml.replace(/http:\/\/localhost:8000\/wp-content\/uploads\/\d{4}\/\d{2}\/([a-zA-Z0-9_\-\.]+)/g, './assets/images/$1');

  // Replace home link & ajax url
  cleanHtml = cleanHtml.replace(/http:\/\/localhost:8000\//g, '#');
  cleanHtml = cleanHtml.replace(/http:\/\/localhost:8000\/wp-admin\//g, '#dang-ky');
  cleanHtml = cleanHtml.replace(/http:\/\/localhost:8000\/wp-admin\/admin-ajax\.php/g, '#');

  // Strip WordPress emoji script block
  cleanHtml = cleanHtml.replace(/<script[^>]*>\s*window\._wpemojiSettings[\s\S]*?<\/script>/gi, '');

  // Strip WordPress API / RSD discovery links in head
  cleanHtml = cleanHtml.replace(/<link rel="https:\/\/api\.w\.org\/"[^>]*>/g, '');
  cleanHtml = cleanHtml.replace(/<link rel="EditURI"[^>]*>/g, '');
  cleanHtml = cleanHtml.replace(/<link rel="alternate" type="application\/json\+oembed"[^>]*>/g, '');
  cleanHtml = cleanHtml.replace(/<link rel="alternate" type="text\/xml\+oembed"[^>]*>/g, '');

  // Add static metadata / GitHub Pages SEO meta
  const ghMeta = `
    <!-- GitHub Pages Optimized Deployment -->
    <meta name="generator" content="Soonchunhyang Portal Static Exporter" />
    <meta property="og:title" content="Trường Đại Học Soonchunhyang Việt Nam" />
    <meta property="og:description" content="Văn Phòng Tuyển Sinh Chính Thức Trường Đại Học Soonchunhyang Hàn Quốc Tại Việt Nam" />
    <meta property="og:type" content="website" />
  `;
  cleanHtml = cleanHtml.replace('</head>', `${ghMeta}\n</head>`);

  // Write static index.html to both docs/ and dist/
  fs.writeFileSync(path.join(DOCS_DIR, 'index.html'), cleanHtml, 'utf8');
  fs.writeFileSync(path.join(DIST_DIR, 'index.html'), cleanHtml, 'utf8');

  console.log('✅ Generated docs/index.html (size:', cleanHtml.length, 'bytes)');
  console.log('✅ Generated dist/index.html (size:', cleanHtml.length, 'bytes)');
  console.log('🎉 Static site build completed successfully!');
}

buildStatic();
