<?php

namespace Swis\Filament\Backgrounds\ImageProviders;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Swis\Filament\Backgrounds\Contracts\ProvidesImages;
use Swis\Filament\Backgrounds\Image;

class MyImages implements ProvidesImages
{
    protected string $directory;

    public static function make(): static
    {
        return app(static::class);
    }

    public function directory(string $directory): static
    {
        $this->directory = $directory;

        return $this;
    }

    public function getImage(): Image
    {
        if (! isset($this->directory)) {
            throw new \RuntimeException('No image directory set, please provide a directory using the directory() method.');
        }

        $images = app(Filesystem::class)->files(public_path($this->directory));
        $image = Str::of($images[array_rand($images)]->getPathname())
            ->replaceStart(public_path(), '')
            ->replace(DIRECTORY_SEPARATOR, '/')
            ->toString();

        return new Image(
            'url("' . asset($image) . '")'
        );
    }
}
