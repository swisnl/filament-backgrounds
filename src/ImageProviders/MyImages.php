<?php

namespace Swis\Filament\Backgrounds\ImageProviders;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Swis\Filament\Backgrounds\Contracts\ProvidesImages;
use Swis\Filament\Backgrounds\Image;

class MyImages implements ProvidesImages
{
    protected string $directory;

    protected \DateInterval | \DateTimeInterface | int $ttl = 0;

    public static function make(): static
    {
        return app(static::class);
    }

    public function directory(string $directory): static
    {
        $this->directory = $directory;

        return $this;
    }

    public function remember(\DateInterval | \DateTimeInterface | int $ttl): static
    {
        $this->ttl = $ttl;

        return $this;
    }

    public function getImage(): Image
    {
        if (! isset($this->directory)) {
            throw new \RuntimeException('No image directory set, please provide a directory using the directory() method.');
        }

        /** @var string $image */
        $image = Cache::remember('filament-backgrounds:my-images:image', $this->ttl, function () {
            $images = app(Filesystem::class)->files(public_path($this->directory));

            return Str::replaceStart(public_path(), '', $images[array_rand($images)]->getPathname());
        });

        return new Image(
            'url("' . asset($image) . '")'
        );
    }
}
