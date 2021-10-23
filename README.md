<p align="center">
    <img src="./socialcard-blade-emblemicons.png" width="1280" title="Social Card Blade Emblemicons">
</p>

# Blade Emblemicons

<a href="https://github.com/codeat3/blade-emblemicons/actions?query=workflow%3ATests">
    <img src="https://github.com/codeat3/blade-emblemicons/workflows/Tests/badge.svg" alt="Tests">
</a>
<a href="https://packagist.org/packages/codeat3/blade-emblemicons">
    <img src="https://img.shields.io/packagist/v/codeat3/blade-emblemicons" alt="Latest Stable Version">
</a>
<a href="https://packagist.org/packages/codeat3/blade-emblemicons">
    <img src="https://img.shields.io/packagist/dt/codeat3/blade-emblemicons" alt="Total Downloads">
</a>

A package to easily make use of [Blade Emblemicons](https://github.com/emblemicons/emblemicons.github.io) in your Laravel Blade views.

For a full list of available icons see [the SVG directory](resources/svg)or preview them at [emblemicons.in](https://emblemicons.in/#icons).

## Requirements

- PHP 7.4 or higher
- Laravel 8.0 or higher

## Installation

```bash
composer require codeat3/blade-emblemicons
```

## Updating

Please refer to [`the upgrade guide`](UPGRADE.md) when updating the library.

## Blade Icons

Blade Emblemicons uses Blade Icons under the hood. Please refer to [the Blade Icons readme](https://github.com/blade-ui-kit/blade-icons) for additional functionality. We also recommend to [enable icon caching](https://github.com/blade-ui-kit/blade-icons#caching) with this library.

## Configuration

Blade Emblemicons also offers the ability to use features from Blade Icons like default classes, default attributes, etc. If you'd like to configure these, publish the `blade-emblemicons.php` config file:

```bash
php artisan vendor:publish --tag=blade-emblemicons-config
```

## Usage

Icons can be used as self-closing Blade components which will be compiled to SVG icons:

```blade
<x-emblem-alert/>
```

You can also pass classes to your icon components:

```blade
<x-emblem-alert class="w-6 h-6 text-gray-500"/>
```

And even use inline styles:

```blade
<x-emblem-alert style="color: #555"/>
```

### Raw SVG Icons

If you want to use the raw SVG icons as assets, you can publish them using:

```bash
php artisan vendor:publish --tag=blade-emblemicons --force
```

Then use them in your views like:

```blade
<img src="{{ asset('vendor/blade-emblemicons/alert.svg') }}" width="10" height="10"/>
```

## Changelog

Check out the [CHANGELOG](CHANGELOG.md) in this repository for all the recent changes.

## Maintainers

Blade Emblemicons is developed and maintained by [Swapnil Sarwe](https://swapnilsarwe.com).

## License

Blade Emblemicons is open-sourced software licensed under [the MIT license](LICENSE.md).
