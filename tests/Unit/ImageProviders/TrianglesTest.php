<?php

use Swis\Filament\Backgrounds\ImageProviders\Triangles;

it('returns a random image', function () {
    $provider = Triangles::make();
    $image = $provider->getImage();

    expect($image->image)->toStartWith('url("http://localhost/images/swisnl/filament-backgrounds/triangles/')->toEndWith('.svg")');
});
