# CherryChic Beauty & Fragrance Lab (cherrychic.in)

> High-performance, low-memory PHP 8 and SQLite web application engineered for Indian programmatic SEO and consumer beauty tools.

## 🌸 Core Lab Features

1. **💄 Skincare & Makeup Dupe Directory:** 200+ viral luxury vs Indian budget beauty pairs with CSS Hex color swatch pills, INCI comparisons, and verified INR savings.
2. **✨ Indian Perfume Clone Finder:** 70+ beast-mode Middle Eastern & Indian perfume clones mapped to luxury/niche benchmarks with top/heart/base olfactory pyramids and tropical longevity ratings.
3. **🧪 Skincare Active Clash & Fungal Acne Checker:** Interactive Alpine.js routine analyzer detecting chemical conflicts (Retinol + AHAs/BHAs, Vitamin C + BPO) and Malassezia yeast triggers (comedogenic 0-5).
4. **🎨 Cross-Brand Foundation Shade Matcher:** Color-matched foundation matrix for Indian skin depths (Fair to Dusky) mapping MAC NC25–NC45 to Maybelline, Kay Beauty, Nykaa, PAC, and Mamaearth.
5. **🗺️ Programmatic SEO Engine:** Server-rendered landing pages (`/dupe/{slug}` & `/perfume-clone/{slug}`) with dynamic `JSON-LD` FAQPage schema and automated `sitemap.xml` with 200 URLs.

---

## ⚡ Technical Architecture

- **Stack:** Pure PHP 8.x + SQLite 3 (WAL mode) + Tailwind CSS (CDN) + Alpine.js.
- **Resource Footprint:** Zero heavy frameworks (no Laravel/Symfony), < 64MB memory per worker, designed for a 1GB RAM Ubuntu VPS.
- **Affiliate Engine:** Multi-store routing via `/buy.php` supporting Amazon India Associates (`cherrychic01-21`) and Cuelinks LinkKit (`nykaa`, `myntra`, `tira`, `purplle`) with asynchronous click tracking.

---

## 🚀 Local Development

```bash
# Clone the repository
git clone https://github.com/digitalrajput0007/cherrychiclab.git
cd cherrychiclab

# Run migrations & verify SQLite WAL mode
php scripts/migrate.php

# Start built-in PHP development server
php -S localhost:8000 -t public
```

Visit: `http://localhost:8000`

---

## 📦 Deployment (1GB Ubuntu VPS)

Configuration files located in `/deploy`:
- `deploy/nginx.conf`: Nginx vhost with rate limiting, microcaching, and Gzip.
- `deploy/php-fpm-pool.conf`: Optimized PHP-FPM dynamic pool (`pm.max_children = 10`).
- `deploy/deploy.sh`: Zero-downtime deployment script with automated SQLite backup.
- `deploy/backup-sqlite.sh`: Automated online hot backup script.
