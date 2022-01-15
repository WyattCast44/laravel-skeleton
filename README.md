# Laravel Skeleton 💀

My personal Laravel application skeleton, TALL stack flavor.

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