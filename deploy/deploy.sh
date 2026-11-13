#!/usr/bin/env bash
# CherryChic Lab - Zero-Downtime Ubuntu VPS Deploy Script
set -euo pipefail

APP_DIR="/var/www/cherrychic"
BACKUP_DIR="/var/backups/cherrychic"

echo "🚀 [CherryChic Lab] Initiating Deployment..."

# 1. Hot Safe SQLite Backup
mkdir -p "$BACKUP_DIR"
if [ -f "$APP_DIR/data/cherrychic.sqlite" ]; then
    echo "📦 Creating SQLite hot backup..."
    sqlite3 "$APP_DIR/data/cherrychic.sqlite" ".backup '$BACKUP_DIR/cherrychic_$(date +%Y%m%d_%H%M%S).sqlite'"
    # Keep only last 14 days of backups
    find "$BACKUP_DIR" -type f -name "*.sqlite" -mtime +14 -delete
fi

# 2. Pull latest code (if using git)
cd "$APP_DIR"
if [ -d ".git" ]; then
    echo "📥 Pulling latest git repository commits..."
    git pull origin main
fi

# 3. Ensure permissions (SQLite WAL mode requires write access to the parent folder)
echo "🔒 Enforcing permissions for www-data..."
chown -R www-data:www-data "$APP_DIR"
chmod -R 755 "$APP_DIR"
chmod 775 "$APP_DIR/data"
chmod 664 "$APP_DIR/data/cherrychic.sqlite"* || true

# 4. Run database migrations & seed idempotency
echo "🔄 Running migrations..."
php "$APP_DIR/scripts/migrate.php"

# 5. Regenerate static sitemap
echo "🗺️ Regenerating sitemap.xml..."
php "$APP_DIR/scripts/generate_sitemap.php"

# 6. Reload PHP-FPM for fresh OPcache
echo "⚡ Reloading PHP-FPM..."
systemctl reload php8.2-fpm || service php8.2-fpm reload || true
systemctl reload nginx || service nginx reload || true

echo "🎉 [CherryChic Lab] Deployment Completed Successfully!"

