# speditors_portal

## Development environment

The project uses Docker Compose to run the frontend, backend and MySQL database. A MySQL Workbench container is included for database administration.

### Start the stack

```
docker-compose up -d
```

The services expose:

- Frontend: http://localhost:3000
- Backend: http://localhost:8000
- MySQL: localhost:3306
- MySQL Workbench (via browser): https://localhost:3001

### Database backups

A helper script generates SQL dumps using `mysqldump`.

```
./scripts/backup_db.sh
```

Backups are stored in the `backups/` directory with a timestamped filename. This can be automated via cron or other schedulers.

### Database migrations

The backend uses [Phinx](https://book.cakephp.org/phinx/) to manage database schema changes.

Create a new migration:

```
cd backend
vendor/bin/phinx create MyMigration
```

Run pending migrations:

```
cd backend
composer migrate
```
