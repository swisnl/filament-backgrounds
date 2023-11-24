# Filament backgrounds

[![Latest Version on Packagist](https://img.shields.io/packagist/v/swisnl/filament-backgrounds.svg?style=flat-square)](https://packagist.org/packages/swisnl/filament-backgrounds)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Buy us a tree](https://img.shields.io/badge/Treeware-%F0%9F%8C%B3-lightgreen.svg?style=flat-square)](https://plant.treeware.earth/swisnl/filament-backgrounds)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/swisnl/filament-backgrounds/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/swisnl/filament-backgrounds/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/swisnl/filament-backgrounds/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/swisnl/filament-backgrounds/actions?query=workflow%3A"Fix+PHP+Code+Styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/swisnl/filament-backgrounds.svg?style=flat-square)](https://packagist.org/packages/swisnl/filament-backgrounds)
[![Made by SWIS](https://img.shields.io/badge/%F0%9F%9A%80-made%20by%20SWIS-%230737A9.svg?style=flat-square)](https://www.swis.nl)

A [curated list of (free to use) images](resources/images/curated-by-swis), mostly from [Unsplash](https://unsplash.com/), to give your Filament auth pages a unique look. Rather use your own images? No problem, you can also use your own images. Or go wild and create your own image provider based on the weather, time of day, or whatever you can think of!

## Installation

You can install the package via composer:

```bash
composer require swisnl/filament-backgrounds
```

Next, publish the images if you want to use the default list:

```bash
php artisan filament-backgrounds:install
```

## Usage

Add the plugin to your panel provider:

```php
use Swis\Filament\Backgrounds\FilamentBackgroundsPlugin;
 
public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            FilamentBackgroundsPlugin::make(),
        ])
}
```

### Hide attribution

You can disable attribution by passing `false` to the `showAttribution` method on the plugin.

```php
use Swis\Filament\Backgrounds\FilamentBackgroundsPlugin;
 
public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            FilamentBackgroundsPlugin::make()
                ->showAttribution(false),
        ])
}
```

### Custom image provider

You can use a different image provider by passing an instance of `ProvidesImages` to the `imageProvider` method on the plugin.

```php
use Swis\Filament\Backgrounds\FilamentBackgroundsPlugin;
 
public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            FilamentBackgroundsPlugin::make()
                ->imageProvider(MyImageProvider::make()),
        ])
}
```

#### Writing a custom image provider

To create your own image provider, you need to implement the `ProvidesImages` interface. This interface has one method, `getImage`, which should return an `Image` object. The image object takes two arguments, the first is the CSS `background-image` property, the second is the attribution text. The image will be directly used as background-image in CSS, so it should include `url()`, which allows you to even use gradients or other fancy stuff!

```php
<?php

use Swis\Filament\Backgrounds\Contracts\ProvidesImages;
use Swis\Filament\Backgrounds\Image;

class MyImageProvider implements ProvidesImages
{
    public static function make(): static
    {
        return app(static::class);
    }

    public function getImage(): Image
    {
        return new Image(
            "url('[link to photo]')",
            'Photo by ...'
        );
    }
}
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Jasper Zonneveld](https://github.com/JaZo)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## SWIS :heart: Open Source

[SWIS](https://www.swis.nl) is a web agency from Leiden, the Netherlands. We love working with open source software. 
