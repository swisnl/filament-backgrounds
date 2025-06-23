<?php

use Filament\Panel;
use Swis\Filament\Backgrounds\FilamentBackgroundsPlugin;
use Swis\Filament\Backgrounds\ImageProviders\CuratedBySwis;
use Swis\Filament\Backgrounds\ImageProviders\MyImages;
use Swis\Filament\Backgrounds\ImageProviders\Triangles;

it('can be instantiated', function () {
    $plugin = FilamentBackgroundsPlugin::make();
    
    expect($plugin)->toBeInstanceOf(FilamentBackgroundsPlugin::class);
});

it('can be registered with a panel', function () {
    $panel = Panel::make();
    $plugin = FilamentBackgroundsPlugin::make();
    
    $plugin->register($panel);
    
    expect($plugin)->toBeInstanceOf(FilamentBackgroundsPlugin::class);
});

it('can be booted with a panel', function () {
    $panel = Panel::make();
    $plugin = FilamentBackgroundsPlugin::make();
    
    $plugin->boot($panel);
    
    expect($plugin)->toBeInstanceOf(FilamentBackgroundsPlugin::class);
});

it('can configure image provider', function () {
    $plugin = FilamentBackgroundsPlugin::make()
        ->imageProvider(MyImages::make());
    
    expect($plugin)->toBeInstanceOf(FilamentBackgroundsPlugin::class);
});

it('can configure caching', function () {
    $plugin = FilamentBackgroundsPlugin::make()
        ->remember(900);
    
    expect($plugin)->toBeInstanceOf(FilamentBackgroundsPlugin::class);
});

it('can configure attribution display', function () {
    $plugin = FilamentBackgroundsPlugin::make()
        ->showAttribution(false);
    
    expect($plugin)->toBeInstanceOf(FilamentBackgroundsPlugin::class);
}); 