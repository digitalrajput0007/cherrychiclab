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
SUDO=""
if [ "$EUID" -ne 0 ]; then
    SUDO="sudo"
fi

$SUDO chown -R www-data:www-data "$APP_DIR"
$SUDO chmod -R 755 "$APP_DIR"
$SUDO chmod 775 "$APP_DIR/data"
$SUDO chmod 664 "$APP_DIR/data/cherrychic.sqlite"* 2>/dev/null || true

# 4. Run database migrations & seed idempotency
echo "🔄 Running migrations..."
php "$APP_DIR/scripts/migrate.php"

# 5. Regenerate static sitemap
echo "🗺️ Regenerating sitemap.xml..."
php "$APP_DIR/scripts/generate_sitemap.php"

# 6. Reload PHP-FPM for fresh OPcache
echo "⚡ Reloading PHP-FPM..."
$SUDO systemctl reload php8.2-fpm || $SUDO service php8.2-fpm reload || true
$SUDO systemctl reload nginx || $SUDO service nginx reload || true

# 7. Post-deploy Healthcheck
echo "🏥 Running post-deployment health check..."
HTTP_STATUS=$(curl -s -o /dev/null -w "%{http_code}" "http://127.0.0.1/" || true)
if [ "$HTTP_STATUS" = "200" ] || [ "$HTTP_STATUS" = "301" ]; then
    echo "✅ Health check passed: HTTP $HTTP_STATUS"
else
    echo "⚠️ Warning: Health check returned HTTP $HTTP_STATUS. Inspect /var/log/nginx/cherrychic_error.log"
fi

echo "🎉 [CherryChic Lab] Deployment Completed Successfully!"

