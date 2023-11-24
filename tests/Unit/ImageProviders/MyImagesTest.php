<?php

use Swis\Filament\Backgrounds\ImageProviders\MyImages;

it('returns a random image', function () {
    $provider = MyImages::make()->directory('images/backgrounds');
    $image = $provider->getImage();

    expect($image->image)->toBeIn(['url("http://localhost/images/backgrounds/01.jpg")', 'url("http://localhost/images/backgrounds/02.jpg")']);
});
