# Laravel Skeleton 💀

My personal Laravel application skeleton, TALL stack flavor.

## TOC

- Installation
- Default FE Packages
- Default BE Packages

## Installation

```bash
git clone https://github.com/WyattCast44/laravel-skeleton application && cd application
```

```bash
cp .env.example .env
```

```bash
composer install
```

```bash
php artisan key generate
```

```bash
php artisan migrate
```

```bash
yarn install
```

```bash
yarn dev
```

## Suggested Deployments Steps

```bash
php artisan icons:cache
```

## Packages installed by default

### Frontend

- TailwindCSS (v3)
- Tailwind Plugins
    - Forms
    - Line Clamp
    - Typography
    - Aspect Ratio
- AlpineJS (v3)
- AlpineJS plugins
    - Focus
    - Persist
    - Collapse
    - Intersect

### Backend

- Laravel Telescope
- Laravel Debugbar
- Laravel Sanctum
- [Blade UI Kit - Icons](https://github.com/blade-ui-kit/blade-icons)

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
- Add directory for svg icons