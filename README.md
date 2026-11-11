# social_api

A Laravel REST API for social content, with JWT authentication and post, comment, like, and message resources.

[Repository](https://github.com/MirzaAlbab/social_api)

## Features

- Registration and login endpoints
- JWT middleware for resource routes
- Post create/read/update/delete routes
- Comment, like, and messaging endpoints

## Technology

`php` ^8.2 · `laravel/framework` ^12.0 · `laravel/sanctum` ^4.0 · `laravel/tinker` ^2.10.1 · `tymon/jwt-auth` ^2.2

## Getting started

Install PHP compatible with `composer.json`, Composer, Node.js, and a database supported by the application.

```bash
git clone https://github.com/MirzaAlbab/social_api.git
cd social_api
```

```bash
composer install
cp .env.example .env
php artisan key:generate
```

Set `APP_URL` and the `DB_*` values in `.env` for your local database. Configure any mail, payment, or other external service used by this project.

```bash
php artisan migrate
npm install
npm run build
php artisan serve
```

Open the URL printed by Artisan. For ongoing frontend development, run `npm run dev` in another terminal.

Generate the JWT secret before using authentication:

```bash
php artisan jwt:secret
```

## Development and checks

```bash
php artisan test
```

Review `tests/` for the current test scope. A configured test runner does not imply coverage of every business workflow.

## Project structure

- `app/` — Application source
- `config/` — Application configuration
- `database/` — Migrations, factories, and seeders
- `public/` — Public web assets and entry points
- `resources/` — Frontend templates and assets
- `routes/` — HTTP route definitions
- `tests/` — Test suite and support files

## Project notes

After application setup, run php artisan jwt:secret to generate a local JWT signing secret. Authentication routes use the /api/v1 prefix. Uses Laravel 12.

## API overview

| Resource | Route prefix |
| --- | --- |
| Register / login | `/api/v1/register`, `/api/v1/login` |
| Posts | `/api/v1/posts` |
| Comments | `/api/v1/comments` |
| Likes | `/api/v1/likes` |
| Messages | `/api/v1/messages` |

Consult `routes/api.php` for methods and parameters. Send the token returned by login as `Authorization: Bearer <token>` when calling protected resources.

## Framework

Built with [Laravel](https://laravel.com/docs). Framework packages and third-party dependencies retain their own licenses.

## License

No root `LICENSE` file was present in the reviewed repository. Consult the repository owner about reuse; dependencies and third-party assets retain their own terms.
