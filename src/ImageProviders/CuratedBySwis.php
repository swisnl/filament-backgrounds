<?php

namespace Swis\Filament\Backgrounds\ImageProviders;

use Swis\Filament\Backgrounds\Contracts\ProvidesImages;
use Swis\Filament\Backgrounds\Image;

class CuratedBySwis implements ProvidesImages
{
    protected const IMAGES = [
        [
            'url' => '01.jpg',
            'author' => 'Sergey Zolkin on Unsplash',
        ],
        [
            'url' => '02.jpg',
            'author' => 'Andrew Phillips on Unsplash',
        ],
        [
            'url' => '03.jpg',
            'author' => 'Ales Krivec on Unsplash',
        ],
        [
            'url' => '04.jpg',
            'author' => 'Roger Burkhard on Unsplash',
        ],
        [
            'url' => '05.jpg',
            'author' => 'Colton Brown on Unsplash',
        ],
        [
            'url' => '06.jpg',
            'author' => 'Micah Hallahan on Unsplash',
        ],
        [
            'url' => '07.jpg',
            'author' => 'Michael Baird on Unsplash',
        ],
        [
            'url' => '08.jpg',
            'author' => 'Damir Kotoric on Unsplash',
        ],
        [
            'url' => '09.jpg',
            'author' => 'Alex Wigan on Unsplash',
        ],
        [
            'url' => '10.jpg',
            'author' => 'Blake Verdoorn on Unsplash',
        ],
        [
            'url' => '11.jpg',
            'author' => 'Sébastien Marchand on Unsplash',
        ],
        [
            'url' => '12.jpg',
        ],
        [
            'url' => '13.jpg',
            'author' => 'Ozark Drones on Unsplash',
        ],
        [
            'url' => '14.jpg',
            'author' => 'Luís Perdigão on Unsplash',
        ],
        [
            'url' => '15.jpg',
        ],
        [
            'url' => '16.jpg',
            'author' => 'Elizabeth Lies on Unsplash',
        ],
        [
            'url' => '17.jpg',
            'author' => 'Daniela Cuevas on Unsplash',
        ],
        [
            'url' => '18.jpg',
            'author' => 'Rebecca Johnston on Unsplash',
        ],
        [
            'url' => '19.jpg',
            'author' => 'Demi DeHerrera on Unsplash',
        ],
        [
            'url' => '20.jpg',
            'author' => 'Kellen Riggin on Unsplash',
        ],
        [
            'url' => '21.jpg',
            'author' => 'Sebastien Gabriel on Unsplash',
        ],
        [
            'url' => '22.jpg',
            'author' => 'Genta Mochizawa on Unsplash',
        ],
        [
            'url' => '23.jpg',
            'author' => 'Modestas Urbonas on Unsplash',
        ],
        [
            'url' => '24.jpg',
        ],
        [
            'url' => '25.jpg',
            'author' => 'Joshua Earle on Unsplash',
        ],
        [
            'url' => '26.jpg',
            'author' => 'Alex Padurariu on Unsplash',
        ],
        [
            'url' => '27.jpg',
            'author' => 'Skyler Smith on Unsplash',
        ],
        [
            'url' => '28.jpg',
        ],
        [
            'url' => '29.jpg',
        ],
        [
            'url' => '30.jpg',
            'author' => 'Dominik Schröder on Unsplash',
        ],
        [
            'url' => '31.jpg',
            'author' => 'Robert Bye on Unsplash',
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
            "url('" . asset('images/swisnl/filament-backgrounds/curated-by-swis/' . $image['url']) . "')",
            array_key_exists('author', $image) ? __('Photo by :author', ['author' => $image['author']]) : null
        );
    }
}
