#!/usr/bin/env bash
# CherryChic Lab - Automated SQLite Online Safe Backup (for Cron)
# Runs without interrupting reads/writes in WAL mode.
set -euo pipefail

APP_DIR="/var/www/cherrychic"
BACKUP_DIR="/var/backups/cherrychic"
TIMESTAMP=$(date +%Y%m%d_%H%M%S)

mkdir -p "$BACKUP_DIR"

if [ -f "$APP_DIR/data/cherrychic.sqlite" ]; then
    sqlite3 "$APP_DIR/data/cherrychic.sqlite" ".backup '$BACKUP_DIR/cherrychic_$TIMESTAMP.sqlite'"
    # Compress backup to conserve disk on 1GB VPS
    gzip "$BACKUP_DIR/cherrychic_$TIMESTAMP.sqlite"
    # Rotate: keep last 30 daily backups
    find "$BACKUP_DIR" -type f -name "*.sqlite.gz" -mtime +30 -delete
    echo "[$TIMESTAMP] SQLite backup completed: $BACKUP_DIR/cherrychic_$TIMESTAMP.sqlite.gz"
fi

