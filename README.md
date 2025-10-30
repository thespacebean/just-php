# Just PHP

Minimal PHP + Apache + MariaDB example with Composer and PHPUnit.

## Prerequisites

- Docker Desktop (Compose v2.22+ recommended for `develop.watch`)
- PHP/composer locally only if you want to run tests without Docker

## Run the app

```bash
docker compose up -d --build
```

App will be available on `${APP_PORT}` (from your environment).

## Live code sync (Compose watch)

This project uses the Compose `develop.watch` feature to sync local `./src` to the container at `/var/www/html`.

1) Start (or rebuild) services:

```bash
docker compose up -d --build
```

2) Start the watcher (keep this running):

```bash
docker compose watch
```

Notes:
- Requires Docker Compose v2.22+ (`docker compose version`).
- If you prefer a persistent bind mount instead of the watcher, add this to `server` in `compose.yaml`:

```yaml
services:
  server:
    volumes:
      - ./src:/var/www/html
```

Then `docker compose up -d` is enough without running `watch`.

## Logs and troubleshooting

```bash
docker compose logs -f server
```

Common issue: if you change Composer autoload (PSR-4 paths), rebuild the image so the autoloader is regenerated:

```bash
docker compose build --no-cache server && docker compose up -d server
```

## Testing

Run PHPUnit via Composer:

```bash
composer test
```

Sample test lives in `tests/ExampleTest.php`. PHPUnit config: `phpunit.xml.dist`.

## Run locally on Linux (without Docker)

### Prerequisites

- PHP 8.4 with extensions: `pdo`, `pdo_mysql`
- Composer
- MariaDB or MySQL server

### 1) Configure environment

Create a `.env` file at the repo root (copy from `.enx.example` and fill values):

```
DB_HOST=127.0.0.1
DB_NAME=vanilla
DB_USER=root
DB_PASS=your_password
APP_PORT=8001
```

These variables are read by the app via `getenv()`.

Export them in your shell for the current session (or use a tool like direnv):

```bash
export $(grep -v '^#' .env | xargs)
```

Create the database if it does not exist:

```bash
mariadb -uroot -p"$DB_PASS" -e "CREATE DATABASE IF NOT EXISTS \`$DB_NAME\`;"
```

### 2) Install PHP dependencies

```bash
composer install
```

### 3) Serve the app

Using PHP’s built-in server (for development):

```bash
php -S 127.0.0.1:$APP_PORT -t src
```

Now open `http://127.0.0.1:$APP_PORT/`.

Alternatively configure Apache/Nginx to serve the `src/` directory as the web root and ensure `vendor/` is available at `src/vendor/` (Composer places it at the project root; the app requires it via `src/index.php`). If needed, adjust the autoload path or web root accordingly.

### 4) Run tests

```bash
composer test
```
