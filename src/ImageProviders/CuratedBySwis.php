<?php

namespace Swis\Filament\Backgrounds\ImageProviders;

use Illuminate\Support\Arr;
use Swis\Filament\Backgrounds\Contracts\ProvidesImages;
use Swis\Filament\Backgrounds\Image;

class CuratedBySwis implements ProvidesImages
{
    protected const IMAGES = [
        [
            'url' => '01.jpg',
            'author' => 'Sergey Zolkin',
            'service' => 'Unsplash',
        ],
        [
            'url' => '02.jpg',
            'author' => 'Andrew Phillips',
            'service' => 'Unsplash',
        ],
        [
            'url' => '03.jpg',
            'author' => 'Ales Krivec',
            'service' => 'Unsplash',
        ],
        [
            'url' => '04.jpg',
            'author' => 'Roger Burkhard',
            'service' => 'Unsplash',
        ],
        [
            'url' => '05.jpg',
            'author' => 'Colton Brown',
            'service' => 'Unsplash',
        ],
        [
            'url' => '06.jpg',
            'author' => 'Micah Hallahan',
            'service' => 'Unsplash',
        ],
        [
            'url' => '07.jpg',
            'author' => 'Michael Baird',
            'service' => 'Unsplash',
        ],
        [
            'url' => '08.jpg',
            'author' => 'Damir Kotoric',
            'service' => 'Unsplash',
        ],
        [
            'url' => '09.jpg',
            'author' => 'Alex Wigan',
            'service' => 'Unsplash',
        ],
        [
            'url' => '10.jpg',
            'author' => 'Blake Verdoorn',
            'service' => 'Unsplash',
        ],
        [
            'url' => '11.jpg',
            'author' => 'Sébastien Marchand',
            'service' => 'Unsplash',
        ],
        [
            'url' => '12.jpg',
            'author' => 'unknown',
            'service' => 'Unsplash',
        ],
        [
            'url' => '13.jpg',
            'author' => 'Ozark Drones',
            'service' => 'Unsplash',
        ],
        [
            'url' => '14.jpg',
            'author' => 'Luís Perdigão',
            'service' => 'Unsplash',
        ],
        [
            'url' => '15.jpg',
            'author' => 'Martin Fisch',
            'service' => 'Flickr',
        ],
        [
            'url' => '16.jpg',
            'author' => 'Elizabeth Lies',
            'service' => 'Unsplash',
        ],
        [
            'url' => '17.jpg',
            'author' => 'Daniela Cuevas',
            'service' => 'Unsplash',
        ],
        [
            'url' => '18.jpg',
            'author' => 'Rebecca Johnston',
            'service' => 'Unsplash',
        ],
        [
            'url' => '19.jpg',
            'author' => 'Demi DeHerrera',
            'service' => 'Unsplash',
        ],
        [
            'url' => '20.jpg',
            'author' => 'Kellen Riggin',
            'service' => 'Unsplash',
        ],
        [
            'url' => '21.jpg',
            'author' => 'Sebastien Gabriel',
            'service' => 'Unsplash',
        ],
        [
            'url' => '22.jpg',
            'author' => 'Genta Mochizawa',
            'service' => 'Unsplash',
        ],
        [
            'url' => '23.jpg',
            'author' => 'Modestas Urbonas',
            'service' => 'Unsplash',
        ],
        [
            'url' => '24.jpg',
            'author' => 'Negative Space',
            'service' => 'Pexels',
        ],
        [
            'url' => '25.jpg',
            'author' => 'Joshua Earle',
            'service' => 'Unsplash',
        ],
        [
            'url' => '26.jpg',
            'author' => 'Alex Padurariu',
            'service' => 'Unsplash',
        ],
        [
            'url' => '27.jpg',
            'author' => 'Skyler Smith',
            'service' => 'Unsplash',
        ],
        [
            'url' => '28.jpg',
            'author' => 'unknown',
            'service' => 'Unsplash',
        ],
        [
            'url' => '29.jpg',
            'author' => 'unknown',
            'service' => 'PxHere',
        ],
        [
            'url' => '30.jpg',
            'author' => 'Dominik Schröder',
            'service' => 'Unsplash',
        ],
        [
            'url' => '31.jpg',
            'author' => 'Robert Bye',
            'service' => 'Unsplash',
        ],
    ];

    public static function make(): static
    {
        return app(static::class);
    }

    public function getImage(): Image
    {
        $image = self::IMAGES[now()->format('j') - 1];

        return new Image(
            'url("' . asset('images/swisnl/filament-backgrounds/curated-by-swis/' . $image['url']) . '")',
            __('Photo by :author on :service', Arr::only($image, ['author', 'service']))
        );
    }
}
