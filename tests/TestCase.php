<?php

namespace Swis\Filament\Backgrounds\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Swis\Filament\Backgrounds\FilamentBackgroundsServiceProvider;

class TestCase extends Orchestra
{
    /**
     * @return list<class-string>
     */
    protected function getPackageProviders($app): array
    {
        return [
            FilamentBackgroundsServiceProvider::class,
        ];
    }

    /**
     * @param  \Illuminate\Foundation\Application  $app
     */
    protected function defineEnvironment($app): void
    {
        $app->usePublicPath(__DIR__ . '/../workbench/public/');
    }
}
