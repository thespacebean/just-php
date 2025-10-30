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
