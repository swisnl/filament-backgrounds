<?php

namespace Swis\Filament\Backgrounds;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\HtmlString;
use Swis\Filament\Backgrounds\Contracts\ProvidesImages;
use Swis\Filament\Backgrounds\ImageProviders\CuratedBySwis;

class FilamentBackgroundsPlugin implements Plugin
{
    protected ProvidesImages $imageProvider;

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
        //
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
        $image = $this->getImageProvider()->getImage();

        return array_filter([
            'filament-backgrounds-image' => new HtmlString($image->image),
            'filament-backgrounds-attribution' => $this->showAttribution && $image->attribution ? new HtmlString('"' . e($image->attribution) . '"') : null,
            'filament-backgrounds-attribution-backdrop' => $this->showAttribution && $image->attribution ? new HtmlString('""') : null,
        ]);
    }

    public function imageProvider(ProvidesImages $imageProvider): self
    {
        $this->imageProvider = $imageProvider;

        return $this;
    }

    public function getImageProvider(): ProvidesImages
    {
        return $this->imageProvider ?? CuratedBySwis::make();
    }

    public function showAttribution(bool $showAttribution): self
    {
        $this->showAttribution = $showAttribution;

        return $this;
    }
}
