#!/bin/sh
# Create a backup of the MySQL database used by the compose stack.
# Usage: ./scripts/backup_db.sh
set -e
TIMESTAMP="$(date +"%Y%m%d_%H%M%S")"
BACKUP_DIR="backups"
mkdir -p "$BACKUP_DIR"
docker-compose exec -T db mysqldump -u root -ppassword app > "$BACKUP_DIR/db_$TIMESTAMP.sql"
echo "Backup stored in $BACKUP_DIR/db_$TIMESTAMP.sql"