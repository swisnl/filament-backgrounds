<?php

namespace Swis\Filament\Backgrounds;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\HtmlString;
use Swis\Filament\Backgrounds\Contracts\ProvidesImages;
use Swis\Filament\Backgrounds\ImageProviders\CuratedBySwis;

class FilamentBackgroundsPlugin implements Plugin
{
    protected Panel $panel;

    protected ProvidesImages $imageProvider;

    protected \DateInterval | \DateTimeInterface | int $ttl = 0;

    protected bool $showAttribution = true;

    public function getId(): string
    {
        return 'filament-backgrounds';
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }

    public function register(Panel $panel): void
    {
        $this->panel = $panel;
    }

    public function boot(Panel $panel): void
    {
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName()
        );
        FilamentAsset::registerCssVariables(
            $this->getCssVariables(),
            $this->getAssetPackageName()
        );
    }

    protected function getAssetPackageName(): string
    {
        return 'swisnl/filament-backgrounds';
    }

    /**
     * @return list<\Filament\Support\Assets\Asset>
     */
    protected function getAssets(): array
    {
        return [
            Css::make('filament-backgrounds-styles', __DIR__ . '/../resources/dist/filament-backgrounds.css'),
        ];
    }

    /**
     * @return array<string, \Illuminate\Support\HtmlString>
     */
    protected function getCssVariables(): array
    {
        $image = $this->getImage();

        return array_filter([
            'filament-backgrounds-image' => new HtmlString($image->image),
            'filament-backgrounds-attribution' => $this->showAttribution && $image->attribution ? new HtmlString('"' . addslashes($image->attribution) . '"') : null,
            'filament-backgrounds-attribution-backdrop' => $this->showAttribution && $image->attribution ? new HtmlString('""') : null,
        ]);
    }

    protected function getImage(): Image
    {
        return Cache::remember(
            'filament-backgrounds:image:' . $this->panel->getId(),
            $this->ttl,
            fn () => ($this->imageProvider ?? CuratedBySwis::make())->getImage()
        );
    }

    public function imageProvider(ProvidesImages $imageProvider): static
    {
        $this->imageProvider = $imageProvider;

        return $this;
    }

    public function remember(\DateInterval | \DateTimeInterface | int $ttl): static
    {
        $this->ttl = $ttl;

        return $this;
    }

    public function showAttribution(bool $showAttribution): static
    {
        $this->showAttribution = $showAttribution;

        return $this;
    }
}
