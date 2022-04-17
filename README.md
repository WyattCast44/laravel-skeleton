# Laravel Skeleton 💀

My personal Laravel application skeleton, TALL stack flavor.

## TOC

- Features
- Installation
- Default FE Packages
- Default BE Packages

## Features

- Updated to support L9
- Fully tested user authentication system
- Two factor auth using [Laravel Fortify](https://laravel.com/docs/8.x/fortify)
- Change password flow
- Artisan command to create a user on the terminal

## Installation

Clone the repository and move into directory

```bash
git clone https://github.com/WyattCast44/laravel-skeleton application && cd application
```

Copy `.env.example` to `.env`

```bash
cp .env.example .env
```

Install composer dependencies

```bash
composer install
```

Generate application key

```bash
php artisan key:generate
```

Migrate the database

```bash
php artisan migrate
```

Install FE dependencies

```bash
yarn install
```

Build fresh assets

```bash
yarn dev
```

## Suggested Deployments Steps

```bash
php artisan icons:cache
```

## Packages installed by default

### Frontend

- TailwindCSS (v3) with the following plugins
    - Forms
    - Line Clamp
    - Typography
    - Aspect Ratio
- [AlpineJS](https://alpinejs.dev) (v3) with the following plugins
    - Focus
    - Persist
    - Collapse
    - Intersect
    - [Tooltips](https://github.com/ryangjchandler/alpine-tooltip)
- [Tippy.js](https://tippyjs.bootcss.com/getting-started/)

### Backend

- Laravel Telescope
- Laravel Debugbar
- Laravel Sanctum
- [Blade UI Kit - Icons](https://github.com/blade-ui-kit/blade-icons)
- [Watson Active (route helper)](https://github.com/dwightwatson/active)

## Summary of Changes

- Remove styleci config
- Remove axios, lodash
- Preconfigure webpack.mix.js
- Add FE and BE packages
- Add applicable env keys
- Update mail driver to log
- Add `login` method to base test case
- Move `api.php` to `routes/api/v1.php`, and update route provider
- Add `auth.php` and update route provider
- Move `lang` folder to root
- Add `config/meta.php`
- Delete `route/commands.php` and remove require from kernel
- Delete `route/channels.php`
- Delete broadcast service provider
- Add controllers/api/v1 folders
- Add telescope service provider to `app.php`
- Add health endpoint for api/v1
- Delete `server.php`
- Install paratest by default
- Add directory for svg icons
- Add listeners for two-factor-auth enabled/disabled
- Add flag to accept api disclaimer
- Add user avatar, with default to gravataar
- Add two factor confirmed flag to fix https://dev.to/nicolus/laravel-fortify-implement-2fa-in-a-way-that-won-t-let-users-lock-themselves-out-2ejk
- Added artisan command to create a new user on the terminal 
- Added well-known/password reset route