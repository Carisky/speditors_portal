#!/bin/sh
# Create a backup of the MySQL database used by the compose stack.
# Usage: ./scripts/backup_db.sh

set -e

TIMESTAMP="$(date +"%Y%m%d_%H%M%S")"
BACKUP_DIR="backups"
DB_CONTAINER="${DB_CONTAINER:-db}"
DB_USER="${DB_USERNAME:-root}"

mkdir -p "$BACKUP_DIR"

DB_PASSWORD="$(docker-compose exec -T "$DB_CONTAINER" printenv MYSQL_ROOT_PASSWORD | tr -d '\r')"
DB_NAME="$(docker-compose exec -T "$DB_CONTAINER" printenv MYSQL_DATABASE | tr -d '\r')"

docker-compose exec -T "$DB_CONTAINER" mysqldump -u "$DB_USER" -p"$DB_PASSWORD" "$DB_NAME" > "$BACKUP_DIR/db_$TIMESTAMP.sql"

echo "Backup stored in $BACKUP_DIR/db_$TIMESTAMP.sql"
