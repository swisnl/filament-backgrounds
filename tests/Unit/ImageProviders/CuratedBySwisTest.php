<?php

use Illuminate\Support\Carbon;
use Swis\Filament\Backgrounds\ImageProviders\CuratedBySwis;

it('returns an image based on the day of the month', function () {
    Carbon::setTestNow('2023-11-24 12:00:00');

    $provider = CuratedBySwis::make();
    $image = $provider->getImage();

    expect($image->image)->toEqual('url("http://localhost/images/swisnl/filament-backgrounds/curated-by-swis/24.jpg")');
});
