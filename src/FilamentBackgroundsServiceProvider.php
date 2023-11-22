<?php

namespace Swis\Filament\Backgrounds;

use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Filesystem\Filesystem;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentBackgroundsServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-backgrounds';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasInstallCommand(function (InstallCommand $command) {
                $command->publishAssets();
            });
    }

    public function packageBooted(): void
    {
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName()
        );

        // Publish images
        if (app()->runningInConsole()) {
            foreach (app(Filesystem::class)->directories(__DIR__ . '/../resources/images/') as $directory) {
                $this->publishes([
                    $directory => public_path('images/swisnl/filament-backgrounds/' . basename($directory)),
                ], "{$this->package->shortName()}-assets");
            }
        }
    }

    protected function getAssetPackageName(): string
    {
        return 'swisnl/filament-backgrounds';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            // We only want to load this style if the plugin is used, but we do want Filament to publish the assets,
            // so we use loadedOnRequest() here, but actually load it in the plugin.
            Css::make('filament-backgrounds-styles', __DIR__ . '/../resources/dist/filament-backgrounds.css')->loadedOnRequest(),
        ];
    }
}
