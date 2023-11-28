<?php

namespace Swis\Filament\Backgrounds\ImageProviders;

use Swis\Filament\Backgrounds\Contracts\ProvidesImages;
use Swis\Filament\Backgrounds\Image;

class Triangles implements ProvidesImages
{
    public static function make(): static
    {
        return app(static::class);
    }

    public function getImage(): Image
    {
        return new Image(
            'url("' . asset('images/swisnl/filament-backgrounds/triangles/' . sprintf('%02d', random_int(1, 25)) . '.svg') . '")'
        );
    }
}
